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
$db = db('adminlog');
$where  = [];
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

    $chushi = true; 

    if(isset($_GET['type']) && $_GET['type'] != ""){
        $chushi = false; 
        $where['type'] = (int)$_GET['type'];
    }
    if(isset($_GET['uid']) && $_GET['uid'] != ""){
        $chushi = false; 
        $where['uid'] = (int)$_GET['uid'];
    }
    if(isset($_GET['controller']) && $_GET['controller'] != ""){
        $chushi = false; 
        $where['controller'] = $_GET['controller'];
    }
    if(isset($_GET['mode']) && $_GET['mode'] != ""){
        $chushi = false; 
        $where['mode'] = $_GET['mode'];
    }
    if(isset($_GET['ip']) && $_GET['ip'] != ""){
        $chushi = false; 
        $where['ip'] = $_GET['ip'];
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
        $kuozhan = [
            'count'=> (int)$total,
            'type' =>$features['configure']['adminlogtype']??[]
        ];
    }
    return echoapptoken($data,0,'',$SESSIONtoken,$kuozhan);

}else if($kongzhi == 'put'){

}else if($kongzhi == 'add'){

}else if($kongzhi == 'del'){

}
return echoapptoken([],1,'ok',$SESSIONtoken);