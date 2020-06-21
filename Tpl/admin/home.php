<?php if( !defined( 'ELikj')){
    exit( 'Error ELikj'); 
}
global $ELiMem;
$_SESSION['token'] =  (uuid());
ELihhSet('token',$_SESSION['token']);
if( isset($_SESSION['adminid']) && $_SESSION['adminid'] > 0 ){
        $ADMIN = adminid($_SESSION['adminid']);
        $_SESSION['adminmen'] = $THIS->groupscaidan($ADMIN['groups']);
        $json = $_SESSION;
        $json['admininame'] = $ADMIN['account'];
        $json['admingroupsname'] = $THIS->Groupsid($ADMIN['groups']);
        unset($json['token']);
        $hash = 'safetoken/'.$_SESSION['adminid'];
        $SESSIONtoken =  $_SESSION['token'];
        $ELiMem ->s($hash,$SESSIONtoken);
        return echoapptoken($json,0,"",$_SESSION['token']);
}else{
        return echoapptoken($SESSIONID,99,'',$_SESSION['token']);
}