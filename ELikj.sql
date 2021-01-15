/*
 Navicat Premium Data Transfer

 Source Server         : 192.168.0.13
 Source Server Type    : MySQL
 Source Server Version : 80019
 Source Host           : 192.168.0.13:3306
 Source Schema         : ELikj

 Target Server Type    : MySQL
 Target Server Version : 80019
 File Encoding         : 65001

 Date: 09/06/2020 21:51:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ELi_admin
-- ----------------------------
DROP TABLE IF EXISTS `ELi_admin`;
CREATE TABLE `ELi_admin` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `account` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '管理帐号',
  `password` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '管理密码',
  `area` bigint unsigned DEFAULT '0' COMMENT '地区',
  `super` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '超级密码',
  `groups` int unsigned DEFAULT '0' COMMENT '管理组权限',
  `verifyip` tinyint unsigned DEFAULT '0' COMMENT '强行验证用户ip',
  `off` tinyint unsigned DEFAULT '0' COMMENT '帐号开关',
  `ip` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '登录ip',
  `atime` int unsigned DEFAULT '0' COMMENT '登录时间',
  `sessionid` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `account` (`account`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='管理员';

-- ----------------------------
-- Records of ELi_admin
-- ----------------------------
BEGIN;
INSERT INTO `ELi_admin` VALUES (1, 'admin', 'cac01bfe0422801a36', 0, '', 0, 0, 1, '192.168.0.13', 1591698990, '960d2500a59c919dd9698c1e4daeb8a155cfd111ffb724d1df9a83a3c2639471');
COMMIT;

-- ----------------------------
-- Table structure for ELi_admingroup
-- ----------------------------
DROP TABLE IF EXISTS `ELi_admingroup`;
CREATE TABLE `ELi_admingroup` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '权限组名字',
  `describes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '描述',
  `competence` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '权限',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='管理权限组';


-- ----------------------------
-- Table structure for ELi_adminlog
-- ----------------------------
DROP TABLE IF EXISTS `ELi_adminlog`;
CREATE TABLE `ELi_adminlog` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT COMMENT '日志id',
  `uid` bigint unsigned DEFAULT '0' COMMENT '管理uid',
  `type` int unsigned DEFAULT '0' COMMENT '日志类型',
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '详细数据',
  `ip` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '产生ip',
  `atime` int unsigned DEFAULT '0' COMMENT '时间',
  `controller` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '控制器',
  `mode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '处理方式',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `type` (`type`),
  KEY `controller` (`controller`(250)),
  KEY `mode` (`mode`(250))
) ENGINE=MyISAM AUTO_INCREMENT=208 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='管理员日志';

-- ----------------------------
-- Table structure for ELi_config
-- ----------------------------
DROP TABLE IF EXISTS `ELi_config`;
CREATE TABLE `ELi_config` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '读取类型',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '配置描述',
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '配置详情',
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='系统配置';

-- ----------------------------
-- Table structure for ELi_currencylog
-- ----------------------------
DROP TABLE IF EXISTS `ELi_currencylog`;
CREATE TABLE `ELi_currencylog` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uid` bigint unsigned DEFAULT '0' COMMENT '用户uid',
  `pluginid` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '插件名字',
  `type` int unsigned DEFAULT '0',
  `num` decimal(30,5) DEFAULT '0.00000',
  `data` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '详情',
  `atime` int unsigned DEFAULT '0' COMMENT '时间',
  `ip` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT 'ip',
  `off` bigint DEFAULT 0 COMMENT '独立标识',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `pluginid` (`pluginid`),
  KEY `type` (`type`),
  KEY `atime` (`atime`),
  KEY `ip` (`ip`),
  KEY `off` (`off`),
  KEY `data` (`data`),
  KEY `num` (`num`),
  KEY `pluginid_type` (`pluginid`,`type`),
  KEY `uid_type` (`uid`,`type`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='货币日志';

-- ----------------------------
-- Table structure for ELi_features
-- ----------------------------
DROP TABLE IF EXISTS `ELi_features`;
CREATE TABLE `ELi_features` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pluginid` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '插件唯一标示',
  `type` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '插件类型',
  `typeico` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '插件图标',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '插件名字',
  `describes` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '插件描述',
  `author` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '作者',
  `authorlink` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '作者的网店',
  `version` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '版本号码',
  `off` tinyint unsigned DEFAULT '0' COMMENT '插件状态',
  `branch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '版本分支',
  `atime` int unsigned DEFAULT '0' COMMENT '录入时间',
  `authorizedid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '授权id',
  `authorizedkey` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '授权key',
  `configure` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '插件配置参数',
  `display` tinyint unsigned DEFAULT '0' COMMENT '前段显示',
  `callfunction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '前段调用函数',
  `menuconfig` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '配置后台显示菜单',
  `main` tinyint unsigned DEFAULT '0' COMMENT '拥有的子菜显示为大菜单',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pluginid` (`pluginid`),
  KEY `type` (`type`),
  KEY `type_2` (`type`,`off`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='插件列表';

-- ----------------------------
-- Records of ELi_features
-- ----------------------------
BEGIN;
INSERT INTO `ELi_features` VALUES (1, 'admin', '', 'layui-icon-console', '管理后台', '基础管理后台', 'U', 'https://www.elikj.com/', '1', 1, '', 1585446010, '', '', '{\"verifyip\":[\"关闭\",\"开启\"],\"off\":[\"关闭\",\"开启\"],\"off2\":[\"关闭\",\"开启\"],\"adminlogtype\":[\"登陆\",\"退出\",\"挤掉\",\"修改\",\"插入\",\"删除\"],\"userlogtype\":[\"登陆\",\"退出\",\"挤掉\",\"修改\",\"插入\",\"删除\"],\"currencylog\":[\"测试1\",\"唱的his2\"]}', 0, '', '{\"admin\":{\"name\":\"管理里员\",\"typeico\":\"layui-icon-friends\",\"link\":\"\"},\"admingroup\":{\"name\":\"权限管理\",\"typeico\":\"layui-icon-group\",\"link\":\"\"},\"adminlog\":{\"name\":\"管理日志\",\"typeico\":\"layui-icon-table\",\"link\":\"\"},\"features\":{\"name\":\"插件管理\",\"typeico\":\"layui-icon-engine\",\"link\":\"\"},\"config\":{\"name\":\"通用配置\",\"typeico\":\"layui-icon-set\",\"link\":\"\"},\"currencylog\":{\"name\":\"货币日志\",\"typeico\":\"layui-icon-dollar\",\"link\":\"\"},\"integrallog\":{\"name\":\"积分日志\",\"typeico\":\"layui-icon-diamond\",\"link\":\"\"},\"moneylog\":{\"name\":\"金额日志\",\"typeico\":\"layui-icon-rmb\",\"link\":\"\"},\"user\":{\"name\":\"用户管理\",\"typeico\":\"layui-icon-user\",\"link\":\"\"},\"userlog\":{\"name\":\"用户日志\",\"typeico\":\"layui-icon-list\",\"link\":\"\"},\"memcached\":{\"name\":\"数据库KV\",\"typeico\":\"layui-icon-find-fill\",\"link\":\"\"}}', 0);
COMMIT;

-- ----------------------------
-- Table structure for ELi_integrallog
-- ----------------------------
DROP TABLE IF EXISTS `ELi_integrallog`;
CREATE TABLE `ELi_integrallog` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uid` bigint unsigned DEFAULT '0' COMMENT '用户uid',
  `pluginid` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '插件名字',
  `type` int unsigned DEFAULT '0',
  `num` bigint DEFAULT '0',
  `data` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '详情',
  `atime` int unsigned DEFAULT '0' COMMENT '时间',
  `ip` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT 'ip',
  `off` bigint DEFAULT 0 COMMENT '独立标识',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `pluginid` (`pluginid`),
  KEY `type` (`type`),
  KEY `off` (`off`),
  KEY `atime` (`atime`),
  KEY `ip` (`ip`),
  KEY `data` (`data`),
  KEY `num` (`num`),
  KEY `pluginid_type` (`pluginid`,`type`),
  KEY `uid_type` (`uid`,`type`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='积分日志';

-- ----------------------------
-- Table structure for ELi_memcached
-- ----------------------------
DROP TABLE IF EXISTS `ELi_memcached`;
CREATE TABLE `ELi_memcached` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '名字',
  `keval` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '值',
  `atime` int DEFAULT '0' COMMENT '缓存时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='数据库缓存系统';

-- ----------------------------
-- Table structure for ELi_moneylog
-- ----------------------------
DROP TABLE IF EXISTS `ELi_moneylog`;
CREATE TABLE `ELi_moneylog` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uid` bigint unsigned DEFAULT '0' COMMENT '用户uid',
  `pluginid` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '插件名字',
  `type` int unsigned DEFAULT '0',
  `num` decimal(30,5) DEFAULT '0.00000',
  `data` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '详情',
  `atime` int unsigned DEFAULT '0' COMMENT '时间',
  `ip` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT 'ip',
  `off` bigint DEFAULT 0 COMMENT '独立标识',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `off` (`off`),
  KEY `pluginid` (`pluginid`),
  KEY `type` (`type`),
  KEY `atime` (`atime`),
  KEY `ip` (`ip`),
  KEY `data` (`data`),
  KEY `num` (`num`),
  KEY `pluginid_type` (`pluginid`,`type`),
  KEY `uid_type` (`uid`,`type`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='金额日志';

-- ----------------------------
-- Table structure for ELi_user
-- ----------------------------
DROP TABLE IF EXISTS `ELi_user`;
CREATE TABLE `ELi_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '昵称',
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '头像',
  `super` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '超级密码',
  `recharge` decimal(30,5) unsigned DEFAULT '0.00000' COMMENT '已经充值金额',
  `money` decimal(30,5) unsigned DEFAULT '0.00000' COMMENT '金额',
  `integral` bigint unsigned DEFAULT '0' COMMENT '积分',
  `currency` decimal(30,5) unsigned DEFAULT '0.00000' COMMENT '货币',
  `accountoff` tinyint unsigned DEFAULT '0' COMMENT '帐户状态',
  `fullname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '姓名',
  `identity` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '身份号',
  `sex` tinyint DEFAULT '-1' COMMENT '性别',
  `grade` int unsigned DEFAULT '0' COMMENT '等级',
  `level` bigint unsigned DEFAULT '0' COMMENT '级别',
  `age` int unsigned DEFAULT '0' COMMENT '年龄',
  `regtime` int unsigned DEFAULT '0' COMMENT '注册时间',
  `regip` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '注册ip',
  `logintime` int unsigned DEFAULT '0' COMMENT '登录时间',
  `loginip` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '登录ip',
  `security` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '防止重复注册',
  `verifyip` tinyint unsigned DEFAULT '0' COMMENT '验证IP',
  `superior0` bigint unsigned DEFAULT '0' COMMENT '一级',
  `superior1` bigint unsigned DEFAULT '0' COMMENT '二级',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `security` (`security`),
  KEY `accountoff` (`accountoff`),
  KEY `nickname` (`nickname`),
  KEY `superior0` (`superior0`),
  KEY `superior1` (`superior1`),
  KEY `id_2` (`id`,`money`),
  KEY `id_3` (`id`,`integral`),
  KEY `id_4` (`id`,`currency`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='基础用户表';

-- ----------------------------
-- Table structure for ELi_userlog
-- ----------------------------
DROP TABLE IF EXISTS `ELi_userlog`;
CREATE TABLE `ELi_userlog` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT COMMENT '日志id',
  `uid` bigint unsigned DEFAULT '0' COMMENT '管理uid',
  `type` int unsigned DEFAULT '0' COMMENT '日志类型',
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '详细数据',
  `ip` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '产生ip',
  `atime` int unsigned DEFAULT '0' COMMENT '时间',
  `controller` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '控制器',
  `mode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '' COMMENT '处理方式',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `type` (`type`),
  KEY `controller` (`controller`(250)),
  KEY `mode` (`mode`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='user日志';

SET FOREIGN_KEY_CHECKS = 1;
