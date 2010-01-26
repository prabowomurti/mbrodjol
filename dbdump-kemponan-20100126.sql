-- MySQL dump 10.13  Distrib 5.1.37, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: kemponan
-- ------------------------------------------------------
-- Server version	5.1.37-1ubuntu5

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
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` int(11) DEFAULT NULL,
  `amount` bigint(20) unsigned DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `account_note` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (1,15,5000,'2009-12-13 16:30:00','bayar rompi'),(2,1,25000,'2009-12-13 16:30:00','bayar rompi'),(3,2,5000,'2009-12-13 16:30:00','bayar rompi'),(4,17,12000,'2009-12-21 15:30:00','bayar rompi'),(5,1,10000,'2009-12-20 16:30:00','bayar rompi'),(6,10,5000,'2009-12-20 16:30:00','bayar rompi'),(7,6,5000,'2009-12-20 16:30:00','bayar rompi'),(8,16,5000,'2009-12-20 16:30:00','bayar rompi'),(9,21,5000,'2009-12-20 16:30:00','bayar rompi'),(10,11,2000,'2009-12-20 16:30:00','bayar lapangan'),(11,3,15000,'2009-12-20 16:30:00','bayar rompi'),(12,3,15000,'2009-12-06 16:30:00','bayar lapangan'),(13,20,5000,'2009-12-06 16:30:00','bayar lapangan'),(14,19,3000,'2009-12-06 16:30:00','bayar lapangan'),(15,17,5000,'2009-12-06 16:30:00','bayar lapangan'),(16,14,5000,'2009-12-06 16:30:00','bayar lapangan'),(17,16,5000,'2009-12-06 16:30:00','bayar lapangan'),(18,15,5000,'2009-12-06 16:30:00','bayar lapangan'),(19,9,4000,'2009-12-06 16:30:00','bayar lapangan'),(20,11,5000,'2009-12-06 16:30:00','bayar lapangan'),(21,13,3000,'2009-12-06 16:30:00','bayar lapangan'),(22,6,10000,'2009-12-06 16:30:00','bayar lapangan'),(23,7,5000,'2009-12-06 16:30:00','bayar lapangan'),(24,1,10000,'2009-12-06 16:30:00','bayar lapangan'),(25,2,15000,'2009-12-06 16:30:00','bayar lapangan'),(26,14,5000,'2009-12-13 16:30:00','bayar lapangan'),(27,21,5000,'2009-12-13 16:30:00','bayar lapangan'),(28,18,5000,'2009-12-13 16:30:00','bayar lapangan'),(29,20,5000,'2009-12-13 16:30:00','bayar lapangan'),(30,16,5000,'2009-12-13 16:30:00','bayar lapangan'),(31,19,5000,'2009-12-13 16:30:00','bayar lapangan'),(32,11,5000,'2009-12-13 16:30:00','bayar lapangan'),(33,12,3000,'2009-12-13 16:30:00','bayar lapangan'),(34,13,3000,'2009-12-13 16:30:00','bayar lapangan'),(35,15,5000,'2009-12-13 16:30:00','bayar lapangan'),(36,7,5000,'2009-12-13 16:30:00','bayar lapangan'),(37,19,5000,'2009-12-20 16:30:00','bayar lapangan'),(38,20,5000,'2009-12-20 16:30:00','bayar lapangan'),(39,10,15000,'2009-12-20 16:30:00','bayar lapangan'),(40,17,11300,'2009-12-28 11:30:00','bayar lapangan'),(41,19,5000,'2009-12-27 16:30:00','bayar lapangan'),(42,18,5000,'2009-12-27 16:30:00','bayar lapangan'),(43,17,5000,'2009-12-27 16:30:00','bayar lapangan'),(44,20,5000,'2009-12-27 16:30:00','bayar lapangan'),(45,22,5000,'2009-12-27 16:30:00','bayar lapangan'),(46,19,12000,'2009-12-27 16:30:00','bayar rompi'),(47,15,3000,'2009-12-27 16:30:00','bayar rompi'),(48,14,10000,'2009-12-27 16:30:00','bayar rompi'),(49,2,7000,'2009-12-27 16:30:00','bayar rompi'),(50,21,7000,'2009-12-27 16:30:00','bayar rompi'),(51,20,12000,'2010-01-03 16:30:00','bayar rompi'),(52,20,5000,'2010-01-03 16:30:00','bayar lapangan'),(53,6,5000,'2010-01-03 16:30:00','bayar rompi'),(54,6,8000,'2010-01-03 16:30:00','bayar lapangan'),(55,14,2000,'2010-01-03 16:30:00','bayar rompi'),(56,19,5000,'2010-01-03 16:30:00','bayar lapangan'),(57,15,4000,'2010-01-03 16:30:00','bayar rompi'),(58,15,6000,'2010-01-03 16:30:00','bayar lapangan'),(59,13,3000,'2010-01-03 16:30:00','bayar lapangan'),(60,11,2000,'2010-01-03 16:30:00','bayar lapangan'),(61,11,2000,'2010-01-03 16:30:00','bayar lapangan'),(62,2,10000,'2010-01-03 16:30:00','bayar lapangan'),(63,1,20000,'2010-01-03 16:30:00','bayar lapangan'),(64,3,15000,'2010-01-03 16:30:00','bayar lapangan'),(65,4,15000,'2009-12-27 16:30:00','bayar lapangan'),(66,19,5000,'2010-01-10 16:30:00','bayar lapangan'),(67,15,5000,'2010-01-10 16:30:00','bayar lapangan'),(68,5,5000,'2010-01-10 16:30:00','bayar lapangan'),(69,20,5000,'2010-01-10 16:30:00','bayar lapangan'),(70,7,5000,'2010-01-10 16:30:00','bayar lapangan'),(71,11,6000,'2010-01-10 16:30:00','bayar lapangan'),(72,13,5000,'2010-01-10 16:30:00','bayar lapangan'),(73,1,10000,'2010-01-10 16:30:00','bayar lapangan'),(74,2,5000,'2010-01-10 16:30:00','bayar lapangan'),(75,14,4000,'2010-01-10 16:30:00','bayar lapangan'),(76,12,4000,'2010-01-10 16:30:00','bayar lapangan'),(77,9,5000,'2010-01-10 16:30:00','bayar lapangan'),(78,15,20000,'2010-01-10 16:30:00','bayar baju'),(79,7,10000,'2010-01-10 16:30:00','bayar baju'),(80,14,10000,'2010-01-10 16:30:00','bayar baju'),(81,7,20000,'2010-01-14 14:30:00','bayar baju'),(82,19,5000,'2010-01-17 16:30:00','bayar lapangan'),(83,7,5000,'2010-01-17 16:30:00','bayar lapangan'),(84,10,5000,'2010-01-17 16:30:00','bayar lapangan'),(85,18,5000,'2010-01-17 16:30:00','bayar lapangan'),(86,9,5000,'2010-01-17 16:30:00','bayar lapangan'),(87,20,5000,'2010-01-17 16:30:00','bayar lapangan'),(88,16,5000,'2010-01-17 16:30:00','bayar lapangan'),(89,1,5000,'2010-01-17 16:30:00','bayar lapangan'),(90,26,5000,'2010-01-17 16:30:00','bayar lapangan'),(91,20,5000,'2010-01-24 17:30:00','bayar lapangan'),(92,18,5000,'2010-01-24 17:30:00','bayar lapangan'),(93,10,10000,'2010-01-24 17:30:00','bayar lapangan'),(94,17,5000,'2010-01-24 17:30:00','bayar lapangan'),(95,7,3000,'2010-01-24 17:30:00','bayar lapangan'),(96,2,10000,'2010-01-24 17:30:00','bayar baju'),(97,10,30000,'2010-01-24 17:30:00','bayar baju'),(98,15,10000,'2010-01-24 17:30:00','bayar baju'),(99,3,20000,'2010-01-24 17:30:00','bayar baju'),(100,11,5000,'2010-01-24 17:30:00','bayar baju'),(101,14,5000,'2010-01-24 17:30:00','bayar baju'),(102,2,5000,'2010-01-25 19:35:00','bayar baju');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assistants`
