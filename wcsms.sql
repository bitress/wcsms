/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : wcsms

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-04-12 18:39:00
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `administration`
-- ----------------------------
DROP TABLE IF EXISTS `administration`;
CREATE TABLE `administration` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `adcnt` int(11) DEFAULT NULL,
  `admin_project` varchar(255) DEFAULT NULL,
  `eql_point` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `setting_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of administration
-- ----------------------------

-- ----------------------------
-- Table structure for `assignment`
-- ----------------------------
DROP TABLE IF EXISTS `assignment`;
CREATE TABLE `assignment` (
  `assign_id` int(11) NOT NULL AUTO_INCREMENT,
  `ascnt` int(11) DEFAULT NULL,
  `assignment` varchar(255) DEFAULT NULL,
  `eql_point` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `setting_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`assign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of assignment
-- ----------------------------

-- ----------------------------
-- Table structure for `class`
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_course` varchar(255) DEFAULT NULL,
  `class_year` varchar(255) DEFAULT NULL,
  `class_section` varchar(255) DEFAULT NULL,
  `class_major` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of class
-- ----------------------------

-- ----------------------------
-- Table structure for `class_schedule`
-- ----------------------------
DROP TABLE IF EXISTS `class_schedule`;
CREATE TABLE `class_schedule` (
  `sched_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_no` varchar(255) DEFAULT NULL,
  `sched_type` varchar(255) DEFAULT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `room` varchar(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `setting_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sched_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of class_schedule
-- ----------------------------

-- ----------------------------
-- Table structure for `course`
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_code` varchar(255) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `course_dept` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of course
-- ----------------------------

-- ----------------------------
-- Table structure for `department`
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_code` varchar(255) DEFAULT NULL,
  `dept_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of department
-- ----------------------------

-- ----------------------------
-- Table structure for `designation`
-- ----------------------------
DROP TABLE IF EXISTS `designation`;
CREATE TABLE `designation` (
  `designation_id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) DEFAULT NULL,
  `designation_eql_point` int(10) DEFAULT NULL,
  PRIMARY KEY (`designation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of designation
-- ----------------------------
INSERT INTO `designation` VALUES ('1', 'Campus Executive Director', '12');
INSERT INTO `designation` VALUES ('2', 'Dean', '9');
INSERT INTO `designation` VALUES ('3', 'Associate Dean', '9');
INSERT INTO `designation` VALUES ('4', 'Director', '9');
INSERT INTO `designation` VALUES ('5', 'Associate Director', '9');

-- ----------------------------
-- Table structure for `extension`
-- ----------------------------
DROP TABLE IF EXISTS `extension`;
CREATE TABLE `extension` (
  `ext_id` int(11) NOT NULL AUTO_INCREMENT,
  `ecnt` int(11) DEFAULT NULL,
  `ext_project` varchar(255) DEFAULT NULL,
  `from` year(4) DEFAULT NULL,
  `to` year(4) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `eql_point` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `setting_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ext_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of extension
-- ----------------------------

-- ----------------------------
-- Table structure for `faculty`
-- ----------------------------
DROP TABLE IF EXISTS `faculty`;
CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_fname` varchar(255) DEFAULT NULL,
  `faculty_mname` varchar(255) DEFAULT NULL,
  `faculty_lname` varchar(255) DEFAULT NULL,
  `faculty_dletter` varchar(255) DEFAULT NULL,
  `faculty_dept` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of faculty
-- ----------------------------
INSERT INTO `faculty` VALUES ('1', 'Master', null, 'Admin', '', 'ISPSC', 'admin');

-- ----------------------------
-- Table structure for `faculty_load`
-- ----------------------------
DROP TABLE IF EXISTS `faculty_load`;
CREATE TABLE `faculty_load` (
  `load_id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) DEFAULT NULL,
  `civil_status` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `appointment_status` varchar(255) DEFAULT NULL,
  `salary` decimal(10,0) DEFAULT NULL,
  `idno` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `rank` varchar(255) DEFAULT NULL,
  `bachelor_deg` varchar(255) DEFAULT NULL,
  `bachelor_ma` varchar(255) DEFAULT NULL,
  `bachelor_mi` varchar(255) DEFAULT NULL,
  `voc_tech` varchar(255) DEFAULT NULL,
  `masteral_deg` varchar(255) DEFAULT NULL,
  `masteral_dletter` varchar(6) DEFAULT NULL,
  `masteral_ma` varchar(255) DEFAULT NULL,
  `doctoral_deg` varchar(255) DEFAULT NULL,
  `doctoral_dletter` varchar(6) DEFAULT NULL,
  `doctoral_ma` varchar(255) DEFAULT NULL,
  `faculty_dept` varchar(255) DEFAULT NULL,
  `faculty_desg` varchar(255) DEFAULT NULL,
  `cse` varchar(255) DEFAULT NULL,
  `expyrs_public` varchar(50) DEFAULT NULL,
  `expyrs_private` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`load_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of faculty_load
-- ----------------------------

-- ----------------------------
-- Table structure for `rank`
-- ----------------------------
DROP TABLE IF EXISTS `rank`;
CREATE TABLE `rank` (
  `rank_id` int(11) NOT NULL AUTO_INCREMENT,
  `rank` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rank_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rank
-- ----------------------------

-- ----------------------------
-- Table structure for `research`
-- ----------------------------
DROP TABLE IF EXISTS `research`;
CREATE TABLE `research` (
  `research_id` int(11) NOT NULL AUTO_INCREMENT,
  `rcnt` int(11) DEFAULT NULL,
  `research_title` varchar(255) DEFAULT NULL,
  `from` year(4) DEFAULT NULL,
  `to` year(4) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `eql` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `setting_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`research_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of research
-- ----------------------------

-- ----------------------------
-- Table structure for `room`
-- ----------------------------
DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_no` varchar(255) DEFAULT NULL,
  `room_type` varchar(255) DEFAULT NULL,
  `room_dept` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of room
-- ----------------------------

-- ----------------------------
-- Table structure for `settings`
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `settings_sy` varchar(255) DEFAULT NULL,
  `settings_sem` varchar(255) DEFAULT NULL,
  `settings_status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`settings_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', '2017-2018', 'First Semester', 'active');

-- ----------------------------
-- Table structure for `subject`
-- ----------------------------
DROP TABLE IF EXISTS `subject`;
CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `CourseNo` varchar(255) DEFAULT NULL,
  `DescTitle` varchar(255) DEFAULT NULL,
  `Units` int(12) DEFAULT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of subject
-- ----------------------------

-- ----------------------------
-- Table structure for `time`
-- ----------------------------
DROP TABLE IF EXISTS `time`;
CREATE TABLE `time` (
  `time_id` int(11) NOT NULL AUTO_INCREMENT,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of time
-- ----------------------------
INSERT INTO `time` VALUES ('1', '07:30:00', '08:30:00');
INSERT INTO `time` VALUES ('2', '08:00:00', '09:00:00');
INSERT INTO `time` VALUES ('3', '08:30:00', '09:30:00');
INSERT INTO `time` VALUES ('4', '09:00:00', '10:00:00');
INSERT INTO `time` VALUES ('5', '09:30:00', '10:30:00');
INSERT INTO `time` VALUES ('6', '10:00:00', '11:00:00');
INSERT INTO `time` VALUES ('7', '10:30:00', '11:30:00');
INSERT INTO `time` VALUES ('8', '11:00:00', '12:00:00');
INSERT INTO `time` VALUES ('9', '11:30:00', '12:30:00');
INSERT INTO `time` VALUES ('10', '12:00:00', '13:00:00');
INSERT INTO `time` VALUES ('11', '12:30:00', '13:30:00');
INSERT INTO `time` VALUES ('12', '13:00:00', '14:00:00');
INSERT INTO `time` VALUES ('13', '13:30:00', '14:30:00');
INSERT INTO `time` VALUES ('14', '14:00:00', '15:00:00');
INSERT INTO `time` VALUES ('15', '14:30:00', '15:30:00');
INSERT INTO `time` VALUES ('16', '15:00:00', '16:00:00');
INSERT INTO `time` VALUES ('17', '15:30:00', '16:30:00');
INSERT INTO `time` VALUES ('18', '16:00:00', '17:00:00');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `user_level` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `faculty_id` int(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin@ispsc', 'admin', 'adminispsc', '1');
