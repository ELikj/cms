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
//腾讯云函数计算 需要改造接受数据
define("Residentmemory", "tencent");
define("ELiTempPath", "/tmp/");
define('WWW', dirname(__FILE__) . '/');
function upload()
{
        $ext_arr = array(
        'friend' => array('gif', 'jpg', 'jpeg', 'png', 'bmp', 'mp4'),
        'image' => array('gif', 'jpg', 'jpeg', 'png', 'bmp'),
        'flash' => array('swf', 'flv'),
        'media' => array('swf', 'flv', 'mp3', 'wav', 'wma', 'wmv', 'mid', 'avi', 'mpg', 'asf', 'rm', 'rmvb', 'mp4'),
        'file' => array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'htm', 'html', 'txt', 'zip', 'rar', 'gz', 'bz2', '7z'),
        'all' => array('gif', 'bmp', 'jpg', 'jpeg', 'png', 'swf', 'flv', 'mp3', 'wav', 'wma', 'wmv', 'mid', 'avi', 'mpg', 'asf', 'rm', 'rmvb', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'htm', 'html', 'txt', 'zip', 'rar', 'gz', 'bz2', '7z', 'mp4')
    );
    if (isset($_GET['uplx']) && isset($ext_arr[$_GET['uplx']])) $LX = $_GET['uplx'];
    else  $LX = 'all';
    global $ELiConfig, $LANG;
    $max_size = isset($_GET['maxsize']) && $ELiConfig['maxsize'] >= $_GET['maxsize'] &&  $_GET['maxsize'] > 10 ? $_GET['maxsize'] : $ELiConfig['maxsize'];
    if (!isset($_FILES[$LX])) {
        return  array('code' => '0', 'msg' => $LANG['update']['meiwenjian']);
    }
    if (!empty($_FILES[$LX]['error'])) {
        switch ($_FILES[$LX]['error']) {
            case '1':
                $error = $LANG['update']['error1'];
                break;
            case '2':
                $error = $LANG['update']['error2'];
                break;
            case '3':
                $error = $LANG['update']['error3'];
                break;
            case '4':
                $error = $LANG['update']['error4'];
                break;
            case '6':
                $error = $LANG['update']['error6'];
                break;
            case '7':
                $error = $LANG['update']['error7'];
                break;
            case '8':
                $error = $LANG['update']['error8'];
                break;
            case '999':
            default:
                $error =  $LANG['update']['error999'];
        }
        return  array('code' => '0', 'msg' => $error);
    }
    $qianzui = 'attachment/' . $LX . '/' . date('Ym') . '/';
    $files =  $ELiConfig['dir'] . $qianzui;
    if (empty($_FILES) === false) {
        $file_name = $_FILES[$LX]['name'];
        $tmp_name  = $_FILES[$LX]['tmp_name'];
        $file_size = $_FILES[$LX]['size'];
        if (!$file_name) return  array('code' => '0', 'msg' => $LANG['update']['meiwenjian']);
        if ($file_size > $max_size) return array('code' => '0', 'msg' => $LANG['update']['maxsizeda']);
        $temp_arr = explode(".", $file_name);
        $file_ext = array_pop($temp_arr);
        $file_ext = trimE($file_ext);
        $file_ext = strtolower($file_ext);
        $expa = array_flip($ext_arr[$LX]);
        if (!isset($expa[$file_ext])) {
            return  array('code' => '0', 'msg' => $LANG['update']['shangchuanyun'] . implode(',', $ext_arr[$LX]));
        }
        $Nfile =  date('d') . '_' . ELimm(time() . rand(1, 9999999)) . '.' . $file_ext;
        $returnfile = $files . $Nfile;
        $tmpneirong = file_get_contents($tmp_name);
        if (strpos(strtolower($tmpneirong), '<?php') !== false) {
            return  array('code' => 0, 'msg' => $LANG['update']['meiwenjian']);
        }
        if (strpos(substr($tmpneirong, 0, 50), ';base64,') !== false) {
            $nnn = explode(';base64,', $tmpneirong);
            $tmpneirong = base64_decode($nnn['1']);
        }

        $request_url = "腾讯上传网址";
        $APID = "SecretId";
        $APKY = "SecretKey";
        $LUJIN = $returnfile;
        $NEIRONG = $tmpneirong;
        $shijia = gmdate('D, d M Y H:i:s \G\M\T', time());
        $start = time();
        $end = time() + 300;
        $KeyTime = $start . ";" . $end;
        $Authorization = [
            "q-sign-algorithm=sha1",
            "q-ak=" . $APID,
            "q-sign-time=" . $KeyTime,
            "&q-key-time=" . $KeyTime,
            "q-header-list=host",
            "q-url-param-list="
        ];
        $SignKey = hash_hmac('sha1', $KeyTime, $APKY);
        $HttpString = "put\n/" . trimE($LUJIN, '/') . "\n\nhost=" . $request_url."\n";
        $jjj = "sha1\n" . $KeyTime . "\n" . sha1($HttpString) . "\n";
        $Authorization[] = "q-signature=" . hash_hmac('sha1', $jjj, $SignKey);
        $temp_headers = array(
            'Content-Type: application/octet-stream',
            'Authorization:' . implode("&", $Authorization),
            'Date: ' . $shijia,
            'Host: ' . $request_url,
            'Content-Length: ' . strlen($NEIRONG)
        );
        $fan = ELipost("https://".$request_url . $LUJIN, $NEIRONG, [
            CURLOPT_HTTPHEADER => $temp_headers,
            CURLOPT_USERAGENT => "RequestCore/1.4.3",
            CURLOPT_CUSTOMREQUEST => "PUT"
        ]);

        if (trimE($fan) != "") {
            return  array('code' => 0, 'msg' => $LANG['update']['meiwenjian']);
        }

        if (is_file($tmp_name)) {
            @unlink($tmp_name);
        }

        if (!defined("Residentmemory")) {
            if (strpos($_SERVER["HTTP_USER_AGENT"], "MSIE")) header('Content-type:text/html; charset=UTF-8');
            else  header('Content-type:application/json ;charset=UTF-8');
        }
        return  array('code' => 1, 'content' =>  array('pic' => $returnfile, 'size' => $file_size, 'houzui' => $file_ext));
    }
}

