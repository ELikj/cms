ELi['admin/moneylog'] = {
    type:{},
    hhhhda:"",
    init(){
        ELi['admin/moneylog'].get();

    },get(){


        $("#LAY_app_body ."+$class).html('<style>.'+$class+' .qfys1,.'+$class+' .qfys0{color:green;}.'+$class+' .qfys2,.'+$class+' .qfys5{color:red;}.'+$class+' .qfys3{color:#E9967A;}.'+$class+' .qfys4{color:blue;}.'+$class+' .qfys6{}</style><div class="layui-fluid"><div class="layui-card"><div class="layui-card-body" style="padding: 15px;"><div class="'+$class+'saixuan" style="display:none;margin-bottom:8px;"><form name="form" class="layui-form">  <div class="layui-inline" style="width:88px;"> <input class="layui-input so_var  sopuliid'+$class+'" name="so_pluginid" placeholder="插件名字" autocomplete="off"> </div>  <div class="layui-inline" style="width:128px;"><select name="so_type" class="so_var"></select> </div> <div class="layui-inline" style="width:88px;"> <input class="layui-input so_var" name="so_uid" autocomplete="off" placeholder="用户UID"> </div> <div class="layui-inline" style="width:88px;"> <input class="layui-input so_var"  value="shuaxin" name="so_shuaxin" type="hidden" autocomplete="off"><input class="layui-input so_var" placeholder="ip" name="so_ip" autocomplete="off"> </div> <div class="layui-inline" style="width:88px;"> <input class="layui-input so_var" placeholder="开始时间" id="so_atimestart'+$class+'" name="so_atimestart" autocomplete="off"> </div> <div class="layui-inline" style="width:88px;"> <input class="layui-input so_var" placeholder="结束时间" id="so_atimeend'+$class+'" name="so_atimeend" autocomplete="off"> </div>   <button class="layui-btn" lay-event="sousuo" lay-submit lay-filter="tijiao'+$class+'">搜索</button>  <button class="layui-btn layui-btn-normal tongjijine'+$class+'" ></button> </form> </div><table class="layui-hide " id="user'+$class+'" lay-filter="user'+$class+'"></table></div></div></div>');
        layui.table.render({
        elem: '#user'+$class
        ,url: PLUG+'moneylog'+FENGE+TOKEN+FENGE+'get'
          
        ,toolbar:'<div>  <a class="layui-btn layui-btn-danger" lay-event="saixuan"><i class="layui-icon layui-icon-search"></i>筛选</a> <a class="layui-btn " lay-event="refresh"><i class="layui-icon layui-icon-refresh-3"></i> 刷新</a> </div>'
        ,cols: [[
            {field:'id', title: 'ID', width:80,  fixed: true}
            ,{field:'uid', title: '用户UID'}
            ,{field:'num', title: '数量'}
            ,{field:'pluginid', title: '插件名字'}
            ,{field:'typename', title: '类型'}
            ,{field:'off', title: '标识'}
            ,{field:'atime', title: '时间', templet  :function(d){
              return time(d.atime)
            }}
            
        ]]
        ,limit:20
        ,page: true
        ,done: function(data, curr, count){
            if(data.token && data.token != ""){
                TOKEN = data.token;
            }

         
            if(data.jine){
              $('.tongjijine'+$class).show();
              $('.tongjijine'+$class).html(data.jine);
            }
                
            
            
        }
        });

        layui.laydate.render({ 
          elem: '#so_atimestart'+$class
          ,format: 'yyyy-MM-dd' //可任意组合
        });
        layui.laydate.render({ 
          elem: '#so_atimeend'+$class
          ,format: 'yyyy-MM-dd' //可任意组合
        });

        $('.sopuliid'+$class).bind('input propertychange', function()
        {
          //获取input 元素,并实时监听用户输入
          //逻辑
            var fanhuizhi = $(this).val();
            if(fanhuizhi == ""){

              $("."+$class+"saixuan [name='so_type']" ).html("");
              layui.form.render("select");
              return ;
            }
            var formdata = {
              key :fanhuizhi
            };
            formdata.Format = 'json';
            $.post(PLUG+"moneylog"+FENGE+TOKEN+FENGE+'add',formdata,function(data){
              if(data.token && data.token != ""){
                TOKEN = data.token;
              }
              if(data.code == 1){
                var xxx = '<option value="">全部类型</option>';
                for(var n in data.data){
                  xxx += '<option value="'+n+'">'+data.data[n]+'</option>';
                }
                $("."+$class+"saixuan [name='so_type']" ).html(xxx);
                layui.form.render("select");
              }
              
            });
        });
        
        layui.form.render();
        layui.table.on('toolbar(user'+$class+')', function(obj){
            if(obj.event === 'add'){
              ELi['admin/moneylog'].add();
            }else if(obj.event === 'refresh'){
              layer.closeAll();
              ELi['admin/moneylog'].init();
            }else if(obj.event === 'saixuan'){
              $("."+$class+"saixuan").toggle();
              $('.tongjijine'+$class).hide();

            }
        });
        layui.table.on('row(user'+$class+')', function(obj){
          ELi['admin/moneylog'].edit(obj);
        });

        layui.form.on('submit(tijiao'+$class+')', function(formdata){
          formdata = formdata.field;
          var zuhesou = {};
              $('.so_var').each(function(i,v){
                if($(v).val() != ""){
                  zuhesou[ $(v).attr('name').replace('so_','')  ] = $(v).val();
                }
                
              });
              
            ELi['admin/moneylog'].hhhhda = $('[name="so_type"]').val();
            
          layui.table.reload('user'+$class, {
            page: {
              curr: 1 //重新从第 1 页开始
            },
            url: PLUG+'moneylog'+FENGE+TOKEN+FENGE+'get'
            
            ,where: zuhesou //设定异步数据接口的额外参数
            
          });
            

          return false;
        });
      
    },edit(OBJ){
      var html ='<form name="form" id="form" class="layui-form">';
   
      var D = OBJ.data;
      var BIAO = Array(
      
        'uid($$)用户UID($$)textshow($$)($$)用户UID($$)'+D.uid
        
        ,'num($$)数量($$)textshow($$)($$)($$)'+D.num+'($$)'
        ,'type($$)类型($$)textshow($$)($$)($$)'+D.typename+'($$)'
        ,'controller($$)插件名字($$)textshow($$)($$)pluginid($$)'+D.pluginid
        ,[
          'data',
          '详细数据',
          'textarea',
          '',
          '详细数据',
          D.data
        ]
        //,'data($$)详细数据($$)textarea($$)($$)详细数据($$)'+D.data
        ,'off($$)标识($$)textshow($$)($$)标识($$)'+D.off
        ,'ip($$)ip($$)textshow($$)($$)ip($$)'+D.ip
        ,'atime($$)时间($$)time($$)($$)time($$)'+D.atime
      
        
        ,'ff'+$class+'($$) ($$)submit($$)($$)layer.close(OPID);ELi[\'admin/userlog\'].init()($$)($$)tijiao',
      );
      for(var z in BIAO){
        html+=jsfrom(BIAO[z]);
      }
      html+="</form>";
      var title ="查看详情";
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
ELi['admin/moneylog'].init();