/*
SQLyog Professional v12.09 (64 bit)
MySQL - 5.5.49-cll-lve : Database - fms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`fms` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `fms`;

/*Table structure for table `admin_user` */

DROP TABLE IF EXISTS `admin_user`;

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `auth_key` varchar(32) NOT NULL COMMENT '自动登录key',
  `password_hash` varchar(255) NOT NULL COMMENT '加密密码',
  `password_reset_token` varchar(255) DEFAULT NULL COMMENT '重置密码token',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `role` smallint(6) NOT NULL DEFAULT '10' COMMENT '角色等级',
  `status` smallint(6) NOT NULL DEFAULT '10' COMMENT '状态',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='用户表';

/*Data for the table `admin_user` */

insert  into `admin_user`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`role`,`status`,`created_at`,`updated_at`) values (1,'admin','XsEvIA8Em9aOZ-2O5tKjjwiOrix4aFha','$2y$13$kos1v./jhKfzJntoPhDUhO4YoMBqcdMwpy44GCVJxIt.qEd62Bu1G',NULL,'admin@qq.com',10,10,1461785362,1461785362),(2,'jidi','XsEvIA8Em9aOZ-2O5tKjjwiOrix4aFha','$2y$13$kos1v./jhKfzJntoPhDUhO4YoMBqcdMwpy44GCVJxIt.qEd62Bu1G',NULL,'jidi@qq.com',0,10,1461785362,1461785362);

/*Table structure for table `auth_assignment` */

DROP TABLE IF EXISTS `auth_assignment`;

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_assignment` */

insert  into `auth_assignment`(`item_name`,`user_id`,`created_at`) values ('普通后台管理员','2',1462275849),('超级管理','1',1462284102);

/*Table structure for table `auth_item` */

DROP TABLE IF EXISTS `auth_item`;

CREATE TABLE `auth_item` (
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
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_item` */

insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('/admin/*',2,NULL,NULL,NULL,1462273109,1462273109),('/admin/access-control',2,NULL,NULL,NULL,1462284147,1462284147),('/admin/assignment/*',2,NULL,NULL,NULL,1462270498,1462270498),('/admin/assignment/assign',2,NULL,NULL,NULL,1462270493,1462270493),('/admin/assignment/index',2,NULL,NULL,NULL,1462270490,1462270490),('/admin/assignment/revoke',2,NULL,NULL,NULL,1462270495,1462270495),('/admin/assignment/view',2,NULL,NULL,NULL,1462270492,1462270492),('/admin/default/*',2,NULL,NULL,NULL,1462270502,1462270502),('/admin/default/index',2,NULL,NULL,NULL,1462270500,1462270500),('/admin/menu/*',2,NULL,NULL,NULL,1462270512,1462270512),('/admin/menu/create',2,NULL,NULL,NULL,1462270507,1462270507),('/admin/menu/delete',2,NULL,NULL,NULL,1462270510,1462270510),('/admin/menu/index',2,NULL,NULL,NULL,1462270504,1462270504),('/admin/menu/update',2,NULL,NULL,NULL,1462270509,1462270509),('/admin/menu/view',2,NULL,NULL,NULL,1462270505,1462270505),('/admin/permission/*',2,NULL,NULL,NULL,1462270526,1462270526),('/admin/permission/assign',2,NULL,NULL,NULL,1462270523,1462270523),('/admin/permission/create',2,NULL,NULL,NULL,1462270518,1462270518),('/admin/permission/delete',2,NULL,NULL,NULL,1462270522,1462270522),('/admin/permission/index',2,NULL,NULL,NULL,1462270514,1462270514),('/admin/permission/remove',2,NULL,NULL,NULL,1462270524,1462270524),('/admin/permission/update',2,NULL,NULL,NULL,1462270520,1462270520),('/admin/permission/view',2,NULL,NULL,NULL,1462270516,1462270516),('/admin/role/*',2,NULL,NULL,NULL,1462270538,1462270538),('/admin/role/assign',2,NULL,NULL,NULL,1462270535,1462270535),('/admin/role/create',2,NULL,NULL,NULL,1462270531,1462270531),('/admin/role/delete',2,NULL,NULL,NULL,1462270533,1462270533),('/admin/role/index',2,NULL,NULL,NULL,1462270527,1462270527),('/admin/role/remove',2,NULL,NULL,NULL,1462270536,1462270536),('/admin/role/update',2,NULL,NULL,NULL,1462270532,1462270532),('/admin/role/view',2,NULL,NULL,NULL,1462270529,1462270529),('/admin/route/*',2,NULL,NULL,NULL,1462270553,1462270553),('/admin/route/assign',2,NULL,NULL,NULL,1462270543,1462270543),('/admin/route/create',2,NULL,NULL,NULL,1462270540,1462270540),('/admin/route/index',2,NULL,NULL,NULL,1462270542,1462270542),('/admin/route/refresh',2,NULL,NULL,NULL,1462270552,1462270552),('/admin/route/remove',2,NULL,NULL,NULL,1462270550,1462270550),('/admin/rule/*',2,NULL,NULL,NULL,1462270563,1462270563),('/admin/rule/create',2,NULL,NULL,NULL,1462270558,1462270558),('/admin/rule/delete',2,NULL,NULL,NULL,1462270562,1462270562),('/admin/rule/index',2,NULL,NULL,NULL,1462270555,1462270555),('/admin/rule/update',2,NULL,NULL,NULL,1462270560,1462270560),('/admin/rule/view',2,NULL,NULL,NULL,1462270557,1462270557),('/admin/user/*',2,NULL,NULL,NULL,1462271331,1462271331),('/admin/user/activate',2,NULL,NULL,NULL,1462271329,1462271329),('/admin/user/change-password',2,NULL,NULL,NULL,1462271327,1462271327),('/admin/user/delete',2,NULL,NULL,NULL,1462271318,1462271318),('/admin/user/index',2,NULL,NULL,NULL,1462270565,1462270565),('/admin/user/login',2,NULL,NULL,NULL,1462271319,1462271319),('/admin/user/logout',2,NULL,NULL,NULL,1462271321,1462271321),('/admin/user/request-password-reset',2,NULL,NULL,NULL,1462271324,1462271324),('/admin/user/reset-password',2,NULL,NULL,NULL,1462271326,1462271326),('/admin/user/signup',2,NULL,NULL,NULL,1462271323,1462271323),('/admin/user/view',2,NULL,NULL,NULL,1462271316,1462271316),('/shop/*',2,NULL,NULL,NULL,1463040448,1463040448),('/shop/add',2,NULL,NULL,NULL,1463041839,1463041839),('/shop/index',2,NULL,NULL,NULL,1463040587,1463040587),('/site/*',2,NULL,NULL,NULL,1462271364,1462271364),('/site/error',2,NULL,NULL,NULL,1462271358,1462271358),('/site/index',2,NULL,NULL,NULL,1462271359,1462271359),('/site/login',2,NULL,NULL,NULL,1462271361,1462271361),('/site/logout',2,NULL,NULL,NULL,1462271362,1462271362),('/test/*',2,NULL,NULL,NULL,1463112183,1463112183),('/test/alipay',2,NULL,NULL,NULL,1463395223,1463395223),('/test/baidu-api',2,NULL,NULL,NULL,1463380529,1463380529),('/test/index',2,NULL,NULL,NULL,1463112190,1463112190),('/test/jpush',2,NULL,NULL,NULL,1463384187,1463384187),('/test/qiniu',2,NULL,NULL,NULL,1463125342,1463125342),('开发调试',2,'调试',NULL,NULL,1463112271,1463395272),('普通后台管理员',1,'普通后台管理员',NULL,NULL,1462271508,1462271508),('权限控制',2,'权限控制',NULL,NULL,1462283924,1462283924),('超级管理',1,'拥有所有权限',NULL,NULL,1462284067,1462284067),('门店管理',2,'门店管理',NULL,NULL,1463040565,1463040647);

/*Table structure for table `auth_item_child` */

