/*
Navicat MySQL Data Transfer

Source Server         : hxadmin
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : hxadmin

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-12-12 14:10:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for 危险源
-- ----------------------------
DROP TABLE IF EXISTS `危险源`;
CREATE TABLE `危险源` (
  `内容` varchar(255) DEFAULT NULL,
  `危险源` varchar(255) DEFAULT NULL,
  `序号` varchar(255) DEFAULT NULL,
  `主表编号` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `工程名称` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`主表编号`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of 危险源
-- ----------------------------
INSERT INTO `危险源` VALUES ('bad', 'djka', '123', '', '12', null);
