/*
Navicat MySQL Data Transfer

Source Server         : hxadmin
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : hxadmin

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-12-21 15:56:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for 违章数据库
-- ----------------------------
DROP TABLE IF EXISTS `违章数据库`;
CREATE TABLE `违章数据库` (
  `违章大类` varchar(255) DEFAULT NULL,
  `检查项目` varchar(255) DEFAULT NULL,
  `内容` varchar(255) DEFAULT NULL,
  `对象` varchar(255) DEFAULT NULL,
  `类型` varchar(255) DEFAULT NULL,
  `扣分值` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of 违章数据库
-- ----------------------------
INSERT INTO `违章数据库` VALUES ('CES', 'CES', 'CES', 'CES', 'CES', 'CES');
