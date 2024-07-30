-- MySQL dump 10.13  Distrib 5.5.35, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: inv7
-- ------------------------------------------------------
-- Server version	5.5.35-0+wheezy1

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
-- Table structure for table `CallSign`
--

DROP TABLE IF EXISTS `CallSign`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CallSign` (
  `id` int(11) NOT NULL,
  `callsign` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CallSign`
--

LOCK TABLES `CallSign` WRITE;
/*!40000 ALTER TABLE `CallSign` DISABLE KEYS */;
INSERT INTO `CallSign` VALUES (1,'Med-1'),(2,'Med-2'),(3,'Med-3'),(4,'Med-4'),(5,'Med-5'),(6,'Med-6'),(7,'Med-7'),(8,'Med-8'),(9,'Med-9'),(10,'Med-10'),(11,'Med-11'),(12,'Med-12'),(13,'Med-13'),(14,'Med-14'),(15,'Med-15'),(16,'Med-16'),(20,'Med-20'),(22,'Med-22'),(24,'Med-24'),(90,'Backup1'),(91,'Backup2'),(99,'OOS');
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
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Category`
--

LOCK TABLES `Category` WRITE;
/*!40000 ALTER TABLE `Category` DISABLE KEYS */;
INSERT INTO `Category` VALUES (1,'Personnel'),(28,'Drug_Box'),(3,'Truck'),(4,'Monitor_Supplies'),(5,'IV'),(6,'Misc_Equip'),(7,'Immob-Splints'),(8,'Oxygen'),(9,'Pedi_Box'),(10,'Personal_Safety'),(11,'Controlled_Meds'),(12,'Station_eq'),(13,'Suction'),(14,'Trauma'),(15,'Trauma_Box'),(16,'Comments'),(17,'Portable_O2'),(18,'Glucometer'),(19,'Gloves'),(20,'Truck_Fluid'),(21,'LSB_Supplies'),(22,'Ventilator'),(23,'CPAP'),(24,'Portable_Suction'),(25,'Clipboard'),(26,'Page_Builder'),(29,'Pt_Transport_Devic'),(30,'Toughbook'),(27,'Airway_Box'),(31,'BLS O2 Management'),(32,'BLS_IV_Management'),(33,'BLS_Trauma'),(34,'BLS_Drugs'),(35,'OB_Kits'),(36,'Philips'),(37,'EZ_IO'),(38,'ETT_Pack'),(39,'Zoll');
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
  `merged` tinyint(11) DEFAULT NULL,
  `sealable` tinyint(1) DEFAULT NULL,
  `sealed` varchar(20) DEFAULT NULL,
  `Signature` int(11) DEFAULT NULL,
  `qset` int(11) DEFAULT NULL,
  `published` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Checksheets`
--

