/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : mybbs

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2013-12-02 17:51:25
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `message`
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `content` text NOT NULL,
  `subject` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  `user_to` varchar(45) NOT NULL,
  `user_from` varchar(45) NOT NULL,
  `abcd` int(20) NOT NULL,
  `message_id` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('aa', 'aa', '2013-12-03 05:39:23', 'aaaa', 'admin', '0', '1');
INSERT INTO `message` VALUES ('111', '11', '2013-12-03 05:39:42', 'admin', 'admin', '1', '2');
INSERT INTO `message` VALUES ('1111', '11', '2013-12-03 05:41:02', 'admin', 'admin', '1', '3');
INSERT INTO `message` VALUES ('dbasjdhasjkdasjdhkasjdhjakhdjkabmmancbabxckj.calhcasj', 'aslkdjlkadjklad', '2013-12-03 05:43:33', 'admin', 'admin', '1', '4');

-- ----------------------------
-- Table structure for `post`
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_name` varchar(36) NOT NULL,
  `post_content` text NOT NULL,
  `post_author` varchar(45) NOT NULL,
  `post_date` datetime NOT NULL,
  `post_heat` int(11) DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `post_id_UNIQUE` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of post
-- ----------------------------
INSERT INTO `post` VALUES ('1', 'OK', 'First Note!', 'admin', '2013-02-14 12:40:55', null);
INSERT INTO `post` VALUES ('2', 'Kang NIng', 'gogogo', 'test', '2013-02-14 13:27:09', null);
INSERT INTO `post` VALUES ('3', '111', '1', 'admin', '2013-02-26 21:08:45', null);
INSERT INTO `post` VALUES ('4', '2', '2', 'admin', '2013-02-26 21:08:51', null);
INSERT INTO `post` VALUES ('5', '3', '3', 'admin', '2013-02-26 21:08:57', null);
INSERT INTO `post` VALUES ('6', '4', '4', 'admin', '2013-02-26 21:09:03', null);
INSERT INTO `post` VALUES ('7', '7', '7', 'admin', '2013-02-26 21:09:11', null);
INSERT INTO `post` VALUES ('8', '8', '8', 'admin', '2013-02-26 21:09:18', null);
INSERT INTO `post` VALUES ('9', '9', '9', 'admin', '2013-02-26 21:09:25', null);
INSERT INTO `post` VALUES ('10', 'a', 'a', 'admin', '2013-02-27 19:28:08', null);
INSERT INTO `post` VALUES ('11', 'aaa', '啊卡看甲抗黄飞鸿', 'admin', '2013-03-01 19:51:28', null);
INSERT INTO `post` VALUES ('12', 'TimeToTry', '邵鼎看到请回复！', 'admin', '2013-03-01 19:52:23', null);
INSERT INTO `post` VALUES ('13', 'AAA', '看到', 'admin', '2013-03-01 20:18:26', null);
INSERT INTO `post` VALUES ('15', 'sf', 'sdff', 'kndasb', '2013-03-01 20:33:50', null);
INSERT INTO `post` VALUES ('17', 'A good day', '啊，天气真好，该睡觉了！', 'admin', '2013-03-23 15:05:05', null);
INSERT INTO `post` VALUES ('18', 'ok', '123', 'admin', '2013-04-10 15:33:51', null);
INSERT INTO `post` VALUES ('19', 'new test', 'abcdefg', 'admin', '2013-11-04 23:55:29', null);
INSERT INTO `post` VALUES ('20', '123', 'LOL', 'admin', '2013-11-29 05:42:52', null);
INSERT INTO `post` VALUES ('21', 'aaa', 'aaa', 'admin', '2013-12-03 04:02:56', null);
INSERT INTO `post` VALUES ('22', 'How about making a cake', 'Dudes, I really want to make a cake for my son for his 8th birthday?\r\nDo you have any ideas?', 'alpha', '2013-12-03 06:18:20', null);
INSERT INTO `post` VALUES ('23', 'Test timezone', 'a test', 'admin', '2013-12-03 06:25:30', null);

-- ----------------------------
-- Table structure for `reply`
-- ----------------------------
DROP TABLE IF EXISTS `reply`;
CREATE TABLE `reply` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `belong` int(11) NOT NULL,
  `reply_content` text NOT NULL,
  `reply_date` datetime NOT NULL,
  `reply_author` varchar(36) NOT NULL,
  PRIMARY KEY (`reply_id`),
  UNIQUE KEY `reply_id_UNIQUE` (`reply_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reply
-- ----------------------------
INSERT INTO `reply` VALUES ('3', '1', 'What is up?', '2013-02-14 13:05:31', 'test');
INSERT INTO `reply` VALUES ('4', '9', ' fang po', '2013-02-26 21:23:41', 'admin');
INSERT INTO `reply` VALUES ('5', '12', '嗷嗷嗷嗷嗷', '2013-03-01 20:18:52', 'admin');
INSERT INTO `reply` VALUES ('6', '12', ' 哇哇哇', '2013-03-01 20:20:11', 'admin2');
INSERT INTO `reply` VALUES ('7', '17', ' 哇呀呀呀~', '2013-03-23 15:05:20', 'admin');
INSERT INTO `reply` VALUES ('8', '19', ' hello', '2013-11-04 23:55:37', 'admin');
INSERT INTO `reply` VALUES ('10', '22', ' Man, cake is easy.', '2013-12-03 06:19:57', 'admin');
INSERT INTO `reply` VALUES ('11', '22', ' No, dude. Cake is boring!', '2013-12-03 06:20:43', 'beta');
INSERT INTO `reply` VALUES ('12', '23', ' Buddy, timezone failed!', '2013-12-03 06:48:01', 'admin');

-- ----------------------------
-- Table structure for `userlist`
-- ----------------------------
DROP TABLE IF EXISTS `userlist`;
CREATE TABLE `userlist` (
  `id` varchar(20) NOT NULL,
  `password` varchar(6) NOT NULL,
  `email` varchar(45) NOT NULL,
  `authority` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of userlist
-- ----------------------------
INSERT INTO `userlist` VALUES ('aaaa', '123456', '1@1.com', '3');
INSERT INTO `userlist` VALUES ('admin', '123456', 'admin@admin.com', '0');
INSERT INTO `userlist` VALUES ('admin2', '123456', '1@1.com', '3');
INSERT INTO `userlist` VALUES ('alpha', '654321', '654@321.com', '1');
INSERT INTO `userlist` VALUES ('beta', '123456', '1@1.com', '1');
