/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100119
Source Host           : localhost:3306
Source Database       : yii2-starter-kit

Target Server Type    : MYSQL
Target Server Version : 100119
File Encoding         : 65001

Date: 2017-05-31 14:59:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for dbis_article
-- ----------------------------
DROP TABLE IF EXISTS `dbis_article`;
CREATE TABLE `dbis_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `view` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `thumbnail_base_url` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail_path` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `published_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_article_author` (`created_by`),
  KEY `fk_article_updater` (`updated_by`),
  KEY `fk_article_category` (`category_id`),
  CONSTRAINT `fk_article_author` FOREIGN KEY (`created_by`) REFERENCES `dbis_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_article_category` FOREIGN KEY (`category_id`) REFERENCES `dbis_article_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_article_updater` FOREIGN KEY (`updated_by`) REFERENCES `dbis_user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for dbis_article_attachment
-- ----------------------------
DROP TABLE IF EXISTS `dbis_article_attachment`;
CREATE TABLE `dbis_article_attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `base_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_article_attachment_article` (`article_id`),
  CONSTRAINT `fk_article_attachment_article` FOREIGN KEY (`article_id`) REFERENCES `dbis_article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for dbis_article_category
-- ----------------------------
DROP TABLE IF EXISTS `dbis_article_category`;
CREATE TABLE `dbis_article_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `parent_id` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_article_category_section` (`parent_id`),
  CONSTRAINT `fk_article_category_section` FOREIGN KEY (`parent_id`) REFERENCES `dbis_article_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for dbis_file_storage_item
-- ----------------------------
DROP TABLE IF EXISTS `dbis_file_storage_item`;
CREATE TABLE `dbis_file_storage_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `component` varchar(255) NOT NULL,
  `base_url` varchar(1024) NOT NULL,
  `path` varchar(1024) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `upload_ip` varchar(15) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for dbis_graduates
-- ----------------------------
DROP TABLE IF EXISTS `dbis_graduates`;
CREATE TABLE `dbis_graduates` (
  `id` int(11) NOT NULL,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `grade` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'null',
  `GraduationDegree` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'null',
  `WorkCity` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'null',
  `WorkPlace` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'null',
  `phone` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'null',
  `QQ` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'null',
  `mailbox` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'null',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Table structure for dbis_i18n_message
-- ----------------------------
DROP TABLE IF EXISTS `dbis_i18n_message`;
CREATE TABLE `dbis_i18n_message` (
  `id` int(11) NOT NULL,
  `language` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `translation` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`,`language`),
  CONSTRAINT `fk_i18n_message_source_message` FOREIGN KEY (`id`) REFERENCES `dbis_i18n_source_message` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for dbis_i18n_source_message
-- ----------------------------
DROP TABLE IF EXISTS `dbis_i18n_source_message`;
CREATE TABLE `dbis_i18n_source_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for dbis_key_storage_item
-- ----------------------------
DROP TABLE IF EXISTS `dbis_key_storage_item`;
CREATE TABLE `dbis_key_storage_item` (
  `key` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `updated_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`key`),
  UNIQUE KEY `idx_key_storage_item_key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for dbis_page
-- ----------------------------
DROP TABLE IF EXISTS `dbis_page`;
CREATE TABLE `dbis_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(2048) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `view` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for dbis_patent
-- ----------------------------
DROP TABLE IF EXISTS `dbis_patent`;
CREATE TABLE `dbis_patent` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '发明名称',
  `inventors` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '发明人',
  `ApplicationDate` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '申请日',
  `AuthorizationDay` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '授权日',
  `ApplicationNumber` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '申请号',
  `PatentNo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '专利号',
  `attachment` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for dbis_post
-- ----------------------------
DROP TABLE IF EXISTS `dbis_post`;
CREATE TABLE `dbis_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `summary` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `category_id` int(11) DEFAULT NULL,
  `thumbnail_base_url` varchar(1024) DEFAULT NULL,
  `thumbnail_path` varchar(1024) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `published_at` int(11) DEFAULT NULL,
  `touser` varchar(1024) DEFAULT NULL,
  `toparty` varchar(1024) DEFAULT NULL,
  `begintime` int(11) DEFAULT NULL,
  `endtime` int(11) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for dbis_post_category
