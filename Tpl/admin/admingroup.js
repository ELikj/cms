ELi['admin/admingroup'] = {
    Groups:{},
    competence:{},
    jishu:0,
    Mode: ['读取','新增','修改','删除'],
    init(){

        ELi['admin/admingroup'].get();

    },xuanhtml(zcaidan,hhhh){
        var xuixin = [];
        for(var x in zcaidan ){
            ELi['admin/admingroup'].jishu++;


            var mmgege = (hhhh+'['+x+']');

            var xx = mmgege.split('[');
            var temp = ELi['admin/admingroup'];
            for(var xbiao in xx ){
                var biaohao = xx[xbiao].replace("]",'');
                if(temp[biaohao]){
                    temp = temp[biaohao];
                }
               
            }
            

          
            var hhhf = {
                id:hhhh+'_'+x+'_'
                ,title: '<span data="'+hhhh+'_'+x+'_" class=" woxuandexiajihahade"><i class="layui-icon '+zcaidan[x].typeico+'"></i> '+zcaidan[x].name+'</span> '
                ,field: mmgege
                ,spread:true
                
                };

            if(temp.length && temp.length >= 4){
                hhhf.checked =true;

            }else if(Object.keys(temp).length >= 4 ){
                hhhf.checked =true;
            } 
          
            if(zcaidan[x].men){
                hhhf.children =ELi['admin/admingroup'].xuanhtml(zcaidan[x].men, mmgege );
            }else{
                hhhf .title += 
                '<input same="layuiTreeCheck" type="checkbox" name="'+hhhh+'['+x+'][0]" '+(temp[0]?'checked="checked"':"")+' data="'+hhhh+'_'+x+'_'+'" lay-skin="primary" value="1" class="mode0">读取'+ 
                '<input same="layuiTreeCheck" type="checkbox" name="'+hhhh+'['+x+'][1]" '+(temp[1]?'checked="checked"':"")+'data="'+hhhh+'_'+x+'_'+'" lay-skin="primary" value="1" class="mode1">新增'+ 
                '<input same="layuiTreeCheck" type="checkbox" name="'+hhhh+'['+x+'][2]" '+(temp[2]?'checked="checked"':"")+'data="'+hhhh+'_'+x+'_'+'" lay-skin="primary" value="1" class="mode2">修改'+ 
                '<input same="layuiTreeCheck" type="checkbox" name="'+hhhh+'['+x+'][3]" '+(temp[3]?'checked="checked"':"")+'data="'+hhhh+'_'+x+'_'+'" lay-skin="primary" value="1" class="mode3">删除'
            }
            xuixin.push(hhhf);
        }
            
       return xuixin;
    },edit(OBJ,diercai){
        if(diercai != "add"){
            diercai = "put";
        }
    
      

        var D = OBJ.data;
        if(D.competence && D.competence != ""){
            ELi['admin/admingroup'].competence = JSON.parse(D.competence);



        }else{
            ELi['admin/admingroup'].competence = {};
        }
        
        console.log(ELi['admin/admingroup'].competence);
        var html ='<style>.layui-tree .layui-form-checkbox{margin:0px 0px 0px 5px;}</style><form name="form" id="form" class="layui-form admingroup'+$class+'">';
        var BIAO = Array(
            'id($$)id($$)hidden($$)($$)($$)'+D.id
            ,'name($$)名字($$)text($$)($$)($$)'+D.name
            ,'describes($$)描述($$)text($$)($$)($$)'+D.describes
        );
        for(var z in BIAO){
            html+=jsfrom(BIAO[z]);
        }
        html +='<div style="margin-left:20px;padding:10px 0;"  class="aniuzu"><a  class="layui-btn" href="javascript:void(0);" id="'+$class+'admin_admingrouppiliangquan">全选不全选</a> <a  class="layui-btn layui-btn-primary" href="javascript:void(0);" id="'+$class+'admin_admingrouppilimode0"> 只读</a>  <a  class="layui-btn layui-btn-normal" href="javascript:void(0);" id="'+$class+'admin_admingrouppilimode1"> 只增</a> <a  class="layui-btn layui-btn-warm" href="javascript:void(0);" id="'+$class+'admin_admingrouppilimode2"> 只改</a> <a  class="layui-btn layui-btn-danger" href="javascript:void(0);" id="'+$class+'admin_admingrouppilimode3"> 只删除</a>  </div>';
        var xuanid ={};
        if(ELi['admin/admingroup'].Groups){
            var caidan = ELi['admin/admingroup'].Groups;
            var zuhe = '';
            html +='<div class="layui-input-block"><div class="layui-tab"><ul class="layui-tab-title">';
            var mm =0;
            for(var m in caidan){
               if(caidan[m].name  == ""){
                   continue ;
               }
                html +='<li'+(mm == 0?' class="layui-this"':'')+'> <i class="layui-icon '+caidan[m].typeico+'"></i>'+(!caidan[m].name || caidan[m].name== ""?m:caidan[m].name)+'</li>';
                zuhe+='<div class="layui-tab-item '+(mm == 0?' layui-show':'')+'" id="tree'+$class+m+'"></div>';
                if(caidan[m].men){
                    xuanid[m]=( ELi['admin/admingroup'].xuanhtml(caidan[m].men,'competence['+m+']'));
                }
                mm++;
            }
            html +='</ul>';
            html +='<div class="layui-tab-content">';
            html +=zuhe;       
            html +='</div></div></div>';
             
        }

        html+=jsfrom('tt'+$class+'($$) ($$)submit($$)($$)layer.close(OPID);ELi[\'admin/admingroup\'].init()($$)提交($$)tijiao');
        html+="</form>";
        var title = diercai=='put'?"编辑权限组":'新建权限组';
            OPID = layer.open({
            type: 1,
            zIndex:10000,
            title:title,
            area:['100%', '100%'],
            fixed: true, 
            maxmin: true,
            content: html,
            success: function(layero, index){
                for(var x in xuanid){
                    layui.tree.render({
                        elem: '#tree'+$class+""+x
                        ,data: xuanid[x]
                        ,showCheckbox: true  //是否显示复选框
                    });
                }
            }
        });


        layui.form.on('submit(tt'+$class+')', function(formdata){
            formdata = formdata.field;
            formdata.Format = 'json';

            console.log(formdata);
           
            $.post(PLUG+"admingroup"+FENGE+TOKEN+FENGE+diercai,formdata,function(data){
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
                    ELi['admin/admingroup'].get();
                    layer.close(OPID);
                }
               

              }else{
                
                layer.msg(data.msg,{zIndex:99999,offset: 'c',time: 2000});
              }
            });
            return false;
          });

          $("#"+$class+"admin_admingrouppiliangquan").click(function(){
            var zuclass = '.admingroup'+$class+' ';
            var l =$(zuclass+"input:checked").length;
            if(l > 0){
                $(zuclass+"input:checkbox").prop("checked",false);
            }else{
                $(zuclass+"input:checkbox").prop("checked",true);
            }
            layui.form.render('checkbox');
    
        });
        $("#"+$class+"admin_admingrouppilimode0").click(function(){
            var zuclass = '.admingroup'+$class+' ';
            var l = $(zuclass+"input.mode0:checked").length;
            if(l > 0) $(zuclass+"input.mode0:checkbox").prop("checked",false);
            else  $(zuclass+"input.mode0:checkbox").prop("checked",true);
            layui.form.render('checkbox');
        });
        $("#"+$class+"admin_admingrouppilimode1").click(function(){
            var zuclass = '.admingroup'+$class+' ';
            var l = $(zuclass+"input.mode1:checked").length;
            if(l > 0) $(zuclass+"input.mode1:checkbox").prop("checked",false);
            else  $(zuclass+"input.mode1:checkbox").prop("checked",true);
            layui.form.render('checkbox');
        });
        $("#"+$class+"admin_admingrouppilimode2").click(function(){
            var zuclass = '.admingroup'+$class+' ';
            var l = $(zuclass+"input.mode2:checked").length;
            if(l > 0) $(zuclass+"input.mode2:checkbox").prop("checked",false);
            else  $(zuclass+"input.mode2:checkbox").prop("checked",true);
            layui.form.render('checkbox');
        });
        $("#"+$class+"admin_admingrouppilimode3").click(function(){
            var zuclass = '.admingroup'+$class+' ';
            var l = $(zuclass+"input.mode3:checked").length;
            if(l > 0) $(zuclass+"input.mode3:checkbox").prop("checked",false);
            else  $(zuclass+"input.mode3:checkbox").prop("checked",true);
            layui.form.render('checkbox');
        });

        $(".admin_admingroupdquanxuan").click(function(){
            var zuclass = '.admingroup'+$class+' ';
            var idd = $(this).attr('data');
            if(idd ){
                var l = $(zuclass+"input."+idd+":checked").length;
                if(l > 1) $(zuclass+"input."+idd+":checkbox").prop("checked",false);
                else $(zuclass+"input."+idd+":checkbox").prop("checked",true);
                layui.form.render('checkbox');
            }
            
           
    
        });
        $(".admin_admingroupchajianxuan").click(function(){
            var zuclass = '.admingroup'+$class+' ';
            var idd = $(this).attr('data');
            if(idd ){
                var l = $(zuclass+"input."+idd+":checked").length;
                if(l > 1) $(zuclass+"input."+idd+":checkbox").prop("checked",false);
                else $(zuclass+"input."+idd+":checkbox").prop("checked",true);
                layui.form.render('checkbox');
            }
        });


        layui.form.render();

        
    

    },add(){

    
        ELi['admin/admingroup'].edit({
            data:{
                id:"",
                name:"",
                describes:"",
                competence:""
            }
        },'add');

    },del(OBJ){
    var fromdata = {
        Format:'json',
        id:OBJ.data.id
        };
        $.post(PLUG+"admingroup"+FENGE+TOKEN+FENGE+'del',fromdata,function(data){
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

    },get(){
        $("#LAY_app_body ."+$class).html('<div class="layui-fluid"><div class="layui-card"><div class="layui-card-body" style="padding: 15px;"><table class="layui-hide" id="user'+$class+'" lay-filter="user'+$class+'"></table></div></div></div>');
        layui.table.render({
        elem: '#user'+$class
        ,url: PLUG+'admingroup'+FENGE+TOKEN+FENGE+'get'
        ,toolbar:'<div><a class="layui-btn layui-btn-normal" lay-event="add"><i class="layui-icon layui-icon-addition"></i>新增</a> <a class="layui-btn " lay-event="refresh"><i class="layui-icon layui-icon-refresh-3"></i> 刷新</a></div>'
       ,cols: [[
            {field:'id', title: 'ID', width:80,  fixed: true}
            ,{field:'name', title: '权限名字'}
            
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
            if(data.Groups){
                ELi['admin/admingroup'].Groups = data.Groups;
            }
        
        }
        });

        layui.table.on('toolbar(user'+$class+')', function(obj){
        if(obj.event === 'add'){
            ELi['admin/admingroup'].add();
        }else if(obj.event === 'refresh'){
            layer.closeAll();
            ELi['admin/admingroup'].init();
        }
        });

        layui.table.on('tool(user'+$class+')', function(obj){
        if(obj.event === 'del'){
            layer.confirm('真的要删除吗?', function(index){
            ELi['admin/admingroup'].del(obj);
            layer.close(index);
            });
        }else if(obj.event === 'edit'){
            ELi['admin/admingroup'].edit(obj);
        }
        });
        layui.table.render();


    }


};
ELi['admin/admingroup'].init();