DROP TABLE IF EXISTS `auth_item_child`;

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_item_child` */

insert  into `auth_item_child`(`parent`,`child`) values ('权限控制','/admin/access-control'),('权限控制','/admin/assignment/*'),('权限控制','/admin/assignment/assign'),('权限控制','/admin/assignment/index'),('权限控制','/admin/assignment/revoke'),('权限控制','/admin/assignment/view'),('权限控制','/admin/menu/*'),('权限控制','/admin/menu/create'),('权限控制','/admin/menu/delete'),('权限控制','/admin/menu/index'),('权限控制','/admin/menu/update'),('权限控制','/admin/menu/view'),('权限控制','/admin/permission/*'),('权限控制','/admin/permission/assign'),('权限控制','/admin/permission/create'),('权限控制','/admin/permission/delete'),('权限控制','/admin/permission/index'),('权限控制','/admin/permission/remove'),('权限控制','/admin/permission/update'),('权限控制','/admin/permission/view'),('权限控制','/admin/role/*'),('权限控制','/admin/role/assign'),('权限控制','/admin/role/create'),('权限控制','/admin/role/delete'),('权限控制','/admin/role/index'),('权限控制','/admin/role/remove'),('权限控制','/admin/role/update'),('权限控制','/admin/role/view'),('权限控制','/admin/route/*'),('权限控制','/admin/route/assign'),('权限控制','/admin/route/create'),('权限控制','/admin/route/index'),('权限控制','/admin/route/refresh'),('权限控制','/admin/route/remove'),('权限控制','/admin/rule/*'),('权限控制','/admin/rule/create'),('权限控制','/admin/rule/delete'),('权限控制','/admin/rule/index'),('权限控制','/admin/rule/update'),('权限控制','/admin/rule/view'),('门店管理','/shop/*'),('门店管理','/shop/add'),('门店管理','/shop/index'),('开发调试','/test/*'),('开发调试','/test/alipay'),('开发调试','/test/baidu-api'),('开发调试','/test/index'),('开发调试','/test/jpush'),('开发调试','/test/qiniu'),('超级管理','开发调试'),('超级管理','权限控制'),('超级管理','门店管理');

/*Table structure for table `auth_rule` */

DROP TABLE IF EXISTS `auth_rule`;

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `auth_rule` */

/*Table structure for table `img` */

DROP TABLE IF EXISTS `img`;

CREATE TABLE `img` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '图片名称',
  `rtype` varchar(5) DEFAULT NULL COMMENT '资源类型 jpg',
  `url` varchar(100) DEFAULT NULL COMMENT '完整路径',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `is_deleted` tinyint(1) DEFAULT '0' COMMENT '是否删除(-1:删除；0:未删除)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `img` */

insert  into `img`(`id`,`name`,`rtype`,`url`,`create_time`,`is_deleted`) values (1,'o_1airntcu51tri1mu81rhj1mq613327.png','png','http://7xs3pn.com1.z0.glb.clouddn.com/o_1airntcu51tri1mu81rhj1mq613327.png','2016-05-16 02:56:55',0),(2,'o_1airo3p5lkppl410f51a5ui1mc.png','png','http://7xs3pn.com1.z0.glb.clouddn.com/o_1airo3p5lkppl410f51a5ui1mc.png','2016-05-16 03:00:24',0),(3,'o_1airo85tcm6s13pm11b4rp4he57.png','png','http://7xs3pn.com1.z0.glb.clouddn.com/o_1airo85tcm6s13pm11b4rp4he57.png','2016-05-16 03:02:48',0),(4,'o_1airoink713ge17ssajr1ir9g5b7.png','png','http://7xs3pn.com1.z0.glb.clouddn.com/o_1airoink713ge17ssajr1ir9g5b7.png','2016-05-16 03:08:34',0),(5,'o_1airoufa919k71tdt165n1fhh1evh7.png','png','http://7xs3pn.com1.z0.glb.clouddn.com/o_1airoufa919k71tdt165n1fhh1evh7.png','2016-05-16 03:14:59',0),(6,'o_1airpophl197992svaucgk4n77.png','png','http://7xs3pn.com1.z0.glb.clouddn.com/o_1airpophl197992svaucgk4n77.png','2016-05-16 03:29:21',0),(7,'o_1airq0l5pe5pcu58k71t8o6te7.png','png','http://7xs3pn.com1.z0.glb.clouddn.com/o_1airq0l5pe5pcu58k71t8o6te7.png','2016-05-16 03:33:39',0),(8,'o_1airq3t1gfco9k7ajtm5c8f47.png','png','http://7xs3pn.com1.z0.glb.clouddn.com/o_1airq3t1gfco9k7ajtm5c8f47.png','2016-05-16 03:35:25',0),(9,'o_1airqcjf61brv19ik1ctru301vev7.png','png','http://7xs3pn.com1.z0.glb.clouddn.com/o_1airqcjf61brv19ik1ctru301vev7.png','2016-05-16 03:40:10',0),(10,'o_1airqtuh51phv19l7u5efo41h3n7.png','png','http://7xs3pn.com1.z0.glb.clouddn.com/o_1airqtuh51phv19l7u5efo41h3n7.png','2016-05-16 03:49:39',0),(11,'o_1airri8brcuf1nf31rc51d251fdi7.png','png','http://7xs3pn.com1.z0.glb.clouddn.com/o_1airri8brcuf1nf31rc51d251fdi7.png','2016-05-16 04:00:44',0),(12,'o_1airrjp3m11ji1et21ea9tv09f57.png','png','http://7xs3pn.com1.z0.glb.clouddn.com/o_1airrjp3m11ji1et21ea9tv09f57.png','2016-05-16 04:01:34',0),(13,'o_1airrm6qbf7c1ahrosq8o21ekv7.png','png','http://7xs3pn.com1.z0.glb.clouddn.com/o_1airrm6qbf7c1ahrosq8o21ekv7.png','2016-05-16 04:02:54',0),(14,'o_1airro9641pfo126mrjc16rbcic7.png','png','http://7xs3pn.com1.z0.glb.clouddn.com/o_1airro9641pfo126mrjc16rbcic7.png','2016-05-16 04:04:02',0),(15,'o_1airrosppni0css1nbv1nf98pu7.png','png','http://7xs3pn.com1.z0.glb.clouddn.com/o_1airrosppni0css1nbv1nf98pu7.png','2016-05-16 04:04:22',0),(16,'o_1airrq9311v9sl961tft1psu1soa7.png','png','http://7xs3pn.com1.z0.glb.clouddn.com/o_1airrq9311v9sl961tft1psu1soa7.png','2016-05-16 04:05:07',0),(17,'o_1airrr6es1cg4tilln414nctgr7.png','png','http://7xs3pn.com1.z0.glb.clouddn.com/o_1airrr6es1cg4tilln414nctgr7.png','2016-05-16 04:05:37',0),(18,'o_1ais20obl1r1sn7j13791cgc1bc67.png','png','http://7xs3pn.com1.z0.glb.clouddn.com/o_1ais20obl1r1sn7j13791cgc1bc67.png','2016-05-16 05:53:31',0),(19,'o_1aisdbdu713ik1at316uejc5ute7.png','png','http://7xs3pn.com1.z0.glb.clouddn.com/o_1aisdbdu713ik1at316uejc5ute7.png','2016-05-16 09:11:35',0);

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COMMENT='后台-菜单';

/*Data for the table `menu` */

insert  into `menu`(`id`,`name`,`parent`,`route`,`order`,`data`) values (9,'权限管理',NULL,'/admin/access-control',100,'{\"icon\": \"fa fa-gears\", \"visible\": true}'),(10,'路由',9,'/admin/route/index',1,NULL),(11,'权限',9,'/admin/permission/index',2,NULL),(12,'角色',9,'/admin/role/index',3,NULL),(14,'分配',9,'/admin/assignment/index',4,NULL),(15,'菜单',9,'/admin/menu/index',5,NULL),(23,'门店管理',NULL,'/shop/index',NULL,'{\"icon\": \"fa fa-crop\", \"visible\": true}'),(24,'列表',23,'/shop/index',1,NULL),(25,'开发调试',NULL,'/test/index',99,'{\"icon\":\"fa fa-vimeo\",\"visible\":true}'),(26,'短信验证码',25,'/test/index',1,NULL),(27,'七牛',25,'/test/qiniu',2,NULL),(28,'百度地图',25,'/test/baidu-api',3,NULL),(29,'极光推送',25,'/test/jpush',4,NULL),(30,'支付宝',25,'/test/alipay',5,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
