-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2016 at 01:24 AM
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
  `comp_code` varchar(250) DEFAULT NULL,
  `contact_type` varchar(250) DEFAULT NULL,
  `agent` varchar(250) DEFAULT NULL,
  `comp_name` varchar(250) DEFAULT NULL,
  `payable_to` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `area` varchar(250) DEFAULT NULL,
  `tin_num` varchar(250) DEFAULT NULL,
  `cont_pers` varchar(250) DEFAULT NULL,
  `telephone` varchar(250) DEFAULT NULL,
  `mob_no` varchar(250) DEFAULT NULL,
  `other_telephone` varchar(250) DEFAULT NULL,
  `fax_num` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `website` varchar(250) DEFAULT NULL,
  `prepared_by` varchar(250) DEFAULT NULL,
  `update_by` varchar(250) DEFAULT NULL,
  `prep_date` date DEFAULT NULL,
  `up_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `comp_code`, `contact_type`, `agent`, `comp_name`, `payable_to`, `address`, `area`, `tin_num`, `cont_pers`, `telephone`, `mob_no`, `other_telephone`, `fax_num`, `email`, `website`, `prepared_by`, `update_by`, `prep_date`, `up_date`) VALUES
(1, 'ARJOHN', 'Customer', '', 'Arjohn Group of Companies', 'test', 'test', 'Area1', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'admin', 'admin', '0000-00-00', '2016-11-02'),
(2, 'RRX', 'Both', '', 'RRX Subsidiary of Arjohn Corp. ', 'Arjohn Quijano', 'Quijano St.', 'Area1', '12345678', 'Arjohn QUijano', '123', '123456789', '123', '123456789', 'arjohn.official@gmail.com', 'argofc.com', 'admin', NULL, '2016-11-02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cplist`
--

CREATE TABLE `cplist` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(20) NOT NULL,
  `unit` int(11) NOT NULL,
  `less1` int(11) DEFAULT NULL,
  `less2` int(11) DEFAULT NULL,
  `less3` int(11) DEFAULT NULL,
  `disperbundle` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cpstat`
--

CREATE TABLE `cpstat` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `terms` varchar(100) NOT NULL,
  `limitation` varchar(100) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `employee_id` varchar(15) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `agency` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `hired_date` date DEFAULT NULL,
  `sss` varchar(255) DEFAULT NULL,
  `philhealth` varchar(255) DEFAULT NULL,
  `pagibig` varchar(255) DEFAULT NULL,
  `termination` date DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `product_unit`
--

CREATE TABLE `product_unit` (
  `unit_id` int(11) NOT NULL,
  `unit` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_unit`
--

INSERT INTO `product_unit` (`unit_id`, `unit`) VALUES
(1, 'grams/s'),
(2, 'pc/s');

-- --------------------------------------------------------

--
-- Table structure for table `raw_materials`
--

CREATE TABLE `raw_materials` (
  `material_id` int(11) NOT NULL,
  `rm_img` text,
  `rm_code` varchar(20) NOT NULL,
  `rm_name` text NOT NULL,
  `rm_type` int(11) NOT NULL,
  `rm_weight` varchar(10) NOT NULL,
  `rm_pcs` int(11) NOT NULL,
  `rm_di_length` int(10) DEFAULT NULL,
  `rm_di_width` int(10) DEFAULT NULL,
  `rm_di_height` int(10) DEFAULT NULL,
  `prepared_by` int(11) NOT NULL,
  `prepared_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_edited` int(11) NOT NULL,
  `last_edited_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raw_materials`
--

INSERT INTO `raw_materials` (`material_id`, `rm_img`, `rm_code`, `rm_name`, `rm_type`, `rm_weight`, `rm_pcs`, `rm_di_length`, `rm_di_width`, `rm_di_height`, `prepared_by`, `prepared_date`, `last_edited`, `last_edited_date`) VALUES
(1, 'images.png', 'Cor1002', 'Corazon', 3, '2', 2, 2, 2, 3, 1, '2016-10-15 07:46:07', 0, '2016-10-14 19:45:33'),
(2, 'large2.jpg', 'asqwe', 'qwe', 2, '22', 3, 0, 0, 0, 1, '2016-10-14 20:31:39', 0, '0000-00-00 00:00:00'),
(3, '10_VERMICELLI_60_kg_PHOTO.JPG', 'SR-60', '???? Sotanghon Red 60 kilos', 1, '60', 0, 0, 0, 0, 1, '2016-10-21 03:34:24', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `raw_materials_type`
--

CREATE TABLE `raw_materials_type` (
  `rmt_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `is_show` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raw_materials_type`
--

INSERT INTO `raw_materials_type` (`rmt_id`, `title`, `is_show`) VALUES
(1, 'Raw Materials', 'Y'),
(2, 'Additives', 'Y'),
(3, 'Packaging', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `salesorder`
--

CREATE TABLE `salesorder` (
  `id` int(11) NOT NULL,
  `cpoNum` varchar(50) NOT NULL,
  `poNum` varchar(50) NOT NULL,
  `contactID` int(11) NOT NULL,
  `date_ordered` date NOT NULL,
  `remarks` text NOT NULL,
  `preparedby` int(11) NOT NULL,
  `lasteditby` int(11) NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesorder`
--

INSERT INTO `salesorder` (`id`, `cpoNum`, `poNum`, `contactID`, `date_ordered`, `remarks`, `preparedby`, `lasteditby`, `date_submitted`, `date_modified`) VALUES
(1, '11111', '111', 1, '2016-11-01', 'test', 11, 11, '2016-11-09 22:09:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'admin', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1478710386, 1, 'Ar', 'John', 'ADMIN', '0'),
(2, '127.0.0.1', 'arjohn', '$2y$08$gS283kojHwGb7TIsf0rAIOM7WBOuX2yX5v3x.l7scAw.ZYaJ0SzwG', NULL, 'arjohn@admin.com', NULL, 'BhhPDqLczShZsuoTGgQv6.cc7a2757ba5a9fe53f', 1475979873, NULL, 1475978926, 1477604771, 1, 'Arjohn', 'Quijano', 'lucky88', '1234567890'),
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
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `product_unit`
--
ALTER TABLE `product_unit`
  ADD PRIMARY KEY (`unit_id`);

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
-- Indexes for table `salesorder`
--
ALTER TABLE `salesorder`
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
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cplist`
--
ALTER TABLE `cplist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cpstat`
--
ALTER TABLE `cpstat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product_unit`
--
ALTER TABLE `product_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `raw_materials`
--
ALTER TABLE `raw_materials`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `raw_materials_type`
--
ALTER TABLE `raw_materials_type`
  MODIFY `rmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `salesorder`
--
ALTER TABLE `salesorder`
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
