<?php if( !defined( 'ELikj')){ exit( 'Error ELikj'); }

$FTIME = 120;
$_SESSION = ELihhGet();


$username = isset($_POST['username'])?$_POST['username']:"";
$password = isset($_POST['password'])?$_POST['password']:"";
$vercode = isset($_POST['vercode'])?$_POST['vercode']:"";
$token = isset($_POST['token'])?$_POST['token']:"";
$FAN = ELichar([
    'username#len#2-30#账号格式错误[ # ]位',
    'password#len#6-30#密码格式错误[ # ]位',
    'vercode#len#4#验证码格式错误#位',
    'token#=#'.($_SESSION['token']??uuid()) .'#安全验证失败#',
    'vercode#=#'.($_SESSION['code']??uuid()).'#验证码错误#',
]);

$_SESSION['token'] =  (uuid());
ELihhSet('token',$_SESSION['token']);
if( $FAN['code'] == '0'){
    return echoapptoken([],-1,$FAN['msg'],$_SESSION['token']);
} 

$db = db('admin');
$IP = ip();
$DATA = $db ->where(['account' => $username])->find();
$safhash1 = 'adminfind/'.$IP;
$jishu = $ELiMem->g($safhash1);
if($jishu && $jishu > 3){
    return echoapptoken([],-1,"账号不存在",$_SESSION['token']);
}
if(!$DATA){
    $ELiMem->ja($safhash1,1,$FTIME);
    return echoapptoken([],-1,"账号不存在",$_SESSION['token']);
}
if( $DATA['off'] != 1 ){
    
    $ELiMem->ja($safhash1,1,$FTIME);
    return echoapptoken([],-1,"账号关闭",$_SESSION['token']);
}
if( $DATA['password'] != ELimm($password) ){
    
    $ELiMem->ja($safhash1,1,$FTIME);
    return echoapptoken([],-1,"密码错误",$_SESSION['token']);
}
if($jishu){
    $ELiMem->d($safhash1);
}

$iphash = 'adminip/'.$DATA['id'];
$_SESSION['adminid'] = $DATA['id'];

ELihhSet('adminid',$DATA['id']);
ELihhSet('groups',$DATA['groups']);
$ELiMem ->s($iphash,$IP);
$json = $_SESSION;
unset($json['token']);
if(isset( $_SESSION['adminquanxian'])){
    unset($json['adminquanxian']);
}
$db ->where(['id' => $DATA['id'] ])->update(['ip'=>$IP,'atime'=>time(),'sessionid'=>$SESSIONID]);
adminid($_SESSION['adminid'],1);
$hash = 'safetoken/'.$_SESSION['adminid'];
$SESSIONtoken =  $_SESSION['token'];
$ELiMem ->s($hash,$SESSIONtoken);
ELilog('adminlog',$DATA['id'],0,"",'login');
$json['adminmen'] = $THIS->groupscaidan($DATA['groups']);
$json['admininame'] = $DATA['account'];
$json['admingroupsname'] = $THIS->Groupsid($DATA['groups']);
return echoapptoken($json,0,"",$_SESSION['token']);