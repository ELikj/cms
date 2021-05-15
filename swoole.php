<?php
/* 
 * 系统名称：以厘php框架
 * 官方网址：https://eLiphp.com
 * 版权所有：2009-2021 以厘科技 (https://eLikj.com) 并保留所有权利。 
 * 代码协议：开源代码协议 Apache License 2.0 详见 http://www.apache.org/licenses/
 */

/*
可以改造函数 
    echoapptoken  输出函数
    upload  上传函数
    ip  获取ip
可以配置常量
    ELikj  核心文件存放位置
    ELiTempPath 缓存的目录
    Residentmemory 启用 常驻内存服务
*/
//swoole 自定义函数
if (php_sapi_name() != "cli") {
    exit("No php_cli");
}
if (!extension_loaded('swoole')) {
    exit("No swoole");
}

$REQUEST = null;
function echoapptoken($data = array(),  $code = '0', $msg = '', $apptoken = '', $kuozan = [])
{
    global $REQUEST;
    if (isset($GLOBALS['isend']) && $GLOBALS['isend']) {
        return;
    }
    $REQUEST->header('content-type', 'application/json; charset=utf-8', true);
    $REQUEST->end(apptoken($data,  $code, $msg, $apptoken, $kuozan));
    $GLOBALS['isend'] = true;
    return true;
}

function tiaozhuan($eangzhan = "")
{
    global $REQUEST;
    if (isset($GLOBALS['isend']) && $GLOBALS['isend']) {
        return;
    }
    $REQUEST->redirect($eangzhan, 302);
    $GLOBALS['isend'] = true;
    return true;
}



