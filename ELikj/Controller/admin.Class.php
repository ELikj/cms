<?php if( !defined( 'ELikj')){ exit( 'Error ELikj'); }
/* ******************************************
 * 系统名称：以厘建站系统
 * 版权所有：成都市以厘科技有限公司 www.eLikj.com
 * 代码协议：开源代码协议 Apache License 2.0 详见 http://www.apache.org/licenses/
 * 特别申明：本软件不得用于从事违反所在国籍相关法律所禁止的活动， 
 * 对于用户擅自使用本软件从事违法活动不承担任何责任
 * ******************************************
*/
//函数名字第一个大写 内部调用 其他可以外部调用
//不受大小写 callELi 调用
//private public  plugin pluginurl
/*
    adminlog  0登陆 1退出 2 挤掉  3 修改 4 插入 5 删除
*/
class ELikj_admin{
    //public
    //private
    //plugin
    //pluginurl
    public  $plugin = "admin";

    function makejs($CANSHU,$features){

        
        if(! ELihhGet('adminid')){
            return echoapptoken([],-1,"login","");
        }   
        $table = trim($CANSHU['0']??"");
        if($table != ""){

            global $ELiConfig,$ELiDataBase;
            $db = db($table);
        
            $DATA = $db ->qurey("select * from information_schema.columns where table_schema='".ELiSecurity($ELiDataBase[$ELiConfig['dbselect']]['database'])."' and table_name ='".$db->biao()."';","erwei");
            if($DATA){
                $hh = [];
                foreach($DATA as $shuju){
                    $hh[$shuju['COLUMN_NAME']] = "'".$shuju['COLUMN_NAME']."($$)".$shuju['COLUMN_COMMENT']."($$)text($$)($$)".$shuju['COLUMN_COMMENT']."($$)' + D.".$shuju['COLUMN_NAME'];

                }
                $hhbv = [];
                $jsson = [];
                foreach($db->tablejg['1'] as $k =>$v){
                    if($v != "auto_increment"){
                        $hhbv[] = $hh[$k];
                        $jxi = explode("_",$v);
                        $jsson[$k] =end($jxi );
                    }else{
                        $jsson[$k] =0;
                    }
                    
                }
                echo "<pre>";
                echo  implode(",\n",$hhbv);
                echo "\n";
                echo json_encode( $jsson);
                echo "</pre>";
            }
        }

       
    }

    function quite($CANSHU,$features){
        ELilog('adminlog',ELihhGet('adminid'),1,"",'quite');
        ELihhDel();
        return echoapptoken([],1,"","");
    }

    //上传文件接口
    function upload($CANSHU,$features){
        if($this -> Loginok ([],$features) ){
            return  ;
        }
        $fan = upload();
        if($fan['code'] == 1){
            return echoapptoken($fan['content']['pic'],1,"upload ok","");
        }else{
            return echoapptoken([],-1,$fan['msg'],"");
        }
        return ;
    }

