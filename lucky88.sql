-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2017 at 09:54 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lucky88`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
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
  `up_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `comp_code`, `contact_type`, `agent`, `comp_name`, `payable_to`, `address`, `area`, `tin_num`, `cont_pers`, `telephone`, `mob_no`, `other_telephone`, `fax_num`, `email`, `website`, `prepared_by`, `update_by`, `prep_date`, `up_date`) VALUES
(1, 'ARJOHN', 'Customer', '', 'Arjohn Group of Companies', 'test', 'test', 'Area1', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'admin', 'admin', '0000-00-00', '2016-11-02'),
(2, 'RRX', 'Both', '', 'RRX Subsidiary of Arjohn Corp. ', 'Arjohn Quijano', 'Quijano St.', 'Area1', '12345678', 'Arjohn QUijano', '123', '123456789', '123', '123456789', 'arjohn.official@gmail.com', 'argofc.com', 'admin', NULL, '2016-11-02', NULL),
(3, 'ABC100', 'Supplier', '', 'Abaca 100', 'Arjohn', 'Planet Mars', 'Area1', '7894561230', 'Arjohn', '123456879', '0123456789', '123456789', '123456789', 'arjohn@abaca100.com', 'www.abaca100.com', 'arjohn', NULL, '2017-01-13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cpfreights`
--

CREATE TABLE `cpfreights` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `charge` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cpfreights`
--

INSERT INTO `cpfreights` (`id`, `contact_id`, `start_date`, `end_date`, `charge`, `remarks`, `date_submitted`) VALUES
(1, 1, '2016-11-22', '2016-11-29', '21', 'test', '2016-11-17 17:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `cplist`
--

CREATE TABLE `cplist` (
  `id` int(11) NOT NULL,
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
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cplist`
--

INSERT INTO `cplist` (`id`, `contact_id`, `start_date`, `end_date`, `product_id`, `price`, `unit`, `less1`, `less2`, `less3`, `disperbundle`, `remarks`, `date_modified`) VALUES
(4, 1, '2016-12-01', '2016-12-31', 'TEST100', 20, 20, 2, 5, 2, 2, 'test\r\n', '2016-12-15 03:42:27'),
(5, 1, '2016-12-01', '2016-12-31', 'BGARJOHN', 200, 20, 2, 5, 2, 20, 'test', '2016-12-15 03:42:27'),
(6, 2, '2016-12-01', '2016-12-31', 'BGARJOHN', 300, 0, 20, 20, 20, 5, 'test', '2016-12-08 04:02:13'),
(7, 1, '2017-01-01', '2017-01-31', 'TEST100', 125, 0, 4, 4, 4, 4, 'test', '2017-01-03 06:51:19'),
(8, 2, '2017-01-01', '2017-01-31', 'TEST100', 130, 0, 4, 4, 4, 4, 'test', '2017-01-03 06:51:24'),
(9, 2, '2017-01-01', '2017-01-31', 'BGARJOHN', 145, 0, 4, 4, 4, 4, 'test', '2017-01-03 06:49:57'),
(10, 1, '2017-01-01', '2017-01-31', 'BGARJOHN', 160, 0, 4, 4, 4, 4, 'test', '2017-01-03 06:50:18'),
(11, 1, '2017-03-01', '2017-03-31', 'TEST100', 200, 0, 1, 1, 1, 0, 'test', '2017-03-13 02:15:38'),
(12, 1, '2017-03-01', '2017-03-31', 'BGARJOHN', 525, 2, 2, 2, 2, 2, 'test', '2017-03-15 06:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `cpstat`
--

CREATE TABLE `cpstat` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `terms` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `limitation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `days` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cpstat`
--

INSERT INTO `cpstat` (`id`, `contact_id`, `category`, `terms`, `limitation`, `days`, `date_modified`) VALUES
(8, 1, '5000-50000', 'Cash Advance', 'No Limit', '', '2016-12-01 03:45:23'),
(9, 2, 'Special', 'Consignment', 'No Limit', '', '2016-12-08 04:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
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
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `soid` int(11) NOT NULL,
  `product_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contact_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `amount` double NOT NULL,
  `less1` int(11) NOT NULL,
  `less2` int(11) NOT NULL,
  `less3` int(11) NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `soid`, `product_code`, `contact_id`, `qty`, `unit`, `price`, `amount`, `less1`, `less2`, `less3`, `date_submitted`) VALUES
(1, 1, 'TEST100', 1, 2, '2', 200, 1, 1, 1, 1, '2017-03-13 02:16:02'),
(2, 2, 'BGARJOHN', 1, 5, '2', 525, 2, 2, 2, 2, '2017-03-15 06:32:28'),
(3, 2, 'TEST100', 1, 5, '2', 200, 1, 1, 1, 1, '2017-03-15 06:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `porder_items`
--

CREATE TABLE `porder_items` (
  `id` int(11) NOT NULL,
  `soid` int(11) NOT NULL,
  `product_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contact_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `amount` double NOT NULL,
  `less1` int(11) NOT NULL,
  `less2` int(11) NOT NULL,
  `less3` int(11) NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `porder_items`
--

INSERT INTO `porder_items` (`id`, `soid`, `product_code`, `contact_id`, `qty`, `unit`, `price`, `amount`, `less1`, `less2`, `less3`, `date_submitted`) VALUES
(1, 1, 'TEST100', 3, 2, '2', 145, 2, 2, 2, 2, '2017-01-17 06:30:05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bar_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prod_type` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prod_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand_name` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prod_cat` int(11) DEFAULT NULL,
  `prod_weight` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prod_pcs` int(11) DEFAULT NULL,
  `prepared_by` int(11) DEFAULT NULL,
  `last_edited_by` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_code`, `bar_code`, `prod_type`, `prod_name`, `brand_name`, `prod_cat`, `prod_weight`, `prod_pcs`, `prepared_by`, `last_edited_by`) VALUES
(1, 'TEST100', '100', 'N', 'TEST PRODUCT', 'TEST', 4, '20', 20, NULL, NULL),
(2, 'BGARJOHN', '00009', 'N', 'BIG ARJOHN XXX ', 'BRANDED XX', 1, '20', 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`cat_id`, `cat_title`) VALUES
(1, 'Noodles'),
(2, 'Bottled Preserve'),
(3, 'Traded - Food'),
(4, 'Traded - Non Food');

-- --------------------------------------------------------

--
-- Table structure for table `product_ingredients`
--

CREATE TABLE `product_ingredients` (
  `ing_id` int(11) NOT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `ing_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ing_qty` int(11) DEFAULT NULL,
  `ing_unit` int(11) DEFAULT NULL,
  `ing_material` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ing_startDate` date DEFAULT NULL,
  `ing_endDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_unit`
--

CREATE TABLE `product_unit` (
  `unit_id` int(11) NOT NULL,
  `unit` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_unit`
--

INSERT INTO `product_unit` (`unit_id`, `unit`) VALUES
(1, 'grams/s'),
(2, 'pc/s');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorder`
--

CREATE TABLE `purchaseorder` (
  `id` int(11) NOT NULL,
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
  `date_modified` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `purchaseorder`
--

INSERT INTO `purchaseorder` (`id`, `contact_id`, `comp_code`, `cpoNum`, `poNum`, `date_ordered`, `remarks`, `grosstotal`, `dis1less`, `dis2less`, `dis3less`, `netSales`, `lessVAT12`, `amountNetVAT`, `pwdDis`, `totalAmountDue`, `preparedby`, `lasteditby`, `date_submitted`, `date_modified`) VALUES
(1, 3, 'ABC100', 'ABC10017-0001', 'ABC10017-0001', '2017-01-18', 'test', 290, 5.8, 5.68, 5.57, 272.95, 29.24, 243.7, 0, 272.95, 2, 2, '2017-01-17 06:30:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `raw_materials`
--

CREATE TABLE `raw_materials` (
  `material_id` int(11) NOT NULL,
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
  `last_edited_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `raw_materials`
--

INSERT INTO `raw_materials` (`material_id`, `rm_img`, `rm_code`, `rm_name`, `rm_type`, `rm_weight`, `rm_pcs`, `rm_di_length`, `rm_di_width`, `rm_di_height`, `prepared_by`, `prepared_date`, `last_edited`, `last_edited_date`) VALUES
(1, 'images.png', 'Cor1002', 'Corazon', 3, '2', 2, 2, 2, 3, 1, '2016-10-15 07:46:07', 0, '2016-10-14 19:45:33'),
(2, 'large2.jpg', 'asqwe', 'qwe', 2, '22', 3, 0, 0, 0, 1, '2016-10-14 20:31:39', 0, '0000-00-00 00:00:00'),
(3, '10_VERMICELLI_60_kg_PHOTO.JPG', 'SR-60', '???? Sotanghon Red 60 kilos', 1, '60', 0, 0, 0, 0, 1, '2016-10-21 03:34:24', 0, '0000-00-00 00:00:00'),
(4, 'item-banner.png', 'GPM100', '普通大件 test', 2, '20', 20, 0, 0, 0, 1, '2016-11-28 02:32:07', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `raw_materials_type`
--

CREATE TABLE `raw_materials_type` (
  `rmt_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_show` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `raw_materials_type`
--

INSERT INTO `raw_materials_type` (`rmt_id`, `title`, `is_show`) VALUES
(1, 'Raw Materials', 'Y'),
(2, 'Additives', 'Y'),
(3, 'Packaging', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int(11) NOT NULL,
  `ponum` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dlvnum` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sinum` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `drnum` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `smallnum` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `date_modified` timestamp NULL DEFAULT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `ponum`, `dlvnum`, `sinum`, `drnum`, `smallnum`, `notes`, `date_modified`, `date_submitted`) VALUES
(1, 'ARJOHN17-0002', 'test', 'test', 'test', 'test', 'test', NULL, '2017-03-15 08:48:31'),
(4, 'ARJOHN17-0002', '17-0002', 'test', 'test', 'test', 'test', NULL, '2017-03-17 09:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_items`
--

CREATE TABLE `receipt_items` (
  `id` int(11) NOT NULL,
  `cpo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `loaded` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `receipt_items`
--

INSERT INTO `receipt_items` (`id`, `cpo`, `receipt_id`, `item_id`, `loaded`, `date_submitted`) VALUES
(1, 'ARJOHN17-0002', 1, 2, '2', '2017-03-15 08:48:31'),
(2, 'ARJOHN17-0002', 1, 3, '1', '2017-03-15 08:48:32'),
(7, 'ARJOHN17-0002', 4, 2, '3', '2017-03-17 09:28:53'),
(8, 'ARJOHN17-0002', 4, 3, '4', '2017-03-17 09:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `receivingwh`
--

CREATE TABLE `receivingwh` (
  `id` int(11) NOT NULL,
  `comp_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `refno` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `remarks` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `received_by` int(11) NOT NULL,
  `prepared_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receivingwh_items`
--

CREATE TABLE `receivingwh_items` (
  `id` int(11) NOT NULL,
  `refno` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `item_id` int(11) NOT NULL,
  `loaded` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salesorder`
--

CREATE TABLE `salesorder` (
  `id` int(11) NOT NULL,
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
  `date_modified` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salesorder`
--

INSERT INTO `salesorder` (`id`, `contact_id`, `comp_code`, `cpoNum`, `poNum`, `date_ordered`, `remarks`, `grosstotal`, `dis1less`, `dis2less`, `dis3less`, `netSales`, `lessVAT12`, `amountNetVAT`, `pwdDis`, `totalAmountDue`, `preparedby`, `lasteditby`, `date_submitted`, `date_modified`) VALUES
(1, 1, 'ARJOHN', 'ARJOHN17-0001', 'ARJOHN17-0001', '2017-03-23', 'test', 400, 4, 3.96, 3.92, 388.12, 41.58, 346.54, 0, 388.12, 1, 1, '2017-03-13 02:16:02', NULL),
(2, 1, 'ARJOHN', 'ARJOHN17-0002', 'ARJOHN17-0002', '2017-03-23', 'test', 1450, 14.5, 14.36, 14.21, 1406.93, 150.74, 1256.19, 0, 1406.93, 1, 1, '2017-03-15 06:32:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spfreights`
--

CREATE TABLE `spfreights` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `charge` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `spfreights`
--

INSERT INTO `spfreights` (`id`, `contact_id`, `start_date`, `end_date`, `charge`, `remarks`, `date_submitted`) VALUES
(1, 3, '2017-01-01', '2017-01-31', '300', 'test', '2017-01-16 05:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `splist`
--

CREATE TABLE `splist` (
  `id` int(11) NOT NULL,
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
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `splist`
--

INSERT INTO `splist` (`id`, `contact_id`, `start_date`, `end_date`, `product_id`, `price`, `unit`, `less1`, `less2`, `less3`, `disperbundle`, `remarks`, `date_modified`) VALUES
(1, 3, '2017-01-01', '2017-01-31', 'TEST100', 145, 0, 2, 2, 2, 2, 'test\r\n', '2017-01-16 05:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `spstat`
--

CREATE TABLE `spstat` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `terms` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `limitation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `days` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `spstat`
--

INSERT INTO `spstat` (`id`, `contact_id`, `category`, `terms`, `limitation`, `days`, `date_modified`) VALUES
(1, 3, 'Special', 'Consignment', 'No Limit', '', '2017-01-16 05:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `activation_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_password_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'admin', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1491791707, 1, 'Ar', 'John', 'ADMIN', '0'),
(2, '127.0.0.1', 'arjohn', '$2y$08$gS283kojHwGb7TIsf0rAIOM7WBOuX2yX5v3x.l7scAw.ZYaJ0SzwG', NULL, 'arjohn@admin.com', NULL, 'BhhPDqLczShZsuoTGgQv6.cc7a2757ba5a9fe53f', 1475979873, NULL, 1475978926, 1484631477, 1, 'Arjohn', 'Quijano', 'lucky88', '1234567890'),
(3, '::1', 'heirocks', '$2y$08$fD.TQZMbjWiXn7IXdXGW5.K.w9fBPf7DgngS1qhY2/8XI9aWba8Ly', NULL, 'heiro.adriano@gmail.com', NULL, NULL, NULL, NULL, 1476098689, 1476188257, 1, 'Heiro', 'Adriano', 'admin', '09123456789');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(3, 1, 1),
(4, 1, 2),
(6, 2, 1),
(7, 2, 2),
(9, 3, 1),
(10, 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `cpfreights`
--
ALTER TABLE `cpfreights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cplist`
--
ALTER TABLE `cplist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cpstat`
--
ALTER TABLE `cpstat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `Unique` (`employee_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `porder_items`
--
ALTER TABLE `porder_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `product_ingredients`
--
ALTER TABLE `product_ingredients`
  ADD PRIMARY KEY (`ing_id`);

--
-- Indexes for table `product_unit`
--
ALTER TABLE `product_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raw_materials`
--
ALTER TABLE `raw_materials`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `raw_materials_type`
--
ALTER TABLE `raw_materials_type`
  ADD PRIMARY KEY (`rmt_id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt_items`
--
ALTER TABLE `receipt_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receivingwh`
--
ALTER TABLE `receivingwh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receivingwh_items`
--
ALTER TABLE `receivingwh_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesorder`
--
ALTER TABLE `salesorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spfreights`
--
ALTER TABLE `spfreights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `splist`
--
ALTER TABLE `splist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spstat`
--
ALTER TABLE `spstat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cpfreights`
--
ALTER TABLE `cpfreights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cplist`
--
ALTER TABLE `cplist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `cpstat`
--
ALTER TABLE `cpstat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `porder_items`
--
ALTER TABLE `porder_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product_ingredients`
--
ALTER TABLE `product_ingredients`
  MODIFY `ing_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_unit`
--
ALTER TABLE `product_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `raw_materials`
--
ALTER TABLE `raw_materials`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `raw_materials_type`
--
ALTER TABLE `raw_materials_type`
  MODIFY `rmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `receipt_items`
--
ALTER TABLE `receipt_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `receivingwh`
--
ALTER TABLE `receivingwh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `receivingwh_items`
--
ALTER TABLE `receivingwh_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salesorder`
--
ALTER TABLE `salesorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `spfreights`
--
ALTER TABLE `spfreights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `splist`
--
ALTER TABLE `splist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `spstat`
--
ALTER TABLE `spstat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
