-- MariaDB dump 10.19  Distrib 10.11.6-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: klsc
-- ------------------------------------------------------
-- Server version	10.11.6-MariaDB-0+deb12u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `CallSign`
--

DROP TABLE IF EXISTS `CallSign`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CallSign` (
  `id` int(11) NOT NULL,
  `callsign` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CallSign`
--

LOCK TABLES `CallSign` WRITE;
/*!40000 ALTER TABLE `CallSign` DISABLE KEYS */;
INSERT INTO `CallSign` VALUES
(1,'Rescue-1'),
(2,'Rescue-5'),
(3,'Rescue-3'),
(99,'OOS');
/*!40000 ALTER TABLE `CallSign` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Category`
--

DROP TABLE IF EXISTS `Category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(18) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Category`
--

LOCK TABLES `Category` WRITE;
/*!40000 ALTER TABLE `Category` DISABLE KEYS */;
INSERT INTO `Category` VALUES
(1,'Medical_Bag'),
(2,'Meds_Pouch'),
(3,'Misc'),
(4,'Oxygen'),
(5,'Airway'),
(6,'Diagnostics'),
(7,'Fish_Box'),
(8,'IV'),
(9,'Trauma'),
(10,'-'),
(11,'--'),
(40,'Truck');
/*!40000 ALTER TABLE `Category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Checksheets`
--

DROP TABLE IF EXISTS `Checksheets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Checksheets` (
  `id` int(11) NOT NULL,
  `ChecksheetName` varchar(32) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `sealable` tinyint(1) DEFAULT NULL,
  `sealed` varchar(20) DEFAULT NULL,
  `Signature` int(11) DEFAULT NULL,
  `qset` int(11) DEFAULT NULL,
  `published` tinyint(1) DEFAULT 1,
  `veh` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `Comment_`
--

DROP TABLE IF EXISTS `Comment_`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Comment_` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `_comment` varchar(200) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Comment_`
--

LOCK TABLES `Comment_` WRITE;
/*!40000 ALTER TABLE `Comment_` DISABLE KEYS */;
INSERT INTO `Comment_` VALUES
(1,'This is a before sample'),
(2,' \r\nsample of after '),
(4,'this is a test'),
(5,'The Rain in Spain'),
(6,'This is a test'),
(8,'This is a test of the blah blah blah'),
(9,'This is a test\r\n');
/*!40000 ALTER TABLE `Comment_` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `How_Many`
--

DROP TABLE IF EXISTS `How_Many`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `How_Many` (
  `hm_value_id` int(11) NOT NULL,
  `hm_name` varchar(18) NOT NULL,
  PRIMARY KEY (`hm_value_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `How_Many`
--

LOCK TABLES `How_Many` WRITE;
/*!40000 ALTER TABLE `How_Many` DISABLE KEYS */;
INSERT INTO `How_Many` VALUES
(1,'1'),
(2,'2'),
(3,'3'),
(4,'4'),
(5,'5'),
(6,'6'),
(7,'7'),
(8,'8'),
(9,'9'),
(10,'10'),
(11,'11'),
(12,'12'),
(13,'13'),
(14,'14'),
(15,'15'),
(16,'open'),
(17,'O2'),
(19,'tire'),
(20,'cb'),
(21,'miles'),
(22,'personnel'),
(23,'date'),
(24,'refill'),
(25,'comment'),
(26,'na'),
(27,'Calc'),
(28,'25');
/*!40000 ALTER TABLE `How_Many` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Items`
--

DROP TABLE IF EXISTS `Items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(32) NOT NULL,
  `perishable` tinyint(1) DEFAULT NULL,
  `stockable` tinyint(1) DEFAULT NULL,
  `in_stock` int(11) DEFAULT NULL,
  `min_q` int(11) DEFAULT NULL,
  `dist_id` int(11) DEFAULT NULL,
  `mfr_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `dist_id` (`dist_id`),
  KEY `mfr_id` (`mfr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=604 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Items`
--

LOCK TABLES `Items` WRITE;
/*!40000 ALTER TABLE `Items` DISABLE KEYS */;
INSERT INTO `Items` VALUES
(1,'Mileage',NULL,NULL,NULL,NULL,NULL,NULL),
(2,'Service Due',NULL,NULL,NULL,NULL,NULL,NULL),
(3,'Date',NULL,NULL,NULL,NULL,NULL,NULL),
(4,'Series',NULL,NULL,NULL,NULL,NULL,NULL),
(6,'Station',NULL,NULL,NULL,NULL,NULL,NULL),
(7,'CallSign',NULL,NULL,NULL,NULL,NULL,NULL),
(8,'Crew1',NULL,NULL,NULL,NULL,NULL,NULL),
(9,'Crew2',NULL,NULL,NULL,NULL,NULL,NULL),
(10,'BVM Adult',NULL,1,48,NULL,NULL,NULL),
(11,'Esophageal Detector',NULL,1,48,NULL,NULL,NULL),
(12,'Colormetric Adult',1,1,48,NULL,NULL,NULL),
(13,'Laryngoscope Large',NULL,1,48,NULL,NULL,NULL),
(14,'Miller Blade No.3',NULL,1,48,NULL,NULL,NULL),
(15,'Macintosh Blade No.3',NULL,1,48,NULL,NULL,NULL),
(16,'Miller Blade No.4',NULL,1,48,NULL,NULL,NULL),
(17,'Macintosh Blade No.4',NULL,1,48,NULL,NULL,NULL),
(18,'ETT Cuffed 6.0 ',1,1,48,NULL,NULL,NULL),
(19,'ETT Cuffed 6.5',1,1,48,NULL,NULL,NULL),
(20,'ETT Cuffed 7.0',1,1,48,NULL,NULL,NULL),
(21,'ETT Cuffed 7.5',1,1,47,NULL,NULL,NULL),
(22,'ETT Cuffed 8.0',1,1,48,NULL,NULL,NULL),
(23,'ETT Cuffed 8.5',1,1,48,NULL,NULL,NULL),
(24,'ETT Cuffed 9.0 ',1,1,48,NULL,NULL,NULL),
(25,'Stylette Adult',NULL,1,48,NULL,NULL,NULL),
(26,'Battery Spare -C-',NULL,1,48,NULL,NULL,NULL),
(27,'Combie Tube',1,1,48,NULL,NULL,NULL),
(28,'Quick Trach Kit',1,1,48,NULL,NULL,NULL),
(29,'Nasopharyngeal Airway 20 ',1,1,48,NULL,NULL,NULL),
(30,'Nasopharyngeal Airway  22',1,1,48,NULL,NULL,NULL),
(31,'Nasopharyngeal Airway 24  ',1,1,48,NULL,NULL,NULL),
(32,'Nasopharyngeal Airway 28',1,1,48,NULL,NULL,NULL),
(33,'Nasopharyngeal Airway 30 ',1,1,48,NULL,NULL,NULL),
(34,'Oropharyngeal Airway 70mm',NULL,1,48,NULL,NULL,NULL),
(35,'Oropharyngeal Airway 80mm',NULL,1,48,NULL,NULL,NULL),
(36,'Oropharyngeal Airway 90mm',NULL,1,48,NULL,NULL,NULL),
(37,'Oropharyngeal Airway 100mm ',NULL,1,48,NULL,NULL,NULL),
(38,'Oropharyngeal Airway 110mm ',NULL,1,48,NULL,NULL,NULL),
(39,'Magill Forceps Adult',NULL,1,48,NULL,NULL,NULL),
(41,'Syringe 10cc ',NULL,1,48,NULL,NULL,NULL),
(42,'Tape Roll 1inch ',NULL,1,48,NULL,NULL,NULL),
(43,'Tube Tamer',NULL,1,48,NULL,NULL,NULL),
(44,'IV Angiocath 14g',1,1,48,NULL,NULL,NULL),
(45,'IV Angiocath 16g',1,1,48,NULL,NULL,NULL),
(46,'IV Angiocath 18g ',1,1,48,NULL,NULL,NULL),
(47,'IV Angiocath 20g ',1,1,48,NULL,NULL,NULL),
(48,'IV Angiocath 22g ',1,1,48,NULL,NULL,NULL),
(49,'IV Angiocath 24g ',1,1,48,NULL,NULL,NULL),
(50,'NG Tube',1,1,48,NULL,NULL,NULL),
(51,'Ammonia Inhalants',NULL,1,48,NULL,NULL,NULL),
(52,'Epinephrine 1-10000',1,1,48,NULL,NULL,NULL),
(53,'Atropine 1mg/10ml',1,1,48,NULL,NULL,NULL),
(54,'Atropine 1mg/1ml',1,1,48,NULL,NULL,NULL),
(55,'Lidocaine 100mg',1,1,48,NULL,NULL,NULL),
(56,'Nitro Tabs',1,1,48,NULL,NULL,NULL),
(57,'Nitro Spray',1,1,48,NULL,NULL,NULL),
(58,'Nitro Ointment 1% ',1,1,48,NULL,NULL,NULL),
(59,'ASA Bottle of Baby',1,1,48,NULL,NULL,NULL),
(60,'Adenocard 6mg',1,1,48,NULL,NULL,NULL),
(61,'Albuterol',1,1,48,NULL,NULL,NULL),
(62,'Amiodorone 150mg',1,1,48,NULL,NULL,NULL),
(63,'Benadryl 50mg',1,1,48,NULL,NULL,NULL),
(64,'Epinephrine 1-1000',1,1,48,NULL,NULL,NULL),
(65,'Needles Subcutaneous',NULL,1,48,NULL,NULL,NULL),
(66,'Lasix',1,1,48,NULL,NULL,NULL),
(67,'Magnesium Sulfate 1g ',1,1,48,NULL,NULL,NULL),
(68,'Magnesium Sulfate 5g',1,1,48,NULL,NULL,NULL),
(69,'Narcan 2mg ',1,1,48,NULL,NULL,NULL),
(70,'Phenergan',1,1,48,NULL,NULL,NULL),
(71,'Decadron',1,1,48,NULL,NULL,NULL),
(72,'Solu-Medrol',1,1,48,NULL,NULL,NULL),
(73,'Glucagon',1,1,48,NULL,NULL,NULL),
(74,'Vasopressin',1,1,48,NULL,NULL,NULL),
(81,'Syringe 1cc ',NULL,1,48,NULL,NULL,NULL),
(82,'Syringe 3cc ',NULL,1,48,NULL,NULL,NULL),
(84,'Needles 18g ',NULL,1,48,NULL,NULL,NULL),
(85,'Alcohol Swabs',NULL,1,48,NULL,NULL,NULL),
(86,'Bandaids',NULL,1,48,NULL,NULL,NULL),
(87,'Vacutainers Speckled Red',1,1,48,NULL,NULL,NULL),
(88,'Vacutainers Green',1,1,48,NULL,NULL,NULL),
(89,'Vacutainers Purple',1,1,48,NULL,NULL,NULL),
(90,'Vacutainers Blue',1,1,48,NULL,NULL,NULL),
(91,'Lancets',NULL,1,48,NULL,NULL,NULL),
(92,'D-50',1,1,48,NULL,NULL,NULL),
(93,'Sodium Bicarb 100mEq',1,1,48,NULL,NULL,NULL),
(94,'Dopamine Mix',1,1,48,NULL,NULL,NULL),
(95,'Lidocaine Mix',1,1,48,NULL,NULL,NULL),
(96,'Normal Saline Bag ',1,1,45,NULL,NULL,NULL),
(97,'D-25',1,1,48,NULL,NULL,NULL),
(98,'IV Line Macro ',NULL,1,38,NULL,NULL,NULL),
(99,'IV Line Micro',NULL,1,48,NULL,NULL,NULL),
(100,'IV Start Kit',NULL,1,48,NULL,NULL,NULL),
(101,'IV Extension',NULL,1,48,NULL,NULL,NULL),
(102,'Dial-a-flow Extension',NULL,1,48,NULL,NULL,NULL),
(103,'Nasal Injector',NULL,1,48,NULL,NULL,NULL),
(104,'Heat and AC',NULL,NULL,NULL,NULL,NULL,NULL),
(105,'PA-Radio Amplifier',NULL,NULL,NULL,NULL,NULL,NULL),
(106,'Siren',NULL,NULL,NULL,NULL,NULL,NULL),
(107,'Horn',NULL,NULL,NULL,NULL,NULL,NULL),
(108,'800Mhz Radio',NULL,NULL,NULL,NULL,NULL,NULL),
(109,'VHF Radio',NULL,NULL,NULL,NULL,NULL,NULL),
(110,'LR Bag',1,1,48,NULL,NULL,NULL),
(556,'GPS Stand',0,1,NULL,NULL,NULL,NULL),
(341,'Truck Maintenance Comment',NULL,NULL,NULL,NULL,NULL,NULL),
(333,'Antifreeze',NULL,1,48,NULL,NULL,NULL),
(115,'Buretrol Sets',NULL,1,48,NULL,NULL,NULL),
(116,'Blood Infusion Tubing',NULL,1,48,NULL,NULL,NULL),
(117,'IV Arm Boards',NULL,1,48,NULL,NULL,NULL),
(118,'Pressure Infuser',NULL,1,48,NULL,NULL,NULL),
(554,'GPS',0,1,48,NULL,NULL,NULL),
(555,'Map Book',0,1,48,NULL,NULL,NULL),
(558,'Syringe 10cc Slip-Tip',0,1,48,NULL,NULL,NULL),
(557,'GPS Charger',0,1,48,NULL,NULL,NULL),
(127,'Saline Flush',1,1,48,NULL,NULL,NULL),
(128,'IO Sternal Kit',1,1,48,NULL,NULL,NULL),
(129,'Tourniquettes',NULL,1,48,NULL,NULL,NULL),
(130,'Brake Lights',NULL,NULL,NULL,NULL,NULL,NULL),
(131,'Turn Signals',NULL,NULL,NULL,NULL,NULL,NULL),
(132,'Backup Lights',NULL,NULL,NULL,NULL,NULL,NULL),
(133,'Backup Alarm',NULL,NULL,NULL,NULL,NULL,NULL),
(134,'Clearance Lights',NULL,NULL,NULL,NULL,NULL,NULL),
(135,'Spot Light',NULL,1,48,NULL,NULL,NULL),
(136,'Emergency Light',NULL,NULL,NULL,NULL,NULL,NULL),
(137,'Compartment Lights',NULL,NULL,NULL,NULL,NULL,NULL),
(138,'Head Lights',NULL,NULL,NULL,NULL,NULL,NULL),
(139,'Tail Lights',NULL,NULL,NULL,NULL,NULL,NULL),
(140,'Shoreline',NULL,1,48,NULL,NULL,NULL),
(141,'Inverter',NULL,NULL,NULL,NULL,NULL,NULL),
(142,'Emesis Basins',NULL,1,48,NULL,NULL,NULL),
(143,'Body Bags',NULL,1,48,NULL,NULL,NULL),
(144,'Bed Pan',NULL,1,48,NULL,NULL,NULL),
(145,'Urinal',NULL,1,48,NULL,NULL,NULL),
(146,'Sphygmomanometer',NULL,1,48,NULL,NULL,NULL),
(147,'Stethoscope',NULL,1,48,NULL,NULL,NULL),
(148,'System 5',NULL,1,48,NULL,NULL,NULL),
(149,'Trauma Shears',NULL,1,48,NULL,NULL,NULL),
(150,'Sheets',NULL,1,48,NULL,NULL,NULL),
(151,'Towels',NULL,1,48,NULL,NULL,NULL),
(152,'Blankets w dust resist cover',NULL,1,47,NULL,NULL,NULL),
(153,'Pillow',1,1,48,NULL,NULL,NULL),
(154,'Gloves Sterile',NULL,1,48,NULL,NULL,NULL),
(155,'OB Blankets/Caps w dust resist c',NULL,1,48,NULL,NULL,NULL),
(156,'Kleenex Box',NULL,1,48,NULL,NULL,NULL),
(157,'Paper Towels',NULL,1,48,NULL,NULL,NULL),
(158,'Toilet Paper Roll',NULL,1,48,NULL,NULL,NULL),
(159,'Glucometer',NULL,1,48,NULL,NULL,NULL),
(160,'Glucometer Strips',1,1,47,NULL,NULL,NULL),
(541,'Memory SD Card Adapter',0,1,48,NULL,NULL,NULL),
(540,'Memory Card Reader',0,1,48,NULL,NULL,NULL),
(164,'2X2s',NULL,1,31,32,1,1),
(165,'Thermoscan',NULL,1,48,NULL,NULL,NULL),
(166,'Thermoscan Shields',NULL,1,48,NULL,NULL,NULL),
(167,'Stair-Chair',NULL,1,48,NULL,NULL,NULL),
(168,'LSB',NULL,1,48,NULL,NULL,NULL),
(169,'LSB Straps',NULL,1,48,NULL,NULL,NULL),
(170,'CIDs',NULL,1,48,NULL,NULL,NULL),
(171,'Scoop Stretcher',NULL,1,48,NULL,NULL,NULL),
(172,'Short Sp Immob Dev w case',NULL,1,48,NULL,NULL,NULL),
(173,'Pediatric Board',NULL,1,48,NULL,NULL,NULL),
(174,'Sager',NULL,1,48,NULL,NULL,NULL),
(175,'Fire Extinguisher 5lb',NULL,1,48,NULL,NULL,NULL),
(176,'Flashlight',NULL,1,48,NULL,NULL,NULL),
(177,'Reflective Triangles',NULL,1,48,NULL,NULL,NULL),
(178,'Booster Cables',NULL,1,48,NULL,NULL,NULL),
(179,'Tow Strap',NULL,1,48,NULL,NULL,NULL),
(180,'Haligan Tool',NULL,1,48,NULL,NULL,NULL),
(181,'C-Collar Adult Adjustable',NULL,1,48,NULL,NULL,NULL),
(184,'C-Collar Pediatric Adjustable',NULL,1,48,NULL,NULL,NULL),
(186,'Board Splint Long',NULL,1,48,NULL,NULL,NULL),
(187,'Board Splint Medium',NULL,1,48,54,NULL,NULL),
(188,'Board Splint Short',NULL,1,48,NULL,NULL,NULL),
(189,'Frac-Pac Sling',NULL,1,48,NULL,NULL,NULL),
(190,'Frac-Pac Long Bone',NULL,1,48,NULL,NULL,NULL),
(191,'Frac-Pac Large Long Bone',NULL,1,48,NULL,NULL,NULL),
(192,'Frac-Pac Splint Long Leg',NULL,1,48,NULL,NULL,NULL),
(193,'Frac-Pac Ankle Splint',NULL,1,48,NULL,NULL,NULL),
(194,'Vehicle O2',NULL,NULL,NULL,NULL,NULL,NULL),
(195,'Portable O2',NULL,NULL,NULL,NULL,NULL,NULL),
(196,'Ventilator O2',NULL,NULL,NULL,NULL,NULL,NULL),
(197,'Ventilator Circuits',NULL,1,48,NULL,NULL,NULL),
(198,'CPAP O2',NULL,NULL,NULL,NULL,NULL,NULL),
(199,'CPAP Circuits',NULL,1,48,NULL,NULL,NULL),
(200,'D-Bottle O2 Spare',NULL,1,48,NULL,NULL,NULL),
(201,'BVM Adult Spare',NULL,1,48,NULL,NULL,NULL),
(202,'BVM Spare Pediatric',NULL,1,48,NULL,NULL,NULL),
(203,'BVM Neonatal Spare',NULL,1,48,NULL,NULL,NULL),
(204,'Non-Rebreather',NULL,1,48,NULL,NULL,NULL),
(205,'Nasal Cannula',NULL,1,48,NULL,NULL,NULL),
(206,'O2 Supply Tubing',NULL,1,48,NULL,NULL,NULL),
(207,'Nebulizer',NULL,1,48,NULL,NULL,NULL),
(208,'Nebulizer Mask',NULL,1,48,NULL,NULL,NULL),
(209,'NRB Pediatric',NULL,1,48,NULL,NULL,NULL),
(210,'Infant Medium Concentration Mask',NULL,1,48,NULL,NULL,NULL),
(211,'Nebulizer Mask Pediatric',NULL,1,48,NULL,NULL,NULL),
(212,'Pediatric Tape',NULL,1,48,NULL,NULL,NULL),
(213,'IO Needle 14-18g Adult',1,1,48,NULL,NULL,NULL),
(214,'IO Needle 18g Pedi',1,1,48,NULL,NULL,NULL),
(215,'Syringes 60cc',NULL,1,48,NULL,NULL,NULL),
(218,'Laryngoscope Small',NULL,1,47,NULL,NULL,NULL),
(219,'Macintosh Blade No.1',NULL,1,48,NULL,NULL,NULL),
(220,'Macintosh Blade No.2',NULL,1,48,NULL,NULL,NULL),
(221,'Miller Blade No.0',NULL,1,48,NULL,NULL,NULL),
(222,'Miller Blade No.1',NULL,1,48,NULL,NULL,NULL),
(223,'Miller Blade No.2',NULL,1,48,NULL,NULL,NULL),
(224,'Battery Spare AA',NULL,1,48,NULL,NULL,NULL),
(225,'Meconium Adapter',NULL,1,47,NULL,NULL,NULL),
(226,'Magill Forceps Pedi',NULL,1,48,NULL,NULL,NULL),
(227,'Stethoscope Pediatric',NULL,1,48,NULL,NULL,NULL),
(228,'BVM Infant',NULL,1,48,NULL,NULL,NULL),
(229,'BVM Pediatric',NULL,1,48,NULL,NULL,NULL),
(230,'ETT Uncuffed 2.0mm ',1,1,48,NULL,NULL,NULL),
(231,'ETT Uncuffed 2.5mm ',1,1,48,NULL,NULL,NULL),
(232,'ETT Uncuffed 3.0mm ',1,1,48,NULL,NULL,NULL),
(233,'ETT Uncuffed 3.5mm ',1,1,48,NULL,NULL,NULL),
(234,'ETT Uncuffed 4.0mm ',1,1,48,NULL,NULL,NULL),
(235,'ETT Uncuffed 4.5mm',1,1,48,NULL,NULL,NULL),
(236,'ETT Uncuffed 5.0mm',1,1,48,NULL,NULL,NULL),
(237,'ETT Uncuffed 5.5mm',1,1,48,NULL,NULL,NULL),
(238,'ETT Uncuffed 6.0mm',1,1,48,NULL,NULL,NULL),
(239,'Shielded Masks',NULL,1,48,NULL,NULL,NULL),
(240,'Toughbook',NULL,1,48,NULL,NULL,NULL),
(241,'Gloves Small Latex Free',NULL,1,48,NULL,NULL,NULL),
(242,'Toughbook Truck Charger',NULL,1,48,NULL,NULL,NULL),
(243,'Gloves Medium Latex Free',NULL,1,48,NULL,NULL,NULL),
(244,'HP470 Printer',NULL,1,48,NULL,NULL,NULL),
(245,'Gloves Large Latex Free',NULL,1,48,NULL,NULL,NULL),
(246,'Printer Paper',NULL,1,48,NULL,NULL,NULL),
(247,'Gloves Extra-Large Latex Free',NULL,1,48,NULL,NULL,NULL),
(248,'Disposable Gowns',NULL,1,48,NULL,NULL,NULL),
(249,'Shoe Covers',NULL,1,48,NULL,NULL,NULL),
(250,'Hand Cleaner',NULL,1,48,NULL,NULL,NULL),
(251,'Decon Spray',NULL,1,48,NULL,NULL,NULL),
(252,'PFD',NULL,1,48,NULL,NULL,NULL),
(253,'Throw Rope',NULL,1,48,NULL,NULL,NULL),
(254,'Anti-Dote Kit',1,1,48,NULL,NULL,NULL),
(255,'Sharps Box',NULL,1,48,NULL,NULL,NULL),
(256,'DOT Response Guide',NULL,1,48,NULL,NULL,NULL),
(257,'Rain Parkas',NULL,1,48,NULL,NULL,NULL),
(258,'TB Masks Large',NULL,1,48,NULL,NULL,NULL),
(259,'TB Masks Medium',NULL,1,48,NULL,NULL,NULL),
(260,'Morphine',1,1,48,NULL,NULL,NULL),
(261,'Nimbex',1,1,48,NULL,NULL,NULL),
(262,'Valium',1,1,48,NULL,NULL,NULL),
(263,'Versed',1,1,48,NULL,NULL,NULL),
(334,'Power Steering Fluid',NULL,1,48,NULL,NULL,NULL),
(265,'Ativan',1,1,48,NULL,NULL,NULL),
(266,'Succinycholine',1,1,48,NULL,NULL,NULL),
(267,'Ice Pack Refresh',NULL,1,48,NULL,NULL,NULL),
(268,'Trash Bags Large',NULL,1,48,NULL,NULL,NULL),
(269,'Trash Bags Small',NULL,1,48,NULL,NULL,NULL),
(270,'Lysol',NULL,1,48,NULL,NULL,NULL),
(271,'Bleach',NULL,1,48,NULL,NULL,NULL),
(272,'Detegent',NULL,1,48,NULL,NULL,NULL),
(273,'Truck Soap',NULL,1,48,NULL,NULL,NULL),
(274,'Tire Shine',NULL,1,48,NULL,NULL,NULL),
(275,'Yaunkers',NULL,1,48,NULL,NULL,NULL),
(276,'Suction Catheter 6fr',NULL,1,48,NULL,NULL,NULL),
(277,'Suction Catheter 8fr',NULL,1,48,NULL,NULL,NULL),
(278,'Suction Catheter 10fr ',NULL,1,48,NULL,NULL,NULL),
(279,'Suction Catheter 14fr ',NULL,1,48,NULL,NULL,NULL),
(280,'Suction Catheter 16fr ',NULL,1,48,NULL,NULL,NULL),
(281,'Suction Catheter 18fr ',NULL,1,48,NULL,NULL,NULL),
(283,'Tire Tread',NULL,NULL,NULL,NULL,NULL,NULL),
(284,'Driver Side Front Tire PSI',NULL,NULL,NULL,NULL,NULL,NULL),
(285,'Tire Passenger Side Front PSI',NULL,NULL,NULL,NULL,NULL,NULL),
(286,'Tire Rear Driver Side Inside PSI',NULL,NULL,NULL,NULL,NULL,NULL),
(287,'Tire Rear Driver Side Outside PS',NULL,NULL,NULL,NULL,NULL,NULL),
(288,'Tire Rear Passenger Side Inside ',NULL,NULL,NULL,NULL,NULL,NULL),
(289,'Tire Rear Passenger Side Outside',NULL,NULL,NULL,NULL,NULL,NULL),
(290,'4X4s Box',1,1,48,NULL,NULL,NULL),
(291,'Tape 1inch Box',NULL,1,48,NULL,NULL,NULL),
(292,'Tape 3inch Box',NULL,1,48,NULL,NULL,NULL),
(293,'2X2s Box',NULL,1,42,NULL,1,1),
(294,'Burn Sheets',NULL,1,48,NULL,NULL,NULL),
(295,'Dressing 10X30 ',NULL,1,48,NULL,NULL,NULL),
(296,'Alcohol Prep Pads Box',NULL,1,48,NULL,NULL,NULL),
(297,'Petrolatum Gauze',NULL,1,48,NULL,NULL,NULL),
(298,'Roller Gauze 3 inch ',NULL,1,48,NULL,NULL,NULL),
(299,'Roller Gauze 6 inch',NULL,1,48,NULL,NULL,NULL),
(300,'Dressing 8X10',NULL,1,48,NULL,NULL,NULL),
(301,'Cravats',NULL,1,48,NULL,NULL,NULL),
(303,'Hot Packs',NULL,1,48,NULL,NULL,NULL),
(304,'Cold Packs',NULL,1,48,NULL,NULL,NULL),
(542,'Memory SD Card',0,1,48,NULL,NULL,NULL),
(306,'Tape  Roll 3inch ',NULL,1,48,NULL,NULL,NULL),
(307,'Hemostats',NULL,1,48,NULL,NULL,NULL),
(308,'Pen Light',NULL,1,48,NULL,NULL,NULL),
(539,'Philips Memory Card',0,1,48,NULL,NULL,NULL),
(310,'Gloves Exam',NULL,1,48,NULL,NULL,NULL),
(538,'Battery 9V',0,1,48,NULL,NULL,NULL),
(315,'4X4s',1,1,48,NULL,NULL,NULL),
(537,'Rosetta Cable',0,1,48,NULL,NULL,NULL),
(536,'Rosetta',0,1,48,NULL,NULL,NULL),
(535,'Syringes_5cc',0,1,48,NULL,NULL,NULL),
(534,'Toilet Brush',0,1,48,NULL,NULL,NULL),
(553,'Philips SD Card',0,1,48,NULL,NULL,NULL),
(552,'Philips SD Card Adapter',0,1,48,NULL,NULL,NULL),
(551,'Philips ETCO2 Nasal Cannula',0,1,48,NULL,NULL,NULL),
(550,'Rosetta Cable R2R',0,1,48,NULL,NULL,NULL),
(549,'Philips 3-lead Cables',0,1,48,NULL,NULL,NULL),
(548,'Philips Operational Check',0,NULL,NULL,NULL,NULL,NULL),
(547,'Sager Pedi-Elastic Cravat',0,1,48,NULL,NULL,NULL),
(546,'Sager Elastic Cravat',0,1,48,NULL,NULL,NULL),
(545,'Sager Pediatric',0,1,48,NULL,NULL,NULL),
(544,'Battery CR2032',0,1,48,NULL,NULL,NULL),
(543,'Memory Card',0,1,48,NULL,NULL,NULL),
(377,'Zoll Monitor Battery',NULL,1,48,NULL,NULL,NULL),
(379,'Defib Jel',NULL,1,48,NULL,NULL,NULL),
(380,'Zoll ECG Paper',NULL,1,48,NULL,NULL,NULL),
(381,'Zoll Adult Pulse Ox Probe',NULL,1,48,NULL,NULL,NULL),
(382,'Zoll Pedi Pulse Ox Probe',NULL,1,48,NULL,NULL,NULL),
(383,'Zoll Thigh NIBP Cuff',NULL,1,48,NULL,NULL,NULL),
(384,'Zoll Adult NIBP Cuff',NULL,1,48,NULL,NULL,NULL),
(385,'Zoll Small NIBP Cuff',NULL,1,48,NULL,NULL,NULL),
(386,'Zoll ETCO2 Cable',NULL,1,48,NULL,NULL,NULL),
(387,'Zoll ETCO2 Adapter',NULL,1,48,NULL,NULL,NULL),
(388,'Zoll Neonate ETCO2 Adapter',NULL,1,48,NULL,NULL,NULL),
(389,'Zoll 12-lead Cables',NULL,1,48,NULL,NULL,NULL),
(390,'Electrodes Adult',NULL,1,43,NULL,NULL,NULL),
(391,'Electrodes Pediatric',1,1,48,NULL,NULL,NULL),
(392,'Electrodes Spare Pack',NULL,1,48,NULL,NULL,NULL),
(393,'Zoll Adult Pacing Pads',1,1,48,NULL,NULL,NULL),
(331,'Oil Level',NULL,NULL,NULL,NULL,NULL,NULL),
(395,'HP Monitor Battery',NULL,1,48,NULL,NULL,NULL),
(396,'HP Roll Paper',NULL,1,48,NULL,NULL,NULL),
(397,'HP Adult Pulse Ox Probe',NULL,1,48,NULL,NULL,NULL),
(398,'HP Pedi Pulse Ox Probe',NULL,1,48,NULL,NULL,NULL),
(399,'HP Adult Pacing Pads',NULL,1,48,NULL,NULL,NULL),
(400,'HP Pedi Pacing Pads',NULL,1,48,NULL,NULL,NULL),
(401,'Philips Monitor Battery',NULL,1,48,NULL,NULL,NULL),
(402,'Philips Roll Paper',NULL,1,48,NULL,NULL,NULL),
(403,'Philips Pulse Ox Probe',NULL,1,48,NULL,NULL,NULL),
(404,'Philips Pedi Pulse Ox Probe',NULL,1,48,NULL,NULL,NULL),
(405,'Philips Thigh NIBP Cuff',NULL,1,48,NULL,NULL,NULL),
(406,'Philips Adult NIBP Cuff',NULL,1,48,NULL,NULL,NULL),
(407,'Philips Small NIBP Cuff',NULL,1,48,NULL,NULL,NULL),
(335,'Brake Fluid',NULL,NULL,NULL,NULL,NULL,NULL),
(409,'Philips ETCO2 Adapter',NULL,1,48,NULL,NULL,NULL),
(410,'Philips 12-lead Cables',NULL,1,48,NULL,NULL,NULL),
(411,'Philips Adult Pacing Pads',1,1,48,NULL,NULL,NULL),
(412,'Philips Pedi Pacing Pads',1,1,48,NULL,NULL,NULL),
(416,'Cheat Sheets',NULL,1,48,NULL,NULL,NULL),
(415,'Shop Vac',NULL,1,48,NULL,NULL,NULL),
(417,'Personnel_1',NULL,NULL,NULL,NULL,NULL,NULL),
(418,'Personnel_2',NULL,NULL,NULL,NULL,NULL,NULL),
(419,'Colormetric Pedi',1,1,48,NULL,NULL,NULL),
(420,'Etomidate',1,1,48,NULL,NULL,NULL),
(421,'HP470 Printer Power Adapter',NULL,1,48,NULL,NULL,NULL),
(422,'HP470 Printer USB Adapter',NULL,1,48,NULL,NULL,NULL),
(423,'Stair Chair Straps',NULL,1,48,NULL,NULL,NULL),
(424,'Cot',NULL,1,48,NULL,NULL,NULL),
(425,'Cot Straps',NULL,1,48,NULL,NULL,NULL),
(426,'4-Point Harness',NULL,1,48,NULL,NULL,NULL),
(427,'Head Storage Net',NULL,1,48,NULL,NULL,NULL),
(428,'Scalpel',1,1,48,NULL,NULL,NULL),
(429,'Reflective Safety Wear',NULL,1,48,NULL,NULL,NULL),
(430,'Fixed Suction w/gauge',NULL,NULL,NULL,NULL,NULL,NULL),
(431,'Portable Suction w/gauge',NULL,1,48,NULL,NULL,NULL),
(432,'Fixed Suction Collection Can',NULL,1,48,NULL,NULL,NULL),
(433,'Portable Suction Collection Can',NULL,1,48,NULL,NULL,NULL),
(434,'Fixed Suction Tubing',NULL,1,48,NULL,NULL,NULL),
(435,'Portable Suction Tubing',NULL,1,48,NULL,NULL,NULL),
(516,'MFC 8220 Printer Cartridge',0,1,48,NULL,NULL,NULL),
(515,'MFC 8220 Printer',0,1,48,NULL,NULL,NULL),
(527,'D5W',1,1,48,NULL,NULL,NULL),
(526,'Heat Pump Air Filters',0,1,48,NULL,NULL,NULL),
(525,'Light Bulbs',0,1,48,NULL,NULL,NULL),
(524,'Dish Soap',0,1,48,NULL,NULL,NULL),
(523,'ETT Cuffed 9.5',0,1,48,NULL,NULL,NULL),
(522,'Wool blanket',0,1,48,NULL,NULL,NULL),
(521,'Battery 9v',0,1,48,NULL,NULL,NULL),
(520,'MFC 7840 Drum',0,1,48,NULL,NULL,NULL),
(519,'MFC 7840W Toner',0,1,48,NULL,NULL,NULL),
(514,'Comment',0,NULL,NULL,NULL,NULL,NULL),
(513,'IO EZ Stabilizer',1,1,48,NULL,NULL,NULL),
(512,'IO EZ 45mm x 15g',1,1,48,NULL,NULL,NULL),
(511,'IO EZ 25mm x 15g',1,1,48,NULL,NULL,NULL),
(533,'409 Cleaner',0,1,48,NULL,NULL,NULL),
(532,'Cleanser',0,1,48,NULL,NULL,NULL),
(531,'Bacteriostatic Water',1,1,48,NULL,NULL,NULL),
(518,'Shop Vac Filter',0,1,48,NULL,NULL,NULL),
(517,'MFC 8220 Printer Drum',0,1,48,NULL,NULL,NULL),
(510,'IO EZ 15mm x 15g',1,1,48,NULL,NULL,NULL),
(509,'IO EZ Drill',0,1,48,NULL,NULL,NULL),
(470,'HP470 B/W Printer Cartridge',NULL,1,48,NULL,NULL,NULL),
(471,'Tourniquettes Latex Free',NULL,1,37,NULL,NULL,NULL),
(508,'Zofran 4mg',1,1,48,NULL,NULL,NULL),
(474,'Cord Clamps',NULL,1,48,NULL,NULL,NULL),
(475,'Placenta Bag and Tie',NULL,1,48,NULL,NULL,NULL),
(332,'Transmission Fluid',NULL,NULL,NULL,NULL,NULL,NULL),
(477,'Gauze Dressing',NULL,1,48,NULL,NULL,NULL),
(478,'Bulb Syringe',NULL,1,48,NULL,NULL,NULL),
(336,'Windshield Washing Fluid',NULL,1,48,NULL,NULL,NULL),
(481,'Underpad (Chucks)',NULL,1,48,NULL,NULL,NULL),
(337,'Fuel',NULL,1,48,NULL,NULL,NULL),
(484,'Lube Jelly',NULL,1,48,NULL,NULL,NULL),
(530,'Atropine 0.4mg',1,1,48,NULL,NULL,NULL),
(529,'INT Caps',0,1,48,NULL,NULL,NULL),
(528,'Tegaderms',1,1,48,NULL,NULL,NULL),
(488,'Disposable Razor',NULL,1,48,NULL,NULL,NULL),
(507,'Stylette Pedi',0,1,48,NULL,NULL,NULL),
(490,'Zoll Pedi Pacing Pads',1,1,48,NULL,NULL,NULL),
(491,'Zoll AED',NULL,1,48,NULL,NULL,NULL),
(492,'A/C Cable',NULL,1,48,NULL,NULL,NULL),
(493,'Zoll Paper Spare Roll',NULL,1,48,NULL,NULL,NULL),
(495,'Ride Along',NULL,NULL,NULL,NULL,NULL,NULL),
(559,'Suction Tubing',0,1,48,NULL,NULL,NULL),
(560,'Convenience Bag',0,1,48,NULL,NULL,NULL),
(561,'Mileage Calculation',0,NULL,NULL,NULL,NULL,NULL),
(562,'Irrigation Solution 500cc',1,1,48,NULL,NULL,NULL),
(563,'OOS Location',0,0,0,0,NULL,0),
(564,'Thermometer',0,1,0,0,0,0),
(565,'BioHaz Bag 24x30 w labels',0,1,0,0,0,0),
(566,'Impermeable Tape',0,1,0,0,0,0),
(567,'Impermeable Full Body Suit',0,1,0,0,0,0),
(568,'Protective Footwear',0,1,0,0,0,0),
(569,'Sphyg Cuff Adult',0,1,0,0,0,0),
(570,'Sphyg Cuff Pedi',0,1,0,0,0,0),
(571,'Sphyg Cuff LG or Thigh',0,1,0,0,0,0),
(572,'Adult C-Collar sm-med-lg',0,1,0,0,0,0),
(573,'Extremity Immob Kit Adult',0,1,0,0,0,0),
(574,'Extremity Immob Kit Pedi',0,1,0,0,0,0),
(575,'Traction Splint Bilat',0,1,0,0,0,0),
(576,'Pelvic Immob Device',0,1,0,0,0,0),
(577,'Blind Insertion Device',0,1,0,0,0,0),
(578,'Nebulizer Pedi',0,1,0,0,0,0),
(579,'CPAP',0,1,0,0,0,0),
(580,'Antiseptic Wipe',0,1,0,0,0,0),
(581,'Telemetry Device',0,1,0,0,0,0),
(582,'Epi 1-1000 w syringe 0.3mg dose',1,1,0,0,0,0),
(583,'Beta-Adrenergic Agonist',1,1,0,0,0,0),
(584,'Nitroglycerine (Spray or Tabs)',1,1,0,0,0,0),
(585,'Narcan at least 4mg',1,1,0,0,0,0),
(586,'Benzodiazepine 2 MAX Doses',1,1,0,0,0,0),
(587,'Vasoopressor Agent 4 MAX doses',1,1,0,0,0,0),
(588,'Narcotic 2MAX Doses',1,1,0,0,0,0),
(589,'Anti-Emetic',1,1,0,0,0,0),
(590,'Scannable Triage Tagging System',0,1,0,0,0,0),
(591,'Sterile Gloves',0,1,0,0,0,0),
(592,'Plastic Bag (Placenta)',0,1,0,0,0,0),
(593,'Tourniquet_Trauma',0,1,0,0,0,0),
(594,'ETT 5.0mm Cuffed',1,1,0,0,0,0),
(595,'ETT Cuffed 5.0mm',1,1,0,0,0,0),
(596,'ETT Cuffed 5.5mm',1,1,0,0,0,0),
(597,'ETT Cuffed 2.5',1,1,0,0,0,0),
(598,'ETT Cuffed 3.0',1,1,0,0,0,0),
(599,'ETT Cuffed 3.5',1,1,0,0,0,0),
(600,'ETT Cuffed 4.0',1,1,0,0,0,0),
(601,'ETT Cuffed 5.0',1,1,0,0,0,0),
(602,'Bougie Device',1,1,0,0,0,0),
(603,'Decompression Needle',1,1,0,0,0,0),
(604,'Sting Swabs',1,NULL,NULL,NULL,NULL,NULL),
(605,'Syringe Filter Straws',1,NULL,NULL,NULL,NULL,NULL),
(606,'Roller Gauze 2 inch',0,NULL,NULL,NULL,NULL,NULL),
(607,'Roller Gauze 4 inch',0,NULL,NULL,NULL,NULL,NULL),
(608,'Roller Gauze 6 inch',0,NULL,NULL,NULL,NULL,NULL),
(609,'Eye Wash Solution',1,NULL,NULL,NULL,NULL,NULL),
(610,'Fleece Throw Blanket',0,NULL,NULL,NULL,NULL,NULL),
(611,'Ready Prep Change Cloth',0,NULL,NULL,NULL,NULL,NULL),
(612,'Ring Cutter',0,NULL,NULL,NULL,NULL,NULL),
(613,'Sam Splint',0,NULL,NULL,NULL,NULL,NULL),
(614,'Sharp Tube',0,NULL,NULL,NULL,NULL,NULL),
(615,'Hand Sanitizer',1,NULL,NULL,NULL,NULL,NULL),
(616,'Batteries AAA',0,NULL,NULL,NULL,NULL,NULL),
(617,'Nasal Cannula Pedi',0,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `Items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Maintenance`
--

DROP TABLE IF EXISTS `Maintenance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Maintenance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `checksheet_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` varchar(11) NOT NULL,
  `comments_id` int(11) NOT NULL,
  `ascreenshot` varchar(64) DEFAULT NULL,
  `pscreenshot` varchar(64) DEFAULT NULL,
  `dateresolved` datetime DEFAULT '0000-00-00 00:00:00',
  `pcomments_id` int(11) DEFAULT NULL,
  `resolveduser_id` varchar(11) DEFAULT NULL,
  `resolved` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Maintenance`
--

LOCK TABLES `Maintenance` WRITE;
/*!40000 ALTER TABLE `Maintenance` DISABLE KEYS */;
INSERT INTO `Maintenance` VALUES
(1,1,'2014-02-04 17:57:48','1',1,'before.png','after.png','2014-02-04 18:00:25',2,'1',1),
(2,1,'2014-02-26 17:18:05','185',4,'noimage.jpg','','0000-00-00 00:00:00',0,'',0),
(3,2,'2016-01-02 21:42:41','1',8,'noimage.jpg','','0000-00-00 00:00:00',0,'',0),
(4,2,'2016-03-28 10:25:32','1',9,'noimage.jpg','','0000-00-00 00:00:00',0,'',0);
/*!40000 ALTER TABLE `Maintenance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Series`
--

DROP TABLE IF EXISTS `Series`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Series` (
  `id` varchar(9) NOT NULL,
  `series` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Series`
--

LOCK TABLES `Series` WRITE;
/*!40000 ALTER TABLE `Series` DISABLE KEYS */;
INSERT INTO `Series` VALUES
('A-Shift','A-Shift'),
('B-Shift','B-Shift'),
('C-Shift','C-Shift');
/*!40000 ALTER TABLE `Series` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Station`
--

DROP TABLE IF EXISTS `Station`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Station` (
  `id` tinyint(2) NOT NULL,
  `Station` varchar(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Station`
--

LOCK TABLES `Station` WRITE;
/*!40000 ALTER TABLE `Station` DISABLE KEYS */;
INSERT INTO `Station` VALUES
(1,'Crew-Hall'),
(2,'Event'),
(3,'OOS'),
(4,'GARAGE'),
(0,'CH--OOS');
/*!40000 ALTER TABLE `Station` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Subcategory`
--

DROP TABLE IF EXISTS `Subcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Subcategory` (
  `subcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `subcategory_name` varchar(32) NOT NULL,
  `cols` tinyint(1) NOT NULL,
  PRIMARY KEY (`subcategory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Subcategory`
--

LOCK TABLES `Subcategory` WRITE;
/*!40000 ALTER TABLE `Subcategory` DISABLE KEYS */;
INSERT INTO `Subcategory` VALUES
(1,'-',3),
(25,'Laryngoscope',3),
(3,'Endotracheal Tubes',3),
(4,'Nasopharyngeal Airways',3),
(5,'Oropharyngeal Airways',3),
(6,'IV Caths',3),
(7,'Pulse Oximetry',3),
(8,'Zoll',2),
(9,'Glucometer',3),
(10,'Thermoscan',3),
(11,'BoardSplints',3),
(12,'Frac-Pac Splints',3),
(13,'Spare BVMs',3),
(14,'Gloves',2),
(15,'TB Masks',3),
(16,'HP',2),
(17,'CO2 Monitoring',3),
(18,'Philips',3),
(19,'Pacing',3),
(20,'Electric',3),
(21,'Lights',4),
(22,'Tires',2),
(23,'Mech_Fluid',3),
(24,'Oxygen Management',3),
(2,'Personnel',2),
(26,'Mech_Comment',1),
(27,'Closet',3),
(28,'Printer',2),
(29,'Cooler',3),
(30,'Stair Chair',3),
(31,'Cot',2),
(32,'--',2),
(33,'Syringes',2),
(34,'Water Safety',2),
(35,'AED',2),
(36,'Spare',2),
(37,'Portable Suction',2),
(38,'Fixed Suction',2),
(39,'Dressing',3),
(40,'IV',2),
(41,'MFC 8220',3),
(42,'MFC 7840W',3),
(43,'Sager Splints',2),
(44,'Garbonus',2),
(45,'Mapping',3),
(47,'Fish_Box',3),
(46,'Sphygmomanometer',3);
/*!40000 ALTER TABLE `Subcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_user`
--

DROP TABLE IF EXISTS `_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `join_date` datetime DEFAULT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `mailrec` tinyint(1) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=188 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_user`
--

LOCK TABLES `_user` WRITE;
/*!40000 ALTER TABLE `_user` DISABLE KEYS */;
INSERT INTO `_user` VALUES
(1,'Administrator','359e14d5e440ac16c309053bd0967c87d236cf87','2009-04-06 18:12:22','James','Garbe',1,0,''),
(185,'cheddar','bcef7a046258082993759bade995b3ae8bee26c7','2013-10-30 19:53:06','','',1,0,'cheddar@cheese.com'),
(183,'kilgore_trout','08570a57d71dbb872c39ca9bd14a82215a908e78','2013-10-30 15:40:08','','',2,0,'kurt@vonnegut.com'),
(182,'cheese','2e212ebba9302a65e9fd21f6772368fe60592fe8','2013-10-30 15:39:28','','',2,0,'cheesey@localhost'),
(186,'jimgarbe','359e14d5e440ac16c309053bd0967c87d236cf87','2014-02-25 15:42:19','','',2,1,'jimgarbe@gmail.com');
/*!40000 ALTER TABLE `_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distributer`
--

DROP TABLE IF EXISTS `distributer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distributer` (
  `dist_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_name` varchar(32) DEFAULT NULL,
  `dist_address` varchar(32) DEFAULT NULL,
  `dist_city` varchar(32) DEFAULT NULL,
  `dist_state` varchar(32) DEFAULT NULL,
  `zip` int(5) NOT NULL,
  PRIMARY KEY (`dist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distributer`
--

LOCK TABLES `distributer` WRITE;
/*!40000 ALTER TABLE `distributer` DISABLE KEYS */;
INSERT INTO `distributer` VALUES
(1,'','','','',0);
/*!40000 ALTER TABLE `distributer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mfr`
--

DROP TABLE IF EXISTS `mfr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mfr` (
  `mfr_id` int(11) NOT NULL AUTO_INCREMENT,
  `mfr_name` varchar(32) NOT NULL,
  `mfr_address` varchar(32) NOT NULL,
  `mfr_city` varchar(32) NOT NULL,
  `mfr_state` varchar(32) NOT NULL,
  `zip` int(5) NOT NULL,
  PRIMARY KEY (`mfr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mfr`
--

LOCK TABLES `mfr` WRITE;
/*!40000 ALTER TABLE `mfr` DISABLE KEYS */;
INSERT INTO `mfr` VALUES
(1,'','','','',0);
/*!40000 ALTER TABLE `mfr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `req_footer`
--

DROP TABLE IF EXISTS `req_footer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `req_footer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ch_id` varchar(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `req_footer`
--

LOCK TABLES `req_footer` WRITE;
/*!40000 ALTER TABLE `req_footer` DISABLE KEYS */;
/*!40000 ALTER TABLE `req_footer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `req_header`
--

DROP TABLE IF EXISTS `req_header`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `req_header` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ch_id` varchar(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `req_header`
--

LOCK TABLES `req_header` WRITE;
/*!40000 ALTER TABLE `req_header` DISABLE KEYS */;
/*!40000 ALTER TABLE `req_header` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisition`
--

DROP TABLE IF EXISTS `requisition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisition` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ch_id` varchar(32) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisition`
--

LOCK TABLES `requisition` WRITE;
/*!40000 ALTER TABLE `requisition` DISABLE KEYS */;
/*!40000 ALTER TABLE `requisition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sealedlist`
--

DROP TABLE IF EXISTS `sealedlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sealedlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ch_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `exp_date` datetime DEFAULT '0000-00-00 00:00:00',
  `hm_items` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=672 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sealedlist`
--

LOCK TABLES `sealedlist` WRITE;
/*!40000 ALTER TABLE `sealedlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `sealedlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_status`
--

DROP TABLE IF EXISTS `user_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_status`
--

LOCK TABLES `user_status` WRITE;
/*!40000 ALTER TABLE `user_status` DISABLE KEYS */;
INSERT INTO `user_status` VALUES
(1,'Administrator'),
(2,'Active'),
(3,'Deactivated');
/*!40000 ALTER TABLE `user_status` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-12  7:18:43