    //检测后台管理权限
    function Loginok($CANSHU,$features){
       
        $ttttclass = $GLOBALS['plugin'];
        $ttttfunction = "";
        if($CANSHU && $CANSHU['0']){
            $i = 0;
            foreach($CANSHU['0'] as $vvv){
                if($i == 0){
                    $ttttclass = $vvv;
                }else if($i == 1){
                    $ttttfunction = $vvv;
                }else{
                    break ;
                }
                $i++;
            }
        }
        
       
        $_SESSION = ELihhGet();
        if( !isset($_SESSION['adminid']) || $_SESSION['adminid'] < 1 ){
            $_SESSION['token'] =  (uuid());
            return echoapptoken([],99,'Please login1',$_SESSION['token']);
        }
        $ADMIN = adminid($_SESSION['adminid']);
        if(!$ADMIN){
            ELihhDel();
            return echoapptoken([],99,'Please login2','');
        }

        if( $ADMIN['off'] == '0'){
            ELihhDel();
            ELilog('adminlog',$_SESSION['adminid'],2,'',$ttttclass,$ttttfunction );
            return echoapptoken([],99,'Please login3','');
        }

        if( $ADMIN['verifyip'] == '1'){
            global $SESSIONID,$ELiMem;
            if($SESSIONID != $ADMIN['sessionid']  ){
                ELihhDel();
                ELilog('adminlog',$_SESSION['adminid'],2,$ADMIN['sessionid'],$ttttclass,$ttttfunction);
                return echoapptoken([],99,'Please login4','');
            }
            $xip =  $ELiMem ->g('adminip/'.$_SESSION['adminid']);
            if( ip() !=  $xip){

                ELihhDel();
                
                ELilog('adminlog',$_SESSION['adminid'],2,$xip,$ttttclass,$ttttfunction);
                return echoapptoken([],99,'Please login5','');
            }
        }

        if($CANSHU && isset($CANSHU['0']) ){
        
            if($ADMIN['groups'] >  0){
                $quanxian = $this -> groupsid($ADMIN['groups'], "jjj");
                if(!$quanxian || !is_array($CANSHU['0']) ){
                    $mmm = "权限不足 ".implode(' ',$CANSHU);
                    return echoapptoken($mmm,-1,$mmm,'');
                }
                $kongzhi = [
                    'get'=>0,
                    'add'=>1,
                    'put'=>2,
                    'del'=>3,

                ];
                $temp = $quanxian;
                $zuhe = "";
                $mode = $CANSHU['1']??"";
                foreach($CANSHU['0'] as $kx => $hhh){
                   
                    if( uuidc($hhh,false) ){

                        if(isset($CANSHU['0'][$kx+1])){
                            $mode = $CANSHU['0'][$kx+1];
                        }
                        break ;
                    }
                    if( isset($kongzhi[$hhh]) ){
                        $mode = $hhh;
                        break ;
                    }
                    if(isset($temp[$hhh])){
                        $zuhe .= $hhh.'/';
                        $temp = $temp[$hhh];
                    }else{
                        $zuhe .= $hhh;
                        return echoapptoken("权限不足 ".$zuhe,-1,"权限不足 ".$zuhe,'');
                    }
                }
            
                $caozuode = $kongzhi[$mode ];
                if(!isset($temp[$caozuode])){
                    $zuhe .= $mode;
                    return echoapptoken("权限不足 ".$zuhe,-1,"权限不足 ".$zuhe,'');
                }
            }
        }
        //可控操作检测
        return false;
    }

    //读取单个权限组
    function Groupsid($id,$name = ""){
        if($name == ""){
            if($id < 1){
                return '创始人';
            }
        }else{
            if($id < 1){
                return true;
            }
        }
        $db = db('admingroup');
        $data = $db ->where(['id'=>$id])->find();
        if(!$data ){
            if($name == ""){
                return '不存在';
            }else{
                return false;
            }
        }
        if($name == ""){
            return $data['name'];
        }else{
            return json_decode($data['competence'],true);
        }
    }
    //权限组名字
    function Groups($db = null){
        if(!$db){
            $db = db('admingroup');
        }else {
            $db ->setbiao('admingroup');
        }
        $data = $db ->select();
        $zhuan = [0=>'创始人'];
        if($data){
            foreach($data as $hhx){
                $zhuan[$hhx['id']] = $hhx['name'];
            }
        }
        return $zhuan;
    }