-- ----------------------------
DROP TABLE IF EXISTS `dbis_post_category`;
CREATE TABLE `dbis_post_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for dbis_project
-- ----------------------------
DROP TABLE IF EXISTS `dbis_project`;
CREATE TABLE `dbis_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '项目编号',
  `name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '项目名称',
  `startdate` int(11) DEFAULT NULL COMMENT '开始时间',
  `enddate` int(11) DEFAULT NULL COMMENT '结束时间',
  `teacherid` int(11) DEFAULT NULL COMMENT '项目负责人',
  `source` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '项目分类',
  `introduction` text CHARACTER SET utf8 COMMENT '项目简介',
  `status` tinyint(1) DEFAULT '1',
  `thumbnail_base_url` varchar(1024) DEFAULT NULL,
  `thumbnail_path` varchar(1024) CHARACTER SET utf8 DEFAULT NULL COMMENT '封面图片路径',
  `project_num` varchar(255) DEFAULT NULL,
  `finance_account` varchar(255) DEFAULT NULL,
  `paper` text CHARACTER SET utf8,
  `patent` text CHARACTER SET utf8,
  `software` text CHARACTER SET utf8,
  `displayurl` varchar(255) DEFAULT NULL,
  `tagid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '标签id',
  PRIMARY KEY (`id`),
  KEY `teacherid` (`teacherid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='项目';

-- ----------------------------
-- Table structure for dbis_rbac_auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `dbis_rbac_auth_assignment`;
CREATE TABLE `dbis_rbac_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `dbis_rbac_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `dbis_rbac_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for dbis_rbac_auth_item
-- ----------------------------
DROP TABLE IF EXISTS `dbis_rbac_auth_item`;
CREATE TABLE `dbis_rbac_auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `dbis_rbac_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `dbis_rbac_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for dbis_rbac_auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `dbis_rbac_auth_item_child`;
CREATE TABLE `dbis_rbac_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `dbis_rbac_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `dbis_rbac_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dbis_rbac_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `dbis_rbac_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for dbis_rbac_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `dbis_rbac_auth_rule`;
CREATE TABLE `dbis_rbac_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for dbis_software
-- ----------------------------
DROP TABLE IF EXISTS `dbis_software`;
CREATE TABLE `dbis_software` (
  `softid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `finishtime` datetime(6) DEFAULT NULL,
  `regisnumber` varchar(50) DEFAULT NULL,
  `enclosure` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`softid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for dbis_system_db_migration
-- ----------------------------
DROP TABLE IF EXISTS `dbis_system_db_migration`;
CREATE TABLE `dbis_system_db_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for dbis_system_log
-- ----------------------------
DROP TABLE IF EXISTS `dbis_system_log`;
CREATE TABLE `dbis_system_log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `level` int(11) DEFAULT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `log_time` double DEFAULT NULL,
  `prefix` text COLLATE utf8_unicode_ci,
  `message` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `idx_log_level` (`level`),
  KEY `idx_log_category` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for dbis_system_rbac_migration
-- ----------------------------
DROP TABLE IF EXISTS `dbis_system_rbac_migration`;
CREATE TABLE `dbis_system_rbac_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for dbis_tag
-- ----------------------------
DROP TABLE IF EXISTS `dbis_tag`;
CREATE TABLE `dbis_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tagname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '标签名',
  `rating` int(11) DEFAULT '1' COMMENT '标签重要性',
  `frequency` int(11) DEFAULT '0' COMMENT '搜索次数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for dbis_timeline_event
-- ----------------------------
DROP TABLE IF EXISTS `dbis_timeline_event`;
CREATE TABLE `dbis_timeline_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `event` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_created_at` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for dbis_user
-- ----------------------------
DROP TABLE IF EXISTS `dbis_user`;
CREATE TABLE `dbis_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `access_token` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_client` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oauth_client_user_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '2',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `logged_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for dbis_user_profile
-- ----------------------------
DROP TABLE IF EXISTS `dbis_user_profile`;
CREATE TABLE `dbis_user_profile` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '真实姓名',
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middlename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar_base_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `gender` smallint(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `dbis_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for dbis_user_student
-- ----------------------------
DROP TABLE IF EXISTS `dbis_user_student`;
CREATE TABLE `dbis_user_student` (
  `userid` int(11) NOT NULL COMMENT '学生id',
  `student_id` int(11) DEFAULT NULL COMMENT '学号',
  `grade` int(11) DEFAULT NULL COMMENT '入学年份',
  `teacherid` varchar(20) DEFAULT NULL COMMENT '指导老师',
  `direction` varchar(255) DEFAULT '数据库' COMMENT '研究方向',
  `graduation` varchar(255) DEFAULT '暂未就职' COMMENT '毕业去向',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `recommend` text CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT '寄语',
  `tagid` int(11) DEFAULT NULL COMMENT '标签id',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for dbis_user_teacher
-- ----------------------------
DROP TABLE IF EXISTS `dbis_user_teacher`;
CREATE TABLE `dbis_user_teacher` (
  `userid` int(11) NOT NULL COMMENT '教师id',
  `teacher_id` varchar(20) DEFAULT NULL COMMENT '教职工编号',
  `degree` varchar(20) DEFAULT NULL COMMENT '学历水平',
  `title` varchar(20) DEFAULT NULL COMMENT '职称',
  `telephone` varchar(20) DEFAULT NULL COMMENT '办公电话',
  `direction` varchar(255) DEFAULT NULL COMMENT '研究方向',
  `project` text COMMENT '项目',
  `achievement` text COMMENT '主要成果',
  `plurality` text COMMENT '社会职位',
  `office` varchar(255) DEFAULT '' COMMENT '办公地点',
  `status` tinyint(1) DEFAULT '1',
  `tagid` varchar(255) DEFAULT NULL COMMENT '标签id',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for dbis_user_token
-- ----------------------------
DROP TABLE IF EXISTS `dbis_user_token`;
CREATE TABLE `dbis_user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `token` varchar(40) NOT NULL,
  `expire_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for dbis_widget_carousel
-- ----------------------------
DROP TABLE IF EXISTS `dbis_widget_carousel`;
CREATE TABLE `dbis_widget_carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for dbis_widget_carousel_item
-- ----------------------------
DROP TABLE IF EXISTS `dbis_widget_carousel_item`;
CREATE TABLE `dbis_widget_carousel_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carousel_id` int(11) NOT NULL,
  `base_url` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `caption` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `order` int(11) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_item_carousel` (`carousel_id`),
  CONSTRAINT `fk_item_carousel` FOREIGN KEY (`carousel_id`) REFERENCES `dbis_widget_carousel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for dbis_widget_menu
-- ----------------------------
DROP TABLE IF EXISTS `dbis_widget_menu`;
CREATE TABLE `dbis_widget_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `items` text COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for dbis_widget_text
-- ----------------------------
DROP TABLE IF EXISTS `dbis_widget_text`;
CREATE TABLE `dbis_widget_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_widget_text_key` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
