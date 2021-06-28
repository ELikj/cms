ELi['admin/features'] = {
    off: {},
    caijie: {},
    menuconfig: {},
    init() {
        ELi['admin/features'].get();

    },
    jiacaidan() {

        layer.prompt({
            title: '请输入增加的菜单的名字',
            formType: 0,
            zIndex: 10002
        }, function (pass, index) {
            layer.close(index);

            var html = jsfrom([
                'configure_' + pass,
                pass,
                'caidan',
                '',
                '',
                []

            ]);

            $('.' + $class + 'xxxxlist2').append(html);
        });

    },
    jixuxuan(men, xiabio, zeng) {
        var xx = "";


        for (var i in men) {
            xx += '<option value="' + xiabio + 'X$V' + i + '">' + zeng + men[i].name + '</option>';

            if (men[i].men) {

                xx += ELi['admin/features'].jixuxuan(men[i].men, xiabio + 'X$V' + i, zeng + "--");

            }
        }


        return xx;

    },
    trueshouw() {
        layui.tree.render({
            elem: '#' + $class + 'xxxxlist3',
            data: ELi['admin/features'].xuandata(ELi['admin/features'].menuconfig),
            edit: ['del'] //操作节点的图标
                ,
            onlyIconControl: true,
            operate: function (obj) {
                var type = obj.type; //得到操作类型：add、edit、del
                var data = obj.data; //得到当前节点的数据
                p(data);
                if (type === 'del') { //删除节点
                    var fenge = data.id.split('X$V');

                    var temp = ELi['admin/features'].menuconfig;
                 
                    if (fenge.length > 1) {
                        var shangge = fenge.length - 1;
                        for (var x in fenge) {
                            if (x == '0') {
                                temp = temp[fenge[x]];
                            } else if (x >= shangge) {
                                break;
                            } else {
                                temp = temp['men'][fenge[x]];
                            }
                        }
                        if(temp && typeof(temp['men']) != "undefined" ){
                            delete(temp['men'][fenge[shangge]]);
                            var jishu = 0;
                            for (var x in temp['men']) {
                                jishu++;
                            }
                            if (jishu < 1) {
                                delete(temp['men']);
                            }
                        }
                        


                    } else {
                        delete(ELi['admin/features'].menuconfig[fenge[0]]);
                    }

                    
                };
                return true;
            }
          
        });


    },
    xuandatahh(shujuxxx, name) {
        var data = [];
        for (var m in shujuxxx) {
            var hhda = {
                title: shujuxxx[m].name,
                id: name + 'X$V' + m,
                field: m
            }
            if (shujuxxx[m].men) {
                hhda.children = ELi['admin/features'].xuandatahh(shujuxxx[m].men, name + 'X$V' + m);
            }
            data.push(hhda);
        }
        return data;
    },
    xuandata(shujuxxx) {
        var data = [];
        for (var m in shujuxxx) {
            var hhda = {

                title: shujuxxx[m].name,
                id: m,
                field: m
            }
            if (shujuxxx[m].men) {
                hhda.children = ELi['admin/features'].xuandatahh(shujuxxx[m].men, m);
            }
            data.push(hhda);

        }

        return data;
    },
    jiacaidanpeizhi(zhi) {
        if (zhi == 0) {
            ELi['admin/features'].caijie = {};
        }

        var biaoti = [
            "菜单标识 小写英文为主",
            "菜单名称",
            "菜单图标 内置图标layui-icon-xxxx",
            "菜单其他链接",
            "选择顶级菜单"
        ];

        if (zhi < 4) {

            layer.prompt({
                title: biaoti[zhi],
                formType: 0,
                zIndex: 10002
            }, function (pass, index) {
                if (zhi == 0 || zhi == 1) {
                    if (pass == "") {
                        layer.msg("不能为空", {
                            zIndex: 10003
                        });
                        return false;
                    }

                }
                layer.close(index);
                ELi['admin/features'].caijie[zhi] = pass;
                ELi['admin/features'].jiacaidanpeizhi(zhi + 1);

            });

        } else {

            var hhhh = '<option value="">顶级分类</option>';
            var caidanx = ELi['admin/features'].menuconfig;
            for (var m in caidanx) {
                hhhh += '<option value="' + m + '">' + caidanx[m].name + '</option>';
                if (caidanx[m].men) {
                    hhhh += ELi['admin/features'].jixuxuan(caidanx[m].men, m, "--");
                }
            }

            layer.open({
                title: '选择所属分类',
                zIndex: 10002

                    ,
                content: '<select id="select' + $class + '">' + hhhh + '</select>',
                yes: function (index) {
                    layer.close(index);
                    var tadhie = $("#select" + $class).val();
                    var typexia = ELi['admin/features'].caijie[0];
                    var caidan = {
                        name: ELi['admin/features'].caijie[1],
                        typeico: ELi['admin/features'].caijie[2],
                        link: ELi['admin/features'].caijie[3]
                    };

                    if (tadhie == "") {

                        ELi['admin/features'].menuconfig[typexia] = caidan;


                    } else {


                        var fenge = tadhie.split('X$V');
                        var temp = ELi['admin/features'].menuconfig;
                        for (var x in fenge) {
                            temp = temp[fenge[x]];
                        }

                        if (typeof (temp.men) == "undefined") {
                            temp.men = {};
                        }
                        temp.men[typexia] = caidan;

                    }
                    ELi['admin/features'].trueshouw();


                }
            });



        }




    },
    get() {

        $("#LAY_app_body ." + $class).html('<style> .' + $class + ' .qfys0{color:red;} .' + $class + ' .qfys1{color:green;}  .' + $class + 'xxxxlist2 .layui-form-label{width:120px;} .' + $class + 'xxxxlist3 .layui-input-block{margin-left:0px;}</style><div class="layui-fluid"><div class="layui-card"><div class="layui-card-body" style="padding: 15px;"><table class="layui-hide" id="user' + $class + '" lay-filter="user' + $class + '"></table></div></div></div>');
        layui.table.render({
            elem: '#user' + $class,
            url: PLUG + 'features' + FENGE + TOKEN + FENGE + 'get',
            toolbar: '<div><a class="layui-btn layui-btn-normal" lay-event="add"><i class="layui-icon layui-icon-addition"></i>新增</a> <a class="layui-btn " lay-event="refresh"><i class="layui-icon layui-icon-refresh-3"></i> 刷新</a> <div class="layui-inline" > <form name="form"  class="layui-form ccc' + $class + '"> <div class="layui-inline" > <select name="beninstall"></select> </div> <div class="layui-inline" ><button class="layui-btn" type="submit" lay-submit="" name="ccc' + $class + '" style="" lay-filter="ccc' + $class + '">安装本地插件</button></div>  </form></div>  </div>',
            cols: [
                [{
                        field: 'id',
                        title: 'ID',
                        width: 80,
                        fixed: true
                    }, {
                        field: 'name',
                        title: '插件名字'
                    }, {
                        field: 'pluginid',
                        title: '插件标识'
                    }

                    , {
                        field: 'version',
                        title: '插件版本'
                    }, {
                        field: 'main',
                        title: '显子菜单',
                        templet: function (d) {

                            return '<span class="qfys' + d.main + '">' + ELi['admin/features'].off[d.main] + '</span>';
                        }
                    }, {
                        field: 'off',
                        title: '插件状态',
                        templet: function (d) {

                            return '<span class="qfys' + d.off + '">' + ELi['admin/features'].off[d.off] + '</span>';
                        }
                    }, {
                        field: 'atime',
                        title: '安装时间',
                        templet: function (d) {

                            return time(d.atime);
                        }
                    }

                    , {
                        title: '操作',
                        templet: function (d) {
                            return '<a class="layui-btn layui-btn-xs" lay-event="edit"><i class="layui-icon layui-icon-edit"></i>编辑</a><a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i class="layui-icon layui-icon-delete"></i>删除</a>';
                        }
                    }
                ]
            ],
            limit: 20

                ,
            page: true,
            done: function (data, curr, count) {
                if (data.token && data.token != "") {
                    TOKEN = data.token;
                }
                if (data.off) {
                    ELi['admin/features'].off = data.off;
                }
                if (data.install) {

                   
                    var xx = "";
                    var lji = 0;
                    for(var tt in data.install){
                        lji++;
                        xx += '<option value="'+tt+'">'+tt+'</option>';
                    }
                
                    if(lji > 0){
                        $(".ccc"+ $class).show();
                        $(".ccc"+ $class +" select").html(xx);
                    }else{
                        $(".ccc"+ $class).hide();
                    }
                    
               


                }else{
                    $(".ccc"+ $class).hide();
                }   



            }
        });

        layui.table.on('toolbar(user' + $class + ')', function (obj) {
            if (obj.event === 'add') {
                ELi['admin/features'].add();
            } else if (obj.event === 'refresh') {
                layer.closeAll();
                ELi['admin/features'].init();
            }
        });

        layui.table.on('tool(user' + $class + ')', function (obj) {
            if (obj.event === 'del') {
                layer.confirm('真的要删除吗?', function (index) {
                    ELi['admin/features'].del(obj);
                    layer.close(index);
                });
            } else if (obj.event === 'edit') {
                ELi['admin/features'].edit(obj);
            }
        });

        layui.form.on('submit(ccc' + $class + ')', function (formdata) {
            formdata = formdata.field;
            formdata.Format = 'json';
           
            $.post(PLUG + "features" + FENGE + TOKEN + FENGE + "add", formdata, function (data) {
                if (data.token && data.token != "") {
                    TOKEN = data.token;
                }
                if (data.code == 99) {
                    layer.close(OPID);
                    layer.msg("请登陆", {
                        offset: 'c',
                        time: 2000
                    }, function () {
                        loadjs("home");
                    });
                } else if (data.code == 1) {

                    
                    ELi['admin/features'].get();
                    layer.msg(data.msg, {
                        zIndex: 99999,
                        offset: 'c',
                        time: 2000
                    });


                } else {

                    layer.msg(data.msg, {
                        zIndex: 99999,
                        offset: 'c',
                        time: 2000
                    });
                }
               
            });

            return false;
        });

        layui.table.render();

    },
    edit(OBJ, diercai) {
        if (diercai != "add") {
            diercai = "put";
        }
        window.UIMUI = Array();
        var D = OBJ.data;
        var BIAO = [];
        var html = '<form name="form" id="form" class="layui-form ' + $class + '">';

        html += '<div class="layui-tab"><ul class="layui-tab-title"><li class="layui-this"><i class="layui-icon layui-icon-about"></i> 插件信息</li><li><i class="layui-icon layui-icon-set-fill"></i> 基础配置</li><li><i class="layui-icon layui-icon-form"></i> 参数配置</li><li><i class="layui-icon layui-icon-spread-left"></i> 菜单配置</li></ul>';
        html += '<div class="layui-tab-content">';

        html += '<div class="layui-tab-item layui-show">';
        BIAO = [
            'id($$)id($$)hidden($$)($$)id($$)' + D.id,
            'pluginid($$)插件标识($$)text($$)($$)插件标识($$)' + D.pluginid,
            'name($$)插件名字($$)text($$)($$)插件名字($$)' + D.name,
            'describes($$)插件描述($$)text($$)($$)插件描述($$)' + D.describes,
            'author($$)插件作者($$)text($$)($$)插件作者($$)' + D.author,
            'authorlink($$)作者网址($$)text($$)($$)作者网址($$)' + D.authorlink,
            'version($$)插件版本($$)text($$)($$)插件版本($$)' + D.version,
            'branch($$)分支版本($$)text($$)($$)分支版本($$)' + D.branch,


            'atime($$)安装时间($$)time($$)($$)安装时间($$)' + D.atime,


        ];
        for (var z in BIAO) {
            html += jsfrom(BIAO[z]);
        }

        html += "</div>";


        html += '<div class="layui-tab-item">';
        BIAO = [


            'display($$)前台显示($$)select($$)($$)ELi[\'admin/features\'].off($$)' + D.display,

            'off($$)插件状态($$)select($$)($$)ELi[\'admin/features\'].off($$)' + D.off,
            'main($$)显子菜单($$)select($$)($$)ELi[\'admin/features\'].off($$)' + D.main,
            'typeico($$)插件图标($$)text($$)($$)插件图标名字($$)' + D.typeico,
            'type($$)插件类型($$)text($$)($$)插件类型($$)' + D.type,
            'callfunction($$)默认调用($$)text($$)($$)默认调用($$)' + D.callfunction,
            'authorizedid($$)授权id($$)text($$)($$)授权id($$)' + D.authorizedid,
            'authorizedkey($$)授权key($$)text($$)($$)授权key($$)' + D.authorizedkey,


        ];
        for (var z in BIAO) {
            html += jsfrom(BIAO[z]);
        }

        html += "</div>";





        html += '<div class="layui-tab-item">';
        html += '<div class="' + $class + 'xxxxlist2">';
        html += jsfrom('图片上传($$)图片上传($$)update($$)($$)($$)');
        if (D.configure) {
            for (var i in D.configure) {

                html += jsfrom([
                    'configure_' + i,
                    i,
                    'caidan',
                    '',
                    '',
                    D.configure[i]

                ]);
            }
        }
        html += "</div>";

        html += '<div class="layui-form-item"><label class="layui-form-label"></label><div class="layui-input-block" ><a class="layui-btn layui-btn-normal" onclick="ELi[\'admin/features\'].jiacaidan()"><i class="layui-icon layui-icon-addition"></i>增加参数配置</a></div></div>';

        html += "</div>";

        html += '<div class="layui-tab-item ' + $class + 'xxxxlist3"><div  id="' + $class + 'xxxxlist3">';


        html += "</div>";
        html += '<div class="layui-form-item"><label class="layui-form-label"></label><div class="layui-input-block" ><a class="layui-btn layui-btn-normal" onclick="ELi[\'admin/features\'].jiacaidanpeizhi(0)"><i class="layui-icon layui-icon-addition"></i>增加菜单配置</a></div></div>';
        html += "</div>";
        html += jsfrom('ff' + $class + '($$)($$)submit($$)($$)layer.close(OPID);ELi[\'admin/features\'].init()($$)提交($$)tijiao');
        html += "</div></form>";
        var title = "编辑插件";
        OPID = layer.open({
            type: 1,
            zIndex: 10000,
            title: title,
            area: ['100%', '100%'],
            fixed: true,
            maxmin: true,
            content: html,
            success: function (layero, index) {

                if (D.menuconfig) {
                    ELi['admin/features'].menuconfig = D.menuconfig;
                } else {
                    ELi['admin/features'].menuconfig = {};
                }

                if (ELi['admin/features'].menuconfig.length == 0) {
                    ELi['admin/features'].menuconfig = {};
                }


                ELi['admin/features'].trueshouw();


            }
        });


        layui.form.on('submit(ff' + $class + ')', function (formdata) {
            formdata = formdata.field;
            formdata.Format = 'json';
            //console.log( ELi['admin/features'].menuconfig );
            formdata.menuconfig = JSON.stringify(ELi['admin/features'].menuconfig);
            //console.log(formdata);

            $.post(PLUG + "features" + FENGE + TOKEN + FENGE + diercai, formdata, function (data) {
                if (data.token && data.token != "") {
                    TOKEN = data.token;
                }
                if (data.code == 99) {
                    layer.close(OPID);
                    layer.msg("请登陆", {
                        offset: 'c',
                        time: 2000
                    }, function () {
                        loadjs("home");
                    });
                } else if (data.code == 1) {

                    if (diercai == "put") {
                        OBJ.update(data.data);
                        layer.close(OPID);
                    } else {
                        ELi['admin/features'].get();
                        layer.close(OPID);
                    }


                } else {

                    layer.msg(data.msg, {
                        zIndex: 99999,
                        offset: 'c',
                        time: 2000
                    });
                }
            });



            return false;
        });
        layui.form.render();



    },
    add() {
        ELi['admin/features'].edit({
            data: {
                "id": "0",
                "pluginid": "",
                "type": "",
                "typeico": "",
                "name": "",
                "describes": "",
                "author": "",
                "authorlink": "",
                "version": "",
                "off": "1",
                "branch": "",
                "atime": "",
                "authorizedid": "",
                "authorizedkey": "",
                "configure": {},
                "display": "0",
                "callfunction": "",
                "menuconfig": {}
            }
        }, 'add');

    },
    del(OBJ) {
        var fromdata = {
            Format: 'json',
            id: OBJ.data.id
        };
        $.post(PLUG + "features" + FENGE + TOKEN + FENGE + 'del', fromdata, function (data) {
            if (data.token && data.token != "") {
                TOKEN = data.token;
            }
            if (data.code == 99) {
                layer.msg("请登陆", {
                    offset: 'c',
                    time: 2000
                }, function () {
                    loadjs("home");
                });
            } else if (data.code == 1) {
                OBJ.del();
            } else {
                layer.msg(data.msg, {
                    zIndex: 99999,
                    offset: 'c',
                    time: 2000
                });
            }
        });


    }
}
ELi['admin/features'].init();