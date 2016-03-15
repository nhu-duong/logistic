-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2016 at 01:36 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `logistic`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `short_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_buyer` tinyint(4) NOT NULL DEFAULT '0',
  `is_seller` tinyint(4) NOT NULL DEFAULT '0',
  `is_agent` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table contain information of seller, buyer, agent' AUTO_INCREMENT=16 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `name`, `short_name`, `address`, `email`, `phone`, `fax`, `is_buyer`, `is_seller`, `is_agent`, `created_at`, `updated_at`) VALUES
(1, 'Buyer 1 updated', 'short1', 'dia chi cua khach hang 1', 'buyer1@logistic.com', '098632', '098345632', 1, 0, 0, '2015-08-08 19:58:38', '2016-01-07 18:09:29'),
(2, 'Seller 1', 'sellershortname', 'dia chi cua nguoi ban 1', 'seller1@logistic.com', '098456', '0293520395', 0, 1, 0, '2015-08-08 20:00:41', '2015-08-08 20:00:41'),
(3, 'Both buyer and seller', 'buyandsell', 'Address of this buyer and seller', 'buyandsell@logistic.com', '0945723', '09342523', 1, 1, 0, '2015-08-08 20:01:26', '2015-08-08 20:01:26'),
(4, 'Test seller', 'updated-test-seller', '64 144 Ben Tre', 'duongtannhu@yahoo.com', '04327840923', '032947', 1, 1, 0, '2015-12-15 16:40:14', '2016-01-26 16:47:36'),
(11, 'Buyeronly', NULL, 'l;sadkfj', 'lsdjf@lksdjf.coj', '329873', '2309875923', 1, 0, 0, '2015-12-16 17:27:14', '2015-12-16 17:27:14'),
(12, 'Seller only', NULL, 'as;ldfj', 'lasdjf@dosif.sdlkf', '320', '02450', 0, 1, 0, '2015-12-16 17:27:38', '2015-12-17 00:28:22'),
(13, 'Seller only 1', NULL, 'sdl;afkj', '.as,dfn@lksdjf.sldfkj', '20398302', '23958', 0, 1, 0, '2015-12-16 17:29:45', '2015-12-16 17:29:45'),
(15, 'Duong Tan Nhu', '2 Nhu', '64 144 Ben Tre', 'duongtannhu@yahoo.com', '0987634623', '093452832579', 1, 0, 0, '2016-03-14 14:19:07', '2016-03-14 14:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE IF NOT EXISTS `agents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `name`, `address`, `city`, `country`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Agent 1', '15 Pastuer', 'Manila', 'Philippin', '987651312', NULL, '2015-08-07 22:11:56', '2015-08-07 22:11:56'),
(2, 'Agent 2', '432 Nguyen Hue', 'Bang Coc', 'Thai Lan', '095113248', NULL, '2015-08-08 19:53:09', '2015-08-08 19:53:09'),
(3, 'Agent Test', 'lakdfj;', NULL, NULL, '238732', 'abc@yahoo.com', '2015-12-16 17:06:03', '2015-12-16 17:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `file_name` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `mime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `order_id`, `file_name`, `mime`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 8, 'Before-After_Maintenance_Report_151225.docx', 'application/vnd.openxmlformats-officedocument.word', 1, '2016-01-07 10:21:30', '2016-01-07 10:21:30'),
(3, 8, '1601083_292309747631075_4422712696992603027_n.jpg', 'image/jpeg', 1, '2016-01-07 10:21:44', '2016-01-07 10:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `containers`
--

CREATE TABLE IF NOT EXISTS `containers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `container_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `seal_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cont_type` int(11) DEFAULT NULL,
  `packages` int(11) NOT NULL,
  `weight` decimal(10,0) NOT NULL,
  `volume` decimal(10,0) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `shipping_marks` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `containers`
--

INSERT INTO `containers` (`id`, `order_id`, `container_no`, `seal_no`, `cont_type`, `packages`, `weight`, `volume`, `description`, `shipping_marks`, `created_at`, `updated_at`) VALUES
(1, 8, 'CON123', 'SEAL432', 20, 1, '2', '3', 'description', 'marks', '2015-12-28 16:36:42', '2015-12-28 16:36:42'),
(5, 8, 'CON234', 'SEALx', 40, 4, '3', '2', 'No des', 'NM', '2016-01-07 09:28:39', '2016-01-07 09:28:39');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `short_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `house_bill_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `master_bill_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `order_type` tinyint(4) NOT NULL DEFAULT '1',
  `seller_id` int(11) DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `remote_agent` int(11) DEFAULT NULL,
  `description_of_goods` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ship_id` int(11) DEFAULT NULL,
  `shipment_ship_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipment_voyage` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre_carriage_by` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipment_container_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipment_seal_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipment_type` int(11) NOT NULL,
  `loading_port_id` int(11) DEFAULT NULL,
  `discharging_port_id` int(11) DEFAULT NULL,
  `place_of_delivery` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `place_of_receipt` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `freight_payable_at` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number_of_original_bs_l` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marks` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fee_ocean_freight` float NOT NULL DEFAULT '0',
  `fee_do` int(11) NOT NULL DEFAULT '0',
  `fee_thc` int(11) NOT NULL DEFAULT '0',
  `fee_cic` int(11) NOT NULL DEFAULT '0',
  `fee_cleaning` int(11) NOT NULL DEFAULT '0',
  `fee_handling` int(11) NOT NULL DEFAULT '0',
  `exchange_rate` float NOT NULL DEFAULT '1',
  `description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_description` varchar(200) CHARACTER SET utf16 COLLATE utf16_unicode_ci DEFAULT NULL,
  `truck_id` int(11) DEFAULT NULL,
  `trucking_service_type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `arrival_digital` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_person` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `commercial_invoice_no` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipped_onboard_date` date DEFAULT NULL,
  `arrival_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `quotation_date` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `house_bill_no` (`house_bill_no`,`master_bill_no`),
  KEY `order_type` (`order_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `house_bill_no`, `master_bill_no`, `order_type`, `seller_id`, `buyer_id`, `remote_agent`, `description_of_goods`, `ship_id`, `shipment_ship_name`, `shipment_voyage`, `pre_carriage_by`, `shipment_container_no`, `shipment_seal_no`, `shipment_type`, `loading_port_id`, `discharging_port_id`, `place_of_delivery`, `place_of_receipt`, `freight_payable_at`, `number_of_original_bs_l`, `marks`, `fee_ocean_freight`, `fee_do`, `fee_thc`, `fee_cic`, `fee_cleaning`, `fee_handling`, `exchange_rate`, `description`, `short_description`, `truck_id`, `trucking_service_type`, `arrival_digital`, `contact_person`, `customer_type`, `commercial_invoice_no`, `shipped_onboard_date`, `arrival_date`, `delivery_date`, `quotation_date`, `created_at`, `updated_at`) VALUES
(1, '', '', 1, 1, 1, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, 'marks value', 11, 12, 13, 14, 15, 16, 1, 'description value', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-08-08 15:23:53', '2015-08-20 00:32:35'),
(2, 'house no', 'master no', 1, 1, 1, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, 'marks text values', 1.34, 1, 0, 0, 0, 0, 1, 'description value', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-08-19 15:54:37', '2015-08-20 00:32:40'),
(3, 'houseno', 'master', 2, 3, 1, 2, '', 2, NULL, 'shipment voyage', NULL, NULL, NULL, 0, 3, 2, 'place of delivery value Bến Tre', 'place of recipe value', '2', NULL, 'marks value', 1, 2, 3, 4, 5, 6, 1, 'description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-08-11', '2015-08-17', NULL, NULL, '2015-08-19 16:55:08', '2015-08-27 16:43:40'),
(5, 'newhouse', 'newmaster', 0, 2, 1, 1, '', 1, NULL, 'voy', NULL, 'connumber1', 'sealno1', 0, 1, 3, 'def', 'abc', '1', NULL, 'marks', 2, 3, 4, 5, 6, 7, 1, 'description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-08-21', '2015-08-22', NULL, NULL, '2015-08-27 16:46:35', '2015-09-04 15:55:41'),
(6, 'asdfgh', '123456', 0, 2, 3, 1, '', 2, NULL, '', NULL, 'contno', 'sealno', 0, 1, 2, 'VN', 'Anh', '2', NULL, '', 1234570, 0, 0, 0, 0, 0, 1, 'Mo ta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-09-09', '2015-09-23', NULL, NULL, '2015-09-05 03:04:29', '2015-09-05 03:04:29'),
(8, '213456', '123345', 0, 13, 11, 2, '', 1, NULL, '342', NULL, 'fdaf', 'sdf', 0, 2, 3, 'asfds', 'placeofrecipe', '1', NULL, 'dfsadf', 234, 32432, 234, 234324, 32432, 324324, 1, 'description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', NULL, NULL, '2015-12-16 17:31:49', '2015-12-16 17:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `weight` int(11) DEFAULT '0',
  `length` int(11) DEFAULT '0',
  `width` int(11) DEFAULT '0',
  `height` int(11) DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ports`
--

CREATE TABLE IF NOT EXISTS `ports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table contain information of seller, buyer, agent' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ports`
--

INSERT INTO `ports` (`id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Port 1', 'Địa chỉ của cảng 1', '2015-08-08 19:58:38', '2015-08-08 21:19:27'),
(2, 'Port 2', 'Địa chỉ của cảng 2', '2015-08-08 20:00:41', '2015-08-08 21:19:35'),
(3, 'Port 3', 'Địa chỉ của cảng 3', '2015-08-08 20:01:26', '2015-08-08 21:19:40'),
(4, 'New Ajax Port', 'la;kfj;dsakfjal', '2015-12-16 17:22:30', '2015-12-16 17:22:30'),
(5, 'New Dis Port', 'a;ldskjf;adslfj;asdfkl', '2015-12-16 17:23:26', '2015-12-16 17:23:26'),
(6, 'Test Loading', 'aldjf a;lsdkjf', '2015-12-28 16:51:57', '2015-12-28 16:51:57');

-- --------------------------------------------------------

--
-- Table structure for table `ships`
--

CREATE TABLE IF NOT EXISTS `ships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ships`
--

INSERT INTO `ships` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Ship 1, Vinaline', '2015-08-08 20:15:58', '2015-08-08 20:15:58'),
(2, 'Ship 2', '2015-08-08 20:15:58', '2015-08-08 20:15:58'),
(3, 'DTN Ocean Vessel', '2015-12-16 17:17:58', '2015-12-16 17:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_login` tinyint(4) NOT NULL DEFAULT '0',
  `activation_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `reset_pass_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_pass_expired_at` datetime DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `remember_token`, `is_login`, `activation_code`, `reset_pass_code`, `reset_pass_expired_at`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '0987654', 'admin@phuclocforwarding.com', '123456', NULL, 0, '', NULL, NULL, 1, '2016-01-08 00:20:03', '2016-01-08 00:20:03');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
