<?php
use RingCentral\Psr7\Response;
use OSS\OssClient;
/* ******************************************
 * 系统名称：以厘建站系统
 * 版权所有：成都市以厘科技有限公司 www.eLikj.com
 * 代码协议：开源代码协议 Apache License 2.0 详见 http://www.apache.org/licenses/
 * 特别申明：本软件不得用于从事违反所在国籍相关法律所禁止的活动， 
 * 对于用户擅自使用本软件从事违法活动不承担任何责任
 * ******************************************
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
//阿里云函数计算 需要改造接受数据
define("Residentmemory","aliyun");
define("ELiTempPath","/tmp/");
define( 'WWW', dirname(__FILE__).'/');
function aliyundel($xxx){
    $ossClient = new OssClient('idd','密码', 'oss-cn-hangzhou.aliyuncs.com');
    try {
        $ossClient->deleteObject('xianliaogame', ltrimE($xxx,"/")  );
    } catch (OssException $e) {
        //print($e->getMessage());
    }
}

function upload(){
   // ob_clean();
    $ext_arr = array( 
        'friend' => array('gif', 'jpg', 'jpeg', 'png','bmp','mp4'),
        'image' => array('gif', 'jpg', 'jpeg', 'png','bmp'),
        'flash' => array('swf', 'flv'),
        'media' => array('swf', 'flv', 'mp3', 'wav', 'wma', 'wmv', 'mid', 'avi', 'mpg', 'asf', 'rm', 'rmvb','mp4'),
        'file' => array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'htm', 'html', 'txt', 'zip', 'rar', 'gz', 'bz2','7z'),
        'all' => array('gif','bmp', 'jpg', 'jpeg', 'png' ,'swf', 'flv', 'mp3', 'wav', 'wma', 'wmv', 'mid', 'avi', 'mpg', 'asf', 'rm', 'rmvb','doc', 'docx', 'xls', 'xlsx', 'ppt', 'htm', 'html', 'txt', 'zip', 'rar', 'gz', 'bz2','7z','mp4')
    );
    if( isset( $_GET['uplx']) && isset(  $ext_arr[ $_GET['uplx']])) $LX = $_GET['uplx'];
    else  $LX = 'all';
    global $ELiConfig,$LANG;
    $max_size = isset( $_GET['maxsize']) && $ELiConfig['maxsize'] >= $_GET['maxsize'] &&  $_GET['maxsize'] > 10 ? $_GET['maxsize'] : $ELiConfig['maxsize'];
    if(!isset($_FILES[ $LX]) ){
        return  array( 'code'=> '0', 'msg' => $LANG['update']['meiwenjian'] );
    }
    if ( ! empty( $_FILES[ $LX]['error']) ) {

        switch( $_FILES[ $LX]['error']){
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
        return  array( 'code'=> '0', 'msg' => $error );
    }
    $qianzui = 'attachment/'.$LX.'/'.date('Ym').'/';
    $files =  $ELiConfig['dir'].$qianzui;
  
   
    if ( empty( $_FILES) === false) {
        $file_name = $_FILES[$LX]['name'];
        $tmp_name  = $_FILES[$LX]['tmp_name'];
        $file_size = $_FILES[$LX]['size'];
        if ( !$file_name ) return  array( 'code'=> '0', 'msg' => $LANG['update']['meiwenjian']);
        //if ( @is_dir( $WJIAN ) === false) return array( 'code'=> '0', 'msg' => $LANG['update']['meimulu'] );
        //if ( @is_writable( $WJIAN ) === false) return array( 'code'=> '0', 'msg' => $LANG['update']['meixieru']); 
        //if ( @is_uploaded_file( $tmp_name) === false) return array( 'code'=> '0', 'msg' => $LANG['update']['chuanshibai']);
        if ( $file_size > $max_size ) return array( 'code'=> '0', 'msg' => $LANG['update']['maxsizeda'] ); 
        $temp_arr = explode( "." , $file_name);
        $file_ext = array_pop( $temp_arr);
        $file_ext = trimE( $file_ext);
        $file_ext = strtolower( $file_ext);
        $expa = array_flip($ext_arr[ $LX]);
        if(! isset($expa[ $file_ext ])){
            return  array( 'code'=> '0', 'msg' => $LANG['update']['shangchuanyun'].implode( ',' , $ext_arr[ $LX]) );
        } 
        $Nfile =  date('d').'_'.ELimm( time().rand( 1 , 9999999)).'.'.$file_ext;
        $returnfile = $files.$Nfile;
        $tmpneirong = file_get_contents($tmp_name);
        if( strpos( strtolower($tmpneirong), '<?php') !== false){
            return  array( 'code'=> 0, 'msg' => $LANG['update']['meiwenjian']);
        }
        if( strpos( substr($tmpneirong,0,50), ';base64,') !== false   ){
            $nnn = explode(';base64,',$tmpneirong);
            $tmpneirong = base64_decode($nnn['1']);
        }
        $CDN = '';
        $ossClient = new OssClient('idd','密码', 'oss-cn-hangzhou.aliyuncs.com');
        try {
            $ossClient->putObject('xianliaogame', ltrimE($returnfile,"/") ,$tmpneirong );
        } catch (OssException $e) {
           
        }

        if(is_file($tmp_name)){
            @unlink($tmp_name);
        }

        if(!defined("Residentmemory")){
            if( strpos( $_SERVER["HTTP_USER_AGENT"] , "MSIE")) header( 'Content-type:text/html; charset=UTF-8' );
            else  header( 'Content-type:application/json ;charset=UTF-8');
        }

        return  array( 'code' => 1 , 'content' =>  array( 'pic' => $returnfile,'size' => $file_size,'houzui' => $file_ext) );
    }else  return  array( 'code'=> 0, 'msg' => $LANG['update']['meiwenjian']);
}

function parse_raw_http_request($input, $CONTENT_TYPE )
{
  preg_match('/boundary=(.*)$/', $CONTENT_TYPE, $matches);
  if(!isset($matches[1])){
    $hujux= toget(rawurldecode(($input)));
    foreach($hujux as $k =>$v){
        if($k == ""){
            continue ;
        }
       $_POST[$k] = $v;
   }
    return ;
  }
  $boundary = $matches[1];
  
  $a_blocks = preg_split("/-+$boundary/", $input);
  array_pop($a_blocks);
  // loop data blocks
  foreach ($a_blocks as $id => $block)
  {
    if (empty($block))
      continue;
    if (strpos($block, 'filename=') !== FALSE)
    {
        $bodyzi = explode("\r\n",$block);
        $name_ = explode('=',$bodyzi['1']); 
        $filex_ = explode('"',$name_['1']);
        $file = trimE($filex_['1']);
        $name = trimE(trimE($name_['2']),'"');
        $type_ =  explode('Content-Type:',$bodyzi['2']);
        if(!isset($type_['1'])){
            continue ;
        }
        
        $type = trimE($type_['1']);
        unset($bodyzi['0']);
        unset($bodyzi['1']);
        unset($bodyzi['2']);
        unset($bodyzi['3']);
        $neirong = implode("\r\n",$bodyzi);

        $linshitmep = ELiTempPath.md5( $name.uuid() ).'.temp';
        file_put_contents($linshitmep,$neirong);
        $_FILES[$file] =[
            'name'=>$name,
            'type'=>$type,
            'tmp_name'=>$linshitmep,
            'error'=>0,
            'size'=> strlen($neirong)
        ];

    }else
    {
      preg_match('/name=\"([^\"]*)\"[\n|\r]+([^\n\r].*)?\r$/s', $block, $matches);
      $_POST[$matches[1]] = $matches[2];
    }
  }        
}


function tiaozhuan($eangzhan = ""){
    global $REQUEST;
    if(isset($GLOBALS['isend']) && $GLOBALS['isend']){
        return ;
    }
   
    $GLOBALS['isend'] = true;
    return new Response(
        302,
        [
            "Access-Control-Allow-Origin"=>"*",
            "Location"=>$eangzhan
        ]
        ,
        ""
    );
}

include "index.php";
$GLOBALS['isend'] = false;
function handler($request, $context): Response{
    
    global $ELiConfig,$ELiHttp,$ELiDataBase,$ELiMem, $ELiMemsession,$SESSIONID,
    $LANG,$CANSHU,$features,$URI,$Composer,$HTTP,$YHTTP,$Plus,$ClassFunc,$REQUEST,$SESSIONIDMK,$POSTBODY;
    $ELiMem= $ELiMemsession =new ELimemsql;
    $_POST = []; 
    $_GET = [];
    $_FILES = [];
    $_COOKIE = [];
    $GLOBALS['ELiys'] = [];
    $POSTBODY = $body = $request->getBody()->getContents();
    $queries    = $request->getQueryParams();
    $headers    = $request->getHeaders();
    $GLOBALS['header']=[];
    foreach($headers as $k =>$v){
        $GLOBALS['header'][ strtolower($k )] = reset($v);
    }
    
    if(strstr($ELiConfig['host'],'://'.$GLOBALS['header']['host']) === false){

        return new Response(
            302,
            ["Access-Control-Allow-Origin"=>"*",
            "Location"=>$ELiConfig['host']
            ]
            ,
            ""
        );
        return "";
    }

    $path       = $request->getAttribute('path');
    $GLOBALS['ip'] = $request->getAttribute("clientIP");
    $ELiHttp = ltrimE( rawurldecode( trimE( $path )),'/');
    $_SERVER['HTTP_USER_AGENT'] = ( $GLOBALS['header']['user-agent']);
    $GLOBALS['isend'] = false;
   
    if($body != ""){
       parse_raw_http_request($body,($GLOBALS['header']['content-type']));
    }
    
    if($queries){
        $_GET = $queries;
    }
    if( isset($GLOBALS['header']['cookie'])){
        foreach($GLOBALS['header']['cookie'] as $shuju ){
            if( $shuju != "" ){
                list($k,$v)= explode("=",trimE($shuju) );
                $_COOKIE[trimE($k)] = trimE($v);
            }
        }
    }
    if(strstr($ELiHttp,'Tpl/') !== false  && strstr($ELiHttp,'.php') === false ){
        return new Response(
            200,
            ["Access-Control-Allow-Origin"=>"*"]
            ,
            file_get_contents('./'.$ELiHttp)
        );
    }
    //POST Security filtering
    if( $_POST ){
        if( strstr( strtolower( json_encode( $_POST)), DBprefix ) !== false ){
        return ELiError("ELikj: Security filtering");
        } 
    }
    //GET Security filtering
    if( php_sapi_name() != "cli"){
        $Filter = array( '<', '>', '..', '(', ')','"',"'","*",'[',']',DBprefix,'{','}','$');
        foreach( $Filter  as $Filter_){
            if( strpos(  strtolower($ELiHttp) , $Filter_) !== false){
                return ELiError("ELikj: Security filtering ".$Filter_);
            }
        }
    }else{
        ELis('Bat_Cli');
    }
    $SESSIONIDMK = false;
    if(isset($_GET['apptoken']) && strlen($_GET['apptoken'] ) > 63){
        $SESSIONID = $_GET['apptoken'];
       
    }else if(isset($_POST['apptoken']) && strlen($_POST['apptoken'] ) > 63){
        $SESSIONID = $_POST['apptoken'];
        
    }else if(isset( $_COOKIE['apptoken']) && strlen($_COOKIE['apptoken'] ) > 63){
        $SESSIONID = $_COOKIE['apptoken'];
        $SESSIONIDMK = true;
     
    }else{
        $SESSIONIDMK = true;
        $SESSIONID = md5(rand(1,9999999).microtime()).md5( rand(1,9999999).sha1( microtime()));
    }

    if( strstr( $ELiHttp , $ELiConfig['houzui'].'&') !== false ){
        $URI = str_replace( $ELiConfig['houzui'].'&' , $ELiConfig['houzui'].'?', $ELiHttp);
    }else{
        $URI = $ELiHttp;
    }

    $URI  = ltrimE( str_replace( array( '//' , trimE( $_SERVER['SCRIPT_NAME'] , '/' ) ), array( '/' , '' ) , $URI ) , $ELiConfig['dir'] );
    $TURI = explode( '?' , ltrimE( $URI ,'?'));
    $URI  = trimE( $TURI['0'] , '/');
    $URI = str_replace( '..','', $URI);
    $URI = rtrimE($URI,$ELiConfig['houzui']);
    if( $URI == '' && $ELiConfig['iscms'] != 1 ){
        $URI = $ELiConfig['object'];
    }
    $URI = str_replace( '&' ,'?', $URI);
    if(!$URI){
        $URI = "";
    }
    $HTTP = explode( $ELiConfig['fenge'] , $URI);
    $YHTTP = $HTTP;
    if( $HTTP['0'] == $ELiConfig['Plus']){
        unset($HTTP['0']);
        unset($YHTTP['0']);
        $Plus = isset( $HTTP['1']) ? ELiSecurity( $HTTP['1']):ELiSecurity( $ELiConfig['object']);
        $ClassFunc = isset( $HTTP['2']) ? $HTTP['2']:$ELiConfig['behavior'];
        if(isset( $HTTP['1']) ){
            unset($HTTP['1']);
        }
        if(isset( $HTTP['2']) ){
            unset($HTTP['2']);
        }
    }else if( $ELiConfig['iscms'] == 1){

        if(!isset($HTTP['0']) || $HTTP['0'] == "" ){
            $Plus = ELiSecurity($ELiConfig['object']);
            $ClassFunc = $ELiConfig['behavior'];
        }else{
            $Plus = ELiSecurity($ELiConfig['object']);
            $ClassFunc = $HTTP['0'];
            unset($HTTP['0']);
        }
    }else{
        if(!isset($HTTP['0'])){
            $HTTP['0'] = ELiSecurity($ELiConfig['object']);
        }else  if(  strstr( $HTTP['0'], '?') !== false  ){
            $fan = explode( '?' , $HTTP['0'] );
            $HTTP['0'] = $fan['0'];
            $HTTP['1'] = $ELiConfig['behavior'];
        }
        if(!isset($HTTP['1'])){
            $HTTP['1'] = $ELiConfig['behavior'];
        }else  if(  strstr( $HTTP['1'], '?') !== false  ){
            $fan = explode( '?' , $HTTP['1'] );
            $HTTP['1'] = $fan['0'];
        }
        $Plus = ELiSecurity($HTTP['0']);
        $ClassFunc = $HTTP['1'];
        unset($HTTP['0']);
        unset($HTTP['1']);
    }
    $CANSHU = array();
    foreach($HTTP as $qita){
        $CANSHU[] = $qita;
    }
    $Plus = strtolower($Plus);
    $ClassFunc = strtolower($ClassFunc);
    ELiLoad($Plus);
    $GLOBALS['plugin'] = $Plus;
    $GLOBALS['pluginurl'] = $ELiConfig['dir']."Tpl/".$Plus.'/';
    $features = [];
    try{
        $features = ELiplus($Plus);
    }catch(Exception $e) {
        $features = [];
    }
    if( strstr(  $ELiConfig['whitelist'] ,$Plus   ) === false ){
        if( $ELiConfig['object']  != $Plus && ( !$features || $features['off'] == "0" ) ){
            ELiError( "Plugin closed");
        }
    }
    ob_clean();
    ELicall($Plus,$ClassFunc,$CANSHU,$features,false );
    $hhh = ob_get_contents();
    if($hhh && $hhh != ""){
        return new Response(
            200,
            ($SESSIONIDMK && $ELiConfig['sessionSafety'] ?["Set-Cookie" =>"apptoken=".$SESSIONID.";HttpOnly;path=/;Expires=". gmdate('D, d M Y H:i:s \G\M\T',time() + $ELiConfig['sessiontime']),"Access-Control-Allow-Origin"=>"*"]:["Access-Control-Allow-Origin"=>"*"])
            ,
            $hhh 
        );
    }else{

        if($GLOBALS['isend']){
        
            return "";
        }
        
        return new Response(
            200,
            ($SESSIONIDMK&& $ELiConfig['sessionSafety']?["Set-Cookie" =>"apptoken=".$SESSIONID.";HttpOnly;path=/;Expires=". gmdate('D, d M Y H:i:s \G\M\T',time() + $ELiConfig['sessiontime']),"Access-Control-Allow-Origin"=>"*"]:["Access-Control-Allow-Origin"=>"*"])
            ,
            '{"code":-1,"data":[],"msg":"no center"}'
        );
    }
    
}