LOCK TABLES `Checksheets` WRITE;
/*!40000 ALTER TABLE `Checksheets` DISABLE KEYS */;
INSERT INTO `Checksheets` VALUES (24,'Truck24',NULL,0,NULL,NULL,NULL,1),(24001,'Truck24_Airway',24,0,NULL,NULL,NULL,1),(24004,'Truck24_Drugs',24,0,NULL,NULL,NULL,1),(24006,'Truck24_Misc_Equipment',24,0,NULL,NULL,NULL,1),(24011,'Truck24_O2',24,0,NULL,NULL,NULL,1),(24002,'Truck24_IV',24,0,NULL,NULL,NULL,1),(24010,'Truck24_Immobilization',24,0,NULL,NULL,NULL,1),(24013,'Truck24_Personal_Safety',24,0,NULL,NULL,NULL,1),(24016,'Truck24_Suction',24,0,NULL,NULL,NULL,1),(24017,'Truck24_Trauma_Supplies',24,0,NULL,NULL,NULL,1),(24005,'Truck24_OB',24,1,NULL,NULL,NULL,1),(24007,'Truck24_Glucometer',24,0,NULL,NULL,NULL,1),(24009,'Truck24_Pt_Transport',24,0,NULL,NULL,NULL,1),(24014,'Truck24_Toughbook',24,0,NULL,NULL,NULL,1),(24021,'Zoll_24',24,0,NULL,NULL,NULL,1),(1,'Truck1',NULL,0,NULL,NULL,NULL,1),(1001,'Truck1_Airway_Box',1,1,NULL,NULL,NULL,1),(1004,'Truck1_Drug_Box',1,1,NULL,NULL,NULL,1),(1005,'Truck1_OB',1,1,NULL,NULL,NULL,1),(1012,'Truck1_Pedi_Box',1,1,NULL,NULL,NULL,1),(1015,'Truck1_Controlled_Medications',1,1,NULL,NULL,NULL,1),(1016,'Truck1_Suction',1,0,NULL,NULL,NULL,1),(1017,'Truck1_Trauma_Supplies',1,0,NULL,NULL,NULL,1),(1018,'Truck1_Trauma_Box',1,1,NULL,NULL,NULL,1),(1023,'Truck1_ETT_Pack',1,1,NULL,NULL,NULL,1),(1022,'Truck1_EZ_IO',1,1,NULL,NULL,NULL,1),(1014,'Truck1_Toughbook',1,0,NULL,NULL,NULL,1),(100,'Station1',0,0,NULL,NULL,NULL,1),(2001,'Truck2_Airway_Box',NULL,1,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `Checksheets` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Comment_`
--

LOCK TABLES `Comment_` WRITE;
/*!40000 ALTER TABLE `Comment_` DISABLE KEYS */;
INSERT INTO `Comment_` VALUES (1,'This is a before sample'),(2,' \r\nsample of after '),(4,'this is a test'),(5,'The Rain in Spain'),(6,'This is a test');
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `How_Many`
--

LOCK TABLES `How_Many` WRITE;
/*!40000 ALTER TABLE `How_Many` DISABLE KEYS */;
INSERT INTO `How_Many` VALUES (1,'1'),(2,'2'),(3,'3'),(4,'4'),(5,'5'),(6,'6'),(7,'7'),(8,'8'),(9,'9'),(10,'10'),(11,'11'),(12,'12'),(13,'13'),(14,'14'),(15,'15'),(16,'open'),(17,'O2'),(19,'tire'),(20,'cb'),(21,'miles'),(22,'personnel'),(23,'date'),(24,'refill'),(25,'comment'),(26,'na'),(27,'Calc');
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
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=563 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Items`
--

LOCK TABLES `Items` WRITE;
/*!40000 ALTER TABLE `Items` DISABLE KEYS */;
INSERT INTO `Items` VALUES (1,'Mileage',NULL),(2,'Service Due',NULL),(3,'Date',NULL),(4,'Series',NULL),(6,'Station',NULL),(7,'CallSign',NULL),(8,'Crew1',NULL),(9,'Crew2',NULL),(10,'BVM Adult',NULL),(11,'Esophageal Detector',NULL),(12,'Colormetric Adult',1),(13,'Laryngoscope Large',NULL),(14,'Miller Blade No.3',NULL),(15,'Macintosh Blade No.3',NULL),(16,'Miller Blade No.4',NULL),(17,'Macintosh Blade No.4',NULL),(18,'ETT Cuffed 6.0 ',1),(19,'ETT Cuffed 6.5',1),(20,'ETT Cuffed 7.0',1),(21,'ETT Cuffed 7.5',1),(22,'ETT Cuffed 8.0',1),(23,'ETT Cuffed 8.5',1),(24,'ETT Cuffed 9.0 ',1),(25,'Stylette Adult',NULL),(26,'Battery Spare -C-',NULL),(27,'Combie Tube',1),(28,'Quick Trach Kit',1),(29,'Nasopharyngeal Airway 24fr ',1),(30,'Nasopharyngeal Airway 26fr ',1),(31,'Nasopharyngeal Airway 28fr ',1),(32,'Nasopharyngeal Airway 30fr ',1),(33,'Nasopharyngeal Airway 32fr ',1),(34,'Oropharyngeal Airway 70mm',NULL),(35,'Oropharyngeal Airway 80mm',NULL),(36,'Oropharyngeal Airway 90mm',NULL),(37,'Oropharyngeal Airway 100mm ',NULL),(38,'Oropharyngeal Airway 110mm ',NULL),(39,'Magill Forceps Large',NULL),(41,'Syringe 10cc ',NULL),(42,'Tape Roll 1inch ',NULL),(43,'Tube Tamer',NULL),(44,'IV Angiocath 14g',1),(45,'IV Angiocath 16g',1),(46,'IV Angiocath 18g ',1),(47,'IV Angiocath 20g ',1),(48,'IV Angiocath 22g ',1),(49,'IV Angiocath 24g ',1),(50,'NG Tube',1),(51,'Ammonia Inhalants',NULL),(52,'Epinephrine 1-10000',1),(53,'Atropine 1mg/10ml',1),(54,'Atropine 1mg/1ml',1),(55,'Lidocaine 100mg',1),(56,'Nitro Tabs',1),(57,'Nitro Spray',1),(58,'Nitro Ointment 1% ',1),(59,'ASA Bottle of Baby',1),(60,'Adenocard 6mg',1),(61,'Albuterol',1),(62,'Amiodorone',1),(63,'Benadryl',1),(64,'Epinephrine 1-1000',1),(65,'Needles Subcutaneous',NULL),(66,'Lasix',1),(67,'Magnesium Sulfate 1g ',1),(68,'Magnesium Sulfate 5g',1),(69,'Narcan 2mg ',1),(70,'Phenergan',1),(71,'Decadron',1),(72,'Solu-Medrol',1),(73,'Glucagon',1),(74,'Vasopressin',1),(81,'Syringe 1cc ',NULL),(82,'Syringe 3cc ',NULL),(84,'Needles 18g ',NULL),(85,'Alcohol Swabs',NULL),(86,'Bandaids',NULL),(87,'Vacutainers Speckled Red',1),(88,'Vacutainers Green',1),(89,'Vacutainers Purple',1),(90,'Vacutainers Blue',1),(91,'Lancets',NULL),(92,'D-50',1),(93,'Sodium Bicarb',1),(94,'Dopamine Mix',1),(95,'Lidocaine Mix',1),(96,'Normal Saline Bag ',1),(97,'D-25',1),(98,'IV Line Macro ',NULL),(99,'IV Line Micro',NULL),(100,'IV Start Kit',NULL),(101,'IV Extension',NULL),(102,'Dial-a-flow Extension',NULL),(103,'Nasal Injector',NULL),(104,'Heat and AC',NULL),(105,'PA-Radio Amplifier',NULL),(106,'Siren',NULL),(107,'Horn',NULL),(108,'800Mhz Radio',NULL),(109,'VHF Radio',NULL),(110,'LR Bag',1),(556,'GPS Stand',0),(341,'Truck Maintenance Comment',NULL),(333,'Antifreeze',NULL),(115,'Buretrol Sets',NULL),(116,'Blood Infusion Tubing',NULL),(117,'IV Arm Boards',NULL),(118,'Pressure Infuser',NULL),(554,'GPS',0),(555,'Map Book',0),(558,'Syringe 10cc Slip-Tip',0),(557,'GPS Charger',0),(127,'Saline Flush',1),(128,'IO Sternal Kit',1),(129,'Tourniquettes',NULL),(130,'Brake Lights',NULL),(131,'Turn Signals',NULL),(132,'Backup Lights',NULL),(133,'Backup Alarm',NULL),(134,'Clearance Lights',NULL),(135,'Spot Light',NULL),(136,'Emergency Light',NULL),(137,'Compartment Lights',NULL),(138,'Head Lights',NULL),(139,'Tail Lights',NULL),(140,'Shoreline',NULL),(141,'Inverter',NULL),(142,'Emesis Basins',NULL),(143,'Body Bags',NULL),(144,'Bed Pan',NULL),(145,'Urinal',NULL),(146,'Sphygmomanometer',NULL),(147,'Stethoscope',NULL),(148,'System 5',NULL),(149,'Trauma Shears',NULL),(150,'Sheets',NULL),(151,'Towels',NULL),(152,'Blankets',NULL),(153,'Pillow',1),(154,'Gloves Sterile',NULL),(155,'Blankets/Caps',NULL),(156,'Kleenex Box',NULL),(157,'Paper Towels',NULL),(158,'Toilet Paper Roll',NULL),(159,'Glucometer',NULL),(160,'Glucometer Strips',1),(541,'Memory SD Card Adapter',0),(540,'Memory Card Reader',0),(164,'2X2s',NULL),(165,'Thermoscan',NULL),(166,'Thermoscan Shields',NULL),(167,'Stair-Chair',NULL),(168,'LSB',NULL),(169,'LSB Straps',NULL),(170,'CIDs',NULL),(171,'Scoop Stretcher',NULL),(172,'XP-1',NULL),(173,'Pediatric Board',NULL),(174,'Sager',NULL),(175,'Fire Extinguisher',NULL),(176,'Flashlight',NULL),(177,'Reflective Triangles',NULL),(178,'Booster Cables',NULL),(179,'Tow Strap',NULL),(180,'Haligan Tool',NULL),(181,'C-Collar Adult Adjustable',NULL),(184,'C-Collar Pediatric Adjustable',NULL),(186,'Board Splint Long',NULL),(187,'Board Splint Medium',NULL),(188,'Board Splint Short',NULL),(189,'Frac-Pac Sling',NULL),(190,'Frac-Pac Long Bone',NULL),(191,'Frac-Pac Large Long Bone',NULL),(192,'Frac-Pac Splint Long Leg',NULL),(193,'Frac-Pac Ankle Splint',NULL),(194,'Vehicle O2',NULL),(195,'Portable O2',NULL),(196,'Ventilator O2',NULL),(197,'Ventilator Circuits',NULL),(198,'CPAP O2',NULL),(199,'CPAP Circuits',NULL),(200,'D-Bottle O2 Spare',NULL),(201,'BVM Adult Spare',NULL),(202,'BVM Spare Pediatric',NULL),(203,'BVM Neonatal Spare',NULL),(204,'Non-Rebreathers',NULL),(205,'Nasal Cannulas',NULL),(206,'O2 Supply Tubing',NULL),(207,'Nebulizers',NULL),(208,'Nebulizer Mask',NULL),(209,'NRB Pediatric',NULL),(210,'Infant Medium Concentration Mask',NULL),(211,'Nebulizer Mask Pediatric',NULL),(212,'Pediatric Tape',NULL),(213,'IO Needle 15g ',1),(214,'IO Needle 18g ',1),(215,'Syringes 60cc',NULL),(218,'Laryngoscope Small',NULL),(219,'Macintosh Blade No.1',NULL),(220,'Macintosh Blade No.2',NULL),(221,'Miller Blade No.0',NULL),(222,'Miller Blade No.1',NULL),(223,'Miller Blade No.2',NULL),(224,'Battery Spare AA',NULL),(225,'Meconium Adapter',NULL),(226,'Magill Forceps',NULL),(227,'Stethoscope Pediatric',NULL),(228,'BVM Infant',NULL),(229,'BVM Pediatric',NULL),(230,'ETT Uncuffed 2.0mm ',1),(231,'ETT Uncuffed 2.5mm ',1),(232,'ETT Uncuffed 3.0mm ',1),(233,'ETT Uncuffed 3.5mm ',1),(234,'ETT Uncuffed 4.0mm ',1),(235,'ETT Uncuffed 4.5mm',1),(236,'ETT Uncuffed 5.0mm',1),(237,'ETT Uncuffed 5.5mm',1),(238,'ETT Uncuffed 6.0mm',1),(239,'Shielded Masks',NULL),(240,'Toughbook',NULL),(241,'Gloves Small Latex Free',NULL),(242,'Toughbook Truck Charger',NULL),(243,'Gloves Medium Latex Free',NULL),(244,'HP470 Printer',NULL),(245,'Gloves Large Latex Free',NULL),(246,'Printer Paper',NULL),(247,'Gloves Extra-Large Latex Free',NULL),(248,'Disposable Gowns',NULL),(249,'Shoe Covers',NULL),(250,'Hand Cleaner',NULL),(251,'Decon Spray',NULL),(252,'PFD',NULL),(253,'Throw Rope',NULL),(254,'Anti-Dote Kit',1),(255,'Sharps Box',NULL),(256,'Haz-Mat Book',NULL),(257,'Rain Parkas',NULL),(258,'TB Masks Large',NULL),(259,'TB Masks Medium',NULL),(260,'Morphine',1),(261,'Nimbex',1),(262,'Valium',1),(263,'Versed',1),(334,'Power Steering Fluid',NULL),(265,'Ativan',1),(266,'Succinycholine',1),(267,'Ice Pack Refresh',NULL),(268,'Trash Bags Large',NULL),(269,'Trash Bags Small',NULL),(270,'Lysol',NULL),(271,'Bleach',NULL),(272,'Detegent',NULL),(273,'Truck Soap',NULL),(274,'Tire Shine',NULL),(275,'Yaunkers',NULL),(276,'Suction Catheter 6fr',NULL),(277,'Suction Catheter 8fr',NULL),(278,'Suction Catheter 10fr ',NULL),(279,'Suction Catheter 14fr ',NULL),(280,'Suction Catheter 16fr ',NULL),(281,'Suction Catheter 18fr ',NULL),(283,'Tire Tread',NULL),(284,'Driver Side Front Tire PSI',NULL),(285,'Tire Passenger Side Front PSI',NULL),(286,'Tire Rear Driver Side Inside PSI',NULL),(287,'Tire Rear Driver Side Outside PS',NULL),(288,'Tire Rear Passenger Side Inside ',NULL),(289,'Tire Rear Passenger Side Outside',NULL),(290,'4X4s Box',1),(291,'Tape 1inch Box',NULL),(292,'Tape 3inch Box',NULL),(293,'2X2s Box',NULL),(294,'Burn Sheets',NULL),(295,'Dressing 10X30 ',NULL),(296,'Alcohol Prep Pads Box',NULL),(297,'Petrolatum Gauze',NULL),(298,'Roller Gauze 3 inch ',NULL),(299,'Roller Gauze 6 inch',NULL),(300,'Dressing 8X10',NULL),(301,'Cravats',NULL),(303,'Hot Packs',NULL),(304,'Cold Packs',NULL),(542,'Memory SD Card',0),(306,'Tape  Roll 3inch ',NULL),(307,'Hemostats',NULL),(308,'Pen Light',NULL),(539,'Philips Memory Card',0),(310,'Gloves Exam',NULL),(538,'Battery 9V',0),(315,'4X4s',1),(537,'Rosetta Cable',0),(536,'Rosetta',0),(535,'Syringes_5cc',0),(534,'Toilet Brush',0),(553,'Philips SD Card',0),(552,'Philips SD Card Adapter',0),(551,'Philips ETCO2 Nasal Cannula',0),(550,'Rosetta Cable R2R',0),(549,'Philips 3-lead Cables',0),(548,'Philips Operational Check',0),(547,'Sager Pedi-Elastic Cravat',0),(546,'Sager Elastic Cravat',0),(545,'Sager Pediatric',0),(544,'Battery CR2032',0),(543,'Memory Card',0),(377,'Zoll Monitor Battery',NULL),(379,'Defib Jel',NULL),(380,'Zoll ECG Paper',NULL),(381,'Zoll Adult Pulse Ox Probe',NULL),(382,'Zoll Pedi Pulse Ox Probe',NULL),(383,'Zoll Thigh NIBP Cuff',NULL),(384,'Zoll Adult NIBP Cuff',NULL),(385,'Zoll Small NIBP Cuff',NULL),(386,'Zoll ETCO2 Cable',NULL),(387,'Zoll ETCO2 Adapter',NULL),(388,'Zoll Neonate ETCO2 Adapter',NULL),(389,'Zoll 12-lead Cables',NULL),(390,'Electrodes Adult',NULL),(391,'Electrodes Pediatric',1),(392,'Electrodes Spare Pack',NULL),(393,'Zoll Adult Pacing Pads',1),(331,'Oil Level',NULL),(395,'HP Monitor Battery',NULL),(396,'HP Roll Paper',NULL),(397,'HP Adult Pulse Ox Probe',NULL),(398,'HP Pedi Pulse Ox Probe',NULL),(399,'HP Adult Pacing Pads',NULL),(400,'HP Pedi Pacing Pads',NULL),(401,'Philips Monitor Battery',NULL),(402,'Philips Roll Paper',NULL),(403,'Philips Pulse Ox Probe',NULL),(404,'Philips Pedi Pulse Ox Probe',NULL),(405,'Philips Thigh NIBP Cuff',NULL),(406,'Philips Adult NIBP Cuff',NULL),(407,'Philips Small NIBP Cuff',NULL),(335,'Brake Fluid',NULL),(409,'Philips ETCO2 Adapter',NULL),(410,'Philips 12-lead Cables',NULL),(411,'Philips Adult Pacing Pads',1),(412,'Philips Pedi Pacing Pads',1),(416,'Cheat Sheets',NULL),(415,'Shop Vac',NULL),(417,'Personnel_1',NULL),(418,'Personnel_2',NULL),(419,'Colormetric Pedi',1),(420,'Etomidate',1),(421,'HP470 Printer Power Adapter',NULL),(422,'HP470 Printer USB Adapter',NULL),(423,'Stair Chair Straps',NULL),(424,'Cot',NULL),(425,'Cot Straps',NULL),(426,'4-Point Harness',NULL),(427,'Head Storage Net',NULL),(428,'Scalpel',NULL),(429,'Reflective Vests',NULL),(430,'Fixed Suction w/gauge',NULL),(431,'Portable Suction w/gauge',NULL),(432,'Fixed Suction Collection Can',NULL),(433,'Portable Suction Collection Can',NULL),(434,'Fixed Suction Tubing',NULL),(435,'Portable Suction Tubing',NULL),(516,'MFC 8220 Printer Cartridge',0),(515,'MFC 8220 Printer',0),(527,'D5W',1),(526,'Heat Pump Air Filters',0),(525,'Light Bulbs',0),(524,'Dish Soap',0),(523,'ETT Cuffed 9.5',0),(522,'Wool blanket',0),(521,'Battery 9v',0),(520,'MFC 7840 Drum',0),(519,'MFC 7840W Toner',0),(514,'Comment',0),(513,'IO EZ Stabilizer',1),(512,'IO EZ 45mm x 15g',1),(511,'IO EZ 25mm x 15g',1),(533,'409 Cleaner',0),(532,'Cleanser',0),(531,'Bacteriostatic Water',1),(518,'Shop Vac Filter',0),(517,'MFC 8220 Printer Drum',0),(510,'IO EZ 15mm x 15g',1),(509,'IO EZ Drill',0),(470,'HP470 B/W Printer Cartridge',NULL),(471,'Tourniquettes Latex Free',NULL),(508,'Zofran 4mg',1),(474,'Cord Clamps',NULL),(475,'Placenta Bag and Tie',NULL),(332,'Transmission Fluid',NULL),(477,'Gauze Dressing',NULL),(478,'Bulb Syringe',NULL),(336,'Windshield Washing Fluid',NULL),(481,'Underpad (Chucks)',NULL),(337,'Fuel',NULL),(484,'Lube Jelly',NULL),(530,'Atropine 0.4mg',1),(529,'INT Caps',0),(528,'Tegaderms',1),(488,'Disposable Razor',NULL),(507,'Stylette Pedi',0),(490,'Zoll Pedi Pacing Pads',1),(491,'Zoll AED',NULL),(492,'A/C Cable',NULL),(493,'Zoll Paper Spare Roll',NULL),(495,'Ride Along',NULL),(559,'Suction Tubing Spare',0),(560,'Convenience Bag',0),(561,'Mileage Calculation',0),(562,'Irrigation Solution 500cc',1);
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Maintenance`
--

LOCK TABLES `Maintenance` WRITE;
/*!40000 ALTER TABLE `Maintenance` DISABLE KEYS */;
INSERT INTO `Maintenance` VALUES (1,1,'2014-02-04 17:57:48','1',1,'before.png','after.png','2014-02-04 18:00:25',2,'1',1),(2,1,'2014-02-26 17:18:05','185',4,'noimage.jpg','','0000-00-00 00:00:00',0,'',0);
/*!40000 ALTER TABLE `Maintenance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Philips_Monitor_1`
--

DROP TABLE IF EXISTS `Philips_Monitor_1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Philips_Monitor_1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Philips_Monitor_1`
--

LOCK TABLES `Philips_Monitor_1` WRITE;
/*!40000 ALTER TABLE `Philips_Monitor_1` DISABLE KEYS */;
INSERT INTO `Philips_Monitor_1` VALUES (1,401,36,1,2,0,'2012-03-12 16:47:20'),(2,402,36,1,3,0,'2012-03-12 16:47:20'),(3,403,36,1,20,0,'2012-03-12 16:47:20'),(4,404,36,1,20,0,'2012-03-12 16:47:20'),(5,405,36,1,20,0,'2012-03-12 16:47:20'),(6,406,36,1,20,0,'2012-03-12 16:47:20'),(7,407,36,1,20,0,'2012-03-12 16:47:20'),(8,409,36,1,2,0,'2012-03-12 16:47:20'),(9,410,36,1,20,0,'2012-03-12 16:47:20'),(10,411,36,1,2,0,'2012-03-12 16:47:20'),(11,412,36,1,2,0,'2012-03-12 16:47:20');
/*!40000 ALTER TABLE `Philips_Monitor_1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Philips_Monitor_1_checksheet`
--

DROP TABLE IF EXISTS `Philips_Monitor_1_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Philips_Monitor_1_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Philips_Monitor_1_checksheet`
--

LOCK TABLES `Philips_Monitor_1_checksheet` WRITE;
/*!40000 ALTER TABLE `Philips_Monitor_1_checksheet` DISABLE KEYS */;
/*!40000 ALTER TABLE `Philips_Monitor_1_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Philips_Monitor_1_events`
--

DROP TABLE IF EXISTS `Philips_Monitor_1_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Philips_Monitor_1_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Philips_Monitor_1_events`
--

LOCK TABLES `Philips_Monitor_1_events` WRITE;
/*!40000 ALTER TABLE `Philips_Monitor_1_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `Philips_Monitor_1_events` ENABLE KEYS */;
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Series`
--

LOCK TABLES `Series` WRITE;
/*!40000 ALTER TABLE `Series` DISABLE KEYS */;
INSERT INTO `Series` VALUES ('A-Shift','A-Shift'),('B-Shift','B-Shift'),('C-Shift','C-Shift');
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Station`
--

LOCK TABLES `Station` WRITE;
/*!40000 ALTER TABLE `Station` DISABLE KEYS */;
INSERT INTO `Station` VALUES (1,'Station-1'),(2,'Station-2'),(3,'Station-3'),(4,'Station-4'),(5,'Station-5'),(6,'Station-6'),(7,'Event'),(8,'OOS'),(9,'Crew Hall'),(0,'CH--OOS');
/*!40000 ALTER TABLE `Station` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Station1`
--

DROP TABLE IF EXISTS `Station1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Station1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Station1`
--

LOCK TABLES `Station1` WRITE;
/*!40000 ALTER TABLE `Station1` DISABLE KEYS */;
INSERT INTO `Station1` VALUES (1,268,12,1,20,0,'0000-00-00 00:00:00'),(2,269,12,1,20,0,'0000-00-00 00:00:00'),(3,270,12,1,20,0,'0000-00-00 00:00:00'),(4,271,12,1,20,0,'0000-00-00 00:00:00'),(5,272,12,1,20,0,'0000-00-00 00:00:00'),(6,273,12,1,20,0,'0000-00-00 00:00:00'),(7,274,12,1,20,0,'0000-00-00 00:00:00'),(8,415,12,27,20,0,'0000-00-00 00:00:00'),(9,514,16,1,25,0,'0000-00-00 00:00:00'),(10,158,12,27,20,0,'0000-00-00 00:00:00'),(11,515,12,41,20,0,'0000-00-00 00:00:00'),(12,516,12,41,20,0,'0000-00-00 00:00:00'),(13,517,12,41,20,0,'0000-00-00 00:00:00'),(14,246,12,41,20,0,'0000-00-00 00:00:00'),(15,518,12,27,20,0,'0000-00-00 00:00:00'),(16,524,12,1,20,0,'0000-00-00 00:00:00'),(17,525,12,1,20,0,'0000-00-00 00:00:00'),(18,525,12,1,20,0,'0000-00-00 00:00:00'),(19,532,12,1,20,0,'0000-00-00 00:00:00'),(20,533,12,1,20,0,'0000-00-00 00:00:00'),(21,534,12,1,20,0,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `Station1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Station1_checksheet`
--

DROP TABLE IF EXISTS `Station1_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Station1_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Station1_checksheet`
--

LOCK TABLES `Station1_checksheet` WRITE;
/*!40000 ALTER TABLE `Station1_checksheet` DISABLE KEYS */;
INSERT INTO `Station1_checksheet` VALUES (1,1,268,'1','cb',12,1),(2,1,269,'1','cb',12,1),(3,1,270,'1','cb',12,1),(4,1,271,'1','cb',12,1),(5,1,272,'1','cb',12,1),(6,1,273,'1','cb',12,1),(7,1,274,'1','cb',12,1),(8,1,524,'1','cb',12,1),(9,1,525,'1','cb',12,1),(10,1,532,'1','cb',12,1),(11,1,533,'1','cb',12,1),(12,1,534,'1','cb',12,1),(13,1,415,'1','cb',12,27),(14,1,158,'1','cb',12,27),(15,1,518,'1','cb',12,27),(16,1,515,'1','cb',12,41),(17,1,516,'1','cb',12,41),(18,1,517,'1','cb',12,41),(19,1,246,'1','cb',12,41),(20,1,514,'','comment',16,1);
/*!40000 ALTER TABLE `Station1_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Station1_events`
--

DROP TABLE IF EXISTS `Station1_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Station1_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Station1_events`
--

LOCK TABLES `Station1_events` WRITE;
/*!40000 ALTER TABLE `Station1_events` DISABLE KEYS */;
INSERT INTO `Station1_events` VALUES (1,'2014-03-18 23:46:40',NULL,0,0);
/*!40000 ALTER TABLE `Station1_events` ENABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Subcategory`
--

LOCK TABLES `Subcategory` WRITE;
/*!40000 ALTER TABLE `Subcategory` DISABLE KEYS */;
INSERT INTO `Subcategory` VALUES (1,'-',3),(25,'Laryngoscope',3),(3,'Endotracheal Tubes',3),(4,'Nasopharyngeal Airways',3),(5,'Oropharyngeal Airways',3),(6,'IV Caths',3),(7,'Pulse Oximetry',3),(8,'Zoll',2),(9,'Glucometer',3),(10,'Thermoscan',3),(11,'BoardSplints',3),(12,'Frac-Pac Splints',3),(13,'Spare BVMs',3),(14,'Gloves',2),(15,'TB Masks',3),(16,'HP',2),(17,'CO2 Monitoring',3),(18,'Philips',3),(19,'Pacing',3),(20,'Electric',3),(21,'Lights',4),(22,'Tires',2),(23,'Mech_Fluid',3),(24,'Oxygen Management',3),(2,'Personnel',2),(26,'Mech_Comment',1),(27,'Closet',3),(28,'Printer',2),(29,'Cooler',3),(30,'Stair Chair',3),(31,'Cot',2),(32,'--',2),(33,'Syringes',2),(34,'Water Safety',2),(35,'AED',2),(36,'Spare',2),(37,'Portable Suction',2),(38,'Fixed Suction',2),(39,'Dressing',3),(40,'IV',2),(41,'MFC 8220',3),(42,'MFC 7840W',3),(43,'Sager Splints',2),(44,'Garbonus',2),(45,'Mapping',3);
/*!40000 ALTER TABLE `Subcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1`
--

DROP TABLE IF EXISTS `Truck1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=178 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1`
--

LOCK TABLES `Truck1` WRITE;
/*!40000 ALTER TABLE `Truck1` DISABLE KEYS */;
INSERT INTO `Truck1` VALUES (1,1,3,1,21,1,'2013-08-23 21:33:10'),(2,2,3,1,21,1,'2013-08-23 21:33:10'),(4,3,3,1,23,1,'2012-03-12 16:47:27'),(5,4,3,1,24,1,'2012-03-12 16:47:27'),(6,6,3,1,24,1,'2012-03-12 16:47:27'),(7,7,3,1,24,1,'2012-03-12 16:47:27'),(8,175,3,1,2,0,'2012-03-12 16:47:27'),(9,176,3,1,2,0,'2012-03-12 16:47:27'),(10,177,3,1,3,0,'2012-03-12 16:47:27'),(11,178,3,1,20,0,'2012-03-12 16:47:27'),(12,179,3,1,20,0,'2012-03-12 16:47:27'),(13,180,3,1,20,0,'2012-03-12 16:47:27'),(14,8,3,2,22,1,'2012-03-12 16:47:27'),(15,9,3,2,22,1,'2012-03-12 16:47:27'),(16,495,3,2,16,0,'2012-03-12 16:47:27'),(17,104,3,20,20,0,'2012-03-12 16:47:27'),(18,105,3,20,20,0,'2012-03-12 16:47:27'),(19,106,3,20,20,0,'2012-03-12 16:47:27'),(20,107,3,20,20,0,'2012-03-12 16:47:27'),(21,108,3,20,20,0,'2012-03-12 16:47:27'),(22,109,3,20,20,0,'2012-03-12 16:47:27'),(23,130,3,21,20,0,'2012-03-12 16:47:27'),(24,131,3,21,20,0,'2012-03-12 16:47:27'),(25,132,3,21,20,0,'2012-03-12 16:47:27'),(26,133,3,21,20,0,'2012-03-12 16:47:27'),(27,134,3,21,20,0,'2012-03-12 16:47:27'),(28,135,3,21,20,0,'2012-03-12 16:47:27'),(29,136,3,21,20,0,'2012-03-12 16:47:27'),(30,137,3,21,20,0,'2012-03-12 16:47:27'),(31,138,3,21,20,0,'2012-03-12 16:47:27'),(32,139,3,21,20,0,'2012-03-12 16:47:27'),(33,140,3,21,20,0,'2012-03-12 16:47:27'),(34,141,3,21,20,0,'2012-03-12 16:47:27'),(35,283,3,22,19,0,'2012-03-12 16:47:27'),(36,284,3,22,16,0,'2012-03-12 16:47:27'),(37,285,3,22,16,0,'2012-03-12 16:47:27'),(38,286,3,22,16,0,'2012-03-12 16:47:27'),(39,287,3,22,16,0,'2012-03-12 16:47:27'),(40,288,3,22,16,0,'2012-03-12 16:47:27'),(41,289,3,22,16,0,'2012-03-12 16:47:27'),(42,331,3,23,20,0,'2012-03-12 16:47:27'),(43,332,3,23,20,0,'2012-03-12 16:47:27'),(44,333,3,23,20,0,'2012-03-12 16:47:27'),(45,334,3,23,20,0,'2012-03-12 16:47:27'),(46,335,3,23,20,0,'2012-03-12 16:47:27'),(47,336,3,23,20,0,'2012-03-12 16:47:27'),(48,337,3,23,20,0,'2012-03-12 16:47:27'),(50,391,4,1,10,0,'2012-03-18 00:42:48'),(51,488,4,1,2,0,'2012-03-18 00:43:30'),(54,390,4,1,10,0,'2012-03-18 00:45:59'),(53,392,4,1,2,0,'2012-03-18 00:45:08'),(55,379,4,1,20,0,'2012-03-18 00:46:52'),(56,548,36,1,20,0,'2012-03-18 00:58:09'),(57,401,36,1,2,0,'2012-03-18 00:58:59'),(58,402,36,1,3,0,'2012-03-18 00:59:43'),(68,403,36,7,20,0,'2012-03-18 01:07:49'),(65,549,36,1,20,0,'2012-03-18 01:04:52'),(61,405,36,1,20,0,'2012-03-18 01:01:33'),(62,406,36,1,20,0,'2012-03-18 01:02:06'),(63,407,36,1,20,0,'2012-03-18 01:02:39'),(64,410,36,1,20,0,'2012-03-18 01:04:18'),(70,409,36,17,2,0,'2012-03-18 01:10:27'),(69,404,36,7,20,0,'2012-03-18 01:08:29'),(71,411,36,19,2,0,'2012-03-18 01:11:56'),(72,412,36,19,2,0,'2012-03-18 01:13:07'),(73,536,36,32,20,0,'2012-03-18 01:14:57'),(74,537,36,32,20,0,'2012-03-18 01:15:38'),(75,521,36,32,20,0,'2012-03-18 01:16:50'),(76,551,36,17,2,0,'2012-03-18 01:19:59'),(77,550,36,32,20,0,'2012-03-18 01:19:59'),(78,553,36,44,20,0,'2012-03-18 01:27:20'),(79,552,36,44,20,0,'2012-03-18 01:28:26'),(80,248,10,1,4,0,'2012-04-04 17:56:19'),(81,249,10,1,4,0,'2012-04-04 17:57:04'),(82,250,10,1,20,0,'2012-04-04 17:58:05'),(83,251,10,1,20,0,'2012-04-04 17:58:44'),(84,254,10,1,2,0,'2012-04-04 17:59:36'),(85,255,10,1,20,0,'2012-04-04 18:00:34'),(86,256,10,1,20,0,'2012-04-04 18:01:30'),(87,257,10,1,2,0,'2012-04-04 18:02:19'),(88,239,10,1,4,0,'2012-04-04 18:03:36'),(89,429,10,1,2,0,'2012-04-04 18:04:13'),(90,258,10,15,2,0,'2012-04-04 18:05:49'),(91,259,10,15,2,0,'2012-04-04 18:06:13'),(92,241,10,14,2,0,'2012-04-04 18:07:59'),(93,243,10,14,2,0,'2012-04-04 18:08:51'),(94,245,10,14,2,0,'2012-04-04 18:09:42'),(95,247,10,14,2,0,'2012-04-04 18:10:14'),(96,253,10,34,20,0,'2012-04-04 18:12:11'),(97,252,10,34,2,0,'2012-04-04 18:13:00'),(98,142,6,1,6,0,'2012-04-04 18:17:43'),(99,143,6,1,2,0,'2012-04-04 18:18:09'),(100,144,6,1,20,0,'2012-04-04 18:18:41'),(101,145,6,1,20,0,'2012-04-04 18:19:09'),(104,147,6,1,20,0,'2012-04-04 18:21:13'),(103,146,6,1,20,0,'2012-04-04 18:20:43'),(105,148,6,1,20,0,'2012-04-04 18:21:42'),(106,149,6,1,20,0,'2012-04-04 18:22:18'),(107,156,6,1,20,0,'2012-04-04 18:23:17'),(108,150,6,1,8,0,'2012-04-04 18:24:00'),(109,152,6,1,2,0,'2012-04-04 18:24:34'),(110,151,6,1,4,0,'2012-04-04 18:25:04'),(111,153,6,1,20,0,'2012-04-04 18:26:03'),(112,157,6,1,20,0,'2012-04-04 18:26:35'),(113,158,6,1,20,0,'2012-04-04 18:27:16'),(114,165,6,10,20,0,'2012-04-04 18:28:01'),(115,166,6,10,20,0,'2012-04-04 18:28:33'),(116,424,6,31,20,0,'2012-04-04 18:30:31'),(117,425,6,31,2,0,'2012-04-04 18:31:13'),(118,426,6,31,20,0,'2012-04-04 18:32:56'),(119,427,6,31,20,0,'2012-04-04 18:33:32'),(120,167,6,30,20,0,'2012-04-04 18:34:35'),(121,423,6,30,2,0,'2012-04-04 18:35:01'),(122,555,3,45,20,0,'2012-04-04 18:45:57'),(123,554,3,45,20,0,'2012-04-04 18:48:26'),(124,557,3,45,20,0,'2012-04-04 18:49:15'),(125,556,3,45,20,0,'2012-04-04 18:50:00'),(126,194,8,1,17,1,'2012-04-04 18:53:44'),(127,195,8,1,17,1,'2012-04-04 18:54:16'),(128,196,8,1,17,1,'2012-04-04 18:55:38'),(129,198,8,1,17,1,'2012-04-04 18:56:17'),(130,200,8,1,20,0,'2012-04-04 18:56:55'),(175,197,8,1,26,0,'2012-06-28 09:42:30'),(132,199,8,1,2,0,'2012-04-04 18:58:29'),(134,205,8,24,10,0,'2012-04-04 19:01:03'),(135,204,8,24,10,0,'2012-04-04 19:01:36'),(136,206,8,24,4,0,'2012-04-04 19:02:28'),(137,207,8,24,5,0,'2012-04-04 19:03:06'),(138,208,8,24,5,0,'2012-04-04 19:03:42'),(139,209,8,24,4,0,'2012-04-04 19:04:15'),(140,210,8,24,4,0,'2012-04-04 19:04:50'),(141,211,8,24,4,0,'2012-04-04 19:05:19'),(142,201,8,13,20,0,'2012-04-04 19:06:22'),(143,202,8,13,20,0,'2012-04-04 19:06:52'),(144,203,8,13,20,0,'2012-04-04 19:07:33'),(145,96,5,1,6,0,'2012-04-04 19:10:52'),(148,98,5,1,10,0,'2012-04-04 19:12:44'),(149,99,5,1,10,0,'2012-04-04 19:13:16'),(150,101,5,1,10,0,'2012-04-04 19:13:44'),(151,115,5,1,2,0,'2012-04-04 19:14:06'),(152,116,5,1,2,0,'2012-04-04 19:14:40'),(153,117,5,1,2,0,'2012-04-04 19:15:20'),(154,118,5,1,20,0,'2012-04-04 19:15:47'),(155,102,5,1,20,0,'2012-04-04 19:16:16'),(156,41,5,1,10,0,'2012-04-04 19:16:47'),(157,127,5,1,10,0,'2012-04-04 19:17:09'),(158,471,5,1,10,0,'2012-04-04 19:17:34'),(159,84,5,1,10,0,'2012-04-04 19:18:17'),(160,535,5,1,5,0,'2012-04-04 19:18:58'),(161,528,5,1,10,0,'2012-04-04 19:19:34'),(162,44,5,6,10,0,'2012-04-04 19:20:23'),(163,45,5,6,10,0,'2012-04-04 19:20:46'),(164,46,5,6,10,0,'2012-04-04 19:21:12'),(165,47,5,6,10,0,'2012-04-04 19:21:35'),(166,48,5,6,10,0,'2012-04-04 19:21:56'),(167,49,5,6,10,0,'2012-04-04 19:22:17'),(168,159,6,9,20,0,'2012-04-04 19:27:09'),(169,160,6,9,20,0,'2012-04-04 19:27:54'),(170,91,6,9,20,0,'2012-04-04 19:28:36'),(171,85,6,9,4,0,'2012-04-04 19:29:33'),(172,86,6,9,4,0,'2012-04-04 19:30:19'),(173,164,6,9,3,0,'2012-04-04 19:31:24'),(174,544,6,9,20,0,'2012-04-04 19:32:14'),(176,529,5,1,10,0,'2012-07-25 19:32:58'),(3,561,3,1,27,0,'2013-08-23 21:34:09'),(177,514,16,1,25,0,'2013-08-25 18:38:59');
/*!40000 ALTER TABLE `Truck1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Airway_Box`
--

DROP TABLE IF EXISTS `Truck1_Airway_Box`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Airway_Box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Airway_Box`
--

LOCK TABLES `Truck1_Airway_Box` WRITE;
/*!40000 ALTER TABLE `Truck1_Airway_Box` DISABLE KEYS */;
INSERT INTO `Truck1_Airway_Box` VALUES (1,11,27,1,20,0,'2012-03-12 16:47:27'),(2,50,27,1,20,0,'2012-03-12 16:47:27'),(3,51,27,1,5,0,'2012-03-12 16:47:27'),(64,484,27,1,4,0,'2012-04-22 16:07:20'),(59,41,27,1,4,0,'2012-04-22 16:02:13'),(7,42,27,1,2,0,'2012-03-12 16:47:27'),(47,428,27,1,20,0,'2012-03-12 16:47:27'),(10,27,27,1,20,0,'2012-03-12 16:47:27'),(11,10,27,1,20,0,'2012-03-12 16:47:27'),(46,28,27,1,20,0,'2012-03-12 16:47:27'),(28,29,27,4,20,0,'2012-03-12 16:47:27'),(29,30,27,4,20,0,'2012-03-12 16:47:27'),(30,31,27,4,20,0,'2012-03-12 16:47:27'),(31,32,27,4,20,0,'2012-03-12 16:47:27'),(32,33,27,4,20,0,'2012-03-12 16:47:27'),(33,34,27,5,20,0,'2012-03-12 16:47:27'),(34,35,27,5,20,0,'2012-03-12 16:47:27'),(35,36,27,5,20,0,'2012-03-12 16:47:27'),(36,37,27,5,20,0,'2012-03-12 16:47:27'),(37,38,27,5,20,0,'2012-03-12 16:47:27'),(38,44,27,6,2,0,'2012-03-12 16:47:27'),(39,45,27,6,2,0,'2012-03-12 16:47:27'),(40,46,27,6,2,0,'2012-03-12 16:47:27'),(41,47,27,6,2,0,'2012-03-12 16:47:27'),(42,48,27,6,2,0,'2012-03-12 16:47:27'),(43,49,27,6,2,0,'2012-03-12 16:47:27'),(48,26,27,1,2,0,'2012-03-12 16:47:27'),(49,62,27,32,2,0,'2012-04-22 15:48:16'),(50,101,27,1,2,0,'2012-04-22 15:51:02'),(51,52,27,32,7,0,'2012-04-22 15:51:02'),(53,53,27,32,3,0,'2012-04-22 15:53:15'),(54,96,27,1,20,0,'2012-04-22 15:56:07'),(55,55,27,32,4,0,'2012-04-22 15:56:07'),(56,98,27,1,20,0,'2012-04-22 15:58:16'),(57,74,27,32,2,0,'2012-04-22 15:58:16'),(58,92,27,32,20,0,'2012-04-22 15:59:53'),(60,93,27,32,2,0,'2012-04-22 16:02:13'),(61,64,27,32,20,0,'2012-04-22 16:03:32'),(62,72,27,32,20,0,'2012-04-22 16:05:46'),(63,69,27,32,20,0,'2012-04-22 16:06:56');
/*!40000 ALTER TABLE `Truck1_Airway_Box` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Airway_Box_checksheet`
--

DROP TABLE IF EXISTS `Truck1_Airway_Box_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Airway_Box_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Airway_Box_checksheet`
--

LOCK TABLES `Truck1_Airway_Box_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck1_Airway_Box_checksheet` DISABLE KEYS */;
INSERT INTO `Truck1_Airway_Box_checksheet` VALUES (1,1,11,'1','cb',27,1),(2,1,50,'1','cb',27,1),(3,1,51,'5','5',27,1),(4,1,484,'4','4',27,1),(5,1,41,'4','4',27,1),(6,1,42,'2','2',27,1),(7,1,428,'1','cb',27,1),(8,1,27,'1','cb',27,1),(9,1,10,'1','cb',27,1),(10,1,28,'1','cb',27,1),(11,1,26,'2','2',27,1),(12,1,101,'2','2',27,1),(13,1,96,'1','cb',27,1),(14,1,98,'1','cb',27,1),(15,1,29,'1','cb',27,4),(16,1,30,'1','cb',27,4),(17,1,31,'1','cb',27,4),(18,1,32,'1','cb',27,4),(19,1,33,'1','cb',27,4),(20,1,34,'1','cb',27,5),(21,1,35,'1','cb',27,5),(22,1,36,'1','cb',27,5),(23,1,37,'1','cb',27,5),(24,1,38,'1','cb',27,5),(25,1,44,'2','2',27,6),(26,1,45,'2','2',27,6),(27,1,46,'2','2',27,6),(28,1,47,'2','2',27,6),(29,1,48,'2','2',27,6),(30,1,49,'2','2',27,6),(31,1,62,'2','2',27,32),(32,1,52,'7','7',27,32),(33,1,53,'3','3',27,32),(34,1,55,'4','4',27,32),(35,1,74,'2','2',27,32),(36,1,92,'1','cb',27,32),(37,1,93,'2','2',27,32),(38,1,64,'1','cb',27,32),(39,1,72,'1','cb',27,32),(40,1,69,'1','cb',27,32);
/*!40000 ALTER TABLE `Truck1_Airway_Box_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Airway_Box_events`
--

DROP TABLE IF EXISTS `Truck1_Airway_Box_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Airway_Box_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Airway_Box_events`
--

LOCK TABLES `Truck1_Airway_Box_events` WRITE;
/*!40000 ALTER TABLE `Truck1_Airway_Box_events` DISABLE KEYS */;
INSERT INTO `Truck1_Airway_Box_events` VALUES (1,'2014-03-18 18:41:09',NULL,1,1);
/*!40000 ALTER TABLE `Truck1_Airway_Box_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Controlled_Medications`
--

DROP TABLE IF EXISTS `Truck1_Controlled_Medications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Controlled_Medications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Controlled_Medications`
--

LOCK TABLES `Truck1_Controlled_Medications` WRITE;
/*!40000 ALTER TABLE `Truck1_Controlled_Medications` DISABLE KEYS */;
INSERT INTO `Truck1_Controlled_Medications` VALUES (1,260,11,1,26,1,'2012-03-12 16:47:21'),(2,262,11,1,26,1,'2012-03-12 16:47:21'),(3,263,11,1,26,1,'2012-03-12 16:47:21'),(4,420,11,1,26,1,'2012-03-12 16:47:21'),(5,103,11,1,20,0,'2012-03-12 16:47:21'),(6,265,11,29,26,1,'2012-03-12 16:47:21'),(7,266,11,29,26,1,'2012-03-12 16:47:21'),(8,261,11,29,26,1,'2012-03-12 16:47:21');
/*!40000 ALTER TABLE `Truck1_Controlled_Medications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Controlled_Medications_checksheet`
--

DROP TABLE IF EXISTS `Truck1_Controlled_Medications_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Controlled_Medications_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Controlled_Medications_checksheet`
--

LOCK TABLES `Truck1_Controlled_Medications_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck1_Controlled_Medications_checksheet` DISABLE KEYS */;
INSERT INTO `Truck1_Controlled_Medications_checksheet` VALUES (1,1,260,'2','na',11,1),(2,1,262,'2','na',11,1),(3,1,263,'2','na',11,1),(4,1,420,'2','na',11,1),(5,1,103,'1','cb',11,1),(6,1,265,'2','na',11,29),(7,1,266,'2','na',11,29),(8,1,261,'2','na',11,29);
/*!40000 ALTER TABLE `Truck1_Controlled_Medications_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Controlled_Medications_events`
--

DROP TABLE IF EXISTS `Truck1_Controlled_Medications_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Controlled_Medications_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Controlled_Medications_events`
--

LOCK TABLES `Truck1_Controlled_Medications_events` WRITE;
/*!40000 ALTER TABLE `Truck1_Controlled_Medications_events` DISABLE KEYS */;
INSERT INTO `Truck1_Controlled_Medications_events` VALUES (1,'2014-03-18 18:41:09',NULL,1,1);
/*!40000 ALTER TABLE `Truck1_Controlled_Medications_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Drug_Box`
--

DROP TABLE IF EXISTS `Truck1_Drug_Box`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Drug_Box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Drug_Box`
--

LOCK TABLES `Truck1_Drug_Box` WRITE;
/*!40000 ALTER TABLE `Truck1_Drug_Box` DISABLE KEYS */;
INSERT INTO `Truck1_Drug_Box` VALUES (1,52,28,1,10,0,'2012-03-12 16:47:27'),(2,53,28,1,4,0,'2012-03-12 16:47:27'),(3,54,28,1,2,0,'2012-03-12 16:47:27'),(4,55,28,1,4,0,'2012-03-12 16:47:27'),(5,56,28,1,20,0,'2012-03-12 16:47:27'),(6,57,28,1,20,0,'2012-03-12 16:47:27'),(7,58,28,1,20,0,'2012-03-12 16:47:27'),(69,92,28,1,1,0,'2012-04-22 15:34:50'),(9,93,28,1,2,0,'2012-03-12 16:47:27'),(10,94,28,1,20,0,'2012-03-12 16:47:27'),(11,95,28,1,20,0,'2012-03-12 16:47:27'),(12,97,28,1,20,0,'2012-03-12 16:47:27'),(14,60,28,1,6,0,'2012-03-12 16:47:27'),(15,61,28,1,4,0,'2012-03-12 16:47:27'),(16,62,28,1,2,0,'2012-03-12 16:47:27'),(17,63,28,1,2,0,'2012-03-12 16:47:27'),(19,66,28,1,5,0,'2012-03-12 16:47:27'),(20,67,28,1,1,0,'2012-03-12 16:47:27'),(21,68,28,1,2,0,'2012-03-12 16:47:27'),(22,69,28,1,20,0,'2012-03-12 16:47:27'),(25,72,28,1,20,0,'2012-03-12 16:47:27'),(26,73,28,1,1,0,'2012-03-12 16:47:27'),(67,74,28,1,6,0,'2012-04-22 15:34:06'),(66,101,28,32,2,0,'2012-04-22 15:32:42'),(37,44,28,6,2,0,'2012-03-12 16:47:27'),(38,45,28,6,2,0,'2012-03-12 16:47:27'),(39,46,28,6,2,0,'2012-03-12 16:47:27'),(40,47,28,6,2,0,'2012-03-12 16:47:27'),(41,48,28,6,2,0,'2012-03-12 16:47:27'),(42,49,28,6,2,0,'2012-03-12 16:47:27'),(43,81,28,33,2,0,'2012-03-12 16:47:27'),(44,82,28,33,2,0,'2012-03-12 16:47:27'),(45,41,28,33,2,0,'2012-03-12 16:47:27'),(46,84,28,33,5,0,'2012-03-12 16:47:27'),(47,103,28,33,20,0,'2012-03-12 16:47:27'),(48,65,28,33,2,0,'2012-03-12 16:47:27'),(49,85,28,32,10,0,'2012-03-12 16:47:27'),(50,86,28,32,10,0,'2012-03-12 16:47:27'),(51,87,28,32,2,0,'2012-03-12 16:47:27'),(52,88,28,32,2,0,'2012-03-12 16:47:27'),(53,89,28,32,2,0,'2012-03-12 16:47:27'),(54,90,28,32,2,0,'2012-03-12 16:47:27'),(55,91,28,32,10,0,'2012-03-12 16:47:27'),(56,96,28,32,20,0,'2012-03-12 16:47:27'),(57,98,28,32,20,0,'2012-03-12 16:47:27'),(58,99,28,32,20,0,'2012-03-12 16:47:27'),(65,64,28,1,2,0,'2012-04-22 15:32:42'),(60,102,28,32,1,0,'2012-03-12 16:47:27'),(61,59,28,32,20,0,'2012-03-12 16:47:27'),(63,508,28,1,2,0,'2012-03-12 16:47:27');
/*!40000 ALTER TABLE `Truck1_Drug_Box` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Drug_Box_checksheet`
--

DROP TABLE IF EXISTS `Truck1_Drug_Box_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Drug_Box_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Drug_Box_checksheet`
--

LOCK TABLES `Truck1_Drug_Box_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck1_Drug_Box_checksheet` DISABLE KEYS */;
INSERT INTO `Truck1_Drug_Box_checksheet` VALUES (1,1,52,'10','10',28,1),(2,1,53,'4','4',28,1),(3,1,54,'2','2',28,1),(4,1,55,'4','4',28,1),(5,1,56,'1','cb',28,1),(6,1,57,'1','cb',28,1),(7,1,58,'1','cb',28,1),(8,1,92,'1','1',28,1),(9,1,93,'2','2',28,1),(10,1,94,'1','cb',28,1),(11,1,95,'1','cb',28,1),(12,1,97,'1','cb',28,1),(13,1,60,'6','6',28,1),(14,1,61,'4','4',28,1),(15,1,62,'2','2',28,1),(16,1,63,'2','2',28,1),(17,1,66,'5','5',28,1),(18,1,67,'1','1',28,1),(19,1,68,'2','2',28,1),(20,1,69,'1','cb',28,1),(21,1,72,'1','cb',28,1),(22,1,73,'1','1',28,1),(23,1,74,'6','6',28,1),(24,1,64,'2','2',28,1),(25,1,508,'2','2',28,1),(26,1,101,'2','2',28,32),(27,1,85,'10','10',28,32),(28,1,86,'10','10',28,32),(29,1,87,'2','2',28,32),(30,1,88,'2','2',28,32),(31,1,89,'2','2',28,32),(32,1,90,'2','2',28,32),(33,1,91,'10','10',28,32),(34,1,96,'1','cb',28,32),(35,1,98,'1','cb',28,32),(36,1,99,'1','cb',28,32),(37,1,102,'1','1',28,32),(38,1,59,'1','cb',28,32),(39,1,44,'2','2',28,6),(40,1,45,'2','2',28,6),(41,1,46,'2','2',28,6),(42,1,47,'2','2',28,6),(43,1,48,'2','2',28,6),(44,1,49,'2','2',28,6),(45,1,81,'2','2',28,33),(46,1,82,'2','2',28,33),(47,1,41,'2','2',28,33),(48,1,84,'5','5',28,33),(49,1,103,'1','cb',28,33),(50,1,65,'2','2',28,33);
/*!40000 ALTER TABLE `Truck1_Drug_Box_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Drug_Box_events`
--

DROP TABLE IF EXISTS `Truck1_Drug_Box_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Drug_Box_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Drug_Box_events`
--

LOCK TABLES `Truck1_Drug_Box_events` WRITE;
/*!40000 ALTER TABLE `Truck1_Drug_Box_events` DISABLE KEYS */;
INSERT INTO `Truck1_Drug_Box_events` VALUES (1,'2014-03-18 18:41:09',NULL,1,1);
/*!40000 ALTER TABLE `Truck1_Drug_Box_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_ETT_Pack`
--

DROP TABLE IF EXISTS `Truck1_ETT_Pack`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_ETT_Pack` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_ETT_Pack`
--

LOCK TABLES `Truck1_ETT_Pack` WRITE;
/*!40000 ALTER TABLE `Truck1_ETT_Pack` DISABLE KEYS */;
INSERT INTO `Truck1_ETT_Pack` VALUES (1,39,38,1,20,0,'2012-03-12 16:47:21'),(2,484,38,1,6,0,'2012-03-12 16:47:21'),(7,42,38,1,20,0,'2012-03-12 16:47:21'),(5,43,38,1,20,0,'2012-03-12 16:47:21'),(6,12,38,1,20,0,'2012-03-12 16:47:21'),(8,13,38,25,20,0,'2012-03-12 16:47:21'),(9,14,38,25,20,0,'2012-03-12 16:47:21'),(10,16,38,25,20,0,'2012-03-12 16:47:21'),(11,15,38,25,20,0,'2012-03-12 16:47:21'),(12,17,38,25,20,0,'2012-03-12 16:47:21'),(13,18,38,3,2,0,'2012-03-12 16:47:21'),(14,19,38,3,2,0,'2012-03-12 16:47:21'),(15,20,38,3,2,0,'2012-03-12 16:47:21'),(16,21,38,3,2,0,'2012-03-12 16:47:21'),(17,23,38,3,2,0,'2012-03-12 16:47:21'),(18,24,38,3,2,0,'2012-03-12 16:47:21'),(19,25,38,3,2,0,'2012-03-12 16:47:21'),(20,558,38,1,2,0,'2012-07-25 19:14:48'),(21,22,38,3,2,0,'2012-07-25 19:14:48');
/*!40000 ALTER TABLE `Truck1_ETT_Pack` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_ETT_Pack_checksheet`
--

DROP TABLE IF EXISTS `Truck1_ETT_Pack_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_ETT_Pack_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_ETT_Pack_checksheet`
--

LOCK TABLES `Truck1_ETT_Pack_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck1_ETT_Pack_checksheet` DISABLE KEYS */;
INSERT INTO `Truck1_ETT_Pack_checksheet` VALUES (1,1,39,'1','cb',38,1),(2,1,484,'6','6',38,1),(3,1,42,'1','cb',38,1),(4,1,43,'1','cb',38,1),(5,1,12,'1','cb',38,1),(6,1,558,'2','2',38,1),(7,1,13,'1','cb',38,25),(8,1,14,'1','cb',38,25),(9,1,16,'1','cb',38,25),(10,1,15,'1','cb',38,25),(11,1,17,'1','cb',38,25),(12,1,18,'2','2',38,3),(13,1,19,'2','2',38,3),(14,1,20,'2','2',38,3),(15,1,21,'2','2',38,3),(16,1,23,'2','2',38,3),(17,1,24,'2','2',38,3),(18,1,25,'2','2',38,3),(19,1,22,'2','2',38,3);
/*!40000 ALTER TABLE `Truck1_ETT_Pack_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_ETT_Pack_events`
--

DROP TABLE IF EXISTS `Truck1_ETT_Pack_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_ETT_Pack_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_ETT_Pack_events`
--

LOCK TABLES `Truck1_ETT_Pack_events` WRITE;
/*!40000 ALTER TABLE `Truck1_ETT_Pack_events` DISABLE KEYS */;
INSERT INTO `Truck1_ETT_Pack_events` VALUES (1,'2014-03-18 18:41:09',NULL,1,1);
/*!40000 ALTER TABLE `Truck1_ETT_Pack_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_EZ_IO`
--

DROP TABLE IF EXISTS `Truck1_EZ_IO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_EZ_IO` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_EZ_IO`
--

LOCK TABLES `Truck1_EZ_IO` WRITE;
/*!40000 ALTER TABLE `Truck1_EZ_IO` DISABLE KEYS */;
INSERT INTO `Truck1_EZ_IO` VALUES (1,509,37,1,20,0,'2012-03-12 16:47:21'),(2,118,37,1,20,0,'2012-03-12 16:47:21'),(3,55,37,1,20,0,'2012-03-12 16:47:21'),(4,41,37,1,20,0,'2012-03-12 16:47:21'),(5,127,37,1,20,0,'2012-03-12 16:47:21'),(6,513,37,1,2,0,'2012-03-12 16:47:21'),(7,510,37,6,2,0,'2012-03-12 16:47:21'),(8,511,37,6,2,0,'2012-03-12 16:47:21'),(9,512,37,6,2,0,'2012-03-12 16:47:21');
/*!40000 ALTER TABLE `Truck1_EZ_IO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_EZ_IO_checksheet`
--

DROP TABLE IF EXISTS `Truck1_EZ_IO_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_EZ_IO_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_EZ_IO_checksheet`
--

LOCK TABLES `Truck1_EZ_IO_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck1_EZ_IO_checksheet` DISABLE KEYS */;
INSERT INTO `Truck1_EZ_IO_checksheet` VALUES (1,1,509,'1','cb',37,1),(2,1,118,'1','cb',37,1),(3,1,55,'1','cb',37,1),(4,1,41,'1','cb',37,1),(5,1,127,'1','cb',37,1),(6,1,513,'2','2',37,1),(7,1,510,'2','2',37,6),(8,1,511,'2','2',37,6),(9,1,512,'2','2',37,6);
/*!40000 ALTER TABLE `Truck1_EZ_IO_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_EZ_IO_events`
--

DROP TABLE IF EXISTS `Truck1_EZ_IO_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_EZ_IO_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_EZ_IO_events`
--

LOCK TABLES `Truck1_EZ_IO_events` WRITE;
/*!40000 ALTER TABLE `Truck1_EZ_IO_events` DISABLE KEYS */;
INSERT INTO `Truck1_EZ_IO_events` VALUES (1,'2014-03-18 18:41:09',NULL,1,1);
/*!40000 ALTER TABLE `Truck1_EZ_IO_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_OB`
--

DROP TABLE IF EXISTS `Truck1_OB`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_OB` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_OB`
--

LOCK TABLES `Truck1_OB` WRITE;
/*!40000 ALTER TABLE `Truck1_OB` DISABLE KEYS */;
INSERT INTO `Truck1_OB` VALUES (6,481,35,1,2,0,'2012-03-12 16:47:21'),(2,155,35,1,2,0,'2012-03-12 16:47:21'),(3,477,35,1,20,0,'2012-03-12 16:47:21'),(4,478,35,1,2,0,'2012-03-12 16:47:21'),(5,474,35,1,2,0,'2012-03-12 16:47:21'),(7,475,35,1,2,0,'2012-03-12 16:47:21'),(8,154,35,1,2,0,'2012-03-12 16:47:21');
/*!40000 ALTER TABLE `Truck1_OB` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_OB_checksheet`
--

DROP TABLE IF EXISTS `Truck1_OB_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_OB_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_OB_checksheet`
--

LOCK TABLES `Truck1_OB_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck1_OB_checksheet` DISABLE KEYS */;
INSERT INTO `Truck1_OB_checksheet` VALUES (1,1,481,'2','2',35,1),(2,1,155,'2','2',35,1),(3,1,477,'1','cb',35,1),(4,1,478,'2','2',35,1),(5,1,474,'2','2',35,1),(6,1,475,'2','2',35,1),(7,1,154,'2','2',35,1);
/*!40000 ALTER TABLE `Truck1_OB_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_OB_events`
--

DROP TABLE IF EXISTS `Truck1_OB_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_OB_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_OB_events`
--

LOCK TABLES `Truck1_OB_events` WRITE;
/*!40000 ALTER TABLE `Truck1_OB_events` DISABLE KEYS */;
INSERT INTO `Truck1_OB_events` VALUES (1,'2014-03-18 18:41:09',NULL,1,1);
/*!40000 ALTER TABLE `Truck1_OB_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Pedi_Box`
--

DROP TABLE IF EXISTS `Truck1_Pedi_Box`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Pedi_Box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Pedi_Box`
--

LOCK TABLES `Truck1_Pedi_Box` WRITE;
/*!40000 ALTER TABLE `Truck1_Pedi_Box` DISABLE KEYS */;
INSERT INTO `Truck1_Pedi_Box` VALUES (1,213,9,1,2,0,'2012-03-12 16:47:27'),(2,214,9,1,2,0,'2012-03-12 16:47:27'),(3,215,9,1,20,0,'2012-03-12 16:47:27'),(4,85,9,1,10,0,'2012-03-12 16:47:27'),(5,42,9,1,20,0,'2012-03-12 16:47:27'),(9,219,9,25,20,0,'2012-03-12 16:47:27'),(8,218,9,25,20,0,'2012-03-12 16:47:27'),(10,220,9,25,20,0,'2012-03-12 16:47:27'),(11,221,9,25,20,0,'2012-03-12 16:47:27'),(12,222,9,25,20,0,'2012-03-12 16:47:27'),(13,223,9,25,20,0,'2012-03-12 16:47:27'),(15,224,9,25,2,0,'2012-03-12 16:47:27'),(16,226,9,25,20,0,'2012-03-12 16:47:27'),(17,212,9,1,20,0,'2012-03-12 16:47:27'),(18,225,9,1,20,0,'2012-03-12 16:47:27'),(19,227,9,1,20,0,'2012-03-12 16:47:27'),(20,228,9,1,20,0,'2012-03-12 16:47:27'),(21,229,9,1,20,0,'2012-03-12 16:47:27'),(22,419,9,1,20,0,'2012-03-12 16:47:27'),(23,230,9,3,2,0,'2012-03-12 16:47:27'),(24,231,9,3,2,0,'2012-03-12 16:47:27'),(25,232,9,3,2,0,'2012-03-12 16:47:27'),(26,233,9,3,2,0,'2012-03-12 16:47:27'),(27,234,9,3,2,0,'2012-03-12 16:47:27'),(28,235,9,3,2,0,'2012-03-12 16:47:27'),(30,236,9,3,2,0,'2012-03-12 16:47:27'),(31,237,9,3,2,0,'2012-03-12 16:47:27'),(32,238,9,3,2,0,'2012-03-12 16:47:27'),(33,54,9,1,20,0,'2012-04-22 14:55:28'),(34,53,9,1,20,0,'2012-04-22 14:56:18'),(37,97,9,1,1,0,'2012-04-22 15:02:36'),(36,64,9,1,20,0,'2012-04-22 14:59:40'),(38,507,9,25,2,0,'2012-04-22 15:08:22'),(39,52,9,1,20,0,'2012-04-22 15:19:19'),(40,69,9,1,20,0,'2012-04-22 15:37:38');
/*!40000 ALTER TABLE `Truck1_Pedi_Box` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Pedi_Box_checksheet`
--

DROP TABLE IF EXISTS `Truck1_Pedi_Box_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Pedi_Box_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Pedi_Box_checksheet`
--

LOCK TABLES `Truck1_Pedi_Box_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck1_Pedi_Box_checksheet` DISABLE KEYS */;
INSERT INTO `Truck1_Pedi_Box_checksheet` VALUES (1,1,213,'2','2',9,1),(2,1,214,'2','2',9,1),(3,1,215,'1','cb',9,1),(4,1,85,'10','10',9,1),(5,1,42,'1','cb',9,1),(6,1,212,'1','cb',9,1),(7,1,225,'1','cb',9,1),(8,1,227,'1','cb',9,1),(9,1,228,'1','cb',9,1),(10,1,229,'1','cb',9,1),(11,1,419,'1','cb',9,1),(12,1,54,'1','cb',9,1),(13,1,53,'1','cb',9,1),(14,1,97,'1','1',9,1),(15,1,64,'1','cb',9,1),(16,1,52,'1','cb',9,1),(17,1,69,'1','cb',9,1),(18,1,219,'1','cb',9,25),(19,1,218,'1','cb',9,25),(20,1,220,'1','cb',9,25),(21,1,221,'1','cb',9,25),(22,1,222,'1','cb',9,25),(23,1,223,'1','cb',9,25),(24,1,224,'2','2',9,25),(25,1,226,'1','cb',9,25),(26,1,507,'2','2',9,25),(27,1,230,'2','2',9,3),(28,1,231,'2','2',9,3),(29,1,232,'2','2',9,3),(30,1,233,'2','2',9,3),(31,1,234,'2','2',9,3),(32,1,235,'2','2',9,3),(33,1,236,'2','2',9,3),(34,1,237,'2','2',9,3),(35,1,238,'2','2',9,3);
/*!40000 ALTER TABLE `Truck1_Pedi_Box_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Pedi_Box_events`
--

DROP TABLE IF EXISTS `Truck1_Pedi_Box_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Pedi_Box_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Pedi_Box_events`
--

LOCK TABLES `Truck1_Pedi_Box_events` WRITE;
/*!40000 ALTER TABLE `Truck1_Pedi_Box_events` DISABLE KEYS */;
INSERT INTO `Truck1_Pedi_Box_events` VALUES (1,'2014-03-18 18:41:09',NULL,1,1);
/*!40000 ALTER TABLE `Truck1_Pedi_Box_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Sealed`
--

DROP TABLE IF EXISTS `Truck1_Sealed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Sealed` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Sealed`
--

LOCK TABLES `Truck1_Sealed` WRITE;
/*!40000 ALTER TABLE `Truck1_Sealed` DISABLE KEYS */;
INSERT INTO `Truck1_Sealed` VALUES (1,1,'0000-00-00 00:00:00'),(2,2,'0000-00-00 00:00:00'),(3,3,'0000-00-00 00:00:00'),(4,4,'0000-00-00 00:00:00'),(5,6,'0000-00-00 00:00:00'),(6,7,'0000-00-00 00:00:00'),(7,8,'0000-00-00 00:00:00'),(8,9,'0000-00-00 00:00:00'),(9,41,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `Truck1_Sealed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Suction`
--

DROP TABLE IF EXISTS `Truck1_Suction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Suction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Suction`
--

LOCK TABLES `Truck1_Suction` WRITE;
/*!40000 ALTER TABLE `Truck1_Suction` DISABLE KEYS */;
INSERT INTO `Truck1_Suction` VALUES (21,275,13,1,6,0,'2012-03-12 16:47:21'),(19,435,13,37,20,0,'2012-03-12 16:47:21'),(18,433,13,37,20,0,'2012-03-12 16:47:21'),(17,431,13,37,20,0,'2012-03-12 16:47:21'),(16,434,13,38,20,0,'2012-03-12 16:47:21'),(15,432,13,38,20,0,'2012-03-12 16:47:21'),(14,430,13,38,20,0,'2012-03-12 16:47:21'),(22,276,13,1,2,0,'2012-03-12 16:47:21'),(23,277,13,1,2,0,'2012-03-12 16:47:21'),(24,278,13,1,2,0,'2012-03-12 16:47:21'),(25,279,13,1,2,0,'2012-03-12 16:47:21'),(26,280,13,1,2,0,'2012-03-12 16:47:21'),(27,281,13,1,2,0,'2012-03-12 16:47:21'),(28,559,13,1,2,0,'2012-08-03 11:22:57');
/*!40000 ALTER TABLE `Truck1_Suction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Suction_checksheet`
--

DROP TABLE IF EXISTS `Truck1_Suction_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Suction_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Suction_checksheet`
--

LOCK TABLES `Truck1_Suction_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck1_Suction_checksheet` DISABLE KEYS */;
INSERT INTO `Truck1_Suction_checksheet` VALUES (1,1,275,'6','6',13,1),(2,1,276,'2','2',13,1),(3,1,277,'2','2',13,1),(4,1,278,'2','2',13,1),(5,1,279,'2','2',13,1),(6,1,280,'2','2',13,1),(7,1,281,'2','2',13,1),(8,1,559,'2','2',13,1),(9,1,435,'1','cb',13,37),(10,1,433,'1','cb',13,37),(11,1,431,'1','cb',13,37),(12,1,434,'1','cb',13,38),(13,1,432,'1','cb',13,38),(14,1,430,'1','cb',13,38);
/*!40000 ALTER TABLE `Truck1_Suction_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Suction_events`
--

DROP TABLE IF EXISTS `Truck1_Suction_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Suction_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Suction_events`
--

LOCK TABLES `Truck1_Suction_events` WRITE;
/*!40000 ALTER TABLE `Truck1_Suction_events` DISABLE KEYS */;
INSERT INTO `Truck1_Suction_events` VALUES (1,'2014-03-18 18:41:09',NULL,1,1);
/*!40000 ALTER TABLE `Truck1_Suction_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Toughbook`
--

DROP TABLE IF EXISTS `Truck1_Toughbook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Toughbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Toughbook`
--

LOCK TABLES `Truck1_Toughbook` WRITE;
/*!40000 ALTER TABLE `Truck1_Toughbook` DISABLE KEYS */;
INSERT INTO `Truck1_Toughbook` VALUES (1,240,30,1,20,0,'2012-03-12 16:47:27'),(2,242,30,1,20,0,'2012-03-12 16:47:27'),(3,244,30,28,20,0,'2012-03-12 16:47:27'),(4,421,30,28,20,0,'2012-03-12 16:47:27'),(5,422,30,28,20,0,'2012-03-12 16:47:27'),(6,470,30,28,20,0,'2012-03-12 16:47:27'),(7,246,30,28,20,0,'2012-03-12 16:47:27');
/*!40000 ALTER TABLE `Truck1_Toughbook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Toughbook_checksheet`
--

DROP TABLE IF EXISTS `Truck1_Toughbook_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Toughbook_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Toughbook_checksheet`
--

LOCK TABLES `Truck1_Toughbook_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck1_Toughbook_checksheet` DISABLE KEYS */;
INSERT INTO `Truck1_Toughbook_checksheet` VALUES (1,1,240,'1','cb',30,1),(2,1,242,'1','cb',30,1),(3,1,244,'1','cb',30,28),(4,1,421,'1','cb',30,28),(5,1,422,'1','cb',30,28),(6,1,470,'1','cb',30,28),(7,1,246,'1','cb',30,28);
/*!40000 ALTER TABLE `Truck1_Toughbook_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Toughbook_events`
--

DROP TABLE IF EXISTS `Truck1_Toughbook_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Toughbook_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Toughbook_events`
--

LOCK TABLES `Truck1_Toughbook_events` WRITE;
/*!40000 ALTER TABLE `Truck1_Toughbook_events` DISABLE KEYS */;
INSERT INTO `Truck1_Toughbook_events` VALUES (1,'2014-03-18 18:41:09',NULL,1,1);
/*!40000 ALTER TABLE `Truck1_Toughbook_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Trauma_Box`
--

DROP TABLE IF EXISTS `Truck1_Trauma_Box`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Trauma_Box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Trauma_Box`
--

LOCK TABLES `Truck1_Trauma_Box` WRITE;
/*!40000 ALTER TABLE `Truck1_Trauma_Box` DISABLE KEYS */;
INSERT INTO `Truck1_Trauma_Box` VALUES (1,42,15,39,2,0,'2012-03-12 16:47:27'),(2,306,15,39,2,0,'2012-03-12 16:47:27'),(3,86,15,39,20,0,'2012-03-12 16:47:27'),(4,297,15,39,2,0,'2012-03-12 16:47:27'),(5,315,15,39,20,0,'2012-03-12 16:47:27'),(6,300,15,39,2,0,'2012-03-12 16:47:27'),(7,295,15,39,2,0,'2012-03-12 16:47:27'),(8,298,15,39,9,0,'2012-03-12 16:47:27'),(9,301,15,39,6,0,'2012-03-12 16:47:27'),(10,307,15,1,20,0,'2012-03-12 16:47:27'),(11,308,15,1,20,0,'2012-03-12 16:47:27'),(12,149,15,1,20,0,'2012-03-12 16:47:27'),(13,310,15,1,20,0,'2012-03-12 16:47:27'),(14,51,15,1,5,0,'2012-03-12 16:47:27'),(15,85,15,40,20,0,'2012-03-12 16:47:27'),(17,96,15,40,20,0,'2012-03-12 16:47:27'),(18,98,15,40,20,0,'2012-03-12 16:47:27'),(19,101,15,40,20,0,'2012-03-12 16:47:27'),(21,116,15,40,20,0,'2012-03-12 16:47:27'),(22,118,15,40,20,0,'2012-03-12 16:47:27'),(23,44,15,6,5,0,'2012-03-12 16:47:27'),(24,45,15,6,5,0,'2012-03-12 16:47:27'),(25,46,15,6,5,0,'2012-03-12 16:47:27'),(26,47,15,6,5,0,'2012-03-12 16:47:27');
/*!40000 ALTER TABLE `Truck1_Trauma_Box` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Trauma_Box_checksheet`
--

DROP TABLE IF EXISTS `Truck1_Trauma_Box_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Trauma_Box_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Trauma_Box_checksheet`
--

LOCK TABLES `Truck1_Trauma_Box_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck1_Trauma_Box_checksheet` DISABLE KEYS */;
INSERT INTO `Truck1_Trauma_Box_checksheet` VALUES (1,1,42,'2','2',15,39),(2,1,306,'2','2',15,39),(3,1,86,'1','cb',15,39),(4,1,297,'2','2',15,39),(5,1,315,'1','cb',15,39),(6,1,300,'2','2',15,39),(7,1,295,'2','2',15,39),(8,1,298,'9','9',15,39),(9,1,301,'6','6',15,39),(10,1,307,'1','cb',15,1),(11,1,308,'1','cb',15,1),(12,1,149,'1','cb',15,1),(13,1,310,'1','cb',15,1),(14,1,51,'5','5',15,1),(15,1,85,'1','cb',15,40),(16,1,96,'1','cb',15,40),(17,1,98,'1','cb',15,40),(18,1,101,'1','cb',15,40),(19,1,116,'1','cb',15,40),(20,1,118,'1','cb',15,40),(21,1,44,'5','5',15,6),(22,1,45,'5','5',15,6),(23,1,46,'5','5',15,6),(24,1,47,'5','5',15,6);
/*!40000 ALTER TABLE `Truck1_Trauma_Box_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Trauma_Box_events`
--

DROP TABLE IF EXISTS `Truck1_Trauma_Box_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Trauma_Box_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Trauma_Box_events`
--

LOCK TABLES `Truck1_Trauma_Box_events` WRITE;
/*!40000 ALTER TABLE `Truck1_Trauma_Box_events` DISABLE KEYS */;
INSERT INTO `Truck1_Trauma_Box_events` VALUES (1,'2014-03-18 18:41:09',NULL,1,1);
/*!40000 ALTER TABLE `Truck1_Trauma_Box_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Trauma_Supplies`
--

DROP TABLE IF EXISTS `Truck1_Trauma_Supplies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Trauma_Supplies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Trauma_Supplies`
--

LOCK TABLES `Truck1_Trauma_Supplies` WRITE;
/*!40000 ALTER TABLE `Truck1_Trauma_Supplies` DISABLE KEYS */;
INSERT INTO `Truck1_Trauma_Supplies` VALUES (1,290,14,1,20,0,'2012-03-12 16:47:21'),(3,291,14,1,20,0,'2012-03-12 16:47:21'),(4,292,14,1,20,0,'2012-03-12 16:47:21'),(5,293,14,1,20,0,'2012-03-12 16:47:21'),(6,294,14,1,4,0,'2012-03-12 16:47:21'),(7,295,14,1,6,0,'2012-03-12 16:47:21'),(8,296,14,1,20,0,'2012-03-12 16:47:21'),(9,297,14,1,2,0,'2012-03-12 16:47:21'),(10,298,14,1,6,0,'2012-03-12 16:47:21'),(11,299,14,1,4,0,'2012-03-12 16:47:21'),(12,300,14,1,4,0,'2012-03-12 16:47:21'),(13,301,14,1,6,0,'2012-03-12 16:47:21'),(15,303,14,1,2,0,'2012-03-12 16:47:21'),(16,304,14,1,2,0,'2012-03-12 16:47:21'),(17,562,14,1,4,0,'2014-02-13 17:51:44');
/*!40000 ALTER TABLE `Truck1_Trauma_Supplies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Trauma_Supplies_checksheet`
--

DROP TABLE IF EXISTS `Truck1_Trauma_Supplies_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Trauma_Supplies_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Trauma_Supplies_checksheet`
--

LOCK TABLES `Truck1_Trauma_Supplies_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck1_Trauma_Supplies_checksheet` DISABLE KEYS */;
INSERT INTO `Truck1_Trauma_Supplies_checksheet` VALUES (1,1,290,'1','cb',14,1),(2,1,291,'1','cb',14,1),(3,1,292,'1','cb',14,1),(4,1,293,'1','cb',14,1),(5,1,294,'4','4',14,1),(6,1,295,'6','6',14,1),(7,1,296,'1','cb',14,1),(8,1,297,'2','2',14,1),(9,1,298,'6','6',14,1),(10,1,299,'4','4',14,1),(11,1,300,'4','4',14,1),(12,1,301,'6','6',14,1),(13,1,303,'2','2',14,1),(14,1,304,'2','2',14,1),(15,1,562,'4','4',14,1);
/*!40000 ALTER TABLE `Truck1_Trauma_Supplies_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_Trauma_Supplies_events`
--

DROP TABLE IF EXISTS `Truck1_Trauma_Supplies_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_Trauma_Supplies_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_Trauma_Supplies_events`
--

LOCK TABLES `Truck1_Trauma_Supplies_events` WRITE;
/*!40000 ALTER TABLE `Truck1_Trauma_Supplies_events` DISABLE KEYS */;
INSERT INTO `Truck1_Trauma_Supplies_events` VALUES (1,'2014-03-18 18:41:09',NULL,1,1);
/*!40000 ALTER TABLE `Truck1_Trauma_Supplies_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_checksheet`
--

DROP TABLE IF EXISTS `Truck1_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=165 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_checksheet`
--

LOCK TABLES `Truck1_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck1_checksheet` DISABLE KEYS */;
INSERT INTO `Truck1_checksheet` VALUES (1,1,1,'','miles',3,1),(2,1,2,'','miles',3,1),(3,1,4,'','refill',3,1),(4,1,6,'','refill',3,1),(5,1,7,'','refill',3,1),(6,1,175,'2','2',3,1),(7,1,176,'2','2',3,1),(8,1,177,'3','3',3,1),(9,1,178,'1','cb',3,1),(10,1,179,'1','cb',3,1),(11,1,180,'1','cb',3,1),(12,1,8,'','personnel',3,2),(13,1,9,'','personnel',3,2),(14,1,495,'','open',3,2),(15,1,104,'1','cb',3,20),(16,1,105,'1','cb',3,20),(17,1,106,'1','cb',3,20),(18,1,107,'1','cb',3,20),(19,1,108,'1','cb',3,20),(20,1,109,'1','cb',3,20),(21,1,130,'1','cb',3,21),(22,1,131,'1','cb',3,21),(23,1,132,'1','cb',3,21),(24,1,133,'1','cb',3,21),(25,1,134,'1','cb',3,21),(26,1,135,'1','cb',3,21),(27,1,136,'1','cb',3,21),(28,1,137,'1','cb',3,21),(29,1,138,'1','cb',3,21),(30,1,139,'1','cb',3,21),(31,1,140,'1','cb',3,21),(32,1,141,'1','cb',3,21),(33,1,283,'','tire',3,22),(34,1,284,'','open',3,22),(35,1,285,'','open',3,22),(36,1,286,'','open',3,22),(37,1,287,'','open',3,22),(38,1,288,'','open',3,22),(39,1,289,'','open',3,22),(40,1,331,'1','cb',3,23),(41,1,332,'1','cb',3,23),(42,1,333,'1','cb',3,23),(43,1,334,'1','cb',3,23),(44,1,335,'1','cb',3,23),(45,1,336,'1','cb',3,23),(46,1,337,'1','cb',3,23),(47,1,555,'1','cb',3,45),(48,1,554,'1','cb',3,45),(49,1,557,'1','cb',3,45),(50,1,556,'1','cb',3,45),(51,1,391,'10','10',4,1),(52,1,488,'2','2',4,1),(53,1,390,'10','10',4,1),(54,1,392,'2','2',4,1),(55,1,379,'1','cb',4,1),(56,1,548,'1','cb',36,1),(57,1,401,'2','2',36,1),(58,1,402,'3','3',36,1),(59,1,549,'1','cb',36,1),(60,1,405,'1','cb',36,1),(61,1,406,'1','cb',36,1),(62,1,407,'1','cb',36,1),(63,1,410,'1','cb',36,1),(64,1,403,'1','cb',36,7),(65,1,404,'1','cb',36,7),(66,1,409,'2','2',36,17),(67,1,551,'2','2',36,17),(68,1,411,'2','2',36,19),(69,1,412,'2','2',36,19),(70,1,536,'1','cb',36,32),(71,1,537,'1','cb',36,32),(72,1,521,'1','cb',36,32),(73,1,550,'1','cb',36,32),(74,1,553,'1','cb',36,44),(75,1,552,'1','cb',36,44),(76,1,248,'4','4',10,1),(77,1,249,'4','4',10,1),(78,1,250,'1','cb',10,1),(79,1,251,'1','cb',10,1),(80,1,254,'2','2',10,1),(81,1,255,'1','cb',10,1),(82,1,256,'1','cb',10,1),(83,1,257,'2','2',10,1),(84,1,239,'4','4',10,1),(85,1,429,'2','2',10,1),(86,1,258,'2','2',10,15),(87,1,259,'2','2',10,15),(88,1,241,'2','2',10,14),(89,1,243,'2','2',10,14),(90,1,245,'2','2',10,14),(91,1,247,'2','2',10,14),(92,1,253,'1','cb',10,34),(93,1,252,'2','2',10,34),(94,1,142,'6','6',6,1),(95,1,143,'2','2',6,1),(96,1,144,'1','cb',6,1),(97,1,145,'1','cb',6,1),(98,1,147,'1','cb',6,1),(99,1,146,'1','cb',6,1),(100,1,148,'1','cb',6,1),(101,1,149,'1','cb',6,1),(102,1,156,'1','cb',6,1),(103,1,150,'8','8',6,1),(104,1,152,'2','2',6,1),(105,1,151,'4','4',6,1),(106,1,153,'1','cb',6,1),(107,1,157,'1','cb',6,1),(108,1,158,'1','cb',6,1),(109,1,165,'1','cb',6,10),(110,1,166,'1','cb',6,10),(111,1,424,'1','cb',6,31),(112,1,425,'2','2',6,31),(113,1,426,'1','cb',6,31),(114,1,427,'1','cb',6,31),(115,1,167,'1','cb',6,30),(116,1,423,'2','2',6,30),(117,1,159,'1','cb',6,9),(118,1,160,'1','cb',6,9),(119,1,91,'1','cb',6,9),(120,1,85,'4','4',6,9),(121,1,86,'4','4',6,9),(122,1,164,'3','3',6,9),(123,1,544,'1','cb',6,9),(124,1,194,'','O2',8,1),(125,1,195,'','O2',8,1),(126,1,196,'','O2',8,1),(127,1,198,'','O2',8,1),(128,1,200,'1','cb',8,1),(129,1,197,'','na',8,1),(130,1,199,'2','2',8,1),(131,1,205,'10','10',8,24),(132,1,204,'10','10',8,24),(133,1,206,'4','4',8,24),(134,1,207,'5','5',8,24),(135,1,208,'5','5',8,24),(136,1,209,'4','4',8,24),(137,1,210,'4','4',8,24),(138,1,211,'4','4',8,24),(139,1,201,'1','cb',8,13),(140,1,202,'1','cb',8,13),(141,1,203,'1','cb',8,13),(142,1,96,'6','6',5,1),(143,1,98,'10','10',5,1),(144,1,99,'10','10',5,1),(145,1,101,'10','10',5,1),(146,1,115,'2','2',5,1),(147,1,116,'2','2',5,1),(148,1,117,'2','2',5,1),(149,1,118,'1','cb',5,1),(150,1,102,'1','cb',5,1),(151,1,41,'10','10',5,1),(152,1,127,'10','10',5,1),(153,1,471,'10','10',5,1),(154,1,84,'10','10',5,1),(155,1,535,'5','5',5,1),(156,1,528,'10','10',5,1),(157,1,529,'10','10',5,1),(158,1,44,'10','10',5,6),(159,1,45,'10','10',5,6),(160,1,46,'10','10',5,6),(161,1,47,'10','10',5,6),(162,1,48,'10','10',5,6),(163,1,49,'10','10',5,6),(164,1,514,'','comment',16,1);
/*!40000 ALTER TABLE `Truck1_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck1_events`
--

DROP TABLE IF EXISTS `Truck1_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck1_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck1_events`
--

LOCK TABLES `Truck1_events` WRITE;
/*!40000 ALTER TABLE `Truck1_events` DISABLE KEYS */;
INSERT INTO `Truck1_events` VALUES (1,'2014-03-18 18:41:09',NULL,0,0);
/*!40000 ALTER TABLE `Truck1_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24`
--

DROP TABLE IF EXISTS `Truck24`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24`
--

LOCK TABLES `Truck24` WRITE;
/*!40000 ALTER TABLE `Truck24` DISABLE KEYS */;
INSERT INTO `Truck24` VALUES (2,1,3,1,21,1,'2012-03-12 16:47:24'),(3,2,3,1,21,1,'2012-03-12 16:47:24'),(4,3,3,1,23,1,'2012-03-12 16:47:24'),(5,4,3,1,24,1,'2012-03-12 16:47:24'),(6,6,3,1,24,1,'2012-03-12 16:47:24'),(7,7,3,1,24,1,'2012-03-12 16:47:24'),(8,175,3,1,2,0,'2012-03-12 16:47:24'),(9,176,3,1,2,0,'2012-03-12 16:47:24'),(10,177,3,1,3,0,'2012-03-12 16:47:24'),(11,178,3,1,20,0,'2012-03-12 16:47:24'),(12,179,3,1,20,0,'2012-03-12 16:47:24'),(13,180,3,1,20,0,'2012-03-12 16:47:24'),(14,8,3,2,22,1,'2012-03-12 16:47:24'),(15,9,3,2,22,1,'2012-03-12 16:47:24'),(16,495,3,2,16,0,'2012-03-12 16:47:24'),(17,104,3,20,20,0,'2012-03-12 16:47:24'),(18,105,3,20,20,0,'2012-03-12 16:47:24'),(19,106,3,20,20,0,'2012-03-12 16:47:24'),(20,107,3,20,20,0,'2012-03-12 16:47:24'),(21,108,3,20,20,0,'2012-03-12 16:47:24'),(22,109,3,20,20,0,'2012-03-12 16:47:24'),(23,130,3,21,20,0,'2012-03-12 16:47:24'),(24,131,3,21,20,0,'2012-03-12 16:47:24'),(25,132,3,21,20,0,'2012-03-12 16:47:24'),(26,133,3,21,20,0,'2012-03-12 16:47:24'),(27,134,3,21,20,0,'2012-03-12 16:47:24'),(28,135,3,21,20,0,'2012-03-12 16:47:24'),(29,136,3,21,20,0,'2012-03-12 16:47:24'),(30,137,3,21,20,0,'2012-03-12 16:47:24'),(31,138,3,21,20,0,'2012-03-12 16:47:24'),(32,139,3,21,20,0,'2012-03-12 16:47:24'),(33,140,3,21,20,0,'2012-03-12 16:47:24'),(34,141,3,21,20,0,'2012-03-12 16:47:24'),(35,283,3,22,19,0,'2012-03-12 16:47:24'),(36,284,3,22,16,0,'2012-03-12 16:47:24'),(37,285,3,22,16,0,'2012-03-12 16:47:24'),(38,286,3,22,16,0,'2012-03-12 16:47:24'),(39,287,3,22,16,0,'2012-03-12 16:47:24'),(40,288,3,22,16,0,'2012-03-12 16:47:24'),(41,289,3,22,16,0,'2012-03-12 16:47:24'),(42,331,3,23,20,0,'2012-03-12 16:47:24'),(43,332,3,23,20,0,'2012-03-12 16:47:24'),(44,333,3,23,20,0,'2012-03-12 16:47:24'),(45,334,3,23,20,0,'2012-03-12 16:47:24'),(46,335,3,23,20,0,'2012-03-12 16:47:24'),(47,336,3,23,20,0,'2012-03-12 16:47:24'),(48,337,3,23,20,0,'2012-03-12 16:47:24');
/*!40000 ALTER TABLE `Truck24` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Airway`
--

DROP TABLE IF EXISTS `Truck24_Airway`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Airway` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Airway`
--

LOCK TABLES `Truck24_Airway` WRITE;
/*!40000 ALTER TABLE `Truck24_Airway` DISABLE KEYS */;
INSERT INTO `Truck24_Airway` VALUES (1,12,27,1,20,0,'2012-03-12 16:47:24'),(2,27,27,1,20,0,'2012-03-12 16:47:24'),(3,10,27,1,20,0,'2012-03-12 16:47:24');
/*!40000 ALTER TABLE `Truck24_Airway` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Airway_checksheet`
--

DROP TABLE IF EXISTS `Truck24_Airway_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Airway_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Airway_checksheet`
--

LOCK TABLES `Truck24_Airway_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck24_Airway_checksheet` DISABLE KEYS */;
INSERT INTO `Truck24_Airway_checksheet` VALUES (1,1,12,'1','cb',27,1),(2,1,27,'1','cb',27,1),(3,1,10,'1','cb',27,1);
/*!40000 ALTER TABLE `Truck24_Airway_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Airway_events`
--

DROP TABLE IF EXISTS `Truck24_Airway_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Airway_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Airway_events`
--

LOCK TABLES `Truck24_Airway_events` WRITE;
/*!40000 ALTER TABLE `Truck24_Airway_events` DISABLE KEYS */;
INSERT INTO `Truck24_Airway_events` VALUES (1,'2014-03-18 23:46:02',NULL,24,1);
/*!40000 ALTER TABLE `Truck24_Airway_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Drugs`
--

DROP TABLE IF EXISTS `Truck24_Drugs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Drugs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Drugs`
--

LOCK TABLES `Truck24_Drugs` WRITE;
/*!40000 ALTER TABLE `Truck24_Drugs` DISABLE KEYS */;
INSERT INTO `Truck24_Drugs` VALUES (4,56,34,1,20,0,'2012-03-12 16:47:24'),(3,59,34,1,20,0,'2012-03-12 16:47:24'),(5,61,34,1,4,0,'2012-03-12 16:47:24'),(6,64,34,1,2,0,'2012-03-12 16:47:24'),(7,212,34,1,20,0,'2012-03-12 16:47:24');
/*!40000 ALTER TABLE `Truck24_Drugs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Drugs_checksheet`
--

DROP TABLE IF EXISTS `Truck24_Drugs_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Drugs_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Drugs_checksheet`
--

LOCK TABLES `Truck24_Drugs_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck24_Drugs_checksheet` DISABLE KEYS */;
INSERT INTO `Truck24_Drugs_checksheet` VALUES (1,1,56,'1','cb',34,1),(2,1,59,'1','cb',34,1),(3,1,61,'4','4',34,1),(4,1,64,'2','2',34,1),(5,1,212,'1','cb',34,1);
/*!40000 ALTER TABLE `Truck24_Drugs_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Drugs_events`
--

DROP TABLE IF EXISTS `Truck24_Drugs_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Drugs_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Drugs_events`
--

LOCK TABLES `Truck24_Drugs_events` WRITE;
/*!40000 ALTER TABLE `Truck24_Drugs_events` DISABLE KEYS */;
INSERT INTO `Truck24_Drugs_events` VALUES (1,'2014-03-18 23:46:02',NULL,24,1);
/*!40000 ALTER TABLE `Truck24_Drugs_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Glucometer`
--

DROP TABLE IF EXISTS `Truck24_Glucometer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Glucometer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Glucometer`
--

LOCK TABLES `Truck24_Glucometer` WRITE;
/*!40000 ALTER TABLE `Truck24_Glucometer` DISABLE KEYS */;
INSERT INTO `Truck24_Glucometer` VALUES (1,159,18,1,20,0,'2012-03-12 16:47:24'),(2,160,18,1,20,0,'2012-03-12 16:47:24'),(3,91,18,1,20,0,'2012-03-12 16:47:24'),(4,85,18,1,20,0,'2012-03-12 16:47:24'),(5,86,18,1,20,0,'2012-03-12 16:47:24'),(6,164,18,1,20,0,'2012-03-12 16:47:24');
/*!40000 ALTER TABLE `Truck24_Glucometer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Glucometer_checksheet`
--

DROP TABLE IF EXISTS `Truck24_Glucometer_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Glucometer_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Glucometer_checksheet`
--

LOCK TABLES `Truck24_Glucometer_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck24_Glucometer_checksheet` DISABLE KEYS */;
INSERT INTO `Truck24_Glucometer_checksheet` VALUES (1,1,159,'1','cb',18,1),(2,1,160,'1','cb',18,1),(3,1,91,'1','cb',18,1),(4,1,85,'1','cb',18,1),(5,1,86,'1','cb',18,1),(6,1,164,'1','cb',18,1);
/*!40000 ALTER TABLE `Truck24_Glucometer_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Glucometer_events`
--

DROP TABLE IF EXISTS `Truck24_Glucometer_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Glucometer_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Glucometer_events`
--

LOCK TABLES `Truck24_Glucometer_events` WRITE;
/*!40000 ALTER TABLE `Truck24_Glucometer_events` DISABLE KEYS */;
INSERT INTO `Truck24_Glucometer_events` VALUES (1,'2014-03-18 23:46:02',NULL,24,1);
/*!40000 ALTER TABLE `Truck24_Glucometer_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_IV`
--

DROP TABLE IF EXISTS `Truck24_IV`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_IV` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_IV`
--

LOCK TABLES `Truck24_IV` WRITE;
/*!40000 ALTER TABLE `Truck24_IV` DISABLE KEYS */;
INSERT INTO `Truck24_IV` VALUES (1,96,5,1,3,0,'2012-03-12 16:47:24'),(2,98,5,1,3,0,'2012-03-12 16:47:24'),(3,99,5,1,3,0,'2012-03-12 16:47:24'),(4,101,5,1,3,0,'2012-03-12 16:47:24'),(5,41,5,1,3,0,'2012-03-12 16:47:24'),(6,127,5,1,3,0,'2012-03-12 16:47:24'),(7,471,5,1,10,0,'2012-03-12 16:47:24'),(8,44,5,6,2,0,'2012-03-12 16:47:24'),(9,45,5,6,2,0,'2012-03-12 16:47:24'),(10,46,5,6,2,0,'2012-03-12 16:47:24'),(11,47,5,6,2,0,'2012-03-12 16:47:24'),(12,48,5,6,2,0,'2012-03-12 16:47:24'),(13,49,5,6,2,0,'2012-03-12 16:47:24');
/*!40000 ALTER TABLE `Truck24_IV` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_IV_checksheet`
--

DROP TABLE IF EXISTS `Truck24_IV_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_IV_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_IV_checksheet`
--

LOCK TABLES `Truck24_IV_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck24_IV_checksheet` DISABLE KEYS */;
INSERT INTO `Truck24_IV_checksheet` VALUES (1,1,96,'3','3',5,1),(2,1,98,'3','3',5,1),(3,1,99,'3','3',5,1),(4,1,101,'3','3',5,1),(5,1,41,'3','3',5,1),(6,1,127,'3','3',5,1),(7,1,471,'10','10',5,1),(8,1,44,'2','2',5,6),(9,1,45,'2','2',5,6),(10,1,46,'2','2',5,6),(11,1,47,'2','2',5,6),(12,1,48,'2','2',5,6),(13,1,49,'2','2',5,6);
/*!40000 ALTER TABLE `Truck24_IV_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_IV_events`
--

DROP TABLE IF EXISTS `Truck24_IV_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_IV_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_IV_events`
--

LOCK TABLES `Truck24_IV_events` WRITE;
/*!40000 ALTER TABLE `Truck24_IV_events` DISABLE KEYS */;
INSERT INTO `Truck24_IV_events` VALUES (1,'2014-03-18 23:46:02',NULL,24,1);
/*!40000 ALTER TABLE `Truck24_IV_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Immobilization`
--

DROP TABLE IF EXISTS `Truck24_Immobilization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Immobilization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Immobilization`
--

LOCK TABLES `Truck24_Immobilization` WRITE;
/*!40000 ALTER TABLE `Truck24_Immobilization` DISABLE KEYS */;
INSERT INTO `Truck24_Immobilization` VALUES (1,168,7,1,2,0,'2012-03-12 16:47:24'),(2,169,7,1,6,0,'2012-03-12 16:47:24'),(3,170,7,1,2,0,'2012-03-12 16:47:24'),(4,172,7,1,20,0,'2012-03-12 16:47:24'),(5,173,7,1,20,0,'2012-03-12 16:47:24'),(6,174,7,1,20,0,'2012-03-12 16:47:24'),(7,181,7,1,4,0,'2012-03-12 16:47:24'),(8,184,7,1,2,0,'2012-03-12 16:47:24'),(9,186,7,11,2,0,'2012-03-12 16:47:24'),(10,187,7,11,2,0,'2012-03-12 16:47:24'),(11,188,7,11,2,0,'2012-03-12 16:47:24'),(12,193,7,12,20,0,'2012-03-12 16:47:24'),(13,191,7,12,20,0,'2012-03-12 16:47:24'),(14,190,7,12,20,0,'2012-03-12 16:47:24'),(15,189,7,12,20,0,'2012-03-12 16:47:24'),(16,192,7,12,20,0,'2012-03-12 16:47:24'),(17,171,7,1,20,0,'2012-03-12 16:47:24');
/*!40000 ALTER TABLE `Truck24_Immobilization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Immobilization_checksheet`
--

DROP TABLE IF EXISTS `Truck24_Immobilization_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Immobilization_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Immobilization_checksheet`
--

LOCK TABLES `Truck24_Immobilization_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck24_Immobilization_checksheet` DISABLE KEYS */;
INSERT INTO `Truck24_Immobilization_checksheet` VALUES (1,1,168,'2','2',7,1),(2,1,169,'6','6',7,1),(3,1,170,'2','2',7,1),(4,1,172,'1','cb',7,1),(5,1,173,'1','cb',7,1),(6,1,174,'1','cb',7,1),(7,1,181,'4','4',7,1),(8,1,184,'2','2',7,1),(9,1,171,'1','cb',7,1),(10,1,186,'2','2',7,11),(11,1,187,'2','2',7,11),(12,1,188,'2','2',7,11),(13,1,193,'1','cb',7,12),(14,1,191,'1','cb',7,12),(15,1,190,'1','cb',7,12),(16,1,189,'1','cb',7,12),(17,1,192,'1','cb',7,12);
/*!40000 ALTER TABLE `Truck24_Immobilization_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Immobilization_events`
--

DROP TABLE IF EXISTS `Truck24_Immobilization_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Immobilization_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Immobilization_events`
--

LOCK TABLES `Truck24_Immobilization_events` WRITE;
/*!40000 ALTER TABLE `Truck24_Immobilization_events` DISABLE KEYS */;
INSERT INTO `Truck24_Immobilization_events` VALUES (1,'2014-03-18 23:46:02',NULL,24,1);
/*!40000 ALTER TABLE `Truck24_Immobilization_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Misc_Equipment`
--

DROP TABLE IF EXISTS `Truck24_Misc_Equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Misc_Equipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Misc_Equipment`
--

LOCK TABLES `Truck24_Misc_Equipment` WRITE;
/*!40000 ALTER TABLE `Truck24_Misc_Equipment` DISABLE KEYS */;
INSERT INTO `Truck24_Misc_Equipment` VALUES (1,142,6,1,6,0,'2012-03-12 16:47:25'),(2,143,6,1,2,0,'2012-03-12 16:47:25'),(3,144,6,1,20,0,'2012-03-12 16:47:25'),(4,145,6,1,20,0,'2012-03-12 16:47:25'),(5,146,6,1,20,0,'2012-03-12 16:47:25'),(6,147,6,1,20,0,'2012-03-12 16:47:25'),(7,148,6,1,20,0,'2012-03-12 16:47:25'),(8,150,6,1,8,0,'2012-03-12 16:47:25'),(9,151,6,1,4,0,'2012-03-12 16:47:25'),(10,152,6,1,2,0,'2012-03-12 16:47:25'),(11,153,6,1,20,0,'2012-03-12 16:47:25'),(12,156,6,1,20,0,'2012-03-12 16:47:25'),(13,157,6,1,20,0,'2012-03-12 16:47:25'),(14,158,6,1,20,0,'2012-03-12 16:47:25'),(15,165,6,10,20,0,'2012-03-12 16:47:25'),(16,166,6,10,20,0,'2012-03-12 16:47:25');
/*!40000 ALTER TABLE `Truck24_Misc_Equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Misc_Equipment_checksheet`
--

DROP TABLE IF EXISTS `Truck24_Misc_Equipment_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Misc_Equipment_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Misc_Equipment_checksheet`
--

LOCK TABLES `Truck24_Misc_Equipment_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck24_Misc_Equipment_checksheet` DISABLE KEYS */;
INSERT INTO `Truck24_Misc_Equipment_checksheet` VALUES (1,1,142,'6','6',6,1),(2,1,143,'2','2',6,1),(3,1,144,'1','cb',6,1),(4,1,145,'1','cb',6,1),(5,1,146,'1','cb',6,1),(6,1,147,'1','cb',6,1),(7,1,148,'1','cb',6,1),(8,1,150,'8','8',6,1),(9,1,151,'4','4',6,1),(10,1,152,'2','2',6,1),(11,1,153,'1','cb',6,1),(12,1,156,'1','cb',6,1),(13,1,157,'1','cb',6,1),(14,1,158,'1','cb',6,1),(15,1,165,'1','cb',6,10),(16,1,166,'1','cb',6,10);
/*!40000 ALTER TABLE `Truck24_Misc_Equipment_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Misc_Equipment_events`
--

DROP TABLE IF EXISTS `Truck24_Misc_Equipment_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Misc_Equipment_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Misc_Equipment_events`
--

LOCK TABLES `Truck24_Misc_Equipment_events` WRITE;
/*!40000 ALTER TABLE `Truck24_Misc_Equipment_events` DISABLE KEYS */;
INSERT INTO `Truck24_Misc_Equipment_events` VALUES (1,'2014-03-18 23:46:02',NULL,24,1);
/*!40000 ALTER TABLE `Truck24_Misc_Equipment_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_O2`
--

DROP TABLE IF EXISTS `Truck24_O2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_O2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_O2`
--

LOCK TABLES `Truck24_O2` WRITE;
/*!40000 ALTER TABLE `Truck24_O2` DISABLE KEYS */;
INSERT INTO `Truck24_O2` VALUES (1,484,8,1,6,0,'2012-03-12 16:47:25'),(2,194,8,1,17,1,'2012-03-12 16:47:25'),(3,195,8,1,17,1,'2012-03-12 16:47:25'),(4,200,8,1,20,0,'2012-03-12 16:47:25'),(5,10,8,1,20,0,'2012-03-12 16:47:25'),(6,12,8,1,20,0,'2012-03-12 16:47:25'),(7,27,8,1,20,0,'2012-03-12 16:47:25'),(8,37,8,5,20,0,'2012-03-12 16:47:25'),(9,38,8,5,20,0,'2012-03-12 16:47:25'),(10,34,8,5,20,0,'2012-03-12 16:47:25'),(11,35,8,5,20,0,'2012-03-12 16:47:25'),(12,36,8,5,20,0,'2012-03-12 16:47:25'),(13,29,8,4,20,0,'2012-03-12 16:47:25'),(14,30,8,4,20,0,'2012-03-12 16:47:25'),(15,31,8,4,20,0,'2012-03-12 16:47:25'),(16,32,8,4,20,0,'2012-03-12 16:47:25'),(17,33,8,4,20,0,'2012-03-12 16:47:25');
/*!40000 ALTER TABLE `Truck24_O2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_O2_checksheet`
--

DROP TABLE IF EXISTS `Truck24_O2_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_O2_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_O2_checksheet`
--

LOCK TABLES `Truck24_O2_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck24_O2_checksheet` DISABLE KEYS */;
INSERT INTO `Truck24_O2_checksheet` VALUES (1,1,484,'6','6',8,1),(2,1,194,'','O2',8,1),(3,1,195,'','O2',8,1),(4,1,200,'1','cb',8,1),(5,1,10,'1','cb',8,1),(6,1,12,'1','cb',8,1),(7,1,27,'1','cb',8,1),(8,1,37,'1','cb',8,5),(9,1,38,'1','cb',8,5),(10,1,34,'1','cb',8,5),(11,1,35,'1','cb',8,5),(12,1,36,'1','cb',8,5),(13,1,29,'1','cb',8,4),(14,1,30,'1','cb',8,4),(15,1,31,'1','cb',8,4),(16,1,32,'1','cb',8,4),(17,1,33,'1','cb',8,4);
/*!40000 ALTER TABLE `Truck24_O2_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_O2_events`
--

DROP TABLE IF EXISTS `Truck24_O2_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_O2_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_O2_events`
--

LOCK TABLES `Truck24_O2_events` WRITE;
/*!40000 ALTER TABLE `Truck24_O2_events` DISABLE KEYS */;
INSERT INTO `Truck24_O2_events` VALUES (1,'2014-03-18 23:46:02',NULL,24,1);
/*!40000 ALTER TABLE `Truck24_O2_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_OB`
--

DROP TABLE IF EXISTS `Truck24_OB`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_OB` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_OB`
--

LOCK TABLES `Truck24_OB` WRITE;
/*!40000 ALTER TABLE `Truck24_OB` DISABLE KEYS */;
INSERT INTO `Truck24_OB` VALUES (6,481,35,1,2,0,'2012-03-12 16:47:25'),(2,155,35,1,2,0,'2012-03-12 16:47:25'),(3,477,35,1,20,0,'2012-03-12 16:47:25'),(4,478,35,1,2,0,'2012-03-12 16:47:25'),(5,474,35,1,2,0,'2012-03-12 16:47:25'),(7,475,35,1,2,0,'2012-03-12 16:47:25'),(8,154,35,1,2,0,'2012-03-12 16:47:25');
/*!40000 ALTER TABLE `Truck24_OB` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_OB_checksheet`
--

DROP TABLE IF EXISTS `Truck24_OB_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_OB_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_OB_checksheet`
--

LOCK TABLES `Truck24_OB_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck24_OB_checksheet` DISABLE KEYS */;
INSERT INTO `Truck24_OB_checksheet` VALUES (1,1,481,'2','2',35,1),(2,1,155,'2','2',35,1),(3,1,477,'1','cb',35,1),(4,1,478,'2','2',35,1),(5,1,474,'2','2',35,1),(6,1,475,'2','2',35,1),(7,1,154,'2','2',35,1);
/*!40000 ALTER TABLE `Truck24_OB_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_OB_events`
--

DROP TABLE IF EXISTS `Truck24_OB_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_OB_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_OB_events`
--

LOCK TABLES `Truck24_OB_events` WRITE;
/*!40000 ALTER TABLE `Truck24_OB_events` DISABLE KEYS */;
INSERT INTO `Truck24_OB_events` VALUES (1,'2014-03-18 23:46:02',NULL,24,1);
/*!40000 ALTER TABLE `Truck24_OB_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Personal_Safety`
--

DROP TABLE IF EXISTS `Truck24_Personal_Safety`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Personal_Safety` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Personal_Safety`
--

LOCK TABLES `Truck24_Personal_Safety` WRITE;
/*!40000 ALTER TABLE `Truck24_Personal_Safety` DISABLE KEYS */;
INSERT INTO `Truck24_Personal_Safety` VALUES (1,248,10,1,4,0,'2012-03-12 16:47:25'),(2,249,10,1,4,0,'2012-03-12 16:47:25'),(3,250,10,1,20,0,'2012-03-12 16:47:25'),(4,251,10,1,20,0,'2012-03-12 16:47:25'),(5,60,10,1,2,0,'2012-03-12 16:47:25'),(6,254,10,1,2,0,'2012-03-12 16:47:25'),(7,255,10,1,20,0,'2012-03-12 16:47:25'),(8,256,10,1,20,0,'2012-03-12 16:47:25'),(9,257,10,1,2,0,'2012-03-12 16:47:25'),(10,239,10,1,4,0,'2012-03-12 16:47:25'),(11,258,10,15,2,0,'2012-03-12 16:47:25'),(12,259,10,15,2,0,'2012-03-12 16:47:25'),(13,247,10,14,2,0,'2012-03-12 16:47:25'),(14,245,10,14,2,0,'2012-03-12 16:47:25'),(15,243,10,14,2,0,'2012-03-12 16:47:25'),(16,241,10,14,2,0,'2012-03-12 16:47:25'),(17,429,10,1,2,0,'2012-03-12 16:47:25');
/*!40000 ALTER TABLE `Truck24_Personal_Safety` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Personal_Safety_checksheet`
--

DROP TABLE IF EXISTS `Truck24_Personal_Safety_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Personal_Safety_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Personal_Safety_checksheet`
--

LOCK TABLES `Truck24_Personal_Safety_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck24_Personal_Safety_checksheet` DISABLE KEYS */;
INSERT INTO `Truck24_Personal_Safety_checksheet` VALUES (1,1,248,'4','4',10,1),(2,1,249,'4','4',10,1),(3,1,250,'1','cb',10,1),(4,1,251,'1','cb',10,1),(5,1,60,'2','2',10,1),(6,1,254,'2','2',10,1),(7,1,255,'1','cb',10,1),(8,1,256,'1','cb',10,1),(9,1,257,'2','2',10,1),(10,1,239,'4','4',10,1),(11,1,429,'2','2',10,1),(12,1,258,'2','2',10,15),(13,1,259,'2','2',10,15),(14,1,247,'2','2',10,14),(15,1,245,'2','2',10,14),(16,1,243,'2','2',10,14),(17,1,241,'2','2',10,14);
/*!40000 ALTER TABLE `Truck24_Personal_Safety_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Personal_Safety_events`
--

DROP TABLE IF EXISTS `Truck24_Personal_Safety_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Personal_Safety_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Personal_Safety_events`
--

LOCK TABLES `Truck24_Personal_Safety_events` WRITE;
/*!40000 ALTER TABLE `Truck24_Personal_Safety_events` DISABLE KEYS */;
INSERT INTO `Truck24_Personal_Safety_events` VALUES (1,'2014-03-18 23:46:02',NULL,24,1);
/*!40000 ALTER TABLE `Truck24_Personal_Safety_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Pt_Transport`
--

DROP TABLE IF EXISTS `Truck24_Pt_Transport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Pt_Transport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Pt_Transport`
--

LOCK TABLES `Truck24_Pt_Transport` WRITE;
/*!40000 ALTER TABLE `Truck24_Pt_Transport` DISABLE KEYS */;
INSERT INTO `Truck24_Pt_Transport` VALUES (1,167,29,30,20,0,'2012-03-12 16:47:25'),(2,423,29,30,2,0,'2012-03-12 16:47:25'),(3,424,29,31,20,0,'2012-03-12 16:47:25'),(4,425,29,31,20,0,'2012-03-12 16:47:25'),(5,426,29,31,20,0,'2012-03-12 16:47:25'),(6,427,29,31,20,0,'2012-03-12 16:47:25');
/*!40000 ALTER TABLE `Truck24_Pt_Transport` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Pt_Transport_checksheet`
--

DROP TABLE IF EXISTS `Truck24_Pt_Transport_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Pt_Transport_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Pt_Transport_checksheet`
--

LOCK TABLES `Truck24_Pt_Transport_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck24_Pt_Transport_checksheet` DISABLE KEYS */;
INSERT INTO `Truck24_Pt_Transport_checksheet` VALUES (1,1,167,'1','cb',29,30),(2,1,423,'2','2',29,30),(3,1,424,'1','cb',29,31),(4,1,425,'1','cb',29,31),(5,1,426,'1','cb',29,31),(6,1,427,'1','cb',29,31);
/*!40000 ALTER TABLE `Truck24_Pt_Transport_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Pt_Transport_events`
--

DROP TABLE IF EXISTS `Truck24_Pt_Transport_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Pt_Transport_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Pt_Transport_events`
--

LOCK TABLES `Truck24_Pt_Transport_events` WRITE;
/*!40000 ALTER TABLE `Truck24_Pt_Transport_events` DISABLE KEYS */;
INSERT INTO `Truck24_Pt_Transport_events` VALUES (1,'2014-03-18 23:46:02',NULL,24,1);
/*!40000 ALTER TABLE `Truck24_Pt_Transport_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Suction`
--

DROP TABLE IF EXISTS `Truck24_Suction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Suction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Suction`
--

LOCK TABLES `Truck24_Suction` WRITE;
/*!40000 ALTER TABLE `Truck24_Suction` DISABLE KEYS */;
INSERT INTO `Truck24_Suction` VALUES (1,275,13,1,6,0,'2012-03-12 16:47:25'),(2,276,13,1,2,0,'2012-03-12 16:47:25'),(3,277,13,1,2,0,'2012-03-12 16:47:25'),(4,278,13,1,2,0,'2012-03-12 16:47:25'),(5,279,13,1,2,0,'2012-03-12 16:47:25'),(6,280,13,1,2,0,'2012-03-12 16:47:25'),(7,281,13,1,2,0,'2012-03-12 16:47:25'),(8,430,13,32,20,0,'2012-03-12 16:47:25'),(9,432,13,32,2,0,'2012-03-12 16:47:25'),(10,434,13,32,2,0,'2012-03-12 16:47:25'),(11,431,13,32,20,0,'2012-03-12 16:47:25'),(12,433,13,32,2,0,'2012-03-12 16:47:25'),(13,435,13,32,2,0,'2012-03-12 16:47:25');
/*!40000 ALTER TABLE `Truck24_Suction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Suction_checksheet`
--

DROP TABLE IF EXISTS `Truck24_Suction_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Suction_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Suction_checksheet`
--

LOCK TABLES `Truck24_Suction_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck24_Suction_checksheet` DISABLE KEYS */;
INSERT INTO `Truck24_Suction_checksheet` VALUES (1,1,275,'6','6',13,1),(2,1,276,'2','2',13,1),(3,1,277,'2','2',13,1),(4,1,278,'2','2',13,1),(5,1,279,'2','2',13,1),(6,1,280,'2','2',13,1),(7,1,281,'2','2',13,1),(8,1,430,'1','cb',13,32),(9,1,432,'2','2',13,32),(10,1,434,'2','2',13,32),(11,1,431,'1','cb',13,32),(12,1,433,'2','2',13,32),(13,1,435,'2','2',13,32);
/*!40000 ALTER TABLE `Truck24_Suction_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Suction_events`
--

DROP TABLE IF EXISTS `Truck24_Suction_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Suction_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Suction_events`
--

LOCK TABLES `Truck24_Suction_events` WRITE;
/*!40000 ALTER TABLE `Truck24_Suction_events` DISABLE KEYS */;
INSERT INTO `Truck24_Suction_events` VALUES (1,'2014-03-18 23:46:02',NULL,24,1);
/*!40000 ALTER TABLE `Truck24_Suction_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Toughbook`
--

DROP TABLE IF EXISTS `Truck24_Toughbook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Toughbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Toughbook`
--

LOCK TABLES `Truck24_Toughbook` WRITE;
/*!40000 ALTER TABLE `Truck24_Toughbook` DISABLE KEYS */;
INSERT INTO `Truck24_Toughbook` VALUES (1,240,30,1,20,0,'2012-03-12 16:47:25'),(2,242,30,1,20,0,'2012-03-12 16:47:25'),(3,244,30,28,20,0,'2012-03-12 16:47:25'),(4,421,30,28,20,0,'2012-03-12 16:47:25'),(5,422,30,28,20,0,'2012-03-12 16:47:25'),(6,470,30,28,20,0,'2012-03-12 16:47:25'),(7,246,30,28,20,0,'2012-03-12 16:47:25');
/*!40000 ALTER TABLE `Truck24_Toughbook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Toughbook_checksheet`
--

DROP TABLE IF EXISTS `Truck24_Toughbook_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Toughbook_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Toughbook_checksheet`
--

LOCK TABLES `Truck24_Toughbook_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck24_Toughbook_checksheet` DISABLE KEYS */;
INSERT INTO `Truck24_Toughbook_checksheet` VALUES (1,1,240,'1','cb',30,1),(2,1,242,'1','cb',30,1),(3,1,244,'1','cb',30,28),(4,1,421,'1','cb',30,28),(5,1,422,'1','cb',30,28),(6,1,470,'1','cb',30,28),(7,1,246,'1','cb',30,28);
/*!40000 ALTER TABLE `Truck24_Toughbook_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Toughbook_events`
--

DROP TABLE IF EXISTS `Truck24_Toughbook_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Toughbook_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Toughbook_events`
--

LOCK TABLES `Truck24_Toughbook_events` WRITE;
/*!40000 ALTER TABLE `Truck24_Toughbook_events` DISABLE KEYS */;
INSERT INTO `Truck24_Toughbook_events` VALUES (1,'2014-03-18 23:46:02',NULL,24,1);
/*!40000 ALTER TABLE `Truck24_Toughbook_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Trauma_Supplies`
--

DROP TABLE IF EXISTS `Truck24_Trauma_Supplies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Trauma_Supplies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Trauma_Supplies`
--

LOCK TABLES `Truck24_Trauma_Supplies` WRITE;
/*!40000 ALTER TABLE `Truck24_Trauma_Supplies` DISABLE KEYS */;
INSERT INTO `Truck24_Trauma_Supplies` VALUES (1,290,14,1,20,0,'2012-03-12 16:47:25'),(3,291,14,1,20,0,'2012-03-12 16:47:25'),(4,292,14,1,20,0,'2012-03-12 16:47:25'),(5,293,14,1,20,0,'2012-03-12 16:47:25'),(6,294,14,1,4,0,'2012-03-12 16:47:25'),(7,295,14,1,6,0,'2012-03-12 16:47:25'),(8,296,14,1,20,0,'2012-03-12 16:47:25'),(9,297,14,1,2,0,'2012-03-12 16:47:25'),(10,298,14,1,6,0,'2012-03-12 16:47:25'),(11,299,14,1,4,0,'2012-03-12 16:47:25'),(12,300,14,1,4,0,'2012-03-12 16:47:25'),(13,301,14,1,6,0,'2012-03-12 16:47:25'),(14,302,14,1,18,0,'2012-03-12 16:47:25'),(15,303,14,1,2,0,'2012-03-12 16:47:25'),(16,304,14,1,2,0,'2012-03-12 16:47:25');
/*!40000 ALTER TABLE `Truck24_Trauma_Supplies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Trauma_Supplies_checksheet`
--

DROP TABLE IF EXISTS `Truck24_Trauma_Supplies_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Trauma_Supplies_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Trauma_Supplies_checksheet`
--

LOCK TABLES `Truck24_Trauma_Supplies_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck24_Trauma_Supplies_checksheet` DISABLE KEYS */;
INSERT INTO `Truck24_Trauma_Supplies_checksheet` VALUES (1,1,290,'1','cb',14,1),(2,1,291,'1','cb',14,1),(3,1,292,'1','cb',14,1),(4,1,293,'1','cb',14,1),(5,1,294,'4','4',14,1),(6,1,295,'6','6',14,1),(7,1,296,'1','cb',14,1),(8,1,297,'2','2',14,1),(9,1,298,'6','6',14,1),(10,1,299,'4','4',14,1),(11,1,300,'4','4',14,1),(12,1,301,'6','6',14,1),(13,1,303,'2','2',14,1),(14,1,304,'2','2',14,1);
/*!40000 ALTER TABLE `Truck24_Trauma_Supplies_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_Trauma_Supplies_events`
--

DROP TABLE IF EXISTS `Truck24_Trauma_Supplies_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_Trauma_Supplies_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_Trauma_Supplies_events`
--

LOCK TABLES `Truck24_Trauma_Supplies_events` WRITE;
/*!40000 ALTER TABLE `Truck24_Trauma_Supplies_events` DISABLE KEYS */;
INSERT INTO `Truck24_Trauma_Supplies_events` VALUES (1,'2014-03-18 23:46:02',NULL,24,1);
/*!40000 ALTER TABLE `Truck24_Trauma_Supplies_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_checksheet`
--

DROP TABLE IF EXISTS `Truck24_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_checksheet`
--

LOCK TABLES `Truck24_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck24_checksheet` DISABLE KEYS */;
INSERT INTO `Truck24_checksheet` VALUES (1,1,1,'','miles',3,1),(2,1,2,'','miles',3,1),(3,1,4,'','refill',3,1),(4,1,6,'','refill',3,1),(5,1,7,'','refill',3,1),(6,1,175,'2','2',3,1),(7,1,176,'2','2',3,1),(8,1,177,'3','3',3,1),(9,1,178,'1','cb',3,1),(10,1,179,'1','cb',3,1),(11,1,180,'1','cb',3,1),(12,1,8,'','personnel',3,2),(13,1,9,'','personnel',3,2),(14,1,495,'','open',3,2),(15,1,104,'1','cb',3,20),(16,1,105,'1','cb',3,20),(17,1,106,'1','cb',3,20),(18,1,107,'1','cb',3,20),(19,1,108,'1','cb',3,20),(20,1,109,'1','cb',3,20),(21,1,130,'1','cb',3,21),(22,1,131,'1','cb',3,21),(23,1,132,'1','cb',3,21),(24,1,133,'1','cb',3,21),(25,1,134,'1','cb',3,21),(26,1,135,'1','cb',3,21),(27,1,136,'1','cb',3,21),(28,1,137,'1','cb',3,21),(29,1,138,'1','cb',3,21),(30,1,139,'1','cb',3,21),(31,1,140,'1','cb',3,21),(32,1,141,'1','cb',3,21),(33,1,283,'','tire',3,22),(34,1,284,'','open',3,22),(35,1,285,'','open',3,22),(36,1,286,'','open',3,22),(37,1,287,'','open',3,22),(38,1,288,'','open',3,22),(39,1,289,'','open',3,22),(40,1,331,'1','cb',3,23),(41,1,332,'1','cb',3,23),(42,1,333,'1','cb',3,23),(43,1,334,'1','cb',3,23),(44,1,335,'1','cb',3,23),(45,1,336,'1','cb',3,23),(46,1,337,'1','cb',3,23);
/*!40000 ALTER TABLE `Truck24_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck24_events`
--

DROP TABLE IF EXISTS `Truck24_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck24_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck24_events`
--

LOCK TABLES `Truck24_events` WRITE;
/*!40000 ALTER TABLE `Truck24_events` DISABLE KEYS */;
INSERT INTO `Truck24_events` VALUES (1,'2014-02-08 11:33:46',NULL,0,0);
/*!40000 ALTER TABLE `Truck24_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck2_Airway_Box`
--

DROP TABLE IF EXISTS `Truck2_Airway_Box`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck2_Airway_Box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck2_Airway_Box`
--

LOCK TABLES `Truck2_Airway_Box` WRITE;
/*!40000 ALTER TABLE `Truck2_Airway_Box` DISABLE KEYS */;
INSERT INTO `Truck2_Airway_Box` VALUES (1,11,27,1,20,0,'2012-03-12 16:47:27'),(2,50,27,1,20,0,'2012-03-12 16:47:27'),(3,51,27,1,5,0,'2012-03-12 16:47:27'),(7,42,27,1,2,0,'2012-03-12 16:47:27'),(10,27,27,1,20,0,'2012-03-12 16:47:27'),(11,10,27,1,20,0,'2012-03-12 16:47:27'),(28,29,27,4,20,0,'2012-03-12 16:47:27'),(29,30,27,4,20,0,'2012-03-12 16:47:27'),(30,31,27,4,20,0,'2012-03-12 16:47:27'),(31,32,27,4,20,0,'2012-03-12 16:47:27'),(32,33,27,4,20,0,'2012-03-12 16:47:27'),(33,34,27,5,20,0,'2012-03-12 16:47:27'),(34,35,27,5,20,0,'2012-03-12 16:47:27'),(35,36,27,5,20,0,'2012-03-12 16:47:27'),(36,37,27,5,20,0,'2012-03-12 16:47:27'),(37,38,27,5,20,0,'2012-03-12 16:47:27'),(38,44,27,6,2,0,'2012-03-12 16:47:27'),(39,45,27,6,2,0,'2012-03-12 16:47:27'),(40,46,27,6,2,0,'2012-03-12 16:47:27'),(41,47,27,6,2,0,'2012-03-12 16:47:27'),(42,48,27,6,2,0,'2012-03-12 16:47:27'),(43,49,27,6,2,0,'2012-03-12 16:47:27'),(46,28,27,1,20,0,'2012-03-12 16:47:27'),(47,428,27,1,20,0,'2012-03-12 16:47:27'),(48,26,27,1,2,0,'2012-03-12 16:47:27'),(49,62,27,32,2,0,'2012-04-22 15:48:16'),(50,101,27,1,2,0,'2012-04-22 15:51:02'),(51,52,27,32,7,0,'2012-04-22 15:51:02'),(53,53,27,32,3,0,'2012-04-22 15:53:15'),(54,96,27,1,20,0,'2012-04-22 15:56:07'),(55,55,27,32,4,0,'2012-04-22 15:56:07'),(56,98,27,1,20,0,'2012-04-22 15:58:16'),(57,74,27,32,2,0,'2012-04-22 15:58:16'),(58,92,27,32,20,0,'2012-04-22 15:59:53'),(59,41,27,1,4,0,'2012-04-22 16:02:13'),(60,93,27,32,2,0,'2012-04-22 16:02:13'),(61,64,27,32,20,0,'2012-04-22 16:03:32'),(62,72,27,32,20,0,'2012-04-22 16:05:46'),(63,69,27,32,20,0,'2012-04-22 16:06:56'),(64,484,27,1,4,0,'2012-04-22 16:07:20');
/*!40000 ALTER TABLE `Truck2_Airway_Box` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck2_Airway_Box_checksheet`
--

DROP TABLE IF EXISTS `Truck2_Airway_Box_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck2_Airway_Box_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck2_Airway_Box_checksheet`
--

LOCK TABLES `Truck2_Airway_Box_checksheet` WRITE;
/*!40000 ALTER TABLE `Truck2_Airway_Box_checksheet` DISABLE KEYS */;
INSERT INTO `Truck2_Airway_Box_checksheet` VALUES (1,1,11,'1','cb',27,1),(2,1,50,'1','cb',27,1),(3,1,51,'5','5',27,1),(4,1,42,'2','2',27,1),(5,1,27,'1','cb',27,1),(6,1,10,'1','cb',27,1),(7,1,28,'1','cb',27,1),(8,1,428,'1','cb',27,1),(9,1,26,'2','2',27,1),(10,1,101,'2','2',27,1),(11,1,96,'1','cb',27,1),(12,1,98,'1','cb',27,1),(13,1,41,'4','4',27,1),(14,1,484,'4','4',27,1),(15,1,29,'1','cb',27,4),(16,1,30,'1','cb',27,4),(17,1,31,'1','cb',27,4),(18,1,32,'1','cb',27,4),(19,1,33,'1','cb',27,4),(20,1,34,'1','cb',27,5),(21,1,35,'1','cb',27,5),(22,1,36,'1','cb',27,5),(23,1,37,'1','cb',27,5),(24,1,38,'1','cb',27,5),(25,1,44,'2','2',27,6),(26,1,45,'2','2',27,6),(27,1,46,'2','2',27,6),(28,1,47,'2','2',27,6),(29,1,48,'2','2',27,6),(30,1,49,'2','2',27,6),(31,1,62,'2','2',27,32),(32,1,52,'7','7',27,32),(33,1,53,'3','3',27,32),(34,1,55,'4','4',27,32),(35,1,74,'2','2',27,32),(36,1,92,'1','cb',27,32),(37,1,93,'2','2',27,32),(38,1,64,'1','cb',27,32),(39,1,72,'1','cb',27,32),(40,1,69,'1','cb',27,32);
/*!40000 ALTER TABLE `Truck2_Airway_Box_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Truck2_Airway_Box_events`
--

DROP TABLE IF EXISTS `Truck2_Airway_Box_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Truck2_Airway_Box_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Truck2_Airway_Box_events`
--

LOCK TABLES `Truck2_Airway_Box_events` WRITE;
/*!40000 ALTER TABLE `Truck2_Airway_Box_events` DISABLE KEYS */;
INSERT INTO `Truck2_Airway_Box_events` VALUES (1,'2014-03-18 23:46:47',NULL,0,0);
/*!40000 ALTER TABLE `Truck2_Airway_Box_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Zoll_24`
--

DROP TABLE IF EXISTS `Zoll_24`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Zoll_24` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Zoll_24`
--

LOCK TABLES `Zoll_24` WRITE;
/*!40000 ALTER TABLE `Zoll_24` DISABLE KEYS */;
INSERT INTO `Zoll_24` VALUES (1,381,39,1,2,0,'2012-03-12 16:47:25'),(2,491,39,1,20,0,'2012-03-12 16:47:25'),(3,382,39,1,20,0,'2012-03-12 16:47:25'),(4,377,39,1,2,0,'2012-03-12 16:47:25'),(5,393,39,1,2,0,'2012-03-12 16:47:25'),(6,490,39,1,2,0,'2012-03-12 16:47:25'),(7,493,39,1,2,0,'2012-03-12 16:47:25'),(11,391,39,1,10,0,'2012-03-12 16:47:25'),(10,390,39,1,10,0,'2012-03-12 16:47:25'),(12,379,39,1,2,0,'2012-03-12 16:47:25'),(13,488,39,1,2,0,'2012-03-12 16:47:25'),(14,392,39,1,20,0,'2012-03-12 16:47:25');
/*!40000 ALTER TABLE `Zoll_24` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Zoll_24_checksheet`
--

DROP TABLE IF EXISTS `Zoll_24_checksheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Zoll_24_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Zoll_24_checksheet`
--

LOCK TABLES `Zoll_24_checksheet` WRITE;
/*!40000 ALTER TABLE `Zoll_24_checksheet` DISABLE KEYS */;
INSERT INTO `Zoll_24_checksheet` VALUES (1,1,381,'2','2',39,1),(2,1,491,'1','cb',39,1),(3,1,382,'1','cb',39,1),(4,1,377,'2','2',39,1),(5,1,393,'2','2',39,1),(6,1,490,'2','2',39,1),(7,1,493,'2','2',39,1),(8,1,391,'10','10',39,1),(9,1,390,'10','10',39,1),(10,1,379,'2','2',39,1),(11,1,488,'2','2',39,1),(12,1,392,'1','cb',39,1);
/*!40000 ALTER TABLE `Zoll_24_checksheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Zoll_24_events`
--

DROP TABLE IF EXISTS `Zoll_24_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Zoll_24_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Zoll_24_events`
--

LOCK TABLES `Zoll_24_events` WRITE;
/*!40000 ALTER TABLE `Zoll_24_events` DISABLE KEYS */;
INSERT INTO `Zoll_24_events` VALUES (1,'2014-03-18 23:46:02',NULL,24,1);
/*!40000 ALTER TABLE `Zoll_24_events` ENABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=188 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_user`
--

LOCK TABLES `_user` WRITE;
/*!40000 ALTER TABLE `_user` DISABLE KEYS */;
INSERT INTO `_user` VALUES (1,'Administrator','359e14d5e440ac16c309053bd0967c87d236cf87','2009-04-06 18:12:22','James','Garbe',1,0,''),(185,'cheddar','bcef7a046258082993759bade995b3ae8bee26c7','2013-10-30 19:53:06','','',1,0,'cheddar@cheese.com'),(183,'kilgore_trout','08570a57d71dbb872c39ca9bd14a82215a908e78','2013-10-30 15:40:08','','',2,0,'kurt@vonnegut.com'),(182,'cheese','2e212ebba9302a65e9fd21f6772368fe60592fe8','2013-10-30 15:39:28','','',2,0,'cheesey@localhost'),(186,'jimgarbe','359e14d5e440ac16c309053bd0967c87d236cf87','2014-02-25 15:42:19','','',2,1,'jimgarbe@gmail.com'),(187,'kcornett','e961b6763fbeb2e02fa3978ee28b854b87d96926','2014-02-26 17:28:55','','',1,0,'kennycornett2@gmail.com');
/*!40000 ALTER TABLE `_user` ENABLE KEYS */;
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB AUTO_INCREMENT=483 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sealedlist`
--

LOCK TABLES `sealedlist` WRITE;
/*!40000 ALTER TABLE `sealedlist` DISABLE KEYS */;
INSERT INTO `sealedlist` VALUES (1,1001,50,'2014-07-22 00:00:00',0),(2,1001,27,'2015-11-27 00:00:00',0),(3,1001,28,'2015-10-23 00:00:00',0),(4,1001,96,'2014-09-16 00:00:00',0),(5,1001,29,'2015-06-05 00:00:00',0),(6,1001,30,'2016-01-18 00:00:00',0),(7,1001,31,'2015-10-05 00:00:00',0),(8,1001,32,'2015-02-22 00:00:00',0),(9,1001,33,'2015-10-08 00:00:00',0),(10,1001,44,'2015-11-13 00:00:00',0),(11,1001,44,'2015-06-05 00:00:00',0),(12,1001,45,'2015-07-31 00:00:00',0),(13,1001,45,'2015-01-17 00:00:00',0),(14,1001,46,'2015-11-11 00:00:00',0),(15,1001,46,'2014-09-14 00:00:00',0),(16,1001,47,'2016-01-04 00:00:00',0),(17,1001,47,'2015-05-27 00:00:00',0),(18,1001,48,'2015-12-31 00:00:00',0),(19,1001,48,'2014-06-07 00:00:00',0),(20,1001,49,'2014-11-16 00:00:00',0),(21,1001,49,'2015-09-18 00:00:00',0),(22,1001,62,'2014-08-08 00:00:00',0),(23,1001,62,'2015-02-12 00:00:00',0),(24,1001,52,'2014-04-02 00:00:00',0),(25,1001,52,'2014-05-07 00:00:00',0),(26,1001,52,'2015-02-22 00:00:00',0),(27,1001,52,'2015-04-10 00:00:00',0),(28,1001,52,'2016-03-05 00:00:00',0),(29,1001,52,'2016-01-28 00:00:00',0),(30,1001,52,'2014-06-22 00:00:00',0),(31,1001,53,'2014-07-10 00:00:00',0),(32,1001,53,'2015-01-01 00:00:00',0),(33,1001,53,'2015-11-26 00:00:00',0),(34,1001,55,'2015-11-17 00:00:00',0),(35,1001,55,'2014-07-30 00:00:00',0),(36,1001,55,'2014-07-10 00:00:00',0),(37,1001,55,'2015-09-27 00:00:00',0),(38,1001,74,'2014-09-08 00:00:00',0),(39,1001,74,'2015-07-14 00:00:00',0),(40,1001,92,'2014-12-24 00:00:00',0),(41,1001,93,'2014-09-10 00:00:00',0),(42,1001,93,'2015-08-22 00:00:00',0),(43,1001,64,'2015-09-30 00:00:00',0),(44,1001,72,'2014-11-25 00:00:00',0),(45,1001,69,'2014-12-20 00:00:00',0),(46,1001,11,'0000-00-00 00:00:00',1),(47,1001,51,'0000-00-00 00:00:00',5),(48,1001,484,'0000-00-00 00:00:00',4),(49,1001,41,'0000-00-00 00:00:00',4),(50,1001,42,'0000-00-00 00:00:00',2),(51,1001,428,'0000-00-00 00:00:00',1),(52,1001,10,'0000-00-00 00:00:00',1),(53,1001,26,'0000-00-00 00:00:00',2),(54,1001,101,'0000-00-00 00:00:00',2),(55,1001,98,'0000-00-00 00:00:00',1),(56,1001,34,'0000-00-00 00:00:00',1),(57,1001,35,'0000-00-00 00:00:00',1),(58,1001,36,'0000-00-00 00:00:00',1),(59,1001,37,'0000-00-00 00:00:00',1),(60,1001,38,'0000-00-00 00:00:00',1),(61,1004,52,'2015-11-10 00:00:00',0),(62,1004,52,'2014-10-31 00:00:00',0),(63,1004,52,'2014-04-07 00:00:00',0),(64,1004,52,'2014-05-13 00:00:00',0),(65,1004,52,'2016-02-25 00:00:00',0),(66,1004,52,'2015-03-19 00:00:00',0),(67,1004,52,'2014-07-10 00:00:00',0),(68,1004,52,'2014-09-28 00:00:00',0),(69,1004,52,'2015-07-24 00:00:00',0),(70,1004,52,'2015-07-07 00:00:00',0),(71,1004,53,'2014-12-11 00:00:00',0),(72,1004,53,'2014-09-13 00:00:00',0),(73,1004,53,'2014-09-14 00:00:00',0),(74,1004,53,'2014-07-01 00:00:00',0),(75,1004,54,'2015-06-16 00:00:00',0),(76,1004,54,'2015-12-01 00:00:00',0),(77,1004,55,'2014-05-05 00:00:00',0),(78,1004,55,'2015-05-07 00:00:00',0),(79,1004,55,'2015-09-01 00:00:00',0),(80,1004,55,'2015-12-27 00:00:00',0),(81,1004,56,'2016-02-05 00:00:00',0),(82,1004,57,'2014-06-30 00:00:00',0),(83,1004,58,'2014-06-24 00:00:00',0),(84,1004,92,'2015-12-02 00:00:00',0),(85,1004,93,'2015-04-08 00:00:00',0),(86,1004,93,'2014-05-04 00:00:00',0),(87,1004,94,'2015-05-18 00:00:00',0),(88,1004,95,'2015-12-20 00:00:00',0),(89,1004,97,'2014-11-17 00:00:00',0),(90,1004,60,'2015-02-28 00:00:00',0),(91,1004,60,'2014-05-16 00:00:00',0),(92,1004,60,'2014-10-10 00:00:00',0),(93,1004,60,'2014-07-23 00:00:00',0),(94,1004,60,'2015-03-16 00:00:00',0),(95,1004,60,'2014-06-14 00:00:00',0),(96,1004,61,'2015-01-18 00:00:00',0),(97,1004,61,'2015-01-11 00:00:00',0),(98,1004,61,'2015-08-23 00:00:00',0),(99,1004,61,'2014-11-12 00:00:00',0),(100,1004,62,'2015-04-01 00:00:00',0),(101,1004,62,'2014-05-02 00:00:00',0),(102,1004,63,'2014-05-12 00:00:00',0),(103,1004,63,'2015-01-12 00:00:00',0),(104,1004,66,'2015-06-27 00:00:00',0),(105,1004,66,'2014-08-05 00:00:00',0),(106,1004,66,'2015-02-23 00:00:00',0),(107,1004,66,'2016-02-26 00:00:00',0),(108,1004,66,'2014-05-01 00:00:00',0),(109,1004,67,'2015-09-20 00:00:00',0),(110,1004,68,'2016-02-20 00:00:00',0),(111,1004,68,'2015-12-09 00:00:00',0),(112,1004,69,'2014-10-01 00:00:00',0),(113,1004,72,'2015-12-05 00:00:00',0),(114,1004,73,'2014-12-25 00:00:00',0),(115,1004,74,'2015-04-27 00:00:00',0),(116,1004,74,'2014-10-30 00:00:00',0),(117,1004,74,'2015-02-16 00:00:00',0),(118,1004,74,'2015-09-14 00:00:00',0),(119,1004,74,'2015-10-06 00:00:00',0),(120,1004,74,'2015-02-06 00:00:00',0),(121,1004,64,'2015-05-18 00:00:00',0),(122,1004,64,'2015-07-19 00:00:00',0),(123,1004,508,'2015-10-27 00:00:00',0),(124,1004,508,'2015-11-22 00:00:00',0),(125,1004,87,'2014-09-19 00:00:00',0),(126,1004,87,'2015-10-28 00:00:00',0),(127,1004,88,'2015-02-21 00:00:00',0),(128,1004,88,'2015-11-06 00:00:00',0),(129,1004,89,'2014-04-13 00:00:00',0),(130,1004,89,'2015-02-02 00:00:00',0),(131,1004,90,'2015-07-01 00:00:00',0),(132,1004,90,'2015-03-16 00:00:00',0),(133,1004,96,'2015-10-12 00:00:00',0),(134,1004,59,'2014-05-24 00:00:00',0),(135,1004,44,'2014-06-04 00:00:00',0),(136,1004,44,'2014-05-12 00:00:00',0),(137,1004,45,'2014-06-10 00:00:00',0),(138,1004,45,'2015-01-29 00:00:00',0),(139,1004,46,'2015-05-26 00:00:00',0),(140,1004,46,'2014-07-25 00:00:00',0),(141,1004,47,'2015-04-06 00:00:00',0),(142,1004,47,'2016-02-17 00:00:00',0),(143,1004,48,'2015-01-19 00:00:00',0),(144,1004,48,'2015-10-02 00:00:00',0),(145,1004,49,'2014-06-11 00:00:00',0),(146,1004,49,'2014-04-29 00:00:00',0),(147,1004,101,'0000-00-00 00:00:00',2),(148,1004,85,'0000-00-00 00:00:00',10),(149,1004,86,'0000-00-00 00:00:00',10),(150,1004,91,'0000-00-00 00:00:00',10),(151,1004,98,'0000-00-00 00:00:00',1),(152,1004,99,'0000-00-00 00:00:00',1),(153,1004,102,'0000-00-00 00:00:00',1),(154,1004,81,'0000-00-00 00:00:00',2),(155,1004,82,'0000-00-00 00:00:00',2),(156,1004,41,'0000-00-00 00:00:00',2),(157,1004,84,'0000-00-00 00:00:00',5),(158,1004,103,'0000-00-00 00:00:00',1),(159,1004,65,'0000-00-00 00:00:00',2),(160,1005,481,'0000-00-00 00:00:00',2),(161,1005,155,'0000-00-00 00:00:00',2),(162,1005,477,'0000-00-00 00:00:00',1),(163,1005,478,'0000-00-00 00:00:00',2),(164,1005,474,'0000-00-00 00:00:00',2),(165,1005,475,'0000-00-00 00:00:00',2),(166,1005,154,'0000-00-00 00:00:00',2),(167,1012,213,'2015-03-31 00:00:00',0),(168,1012,213,'2015-01-26 00:00:00',0),(169,1012,214,'2015-09-23 00:00:00',0),(170,1012,214,'2014-10-29 00:00:00',0),(171,1012,419,'2015-09-12 00:00:00',0),(172,1012,54,'2015-04-22 00:00:00',0),(173,1012,53,'2014-04-07 00:00:00',0),(174,1012,97,'2016-01-08 00:00:00',0),(175,1012,64,'2014-11-03 00:00:00',0),(176,1012,52,'2015-08-27 00:00:00',0),(177,1012,69,'2015-12-16 00:00:00',0),(178,1012,230,'2015-10-10 00:00:00',0),(179,1012,230,'2015-05-19 00:00:00',0),(180,1012,231,'2015-12-02 00:00:00',0),(181,1012,231,'2016-01-22 00:00:00',0),(182,1012,232,'2015-04-17 00:00:00',0),(183,1012,232,'2015-07-08 00:00:00',0),(184,1012,233,'2015-02-22 00:00:00',0),(185,1012,233,'2015-06-03 00:00:00',0),(186,1012,234,'2015-04-06 00:00:00',0),(187,1012,234,'2014-06-16 00:00:00',0),(188,1012,235,'2014-06-11 00:00:00',0),(189,1012,235,'2014-03-22 00:00:00',0),(190,1012,236,'2016-02-04 00:00:00',0),(191,1012,236,'2014-07-07 00:00:00',0),(192,1012,237,'2015-02-05 00:00:00',0),(193,1012,237,'2014-08-17 00:00:00',0),(194,1012,238,'2016-02-15 00:00:00',0),(195,1012,238,'2014-03-27 00:00:00',0),(196,1012,215,'0000-00-00 00:00:00',1),(197,1012,85,'0000-00-00 00:00:00',10),(198,1012,42,'0000-00-00 00:00:00',1),(199,1012,212,'0000-00-00 00:00:00',1),(200,1012,225,'0000-00-00 00:00:00',1),(201,1012,227,'0000-00-00 00:00:00',1),(202,1012,228,'0000-00-00 00:00:00',1),(203,1012,229,'0000-00-00 00:00:00',1),(204,1012,219,'0000-00-00 00:00:00',1),(205,1012,218,'0000-00-00 00:00:00',1),(206,1012,220,'0000-00-00 00:00:00',1),(207,1012,221,'0000-00-00 00:00:00',1),(208,1012,222,'0000-00-00 00:00:00',1),(209,1012,223,'0000-00-00 00:00:00',1),(210,1012,224,'0000-00-00 00:00:00',2),(211,1012,226,'0000-00-00 00:00:00',1),(212,1012,507,'0000-00-00 00:00:00',2),(213,1015,260,'2016-01-08 00:00:00',0),(214,1015,260,'2015-11-06 00:00:00',0),(215,1015,262,'2015-03-24 00:00:00',0),(216,1015,262,'2015-04-26 00:00:00',0),(217,1015,263,'2015-05-24 00:00:00',0),(218,1015,263,'2014-07-24 00:00:00',0),(219,1015,420,'2016-01-05 00:00:00',0),(220,1015,420,'2014-06-27 00:00:00',0),(221,1015,265,'2015-05-14 00:00:00',0),(222,1015,265,'2014-07-14 00:00:00',0),(223,1015,266,'2015-06-10 00:00:00',0),(224,1015,266,'2014-04-24 00:00:00',0),(225,1015,261,'2015-02-12 00:00:00',0),(226,1015,261,'2015-06-29 00:00:00',0),(227,1015,103,'0000-00-00 00:00:00',1),(228,1018,315,'2014-04-11 00:00:00',0),(229,1018,96,'2014-09-06 00:00:00',0),(230,1018,44,'2014-08-18 00:00:00',0),(231,1018,44,'2015-08-11 00:00:00',0),(232,1018,44,'2014-07-09 00:00:00',0),(233,1018,44,'2014-11-11 00:00:00',0),(234,1018,44,'2015-08-14 00:00:00',0),(235,1018,45,'2014-06-06 00:00:00',0),(236,1018,45,'2015-03-01 00:00:00',0),(237,1018,45,'2014-07-14 00:00:00',0),(238,1018,45,'2014-11-05 00:00:00',0),(239,1018,45,'2015-02-08 00:00:00',0),(240,1018,46,'2014-07-22 00:00:00',0),(241,1018,46,'2015-11-17 00:00:00',0),(242,1018,46,'2015-12-18 00:00:00',0),(243,1018,46,'2016-01-26 00:00:00',0),(244,1018,46,'2014-07-09 00:00:00',0),(245,1018,47,'2015-09-28 00:00:00',0),(246,1018,47,'2015-04-02 00:00:00',0),(247,1018,47,'2014-11-04 00:00:00',0),(248,1018,47,'2015-07-27 00:00:00',0),(249,1018,47,'2015-07-12 00:00:00',0),(250,1018,42,'0000-00-00 00:00:00',2),(251,1018,306,'0000-00-00 00:00:00',2),(252,1018,86,'0000-00-00 00:00:00',1),(253,1018,297,'0000-00-00 00:00:00',2),(254,1018,300,'0000-00-00 00:00:00',2),(255,1018,295,'0000-00-00 00:00:00',2),(256,1018,298,'0000-00-00 00:00:00',9),(257,1018,301,'0000-00-00 00:00:00',6),(258,1018,307,'0000-00-00 00:00:00',1),(259,1018,308,'0000-00-00 00:00:00',1),(260,1018,149,'0000-00-00 00:00:00',1),(261,1018,310,'0000-00-00 00:00:00',1),(262,1018,51,'0000-00-00 00:00:00',5),(263,1018,85,'0000-00-00 00:00:00',1),(264,1018,98,'0000-00-00 00:00:00',1),(265,1018,101,'0000-00-00 00:00:00',1),(266,1018,116,'0000-00-00 00:00:00',1),(267,1018,118,'0000-00-00 00:00:00',1),(268,1023,12,'2015-03-26 00:00:00',0),(269,1023,18,'2014-06-17 00:00:00',0),(270,1023,18,'2015-12-17 00:00:00',0),(271,1023,19,'2014-06-28 00:00:00',0),(272,1023,19,'2014-07-24 00:00:00',0),(273,1023,20,'2015-01-02 00:00:00',0),(274,1023,20,'2015-08-05 00:00:00',0),(275,1023,21,'2015-09-29 00:00:00',0),(276,1023,21,'2015-05-09 00:00:00',0),(277,1023,23,'2014-10-12 00:00:00',0),(278,1023,23,'2015-12-19 00:00:00',0),(279,1023,24,'2014-11-03 00:00:00',0),(280,1023,24,'2014-03-19 00:00:00',0),(281,1023,22,'2015-08-29 00:00:00',0),(282,1023,22,'2016-02-29 00:00:00',0),(283,1023,39,'0000-00-00 00:00:00',1),(284,1023,484,'0000-00-00 00:00:00',6),(285,1023,42,'0000-00-00 00:00:00',1),(286,1023,43,'0000-00-00 00:00:00',1),(287,1023,558,'0000-00-00 00:00:00',2),(288,1023,13,'0000-00-00 00:00:00',1),(289,1023,14,'0000-00-00 00:00:00',1),(290,1023,16,'0000-00-00 00:00:00',1),(291,1023,15,'0000-00-00 00:00:00',1),(292,1023,17,'0000-00-00 00:00:00',1),(293,1023,25,'0000-00-00 00:00:00',2),(294,1022,55,'2014-10-07 00:00:00',0),(295,1022,127,'2014-11-07 00:00:00',0),(296,1022,513,'2014-07-17 00:00:00',0),(297,1022,513,'2014-06-30 00:00:00',0),(298,1022,510,'2014-03-19 00:00:00',0),(299,1022,510,'2015-10-16 00:00:00',0),(300,1022,511,'2014-07-15 00:00:00',0),(301,1022,511,'2014-11-06 00:00:00',0),(302,1022,512,'2014-09-18 00:00:00',0),(303,1022,512,'2014-11-17 00:00:00',0),(304,1022,509,'0000-00-00 00:00:00',1),(305,1022,118,'0000-00-00 00:00:00',1),(306,1022,41,'0000-00-00 00:00:00',1),(307,1,391,'0000-00-00 00:00:00',0),(308,1,391,'0000-00-00 00:00:00',0),(309,1,391,'0000-00-00 00:00:00',0),(310,1,391,'0000-00-00 00:00:00',0),(311,1,391,'0000-00-00 00:00:00',0),(312,1,391,'0000-00-00 00:00:00',0),(313,1,391,'0000-00-00 00:00:00',0),(314,1,391,'0000-00-00 00:00:00',0),(315,1,391,'0000-00-00 00:00:00',0),(316,1,391,'0000-00-00 00:00:00',0),(317,1,411,'0000-00-00 00:00:00',0),(318,1,411,'0000-00-00 00:00:00',0),(319,1,412,'0000-00-00 00:00:00',0),(320,1,412,'0000-00-00 00:00:00',0),(321,1,254,'0000-00-00 00:00:00',0),(322,1,254,'0000-00-00 00:00:00',0),(323,1,153,'0000-00-00 00:00:00',0),(324,1,160,'0000-00-00 00:00:00',0),(325,1,96,'0000-00-00 00:00:00',0),(326,1,96,'0000-00-00 00:00:00',0),(327,1,96,'0000-00-00 00:00:00',0),(328,1,96,'0000-00-00 00:00:00',0),(329,1,96,'0000-00-00 00:00:00',0),(330,1,96,'0000-00-00 00:00:00',0),(331,1,127,'0000-00-00 00:00:00',0),(332,1,127,'0000-00-00 00:00:00',0),(333,1,127,'0000-00-00 00:00:00',0),(334,1,127,'0000-00-00 00:00:00',0),(335,1,127,'0000-00-00 00:00:00',0),(336,1,127,'0000-00-00 00:00:00',0),(337,1,127,'0000-00-00 00:00:00',0),(338,1,127,'0000-00-00 00:00:00',0),(339,1,127,'0000-00-00 00:00:00',0),(340,1,127,'0000-00-00 00:00:00',0),(341,1,528,'0000-00-00 00:00:00',0),(342,1,528,'0000-00-00 00:00:00',0),(343,1,528,'0000-00-00 00:00:00',0),(344,1,528,'0000-00-00 00:00:00',0),(345,1,528,'0000-00-00 00:00:00',0),(346,1,528,'0000-00-00 00:00:00',0),(347,1,528,'0000-00-00 00:00:00',0),(348,1,528,'0000-00-00 00:00:00',0),(349,1,528,'0000-00-00 00:00:00',0),(350,1,528,'0000-00-00 00:00:00',0),(351,1,44,'0000-00-00 00:00:00',0),(352,1,44,'0000-00-00 00:00:00',0),(353,1,44,'0000-00-00 00:00:00',0),(354,1,44,'0000-00-00 00:00:00',0),(355,1,44,'0000-00-00 00:00:00',0),(356,1,44,'0000-00-00 00:00:00',0),(357,1,44,'0000-00-00 00:00:00',0),(358,1,44,'0000-00-00 00:00:00',0),(359,1,44,'0000-00-00 00:00:00',0),(360,1,44,'0000-00-00 00:00:00',0),(361,1,45,'0000-00-00 00:00:00',0),(362,1,45,'0000-00-00 00:00:00',0),(363,1,45,'0000-00-00 00:00:00',0),(364,1,45,'0000-00-00 00:00:00',0),(365,1,45,'0000-00-00 00:00:00',0),(366,1,45,'0000-00-00 00:00:00',0),(367,1,45,'0000-00-00 00:00:00',0),(368,1,45,'0000-00-00 00:00:00',0),(369,1,45,'0000-00-00 00:00:00',0),(370,1,45,'0000-00-00 00:00:00',0),(371,1,46,'0000-00-00 00:00:00',0),(372,1,46,'0000-00-00 00:00:00',0),(373,1,46,'0000-00-00 00:00:00',0),(374,1,46,'0000-00-00 00:00:00',0),(375,1,46,'0000-00-00 00:00:00',0),(376,1,46,'0000-00-00 00:00:00',0),(377,1,46,'0000-00-00 00:00:00',0),(378,1,46,'0000-00-00 00:00:00',0),(379,1,46,'0000-00-00 00:00:00',0),(380,1,46,'0000-00-00 00:00:00',0),(381,1,47,'0000-00-00 00:00:00',0),(382,1,47,'0000-00-00 00:00:00',0),(383,1,47,'0000-00-00 00:00:00',0),(384,1,47,'0000-00-00 00:00:00',0),(385,1,47,'0000-00-00 00:00:00',0),(386,1,47,'0000-00-00 00:00:00',0),(387,1,47,'0000-00-00 00:00:00',0),(388,1,47,'0000-00-00 00:00:00',0),(389,1,47,'0000-00-00 00:00:00',0),(390,1,47,'0000-00-00 00:00:00',0),(391,1,48,'0000-00-00 00:00:00',0),(392,1,48,'0000-00-00 00:00:00',0),(393,1,48,'0000-00-00 00:00:00',0),(394,1,48,'0000-00-00 00:00:00',0),(395,1,48,'0000-00-00 00:00:00',0),(396,1,48,'0000-00-00 00:00:00',0),(397,1,48,'0000-00-00 00:00:00',0),(398,1,48,'0000-00-00 00:00:00',0),(399,1,48,'0000-00-00 00:00:00',0),(400,1,48,'0000-00-00 00:00:00',0),(401,1,49,'0000-00-00 00:00:00',0),(402,1,49,'0000-00-00 00:00:00',0),(403,1,49,'0000-00-00 00:00:00',0),(404,1,49,'0000-00-00 00:00:00',0),(405,1,49,'0000-00-00 00:00:00',0),(406,1,49,'0000-00-00 00:00:00',0),(407,1,49,'0000-00-00 00:00:00',0),(408,1,49,'0000-00-00 00:00:00',0),(409,1,49,'0000-00-00 00:00:00',0),(410,1,49,'0000-00-00 00:00:00',0),(411,1017,290,'0000-00-00 00:00:00',0),(412,1017,562,'0000-00-00 00:00:00',0),(413,1017,562,'0000-00-00 00:00:00',0),(414,1017,562,'0000-00-00 00:00:00',0),(415,1017,562,'0000-00-00 00:00:00',0),(416,24005,481,'0000-00-00 00:00:00',2),(417,24005,155,'0000-00-00 00:00:00',2),(418,24005,477,'0000-00-00 00:00:00',1),(419,24005,478,'0000-00-00 00:00:00',2),(420,24005,474,'0000-00-00 00:00:00',2),(421,24005,475,'0000-00-00 00:00:00',2),(422,24005,154,'0000-00-00 00:00:00',2),(423,2001,50,'2015-05-14 00:00:00',0),(424,2001,27,'2016-01-26 00:00:00',0),(425,2001,28,'2015-03-27 00:00:00',0),(426,2001,96,'2015-12-24 00:00:00',0),(427,2001,29,'2014-06-30 00:00:00',0),(428,2001,30,'2015-11-19 00:00:00',0),(429,2001,31,'2015-06-01 00:00:00',0),(430,2001,32,'2016-01-21 00:00:00',0),(431,2001,33,'2015-10-08 00:00:00',0),(432,2001,44,'2014-03-21 00:00:00',0),(433,2001,44,'2015-07-31 00:00:00',0),(434,2001,45,'2014-06-10 00:00:00',0),(435,2001,45,'2014-12-28 00:00:00',0),(436,2001,46,'2014-04-08 00:00:00',0),(437,2001,46,'2015-08-20 00:00:00',0),(438,2001,47,'2014-10-22 00:00:00',0),(439,2001,47,'2015-12-17 00:00:00',0),(440,2001,48,'2014-06-10 00:00:00',0),(441,2001,48,'2014-07-09 00:00:00',0),(442,2001,49,'2015-09-20 00:00:00',0),(443,2001,49,'2015-05-27 00:00:00',0),(444,2001,62,'2015-11-24 00:00:00',0),(445,2001,62,'2016-01-26 00:00:00',0),(446,2001,52,'2015-08-25 00:00:00',0),(447,2001,52,'2015-11-13 00:00:00',0),(448,2001,52,'2014-06-29 00:00:00',0),(449,2001,52,'2015-05-28 00:00:00',0),(450,2001,52,'2014-12-08 00:00:00',0),(451,2001,52,'2015-07-07 00:00:00',0),(452,2001,52,'2015-12-01 00:00:00',0),(453,2001,53,'2015-06-07 00:00:00',0),(454,2001,53,'2015-04-06 00:00:00',0),(455,2001,53,'2015-10-10 00:00:00',0),(456,2001,55,'2015-01-12 00:00:00',0),(457,2001,55,'2014-08-26 00:00:00',0),(458,2001,55,'2014-08-10 00:00:00',0),(459,2001,55,'2014-08-30 00:00:00',0),(460,2001,74,'2015-10-10 00:00:00',0),(461,2001,74,'2015-08-04 00:00:00',0),(462,2001,92,'2016-02-18 00:00:00',0),(463,2001,93,'2015-01-18 00:00:00',0),(464,2001,93,'2014-04-16 00:00:00',0),(465,2001,64,'2016-02-08 00:00:00',0),(466,2001,72,'2014-06-16 00:00:00',0),(467,2001,69,'2014-05-13 00:00:00',0),(468,2001,11,'0000-00-00 00:00:00',1),(469,2001,51,'0000-00-00 00:00:00',5),(470,2001,42,'0000-00-00 00:00:00',2),(471,2001,10,'0000-00-00 00:00:00',1),(472,2001,428,'0000-00-00 00:00:00',1),(473,2001,26,'0000-00-00 00:00:00',2),(474,2001,101,'0000-00-00 00:00:00',2),(475,2001,98,'0000-00-00 00:00:00',1),(476,2001,41,'0000-00-00 00:00:00',4),(477,2001,484,'0000-00-00 00:00:00',4),(478,2001,34,'0000-00-00 00:00:00',1),(479,2001,35,'0000-00-00 00:00:00',1),(480,2001,36,'0000-00-00 00:00:00',1),(481,2001,37,'0000-00-00 00:00:00',1),(482,2001,38,'0000-00-00 00:00:00',1);
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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_status`
--

LOCK TABLES `user_status` WRITE;
/*!40000 ALTER TABLE `user_status` DISABLE KEYS */;
INSERT INTO `user_status` VALUES (1,'Administrator'),(2,'Active'),(3,'Deactivated');
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

-- Dump completed on 2014-03-18 23:47:39
