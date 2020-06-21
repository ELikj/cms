ELi['xgame/list'] = {
    url: dir + Plus + FENGE + "xgame" + FENGE + "list" + FENGE,
    init: function () {
        ELi['xgame/list'].get();
    },
    edit(OBJ, diercai) {
        if (diercai != "add") {
            diercai = "put";
            var title = "编辑用户";
        } else {
            var title = "新建用户";
        }
        window.UIMUI = Array();
        var D = OBJ.data;
        var BIAO = [];
        var html = '<form name="form" id="form" class="layui-form ' + $class + '">';
        BIAO = [
            'id($$)id($$)hidden($$)($$)id($$)' + D.id,
        ];

        for (var z in BIAO) {
            html += jsfrom(BIAO[z]);
        }

        html += jsfrom('ff' + $class + '($$)($$)submit($$)($$)layer.close(OPID);ELi[\'xgame/list\'].init()($$)提交($$)tijiao');
        html += "</form>";
        OPID = layer.open({
            type: 1,
            zIndex: 10000,
            title: title,
            area: ['100%', '100%'],
            fixed: true,
            maxmin: true,
            content: html,
            success: function (layero, index) {
            }
        });

        layui.form.on('submit(ff' + $class + ')', function (formdata) {
            formdata = formdata.field;
            formdata.Format = 'json';
            apptongxin(ELi['xgame/list'].url + TOKEN + FENGE + diercai, formdata, function (data) {
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
                        ELi['xgame/list'].get();
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
    del(OBJ) {
        var fromdata = {
            Format: 'json',
            id: OBJ.data.id
        };
        apptongxin(ELi['xgame/list'].url + TOKEN + FENGE + 'del', fromdata, function (data) {
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
    },
    add() {
        ELi['xgame/list'].edit({
            data: {
                "id": "0"
            }
        }, 'add');

    },
    get() {
        $("#LAY_app_body ." + $class).html('<style> .' + $class + ' .qfys0{color:#FF5722;} .' + $class + ' .qfys1{color:#009688;}.' + $class + ' .qfys2{color:green;}.' + $class + ' .qfys3{color:#1E9FFF;}</style><div class="layui-fluid"><div class="layui-card"><div class="layui-card-body" style="padding: 15px;">'
            +
            '<div class="' + $class + 'saixuan" style="display:none;margin-bottom:8px;"><form name="form" class="layui-form"><div class="layui-inline" style="width:128px;"><select name="so_type" class="so_var"></select> </div> <div class="layui-inline" style="width:88px;"> <input class="layui-input so_var" name="so_uid" autocomplete="off" placeholder="用户UID"> </div>  <div class="layui-inline" style="width:88px;"> <input class="layui-input so_var" name="so_name" placeholder="应用名字" autocomplete="off"> </div>  <div class="layui-inline" style="width:88px;"><input class="layui-input so_var"  value="shuaxin" name="so_shuaxin" type="hidden" autocomplete="off"> <input class="layui-input so_var" placeholder="应用标识" name="so_mark" autocomplete="off"> </div> <div class="layui-inline" style="width:88px;"> <input class="layui-input so_var" placeholder="开始时间" id="so_atimestart' + $class + '" name="so_atimestart" autocomplete="off"> </div> <div class="layui-inline" style="width:88px;"> <input class="layui-input so_var" placeholder="结束时间" id="so_atimeend' + $class + '" name="so_atimeend" autocomplete="off"> </div>   <button class="layui-btn" lay-event="sousuo" lay-submit lay-filter="tijiao' + $class + '">搜索</button></form> </div>'
            +
            '<table class="layui-hide" id="user' + $class + '" lay-filter="user' + $class + '"></table></div></div></div>');
        layui.table.render({
            elem: '#user' + $class,
            url: ELi['xgame/list'].url + TOKEN + FENGE + 'get',
            toolbar: '<div><a class="layui-btn layui-btn-normal" lay-event="add"><i class="layui-icon layui-icon-addition"></i>新增</a> <a class="layui-btn " lay-event="refresh"><i class="layui-icon layui-icon-refresh-3"></i> 刷新</a> <a class="layui-btn layui-btn-danger" lay-event="saixuan"><i class="layui-icon layui-icon-search"></i>筛选</a> </div>',
            cols: [
                [{
                    field: 'id',
                    title: 'ID',
                    width: 80,
                    fixed: true
                }, {
                    field: "uid",
                    title: "上传用户"
                }, {
                    field: "name",
                    title: "应用名字"
                }, {
                    field: "mark",
                    title: "应用标识"
                }, {
                    field: "type",
                    title: "应用类型",
                    templet: function (d) {

                        return ELi['xgame/list'].type[d.type];
                    }
                }, {
                    field: "version",
                    title: "应用版本"
                }, {
                    field: "off",
                    title: "应用状态",
                    templet: function (d) {

                        return '<span class="qfys' + d.off + '">' + ELi['xgame/list'].off[d.off] + '</span>';
                    }
                }, {
                    field: "atime",
                    title: "添加时间",
                    templet: function (d) {

                        return time(d.atime);
                    }
                }, {

                    title: '操作',
                    templet: function (d) {
                        return '<a class="layui-btn layui-btn-xs" lay-event="edit"><i class="layui-icon layui-icon-edit"></i>编辑</a><a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i class="layui-icon layui-icon-delete"></i>删除</a>';
                    }
                }]
            ],
            limit: 20,
            page: true,
            done: function (data, curr, count) {
                if (data.token && data.token != "") {
                    TOKEN = data.token;
                }

                if (data.off) {
                    ELi['xgame/list'].off = data.off;
                    layui.laydate.render({
                        elem: '#so_atimestart' + $class,
                        format: 'yyyy-MM-dd' //可任意组合
                    });
                    layui.laydate.render({
                        elem: '#so_atimeend' + $class,
                        format: 'yyyy-MM-dd' //可任意组合
                    });
                    var xxx = '<option value="">全部类型</option>';
                    for (var n in data.off) {
                        xxx += '<option value="' + n + '">' + data.off[n] + '</option>';
                    }
                    $('.' + $class + ' [name="so_type"]').html(xxx);
                    layui.form.render();
                }  
            }
        });
        layui.table.on('toolbar(user' + $class + ')', function (obj) {
            if (obj.event === 'add') {
                ELi['xgame/list'].add();
            } else if (obj.event === 'refresh') {
                layer.closeAll();
                ELi['xgame/list'].init();
            } else if (obj.event === 'saixuan') {
                $("." + $class + "saixuan").toggle();
            }
        });

        layui.table.on('tool(user' + $class + ')', function (obj) {
            if (obj.event === 'del') {
                layer.confirm('真的要删除吗?', function (index) {
                    ELi['xgame/list'].del(obj);
                    layer.close(index);
                });
            } else if (obj.event === 'edit') {
                ELi['xgame/list'].edit(obj);
            }
        });

        layui.form.on('submit(tijiao' + $class + ')', function (formdata) {
            formdata = formdata.field;
            var zuhesou = {};
            $('.' + $class + 'saixuan .so_var').each(function (i, v) {
                if ($(v).val() != "") {
                    zuhesou[$(v).attr('name').replace('so_', '')] = $(v).val();
                }
            });
            layui.table.reload('user' + $class, {
                page: {
                    curr: 1 //重新从第 1 页开始
                },
                url: ELi['xgame/list'].url + TOKEN + FENGE + 'get',
                where: zuhesou
            });
            return false;
        });

        layui.table.render();
    }
}
ELi['xgame/list'].init();