--

DROP TABLE IF EXISTS `assistants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assistants` (
  `player_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `total_assists` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`player_id`,`game_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assistants`
--

LOCK TABLES `assistants` WRITE;
/*!40000 ALTER TABLE `assistants` DISABLE KEYS */;
INSERT INTO `assistants` VALUES (3,23,2);
/*!40000 ALTER TABLE `assistants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attendances`
--

DROP TABLE IF EXISTS `attendances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attendances` (
  `player_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  PRIMARY KEY (`player_id`,`game_id`),
  KEY `FK_attendances` (`game_id`),
  CONSTRAINT `FK_attendances` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_attendances_players` FOREIGN KEY (`player_id`) REFERENCES `players` (`player_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendances`
--

LOCK TABLES `attendances` WRITE;
/*!40000 ALTER TABLE `attendances` DISABLE KEYS */;
INSERT INTO `attendances` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(7,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(1,2),(2,2),(3,2),(4,2),(5,2),(6,2),(10,2),(11,2),(12,2),(13,2),(14,2),(15,2),(16,2),(19,2),(1,3),(2,3),(3,3),(5,3),(9,3),(10,3),(11,3),(12,3),(13,3),(14,3),(15,3),(16,3),(17,3),(18,3),(21,3),(1,4),(2,4),(3,4),(4,4),(5,4),(6,4),(9,4),(10,4),(12,4),(13,4),(14,4),(16,4),(17,4),(1,5),(2,5),(3,5),(6,5),(7,5),(9,5),(10,5),(12,5),(13,5),(14,5),(16,5),(18,5),(19,5),(20,5),(1,6),(3,6),(6,6),(7,6),(9,6),(11,6),(12,6),(13,6),(14,6),(15,6),(16,6),(17,6),(18,6),(19,6),(20,6),(1,7),(2,7),(3,7),(4,7),(6,7),(7,7),(9,7),(11,7),(12,7),(13,7),(14,7),(15,7),(16,7),(18,7),(19,7),(20,7),(21,7),(1,8),(2,8),(3,8),(5,8),(6,8),(7,8),(8,8),(9,8),(10,8),(11,8),(12,8),(13,8),(14,8),(2,9),(3,9),(4,9),(5,9),(8,9),(9,9),(10,9),(11,9),(12,9),(13,9),(14,9),(1,10),(3,10),(6,10),(8,10),(9,10),(11,10),(12,10),(13,10),(14,10),(15,10),(16,10),(1,11),(2,11),(3,11),(5,11),(11,11),(12,11),(13,11),(14,11),(15,11),(1,12),(3,12),(5,12),(6,12),(11,12),(12,12),(13,12),(14,12),(15,12),(19,12),(21,12),(1,13),(3,13),(4,13),(6,13),(7,13),(9,13),(10,13),(11,13),(12,13),(13,13),(14,13),(16,13),(17,13),(18,13),(19,13),(20,13),(21,13),(1,14),(3,14),(5,14),(6,14),(9,14),(11,14),(12,14),(13,14),(14,14),(15,14),(16,14),(21,14),(1,15),(2,15),(3,15),(5,15),(6,15),(9,15),(10,15),(14,15),(15,15),(16,15),(17,15),(18,15),(19,15),(20,15),(21,15),(22,15),(1,16),(2,16),(3,16),(4,16),(6,16),(9,16),(11,16),(12,16),(13,16),(14,16),(15,16),(16,16),(17,16),(19,16),(20,16),(1,17),(2,17),(3,17),(5,17),(6,17),(7,17),(9,17),(10,17),(11,17),(12,17),(13,17),(14,17),(15,17),(19,17),(20,17),(1,18),(6,18),(9,18),(11,18),(12,18),(13,18),(14,18),(16,18),(1,19),(3,19),(7,19),(9,19),(10,19),(11,19),(12,19),(13,19),(14,19),(15,19),(16,19),(18,19),(19,19),(20,19),(26,19),(1,20),(2,20),(3,20),(4,20),(6,20),(10,20),(11,20),(12,20),(13,20),(14,20),(15,20),(1,21),(2,21),(3,21),(10,21),(11,21),(12,21),(13,21),(14,21),(15,21),(16,21),(1,22),(2,22),(3,22),(4,22),(6,22),(7,22),(9,22),(10,22),(11,22),(12,22),(14,22),(15,22),(16,22),(17,22),(18,22),(19,22),(20,22),(26,22),(1,23),(2,23),(3,23),(4,23),(9,23),(11,23),(13,23),(14,23),(15,23),(17,23);
/*!40000 ALTER TABLE `attendances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `games` (
  `game_id` int(11) NOT NULL AUTO_INCREMENT,
  `time` datetime DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `place_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`game_id`),
  KEY `FK_games` (`place_id`),
  CONSTRAINT `FK_games` FOREIGN KEY (`place_id`) REFERENCES `places` (`place_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `games`
--

LOCK TABLES `games` WRITE;
/*!40000 ALTER TABLE `games` DISABLE KEYS */;
INSERT INTO `games` VALUES (1,'2009-11-01 16:30:00','Lupa siapa2 aja yang dateng, kayaknya ada Pras juga...',1),(2,'2009-11-08 16:30:00','',1),(3,'2009-11-15 16:30:00','Hujan deres, pertama kali ambil gambar / video\nAda 2 orang teman Fajar yang ikut main',1),(4,'2009-11-22 16:30:00','Ada Mas Dayat dan teman Deni 1 orang',1),(5,'2009-11-29 16:30:00','',1),(6,'2009-12-06 16:30:00','',1),(7,'2009-12-13 16:30:00','',1),(8,'2009-11-11 16:30:00','Lawan Budak Laut yang kedua (sebenarnya, coz sekali dulu pernah main sama mereka tapi gak pake nama kemponan)',1),(9,'2009-11-18 15:30:00','Permainan alot, lapangan gak sedap...',2),(10,'2009-12-03 16:30:00','Kalah memalukan',1),(11,'2009-12-11 15:30:00','Menang boi!',1),(12,'2009-12-18 15:30:00','Menang lawan Budak Kampung Arang',1),(13,'2009-12-20 16:30:00','Latihan biasa',1),(14,'2009-12-24 16:30:00','Kalah memalukan (lagi)',1),(15,'2009-12-27 16:30:00','Ada Mas Endhien, maen ke-3 sejak member. Bagong CS ke Singkawang',1),(16,'2010-01-03 16:30:00','Ada Pak Sarkan, Satpam BRI',1),(17,'2010-01-10 16:30:00','Permainan hancur.. Mungkin karena udah lama nggak ada lawan',1),(18,'2010-01-17 13:30:00','lawan SMA 1',1),(19,'2010-01-17 16:30:00','',1),(20,'2010-01-18 20:30:00','lawan teman2 Arsa',4),(21,'2010-01-21 21:30:00','maen ke 2 di Keramat Futsal',4),(22,'2010-01-24 16:30:00','hari ini ada yang punya hajatan',1),(23,'2010-01-25 16:30:00','Maen yang ke sekian kalinya lawan temen2 Harsa',4);
/*!40000 ALTER TABLE `games` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incomes`
--

DROP TABLE IF EXISTS `incomes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incomes` (
  `income_id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(200) DEFAULT NULL,
  `income_amount` bigint(20) unsigned NOT NULL,
  `income_date` date DEFAULT NULL,
  PRIMARY KEY (`income_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incomes`
--

LOCK TABLES `incomes` WRITE;
/*!40000 ALTER TABLE `incomes` DISABLE KEYS */;
INSERT INTO `incomes` VALUES (1,'sisa saldo periode lalu',15000,'2009-12-12'),(2,'sisa duit yang kemarin2 sama Rio',15000,'2010-01-03'),(3,'sedekah Mas Qliex, mempercantik angka',700,'2010-01-25');
/*!40000 ALTER TABLE `incomes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matches`
--

DROP TABLE IF EXISTS `matches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matches` (
  `game_id` int(11) NOT NULL,
  `opponent_id` int(11) DEFAULT NULL,
  `our_goals` tinyint(3) unsigned DEFAULT NULL,
  `their_goals` tinyint(3) unsigned DEFAULT NULL,
  `game_note` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`game_id`),
  KEY `FK_matches` (`opponent_id`),
  CONSTRAINT `FK_matches` FOREIGN KEY (`opponent_id`) REFERENCES `opponents` (`opponent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matches`
--

LOCK TABLES `matches` WRITE;
/*!40000 ALTER TABLE `matches` DISABLE KEYS */;
INSERT INTO `matches` VALUES (8,1,3,4,NULL),(9,2,6,8,NULL),(10,4,5,15,NULL),(11,1,5,3,'Cihuahaha'),(12,6,8,5,'Fahmi nyetak untuk pertama kalinya'),(14,6,5,9,'Untuk pertama kalinya ada yang nyetak 4 goal = Jojo'),(18,7,17,3,'own goal 1, kemenangan terbesar'),(20,8,13,3,'maen ancur.. udah mulai passing lama..'),(21,5,16,3,'Maen udah gak kayak dulu lagi..'),(23,8,11,5,'Juru Assist\nOm Sulis 1\nFajar 2\nBowo 2\nJojo 1\nRio 1\nMas Qliex 1');
/*!40000 ALTER TABLE `matches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opponents`
--

DROP TABLE IF EXISTS `opponents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opponents` (
  `opponent_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(50) DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`opponent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opponents`
--

LOCK TABLES `opponents` WRITE;
/*!40000 ALTER TABLE `opponents` DISABLE KEYS */;
INSERT INTO `opponents` VALUES (1,'Budak Laut','Asuhan Dede, maen kasar'),(2,'Budak Muhammaddiyah','Teman Ari Galon dan Deni'),(3,'Kopkar','Karyawan Koperasi AP 2, kontak Bang Amat atau Bang Jul'),(4,'SMA Bhayangkari A','Teman Bagong'),(5,'Budak Parit Jepang','Teman Ujik'),(6,'Budak Kampung Arang','a.k.a SMA Bhayangkari C atau Persikab, teman Bagong '),(7,'Budak Cungkring','Anak SMA 1 Sungai Raya, teman Jojo'),(8,'Budak Arsa','Arsa, Uwo, dan kawan2, gak tau nama gengnya apa');
/*!40000 ALTER TABLE `opponents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outcomes`
--

DROP TABLE IF EXISTS `outcomes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `outcomes` (
  `outcome_id` int(11) NOT NULL AUTO_INCREMENT,
  `spent_for` varchar(200) DEFAULT NULL,
  `outcome_amount` bigint(20) unsigned NOT NULL,
  `outcome_date` date DEFAULT '2009-12-01',
  PRIMARY KEY (`outcome_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outcomes`
--

LOCK TABLES `outcomes` WRITE;
/*!40000 ALTER TABLE `outcomes` DISABLE KEYS */;
INSERT INTO `outcomes` VALUES (1,'Bayar lapangan Duban member sampe 3 Januari',200000,'2009-12-20'),(2,'Beli rompi, ditalangin pake duit Om Sulis',140000,'2009-12-22'),(3,'Bayar lapangan Duban member sampe 31 Januari',140000,'2010-01-03'),(4,'Bayar lapangan Duban, sampe tanggal 31 Januari',60000,'2010-01-10'),(5,'bayar kaos ke Om Sulis',145000,'2010-01-25');
/*!40000 ALTER TABLE `outcomes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` int(11) DEFAULT NULL,
  `amount` bigint(20) unsigned DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,3,15000,'2009-12-06 16:30:00'),(2,20,5000,'2009-12-06 16:30:00'),(3,19,3000,'2009-12-06 16:30:00'),(4,17,5000,'2009-12-06 16:30:00'),(5,14,5000,'2009-12-06 16:30:00'),(6,16,5000,'2009-12-06 16:30:00'),(7,15,5000,'2009-12-06 16:30:00'),(8,9,4000,'2009-12-06 16:30:00'),(9,11,5000,'2009-12-06 16:30:00'),(10,13,3000,'2009-12-06 16:30:00'),(11,6,10000,'2009-12-06 16:30:00'),(12,7,5000,'2009-12-06 16:30:00'),(13,1,10000,'2009-12-06 16:30:00'),(14,2,15000,'2009-12-06 16:30:00'),(15,14,5000,'2009-12-13 16:30:00'),(16,21,5000,'2009-12-13 16:30:00'),(17,18,5000,'2009-12-13 16:30:00'),(18,20,5000,'2009-12-13 16:30:00'),(19,16,5000,'2009-12-13 16:30:00'),(20,19,5000,'2009-12-13 16:30:00'),(21,11,5000,'2009-12-13 16:30:00'),(22,12,3000,'2009-12-13 16:30:00'),(23,13,3000,'2009-12-13 16:30:00'),(24,15,5000,'2009-12-13 16:30:00'),(25,7,5000,'2009-12-13 16:30:00'),(26,19,5000,'2009-12-20 16:30:00'),(27,20,5000,'2009-12-20 16:30:00'),(28,10,15000,'2009-12-20 16:30:00');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `places`
--

DROP TABLE IF EXISTS `places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `places` (
  `place_id` int(11) NOT NULL AUTO_INCREMENT,
  `stadium_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`place_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `places`
--

LOCK TABLES `places` WRITE;
/*!40000 ALTER TABLE `places` DISABLE KEYS */;
INSERT INTO `places` VALUES (1,'Lapangan Duta Bandara, Ayani'),(2,'Lapangan Perdana'),(3,'Lapangan Eka Family'),(4,'Keramat Futsal');
/*!40000 ALTER TABLE `places` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `players` (
  `player_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) DEFAULT NULL,
  `nickname` varchar(40) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  PRIMARY KEY (`player_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
INSERT INTO `players` VALUES (1,'Sulistiyo Adhipurnomo','Om Sulis','1970-01-01'),(2,'Arso Setyo Prabowo','Mas Qliex','1970-01-01'),(3,'Prabowo Murti','Bo','1970-01-01'),(4,'Satrio Wahyu Sadewo','Rio','1970-01-01'),(5,'Dedy Sumartanto','Dedi Pentol',NULL),(6,'Chandra Alif Pratama','Chandra',NULL),(7,'Andre Agustiono','Andre Kumelkucel',NULL),(8,'Machmud Tahnihan Ismarohmat','Mammud',NULL),(9,'Deni Suryadinata','Deni',NULL),(10,'Dahnial','Bang Dani',NULL),(11,'Yudha Ramadhan','Jojo',NULL),(12,'Fachry Azhari','Ari Galon',NULL),(13,'Herry Junianto','Bagong',NULL),(14,'Fajar Ariansyah','Fajar',NULL),(15,'Tri Fahmi','Fahmi',NULL),(16,'Dino bin Basuki','Dino',NULL),(17,'Wibiyantoro Adhi Praktikto','Dek Wibi',NULL),(18,'Bhakti Pangestu','Bekti',NULL),(19,'Andi Muhammad Zainal Abror','Amza',NULL),(20,'Dicky Prastya','Dicky',NULL),(21,'Ega','Ega',NULL),(22,'Andrie Budiarto','Mas Endhien','1970-01-01'),(26,'Pras Aja','Pras','1970-01-01');
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scorers`
--

DROP TABLE IF EXISTS `scorers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scorers` (
  `player_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `total_goals` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`player_id`,`game_id`),
  KEY `FK_scorers_matches` (`game_id`),
  CONSTRAINT `FK_scorers_matches` FOREIGN KEY (`game_id`) REFERENCES `matches` (`game_id`),
  CONSTRAINT `FK_scorers_players` FOREIGN KEY (`player_id`) REFERENCES `players` (`player_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scorers`
--

LOCK TABLES `scorers` WRITE;
/*!40000 ALTER TABLE `scorers` DISABLE KEYS */;
INSERT INTO `scorers` VALUES (1,10,1),(1,11,3),(1,12,3),(1,14,1),(1,18,2),(1,20,3),(1,21,2),(1,23,3),(2,20,1),(2,21,4),(3,8,1),(3,9,1),(3,10,1),(4,20,2),(6,8,1),(6,18,1),(10,9,2),(11,10,1),(11,11,1),(11,12,1),(11,14,4),(11,18,2),(11,20,2),(11,21,4),(11,23,4),(12,9,3),(12,10,1),(12,18,3),(12,20,1),(13,8,1),(13,11,1),(13,12,2),(13,18,5),(13,20,3),(13,21,3),(13,23,1),(14,10,1),(14,12,1),(14,18,3),(14,20,1),(14,21,1),(14,23,1),(15,12,1),(15,21,2),(15,23,2);
/*!40000 ALTER TABLE `scorers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2010-01-26 13:09:54