function parse_raw_http_request($input, $CONTENT_TYPE)
{   
    
    preg_match('/boundary=(.*)$/', $CONTENT_TYPE, $matches);
    if (!isset($matches[1])) {
        $hujux = toget( urldecode($input));
        foreach ($hujux as $k => $v) {
            if ($k == "") {
                continue;
            }
            $_POST[$k] = $v;
        }
        return;
    }
    $boundary = $matches[1];
    $a_blocks = preg_split("/-+$boundary/", $input);
    array_pop($a_blocks);
    foreach ($a_blocks as $id => $block) {
        if (empty($block))
            continue;
        if (strpos($block, 'filename=') !== FALSE) {
            $bodyzi = explode("\r\n", $block);
            $name_ = explode('=', $bodyzi['1']);
            $filex_ = explode('"', $name_['1']);
            $file = trimE($filex_['1']);
            $name = trimE(trimE($name_['2']), '"');
            $type_ =  explode('Content-Type:', $bodyzi['2']);
            if (!isset($type_['1'])) {
                continue;
            }
            $type = trimE($type_['1']);
            unset($bodyzi['0']);
            unset($bodyzi['1']);
            unset($bodyzi['2']);
            unset($bodyzi['3']);
            $neirong = implode("\r\n", $bodyzi);
            $linshitmep = ELiTempPath . md5($name . uuid()) . '.temp';
            file_put_contents($linshitmep, $neirong);
            $_FILES[$file] = [
                'name' => $name,
                'type' => $type,
                'tmp_name' => $linshitmep,
                'error' => 0,
                'size' => strlen($neirong)
            ];
        } else {
            $block = urldecode($block);
            preg_match('/name=\"([^\"]*)\"[\n|\r]+([^\n\r].*)?\r$/s', $block, $matches);
            _POST_($_POST,$matches[1]??"",$matches[2]??"");
        }
    }
}



function tiaozhuan($eangzhan = "")
{
    global $REQUEST;
    if (isset($GLOBALS['isend']) && $GLOBALS['isend']) {
        return;
    }
    $GLOBALS['head'] = $eangzhan;
    $GLOBALS['isend'] = true;
    return true;
}

