<?php if( !defined( 'ELikj')){
    exit( 'Error ELikj'); 
}
global $ELiMem,$ELiDataBase,$ELiConfig;

$admin = db('admin');
$DATA = $admin ->qurey("select TABLE_NAME,TABLE_COMMENT,TABLE_ROWS,AUTO_INCREMENT from information_schema.tables where table_schema='".ELiSecurity($ELiDataBase[$ELiConfig['dbselect']]['database'])."';","erwei");
//TABLE_NAME  TABLE_COMMENT  TABLE_ROWS

$kuozhan  = [];
if(!$DATA){
    $DATA = [];
}else{
    foreach($DATA as $i =>$vv){
        usleep(rand(10,100));
        $DATA[$i]['TABLE_ROWS'] = $admin ->setbiao( str_ireplace(DBprefix,'',$vv['TABLE_NAME']) )->total();
    }   
}

return echoapptoken($DATA,1,"","",$kuozhan);
