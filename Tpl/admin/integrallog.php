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
$db = db('integrallog');
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
    if(isset($_GET['pluginid']) && $_GET['pluginid'] != ""){
        $chushi = false; 
        $where['pluginid'] = $_GET['pluginid'];
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
    if(isset($_GET['shuaxin']) && $_GET['shuaxin'] != ""){
        $chushi = false; 
    }

    

    $data = $db ->where($where)->limit($limit)->order('id desc')->select();
    $total = $db ->where($where)-> total();
    if(!$data){
        $data = [];
    }
    $huancong = [];
    foreach($data as $k =>$v){

        if(! isset( $huancong[$v['pluginid']] )){
            $fan = ELiplus($v['pluginid']);
            if($fan){
                $huancong[$v['pluginid']] =  $fan['configure']['integrallog']??[];
            }else{
                $huancong[$v['pluginid']] = [];
            }
        }

        if(isset($huancong[$v['pluginid']][$v['type']] )){
            $typename =  $huancong[$v['pluginid']][$v['type']];
        }else{
            $typename = $v['type'];
        }
           
        

        $data[$k]['typename'] = $typename;
    }   
    $kuozhan = [ 'count'=> (int)$total ];
    if($page <=1 && $chushi){
        $kuozhan = [ 
            'count'=> (int)$total
            ,'diyici'=>1
        ];
    }

    if($where && $page <=1 ){
        $fan =  $db ->qurey("select sum(num)as jine from ".$db->biao()." ".$db->wherezuhe($where));
        $kuozhan['jine']= (float)$fan['jine'];
      }
    return echoapptoken($data,0,'',$SESSIONtoken,$kuozhan);

}else if($kongzhi == 'put'){

   

}else if($kongzhi == 'add'){
    $key = ELixss($_POST['key']);
    $fan = ELiplus($key);
    $data =[];
    $code = -1;
    if($fan){
       
        $data =$fan['configure']['integrallog']??[];
        if($data){
            $code = 1;
        }
    }

    return echoapptoken($data,$code,'ok',$SESSIONtoken);
}else if($kongzhi == 'del'){

}
return echoapptoken([],1,'ok',$SESSIONtoken);