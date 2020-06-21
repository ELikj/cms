<?php if( !defined( 'ELikj')){ exit( 'Error ELikj'); }
$shiba = false;
$plusfunction = 'plist';
$hash = 'safetoken/'.$_SESSION['adminid'];
$SESSIONtokenx = $SESSIONtoken = $ELiMem ->g($hash);
if( trim($CANSHU['0']) != $SESSIONtokenx){
    $shiba = true;
}
$SESSIONtoken =  (uuid());
$ELiMem ->s($hash,$SESSIONtoken);
if( $shiba ){
    return echoapptoken([],-1,"安全验证失败",$SESSIONtoken);
}

$kongzhi = isset($CANSHU['1'])?$CANSHU['1']:'get';
$db = db('xgame_list');
$where  = [];
if($kongzhi == 'get'){

    $page = (int)(isset($_GET['page'])?$_GET['page']:1);
    $limitx = (int)(isset($_GET['limit'])?$_GET['limit']:10);
    if($limitx < 10 ){
        $limitx = 10;
    }else if($limitx > 100 ){
        $limitx = 100;
    }
    $limit = Limit($limitx,$page);
    $chushi = true;

    if(isset($_GET['type']) && $_GET['type'] != ""){
        $chushi = false; 
        $where['off'] = (int)$_GET['type'];
    }
    if(isset($_GET['uid']) && $_GET['uid'] != ""){
        $chushi = false; 
        $where['uid'] = (int)$_GET['uid'];
    }
    if(isset($_GET['name']) && $_GET['name'] != ""){
        $chushi = false; 
        $where['name'] = $_GET['name'];
    }
    if(isset($_GET['mark']) && $_GET['mark'] != ""){
        $chushi = false; 
        $where['mark'] = $_GET['mark'];
    }

    if(isset($_GET['atimestart']) && $_GET['atimestart'] != ""){
        $chushi = false; 
        $where['atime >'] =strtotime($_GET['atimestart']);
    }
    if(isset($_GET['atimeend']) && $_GET['atimeend'] != ""){
        $chushi = false; 
        $where['atime <'] =strtotime($_GET['atimeend']);
    }
    $data = $db ->where($where)->limit($limit)->order('id desc')->select();
    $total = $db ->where($where)-> total();
    if(!$data){
        $data = [];
    }
    $kuozhan = [ 'count'=> (int)$total ];

    if($page <=1 && $chushi){
        $kuozhan = ['count'=> (int)$total];
        $kuozhan['off'] = $features['configure']['off'];
        $kuozhan['type'] = $features['configure']['type']??[];
    }

    return echoapptoken($data,0,'',$SESSIONtoken,$kuozhan );

}else if($kongzhi == 'put'){

    $id = (int)(isset($_POST['id'])?$_POST['id']:0);
    $data = $db ->where(['id' => $id])->find();
    if(!$data){
        return echoapptoken([],-1,'id不存在',$SESSIONtoken);
    }
    
    unset($_POST['id']);
    unset($_POST['atime']);

    if($data['mark'] != $_POST['mark']){
        $fan = $db ->where(['mark' => $_POST['mark'] ])->find();
        if($fan){
            return echoapptoken([],-1,'应用标识重复',$SESSIONtoken);
        }

    }
  
    $_POST['xtime'] = time();
    $_POST['adminid'] = $_SESSION['adminid'];
  
    $fan = $db ->where(['id' => $id])->update($_POST);
    if($fan){
    
        Ailog('adminlog',$_SESSION['adminid'],3,[ 'yuan'=>$data,'data'=> $_POST],$plusfunction);
        return echoapptoken($_POST,1,'修改成功',$SESSIONtoken);
    }else{
        return echoapptoken([],-1,'修改失败',$SESSIONtoken);
    }

}else if($kongzhi == 'add'){
    $fan = $db ->where(['mark' => $_POST['mark'] ])->find();
    if($fan){
        return echoapptoken([],-1,'应用标识重复',$SESSIONtoken);
    }

    $_POST['atime'] = time();
    $_POST['adminid'] = $_SESSION['adminid'];
    $fan = $db ->insert($_POST);
    if($fan){

        Ailog('adminlog',$_SESSION['adminid'],4,$_POST,$plusfunction);
        return echoapptoken([],1,'新增成功',$SESSIONtoken);
    }else{
        return echoapptoken([],-1,'新增失败',$SESSIONtoken);
    }



}else if($kongzhi == 'del'){

    $id = (int)(isset($_POST['id'])?$_POST['id']:0);
    $data = $db ->where(['id' => $id])->find();
    if(!$data){
        return echoapptoken([],-1,'id不存在',$SESSIONtoken);
    }
  
    $fan = $db ->where(['id' => $id])->delete();
    if($fan){
        
        Ailog('adminlog',$_SESSION['adminid'],5,$data,$plusfunction);
        return echoapptoken([],1,'删除成功',$SESSIONtoken);
    }else{
        return echoapptoken([],-1,'删除失败',$SESSIONtoken);
    }

}
return echoapptoken([],1,'ok',$SESSIONtoken);