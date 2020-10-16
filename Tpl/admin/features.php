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
$where=[];
$db = db('features');
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

    $yiinstall = [];
    foreach($data as $id=>$vvvv){

        $data[$id]['configure'] = json_decode($vvvv['configure']);
        $data[$id]['menuconfig'] = json_decode($vvvv['menuconfig']);
        
        if(is_file( ELikj.'Controller/'.$vvvv['pluginid'].".Class.php")){
            $yiinstall[ $vvvv['pluginid'] ] = $vvvv['pluginid'];
        }
    }


    $kuozhan = [ 'count'=> (int)$total ];
    if($page <=1){
        $kuozhan = [
            'count'=> (int)$total ,
            'off'=>$features['configure']['off2']??[]
        ];
        $dir = ELikj.'Controller/';
        $ds = DIRECTORY_SEPARATOR;
        $dir = substr( $dir, -1 ) == $ds ? substr( $dir, 0, -1) : $dir;
        if (is_dir( $dir ) && $handle = opendir( $dir )){
            while ( $file = readdir( $handle )){
                if ( $file == '.' || $file == '..'){
                    continue;
                }elseif ( is_dir( $dir . $ds . $file)){
                    continue;
                }else{
                    
                    if( strpos( $file,".Class.php") !== false){
                        $hhh = str_replace( ".Class.php","",$file);
                        if(isset( $yiinstall[$hhh] )){
                            unset( $yiinstall[$hhh] );
                        }else{
                            $yiinstall[$hhh]  = $hhh;
                        }
                    }
                }
            }
            closedir( $handle );
        }
        $kuozhan['install'] = $yiinstall;

    }
    
    return echoapptoken($data,0,'',$SESSIONtoken,$kuozhan);

}else if($kongzhi == 'put'){

    $id = (int)(isset($_POST['id'])?$_POST['id']:0);
    $data = $db ->where(['id' => $id])->find();
    if(!$data){
        return echoapptoken([],-1,'id不存在',$SESSIONtoken);
    }

    $update = [
        'off'=>(int)$_POST['off'],
        'authorizedkey'=>ELixss($_POST['authorizedkey']),
    ];
    $update['name'] = ELixss($_POST['name']);
    $update['typeico'] = ELixss($_POST['typeico']);
    $update['type'] = ELixss($_POST['type']);
    $update['callfunction'] = ELixss($_POST['callfunction']);
    $update['authorizedid'] = ELixss($_POST['authorizedid']);
    $update['authorizedkey'] = ELixss($_POST['authorizedkey']);
    $update['display'] = (int)$_POST['display'];
    $update['main'] = (int)$_POST['main'];
 
    $configure = [];
    $menuconfig = [];
    foreach($_POST as $k=>$v){
        if( strpos(  $k, "configure_") !== false){
            $k = str_replace(array('[',']'),array('_',''),$k);
            $zuhe = explode('_',$k);
            $configure[$zuhe['1']] = $v;
            

        }
    }
    
    $update['menuconfig'] =  $_POST["menuconfig"];
    $update['configure'] = json_encode($configure,JSON_UNESCAPED_UNICODE);
    $fan = $db ->where(['id' => $id])->update($update);
    if($fan){
        
 
        ELiplus( $data ['pluginid'],1,$db);
        ELilog('adminlog',$_SESSION['adminid'],3,[ 'yuan'=>$data,'data'=> $update],'features');
        $update['menuconfig'] = json_decode($update['menuconfig']);
        $update['configure'] = $configure;
        return echoapptoken($update,1,'修改成功',$SESSIONtoken);
    }else{
        return echoapptoken([],-1,'修改失败',$SESSIONtoken);
    }
  


}else if($kongzhi == 'add'){

    if( isset($_POST['beninstall']) && $_POST['beninstall'] != ""){
        //初始安装
        $data = $db ->where(['pluginid' => $_POST['beninstall'] ])->find();
        if($data){
            return echoapptoken([],-1,'插件以安装',$SESSIONtoken);
        }
        
        $fan = callELi( $_POST['beninstall'] ,"INSTALL",array(), array(),false);

        if($fan === true){
            return echoapptoken([],1,'插件安装成功',$SESSIONtoken);
        }else{
            return echoapptoken([],-1,$fan,$SESSIONtoken);
        }
        
    }

    $_POST['pluginid'] = strtolower(trim( ELixss($_POST['pluginid']??"")));
    if($_POST['pluginid'] == ""){
        return echoapptoken([],-1,'插件标识不能唯空',$SESSIONtoken);
    }
    $data = $db ->where(['pluginid' => $_POST['pluginid'] ])->find();
    if($data){
        return echoapptoken([],-1,'插件标识已经存在',$SESSIONtoken);
    }



    $insert = [
        'atime'=>time(),
        'pluginid'=>ELixss($_POST['pluginid']),
        'name'=>ELixss($_POST['name']),
        'describes'=>ELixss($_POST['describes']),
        'type'=>ELixss($_POST['type']),
        'typeico'=>ELixss($_POST['typeico']),
        'author'=>ELixss($_POST['author']),
        'authorlink'=>ELixss($_POST['authorlink']),
        'version'=>ELixss($_POST['version']),
        'branch'=>ELixss($_POST['branch']),
        'off'=>ELixss($_POST['off']),
        'authorizedid'=>ELixss($_POST['authorizedid']),
        'authorizedkey'=>ELixss($_POST['authorizedkey']),
        'display'=>ELixss($_POST['display']),
        'callfunction'=>ELixss($_POST['callfunction']),
        'main'=>(int)$_POST['main']
    ];


    $configure = [];
    $menuconfig = [];
    foreach($_POST as $k=>$v){
        if( strpos(  $k, "configure_") !== false){
            $k = str_replace(array('[',']'),array('_',''),$k);
            $zuhe = explode('_',$k);
            $configure[$zuhe['1']] = $v;
        }
    }
  
    $insert['menuconfig'] = $_POST["menuconfig"];
    $insert['configure'] = json_encode($configure);
    $fan = $db ->insert($insert);
    if($fan){
        ELiplus( $insert['pluginid'],1,$db);
        ELilog('adminlog',$_SESSION['adminid'],4,$insert,'features');
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
    $zuhe =  ELikj.'Controller/'.$data ['pluginid'].'.Class.php';
    if($data ['pluginid'] == 'admin'){
        return echoapptoken([],-1,'禁止删除 管理插件',$SESSIONtoken);
    }

    if(is_file($zuhe)){
        return echoapptoken([],-1,'请先删除插件文件 Controller/'.$data ['pluginid'].'.Class.php',$SESSIONtoken);
    }
    
    $fan = $db ->where(['id' => $id])->delete();
    if($fan){
        ELiplus( $data ['pluginid'],2,$db);
        ELilog('adminlog',$_SESSION['adminid'],5,$data,'features');
        return echoapptoken([],1,'删除成功',$SESSIONtoken);
    }else{
        return echoapptoken([],-1,'删除失败',$SESSIONtoken);
    }
}
return echoapptoken([],1,'ok',$SESSIONtoken);