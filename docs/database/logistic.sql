-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2015 at 01:13 PM
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
  `is_buyer` tinyint(4) NOT NULL DEFAULT '1',
  `is_seller` tinyint(4) NOT NULL DEFAULT '0',
  `is_agent` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table contain information of seller, buyer, agent' AUTO_INCREMENT=1 ;

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
  `seller_id` int(11) DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `remote_agent` int(11) DEFAULT NULL,
  `description_of_goods` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `shipment_ship_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipment_voyage` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre_carriage_by` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipment_container_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipment_seal_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipment_type` int(11) NOT NULL,
  `shipment_loading_port` int(11) NOT NULL,
  `shipment_discharging_port` int(11) NOT NULL,
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
  UNIQUE KEY `house_bill_no` (`house_bill_no`,`master_bill_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
