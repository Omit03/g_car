/*
Navicat MySQL Data Transfer

Source Server         : OA
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : g_car4

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-10-22 19:23:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for car_liulan_history
-- ----------------------------
DROP TABLE IF EXISTS `car_liulan_history`;
CREATE TABLE `car_liulan_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL COMMENT '浏览人的id',
  `type` tinyint(2) NOT NULL COMMENT '浏览类型 1新车 2二手车 3零首付 4新能源',
  `cheid` int(11) NOT NULL COMMENT '浏览的车的id',
  `brand_id` int(11) NOT NULL DEFAULT '0' COMMENT '品牌id',
  `sys_id` int(11) NOT NULL DEFAULT '0' COMMENT 'sys_id',
  `cartype_id` int(11) NOT NULL DEFAULT '0' COMMENT 'cartype_id',
  `img` varchar(255) NOT NULL DEFAULT '0' COMMENT '图片链接',
  `name` varchar(200) NOT NULL DEFAULT '0' COMMENT '车名',
  `price` tinyint(200) NOT NULL DEFAULT '0' COMMENT '车总价',
  `paitime` varchar(100) NOT NULL DEFAULT '0' COMMENT '上牌时间',
  `licheng` varchar(200) NOT NULL DEFAULT '0' COMMENT '二手车里程',
  `shoufu` varchar(100) NOT NULL DEFAULT '0' COMMENT '首付',
  `yuegong` varchar(250) NOT NULL DEFAULT '0' COMMENT '月供',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