    function Groupscaidan($id){
        $db = db('features');
        $data = $db ->select();
        $candai  = [];
        if($data){
          
            foreach($data as $hhh){

                $candai[$hhh['pluginid']]  = [
                    'name'=>$hhh['name'],
                    'typeico'=>$hhh['typeico'],
                    'main'=>$hhh['main'],
                    'men'=>json_decode($hhh['menuconfig'],true),
                ];
            }
        }
        if($id == '0'){
            return $candai;
        }
        $quanxian = $this -> groupsid($id, "jjj");
        if($quanxian){
            $_SESSION['adminquanxian'] =  $quanxian;

            foreach($candai as $key => $vvv ){


                if(isset( $quanxian[$key])){

                    foreach($vvv['men'] as $kk => $dongzuo){
                        if( !isset( $quanxian[$key][$kk]) ){
                            unset($candai[$key]['men'][$kk]);
                        }else{

                            if(isset($dongzuo['men'])){

                                foreach($dongzuo['men'] as $kk_1 => $dongzuo_1){
                                 
                                    if( !isset( $quanxian[$key][$kk][$kk_1]) ){
                                        unset($candai[$key]['men'][$kk]['men'] [$kk_1]);
                                    }else{

                                        if(isset($dongzuo_1['men'])){

                                            foreach($dongzuo_1['men'] as $kk_2 => $dongzuo_2){
                                             
                                                if( !isset( $quanxian[$key][$kk][$kk_1][$kk_2]) ){
                                                    unset($candai[$key]['men'][$kk]['men'] [$kk_1]['men'][$kk_2]);
                                                }else{

                                                    if(isset($dongzuo_2['men'])){

                                                        foreach($dongzuo_2['men'] as $kk_3 => $dongzuo_3){
                                                         
                                                            if( !isset( $quanxian[$key][$kk][$kk_1][$kk_2][$kk_3]) ){
                                                                unset($candai[$key]['men'][$kk]['men'] [$kk_1]['men'][$kk_2]['men'][$kk_3]);
                                                            }else{

                                                                if(isset($dongzuo_3['men'])){

                                                                    foreach($dongzuo_3['men'] as $kk_4 => $dongzuo_4){
                                                                     
                                                                        if( !isset( $quanxian[$key][$kk][$kk_1][$kk_2][$kk_3][$kk_4]) ){
                                                                            unset($candai[$key]['men'][$kk]['men'] [$kk_1]['men'][$kk_2]['men'][$kk_3]['men'][$kk_4]);
                                                                        }else{
                                    
                                    
                                                                        }
                                                                    }
                                                                }
                        
                        
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }

                                    }
                                }
                            }
                        }
                    }
                }else{
                    unset($candai[$key]);
                }
            }
        }
        
        return $candai;
    }
    
    function code($CANSHU,$features){
 
        ELivcode();
        return ;
    }

    function Construct($CANSHU,$features){
        
        ELis('admin');
        $_SESSION['adminid'] = (int)ELihhGet('adminid');
        $ClassFunc = $CANSHU['-1'];
        unset($CANSHU['-1']);
        try {
           
            $weideng = ['code'=>'','home'=>'','login'=>'','index'=>''];
            if( !isset($_SESSION['adminid']) || $_SESSION['adminid'] < 1 ){
                if(!isset( $weideng[$ClassFunc])){
                    $_SESSION['token'] =  (uuid());
                    ELihhSet('token',$_SESSION['token']);
                    return echoapptoken([],99,'Please login',$_SESSION['token']);
                }

            }else{

                if( !isset($weideng[$ClassFunc]) ){
                    //这里验证权限
                    $kongzhi = [
                        'get'=>0,
                        'add'=>1,
                        'put'=>2,
                        'del'=>3,
                    ];

                    $mode = isset($CANSHU['1'])?$CANSHU['1']:'get';
                    if(!isset( $kongzhi[$mode])){
                        $mode = 'get';
                    }
                    global $YHTTP;
                    if( callELi("admin","loginok",[$YHTTP,$mode],[],false)){
                        return ;
                    }
                } 
            }
           
           return ELitpl($this -> plugin,$ClassFunc,$this);
            //$this ->$ClassFunc($CANSHU,$features);
        } catch (\Throwable $th) {
            return echoapptoken([],-1,$th->getmessage());
        }
    }
}