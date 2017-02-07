# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.7.17)
# Database: yii2cms
# Generation Time: 2017-02-07 08:22:55 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table yii2_admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yii2_admin`;

CREATE TABLE `yii2_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL COMMENT '密码',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `reg_ip` int(11) NOT NULL DEFAULT '0' COMMENT '创建或注册IP',
  `last_login_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_login_ip` int(11) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '用户状态 1正常 0禁用',
  `created_at` int(11) NOT NULL COMMENT '创建或注册时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `yii2_admin` WRITE;
/*!40000 ALTER TABLE `yii2_admin` DISABLE KEYS */;

INSERT INTO `yii2_admin` (`id`, `username`, `auth_key`, `password_hash`, `email`, `reg_ip`, `last_login_time`, `last_login_ip`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'admin','SbSY36BLw3V2lU-GB7ZAzCVJKDFx82IJ','$2y$13$0UVcG.mXF6Og0rnjfwJd2.wixT2gdn.wDO9rN44jGtIGc6JvBqR7i','771405950@qq.com',2130706433,1484733705,2130706433,1,1482305564,1484733705);

/*!40000 ALTER TABLE `yii2_admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yii2_auth_assignment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yii2_auth_assignment`;

CREATE TABLE `yii2_auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `yii2_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `yii2_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `yii2_auth_assignment` WRITE;
/*!40000 ALTER TABLE `yii2_auth_assignment` DISABLE KEYS */;

INSERT INTO `yii2_auth_assignment` (`item_name`, `user_id`, `created_at`)
VALUES
	('administors','1',1484712737);

/*!40000 ALTER TABLE `yii2_auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yii2_auth_item
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yii2_auth_item`;

CREATE TABLE `yii2_auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`),
  CONSTRAINT `yii2_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `yii2_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `yii2_auth_item` WRITE;
/*!40000 ALTER TABLE `yii2_auth_item` DISABLE KEYS */;

INSERT INTO `yii2_auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`)
VALUES
	('admin/auth',2,'','admin/auth',NULL,1484734191,1484734305),
	('admin/create',2,'','admin/create',NULL,1484734191,1484734305),
	('admin/delete',2,'','admin/delete',NULL,1484734191,1484734305),
	('admin/index',2,'','admin/index',NULL,1484734191,1484734305),
	('admin/update',2,'','admin/update',NULL,1484734191,1484734305),
	('administors',1,'授权所有权限',NULL,NULL,1484712662,1484712662),
	('config/attachment',2,'','config/attachment',NULL,1484734191,1484734305),
	('config/basic',2,'','config/basic',NULL,1484734191,1484734305),
	('config/send-mail',2,'','config/send-mail',NULL,1484734191,1484734305),
	('database/export',2,'','database/export',NULL,1484734305,1484734305),
	('editors',1,'网站编辑',NULL,NULL,1484712712,1484712712),
	('index/index',2,'','index/index',NULL,1484734191,1484734305),
	('menu/create',2,'','menu/create',NULL,1484734191,1484734305),
	('menu/delete',2,'','menu/delete',NULL,1484734191,1484734305),
	('menu/index',2,'','menu/index',NULL,1484734191,1484734305),
	('menu/update',2,'','menu/update',NULL,1484734191,1484734305),
	('role/auth',2,'','role/auth',NULL,1484734191,1484734305),
	('role/create',2,'','role/create',NULL,1484734191,1484734305),
	('role/delete',2,'','role/delete',NULL,1484734191,1484734305),
	('role/index',2,'','role/index',NULL,1484734191,1484734305),
	('role/update',2,'','role/update',NULL,1484734191,1484734305);

/*!40000 ALTER TABLE `yii2_auth_item` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yii2_auth_item_child
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yii2_auth_item_child`;

CREATE TABLE `yii2_auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `yii2_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `yii2_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `yii2_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `yii2_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `yii2_auth_item_child` WRITE;
/*!40000 ALTER TABLE `yii2_auth_item_child` DISABLE KEYS */;

INSERT INTO `yii2_auth_item_child` (`parent`, `child`)
VALUES
	('administors','admin/auth'),
	('administors','admin/create'),
	('administors','admin/delete'),
	('administors','admin/index'),
	('administors','admin/update'),
	('administors','config/attachment'),
	('administors','config/basic'),
	('administors','config/send-mail'),
	('administors','database/export'),
	('administors','index/index'),
	('administors','menu/create'),
	('administors','menu/delete'),
	('administors','menu/index'),
	('administors','menu/update'),
	('administors','role/auth'),
	('administors','role/create'),
	('administors','role/delete'),
	('administors','role/index'),
	('administors','role/update');

