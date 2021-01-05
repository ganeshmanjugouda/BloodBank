/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.7.18-log : Database - bloodbank
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`bloodbank` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `bloodbank`;

/*Table structure for table `doctor` */

DROP TABLE IF EXISTS `doctor`;

CREATE TABLE `doctor` (
  `d_id` int(10) NOT NULL AUTO_INCREMENT,
  `d_name` varchar(35) DEFAULT NULL,
  `d_contactno` varchar(10) DEFAULT NULL,
  `d_email` varchar(25) DEFAULT NULL,
  `d_address` varchar(100) DEFAULT NULL,
  `d_specialization` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `doctor` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `u_id` int(10) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(50) DEFAULT NULL,
  `u_contact` varchar(10) DEFAULT NULL,
  `u_email` varchar(35) DEFAULT NULL,
  `u_address` varchar(100) DEFAULT NULL,
  `u_bloodgroup` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

/*Table structure for table `donar` */

DROP TABLE IF EXISTS `donar`;

CREATE TABLE `donar` (
  `donar_id` int(10) NOT NULL AUTO_INCREMENT,
  `donar_user_id` int(10) DEFAULT NULL,
  `donar_doctor_id` int(10) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `donar_description` varchar(100) DEFAULT NULL,
  `d_quantity` int(3) DEFAULT NULL,
  PRIMARY KEY (`donar_id`),
  KEY `FK_donar` (`donar_user_id`),
  KEY `FK_donar1` (`donar_doctor_id`),
  CONSTRAINT `FK_donar` FOREIGN KEY (`donar_user_id`) REFERENCES `user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_donar1` FOREIGN KEY (`donar_doctor_id`) REFERENCES `doctor` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `donar` */

/*Table structure for table `patient` */

DROP TABLE IF EXISTS `patient`;

CREATE TABLE `patient` (
  `p_id` int(10) NOT NULL AUTO_INCREMENT,
  `p_user_id` int(10) DEFAULT NULL,
  `p_doctor_id` int(10) DEFAULT NULL,
  `p_description` varchar(100) DEFAULT NULL,
  `p_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`p_id`),
  KEY `FK_patient1` (`p_doctor_id`),
  KEY `FK_patient2` (`p_user_id`),
  CONSTRAINT `FK_patient1` FOREIGN KEY (`p_doctor_id`) REFERENCES `doctor` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_patient2` FOREIGN KEY (`p_user_id`) REFERENCES `user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `patient` */

/*Table structure for table `recipient` */

DROP TABLE IF EXISTS `recipient`;

CREATE TABLE `recipient` (
  `r_id` int(10) NOT NULL AUTO_INCREMENT,
  `r_patient_id` int(10) DEFAULT NULL,
  `r_datetime` datetime DEFAULT NULL,
  `r_description` varchar(100) DEFAULT NULL,
  `r_quantity` int(3) DEFAULT NULL,
  PRIMARY KEY (`r_id`),
  KEY `FK_recipient1` (`r_patient_id`),
  CONSTRAINT `FK_recipient1` FOREIGN KEY (`r_patient_id`) REFERENCES `patient` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `recipient` */


