-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 24, 2016 at 04:12 AM
-- Server version: 5.5.45-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demo_inv`
--

-- --------------------------------------------------------

--
-- Table structure for table `CallSign`
--

DROP TABLE IF EXISTS `CallSign`;
CREATE TABLE IF NOT EXISTS `CallSign` (
  `id` int(11) NOT NULL,
  `callsign` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CallSign`
--

INSERT INTO `CallSign` (`id`, `callsign`) VALUES
(1, 'Med-1'),
(2, 'Med-2'),
(3, 'Med-3'),
(4, 'Med-4'),
(5, 'Med-5'),
(6, 'Med-6'),
(7, 'Med-7'),
(8, 'Med-8'),
(9, 'Med-9'),
(10, 'Med-10'),
(11, 'Med-11'),
(12, 'Med-12'),
(13, 'Med-13'),
(14, 'Med-14'),
(15, 'Med-15'),
(16, 'Med-16'),
(20, 'Med-20'),
(22, 'Med-22'),
(24, 'Med-24'),
(90, 'Backup1'),
(91, 'Backup2'),
(99, 'OOS');

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

DROP TABLE IF EXISTS `Category`;
CREATE TABLE IF NOT EXISTS `Category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(18) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`category_id`, `category_name`) VALUES
(1, 'Personnel'),
(28, 'Drug_Box'),
(3, 'Truck'),
(4, 'Monitor_Supplies'),
(5, 'IV'),
(6, 'Misc_Equip'),
(7, 'Immob-Splints'),
(8, 'Oxygen'),
(9, 'Pedi_Box'),
(10, 'Personal_Safety'),
(11, 'Controlled_Meds'),
(12, 'Station_eq'),
(13, 'Suction'),
(14, 'Trauma'),
(15, 'Trauma_Box'),
(16, 'Comments'),
(17, 'Portable_O2'),
(18, 'Glucometer'),
(19, 'Gloves'),
(20, 'Truck_Fluid'),
(21, 'LSB_Supplies'),
(22, 'Ventilator'),
(23, 'CPAP'),
(24, 'Portable_Suction'),
(25, 'Clipboard'),
(26, 'Page_Builder'),
(29, 'Pt_Transport_Devic'),
(30, 'Toughbook'),
(27, 'Airway_Box'),
(31, 'BLS O2 Management'),
(32, 'BLS_IV_Management'),
(33, 'BLS_Trauma'),
(34, 'BLS_Drugs'),
(35, 'OB_Kits'),
(36, 'Philips'),
(37, 'EZ_IO'),
(38, 'ETT_Pack'),
(39, 'Zoll');

-- --------------------------------------------------------

--
-- Table structure for table `Checksheets`
--

DROP TABLE IF EXISTS `Checksheets`;
CREATE TABLE IF NOT EXISTS `Checksheets` (
  `id` int(11) NOT NULL,
  `ChecksheetName` varchar(32) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `sealable` tinyint(1) DEFAULT NULL,
  `sealed` varchar(20) DEFAULT NULL,
  `Signature` int(11) DEFAULT NULL,
  `qset` int(11) DEFAULT NULL,
  `published` tinyint(1) DEFAULT '1',
  `veh` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Checksheets`
--

