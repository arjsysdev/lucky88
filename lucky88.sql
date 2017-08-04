/*
MySQL Data Transfer
Source Host: localhost
Source Database: lucky88
Target Host: localhost
Target Database: lucky88
Date: 8/4/2017 4:28:37 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_code` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_type` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `agent` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comp_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payable_to` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `area` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tin_num` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cont_pers` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mob_no` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other_telephone` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax_num` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prepared_by` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_by` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prep_date` date DEFAULT NULL,
  `up_date` date DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for cpfreights
-- ----------------------------
DROP TABLE IF EXISTS `cpfreights`;
CREATE TABLE `cpfreights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `charge` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for cplist
-- ----------------------------
DROP TABLE IF EXISTS `cplist`;
CREATE TABLE `cplist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `product_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(20) NOT NULL,
  `unit` int(11) NOT NULL,
  `less1` int(11) DEFAULT NULL,
  `less2` int(11) DEFAULT NULL,
  `less3` int(11) DEFAULT NULL,
  `disperbundle` int(11) NOT NULL,
  `remarks` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for cpstat
-- ----------------------------
DROP TABLE IF EXISTS `cpstat`;
CREATE TABLE `cpstat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `terms` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `limitation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `days` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for employee
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `agency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hired_date` date DEFAULT NULL,
  `sss` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `philhealth` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pagibig` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `termination` date DEFAULT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  UNIQUE KEY `Unique` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for login_attempts
-- ----------------------------
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for order_items
-- ----------------------------
DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `soid` int(11) NOT NULL,
  `product_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contact_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `amount` double NOT NULL,
  `less1` int(11) NOT NULL,
  `less2` int(11) NOT NULL,
  `less3` int(11) NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for porder_items
-- ----------------------------
DROP TABLE IF EXISTS `porder_items`;
CREATE TABLE `porder_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `soid` int(11) NOT NULL,
  `product_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contact_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `amount` double NOT NULL,
  `less1` int(11) NOT NULL,
  `less2` int(11) NOT NULL,
  `less3` int(11) NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for product_category
-- ----------------------------
DROP TABLE IF EXISTS `product_category`;
CREATE TABLE `product_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for product_ingredients
-- ----------------------------
DROP TABLE IF EXISTS `product_ingredients`;
CREATE TABLE `product_ingredients` (
  `ing_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) DEFAULT NULL,
  `ing_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ing_qty` int(11) DEFAULT NULL,
  `ing_unit` int(11) DEFAULT NULL,
  `ing_material` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ing_startDate` date DEFAULT NULL,
  `ing_endDate` date DEFAULT NULL,
  PRIMARY KEY (`ing_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for product_unit
-- ----------------------------
DROP TABLE IF EXISTS `product_unit`;
CREATE TABLE `product_unit` (
  `unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bar_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prod_type` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prod_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand_name` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prod_cat` int(11) DEFAULT NULL,
  `prod_weight` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prod_pcs` int(11) DEFAULT NULL,
  `prepared_by` int(11) DEFAULT NULL,
  `last_edited_by` date DEFAULT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for purchaseorder
-- ----------------------------
DROP TABLE IF EXISTS `purchaseorder`;
CREATE TABLE `purchaseorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `comp_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cpoNum` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `poNum` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_ordered` date NOT NULL,
  `date_deliver` date NOT NULL,
  `delivery_at` text COLLATE utf8_unicode_ci,
  `remarks` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `grosstotal` double DEFAULT NULL,
  `dis1less` double DEFAULT NULL,
  `dis2less` double DEFAULT NULL,
  `dis3less` double DEFAULT NULL,
  `netSales` double DEFAULT NULL,
  `lessVAT12` double DEFAULT NULL,
  `amountNetVAT` double DEFAULT NULL,
  `pwdDis` double DEFAULT NULL,
  `totalAmountDue` double DEFAULT NULL,
  `preparedby` int(11) NOT NULL,
  `lasteditby` int(11) NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for raw_materials
-- ----------------------------
DROP TABLE IF EXISTS `raw_materials`;
CREATE TABLE `raw_materials` (
  `material_id` int(11) NOT NULL AUTO_INCREMENT,
  `rm_img` mediumtext COLLATE utf8_unicode_ci,
  `rm_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `rm_name` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `rm_type` int(11) NOT NULL,
  `rm_weight` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `rm_pcs` int(11) NOT NULL,
  `rm_di_length` int(10) DEFAULT NULL,
  `rm_di_width` int(10) DEFAULT NULL,
  `rm_di_height` int(10) DEFAULT NULL,
  `prepared_by` int(11) NOT NULL,
  `prepared_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_edited` int(11) NOT NULL,
  `last_edited_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`material_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for raw_materials_type
-- ----------------------------
DROP TABLE IF EXISTS `raw_materials_type`;
CREATE TABLE `raw_materials_type` (
  `rmt_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_show` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`rmt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for receipt_items
-- ----------------------------
DROP TABLE IF EXISTS `receipt_items`;
CREATE TABLE `receipt_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `loaded` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for receipts
-- ----------------------------
DROP TABLE IF EXISTS `receipts`;
CREATE TABLE `receipts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ponum` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dlvnum` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sinum` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `drnum` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `smallnum` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `date_modified` timestamp NULL DEFAULT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for receivingwh
-- ----------------------------
DROP TABLE IF EXISTS `receivingwh`;
CREATE TABLE `receivingwh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `refno` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `remarks` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `received_by` int(11) NOT NULL,
  `prepared_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for receivingwh_items
-- ----------------------------
DROP TABLE IF EXISTS `receivingwh_items`;
CREATE TABLE `receivingwh_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `refno` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `item_id` int(11) NOT NULL,
  `loaded` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for salesorder
-- ----------------------------
DROP TABLE IF EXISTS `salesorder`;
CREATE TABLE `salesorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `comp_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cpoNum` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `poNum` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_ordered` date NOT NULL,
  `remarks` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `grosstotal` double DEFAULT NULL,
  `dis1less` double DEFAULT NULL,
  `dis2less` double DEFAULT NULL,
  `dis3less` double DEFAULT NULL,
  `netSales` double DEFAULT NULL,
  `lessVAT12` double DEFAULT NULL,
  `amountNetVAT` double DEFAULT NULL,
  `pwdDis` double DEFAULT NULL,
  `totalAmountDue` double DEFAULT NULL,
  `preparedby` int(11) NOT NULL,
  `lasteditby` int(11) NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for spfreights
-- ----------------------------
DROP TABLE IF EXISTS `spfreights`;
CREATE TABLE `spfreights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `charge` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for splist
-- ----------------------------
DROP TABLE IF EXISTS `splist`;
CREATE TABLE `splist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `product_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(20) NOT NULL,
  `price2` double DEFAULT NULL,
  `mooq` int(11) DEFAULT NULL,
  `unit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `less1` int(11) DEFAULT NULL,
  `less2` int(11) DEFAULT NULL,
  `less3` int(11) DEFAULT NULL,
  `disperbundle` int(11) NOT NULL,
  `remarks` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for spstat
-- ----------------------------
DROP TABLE IF EXISTS `spstat`;
CREATE TABLE `spstat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `terms` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `limitation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `days` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `activation_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_password_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for users_groups
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `contact` VALUES ('1', 'IOSI', 'Supplier', '', 'Inkline Office Solutions, Inc.', 'Inkline Office Solutions, Inc.', '429 Martinez Street Brgy. Plainview Mandaluyong City', 'Area1', '009-074-643-000', 'Maryrose Ann A. Hallig', '7360672', '09363268253', '5340722', '5352926', 'roseannhallig@yahoo.com', 'www.inklinesolutions.com', 'klyeung@lucky888food.com', null, '2017-05-05', null);
INSERT INTO `contact` VALUES ('2', 'EXL', 'Supplier', '', 'Express Label System', '', '#9.A. Rodriguez Ave  . Banlat, Tandang Sora, Quezon City', 'Area1', '', 'Ms.Jet', '9359590', '', '', '9359588', 'elsc_ph@yahoo.com', '', 'mpmaceda@lucky888food.com', 'mpmaceda@lucky888food.com', '2017-05-30', '2017-06-07');
INSERT INTO `contact` VALUES ('3', 'HAP', 'Supplier', '', 'Hope Adhessive Paper Product Inc.', '', '17 C Cordero St, 2nd Avenue Grace Park Caloocan City', 'Area1', '', 'Ms.Ness ', '3658886', '', '', '3640073 ', '', '', 'mpmaceda@lucky888food.com', 'mpmaceda@lucky888food.com', '2017-06-01', '2017-06-06');
INSERT INTO `contact` VALUES ('4', 'HOMSC', 'Supplier', '', 'Hermano Oil Manufacturing  and Sugar Corporation', 'Hermano Oil Manufacturing and Sugar Corporation', '', 'Area1', '', 'Sir Jay-R', '', '', '', '9396441', '', '', 'mpmaceda@lucky888food.com', null, '2017-06-01', null);
INSERT INTO `contact` VALUES ('5', 'BIC ', 'Supplier', '', 'Bengar Industrial Corporation ', 'Bengar Industrial Corporation ', '#207 Biak na Bato Street Brgy. Manresa , Quezon City', 'Area1', '', 'Jose \'\'Jay\'\' Nacpil', '365-1557 to 59', '0917-806-3175', '364-1288', '361-8224', 'jaynacpil@gmail.com/printers@bengarph.com', '', 'mpmaceda@lucky888food.com', null, '2017-06-06', null);
INSERT INTO `contact` VALUES ('6', '1C3I', 'Supplier', '', '1 Cor. 3 Industries ', 'Rodelea Tengson', '#32 A.Cruz St., Tangos Navotas City ', 'Area1', '203-229-665-000', 'Ma\'am Rodelea ', '', '', '', '282-4258', '', '', 'mpmaceda@lucky888food.com', null, '2017-06-08', null);
INSERT INTO `contact` VALUES ('7', 'MM', 'Customer', 'Perlinda', 'Mariton Main', '', 'Gomez St. Tuguegarao City', 'Area1', '', 'Jonald', '', '', '', '', '', '', 'klyeung@lucky888food.com', null, '2017-06-09', null);
INSERT INTO `contact` VALUES ('8', 'MTLL', 'Supplier', '', 'M-Team Labels Inc.,', '', '#12 A Dizon Street Tinajeros malabon city\r\n', 'Area2', '007-885-070-000', 'michelle  you', '02 447 1939', '0917 569 1477', '02 447 1987', '02 447 1939', 'michelleyou@mteamlabelsinc.com / inquir @ mteamlabelsin.com', '', 'mpmaceda@lucky888food.com', 'mpmaceda@lucky888food.com', '2017-06-13', '2017-06-13');
INSERT INTO `contact` VALUES ('9', 'MTLI', 'Supplier', '', 'M-team Labels Inc ', '', '', 'Area1', '', '', '', '', '', '', '', '', 'mpmaceda@lucky888food.com', null, '2017-06-13', null);
INSERT INTO `cpfreights` VALUES ('1', '1', '2016-11-22', '2016-11-29', '21', 'test', '2016-11-18 01:31:35');
INSERT INTO `cplist` VALUES ('4', '1', '2016-12-01', '2016-12-31', 'TEST100', '20', '20', '2', '5', '2', '2', 'test\r\n', '2016-12-15 11:42:27');
INSERT INTO `cplist` VALUES ('5', '1', '2016-12-01', '2016-12-31', 'BGARJOHN', '200', '20', '2', '5', '2', '20', 'test', '2016-12-15 11:42:27');
INSERT INTO `cplist` VALUES ('6', '2', '2016-12-01', '2016-12-31', 'BGARJOHN', '300', '0', '20', '20', '20', '5', 'test', '2016-12-08 12:02:13');
INSERT INTO `cplist` VALUES ('7', '1', '2017-01-01', '2017-01-31', 'TEST100', '125', '0', '4', '4', '4', '4', 'test', '2017-01-03 14:51:19');
INSERT INTO `cplist` VALUES ('8', '2', '2017-01-01', '2017-01-31', 'TEST100', '130', '0', '4', '4', '4', '4', 'test', '2017-01-03 14:51:24');
INSERT INTO `cplist` VALUES ('9', '2', '2017-01-01', '2017-01-31', 'BGARJOHN', '145', '0', '4', '4', '4', '4', 'test', '2017-01-03 14:49:57');
INSERT INTO `cplist` VALUES ('10', '1', '2017-01-01', '2017-01-31', 'BGARJOHN', '160', '0', '4', '4', '4', '4', 'test', '2017-01-03 14:50:18');
INSERT INTO `cplist` VALUES ('11', '1', '2017-03-01', '2017-03-31', 'TEST100', '200', '0', '1', '1', '1', '0', 'test', '2017-03-13 10:15:38');
INSERT INTO `cplist` VALUES ('12', '1', '2017-03-01', '2017-03-31', 'BGARJOHN', '525', '2', '2', '2', '2', '2', 'test', '2017-03-15 14:32:03');
INSERT INTO `cplist` VALUES ('13', '7', '2016-12-31', '2017-04-30', 'DBEST-95', '1039', '0', '0', '0', '0', '0', '', '2017-06-09 16:38:03');
INSERT INTO `cplist` VALUES ('14', '7', '2017-07-01', '2017-07-31', 'PHNW-12', '145', '0', '1', '1', '1', '1', 'test', '2017-07-10 14:24:52');
INSERT INTO `cplist` VALUES ('15', '7', '2017-07-01', '2017-07-31', 'PHKW-12', '240', '0', '1', '1', '1', '1', 'test', '2017-07-10 14:24:52');
INSERT INTO `cpstat` VALUES ('8', '1', '5000-50000', 'Cash Advance', 'No Limit', '', '2016-12-01 11:45:23');
INSERT INTO `cpstat` VALUES ('9', '2', 'Special', 'Consignment', 'No Limit', '', '2016-12-08 12:02:13');
INSERT INTO `cpstat` VALUES ('10', '7', 'Special', 'Credit', 'No Limit', '', '2017-07-05 15:20:52');
INSERT INTO `groups` VALUES ('1', 'admin', 'Administrator');
INSERT INTO `groups` VALUES ('2', 'members', 'General User');
INSERT INTO `order_items` VALUES ('1', '1', 'TEST100', '1', '2', '2', null, '200', '1', '1', '1', '1', '2017-03-13 10:16:02');
INSERT INTO `order_items` VALUES ('2', '2', 'BGARJOHN', '1', '5', '2', null, '525', '2', '2', '2', '2', '2017-03-15 14:32:28');
INSERT INTO `order_items` VALUES ('3', '2', 'TEST100', '1', '5', '2', null, '200', '1', '1', '1', '1', '2017-03-15 14:32:28');
INSERT INTO `order_items` VALUES ('4', '3', 'DBEST-95', '7', '10', 'bdles', null, '0', '0', '0', '0', '0', '2017-06-09 16:32:00');
INSERT INTO `order_items` VALUES ('5', '3', 'EMP-800', '7', '3', 'bdles', null, '0', '0', '0', '0', '0', '2017-06-09 16:32:00');
INSERT INTO `porder_items` VALUES ('1', '1', 'TEST100', '3', '2', '2', null, '145', '2', '2', '2', '2', '2017-01-17 14:30:05');
INSERT INTO `porder_items` VALUES ('2', '2', 'SR-60', '5', '4', 'kg', null, '145', '1', '1', '1', '1', '2017-07-10 11:56:52');
INSERT INTO `porder_items` VALUES ('3', '2', 'YB-14', '5', '2', 'kg', null, '250', '1', '1', '1', '1', '2017-07-10 11:56:52');
INSERT INTO `porder_items` VALUES ('4', '3', 'SR-60', '5', '21', 'hg', null, '145', '1', '1', '1', '1', '2017-07-11 17:17:44');
INSERT INTO `porder_items` VALUES ('5', '4', 'YB-14', '5', '2', 'ha', null, '250', '1', '1', '1', '1', '2017-07-11 18:24:09');
INSERT INTO `porder_items` VALUES ('6', '5', 'YB-14', '5', '3', 'ss', null, '250', '1', '1', '1', '1', '2017-07-11 18:35:21');
INSERT INTO `porder_items` VALUES ('7', '6', 'SR-60', '5', '1', '4ha', null, '145', '1', '1', '1', '1', '2017-07-17 08:47:54');
INSERT INTO `product_category` VALUES ('1', 'Noodles');
INSERT INTO `product_category` VALUES ('2', 'Bottled Preserve');
INSERT INTO `product_category` VALUES ('3', 'Traded - Food');
INSERT INTO `product_category` VALUES ('4', 'Traded - Non Food');
INSERT INTO `product_unit` VALUES ('1', 'grams/s');
INSERT INTO `product_unit` VALUES ('2', 'pc/s');
INSERT INTO `products` VALUES ('3', 'PHNW-12', '4809013825015', 'N', 'Nata de Coco (Coconut Gel) White', 'Philippine Island', '2', '340 g', '24', null, null);
INSERT INTO `products` VALUES ('4', 'PHKW-12', '4809013825077', 'N', 'Sugar Palm Fruit (Kaong) White', 'Philippine Island', '2', '340 g', '24', null, null);
INSERT INTO `products` VALUES ('5', 'PHP-227', '4806501828695', 'N', 'Pancit Palabok', 'Philippine Island', '1', '227', '30', null, null);
INSERT INTO `products` VALUES ('6', 'PHKG-12', '4809013825107', 'N', 'Sugar Palm Fruit (Kaong) Green', 'Philippine Islands', '2', '340 g', '24', null, null);
INSERT INTO `products` VALUES ('7', 'JZKW-12', '806840000626', 'N', 'Sugar Palm Fruit  (Kaong) White', 'Jonaz', '2', '340 g', '24', null, null);
INSERT INTO `products` VALUES ('8', 'JZSJ-12', '806840000664', 'N', 'Sweet Jackfruit (Langka)', 'Philippine Islands', '2', '340 ml', '24', null, null);
INSERT INTO `products` VALUES ('9', 'JZPY-12', '806840000046', 'N', 'Sweet Purple Yam (Ube Halaya)', 'Jonaz', '2', '340 ml', '24', null, null);
INSERT INTO `products` VALUES ('10', 'JZFM-12', '806840000015', 'N', 'Fruit Mix and Beans (Halo-Halo)', 'Jonaz', '2', '340 ml ', '24', null, null);
INSERT INTO `products` VALUES ('11', 'JZMAC-12', '806840000619', 'N', 'Coconut Sports Strings', 'Jonaz', '2', '340 ml', '24', null, null);
INSERT INTO `products` VALUES ('12', 'LLS-1000', '4809010285379', 'N', 'Sotanghon', 'Lucky Lungkow', '1', '1000 g', '12', null, null);
INSERT INTO `products` VALUES ('13', 'LLS-250', '4809010285355', 'N', 'Sotanghon', 'Lucky Lungkow', '1', '250 g', '50', null, null);
INSERT INTO `products` VALUES ('14', 'LLS-100', '4809010285348', 'N', 'Sotanghon', 'Lucky Lungkow', '1', '100 g', '100', null, null);
INSERT INTO `products` VALUES ('15', 'JZPP-12', '806840000718', 'N', 'Papaya Pickles', 'Jonaz', '2', '340 ', '24', null, null);
INSERT INTO `products` VALUES ('16', 'EMP-400', '6932889602676', 'N', 'Sotanghon', 'Emperor', '1', '400', '0', null, null);
INSERT INTO `products` VALUES ('17', 'PHNG-24', '4809013825909', 'N', 'Nata de Coco (Coconut Gel) Green', 'Philippine Islands', '2', '680 g', '12', null, null);
INSERT INTO `products` VALUES ('18', 'PHNG-32', '4809013825916', 'N', 'Nata de Coco (Coconut Gel) Green', 'Philippine Islands', '2', '907 g', '12', null, null);
INSERT INTO `products` VALUES ('19', 'PHNR-24', '4809013825275', 'N', 'Nata de Coco (Coconut Gel) Red', 'Philippine Islands', '2', '680 g', '12', null, null);
INSERT INTO `products` VALUES ('20', 'PHNW-32', '4809013825879', 'N', 'Nata de Coco (Coconut Gel) White', 'Philippine Islands', '2', '907 g', '12', null, null);
INSERT INTO `products` VALUES ('21', 'JZNG-12', '806840000657', 'N', 'Nata de Coco (Coconut Gel) Green', 'Jonaz', '2', '340 g', '24', null, null);
INSERT INTO `products` VALUES ('22', 'JZRMB-12', '806840000688', 'N', 'Red Mongo Beans (Red Mung Beans)', 'Jonaz', '2', '340 g', '24', null, null);
INSERT INTO `products` VALUES ('23', 'PHSJ-12', '4809013825114', 'N', 'Sweet Jackfruit (Langka)', 'Philippine Islands', '2', '340 g', '24', null, null);
INSERT INTO `products` VALUES ('24', 'PHSJ-24', '4809013825978', 'N', 'Sweet Jackfruit (Langka)', 'Philippine Islands', '2', '680 g', '12', null, null);
INSERT INTO `products` VALUES ('25', 'PHSJ-32', '4809013825985', 'N', 'Sweet Jackfruit (Langka)', 'Philippine Islands', '2', '340 g', '12', null, null);
INSERT INTO `products` VALUES ('26', 'PHWB-12', '4809013825152', 'N', 'Sweet White Beans', 'Philippine Islands', '2', '680 g', '12', null, null);
INSERT INTO `products` VALUES ('27', 'PHWB-32', '4809013825961', 'N', 'Sweet White Beans', 'Philippine Islands', '2', '907 g', '12', null, null);
INSERT INTO `products` VALUES ('28', 'SCV-200', '745621130049', 'N', 'Chinese Vermicelli (Misua)', 'Spring', '1', '200 g', '0', null, null);
INSERT INTO `products` VALUES ('29', 'DBEST-20', '4809010285287', 'N', 'Sotanghon', 'D\'BEST', '1', '20 g', '0', null, null);
INSERT INTO `products` VALUES ('30', 'DBEST-40', '4809010285263', 'N', 'Sotanghon', 'D\'BEST', '1', '40 g', '25', null, null);
INSERT INTO `products` VALUES ('31', 'PHBLR30-454', '4809013825343', 'N', 'Banana Leaves Regular (Dahon ng Saging)', 'Philippine Islands', '3', '454', '30', null, null);
INSERT INTO `products` VALUES ('32', 'PHGCC30-454', '4809013825350', 'N', 'Grated Cassava (Giniling na Kamoteng Kahoy)', 'Philippine Islands', '3', '454', '30', null, null);
INSERT INTO `products` VALUES ('33', 'PHSYC30-454', '4809013825503', 'N', 'Shredded Young Coconut (Kinayod na Buko)', 'Philippine Islands', '3', '454', '30', null, null);
INSERT INTO `products` VALUES ('34', 'DBEST-95', '4809010285225', 'N', 'Sotanghon', 'D\'BEST', '1', '95', '0', null, null);
INSERT INTO `products` VALUES ('35', 'DBEST-250', '4809010285232', 'N', 'Sotanghon', 'D\'BEST', '1', '250', '0', null, null);
INSERT INTO `products` VALUES ('36', 'DBEST-500', '4809010285249', 'N', 'Sotanghon', 'D\'BEST', '1', '500', '0', null, null);
INSERT INTO `products` VALUES ('37', 'DBEST-1000', '4809010285256', 'N', 'Sotanghon', 'D\'BEST', '1', '1000', '0', null, null);
INSERT INTO `products` VALUES ('38', 'EMP-200', '6932889602669', 'N', 'Sotanghon', 'Emperor', '1', '200', '36', null, null);
INSERT INTO `products` VALUES ('39', 'EMP-800', '6932889602805', 'N', 'Sotanghon', 'Emperor', '1', '800', '15', null, null);
INSERT INTO `products` VALUES ('40', 'LLS-50', '4809010285331', 'N', 'Sotanghon', 'Lucky Lungkow', '1', '50', '180', null, null);
INSERT INTO `products` VALUES ('41', 'LLS-500', '4809010285362', 'N', 'Sotanghon', 'Lucky Lungkow', '1', '500', '0', null, null);
INSERT INTO `products` VALUES ('42', 'MBM-227', '4801881538370', 'N', 'Misua', 'Manila\'s Best', '1', '227', '0', null, null);
INSERT INTO `products` VALUES ('43', 'MBP-454', '806840000251', 'N', 'Palabok', 'Manila\'s Best', '1', '454', '25', null, null);
INSERT INTO `products` VALUES ('44', 'MSB-454', '5060127810840', 'N', 'Bihon', 'Masarap!', '1', '454', '25', null, null);
INSERT INTO `products` VALUES ('45', 'JZNR-12', '806840000640', 'N', 'Nata de Coco (Coconut Gel) Red', 'Jonaz', '2', '12', '24', null, null);
INSERT INTO `products` VALUES ('46', 'JZNW-12', '806840000633', 'N', 'Nata de Coco (Coconut Gel) White', 'Jonaz', '2', '12', '24', null, null);
INSERT INTO `products` VALUES ('47', 'PHKG-24', '4809013825886', 'N', 'Sugar Palm Fruit (Kaong) Green', 'Philippine Islands', '2', '24', '12', null, null);
INSERT INTO `products` VALUES ('48', 'PHKG-32', '4809013825893', 'N', 'Sugar Palm Fruit (Kaong) Green', 'Philippine Islands', '2', '32', '12', null, null);
INSERT INTO `products` VALUES ('49', 'PHKW-24', '4809013825251', 'N', 'Sugar Palm Fruit (Kaong) White', 'Philippine Islands', '2', '24', '12', null, null);
INSERT INTO `products` VALUES ('50', 'PHKW-32', '4809013825268', 'N', 'Sugar Palm Fruit (Kaong) White', 'Philippine Islands', '2', '32', '12', null, null);
INSERT INTO `products` VALUES ('51', 'PHNG-12', '4809013825039', 'N', 'Nata de Coco (Coconut Gel) Green', 'Philippine Islands', '2', '12', '24', null, null);
INSERT INTO `products` VALUES ('52', 'PHMAC-12', '4809013825169', 'N', 'Coconut Sports Strings (Macapuno Strings)', 'Philippine Islands', '2', '12', '24', null, null);
INSERT INTO `products` VALUES ('53', 'PHMAC-32', '4809013825220', 'N', 'Coconut Sports Strings (Macapuno Strings)', 'Philippine Islands', '2', '32', '12', null, null);
INSERT INTO `products` VALUES ('54', 'MB24-400', '4809010285881', 'N', 'Gold Bihon', 'Millennium 2000', '1', '400', '24', null, null);
INSERT INTO `products` VALUES ('55', 'TB-1000', '4809010285874', 'N', 'Taiwan Bihon', 'Lion\'s Brand', '1', '1000', '0', null, null);
INSERT INTO `purchaseorder` VALUES ('1', '3', 'ABC100', 'ABC10017-0001', 'ABC10017-0001', '2017-01-18', '0000-00-00', null, 'test', '290', '5.8', '5.68', '5.57', '272.95', '29.24', '243.7', '0', '272.95', '2', '2', '2017-01-17 14:30:05', null);
INSERT INTO `purchaseorder` VALUES ('2', '5', 'BIC ', 'BIC17-0001', 'BIC17-0001', '2017-07-13', '0000-00-00', null, 'test', '1080', '10.8', '10.69', '10.59', '1047.92', '112.28', '935.65', '0', '1047.92', '1', '1', '2017-07-10 11:56:52', null);
INSERT INTO `purchaseorder` VALUES ('3', '5', 'BIC ', 'BIC17-0001', 'BIC17-0001', '2017-07-07', '0000-00-00', null, 'test', '3045', '30.45', '30.15', '29.84', '2954.56', '316.56', '2638', '0', '2954.56', '1', '1', '2017-07-11 17:17:44', null);
INSERT INTO `purchaseorder` VALUES ('4', '5', 'BIC ', 'BIC17-0003', 'BIC17-0003', '2017-07-07', '0000-00-00', null, 'test', '500', '5', '4.95', '4.9', '485.15', '51.98', '433.17', '0', '485.15', '1', '1', '2017-07-11 18:24:09', null);
INSERT INTO `purchaseorder` VALUES ('5', '5', 'BIC ', 'BIC17-0004', 'BIC17-0004', '2017-07-19', '2017-07-18', null, 'test', '750', '7.5', '7.43', '7.35', '727.72', '77.97', '649.75', '0', '727.72', '1', '1', '2017-07-11 18:35:21', null);
INSERT INTO `purchaseorder` VALUES ('6', '5', 'BIC ', 'BIC17-0005', null, '2017-07-13', '2017-07-17', null, 'test', '145', '1.45', '1.44', '1.42', '140.69', '15.07', '125.62', '0', '140.69', '1', '1', '2017-07-17 08:47:54', null);
INSERT INTO `raw_materials` VALUES ('1', '42bc67e2e177e03f6e815741977f86ad.jpg', 'YB-14', 'Yellow Bihon 14 inches', '1', '12', '0', '0', '0', '0', '7', '2017-05-11 18:07:47', '0', '0000-00-00 00:00:00');
INSERT INTO `raw_materials` VALUES ('2', 'LLS1000n1.jpg', 'SR-60', 'Sotanghon Red 60 kg', '1', '1000', '12', '0', '0', '0', '9', '2017-05-24 08:59:39', '0', '0000-00-00 00:00:00');
INSERT INTO `raw_materials` VALUES ('3', 'EMP4002.JPG', 'ES-7', 'Emperor Sotanghon 7 kg', '1', '400', '0', '0', '0', '0', '9', '2017-05-24 09:01:56', '0', '0000-00-00 00:00:00');
INSERT INTO `raw_materials` VALUES ('4', 'aCHG2.jpg', 'PND-GRE', 'Panda Gulaman Green 100s', '1', '20', '2', '0', '0', '0', '9', '2017-06-14 11:26:14', '0', '0000-00-00 00:00:00');
INSERT INTO `raw_materials` VALUES ('5', 'aLLS2501.jpg', 'SR-60', 'Sotanghon Red 60 kg', '1', '250', '50', '0', '0', '0', '9', '2017-05-24 09:01:00', '0', '0000-00-00 00:00:00');
INSERT INTO `raw_materials` VALUES ('6', 'DBEST401.JPG', 'SL-30', 'Sotanghon 30 kg', '1', '40', '25', '0', '0', '0', '9', '2017-05-24 08:59:53', '0', '0000-00-00 00:00:00');
INSERT INTO `raw_materials` VALUES ('7', 'a424cd2afd80ffb37b15c593595bef92.jpg', 'PHKGL-12', 'PH Island Kaong Green 12oz Label', '3', '', '-1', null, null, null, '11', '2017-05-30 14:31:49', '0', '0000-00-00 00:00:00');
INSERT INTO `raw_materials` VALUES ('8', '42bc67e2e177e03f6e815741977f86ad2.jpg', 'PHMSL-12', 'PH Island Macapuno String 12oz Label', '3', '', '1', null, null, null, '11', '2017-05-30 14:37:46', '0', '0000-00-00 00:00:00');
INSERT INTO `raw_materials` VALUES ('9', '278ec41cfc48aca318c3cfaa803a7ddcd87f70aa369deea0c2000ceba936cdf0.jpg', 'PHNRL-12', 'PH Island Nata De Coco Red 12oz Label', '3', '', '1', null, null, null, '11', '2017-05-30 14:39:41', '0', '0000-00-00 00:00:00');
INSERT INTO `raw_materials` VALUES ('10', '725ce6b014fce0d2aa08fe075fcc1c65.jpg', 'PHNWL-24', 'PH Island Nata De Coco White 24oz Label', '3', '', '1', null, null, null, '11', '2017-05-30 14:41:15', '0', '0000-00-00 00:00:00');
INSERT INTO `raw_materials` VALUES ('11', 'a424cd2afd80ffb37b15c593595bef921.jpg', 'PHRMBL-24', 'PH Island Red Mongo Beans 240z Label', '3', '', '1', null, null, null, '11', '2017-05-30 14:43:58', '0', '0000-00-00 00:00:00');
INSERT INTO `raw_materials` VALUES ('12', '42bc67e2e177e03f6e815741977f86ad3.jpg', 'SP-LONG', 'Book Paper Sticker - Long ', '3', '', '1', null, null, null, '11', '2017-06-01 18:13:38', '0', '0000-00-00 00:00:00');
INSERT INTO `raw_materials` VALUES ('13', 'images_(1).jpg', 'K-50', 'K White Sugar 50kg', '2', '50', '1', '0', '0', '0', '11', '2017-06-01 18:25:07', '0', '0000-00-00 00:00:00');
INSERT INTO `raw_materials` VALUES ('14', 'Sigh_this_anime_was_one_of_my_favorite_looking_at__1a5ce2e85b536f98f7c994fbee44ac21-7568.jpg', 'JZKWL-12', 'Jonaz Sugar Palm Fruit White 12oz Label', '3', '', '1', null, null, null, '11', '2017-06-01 18:34:04', '0', '0000-00-00 00:00:00');
INSERT INTO `raw_materials` VALUES ('15', '42bc67e2e177e03f6e815741977f86ad4.jpg', 'JZMACL-12', 'Jonaz Coconut Sports String 12oz Label', '3', '', '1', null, null, null, '11', '2017-06-01 18:35:58', '0', '0000-00-00 00:00:00');
INSERT INTO `raw_materials` VALUES ('16', '42bc67e2e177e03f6e815741977f86ad5.jpg', 'JZNWL-12', 'Jonaz Coconut Gel-White 12oz Label', '3', '', '1', null, null, null, '11', '2017-06-01 18:37:28', '0', '0000-00-00 00:00:00');
INSERT INTO `raw_materials` VALUES ('17', '42bc67e2e177e03f6e815741977f86ad6.jpg', 'JZCJL-12', 'Jonaz Coco Jam 12oz Label', '3', '', '1', null, null, null, '11', '2017-06-01 19:19:57', '0', '0000-00-00 00:00:00');
INSERT INTO `raw_materials` VALUES ('18', '42bc67e2e177e03f6e815741977f86ad7.jpg', 'PSSP-340', 'Napakasarap Sauteed Shrimp Paste 24x340g', '1', '', '1', '0', '0', '0', '11', '2017-06-09 13:00:23', '0', '0000-00-00 00:00:00');
INSERT INTO `raw_materials_type` VALUES ('1', 'Raw Materials', 'Y');
INSERT INTO `raw_materials_type` VALUES ('2', 'Additives', 'Y');
INSERT INTO `raw_materials_type` VALUES ('3', 'Packaging', 'Y');
INSERT INTO `receipt_items` VALUES ('1', 'ARJOHN17-0002', '1', '2', '2', '2017-03-15 16:48:31');
INSERT INTO `receipt_items` VALUES ('2', 'ARJOHN17-0002', '1', '3', '1', '2017-03-15 16:48:32');
INSERT INTO `receipt_items` VALUES ('7', 'ARJOHN17-0002', '4', '2', '3', '2017-03-17 17:28:53');
INSERT INTO `receipt_items` VALUES ('8', 'ARJOHN17-0002', '4', '3', '4', '2017-03-17 17:28:53');
INSERT INTO `receipts` VALUES ('1', 'ARJOHN17-0002', 'test', 'test', 'test', 'test', 'test', null, '2017-03-15 16:48:31');
INSERT INTO `receipts` VALUES ('4', 'ARJOHN17-0002', '17-0002', 'test', 'test', 'test', 'test', null, '2017-03-17 17:28:53');
INSERT INTO `salesorder` VALUES ('1', '1', 'ARJOHN', 'ARJOHN17-0001', 'ARJOHN17-0001', '2017-03-23', 'test', '400', '4', '3.96', '3.92', '388.12', '41.58', '346.54', '0', '388.12', '1', '1', '2017-03-13 10:16:02', null);
INSERT INTO `salesorder` VALUES ('2', '1', 'ARJOHN', 'ARJOHN17-0002', 'ARJOHN17-0002', '2017-03-23', 'test', '1450', '14.5', '14.36', '14.21', '1406.93', '150.74', '1256.19', '0', '1406.93', '1', '1', '2017-03-15 14:32:27', null);
INSERT INTO `salesorder` VALUES ('3', '7', 'MM', 'MM17-0001', 'MM17-0001', '2017-01-06', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '7', '7', '2017-06-09 16:32:00', null);
INSERT INTO `spfreights` VALUES ('1', '3', '2017-01-01', '2017-01-31', '300', 'test', '2017-01-16 13:12:28');
INSERT INTO `splist` VALUES ('1', '3', '2017-01-01', '2017-01-31', 'TEST100', '145', null, null, '0', '2', '2', '2', '2', 'test\r\n', '2017-01-16 13:12:28');
INSERT INTO `splist` VALUES ('2', '5', '2017-07-01', '2017-07-31', 'YB-14', '250', null, null, 'test', '1', '1', '1', '1', 'tets', '2017-07-10 10:56:15');
INSERT INTO `splist` VALUES ('3', '5', '2017-07-01', '2017-07-31', 'SR-60', '145', null, null, 'kg', '1', '1', '1', '1', 'test', '2017-07-10 10:56:19');
INSERT INTO `splist` VALUES ('7', '1', '2017-08-15', '2050-12-01', 'SR-60', '31', '32', '50', 'wx', '1', '1', '1', '1', 'testsure', '2017-08-02 11:35:07');
INSERT INTO `spstat` VALUES ('1', '3', 'Special', 'Consignment', 'No Limit', '', '2017-01-16 13:12:28');
INSERT INTO `spstat` VALUES ('2', '2', 'Special', 'Credit', 'No Limit', '90', '2017-06-09 12:07:04');
INSERT INTO `spstat` VALUES ('3', '6', 'Special', 'Credit', 'No Limit', '60', '2017-06-09 12:52:03');
INSERT INTO `spstat` VALUES ('4', '1', '100000-above', 'Credit', 'No Limit', '4', '2017-07-26 13:52:53');
INSERT INTO `spstat` VALUES ('5', '5', 'Special', 'Consignment', 'No Limit', '', '2017-07-10 09:16:55');
INSERT INTO `users` VALUES ('1', '127.0.0.1', 'admin', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', null, null, '51JO4dSgiDG6bNW1cTGtvO', '1268889823', '1501733324', '1', 'Ar', 'John', 'ADMIN', '0');
INSERT INTO `users` VALUES ('2', '127.0.0.1', 'arjohn', '$2y$08$gS283kojHwGb7TIsf0rAIOM7WBOuX2yX5v3x.l7scAw.ZYaJ0SzwG', null, 'arjohn@admin.com', null, 'BhhPDqLczShZsuoTGgQv6.cc7a2757ba5a9fe53f', '1475979873', null, '1475978926', '1484631477', '1', 'Arjohn', 'Quijano', 'lucky88', '1234567890');
INSERT INTO `users` VALUES ('3', '::1', 'heirocks', '$2y$08$fD.TQZMbjWiXn7IXdXGW5.K.w9fBPf7DgngS1qhY2/8XI9aWba8Ly', null, 'heiro.adriano@gmail.com', null, null, null, null, '1476098689', '1476188257', '1', 'Heiro', 'Adriano', 'admin', '09123456789');
INSERT INTO `users` VALUES ('4', '::1', 'mainadmin', '$2y$08$u98f96aBHCwPSUVhON3vRuQbV9PCv2F9MIce1vfVooa179LLzLoQ2', null, 'main@local.host', null, null, null, null, '1492413639', '1492413741', '1', 'Main', 'Admin', 'lucky888', '123456789');
INSERT INTO `users` VALUES ('5', '::1', 'vrvillaruz@lucky888food.com', '$2y$08$/9yJSp5hfC3lGASFTHb2COh020t1KEEhpa191Fez26eZX90Obxh1C', null, 'vrvillaruz@lucky888food.com', null, null, null, 'PpWcdJxu0SzZeHmS/ZFB2u', '1492786598', '1493041919', '1', 'Virginia', 'Villaruz', 'Lucky 888 Food International, Inc.', '287-47-63');
INSERT INTO `users` VALUES ('6', '::1', 'pyeung@lucky888food.com', '$2y$08$p9mGyJhBBqB4nYpMIk8BIe/r.5k.TQJv1ysDiL.M6F2DxQ9v7oDGG', null, 'pyeung@lucky888food.com', null, null, null, null, '1493041509', '1493041774', '1', 'Perlinda', 'Yeung', 'Lucky 888 Food International, Inc.', '9853790');
INSERT INTO `users` VALUES ('7', '112.210.132.251', 'klyeung@lucky888food.com', '$2y$08$xhMAcLSDjpm7.Owd31WJkeO8alb6YY4Ws2BeDWv4.4femo.t9BKNq', null, 'klyeung@lucky888food.com', null, null, null, null, '1493042644', '1496453535', '1', 'Karen', 'Yeung', 'Lucky 888 Food International, Inc.', '7754410');
INSERT INTO `users` VALUES ('8', '112.210.132.251', 'jmserive@lucky888food.com', '$2y$08$pUITMjSCoUOCgFzSbrtUPOqCwcdGzRZNLQ9CniaDclg27sG.eo1wq', null, 'jmserive@lucky888food.com', null, null, null, null, '1493047663', null, '1', 'Jeanelle Mildred', 'Erive', 'Lucky 888 Food International, Inc.', '3617773');
INSERT INTO `users` VALUES ('9', '112.210.132.251', 'mgnabapo@lucky888food.com', '$2y$08$YC3gQ1DczEJtQx8Q3HkjsOMJ40gQKE9bZU85R5ji4vbL0/mSpcWry', null, 'mgnabapo@lucky888food.com', null, null, null, null, '1493196253', '1496019142', '1', 'Mitsy Glade', 'Abapo', 'Lucky 888 Food International, Inc.', '362-10-23');
INSERT INTO `users` VALUES ('10', '122.53.231.115', 'kathylimyeung@lucky888food.com', '$2y$08$szzZm..r3Hi0d0QeaXMx4.UygCIDXAhmYcP1hv8j/lABil8GqFVPq', null, 'kathylimyeung@lucky888food.com', null, null, null, null, '1493873275', null, '1', 'Kathy', 'Yeung', 'Lucky 888 Food International, Inc.', '3617773');
INSERT INTO `users` VALUES ('11', '112.202.175.101', 'mpmaceda@lucky888food.com', '$2y$08$0IuMDV0X4faQANhX2Wt7MOzah.3t4lzMCOPN3J8HBp73msCOUtJgK', null, 'mpmaceda@lucky888food.com', null, null, null, null, '1494396056', '1497326092', '1', 'Manilyn', 'Maceda', 'Lucky 888 Food International, Inc.', '2874763');
INSERT INTO `users_groups` VALUES ('3', '1', '1');
INSERT INTO `users_groups` VALUES ('4', '1', '2');
INSERT INTO `users_groups` VALUES ('6', '2', '1');
INSERT INTO `users_groups` VALUES ('7', '2', '2');
INSERT INTO `users_groups` VALUES ('9', '3', '1');
INSERT INTO `users_groups` VALUES ('10', '3', '2');
INSERT INTO `users_groups` VALUES ('12', '4', '1');
INSERT INTO `users_groups` VALUES ('13', '4', '2');
INSERT INTO `users_groups` VALUES ('27', '5', '1');
INSERT INTO `users_groups` VALUES ('28', '5', '2');
INSERT INTO `users_groups` VALUES ('24', '6', '1');
INSERT INTO `users_groups` VALUES ('25', '6', '2');
INSERT INTO `users_groups` VALUES ('22', '7', '1');
INSERT INTO `users_groups` VALUES ('23', '7', '2');
INSERT INTO `users_groups` VALUES ('30', '8', '1');
INSERT INTO `users_groups` VALUES ('31', '8', '2');
INSERT INTO `users_groups` VALUES ('38', '9', '2');
INSERT INTO `users_groups` VALUES ('37', '10', '2');
INSERT INTO `users_groups` VALUES ('39', '11', '2');
