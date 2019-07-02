/*
Navicat MySQL Data Transfer

Source Server         : hxadmin
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : hxadmin

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-12-12 14:10:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for 动态扣分标准
-- ----------------------------
DROP TABLE IF EXISTS `动态扣分标准`;
CREATE TABLE `动态扣分标准` (
  `序号` varchar(255) DEFAULT NULL,
  `扣分标准` varchar(255) DEFAULT NULL,
  `内容` varchar(255) DEFAULT NULL,
  `工程名称` varchar(255) DEFAULT NULL,
  `主表编号` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`主表编号`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of 动态扣分标准
-- ----------------------------
INSERT INTO `动态扣分标准` VALUES ('123', '标准1', 'adh', null, '', '21');
