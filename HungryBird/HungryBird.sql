-- MySQL dump 10.16  Distrib 10.1.25-MariaDB, for osx10.6 (i386)
--
-- Host: localhost    Database: HungryBird
-- ------------------------------------------------------
-- Server version	10.1.25-MariaDB

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
-- Current Database: `HungryBird`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `HungryBird` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `HungryBird`;

--
-- Table structure for table `carrier`
--

DROP TABLE IF EXISTS `carrier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrier` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `carrierName` varchar(64) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `rate` int(1) DEFAULT NULL,
  `speed` varchar(10) DEFAULT NULL,
  `familiarLocation` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrier`
--

LOCK TABLES `carrier` WRITE;
/*!40000 ALTER TABLE `carrier` DISABLE KEYS */;
INSERT INTO `carrier` VALUES (1,'carrier1','$2y$10$gBGVBzh1Twm23HyTPcbGreoFTcJpYoTYye0uglu9c/U64c/eZ3TWy','carrier1','123412412',NULL,NULL,NULL),(2,'carrier2','$2y$10$dxLElFf7aZuVp0kr8f/FHeHuVtp6ouI5hy2/2GT6WqlO3Hh5IhFRC','carrier2','123412342',NULL,NULL,NULL),(3,'carrier3','$2y$10$5Dvp5n9MaRM94qoCzIbCJeR3qq7N.7UacZl2iMXCL5KN1ROLKdBaC','carrier3','1234123',NULL,NULL,NULL);
/*!40000 ALTER TABLE `carrier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `foodName` varchar(64) DEFAULT NULL,
  `merchant_id` int(10) DEFAULT NULL,
  `foodType` varchar(15) DEFAULT NULL,
  `price` varchar(15) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `rate` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food`
--

LOCK TABLES `food` WRITE;
/*!40000 ALTER TABLE `food` DISABLE KEYS */;
INSERT INTO `food` VALUES (1,'fried rice',1,'fry','8.99','link',4),(2,'black bean',1,'bean','4.13','link',3),(3,'pizza',1,'fast-food','6.50','link',5),(4,'hamburger',1,'fast-food','5.78','link',4),(5,'Teriyaki Chicken',1,'chicken','3.72','link',4),(6,'Burrito',1,'fast-food','3.89','link',5),(7,'banana',1,'fruit','0.99','link',5),(8,'salad',1,'veggie','6.54','link',3);
/*!40000 ALTER TABLE `food` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `foodOrder`
--

DROP TABLE IF EXISTS `foodOrder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foodOrder` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `order_id` int(10) DEFAULT NULL,
  `food_id` int(10) DEFAULT NULL,
  `paid` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foodOrder`
--

