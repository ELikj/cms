ELi['admin/userlog'] = {
    type:{},
    hhhhda:"",
    init(){
        ELi['admin/userlog'].get();

    },get(){
        $("#LAY_app_body ."+$class).html('<style>.'+$class+' .qfys1,.'+$class+' .qfys0{color:green;}.'+$class+' .qfys2,.'+$class+' .qfys5{color:red;}.'+$class+' .qfys3{color:#E9967A;}.'+$class+' .qfys4{color:blue;}.'+$class+' .qfys6{}</style><div class="layui-fluid"><div class="layui-card"><div class="layui-card-body" style="padding: 15px;"><div class="'+$class+'saixuan" style="display:none;margin-bottom:8px;"><form name="form" class="layui-form"><div class="layui-inline" style="width:128px;"><select name="so_type" class="so_var"></select> </div> <div class="layui-inline" style="width:88px;"> <input class="layui-input so_var" name="so_uid" autocomplete="off" placeholder="用户UID"> </div>  <div class="layui-inline" style="width:88px;"> <input class="layui-input so_var" name="so_controller" placeholder="插件名字" autocomplete="off"> </div>  <div class="layui-inline" style="width:88px;"><input class="layui-input so_var"  value="shuaxin" name="so_shuaxin" type="hidden" autocomplete="off"> <input class="layui-input so_var" placeholder="插件函数" name="so_mode" autocomplete="off"> </div> <div class="layui-inline" style="width:88px;"> <input class="layui-input so_var" placeholder="ip" name="so_ip" autocomplete="off"> </div> <div class="layui-inline" style="width:88px;"> <input class="layui-input so_var" placeholder="开始时间" id="so_atimestart'+$class+'" name="so_atimestart" autocomplete="off"> </div> <div class="layui-inline" style="width:88px;"> <input class="layui-input so_var" placeholder="结束时间" id="so_atimeend'+$class+'" name="so_atimeend" autocomplete="off"> </div>   <button class="layui-btn" lay-event="sousuo" lay-submit lay-filter="tijiao'+$class+'">搜索</button></form> </div><table class="layui-hide " id="user'+$class+'" lay-filter="user'+$class+'"></table></div></div></div>');
        layui.table.render({
        elem: '#user'+$class
        ,url: PLUG+'userlog'+FENGE+TOKEN+FENGE+'get'
          
        ,toolbar:'<div>  <a class="layui-btn layui-btn-danger" lay-event="saixuan"><i class="layui-icon layui-icon-search"></i>筛选</a> <a class="layui-btn " lay-event="refresh"><i class="layui-icon layui-icon-refresh-3"></i> 刷新</a> </div>'
        ,cols: [[
            {field:'id', title: 'ID', width:80,  fixed: true}
            ,{field:'uid', title: '用户UID'}
            ,{field:'type', title: '类型',templet  :function(d){
             
              return '<span class="qfys'+d.type+'">'+ELi['admin/userlog'].type[d.type]+'</span>';
            }}
            ,{field:'controller', title: '插件名字'}
            ,{field:'mode', title: '插件函数'}
            ,{field:'atime', title: '时间', templet  :function(d){
              return time(d.atime)
            }}
            
        ]]
       
        ,page: true
        ,done: function(data, curr, count){
            if(data.token && data.token != ""){
                TOKEN = data.token;
            }

            if( data.type ){

                ELi['admin/userlog'].type = data.type;
                layui.laydate.render({ 
                  elem: '#so_atimestart'+$class
                  ,format: 'yyyy-MM-dd' //可任意组合
                });
                layui.laydate.render({ 
                  elem: '#so_atimeend'+$class
                  ,format: 'yyyy-MM-dd' //可任意组合
                });
                var xxx = '<option value="">全部类型</option>';
                for(var n in data.type){
                  xxx += '<option value="'+n+'">'+data.type[n]+'</option>';
                }
                $('[name="so_type"]').html(xxx);
                layui.form.render();
                
            }
            
        }
        });
        layui.table.on('toolbar(user'+$class+')', function(obj){
            if(obj.event === 'add'){
              ELi['admin/userlog'].add();
            }else if(obj.event === 'refresh'){
              layer.closeAll();
              ELi['admin/userlog'].init();
            }else if(obj.event === 'saixuan'){
              $("."+$class+"saixuan").toggle();
              
            }
        });
        layui.table.on('row(user'+$class+')', function(obj){
          ELi['admin/userlog'].edit(obj);
        });
        layui.table.on('tool(user'+$class+')', function(obj){
          if(obj.event === 'del'){
            layer.confirm('真的要删除吗?', function(index){
              ELi['admin/userlog'].del(obj);
              layer.close(index);
            });
          }else if(obj.event === 'edit'){
            ELi['admin/userlog'].edit(obj);
          }
        });

        layui.form.on('submit(tijiao'+$class+')', function(formdata){
          formdata = formdata.field;
          var zuhesou = {};
              $('.so_var').each(function(i,v){
                if($(v).val() != ""){
                  zuhesou[ $(v).attr('name').replace('so_','')  ] = $(v).val();
                }
                
              });

            ELi['admin/userlog'].hhhhda = $('[name="so_type"]').val();
            
          layui.table.reload('user'+$class, {
            page: {
              curr: 1 //重新从第 1 页开始
            },
            url: PLUG+'userlog'+FENGE+TOKEN+FENGE+'get'
            
            ,where: zuhesou //设定异步数据接口的额外参数
            
          });
            

          return false;
        });
      
    },edit(OBJ){
      var html ='<form name="form" id="form" class="layui-form">';
   
      var D = OBJ.data;
      var BIAO = Array(
      
        'uid($$)用户UID($$)textshow($$)($$)用户UID($$)'+D.uid
        ,'type($$)类型($$)selectshow($$)($$)ELi[\'admin/userlog\'].type($$)'+D.type+'($$)'
        ,'controller($$)插件名字($$)textshow($$)($$)controller($$)'+D.controller
        ,'controller($$)插件函数($$)textshow($$)($$)mode($$)'+D.mode
        ,[
          'data',
          '详细数据',
          'textarea',
          '',
          '详细数据',
          D.data
        ]
        //,'data($$)详细数据($$)textarea($$)($$)详细数据($$)'+D.data
        ,'ip($$)ip($$)textshow($$)($$)ip($$)'+D.ip
        ,'atime($$)时间($$)time($$)($$)time($$)'+D.atime
      
        
        ,'ff'+$class+'($$) ($$)submit($$)($$)layer.close(OPID);ELi[\'admin/userlog\'].init()($$)($$)tijiao',
      );
      for(var z in BIAO){
        html+=jsfrom(BIAO[z]);
      }
      html+="</form>";
      var title ="查看日志详情";
      OPID = layer.open({
        type: 1,
        zIndex:10000,
        title:title,
        area:['100%', '100%'],
        fixed: true, 
        maxmin: true,
        content: html,
        success: function(layero, index){}
      });

    },add(){

    },del(OBJ){
    }
}
ELi['admin/userlog'].init();