/*
Navicat MySQL Data Transfer

Source Server         : 192.168.254.100
Source Server Version : 50549
Source Host           : 192.168.254.100:3306
Source Database       : fms

Target Server Type    : MYSQL
Target Server Version : 50549
File Encoding         : 65001

Date: 2016-05-13 15:32:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin_user`
-- ----------------------------
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

-- ----------------------------
-- Records of admin_user
-- ----------------------------
INSERT INTO `admin_user` VALUES ('1', 'admin', 'XsEvIA8Em9aOZ-2O5tKjjwiOrix4aFha', '$2y$13$kos1v./jhKfzJntoPhDUhO4YoMBqcdMwpy44GCVJxIt.qEd62Bu1G', null, 'admin@qq.com', '10', '10', '1461785362', '1461785362');
INSERT INTO `admin_user` VALUES ('2', 'jidi', 'XsEvIA8Em9aOZ-2O5tKjjwiOrix4aFha', '$2y$13$kos1v./jhKfzJntoPhDUhO4YoMBqcdMwpy44GCVJxIt.qEd62Bu1G', null, 'jidi@qq.com', '0', '10', '1461785362', '1461785362');

-- ----------------------------
-- Table structure for `auth_assignment`
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('普通后台管理员', '2', '1462275849');
INSERT INTO `auth_assignment` VALUES ('超级管理', '1', '1462284102');

-- ----------------------------
-- Table structure for `auth_item`
-- ----------------------------
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

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/admin/*', '2', null, null, null, '1462273109', '1462273109');
INSERT INTO `auth_item` VALUES ('/admin/access-control', '2', null, null, null, '1462284147', '1462284147');
INSERT INTO `auth_item` VALUES ('/admin/assignment/*', '2', null, null, null, '1462270498', '1462270498');
INSERT INTO `auth_item` VALUES ('/admin/assignment/assign', '2', null, null, null, '1462270493', '1462270493');
INSERT INTO `auth_item` VALUES ('/admin/assignment/index', '2', null, null, null, '1462270490', '1462270490');
INSERT INTO `auth_item` VALUES ('/admin/assignment/revoke', '2', null, null, null, '1462270495', '1462270495');
INSERT INTO `auth_item` VALUES ('/admin/assignment/view', '2', null, null, null, '1462270492', '1462270492');
INSERT INTO `auth_item` VALUES ('/admin/default/*', '2', null, null, null, '1462270502', '1462270502');
INSERT INTO `auth_item` VALUES ('/admin/default/index', '2', null, null, null, '1462270500', '1462270500');
INSERT INTO `auth_item` VALUES ('/admin/menu/*', '2', null, null, null, '1462270512', '1462270512');
INSERT INTO `auth_item` VALUES ('/admin/menu/create', '2', null, null, null, '1462270507', '1462270507');
INSERT INTO `auth_item` VALUES ('/admin/menu/delete', '2', null, null, null, '1462270510', '1462270510');
INSERT INTO `auth_item` VALUES ('/admin/menu/index', '2', null, null, null, '1462270504', '1462270504');
INSERT INTO `auth_item` VALUES ('/admin/menu/update', '2', null, null, null, '1462270509', '1462270509');
INSERT INTO `auth_item` VALUES ('/admin/menu/view', '2', null, null, null, '1462270505', '1462270505');
INSERT INTO `auth_item` VALUES ('/admin/permission/*', '2', null, null, null, '1462270526', '1462270526');
INSERT INTO `auth_item` VALUES ('/admin/permission/assign', '2', null, null, null, '1462270523', '1462270523');
INSERT INTO `auth_item` VALUES ('/admin/permission/create', '2', null, null, null, '1462270518', '1462270518');
INSERT INTO `auth_item` VALUES ('/admin/permission/delete', '2', null, null, null, '1462270522', '1462270522');
INSERT INTO `auth_item` VALUES ('/admin/permission/index', '2', null, null, null, '1462270514', '1462270514');
INSERT INTO `auth_item` VALUES ('/admin/permission/remove', '2', null, null, null, '1462270524', '1462270524');
INSERT INTO `auth_item` VALUES ('/admin/permission/update', '2', null, null, null, '1462270520', '1462270520');
INSERT INTO `auth_item` VALUES ('/admin/permission/view', '2', null, null, null, '1462270516', '1462270516');
INSERT INTO `auth_item` VALUES ('/admin/role/*', '2', null, null, null, '1462270538', '1462270538');
INSERT INTO `auth_item` VALUES ('/admin/role/assign', '2', null, null, null, '1462270535', '1462270535');
INSERT INTO `auth_item` VALUES ('/admin/role/create', '2', null, null, null, '1462270531', '1462270531');
INSERT INTO `auth_item` VALUES ('/admin/role/delete', '2', null, null, null, '1462270533', '1462270533');
INSERT INTO `auth_item` VALUES ('/admin/role/index', '2', null, null, null, '1462270527', '1462270527');
INSERT INTO `auth_item` VALUES ('/admin/role/remove', '2', null, null, null, '1462270536', '1462270536');
INSERT INTO `auth_item` VALUES ('/admin/role/update', '2', null, null, null, '1462270532', '1462270532');
INSERT INTO `auth_item` VALUES ('/admin/role/view', '2', null, null, null, '1462270529', '1462270529');
INSERT INTO `auth_item` VALUES ('/admin/route/*', '2', null, null, null, '1462270553', '1462270553');
INSERT INTO `auth_item` VALUES ('/admin/route/assign', '2', null, null, null, '1462270543', '1462270543');
INSERT INTO `auth_item` VALUES ('/admin/route/create', '2', null, null, null, '1462270540', '1462270540');
INSERT INTO `auth_item` VALUES ('/admin/route/index', '2', null, null, null, '1462270542', '1462270542');
INSERT INTO `auth_item` VALUES ('/admin/route/refresh', '2', null, null, null, '1462270552', '1462270552');
INSERT INTO `auth_item` VALUES ('/admin/route/remove', '2', null, null, null, '1462270550', '1462270550');
INSERT INTO `auth_item` VALUES ('/admin/rule/*', '2', null, null, null, '1462270563', '1462270563');
INSERT INTO `auth_item` VALUES ('/admin/rule/create', '2', null, null, null, '1462270558', '1462270558');
INSERT INTO `auth_item` VALUES ('/admin/rule/delete', '2', null, null, null, '1462270562', '1462270562');
INSERT INTO `auth_item` VALUES ('/admin/rule/index', '2', null, null, null, '1462270555', '1462270555');
INSERT INTO `auth_item` VALUES ('/admin/rule/update', '2', null, null, null, '1462270560', '1462270560');
INSERT INTO `auth_item` VALUES ('/admin/rule/view', '2', null, null, null, '1462270557', '1462270557');
INSERT INTO `auth_item` VALUES ('/admin/user/*', '2', null, null, null, '1462271331', '1462271331');
INSERT INTO `auth_item` VALUES ('/admin/user/activate', '2', null, null, null, '1462271329', '1462271329');
INSERT INTO `auth_item` VALUES ('/admin/user/change-password', '2', null, null, null, '1462271327', '1462271327');
INSERT INTO `auth_item` VALUES ('/admin/user/delete', '2', null, null, null, '1462271318', '1462271318');
INSERT INTO `auth_item` VALUES ('/admin/user/index', '2', null, null, null, '1462270565', '1462270565');
INSERT INTO `auth_item` VALUES ('/admin/user/login', '2', null, null, null, '1462271319', '1462271319');
INSERT INTO `auth_item` VALUES ('/admin/user/logout', '2', null, null, null, '1462271321', '1462271321');
INSERT INTO `auth_item` VALUES ('/admin/user/request-password-reset', '2', null, null, null, '1462271324', '1462271324');
INSERT INTO `auth_item` VALUES ('/admin/user/reset-password', '2', null, null, null, '1462271326', '1462271326');
INSERT INTO `auth_item` VALUES ('/admin/user/signup', '2', null, null, null, '1462271323', '1462271323');
INSERT INTO `auth_item` VALUES ('/admin/user/view', '2', null, null, null, '1462271316', '1462271316');
INSERT INTO `auth_item` VALUES ('/shop/*', '2', null, null, null, '1463040448', '1463040448');
INSERT INTO `auth_item` VALUES ('/shop/add', '2', null, null, null, '1463041839', '1463041839');
INSERT INTO `auth_item` VALUES ('/shop/index', '2', null, null, null, '1463040587', '1463040587');
INSERT INTO `auth_item` VALUES ('/site/*', '2', null, null, null, '1462271364', '1462271364');
INSERT INTO `auth_item` VALUES ('/site/error', '2', null, null, null, '1462271358', '1462271358');
INSERT INTO `auth_item` VALUES ('/site/index', '2', null, null, null, '1462271359', '1462271359');
INSERT INTO `auth_item` VALUES ('/site/login', '2', null, null, null, '1462271361', '1462271361');
INSERT INTO `auth_item` VALUES ('/site/logout', '2', null, null, null, '1462271362', '1462271362');
INSERT INTO `auth_item` VALUES ('/test/*', '2', null, null, null, '1463112183', '1463112183');
INSERT INTO `auth_item` VALUES ('/test/index', '2', null, null, null, '1463112190', '1463112190');
INSERT INTO `auth_item` VALUES ('普通后台管理员', '1', '普通后台管理员', null, null, '1462271508', '1462271508');
INSERT INTO `auth_item` VALUES ('权限控制', '2', '权限控制', null, null, '1462283924', '1462283924');
INSERT INTO `auth_item` VALUES ('调试', '2', '调试', null, null, '1463112271', '1463112306');
INSERT INTO `auth_item` VALUES ('超级管理', '1', '拥有所有权限', null, null, '1462284067', '1462284067');
INSERT INTO `auth_item` VALUES ('门店管理', '2', '门店管理', null, null, '1463040565', '1463040647');

-- ----------------------------
-- Table structure for `auth_item_child`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/access-control');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/assignment/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/assignment/assign');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/assignment/index');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/assignment/revoke');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/assignment/view');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/menu/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/menu/create');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/menu/delete');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/menu/index');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/menu/update');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/menu/view');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/permission/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/permission/assign');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/permission/create');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/permission/delete');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/permission/index');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/permission/remove');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/permission/update');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/permission/view');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/role/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/role/assign');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/role/create');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/role/delete');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/role/index');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/role/remove');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/role/update');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/role/view');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/route/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/route/assign');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/route/create');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/route/index');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/route/refresh');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/route/remove');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/rule/*');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/rule/create');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/rule/delete');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/rule/index');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/rule/update');
INSERT INTO `auth_item_child` VALUES ('权限控制', '/admin/rule/view');
INSERT INTO `auth_item_child` VALUES ('门店管理', '/shop/*');
INSERT INTO `auth_item_child` VALUES ('门店管理', '/shop/add');
INSERT INTO `auth_item_child` VALUES ('门店管理', '/shop/index');
INSERT INTO `auth_item_child` VALUES ('调试', '/test/*');
INSERT INTO `auth_item_child` VALUES ('调试', '/test/index');
INSERT INTO `auth_item_child` VALUES ('超级管理', '权限控制');
INSERT INTO `auth_item_child` VALUES ('超级管理', '调试');
INSERT INTO `auth_item_child` VALUES ('超级管理', '门店管理');

-- ----------------------------
-- Table structure for `auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for `menu`
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='后台-菜单';

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('9', '权限管理', null, '/admin/access-control', '100', '{\"icon\": \"fa fa-gears\", \"visible\": true}');
INSERT INTO `menu` VALUES ('10', '路由', '9', '/admin/route/index', '1', null);
INSERT INTO `menu` VALUES ('11', '权限', '9', '/admin/permission/index', '2', null);
INSERT INTO `menu` VALUES ('12', '角色', '9', '/admin/role/index', '3', null);
INSERT INTO `menu` VALUES ('14', '分配', '9', '/admin/assignment/index', '4', null);
INSERT INTO `menu` VALUES ('15', '菜单', '9', '/admin/menu/index', '5', null);
INSERT INTO `menu` VALUES ('23', '门店管理', null, '/shop/index', null, '{\"icon\": \"fa fa-crop\", \"visible\": true}');
INSERT INTO `menu` VALUES ('24', '列表', '23', '/shop/index', null, null);
INSERT INTO `menu` VALUES ('25', '开发调试', null, '/test/index', '99', '{\"icon\":\"fa fa-vimeo\",\"visible\":true}');
INSERT INTO `menu` VALUES ('26', '调试页面', '25', '/test/index', null, null);
