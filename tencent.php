<?php
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
//腾讯云函数计算 需要改造接受数据
define("Residentmemory",true);
define("ELiTempPath","/tmp/");
define( 'WWW', dirname(__FILE__).'/');

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
        $file = trim($filex_['1']);
        $name = trim(trim($name_['2']),'"');
        $type_ =  explode('Content-Type:',$bodyzi['2']);
        if(!isset($type_['1'])){
            continue ;
        }
        
        $type = trim($type_['1']);
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

include "index.php";
$GLOBALS['isend'] = false;
function main_handler($request, $context){
    ob_clean();
    global $ELiConfig,$ELiHttp,$ELiDataBase,$ELiMem, $ELiMemsession,$SESSIONID,
    $LANG,$CANSHU,$features,$URI,$Composer,$HTTP,$YHTTP,$Plus,$ClassFunc,$REQUEST,$SESSIONIDMK,$POSTBODY;
    
    $_POST = []; 
    $_GET = [];
    $_FILES = [];
    $_COOKIE = [];
    $queries    = (array)($request->queryString??[]);
    $headers    = (array)($request->headers??[]);
    $POSTBODY = $body = $request->body?? "";
    $path       = ltrim( $request->path??"" , $request->requestContext->path??"");
    $GLOBALS['ip'] = $request->requestContext->sourceIp??"";
    $ELiHttp = ltrim( rawurldecode( trim( $path )),'/');
    $_SERVER['HTTP_USER_AGENT'] =  $headers['user-agent'];
    $GLOBALS['isend'] = false;
    if($body != ""){
       parse_raw_http_request($body,$headers ['content-type']);
    }
    if($queries){
        $_GET = $queries;
    }
    if( isset($headers['cookie'])){
        $headerscookie = toget($headers['cookie']);
   
        foreach($headerscookie as $k => $v ){
            $_COOKIE[trim($k)] = trim($v);
        }
    }
    $ELiHttp = ltrim( urldecode( trim($path)),'/');
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
    }else{
        $SESSIONIDMK = true;
        $SESSIONID = md5(rand(1,9999999).microtime()).md5( rand(1,9999999).sha1( microtime()));
    }

    if( strstr( $ELiHttp , $ELiConfig['houzui'].'&') !== false ){
        $URI = str_replace( $ELiConfig['houzui'].'&' , $ELiConfig['houzui'].'?', $ELiHttp);
    }else{
        $URI = $ELiHttp;
    }
    $URI  = ltrim( str_replace( array( '//' , trim( $_SERVER['SCRIPT_NAME'] , '/' ) ), array( '/' , '' ) , $URI ) , $ELiConfig['dir'] );
    $TURI = explode( '?' , ltrim( $URI ,'?'));
    $URI  = trim( $TURI['0'] , '/');
    $URI = str_replace( array($ELiConfig['houzui'],'..') , array('',''), $URI);
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
    ELicall($Plus,$ClassFunc,$CANSHU,$features,false );
    $hhh = ob_get_contents();
    return json_decode($hhh,true);
}