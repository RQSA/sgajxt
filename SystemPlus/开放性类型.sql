/*
Navicat MySQL Data Transfer

Source Server         : hxadmin
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : hxadmin

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-12-21 22:55:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for 开放性类型
-- ----------------------------
DROP TABLE IF EXISTS `开放性类型`;
CREATE TABLE `开放性类型` (
  `序号` varchar(255) DEFAULT NULL,
  `名称` varchar(255) DEFAULT NULL,
  `序号1` varchar(255) DEFAULT NULL,
  `名称1` varchar(255) DEFAULT NULL,
  `序号2` varchar(255) DEFAULT NULL,
  `序号3` varchar(255) DEFAULT NULL,
  `序号4` varchar(255) DEFAULT NULL,
  `名称2` varchar(255) DEFAULT NULL,
  `名称3` varchar(255) DEFAULT NULL,
  `名称4` varchar(255) DEFAULT NULL,
  `细类` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of 开放性类型
-- ----------------------------
INSERT INTO `开放性类型` VALUES ('1', '1', '21', '3', '恩恩', '啊啊', '22 ', '拉拉队', '问问', '恩恩', '人');
