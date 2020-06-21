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
$db = db('user');
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

    if(isset($_GET['uid']) && $_GET['uid'] !=""){
        $where['id']= $_GET['uid'];
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

    $baoliu = [
        'id'=>'id',
        'recharge'=>'recharge',
        'money'=>'money',
        'integral'=>'integral',
        'currency'=>'currency',
        'regip'=>'regip',
        'regtime'=>'regtime',
    ];

    $update = $_POST;
    foreach($baoliu as $v){
        if(isset( $update[$v])){
            unset($update[$v]);
        }
    }
    if($data['superior0'] != '0'){
        unset($update['superior0']);
    }else{
        $sanji = uid($update['superior0']);
        if($sanji){
            for($i = 0; $i < $ELiConfig['superior'];$i++){
                if($i == 0){
                    $update['superior'.$i] = $channelid ;
                }else{
                    $zu = $i-1;
                    if(!isset($sanji['superior'.$zu ]) || $sanji['superior'.$zu ] < 1){
                        break ;
                    }
                    $update['superior'.$i] = $sanji['superior'.$zu];
                }
            }
        }
    }
    if(isset( $update['super'] ) &&  $update['super'] != ""){
        $update['super']  = ELimm($update['super'] );
    }

    $fan = $db ->where(['id' => $id])->update($update);
    if($fan){
        uid($id,1);
        ELilog('adminlog',$_SESSION['adminid'],3,[ 'yuan'=>$data,'data'=> $update],'user');
        return echoapptoken($update,1,'修改成功',$SESSIONtoken);
    }else{
        return echoapptoken([],-1,'修改失败',$SESSIONtoken);
    }

}else if($kongzhi == 'add'){
   
    $baoliu = [
        'id'=>'id',
        'recharge'=>'recharge',
        'money'=>'money',
        'integral'=>'integral',
        'currency'=>'currency',
        'regip'=>'regip',
        'regtime'=>'regtime',

    ];
 
    $insert = $_POST;

   

    foreach($baoliu as $v){
        if(isset( $insert[$v])){
            unset($insert[$v]);
        }
    }
    if($insert['superior0'] > 0){
        $sanji = uid($insert['superior0']);
        if($sanji){
            for($i = 0; $i < $ELiConfig['superior'];$i++){
                if($i == 0){
                    $insert['superior'.$i] = $channelid ;
                }else{
                    $zu = $i-1;
                    if(!isset($sanji['superior'.$zu ]) || $sanji['superior'.$zu ] < 1){
                        break ;
                    }
                    $insert['superior'.$i] = $sanji['superior'.$zu];
                }
            }
        }
    }
    $insert['regip'] = ip();
    $insert['regtime'] = time();

    if(isset( $insert['super'] ) &&  $insert['super'] != ""){
        $insert['super']  = ELimm($insert['super'] );
    }
    $insert['security'] = md5( uuid() );
    $fan = $db ->insert($insert);
    if($fan){

        ELilog('adminlog',$_SESSION['adminid'],4,$insert,'user');
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
        uid($id ,2,$db  );
        ELilog('adminlog',$_SESSION['adminid'],5,$data,'user');
        return echoapptoken([],1,'删除成功',$SESSIONtoken);
    }else{
        return echoapptoken([],-1,'删除失败',$SESSIONtoken);
    }

}


return echoapptoken([],1,'ok',$SESSIONtoken);