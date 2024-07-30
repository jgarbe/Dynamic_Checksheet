--
-- Table structure for table `veh`
--

DROP TABLE IF EXISTS `veh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `veh` (
  `veh_id` int(11) NOT NULL AUTO_INCREMENT,
  `veh_fleet_name` varchar(32) NOT NULL,
  `vinNo` varchar(11) NOT NULL,
  `make` int(11) NOT NULL,
  `model` varchar(64) DEFAULT NULL,
  `_year` int(4) DEFAULT NULL,
  `_class` varchar(10) DEFAULT NULL,
  `state_lic_no` varchar(22) DEFAULT NULL,
  `engine` varchar(22) DEFAULT NULL,
  PRIMARY KEY (`veh_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


