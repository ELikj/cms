ELi['admin/admin'] = {
  verifyip:[],
  off:[],
  init(){

    ELi['admin/admin'].get();

  },edit(OBJ){

  
    var D = OBJ.data;
    var html ='<form name="form" id="form" class="layui-form">';
    var BIAO = Array(
      'id($$)id($$)hidden($$)($$)($$)'+D.id
      ,'name($$)登陆账号($$)textshow($$)($$)($$)'+D.account
      ,'password($$)登陆密码($$)text($$)($$)需要修改密码才填写($$)'
      ,'sessionid($$)强制下线($$)text($$)($$)需要开启ip验证输入字符($$)'
      ,'groups($$)管理权限($$)select($$)($$)ELi["admin/admin"].groups($$)'+D.groups
      ,'off($$)账号状态($$)select($$)($$)ELi["admin/admin"].off($$)'+D.off
      ,'verifyip($$)ip验证($$)select($$)($$)ELi["admin/admin"].verifyip($$)'+D.verifyip
      ,'tijiao($$) ($$)submit($$)($$)layer.close(OPID);ELi[\'admin/admin\'].init()($$)提交($$)tijiao',
    );
    for(var z in BIAO){
      html+=jsfrom(BIAO[z]);
    }
    html+="</form>";
    var title ="编辑管理账号";
    OPID = layer.open({
      type: 1,
      zIndex:10000,
      title:title,
      area:['360px', '460px'],
      fixed: true, 
      maxmin: true,
      content: html,
      success: function(layero, index){}
    });
    layui.form.on('submit(tijiao)', function(formdata){
      formdata = formdata.field;
      formdata.Format = 'json';
      $.post(PLUG+"admin"+FENGE+TOKEN+FENGE+'put',formdata,function(data){
        if(data.token && data.token != ""){
          TOKEN = data.token;
        }
        if(data.code == 99){
          layer.close(OPID);
          layer.msg("请登陆",{offset: 'c',time: 2000},function(){
            loadjs("home");
          });
        }else if(data.code == 1){
          OBJ.update(data.data);
          layer.close(OPID);
        }else{
          
          layer.msg(data.msg,{zIndex:12000,offset: 'c',time: 2000});
        }
      });
      return false;
    });
    layui.form.render();

  },del(OBJ){

    var fromdata = {
      Format:'json',
      id:OBJ.data.id
    };
    $.post(PLUG+"admin"+FENGE+TOKEN+FENGE+'del',fromdata,function(data){
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

  },add(){
    

    var html ='<form name="form" id="form" class="layui-form">';
    var BIAO = Array(
    
       'account($$)登陆账号($$)text($$)($$)登陆账号($$)($$)required'
      ,'password($$)登陆密码($$)password($$)($$)登陆密码($$)($$)required'
      ,'groups($$)管理权限($$)select($$)($$)ELi["admin/admin"].groups($$)0'
      ,'off($$)账号状态($$)select($$)($$)ELi["admin/admin"].off($$)1'
      ,'verifyip($$)ip验证($$)select($$)($$)ELi["admin/admin"].verifyip($$)1'
      ,'xxxxxx($$) ($$)submit($$)($$)layer.close(OPID);ELi[\'admin/admin\'].init()($$)新增账号($$)tijiao',
    );
    for(var z in BIAO){
      html+=jsfrom(BIAO[z]);
    }
    html+="</form>";
    var title ="新增管理账号";
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
    layui.form.on('submit(xxxxxx)', function(formdata){
      formdata = formdata.field;
      formdata.Format = 'json';
     
      $.post(PLUG+"admin"+FENGE+TOKEN+FENGE+'add',formdata,function(data){
        if(data.token && data.token != ""){
          TOKEN = data.token;
        }
        if(data.code == 99){
          layer.close(OPID);
          layer.msg("请登陆",{offset: 'c',time: 2000},function(){
            loadjs("home");
          });
        }else if(data.code == 1){
          ELi['admin/admin'].get();
          layer.close(OPID);
        }else{
          
          layer.msg(data.msg,{zIndex:99999,offset: 'c',time: 2000});
        }
      });
      return false;
    });
    layui.form.render();

  },get(){

    $("#LAY_app_body ."+$class).html('<div class="layui-fluid"><div class="layui-card"><div class="layui-card-body" style="padding: 15px;"><table class="layui-hide" id="user'+$class+'" lay-filter="user'+$class+'"></table></div></div></div>');
    layui.table.render({
      elem: '#user'+$class
      ,url: PLUG+'admin'+FENGE+TOKEN+FENGE+'get'
      ,toolbar:'<div><a class="layui-btn layui-btn-normal" lay-event="add"><i class="layui-icon layui-icon-addition"></i>新增</a> <a class="layui-btn " lay-event="refresh"><i class="layui-icon layui-icon-refresh-3"></i> 刷新</a></div>'
      ,cols: [[
        {field:'id', title: 'ID', width:80,  fixed: true}
        ,{field:'account', title: '管理帐号'}
        ,{field:'groups', title: '管理组',templet: function(d){
          return ELi['admin/admin'].groups[d.groups];
        }}
        ,{field:'verifyip', title: '验证ip',templet: function(d){
          return ELi['admin/admin'].verifyip[d.verifyip];
        }}
        ,{field:'off', title: '状态',templet: function(d){
          return ELi['admin/admin'].off[d.off];
        }}
        ,{field:'ip', title: 'ip' }
        ,{field:'atime', title: '时间',templet  :function(d){
          return time(d.atime);
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
        if(data.off){
          ELi['admin/admin'].off = data.off;
        }
        if(data.verifyip){
          ELi['admin/admin'].verifyip = data.verifyip;
        }
        if(data.groups){
          ELi['admin/admin'].groups = data.groups;
        }
      }
    });

    layui.table.on('toolbar(user'+$class+')', function(obj){
      if(obj.event === 'add'){
        ELi['admin/admin'].add();
      }else if(obj.event === 'refresh'){
        layer.closeAll();
        ELi['admin/admin'].init();
      }
    });

    layui.table.on('tool(user'+$class+')', function(obj){
      if(obj.event === 'del'){
        layer.confirm('真的要删除吗?', function(index){
          ELi['admin/admin'].del(obj);
          layer.close(index);
        });
      }else if(obj.event === 'edit'){
        ELi['admin/admin'].edit(obj);
      }
    });
    layui.table.render();

  }
}
ELi['admin/admin'].init();