<?php if( !defined( 'ELikj')){ exit( 'Error ELikj'); }
/* 
 * 系统名称：以厘php框架
 * 官方网址：https://eLiphp.com
 * 版权所有：2009-2021 以厘科技 (https://eLikj.com) 并保留所有权利。 
 * 代码协议：开源代码协议 Apache License 2.0 详见 http://www.apache.org/licenses/
 */

class ELikj_admin{

    public  $plugin = "admin";
    function INSTALL($CANSHU,$features){
        $GLOBALS['head'] = "html";
        global $ELiHttp,$ELiConfig;
        
        ELiCreate( ELikj.'../attachment/');
        $pad =  [
            'ELiConfig_dir' => "网站目录",
            'ELiConfig_host' => "运行域名",
            'ELiDataBase_hostname'=> "数据库链接",
            'ELiDataBase_database'=> "数据库名字",
            'ELiDataBase_username'=> "数据库账号",
            'ELiDataBase_hostport'=> "数据库端口",
            'ELiDataBase_prefix'=> "数据表前缀"
         ];
        if(isset($_POST['isinstall'])){
            foreach( $pad as $k =>$v){
                if(strlen($_POST[$k]) < 1){
                    return echoapptoken([],-1,$v."错误");
                }
                $_POST[$k] =  trim(str_replace(['"','"','\\'],['','',''],$_POST[$k]));
            }
            if(strlen($_POST['adminname']) < 4){
                return echoapptoken([],-1,"管理账号错误");
            }
            if(strlen($_POST['adminpass']) < 6){
                return echoapptoken([],-1,"管理密码错误");
            }
            $pad['ELiDataBase_password'] = '数据库密码';
            global $ELiDataBase;
            $ELiDataBase = array(
                "write" => array(
                    'numbering' => '主数据库',
                    'hostname' => $_POST['ELiDataBase_hostname'],
                    'database' => '',
                    'username' => $_POST['ELiDataBase_username'],
                    'password' => $_POST['ELiDataBase_password'],
                    'hostport' => $_POST['ELiDataBase_hostport'],
                    'charset'  => "utf8mb4",
                    'prefix'   => $_POST['ELiDataBase_prefix']
                )
            );
            
            $db = db("", $ELiDataBase);

            $dbx = "CREATE DATABASE IF NOT EXISTS ". ELiSql($_POST['ELiDataBase_database'])." DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_general_ci;";

            $ff = $db  ->qurey($dbx,"accse");
            $ELiDataBase['write']['database'] = $_POST['ELiDataBase_database'];
            $db = db("", $ELiDataBase);

            $sql = "SET NAMES utf8mb4;SET FOREIGN_KEY_CHECKS = 0;DROP TABLE IF EXISTS `ELi_admin`;CREATE TABLE `ELi_admin` (  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',  `account` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '管理帐号',  `password` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '管理密码',  `area` bigint unsigned DEFAULT '0' COMMENT '地区',  `super` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '超级密码',  `groups` int unsigned DEFAULT '0' COMMENT '管理组权限',  `verifyip` tinyint unsigned DEFAULT '0' COMMENT '强行验证用户ip',  `off` tinyint unsigned DEFAULT '0' COMMENT '帐号开关',  `ip` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '登录ip',  `atime` int unsigned DEFAULT '0' COMMENT '登录时间',  `sessionid` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '',  PRIMARY KEY (`id`),  KEY `id` (`id`),  KEY `account` (`account`)) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='管理员';BEGIN;INSERT INTO `ELi_admin` VALUES (1, 'admin', 'cac01bfe0422801a36', 0, '', 0, 0, 1, '192.168.0.13', 1591698990, '960d2500a59c919dd9698c1e4daeb8a155cfd111ffb724d1df9a83a3c2639471');COMMIT;DROP TABLE IF EXISTS `ELi_admingroup`;CREATE TABLE `ELi_admingroup` (  `id` bigint unsigned NOT NULL AUTO_INCREMENT,  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '权限组名字',  `describes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '描述',  `competence` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '权限',  PRIMARY KEY (`id`)) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='管理权限组';DROP TABLE IF EXISTS `ELi_adminlog`;CREATE TABLE `ELi_adminlog` (  `id` bigint unsigned NOT NULL AUTO_INCREMENT COMMENT '日志id',  `uid` bigint unsigned DEFAULT '0' COMMENT '管理uid',  `type` int unsigned DEFAULT '0' COMMENT '日志类型',  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '详细数据',  `ip` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '产生ip',  `atime` int unsigned DEFAULT '0' COMMENT '时间',  `controller` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '控制器',  `mode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '处理方式',  PRIMARY KEY (`id`),  KEY `uid` (`uid`),  KEY `type` (`type`),  KEY `controller` (`controller`(250)),  KEY `mode` (`mode`(250))) ENGINE=MyISAM AUTO_INCREMENT=208 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='管理员日志';DROP TABLE IF EXISTS `ELi_config`;CREATE TABLE `ELi_config` (  `id` bigint unsigned NOT NULL AUTO_INCREMENT,  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '读取类型',  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '配置描述',  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '配置详情',  PRIMARY KEY (`id`),  KEY `type` (`type`)) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='系统配置';DROP TABLE IF EXISTS `ELi_currencylog`;CREATE TABLE `ELi_currencylog` (  `id` bigint unsigned NOT NULL AUTO_INCREMENT,  `uid` bigint unsigned DEFAULT '0' COMMENT '用户uid',  `pluginid` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '插件名字',  `type` int unsigned DEFAULT '0',  `num` decimal(30,5) DEFAULT '0.00000',  `data` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '详情',  `atime` int unsigned DEFAULT '0' COMMENT '时间',  `ip` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT 'ip',  `off` bigint DEFAULT 0 COMMENT '独立标识',  PRIMARY KEY (`id`),  KEY `uid` (`uid`),  KEY `pluginid` (`pluginid`),  KEY `type` (`type`),  KEY `atime` (`atime`),  KEY `ip` (`ip`),  KEY `off` (`off`),  KEY `data` (`data`),  KEY `num` (`num`),  KEY `pluginid_type` (`pluginid`,`type`),  KEY `uid_type` (`uid`,`type`) USING BTREE) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='货币日志';DROP TABLE IF EXISTS `ELi_features`;CREATE TABLE `ELi_features` (  `id` bigint unsigned NOT NULL AUTO_INCREMENT,  `pluginid` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '插件唯一标示',  `type` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '插件类型',  `typeico` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '插件图标',  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '插件名字',  `describes` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '插件描述',  `author` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '作者',  `authorlink` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '作者的网店',  `version` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '版本号码',  `off` tinyint unsigned DEFAULT '0' COMMENT '插件状态',  `branch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '版本分支',  `atime` int unsigned DEFAULT '0' COMMENT '录入时间',  `authorizedid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '授权id',  `authorizedkey` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '授权key',  `configure` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '插件配置参数',  `display` tinyint unsigned DEFAULT '0' COMMENT '前段显示',  `callfunction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '前段调用函数',  `menuconfig` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '配置后台显示菜单',  `main` tinyint unsigned DEFAULT '0' COMMENT '拥有的子菜显示为大菜单',  PRIMARY KEY (`id`),  UNIQUE KEY `pluginid` (`pluginid`),  KEY `type` (`type`),  KEY `type_2` (`type`,`off`)) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='插件列表';BEGIN;INSERT INTO `ELi_features` VALUES (1, 'admin', '', 'layui-icon-console', '管理后台', '基础管理后台', 'U', 'https://www.elikj.com/', '1', 1, '', 1585446010, '', '', '{\"verifyip\":[\"关闭\",\"开启\"],\"off\":[\"关闭\",\"开启\"],\"off2\":[\"关闭\",\"开启\"],\"adminlogtype\":[\"登陆\",\"退出\",\"挤掉\",\"修改\",\"插入\",\"删除\"],\"userlogtype\":[\"登陆\",\"退出\",\"挤掉\",\"修改\",\"插入\",\"删除\"],\"currencylog\":[\"测试1\",\"唱的his2\"]}', 0, '', '{\"admin\":{\"name\":\"管理里员\",\"typeico\":\"layui-icon-friends\",\"link\":\"\"},\"admingroup\":{\"name\":\"权限管理\",\"typeico\":\"layui-icon-group\",\"link\":\"\"},\"adminlog\":{\"name\":\"管理日志\",\"typeico\":\"layui-icon-table\",\"link\":\"\"},\"features\":{\"name\":\"插件管理\",\"typeico\":\"layui-icon-engine\",\"link\":\"\"},\"config\":{\"name\":\"通用配置\",\"typeico\":\"layui-icon-set\",\"link\":\"\"},\"currencylog\":{\"name\":\"货币日志\",\"typeico\":\"layui-icon-dollar\",\"link\":\"\"},\"integrallog\":{\"name\":\"积分日志\",\"typeico\":\"layui-icon-diamond\",\"link\":\"\"},\"moneylog\":{\"name\":\"金额日志\",\"typeico\":\"layui-icon-rmb\",\"link\":\"\"},\"user\":{\"name\":\"用户管理\",\"typeico\":\"layui-icon-user\",\"link\":\"\"},\"userlog\":{\"name\":\"用户日志\",\"typeico\":\"layui-icon-list\",\"link\":\"\"},\"memcached\":{\"name\":\"数据库KV\",\"typeico\":\"layui-icon-find-fill\",\"link\":\"\"}}', 0);COMMIT;DROP TABLE IF EXISTS `ELi_integrallog`;CREATE TABLE `ELi_integrallog` (  `id` bigint unsigned NOT NULL AUTO_INCREMENT,  `uid` bigint unsigned DEFAULT '0' COMMENT '用户uid',  `pluginid` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '插件名字',  `type` int unsigned DEFAULT '0',  `num` bigint DEFAULT '0',  `data` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '详情',  `atime` int unsigned DEFAULT '0' COMMENT '时间',  `ip` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT 'ip',  `off` bigint DEFAULT 0 COMMENT '独立标识',  PRIMARY KEY (`id`),  KEY `uid` (`uid`),  KEY `pluginid` (`pluginid`),  KEY `type` (`type`),  KEY `off` (`off`),  KEY `atime` (`atime`),  KEY `ip` (`ip`),  KEY `data` (`data`),  KEY `num` (`num`),  KEY `pluginid_type` (`pluginid`,`type`),  KEY `uid_type` (`uid`,`type`) USING BTREE) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='积分日志';DROP TABLE IF EXISTS `ELi_memcached`;CREATE TABLE `ELi_memcached` (  `id` bigint unsigned NOT NULL AUTO_INCREMENT,  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '名字',  `keval` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '值',  `atime` int DEFAULT '0' COMMENT '缓存时间',  PRIMARY KEY (`id`),  UNIQUE KEY `name` (`name`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='数据库缓存系统';DROP TABLE IF EXISTS `ELi_moneylog`;CREATE TABLE `ELi_moneylog` (  `id` bigint unsigned NOT NULL AUTO_INCREMENT,  `uid` bigint unsigned DEFAULT '0' COMMENT '用户uid',  `pluginid` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '插件名字',  `type` int unsigned DEFAULT '0',  `num` decimal(30,5) DEFAULT '0.00000',  `data` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '详情',  `atime` int unsigned DEFAULT '0' COMMENT '时间',  `ip` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT 'ip',  `off` bigint DEFAULT 0 COMMENT '独立标识',  PRIMARY KEY (`id`),  KEY `uid` (`uid`),  KEY `off` (`off`),  KEY `pluginid` (`pluginid`),  KEY `type` (`type`),  KEY `atime` (`atime`),  KEY `ip` (`ip`),  KEY `data` (`data`),  KEY `num` (`num`),  KEY `pluginid_type` (`pluginid`,`type`),  KEY `uid_type` (`uid`,`type`) USING BTREE) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='金额日志';DROP TABLE IF EXISTS `ELi_user`;CREATE TABLE `ELi_user` (  `id` bigint unsigned NOT NULL AUTO_INCREMENT,  `nickname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '昵称',  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '头像',  `super` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '超级密码',  `recharge` decimal(30,5) unsigned DEFAULT '0.00000' COMMENT '已经充值金额',  `money` decimal(30,5) unsigned DEFAULT '0.00000' COMMENT '金额',  `integral` bigint unsigned DEFAULT '0' COMMENT '积分',  `currency` decimal(30,5) unsigned DEFAULT '0.00000' COMMENT '货币',  `accountoff` tinyint unsigned DEFAULT '0' COMMENT '帐户状态',  `fullname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '姓名',  `identity` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '身份号',  `sex` tinyint DEFAULT '-1' COMMENT '性别',  `grade` int unsigned DEFAULT '0' COMMENT '等级',  `level` bigint unsigned DEFAULT '0' COMMENT '级别',  `age` int unsigned DEFAULT '0' COMMENT '年龄',  `regtime` int unsigned DEFAULT '0' COMMENT '注册时间',  `regip` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '注册ip',  `logintime` int unsigned DEFAULT '0' COMMENT '登录时间',  `loginip` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '登录ip',  `security` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '防止重复注册',  `verifyip` tinyint unsigned DEFAULT '0' COMMENT '验证IP',  `superior0` bigint unsigned DEFAULT '0' COMMENT '一级',  `superior1` bigint unsigned DEFAULT '0' COMMENT '二级',  PRIMARY KEY (`id`),  UNIQUE KEY `id` (`id`),  UNIQUE KEY `security` (`security`),  KEY `accountoff` (`accountoff`),  KEY `nickname` (`nickname`),  KEY `superior0` (`superior0`),  KEY `superior1` (`superior1`),  KEY `id_2` (`id`,`money`),  KEY `id_3` (`id`,`integral`),  KEY `id_4` (`id`,`currency`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='基础用户表';DROP TABLE IF EXISTS `ELi_userlog`;CREATE TABLE `ELi_userlog` (  `id` bigint unsigned NOT NULL AUTO_INCREMENT COMMENT '日志id',  `uid` bigint unsigned DEFAULT '0' COMMENT '管理uid',  `type` int unsigned DEFAULT '0' COMMENT '日志类型',  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '详细数据',  `ip` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '产生ip',  `atime` int unsigned DEFAULT '0' COMMENT '时间',  `controller` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '控制器',  `mode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '处理方式',  PRIMARY KEY (`id`),  KEY `uid` (`uid`),  KEY `type` (`type`),  KEY `controller` (`controller`(250)),  KEY `mode` (`mode`(250))) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='user日志';SET FOREIGN_KEY_CHECKS = 1;";
            if(isset($_POST['InnoDB'])){
                $sql = str_replace('ENGINE=MyISAM','ENGINE=InnoDB',$sql);
            }
            $sql = str_replace('`ELi_','`'.$_POST['ELiDataBase_prefix'] ,$sql);
            $jieguo = $db  ->qurey($sql,"accse");
            if($jieguo){
                global $ELiMem;
                $ELiMem -> f();
                db("admin")->update(['account' => $_POST['adminname'] ,'password' => ELimm($_POST['adminpass']) ]);
            }
            $peizhii =ELikj.'../index.php';
            $NNN = file_get_contents($peizhii);
            $yyy = [];
            $ttt = [];
            $_POST['ELiConfig_host'] = rtrimE($_POST['ELiConfig_host'],'/');

            foreach($pad as $k=>$v){
                $yyy[] = '###'.$k.'###';
                $ttt[] = str_replace("'",'',$_POST[$k]);
            }

            $NNN = str_replace($yyy,$ttt,$NNN);
            file_put_contents($peizhii,$NNN);
            return echoapptoken($_POST,1);
        }
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <title>以厘php框架安装</title>
            <meta name="renderer" content="webkit">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
            <link rel="stylesheet" href="./Tpl/layui/css/layui.css"  media="all">
            <style>
            .layadmin-user-login-main {
                width: 750px;
                margin: 0 auto;
                box-sizing: border-box;
            }
            </style>
        </head>
        <body>
        <div class="layadmin-user-login-main">
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
            <legend>以厘php框架 V<b style="color:#000;font-size:14px;"> <?php echo ELikjVER;?></b> 安装</legend>
        </fieldset>
            <div class="layui-tab">
                <ul class="layui-tab-title">
                    <li class="layui-this">1.安装协议</li>
                    <li>2.安装配置</li>
                    <li>3.安装完成</li>
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                    <pre style="font-size:16px;line-height:30px;">
以厘php框架( https://eLiphp.com ) 
采用开源协议 Apache License Version 2.0 http://www.apache.org/licenses/
一切因下载使用 以厘CMS 软件而引致之任何意外、疏忽、合约毁坏、诽谤、版权或知识产权侵犯及其所造成的损失，以厘CMS 概不负责，亦不承担任何法律责任。
鉴于用户计算机软硬件环境的差异性和复杂性，本软件所提供的各项功能并不能保证在任何情况下都能正常执行或达到用户所期望的结果。用户对使用 以厘CMS 软件自行承担风险，我们不做任何形式的保证，不承担任何责任。
在您阅读本声明后若不同意此声明中的任何条款，或对本声明存在质疑，请立刻停止使用我们的软件。若您已经开始或正在使用 以厘CMS 软件，则表示您已阅读并同意本声明的所有条款之约定。

</pre>
<button type="button" class="layui-btn layui-btn-lg layui-btn-normal" onclick="tongxyixie(1);">同意并安装</button>
                    </div>
                    <div class="layui-tab-item dier2ge">
                    <form class="layui-form" method="POST">
                        <input type="hidden" name="isinstall" value="1" />
                        <fieldset class="layui-elem-field layui-field-title" >
                            <legend>基础配置</legend>
                        </fieldset>
                        <div class="layui-form-item">
                            <label class="layui-form-label">运行域名</label>
                            <div class="layui-input-block">
                                <input type="text" name="ELiConfig_host" lay-verify="title" value="" autocomplete="off" placeholder="http://" class="layui-input">
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label">网站目录</label>
                            <div class="layui-input-block">
                                <input type="text" name="ELiConfig_dir" lay-verify="title" autocomplete="off" placeholder="/" value="<?php  $hhh= explode("/",$ELiHttp);if(count($hhh)>1){unset($hhh[count($hhh)-1]); echo "/".implode("/", $hhh).'/';}else{echo '/';};?>" class="layui-input">
                            </div>
                        </div>
                        <fieldset class="layui-elem-field layui-field-title" >
                            <legend>数据库配置</legend>
                        </fieldset>
                        <div class="layui-form-item">
                            <label class="layui-form-label">数据库链接</label>
                            <div class="layui-input-block">
                                <input type="text" name="ELiDataBase_hostname" lay-verify="title" value="" autocomplete="off" placeholder="127.0.0.1" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">数据库名字</label>
                            <div class="layui-input-block">
                                <input type="text" name="ELiDataBase_database" lay-verify="title" value="" autocomplete="off" placeholder="数据库名字" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">数据库账号</label>
                            <div class="layui-input-block">
                                <input type="text" name="ELiDataBase_username" lay-verify="title" value="" autocomplete="off" placeholder="数据库账号" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">数据库密码</label>
                            <div class="layui-input-block">
                                <input type="text" name="ELiDataBase_password" lay-verify="title" value="" autocomplete="off" placeholder="数据库密码" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">数据库端口</label>
                            <div class="layui-input-block">
                                <input type="text" name="ELiDataBase_hostport" lay-verify="title" value="3306" autocomplete="off" placeholder="3306" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">数据表前缀</label>
                            <div class="layui-input-block">
                                <input type="text" name="ELiDataBase_prefix" lay-verify="title" value="eli_" autocomplete="off" placeholder="eli_" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item" pane="">
                            <label class="layui-form-label">InnoDB</label>
                            <div class="layui-input-block">
                            <input type="checkbox" name="InnoDB" lay-skin="primary" title="只支持" >
                            
                            </div>
                        </div>
                        <fieldset class="layui-elem-field layui-field-title">
                            <legend>登陆账号</legend>
                        </fieldset>
                        <div class="layui-form-item">
                            <label class="layui-form-label">管理账号</label>
                            <div class="layui-input-block">
                                <input type="text" name="adminname" lay-verify="title" value="" autocomplete="off" placeholder="[ 4-32 ]位" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">管理密码</label>
                            <div class="layui-input-block">
                                <input type="text" name="adminpass" lay-verify="title" value="" autocomplete="off" placeholder="[ 6-32 ]位" class="layui-input">
                            </div>
                        </div>

                        
                        <div class="layui-form-item">
                        <div class="layui-input-block">
                        <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">立即安装</button>
                        
                        </div>
                    </div>
                    </form>
                    
                    </div>
                    <div class="layui-tab-item dier3ge">
                        
                    </div>
                    
                </div>
            </div>
        </div>
        </body>
        </html>
        <script src="./Tpl/jquery.js"></script>
        <script src="./Tpl/layui/layui.all.js"></script>
        <script>
        window.UIMUI =[];
        function  tongxyixie(bu){
            $(".layui-tab-title li").removeClass("layui-this");
            $(".layui-tab-content .layui-tab-item").removeClass("layui-show");
            $(".layui-tab-title li").eq(bu).addClass("layui-this");
            $(".layui-tab-content .layui-tab-item").eq(bu).addClass("layui-show");
        }
        layui.form.on('submit(demo1)', function(data){  
            var POST = data.field;
            if(POST.ELiConfig_host == "" ){
                POST.ELiConfig_host = window.location.href;
            }else{
                if(POST.ELiConfig_host.indexOf("://") == -1){

                    layer.msg("运行域名错误必须是完整网址\nhttp://或者https://");

                }
            }

            var Jname= <?php echo json_encode($pad);?>;
            for(var k in Jname){
                if(POST[k] && POST[k].length < 1){
                    layer.msg(Jname[k]+"错误");
                    return false;
                }
            }
           
            

            $.post("./",POST,function(ff){
                if(ff.code == 1){
                    var html = '<button type="button" class="layui-btn layui-btn-danger">安装完成</button><br />';
                    var xurl = POST.ELiConfig_host+'/index.php?/<?php echo $ELiConfig['Plus'];?>/admin/';
                    html+= '后台管理:<a href="'+xurl+'">'+xurl+'</a><br />';
                    html+= '登陆账号:'+POST.adminname ;
                    html+= '<br />登陆密码:'+POST.adminpass;

                    $(".layui-tab-content .layui-tab-item").eq(2).html(html);
                    tongxyixie(2);
                    layer.msg("安装完成!");


                }else{
                    layer.msg(ff.msg);
                }
            });

            console.log(JSON.stringify(POST));
            return false;
        });
        
        </script>
       
                    
        
        <?php
    }

    function makejs($CANSHU,$features){

        
        if(! ELihhGet('adminid')){
            return echoapptoken([],-1,"login","");
        }   
        $table = trim($CANSHU['0']??"");
        if($table != ""){

            global $ELiConfig,$ELiDataBase;
            $db = db($table);
        
            $DATA = $db ->qurey("select * from information_schema.columns where table_schema='".ELiSecurity($ELiDataBase[$ELiConfig['dbselect']]['database'])."' and table_name ='".$db->biao()."';","erwei");
            if($DATA){
                $hh = [];
                foreach($DATA as $shuju){
                    $hh[$shuju['COLUMN_NAME']] = "'".$shuju['COLUMN_NAME']."($$)".$shuju['COLUMN_COMMENT']."($$)text($$)($$)".$shuju['COLUMN_COMMENT']."($$)' + D.".$shuju['COLUMN_NAME'];

                }
                $hhbv = [];
                $jsson = [];
                foreach($db->tablejg['1'] as $k =>$v){
                    if($v != "auto_increment"){
                        $hhbv[] = $hh[$k];
                        $jxi = explode("_",$v);
                        $jsson[$k] =end($jxi );
                    }else{
                        $jsson[$k] =0;
                    }
                    
                }
                echo "<pre>";
                echo  implode(",\n",$hhbv);
                echo "\n";
                echo json_encode( $jsson);
                echo "</pre>";
            }
        }

       
    }

    function quite($CANSHU,$features){
        ELilog('adminlog',ELihhGet('adminid'),1,"",'quite');
        global $SESSIONID,$ELiMem;
        $ELiMem ->d('security/'.ELimm(date("Y-m-d")."以厘科技".$SESSIONID."ELikj.com"));

        ELihhDel();
        return echoapptoken([],1,"","");
    }

    //上传文件接口
    function upload($CANSHU,$features){
        if($this -> Loginok ([],$features) ){
            return  ;
        }
        $fan = upload();
        if($fan['code'] == 1){
            return echoapptoken($fan['content']['pic'],1,"upload ok","");
        }else{
            return echoapptoken([],-1,$fan['msg'],"");
        }
        return ;
    }

    //检测后台管理权限
    function Loginok($CANSHU,$features){
       
        $ttttclass = $GLOBALS['plugin'];
        $ttttfunction = "";
        if($CANSHU && $CANSHU['0']){
            $i = 0;
            foreach($CANSHU['0'] as $vvv){
                if($i == 0){
                    $ttttclass = $vvv;
                }else if($i == 1){
                    $ttttfunction = $vvv;
                }else{
                    break ;
                }
                $i++;
            }
        }
        
       
        $_SESSION = ELihhGet();
        if( !isset($_SESSION['adminid']) || $_SESSION['adminid'] < 1 ){
            $_SESSION['token'] =  (uuid());
            return echoapptoken([],99,'Please login1',$_SESSION['token']);
        }
        $ADMIN = adminid($_SESSION['adminid']);
        if(!$ADMIN){
            ELihhDel();
            return echoapptoken([],99,'Please login2','');
        }

        if( $ADMIN['off'] == '0'){
            ELihhDel();
            ELilog('adminlog',$_SESSION['adminid'],2,'',$ttttclass,$ttttfunction );
            return echoapptoken([],99,'Please login3','');
        }

        if( $ADMIN['verifyip'] == '1'){
            global $SESSIONID,$ELiMem;
            if($SESSIONID != $ADMIN['sessionid']  ){
                ELihhDel();
                ELilog('adminlog',$_SESSION['adminid'],2,$ADMIN['sessionid'],$ttttclass,$ttttfunction);
                return echoapptoken([],99,'Please login4','');
            }
            $xip =  $ELiMem ->g('adminip/'.$_SESSION['adminid']);
            if( ip() !=  $xip){

                ELihhDel();
                
                ELilog('adminlog',$_SESSION['adminid'],2,$xip,$ttttclass,$ttttfunction);
                return echoapptoken([],99,'Please login5','');
            }
        }

        if($CANSHU && isset($CANSHU['0']) ){
        
            if($ADMIN['groups'] >  0){
                $quanxian = $this -> groupsid($ADMIN['groups'], "jjj");
                if(!$quanxian || !is_array($CANSHU['0']) ){
                    $mmm = "权限不足 ".implode(' ',$CANSHU);
                    return echoapptoken($mmm,-1,$mmm,'');
                }
                $kongzhi = [
                    'get'=>0,
                    'add'=>1,
                    'put'=>2,
                    'del'=>3,

                ];
                $temp = $quanxian;
                $zuhe = "";
                $mode = $CANSHU['1']??"";
                foreach($CANSHU['0'] as $kx => $hhh){
                   
                    if( uuidc($hhh,false) ){

                        if(isset($CANSHU['0'][$kx+1])){
                            $mode = $CANSHU['0'][$kx+1];
                        }
                        break ;
                    }
                    if( isset($kongzhi[$hhh]) ){
                        $mode = $hhh;
                        break ;
                    }
                    if(isset($temp[$hhh])){
                        $zuhe .= $hhh.'/';
                        $temp = $temp[$hhh];
                    }else{
                        $zuhe .= $hhh;
                        return echoapptoken("权限不足 ".$zuhe,-1,"权限不足 ".$zuhe,'');
                    }
                }
            
                $caozuode = $kongzhi[$mode ];
                if(!isset($temp[$caozuode])){
                    $zuhe .= $mode;
                    return echoapptoken("权限不足 ".$zuhe,-1,"权限不足 ".$zuhe,'');
                }
            }
        }

        ELihhSet("ELikj",time());
        //可控操作检测
        return false;
    }

    //读取单个权限组
    function Groupsid($id,$name = ""){
        if($name == ""){
            if($id < 1){
                return '创始人';
            }
        }else{
            if($id < 1){
                return true;
            }
        }
        $db = db('admingroup');
        $data = $db ->where(['id'=>$id])->find();
        if(!$data ){
            if($name == ""){
                return '不存在';
            }else{
                return false;
            }
        }
        if($name == ""){
            return $data['name'];
        }else{
            return json_decode($data['competence'],true);
        }
    }
    //权限组名字
    function Groups($db = null){
        if(!$db){
            $db = db('admingroup');
        }else {
            $db ->setbiao('admingroup');
        }
        $data = $db ->select();
        $zhuan = [0=>'创始人'];
        if($data){
            foreach($data as $hhx){
                $zhuan[$hhx['id']] = $hhx['name'];
            }
        }
        return $zhuan;
    }

    function Groupscaidan($id){
        $db = db('features');
        $data = $db ->select();
        $candai  = [];
        if($data){
          
            foreach($data as $hhh){

                $candai[$hhh['pluginid']]  = [
                    'name'=>$hhh['name'],
                    'typeico'=>$hhh['typeico'],
                    'main'=>$hhh['main'],
                    'men'=>json_decode($hhh['menuconfig'],true),
                ];
            }
        }
        if($id == '0'){
            return $candai;
        }
        $quanxian = $this -> groupsid($id, "jjj");
        if($quanxian){
            $_SESSION['adminquanxian'] =  $quanxian;

            foreach($candai as $key => $vvv ){


                if(isset( $quanxian[$key])){

                    foreach($vvv['men'] as $kk => $dongzuo){
                        if( !isset( $quanxian[$key][$kk]) ){
                            unset($candai[$key]['men'][$kk]);
                        }else{

                            if(isset($dongzuo['men'])){

                                foreach($dongzuo['men'] as $kk_1 => $dongzuo_1){
                                 
                                    if( !isset( $quanxian[$key][$kk][$kk_1]) ){
                                        unset($candai[$key]['men'][$kk]['men'] [$kk_1]);
                                    }else{

                                        if(isset($dongzuo_1['men'])){

                                            foreach($dongzuo_1['men'] as $kk_2 => $dongzuo_2){
                                             
                                                if( !isset( $quanxian[$key][$kk][$kk_1][$kk_2]) ){
                                                    unset($candai[$key]['men'][$kk]['men'] [$kk_1]['men'][$kk_2]);
                                                }else{

                                                    if(isset($dongzuo_2['men'])){

                                                        foreach($dongzuo_2['men'] as $kk_3 => $dongzuo_3){
                                                         
                                                            if( !isset( $quanxian[$key][$kk][$kk_1][$kk_2][$kk_3]) ){
                                                                unset($candai[$key]['men'][$kk]['men'] [$kk_1]['men'][$kk_2]['men'][$kk_3]);
                                                            }else{

                                                                if(isset($dongzuo_3['men'])){

                                                                    foreach($dongzuo_3['men'] as $kk_4 => $dongzuo_4){
                                                                     
                                                                        if( !isset( $quanxian[$key][$kk][$kk_1][$kk_2][$kk_3][$kk_4]) ){
                                                                            unset($candai[$key]['men'][$kk]['men'] [$kk_1]['men'][$kk_2]['men'][$kk_3]['men'][$kk_4]);
                                                                        }else{
                                    
                                    
                                                                        }
                                                                    }
                                                                }
                        
                        
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }

                                    }
                                }
                            }
                        }
                    }
                }else{
                    unset($candai[$key]);
                }
            }
        }
        
        return $candai;
    }
    
    function code($CANSHU,$features){
 
        ELivcode();
        return ;
    }

    function Construct($CANSHU,$features){
        
        ELis('admin');
        $_SESSION['adminid'] = (int)ELihhGet('adminid');
        $ClassFunc = $CANSHU['-1'];
        unset($CANSHU['-1']);
        global $ELiConfig,$ELiMem,$SESSIONID;
        if( $ELiConfig['security'] != "" ){
            $security = 'security/'.ELimm(date("Y-m-d")."以厘科技".$SESSIONID."ELikj.com");
            $Security = $ELiMem ->g($security);
            if($Security){
                if($Security['num'] > 3){
                    return ELiError("ELikj: Security filtering !!!");
                }
            }
            if( !$Security || $Security['security'] != $ELiConfig['security'] ){
                if(isset($_GET['security']) && $_GET['security'] == $ELiConfig['security']){
                    $Security = [
                        'security' => $_GET['security'],
                        'user_agent'=> $GLOBALS['header']['user_agent'],
                        'ip'=>ip(),
                        'num' => 0
                    ];
                    $ELiMem ->s($security,$Security);
                }else{
                    if( isset($_GET['security']) ){
                        if(!$Security){
                            $Security =[
                                'security' => "",
                                'user_agent'=> "",
                                'ip'=>"",
                                'num' => 0
                            ];
                        }
                        $Security['num']++;
                        $ELiMem ->s($security,$Security,360);
                    }
                    return ELiError("ELikj: Security filtering !");
                }
            }

            if($GLOBALS['header']['user_agent'] != $Security['user_agent']){

              
                return ELiError("ELikj: Security filtering agent !");
            }

            $ADMIN = adminid($_SESSION['adminid']);
            if($ADMIN){
                if( $ADMIN['verifyip'] == '1'){
                    if($Security['ip'] != ip()){
                        return ELiError("ELikj: Security filtering ip !");
                    }
                }
            }
        }

        try {
           
            $weideng = ['code'=>'','home'=>'','login'=>'','index'=>''];
            if( !isset($_SESSION['adminid']) || $_SESSION['adminid'] < 1 ){
                if(!isset( $weideng[$ClassFunc])){
                    $_SESSION['token'] =  (uuid());
                    ELihhSet('token',$_SESSION['token']);
                    return echoapptoken([],99,'Please login',$_SESSION['token']);
                }

            }else{

                if( !isset($weideng[$ClassFunc]) ){
                    //这里验证权限
                    $kongzhi = [
                        'get'=>0,
                        'add'=>1,
                        'put'=>2,
                        'del'=>3,
                    ];

                    $mode = isset($CANSHU['1'])?$CANSHU['1']:'get';
                    if(!isset( $kongzhi[$mode])){
                        $mode = 'get';
                    }
                    global $YHTTP;
                    if( callELi("admin","loginok",[$YHTTP,$mode],[],false)){
                        return ;
                    }
                } 
            }
           
           return ELitpl($this -> plugin,$ClassFunc,$this);
            //$this ->$ClassFunc($CANSHU,$features);
        } catch (\Throwable $th) {
            return echoapptoken([],-1,$th->getmessage());
        }
    }
}