ELi['main'] = {
    //每个步骤初始化
    init : function (){
        p("main init ok");

        apptongxin(PLUG+"home",{},function(data){

            if(data.token && data.token != ""){
                TOKEN = data.token;
            }
            if(data.code == -1){
                layer.alert(data.msg);
            }else if(data.code == 99){
                setapptoken(data.data);
                loadjs("login");
            }else if(data.code == 0 ){
                ELi.DATA.user = data.data;
                loadjs("home");
            }
        },'get');
    }
};
ELi['main'].init();