LOCK TABLES `foodOrder` WRITE;
/*!40000 ALTER TABLE `foodOrder` DISABLE KEYS */;
INSERT INTO `foodOrder` VALUES (1,1,NULL,1,0),(2,1,NULL,1,0),(3,1,NULL,1,0),(4,1,NULL,1,0),(5,1,NULL,1,0),(6,1,NULL,1,0),(7,1,NULL,1,0),(8,1,NULL,1,0),(9,1,NULL,2,0),(10,1,NULL,3,0),(11,1,NULL,7,0),(12,1,NULL,7,0),(13,1,NULL,7,0),(14,1,NULL,7,0),(15,1,NULL,7,0),(16,1,NULL,2,0),(17,1,NULL,2,0),(18,1,NULL,1,0),(19,1,1,2,1),(20,1,1,4,1),(21,1,2,8,1),(22,1,2,4,1),(23,1,2,3,1),(24,1,2,1,1),(25,1,2,1,1),(26,1,2,1,1),(27,1,2,1,1),(28,1,2,2,1),(29,1,2,3,1),(30,1,2,4,1),(31,1,2,8,1),(32,1,2,5,1),(33,1,3,1,1),(34,1,3,2,1),(35,1,3,3,1),(36,1,3,6,1),(37,1,3,7,1),(38,1,4,1,1),(39,1,5,2,1),(40,1,5,3,1),(41,1,5,4,1),(42,1,5,5,1),(43,1,5,6,1),(44,1,5,1,1),(45,1,5,2,1),(46,1,5,3,1),(47,1,5,7,1),(48,1,5,8,1),(49,1,6,4,1),(50,1,6,4,1),(51,1,6,1,1),(52,1,6,6,1),(53,1,6,2,1),(54,1,6,7,1),(55,1,6,3,1),(56,1,6,8,1),(57,1,6,4,1),(58,1,6,5,1),(59,1,7,1,1),(60,1,7,2,1),(61,1,7,7,1),(62,1,7,8,1),(63,1,7,3,1),(64,1,8,1,1),(65,1,8,1,1),(66,1,9,4,1),(67,1,9,8,1),(68,1,9,3,1),(69,1,9,5,1),(70,1,9,7,1),(71,1,10,4,1),(72,1,10,4,1),(73,1,10,4,1),(74,1,11,2,1),(75,1,11,3,1),(76,1,11,4,1),(77,1,11,5,1),(78,1,11,8,1),(79,1,12,2,1),(80,1,12,2,1),(81,1,12,2,1),(82,1,13,4,1),(83,1,13,4,1),(84,1,13,4,1),(85,1,14,8,1),(86,1,14,7,1),(87,1,14,8,1),(88,1,14,7,1),(89,1,15,1,1),(90,1,15,6,1),(91,1,16,2,1),(92,1,17,3,1),(93,1,17,3,1),(94,1,18,2,1),(95,1,18,6,1),(96,2,19,2,1),(97,2,19,3,1),(98,2,19,4,1),(99,3,20,2,1),(100,3,20,3,1),(101,3,20,4,1),(102,3,20,5,1);
/*!40000 ALTER TABLE `foodOrder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `merchant`
--

DROP TABLE IF EXISTS `merchant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `merchant` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `merchantName` varchar(64) DEFAULT NULL,
  `menu_id` int(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `merchant`
--

LOCK TABLES `merchant` WRITE;
/*!40000 ALTER TABLE `merchant` DISABLE KEYS */;
INSERT INTO `merchant` VALUES (1,'uaMeal','$2y$10$hwPhlBhqjOMZ/6AwZHxJGeAw7e6u2uctdy1TJay34dZURu2OzM9xu','uaMeal',1,'university of arizona','American','1231231231','ua@emai.com'),(2,'chineseFood','$2y$10$HdlQhgXM4o9JA0uGJ6OBbu14ZEK14cpCfOjJIkvqnxGdfVe6tk/SC','chineseFood',NULL,'3607 N Campbell Ave','Chinese','123412412','qwe@gmail.com');
/*!40000 ALTER TABLE `merchant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `carrier_id` int(10) DEFAULT NULL,
  `deliverTime` int(10) DEFAULT NULL,
  `paid` int(1) DEFAULT NULL,
  `deliver` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,NULL,NULL,1,1),(2,1,NULL,NULL,1,1),(3,1,NULL,NULL,1,1),(4,1,NULL,NULL,1,1),(5,1,NULL,NULL,1,1),(6,1,NULL,NULL,1,1),(7,1,NULL,NULL,1,1),(8,1,NULL,NULL,1,1),(9,1,NULL,NULL,1,1),(10,1,NULL,NULL,1,1),(11,1,NULL,NULL,1,1),(12,1,NULL,NULL,1,1),(13,1,NULL,NULL,1,1),(14,1,NULL,NULL,1,1),(15,1,NULL,NULL,1,1),(16,1,NULL,NULL,1,1),(17,1,NULL,NULL,1,1),(18,1,NULL,NULL,1,1),(19,2,NULL,NULL,1,1),(20,3,NULL,NULL,1,0);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rateForCarrier`
--

DROP TABLE IF EXISTS `rateForCarrier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rateForCarrier` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `carrier_id` int(10) DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `rate` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rateForCarrier`
--

LOCK TABLES `rateForCarrier` WRITE;
/*!40000 ALTER TABLE `rateForCarrier` DISABLE KEYS */;
/*!40000 ALTER TABLE `rateForCarrier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `signupTime` varchar(100) DEFAULT NULL,
  `timesOfBuy` int(10) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'zjc','$2y$10$vzossz0.8g.PpMNHihiGae/2iAhytADzKkzJ1fYZ152JVCkVFr.ei','2550 W Ironwood Hill Dr. Apt 324','qwer',0,'zhangjiacheng54@gmail.com','1231231234'),(2,'cai','$2y$10$tkH/vm2U4di0gO6VeG6ylu0t5wIpxQeVb.rYRpFJPAr/bSKAReunO','2 W University Blvd, apt 1105','qwer',0,'zhangjiacheng54@gmail.com','3242342342'),(3,'guo','$2y$10$gQA3k6uNnwbcbcjZnGIehOx2ruZJbNqxIq4q.zgerp/FYEInfaca2','1550 E Easy St','qwer',0,'qweqw@gmail.com','12341213412');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-14  7:40:10