/*!40000 ALTER TABLE `yii2_auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yii2_auth_rule
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yii2_auth_rule`;

CREATE TABLE `yii2_auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `yii2_auth_rule` WRITE;
/*!40000 ALTER TABLE `yii2_auth_rule` DISABLE KEYS */;

INSERT INTO `yii2_auth_rule` (`name`, `data`, `created_at`, `updated_at`)
VALUES
	('','O:23:\"backend\\models\\AuthRule\":4:{s:4:\"name\";s:0:\"\";s:30:\"\0backend\\models\\AuthRule\0_rule\";r:1;s:9:\"createdAt\";i:1484734191;s:9:\"updatedAt\";i:1484734275;}',1484734191,1484734275),
	('admin/auth','O:23:\"backend\\models\\AuthRule\":4:{s:4:\"name\";s:10:\"admin/auth\";s:30:\"\0backend\\models\\AuthRule\0_rule\";r:1;s:9:\"createdAt\";i:1484734191;s:9:\"updatedAt\";i:1484734305;}',1484734191,1484734305),
	('admin/create','O:23:\"backend\\models\\AuthRule\":4:{s:4:\"name\";s:12:\"admin/create\";s:30:\"\0backend\\models\\AuthRule\0_rule\";r:1;s:9:\"createdAt\";i:1484734191;s:9:\"updatedAt\";i:1484734305;}',1484734191,1484734305),
	('admin/delete','O:23:\"backend\\models\\AuthRule\":4:{s:4:\"name\";s:12:\"admin/delete\";s:30:\"\0backend\\models\\AuthRule\0_rule\";r:1;s:9:\"createdAt\";i:1484734191;s:9:\"updatedAt\";i:1484734305;}',1484734191,1484734305),
	('admin/index','O:23:\"backend\\models\\AuthRule\":4:{s:4:\"name\";s:11:\"admin/index\";s:30:\"\0backend\\models\\AuthRule\0_rule\";r:1;s:9:\"createdAt\";i:1484734191;s:9:\"updatedAt\";i:1484734305;}',1484734191,1484734305),
	('admin/update','O:23:\"backend\\models\\AuthRule\":4:{s:4:\"name\";s:12:\"admin/update\";s:30:\"\0backend\\models\\AuthRule\0_rule\";r:1;s:9:\"createdAt\";i:1484734191;s:9:\"updatedAt\";i:1484734305;}',1484734191,1484734305),
	('config/attachment','O:23:\"backend\\models\\AuthRule\":4:{s:4:\"name\";s:17:\"config/attachment\";s:30:\"\0backend\\models\\AuthRule\0_rule\";r:1;s:9:\"createdAt\";i:1484734191;s:9:\"updatedAt\";i:1484734305;}',1484734191,1484734305),
	('config/basic','O:23:\"backend\\models\\AuthRule\":4:{s:4:\"name\";s:12:\"config/basic\";s:30:\"\0backend\\models\\AuthRule\0_rule\";r:1;s:9:\"createdAt\";i:1484734191;s:9:\"updatedAt\";i:1484734305;}',1484734191,1484734305),
	('config/send-mail','O:23:\"backend\\models\\AuthRule\":4:{s:4:\"name\";s:16:\"config/send-mail\";s:30:\"\0backend\\models\\AuthRule\0_rule\";r:1;s:9:\"createdAt\";i:1484734191;s:9:\"updatedAt\";i:1484734305;}',1484734191,1484734305),
	('database/export','O:23:\"backend\\models\\AuthRule\":4:{s:4:\"name\";s:15:\"database/export\";s:30:\"\0backend\\models\\AuthRule\0_rule\";r:1;s:9:\"createdAt\";i:1484734305;s:9:\"updatedAt\";i:1484734305;}',1484734305,1484734305),
	('index/index','O:23:\"backend\\models\\AuthRule\":4:{s:4:\"name\";s:11:\"index/index\";s:30:\"\0backend\\models\\AuthRule\0_rule\";r:1;s:9:\"createdAt\";i:1484734191;s:9:\"updatedAt\";i:1484734305;}',1484734191,1484734305),
	('menu/create','O:23:\"backend\\models\\AuthRule\":4:{s:4:\"name\";s:11:\"menu/create\";s:30:\"\0backend\\models\\AuthRule\0_rule\";r:1;s:9:\"createdAt\";i:1484734191;s:9:\"updatedAt\";i:1484734305;}',1484734191,1484734305),
	('menu/delete','O:23:\"backend\\models\\AuthRule\":4:{s:4:\"name\";s:11:\"menu/delete\";s:30:\"\0backend\\models\\AuthRule\0_rule\";r:1;s:9:\"createdAt\";i:1484734191;s:9:\"updatedAt\";i:1484734305;}',1484734191,1484734305),
	('menu/index','O:23:\"backend\\models\\AuthRule\":4:{s:4:\"name\";s:10:\"menu/index\";s:30:\"\0backend\\models\\AuthRule\0_rule\";r:1;s:9:\"createdAt\";i:1484734191;s:9:\"updatedAt\";i:1484734305;}',1484734191,1484734305),
	('menu/update','O:23:\"backend\\models\\AuthRule\":4:{s:4:\"name\";s:11:\"menu/update\";s:30:\"\0backend\\models\\AuthRule\0_rule\";r:1;s:9:\"createdAt\";i:1484734191;s:9:\"updatedAt\";i:1484734305;}',1484734191,1484734305),
	('role/auth','O:23:\"backend\\models\\AuthRule\":4:{s:4:\"name\";s:9:\"role/auth\";s:30:\"\0backend\\models\\AuthRule\0_rule\";r:1;s:9:\"createdAt\";i:1484734191;s:9:\"updatedAt\";i:1484734305;}',1484734191,1484734305),
	('role/create','O:23:\"backend\\models\\AuthRule\":4:{s:4:\"name\";s:11:\"role/create\";s:30:\"\0backend\\models\\AuthRule\0_rule\";r:1;s:9:\"createdAt\";i:1484734191;s:9:\"updatedAt\";i:1484734305;}',1484734191,1484734305),
	('role/delete','O:23:\"backend\\models\\AuthRule\":4:{s:4:\"name\";s:11:\"role/delete\";s:30:\"\0backend\\models\\AuthRule\0_rule\";r:1;s:9:\"createdAt\";i:1484734191;s:9:\"updatedAt\";i:1484734305;}',1484734191,1484734305),
	('role/index','O:23:\"backend\\models\\AuthRule\":4:{s:4:\"name\";s:10:\"role/index\";s:30:\"\0backend\\models\\AuthRule\0_rule\";r:1;s:9:\"createdAt\";i:1484734191;s:9:\"updatedAt\";i:1484734305;}',1484734191,1484734305),
	('role/update','O:23:\"backend\\models\\AuthRule\":4:{s:4:\"name\";s:11:\"role/update\";s:30:\"\0backend\\models\\AuthRule\0_rule\";r:1;s:9:\"createdAt\";i:1484734191;s:9:\"updatedAt\";i:1484734305;}',1484734191,1484734305);

/*!40000 ALTER TABLE `yii2_auth_rule` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yii2_config
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yii2_config`;

CREATE TABLE `yii2_config` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `keyid` varchar(20) NOT NULL DEFAULT '',
  `title` varchar(100) NOT NULL DEFAULT '',
  `data` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `keyid` (`keyid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `yii2_config` WRITE;
/*!40000 ALTER TABLE `yii2_config` DISABLE KEYS */;

INSERT INTO `yii2_config` (`id`, `keyid`, `title`, `data`)
VALUES
	(1,'basic','','{\"sitename\":\"Yii2 CMS\",\"url\":\"http:\\/\\/www.test-yii2cms.com\",\"logo\":\"\\/statics\\/themes\\/admin\\/images\\/logo.png\",\"seo_keywords\":\"Yii2,CMS\",\"seo_description\":\"Yii2,CMS\",\"copyright\":\"@Yii2 CMS\",\"statcode\":\"\",\"close\":\"0\",\"close_reason\":\"\\u7ad9\\u70b9\\u5347\\u7ea7\\u4e2d, \\u8bf7\\u7a0d\\u540e\\u8bbf\\u95ee!\"}'),
	(2,'sendmail','','{\"mail_type\":\"0\",\"smtp_server\":\"smtp.qq.com\",\"smtp_port\":\"25\",\"auth\":\"1\",\"openssl\":\"1\",\"smtp_user\":\"771405950\",\"smtp_pwd\":\"qiaoBo1989122\",\"send_email\":\"771405950@qq.com\",\"nickname\":\"\\u8fb9\\u8d70\\u8fb9\\u4e54\",\"sign\":\"<hr \\/>\\r\\n\\u90ae\\u4ef6\\u7b7e\\u540d\\uff1a\\u6b22\\u8fce\\u8bbf\\u95ee <a href=\\\"http:\\/\\/www.test-yii2cms.com\\\" target=\\\"_blank\\\">Yii2 CMS<\\/a>\"}'),
	(3,'attachment','','{\"attachment_size\":\"2048\",\"attachment_suffix\":\"jpg|jpeg|gif|bmp|png\",\"watermark_enable\":\"1\",\"watermark_pos\":\"0\",\"watermark_text\":\"Yii2 CMS\"}');

