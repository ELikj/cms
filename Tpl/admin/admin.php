<?php if( !defined( 'ELikj')){
    exit( 'Error ELikj'); 
}
// get put add del
$shiba = false;
ELis('fangyu');
$hash = 'safetoken/'.  $_SESSION['adminid'];
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
$db = db('admin');
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
    $data = $db ->paichu('password')->where($where)->limit($limit)->order('id desc')->select();
    $total = $db ->where($where)-> total();
    if(!$data){
        $data = [];
    }
    $kuozhan = [ 'count'=> (int)$total ];
    if($page <=1){
        $kuozhan = [
            'count'=> (int)$total ,
            'verifyip'=>$features['configure']['verifyip'],
            'off'=>$features['configure']['off'],
            'groups'=>$THIS->groups($db)
        ];
    }
        
    return echoapptoken($data,0,'',$SESSIONtoken,
    $kuozhan  
    );
}else if($kongzhi == 'put'){

    $id = (int)(isset($_POST['id'])?$_POST['id']:0);
    $data = $db ->where(['id' => $id])->find();
    if(!$data){
        return echoapptoken([],-1,'id不存在',$SESSIONtoken);
    }
    $update = [
        'groups'=>(int)$_POST['groups'],
        'off'=>(int)$_POST['off'],
        'verifyip'=>(int)$_POST['verifyip'],
    ];

    if($data['id'] == $_SESSION['adminid']){
        $update['off'] = 1;
    }

    if( isset( $_POST['password']) && $_POST['password'] != ""){
        $update['password'] = ELimm($_POST['password']);
    }

    if( isset( $_POST['sessionid']) && $_POST['sessionid'] != ""){
        $update['sessionid'] = ELimm(uuid());
    }
    $fan = $db ->where(['id' => $id])->update($update);
    if($fan){
        $huoqu = $db ->where(['off'=>1,'groups' =>'0'])-> find();
        if(!$huoqu){
            $update['off'] = 1;
            $update['groups'] = 0;
            $db ->where(['id' => $id])->update($update);
        }
        adminid($id,1);

        ELilog('adminlog',$_SESSION['adminid'],3,[ 'yuan'=>$data,'data'=> $update],'admin');

        return echoapptoken($update,1,'修改成功',$SESSIONtoken);
    }else{
        return echoapptoken([],-1,'修改失败',$SESSIONtoken);
    }

}else if($kongzhi == 'add'){
    $account = isset($_POST['account'])?$_POST['account']:"";
    $password = isset($_POST['password'])?$_POST['password']:"";
    $groups = (int)(isset($_POST['groups'])?$_POST['groups']:0);
    $verifyip = (int)(isset($_POST['verifyip'])?$_POST['verifyip']:0);
    $off = (int)(isset($_POST['off'])?$_POST['off']:0);
    $FAN = ELichar([
        'account#len#2-30#账号格式错误[ # ]位',
        'password#len#6-30#密码格式错误[ # ]位',
        
    ]);
    if( $FAN['code'] == '0'){
        return echoapptoken([],-1,$FAN['msg'],$SESSIONtoken);
    }
    $data = $db ->where(['account' => $account])->find();
    if($data){
        return echoapptoken([],-1,'账号已存在',$SESSIONtoken);
    }
    $insert = [
        'account'=>$account,
        'password'=>ELimm($password),
        'groups'=>$groups,
        'verifyip'=>$verifyip,
        'off'=>$off,
        'ip'=>ip(),
        'atime'=>time()
    ];
    $fan = $db ->insert($insert);
    if($fan){
        ELilog('adminlog',$_SESSION['adminid'],4,$insert,'admin');
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
    $huoqu = $db ->where(['off'=>1,'groups' =>'0'])-> select();
    if(!$huoqu){
        return echoapptoken([],-1,'管理稀少无法删除',$SESSIONtoken);
    }

    if(count($huoqu) == 1){
        if($huoqu['0']['id'] == $id){
            return echoapptoken([],-1,'管理稀少无法删除',$SESSIONtoken);
        }
    }
    $fan = $db ->where(['id' => $id])->delete();
    if($fan){
        adminid($id,2);
        ELilog('adminlog',$_SESSION['adminid'],5,$data,'admin');
        return echoapptoken([],1,'删除成功',$SESSIONtoken);
    }else{
        return echoapptoken([],-1,'删除失败',$SESSIONtoken);
    }
}
return echoapptoken([],1,'ok',$SESSIONtoken);