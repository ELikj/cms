ELi['admin/config'] = {
    init(){

        ELi['admin/config'].get();

    },get(){

        $("#LAY_app_body ."+$class).html('<div class="layui-fluid"><div class="layui-card"><div class="layui-card-body" style="padding: 15px;"><table class="layui-hide" id="user'+$class+'" lay-filter="user'+$class+'"></table></div></div></div>');
        layui.table.render({
        elem: '#user'+$class
        ,url: PLUG+'config'+FENGE+TOKEN+FENGE+'get'
        ,toolbar:'<div><a class="layui-btn layui-btn-normal" lay-event="add"><i class="layui-icon layui-icon-addition"></i>新增</a> <a class="layui-btn " lay-event="refresh"><i class="layui-icon layui-icon-refresh-3"></i> 刷新</a></div>'
       ,cols: [[
            {field:'id', title: 'ID', width:80,  fixed: true}
            ,{field:'name', title: '配置名称'}
            ,{field:'type', title: '配置标识'}
            
            ,{title:'操作', templet  :function(d){
                return '<a class="layui-btn layui-btn-xs" lay-event="edit"><i class="layui-icon layui-icon-edit"></i>编辑</a><a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i class="layui-icon layui-icon-delete"></i>删除</a>';
            }}
        ]]
        ,limit:20
        
        ,page: true
        ,done: function(data, curr, count){
            if(data.token && data.token != ""){
                TOKEN = data.token;
            }

        }
        });

        layui.table.on('toolbar(user'+$class+')', function(obj){
            if(obj.event === 'add'){
                ELi['admin/config'].add();
            }else if(obj.event === 'refresh'){
                layer.closeAll();
                ELi['admin/config'].init();
            }
        });

        layui.table.on('tool(user'+$class+')', function(obj){
            if(obj.event === 'del'){
                layer.confirm('真的要删除吗?', function(index){
                ELi['admin/config'].del(obj);
                layer.close(index);
                });
            }else if(obj.event === 'edit'){
                ELi['admin/config'].edit(obj);
            }
        });
        layui.table.render();

    },edit(OBJ,diercai){
        if(diercai != "add"){
            diercai = "put";
            var title ="编辑配置";
        }else{
            var title ="新建配置";
        }
        window.UIMUI = Array();
        var D = OBJ.data;

        var html ='<form name="form" id="form" class="layui-form">';
    
        
        var BIAO = Array(
            'id($$)id($$)hidden($$)($$)($$)'+D.id
            ,'name($$)配置名字($$)text($$)($$)($$)'+D.name
            ,'type($$)配置标识($$)text($$)($$)($$)'+D.type
            ,'data($$)配置详情($$)caidan($$)($$)($$)'+D.data
            ,'ff'+$class+'($$) ($$)submit($$)($$)layer.close(OPID);ELi[\'admin/admin\'].init()($$)提交($$)tijiao',
            );
    
        for(var z in BIAO){
        html+=jsfrom(BIAO[z]);
        }
        html+="</form>";

    
        OPID = layer.open({
            type: 1,
            zIndex:10000,
            title:title,
            area:['360px', '420px'],
            fixed: true, 
            maxmin: true,
            content: html,
            success: function(layero, index){}
        });
        layui.form.on('submit(ff'+$class+')', function(formdata){
            formdata = formdata.field;
            formdata.Format = 'json';
        
            $.post(PLUG+"config"+FENGE+TOKEN+FENGE+diercai,formdata,function(data){
            if(data.token && data.token != ""){
                TOKEN = data.token;
            }
            if(data.code == 99){
                layer.close(OPID);
                layer.msg("请登陆",{offset: 'c',time: 2000},function(){
                loadjs("home");
                });
            }else if(data.code == 1){
                if(diercai == "put"){
                    OBJ.update(data.data);
                    layer.close(OPID);
                }else{
                    ELi['admin/config'].get();
                    layer.close(OPID);
                }

              

            }else{
                
                layer.msg(data.msg,{zIndex:99999,offset: 'c',time: 2000});
            }
            });
            return false;
        });
        layui.form.render();    

    },add(){
        ELi['admin/config'].edit({
            data:{
                id:0,
                name:"",
                type:"",
                data:""
            }
        },'add');
    },del(OBJ){
        var fromdata = {
            Format:'json',
            id:OBJ.data.id
            };
        $.post(PLUG+"config"+FENGE+TOKEN+FENGE+'del',fromdata,function(data){
            if(data.token && data.token != ""){
                TOKEN = data.token;
            }
            if(data.code == 99){
                layer.msg("请登陆",{offset: 'c',time: 2000},function(){
                loadjs("home");
                });
            }else if(data.code == 1){
                OBJ.del();
            }else{
                layer.msg(data.msg,{zIndex:99999,offset: 'c',time: 2000});
            }

        });

    }
}
ELi['admin/config'].init();