INSERT INTO `Checksheets` (`id`, `ChecksheetName`, `merged`, `sealable`, `sealed`, `Signature`, `qset`, `published`, `veh`) VALUES
(24, 'Truck24', NULL, 0, NULL, NULL, NULL, 1, 1),
(24001, 'Truck24_Airway', 24, 0, NULL, NULL, NULL, 1, NULL),
(24004, 'Truck24_Drugs', 24, 0, NULL, NULL, NULL, 1, NULL),
(24006, 'Truck24_Misc_Equipment', 24, 0, NULL, NULL, NULL, 1, NULL),
(24011, 'Truck24_O2', 24, 0, NULL, NULL, NULL, 1, NULL),
(24002, 'Truck24_IV', 24, 0, NULL, NULL, NULL, 1, NULL),
(24010, 'Truck24_Immobilization', 24, 0, NULL, NULL, NULL, 1, NULL),
(24013, 'Truck24_Personal_Safety', 24, 0, NULL, NULL, NULL, 1, NULL),
(24016, 'Truck24_Suction', 24, 0, NULL, NULL, NULL, 1, NULL),
(24017, 'Truck24_Trauma_Supplies', 24, 0, NULL, NULL, NULL, 1, NULL),
(24005, 'Truck24_OB', 24, 1, NULL, NULL, NULL, 1, NULL),
(24007, 'Truck24_Glucometer', 24, 0, NULL, NULL, NULL, 1, NULL),
(24009, 'Truck24_Pt_Transport', 24, 0, NULL, NULL, NULL, 1, NULL),
(24014, 'Truck24_Toughbook', 24, 0, NULL, NULL, NULL, 1, NULL),
(24021, 'Zoll_24', 24, 0, NULL, NULL, NULL, 1, NULL),
(1, 'Truck1', NULL, 0, NULL, NULL, NULL, 1, 1),
(1001, 'Truck1_Airway_Box', 1, 1, NULL, NULL, NULL, 1, NULL),
(1004, 'Truck1_Drug_Box', 1, 1, NULL, NULL, NULL, 1, NULL),
(1005, 'Truck1_OB', 1, 1, NULL, NULL, NULL, 1, NULL),
(1012, 'Truck1_Pedi_Box', 1, 1, NULL, NULL, NULL, 1, NULL),
(1015, 'Truck1_Controlled_Medications', 1, 1, NULL, NULL, NULL, 1, NULL),
(1016, 'Truck1_Suction', 1, 0, NULL, NULL, NULL, 1, NULL),
(1017, 'Truck1_Trauma_Supplies', 1, 0, NULL, NULL, NULL, 1, NULL),
(1018, 'Truck1_Trauma_Box', 1, 1, NULL, NULL, NULL, 1, NULL),
(1023, 'Truck1_ETT_Pack', 1, 1, NULL, NULL, NULL, 1, NULL),
(1022, 'Truck1_EZ_IO', 1, 1, NULL, NULL, NULL, 1, NULL),
(1014, 'Truck1_Toughbook', 1, 0, NULL, NULL, NULL, 1, NULL),
(100, 'Station1', 0, 0, NULL, NULL, NULL, 1, NULL),
(2001, 'TN_ALS_Meds', 2, 1, '8954504', 1, NULL, 1, 0),
(200000000, 'Hold', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2000000001, 'Hold', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'TN_ALS', NULL, 0, NULL, NULL, NULL, 1, NULL),
(2002, 'TN_ALS_MCI', 2000000001, 1, NULL, NULL, NULL, 1, 0),
(2003, 'TN_ALS_OB_Supplies', 2, 1, NULL, NULL, NULL, 1, 0),
(2004, 'TN_ALS_Trauma', 2, 0, NULL, NULL, NULL, 1, 0),
(2005, 'TN_ALS_ETT', 2, 1, '748595', 1, NULL, 1, NULL),
(2006, 'TN_ALS_Suction', 2, 0, NULL, NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Comment_`
--

DROP TABLE IF EXISTS `Comment_`;
CREATE TABLE IF NOT EXISTS `Comment_` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `_comment` varchar(200) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `Comment_`
--

INSERT INTO `Comment_` (`comment_id`, `_comment`) VALUES
(1, 'This is a before sample'),
(2, ' \r\nsample of after '),
(4, 'this is a test'),
(5, 'The Rain in Spain'),
(6, 'This is a test'),
(8, 'This is a test of the blah blah blah');

-- --------------------------------------------------------

--
-- Table structure for table `distributer`
--

DROP TABLE IF EXISTS `distributer`;
CREATE TABLE IF NOT EXISTS `distributer` (
  `dist_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_name` varchar(32) DEFAULT NULL,
  `dist_address` varchar(32) DEFAULT NULL,
  `dist_city` varchar(32) DEFAULT NULL,
  `dist_state` varchar(32) DEFAULT NULL,
  `zip` int(5) NOT NULL,
  PRIMARY KEY (`dist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `distributer`
--

INSERT INTO `distributer` (`dist_id`, `dist_name`, `dist_address`, `dist_city`, `dist_state`, `zip`) VALUES
(1, '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `How_Many`
--

DROP TABLE IF EXISTS `How_Many`;
CREATE TABLE IF NOT EXISTS `How_Many` (
  `hm_value_id` int(11) NOT NULL,
  `hm_name` varchar(18) NOT NULL,
  PRIMARY KEY (`hm_value_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `How_Many`
--

INSERT INTO `How_Many` (`hm_value_id`, `hm_name`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10'),
(11, '11'),
(12, '12'),
(13, '13'),
(14, '14'),
(15, '15'),
(16, 'open'),
(17, 'O2'),
(19, 'tire'),
(20, 'cb'),
(21, 'miles'),
(22, 'personnel'),
(23, 'date'),
(24, 'refill'),
(25, 'comment'),
(26, 'na'),
(27, 'Calc');

-- --------------------------------------------------------

--
-- Table structure for table `Items`
--

DROP TABLE IF EXISTS `Items`;
CREATE TABLE IF NOT EXISTS `Items` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=604 ;

--
-- Dumping data for table `Items`
--

INSERT INTO `Items` (`item_id`, `item_name`, `perishable`, `stockable`, `in_stock`, `min_q`, `dist_id`, `mfr_id`) VALUES
(1, 'Mileage', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Service Due', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Date', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Series', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Station', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'CallSign', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Crew1', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Crew2', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'BVM Adult', NULL, 1, 48, NULL, NULL, NULL),
(11, 'Esophageal Detector', NULL, 1, 48, NULL, NULL, NULL),
(12, 'Colormetric Adult', 1, 1, 48, NULL, NULL, NULL),
(13, 'Laryngoscope Large', NULL, 1, 48, NULL, NULL, NULL),
(14, 'Miller Blade No.3', NULL, 1, 48, NULL, NULL, NULL),
(15, 'Macintosh Blade No.3', NULL, 1, 48, NULL, NULL, NULL),
(16, 'Miller Blade No.4', NULL, 1, 48, NULL, NULL, NULL),
(17, 'Macintosh Blade No.4', NULL, 1, 48, NULL, NULL, NULL),
(18, 'ETT Cuffed 6.0 ', 1, 1, 48, NULL, NULL, NULL),
(19, 'ETT Cuffed 6.5', 1, 1, 48, NULL, NULL, NULL),
(20, 'ETT Cuffed 7.0', 1, 1, 48, NULL, NULL, NULL),
(21, 'ETT Cuffed 7.5', 1, 1, 47, NULL, NULL, NULL),
(22, 'ETT Cuffed 8.0', 1, 1, 48, NULL, NULL, NULL),
(23, 'ETT Cuffed 8.5', 1, 1, 48, NULL, NULL, NULL),
(24, 'ETT Cuffed 9.0 ', 1, 1, 48, NULL, NULL, NULL),
(25, 'Stylette Adult', NULL, 1, 48, NULL, NULL, NULL),
(26, 'Battery Spare -C-', NULL, 1, 48, NULL, NULL, NULL),
(27, 'Combie Tube', 1, 1, 48, NULL, NULL, NULL),
(28, 'Quick Trach Kit', 1, 1, 48, NULL, NULL, NULL),
(29, 'Nasopharyngeal Airway 16 or 18 ', 1, 1, 48, NULL, NULL, NULL),
(30, 'Nasopharyngeal Airway 20 or 22', 1, 1, 48, NULL, NULL, NULL),
(31, 'Nasopharyngeal Airway 24 or 26 ', 1, 1, 48, NULL, NULL, NULL),
(32, 'Nasopharyngeal Airway 28 or 30 ', 1, 1, 48, NULL, NULL, NULL),
(33, 'Nasopharyngeal Airway 32 or 34 ', 1, 1, 48, NULL, NULL, NULL),
(34, 'Oropharyngeal Airway 70mm', NULL, 1, 48, NULL, NULL, NULL),
(35, 'Oropharyngeal Airway 80mm', NULL, 1, 48, NULL, NULL, NULL),
(36, 'Oropharyngeal Airway 90mm', NULL, 1, 48, NULL, NULL, NULL),
(37, 'Oropharyngeal Airway 100mm ', NULL, 1, 48, NULL, NULL, NULL),
(38, 'Oropharyngeal Airway 110mm ', NULL, 1, 48, NULL, NULL, NULL),
(39, 'Magill Forceps Adult', NULL, 1, 48, NULL, NULL, NULL),
(41, 'Syringe 10cc ', NULL, 1, 48, NULL, NULL, NULL),
(42, 'Tape Roll 1inch ', NULL, 1, 48, NULL, NULL, NULL),
(43, 'Tube Tamer', NULL, 1, 48, NULL, NULL, NULL),
(44, 'IV Angiocath 14g', 1, 1, 48, NULL, NULL, NULL),
(45, 'IV Angiocath 16g', 1, 1, 48, NULL, NULL, NULL),
(46, 'IV Angiocath 18g ', 1, 1, 48, NULL, NULL, NULL),
(47, 'IV Angiocath 20g ', 1, 1, 48, NULL, NULL, NULL),
(48, 'IV Angiocath 22g ', 1, 1, 48, NULL, NULL, NULL),
(49, 'IV Angiocath 24g ', 1, 1, 48, NULL, NULL, NULL),
(50, 'NG Tube', 1, 1, 48, NULL, NULL, NULL),
(51, 'Ammonia Inhalants', NULL, 1, 48, NULL, NULL, NULL),
(52, 'Epinephrine 1-10000', 1, 1, 48, NULL, NULL, NULL),
(53, 'Atropine 1mg/10ml', 1, 1, 48, NULL, NULL, NULL),
(54, 'Atropine 1mg/1ml', 1, 1, 48, NULL, NULL, NULL),
(55, 'Lidocaine 100mg', 1, 1, 48, NULL, NULL, NULL),
(56, 'Nitro Tabs', 1, 1, 48, NULL, NULL, NULL),
(57, 'Nitro Spray', 1, 1, 48, NULL, NULL, NULL),
(58, 'Nitro Ointment 1% ', 1, 1, 48, NULL, NULL, NULL),
(59, 'ASA Bottle of Baby', 1, 1, 48, NULL, NULL, NULL),
(60, 'Adenocard 6mg', 1, 1, 48, NULL, NULL, NULL),
(61, 'Albuterol', 1, 1, 48, NULL, NULL, NULL),
(62, 'Amiodorone 150mg', 1, 1, 48, NULL, NULL, NULL),
(63, 'Benadryl 50mg', 1, 1, 48, NULL, NULL, NULL),
(64, 'Epinephrine 1-1000', 1, 1, 48, NULL, NULL, NULL),
(65, 'Needles Subcutaneous', NULL, 1, 48, NULL, NULL, NULL),
(66, 'Lasix', 1, 1, 48, NULL, NULL, NULL),
(67, 'Magnesium Sulfate 1g ', 1, 1, 48, NULL, NULL, NULL),
(68, 'Magnesium Sulfate 5g', 1, 1, 48, NULL, NULL, NULL),
(69, 'Narcan 2mg ', 1, 1, 48, NULL, NULL, NULL),
(70, 'Phenergan', 1, 1, 48, NULL, NULL, NULL),
(71, 'Decadron', 1, 1, 48, NULL, NULL, NULL),
(72, 'Solu-Medrol', 1, 1, 48, NULL, NULL, NULL),
(73, 'Glucagon', 1, 1, 48, NULL, NULL, NULL),
(74, 'Vasopressin', 1, 1, 48, NULL, NULL, NULL),
(81, 'Syringe 1cc ', NULL, 1, 48, NULL, NULL, NULL),
(82, 'Syringe 3cc ', NULL, 1, 48, NULL, NULL, NULL),
(84, 'Needles 18g ', NULL, 1, 48, NULL, NULL, NULL),
(85, 'Alcohol Swabs', NULL, 1, 48, NULL, NULL, NULL),
(86, 'Bandaids', NULL, 1, 48, NULL, NULL, NULL),
(87, 'Vacutainers Speckled Red', 1, 1, 48, NULL, NULL, NULL),
(88, 'Vacutainers Green', 1, 1, 48, NULL, NULL, NULL),
(89, 'Vacutainers Purple', 1, 1, 48, NULL, NULL, NULL),
(90, 'Vacutainers Blue', 1, 1, 48, NULL, NULL, NULL),
(91, 'Lancets', NULL, 1, 48, NULL, NULL, NULL),
(92, 'D-50', 1, 1, 48, NULL, NULL, NULL),
(93, 'Sodium Bicarb 100mEq', 1, 1, 48, NULL, NULL, NULL),
(94, 'Dopamine Mix', 1, 1, 48, NULL, NULL, NULL),
(95, 'Lidocaine Mix', 1, 1, 48, NULL, NULL, NULL),
(96, 'Normal Saline Bag ', 1, 1, 45, NULL, NULL, NULL),
(97, 'D-25', 1, 1, 48, NULL, NULL, NULL),
(98, 'IV Line Macro ', NULL, 1, 38, NULL, NULL, NULL),
(99, 'IV Line Micro', NULL, 1, 48, NULL, NULL, NULL),
(100, 'IV Start Kit', NULL, 1, 48, NULL, NULL, NULL),
(101, 'IV Extension', NULL, 1, 48, NULL, NULL, NULL),
(102, 'Dial-a-flow Extension', NULL, 1, 48, NULL, NULL, NULL),
(103, 'Nasal Injector', NULL, 1, 48, NULL, NULL, NULL),
(104, 'Heat and AC', NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'PA-Radio Amplifier', NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'Siren', NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'Horn', NULL, NULL, NULL, NULL, NULL, NULL),
(108, '800Mhz Radio', NULL, NULL, NULL, NULL, NULL, NULL),
(109, 'VHF Radio', NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'LR Bag', 1, 1, 48, NULL, NULL, NULL),
(556, 'GPS Stand', 0, 1, NULL, NULL, NULL, NULL),
(341, 'Truck Maintenance Comment', NULL, NULL, NULL, NULL, NULL, NULL),
(333, 'Antifreeze', NULL, 1, 48, NULL, NULL, NULL),
(115, 'Buretrol Sets', NULL, 1, 48, NULL, NULL, NULL),
(116, 'Blood Infusion Tubing', NULL, 1, 48, NULL, NULL, NULL),
(117, 'IV Arm Boards', NULL, 1, 48, NULL, NULL, NULL),
(118, 'Pressure Infuser', NULL, 1, 48, NULL, NULL, NULL),
(554, 'GPS', 0, 1, 48, NULL, NULL, NULL),
(555, 'Map Book', 0, 1, 48, NULL, NULL, NULL),
(558, 'Syringe 10cc Slip-Tip', 0, 1, 48, NULL, NULL, NULL),
(557, 'GPS Charger', 0, 1, 48, NULL, NULL, NULL),
(127, 'Saline Flush', 1, 1, 48, NULL, NULL, NULL),
(128, 'IO Sternal Kit', 1, 1, 48, NULL, NULL, NULL),
(129, 'Tourniquettes', NULL, 1, 48, NULL, NULL, NULL),
(130, 'Brake Lights', NULL, NULL, NULL, NULL, NULL, NULL),
(131, 'Turn Signals', NULL, NULL, NULL, NULL, NULL, NULL),
(132, 'Backup Lights', NULL, NULL, NULL, NULL, NULL, NULL),
(133, 'Backup Alarm', NULL, NULL, NULL, NULL, NULL, NULL),
(134, 'Clearance Lights', NULL, NULL, NULL, NULL, NULL, NULL),
(135, 'Spot Light', NULL, 1, 48, NULL, NULL, NULL),
(136, 'Emergency Light', NULL, NULL, NULL, NULL, NULL, NULL),
(137, 'Compartment Lights', NULL, NULL, NULL, NULL, NULL, NULL),
(138, 'Head Lights', NULL, NULL, NULL, NULL, NULL, NULL),
(139, 'Tail Lights', NULL, NULL, NULL, NULL, NULL, NULL),
(140, 'Shoreline', NULL, 1, 48, NULL, NULL, NULL),
(141, 'Inverter', NULL, NULL, NULL, NULL, NULL, NULL),
(142, 'Emesis Basins', NULL, 1, 48, NULL, NULL, NULL),
(143, 'Body Bags', NULL, 1, 48, NULL, NULL, NULL),
(144, 'Bed Pan', NULL, 1, 48, NULL, NULL, NULL),
(145, 'Urinal', NULL, 1, 48, NULL, NULL, NULL),
(146, 'Sphygmomanometer', NULL, 1, 48, NULL, NULL, NULL),
(147, 'Stethoscope', NULL, 1, 48, NULL, NULL, NULL),
(148, 'System 5', NULL, 1, 48, NULL, NULL, NULL),
(149, 'Trauma Shears', NULL, 1, 48, NULL, NULL, NULL),
(150, 'Sheets', NULL, 1, 48, NULL, NULL, NULL),
(151, 'Towels', NULL, 1, 48, NULL, NULL, NULL),
(152, 'Blankets w dust resist cover', NULL, 1, 47, NULL, NULL, NULL),
(153, 'Pillow', 1, 1, 48, NULL, NULL, NULL),
(154, 'Gloves Sterile', NULL, 1, 48, NULL, NULL, NULL),
(155, 'OB Blankets/Caps w dust resist c', NULL, 1, 48, NULL, NULL, NULL),
(156, 'Kleenex Box', NULL, 1, 48, NULL, NULL, NULL),
(157, 'Paper Towels', NULL, 1, 48, NULL, NULL, NULL),
(158, 'Toilet Paper Roll', NULL, 1, 48, NULL, NULL, NULL),
(159, 'Glucometer', NULL, 1, 48, NULL, NULL, NULL),
(160, 'Glucometer Strips', 1, 1, 47, NULL, NULL, NULL),
(541, 'Memory SD Card Adapter', 0, 1, 48, NULL, NULL, NULL),
(540, 'Memory Card Reader', 0, 1, 48, NULL, NULL, NULL),
(164, '2X2s', NULL, 1, 31, 32, 1, 1),
(165, 'Thermoscan', NULL, 1, 48, NULL, NULL, NULL),
(166, 'Thermoscan Shields', NULL, 1, 48, NULL, NULL, NULL),
(167, 'Stair-Chair', NULL, 1, 48, NULL, NULL, NULL),
(168, 'LSB', NULL, 1, 48, NULL, NULL, NULL),
(169, 'LSB Straps', NULL, 1, 48, NULL, NULL, NULL),
(170, 'CIDs', NULL, 1, 48, NULL, NULL, NULL),
(171, 'Scoop Stretcher', NULL, 1, 48, NULL, NULL, NULL),
(172, 'Short Sp Immob Dev w case', NULL, 1, 48, NULL, NULL, NULL),
(173, 'Pediatric Board', NULL, 1, 48, NULL, NULL, NULL),
(174, 'Sager', NULL, 1, 48, NULL, NULL, NULL),
(175, 'Fire Extinguisher 5lb', NULL, 1, 48, NULL, NULL, NULL),
(176, 'Flashlight', NULL, 1, 48, NULL, NULL, NULL),
(177, 'Reflective Triangles', NULL, 1, 48, NULL, NULL, NULL),
(178, 'Booster Cables', NULL, 1, 48, NULL, NULL, NULL),
(179, 'Tow Strap', NULL, 1, 48, NULL, NULL, NULL),
(180, 'Haligan Tool', NULL, 1, 48, NULL, NULL, NULL),
(181, 'C-Collar Adult Adjustable', NULL, 1, 48, NULL, NULL, NULL),
(184, 'C-Collar Pediatric Adjustable', NULL, 1, 48, NULL, NULL, NULL),
(186, 'Board Splint Long', NULL, 1, 48, NULL, NULL, NULL),
(187, 'Board Splint Medium', NULL, 1, 48, 54, NULL, NULL),
(188, 'Board Splint Short', NULL, 1, 48, NULL, NULL, NULL),
(189, 'Frac-Pac Sling', NULL, 1, 48, NULL, NULL, NULL),
(190, 'Frac-Pac Long Bone', NULL, 1, 48, NULL, NULL, NULL),
(191, 'Frac-Pac Large Long Bone', NULL, 1, 48, NULL, NULL, NULL),
(192, 'Frac-Pac Splint Long Leg', NULL, 1, 48, NULL, NULL, NULL),
(193, 'Frac-Pac Ankle Splint', NULL, 1, 48, NULL, NULL, NULL),
(194, 'Vehicle O2', NULL, NULL, NULL, NULL, NULL, NULL),
(195, 'Portable O2', NULL, NULL, NULL, NULL, NULL, NULL),
(196, 'Ventilator O2', NULL, NULL, NULL, NULL, NULL, NULL),
(197, 'Ventilator Circuits', NULL, 1, 48, NULL, NULL, NULL),
(198, 'CPAP O2', NULL, NULL, NULL, NULL, NULL, NULL),
(199, 'CPAP Circuits', NULL, 1, 48, NULL, NULL, NULL),
(200, 'D-Bottle O2 Spare', NULL, 1, 48, NULL, NULL, NULL),
(201, 'BVM Adult Spare', NULL, 1, 48, NULL, NULL, NULL),
(202, 'BVM Spare Pediatric', NULL, 1, 48, NULL, NULL, NULL),
(203, 'BVM Neonatal Spare', NULL, 1, 48, NULL, NULL, NULL),
(204, 'Non-Rebreather', NULL, 1, 48, NULL, NULL, NULL),
(205, 'Nasal Cannula', NULL, 1, 48, NULL, NULL, NULL),
(206, 'O2 Supply Tubing', NULL, 1, 48, NULL, NULL, NULL),
(207, 'Nebulizer', NULL, 1, 48, NULL, NULL, NULL),
(208, 'Nebulizer Mask', NULL, 1, 48, NULL, NULL, NULL),
(209, 'NRB Pediatric', NULL, 1, 48, NULL, NULL, NULL),
(210, 'Infant Medium Concentration Mask', NULL, 1, 48, NULL, NULL, NULL),
(211, 'Nebulizer Mask Pediatric', NULL, 1, 48, NULL, NULL, NULL),
(212, 'Pediatric Tape', NULL, 1, 48, NULL, NULL, NULL),
(213, 'IO Needle 14-18g Adult', 1, 1, 48, NULL, NULL, NULL),
(214, 'IO Needle 18g Pedi', 1, 1, 48, NULL, NULL, NULL),
(215, 'Syringes 60cc', NULL, 1, 48, NULL, NULL, NULL),
(218, 'Laryngoscope Small', NULL, 1, 47, NULL, NULL, NULL),
(219, 'Macintosh Blade No.1', NULL, 1, 48, NULL, NULL, NULL),
(220, 'Macintosh Blade No.2', NULL, 1, 48, NULL, NULL, NULL),
(221, 'Miller Blade No.0', NULL, 1, 48, NULL, NULL, NULL),
(222, 'Miller Blade No.1', NULL, 1, 48, NULL, NULL, NULL),
(223, 'Miller Blade No.2', NULL, 1, 48, NULL, NULL, NULL),
(224, 'Battery Spare AA', NULL, 1, 48, NULL, NULL, NULL),
(225, 'Meconium Adapter', NULL, 1, 47, NULL, NULL, NULL),
(226, 'Magill Forceps Pedi', NULL, 1, 48, NULL, NULL, NULL),
(227, 'Stethoscope Pediatric', NULL, 1, 48, NULL, NULL, NULL),
(228, 'BVM Infant', NULL, 1, 48, NULL, NULL, NULL),
(229, 'BVM Pediatric', NULL, 1, 48, NULL, NULL, NULL),
(230, 'ETT Uncuffed 2.0mm ', 1, 1, 48, NULL, NULL, NULL),
(231, 'ETT Uncuffed 2.5mm ', 1, 1, 48, NULL, NULL, NULL),
(232, 'ETT Uncuffed 3.0mm ', 1, 1, 48, NULL, NULL, NULL),
(233, 'ETT Uncuffed 3.5mm ', 1, 1, 48, NULL, NULL, NULL),
(234, 'ETT Uncuffed 4.0mm ', 1, 1, 48, NULL, NULL, NULL),
(235, 'ETT Uncuffed 4.5mm', 1, 1, 48, NULL, NULL, NULL),
(236, 'ETT Uncuffed 5.0mm', 1, 1, 48, NULL, NULL, NULL),
(237, 'ETT Uncuffed 5.5mm', 1, 1, 48, NULL, NULL, NULL),
(238, 'ETT Uncuffed 6.0mm', 1, 1, 48, NULL, NULL, NULL),
(239, 'Shielded Masks', NULL, 1, 48, NULL, NULL, NULL),
(240, 'Toughbook', NULL, 1, 48, NULL, NULL, NULL),
(241, 'Gloves Small Latex Free', NULL, 1, 48, NULL, NULL, NULL),
(242, 'Toughbook Truck Charger', NULL, 1, 48, NULL, NULL, NULL),
(243, 'Gloves Medium Latex Free', NULL, 1, 48, NULL, NULL, NULL),
(244, 'HP470 Printer', NULL, 1, 48, NULL, NULL, NULL),
(245, 'Gloves Large Latex Free', NULL, 1, 48, NULL, NULL, NULL),
(246, 'Printer Paper', NULL, 1, 48, NULL, NULL, NULL),
(247, 'Gloves Extra-Large Latex Free', NULL, 1, 48, NULL, NULL, NULL),
(248, 'Disposable Gowns', NULL, 1, 48, NULL, NULL, NULL),
(249, 'Shoe Covers', NULL, 1, 48, NULL, NULL, NULL),
(250, 'Hand Cleaner', NULL, 1, 48, NULL, NULL, NULL),
(251, 'Decon Spray', NULL, 1, 48, NULL, NULL, NULL),
(252, 'PFD', NULL, 1, 48, NULL, NULL, NULL),
(253, 'Throw Rope', NULL, 1, 48, NULL, NULL, NULL),
(254, 'Anti-Dote Kit', 1, 1, 48, NULL, NULL, NULL),
(255, 'Sharps Box', NULL, 1, 48, NULL, NULL, NULL),
(256, 'DOT Response Guide', NULL, 1, 48, NULL, NULL, NULL),
(257, 'Rain Parkas', NULL, 1, 48, NULL, NULL, NULL),
(258, 'TB Masks Large', NULL, 1, 48, NULL, NULL, NULL),
(259, 'TB Masks Medium', NULL, 1, 48, NULL, NULL, NULL),
(260, 'Morphine', 1, 1, 48, NULL, NULL, NULL),
(261, 'Nimbex', 1, 1, 48, NULL, NULL, NULL),
(262, 'Valium', 1, 1, 48, NULL, NULL, NULL),
(263, 'Versed', 1, 1, 48, NULL, NULL, NULL),
(334, 'Power Steering Fluid', NULL, 1, 48, NULL, NULL, NULL),
(265, 'Ativan', 1, 1, 48, NULL, NULL, NULL),
(266, 'Succinycholine', 1, 1, 48, NULL, NULL, NULL),
(267, 'Ice Pack Refresh', NULL, 1, 48, NULL, NULL, NULL),
(268, 'Trash Bags Large', NULL, 1, 48, NULL, NULL, NULL),
(269, 'Trash Bags Small', NULL, 1, 48, NULL, NULL, NULL),
(270, 'Lysol', NULL, 1, 48, NULL, NULL, NULL),
(271, 'Bleach', NULL, 1, 48, NULL, NULL, NULL),
(272, 'Detegent', NULL, 1, 48, NULL, NULL, NULL),
(273, 'Truck Soap', NULL, 1, 48, NULL, NULL, NULL),
(274, 'Tire Shine', NULL, 1, 48, NULL, NULL, NULL),
(275, 'Yaunkers', NULL, 1, 48, NULL, NULL, NULL),
(276, 'Suction Catheter 6fr', NULL, 1, 48, NULL, NULL, NULL),
(277, 'Suction Catheter 8fr', NULL, 1, 48, NULL, NULL, NULL),
(278, 'Suction Catheter 10fr ', NULL, 1, 48, NULL, NULL, NULL),
(279, 'Suction Catheter 14fr ', NULL, 1, 48, NULL, NULL, NULL),
(280, 'Suction Catheter 16fr ', NULL, 1, 48, NULL, NULL, NULL),
(281, 'Suction Catheter 18fr ', NULL, 1, 48, NULL, NULL, NULL),
(283, 'Tire Tread', NULL, NULL, NULL, NULL, NULL, NULL),
(284, 'Driver Side Front Tire PSI', NULL, NULL, NULL, NULL, NULL, NULL),
(285, 'Tire Passenger Side Front PSI', NULL, NULL, NULL, NULL, NULL, NULL),
(286, 'Tire Rear Driver Side Inside PSI', NULL, NULL, NULL, NULL, NULL, NULL),
(287, 'Tire Rear Driver Side Outside PS', NULL, NULL, NULL, NULL, NULL, NULL),
(288, 'Tire Rear Passenger Side Inside ', NULL, NULL, NULL, NULL, NULL, NULL),
(289, 'Tire Rear Passenger Side Outside', NULL, NULL, NULL, NULL, NULL, NULL),
(290, '4X4s Box', 1, 1, 48, NULL, NULL, NULL),
(291, 'Tape 1inch Box', NULL, 1, 48, NULL, NULL, NULL),
(292, 'Tape 3inch Box', NULL, 1, 48, NULL, NULL, NULL),
(293, '2X2s Box', NULL, 1, 42, NULL, 1, 1),
(294, 'Burn Sheets', NULL, 1, 48, NULL, NULL, NULL),
(295, 'Dressing 10X30 ', NULL, 1, 48, NULL, NULL, NULL),
(296, 'Alcohol Prep Pads Box', NULL, 1, 48, NULL, NULL, NULL),
(297, 'Petrolatum Gauze', NULL, 1, 48, NULL, NULL, NULL),
(298, 'Roller Gauze 3 inch ', NULL, 1, 48, NULL, NULL, NULL),
(299, 'Roller Gauze 6 inch', NULL, 1, 48, NULL, NULL, NULL),
(300, 'Dressing 8X10', NULL, 1, 48, NULL, NULL, NULL),
(301, 'Cravats', NULL, 1, 48, NULL, NULL, NULL),
(303, 'Hot Packs', NULL, 1, 48, NULL, NULL, NULL),
(304, 'Cold Packs', NULL, 1, 48, NULL, NULL, NULL),
(542, 'Memory SD Card', 0, 1, 48, NULL, NULL, NULL),
(306, 'Tape  Roll 3inch ', NULL, 1, 48, NULL, NULL, NULL),
(307, 'Hemostats', NULL, 1, 48, NULL, NULL, NULL),
(308, 'Pen Light', NULL, 1, 48, NULL, NULL, NULL),
(539, 'Philips Memory Card', 0, 1, 48, NULL, NULL, NULL),
(310, 'Gloves Exam', NULL, 1, 48, NULL, NULL, NULL),
(538, 'Battery 9V', 0, 1, 48, NULL, NULL, NULL),
(315, '4X4s', 1, 1, 48, NULL, NULL, NULL),
(537, 'Rosetta Cable', 0, 1, 48, NULL, NULL, NULL),
(536, 'Rosetta', 0, 1, 48, NULL, NULL, NULL),
(535, 'Syringes_5cc', 0, 1, 48, NULL, NULL, NULL),
(534, 'Toilet Brush', 0, 1, 48, NULL, NULL, NULL),
(553, 'Philips SD Card', 0, 1, 48, NULL, NULL, NULL),
(552, 'Philips SD Card Adapter', 0, 1, 48, NULL, NULL, NULL),
(551, 'Philips ETCO2 Nasal Cannula', 0, 1, 48, NULL, NULL, NULL),
(550, 'Rosetta Cable R2R', 0, 1, 48, NULL, NULL, NULL),
(549, 'Philips 3-lead Cables', 0, 1, 48, NULL, NULL, NULL),
(548, 'Philips Operational Check', 0, NULL, NULL, NULL, NULL, NULL),
(547, 'Sager Pedi-Elastic Cravat', 0, 1, 48, NULL, NULL, NULL),
(546, 'Sager Elastic Cravat', 0, 1, 48, NULL, NULL, NULL),
(545, 'Sager Pediatric', 0, 1, 48, NULL, NULL, NULL),
(544, 'Battery CR2032', 0, 1, 48, NULL, NULL, NULL),
(543, 'Memory Card', 0, 1, 48, NULL, NULL, NULL),
(377, 'Zoll Monitor Battery', NULL, 1, 48, NULL, NULL, NULL),
(379, 'Defib Jel', NULL, 1, 48, NULL, NULL, NULL),
(380, 'Zoll ECG Paper', NULL, 1, 48, NULL, NULL, NULL),
(381, 'Zoll Adult Pulse Ox Probe', NULL, 1, 48, NULL, NULL, NULL),
(382, 'Zoll Pedi Pulse Ox Probe', NULL, 1, 48, NULL, NULL, NULL),
(383, 'Zoll Thigh NIBP Cuff', NULL, 1, 48, NULL, NULL, NULL),
(384, 'Zoll Adult NIBP Cuff', NULL, 1, 48, NULL, NULL, NULL),
(385, 'Zoll Small NIBP Cuff', NULL, 1, 48, NULL, NULL, NULL),
(386, 'Zoll ETCO2 Cable', NULL, 1, 48, NULL, NULL, NULL),
(387, 'Zoll ETCO2 Adapter', NULL, 1, 48, NULL, NULL, NULL),
(388, 'Zoll Neonate ETCO2 Adapter', NULL, 1, 48, NULL, NULL, NULL),
(389, 'Zoll 12-lead Cables', NULL, 1, 48, NULL, NULL, NULL),
(390, 'Electrodes Adult', NULL, 1, 43, NULL, NULL, NULL),
(391, 'Electrodes Pediatric', 1, 1, 48, NULL, NULL, NULL),
(392, 'Electrodes Spare Pack', NULL, 1, 48, NULL, NULL, NULL),
(393, 'Zoll Adult Pacing Pads', 1, 1, 48, NULL, NULL, NULL),
(331, 'Oil Level', NULL, NULL, NULL, NULL, NULL, NULL),
(395, 'HP Monitor Battery', NULL, 1, 48, NULL, NULL, NULL),
(396, 'HP Roll Paper', NULL, 1, 48, NULL, NULL, NULL),
(397, 'HP Adult Pulse Ox Probe', NULL, 1, 48, NULL, NULL, NULL),
(398, 'HP Pedi Pulse Ox Probe', NULL, 1, 48, NULL, NULL, NULL),
(399, 'HP Adult Pacing Pads', NULL, 1, 48, NULL, NULL, NULL),
(400, 'HP Pedi Pacing Pads', NULL, 1, 48, NULL, NULL, NULL),
(401, 'Philips Monitor Battery', NULL, 1, 48, NULL, NULL, NULL),
(402, 'Philips Roll Paper', NULL, 1, 48, NULL, NULL, NULL),
(403, 'Philips Pulse Ox Probe', NULL, 1, 48, NULL, NULL, NULL),
(404, 'Philips Pedi Pulse Ox Probe', NULL, 1, 48, NULL, NULL, NULL),
(405, 'Philips Thigh NIBP Cuff', NULL, 1, 48, NULL, NULL, NULL),
(406, 'Philips Adult NIBP Cuff', NULL, 1, 48, NULL, NULL, NULL),
(407, 'Philips Small NIBP Cuff', NULL, 1, 48, NULL, NULL, NULL),
(335, 'Brake Fluid', NULL, NULL, NULL, NULL, NULL, NULL),
(409, 'Philips ETCO2 Adapter', NULL, 1, 48, NULL, NULL, NULL),
(410, 'Philips 12-lead Cables', NULL, 1, 48, NULL, NULL, NULL),
(411, 'Philips Adult Pacing Pads', 1, 1, 48, NULL, NULL, NULL),
(412, 'Philips Pedi Pacing Pads', 1, 1, 48, NULL, NULL, NULL),
(416, 'Cheat Sheets', NULL, 1, 48, NULL, NULL, NULL),
(415, 'Shop Vac', NULL, 1, 48, NULL, NULL, NULL),
(417, 'Personnel_1', NULL, NULL, NULL, NULL, NULL, NULL),
(418, 'Personnel_2', NULL, NULL, NULL, NULL, NULL, NULL),
(419, 'Colormetric Pedi', 1, 1, 48, NULL, NULL, NULL),
(420, 'Etomidate', 1, 1, 48, NULL, NULL, NULL),
(421, 'HP470 Printer Power Adapter', NULL, 1, 48, NULL, NULL, NULL),
(422, 'HP470 Printer USB Adapter', NULL, 1, 48, NULL, NULL, NULL),
(423, 'Stair Chair Straps', NULL, 1, 48, NULL, NULL, NULL),
(424, 'Cot', NULL, 1, 48, NULL, NULL, NULL),
(425, 'Cot Straps', NULL, 1, 48, NULL, NULL, NULL),
(426, '4-Point Harness', NULL, 1, 48, NULL, NULL, NULL),
(427, 'Head Storage Net', NULL, 1, 48, NULL, NULL, NULL),
(428, 'Scalpel', 1, 1, 48, NULL, NULL, NULL),
(429, 'Reflective Safety Wear', NULL, 1, 48, NULL, NULL, NULL),
(430, 'Fixed Suction w/gauge', NULL, NULL, NULL, NULL, NULL, NULL),
(431, 'Portable Suction w/gauge', NULL, 1, 48, NULL, NULL, NULL),
(432, 'Fixed Suction Collection Can', NULL, 1, 48, NULL, NULL, NULL),
(433, 'Portable Suction Collection Can', NULL, 1, 48, NULL, NULL, NULL),
(434, 'Fixed Suction Tubing', NULL, 1, 48, NULL, NULL, NULL),
(435, 'Portable Suction Tubing', NULL, 1, 48, NULL, NULL, NULL),
(516, 'MFC 8220 Printer Cartridge', 0, 1, 48, NULL, NULL, NULL),
(515, 'MFC 8220 Printer', 0, 1, 48, NULL, NULL, NULL),
(527, 'D5W', 1, 1, 48, NULL, NULL, NULL),
(526, 'Heat Pump Air Filters', 0, 1, 48, NULL, NULL, NULL),
(525, 'Light Bulbs', 0, 1, 48, NULL, NULL, NULL),
(524, 'Dish Soap', 0, 1, 48, NULL, NULL, NULL),
(523, 'ETT Cuffed 9.5', 0, 1, 48, NULL, NULL, NULL),
(522, 'Wool blanket', 0, 1, 48, NULL, NULL, NULL),
(521, 'Battery 9v', 0, 1, 48, NULL, NULL, NULL),
(520, 'MFC 7840 Drum', 0, 1, 48, NULL, NULL, NULL),
(519, 'MFC 7840W Toner', 0, 1, 48, NULL, NULL, NULL),
(514, 'Comment', 0, NULL, NULL, NULL, NULL, NULL),
(513, 'IO EZ Stabilizer', 1, 1, 48, NULL, NULL, NULL),
(512, 'IO EZ 45mm x 15g', 1, 1, 48, NULL, NULL, NULL),
(511, 'IO EZ 25mm x 15g', 1, 1, 48, NULL, NULL, NULL),
(533, '409 Cleaner', 0, 1, 48, NULL, NULL, NULL),
(532, 'Cleanser', 0, 1, 48, NULL, NULL, NULL),
(531, 'Bacteriostatic Water', 1, 1, 48, NULL, NULL, NULL),
(518, 'Shop Vac Filter', 0, 1, 48, NULL, NULL, NULL),
(517, 'MFC 8220 Printer Drum', 0, 1, 48, NULL, NULL, NULL),
(510, 'IO EZ 15mm x 15g', 1, 1, 48, NULL, NULL, NULL),
(509, 'IO EZ Drill', 0, 1, 48, NULL, NULL, NULL),
(470, 'HP470 B/W Printer Cartridge', NULL, 1, 48, NULL, NULL, NULL),
(471, 'Tourniquettes Latex Free', NULL, 1, 37, NULL, NULL, NULL),
(508, 'Zofran 4mg', 1, 1, 48, NULL, NULL, NULL),
(474, 'Cord Clamps', NULL, 1, 48, NULL, NULL, NULL),
(475, 'Placenta Bag and Tie', NULL, 1, 48, NULL, NULL, NULL),
(332, 'Transmission Fluid', NULL, NULL, NULL, NULL, NULL, NULL),
(477, 'Gauze Dressing', NULL, 1, 48, NULL, NULL, NULL),
(478, 'Bulb Syringe', NULL, 1, 48, NULL, NULL, NULL),
(336, 'Windshield Washing Fluid', NULL, 1, 48, NULL, NULL, NULL),
(481, 'Underpad (Chucks)', NULL, 1, 48, NULL, NULL, NULL),
(337, 'Fuel', NULL, 1, 48, NULL, NULL, NULL),
(484, 'Lube Jelly', NULL, 1, 48, NULL, NULL, NULL),
(530, 'Atropine 0.4mg', 1, 1, 48, NULL, NULL, NULL),
(529, 'INT Caps', 0, 1, 48, NULL, NULL, NULL),
(528, 'Tegaderms', 1, 1, 48, NULL, NULL, NULL),
(488, 'Disposable Razor', NULL, 1, 48, NULL, NULL, NULL),
(507, 'Stylette Pedi', 0, 1, 48, NULL, NULL, NULL),
(490, 'Zoll Pedi Pacing Pads', 1, 1, 48, NULL, NULL, NULL),
(491, 'Zoll AED', NULL, 1, 48, NULL, NULL, NULL),
(492, 'A/C Cable', NULL, 1, 48, NULL, NULL, NULL),
(493, 'Zoll Paper Spare Roll', NULL, 1, 48, NULL, NULL, NULL),
(495, 'Ride Along', NULL, NULL, NULL, NULL, NULL, NULL),
(559, 'Suction Tubing', 0, 1, 48, NULL, NULL, NULL),
(560, 'Convenience Bag', 0, 1, 48, NULL, NULL, NULL),
(561, 'Mileage Calculation', 0, NULL, NULL, NULL, NULL, NULL),
(562, 'Irrigation Solution 500cc', 1, 1, 48, NULL, NULL, NULL),
(563, 'OOS Location', 0, 0, 0, 0, NULL, 0),
(564, 'Thermometer', 0, 1, 0, 0, 0, 0),
(565, 'BioHaz Bag 24x30 w labels', 0, 1, 0, 0, 0, 0),
(566, 'Impermeable Tape', 0, 1, 0, 0, 0, 0),
(567, 'Impermeable Full Body Suit', 0, 1, 0, 0, 0, 0),
(568, 'Protective Footwear', 0, 1, 0, 0, 0, 0),
(569, 'Sphyg Cuff Adult', 0, 1, 0, 0, 0, 0),
(570, 'Sphyg Cuff Pedi', 0, 1, 0, 0, 0, 0),
(571, 'Sphyg Cuff LG or Thigh', 0, 1, 0, 0, 0, 0),
(572, 'Adult C-Collar sm-med-lg', 0, 1, 0, 0, 0, 0),
(573, 'Extremity Immob Kit Adult', 0, 1, 0, 0, 0, 0),
(574, 'Extremity Immob Kit Pedi', 0, 1, 0, 0, 0, 0),
(575, 'Traction Splint Bilat', 0, 1, 0, 0, 0, 0),
(576, 'Pelvic Immob Device', 0, 1, 0, 0, 0, 0),
(577, 'Blind Insertion Device', 0, 1, 0, 0, 0, 0),
(578, 'Nebulizer Pedi', 0, 1, 0, 0, 0, 0),
(579, 'CPAP', 0, 1, 0, 0, 0, 0),
(580, 'Antiseptic Wipe', 0, 1, 0, 0, 0, 0),
(581, 'Telemetry Device', 0, 1, 0, 0, 0, 0),
(582, 'Epi 1-1000 w syringe 0.3mg dose', 1, 1, 0, 0, 0, 0),
(583, 'Beta-Adrenergic Agonist', 1, 1, 0, 0, 0, 0),
(584, 'Nitroglycerine (Spray or Tabs)', 1, 1, 0, 0, 0, 0),
(585, 'Narcan at least 4mg', 1, 1, 0, 0, 0, 0),
(586, 'Benzodiazepine 2 MAX Doses', 1, 1, 0, 0, 0, 0),
(587, 'Vasoopressor Agent 4 MAX doses', 1, 1, 0, 0, 0, 0),
(588, 'Narcotic 2MAX Doses', 1, 1, 0, 0, 0, 0),
(589, 'Anti-Emetic', 1, 1, 0, 0, 0, 0),
(590, 'Scannable Triage Tagging System', 0, 1, 0, 0, 0, 0),
(591, 'Sterile Gloves', 0, 1, 0, 0, 0, 0),
(592, 'Plastic Bag (Placenta)', 0, 1, 0, 0, 0, 0),
(593, 'Tourniquet_Trauma', 0, 1, 0, 0, 0, 0),
(594, 'ETT 5.0mm Cuffed', 1, 1, 0, 0, 0, 0),
(595, 'ETT Cuffed 5.0mm', 1, 1, 0, 0, 0, 0),
(596, 'ETT Cuffed 5.5mm', 1, 1, 0, 0, 0, 0),
(597, 'ETT Cuffed 2.5', 1, 1, 0, 0, 0, 0),
(598, 'ETT Cuffed 3.0', 1, 1, 0, 0, 0, 0),
(599, 'ETT Cuffed 3.5', 1, 1, 0, 0, 0, 0),
(600, 'ETT Cuffed 4.0', 1, 1, 0, 0, 0, 0),
(601, 'ETT Cuffed 5.0', 1, 1, 0, 0, 0, 0),
(602, 'Bougie Device', 1, 1, 0, 0, 0, 0),
(603, 'Decompression Needle', 1, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Maintenance`
--

DROP TABLE IF EXISTS `Maintenance`;
CREATE TABLE IF NOT EXISTS `Maintenance` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Maintenance`
--

INSERT INTO `Maintenance` (`id`, `checksheet_id`, `date`, `user_id`, `comments_id`, `ascreenshot`, `pscreenshot`, `dateresolved`, `pcomments_id`, `resolveduser_id`, `resolved`) VALUES
(1, 1, '2014-02-04 17:57:48', '1', 1, 'before.png', 'after.png', '2014-02-04 18:00:25', 2, '1', 1),
(2, 1, '2014-02-26 17:18:05', '185', 4, 'noimage.jpg', '', '0000-00-00 00:00:00', 0, '', 0),
(3, 2, '2016-01-02 21:42:41', '1', 8, 'noimage.jpg', '', '0000-00-00 00:00:00', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mfr`
--

DROP TABLE IF EXISTS `mfr`;
CREATE TABLE IF NOT EXISTS `mfr` (
  `mfr_id` int(11) NOT NULL AUTO_INCREMENT,
  `mfr_name` varchar(32) NOT NULL,
  `mfr_address` varchar(32) NOT NULL,
  `mfr_city` varchar(32) NOT NULL,
  `mfr_state` varchar(32) NOT NULL,
  `zip` int(5) NOT NULL,
  PRIMARY KEY (`mfr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mfr`
--

INSERT INTO `mfr` (`mfr_id`, `mfr_name`, `mfr_address`, `mfr_city`, `mfr_state`, `zip`) VALUES
(1, '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Philips_Monitor_1`
--

DROP TABLE IF EXISTS `Philips_Monitor_1`;
CREATE TABLE IF NOT EXISTS `Philips_Monitor_1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `Philips_Monitor_1`
--

INSERT INTO `Philips_Monitor_1` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 401, 36, 1, 2, 0, '2012-03-12 16:47:20'),
(2, 402, 36, 1, 3, 0, '2012-03-12 16:47:20'),
(3, 403, 36, 1, 20, 0, '2012-03-12 16:47:20'),
(4, 404, 36, 1, 20, 0, '2012-03-12 16:47:20'),
(5, 405, 36, 1, 20, 0, '2012-03-12 16:47:20'),
(6, 406, 36, 1, 20, 0, '2012-03-12 16:47:20'),
(7, 407, 36, 1, 20, 0, '2012-03-12 16:47:20'),
(8, 409, 36, 1, 2, 0, '2012-03-12 16:47:20'),
(9, 410, 36, 1, 20, 0, '2012-03-12 16:47:20'),
(10, 411, 36, 1, 2, 0, '2012-03-12 16:47:20'),
(11, 412, 36, 1, 2, 0, '2012-03-12 16:47:20');

-- --------------------------------------------------------

--
-- Table structure for table `Philips_Monitor_1_checksheet`
--

DROP TABLE IF EXISTS `Philips_Monitor_1_checksheet`;
CREATE TABLE IF NOT EXISTS `Philips_Monitor_1_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Philips_Monitor_1_events`
--

DROP TABLE IF EXISTS `Philips_Monitor_1_events`;
CREATE TABLE IF NOT EXISTS `Philips_Monitor_1_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `requisition`
--

DROP TABLE IF EXISTS `requisition`;
CREATE TABLE IF NOT EXISTS `requisition` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ch_id` varchar(32) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `req_footer`
--

DROP TABLE IF EXISTS `req_footer`;
CREATE TABLE IF NOT EXISTS `req_footer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ch_id` varchar(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `req_header`
--

DROP TABLE IF EXISTS `req_header`;
CREATE TABLE IF NOT EXISTS `req_header` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ch_id` varchar(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Table structure for table `sealedlist`
--

DROP TABLE IF EXISTS `sealedlist`;
CREATE TABLE IF NOT EXISTS `sealedlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ch_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `exp_date` datetime DEFAULT '0000-00-00 00:00:00',
  `hm_items` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=566 ;

--
-- Dumping data for table `sealedlist`
--

INSERT INTO `sealedlist` (`id`, `ch_id`, `item_id`, `exp_date`, `hm_items`) VALUES
(1, 1001, 50, '2014-07-22 00:00:00', 0),
(2, 1001, 27, '2015-11-27 00:00:00', 0),
(3, 1001, 28, '2015-10-23 00:00:00', 0),
(4, 1001, 96, '2014-09-16 00:00:00', 0),
(5, 1001, 29, '2015-06-05 00:00:00', 0),
(6, 1001, 30, '2016-01-18 00:00:00', 0),
(7, 1001, 31, '2015-10-05 00:00:00', 0),
(8, 1001, 32, '2015-02-22 00:00:00', 0),
(9, 1001, 33, '2015-10-08 00:00:00', 0),
(10, 1001, 44, '2015-11-13 00:00:00', 0),
(11, 1001, 44, '2015-06-05 00:00:00', 0),
(12, 1001, 45, '2015-07-31 00:00:00', 0),
(13, 1001, 45, '2015-01-17 00:00:00', 0),
(14, 1001, 46, '2015-11-11 00:00:00', 0),
(15, 1001, 46, '2014-09-14 00:00:00', 0),
(16, 1001, 47, '2016-01-04 00:00:00', 0),
(17, 1001, 47, '2015-05-27 00:00:00', 0),
(18, 1001, 48, '2015-12-31 00:00:00', 0),
(19, 1001, 48, '2014-06-07 00:00:00', 0),
(20, 1001, 49, '2014-11-16 00:00:00', 0),
(21, 1001, 49, '2015-09-18 00:00:00', 0),
(22, 1001, 62, '2014-08-08 00:00:00', 0),
(23, 1001, 62, '2015-02-12 00:00:00', 0),
(24, 1001, 52, '2014-04-02 00:00:00', 0),
(25, 1001, 52, '2014-05-07 00:00:00', 0),
(26, 1001, 52, '2015-02-22 00:00:00', 0),
(27, 1001, 52, '2015-04-10 00:00:00', 0),
(28, 1001, 52, '2016-03-05 00:00:00', 0),
(29, 1001, 52, '2016-01-28 00:00:00', 0),
(30, 1001, 52, '2014-06-22 00:00:00', 0),
(31, 1001, 53, '2014-07-10 00:00:00', 0),
(32, 1001, 53, '2015-01-01 00:00:00', 0),
(33, 1001, 53, '2015-11-26 00:00:00', 0),
(34, 1001, 55, '2015-11-17 00:00:00', 0),
(35, 1001, 55, '2014-07-30 00:00:00', 0),
(36, 1001, 55, '2014-07-10 00:00:00', 0),
(37, 1001, 55, '2015-09-27 00:00:00', 0),
(38, 1001, 74, '2014-09-08 00:00:00', 0),
(39, 1001, 74, '2015-07-14 00:00:00', 0),
(40, 1001, 92, '2014-12-24 00:00:00', 0),
(41, 1001, 93, '2014-09-10 00:00:00', 0),
(42, 1001, 93, '2015-08-22 00:00:00', 0),
(43, 1001, 64, '2015-09-30 00:00:00', 0),
(44, 1001, 72, '2014-11-25 00:00:00', 0),
(45, 1001, 69, '2014-12-20 00:00:00', 0),
(46, 1001, 11, '0000-00-00 00:00:00', 1),
(47, 1001, 51, '0000-00-00 00:00:00', 5),
(48, 1001, 484, '0000-00-00 00:00:00', 4),
(49, 1001, 41, '0000-00-00 00:00:00', 4),
(50, 1001, 42, '0000-00-00 00:00:00', 2),
(51, 1001, 428, '0000-00-00 00:00:00', 1),
(52, 1001, 10, '0000-00-00 00:00:00', 1),
(53, 1001, 26, '0000-00-00 00:00:00', 2),
(54, 1001, 101, '0000-00-00 00:00:00', 2),
(55, 1001, 98, '0000-00-00 00:00:00', 1),
(56, 1001, 34, '0000-00-00 00:00:00', 1),
(57, 1001, 35, '0000-00-00 00:00:00', 1),
(58, 1001, 36, '0000-00-00 00:00:00', 1),
(59, 1001, 37, '0000-00-00 00:00:00', 1),
(60, 1001, 38, '0000-00-00 00:00:00', 1),
(61, 1004, 52, '2015-11-10 00:00:00', 0),
(62, 1004, 52, '2014-10-31 00:00:00', 0),
(63, 1004, 52, '2014-04-07 00:00:00', 0),
(64, 1004, 52, '2014-05-13 00:00:00', 0),
(65, 1004, 52, '2016-02-25 00:00:00', 0),
(66, 1004, 52, '2015-03-19 00:00:00', 0),
(67, 1004, 52, '2014-07-10 00:00:00', 0),
(68, 1004, 52, '2014-09-28 00:00:00', 0),
(69, 1004, 52, '2015-07-24 00:00:00', 0),
(70, 1004, 52, '2015-07-07 00:00:00', 0),
(71, 1004, 53, '2014-12-11 00:00:00', 0),
(72, 1004, 53, '2014-09-13 00:00:00', 0),
(73, 1004, 53, '2014-09-14 00:00:00', 0),
(74, 1004, 53, '2014-07-01 00:00:00', 0),
(75, 1004, 54, '2015-06-16 00:00:00', 0),
(76, 1004, 54, '2015-12-01 00:00:00', 0),
(77, 1004, 55, '2014-05-05 00:00:00', 0),
(78, 1004, 55, '2015-05-07 00:00:00', 0),
(79, 1004, 55, '2015-09-01 00:00:00', 0),
(80, 1004, 55, '2015-12-27 00:00:00', 0),
(81, 1004, 56, '2016-02-05 00:00:00', 0),
(82, 1004, 57, '2014-06-30 00:00:00', 0),
(83, 1004, 58, '2014-06-24 00:00:00', 0),
(84, 1004, 92, '2015-12-02 00:00:00', 0),
(85, 1004, 93, '2015-04-08 00:00:00', 0),
(86, 1004, 93, '2014-05-04 00:00:00', 0),
(87, 1004, 94, '2015-05-18 00:00:00', 0),
(88, 1004, 95, '2015-12-20 00:00:00', 0),
(89, 1004, 97, '2014-11-17 00:00:00', 0),
(90, 1004, 60, '2015-02-28 00:00:00', 0),
(91, 1004, 60, '2014-05-16 00:00:00', 0),
(92, 1004, 60, '2014-10-10 00:00:00', 0),
(93, 1004, 60, '2014-07-23 00:00:00', 0),
(94, 1004, 60, '2015-03-16 00:00:00', 0),
(95, 1004, 60, '2014-06-14 00:00:00', 0),
(96, 1004, 61, '2015-01-18 00:00:00', 0),
(97, 1004, 61, '2015-01-11 00:00:00', 0),
(98, 1004, 61, '2015-08-23 00:00:00', 0),
(99, 1004, 61, '2014-11-12 00:00:00', 0),
(100, 1004, 62, '2015-04-01 00:00:00', 0),
(101, 1004, 62, '2014-05-02 00:00:00', 0),
(102, 1004, 63, '2014-05-12 00:00:00', 0),
(103, 1004, 63, '2015-01-12 00:00:00', 0),
(104, 1004, 66, '2015-06-27 00:00:00', 0),
(105, 1004, 66, '2014-08-05 00:00:00', 0),
(106, 1004, 66, '2015-02-23 00:00:00', 0),
(107, 1004, 66, '2016-02-26 00:00:00', 0),
(108, 1004, 66, '2014-05-01 00:00:00', 0),
(109, 1004, 67, '2015-09-20 00:00:00', 0),
(110, 1004, 68, '2016-02-20 00:00:00', 0),
(111, 1004, 68, '2015-12-09 00:00:00', 0),
(112, 1004, 69, '2014-10-01 00:00:00', 0),
(113, 1004, 72, '2015-12-05 00:00:00', 0),
(114, 1004, 73, '2014-12-25 00:00:00', 0),
(115, 1004, 74, '2015-04-27 00:00:00', 0),
(116, 1004, 74, '2014-10-30 00:00:00', 0),
(117, 1004, 74, '2015-02-16 00:00:00', 0),
(118, 1004, 74, '2015-09-14 00:00:00', 0),
(119, 1004, 74, '2015-10-06 00:00:00', 0),
(120, 1004, 74, '2015-02-06 00:00:00', 0),
(121, 1004, 64, '2015-05-18 00:00:00', 0),
(122, 1004, 64, '2015-07-19 00:00:00', 0),
(123, 1004, 508, '2015-10-27 00:00:00', 0),
(124, 1004, 508, '2015-11-22 00:00:00', 0),
(125, 1004, 87, '2014-09-19 00:00:00', 0),
(126, 1004, 87, '2015-10-28 00:00:00', 0),
(127, 1004, 88, '2015-02-21 00:00:00', 0),
(128, 1004, 88, '2015-11-06 00:00:00', 0),
(129, 1004, 89, '2014-04-13 00:00:00', 0),
(130, 1004, 89, '2015-02-02 00:00:00', 0),
(131, 1004, 90, '2015-07-01 00:00:00', 0),
(132, 1004, 90, '2015-03-16 00:00:00', 0),
(133, 1004, 96, '2015-10-12 00:00:00', 0),
(134, 1004, 59, '2014-05-24 00:00:00', 0),
(135, 1004, 44, '2014-06-04 00:00:00', 0),
(136, 1004, 44, '2014-05-12 00:00:00', 0),
(137, 1004, 45, '2014-06-10 00:00:00', 0),
(138, 1004, 45, '2015-01-29 00:00:00', 0),
(139, 1004, 46, '2015-05-26 00:00:00', 0),
(140, 1004, 46, '2014-07-25 00:00:00', 0),
(141, 1004, 47, '2015-04-06 00:00:00', 0),
(142, 1004, 47, '2016-02-17 00:00:00', 0),
(143, 1004, 48, '2015-01-19 00:00:00', 0),
(144, 1004, 48, '2015-10-02 00:00:00', 0),
(145, 1004, 49, '2014-06-11 00:00:00', 0),
(146, 1004, 49, '2014-04-29 00:00:00', 0),
(147, 1004, 101, '0000-00-00 00:00:00', 2),
(148, 1004, 85, '0000-00-00 00:00:00', 10),
(149, 1004, 86, '0000-00-00 00:00:00', 10),
(150, 1004, 91, '0000-00-00 00:00:00', 10),
(151, 1004, 98, '0000-00-00 00:00:00', 1),
(152, 1004, 99, '0000-00-00 00:00:00', 1),
(153, 1004, 102, '0000-00-00 00:00:00', 1),
(154, 1004, 81, '0000-00-00 00:00:00', 2),
(155, 1004, 82, '0000-00-00 00:00:00', 2),
(156, 1004, 41, '0000-00-00 00:00:00', 2),
(157, 1004, 84, '0000-00-00 00:00:00', 5),
(158, 1004, 103, '0000-00-00 00:00:00', 1),
(159, 1004, 65, '0000-00-00 00:00:00', 2),
(160, 1005, 481, '0000-00-00 00:00:00', 2),
(161, 1005, 155, '0000-00-00 00:00:00', 2),
(162, 1005, 477, '0000-00-00 00:00:00', 1),
(163, 1005, 478, '0000-00-00 00:00:00', 2),
(164, 1005, 474, '0000-00-00 00:00:00', 2),
(165, 1005, 475, '0000-00-00 00:00:00', 2),
(166, 1005, 154, '0000-00-00 00:00:00', 2),
(167, 1012, 213, '2015-03-31 00:00:00', 0),
(168, 1012, 213, '2015-01-26 00:00:00', 0),
(169, 1012, 214, '2015-09-23 00:00:00', 0),
(170, 1012, 214, '2014-10-29 00:00:00', 0),
(171, 1012, 419, '2015-09-12 00:00:00', 0),
(172, 1012, 54, '2015-04-22 00:00:00', 0),
(173, 1012, 53, '2014-04-07 00:00:00', 0),
(174, 1012, 97, '2016-01-08 00:00:00', 0),
(175, 1012, 64, '2014-11-03 00:00:00', 0),
(176, 1012, 52, '2015-08-27 00:00:00', 0),
(177, 1012, 69, '2015-12-16 00:00:00', 0),
(178, 1012, 230, '2015-10-10 00:00:00', 0),
(179, 1012, 230, '2015-05-19 00:00:00', 0),
(180, 1012, 231, '2015-12-02 00:00:00', 0),
(181, 1012, 231, '2016-01-22 00:00:00', 0),
(182, 1012, 232, '2015-04-17 00:00:00', 0),
(183, 1012, 232, '2015-07-08 00:00:00', 0),
(184, 1012, 233, '2015-02-22 00:00:00', 0),
(185, 1012, 233, '2015-06-03 00:00:00', 0),
(186, 1012, 234, '2015-04-06 00:00:00', 0),
(187, 1012, 234, '2014-06-16 00:00:00', 0),
(188, 1012, 235, '2014-06-11 00:00:00', 0),
(189, 1012, 235, '2014-03-22 00:00:00', 0),
(190, 1012, 236, '2016-02-04 00:00:00', 0),
(191, 1012, 236, '2014-07-07 00:00:00', 0),
(192, 1012, 237, '2015-02-05 00:00:00', 0),
(193, 1012, 237, '2014-08-17 00:00:00', 0),
(194, 1012, 238, '2016-02-15 00:00:00', 0),
(195, 1012, 238, '2014-03-27 00:00:00', 0),
(196, 1012, 215, '0000-00-00 00:00:00', 1),
(197, 1012, 85, '0000-00-00 00:00:00', 10),
(198, 1012, 42, '0000-00-00 00:00:00', 1),
(199, 1012, 212, '0000-00-00 00:00:00', 1),
(200, 1012, 225, '0000-00-00 00:00:00', 1),
(201, 1012, 227, '0000-00-00 00:00:00', 1),
(202, 1012, 228, '0000-00-00 00:00:00', 1),
(203, 1012, 229, '0000-00-00 00:00:00', 1),
(204, 1012, 219, '0000-00-00 00:00:00', 1),
(205, 1012, 218, '0000-00-00 00:00:00', 1),
(206, 1012, 220, '0000-00-00 00:00:00', 1),
(207, 1012, 221, '0000-00-00 00:00:00', 1),
(208, 1012, 222, '0000-00-00 00:00:00', 1),
(209, 1012, 223, '0000-00-00 00:00:00', 1),
(210, 1012, 224, '0000-00-00 00:00:00', 2),
(211, 1012, 226, '0000-00-00 00:00:00', 1),
(212, 1012, 507, '0000-00-00 00:00:00', 2),
(213, 1015, 260, '2016-01-08 00:00:00', 0),
(214, 1015, 260, '2015-11-06 00:00:00', 0),
(215, 1015, 262, '2015-03-24 00:00:00', 0),
(216, 1015, 262, '2015-04-26 00:00:00', 0),
(217, 1015, 263, '2015-05-24 00:00:00', 0),
(218, 1015, 263, '2014-07-24 00:00:00', 0),
(219, 1015, 420, '2016-01-05 00:00:00', 0),
(220, 1015, 420, '2014-06-27 00:00:00', 0),
(221, 1015, 265, '2015-05-14 00:00:00', 0),
(222, 1015, 265, '2014-07-14 00:00:00', 0),
(223, 1015, 266, '2015-06-10 00:00:00', 0),
(224, 1015, 266, '2014-04-24 00:00:00', 0),
(225, 1015, 261, '2015-02-12 00:00:00', 0),
(226, 1015, 261, '2015-06-29 00:00:00', 0),
(227, 1015, 103, '0000-00-00 00:00:00', 1),
(228, 1018, 315, '2014-04-11 00:00:00', 0),
(229, 1018, 96, '2014-09-06 00:00:00', 0),
(230, 1018, 44, '2014-08-18 00:00:00', 0),
(231, 1018, 44, '2015-08-11 00:00:00', 0),
(232, 1018, 44, '2014-07-09 00:00:00', 0),
(233, 1018, 44, '2014-11-11 00:00:00', 0),
(234, 1018, 44, '2015-08-14 00:00:00', 0),
(235, 1018, 45, '2014-06-06 00:00:00', 0),
(236, 1018, 45, '2015-03-01 00:00:00', 0),
(237, 1018, 45, '2014-07-14 00:00:00', 0),
(238, 1018, 45, '2014-11-05 00:00:00', 0),
(239, 1018, 45, '2015-02-08 00:00:00', 0),
(240, 1018, 46, '2014-07-22 00:00:00', 0),
(241, 1018, 46, '2015-11-17 00:00:00', 0),
(242, 1018, 46, '2015-12-18 00:00:00', 0),
(243, 1018, 46, '2016-01-26 00:00:00', 0),
(244, 1018, 46, '2014-07-09 00:00:00', 0),
(245, 1018, 47, '2015-09-28 00:00:00', 0),
(246, 1018, 47, '2015-04-02 00:00:00', 0),
(247, 1018, 47, '2014-11-04 00:00:00', 0),
(248, 1018, 47, '2015-07-27 00:00:00', 0),
(249, 1018, 47, '2015-07-12 00:00:00', 0),
(250, 1018, 42, '0000-00-00 00:00:00', 2),
(251, 1018, 306, '0000-00-00 00:00:00', 2),
(252, 1018, 86, '0000-00-00 00:00:00', 1),
(253, 1018, 297, '0000-00-00 00:00:00', 2),
(254, 1018, 300, '0000-00-00 00:00:00', 2),
(255, 1018, 295, '0000-00-00 00:00:00', 2),
(256, 1018, 298, '0000-00-00 00:00:00', 9),
(257, 1018, 301, '0000-00-00 00:00:00', 6),
(258, 1018, 307, '0000-00-00 00:00:00', 1),
(259, 1018, 308, '0000-00-00 00:00:00', 1),
(260, 1018, 149, '0000-00-00 00:00:00', 1),
(261, 1018, 310, '0000-00-00 00:00:00', 1),
(262, 1018, 51, '0000-00-00 00:00:00', 5),
(263, 1018, 85, '0000-00-00 00:00:00', 1),
(264, 1018, 98, '0000-00-00 00:00:00', 1),
(265, 1018, 101, '0000-00-00 00:00:00', 1),
(266, 1018, 116, '0000-00-00 00:00:00', 1),
(267, 1018, 118, '0000-00-00 00:00:00', 1),
(268, 1023, 12, '2015-03-26 00:00:00', 0),
(269, 1023, 18, '2014-06-17 00:00:00', 0),
(270, 1023, 18, '2015-12-17 00:00:00', 0),
(271, 1023, 19, '2014-06-28 00:00:00', 0),
(272, 1023, 19, '2014-07-24 00:00:00', 0),
(273, 1023, 20, '2015-01-02 00:00:00', 0),
(274, 1023, 20, '2015-08-05 00:00:00', 0),
(275, 1023, 21, '2015-09-29 00:00:00', 0),
(276, 1023, 21, '2015-05-09 00:00:00', 0),
(277, 1023, 23, '2014-10-12 00:00:00', 0),
(278, 1023, 23, '2015-12-19 00:00:00', 0),
(279, 1023, 24, '2014-11-03 00:00:00', 0),
(280, 1023, 24, '2014-03-19 00:00:00', 0),
(281, 1023, 22, '2015-08-29 00:00:00', 0),
(282, 1023, 22, '2016-02-29 00:00:00', 0),
(283, 1023, 39, '0000-00-00 00:00:00', 1),
(284, 1023, 484, '0000-00-00 00:00:00', 6),
(285, 1023, 42, '0000-00-00 00:00:00', 1),
(286, 1023, 43, '0000-00-00 00:00:00', 1),
(287, 1023, 558, '0000-00-00 00:00:00', 2),
(288, 1023, 13, '0000-00-00 00:00:00', 1),
(289, 1023, 14, '0000-00-00 00:00:00', 1),
(290, 1023, 16, '0000-00-00 00:00:00', 1),
(291, 1023, 15, '0000-00-00 00:00:00', 1),
(292, 1023, 17, '0000-00-00 00:00:00', 1),
(293, 1023, 25, '0000-00-00 00:00:00', 2),
(294, 1022, 55, '2014-10-07 00:00:00', 0),
(295, 1022, 127, '2014-11-07 00:00:00', 0),
(296, 1022, 513, '2014-07-17 00:00:00', 0),
(297, 1022, 513, '2014-06-30 00:00:00', 0),
(298, 1022, 510, '2014-03-19 00:00:00', 0),
(299, 1022, 510, '2015-10-16 00:00:00', 0),
(300, 1022, 511, '2014-07-15 00:00:00', 0),
(301, 1022, 511, '2014-11-06 00:00:00', 0),
(302, 1022, 512, '2014-09-18 00:00:00', 0),
(303, 1022, 512, '2014-11-17 00:00:00', 0),
(304, 1022, 509, '0000-00-00 00:00:00', 1),
(305, 1022, 118, '0000-00-00 00:00:00', 1),
(306, 1022, 41, '0000-00-00 00:00:00', 1),
(307, 1, 391, '0000-00-00 00:00:00', 0),
(308, 1, 391, '0000-00-00 00:00:00', 0),
(309, 1, 391, '0000-00-00 00:00:00', 0),
(310, 1, 391, '0000-00-00 00:00:00', 0),
(311, 1, 391, '0000-00-00 00:00:00', 0),
(312, 1, 391, '0000-00-00 00:00:00', 0),
(313, 1, 391, '0000-00-00 00:00:00', 0),
(314, 1, 391, '0000-00-00 00:00:00', 0),
(315, 1, 391, '0000-00-00 00:00:00', 0),
(316, 1, 391, '0000-00-00 00:00:00', 0),
(317, 1, 411, '0000-00-00 00:00:00', 0),
(318, 1, 411, '0000-00-00 00:00:00', 0),
(319, 1, 412, '0000-00-00 00:00:00', 0),
(320, 1, 412, '0000-00-00 00:00:00', 0),
(321, 1, 254, '0000-00-00 00:00:00', 0),
(322, 1, 254, '0000-00-00 00:00:00', 0),
(323, 1, 153, '0000-00-00 00:00:00', 0),
(324, 1, 160, '0000-00-00 00:00:00', 0),
(325, 1, 96, '0000-00-00 00:00:00', 0),
(326, 1, 96, '0000-00-00 00:00:00', 0),
(327, 1, 96, '0000-00-00 00:00:00', 0),
(328, 1, 96, '0000-00-00 00:00:00', 0),
(329, 1, 96, '0000-00-00 00:00:00', 0),
(330, 1, 96, '0000-00-00 00:00:00', 0),
(331, 1, 127, '0000-00-00 00:00:00', 0),
(332, 1, 127, '0000-00-00 00:00:00', 0),
(333, 1, 127, '0000-00-00 00:00:00', 0),
(334, 1, 127, '0000-00-00 00:00:00', 0),
(335, 1, 127, '0000-00-00 00:00:00', 0),
(336, 1, 127, '0000-00-00 00:00:00', 0),
(337, 1, 127, '0000-00-00 00:00:00', 0),
(338, 1, 127, '0000-00-00 00:00:00', 0),
(339, 1, 127, '0000-00-00 00:00:00', 0),
(340, 1, 127, '0000-00-00 00:00:00', 0),
(341, 1, 528, '0000-00-00 00:00:00', 0),
(342, 1, 528, '0000-00-00 00:00:00', 0),
(343, 1, 528, '0000-00-00 00:00:00', 0),
(344, 1, 528, '0000-00-00 00:00:00', 0),
(345, 1, 528, '0000-00-00 00:00:00', 0),
(346, 1, 528, '0000-00-00 00:00:00', 0),
(347, 1, 528, '0000-00-00 00:00:00', 0),
(348, 1, 528, '0000-00-00 00:00:00', 0),
(349, 1, 528, '0000-00-00 00:00:00', 0),
(350, 1, 528, '0000-00-00 00:00:00', 0),
(351, 1, 44, '0000-00-00 00:00:00', 0),
(352, 1, 44, '0000-00-00 00:00:00', 0),
(353, 1, 44, '0000-00-00 00:00:00', 0),
(354, 1, 44, '0000-00-00 00:00:00', 0),
(355, 1, 44, '0000-00-00 00:00:00', 0),
(356, 1, 44, '0000-00-00 00:00:00', 0),
(357, 1, 44, '0000-00-00 00:00:00', 0),
(358, 1, 44, '0000-00-00 00:00:00', 0),
(359, 1, 44, '0000-00-00 00:00:00', 0),
(360, 1, 44, '0000-00-00 00:00:00', 0),
(361, 1, 45, '0000-00-00 00:00:00', 0),
(362, 1, 45, '0000-00-00 00:00:00', 0),
(363, 1, 45, '0000-00-00 00:00:00', 0),
(364, 1, 45, '0000-00-00 00:00:00', 0),
(365, 1, 45, '0000-00-00 00:00:00', 0),
(366, 1, 45, '0000-00-00 00:00:00', 0),
(367, 1, 45, '0000-00-00 00:00:00', 0),
(368, 1, 45, '0000-00-00 00:00:00', 0),
(369, 1, 45, '0000-00-00 00:00:00', 0),
(370, 1, 45, '0000-00-00 00:00:00', 0),
(371, 1, 46, '0000-00-00 00:00:00', 0),
(372, 1, 46, '0000-00-00 00:00:00', 0),
(373, 1, 46, '0000-00-00 00:00:00', 0),
(374, 1, 46, '0000-00-00 00:00:00', 0),
(375, 1, 46, '0000-00-00 00:00:00', 0),
(376, 1, 46, '0000-00-00 00:00:00', 0),
(377, 1, 46, '0000-00-00 00:00:00', 0),
(378, 1, 46, '0000-00-00 00:00:00', 0),
(379, 1, 46, '0000-00-00 00:00:00', 0),
(380, 1, 46, '0000-00-00 00:00:00', 0),
(381, 1, 47, '0000-00-00 00:00:00', 0),
(382, 1, 47, '0000-00-00 00:00:00', 0),
(383, 1, 47, '0000-00-00 00:00:00', 0),
(384, 1, 47, '0000-00-00 00:00:00', 0),
(385, 1, 47, '0000-00-00 00:00:00', 0),
(386, 1, 47, '0000-00-00 00:00:00', 0),
(387, 1, 47, '0000-00-00 00:00:00', 0),
(388, 1, 47, '0000-00-00 00:00:00', 0),
(389, 1, 47, '0000-00-00 00:00:00', 0),
(390, 1, 47, '0000-00-00 00:00:00', 0),
(391, 1, 48, '0000-00-00 00:00:00', 0),
(392, 1, 48, '0000-00-00 00:00:00', 0),
(393, 1, 48, '0000-00-00 00:00:00', 0),
(394, 1, 48, '0000-00-00 00:00:00', 0),
(395, 1, 48, '0000-00-00 00:00:00', 0),
(396, 1, 48, '0000-00-00 00:00:00', 0),
(397, 1, 48, '0000-00-00 00:00:00', 0),
(398, 1, 48, '0000-00-00 00:00:00', 0),
(399, 1, 48, '0000-00-00 00:00:00', 0),
(400, 1, 48, '0000-00-00 00:00:00', 0),
(401, 1, 49, '0000-00-00 00:00:00', 0),
(402, 1, 49, '0000-00-00 00:00:00', 0),
(403, 1, 49, '0000-00-00 00:00:00', 0),
(404, 1, 49, '0000-00-00 00:00:00', 0),
(405, 1, 49, '0000-00-00 00:00:00', 0),
(406, 1, 49, '0000-00-00 00:00:00', 0),
(407, 1, 49, '0000-00-00 00:00:00', 0),
(408, 1, 49, '0000-00-00 00:00:00', 0),
(409, 1, 49, '0000-00-00 00:00:00', 0),
(410, 1, 49, '0000-00-00 00:00:00', 0),
(411, 1017, 290, '0000-00-00 00:00:00', 0),
(412, 1017, 562, '0000-00-00 00:00:00', 0),
(413, 1017, 562, '0000-00-00 00:00:00', 0),
(414, 1017, 562, '0000-00-00 00:00:00', 0),
(415, 1017, 562, '0000-00-00 00:00:00', 0),
(416, 24005, 481, '0000-00-00 00:00:00', 2),
(417, 24005, 155, '0000-00-00 00:00:00', 2),
(418, 24005, 477, '0000-00-00 00:00:00', 1),
(419, 24005, 478, '0000-00-00 00:00:00', 2),
(420, 24005, 474, '0000-00-00 00:00:00', 2),
(421, 24005, 475, '0000-00-00 00:00:00', 2),
(422, 24005, 154, '0000-00-00 00:00:00', 2),
(423, 2001, 50, '2015-05-14 00:00:00', 0),
(424, 2001, 27, '2016-01-26 00:00:00', 0),
(425, 2001, 28, '2015-03-27 00:00:00', 0),
(426, 2001, 96, '2015-12-24 00:00:00', 0),
(427, 2001, 29, '2014-06-30 00:00:00', 0),
(428, 2001, 30, '2015-11-19 00:00:00', 0),
(429, 2001, 31, '2015-06-01 00:00:00', 0),
(430, 2001, 32, '2016-01-21 00:00:00', 0),
(431, 2001, 33, '2015-10-08 00:00:00', 0),
(432, 2001, 44, '2014-03-21 00:00:00', 0),
(433, 2001, 44, '2015-07-31 00:00:00', 0),
(434, 2001, 45, '2014-06-10 00:00:00', 0),
(435, 2001, 45, '2014-12-28 00:00:00', 0),
(436, 2001, 46, '2014-04-08 00:00:00', 0),
(437, 2001, 46, '2015-08-20 00:00:00', 0),
(438, 2001, 47, '2014-10-22 00:00:00', 0),
(439, 2001, 47, '2015-12-17 00:00:00', 0),
(440, 2001, 48, '2014-06-10 00:00:00', 0),
(441, 2001, 48, '2014-07-09 00:00:00', 0),
(442, 2001, 49, '2015-09-20 00:00:00', 0),
(443, 2001, 49, '2015-05-27 00:00:00', 0),
(444, 2001, 62, '2015-11-24 00:00:00', 0),
(445, 2001, 62, '2016-01-26 00:00:00', 0),
(446, 2001, 52, '2015-08-25 00:00:00', 0),
(447, 2001, 52, '2015-11-13 00:00:00', 0),
(448, 2001, 52, '2014-06-29 00:00:00', 0),
(449, 2001, 52, '2015-05-28 00:00:00', 0),
(450, 2001, 52, '2014-12-08 00:00:00', 0),
(451, 2001, 52, '2015-07-07 00:00:00', 0),
(452, 2001, 52, '2015-12-01 00:00:00', 0),
(453, 2001, 53, '2015-06-07 00:00:00', 0),
(454, 2001, 53, '2015-04-06 00:00:00', 0),
(455, 2001, 53, '2015-10-10 00:00:00', 0),
(456, 2001, 55, '2015-01-12 00:00:00', 0),
(457, 2001, 55, '2014-08-26 00:00:00', 0),
(458, 2001, 55, '2014-08-10 00:00:00', 0),
(459, 2001, 55, '2014-08-30 00:00:00', 0),
(460, 2001, 74, '2015-10-10 00:00:00', 0),
(461, 2001, 74, '2015-08-04 00:00:00', 0),
(462, 2001, 92, '2016-02-18 00:00:00', 0),
(464, 2001, 93, '2014-04-16 00:00:00', 0),
(465, 2001, 64, '2016-02-08 00:00:00', 0),
(466, 2001, 72, '2014-06-16 00:00:00', 0),
(467, 2001, 69, '2014-05-13 00:00:00', 0),
(468, 2001, 11, '0000-00-00 00:00:00', 1),
(469, 2001, 51, '0000-00-00 00:00:00', 5),
(470, 2001, 42, '0000-00-00 00:00:00', 2),
(471, 2001, 10, '0000-00-00 00:00:00', 1),
(472, 2001, 428, '0000-00-00 00:00:00', 1),
(473, 2001, 26, '0000-00-00 00:00:00', 2),
(474, 2001, 101, '0000-00-00 00:00:00', 2),
(475, 2001, 98, '0000-00-00 00:00:00', 1),
(476, 2001, 41, '0000-00-00 00:00:00', 4),
(477, 2001, 484, '0000-00-00 00:00:00', 4),
(478, 2001, 34, '0000-00-00 00:00:00', 1),
(479, 2001, 35, '0000-00-00 00:00:00', 1),
(480, 2001, 36, '0000-00-00 00:00:00', 1),
(481, 2001, 37, '0000-00-00 00:00:00', 1),
(482, 2001, 38, '0000-00-00 00:00:00', 1),
(483, 2001, 582, '0000-00-00 00:00:00', 0),
(484, 2001, 582, '0000-00-00 00:00:00', 0),
(485, 2001, 582, '0000-00-00 00:00:00', 0),
(486, 2001, 582, '0000-00-00 00:00:00', 0),
(487, 2001, 59, '0000-00-00 00:00:00', 0),
(488, 2001, 583, '0000-00-00 00:00:00', 0),
(489, 2001, 584, '0000-00-00 00:00:00', 0),
(490, 2001, 585, '0000-00-00 00:00:00', 0),
(491, 2001, 92, '0000-00-00 00:00:00', 0),
(492, 2001, 60, '0000-00-00 00:00:00', 0),
(493, 2001, 60, '0000-00-00 00:00:00', 0),
(494, 2001, 60, '0000-00-00 00:00:00', 0),
(495, 2001, 60, '0000-00-00 00:00:00', 0),
(496, 2001, 53, '0000-00-00 00:00:00', 0),
(497, 2001, 62, '0000-00-00 00:00:00', 0),
(498, 2001, 67, '0000-00-00 00:00:00', 0),
(499, 2001, 67, '0000-00-00 00:00:00', 0),
(500, 2001, 127, '0000-00-00 00:00:00', 0),
(501, 2001, 586, '0000-00-00 00:00:00', 0),
(502, 2001, 587, '0000-00-00 00:00:00', 0),
(503, 2001, 588, '0000-00-00 00:00:00', 0),
(504, 2001, 589, '0000-00-00 00:00:00', 0),
(505, 2001, 63, '0000-00-00 00:00:00', 0),
(506, 2001, 81, '0000-00-00 00:00:00', 1),
(507, 2001, 82, '0000-00-00 00:00:00', 1),
(508, 2001, 103, '0000-00-00 00:00:00', 1),
(509, 2001, 212, '0000-00-00 00:00:00', 1),
(510, 2003, 477, '0000-00-00 00:00:00', 1),
(511, 2003, 474, '0000-00-00 00:00:00', 1),
(512, 2003, 428, '0000-00-00 00:00:00', 1),
(513, 2003, 481, '0000-00-00 00:00:00', 1),
(514, 2003, 591, '0000-00-00 00:00:00', 1),
(515, 2003, 478, '0000-00-00 00:00:00', 1),
(516, 2003, 475, '0000-00-00 00:00:00', 1),
(517, 2003, 155, '0000-00-00 00:00:00', 1),
(518, 2005, 12, '0000-00-00 00:00:00', 0),
(519, 2005, 18, '0000-00-00 00:00:00', 0),
(520, 2005, 18, '0000-00-00 00:00:00', 0),
(521, 2005, 19, '0000-00-00 00:00:00', 0),
(522, 2005, 19, '0000-00-00 00:00:00', 0),
(523, 2005, 20, '0000-00-00 00:00:00', 0),
(524, 2005, 20, '0000-00-00 00:00:00', 0),
(525, 2005, 21, '0000-00-00 00:00:00', 0),
(526, 2005, 21, '0000-00-00 00:00:00', 0),
(527, 2005, 23, '0000-00-00 00:00:00', 0),
(528, 2005, 23, '0000-00-00 00:00:00', 0),
(529, 2005, 24, '0000-00-00 00:00:00', 0),
(530, 2005, 24, '0000-00-00 00:00:00', 0),
(531, 2005, 22, '0000-00-00 00:00:00', 0),
(532, 2005, 22, '0000-00-00 00:00:00', 0),
(533, 2005, 39, '0000-00-00 00:00:00', 1),
(534, 2005, 484, '0000-00-00 00:00:00', 6),
(535, 2005, 43, '0000-00-00 00:00:00', 1),
(536, 2005, 42, '0000-00-00 00:00:00', 1),
(537, 2005, 558, '0000-00-00 00:00:00', 2),
(538, 2005, 13, '0000-00-00 00:00:00', 1),
(539, 2005, 14, '0000-00-00 00:00:00', 1),
(540, 2005, 16, '0000-00-00 00:00:00', 1),
(541, 2005, 15, '0000-00-00 00:00:00', 1),
(542, 2005, 17, '0000-00-00 00:00:00', 1),
(543, 2005, 25, '0000-00-00 00:00:00', 2),
(544, 2005, 595, '0000-00-00 00:00:00', 0),
(545, 2005, 597, '0000-00-00 00:00:00', 0),
(546, 2005, 597, '0000-00-00 00:00:00', 0),
(547, 2005, 598, '0000-00-00 00:00:00', 0),
(548, 2005, 598, '0000-00-00 00:00:00', 0),
(549, 2005, 599, '0000-00-00 00:00:00', 0),
(550, 2005, 599, '0000-00-00 00:00:00', 0),
(551, 2005, 600, '0000-00-00 00:00:00', 0),
(552, 2005, 600, '0000-00-00 00:00:00', 0),
(553, 2005, 601, '0000-00-00 00:00:00', 0),
(554, 2005, 601, '0000-00-00 00:00:00', 0),
(555, 2005, 218, '0000-00-00 00:00:00', 1),
(556, 2005, 221, '0000-00-00 00:00:00', 1),
(557, 2005, 222, '0000-00-00 00:00:00', 1),
(558, 2005, 223, '0000-00-00 00:00:00', 1),
(559, 2005, 220, '0000-00-00 00:00:00', 1),
(560, 2005, 525, '0000-00-00 00:00:00', 1),
(561, 2005, 507, '0000-00-00 00:00:00', 1),
(562, 2005, 226, '0000-00-00 00:00:00', 1),
(563, 2005, 603, '0000-00-00 00:00:00', 0),
(564, 2005, 603, '0000-00-00 00:00:00', 0),
(565, 2005, 225, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Series`
--

DROP TABLE IF EXISTS `Series`;
CREATE TABLE IF NOT EXISTS `Series` (
  `id` varchar(9) NOT NULL,
  `series` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Series`
--

INSERT INTO `Series` (`id`, `series`) VALUES
('A-Shift', 'A-Shift'),
('B-Shift', 'B-Shift'),
('C-Shift', 'C-Shift');

-- --------------------------------------------------------

--
-- Table structure for table `Station`
--

DROP TABLE IF EXISTS `Station`;
CREATE TABLE IF NOT EXISTS `Station` (
  `id` tinyint(2) NOT NULL,
  `Station` varchar(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Station`
--

INSERT INTO `Station` (`id`, `Station`) VALUES
(1, 'Station-1'),
(2, 'Station-2'),
(3, 'Station-3'),
(4, 'Station-4'),
(5, 'Station-5'),
(6, 'Station-6'),
(7, 'Event'),
(8, 'OOS'),
(9, 'Crew Hall'),
(0, 'CH--OOS');

-- --------------------------------------------------------

--
-- Table structure for table `Station1`
--

DROP TABLE IF EXISTS `Station1`;
CREATE TABLE IF NOT EXISTS `Station1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `Station1`
--

INSERT INTO `Station1` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 268, 12, 1, 20, 0, '0000-00-00 00:00:00'),
(2, 269, 12, 1, 20, 0, '0000-00-00 00:00:00'),
(3, 270, 12, 1, 20, 0, '0000-00-00 00:00:00'),
(4, 271, 12, 1, 20, 0, '0000-00-00 00:00:00'),
(5, 272, 12, 1, 20, 0, '0000-00-00 00:00:00'),
(6, 273, 12, 1, 20, 0, '0000-00-00 00:00:00'),
(7, 274, 12, 1, 20, 0, '0000-00-00 00:00:00'),
(8, 415, 12, 27, 20, 0, '0000-00-00 00:00:00'),
(9, 514, 16, 1, 25, 0, '0000-00-00 00:00:00'),
(10, 158, 12, 27, 20, 0, '0000-00-00 00:00:00'),
(11, 515, 12, 41, 20, 0, '0000-00-00 00:00:00'),
(12, 516, 12, 41, 20, 0, '0000-00-00 00:00:00'),
(13, 517, 12, 41, 20, 0, '0000-00-00 00:00:00'),
(14, 246, 12, 41, 20, 0, '0000-00-00 00:00:00'),
(15, 518, 12, 27, 20, 0, '0000-00-00 00:00:00'),
(16, 524, 12, 1, 20, 0, '0000-00-00 00:00:00'),
(17, 525, 12, 1, 20, 0, '0000-00-00 00:00:00'),
(18, 525, 12, 1, 20, 0, '0000-00-00 00:00:00'),
(19, 532, 12, 1, 20, 0, '0000-00-00 00:00:00'),
(20, 533, 12, 1, 20, 0, '0000-00-00 00:00:00'),
(21, 534, 12, 1, 20, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Station1_checksheet`
--

DROP TABLE IF EXISTS `Station1_checksheet`;
CREATE TABLE IF NOT EXISTS `Station1_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `Station1_checksheet`
--

INSERT INTO `Station1_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 268, '1', 'cb', 12, 1),
(2, 1, 269, '1', 'cb', 12, 1),
(3, 1, 270, '1', 'cb', 12, 1),
(4, 1, 271, '1', 'cb', 12, 1),
(5, 1, 272, '1', 'cb', 12, 1),
(6, 1, 273, '1', 'cb', 12, 1),
(7, 1, 274, '1', 'cb', 12, 1),
(8, 1, 524, '1', 'cb', 12, 1),
(9, 1, 525, '1', 'cb', 12, 1),
(10, 1, 532, '1', 'cb', 12, 1),
(11, 1, 533, '1', 'cb', 12, 1),
(12, 1, 534, '1', 'cb', 12, 1),
(13, 1, 415, '1', 'cb', 12, 27),
(14, 1, 158, '1', 'cb', 12, 27),
(15, 1, 518, '1', 'cb', 12, 27),
(16, 1, 515, '1', 'cb', 12, 41),
(17, 1, 516, '1', 'cb', 12, 41),
(18, 1, 517, '1', 'cb', 12, 41),
(19, 1, 246, '1', 'cb', 12, 41),
(20, 1, 514, '', 'comment', 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Station1_events`
--

DROP TABLE IF EXISTS `Station1_events`;
CREATE TABLE IF NOT EXISTS `Station1_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Station1_events`
--

INSERT INTO `Station1_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-03-18 23:46:40', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Subcategory`
--

DROP TABLE IF EXISTS `Subcategory`;
CREATE TABLE IF NOT EXISTS `Subcategory` (
  `subcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `subcategory_name` varchar(32) NOT NULL,
  `cols` tinyint(1) NOT NULL,
  PRIMARY KEY (`subcategory_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `Subcategory`
--

INSERT INTO `Subcategory` (`subcategory_id`, `subcategory_name`, `cols`) VALUES
(1, '-', 3),
(25, 'Laryngoscope', 3),
(3, 'Endotracheal Tubes', 3),
(4, 'Nasopharyngeal Airways', 3),
(5, 'Oropharyngeal Airways', 3),
(6, 'IV Caths', 3),
(7, 'Pulse Oximetry', 3),
(8, 'Zoll', 2),
(9, 'Glucometer', 3),
(10, 'Thermoscan', 3),
(11, 'BoardSplints', 3),
(12, 'Frac-Pac Splints', 3),
(13, 'Spare BVMs', 3),
(14, 'Gloves', 2),
(15, 'TB Masks', 3),
(16, 'HP', 2),
(17, 'CO2 Monitoring', 3),
(18, 'Philips', 3),
(19, 'Pacing', 3),
(20, 'Electric', 3),
(21, 'Lights', 4),
(22, 'Tires', 2),
(23, 'Mech_Fluid', 3),
(24, 'Oxygen Management', 3),
(2, 'Personnel', 2),
(26, 'Mech_Comment', 1),
(27, 'Closet', 3),
(28, 'Printer', 2),
(29, 'Cooler', 3),
(30, 'Stair Chair', 3),
(31, 'Cot', 2),
(32, '--', 2),
(33, 'Syringes', 2),
(34, 'Water Safety', 2),
(35, 'AED', 2),
(36, 'Spare', 2),
(37, 'Portable Suction', 2),
(38, 'Fixed Suction', 2),
(39, 'Dressing', 3),
(40, 'IV', 2),
(41, 'MFC 8220', 3),
(42, 'MFC 7840W', 3),
(43, 'Sager Splints', 2),
(44, 'Garbonus', 2),
(45, 'Mapping', 3),
(46, 'Sphygmomanometer', 3);

-- --------------------------------------------------------

--
-- Table structure for table `TN_ALS`
--

DROP TABLE IF EXISTS `TN_ALS`;
CREATE TABLE IF NOT EXISTS `TN_ALS` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=251 ;

--
-- Dumping data for table `TN_ALS`
--

INSERT INTO `TN_ALS` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 1, 3, 1, 21, 1, '2013-08-23 21:33:10'),
(2, 2, 3, 1, 21, 1, '2013-08-23 21:33:10'),
(3, 561, 3, 1, 27, 0, '2013-08-23 21:34:09'),
(4, 3, 3, 1, 23, 1, '2012-03-12 16:47:27'),
(5, 4, 3, 1, 24, 1, '2012-03-12 16:47:27'),
(6, 6, 3, 1, 24, 1, '2012-03-12 16:47:27'),
(7, 7, 3, 1, 24, 1, '2012-03-12 16:47:27'),
(8, 175, 3, 1, 2, 0, '2012-03-12 16:47:27'),
(9, 176, 3, 1, 2, 0, '2012-03-12 16:47:27'),
(10, 177, 3, 1, 3, 0, '2012-03-12 16:47:27'),
(14, 8, 3, 2, 22, 1, '2012-03-12 16:47:27'),
(15, 9, 3, 2, 22, 1, '2012-03-12 16:47:27'),
(16, 495, 3, 2, 16, 0, '2012-03-12 16:47:27'),
(17, 104, 3, 20, 20, 0, '2012-03-12 16:47:27'),
(18, 105, 3, 20, 20, 0, '2012-03-12 16:47:27'),
(19, 106, 3, 20, 20, 0, '2012-03-12 16:47:27'),
(20, 107, 3, 20, 20, 0, '2012-03-12 16:47:27'),
(21, 108, 3, 20, 20, 0, '2012-03-12 16:47:27'),
(22, 109, 3, 20, 20, 0, '2012-03-12 16:47:27'),
(23, 130, 3, 21, 20, 0, '2012-03-12 16:47:27'),
(24, 131, 3, 21, 20, 0, '2012-03-12 16:47:27'),
(25, 132, 3, 21, 20, 0, '2012-03-12 16:47:27'),
(26, 133, 3, 21, 20, 0, '2012-03-12 16:47:27'),
(27, 134, 3, 21, 20, 0, '2012-03-12 16:47:27'),
(28, 135, 3, 21, 20, 0, '2012-03-12 16:47:27'),
(29, 136, 3, 21, 20, 0, '2012-03-12 16:47:27'),
(30, 137, 3, 21, 20, 0, '2012-03-12 16:47:27'),
(31, 138, 3, 21, 20, 0, '2012-03-12 16:47:27'),
(32, 139, 3, 21, 20, 0, '2012-03-12 16:47:27'),
(33, 140, 3, 21, 20, 0, '2012-03-12 16:47:27'),
(34, 141, 3, 21, 20, 0, '2012-03-12 16:47:27'),
(35, 283, 3, 22, 19, 0, '2012-03-12 16:47:27'),
(36, 284, 3, 22, 16, 0, '2012-03-12 16:47:27'),
(37, 285, 3, 22, 16, 0, '2012-03-12 16:47:27'),
(38, 286, 3, 22, 16, 0, '2012-03-12 16:47:27'),
(39, 287, 3, 22, 16, 0, '2012-03-12 16:47:27'),
(40, 288, 3, 22, 16, 0, '2012-03-12 16:47:27'),
(41, 289, 3, 22, 16, 0, '2012-03-12 16:47:27'),
(42, 331, 3, 23, 20, 0, '2012-03-12 16:47:27'),
(43, 332, 3, 23, 20, 0, '2012-03-12 16:47:27'),
(44, 333, 3, 23, 20, 0, '2012-03-12 16:47:27'),
(45, 334, 3, 23, 20, 0, '2012-03-12 16:47:27'),
(46, 335, 3, 23, 20, 0, '2012-03-12 16:47:27'),
(47, 336, 3, 23, 20, 0, '2012-03-12 16:47:27'),
(48, 337, 3, 23, 20, 0, '2012-03-12 16:47:27'),
(55, 379, 4, 1, 20, 0, '2012-03-18 00:46:52'),
(56, 548, 36, 1, 20, 0, '2012-03-18 00:58:09'),
(57, 401, 36, 1, 2, 0, '2012-03-18 00:58:59'),
(64, 410, 36, 1, 20, 0, '2012-03-18 01:04:18'),
(65, 549, 36, 1, 20, 0, '2012-03-18 01:04:52'),
(68, 403, 36, 7, 20, 0, '2012-03-18 01:07:49'),
(69, 404, 36, 7, 20, 0, '2012-03-18 01:08:29'),
(70, 409, 36, 17, 2, 0, '2012-03-18 01:10:27'),
(76, 551, 36, 17, 2, 0, '2012-03-18 01:19:59'),
(80, 248, 10, 1, 4, 0, '2012-04-04 17:56:19'),
(81, 249, 10, 1, 4, 0, '2012-04-04 17:57:04'),
(82, 250, 10, 1, 20, 0, '2012-04-04 17:58:05'),
(83, 251, 10, 1, 20, 0, '2012-04-04 17:58:44'),
(85, 255, 10, 1, 20, 0, '2012-04-04 18:00:34'),
(88, 239, 10, 1, 4, 0, '2012-04-04 18:03:36'),
(89, 429, 10, 1, 2, 0, '2012-04-04 18:04:13'),
(90, 258, 10, 15, 2, 0, '2012-04-04 18:05:49'),
(91, 259, 10, 15, 2, 0, '2012-04-04 18:06:13'),
(92, 241, 10, 14, 2, 0, '2012-04-04 18:07:59'),
(93, 243, 10, 14, 2, 0, '2012-04-04 18:08:51'),
(94, 245, 10, 14, 2, 0, '2012-04-04 18:09:42'),
(95, 247, 10, 14, 2, 0, '2012-04-04 18:10:14'),
(126, 194, 8, 1, 17, 1, '2012-04-04 18:53:44'),
(127, 195, 8, 1, 17, 1, '2012-04-04 18:54:16'),
(130, 200, 8, 1, 20, 0, '2012-04-04 18:56:55'),
(177, 514, 16, 1, 25, 0, '2013-08-25 18:38:59'),
(178, 256, 3, 1, 20, 0, '0000-00-00 00:00:00'),
(179, 566, 10, 1, 20, 0, '0000-00-00 00:00:00'),
(180, 567, 10, 1, 2, 0, '0000-00-00 00:00:00'),
(183, 565, 10, 1, 2, 0, '0000-00-00 00:00:00'),
(184, 146, 6, 46, 20, 0, '0000-00-00 00:00:00'),
(185, 569, 6, 46, 20, 0, '0000-00-00 00:00:00'),
(187, 571, 6, 46, 20, 0, '0000-00-00 00:00:00'),
(188, 570, 6, 46, 20, 0, '0000-00-00 00:00:00'),
(189, 147, 6, 1, 20, 0, '0000-00-00 00:00:00'),
(190, 149, 6, 1, 20, 0, '0000-00-00 00:00:00'),
(191, 564, 6, 1, 20, 0, '0000-00-00 00:00:00'),
(192, 168, 7, 1, 2, 0, '0000-00-00 00:00:00'),
(193, 172, 7, 1, 20, 0, '0000-00-00 00:00:00'),
(194, 170, 7, 1, 2, 0, '0000-00-00 00:00:00'),
(195, 572, 7, 1, 2, 0, '0000-00-00 00:00:00'),
(196, 184, 7, 1, 2, 0, '0000-00-00 00:00:00'),
(197, 573, 7, 1, 20, 0, '0000-00-00 00:00:00'),
(198, 574, 7, 1, 20, 0, '0000-00-00 00:00:00'),
(199, 575, 7, 1, 20, 0, '0000-00-00 00:00:00'),
(200, 576, 7, 1, 20, 0, '0000-00-00 00:00:00'),
(201, 144, 6, 1, 20, 0, '0000-00-00 00:00:00'),
(202, 145, 6, 1, 20, 0, '0000-00-00 00:00:00'),
(203, 156, 6, 1, 20, 0, '0000-00-00 00:00:00'),
(204, 142, 6, 1, 2, 0, '0000-00-00 00:00:00'),
(205, 152, 6, 1, 2, 0, '0000-00-00 00:00:00'),
(206, 155, 6, 1, 2, 0, '0000-00-00 00:00:00'),
(207, 150, 6, 1, 4, 0, '0000-00-00 00:00:00'),
(209, 153, 6, 1, 20, 0, '0000-00-00 00:00:00'),
(210, 10, 8, 24, 2, 0, '0000-00-00 00:00:00'),
(211, 229, 8, 24, 2, 0, '0000-00-00 00:00:00'),
(212, 228, 8, 24, 2, 0, '0000-00-00 00:00:00'),
(213, 36, 8, 5, 20, 0, '0000-00-00 00:00:00'),
(214, 35, 8, 5, 20, 0, '0000-00-00 00:00:00'),
(215, 37, 8, 5, 20, 0, '0000-00-00 00:00:00'),
(216, 38, 8, 5, 20, 0, '0000-00-00 00:00:00'),
(217, 29, 8, 4, 20, 0, '0000-00-00 00:00:00'),
(218, 30, 8, 4, 20, 0, '0000-00-00 00:00:00'),
(219, 31, 8, 4, 20, 0, '0000-00-00 00:00:00'),
(220, 32, 8, 4, 20, 0, '0000-00-00 00:00:00'),
(221, 33, 8, 4, 20, 0, '0000-00-00 00:00:00'),
(223, 577, 8, 24, 20, 0, '0000-00-00 00:00:00'),
(224, 205, 8, 24, 2, 0, '0000-00-00 00:00:00'),
(225, 204, 8, 24, 2, 0, '0000-00-00 00:00:00'),
(226, 207, 8, 24, 20, 0, '0000-00-00 00:00:00'),
(227, 578, 8, 24, 20, 0, '0000-00-00 00:00:00'),
(228, 579, 8, 24, 20, 0, '0000-00-00 00:00:00'),
(229, 98, 5, 1, 3, 0, '0000-00-00 00:00:00'),
(231, 99, 5, 1, 20, 0, '0000-00-00 00:00:00'),
(232, 471, 5, 1, 20, 0, '0000-00-00 00:00:00'),
(233, 580, 5, 1, 12, 0, '0000-00-00 00:00:00'),
(234, 118, 5, 1, 20, 0, '0000-00-00 00:00:00'),
(235, 214, 5, 1, 20, 0, '0000-00-00 00:00:00'),
(236, 213, 5, 1, 2, 0, '0000-00-00 00:00:00'),
(237, 44, 5, 6, 4, 0, '0000-00-00 00:00:00'),
(238, 45, 5, 6, 4, 0, '0000-00-00 00:00:00'),
(239, 46, 5, 6, 4, 0, '0000-00-00 00:00:00'),
(240, 47, 5, 6, 4, 0, '0000-00-00 00:00:00'),
(241, 47, 5, 6, 4, 0, '0000-00-00 00:00:00'),
(242, 48, 5, 6, 4, 0, '0000-00-00 00:00:00'),
(243, 49, 5, 6, 4, 0, '0000-00-00 00:00:00'),
(244, 390, 4, 1, 10, 0, '0000-00-00 00:00:00'),
(246, 391, 4, 1, 10, 0, '0000-00-00 00:00:00'),
(247, 402, 36, 1, 20, 0, '0000-00-00 00:00:00'),
(248, 411, 36, 19, 20, 0, '0000-00-00 00:00:00'),
(249, 412, 36, 19, 20, 0, '0000-00-00 00:00:00'),
(250, 590, 6, 1, 20, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `TN_ALS_checksheet`
--

DROP TABLE IF EXISTS `TN_ALS_checksheet`;
CREATE TABLE IF NOT EXISTS `TN_ALS_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=471 ;

--
-- Dumping data for table `TN_ALS_checksheet`
--

INSERT INTO `TN_ALS_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 1, '543', 'miles', 3, 1),
(2, 1, 2, '234', 'miles', 3, 1),
(3, 1, 4, 'C-Shift', 'refill', 3, 1),
(4, 1, 6, '6', 'refill', 3, 1),
(5, 1, 7, '6', 'refill', 3, 1),
(6, 1, 175, '2', '2', 3, 1),
(7, 1, 176, '2', '2', 3, 1),
(8, 1, 177, '3', '3', 3, 1),
(9, 1, 178, '1', 'cb', 3, 1),
(10, 1, 179, '1', 'cb', 3, 1),
(11, 1, 180, '1', 'cb', 3, 1),
(12, 1, 8, '1', 'personnel', 3, 2),
(13, 1, 9, '186', 'personnel', 3, 2),
(14, 1, 495, '', 'open', 3, 2),
(15, 1, 104, '1', 'cb', 3, 20),
(16, 1, 105, '1', 'cb', 3, 20),
(17, 1, 106, '1', 'cb', 3, 20),
(18, 1, 107, '1', 'cb', 3, 20),
(19, 1, 108, '1', 'cb', 3, 20),
(20, 1, 109, '1', 'cb', 3, 20),
(21, 1, 130, '1', 'cb', 3, 21),
(22, 1, 131, '1', 'cb', 3, 21),
(23, 1, 132, '1', 'cb', 3, 21),
(24, 1, 133, '1', 'cb', 3, 21),
(25, 1, 134, '1', 'cb', 3, 21),
(26, 1, 135, '1', 'cb', 3, 21),
(27, 1, 136, '1', 'cb', 3, 21),
(28, 1, 137, '1', 'cb', 3, 21),
(29, 1, 138, '1', 'cb', 3, 21),
(30, 1, 139, '1', 'cb', 3, 21),
(31, 1, 140, '1', 'cb', 3, 21),
(32, 1, 141, '1', 'cb', 3, 21),
(33, 1, 283, '', 'tire', 3, 22),
(34, 1, 284, '', 'open', 3, 22),
(35, 1, 285, '', 'open', 3, 22),
(36, 1, 286, '', 'open', 3, 22),
(37, 1, 287, '', 'open', 3, 22),
(38, 1, 288, '', 'open', 3, 22),
(39, 1, 289, '', 'open', 3, 22),
(40, 1, 331, '1', 'cb', 3, 23),
(41, 1, 332, '1', 'cb', 3, 23),
(42, 1, 333, '1', 'cb', 3, 23),
(43, 1, 334, '1', 'cb', 3, 23),
(44, 1, 335, '1', 'cb', 3, 23),
(45, 1, 336, '1', 'cb', 3, 23),
(46, 1, 337, '1', 'cb', 3, 23),
(47, 1, 555, '1', 'cb', 3, 45),
(48, 1, 554, '1', 'cb', 3, 45),
(49, 1, 557, '1', 'cb', 3, 45),
(50, 1, 556, '1', 'cb', 3, 45),
(51, 1, 391, '10', '10', 4, 1),
(52, 1, 488, '2', '2', 4, 1),
(53, 1, 392, '2', '2', 4, 1),
(54, 1, 390, '5', '10', 4, 1),
(55, 1, 379, '1', 'cb', 4, 1),
(56, 1, 548, '1', 'cb', 36, 1),
(57, 1, 401, '2', '2', 36, 1),
(58, 1, 402, '3', '3', 36, 1),
(59, 1, 405, '1', 'cb', 36, 1),
(60, 1, 406, '1', 'cb', 36, 1),
(61, 1, 407, '1', 'cb', 36, 1),
(62, 1, 410, '1', 'cb', 36, 1),
(63, 1, 549, '1', 'cb', 36, 1),
(64, 1, 403, '1', 'cb', 36, 7),
(65, 1, 404, '1', 'cb', 36, 7),
(66, 1, 409, '2', '2', 36, 17),
(67, 1, 551, '2', '2', 36, 17),
(68, 1, 411, '2', '2', 36, 19),
(69, 1, 412, '2', '2', 36, 19),
(70, 1, 536, '1', 'cb', 36, 32),
(71, 1, 537, '1', 'cb', 36, 32),
(72, 1, 521, '1', 'cb', 36, 32),
(73, 1, 550, '1', 'cb', 36, 32),
(74, 1, 553, '1', 'cb', 36, 44),
(75, 1, 552, '1', 'cb', 36, 44),
(76, 1, 248, '4', '4', 10, 1),
(77, 1, 249, '4', '4', 10, 1),
(78, 1, 250, '1', 'cb', 10, 1),
(79, 1, 251, '1', 'cb', 10, 1),
(80, 1, 254, '2', '2', 10, 1),
(81, 1, 255, '1', 'cb', 10, 1),
(82, 1, 256, '1', 'cb', 10, 1),
(83, 1, 257, '2', '2', 10, 1),
(84, 1, 239, '4', '4', 10, 1),
(85, 1, 429, '2', '2', 10, 1),
(86, 1, 258, '2', '2', 10, 15),
(87, 1, 259, '2', '2', 10, 15),
(88, 1, 241, '2', '2', 10, 14),
(89, 1, 243, '2', '2', 10, 14),
(90, 1, 245, '2', '2', 10, 14),
(91, 1, 247, '2', '2', 10, 14),
(92, 1, 253, '1', 'cb', 10, 34),
(93, 1, 252, '2', '2', 10, 34),
(94, 1, 142, '6', '6', 6, 1),
(95, 1, 143, '2', '2', 6, 1),
(96, 1, 144, '1', 'cb', 6, 1),
(97, 1, 145, '1', 'cb', 6, 1),
(98, 1, 146, '1', 'cb', 6, 1),
(99, 1, 147, '1', 'cb', 6, 1),
(100, 1, 148, '1', 'cb', 6, 1),
(101, 1, 149, '1', 'cb', 6, 1),
(102, 1, 156, '1', 'cb', 6, 1),
(103, 1, 150, '8', '8', 6, 1),
(104, 1, 152, '1', '2', 6, 1),
(105, 1, 151, '4', '4', 6, 1),
(106, 1, 153, '1', 'cb', 6, 1),
(107, 1, 157, '1', 'cb', 6, 1),
(108, 1, 158, '1', 'cb', 6, 1),
(109, 1, 165, '1', 'cb', 6, 10),
(110, 1, 166, '1', 'cb', 6, 10),
(111, 1, 424, '1', 'cb', 6, 31),
(112, 1, 425, '2', '2', 6, 31),
(113, 1, 426, '1', 'cb', 6, 31),
(114, 1, 427, '1', 'cb', 6, 31),
(115, 1, 167, '1', 'cb', 6, 30),
(116, 1, 423, '2', '2', 6, 30),
(117, 1, 159, '1', 'cb', 6, 9),
(118, 1, 160, '1', 'cb', 6, 9),
(119, 1, 91, '1', 'cb', 6, 9),
(120, 1, 85, '4', '4', 6, 9),
(121, 1, 86, '4', '4', 6, 9),
(122, 1, 164, '3', '3', 6, 9),
(123, 1, 544, '1', 'cb', 6, 9),
(124, 1, 194, '2000', 'O2', 8, 1),
(125, 1, 195, '2000', 'O2', 8, 1),
(126, 1, 196, '', 'O2', 8, 1),
(127, 1, 198, '', 'O2', 8, 1),
(128, 1, 200, '1', 'cb', 8, 1),
(129, 1, 199, '2', '2', 8, 1),
(130, 1, 197, '', 'na', 8, 1),
(131, 1, 205, '10', '10', 8, 24),
(132, 1, 204, '10', '10', 8, 24),
(133, 1, 206, '4', '4', 8, 24),
(134, 1, 207, '5', '5', 8, 24),
(135, 1, 208, '5', '5', 8, 24),
(136, 1, 209, '4', '4', 8, 24),
(137, 1, 210, '4', '4', 8, 24),
(138, 1, 211, '4', '4', 8, 24),
(139, 1, 201, '1', 'cb', 8, 13),
(140, 1, 202, '1', 'cb', 8, 13),
(141, 1, 203, '1', 'cb', 8, 13),
(142, 1, 96, '6', '6', 5, 1),
(143, 1, 98, '10', '10', 5, 1),
(144, 1, 99, '10', '10', 5, 1),
(145, 1, 101, '10', '10', 5, 1),
(146, 1, 115, '2', '2', 5, 1),
(147, 1, 116, '2', '2', 5, 1),
(148, 1, 117, '2', '2', 5, 1),
(149, 1, 118, '1', 'cb', 5, 1),
(150, 1, 102, '1', 'cb', 5, 1),
(151, 1, 41, '10', '10', 5, 1),
(152, 1, 127, '10', '10', 5, 1),
(153, 1, 471, '10', '10', 5, 1),
(154, 1, 84, '10', '10', 5, 1),
(155, 1, 535, '5', '5', 5, 1),
(156, 1, 528, '10', '10', 5, 1),
(157, 1, 529, '10', '10', 5, 1),
(158, 1, 44, '10', '10', 5, 6),
(159, 1, 45, '10', '10', 5, 6),
(160, 1, 46, '10', '10', 5, 6),
(161, 1, 47, '10', '10', 5, 6),
(162, 1, 48, '10', '10', 5, 6),
(163, 1, 49, '10', '10', 5, 6),
(164, 1, 514, '', 'comment', 16, 1),
(165, 1, 256, '1', 'cb', 3, 1),
(166, 1, 566, '1', 'cb', 10, 1),
(167, 1, 567, '2', '2', 10, 1),
(168, 1, 565, '2', '2', 10, 1),
(169, 1, 10, '2', '2', 8, 24),
(170, 1, 229, '2', '2', 8, 24),
(171, 1, 228, '2', '2', 8, 24),
(172, 1, 577, '1', 'cb', 8, 24),
(173, 1, 578, '1', 'cb', 8, 24),
(174, 1, 579, '1', 'cb', 8, 24),
(175, 1, 36, '1', 'cb', 8, 5),
(176, 1, 35, '1', 'cb', 8, 5),
(177, 1, 37, '1', 'cb', 8, 5),
(178, 1, 38, '1', 'cb', 8, 5),
(179, 1, 29, '1', 'cb', 8, 4),
(180, 1, 30, '1', 'cb', 8, 4),
(181, 1, 31, '1', 'cb', 8, 4),
(182, 1, 32, '1', 'cb', 8, 4),
(183, 1, 33, '1', 'cb', 8, 4),
(184, 1, 146, '1', 'cb', 6, 46),
(185, 1, 569, '1', 'cb', 6, 46),
(186, 1, 571, '1', 'cb', 6, 46),
(187, 1, 570, '1', 'cb', 6, 46),
(188, 1, 564, '1', 'cb', 6, 1),
(189, 1, 155, '2', '2', 6, 1),
(190, 1, 168, '2', '2', 7, 1),
(191, 1, 172, '1', 'cb', 7, 1),
(192, 1, 170, '2', '2', 7, 1),
(193, 1, 572, '2', '2', 7, 1),
(194, 1, 184, '2', '2', 7, 1),
(195, 1, 573, '1', 'cb', 7, 1),
(196, 1, 574, '1', 'cb', 7, 1),
(197, 1, 575, '1', 'cb', 7, 1),
(198, 1, 576, '1', 'cb', 7, 1),
(199, 1, 580, '12', '12', 5, 1),
(200, 1, 214, '1', 'cb', 5, 1),
(201, 1, 213, '2', '2', 5, 1),
(202, 1, 590, '1', 'cb', 6, 1),
(203, 2, 1, '543', 'miles', 3, 1),
(204, 2, 2, '234', 'miles', 3, 1),
(205, 2, 4, 'C-Shift', 'refill', 3, 1),
(206, 2, 6, '6', 'refill', 3, 1),
(207, 2, 7, '6', 'refill', 3, 1),
(208, 2, 175, '2', '2', 3, 1),
(209, 2, 176, '2', '2', 3, 1),
(210, 2, 177, '3', '3', 3, 1),
(211, 2, 256, '1', 'cb', 3, 1),
(212, 2, 8, '1', 'personnel', 3, 2),
(213, 2, 9, '186', 'personnel', 3, 2),
(214, 2, 495, '', 'open', 3, 2),
(215, 2, 104, '1', 'cb', 3, 20),
(216, 2, 105, '1', 'cb', 3, 20),
(217, 2, 106, '1', 'cb', 3, 20),
(218, 2, 107, '1', 'cb', 3, 20),
(219, 2, 108, '1', 'cb', 3, 20),
(220, 2, 109, '1', 'cb', 3, 20),
(221, 2, 130, '1', 'cb', 3, 21),
(222, 2, 131, '1', 'cb', 3, 21),
(223, 2, 132, '1', 'cb', 3, 21),
(224, 2, 133, '1', 'cb', 3, 21),
(225, 2, 134, '1', 'cb', 3, 21),
(226, 2, 135, '1', 'cb', 3, 21),
(227, 2, 136, '1', 'cb', 3, 21),
(228, 2, 137, '1', 'cb', 3, 21),
(229, 2, 138, '1', 'cb', 3, 21),
(230, 2, 139, '1', 'cb', 3, 21),
(231, 2, 140, '1', 'cb', 3, 21),
(232, 2, 141, '1', 'cb', 3, 21),
(233, 2, 283, '', 'tire', 3, 22),
(234, 2, 284, '', 'open', 3, 22),
(235, 2, 285, '', 'open', 3, 22),
(236, 2, 286, '', 'open', 3, 22),
(237, 2, 287, '', 'open', 3, 22),
(238, 2, 288, '', 'open', 3, 22),
(239, 2, 289, '', 'open', 3, 22),
(240, 2, 331, '1', 'cb', 3, 23),
(241, 2, 332, '1', 'cb', 3, 23),
(242, 2, 333, '1', 'cb', 3, 23),
(243, 2, 334, '1', 'cb', 3, 23),
(244, 2, 335, '1', 'cb', 3, 23),
(245, 2, 336, '1', 'cb', 3, 23),
(246, 2, 337, '1', 'cb', 3, 23),
(247, 2, 379, '1', 'cb', 4, 1),
(248, 2, 390, '5', '10', 4, 1),
(249, 2, 391, '10', '10', 4, 1),
(250, 2, 548, '1', 'cb', 36, 1),
(251, 2, 401, '2', '2', 36, 1),
(252, 2, 410, '1', 'cb', 36, 1),
(253, 2, 549, '1', 'cb', 36, 1),
(254, 2, 402, '1', 'cb', 36, 1),
(255, 2, 403, '1', 'cb', 36, 7),
(256, 2, 404, '1', 'cb', 36, 7),
(257, 2, 409, '2', '2', 36, 17),
(258, 2, 551, '2', '2', 36, 17),
(259, 2, 411, '1', 'cb', 36, 19),
(260, 2, 412, '1', 'cb', 36, 19),
(261, 2, 248, '4', '4', 10, 1),
(262, 2, 249, '4', '4', 10, 1),
(263, 2, 250, '1', 'cb', 10, 1),
(264, 2, 251, '1', 'cb', 10, 1),
(265, 2, 255, '1', 'cb', 10, 1),
(266, 2, 239, '4', '4', 10, 1),
(267, 2, 429, '2', '2', 10, 1),
(268, 2, 566, '1', 'cb', 10, 1),
(269, 2, 567, '2', '2', 10, 1),
(270, 2, 565, '2', '2', 10, 1),
(271, 2, 258, '2', '2', 10, 15),
(272, 2, 259, '2', '2', 10, 15),
(273, 2, 241, '2', '2', 10, 14),
(274, 2, 243, '2', '2', 10, 14),
(275, 2, 245, '2', '2', 10, 14),
(276, 2, 247, '2', '2', 10, 14),
(277, 2, 194, '2000', 'O2', 8, 1),
(278, 2, 195, '2000', 'O2', 8, 1),
(279, 2, 200, '1', 'cb', 8, 1),
(280, 2, 10, '2', '2', 8, 24),
(281, 2, 229, '2', '2', 8, 24),
(282, 2, 228, '2', '2', 8, 24),
(283, 2, 577, '1', 'cb', 8, 24),
(284, 2, 205, '2', '2', 8, 24),
(285, 2, 204, '2', '2', 8, 24),
(286, 2, 207, '1', 'cb', 8, 24),
(287, 2, 578, '1', 'cb', 8, 24),
(288, 2, 579, '1', 'cb', 8, 24),
(289, 2, 36, '1', 'cb', 8, 5),
(290, 2, 35, '1', 'cb', 8, 5),
(291, 2, 37, '1', 'cb', 8, 5),
(292, 2, 38, '1', 'cb', 8, 5),
(293, 2, 29, '1', 'cb', 8, 4),
(294, 2, 30, '1', 'cb', 8, 4),
(295, 2, 31, '1', 'cb', 8, 4),
(296, 2, 32, '1', 'cb', 8, 4),
(297, 2, 33, '1', 'cb', 8, 4),
(298, 2, 514, '', 'comment', 16, 1),
(299, 2, 146, '1', 'cb', 6, 46),
(300, 2, 569, '1', 'cb', 6, 46),
(301, 2, 571, '1', 'cb', 6, 46),
(302, 2, 570, '1', 'cb', 6, 46),
(303, 2, 147, '1', 'cb', 6, 1),
(304, 2, 149, '1', 'cb', 6, 1),
(305, 2, 564, '1', 'cb', 6, 1),
(306, 2, 144, '1', 'cb', 6, 1),
(307, 2, 145, '1', 'cb', 6, 1),
(308, 2, 156, '1', 'cb', 6, 1),
(309, 2, 142, '2', '2', 6, 1),
(310, 2, 152, '1', '2', 6, 1),
(311, 2, 155, '2', '2', 6, 1),
(312, 2, 150, '4', '4', 6, 1),
(313, 2, 153, '1', 'cb', 6, 1),
(314, 2, 590, '1', 'cb', 6, 1),
(315, 2, 168, '2', '2', 7, 1),
(316, 2, 172, '1', 'cb', 7, 1),
(317, 2, 170, '2', '2', 7, 1),
(318, 2, 572, '2', '2', 7, 1),
(319, 2, 184, '2', '2', 7, 1),
(320, 2, 573, '1', 'cb', 7, 1),
(321, 2, 574, '1', 'cb', 7, 1),
(322, 2, 575, '1', 'cb', 7, 1),
(323, 2, 576, '1', 'cb', 7, 1),
(324, 2, 98, '3', '3', 5, 1),
(325, 2, 99, '1', 'cb', 5, 1),
(326, 2, 471, '1', 'cb', 5, 1),
(327, 2, 580, '12', '12', 5, 1),
(328, 2, 118, '1', 'cb', 5, 1),
(329, 2, 214, '1', 'cb', 5, 1),
(330, 2, 213, '2', '2', 5, 1),
(331, 2, 44, '4', '4', 5, 6),
(332, 2, 45, '4', '4', 5, 6),
(333, 2, 46, '4', '4', 5, 6),
(334, 2, 47, '4', '4', 5, 6),
(335, 2, 48, '4', '4', 5, 6),
(336, 2, 49, '4', '4', 5, 6),
(337, 3, 1, '67890', 'miles', 3, 1),
(338, 3, 2, '6789', 'miles', 3, 1),
(339, 3, 4, 'B-Shift', 'refill', 3, 1),
(340, 3, 6, '6', 'refill', 3, 1),
(341, 3, 7, '6', 'refill', 3, 1),
(342, 3, 175, '2', '2', 3, 1),
(343, 3, 176, '2', '2', 3, 1),
(344, 3, 177, '3', '3', 3, 1),
(345, 3, 256, '1', 'cb', 3, 1),
(346, 3, 8, '1', 'personnel', 3, 2),
(347, 3, 9, '186', 'personnel', 3, 2),
(348, 3, 495, '', 'open', 3, 2),
(349, 3, 104, '1', 'cb', 3, 20),
(350, 3, 105, '1', 'cb', 3, 20),
(351, 3, 106, '1', 'cb', 3, 20),
(352, 3, 107, '1', 'cb', 3, 20),
(353, 3, 108, '1', 'cb', 3, 20),
(354, 3, 109, '1', 'cb', 3, 20),
(355, 3, 130, '1', 'cb', 3, 21),
(356, 3, 131, '1', 'cb', 3, 21),
(357, 3, 132, '1', 'cb', 3, 21),
(358, 3, 133, '1', 'cb', 3, 21),
(359, 3, 134, '1', 'cb', 3, 21),
(360, 3, 135, '1', 'cb', 3, 21),
(361, 3, 136, '1', 'cb', 3, 21),
(362, 3, 137, '1', 'cb', 3, 21),
(363, 3, 138, '1', 'cb', 3, 21),
(364, 3, 139, '1', 'cb', 3, 21),
(365, 3, 140, '1', 'cb', 3, 21),
(366, 3, 141, '1', 'cb', 3, 21),
(367, 3, 283, '', 'tire', 3, 22),
(368, 3, 284, '', 'open', 3, 22),
(369, 3, 285, '', 'open', 3, 22),
(370, 3, 286, '', 'open', 3, 22),
(371, 3, 287, '', 'open', 3, 22),
(372, 3, 288, '', 'open', 3, 22),
(373, 3, 289, '', 'open', 3, 22),
(374, 3, 331, '1', 'cb', 3, 23),
(375, 3, 332, '1', 'cb', 3, 23),
(376, 3, 333, '1', 'cb', 3, 23),
(377, 3, 334, '1', 'cb', 3, 23),
(378, 3, 335, '1', 'cb', 3, 23),
(379, 3, 336, '1', 'cb', 3, 23),
(380, 3, 337, '1', 'cb', 3, 23),
(381, 3, 379, '1', 'cb', 4, 1),
(382, 3, 390, '10', '10', 4, 1),
(383, 3, 391, '10', '10', 4, 1),
(384, 3, 548, '1', 'cb', 36, 1),
(385, 3, 401, '2', '2', 36, 1),
(386, 3, 410, '1', 'cb', 36, 1),
(387, 3, 549, '1', 'cb', 36, 1),
(388, 3, 402, '1', 'cb', 36, 1),
(389, 3, 403, '1', 'cb', 36, 7),
(390, 3, 404, '1', 'cb', 36, 7),
(391, 3, 409, '2', '2', 36, 17),
(392, 3, 551, '2', '2', 36, 17),
(393, 3, 411, '1', 'cb', 36, 19),
(394, 3, 412, '1', 'cb', 36, 19),
(395, 3, 248, '4', '4', 10, 1),
(396, 3, 249, '4', '4', 10, 1),
(397, 3, 250, '1', 'cb', 10, 1),
(398, 3, 251, '1', 'cb', 10, 1),
(399, 3, 255, '1', 'cb', 10, 1),
(400, 3, 239, '4', '4', 10, 1),
(401, 3, 429, '2', '2', 10, 1),
(402, 3, 566, '1', 'cb', 10, 1),
(403, 3, 567, '2', '2', 10, 1),
(404, 3, 565, '2', '2', 10, 1),
(405, 3, 258, '2', '2', 10, 15),
(406, 3, 259, '2', '2', 10, 15),
(407, 3, 241, '2', '2', 10, 14),
(408, 3, 243, '2', '2', 10, 14),
(409, 3, 245, '2', '2', 10, 14),
(410, 3, 247, '2', '2', 10, 14),
(411, 3, 194, '2000', 'O2', 8, 1),
(412, 3, 195, '2000', 'O2', 8, 1),
(413, 3, 200, '1', 'cb', 8, 1),
(414, 3, 10, '2', '2', 8, 24),
(415, 3, 229, '2', '2', 8, 24),
(416, 3, 228, '2', '2', 8, 24),
(417, 3, 577, '1', 'cb', 8, 24),
(418, 3, 205, '2', '2', 8, 24),
(419, 3, 204, '2', '2', 8, 24),
(420, 3, 207, '1', 'cb', 8, 24),
(421, 3, 578, '1', 'cb', 8, 24),
(422, 3, 579, '1', 'cb', 8, 24),
(423, 3, 36, '1', 'cb', 8, 5),
(424, 3, 35, '1', 'cb', 8, 5),
(425, 3, 37, '1', 'cb', 8, 5),
(426, 3, 38, '1', 'cb', 8, 5),
(427, 3, 29, '1', 'cb', 8, 4),
(428, 3, 30, '1', 'cb', 8, 4),
(429, 3, 31, '1', 'cb', 8, 4),
(430, 3, 32, '1', 'cb', 8, 4),
(431, 3, 33, '1', 'cb', 8, 4),
(432, 3, 514, '', 'comment', 16, 1),
(433, 3, 146, '1', 'cb', 6, 46),
(434, 3, 569, '1', 'cb', 6, 46),
(435, 3, 571, '1', 'cb', 6, 46),
(436, 3, 570, '1', 'cb', 6, 46),
(437, 3, 147, '1', 'cb', 6, 1),
(438, 3, 149, '1', 'cb', 6, 1),
(439, 3, 564, '1', 'cb', 6, 1),
(440, 3, 144, '1', 'cb', 6, 1),
(441, 3, 145, '1', 'cb', 6, 1),
(442, 3, 156, '1', 'cb', 6, 1),
(443, 3, 142, '2', '2', 6, 1),
(444, 3, 152, '2', '2', 6, 1),
(445, 3, 155, '2', '2', 6, 1),
(446, 3, 150, '4', '4', 6, 1),
(447, 3, 153, '1', 'cb', 6, 1),
(448, 3, 590, '1', 'cb', 6, 1),
(449, 3, 168, '2', '2', 7, 1),
(450, 3, 172, '1', 'cb', 7, 1),
(451, 3, 170, '2', '2', 7, 1),
(452, 3, 572, '2', '2', 7, 1),
(453, 3, 184, '2', '2', 7, 1),
(454, 3, 573, '1', 'cb', 7, 1),
(455, 3, 574, '1', 'cb', 7, 1),
(456, 3, 575, '1', 'cb', 7, 1),
(457, 3, 576, '1', 'cb', 7, 1),
(458, 3, 98, '3', '3', 5, 1),
(459, 3, 99, '1', 'cb', 5, 1),
(460, 3, 471, '1', 'cb', 5, 1),
(461, 3, 580, '12', '12', 5, 1),
(462, 3, 118, '1', 'cb', 5, 1),
(463, 3, 214, '1', 'cb', 5, 1),
(464, 3, 213, '2', '2', 5, 1),
(465, 3, 44, '4', '4', 5, 6),
(466, 3, 45, '4', '4', 5, 6),
(467, 3, 46, '4', '4', 5, 6),
(468, 3, 47, '4', '4', 5, 6),
(469, 3, 48, '4', '4', 5, 6),
(470, 3, 49, '4', '4', 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `TN_ALS_comments`
--

DROP TABLE IF EXISTS `TN_ALS_comments`;
CREATE TABLE IF NOT EXISTS `TN_ALS_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `TN_ALS_ETT`
--

DROP TABLE IF EXISTS `TN_ALS_ETT`;
CREATE TABLE IF NOT EXISTS `TN_ALS_ETT` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `TN_ALS_ETT`
--

INSERT INTO `TN_ALS_ETT` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 39, 38, 1, 20, 0, '2012-03-12 16:47:21'),
(2, 484, 38, 1, 6, 0, '2012-03-12 16:47:21'),
(8, 13, 38, 25, 20, 0, '2012-03-12 16:47:21'),
(9, 14, 38, 25, 20, 0, '2012-03-12 16:47:21'),
(10, 16, 38, 25, 20, 0, '2012-03-12 16:47:21'),
(11, 15, 38, 25, 20, 0, '2012-03-12 16:47:21'),
(12, 17, 38, 25, 20, 0, '2012-03-12 16:47:21'),
(13, 18, 38, 3, 2, 0, '2012-03-12 16:47:21'),
(14, 19, 38, 3, 2, 0, '2012-03-12 16:47:21'),
(15, 20, 38, 3, 2, 0, '2012-03-12 16:47:21'),
(16, 21, 38, 3, 2, 0, '2012-03-12 16:47:21'),
(17, 23, 38, 3, 2, 0, '2012-03-12 16:47:21'),
(18, 24, 38, 3, 2, 0, '2012-03-12 16:47:21'),
(20, 558, 38, 1, 2, 0, '2012-07-25 19:14:48'),
(21, 22, 38, 3, 2, 0, '2012-07-25 19:14:48'),
(22, 507, 38, 3, 20, 0, '0000-00-00 00:00:00'),
(23, 218, 38, 25, 20, 0, '0000-00-00 00:00:00'),
(24, 221, 38, 25, 20, 0, '0000-00-00 00:00:00'),
(25, 222, 38, 25, 20, 0, '0000-00-00 00:00:00'),
(26, 223, 38, 25, 20, 0, '0000-00-00 00:00:00'),
(27, 220, 38, 25, 20, 0, '0000-00-00 00:00:00'),
(28, 525, 38, 25, 20, 0, '0000-00-00 00:00:00'),
(30, 597, 38, 3, 2, 0, '0000-00-00 00:00:00'),
(31, 598, 38, 3, 2, 0, '0000-00-00 00:00:00'),
(32, 599, 38, 3, 2, 0, '0000-00-00 00:00:00'),
(33, 600, 38, 3, 2, 0, '0000-00-00 00:00:00'),
(34, 601, 38, 3, 2, 0, '0000-00-00 00:00:00'),
(35, 226, 38, 1, 20, 0, '0000-00-00 00:00:00'),
(36, 25, 38, 3, 20, 0, '0000-00-00 00:00:00'),
(37, 225, 38, 1, 20, 0, '0000-00-00 00:00:00'),
(38, 603, 38, 1, 2, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `TN_ALS_ETT_checksheet`
--

DROP TABLE IF EXISTS `TN_ALS_ETT_checksheet`;
CREATE TABLE IF NOT EXISTS `TN_ALS_ETT_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `TN_ALS_ETT_checksheet`
--

INSERT INTO `TN_ALS_ETT_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 39, '1', 'cb', 38, 1),
(2, 1, 484, '6', '6', 38, 1),
(3, 1, 43, '1', 'cb', 38, 1),
(4, 1, 12, '1', 'cb', 38, 1),
(5, 1, 42, '1', 'cb', 38, 1),
(6, 1, 558, '2', '2', 38, 1),
(7, 1, 13, '1', 'cb', 38, 25),
(8, 1, 14, '1', 'cb', 38, 25),
(9, 1, 16, '1', 'cb', 38, 25),
(10, 1, 15, '1', 'cb', 38, 25),
(11, 1, 17, '1', 'cb', 38, 25),
(12, 1, 18, '2', '2', 38, 3),
(13, 1, 19, '2', '2', 38, 3),
(14, 1, 20, '2', '2', 38, 3),
(15, 1, 21, '1', '2', 38, 3),
(16, 1, 23, '2', '2', 38, 3),
(17, 1, 24, '2', '2', 38, 3),
(18, 1, 25, '2', '2', 38, 3),
(19, 1, 22, '2', '2', 38, 3),
(20, 1, 218, NULL, 'cb', 38, 25),
(21, 1, 221, '1', 'cb', 38, 25),
(22, 1, 222, '1', 'cb', 38, 25),
(23, 1, 223, '1', 'cb', 38, 25),
(24, 1, 220, '1', 'cb', 38, 25),
(25, 1, 525, '1', 'cb', 38, 25),
(26, 1, 507, '1', 'cb', 38, 3),
(27, 1, 595, '1', 'cb', 38, 3),
(28, 1, 597, '2', '2', 38, 3),
(29, 1, 598, '2', '2', 38, 3),
(30, 1, 599, '2', '2', 38, 3),
(31, 1, 600, '2', '2', 38, 3),
(32, 1, 601, '2', '2', 38, 3),
(33, 1, 226, '1', 'cb', 38, 1),
(34, 1, 225, NULL, 'cb', 38, 1),
(35, 1, 603, '2', '2', 38, 1),
(36, 2, 39, '1', 'cb', 38, 1),
(37, 2, 484, '6', '6', 38, 1),
(38, 2, 558, '2', '2', 38, 1),
(39, 2, 226, '1', 'cb', 38, 1),
(40, 2, 225, NULL, 'cb', 38, 1),
(41, 2, 603, '2', '2', 38, 1),
(42, 2, 13, '1', 'cb', 38, 25),
(43, 2, 14, '1', 'cb', 38, 25),
(44, 2, 16, '1', 'cb', 38, 25),
(45, 2, 15, '1', 'cb', 38, 25),
(46, 2, 17, '1', 'cb', 38, 25),
(47, 2, 218, NULL, 'cb', 38, 25),
(48, 2, 221, '1', 'cb', 38, 25),
(49, 2, 222, '1', 'cb', 38, 25),
(50, 2, 223, '1', 'cb', 38, 25),
(51, 2, 220, '1', 'cb', 38, 25),
(52, 2, 525, '1', 'cb', 38, 25),
(53, 2, 18, '2', '2', 38, 3),
(54, 2, 19, '2', '2', 38, 3),
(55, 2, 20, '2', '2', 38, 3),
(56, 2, 21, '1', '2', 38, 3),
(57, 2, 23, '2', '2', 38, 3),
(58, 2, 24, '2', '2', 38, 3),
(59, 2, 22, '2', '2', 38, 3),
(60, 2, 507, '1', 'cb', 38, 3),
(61, 2, 597, '2', '2', 38, 3),
(62, 2, 598, '2', '2', 38, 3),
(63, 2, 599, '2', '2', 38, 3),
(64, 2, 600, '2', '2', 38, 3),
(65, 2, 601, '2', '2', 38, 3),
(66, 2, 25, '1', 'cb', 38, 3),
(67, 3, 39, '1', 'cb', 38, 1),
(68, 3, 484, '6', '6', 38, 1),
(69, 3, 558, '2', '2', 38, 1),
(70, 3, 226, '1', 'cb', 38, 1),
(71, 3, 225, '1', 'cb', 38, 1),
(72, 3, 603, '2', '2', 38, 1),
(73, 3, 13, '1', 'cb', 38, 25),
(74, 3, 14, '1', 'cb', 38, 25),
(75, 3, 16, '1', 'cb', 38, 25),
(76, 3, 15, '1', 'cb', 38, 25),
(77, 3, 17, '1', 'cb', 38, 25),
(78, 3, 218, '1', 'cb', 38, 25),
(79, 3, 221, '1', 'cb', 38, 25),
(80, 3, 222, '1', 'cb', 38, 25),
(81, 3, 223, '1', 'cb', 38, 25),
(82, 3, 220, '1', 'cb', 38, 25),
(83, 3, 525, '1', 'cb', 38, 25),
(84, 3, 18, '2', '2', 38, 3),
(85, 3, 19, '2', '2', 38, 3),
(86, 3, 20, '2', '2', 38, 3),
(87, 3, 21, '2', '2', 38, 3),
(88, 3, 23, '2', '2', 38, 3),
(89, 3, 24, '2', '2', 38, 3),
(90, 3, 22, '2', '2', 38, 3),
(91, 3, 507, '1', 'cb', 38, 3),
(92, 3, 597, '2', '2', 38, 3),
(93, 3, 598, '2', '2', 38, 3),
(94, 3, 599, '2', '2', 38, 3),
(95, 3, 600, '2', '2', 38, 3),
(96, 3, 601, '2', '2', 38, 3),
(97, 3, 25, '1', 'cb', 38, 3);

-- --------------------------------------------------------

--
-- Table structure for table `TN_ALS_ETT_comments`
--

DROP TABLE IF EXISTS `TN_ALS_ETT_comments`;
CREATE TABLE IF NOT EXISTS `TN_ALS_ETT_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `TN_ALS_ETT_events`
--

DROP TABLE IF EXISTS `TN_ALS_ETT_events`;
CREATE TABLE IF NOT EXISTS `TN_ALS_ETT_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `TN_ALS_ETT_events`
--

INSERT INTO `TN_ALS_ETT_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2016-01-02 21:01:08', 1, 0, 0),
(2, '2016-01-02 21:38:22', 1, 2, 2),
(3, '2016-01-02 21:41:58', NULL, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `TN_ALS_events`
--

DROP TABLE IF EXISTS `TN_ALS_events`;
CREATE TABLE IF NOT EXISTS `TN_ALS_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `TN_ALS_events`
--

INSERT INTO `TN_ALS_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2016-01-02 21:01:08', 1, 0, 0),
(2, '2016-01-02 21:38:21', 1, 0, 0),
(3, '2016-01-02 21:41:58', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `TN_ALS_MCI`
--

DROP TABLE IF EXISTS `TN_ALS_MCI`;
CREATE TABLE IF NOT EXISTS `TN_ALS_MCI` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `TN_ALS_MCI_checksheet`
--

DROP TABLE IF EXISTS `TN_ALS_MCI_checksheet`;
CREATE TABLE IF NOT EXISTS `TN_ALS_MCI_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `TN_ALS_MCI_events`
--

DROP TABLE IF EXISTS `TN_ALS_MCI_events`;
CREATE TABLE IF NOT EXISTS `TN_ALS_MCI_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `TN_ALS_Meds`
--

DROP TABLE IF EXISTS `TN_ALS_Meds`;
CREATE TABLE IF NOT EXISTS `TN_ALS_Meds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `TN_ALS_Meds`
--

INSERT INTO `TN_ALS_Meds` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`) VALUES
(1, 582, 28, 1, 4, 0),
(2, 59, 28, 1, 20, 0),
(3, 583, 28, 1, 20, 0),
(4, 584, 28, 1, 20, 0),
(5, 585, 28, 1, 20, 0),
(6, 92, 28, 1, 2, 0),
(7, 81, 28, 1, 20, 0),
(8, 82, 28, 1, 20, 0),
(9, 41, 28, 1, 20, 0),
(10, 103, 28, 1, 20, 0),
(11, 212, 28, 1, 20, 0),
(12, 60, 28, 1, 4, 0),
(13, 53, 28, 1, 4, 0),
(14, 55, 28, 1, 4, 0),
(15, 62, 28, 1, 3, 0),
(16, 67, 28, 1, 2, 0),
(17, 127, 28, 1, 20, 0),
(18, 586, 28, 1, 20, 0),
(19, 587, 28, 1, 20, 0),
(20, 588, 28, 1, 20, 0),
(21, 93, 28, 1, 20, 0),
(22, 589, 28, 1, 20, 0),
(23, 63, 28, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `TN_ALS_Meds_checksheet`
--

DROP TABLE IF EXISTS `TN_ALS_Meds_checksheet`;
CREATE TABLE IF NOT EXISTS `TN_ALS_Meds_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `TN_ALS_Meds_checksheet`
--

INSERT INTO `TN_ALS_Meds_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 582, '4', '4', 28, 1),
(2, 1, 59, '1', 'cb', 28, 1),
(3, 1, 583, '1', 'cb', 28, 1),
(4, 1, 584, '1', 'cb', 28, 1),
(5, 1, 585, '1', 'cb', 28, 1),
(6, 1, 92, '2', '2', 28, 1),
(7, 1, 81, '1', 'cb', 28, 1),
(8, 1, 82, '1', 'cb', 28, 1),
(9, 1, 41, '1', 'cb', 28, 1),
(10, 1, 103, '1', 'cb', 28, 1),
(11, 1, 212, '1', 'cb', 28, 1),
(12, 1, 60, '4', '4', 28, 1),
(13, 1, 53, '4', '4', 28, 1),
(14, 1, 55, '4', '4', 28, 1),
(15, 1, 62, '3', '3', 28, 1),
(16, 1, 67, '2', '2', 28, 1),
(17, 1, 127, '1', 'cb', 28, 1),
(18, 1, 586, '1', 'cb', 28, 1),
(19, 1, 587, '1', 'cb', 28, 1),
(20, 1, 588, '1', 'cb', 28, 1),
(21, 1, 93, '1', 'cb', 28, 1),
(22, 1, 589, '1', 'cb', 28, 1),
(23, 1, 63, '1', '1', 28, 1),
(24, 3, 582, '4', '4', 28, 1),
(25, 3, 59, '1', 'cb', 28, 1),
(26, 3, 583, '1', 'cb', 28, 1),
(27, 3, 584, '1', 'cb', 28, 1),
(28, 3, 585, '1', 'cb', 28, 1),
(29, 3, 92, '2', '2', 28, 1),
(30, 3, 81, '1', 'cb', 28, 1),
(31, 3, 82, '1', 'cb', 28, 1),
(32, 3, 41, '1', 'cb', 28, 1),
(33, 3, 103, '1', 'cb', 28, 1),
(34, 3, 212, '1', 'cb', 28, 1),
(35, 3, 60, '4', '4', 28, 1),
(36, 3, 53, '4', '4', 28, 1),
(37, 3, 55, '4', '4', 28, 1),
(38, 3, 62, '3', '3', 28, 1),
(39, 3, 67, '2', '2', 28, 1),
(40, 3, 127, '1', 'cb', 28, 1),
(41, 3, 586, '1', 'cb', 28, 1),
(42, 3, 587, '1', 'cb', 28, 1),
(43, 3, 588, '1', 'cb', 28, 1),
(44, 3, 93, '1', 'cb', 28, 1),
(45, 3, 589, '1', 'cb', 28, 1),
(46, 3, 63, '1', '1', 28, 1);

-- --------------------------------------------------------

--
-- Table structure for table `TN_ALS_Meds_events`
--

DROP TABLE IF EXISTS `TN_ALS_Meds_events`;
CREATE TABLE IF NOT EXISTS `TN_ALS_Meds_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `TN_ALS_Meds_events`
--

INSERT INTO `TN_ALS_Meds_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2016-01-02 21:01:08', 1, 2, 1),
(2, '2016-01-02 21:38:21', 1, 2, 2),
(3, '2016-01-02 21:41:58', NULL, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `TN_ALS_OB_Supplies`
--

DROP TABLE IF EXISTS `TN_ALS_OB_Supplies`;
CREATE TABLE IF NOT EXISTS `TN_ALS_OB_Supplies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `TN_ALS_OB_Supplies`
--

INSERT INTO `TN_ALS_OB_Supplies` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`) VALUES
(1, 477, 35, 1, 20, 0),
(2, 474, 35, 1, 20, 0),
(3, 428, 35, 1, 20, 0),
(4, 481, 35, 1, 20, 0),
(5, 591, 35, 1, 20, 0),
(6, 478, 35, 1, 20, 0),
(7, 475, 35, 1, 20, 0),
(8, 155, 35, 1, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `TN_ALS_OB_Supplies_checksheet`
--

DROP TABLE IF EXISTS `TN_ALS_OB_Supplies_checksheet`;
CREATE TABLE IF NOT EXISTS `TN_ALS_OB_Supplies_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `TN_ALS_OB_Supplies_checksheet`
--

INSERT INTO `TN_ALS_OB_Supplies_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 477, '1', 'cb', 35, 1),
(2, 1, 474, '1', 'cb', 35, 1),
(3, 1, 428, '1', 'cb', 35, 1),
(4, 1, 481, '1', 'cb', 35, 1),
(5, 1, 591, NULL, 'cb', 35, 1),
(6, 1, 478, '1', 'cb', 35, 1),
(7, 1, 475, '1', 'cb', 35, 1),
(8, 1, 155, '1', 'cb', 35, 1),
(9, 2, 477, '1', 'cb', 35, 1),
(10, 2, 474, '1', 'cb', 35, 1),
(11, 2, 428, '1', 'cb', 35, 1),
(12, 2, 481, '1', 'cb', 35, 1),
(13, 2, 591, NULL, 'cb', 35, 1),
(14, 2, 478, '1', 'cb', 35, 1),
(15, 2, 475, '1', 'cb', 35, 1),
(16, 2, 155, '1', 'cb', 35, 1),
(17, 3, 477, '1', 'cb', 35, 1),
(18, 3, 474, '1', 'cb', 35, 1),
(19, 3, 428, '1', 'cb', 35, 1),
(20, 3, 481, '1', 'cb', 35, 1),
(21, 3, 591, '1', 'cb', 35, 1),
(22, 3, 478, '1', 'cb', 35, 1),
(23, 3, 475, '1', 'cb', 35, 1),
(24, 3, 155, '1', 'cb', 35, 1);

-- --------------------------------------------------------

--
-- Table structure for table `TN_ALS_OB_Supplies_events`
--

DROP TABLE IF EXISTS `TN_ALS_OB_Supplies_events`;
CREATE TABLE IF NOT EXISTS `TN_ALS_OB_Supplies_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `TN_ALS_OB_Supplies_events`
--

INSERT INTO `TN_ALS_OB_Supplies_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2016-01-02 21:01:08', 1, 2, 1),
(2, '2016-01-02 21:38:21', 1, 2, 2),
(3, '2016-01-02 21:41:58', NULL, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `TN_ALS_Suction`
--

DROP TABLE IF EXISTS `TN_ALS_Suction`;
CREATE TABLE IF NOT EXISTS `TN_ALS_Suction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `TN_ALS_Suction`
--

INSERT INTO `TN_ALS_Suction` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`) VALUES
(2, 432, 13, 1, 20, 0),
(3, 431, 13, 1, 20, 0),
(4, 430, 13, 1, 20, 0),
(5, 433, 13, 1, 20, 0),
(6, 275, 13, 1, 2, 0),
(7, 276, 13, 1, 2, 0),
(8, 434, 13, 1, 2, 0),
(9, 435, 13, 1, 2, 0),
(10, 277, 13, 1, 2, 0),
(11, 278, 13, 1, 2, 0),
(12, 279, 13, 1, 2, 0),
(13, 280, 13, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `TN_ALS_Suction_checksheet`
--

DROP TABLE IF EXISTS `TN_ALS_Suction_checksheet`;
CREATE TABLE IF NOT EXISTS `TN_ALS_Suction_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `TN_ALS_Suction_checksheet`
--

INSERT INTO `TN_ALS_Suction_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 432, '1', 'cb', 13, 1),
(2, 1, 431, '1', 'cb', 13, 1),
(3, 1, 430, '1', 'cb', 13, 1),
(4, 1, 433, '1', 'cb', 13, 1),
(5, 1, 275, '2', '2', 13, 1),
(6, 1, 276, '2', '2', 13, 1),
(7, 1, 434, '2', '2', 13, 1),
(8, 1, 435, '2', '2', 13, 1),
(9, 1, 277, '2', '2', 13, 1),
(10, 1, 278, '2', '2', 13, 1),
(11, 1, 279, '2', '2', 13, 1),
(12, 1, 280, '2', '2', 13, 1),
(13, 2, 432, '1', 'cb', 13, 1),
(14, 2, 431, '1', 'cb', 13, 1),
(15, 2, 430, '1', 'cb', 13, 1),
(16, 2, 433, '1', 'cb', 13, 1),
(17, 2, 275, '2', '2', 13, 1),
(18, 2, 276, '2', '2', 13, 1),
(19, 2, 434, '2', '2', 13, 1),
(20, 2, 435, '2', '2', 13, 1),
(21, 2, 277, '2', '2', 13, 1),
(22, 2, 278, '2', '2', 13, 1),
(23, 2, 279, '2', '2', 13, 1),
(24, 2, 280, '2', '2', 13, 1),
(25, 3, 432, '1', 'cb', 13, 1),
(26, 3, 431, '1', 'cb', 13, 1),
(27, 3, 430, '1', 'cb', 13, 1),
(28, 3, 433, '1', 'cb', 13, 1),
(29, 3, 275, '2', '2', 13, 1),
(30, 3, 276, '2', '2', 13, 1),
(31, 3, 434, '2', '2', 13, 1),
(32, 3, 435, '2', '2', 13, 1),
(33, 3, 277, '2', '2', 13, 1),
(34, 3, 278, '2', '2', 13, 1),
(35, 3, 279, '2', '2', 13, 1),
(36, 3, 280, '2', '2', 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `TN_ALS_Suction_events`
--

DROP TABLE IF EXISTS `TN_ALS_Suction_events`;
CREATE TABLE IF NOT EXISTS `TN_ALS_Suction_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `TN_ALS_Suction_events`
--

INSERT INTO `TN_ALS_Suction_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2016-01-02 21:01:08', 1, 2, 1),
(2, '2016-01-02 21:38:22', 1, 2, 2),
(3, '2016-01-02 21:41:58', NULL, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `TN_ALS_Trauma`
--

DROP TABLE IF EXISTS `TN_ALS_Trauma`;
CREATE TABLE IF NOT EXISTS `TN_ALS_Trauma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `TN_ALS_Trauma`
--

INSERT INTO `TN_ALS_Trauma` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`) VALUES
(1, 42, 14, 1, 20, 0),
(2, 306, 14, 1, 20, 0),
(3, 298, 14, 1, 6, 0),
(4, 301, 14, 1, 6, 0),
(5, 290, 14, 1, 20, 0),
(6, 300, 14, 1, 8, 0),
(7, 297, 14, 1, 2, 0),
(8, 294, 14, 1, 2, 0),
(9, 562, 14, 1, 4, 0),
(10, 304, 14, 1, 2, 0),
(11, 593, 14, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `TN_ALS_Trauma_checksheet`
--

DROP TABLE IF EXISTS `TN_ALS_Trauma_checksheet`;
CREATE TABLE IF NOT EXISTS `TN_ALS_Trauma_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `TN_ALS_Trauma_checksheet`
--

INSERT INTO `TN_ALS_Trauma_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 42, '1', 'cb', 14, 1),
(2, 1, 306, '1', 'cb', 14, 1),
(3, 1, 298, '6', '6', 14, 1),
(4, 1, 301, '6', '6', 14, 1),
(5, 1, 290, '1', 'cb', 14, 1),
(6, 1, 300, '8', '8', 14, 1),
(7, 1, 297, '2', '2', 14, 1),
(8, 1, 294, '2', '2', 14, 1),
(9, 1, 562, '4', '4', 14, 1),
(10, 1, 304, '2', '2', 14, 1),
(11, 1, 593, '2', '2', 14, 1),
(12, 2, 42, '1', 'cb', 14, 1),
(13, 2, 306, '1', 'cb', 14, 1),
(14, 2, 298, '6', '6', 14, 1),
(15, 2, 301, '6', '6', 14, 1),
(16, 2, 290, '1', 'cb', 14, 1),
(17, 2, 300, '8', '8', 14, 1),
(18, 2, 297, '2', '2', 14, 1),
(19, 2, 294, '2', '2', 14, 1),
(20, 2, 562, '4', '4', 14, 1),
(21, 2, 304, '2', '2', 14, 1),
(22, 2, 593, '2', '2', 14, 1),
(23, 3, 42, '1', 'cb', 14, 1),
(24, 3, 306, '1', 'cb', 14, 1),
(25, 3, 298, '6', '6', 14, 1),
(26, 3, 301, '6', '6', 14, 1),
(27, 3, 290, '1', 'cb', 14, 1),
(28, 3, 300, '8', '8', 14, 1),
(29, 3, 297, '2', '2', 14, 1),
(30, 3, 294, '2', '2', 14, 1),
(31, 3, 562, '4', '4', 14, 1),
(32, 3, 304, '2', '2', 14, 1),
(33, 3, 593, '2', '2', 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `TN_ALS_Trauma_events`
--

DROP TABLE IF EXISTS `TN_ALS_Trauma_events`;
CREATE TABLE IF NOT EXISTS `TN_ALS_Trauma_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `TN_ALS_Trauma_events`
--

INSERT INTO `TN_ALS_Trauma_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2016-01-02 21:01:08', 1, 2, 1),
(2, '2016-01-02 21:38:22', 1, 2, 2),
(3, '2016-01-02 21:41:58', NULL, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Truck1`
--

DROP TABLE IF EXISTS `Truck1`;
CREATE TABLE IF NOT EXISTS `Truck1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=178 ;

--
-- Dumping data for table `Truck1`
--

INSERT INTO `Truck1` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 1, 3, 1, 21, 1, '2013-08-23 21:33:10'),
(2, 2, 3, 1, 21, 1, '2013-08-23 21:33:10'),
(4, 3, 3, 1, 23, 1, '2012-03-12 16:47:27'),
(5, 4, 3, 1, 24, 1, '2012-03-12 16:47:27'),
(6, 6, 3, 1, 24, 1, '2012-03-12 16:47:27'),
(7, 7, 3, 1, 24, 1, '2012-03-12 16:47:27'),
(8, 175, 3, 1, 2, 0, '2012-03-12 16:47:27'),
(9, 176, 3, 1, 2, 0, '2012-03-12 16:47:27'),
(10, 177, 3, 1, 3, 0, '2012-03-12 16:47:27'),
(11, 178, 3, 1, 20, 0, '2012-03-12 16:47:27'),
(12, 179, 3, 1, 20, 0, '2012-03-12 16:47:27'),
(13, 180, 3, 1, 20, 0, '2012-03-12 16:47:27'),
(14, 8, 3, 2, 22, 1, '2012-03-12 16:47:27'),
(15, 9, 3, 2, 22, 1, '2012-03-12 16:47:27'),
(16, 495, 3, 2, 16, 0, '2012-03-12 16:47:27'),
(17, 104, 3, 20, 20, 0, '2012-03-12 16:47:27'),
(18, 105, 3, 20, 20, 0, '2012-03-12 16:47:27'),
(19, 106, 3, 20, 20, 0, '2012-03-12 16:47:27'),
(20, 107, 3, 20, 20, 0, '2012-03-12 16:47:27'),
(21, 108, 3, 20, 20, 0, '2012-03-12 16:47:27'),
(22, 109, 3, 20, 20, 0, '2012-03-12 16:47:27'),
(23, 130, 3, 21, 20, 0, '2012-03-12 16:47:27'),
(24, 131, 3, 21, 20, 0, '2012-03-12 16:47:27'),
(25, 132, 3, 21, 20, 0, '2012-03-12 16:47:27'),
(26, 133, 3, 21, 20, 0, '2012-03-12 16:47:27'),
(27, 134, 3, 21, 20, 0, '2012-03-12 16:47:27'),
(28, 135, 3, 21, 20, 0, '2012-03-12 16:47:27'),
(29, 136, 3, 21, 20, 0, '2012-03-12 16:47:27'),
(30, 137, 3, 21, 20, 0, '2012-03-12 16:47:27'),
(31, 138, 3, 21, 20, 0, '2012-03-12 16:47:27'),
(32, 139, 3, 21, 20, 0, '2012-03-12 16:47:27'),
(33, 140, 3, 21, 20, 0, '2012-03-12 16:47:27'),
(34, 141, 3, 21, 20, 0, '2012-03-12 16:47:27'),
(35, 283, 3, 22, 19, 0, '2012-03-12 16:47:27'),
(36, 284, 3, 22, 16, 0, '2012-03-12 16:47:27'),
(37, 285, 3, 22, 16, 0, '2012-03-12 16:47:27'),
(38, 286, 3, 22, 16, 0, '2012-03-12 16:47:27'),
(39, 287, 3, 22, 16, 0, '2012-03-12 16:47:27'),
(40, 288, 3, 22, 16, 0, '2012-03-12 16:47:27'),
(41, 289, 3, 22, 16, 0, '2012-03-12 16:47:27'),
(42, 331, 3, 23, 20, 0, '2012-03-12 16:47:27'),
(43, 332, 3, 23, 20, 0, '2012-03-12 16:47:27'),
(44, 333, 3, 23, 20, 0, '2012-03-12 16:47:27'),
(45, 334, 3, 23, 20, 0, '2012-03-12 16:47:27'),
(46, 335, 3, 23, 20, 0, '2012-03-12 16:47:27'),
(47, 336, 3, 23, 20, 0, '2012-03-12 16:47:27'),
(48, 337, 3, 23, 20, 0, '2012-03-12 16:47:27'),
(50, 391, 4, 1, 10, 0, '2012-03-18 00:42:48'),
(51, 488, 4, 1, 2, 0, '2012-03-18 00:43:30'),
(54, 390, 4, 1, 10, 0, '2012-03-18 00:45:59'),
(53, 392, 4, 1, 2, 0, '2012-03-18 00:45:08'),
(55, 379, 4, 1, 20, 0, '2012-03-18 00:46:52'),
(56, 548, 36, 1, 20, 0, '2012-03-18 00:58:09'),
(57, 401, 36, 1, 2, 0, '2012-03-18 00:58:59'),
(58, 402, 36, 1, 3, 0, '2012-03-18 00:59:43'),
(68, 403, 36, 7, 20, 0, '2012-03-18 01:07:49'),
(65, 549, 36, 1, 20, 0, '2012-03-18 01:04:52'),
(61, 405, 36, 1, 20, 0, '2012-03-18 01:01:33'),
(62, 406, 36, 1, 20, 0, '2012-03-18 01:02:06'),
(63, 407, 36, 1, 20, 0, '2012-03-18 01:02:39'),
(64, 410, 36, 1, 20, 0, '2012-03-18 01:04:18'),
(70, 409, 36, 17, 2, 0, '2012-03-18 01:10:27'),
(69, 404, 36, 7, 20, 0, '2012-03-18 01:08:29'),
(71, 411, 36, 19, 2, 0, '2012-03-18 01:11:56'),
(72, 412, 36, 19, 2, 0, '2012-03-18 01:13:07'),
(73, 536, 36, 32, 20, 0, '2012-03-18 01:14:57'),
(74, 537, 36, 32, 20, 0, '2012-03-18 01:15:38'),
(75, 521, 36, 32, 20, 0, '2012-03-18 01:16:50'),
(76, 551, 36, 17, 2, 0, '2012-03-18 01:19:59'),
(77, 550, 36, 32, 20, 0, '2012-03-18 01:19:59'),
(78, 553, 36, 44, 20, 0, '2012-03-18 01:27:20'),
(79, 552, 36, 44, 20, 0, '2012-03-18 01:28:26'),
(80, 248, 10, 1, 4, 0, '2012-04-04 17:56:19'),
(81, 249, 10, 1, 4, 0, '2012-04-04 17:57:04'),
(82, 250, 10, 1, 20, 0, '2012-04-04 17:58:05'),
(83, 251, 10, 1, 20, 0, '2012-04-04 17:58:44'),
(84, 254, 10, 1, 2, 0, '2012-04-04 17:59:36'),
(85, 255, 10, 1, 20, 0, '2012-04-04 18:00:34'),
(86, 256, 10, 1, 20, 0, '2012-04-04 18:01:30'),
(87, 257, 10, 1, 2, 0, '2012-04-04 18:02:19'),
(88, 239, 10, 1, 4, 0, '2012-04-04 18:03:36'),
(89, 429, 10, 1, 2, 0, '2012-04-04 18:04:13'),
(90, 258, 10, 15, 2, 0, '2012-04-04 18:05:49'),
(91, 259, 10, 15, 2, 0, '2012-04-04 18:06:13'),
(92, 241, 10, 14, 2, 0, '2012-04-04 18:07:59'),
(93, 243, 10, 14, 2, 0, '2012-04-04 18:08:51'),
(94, 245, 10, 14, 2, 0, '2012-04-04 18:09:42'),
(95, 247, 10, 14, 2, 0, '2012-04-04 18:10:14'),
(96, 253, 10, 34, 20, 0, '2012-04-04 18:12:11'),
(97, 252, 10, 34, 2, 0, '2012-04-04 18:13:00'),
(98, 142, 6, 1, 6, 0, '2012-04-04 18:17:43'),
(99, 143, 6, 1, 2, 0, '2012-04-04 18:18:09'),
(100, 144, 6, 1, 20, 0, '2012-04-04 18:18:41'),
(101, 145, 6, 1, 20, 0, '2012-04-04 18:19:09'),
(104, 147, 6, 1, 20, 0, '2012-04-04 18:21:13'),
(103, 146, 6, 1, 20, 0, '2012-04-04 18:20:43'),
(105, 148, 6, 1, 20, 0, '2012-04-04 18:21:42'),
(106, 149, 6, 1, 20, 0, '2012-04-04 18:22:18'),
(107, 156, 6, 1, 20, 0, '2012-04-04 18:23:17'),
(108, 150, 6, 1, 8, 0, '2012-04-04 18:24:00'),
(109, 152, 6, 1, 2, 0, '2012-04-04 18:24:34'),
(110, 151, 6, 1, 4, 0, '2012-04-04 18:25:04'),
(111, 153, 6, 1, 20, 0, '2012-04-04 18:26:03'),
(112, 157, 6, 1, 20, 0, '2012-04-04 18:26:35'),
(113, 158, 6, 1, 20, 0, '2012-04-04 18:27:16'),
(114, 165, 6, 10, 20, 0, '2012-04-04 18:28:01'),
(115, 166, 6, 10, 20, 0, '2012-04-04 18:28:33'),
(116, 424, 6, 31, 20, 0, '2012-04-04 18:30:31'),
(117, 425, 6, 31, 2, 0, '2012-04-04 18:31:13'),
(118, 426, 6, 31, 20, 0, '2012-04-04 18:32:56'),
(119, 427, 6, 31, 20, 0, '2012-04-04 18:33:32'),
(120, 167, 6, 30, 20, 0, '2012-04-04 18:34:35'),
(121, 423, 6, 30, 2, 0, '2012-04-04 18:35:01'),
(122, 555, 3, 45, 20, 0, '2012-04-04 18:45:57'),
(123, 554, 3, 45, 20, 0, '2012-04-04 18:48:26'),
(124, 557, 3, 45, 20, 0, '2012-04-04 18:49:15'),
(125, 556, 3, 45, 20, 0, '2012-04-04 18:50:00'),
(126, 194, 8, 1, 17, 1, '2012-04-04 18:53:44'),
(127, 195, 8, 1, 17, 1, '2012-04-04 18:54:16'),
(128, 196, 8, 1, 17, 1, '2012-04-04 18:55:38'),
(129, 198, 8, 1, 17, 1, '2012-04-04 18:56:17'),
(130, 200, 8, 1, 20, 0, '2012-04-04 18:56:55'),
(175, 197, 8, 1, 26, 0, '2012-06-28 09:42:30'),
(132, 199, 8, 1, 2, 0, '2012-04-04 18:58:29'),
(134, 205, 8, 24, 10, 0, '2012-04-04 19:01:03'),
(135, 204, 8, 24, 10, 0, '2012-04-04 19:01:36'),
(136, 206, 8, 24, 4, 0, '2012-04-04 19:02:28'),
(137, 207, 8, 24, 5, 0, '2012-04-04 19:03:06'),
(138, 208, 8, 24, 5, 0, '2012-04-04 19:03:42'),
(139, 209, 8, 24, 4, 0, '2012-04-04 19:04:15'),
(140, 210, 8, 24, 4, 0, '2012-04-04 19:04:50'),
(141, 211, 8, 24, 4, 0, '2012-04-04 19:05:19'),
(142, 201, 8, 13, 20, 0, '2012-04-04 19:06:22'),
(143, 202, 8, 13, 20, 0, '2012-04-04 19:06:52'),
(144, 203, 8, 13, 20, 0, '2012-04-04 19:07:33'),
(145, 96, 5, 1, 6, 0, '2012-04-04 19:10:52'),
(148, 98, 5, 1, 10, 0, '2012-04-04 19:12:44'),
(149, 99, 5, 1, 10, 0, '2012-04-04 19:13:16'),
(150, 101, 5, 1, 10, 0, '2012-04-04 19:13:44'),
(151, 115, 5, 1, 2, 0, '2012-04-04 19:14:06'),
(152, 116, 5, 1, 2, 0, '2012-04-04 19:14:40'),
(153, 117, 5, 1, 2, 0, '2012-04-04 19:15:20'),
(154, 118, 5, 1, 20, 0, '2012-04-04 19:15:47'),
(155, 102, 5, 1, 20, 0, '2012-04-04 19:16:16'),
(156, 41, 5, 1, 10, 0, '2012-04-04 19:16:47'),
(157, 127, 5, 1, 10, 0, '2012-04-04 19:17:09'),
(158, 471, 5, 1, 10, 0, '2012-04-04 19:17:34'),
(159, 84, 5, 1, 10, 0, '2012-04-04 19:18:17'),
(160, 535, 5, 1, 5, 0, '2012-04-04 19:18:58'),
(161, 528, 5, 1, 10, 0, '2012-04-04 19:19:34'),
(162, 44, 5, 6, 10, 0, '2012-04-04 19:20:23'),
(163, 45, 5, 6, 10, 0, '2012-04-04 19:20:46'),
(164, 46, 5, 6, 10, 0, '2012-04-04 19:21:12'),
(165, 47, 5, 6, 10, 0, '2012-04-04 19:21:35'),
(166, 48, 5, 6, 10, 0, '2012-04-04 19:21:56'),
(167, 49, 5, 6, 10, 0, '2012-04-04 19:22:17'),
(168, 159, 6, 9, 20, 0, '2012-04-04 19:27:09'),
(169, 160, 6, 9, 20, 0, '2012-04-04 19:27:54'),
(170, 91, 6, 9, 20, 0, '2012-04-04 19:28:36'),
(171, 85, 6, 9, 4, 0, '2012-04-04 19:29:33'),
(172, 86, 6, 9, 4, 0, '2012-04-04 19:30:19'),
(173, 164, 6, 9, 3, 0, '2012-04-04 19:31:24'),
(174, 544, 6, 9, 20, 0, '2012-04-04 19:32:14'),
(176, 529, 5, 1, 10, 0, '2012-07-25 19:32:58'),
(3, 561, 3, 1, 27, 0, '2013-08-23 21:34:09'),
(177, 514, 16, 1, 25, 0, '2013-08-25 18:38:59');

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Airway_Box`
--

DROP TABLE IF EXISTS `Truck1_Airway_Box`;
CREATE TABLE IF NOT EXISTS `Truck1_Airway_Box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `Truck1_Airway_Box`
--

INSERT INTO `Truck1_Airway_Box` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 11, 27, 1, 20, 0, '2012-03-12 16:47:27'),
(2, 50, 27, 1, 20, 0, '2012-03-12 16:47:27'),
(3, 51, 27, 1, 5, 0, '2012-03-12 16:47:27'),
(64, 484, 27, 1, 4, 0, '2012-04-22 16:07:20'),
(59, 41, 27, 1, 4, 0, '2012-04-22 16:02:13'),
(7, 42, 27, 1, 2, 0, '2012-03-12 16:47:27'),
(47, 428, 27, 1, 20, 0, '2012-03-12 16:47:27'),
(10, 27, 27, 1, 20, 0, '2012-03-12 16:47:27'),
(11, 10, 27, 1, 20, 0, '2012-03-12 16:47:27'),
(46, 28, 27, 1, 20, 0, '2012-03-12 16:47:27'),
(28, 29, 27, 4, 20, 0, '2012-03-12 16:47:27'),
(29, 30, 27, 4, 20, 0, '2012-03-12 16:47:27'),
(30, 31, 27, 4, 20, 0, '2012-03-12 16:47:27'),
(31, 32, 27, 4, 20, 0, '2012-03-12 16:47:27'),
(32, 33, 27, 4, 20, 0, '2012-03-12 16:47:27'),
(33, 34, 27, 5, 20, 0, '2012-03-12 16:47:27'),
(34, 35, 27, 5, 20, 0, '2012-03-12 16:47:27'),
(35, 36, 27, 5, 20, 0, '2012-03-12 16:47:27'),
(36, 37, 27, 5, 20, 0, '2012-03-12 16:47:27'),
(37, 38, 27, 5, 20, 0, '2012-03-12 16:47:27'),
(38, 44, 27, 6, 2, 0, '2012-03-12 16:47:27'),
(39, 45, 27, 6, 2, 0, '2012-03-12 16:47:27'),
(40, 46, 27, 6, 2, 0, '2012-03-12 16:47:27'),
(41, 47, 27, 6, 2, 0, '2012-03-12 16:47:27'),
(42, 48, 27, 6, 2, 0, '2012-03-12 16:47:27'),
(43, 49, 27, 6, 2, 0, '2012-03-12 16:47:27'),
(48, 26, 27, 1, 2, 0, '2012-03-12 16:47:27'),
(49, 62, 27, 32, 2, 0, '2012-04-22 15:48:16'),
(50, 101, 27, 1, 2, 0, '2012-04-22 15:51:02'),
(51, 52, 27, 32, 7, 0, '2012-04-22 15:51:02'),
(53, 53, 27, 32, 3, 0, '2012-04-22 15:53:15'),
(54, 96, 27, 1, 20, 0, '2012-04-22 15:56:07'),
(55, 55, 27, 32, 4, 0, '2012-04-22 15:56:07'),
(56, 98, 27, 1, 20, 0, '2012-04-22 15:58:16'),
(57, 74, 27, 32, 2, 0, '2012-04-22 15:58:16'),
(58, 92, 27, 32, 20, 0, '2012-04-22 15:59:53'),
(60, 93, 27, 32, 2, 0, '2012-04-22 16:02:13'),
(61, 64, 27, 32, 20, 0, '2012-04-22 16:03:32'),
(62, 72, 27, 32, 20, 0, '2012-04-22 16:05:46'),
(63, 69, 27, 32, 20, 0, '2012-04-22 16:06:56');

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Airway_Box_checksheet`
--

DROP TABLE IF EXISTS `Truck1_Airway_Box_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck1_Airway_Box_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=121 ;

--
-- Dumping data for table `Truck1_Airway_Box_checksheet`
--

INSERT INTO `Truck1_Airway_Box_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 11, '1', 'cb', 27, 1),
(2, 1, 50, '1', 'cb', 27, 1),
(3, 1, 51, '5', '5', 27, 1),
(4, 1, 484, '4', '4', 27, 1),
(5, 1, 41, '4', '4', 27, 1),
(6, 1, 42, '2', '2', 27, 1),
(7, 1, 428, '1', 'cb', 27, 1),
(8, 1, 27, '1', 'cb', 27, 1),
(9, 1, 10, '1', 'cb', 27, 1),
(10, 1, 28, '1', 'cb', 27, 1),
(11, 1, 26, '2', '2', 27, 1),
(12, 1, 101, '2', '2', 27, 1),
(13, 1, 96, '1', 'cb', 27, 1),
(14, 1, 98, '1', 'cb', 27, 1),
(15, 1, 29, '1', 'cb', 27, 4),
(16, 1, 30, '1', 'cb', 27, 4),
(17, 1, 31, '1', 'cb', 27, 4),
(18, 1, 32, '1', 'cb', 27, 4),
(19, 1, 33, '1', 'cb', 27, 4),
(20, 1, 34, '1', 'cb', 27, 5),
(21, 1, 35, '1', 'cb', 27, 5),
(22, 1, 36, '1', 'cb', 27, 5),
(23, 1, 37, '1', 'cb', 27, 5),
(24, 1, 38, '1', 'cb', 27, 5),
(25, 1, 44, '2', '2', 27, 6),
(26, 1, 45, '2', '2', 27, 6),
(27, 1, 46, '2', '2', 27, 6),
(28, 1, 47, '2', '2', 27, 6),
(29, 1, 48, '2', '2', 27, 6),
(30, 1, 49, '2', '2', 27, 6),
(31, 1, 62, '2', '2', 27, 32),
(32, 1, 52, '7', '7', 27, 32),
(33, 1, 53, '3', '3', 27, 32),
(34, 1, 55, '4', '4', 27, 32),
(35, 1, 74, '2', '2', 27, 32),
(36, 1, 92, '1', 'cb', 27, 32),
(37, 1, 93, '2', '2', 27, 32),
(38, 1, 64, '1', 'cb', 27, 32),
(39, 1, 72, '1', 'cb', 27, 32),
(40, 1, 69, '1', 'cb', 27, 32),
(41, 2, 11, '1', 'cb', 27, 1),
(42, 2, 50, '1', 'cb', 27, 1),
(43, 2, 51, '5', '5', 27, 1),
(44, 2, 484, '4', '4', 27, 1),
(45, 2, 41, '4', '4', 27, 1),
(46, 2, 42, '2', '2', 27, 1),
(47, 2, 428, '1', 'cb', 27, 1),
(48, 2, 27, '1', 'cb', 27, 1),
(49, 2, 10, '1', 'cb', 27, 1),
(50, 2, 28, '1', 'cb', 27, 1),
(51, 2, 26, '2', '2', 27, 1),
(52, 2, 101, '2', '2', 27, 1),
(53, 2, 96, '1', 'cb', 27, 1),
(54, 2, 98, '1', 'cb', 27, 1),
(55, 2, 29, '1', 'cb', 27, 4),
(56, 2, 30, '1', 'cb', 27, 4),
(57, 2, 31, '1', 'cb', 27, 4),
(58, 2, 32, '1', 'cb', 27, 4),
(59, 2, 33, '1', 'cb', 27, 4),
(60, 2, 34, '1', 'cb', 27, 5),
(61, 2, 35, '1', 'cb', 27, 5),
(62, 2, 36, '1', 'cb', 27, 5),
(63, 2, 37, '1', 'cb', 27, 5),
(64, 2, 38, '1', 'cb', 27, 5),
(65, 2, 44, '2', '2', 27, 6),
(66, 2, 45, '2', '2', 27, 6),
(67, 2, 46, '2', '2', 27, 6),
(68, 2, 47, '2', '2', 27, 6),
(69, 2, 48, '2', '2', 27, 6),
(70, 2, 49, '2', '2', 27, 6),
(71, 2, 62, '2', '2', 27, 32),
(72, 2, 52, '7', '7', 27, 32),
(73, 2, 53, '3', '3', 27, 32),
(74, 2, 55, '4', '4', 27, 32),
(75, 2, 74, '2', '2', 27, 32),
(76, 2, 92, '1', 'cb', 27, 32),
(77, 2, 93, '2', '2', 27, 32),
(78, 2, 64, '1', 'cb', 27, 32),
(79, 2, 72, '1', 'cb', 27, 32),
(80, 2, 69, '1', 'cb', 27, 32),
(81, 3, 11, '1', 'cb', 27, 1),
(82, 3, 50, '1', 'cb', 27, 1),
(83, 3, 51, '5', '5', 27, 1),
(84, 3, 484, '4', '4', 27, 1),
(85, 3, 41, '4', '4', 27, 1),
(86, 3, 42, '2', '2', 27, 1),
(87, 3, 428, '1', 'cb', 27, 1),
(88, 3, 27, '1', 'cb', 27, 1),
(89, 3, 10, '1', 'cb', 27, 1),
(90, 3, 28, '1', 'cb', 27, 1),
(91, 3, 26, '2', '2', 27, 1),
(92, 3, 101, '2', '2', 27, 1),
(93, 3, 96, '1', 'cb', 27, 1),
(94, 3, 98, '1', 'cb', 27, 1),
(95, 3, 29, '1', 'cb', 27, 4),
(96, 3, 30, '1', 'cb', 27, 4),
(97, 3, 31, '1', 'cb', 27, 4),
(98, 3, 32, '1', 'cb', 27, 4),
(99, 3, 33, '1', 'cb', 27, 4),
(100, 3, 34, '1', 'cb', 27, 5),
(101, 3, 35, '1', 'cb', 27, 5),
(102, 3, 36, '1', 'cb', 27, 5),
(103, 3, 37, '1', 'cb', 27, 5),
(104, 3, 38, '1', 'cb', 27, 5),
(105, 3, 44, '2', '2', 27, 6),
(106, 3, 45, '2', '2', 27, 6),
(107, 3, 46, '2', '2', 27, 6),
(108, 3, 47, '2', '2', 27, 6),
(109, 3, 48, '2', '2', 27, 6),
(110, 3, 49, '2', '2', 27, 6),
(111, 3, 62, '2', '2', 27, 32),
(112, 3, 52, '7', '7', 27, 32),
(113, 3, 53, '3', '3', 27, 32),
(114, 3, 55, '4', '4', 27, 32),
(115, 3, 74, '2', '2', 27, 32),
(116, 3, 92, '1', 'cb', 27, 32),
(117, 3, 93, '2', '2', 27, 32),
(118, 3, 64, '1', 'cb', 27, 32),
(119, 3, 72, '1', 'cb', 27, 32),
(120, 3, 69, '1', 'cb', 27, 32);

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Airway_Box_events`
--

DROP TABLE IF EXISTS `Truck1_Airway_Box_events`;
CREATE TABLE IF NOT EXISTS `Truck1_Airway_Box_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Truck1_Airway_Box_events`
--

INSERT INTO `Truck1_Airway_Box_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-11-25 18:47:49', 1, 1, 1),
(2, '2015-08-04 21:09:41', 1, 1, 2),
(3, '2015-08-15 17:06:50', NULL, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_checksheet`
--

DROP TABLE IF EXISTS `Truck1_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck1_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=493 ;

--
-- Dumping data for table `Truck1_checksheet`
--

INSERT INTO `Truck1_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 1, '0', 'miles', 3, 1),
(2, 1, 2, '0', 'miles', 3, 1),
(3, 1, 4, 'C-Shift', 'refill', 3, 1),
(4, 1, 6, '8', 'refill', 3, 1),
(5, 1, 7, '99', 'refill', 3, 1),
(6, 1, 175, '2', '2', 3, 1),
(7, 1, 176, '2', '2', 3, 1),
(8, 1, 177, '3', '3', 3, 1),
(9, 1, 178, '1', 'cb', 3, 1),
(10, 1, 179, '1', 'cb', 3, 1),
(11, 1, 180, '1', 'cb', 3, 1),
(12, 1, 8, '1', 'personnel', 3, 2),
(13, 1, 9, '1', 'personnel', 3, 2),
(14, 1, 495, '', 'open', 3, 2),
(15, 1, 104, '1', 'cb', 3, 20),
(16, 1, 105, '1', 'cb', 3, 20),
(17, 1, 106, '1', 'cb', 3, 20),
(18, 1, 107, '1', 'cb', 3, 20),
(19, 1, 108, '1', 'cb', 3, 20),
(20, 1, 109, '1', 'cb', 3, 20),
(21, 1, 130, '1', 'cb', 3, 21),
(22, 1, 131, '1', 'cb', 3, 21),
(23, 1, 132, '1', 'cb', 3, 21),
(24, 1, 133, '1', 'cb', 3, 21),
(25, 1, 134, '1', 'cb', 3, 21),
(26, 1, 135, '1', 'cb', 3, 21),
(27, 1, 136, '1', 'cb', 3, 21),
(28, 1, 137, '1', 'cb', 3, 21),
(29, 1, 138, '1', 'cb', 3, 21),
(30, 1, 139, '1', 'cb', 3, 21),
(31, 1, 140, '1', 'cb', 3, 21),
(32, 1, 141, '1', 'cb', 3, 21),
(33, 1, 283, '', 'tire', 3, 22),
(34, 1, 284, '', 'open', 3, 22),
(35, 1, 285, '', 'open', 3, 22),
(36, 1, 286, '', 'open', 3, 22),
(37, 1, 287, '', 'open', 3, 22),
(38, 1, 288, '', 'open', 3, 22),
(39, 1, 289, '', 'open', 3, 22),
(40, 1, 331, '1', 'cb', 3, 23),
(41, 1, 332, '1', 'cb', 3, 23),
(42, 1, 333, '1', 'cb', 3, 23),
(43, 1, 334, '1', 'cb', 3, 23),
(44, 1, 335, '1', 'cb', 3, 23),
(45, 1, 336, '1', 'cb', 3, 23),
(46, 1, 337, '1', 'cb', 3, 23),
(47, 1, 555, '1', 'cb', 3, 45),
(48, 1, 554, '1', 'cb', 3, 45),
(49, 1, 557, '1', 'cb', 3, 45),
(50, 1, 556, '1', 'cb', 3, 45),
(51, 1, 391, '10', '10', 4, 1),
(52, 1, 488, '2', '2', 4, 1),
(53, 1, 390, '10', '10', 4, 1),
(54, 1, 392, '2', '2', 4, 1),
(55, 1, 379, '1', 'cb', 4, 1),
(56, 1, 548, '1', 'cb', 36, 1),
(57, 1, 401, '2', '2', 36, 1),
(58, 1, 402, '3', '3', 36, 1),
(59, 1, 549, '1', 'cb', 36, 1),
(60, 1, 405, '1', 'cb', 36, 1),
(61, 1, 406, '1', 'cb', 36, 1),
(62, 1, 407, '1', 'cb', 36, 1),
(63, 1, 410, '1', 'cb', 36, 1),
(64, 1, 403, '1', 'cb', 36, 7),
(65, 1, 404, '1', 'cb', 36, 7),
(66, 1, 409, '2', '2', 36, 17),
(67, 1, 551, '2', '2', 36, 17),
(68, 1, 411, '2', '2', 36, 19),
(69, 1, 412, '2', '2', 36, 19),
(70, 1, 536, '1', 'cb', 36, 32),
(71, 1, 537, '1', 'cb', 36, 32),
(72, 1, 521, '1', 'cb', 36, 32),
(73, 1, 550, '1', 'cb', 36, 32),
(74, 1, 553, '1', 'cb', 36, 44),
(75, 1, 552, '1', 'cb', 36, 44),
(76, 1, 248, '4', '4', 10, 1),
(77, 1, 249, '4', '4', 10, 1),
(78, 1, 250, '1', 'cb', 10, 1),
(79, 1, 251, '1', 'cb', 10, 1),
(80, 1, 254, '2', '2', 10, 1),
(81, 1, 255, '1', 'cb', 10, 1),
(82, 1, 256, '1', 'cb', 10, 1),
(83, 1, 257, '2', '2', 10, 1),
(84, 1, 239, '4', '4', 10, 1),
(85, 1, 429, '2', '2', 10, 1),
(86, 1, 258, '2', '2', 10, 15),
(87, 1, 259, '2', '2', 10, 15),
(88, 1, 241, '2', '2', 10, 14),
(89, 1, 243, '2', '2', 10, 14),
(90, 1, 245, '2', '2', 10, 14),
(91, 1, 247, '2', '2', 10, 14),
(92, 1, 253, '1', 'cb', 10, 34),
(93, 1, 252, '2', '2', 10, 34),
(94, 1, 142, '6', '6', 6, 1),
(95, 1, 143, '2', '2', 6, 1),
(96, 1, 144, '1', 'cb', 6, 1),
(97, 1, 145, '1', 'cb', 6, 1),
(98, 1, 147, '1', 'cb', 6, 1),
(99, 1, 146, '1', 'cb', 6, 1),
(100, 1, 148, '1', 'cb', 6, 1),
(101, 1, 149, '1', 'cb', 6, 1),
(102, 1, 156, '1', 'cb', 6, 1),
(103, 1, 150, '8', '8', 6, 1),
(104, 1, 152, '2', '2', 6, 1),
(105, 1, 151, '4', '4', 6, 1),
(106, 1, 153, '1', 'cb', 6, 1),
(107, 1, 157, '1', 'cb', 6, 1),
(108, 1, 158, '1', 'cb', 6, 1),
(109, 1, 165, '1', 'cb', 6, 10),
(110, 1, 166, '1', 'cb', 6, 10),
(111, 1, 424, '1', 'cb', 6, 31),
(112, 1, 425, '2', '2', 6, 31),
(113, 1, 426, '1', 'cb', 6, 31),
(114, 1, 427, '1', 'cb', 6, 31),
(115, 1, 167, '1', 'cb', 6, 30),
(116, 1, 423, '2', '2', 6, 30),
(117, 1, 159, '1', 'cb', 6, 9),
(118, 1, 160, '1', 'cb', 6, 9),
(119, 1, 91, '1', 'cb', 6, 9),
(120, 1, 85, '4', '4', 6, 9),
(121, 1, 86, '4', '4', 6, 9),
(122, 1, 164, '3', '3', 6, 9),
(123, 1, 544, '1', 'cb', 6, 9),
(124, 1, 194, '0', 'O2', 8, 1),
(125, 1, 195, '0', 'O2', 8, 1),
(126, 1, 196, '0', 'O2', 8, 1),
(127, 1, 198, '0', 'O2', 8, 1),
(128, 1, 200, '1', 'cb', 8, 1),
(129, 1, 197, 'N/A', 'na', 8, 1),
(130, 1, 199, '2', '2', 8, 1),
(131, 1, 205, '10', '10', 8, 24),
(132, 1, 204, '10', '10', 8, 24),
(133, 1, 206, '4', '4', 8, 24),
(134, 1, 207, '5', '5', 8, 24),
(135, 1, 208, '5', '5', 8, 24),
(136, 1, 209, '4', '4', 8, 24),
(137, 1, 210, '4', '4', 8, 24),
(138, 1, 211, '4', '4', 8, 24),
(139, 1, 201, '1', 'cb', 8, 13),
(140, 1, 202, '1', 'cb', 8, 13),
(141, 1, 203, '1', 'cb', 8, 13),
(142, 1, 96, '6', '6', 5, 1),
(143, 1, 98, '10', '10', 5, 1),
(144, 1, 99, '10', '10', 5, 1),
(145, 1, 101, '10', '10', 5, 1),
(146, 1, 115, '2', '2', 5, 1),
(147, 1, 116, '2', '2', 5, 1),
(148, 1, 117, '2', '2', 5, 1),
(149, 1, 118, '1', 'cb', 5, 1),
(150, 1, 102, '1', 'cb', 5, 1),
(151, 1, 41, '10', '10', 5, 1),
(152, 1, 127, '10', '10', 5, 1),
(153, 1, 471, '10', '10', 5, 1),
(154, 1, 84, '10', '10', 5, 1),
(155, 1, 535, '5', '5', 5, 1),
(156, 1, 528, '10', '10', 5, 1),
(157, 1, 529, '10', '10', 5, 1),
(158, 1, 44, '10', '10', 5, 6),
(159, 1, 45, '10', '10', 5, 6),
(160, 1, 46, '10', '10', 5, 6),
(161, 1, 47, '10', '10', 5, 6),
(162, 1, 48, '10', '10', 5, 6),
(163, 1, 49, '10', '10', 5, 6),
(164, 1, 514, '', 'comment', 16, 1),
(165, 2, 1, '0', 'miles', 3, 1),
(166, 2, 2, '0', 'miles', 3, 1),
(167, 2, 4, 'C-Shift', 'refill', 3, 1),
(168, 2, 6, '8', 'refill', 3, 1),
(169, 2, 7, '99', 'refill', 3, 1),
(170, 2, 175, '2', '2', 3, 1),
(171, 2, 176, '2', '2', 3, 1),
(172, 2, 177, '3', '3', 3, 1),
(173, 2, 178, '1', 'cb', 3, 1),
(174, 2, 179, '1', 'cb', 3, 1),
(175, 2, 180, '1', 'cb', 3, 1),
(176, 2, 8, '1', 'personnel', 3, 2),
(177, 2, 9, '1', 'personnel', 3, 2),
(178, 2, 495, '', 'open', 3, 2),
(179, 2, 104, '1', 'cb', 3, 20),
(180, 2, 105, '1', 'cb', 3, 20),
(181, 2, 106, '1', 'cb', 3, 20),
(182, 2, 107, '1', 'cb', 3, 20),
(183, 2, 108, '1', 'cb', 3, 20),
(184, 2, 109, '1', 'cb', 3, 20),
(185, 2, 130, '1', 'cb', 3, 21),
(186, 2, 131, '1', 'cb', 3, 21),
(187, 2, 132, NULL, 'cb', 3, 21),
(188, 2, 133, '1', 'cb', 3, 21),
(189, 2, 134, '1', 'cb', 3, 21),
(190, 2, 135, '1', 'cb', 3, 21),
(191, 2, 136, NULL, 'cb', 3, 21),
(192, 2, 137, '1', 'cb', 3, 21),
(193, 2, 138, '1', 'cb', 3, 21),
(194, 2, 139, '1', 'cb', 3, 21),
(195, 2, 140, '1', 'cb', 3, 21),
(196, 2, 141, NULL, 'cb', 3, 21),
(197, 2, 283, '', 'tire', 3, 22),
(198, 2, 284, '', 'open', 3, 22),
(199, 2, 285, '', 'open', 3, 22),
(200, 2, 286, '', 'open', 3, 22),
(201, 2, 287, '', 'open', 3, 22),
(202, 2, 288, '', 'open', 3, 22),
(203, 2, 289, '', 'open', 3, 22),
(204, 2, 331, '1', 'cb', 3, 23),
(205, 2, 332, '1', 'cb', 3, 23),
(206, 2, 333, '1', 'cb', 3, 23),
(207, 2, 334, '1', 'cb', 3, 23),
(208, 2, 335, '1', 'cb', 3, 23),
(209, 2, 336, '1', 'cb', 3, 23),
(210, 2, 337, '1', 'cb', 3, 23),
(211, 2, 555, '1', 'cb', 3, 45),
(212, 2, 554, '1', 'cb', 3, 45),
(213, 2, 557, '1', 'cb', 3, 45),
(214, 2, 556, '1', 'cb', 3, 45),
(215, 2, 391, '10', '10', 4, 1),
(216, 2, 488, '2', '2', 4, 1),
(217, 2, 390, '10', '10', 4, 1),
(218, 2, 392, '2', '2', 4, 1),
(219, 2, 379, '1', 'cb', 4, 1),
(220, 2, 548, '1', 'cb', 36, 1),
(221, 2, 401, '2', '2', 36, 1),
(222, 2, 402, '3', '3', 36, 1),
(223, 2, 549, '1', 'cb', 36, 1),
(224, 2, 405, '1', 'cb', 36, 1),
(225, 2, 406, '1', 'cb', 36, 1),
(226, 2, 407, '1', 'cb', 36, 1),
(227, 2, 410, '1', 'cb', 36, 1),
(228, 2, 403, '1', 'cb', 36, 7),
(229, 2, 404, '1', 'cb', 36, 7),
(230, 2, 409, '2', '2', 36, 17),
(231, 2, 551, '2', '2', 36, 17),
(232, 2, 411, '2', '2', 36, 19),
(233, 2, 412, '2', '2', 36, 19),
(234, 2, 536, '1', 'cb', 36, 32),
(235, 2, 537, '1', 'cb', 36, 32),
(236, 2, 521, '1', 'cb', 36, 32),
(237, 2, 550, '1', 'cb', 36, 32),
(238, 2, 553, '1', 'cb', 36, 44),
(239, 2, 552, '1', 'cb', 36, 44),
(240, 2, 248, '4', '4', 10, 1),
(241, 2, 249, '4', '4', 10, 1),
(242, 2, 250, '1', 'cb', 10, 1),
(243, 2, 251, '1', 'cb', 10, 1),
(244, 2, 254, '2', '2', 10, 1),
(245, 2, 255, '1', 'cb', 10, 1),
(246, 2, 256, '1', 'cb', 10, 1),
(247, 2, 257, '2', '2', 10, 1),
(248, 2, 239, '4', '4', 10, 1),
(249, 2, 429, '2', '2', 10, 1),
(250, 2, 258, '2', '2', 10, 15),
(251, 2, 259, '2', '2', 10, 15),
(252, 2, 241, '2', '2', 10, 14),
(253, 2, 243, '2', '2', 10, 14),
(254, 2, 245, '2', '2', 10, 14),
(255, 2, 247, '2', '2', 10, 14),
(256, 2, 253, '1', 'cb', 10, 34),
(257, 2, 252, '2', '2', 10, 34),
(258, 2, 142, '6', '6', 6, 1),
(259, 2, 143, '2', '2', 6, 1),
(260, 2, 144, '1', 'cb', 6, 1),
(261, 2, 145, '1', 'cb', 6, 1),
(262, 2, 147, '1', 'cb', 6, 1),
(263, 2, 146, '1', 'cb', 6, 1),
(264, 2, 148, '1', 'cb', 6, 1),
(265, 2, 149, '1', 'cb', 6, 1),
(266, 2, 156, '1', 'cb', 6, 1),
(267, 2, 150, '8', '8', 6, 1),
(268, 2, 152, '2', '2', 6, 1),
(269, 2, 151, '4', '4', 6, 1),
(270, 2, 153, '1', 'cb', 6, 1),
(271, 2, 157, '1', 'cb', 6, 1),
(272, 2, 158, '1', 'cb', 6, 1),
(273, 2, 165, '1', 'cb', 6, 10),
(274, 2, 166, '1', 'cb', 6, 10),
(275, 2, 424, '1', 'cb', 6, 31),
(276, 2, 425, '2', '2', 6, 31),
(277, 2, 426, '1', 'cb', 6, 31),
(278, 2, 427, '1', 'cb', 6, 31),
(279, 2, 167, '1', 'cb', 6, 30),
(280, 2, 423, '2', '2', 6, 30),
(281, 2, 159, '1', 'cb', 6, 9),
(282, 2, 160, '1', 'cb', 6, 9),
(283, 2, 91, '1', 'cb', 6, 9),
(284, 2, 85, '4', '4', 6, 9),
(285, 2, 86, '4', '4', 6, 9),
(286, 2, 164, '3', '3', 6, 9),
(287, 2, 544, '1', 'cb', 6, 9),
(288, 2, 194, '0', 'O2', 8, 1),
(289, 2, 195, '0', 'O2', 8, 1),
(290, 2, 196, '0', 'O2', 8, 1),
(291, 2, 198, '0', 'O2', 8, 1),
(292, 2, 200, '1', 'cb', 8, 1),
(293, 2, 197, 'N/A', 'na', 8, 1),
(294, 2, 199, '2', '2', 8, 1),
(295, 2, 205, '10', '10', 8, 24),
(296, 2, 204, '10', '10', 8, 24),
(297, 2, 206, '4', '4', 8, 24),
(298, 2, 207, '5', '5', 8, 24),
(299, 2, 208, '5', '5', 8, 24),
(300, 2, 209, '4', '4', 8, 24),
(301, 2, 210, '4', '4', 8, 24),
(302, 2, 211, '4', '4', 8, 24),
(303, 2, 201, '1', 'cb', 8, 13),
(304, 2, 202, '1', 'cb', 8, 13),
(305, 2, 203, '1', 'cb', 8, 13),
(306, 2, 96, '6', '6', 5, 1),
(307, 2, 98, '10', '10', 5, 1),
(308, 2, 99, '10', '10', 5, 1),
(309, 2, 101, '10', '10', 5, 1),
(310, 2, 115, '2', '2', 5, 1),
(311, 2, 116, '2', '2', 5, 1),
(312, 2, 117, '2', '2', 5, 1),
(313, 2, 118, '1', 'cb', 5, 1),
(314, 2, 102, '1', 'cb', 5, 1),
(315, 2, 41, '10', '10', 5, 1),
(316, 2, 127, '10', '10', 5, 1),
(317, 2, 471, '10', '10', 5, 1),
(318, 2, 84, '10', '10', 5, 1),
(319, 2, 535, '5', '5', 5, 1),
(320, 2, 528, '10', '10', 5, 1),
(321, 2, 529, '10', '10', 5, 1),
(322, 2, 44, '10', '10', 5, 6),
(323, 2, 45, '10', '10', 5, 6),
(324, 2, 46, '10', '10', 5, 6),
(325, 2, 47, '10', '10', 5, 6),
(326, 2, 48, '10', '10', 5, 6),
(327, 2, 49, '10', '10', 5, 6),
(328, 2, 514, '', 'comment', 16, 1),
(329, 3, 1, '0', 'miles', 3, 1),
(330, 3, 2, '0', 'miles', 3, 1),
(331, 3, 4, 'C-Shift', 'refill', 3, 1),
(332, 3, 6, '8', 'refill', 3, 1),
(333, 3, 7, '99', 'refill', 3, 1),
(334, 3, 175, '2', '2', 3, 1),
(335, 3, 176, '2', '2', 3, 1),
(336, 3, 177, '3', '3', 3, 1),
(337, 3, 178, '1', 'cb', 3, 1),
(338, 3, 179, '1', 'cb', 3, 1),
(339, 3, 180, '1', 'cb', 3, 1),
(340, 3, 8, '1', 'personnel', 3, 2),
(341, 3, 9, '1', 'personnel', 3, 2),
(342, 3, 495, '', 'open', 3, 2),
(343, 3, 104, '1', 'cb', 3, 20),
(344, 3, 105, '1', 'cb', 3, 20),
(345, 3, 106, '1', 'cb', 3, 20),
(346, 3, 107, '1', 'cb', 3, 20),
(347, 3, 108, '1', 'cb', 3, 20),
(348, 3, 109, '1', 'cb', 3, 20),
(349, 3, 130, '1', 'cb', 3, 21),
(350, 3, 131, '1', 'cb', 3, 21),
(351, 3, 132, '1', 'cb', 3, 21),
(352, 3, 133, '1', 'cb', 3, 21),
(353, 3, 134, '1', 'cb', 3, 21),
(354, 3, 135, '1', 'cb', 3, 21),
(355, 3, 136, '1', 'cb', 3, 21),
(356, 3, 137, '1', 'cb', 3, 21),
(357, 3, 138, '1', 'cb', 3, 21),
(358, 3, 139, '1', 'cb', 3, 21),
(359, 3, 140, '1', 'cb', 3, 21),
(360, 3, 141, '1', 'cb', 3, 21),
(361, 3, 283, '', 'tire', 3, 22),
(362, 3, 284, '', 'open', 3, 22),
(363, 3, 285, '', 'open', 3, 22),
(364, 3, 286, '', 'open', 3, 22),
(365, 3, 287, '', 'open', 3, 22),
(366, 3, 288, '', 'open', 3, 22),
(367, 3, 289, '', 'open', 3, 22),
(368, 3, 331, '1', 'cb', 3, 23),
(369, 3, 332, '1', 'cb', 3, 23),
(370, 3, 333, '1', 'cb', 3, 23),
(371, 3, 334, '1', 'cb', 3, 23),
(372, 3, 335, '1', 'cb', 3, 23),
(373, 3, 336, '1', 'cb', 3, 23),
(374, 3, 337, '1', 'cb', 3, 23),
(375, 3, 555, '1', 'cb', 3, 45),
(376, 3, 554, '1', 'cb', 3, 45),
(377, 3, 557, '1', 'cb', 3, 45),
(378, 3, 556, '1', 'cb', 3, 45),
(379, 3, 391, '10', '10', 4, 1),
(380, 3, 488, '2', '2', 4, 1),
(381, 3, 390, '10', '10', 4, 1),
(382, 3, 392, '2', '2', 4, 1),
(383, 3, 379, '1', 'cb', 4, 1),
(384, 3, 548, '1', 'cb', 36, 1),
(385, 3, 401, '2', '2', 36, 1),
(386, 3, 402, '3', '3', 36, 1),
(387, 3, 549, '1', 'cb', 36, 1),
(388, 3, 405, '1', 'cb', 36, 1),
(389, 3, 406, '1', 'cb', 36, 1),
(390, 3, 407, '1', 'cb', 36, 1),
(391, 3, 410, '1', 'cb', 36, 1),
(392, 3, 403, '1', 'cb', 36, 7),
(393, 3, 404, '1', 'cb', 36, 7),
(394, 3, 409, '2', '2', 36, 17),
(395, 3, 551, '2', '2', 36, 17),
(396, 3, 411, '2', '2', 36, 19),
(397, 3, 412, '2', '2', 36, 19),
(398, 3, 536, '1', 'cb', 36, 32),
(399, 3, 537, '1', 'cb', 36, 32),
(400, 3, 521, '1', 'cb', 36, 32),
(401, 3, 550, '1', 'cb', 36, 32),
(402, 3, 553, '1', 'cb', 36, 44),
(403, 3, 552, '1', 'cb', 36, 44),
(404, 3, 248, '4', '4', 10, 1),
(405, 3, 249, '4', '4', 10, 1),
(406, 3, 250, '1', 'cb', 10, 1),
(407, 3, 251, '1', 'cb', 10, 1),
(408, 3, 254, '2', '2', 10, 1),
(409, 3, 255, '1', 'cb', 10, 1),
(410, 3, 256, '1', 'cb', 10, 1),
(411, 3, 257, '2', '2', 10, 1),
(412, 3, 239, '4', '4', 10, 1),
(413, 3, 429, '2', '2', 10, 1),
(414, 3, 258, '2', '2', 10, 15),
(415, 3, 259, '2', '2', 10, 15),
(416, 3, 241, '2', '2', 10, 14),
(417, 3, 243, '2', '2', 10, 14),
(418, 3, 245, '2', '2', 10, 14),
(419, 3, 247, '2', '2', 10, 14),
(420, 3, 253, '1', 'cb', 10, 34),
(421, 3, 252, '2', '2', 10, 34),
(422, 3, 142, '6', '6', 6, 1),
(423, 3, 143, '2', '2', 6, 1),
(424, 3, 144, '1', 'cb', 6, 1),
(425, 3, 145, '1', 'cb', 6, 1),
(426, 3, 147, '1', 'cb', 6, 1),
(427, 3, 146, '1', 'cb', 6, 1),
(428, 3, 148, '1', 'cb', 6, 1),
(429, 3, 149, '1', 'cb', 6, 1),
(430, 3, 156, '1', 'cb', 6, 1),
(431, 3, 150, '8', '8', 6, 1),
(432, 3, 152, '2', '2', 6, 1),
(433, 3, 151, '4', '4', 6, 1),
(434, 3, 153, '1', 'cb', 6, 1),
(435, 3, 157, '1', 'cb', 6, 1),
(436, 3, 158, '1', 'cb', 6, 1),
(437, 3, 165, '1', 'cb', 6, 10),
(438, 3, 166, '1', 'cb', 6, 10),
(439, 3, 424, '1', 'cb', 6, 31),
(440, 3, 425, '2', '2', 6, 31),
(441, 3, 426, '1', 'cb', 6, 31),
(442, 3, 427, '1', 'cb', 6, 31),
(443, 3, 167, '1', 'cb', 6, 30),
(444, 3, 423, '2', '2', 6, 30),
(445, 3, 159, '1', 'cb', 6, 9),
(446, 3, 160, '1', 'cb', 6, 9),
(447, 3, 91, '1', 'cb', 6, 9),
(448, 3, 85, '4', '4', 6, 9),
(449, 3, 86, '4', '4', 6, 9),
(450, 3, 164, '3', '3', 6, 9),
(451, 3, 544, '1', 'cb', 6, 9),
(452, 3, 194, '0', 'O2', 8, 1),
(453, 3, 195, '0', 'O2', 8, 1),
(454, 3, 196, '0', 'O2', 8, 1),
(455, 3, 198, '0', 'O2', 8, 1),
(456, 3, 200, '1', 'cb', 8, 1),
(457, 3, 197, 'N/A', 'na', 8, 1),
(458, 3, 199, '2', '2', 8, 1),
(459, 3, 205, '10', '10', 8, 24),
(460, 3, 204, '10', '10', 8, 24),
(461, 3, 206, '4', '4', 8, 24),
(462, 3, 207, '5', '5', 8, 24),
(463, 3, 208, '5', '5', 8, 24),
(464, 3, 209, '4', '4', 8, 24),
(465, 3, 210, '4', '4', 8, 24),
(466, 3, 211, '4', '4', 8, 24),
(467, 3, 201, '1', 'cb', 8, 13),
(468, 3, 202, '1', 'cb', 8, 13),
(469, 3, 203, '1', 'cb', 8, 13),
(470, 3, 96, '6', '6', 5, 1),
(471, 3, 98, '10', '10', 5, 1),
(472, 3, 99, '10', '10', 5, 1),
(473, 3, 101, '10', '10', 5, 1),
(474, 3, 115, '2', '2', 5, 1),
(475, 3, 116, '2', '2', 5, 1),
(476, 3, 117, '2', '2', 5, 1),
(477, 3, 118, '1', 'cb', 5, 1),
(478, 3, 102, '1', 'cb', 5, 1),
(479, 3, 41, '10', '10', 5, 1),
(480, 3, 127, '10', '10', 5, 1),
(481, 3, 471, '10', '10', 5, 1),
(482, 3, 84, '10', '10', 5, 1),
(483, 3, 535, '5', '5', 5, 1),
(484, 3, 528, '10', '10', 5, 1),
(485, 3, 529, '10', '10', 5, 1),
(486, 3, 44, '10', '10', 5, 6),
(487, 3, 45, '10', '10', 5, 6),
(488, 3, 46, '10', '10', 5, 6),
(489, 3, 47, '10', '10', 5, 6),
(490, 3, 48, '10', '10', 5, 6),
(491, 3, 49, '10', '10', 5, 6),
(492, 3, 514, '', 'comment', 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Controlled_Medications`
--

DROP TABLE IF EXISTS `Truck1_Controlled_Medications`;
CREATE TABLE IF NOT EXISTS `Truck1_Controlled_Medications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `Truck1_Controlled_Medications`
--

INSERT INTO `Truck1_Controlled_Medications` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 260, 11, 1, 26, 1, '2012-03-12 16:47:21'),
(2, 262, 11, 1, 26, 1, '2012-03-12 16:47:21'),
(3, 263, 11, 1, 26, 1, '2012-03-12 16:47:21'),
(4, 420, 11, 1, 26, 1, '2012-03-12 16:47:21'),
(5, 103, 11, 1, 20, 0, '2012-03-12 16:47:21'),
(6, 265, 11, 29, 26, 1, '2012-03-12 16:47:21'),
(7, 266, 11, 29, 26, 1, '2012-03-12 16:47:21'),
(8, 261, 11, 29, 26, 1, '2012-03-12 16:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Controlled_Medications_checksheet`
--

DROP TABLE IF EXISTS `Truck1_Controlled_Medications_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck1_Controlled_Medications_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `Truck1_Controlled_Medications_checksheet`
--

INSERT INTO `Truck1_Controlled_Medications_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 260, 'N/A', 'na', 11, 1),
(2, 1, 262, 'N/A', 'na', 11, 1),
(3, 1, 263, 'N/A', 'na', 11, 1),
(4, 1, 420, 'N/A', 'na', 11, 1),
(5, 1, 103, '1', 'cb', 11, 1),
(6, 1, 265, 'N/A', 'na', 11, 29),
(7, 1, 266, 'N/A', 'na', 11, 29),
(8, 1, 261, 'N/A', 'na', 11, 29),
(9, 2, 260, 'N/A', 'na', 11, 1),
(10, 2, 262, 'N/A', 'na', 11, 1),
(11, 2, 263, 'N/A', 'na', 11, 1),
(12, 2, 420, 'N/A', 'na', 11, 1),
(13, 2, 103, '1', 'cb', 11, 1),
(14, 2, 265, 'N/A', 'na', 11, 29),
(15, 2, 266, 'N/A', 'na', 11, 29),
(16, 2, 261, 'N/A', 'na', 11, 29),
(17, 3, 260, 'N/A', 'na', 11, 1),
(18, 3, 262, 'N/A', 'na', 11, 1),
(19, 3, 263, 'N/A', 'na', 11, 1),
(20, 3, 420, 'N/A', 'na', 11, 1),
(21, 3, 103, '1', 'cb', 11, 1),
(22, 3, 265, 'N/A', 'na', 11, 29),
(23, 3, 266, 'N/A', 'na', 11, 29),
(24, 3, 261, 'N/A', 'na', 11, 29);

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Controlled_Medications_events`
--

DROP TABLE IF EXISTS `Truck1_Controlled_Medications_events`;
CREATE TABLE IF NOT EXISTS `Truck1_Controlled_Medications_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Truck1_Controlled_Medications_events`
--

INSERT INTO `Truck1_Controlled_Medications_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-11-25 18:47:49', 1, 1, 1),
(2, '2015-08-04 21:09:41', 1, 1, 2),
(3, '2015-08-15 17:06:50', NULL, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Drug_Box`
--

DROP TABLE IF EXISTS `Truck1_Drug_Box`;
CREATE TABLE IF NOT EXISTS `Truck1_Drug_Box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `Truck1_Drug_Box`
--

INSERT INTO `Truck1_Drug_Box` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 52, 28, 1, 10, 0, '2012-03-12 16:47:27'),
(2, 53, 28, 1, 4, 0, '2012-03-12 16:47:27'),
(3, 54, 28, 1, 2, 0, '2012-03-12 16:47:27'),
(4, 55, 28, 1, 4, 0, '2012-03-12 16:47:27'),
(5, 56, 28, 1, 20, 0, '2012-03-12 16:47:27'),
(6, 57, 28, 1, 20, 0, '2012-03-12 16:47:27'),
(7, 58, 28, 1, 20, 0, '2012-03-12 16:47:27'),
(69, 92, 28, 1, 1, 0, '2012-04-22 15:34:50'),
(9, 93, 28, 1, 2, 0, '2012-03-12 16:47:27'),
(10, 94, 28, 1, 20, 0, '2012-03-12 16:47:27'),
(11, 95, 28, 1, 20, 0, '2012-03-12 16:47:27'),
(12, 97, 28, 1, 20, 0, '2012-03-12 16:47:27'),
(14, 60, 28, 1, 6, 0, '2012-03-12 16:47:27'),
(15, 61, 28, 1, 4, 0, '2012-03-12 16:47:27'),
(16, 62, 28, 1, 2, 0, '2012-03-12 16:47:27'),
(17, 63, 28, 1, 2, 0, '2012-03-12 16:47:27'),
(19, 66, 28, 1, 5, 0, '2012-03-12 16:47:27'),
(20, 67, 28, 1, 1, 0, '2012-03-12 16:47:27'),
(21, 68, 28, 1, 2, 0, '2012-03-12 16:47:27'),
(22, 69, 28, 1, 20, 0, '2012-03-12 16:47:27'),
(25, 72, 28, 1, 20, 0, '2012-03-12 16:47:27'),
(26, 73, 28, 1, 1, 0, '2012-03-12 16:47:27'),
(67, 74, 28, 1, 6, 0, '2012-04-22 15:34:06'),
(66, 101, 28, 32, 2, 0, '2012-04-22 15:32:42'),
(37, 44, 28, 6, 2, 0, '2012-03-12 16:47:27'),
(38, 45, 28, 6, 2, 0, '2012-03-12 16:47:27'),
(39, 46, 28, 6, 2, 0, '2012-03-12 16:47:27'),
(40, 47, 28, 6, 2, 0, '2012-03-12 16:47:27'),
(41, 48, 28, 6, 2, 0, '2012-03-12 16:47:27'),
(42, 49, 28, 6, 2, 0, '2012-03-12 16:47:27'),
(43, 81, 28, 33, 2, 0, '2012-03-12 16:47:27'),
(44, 82, 28, 33, 2, 0, '2012-03-12 16:47:27'),
(45, 41, 28, 33, 2, 0, '2012-03-12 16:47:27'),
(46, 84, 28, 33, 5, 0, '2012-03-12 16:47:27'),
(47, 103, 28, 33, 20, 0, '2012-03-12 16:47:27'),
(48, 65, 28, 33, 2, 0, '2012-03-12 16:47:27'),
(49, 85, 28, 32, 10, 0, '2012-03-12 16:47:27'),
(50, 86, 28, 32, 10, 0, '2012-03-12 16:47:27'),
(51, 87, 28, 32, 2, 0, '2012-03-12 16:47:27'),
(52, 88, 28, 32, 2, 0, '2012-03-12 16:47:27'),
(53, 89, 28, 32, 2, 0, '2012-03-12 16:47:27'),
(54, 90, 28, 32, 2, 0, '2012-03-12 16:47:27'),
(55, 91, 28, 32, 10, 0, '2012-03-12 16:47:27'),
(56, 96, 28, 32, 20, 0, '2012-03-12 16:47:27'),
(57, 98, 28, 32, 20, 0, '2012-03-12 16:47:27'),
(58, 99, 28, 32, 20, 0, '2012-03-12 16:47:27'),
(65, 64, 28, 1, 2, 0, '2012-04-22 15:32:42'),
(60, 102, 28, 32, 1, 0, '2012-03-12 16:47:27'),
(61, 59, 28, 32, 20, 0, '2012-03-12 16:47:27'),
(63, 508, 28, 1, 2, 0, '2012-03-12 16:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Drug_Box_checksheet`
--

DROP TABLE IF EXISTS `Truck1_Drug_Box_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck1_Drug_Box_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=151 ;

--
-- Dumping data for table `Truck1_Drug_Box_checksheet`
--

INSERT INTO `Truck1_Drug_Box_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 52, '10', '10', 28, 1),
(2, 1, 53, '4', '4', 28, 1),
(3, 1, 54, '2', '2', 28, 1),
(4, 1, 55, '4', '4', 28, 1),
(5, 1, 56, '1', 'cb', 28, 1),
(6, 1, 57, '1', 'cb', 28, 1),
(7, 1, 58, '1', 'cb', 28, 1),
(8, 1, 92, '1', '1', 28, 1),
(9, 1, 93, '2', '2', 28, 1),
(10, 1, 94, '1', 'cb', 28, 1),
(11, 1, 95, '1', 'cb', 28, 1),
(12, 1, 97, '1', 'cb', 28, 1),
(13, 1, 60, '6', '6', 28, 1),
(14, 1, 61, '4', '4', 28, 1),
(15, 1, 62, '2', '2', 28, 1),
(16, 1, 63, '2', '2', 28, 1),
(17, 1, 66, '5', '5', 28, 1),
(18, 1, 67, '1', '1', 28, 1),
(19, 1, 68, '2', '2', 28, 1),
(20, 1, 69, '1', 'cb', 28, 1),
(21, 1, 72, '1', 'cb', 28, 1),
(22, 1, 73, '1', '1', 28, 1),
(23, 1, 74, '6', '6', 28, 1),
(24, 1, 64, '2', '2', 28, 1),
(25, 1, 508, '2', '2', 28, 1),
(26, 1, 101, '2', '2', 28, 32),
(27, 1, 85, '10', '10', 28, 32),
(28, 1, 86, '10', '10', 28, 32),
(29, 1, 87, '2', '2', 28, 32),
(30, 1, 88, '2', '2', 28, 32),
(31, 1, 89, '2', '2', 28, 32),
(32, 1, 90, '2', '2', 28, 32),
(33, 1, 91, '10', '10', 28, 32),
(34, 1, 96, '1', 'cb', 28, 32),
(35, 1, 98, '1', 'cb', 28, 32),
(36, 1, 99, '1', 'cb', 28, 32),
(37, 1, 102, '1', '1', 28, 32),
(38, 1, 59, '1', 'cb', 28, 32),
(39, 1, 44, '2', '2', 28, 6),
(40, 1, 45, '2', '2', 28, 6),
(41, 1, 46, '2', '2', 28, 6),
(42, 1, 47, '2', '2', 28, 6),
(43, 1, 48, '2', '2', 28, 6),
(44, 1, 49, '2', '2', 28, 6),
(45, 1, 81, '2', '2', 28, 33),
(46, 1, 82, '2', '2', 28, 33),
(47, 1, 41, '2', '2', 28, 33),
(48, 1, 84, '5', '5', 28, 33),
(49, 1, 103, '1', 'cb', 28, 33),
(50, 1, 65, '2', '2', 28, 33),
(51, 2, 52, '10', '10', 28, 1),
(52, 2, 53, '4', '4', 28, 1),
(53, 2, 54, '2', '2', 28, 1),
(54, 2, 55, '4', '4', 28, 1),
(55, 2, 56, '1', 'cb', 28, 1),
(56, 2, 57, '1', 'cb', 28, 1),
(57, 2, 58, '1', 'cb', 28, 1),
(58, 2, 92, '1', '1', 28, 1),
(59, 2, 93, '2', '2', 28, 1),
(60, 2, 94, '1', 'cb', 28, 1),
(61, 2, 95, '1', 'cb', 28, 1),
(62, 2, 97, '1', 'cb', 28, 1),
(63, 2, 60, '6', '6', 28, 1),
(64, 2, 61, '4', '4', 28, 1),
(65, 2, 62, '2', '2', 28, 1),
(66, 2, 63, '2', '2', 28, 1),
(67, 2, 66, '5', '5', 28, 1),
(68, 2, 67, '1', '1', 28, 1),
(69, 2, 68, '2', '2', 28, 1),
(70, 2, 69, '1', 'cb', 28, 1),
(71, 2, 72, '1', 'cb', 28, 1),
(72, 2, 73, '1', '1', 28, 1),
(73, 2, 74, '6', '6', 28, 1),
(74, 2, 64, '2', '2', 28, 1),
(75, 2, 508, '2', '2', 28, 1),
(76, 2, 101, '2', '2', 28, 32),
(77, 2, 85, '10', '10', 28, 32),
(78, 2, 86, '10', '10', 28, 32),
(79, 2, 87, '2', '2', 28, 32),
(80, 2, 88, '2', '2', 28, 32),
(81, 2, 89, '2', '2', 28, 32),
(82, 2, 90, '2', '2', 28, 32),
(83, 2, 91, '10', '10', 28, 32),
(84, 2, 96, '1', 'cb', 28, 32),
(85, 2, 98, '1', 'cb', 28, 32),
(86, 2, 99, '1', 'cb', 28, 32),
(87, 2, 102, '1', '1', 28, 32),
(88, 2, 59, '1', 'cb', 28, 32),
(89, 2, 44, '2', '2', 28, 6),
(90, 2, 45, '2', '2', 28, 6),
(91, 2, 46, '2', '2', 28, 6),
(92, 2, 47, '2', '2', 28, 6),
(93, 2, 48, '2', '2', 28, 6),
(94, 2, 49, '2', '2', 28, 6),
(95, 2, 81, '2', '2', 28, 33),
(96, 2, 82, '2', '2', 28, 33),
(97, 2, 41, '2', '2', 28, 33),
(98, 2, 84, '5', '5', 28, 33),
(99, 2, 103, '1', 'cb', 28, 33),
(100, 2, 65, '2', '2', 28, 33),
(101, 3, 52, '10', '10', 28, 1),
(102, 3, 53, '4', '4', 28, 1),
(103, 3, 54, '2', '2', 28, 1),
(104, 3, 55, '4', '4', 28, 1),
(105, 3, 56, '1', 'cb', 28, 1),
(106, 3, 57, '1', 'cb', 28, 1),
(107, 3, 58, '1', 'cb', 28, 1),
(108, 3, 92, '1', '1', 28, 1),
(109, 3, 93, '2', '2', 28, 1),
(110, 3, 94, '1', 'cb', 28, 1),
(111, 3, 95, '1', 'cb', 28, 1),
(112, 3, 97, '1', 'cb', 28, 1),
(113, 3, 60, '6', '6', 28, 1),
(114, 3, 61, '4', '4', 28, 1),
(115, 3, 62, '2', '2', 28, 1),
(116, 3, 63, '2', '2', 28, 1),
(117, 3, 66, '5', '5', 28, 1),
(118, 3, 67, '1', '1', 28, 1),
(119, 3, 68, '2', '2', 28, 1),
(120, 3, 69, '1', 'cb', 28, 1),
(121, 3, 72, '1', 'cb', 28, 1),
(122, 3, 73, '1', '1', 28, 1),
(123, 3, 74, '6', '6', 28, 1),
(124, 3, 64, '2', '2', 28, 1),
(125, 3, 508, '2', '2', 28, 1),
(126, 3, 101, '2', '2', 28, 32),
(127, 3, 85, '10', '10', 28, 32),
(128, 3, 86, '10', '10', 28, 32),
(129, 3, 87, '2', '2', 28, 32),
(130, 3, 88, '2', '2', 28, 32),
(131, 3, 89, '2', '2', 28, 32),
(132, 3, 90, '2', '2', 28, 32),
(133, 3, 91, '10', '10', 28, 32),
(134, 3, 96, '1', 'cb', 28, 32),
(135, 3, 98, '1', 'cb', 28, 32),
(136, 3, 99, '1', 'cb', 28, 32),
(137, 3, 102, '1', '1', 28, 32),
(138, 3, 59, '1', 'cb', 28, 32),
(139, 3, 44, '2', '2', 28, 6),
(140, 3, 45, '2', '2', 28, 6),
(141, 3, 46, '2', '2', 28, 6),
(142, 3, 47, '2', '2', 28, 6),
(143, 3, 48, '2', '2', 28, 6),
(144, 3, 49, '2', '2', 28, 6),
(145, 3, 81, '2', '2', 28, 33),
(146, 3, 82, '2', '2', 28, 33),
(147, 3, 41, '2', '2', 28, 33),
(148, 3, 84, '5', '5', 28, 33),
(149, 3, 103, '1', 'cb', 28, 33),
(150, 3, 65, '2', '2', 28, 33);

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Drug_Box_events`
--

DROP TABLE IF EXISTS `Truck1_Drug_Box_events`;
CREATE TABLE IF NOT EXISTS `Truck1_Drug_Box_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Truck1_Drug_Box_events`
--

INSERT INTO `Truck1_Drug_Box_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-11-25 18:47:49', 1, 1, 1),
(2, '2015-08-04 21:09:41', 1, 1, 2),
(3, '2015-08-15 17:06:50', NULL, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_ETT_Pack`
--

DROP TABLE IF EXISTS `Truck1_ETT_Pack`;
CREATE TABLE IF NOT EXISTS `Truck1_ETT_Pack` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `Truck1_ETT_Pack`
--

INSERT INTO `Truck1_ETT_Pack` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 39, 38, 1, 20, 0, '2012-03-12 16:47:21'),
(2, 484, 38, 1, 6, 0, '2012-03-12 16:47:21'),
(7, 42, 38, 1, 20, 0, '2012-03-12 16:47:21'),
(5, 43, 38, 1, 20, 0, '2012-03-12 16:47:21'),
(8, 13, 38, 25, 20, 0, '2012-03-12 16:47:21'),
(9, 14, 38, 25, 20, 0, '2012-03-12 16:47:21'),
(10, 16, 38, 25, 20, 0, '2012-03-12 16:47:21'),
(11, 15, 38, 25, 20, 0, '2012-03-12 16:47:21'),
(12, 17, 38, 25, 20, 0, '2012-03-12 16:47:21'),
(13, 18, 38, 3, 2, 0, '2012-03-12 16:47:21'),
(14, 19, 38, 3, 2, 0, '2012-03-12 16:47:21'),
(15, 20, 38, 3, 2, 0, '2012-03-12 16:47:21'),
(16, 21, 38, 3, 2, 0, '2012-03-12 16:47:21'),
(17, 23, 38, 3, 2, 0, '2012-03-12 16:47:21'),
(18, 24, 38, 3, 2, 0, '2012-03-12 16:47:21'),
(19, 25, 38, 3, 2, 0, '2012-03-12 16:47:21'),
(20, 558, 38, 1, 2, 0, '2012-07-25 19:14:48'),
(21, 22, 38, 3, 2, 0, '2012-07-25 19:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_ETT_Pack_checksheet`
--

DROP TABLE IF EXISTS `Truck1_ETT_Pack_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck1_ETT_Pack_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `Truck1_ETT_Pack_checksheet`
--

INSERT INTO `Truck1_ETT_Pack_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 39, '1', 'cb', 38, 1),
(2, 1, 484, '6', '6', 38, 1),
(3, 1, 42, '1', 'cb', 38, 1),
(4, 1, 43, '1', 'cb', 38, 1),
(5, 1, 12, '1', 'cb', 38, 1),
(6, 1, 558, '2', '2', 38, 1),
(7, 1, 13, '1', 'cb', 38, 25),
(8, 1, 14, '1', 'cb', 38, 25),
(9, 1, 16, '1', 'cb', 38, 25),
(10, 1, 15, '1', 'cb', 38, 25),
(11, 1, 17, '1', 'cb', 38, 25),
(12, 1, 18, '2', '2', 38, 3),
(13, 1, 19, '2', '2', 38, 3),
(14, 1, 20, '2', '2', 38, 3),
(15, 1, 21, '2', '2', 38, 3),
(16, 1, 23, '2', '2', 38, 3),
(17, 1, 24, '2', '2', 38, 3),
(18, 1, 25, '2', '2', 38, 3),
(19, 1, 22, '2', '2', 38, 3),
(20, 2, 39, '1', 'cb', 38, 1),
(21, 2, 484, '6', '6', 38, 1),
(22, 2, 42, '1', 'cb', 38, 1),
(23, 2, 43, '1', 'cb', 38, 1),
(24, 2, 12, '1', 'cb', 38, 1),
(25, 2, 558, '2', '2', 38, 1),
(26, 2, 13, '1', 'cb', 38, 25),
(27, 2, 14, '1', 'cb', 38, 25),
(28, 2, 16, '1', 'cb', 38, 25),
(29, 2, 15, '1', 'cb', 38, 25),
(30, 2, 17, '1', 'cb', 38, 25),
(31, 2, 18, '2', '2', 38, 3),
(32, 2, 19, '2', '2', 38, 3),
(33, 2, 20, '2', '2', 38, 3),
(34, 2, 21, '2', '2', 38, 3),
(35, 2, 23, '2', '2', 38, 3),
(36, 2, 24, '2', '2', 38, 3),
(37, 2, 25, '2', '2', 38, 3),
(38, 2, 22, '2', '2', 38, 3),
(39, 3, 39, '1', 'cb', 38, 1),
(40, 3, 484, '6', '6', 38, 1),
(41, 3, 42, '1', 'cb', 38, 1),
(42, 3, 43, '1', 'cb', 38, 1),
(43, 3, 12, '1', 'cb', 38, 1),
(44, 3, 558, '2', '2', 38, 1),
(45, 3, 13, '1', 'cb', 38, 25),
(46, 3, 14, '1', 'cb', 38, 25),
(47, 3, 16, '1', 'cb', 38, 25),
(48, 3, 15, '1', 'cb', 38, 25),
(49, 3, 17, '1', 'cb', 38, 25),
(50, 3, 18, '2', '2', 38, 3),
(51, 3, 19, '2', '2', 38, 3),
(52, 3, 20, '2', '2', 38, 3),
(53, 3, 21, '2', '2', 38, 3),
(54, 3, 23, '2', '2', 38, 3),
(55, 3, 24, '2', '2', 38, 3),
(56, 3, 25, '2', '2', 38, 3),
(57, 3, 22, '2', '2', 38, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_ETT_Pack_events`
--

DROP TABLE IF EXISTS `Truck1_ETT_Pack_events`;
CREATE TABLE IF NOT EXISTS `Truck1_ETT_Pack_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Truck1_ETT_Pack_events`
--

INSERT INTO `Truck1_ETT_Pack_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-11-25 18:47:49', 1, 1, 1),
(2, '2015-08-04 21:09:41', 1, 1, 2),
(3, '2015-08-15 17:06:50', NULL, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_events`
--

DROP TABLE IF EXISTS `Truck1_events`;
CREATE TABLE IF NOT EXISTS `Truck1_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Truck1_events`
--

INSERT INTO `Truck1_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-11-25 18:47:49', 1, 0, 0),
(2, '2015-08-04 21:09:41', 1, 0, 0),
(3, '2015-08-15 17:06:49', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_EZ_IO`
--

DROP TABLE IF EXISTS `Truck1_EZ_IO`;
CREATE TABLE IF NOT EXISTS `Truck1_EZ_IO` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `Truck1_EZ_IO`
--

INSERT INTO `Truck1_EZ_IO` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 509, 37, 1, 20, 0, '2012-03-12 16:47:21'),
(2, 118, 37, 1, 20, 0, '2012-03-12 16:47:21'),
(3, 55, 37, 1, 20, 0, '2012-03-12 16:47:21'),
(4, 41, 37, 1, 20, 0, '2012-03-12 16:47:21'),
(5, 127, 37, 1, 20, 0, '2012-03-12 16:47:21'),
(6, 513, 37, 1, 2, 0, '2012-03-12 16:47:21'),
(7, 510, 37, 6, 2, 0, '2012-03-12 16:47:21'),
(8, 511, 37, 6, 2, 0, '2012-03-12 16:47:21'),
(9, 512, 37, 6, 2, 0, '2012-03-12 16:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_EZ_IO_checksheet`
--

DROP TABLE IF EXISTS `Truck1_EZ_IO_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck1_EZ_IO_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `Truck1_EZ_IO_checksheet`
--

INSERT INTO `Truck1_EZ_IO_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 509, '1', 'cb', 37, 1),
(2, 1, 118, '1', 'cb', 37, 1),
(3, 1, 55, '1', 'cb', 37, 1),
(4, 1, 41, '1', 'cb', 37, 1),
(5, 1, 127, '1', 'cb', 37, 1),
(6, 1, 513, '2', '2', 37, 1),
(7, 1, 510, '2', '2', 37, 6),
(8, 1, 511, '2', '2', 37, 6),
(9, 1, 512, '2', '2', 37, 6),
(10, 2, 509, '1', 'cb', 37, 1),
(11, 2, 118, '1', 'cb', 37, 1),
(12, 2, 55, '1', 'cb', 37, 1),
(13, 2, 41, '1', 'cb', 37, 1),
(14, 2, 127, '1', 'cb', 37, 1),
(15, 2, 513, '2', '2', 37, 1),
(16, 2, 510, '2', '2', 37, 6),
(17, 2, 511, '2', '2', 37, 6),
(18, 2, 512, '2', '2', 37, 6),
(19, 3, 509, '1', 'cb', 37, 1),
(20, 3, 118, '1', 'cb', 37, 1),
(21, 3, 55, '1', 'cb', 37, 1),
(22, 3, 41, '1', 'cb', 37, 1),
(23, 3, 127, '1', 'cb', 37, 1),
(24, 3, 513, '2', '2', 37, 1),
(25, 3, 510, '2', '2', 37, 6),
(26, 3, 511, '2', '2', 37, 6),
(27, 3, 512, '2', '2', 37, 6);

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_EZ_IO_events`
--

DROP TABLE IF EXISTS `Truck1_EZ_IO_events`;
CREATE TABLE IF NOT EXISTS `Truck1_EZ_IO_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Truck1_EZ_IO_events`
--

INSERT INTO `Truck1_EZ_IO_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-11-25 18:47:49', 1, 1, 1),
(2, '2015-08-04 21:09:41', 1, 1, 2),
(3, '2015-08-15 17:06:50', NULL, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_OB`
--

DROP TABLE IF EXISTS `Truck1_OB`;
CREATE TABLE IF NOT EXISTS `Truck1_OB` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `Truck1_OB`
--

INSERT INTO `Truck1_OB` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(6, 481, 35, 1, 2, 0, '2012-03-12 16:47:21'),
(2, 155, 35, 1, 2, 0, '2012-03-12 16:47:21'),
(3, 477, 35, 1, 20, 0, '2012-03-12 16:47:21'),
(4, 478, 35, 1, 2, 0, '2012-03-12 16:47:21'),
(5, 474, 35, 1, 2, 0, '2012-03-12 16:47:21'),
(7, 475, 35, 1, 2, 0, '2012-03-12 16:47:21'),
(8, 154, 35, 1, 2, 0, '2012-03-12 16:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_OB_checksheet`
--

DROP TABLE IF EXISTS `Truck1_OB_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck1_OB_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `Truck1_OB_checksheet`
--

INSERT INTO `Truck1_OB_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 481, '2', '2', 35, 1),
(2, 1, 155, '2', '2', 35, 1),
(3, 1, 477, '1', 'cb', 35, 1),
(4, 1, 478, '2', '2', 35, 1),
(5, 1, 474, '2', '2', 35, 1),
(6, 1, 475, '2', '2', 35, 1),
(7, 1, 154, '2', '2', 35, 1),
(8, 2, 481, '2', '2', 35, 1),
(9, 2, 155, '2', '2', 35, 1),
(10, 2, 477, '1', 'cb', 35, 1),
(11, 2, 478, '2', '2', 35, 1),
(12, 2, 474, '2', '2', 35, 1),
(13, 2, 475, '2', '2', 35, 1),
(14, 2, 154, '2', '2', 35, 1),
(15, 3, 481, '2', '2', 35, 1),
(16, 3, 155, '2', '2', 35, 1),
(17, 3, 477, '1', 'cb', 35, 1),
(18, 3, 478, '2', '2', 35, 1),
(19, 3, 474, '2', '2', 35, 1),
(20, 3, 475, '2', '2', 35, 1),
(21, 3, 154, '2', '2', 35, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_OB_events`
--

DROP TABLE IF EXISTS `Truck1_OB_events`;
CREATE TABLE IF NOT EXISTS `Truck1_OB_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Truck1_OB_events`
--

INSERT INTO `Truck1_OB_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-11-25 18:47:49', 1, 1, 1),
(2, '2015-08-04 21:09:41', 1, 1, 2),
(3, '2015-08-15 17:06:50', NULL, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Pedi_Box`
--

DROP TABLE IF EXISTS `Truck1_Pedi_Box`;
CREATE TABLE IF NOT EXISTS `Truck1_Pedi_Box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `Truck1_Pedi_Box`
--

INSERT INTO `Truck1_Pedi_Box` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 213, 9, 1, 2, 0, '2012-03-12 16:47:27'),
(2, 214, 9, 1, 2, 0, '2012-03-12 16:47:27'),
(3, 215, 9, 1, 20, 0, '2012-03-12 16:47:27'),
(4, 85, 9, 1, 10, 0, '2012-03-12 16:47:27'),
(5, 42, 9, 1, 20, 0, '2012-03-12 16:47:27'),
(9, 219, 9, 25, 20, 0, '2012-03-12 16:47:27'),
(8, 218, 9, 25, 20, 0, '2012-03-12 16:47:27'),
(10, 220, 9, 25, 20, 0, '2012-03-12 16:47:27'),
(11, 221, 9, 25, 20, 0, '2012-03-12 16:47:27'),
(12, 222, 9, 25, 20, 0, '2012-03-12 16:47:27'),
(13, 223, 9, 25, 20, 0, '2012-03-12 16:47:27'),
(15, 224, 9, 25, 2, 0, '2012-03-12 16:47:27'),
(16, 226, 9, 25, 20, 0, '2012-03-12 16:47:27'),
(17, 212, 9, 1, 20, 0, '2012-03-12 16:47:27'),
(18, 225, 9, 1, 20, 0, '2012-03-12 16:47:27'),
(19, 227, 9, 1, 20, 0, '2012-03-12 16:47:27'),
(20, 228, 9, 1, 20, 0, '2012-03-12 16:47:27'),
(21, 229, 9, 1, 20, 0, '2012-03-12 16:47:27'),
(22, 419, 9, 1, 20, 0, '2012-03-12 16:47:27'),
(23, 230, 9, 3, 2, 0, '2012-03-12 16:47:27'),
(24, 231, 9, 3, 2, 0, '2012-03-12 16:47:27'),
(25, 232, 9, 3, 2, 0, '2012-03-12 16:47:27'),
(26, 233, 9, 3, 2, 0, '2012-03-12 16:47:27'),
(27, 234, 9, 3, 2, 0, '2012-03-12 16:47:27'),
(28, 235, 9, 3, 2, 0, '2012-03-12 16:47:27'),
(30, 236, 9, 3, 2, 0, '2012-03-12 16:47:27'),
(31, 237, 9, 3, 2, 0, '2012-03-12 16:47:27'),
(32, 238, 9, 3, 2, 0, '2012-03-12 16:47:27'),
(33, 54, 9, 1, 20, 0, '2012-04-22 14:55:28'),
(34, 53, 9, 1, 20, 0, '2012-04-22 14:56:18'),
(37, 97, 9, 1, 1, 0, '2012-04-22 15:02:36'),
(36, 64, 9, 1, 20, 0, '2012-04-22 14:59:40'),
(38, 507, 9, 25, 2, 0, '2012-04-22 15:08:22'),
(39, 52, 9, 1, 20, 0, '2012-04-22 15:19:19'),
(40, 69, 9, 1, 20, 0, '2012-04-22 15:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Pedi_Box_checksheet`
--

DROP TABLE IF EXISTS `Truck1_Pedi_Box_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck1_Pedi_Box_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `Truck1_Pedi_Box_checksheet`
--

INSERT INTO `Truck1_Pedi_Box_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 213, '2', '2', 9, 1),
(2, 1, 214, '2', '2', 9, 1),
(3, 1, 215, '1', 'cb', 9, 1),
(4, 1, 85, '10', '10', 9, 1),
(5, 1, 42, '1', 'cb', 9, 1),
(6, 1, 212, '1', 'cb', 9, 1),
(7, 1, 225, '1', 'cb', 9, 1),
(8, 1, 227, '1', 'cb', 9, 1),
(9, 1, 228, '1', 'cb', 9, 1),
(10, 1, 229, '1', 'cb', 9, 1),
(11, 1, 419, '1', 'cb', 9, 1),
(12, 1, 54, '1', 'cb', 9, 1),
(13, 1, 53, '1', 'cb', 9, 1),
(14, 1, 97, '1', '1', 9, 1),
(15, 1, 64, '1', 'cb', 9, 1),
(16, 1, 52, '1', 'cb', 9, 1),
(17, 1, 69, '1', 'cb', 9, 1),
(18, 1, 219, '1', 'cb', 9, 25),
(19, 1, 218, '1', 'cb', 9, 25),
(20, 1, 220, '1', 'cb', 9, 25),
(21, 1, 221, '1', 'cb', 9, 25),
(22, 1, 222, '1', 'cb', 9, 25),
(23, 1, 223, '1', 'cb', 9, 25),
(24, 1, 224, '2', '2', 9, 25),
(25, 1, 226, '1', 'cb', 9, 25),
(26, 1, 507, '2', '2', 9, 25),
(27, 1, 230, '2', '2', 9, 3),
(28, 1, 231, '2', '2', 9, 3),
(29, 1, 232, '2', '2', 9, 3),
(30, 1, 233, '2', '2', 9, 3),
(31, 1, 234, '2', '2', 9, 3),
(32, 1, 235, '2', '2', 9, 3),
(33, 1, 236, '2', '2', 9, 3),
(34, 1, 237, '2', '2', 9, 3),
(35, 1, 238, '2', '2', 9, 3),
(36, 2, 213, '2', '2', 9, 1),
(37, 2, 214, '2', '2', 9, 1),
(38, 2, 215, '1', 'cb', 9, 1),
(39, 2, 85, '10', '10', 9, 1),
(40, 2, 42, '1', 'cb', 9, 1),
(41, 2, 212, '1', 'cb', 9, 1),
(42, 2, 225, '1', 'cb', 9, 1),
(43, 2, 227, '1', 'cb', 9, 1),
(44, 2, 228, '1', 'cb', 9, 1),
(45, 2, 229, '1', 'cb', 9, 1),
(46, 2, 419, '1', 'cb', 9, 1),
(47, 2, 54, '1', 'cb', 9, 1),
(48, 2, 53, '1', 'cb', 9, 1),
(49, 2, 97, '1', '1', 9, 1),
(50, 2, 64, '1', 'cb', 9, 1),
(51, 2, 52, '1', 'cb', 9, 1),
(52, 2, 69, '1', 'cb', 9, 1),
(53, 2, 219, '1', 'cb', 9, 25),
(54, 2, 218, '1', 'cb', 9, 25),
(55, 2, 220, '1', 'cb', 9, 25),
(56, 2, 221, '1', 'cb', 9, 25),
(57, 2, 222, '1', 'cb', 9, 25),
(58, 2, 223, '1', 'cb', 9, 25),
(59, 2, 224, '2', '2', 9, 25),
(60, 2, 226, '1', 'cb', 9, 25),
(61, 2, 507, '2', '2', 9, 25),
(62, 2, 230, '2', '2', 9, 3),
(63, 2, 231, '2', '2', 9, 3),
(64, 2, 232, '2', '2', 9, 3),
(65, 2, 233, '2', '2', 9, 3),
(66, 2, 234, '2', '2', 9, 3),
(67, 2, 235, '2', '2', 9, 3),
(68, 2, 236, '2', '2', 9, 3),
(69, 2, 237, '2', '2', 9, 3),
(70, 2, 238, '2', '2', 9, 3),
(71, 3, 213, '2', '2', 9, 1),
(72, 3, 214, '2', '2', 9, 1),
(73, 3, 215, '1', 'cb', 9, 1),
(74, 3, 85, '10', '10', 9, 1),
(75, 3, 42, '1', 'cb', 9, 1),
(76, 3, 212, '1', 'cb', 9, 1),
(77, 3, 225, '1', 'cb', 9, 1),
(78, 3, 227, '1', 'cb', 9, 1),
(79, 3, 228, '1', 'cb', 9, 1),
(80, 3, 229, '1', 'cb', 9, 1),
(81, 3, 419, '1', 'cb', 9, 1),
(82, 3, 54, '1', 'cb', 9, 1),
(83, 3, 53, '1', 'cb', 9, 1),
(84, 3, 97, '1', '1', 9, 1),
(85, 3, 64, '1', 'cb', 9, 1),
(86, 3, 52, '1', 'cb', 9, 1),
(87, 3, 69, '1', 'cb', 9, 1),
(88, 3, 219, '1', 'cb', 9, 25),
(89, 3, 218, '1', 'cb', 9, 25),
(90, 3, 220, '1', 'cb', 9, 25),
(91, 3, 221, '1', 'cb', 9, 25),
(92, 3, 222, '1', 'cb', 9, 25),
(93, 3, 223, '1', 'cb', 9, 25),
(94, 3, 224, '2', '2', 9, 25),
(95, 3, 226, '1', 'cb', 9, 25),
(96, 3, 507, '2', '2', 9, 25),
(97, 3, 230, '2', '2', 9, 3),
(98, 3, 231, '2', '2', 9, 3),
(99, 3, 232, '2', '2', 9, 3),
(100, 3, 233, '2', '2', 9, 3),
(101, 3, 234, '2', '2', 9, 3),
(102, 3, 235, '2', '2', 9, 3),
(103, 3, 236, '2', '2', 9, 3),
(104, 3, 237, '2', '2', 9, 3),
(105, 3, 238, '2', '2', 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Pedi_Box_events`
--

DROP TABLE IF EXISTS `Truck1_Pedi_Box_events`;
CREATE TABLE IF NOT EXISTS `Truck1_Pedi_Box_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Truck1_Pedi_Box_events`
--

INSERT INTO `Truck1_Pedi_Box_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-11-25 18:47:49', 1, 1, 1),
(2, '2015-08-04 21:09:41', 1, 1, 2),
(3, '2015-08-15 17:06:50', NULL, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Sealed`
--

DROP TABLE IF EXISTS `Truck1_Sealed`;
CREATE TABLE IF NOT EXISTS `Truck1_Sealed` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `Truck1_Sealed`
--

INSERT INTO `Truck1_Sealed` (`id`, `item_id`, `date`) VALUES
(1, 1, '0000-00-00 00:00:00'),
(2, 2, '0000-00-00 00:00:00'),
(3, 3, '0000-00-00 00:00:00'),
(4, 4, '0000-00-00 00:00:00'),
(5, 6, '0000-00-00 00:00:00'),
(6, 7, '0000-00-00 00:00:00'),
(7, 8, '0000-00-00 00:00:00'),
(8, 9, '0000-00-00 00:00:00'),
(9, 41, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Suction`
--

DROP TABLE IF EXISTS `Truck1_Suction`;
CREATE TABLE IF NOT EXISTS `Truck1_Suction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `Truck1_Suction`
--

INSERT INTO `Truck1_Suction` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(21, 275, 13, 1, 6, 0, '2012-03-12 16:47:21'),
(19, 435, 13, 37, 20, 0, '2012-03-12 16:47:21'),
(18, 433, 13, 37, 20, 0, '2012-03-12 16:47:21'),
(17, 431, 13, 37, 20, 0, '2012-03-12 16:47:21'),
(16, 434, 13, 38, 20, 0, '2012-03-12 16:47:21'),
(15, 432, 13, 38, 20, 0, '2012-03-12 16:47:21'),
(14, 430, 13, 38, 20, 0, '2012-03-12 16:47:21'),
(22, 276, 13, 1, 2, 0, '2012-03-12 16:47:21'),
(23, 277, 13, 1, 2, 0, '2012-03-12 16:47:21'),
(24, 278, 13, 1, 2, 0, '2012-03-12 16:47:21'),
(25, 279, 13, 1, 2, 0, '2012-03-12 16:47:21'),
(26, 280, 13, 1, 2, 0, '2012-03-12 16:47:21'),
(27, 281, 13, 1, 2, 0, '2012-03-12 16:47:21'),
(28, 559, 13, 1, 2, 0, '2012-08-03 11:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Suction_checksheet`
--

DROP TABLE IF EXISTS `Truck1_Suction_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck1_Suction_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `Truck1_Suction_checksheet`
--

INSERT INTO `Truck1_Suction_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 275, '6', '6', 13, 1),
(2, 1, 276, '2', '2', 13, 1),
(3, 1, 277, '2', '2', 13, 1),
(4, 1, 278, '2', '2', 13, 1),
(5, 1, 279, '2', '2', 13, 1),
(6, 1, 280, '2', '2', 13, 1),
(7, 1, 281, '2', '2', 13, 1),
(8, 1, 559, '2', '2', 13, 1),
(9, 1, 435, '1', 'cb', 13, 37),
(10, 1, 433, '1', 'cb', 13, 37),
(11, 1, 431, '1', 'cb', 13, 37),
(12, 1, 434, '1', 'cb', 13, 38),
(13, 1, 432, '1', 'cb', 13, 38),
(14, 1, 430, '1', 'cb', 13, 38),
(15, 2, 275, '6', '6', 13, 1),
(16, 2, 276, '2', '2', 13, 1),
(17, 2, 277, '2', '2', 13, 1),
(18, 2, 278, '2', '2', 13, 1),
(19, 2, 279, '2', '2', 13, 1),
(20, 2, 280, '2', '2', 13, 1),
(21, 2, 281, '2', '2', 13, 1),
(22, 2, 559, '2', '2', 13, 1),
(23, 2, 435, '1', 'cb', 13, 37),
(24, 2, 433, '1', 'cb', 13, 37),
(25, 2, 431, '1', 'cb', 13, 37),
(26, 2, 434, '1', 'cb', 13, 38),
(27, 2, 432, '1', 'cb', 13, 38),
(28, 2, 430, '1', 'cb', 13, 38),
(29, 3, 275, '6', '6', 13, 1),
(30, 3, 276, '2', '2', 13, 1),
(31, 3, 277, '2', '2', 13, 1),
(32, 3, 278, '2', '2', 13, 1),
(33, 3, 279, '2', '2', 13, 1),
(34, 3, 280, '2', '2', 13, 1),
(35, 3, 281, '2', '2', 13, 1),
(36, 3, 559, '2', '2', 13, 1),
(37, 3, 435, '1', 'cb', 13, 37),
(38, 3, 433, '1', 'cb', 13, 37),
(39, 3, 431, '1', 'cb', 13, 37),
(40, 3, 434, '1', 'cb', 13, 38),
(41, 3, 432, '1', 'cb', 13, 38),
(42, 3, 430, '1', 'cb', 13, 38);

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Suction_events`
--

DROP TABLE IF EXISTS `Truck1_Suction_events`;
CREATE TABLE IF NOT EXISTS `Truck1_Suction_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Truck1_Suction_events`
--

INSERT INTO `Truck1_Suction_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-11-25 18:47:49', 1, 1, 1),
(2, '2015-08-04 21:09:41', 1, 1, 2),
(3, '2015-08-15 17:06:50', NULL, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Toughbook`
--

DROP TABLE IF EXISTS `Truck1_Toughbook`;
CREATE TABLE IF NOT EXISTS `Truck1_Toughbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Truck1_Toughbook`
--

INSERT INTO `Truck1_Toughbook` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 240, 30, 1, 20, 0, '2012-03-12 16:47:27'),
(2, 242, 30, 1, 20, 0, '2012-03-12 16:47:27'),
(3, 244, 30, 28, 20, 0, '2012-03-12 16:47:27'),
(4, 421, 30, 28, 20, 0, '2012-03-12 16:47:27'),
(5, 422, 30, 28, 20, 0, '2012-03-12 16:47:27'),
(6, 470, 30, 28, 20, 0, '2012-03-12 16:47:27'),
(7, 246, 30, 28, 20, 0, '2012-03-12 16:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Toughbook_checksheet`
--

DROP TABLE IF EXISTS `Truck1_Toughbook_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck1_Toughbook_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `Truck1_Toughbook_checksheet`
--

INSERT INTO `Truck1_Toughbook_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 240, '1', 'cb', 30, 1),
(2, 1, 242, '1', 'cb', 30, 1),
(3, 1, 244, '1', 'cb', 30, 28),
(4, 1, 421, '1', 'cb', 30, 28),
(5, 1, 422, '1', 'cb', 30, 28),
(6, 1, 470, '1', 'cb', 30, 28),
(7, 1, 246, '1', 'cb', 30, 28),
(8, 2, 240, '1', 'cb', 30, 1),
(9, 2, 242, '1', 'cb', 30, 1),
(10, 2, 244, '1', 'cb', 30, 28),
(11, 2, 421, '1', 'cb', 30, 28),
(12, 2, 422, '1', 'cb', 30, 28),
(13, 2, 470, '1', 'cb', 30, 28),
(14, 2, 246, '1', 'cb', 30, 28),
(15, 3, 240, '1', 'cb', 30, 1),
(16, 3, 242, '1', 'cb', 30, 1),
(17, 3, 244, '1', 'cb', 30, 28),
(18, 3, 421, '1', 'cb', 30, 28),
(19, 3, 422, '1', 'cb', 30, 28),
(20, 3, 470, '1', 'cb', 30, 28),
(21, 3, 246, '1', 'cb', 30, 28);

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Toughbook_events`
--

DROP TABLE IF EXISTS `Truck1_Toughbook_events`;
CREATE TABLE IF NOT EXISTS `Truck1_Toughbook_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Truck1_Toughbook_events`
--

INSERT INTO `Truck1_Toughbook_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-11-25 18:47:49', 1, 1, 1),
(2, '2015-08-04 21:09:41', 1, 1, 2),
(3, '2015-08-15 17:06:50', NULL, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Trauma_Box`
--

DROP TABLE IF EXISTS `Truck1_Trauma_Box`;
CREATE TABLE IF NOT EXISTS `Truck1_Trauma_Box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `Truck1_Trauma_Box`
--

INSERT INTO `Truck1_Trauma_Box` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 42, 15, 39, 2, 0, '2012-03-12 16:47:27'),
(2, 306, 15, 39, 2, 0, '2012-03-12 16:47:27'),
(3, 86, 15, 39, 20, 0, '2012-03-12 16:47:27'),
(4, 297, 15, 39, 2, 0, '2012-03-12 16:47:27'),
(5, 315, 15, 39, 20, 0, '2012-03-12 16:47:27'),
(6, 300, 15, 39, 2, 0, '2012-03-12 16:47:27'),
(7, 295, 15, 39, 2, 0, '2012-03-12 16:47:27'),
(8, 298, 15, 39, 9, 0, '2012-03-12 16:47:27'),
(9, 301, 15, 39, 6, 0, '2012-03-12 16:47:27'),
(10, 307, 15, 1, 20, 0, '2012-03-12 16:47:27'),
(11, 308, 15, 1, 20, 0, '2012-03-12 16:47:27'),
(12, 149, 15, 1, 20, 0, '2012-03-12 16:47:27'),
(13, 310, 15, 1, 20, 0, '2012-03-12 16:47:27'),
(14, 51, 15, 1, 5, 0, '2012-03-12 16:47:27'),
(15, 85, 15, 40, 20, 0, '2012-03-12 16:47:27'),
(17, 96, 15, 40, 20, 0, '2012-03-12 16:47:27'),
(18, 98, 15, 40, 20, 0, '2012-03-12 16:47:27'),
(19, 101, 15, 40, 20, 0, '2012-03-12 16:47:27'),
(21, 116, 15, 40, 20, 0, '2012-03-12 16:47:27'),
(22, 118, 15, 40, 20, 0, '2012-03-12 16:47:27'),
(23, 44, 15, 6, 5, 0, '2012-03-12 16:47:27'),
(24, 45, 15, 6, 5, 0, '2012-03-12 16:47:27'),
(25, 46, 15, 6, 5, 0, '2012-03-12 16:47:27'),
(26, 47, 15, 6, 5, 0, '2012-03-12 16:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Trauma_Box_checksheet`
--

DROP TABLE IF EXISTS `Truck1_Trauma_Box_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck1_Trauma_Box_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `Truck1_Trauma_Box_checksheet`
--

INSERT INTO `Truck1_Trauma_Box_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 42, '2', '2', 15, 39),
(2, 1, 306, '2', '2', 15, 39),
(3, 1, 86, '1', 'cb', 15, 39),
(4, 1, 297, '2', '2', 15, 39),
(5, 1, 315, '1', 'cb', 15, 39),
(6, 1, 300, '2', '2', 15, 39),
(7, 1, 295, '2', '2', 15, 39),
(8, 1, 298, '9', '9', 15, 39),
(9, 1, 301, '6', '6', 15, 39),
(10, 1, 307, '1', 'cb', 15, 1),
(11, 1, 308, '1', 'cb', 15, 1),
(12, 1, 149, '1', 'cb', 15, 1),
(13, 1, 310, '1', 'cb', 15, 1),
(14, 1, 51, '5', '5', 15, 1),
(15, 1, 85, '1', 'cb', 15, 40),
(16, 1, 96, '1', 'cb', 15, 40),
(17, 1, 98, '1', 'cb', 15, 40),
(18, 1, 101, '1', 'cb', 15, 40),
(19, 1, 116, '1', 'cb', 15, 40),
(20, 1, 118, '1', 'cb', 15, 40),
(21, 1, 44, '5', '5', 15, 6),
(22, 1, 45, '5', '5', 15, 6),
(23, 1, 46, '5', '5', 15, 6),
(24, 1, 47, '5', '5', 15, 6),
(25, 2, 42, '2', '2', 15, 39),
(26, 2, 306, '2', '2', 15, 39),
(27, 2, 86, '1', 'cb', 15, 39),
(28, 2, 297, '2', '2', 15, 39),
(29, 2, 315, '1', 'cb', 15, 39),
(30, 2, 300, '2', '2', 15, 39),
(31, 2, 295, '2', '2', 15, 39),
(32, 2, 298, '9', '9', 15, 39),
(33, 2, 301, '6', '6', 15, 39),
(34, 2, 307, '1', 'cb', 15, 1),
(35, 2, 308, '1', 'cb', 15, 1),
(36, 2, 149, '1', 'cb', 15, 1),
(37, 2, 310, '1', 'cb', 15, 1),
(38, 2, 51, '5', '5', 15, 1),
(39, 2, 85, '1', 'cb', 15, 40),
(40, 2, 96, '1', 'cb', 15, 40),
(41, 2, 98, '1', 'cb', 15, 40),
(42, 2, 101, '1', 'cb', 15, 40),
(43, 2, 116, '1', 'cb', 15, 40),
(44, 2, 118, '1', 'cb', 15, 40),
(45, 2, 44, '5', '5', 15, 6),
(46, 2, 45, '5', '5', 15, 6),
(47, 2, 46, '5', '5', 15, 6),
(48, 2, 47, '5', '5', 15, 6),
(49, 3, 42, '2', '2', 15, 39),
(50, 3, 306, '2', '2', 15, 39),
(51, 3, 86, '1', 'cb', 15, 39),
(52, 3, 297, '2', '2', 15, 39),
(53, 3, 315, '1', 'cb', 15, 39),
(54, 3, 300, '2', '2', 15, 39),
(55, 3, 295, '2', '2', 15, 39),
(56, 3, 298, '9', '9', 15, 39),
(57, 3, 301, '6', '6', 15, 39),
(58, 3, 307, '1', 'cb', 15, 1),
(59, 3, 308, '1', 'cb', 15, 1),
(60, 3, 149, '1', 'cb', 15, 1),
(61, 3, 310, '1', 'cb', 15, 1),
(62, 3, 51, '5', '5', 15, 1),
(63, 3, 85, '1', 'cb', 15, 40),
(64, 3, 96, '1', 'cb', 15, 40),
(65, 3, 98, '1', 'cb', 15, 40),
(66, 3, 101, '1', 'cb', 15, 40),
(67, 3, 116, '1', 'cb', 15, 40),
(68, 3, 118, '1', 'cb', 15, 40),
(69, 3, 44, '5', '5', 15, 6),
(70, 3, 45, '5', '5', 15, 6),
(71, 3, 46, '5', '5', 15, 6),
(72, 3, 47, '5', '5', 15, 6);

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Trauma_Box_events`
--

DROP TABLE IF EXISTS `Truck1_Trauma_Box_events`;
CREATE TABLE IF NOT EXISTS `Truck1_Trauma_Box_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Truck1_Trauma_Box_events`
--

INSERT INTO `Truck1_Trauma_Box_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-11-25 18:47:49', 1, 1, 1),
(2, '2015-08-04 21:09:41', 1, 1, 2),
(3, '2015-08-15 17:06:50', NULL, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Trauma_Supplies`
--

DROP TABLE IF EXISTS `Truck1_Trauma_Supplies`;
CREATE TABLE IF NOT EXISTS `Truck1_Trauma_Supplies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `Truck1_Trauma_Supplies`
--

INSERT INTO `Truck1_Trauma_Supplies` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 290, 14, 1, 20, 0, '2012-03-12 16:47:21'),
(3, 291, 14, 1, 20, 0, '2012-03-12 16:47:21'),
(4, 292, 14, 1, 20, 0, '2012-03-12 16:47:21'),
(5, 293, 14, 1, 20, 0, '2012-03-12 16:47:21'),
(6, 294, 14, 1, 4, 0, '2012-03-12 16:47:21'),
(7, 295, 14, 1, 6, 0, '2012-03-12 16:47:21'),
(8, 296, 14, 1, 20, 0, '2012-03-12 16:47:21'),
(9, 297, 14, 1, 2, 0, '2012-03-12 16:47:21'),
(10, 298, 14, 1, 6, 0, '2012-03-12 16:47:21'),
(11, 299, 14, 1, 4, 0, '2012-03-12 16:47:21'),
(12, 300, 14, 1, 4, 0, '2012-03-12 16:47:21'),
(13, 301, 14, 1, 6, 0, '2012-03-12 16:47:21'),
(15, 303, 14, 1, 2, 0, '2012-03-12 16:47:21'),
(16, 304, 14, 1, 2, 0, '2012-03-12 16:47:21'),
(17, 562, 14, 1, 4, 0, '2014-02-13 17:51:44');

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Trauma_Supplies_checksheet`
--

DROP TABLE IF EXISTS `Truck1_Trauma_Supplies_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck1_Trauma_Supplies_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `Truck1_Trauma_Supplies_checksheet`
--

INSERT INTO `Truck1_Trauma_Supplies_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 290, '1', 'cb', 14, 1),
(2, 1, 291, '1', 'cb', 14, 1),
(3, 1, 292, '1', 'cb', 14, 1),
(4, 1, 293, '1', 'cb', 14, 1),
(5, 1, 294, '4', '4', 14, 1),
(6, 1, 295, '6', '6', 14, 1),
(7, 1, 296, '1', 'cb', 14, 1),
(8, 1, 297, '2', '2', 14, 1),
(9, 1, 298, '6', '6', 14, 1),
(10, 1, 299, '4', '4', 14, 1),
(11, 1, 300, '4', '4', 14, 1),
(12, 1, 301, '6', '6', 14, 1),
(13, 1, 303, '2', '2', 14, 1),
(14, 1, 304, '2', '2', 14, 1),
(15, 1, 562, '4', '4', 14, 1),
(16, 2, 290, '1', 'cb', 14, 1),
(17, 2, 291, '1', 'cb', 14, 1),
(18, 2, 292, '1', 'cb', 14, 1),
(19, 2, 293, '1', 'cb', 14, 1),
(20, 2, 294, '4', '4', 14, 1),
(21, 2, 295, '6', '6', 14, 1),
(22, 2, 296, '1', 'cb', 14, 1),
(23, 2, 297, '2', '2', 14, 1),
(24, 2, 298, '6', '6', 14, 1),
(25, 2, 299, '4', '4', 14, 1),
(26, 2, 300, '4', '4', 14, 1),
(27, 2, 301, '6', '6', 14, 1),
(28, 2, 303, '2', '2', 14, 1),
(29, 2, 304, '2', '2', 14, 1),
(30, 2, 562, '4', '4', 14, 1),
(31, 3, 290, '1', 'cb', 14, 1),
(32, 3, 291, '1', 'cb', 14, 1),
(33, 3, 292, '1', 'cb', 14, 1),
(34, 3, 293, '1', 'cb', 14, 1),
(35, 3, 294, '4', '4', 14, 1),
(36, 3, 295, '6', '6', 14, 1),
(37, 3, 296, '1', 'cb', 14, 1),
(38, 3, 297, '2', '2', 14, 1),
(39, 3, 298, '6', '6', 14, 1),
(40, 3, 299, '4', '4', 14, 1),
(41, 3, 300, '4', '4', 14, 1),
(42, 3, 301, '6', '6', 14, 1),
(43, 3, 303, '2', '2', 14, 1),
(44, 3, 304, '2', '2', 14, 1),
(45, 3, 562, '4', '4', 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Truck1_Trauma_Supplies_events`
--

DROP TABLE IF EXISTS `Truck1_Trauma_Supplies_events`;
CREATE TABLE IF NOT EXISTS `Truck1_Trauma_Supplies_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Truck1_Trauma_Supplies_events`
--

INSERT INTO `Truck1_Trauma_Supplies_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-11-25 18:47:49', 1, 1, 1),
(2, '2015-08-04 21:09:41', 1, 1, 2),
(3, '2015-08-15 17:06:50', NULL, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24`
--

DROP TABLE IF EXISTS `Truck24`;
CREATE TABLE IF NOT EXISTS `Truck24` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `Truck24`
--

INSERT INTO `Truck24` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(2, 1, 3, 1, 21, 1, '2012-03-12 16:47:24'),
(3, 2, 3, 1, 21, 1, '2012-03-12 16:47:24'),
(4, 3, 3, 1, 23, 1, '2012-03-12 16:47:24'),
(5, 4, 3, 1, 24, 1, '2012-03-12 16:47:24'),
(6, 6, 3, 1, 24, 1, '2012-03-12 16:47:24'),
(7, 7, 3, 1, 24, 1, '2012-03-12 16:47:24'),
(8, 175, 3, 1, 2, 0, '2012-03-12 16:47:24'),
(9, 176, 3, 1, 2, 0, '2012-03-12 16:47:24'),
(10, 177, 3, 1, 3, 0, '2012-03-12 16:47:24'),
(11, 178, 3, 1, 20, 0, '2012-03-12 16:47:24'),
(12, 179, 3, 1, 20, 0, '2012-03-12 16:47:24'),
(13, 180, 3, 1, 20, 0, '2012-03-12 16:47:24'),
(14, 8, 3, 2, 22, 1, '2012-03-12 16:47:24'),
(15, 9, 3, 2, 22, 1, '2012-03-12 16:47:24'),
(16, 495, 3, 2, 16, 0, '2012-03-12 16:47:24'),
(17, 104, 3, 20, 20, 0, '2012-03-12 16:47:24'),
(18, 105, 3, 20, 20, 0, '2012-03-12 16:47:24'),
(19, 106, 3, 20, 20, 0, '2012-03-12 16:47:24'),
(20, 107, 3, 20, 20, 0, '2012-03-12 16:47:24'),
(21, 108, 3, 20, 20, 0, '2012-03-12 16:47:24'),
(22, 109, 3, 20, 20, 0, '2012-03-12 16:47:24'),
(23, 130, 3, 21, 20, 0, '2012-03-12 16:47:24'),
(24, 131, 3, 21, 20, 0, '2012-03-12 16:47:24'),
(25, 132, 3, 21, 20, 0, '2012-03-12 16:47:24'),
(26, 133, 3, 21, 20, 0, '2012-03-12 16:47:24'),
(27, 134, 3, 21, 20, 0, '2012-03-12 16:47:24'),
(28, 135, 3, 21, 20, 0, '2012-03-12 16:47:24'),
(29, 136, 3, 21, 20, 0, '2012-03-12 16:47:24'),
(30, 137, 3, 21, 20, 0, '2012-03-12 16:47:24'),
(31, 138, 3, 21, 20, 0, '2012-03-12 16:47:24'),
(32, 139, 3, 21, 20, 0, '2012-03-12 16:47:24'),
(33, 140, 3, 21, 20, 0, '2012-03-12 16:47:24'),
(34, 141, 3, 21, 20, 0, '2012-03-12 16:47:24'),
(35, 283, 3, 22, 19, 0, '2012-03-12 16:47:24'),
(36, 284, 3, 22, 16, 0, '2012-03-12 16:47:24'),
(37, 285, 3, 22, 16, 0, '2012-03-12 16:47:24'),
(38, 286, 3, 22, 16, 0, '2012-03-12 16:47:24'),
(39, 287, 3, 22, 16, 0, '2012-03-12 16:47:24'),
(40, 288, 3, 22, 16, 0, '2012-03-12 16:47:24'),
(41, 289, 3, 22, 16, 0, '2012-03-12 16:47:24'),
(42, 331, 3, 23, 20, 0, '2012-03-12 16:47:24'),
(43, 332, 3, 23, 20, 0, '2012-03-12 16:47:24'),
(44, 333, 3, 23, 20, 0, '2012-03-12 16:47:24'),
(45, 334, 3, 23, 20, 0, '2012-03-12 16:47:24'),
(46, 335, 3, 23, 20, 0, '2012-03-12 16:47:24'),
(47, 336, 3, 23, 20, 0, '2012-03-12 16:47:24'),
(48, 337, 3, 23, 20, 0, '2012-03-12 16:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Airway`
--

DROP TABLE IF EXISTS `Truck24_Airway`;
CREATE TABLE IF NOT EXISTS `Truck24_Airway` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Truck24_Airway`
--

INSERT INTO `Truck24_Airway` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 12, 27, 1, 20, 0, '2012-03-12 16:47:24'),
(2, 27, 27, 1, 20, 0, '2012-03-12 16:47:24'),
(3, 10, 27, 1, 20, 0, '2012-03-12 16:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Airway_checksheet`
--

DROP TABLE IF EXISTS `Truck24_Airway_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck24_Airway_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Truck24_Airway_checksheet`
--

INSERT INTO `Truck24_Airway_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 12, '1', 'cb', 27, 1),
(2, 1, 27, '1', 'cb', 27, 1),
(3, 1, 10, '1', 'cb', 27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Airway_events`
--

DROP TABLE IF EXISTS `Truck24_Airway_events`;
CREATE TABLE IF NOT EXISTS `Truck24_Airway_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Truck24_Airway_events`
--

INSERT INTO `Truck24_Airway_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-03-18 23:46:02', NULL, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_checksheet`
--

DROP TABLE IF EXISTS `Truck24_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck24_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `Truck24_checksheet`
--

INSERT INTO `Truck24_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 1, '', 'miles', 3, 1),
(2, 1, 2, '', 'miles', 3, 1),
(3, 1, 4, '', 'refill', 3, 1),
(4, 1, 6, '', 'refill', 3, 1),
(5, 1, 7, '', 'refill', 3, 1),
(6, 1, 175, '2', '2', 3, 1),
(7, 1, 176, '2', '2', 3, 1),
(8, 1, 177, '3', '3', 3, 1),
(9, 1, 178, '1', 'cb', 3, 1),
(10, 1, 179, '1', 'cb', 3, 1),
(11, 1, 180, '1', 'cb', 3, 1),
(12, 1, 8, '', 'personnel', 3, 2),
(13, 1, 9, '', 'personnel', 3, 2),
(14, 1, 495, '', 'open', 3, 2),
(15, 1, 104, '1', 'cb', 3, 20),
(16, 1, 105, '1', 'cb', 3, 20),
(17, 1, 106, '1', 'cb', 3, 20),
(18, 1, 107, '1', 'cb', 3, 20),
(19, 1, 108, '1', 'cb', 3, 20),
(20, 1, 109, '1', 'cb', 3, 20),
(21, 1, 130, '1', 'cb', 3, 21),
(22, 1, 131, '1', 'cb', 3, 21),
(23, 1, 132, '1', 'cb', 3, 21),
(24, 1, 133, '1', 'cb', 3, 21),
(25, 1, 134, '1', 'cb', 3, 21),
(26, 1, 135, '1', 'cb', 3, 21),
(27, 1, 136, '1', 'cb', 3, 21),
(28, 1, 137, '1', 'cb', 3, 21),
(29, 1, 138, '1', 'cb', 3, 21),
(30, 1, 139, '1', 'cb', 3, 21),
(31, 1, 140, '1', 'cb', 3, 21),
(32, 1, 141, '1', 'cb', 3, 21),
(33, 1, 283, '', 'tire', 3, 22),
(34, 1, 284, '', 'open', 3, 22),
(35, 1, 285, '', 'open', 3, 22),
(36, 1, 286, '', 'open', 3, 22),
(37, 1, 287, '', 'open', 3, 22),
(38, 1, 288, '', 'open', 3, 22),
(39, 1, 289, '', 'open', 3, 22),
(40, 1, 331, '1', 'cb', 3, 23),
(41, 1, 332, '1', 'cb', 3, 23),
(42, 1, 333, '1', 'cb', 3, 23),
(43, 1, 334, '1', 'cb', 3, 23),
(44, 1, 335, '1', 'cb', 3, 23),
(45, 1, 336, '1', 'cb', 3, 23),
(46, 1, 337, '1', 'cb', 3, 23);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Drugs`
--

DROP TABLE IF EXISTS `Truck24_Drugs`;
CREATE TABLE IF NOT EXISTS `Truck24_Drugs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Truck24_Drugs`
--

INSERT INTO `Truck24_Drugs` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(4, 56, 34, 1, 20, 0, '2012-03-12 16:47:24'),
(3, 59, 34, 1, 20, 0, '2012-03-12 16:47:24'),
(5, 61, 34, 1, 4, 0, '2012-03-12 16:47:24'),
(6, 64, 34, 1, 2, 0, '2012-03-12 16:47:24'),
(7, 212, 34, 1, 20, 0, '2012-03-12 16:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Drugs_checksheet`
--

DROP TABLE IF EXISTS `Truck24_Drugs_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck24_Drugs_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Truck24_Drugs_checksheet`
--

INSERT INTO `Truck24_Drugs_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 56, '1', 'cb', 34, 1),
(2, 1, 59, '1', 'cb', 34, 1),
(3, 1, 61, '4', '4', 34, 1),
(4, 1, 64, '2', '2', 34, 1),
(5, 1, 212, '1', 'cb', 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Drugs_events`
--

DROP TABLE IF EXISTS `Truck24_Drugs_events`;
CREATE TABLE IF NOT EXISTS `Truck24_Drugs_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Truck24_Drugs_events`
--

INSERT INTO `Truck24_Drugs_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-03-18 23:46:02', NULL, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_events`
--

DROP TABLE IF EXISTS `Truck24_events`;
CREATE TABLE IF NOT EXISTS `Truck24_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Truck24_events`
--

INSERT INTO `Truck24_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-02-08 11:33:46', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Glucometer`
--

DROP TABLE IF EXISTS `Truck24_Glucometer`;
CREATE TABLE IF NOT EXISTS `Truck24_Glucometer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Truck24_Glucometer`
--

INSERT INTO `Truck24_Glucometer` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 159, 18, 1, 20, 0, '2012-03-12 16:47:24'),
(2, 160, 18, 1, 20, 0, '2012-03-12 16:47:24'),
(3, 91, 18, 1, 20, 0, '2012-03-12 16:47:24'),
(4, 85, 18, 1, 20, 0, '2012-03-12 16:47:24'),
(5, 86, 18, 1, 20, 0, '2012-03-12 16:47:24'),
(6, 164, 18, 1, 20, 0, '2012-03-12 16:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Glucometer_checksheet`
--

DROP TABLE IF EXISTS `Truck24_Glucometer_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck24_Glucometer_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Truck24_Glucometer_checksheet`
--

INSERT INTO `Truck24_Glucometer_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 159, '1', 'cb', 18, 1),
(2, 1, 160, '1', 'cb', 18, 1),
(3, 1, 91, '1', 'cb', 18, 1),
(4, 1, 85, '1', 'cb', 18, 1),
(5, 1, 86, '1', 'cb', 18, 1),
(6, 1, 164, '1', 'cb', 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Glucometer_events`
--

DROP TABLE IF EXISTS `Truck24_Glucometer_events`;
CREATE TABLE IF NOT EXISTS `Truck24_Glucometer_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Truck24_Glucometer_events`
--

INSERT INTO `Truck24_Glucometer_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-03-18 23:46:02', NULL, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Immobilization`
--

DROP TABLE IF EXISTS `Truck24_Immobilization`;
CREATE TABLE IF NOT EXISTS `Truck24_Immobilization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `Truck24_Immobilization`
--

INSERT INTO `Truck24_Immobilization` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 168, 7, 1, 2, 0, '2012-03-12 16:47:24'),
(2, 169, 7, 1, 6, 0, '2012-03-12 16:47:24'),
(3, 170, 7, 1, 2, 0, '2012-03-12 16:47:24'),
(4, 172, 7, 1, 20, 0, '2012-03-12 16:47:24'),
(5, 173, 7, 1, 20, 0, '2012-03-12 16:47:24'),
(6, 174, 7, 1, 20, 0, '2012-03-12 16:47:24'),
(7, 181, 7, 1, 4, 0, '2012-03-12 16:47:24'),
(8, 184, 7, 1, 2, 0, '2012-03-12 16:47:24'),
(9, 186, 7, 11, 2, 0, '2012-03-12 16:47:24'),
(10, 187, 7, 11, 2, 0, '2012-03-12 16:47:24'),
(11, 188, 7, 11, 2, 0, '2012-03-12 16:47:24'),
(12, 193, 7, 12, 20, 0, '2012-03-12 16:47:24'),
(13, 191, 7, 12, 20, 0, '2012-03-12 16:47:24'),
(14, 190, 7, 12, 20, 0, '2012-03-12 16:47:24'),
(15, 189, 7, 12, 20, 0, '2012-03-12 16:47:24'),
(16, 192, 7, 12, 20, 0, '2012-03-12 16:47:24'),
(17, 171, 7, 1, 20, 0, '2012-03-12 16:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Immobilization_checksheet`
--

DROP TABLE IF EXISTS `Truck24_Immobilization_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck24_Immobilization_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `Truck24_Immobilization_checksheet`
--

INSERT INTO `Truck24_Immobilization_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 168, '2', '2', 7, 1),
(2, 1, 169, '6', '6', 7, 1),
(3, 1, 170, '2', '2', 7, 1),
(4, 1, 172, '1', 'cb', 7, 1),
(5, 1, 173, '1', 'cb', 7, 1),
(6, 1, 174, '1', 'cb', 7, 1),
(7, 1, 181, '4', '4', 7, 1),
(8, 1, 184, '2', '2', 7, 1),
(9, 1, 171, '1', 'cb', 7, 1),
(10, 1, 186, '2', '2', 7, 11),
(11, 1, 187, '2', '2', 7, 11),
(12, 1, 188, '2', '2', 7, 11),
(13, 1, 193, '1', 'cb', 7, 12),
(14, 1, 191, '1', 'cb', 7, 12),
(15, 1, 190, '1', 'cb', 7, 12),
(16, 1, 189, '1', 'cb', 7, 12),
(17, 1, 192, '1', 'cb', 7, 12);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Immobilization_events`
--

DROP TABLE IF EXISTS `Truck24_Immobilization_events`;
CREATE TABLE IF NOT EXISTS `Truck24_Immobilization_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Truck24_Immobilization_events`
--

INSERT INTO `Truck24_Immobilization_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-03-18 23:46:02', NULL, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_IV`
--

DROP TABLE IF EXISTS `Truck24_IV`;
CREATE TABLE IF NOT EXISTS `Truck24_IV` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `Truck24_IV`
--

INSERT INTO `Truck24_IV` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 96, 5, 1, 3, 0, '2012-03-12 16:47:24'),
(2, 98, 5, 1, 3, 0, '2012-03-12 16:47:24'),
(3, 99, 5, 1, 3, 0, '2012-03-12 16:47:24'),
(4, 101, 5, 1, 3, 0, '2012-03-12 16:47:24'),
(5, 41, 5, 1, 3, 0, '2012-03-12 16:47:24'),
(6, 127, 5, 1, 3, 0, '2012-03-12 16:47:24'),
(7, 471, 5, 1, 10, 0, '2012-03-12 16:47:24'),
(8, 44, 5, 6, 2, 0, '2012-03-12 16:47:24'),
(9, 45, 5, 6, 2, 0, '2012-03-12 16:47:24'),
(10, 46, 5, 6, 2, 0, '2012-03-12 16:47:24'),
(11, 47, 5, 6, 2, 0, '2012-03-12 16:47:24'),
(12, 48, 5, 6, 2, 0, '2012-03-12 16:47:24'),
(13, 49, 5, 6, 2, 0, '2012-03-12 16:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_IV_checksheet`
--

DROP TABLE IF EXISTS `Truck24_IV_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck24_IV_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `Truck24_IV_checksheet`
--

INSERT INTO `Truck24_IV_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 96, '3', '3', 5, 1),
(2, 1, 98, '3', '3', 5, 1),
(3, 1, 99, '3', '3', 5, 1),
(4, 1, 101, '3', '3', 5, 1),
(5, 1, 41, '3', '3', 5, 1),
(6, 1, 127, '3', '3', 5, 1),
(7, 1, 471, '10', '10', 5, 1),
(8, 1, 44, '2', '2', 5, 6),
(9, 1, 45, '2', '2', 5, 6),
(10, 1, 46, '2', '2', 5, 6),
(11, 1, 47, '2', '2', 5, 6),
(12, 1, 48, '2', '2', 5, 6),
(13, 1, 49, '2', '2', 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_IV_events`
--

DROP TABLE IF EXISTS `Truck24_IV_events`;
CREATE TABLE IF NOT EXISTS `Truck24_IV_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Truck24_IV_events`
--

INSERT INTO `Truck24_IV_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-03-18 23:46:02', NULL, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Misc_Equipment`
--

DROP TABLE IF EXISTS `Truck24_Misc_Equipment`;
CREATE TABLE IF NOT EXISTS `Truck24_Misc_Equipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `Truck24_Misc_Equipment`
--

INSERT INTO `Truck24_Misc_Equipment` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 142, 6, 1, 6, 0, '2012-03-12 16:47:25'),
(2, 143, 6, 1, 2, 0, '2012-03-12 16:47:25'),
(3, 144, 6, 1, 20, 0, '2012-03-12 16:47:25'),
(4, 145, 6, 1, 20, 0, '2012-03-12 16:47:25'),
(5, 146, 6, 1, 20, 0, '2012-03-12 16:47:25'),
(6, 147, 6, 1, 20, 0, '2012-03-12 16:47:25'),
(7, 148, 6, 1, 20, 0, '2012-03-12 16:47:25'),
(8, 150, 6, 1, 8, 0, '2012-03-12 16:47:25'),
(9, 151, 6, 1, 4, 0, '2012-03-12 16:47:25'),
(10, 152, 6, 1, 2, 0, '2012-03-12 16:47:25'),
(11, 153, 6, 1, 20, 0, '2012-03-12 16:47:25'),
(12, 156, 6, 1, 20, 0, '2012-03-12 16:47:25'),
(13, 157, 6, 1, 20, 0, '2012-03-12 16:47:25'),
(14, 158, 6, 1, 20, 0, '2012-03-12 16:47:25'),
(15, 165, 6, 10, 20, 0, '2012-03-12 16:47:25'),
(16, 166, 6, 10, 20, 0, '2012-03-12 16:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Misc_Equipment_checksheet`
--

DROP TABLE IF EXISTS `Truck24_Misc_Equipment_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck24_Misc_Equipment_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `Truck24_Misc_Equipment_checksheet`
--

INSERT INTO `Truck24_Misc_Equipment_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 142, '6', '6', 6, 1),
(2, 1, 143, '2', '2', 6, 1),
(3, 1, 144, '1', 'cb', 6, 1),
(4, 1, 145, '1', 'cb', 6, 1),
(5, 1, 146, '1', 'cb', 6, 1),
(6, 1, 147, '1', 'cb', 6, 1),
(7, 1, 148, '1', 'cb', 6, 1),
(8, 1, 150, '8', '8', 6, 1),
(9, 1, 151, '4', '4', 6, 1),
(10, 1, 152, '2', '2', 6, 1),
(11, 1, 153, '1', 'cb', 6, 1),
(12, 1, 156, '1', 'cb', 6, 1),
(13, 1, 157, '1', 'cb', 6, 1),
(14, 1, 158, '1', 'cb', 6, 1),
(15, 1, 165, '1', 'cb', 6, 10),
(16, 1, 166, '1', 'cb', 6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Misc_Equipment_events`
--

DROP TABLE IF EXISTS `Truck24_Misc_Equipment_events`;
CREATE TABLE IF NOT EXISTS `Truck24_Misc_Equipment_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Truck24_Misc_Equipment_events`
--

INSERT INTO `Truck24_Misc_Equipment_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-03-18 23:46:02', NULL, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_O2`
--

DROP TABLE IF EXISTS `Truck24_O2`;
CREATE TABLE IF NOT EXISTS `Truck24_O2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `Truck24_O2`
--

INSERT INTO `Truck24_O2` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 484, 8, 1, 6, 0, '2012-03-12 16:47:25'),
(2, 194, 8, 1, 17, 1, '2012-03-12 16:47:25'),
(3, 195, 8, 1, 17, 1, '2012-03-12 16:47:25'),
(4, 200, 8, 1, 20, 0, '2012-03-12 16:47:25'),
(5, 10, 8, 1, 20, 0, '2012-03-12 16:47:25'),
(6, 12, 8, 1, 20, 0, '2012-03-12 16:47:25'),
(7, 27, 8, 1, 20, 0, '2012-03-12 16:47:25'),
(8, 37, 8, 5, 20, 0, '2012-03-12 16:47:25'),
(9, 38, 8, 5, 20, 0, '2012-03-12 16:47:25'),
(10, 34, 8, 5, 20, 0, '2012-03-12 16:47:25'),
(11, 35, 8, 5, 20, 0, '2012-03-12 16:47:25'),
(12, 36, 8, 5, 20, 0, '2012-03-12 16:47:25'),
(13, 29, 8, 4, 20, 0, '2012-03-12 16:47:25'),
(14, 30, 8, 4, 20, 0, '2012-03-12 16:47:25'),
(15, 31, 8, 4, 20, 0, '2012-03-12 16:47:25'),
(16, 32, 8, 4, 20, 0, '2012-03-12 16:47:25'),
(17, 33, 8, 4, 20, 0, '2012-03-12 16:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_O2_checksheet`
--

DROP TABLE IF EXISTS `Truck24_O2_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck24_O2_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `Truck24_O2_checksheet`
--

INSERT INTO `Truck24_O2_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 484, '6', '6', 8, 1),
(2, 1, 194, '', 'O2', 8, 1),
(3, 1, 195, '', 'O2', 8, 1),
(4, 1, 200, '1', 'cb', 8, 1),
(5, 1, 10, '1', 'cb', 8, 1),
(6, 1, 12, '1', 'cb', 8, 1),
(7, 1, 27, '1', 'cb', 8, 1),
(8, 1, 37, '1', 'cb', 8, 5),
(9, 1, 38, '1', 'cb', 8, 5),
(10, 1, 34, '1', 'cb', 8, 5),
(11, 1, 35, '1', 'cb', 8, 5),
(12, 1, 36, '1', 'cb', 8, 5),
(13, 1, 29, '1', 'cb', 8, 4),
(14, 1, 30, '1', 'cb', 8, 4),
(15, 1, 31, '1', 'cb', 8, 4),
(16, 1, 32, '1', 'cb', 8, 4),
(17, 1, 33, '1', 'cb', 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_O2_events`
--

DROP TABLE IF EXISTS `Truck24_O2_events`;
CREATE TABLE IF NOT EXISTS `Truck24_O2_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Truck24_O2_events`
--

INSERT INTO `Truck24_O2_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-03-18 23:46:02', NULL, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_OB`
--

DROP TABLE IF EXISTS `Truck24_OB`;
CREATE TABLE IF NOT EXISTS `Truck24_OB` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `Truck24_OB`
--

INSERT INTO `Truck24_OB` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(6, 481, 35, 1, 2, 0, '2012-03-12 16:47:25'),
(2, 155, 35, 1, 2, 0, '2012-03-12 16:47:25'),
(3, 477, 35, 1, 20, 0, '2012-03-12 16:47:25'),
(4, 478, 35, 1, 2, 0, '2012-03-12 16:47:25'),
(5, 474, 35, 1, 2, 0, '2012-03-12 16:47:25'),
(7, 475, 35, 1, 2, 0, '2012-03-12 16:47:25'),
(8, 154, 35, 1, 2, 0, '2012-03-12 16:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_OB_checksheet`
--

DROP TABLE IF EXISTS `Truck24_OB_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck24_OB_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Truck24_OB_checksheet`
--

INSERT INTO `Truck24_OB_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 481, '2', '2', 35, 1),
(2, 1, 155, '2', '2', 35, 1),
(3, 1, 477, '1', 'cb', 35, 1),
(4, 1, 478, '2', '2', 35, 1),
(5, 1, 474, '2', '2', 35, 1),
(6, 1, 475, '2', '2', 35, 1),
(7, 1, 154, '2', '2', 35, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_OB_events`
--

DROP TABLE IF EXISTS `Truck24_OB_events`;
CREATE TABLE IF NOT EXISTS `Truck24_OB_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Truck24_OB_events`
--

INSERT INTO `Truck24_OB_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-03-18 23:46:02', NULL, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Personal_Safety`
--

DROP TABLE IF EXISTS `Truck24_Personal_Safety`;
CREATE TABLE IF NOT EXISTS `Truck24_Personal_Safety` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `Truck24_Personal_Safety`
--

INSERT INTO `Truck24_Personal_Safety` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 248, 10, 1, 4, 0, '2012-03-12 16:47:25'),
(2, 249, 10, 1, 4, 0, '2012-03-12 16:47:25'),
(3, 250, 10, 1, 20, 0, '2012-03-12 16:47:25'),
(4, 251, 10, 1, 20, 0, '2012-03-12 16:47:25'),
(5, 60, 10, 1, 2, 0, '2012-03-12 16:47:25'),
(6, 254, 10, 1, 2, 0, '2012-03-12 16:47:25'),
(7, 255, 10, 1, 20, 0, '2012-03-12 16:47:25'),
(8, 256, 10, 1, 20, 0, '2012-03-12 16:47:25'),
(9, 257, 10, 1, 2, 0, '2012-03-12 16:47:25'),
(10, 239, 10, 1, 4, 0, '2012-03-12 16:47:25'),
(11, 258, 10, 15, 2, 0, '2012-03-12 16:47:25'),
(12, 259, 10, 15, 2, 0, '2012-03-12 16:47:25'),
(13, 247, 10, 14, 2, 0, '2012-03-12 16:47:25'),
(14, 245, 10, 14, 2, 0, '2012-03-12 16:47:25'),
(15, 243, 10, 14, 2, 0, '2012-03-12 16:47:25'),
(16, 241, 10, 14, 2, 0, '2012-03-12 16:47:25'),
(17, 429, 10, 1, 2, 0, '2012-03-12 16:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Personal_Safety_checksheet`
--

DROP TABLE IF EXISTS `Truck24_Personal_Safety_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck24_Personal_Safety_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `Truck24_Personal_Safety_checksheet`
--

INSERT INTO `Truck24_Personal_Safety_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 248, '4', '4', 10, 1),
(2, 1, 249, '4', '4', 10, 1),
(3, 1, 250, '1', 'cb', 10, 1),
(4, 1, 251, '1', 'cb', 10, 1),
(5, 1, 60, '2', '2', 10, 1),
(6, 1, 254, '2', '2', 10, 1),
(7, 1, 255, '1', 'cb', 10, 1),
(8, 1, 256, '1', 'cb', 10, 1),
(9, 1, 257, '2', '2', 10, 1),
(10, 1, 239, '4', '4', 10, 1),
(11, 1, 429, '2', '2', 10, 1),
(12, 1, 258, '2', '2', 10, 15),
(13, 1, 259, '2', '2', 10, 15),
(14, 1, 247, '2', '2', 10, 14),
(15, 1, 245, '2', '2', 10, 14),
(16, 1, 243, '2', '2', 10, 14),
(17, 1, 241, '2', '2', 10, 14);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Personal_Safety_events`
--

DROP TABLE IF EXISTS `Truck24_Personal_Safety_events`;
CREATE TABLE IF NOT EXISTS `Truck24_Personal_Safety_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Truck24_Personal_Safety_events`
--

INSERT INTO `Truck24_Personal_Safety_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-03-18 23:46:02', NULL, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Pt_Transport`
--

DROP TABLE IF EXISTS `Truck24_Pt_Transport`;
CREATE TABLE IF NOT EXISTS `Truck24_Pt_Transport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Truck24_Pt_Transport`
--

INSERT INTO `Truck24_Pt_Transport` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 167, 29, 30, 20, 0, '2012-03-12 16:47:25'),
(2, 423, 29, 30, 2, 0, '2012-03-12 16:47:25'),
(3, 424, 29, 31, 20, 0, '2012-03-12 16:47:25'),
(4, 425, 29, 31, 20, 0, '2012-03-12 16:47:25'),
(5, 426, 29, 31, 20, 0, '2012-03-12 16:47:25'),
(6, 427, 29, 31, 20, 0, '2012-03-12 16:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Pt_Transport_checksheet`
--

DROP TABLE IF EXISTS `Truck24_Pt_Transport_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck24_Pt_Transport_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Truck24_Pt_Transport_checksheet`
--

INSERT INTO `Truck24_Pt_Transport_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 167, '1', 'cb', 29, 30),
(2, 1, 423, '2', '2', 29, 30),
(3, 1, 424, '1', 'cb', 29, 31),
(4, 1, 425, '1', 'cb', 29, 31),
(5, 1, 426, '1', 'cb', 29, 31),
(6, 1, 427, '1', 'cb', 29, 31);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Pt_Transport_events`
--

DROP TABLE IF EXISTS `Truck24_Pt_Transport_events`;
CREATE TABLE IF NOT EXISTS `Truck24_Pt_Transport_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Truck24_Pt_Transport_events`
--

INSERT INTO `Truck24_Pt_Transport_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-03-18 23:46:02', NULL, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Suction`
--

DROP TABLE IF EXISTS `Truck24_Suction`;
CREATE TABLE IF NOT EXISTS `Truck24_Suction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `Truck24_Suction`
--

INSERT INTO `Truck24_Suction` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 275, 13, 1, 6, 0, '2012-03-12 16:47:25'),
(2, 276, 13, 1, 2, 0, '2012-03-12 16:47:25'),
(3, 277, 13, 1, 2, 0, '2012-03-12 16:47:25'),
(4, 278, 13, 1, 2, 0, '2012-03-12 16:47:25'),
(5, 279, 13, 1, 2, 0, '2012-03-12 16:47:25'),
(6, 280, 13, 1, 2, 0, '2012-03-12 16:47:25'),
(7, 281, 13, 1, 2, 0, '2012-03-12 16:47:25'),
(8, 430, 13, 32, 20, 0, '2012-03-12 16:47:25'),
(9, 432, 13, 32, 2, 0, '2012-03-12 16:47:25'),
(10, 434, 13, 32, 2, 0, '2012-03-12 16:47:25'),
(11, 431, 13, 32, 20, 0, '2012-03-12 16:47:25'),
(12, 433, 13, 32, 2, 0, '2012-03-12 16:47:25'),
(13, 435, 13, 32, 2, 0, '2012-03-12 16:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Suction_checksheet`
--

DROP TABLE IF EXISTS `Truck24_Suction_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck24_Suction_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `Truck24_Suction_checksheet`
--

INSERT INTO `Truck24_Suction_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 275, '6', '6', 13, 1),
(2, 1, 276, '2', '2', 13, 1),
(3, 1, 277, '2', '2', 13, 1),
(4, 1, 278, '2', '2', 13, 1),
(5, 1, 279, '2', '2', 13, 1),
(6, 1, 280, '2', '2', 13, 1),
(7, 1, 281, '2', '2', 13, 1),
(8, 1, 430, '1', 'cb', 13, 32),
(9, 1, 432, '2', '2', 13, 32),
(10, 1, 434, '2', '2', 13, 32),
(11, 1, 431, '1', 'cb', 13, 32),
(12, 1, 433, '2', '2', 13, 32),
(13, 1, 435, '2', '2', 13, 32);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Suction_events`
--

DROP TABLE IF EXISTS `Truck24_Suction_events`;
CREATE TABLE IF NOT EXISTS `Truck24_Suction_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Truck24_Suction_events`
--

INSERT INTO `Truck24_Suction_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-03-18 23:46:02', NULL, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Toughbook`
--

DROP TABLE IF EXISTS `Truck24_Toughbook`;
CREATE TABLE IF NOT EXISTS `Truck24_Toughbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Truck24_Toughbook`
--

INSERT INTO `Truck24_Toughbook` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 240, 30, 1, 20, 0, '2012-03-12 16:47:25'),
(2, 242, 30, 1, 20, 0, '2012-03-12 16:47:25'),
(3, 244, 30, 28, 20, 0, '2012-03-12 16:47:25'),
(4, 421, 30, 28, 20, 0, '2012-03-12 16:47:25'),
(5, 422, 30, 28, 20, 0, '2012-03-12 16:47:25'),
(6, 470, 30, 28, 20, 0, '2012-03-12 16:47:25'),
(7, 246, 30, 28, 20, 0, '2012-03-12 16:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Toughbook_checksheet`
--

DROP TABLE IF EXISTS `Truck24_Toughbook_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck24_Toughbook_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Truck24_Toughbook_checksheet`
--

INSERT INTO `Truck24_Toughbook_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 240, '1', 'cb', 30, 1),
(2, 1, 242, '1', 'cb', 30, 1),
(3, 1, 244, '1', 'cb', 30, 28),
(4, 1, 421, '1', 'cb', 30, 28),
(5, 1, 422, '1', 'cb', 30, 28),
(6, 1, 470, '1', 'cb', 30, 28),
(7, 1, 246, '1', 'cb', 30, 28);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Toughbook_events`
--

DROP TABLE IF EXISTS `Truck24_Toughbook_events`;
CREATE TABLE IF NOT EXISTS `Truck24_Toughbook_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Truck24_Toughbook_events`
--

INSERT INTO `Truck24_Toughbook_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-03-18 23:46:02', NULL, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Trauma_Supplies`
--

DROP TABLE IF EXISTS `Truck24_Trauma_Supplies`;
CREATE TABLE IF NOT EXISTS `Truck24_Trauma_Supplies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `Truck24_Trauma_Supplies`
--

INSERT INTO `Truck24_Trauma_Supplies` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 290, 14, 1, 20, 0, '2012-03-12 16:47:25'),
(3, 291, 14, 1, 20, 0, '2012-03-12 16:47:25'),
(4, 292, 14, 1, 20, 0, '2012-03-12 16:47:25'),
(5, 293, 14, 1, 20, 0, '2012-03-12 16:47:25'),
(6, 294, 14, 1, 4, 0, '2012-03-12 16:47:25'),
(7, 295, 14, 1, 6, 0, '2012-03-12 16:47:25'),
(8, 296, 14, 1, 20, 0, '2012-03-12 16:47:25'),
(9, 297, 14, 1, 2, 0, '2012-03-12 16:47:25'),
(10, 298, 14, 1, 6, 0, '2012-03-12 16:47:25'),
(11, 299, 14, 1, 4, 0, '2012-03-12 16:47:25'),
(12, 300, 14, 1, 4, 0, '2012-03-12 16:47:25'),
(13, 301, 14, 1, 6, 0, '2012-03-12 16:47:25'),
(14, 302, 14, 1, 18, 0, '2012-03-12 16:47:25'),
(15, 303, 14, 1, 2, 0, '2012-03-12 16:47:25'),
(16, 304, 14, 1, 2, 0, '2012-03-12 16:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Trauma_Supplies_checksheet`
--

DROP TABLE IF EXISTS `Truck24_Trauma_Supplies_checksheet`;
CREATE TABLE IF NOT EXISTS `Truck24_Trauma_Supplies_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `Truck24_Trauma_Supplies_checksheet`
--

INSERT INTO `Truck24_Trauma_Supplies_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 290, '1', 'cb', 14, 1),
(2, 1, 291, '1', 'cb', 14, 1),
(3, 1, 292, '1', 'cb', 14, 1),
(4, 1, 293, '1', 'cb', 14, 1),
(5, 1, 294, '4', '4', 14, 1),
(6, 1, 295, '6', '6', 14, 1),
(7, 1, 296, '1', 'cb', 14, 1),
(8, 1, 297, '2', '2', 14, 1),
(9, 1, 298, '6', '6', 14, 1),
(10, 1, 299, '4', '4', 14, 1),
(11, 1, 300, '4', '4', 14, 1),
(12, 1, 301, '6', '6', 14, 1),
(13, 1, 303, '2', '2', 14, 1),
(14, 1, 304, '2', '2', 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Truck24_Trauma_Supplies_events`
--

DROP TABLE IF EXISTS `Truck24_Trauma_Supplies_events`;
CREATE TABLE IF NOT EXISTS `Truck24_Trauma_Supplies_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` tinyint(4) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Truck24_Trauma_Supplies_events`
--

INSERT INTO `Truck24_Trauma_Supplies_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-03-18 23:46:02', NULL, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

DROP TABLE IF EXISTS `user_status`;
CREATE TABLE IF NOT EXISTS `user_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`status_id`, `status`) VALUES
(1, 'Administrator'),
(2, 'Active'),
(3, 'Deactivated');

-- --------------------------------------------------------

--
-- Table structure for table `Zoll_24`
--

DROP TABLE IF EXISTS `Zoll_24`;
CREATE TABLE IF NOT EXISTS `Zoll_24` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `hm_value_id` int(11) NOT NULL,
  `req` tinyint(1) NOT NULL,
  `T_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `Zoll_24`
--

INSERT INTO `Zoll_24` (`id`, `item_id`, `category_id`, `subcategory_id`, `hm_value_id`, `req`, `T_update`) VALUES
(1, 381, 39, 1, 2, 0, '2012-03-12 16:47:25'),
(2, 491, 39, 1, 20, 0, '2012-03-12 16:47:25'),
(3, 382, 39, 1, 20, 0, '2012-03-12 16:47:25'),
(4, 377, 39, 1, 2, 0, '2012-03-12 16:47:25'),
(5, 393, 39, 1, 2, 0, '2012-03-12 16:47:25'),
(6, 490, 39, 1, 2, 0, '2012-03-12 16:47:25'),
(7, 493, 39, 1, 2, 0, '2012-03-12 16:47:25'),
(11, 391, 39, 1, 10, 0, '2012-03-12 16:47:25'),
(10, 390, 39, 1, 10, 0, '2012-03-12 16:47:25'),
(12, 379, 39, 1, 2, 0, '2012-03-12 16:47:25'),
(13, 488, 39, 1, 2, 0, '2012-03-12 16:47:25'),
(14, 392, 39, 1, 20, 0, '2012-03-12 16:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `Zoll_24_checksheet`
--

DROP TABLE IF EXISTS `Zoll_24_checksheet`;
CREATE TABLE IF NOT EXISTS `Zoll_24_checksheet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `result` varchar(11) DEFAULT NULL,
  `hm_value_id` varchar(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `Zoll_24_checksheet`
--

INSERT INTO `Zoll_24_checksheet` (`id`, `event_id`, `item_id`, `result`, `hm_value_id`, `category_id`, `subcategory_id`) VALUES
(1, 1, 381, '2', '2', 39, 1),
(2, 1, 491, '1', 'cb', 39, 1),
(3, 1, 382, '1', 'cb', 39, 1),
(4, 1, 377, '2', '2', 39, 1),
(5, 1, 393, '2', '2', 39, 1),
(6, 1, 490, '2', '2', 39, 1),
(7, 1, 493, '2', '2', 39, 1),
(8, 1, 391, '10', '10', 39, 1),
(9, 1, 390, '10', '10', 39, 1),
(10, 1, 379, '2', '2', 39, 1),
(11, 1, 488, '2', '2', 39, 1),
(12, 1, 392, '1', 'cb', 39, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Zoll_24_events`
--

DROP TABLE IF EXISTS `Zoll_24_events`;
CREATE TABLE IF NOT EXISTS `Zoll_24_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submitted` int(11) DEFAULT NULL,
  `merged` int(11) DEFAULT NULL,
  `merger` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Zoll_24_events`
--

INSERT INTO `Zoll_24_events` (`id`, `date`, `submitted`, `merged`, `merger`) VALUES
(1, '2014-03-18 23:46:02', NULL, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `_user`
--

DROP TABLE IF EXISTS `_user`;
CREATE TABLE IF NOT EXISTS `_user` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=188 ;

--
-- Dumping data for table `_user`
--

INSERT INTO `_user` (`user_id`, `username`, `password`, `join_date`, `first_name`, `last_name`, `status`, `mailrec`, `email_address`) VALUES
(1, 'Administrator', '359e14d5e440ac16c309053bd0967c87d236cf87', '2009-04-06 18:12:22', 'James', 'Garbe', 1, 0, ''),
(185, 'cheddar', 'bcef7a046258082993759bade995b3ae8bee26c7', '2013-10-30 19:53:06', '', '', 1, 0, 'cheddar@cheese.com'),
(183, 'kilgore_trout', '08570a57d71dbb872c39ca9bd14a82215a908e78', '2013-10-30 15:40:08', '', '', 2, 0, 'kurt@vonnegut.com'),
(182, 'cheese', '2e212ebba9302a65e9fd21f6772368fe60592fe8', '2013-10-30 15:39:28', '', '', 2, 0, 'cheesey@localhost'),
(186, 'jimgarbe', '359e14d5e440ac16c309053bd0967c87d236cf87', '2014-02-25 15:42:19', '', '', 2, 1, 'jimgarbe@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
