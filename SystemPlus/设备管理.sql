/*
Navicat MySQL Data Transfer

Source Server         : hxadmin
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : hxadmin

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-12-12 14:11:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for 设备管理
-- ----------------------------
DROP TABLE IF EXISTS `设备管理`;
CREATE TABLE `设备管理` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `状态` varchar(255) DEFAULT NULL,
  `登记日期` varchar(255) DEFAULT NULL,
  `设备产权备案号` varchar(255) DEFAULT NULL,
  `出厂编号` varchar(255) DEFAULT NULL,
  `出厂日期` varchar(255) DEFAULT NULL,
  `制造单位` varchar(255) DEFAULT NULL,
  `规格型号` varchar(255) DEFAULT NULL,
  `起重机名称` varchar(255) DEFAULT NULL,
  `选择` varchar(255) DEFAULT NULL,
  `序号` varchar(255) DEFAULT NULL,
  `进度` varchar(255) DEFAULT NULL,
  `建筑起重机械类型` varchar(255) DEFAULT NULL,
  `主表编号` varchar(255) NOT NULL,
  `工程名称` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`主表编号`)
) ENGINE=MyISAM AUTO_INCREMENT=124 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of 设备管理
-- ----------------------------
INSERT INTO `设备管理` VALUES ('101', '1', '山', '中', '学', '技', '大', '科', '山', '子', '123', '电', '出', '版', '哈');