/*!40000 ALTER TABLE `yii2_config` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yii2_menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yii2_menu`;

CREATE TABLE `yii2_menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `url` varchar(60) NOT NULL DEFAULT '',
  `icon_style` varchar(50) NOT NULL DEFAULT '',
  `display` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `yii2_menu` WRITE;
/*!40000 ALTER TABLE `yii2_menu` DISABLE KEYS */;

INSERT INTO `yii2_menu` (`id`, `pid`, `name`, `url`, `icon_style`, `display`, `sort`)
VALUES
	(1,0,'我的面板','index/index','fa-home',1,0),
	(2,0,'站点设置','config/basic','fa-cogs',1,0),
	(3,0,'管理员设置','admin/index','fa-user',1,0),
	(4,0,'内容设置','','fa-edit',1,0),
	(5,0,'用户设置','','fa-users',1,0),
	(6,0,'数据库设置','database/export','fa-hdd-o',1,0),
	(7,0,'界面设置','','fa-picture-o',1,0),
	(8,1,'系统信息','index/index','',1,0),
	(9,2,'站点配置','config/basic','',1,0),
	(10,2,'后台菜单管理','menu/index','',1,0),
	(11,3,'管理员管理','admin/index','',1,0),
	(12,3,'角色管理','role/index','',1,0),
	(13,4,'内容管理','','',1,0),
	(14,4,'栏目管理','','',1,0),
	(15,4,'模型管理','','',1,0),
	(16,5,'用户管理','','',1,0),
	(17,6,'数据库管理','database/export','',1,0),
	(18,7,'主题管理','','',1,0),
	(19,7,'模板管理','','',1,0),
	(20,9,'基本配置','config/basic','',1,0),
	(21,9,'邮箱配置','config/send-mail','',1,0),
	(22,9,'附件配置','config/attachment','',1,0),
	(23,10,'添加菜单','menu/create','',1,0),
	(24,10,'更新','menu/update','',1,0),
	(25,10,'删除','menu/delete','',1,0),
	(26,11,'添加','admin/create','',1,0),
	(27,11,'更新','admin/update','',1,0),
	(28,11,'授权','admin/auth','',1,0),
	(29,11,'删除','admin/delete','',1,0),
	(30,12,'添加','role/create','',1,0),
	(31,12,'更新','role/update','',1,0),
	(32,12,'授权','role/auth','',1,0),
	(33,12,'删除','role/delete','',1,0);

/*!40000 ALTER TABLE `yii2_menu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yii2_migration
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yii2_migration`;

CREATE TABLE `yii2_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `yii2_migration` WRITE;
/*!40000 ALTER TABLE `yii2_migration` DISABLE KEYS */;

INSERT INTO `yii2_migration` (`version`, `apply_time`)
VALUES
	('m000000_000000_base',1482231528),
	('m130524_201442_init',1482231534);

/*!40000 ALTER TABLE `yii2_migration` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yii2_session
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yii2_session`;

CREATE TABLE `yii2_session` (
  `id` char(40) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `yii2_session` WRITE;
/*!40000 ALTER TABLE `yii2_session` DISABLE KEYS */;

INSERT INTO `yii2_session` (`id`, `expire`, `data`)
VALUES
	('50mv18unkq46q5t94n0tv7t1l3',1484732865,X'5F5F666C6173687C613A303A7B7D5F5F69647C693A313B'),
	('5c589uela7jkdc7s7lijpu71e1',1482319990,X'5F5F666C6173687C613A303A7B7D5F5F72657475726E55726C7C733A31303A222F61646D696E2E706870223B'),
	('5e7jksn25g5a69rmmkcv6v3jh2',1482234228,X'5F5F666C6173687C613A303A7B7D'),
	('bfffpuqu46gt0t857r53382o56',1482249265,X'5F5F666C6173687C613A303A7B7D5F5F72657475726E55726C7C733A32363A222F61646D696E2E7068703F723D696E6465782532466C6F67696E223B'),
	('c9ive1r6ogid1c9gp1tdsmis76',1486376936,X'5F5F666C6173687C613A303A7B7D5F5F69647C693A313B'),
	('cdfe9o8aegeg2c4lfovbsq8ai6',1482328081,X'5F5F666C6173687C613A303A7B7D5F5F72657475726E55726C7C733A31303A222F61646D696E2E706870223B'),
	('muupqb3dhiko9m8j14u0a41f37',1484737919,X'5F5F666C6173687C613A303A7B7D5F5F72657475726E55726C7C733A32343A222F61646D696E2E7068703F723D696E6465782F6C6F67696E223B5F5F69647C693A313B'),
	('pkega8ai18h7scjtb5gd3lamq3',1482332077,X'5F5F666C6173687C613A303A7B7D5F5F69647C693A313B');

/*!40000 ALTER TABLE `yii2_session` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yii2_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yii2_user`;

CREATE TABLE `yii2_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
