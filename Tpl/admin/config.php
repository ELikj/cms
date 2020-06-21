<?php if( !defined( 'ELikj')){ exit( 'Error ELikj'); }
$shiba = false;
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
$db = db('config');
$where = [];
$kongzhi = isset($CANSHU['1'])?$CANSHU['1']:'get';
if($kongzhi == 'get'){
    $page = (int)(isset($_GET['page'])?$_GET['page']:1);
    $limitx = (int)(isset($_GET['limit'])?$_GET['limit']:10);
    if($limitx < 10 ){
        $limitx = 10;
    }else if($limitx > 100 ){
        $limitx = 100;
    }
    $limit = Limit($limitx,$page);
    $data = $db ->where($where)->limit($limit)->order('id desc')->select();
    $total = $db ->where($where)-> total();
    if(!$data){
        $data = [];
    }
    $kuozhan = [ 'count'=> (int)$total ];
    return echoapptoken($data,0,'',$SESSIONtoken,$kuozhan);

}else if($kongzhi == 'put'){
    $id = (int)(isset($_POST['id'])?$_POST['id']:0);
    $data = $db ->where(['id' => $id])->find();
    if(!$data){
        return echoapptoken([],-1,'id不存在',$SESSIONtoken);
    }
    $update = [ 
        'name'=>ELixss($_POST['name'])
    ];
    $update['data'] = implode(',',$_POST['data']);
    
    $fan = $db ->where(['id' => $id])->update($update);
    if($fan){
        config($data['type'] ,1,$db  );
        ELilog('adminlog',$_SESSION['adminid'],3,[ 'yuan'=>$data,'data'=> $update],'config');
        return echoapptoken($update,1,'修改成功',$SESSIONtoken);
    }else{
        return echoapptoken([],-1,'修改失败',$SESSIONtoken);
    }

}else if($kongzhi == 'add'){
    $_POST['type'] =  ELixss($_POST['type']);
    $data = $db ->where(['type' => $_POST['type'] ])->find();
    if($data){
        return echoapptoken([],-1,'标识已经存在',$SESSIONtoken);
    }
    $insert = [];


    $insert = [ 
        'name'=>ELixss($_POST['name']),
        'type'=>$_POST['type'],
    ];
    $insert['data'] = implode(',',$_POST['data']);
    $fan = $db ->insert($insert);
    if($fan){
        
        ELilog('adminlog',$_SESSION['adminid'],4,$insert,'config');
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
        config($data['type'] ,2,$db  );
        ELilog('adminlog',$_SESSION['adminid'],5,$data,'config');
        return echoapptoken([],1,'删除成功',$SESSIONtoken);
    }else{
        return echoapptoken([],-1,'删除失败',$SESSIONtoken);
    }

}


return echoapptoken([],1,'ok',$SESSIONtoken);