//swoole自助服务
define("Residentmemory", "swoole");
define('WWW', dirname(__FILE__) . '/');
include "index.php";
$http = new Swoole\Http\Server("0.0.0.0", 80);
//$http ->listen("0.0.0.0", 443, SWOOLE_SOCK_TCP | SWOOLE_SSL );
$http->on("start", function ($server) {
    echo "Swoole http server is started\n";
});
$http->set(

    [
        // 'daemonize' => 1,
        // 'ssl_cert_file' => '/root/ssl.pem',
        // 'ssl_key_file' => '/root/ssl.key',
    ]
);
$http->on("request", function ($request, $response) {
    global $ELiConfig, $ELiHttp, $ELiDataBase, $ELiMem, $ELiMemsession, $SESSIONID,
        $LANG, $CANSHU, $features, $URI, $Composer, $HTTP, $YHTTP, $Plus, $ClassFunc, $REQUEST, $SESSIONIDMK, $POSTBODY;
    $REQUEST =  $response;
    $GLOBALS['isend'] = false;
    $GLOBALS['ELiys'] = [];
    if ($request->server['path_info'] == '/favicon.ico' || $request->server['request_uri'] == '/favicon.ico') {
        $response->end();
        return;
    }

    $GLOBALS['header'] = [];
    foreach ($request->header as $k => $v) {
        $GLOBALS['header'][strtolower($k)] = $v;
    }
   
    $GLOBALS['header']['user_agent']  = $GLOBALS['header']['user-agent'] = $_SERVER["HTTP_USER_AGENT"] = $request->header['user-agent']??"";
    

    if (strstr($ELiConfig['host'], '://' . $request->header['host']) === false) {
        $response->redirect($ELiConfig['host'], 302);
        return "";
    }

    
    $ELiHttp = ltrimE(rawurldecode(trimE($request->server['path_info'])), '/');
    $BAOHANFIEL = [
        'attachment',
        'tpl',
        '.txt'
    ];

    $response->header('Access-Control-Allow-Origin', '*', true);
    foreach ($BAOHANFIEL  as $Filter_) {

        if (strpos(strtolower($ELiHttp), $Filter_) !== false) {
            if (strpos(strtolower($ELiHttp), ".php") !== false) {
                $response->status(500);
                $response->end("");
                return  "";
            }
            $fiel = WWW . str_replace('..', '', $ELiHttp);
            if (is_file($fiel)) {
                return $response->sendfile($fiel);
            }
            $response->status(404);
            $response->end("");
            return "";
        }
    }

    if(isset($request->server['query_string']) && $request->server['query_string'] != ""){
        $ELiHttp .= "?".$request->server['query_string'];
    }
    ob_start();
    $_GET = $request->get;
    $_POST = $request->post;
    $_FILES = $request->files;
    $POSTBODY = $request->rawContent();
    $GLOBALS['ip'] = $request->server['remote_addr'];
    if (isset($request->cookie)) {
        foreach ($request->cookie as $k => $v) {
            $_COOKIE[$k] = $v;
        }
    }
    if ($_POST) {
        if (strstr(strtolower(json_encode($_POST)), DBprefix) !== false) {
            return $response->end("ELikj: Security filtering");
        }
    }
    if (php_sapi_name() != "cli") {
        $Filter = array('<', '>', '..', '(', ')', '"', "'", "*", '[', ']', DBprefix, '{', '}', '$');
        foreach ($Filter  as $Filter_) {
            if (strpos(strtolower($ELiHttp), $Filter_) !== false) {
                return $response->end("ELikj: Security filtering " . $Filter_);
            }
        }
    } else {
        ELis('Bat_Cli');
    }
    $SESSIONIDMK = false;
    if (isset($_GET['apptoken']) && strlen($_GET['apptoken']) > 63) {
        $SESSIONID = $_GET['apptoken'];
        $SESSIONIDMK = true;
    } else if (isset($_POST['apptoken']) && strlen($_POST['apptoken']) > 63) {
        $SESSIONID = $_POST['apptoken'];
       
    } else if (isset($_COOKIE['apptoken']) && strlen($_COOKIE['apptoken']) > 63) {
        $SESSIONID = $_COOKIE['apptoken'];
        $SESSIONIDMK = true;
       
    } else {
        $SESSIONIDMK = true;
        $SESSIONID = md5(rand(1, 9999999) . microtime()) . md5(rand(1, 9999999) . sha1(microtime()));
    }
    
    
    if ($SESSIONIDMK && $ELiConfig['sessionSafety']) {
        $response->cookie('apptoken', $SESSIONID,  time() + $ELiConfig['sessiontime'], '/', null, null, TRUE);
    }

    if (strstr($ELiHttp, $ELiConfig['houzui'] . '&') !== false) {
        $URI = str_replace($ELiConfig['houzui'] . '&', $ELiConfig['houzui'] . '?', $ELiHttp);
    } else {
        $URI = $ELiHttp;
    }
    $URI  = ltrimE(str_replace(array('index.php','//', trimE($_SERVER['SCRIPT_NAME'], '/'),'?/'), array('','/', '','/'), $URI), $ELiConfig['dir']);
    $TURI = explode( '?' , $URI );
    if(count($TURI) > 1){
        if($TURI['0'] == ''){
            $TURI['0'] = $TURI['1'];
        }
    }
    $URI  = trimE($TURI['0'], '/');
    $URI = str_replace( '..','', $URI);
    $URI = rtrimE($URI,$ELiConfig['houzui']);

    
    if ($URI == '' && $ELiConfig['iscms'] != 1) {
        $URI = $ELiConfig['object'];
    }
    if (strstr($URI, $ELiConfig['Plus']. '/admin') !== false || strstr($URI,  '/admin_') !== false ) {
        $ELiConfig['fenge'] = '/';
    }else{
        $ELiConfig['fenge'] = $ELiConfig['FENGE'];
    }
    $URI = str_replace('&', $ELiConfig['fenge'], $URI);
    $HTTP = explode($ELiConfig['fenge'], $URI);
    $YHTTP = $HTTP;
    if ($HTTP['0'] == $ELiConfig['Plus']) {
        unset($HTTP['0']);
        unset($YHTTP['0']);
        $Plus = isset($HTTP['1']) ? ELiSecurity($HTTP['1']) : ELiSecurity($ELiConfig['object']);
        $ClassFunc = isset($HTTP['2']) ? $HTTP['2'] : $ELiConfig['behavior'];
        if (isset($HTTP['1'])) {
            unset($HTTP['1']);
        }
        if (isset($HTTP['2'])) {
            unset($HTTP['2']);
        }
    } else if ($ELiConfig['iscms'] == 1) {

        if (!isset($HTTP['0']) || $HTTP['0'] == "") {
            $Plus = ELiSecurity($ELiConfig['object']);
            $ClassFunc = $ELiConfig['behavior'];
        } else {
            $Plus = ELiSecurity($ELiConfig['object']);
            $ClassFunc = $HTTP['0'];
            unset($HTTP['0']);
        }
    } else {
        if (!isset($HTTP['0'])) {
            $HTTP['0'] = ELiSecurity($ELiConfig['object']);
        } else  if (strstr($HTTP['0'], '?') !== false) {
            $fan = explode('?', $HTTP['0']);
            $HTTP['0'] = $fan['0'];
            $HTTP['1'] = $ELiConfig['behavior'];
        }
        if (!isset($HTTP['1'])) {
            $HTTP['1'] = $ELiConfig['behavior'];
        } else  if (strstr($HTTP['1'], '?') !== false) {
            $fan = explode('?', $HTTP['1']);
            $HTTP['1'] = $fan['0'];
        }
        $Plus = ELiSecurity($HTTP['0']);
        $ClassFunc = $HTTP['1'];
        unset($HTTP['0']);
        unset($HTTP['1']);
    }
    $CANSHU = array();
    foreach ($HTTP as $qita) {
        $CANSHU[] = $qita;
    }
    $Plus = strtolower($Plus);
    $ClassFunc = strtolower($ClassFunc);

    ELiLoad($Plus);
    $GLOBALS['plugin'] = $Plus;
    $GLOBALS['pluginurl'] = $ELiConfig['dir'] . "Tpl/" . $Plus . '/';
    $features = [];
    try {
        $features = ELiplus($Plus);
    } catch (Exception $e) {
        $features = [];
    }
    if (strstr($ELiConfig['whitelist'], $Plus) === false) {
        if ($ELiConfig['object']  != $Plus && (!$features || $features['off'] == "0")) {
            return $response->end("Plugin closed");
        }
    }
    ELicall($Plus, $ClassFunc, $CANSHU, $features, false);

    $hhh = ob_get_contents();

    if ($GLOBALS['isend']) {
        ob_end_clean();
        return "";
    }  
    if ($hhh && $hhh != "") {
        $response->end($hhh);
        ob_end_clean();
        return "";
    }
    

    $response->end("");
    return "";
});

$http->start();
