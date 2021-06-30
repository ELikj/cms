ELi['admin/user'] = {
    off:["关闭","正常"],
    verifyip:["不验证","验证"],
    sex: {"-1":"未选择",0:"女",1:"男"},
    init(){

        ELi['admin/user'].get();

    },get(){

        $("#LAY_app_body ."+$class).html('<div class="layui-fluid"><div class="layui-card"><div class="layui-card-body" style="padding: 15px;"><div class="'+$class+'saixuan" style="display:none;margin-bottom:8px;"><form name="form" class="layui-form">   <div class="layui-inline" style="width:88px;"> <input class="layui-input so_var" name="so_uid" autocomplete="off" placeholder="用户UID"> </div> <input class="layui-input so_var"  value="shuaxin" name="so_shuaxin" type="hidden" autocomplete="off">  <button class="layui-btn" lay-event="sousuo" lay-submit lay-filter="tijiao'+$class+'">搜索</button>   </form> </div><table class="layui-hide" id="user'+$class+'" lay-filter="user'+$class+'"></table></div></div></div>');
        layui.table.render({
        elem: '#user'+$class
        ,url: PLUG+'user'+FENGE+TOKEN+FENGE+'get'
        ,toolbar:'<div><a class="layui-btn layui-btn-normal" lay-event="add"><i class="layui-icon layui-icon-addition"></i>新增</a> <a class="layui-btn " lay-event="refresh"><i class="layui-icon layui-icon-refresh-3"></i> 刷新</a> <a class="layui-btn layui-btn-danger" lay-event="saixuan"><i class="layui-icon layui-icon-search"></i>筛选</a>  </div>'
       ,cols: [[
            {field:'id', title: 'ID', width:80,  fixed: true}
            ,{field:'nickname', title: '昵称'}
            ,{field:'avatar', title: '头像' , width:60, templet:function(obj){
               return '<img  style="width:28px;height:28px;" src="'+pichttp(obj.avatar)+'" />';
            }}
            
            ,{field:'money', title: '金额'}
            ,{field:'currency', title: '货币'}
            ,{field:'integral', title: '积分'}
            ,{field:'accountoff', title: '状态',templet  :function(d){


                return ELi['admin/user'].off[d.accountoff];
            }}

            
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
                ELi['admin/user'].add();
            }else if(obj.event === 'refresh'){
                layer.closeAll();
                ELi['admin/user'].init();
            }else if(obj.event === 'saixuan'){
                $("."+$class+"saixuan").toggle();
                $('.tongjijine'+$class).hide();
  
              }
        });

        layui.table.on('tool(user'+$class+')', function(obj){
            if(obj.event === 'del'){
                layer.confirm('真的要删除吗?', function(index){
                ELi['admin/user'].del(obj);
                layer.close(index);
                });
            }else if(obj.event === 'edit'){
                ELi['admin/user'].edit(obj);
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
              
         
              
            layui.table.reload('user'+$class, {
              page: {
                curr: 1 //重新从第 1 页开始
              },
              url: PLUG+'user'+FENGE+TOKEN+FENGE+'get'
              
              ,where: zuhesou //设定异步数据接口的额外参数
              
            });
              
  
            return false;
          });
        layui.table.render();

    },edit(OBJ,diercai){
        if(diercai != "add"){
            diercai = "put";
            var title ="编辑用户";
        }else{
            var title ="新建用户";
        }

        var D = OBJ.data;
        var BIAO = [];
        var html ='<form name="form" id="form" class="layui-form '+$class+'">';
       
        BIAO = [
            
            'id($$)插件图标($$)hidden($$)($$)插件图标名字($$)'+D.id,
           
            'nickname($$)昵称($$)text($$)($$)昵称($$)'+D.nickname,
            'avatar($$)头像($$)updateshow($$)width:50px;height:50px;($$)头像($$)'+D.avatar,
            'verifyip($$)验证ip($$)select($$)($$)ELi["admin/user"].verifyip($$)'+D.verifyip
            ,'sex($$)性别($$)select($$)($$)ELi["admin/user"].sex($$)'+D.sex
            ,'accountoff($$)状态($$)select($$)($$)ELi["admin/user"].off($$)'+D.accountoff
            
            ,'super($$)超级密码($$)text($$)($$)超级密码($$)',
            'fullname($$)姓名($$)text($$)($$)姓名($$)'+D.fullname,
            'identity($$)身份号($$)text($$)($$)身份号($$)'+D.identity,
            'age($$)年龄($$)text($$)($$)年龄($$)'+D.age,
            'grade($$)等级($$)text($$)($$)等级($$)'+D.grade,
            'level($$)级别($$)text($$)($$)级别($$)'+D.level,
       
            

            'recharge($$)充值($$)recharge($$)($$)充值($$)'+D.recharge,
            'money($$)金额($$)money($$)($$)金额($$)'+D.money,
            'integral($$)积分($$)integral($$)($$)积分($$)'+D.integral,
            'currency($$)货币($$)recharge($$)($$)货币($$)'+D.currency,
           
            'regtime($$)注册时间($$)time($$)($$)注册时间($$)'+D.regtime,
            'regip($$)注册ip($$)text($$)($$)注册ip($$)'+D.regip,
            'logintime($$)登陆时间($$)time($$)($$)登陆时间($$)'+D.logintime,
            'loginip($$)登陆p($$)text($$)($$)登陆ip($$)'+D.loginip,
            'superior0($$)一级($$)text($$)($$)一级($$)'+D.superior0,
            'superior1($$)二级($$)textshouw($$)($$)二级($$)'+D.superior1
          

          
            
             
          
        ];
        for(var z in BIAO){
            html+=jsfrom(BIAO[z]);
        }



        html+=jsfrom('ff'+$class+'($$)($$)submit($$)($$)layer.close(OPID);ELi[\'admin/features\'].init()($$)提交($$)tijiao');
        html+="</form>";
        
        OPID = layer.open({
          type: 1,
          zIndex:10000,
          title:title,
          area:['100%', '100%'],
          fixed: true, 
          maxmin: true,
          content: html,
          success: function(layero, index){
            
          }
        });



        layui.form.on('submit(ff'+$class+')', function(formdata){
            formdata = formdata.field;
            formdata.Format = 'json';
            $.post(PLUG+"user"+FENGE+TOKEN+FENGE+diercai,formdata,function(data){
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
                        ELi['admin/user'].get();
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
        ELi['admin/user'].edit({
            data:
            {"id":0,"nickname":"","avatar":"","super":"","recharge":"0.00000","money":"0.00000","integral":"0","currency":"0.00000","accountoff":"0","fullname":"","identity":"","sex":"-1","grade":"0","level":"0","age":"0","regtime":"0","regip":"","logintime":"0","loginip":"","security":"","verifyip":"0","superior0":"0","superior1":"0"}
        },'add');
    },del(OBJ){
        var fromdata = {
            Format:'json',
            id:OBJ.data.id
            };
        $.post(PLUG+"user"+FENGE+TOKEN+FENGE+'del',fromdata,function(data){
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
ELi['admin/user'].init();