include "index.php";
$GLOBALS['isend'] = false;
function main_handler($request, $context)
{
    ob_clean();
    global $ELiConfig, $ELiHttp, $ELiDataBase, $ELiMem, $ELiMemsession, $SESSIONID,
        $LANG, $CANSHU, $features, $URI, $Composer, $HTTP, $YHTTP, $Plus, $ClassFunc, $REQUEST, $SESSIONIDMK, $POSTBODY;
    $ELiMem = $ELiMemsession = new ELimemsql;
    $SESSIONID = "";
    $GLOBALS['head'] = "json";
    $_POST = [];
    $_GET = [];
    $_FILES = [];
    $_COOKIE = [];
    $queries    = (array)($request->queryString ?? []);
    $headers    = (array)($request->headers ?? []);
    $POSTBODY = $body = base64_decode($request->body ?? "");
    $path       = ltrimE($request->path ?? "", $request->requestContext->path ?? "");
    $GLOBALS['ip'] = $request->requestContext->sourceIp ?? "";
    $ELiHttp = ltrimE(rawurldecode(trimE($path)), '/');
    $GLOBALS['header'] = [];
    foreach ($headers as $k => $v) {
        $GLOBALS['header'][strtolower($k)] = $v;
    }
    $GLOBALS['header']['user_agent'] = $_SERVER['HTTP_USER_AGENT'] =  $GLOBALS['header']['user-agent']??"";
    $GLOBALS['ELiys'] = [];
    $GLOBALS['isend'] = false;
    if ($body != "") {
        parse_raw_http_request($body, $GLOBALS['header']['content-type']);
    }
    if ($queries) {
        $_GET = $queries;
    }
    if (isset($headers['cookie'])) {
        $headerscookie = toget(  str_replace(';','&',$headers['cookie']) );

        foreach ($headerscookie as $k => $v) {
            $_COOKIE[trimE($k)] = trimE($v);
        }
    }

    $HUOMIAN = explode(".",$ELiHttp);
    $EXT = end($HUOMIAN);
    if ( (strstr($ELiHttp, 'Tpl/') !== false  && $EXT != "php") ||  $EXT == "txt" ) {
        return [
            "isBase64Encoded" => true,
            "statusCode" => 200,
            "headers" => ["Access-Control-Allow-Origin" => "*"],
            "body" => base64_encode(file_get_contents('./' . $ELiHttp))
        ];
    }

    if ($_POST) {
        if (strstr(strtolower(json_encode($_POST)), DBprefix) !== false) {
            return ELiError("ELikj: Security filtering");
        }
    }
    
    if($_GET){
        $ELiHttp.='?'.getarray($_GET);
    }

    if (php_sapi_name() != "cli") {
        $Filter = array('<', '>', '..', '(', ')', '"', "'", "*", '[', ']', DBprefix, '{', '}', '$');
        foreach ($Filter  as $Filter_) {
            if (strpos(strtolower($ELiHttp), $Filter_) !== false) {
                return ELiError("ELikj: Security filtering " . $Filter_);
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
        $SESSIONIDMK = true;
        $SESSIONID = $_COOKIE['apptoken'];
    } else {
        $SESSIONIDMK = true;
        $SESSIONID = md5(rand(1, 9999999) . microtime()) . md5(rand(1, 9999999) . sha1(microtime()));
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
            ELiError("Plugin closed");
        }
    }
    ELicall($Plus, $ClassFunc, $CANSHU, $features, false);
    $hhh = ob_get_contents();
    $Content = "text/html; charset=UTF-8;";
    if ($GLOBALS['head'] == "html") {
        $Content = "text/html; charset=UTF-8;";
    } else if ($GLOBALS['head'] == "png") {
        $Content = "image/png";
    } else {

        if (strstr($GLOBALS['head'], "/") !== false) {
            $Content = "text/html; charset=UTF-8;";
            $url = $GLOBALS['head'];
            if ($GLOBALS['head']) {
                unset($GLOBALS['head']);
            }
            $SHUJUXX = ["Content-Type" => $Content, "Access-Control-Allow-Origin" => "*", 'Location' => $url];
            if ($SESSIONIDMK && $ELiConfig['sessionSafety']) {
                $SHUJUXX["Set-Cookie"] = "apptoken=" . $SESSIONID . ";HttpOnly;path=/;Expires=". gmdate('D, d M Y H:i:s \G\M\T',time() + $ELiConfig['sessiontime']);
            }
            return  [
                "isBase64Encoded" => true,
                "statusCode" => 302,
                "headers" => $SHUJUXX ,
                "body" => base64_encode("")
            ];

        } else {
            $Content = "application/json;charset=UTF-8";
        }
    }

    $SHUJUXX = [
        "isBase64Encoded" => true,
        "statusCode" => 200,
        "headers" => ["Content-Type" => $Content, "Access-Control-Allow-Origin" => "*"],
        "body" => base64_encode($hhh)
    ];

    if ($SESSIONIDMK && $ELiConfig['sessionSafety']) {
        $SHUJUXX["headers"]["Set-Cookie"] = "apptoken=" . $SESSIONID . ";HttpOnly;path=/;Expires=". gmdate('D, d M Y H:i:s \G\M\T',time() + $ELiConfig['sessiontime']);
    }

    if ($GLOBALS['head']) {
        unset($GLOBALS['head']);
    }
    return   $SHUJUXX;
}
