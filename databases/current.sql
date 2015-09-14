-- MySQL dump 10.13  Distrib 5.6.14, for osx10.7 (x86_64)
--
-- Host: localhost    Database: db161140_2go
-- ------------------------------------------------------
-- Server version	5.6.14

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `app_info`
--

DROP TABLE IF EXISTS `app_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_info` (
  `title` varchar(512) DEFAULT NULL,
  `site_name` varchar(512) DEFAULT NULL,
  `url` varchar(512) DEFAULT NULL,
  `content` varchar(1024) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `keywords` varchar(512) DEFAULT NULL,
  `creator` varchar(512) DEFAULT NULL,
  `creator_url` varchar(512) DEFAULT NULL,
  `twitter` varchar(256) DEFAULT NULL,
  `facebook` varchar(256) DEFAULT NULL,
  `googleplus` varchar(256) DEFAULT NULL,
  `pinterest` varchar(256) DEFAULT NULL,
  `linkedin` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `lang` varchar(2) DEFAULT NULL,
  `youtube` varchar(256) DEFAULT NULL,
  `instagram` varchar(256) DEFAULT NULL,
  `location` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `category_id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `portrait` int(10) DEFAULT NULL,
  `random` int(10) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `company_id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `promoted` int(1) DEFAULT NULL,
  `published` int(1) DEFAULT NULL,
  `category` int(2) DEFAULT NULL,
  `services` text,
  `website` varchar(100) DEFAULT NULL,
  `latitude` float(100,10) DEFAULT NULL,
  `longitude` float(100,10) DEFAULT NULL,
  `location_url` varchar(512) DEFAULT NULL,
  `main_promoted` int(1) DEFAULT '0',
  `closed` int(1) DEFAULT '0',
  PRIMARY KEY (`company_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `companies_subcategories`
--

DROP TABLE IF EXISTS `companies_subcategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies_subcategories` (
  `company` int(10) NOT NULL,
  `subcategory` int(10) NOT NULL,
  PRIMARY KEY (`company`,`subcategory`),
  KEY `subcategory` (`subcategory`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `companies_ubication`
--

DROP TABLE IF EXISTS `companies_ubication`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies_ubication` (
  `company` int(10) NOT NULL,
  `ubication` int(10) NOT NULL,
  PRIMARY KEY (`company`,`ubication`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `company_galeries`
--

DROP TABLE IF EXISTS `company_galeries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_galeries` (
  `picture_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(10) DEFAULT NULL,
  `picture` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`picture_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `company_logo`
--

DROP TABLE IF EXISTS `company_logo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_logo` (
  `logo_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(10) DEFAULT NULL,
  `logo` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`logo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `company_pictures`
--

DROP TABLE IF EXISTS `company_pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_pictures` (
  `company` int(10) NOT NULL,
  `picture` varchar(20) NOT NULL,
  `kind` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`company`,`picture`,`kind`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `company_sliders`
--

DROP TABLE IF EXISTS `company_sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_sliders` (
  `sliders_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(10) DEFAULT NULL,
  `slider` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`sliders_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `default_sliders`
--

DROP TABLE IF EXISTS `default_sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `default_sliders` (
  `default_slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `slider` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`default_slider_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email` (
  `company_id` int(2) NOT NULL,
  `e_mail` varchar(100) NOT NULL,
  `e_mail_id` int(2) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`e_mail_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations` (
  `location_id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `random` int(10) DEFAULT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `main_gallery`
--

DROP TABLE IF EXISTS `main_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `main_gallery` (
  `picture_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `cover` int(1) DEFAULT '0',
  `link` varchar(512) DEFAULT NULL,
  `promos` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`picture_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `main_videos`
--

DROP TABLE IF EXISTS `main_videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `main_videos` (
  `video_id` int(40) NOT NULL AUTO_INCREMENT,
  `youtube` varchar(20) NOT NULL,
  `enabled` int(1) NOT NULL DEFAULT '1',
  `image` varchar(512) NOT NULL,
  `title` varchar(512) NOT NULL,
  `content` text NOT NULL,
  `duration` varchar(256) NOT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `seo`
--

DROP TABLE IF EXISTS `seo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seo` (
  `seo_id` int(2) NOT NULL AUTO_INCREMENT,
  `company_id` int(2) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `keywords` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`seo_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `social`
--

DROP TABLE IF EXISTS `social`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social` (
  `company_id` int(2) NOT NULL,
  `social_id` int(2) NOT NULL AUTO_INCREMENT,
  `trip_advisor` text,
  `tuit_url` text,
  `tuit` text,
  `facebook` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`social_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcategories` (
  `subcategory_id` int(10) NOT NULL AUTO_INCREMENT,
  `category` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `portrait` int(10) DEFAULT NULL,
  `random` int(10) DEFAULT NULL,
  PRIMARY KEY (`subcategory_id`),
  KEY `category` (`category`),
  CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `system_users`
--

DROP TABLE IF EXISTS `system_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user` varchar(30) NOT NULL,
  `password` char(40) NOT NULL,
  `type` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `category` int(2) DEFAULT '0',
  `company` varchar(50) DEFAULT NULL,
  `description` text,
  `avatar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `telephone`
--

DROP TABLE IF EXISTS `telephone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telephone` (
  `company_id` int(2) NOT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `telephone` varchar(100) NOT NULL,
  `telephone_id` int(2) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`telephone_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_coords`
--

DROP TABLE IF EXISTS `user_coords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_coords` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `latitude` float(100,10) DEFAULT NULL,
  `longitude` float(100,10) DEFAULT NULL,
  `user` int(40) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed
