-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: infoshop
-- ------------------------------------------------------
-- Server version	5.5.5-10.3.34-MariaDB-0ubuntu0.20.04.1

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
-- Table structure for table `ORDERED`
--

DROP TABLE IF EXISTS `ORDERED`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ORDERED` (
  `idOrder` int(11) NOT NULL AUTO_INCREMENT,
  `isPaid` tinyint(1) NOT NULL,
  `isSent` tinyint(1) NOT NULL,
  `totalPrice` double NOT NULL,
  `email` varchar(400) NOT NULL,
  PRIMARY KEY (`idOrder`),
  KEY `ORDER_FK` (`email`),
  CONSTRAINT `ORDER_FK` FOREIGN KEY (`email`) REFERENCES `USER` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ORDERED`
--

LOCK TABLES `ORDERED` WRITE;
/*!40000 ALTER TABLE `ORDERED` DISABLE KEYS */;
/*!40000 ALTER TABLE `ORDERED` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PICTURE`
--

DROP TABLE IF EXISTS `PICTURE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PICTURE` (
  `idPicture` int(11) NOT NULL AUTO_INCREMENT,
  `fileName` varchar(1000) NOT NULL,
  PRIMARY KEY (`idPicture`)
) ENGINE=InnoDB AUTO_INCREMENT=242 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PICTURE`
--

LOCK TABLES `PICTURE` WRITE;
/*!40000 ALTER TABLE `PICTURE` DISABLE KEYS */;
/*!40000 ALTER TABLE `PICTURE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PICTURE_PRODUCT`
--

DROP TABLE IF EXISTS `PICTURE_PRODUCT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PICTURE_PRODUCT` (
  `idProduct` int(11) NOT NULL,
  `idPicture` int(11) NOT NULL,
  `isDefaultPicture` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idProduct`,`idPicture`),
  KEY `PICTURE_PRODUCT_FK` (`idPicture`),
  CONSTRAINT `PICTURE_PRODUCT_FK` FOREIGN KEY (`idPicture`) REFERENCES `PICTURE` (`idPicture`) ON DELETE CASCADE,
  CONSTRAINT `PICTURE_PRODUCT_FK_1` FOREIGN KEY (`idProduct`) REFERENCES `PRODUCT` (`idProduct`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PICTURE_PRODUCT`
--

LOCK TABLES `PICTURE_PRODUCT` WRITE;
/*!40000 ALTER TABLE `PICTURE_PRODUCT` DISABLE KEYS */;
/*!40000 ALTER TABLE `PICTURE_PRODUCT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PRODUCT`
--

DROP TABLE IF EXISTS `PRODUCT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PRODUCT` (
  `idProduct` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `priceInCHF` double NOT NULL,
  `remainingNumber` int(11) NOT NULL,
  PRIMARY KEY (`idProduct`),
  UNIQUE KEY `PRODUCT_UN` (`productName`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PRODUCT`
--

LOCK TABLES `PRODUCT` WRITE;
/*!40000 ALTER TABLE `PRODUCT` DISABLE KEYS */;
/*!40000 ALTER TABLE `PRODUCT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PRODUCT_ORDERED`
--

DROP TABLE IF EXISTS `PRODUCT_ORDERED`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PRODUCT_ORDERED` (
  `idProduct` int(11) NOT NULL,
  `idOrder` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`idProduct`,`idOrder`),
  KEY `PRODUCT_ORDERED_FK_1` (`idOrder`),
  CONSTRAINT `PRODUCT_ORDERED_FK` FOREIGN KEY (`idProduct`) REFERENCES `PRODUCT` (`idProduct`) ON DELETE CASCADE,
  CONSTRAINT `PRODUCT_ORDERED_FK_1` FOREIGN KEY (`idOrder`) REFERENCES `ORDERED` (`idOrder`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PRODUCT_ORDERED`
--

LOCK TABLES `PRODUCT_ORDERED` WRITE;
/*!40000 ALTER TABLE `PRODUCT_ORDERED` DISABLE KEYS */;
/*!40000 ALTER TABLE `PRODUCT_ORDERED` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USER`
--

DROP TABLE IF EXISTS `USER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USER` (
  `email` varchar(400) NOT NULL,
  `passwordHash` varchar(260) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `streetName` varchar(1000) NOT NULL,
  `streetNumber` varchar(10) NOT NULL,
  `city` varchar(500) NOT NULL,
  `postalCode` varchar(10) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `USER_UN` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USER`
--

LOCK TABLES `USER` WRITE;
/*!40000 ALTER TABLE `USER` DISABLE KEYS */;
/*!40000 ALTER TABLE `USER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'infoshop'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-18 13:46:23
