-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2015 at 05:04 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smartrisk`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts_invitation`
--

CREATE TABLE IF NOT EXISTS `accounts_invitation` (
  `company_id` int(11) NOT NULL,
  `token` varchar(10) COLLATE utf8_bin NOT NULL,
  KEY `invite_token` (`company_id`,`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `accounts_invitation`
--

INSERT INTO `accounts_invitation` (`company_id`, `token`) VALUES
(1, 'a'),
(1, 'b');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE IF NOT EXISTS `records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `record_type` tinyint(4) NOT NULL,
  `value` double DEFAULT NULL,
  `value_2` double DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_2` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remote_ip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imei` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL COMMENT 'Nhu Duong Tan',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `user_id`, `record_type`, `value`, `value_2`, `image`, `image_2`, `remote_ip`, `imei`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 123, 456, NULL, NULL, '192.168.1.103', NULL, NULL, NULL, '2015-06-05 14:49:28', '2015-06-05 14:49:28'),
(2, 3, 1, 123, 4567, NULL, NULL, '192.168.1.103', NULL, NULL, NULL, '2015-06-05 16:44:54', '2015-06-05 16:44:54'),
(3, 3, 1, 234, 123, NULL, NULL, '192.168.1.13', NULL, NULL, NULL, '2015-06-06 17:44:01', '2015-06-06 17:44:01'),
(4, 4, 2, 987, 654, NULL, NULL, '192.168.1.13', NULL, NULL, NULL, '2015-06-06 18:10:46', '2015-06-06 18:10:46'),
(5, 5, 3, 1357, 2468, NULL, NULL, '192.168.1.82', NULL, NULL, NULL, '2015-06-06 18:20:06', '2015-06-06 18:20:06'),
(6, 4, 1, 13, 21, NULL, NULL, '192.168.1.13', NULL, NULL, NULL, '2015-06-06 18:39:51', '2015-06-06 18:39:51'),
(7, 5, 2, 123, 0, NULL, NULL, '192.168.1.82', NULL, NULL, NULL, '2015-06-06 19:15:18', '2015-06-06 19:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_login` tinyint(4) NOT NULL DEFAULT '0',
  `imei` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `activation_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `reset_pass_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_pass_expired_at` datetime DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `prenom`, `adresse`, `ville`, `phone`, `email`, `password`, `remember_token`, `is_login`, `imei`, `activation_code`, `reset_pass_code`, `reset_pass_expired_at`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 'nhu', 'prenom', 'hdmd', 'nfnf', '98655', 'duongtannhu@yahoo.com', '$2y$10$ARn2U7ahWHmt06lvkZ7XJO4aUoyTjt1yajiCZSjkIE.m9feTI5qoe', 'tvoYPjqQy3N9V6I16xrbkYCcikoHOzSA5cgzuK6hpYDkTKrf2bLZHRCgDeL6', 0, NULL, 'a', NULL, NULL, 0, '2015-06-01 16:49:47', '2015-06-06 19:43:09'),
(4, 'gbc', 'nhu', 'aldsfjk', 'alsdkfj', '123409203', 'gbc_nhu@yahoo.com', '$2y$10$JMcPmlEGrR88K1.FkbZ8V.K9mR8ZoVXxTdiXrGJ7ub8bWo4xrDzlW', 'SfjLGTgNJRrZsmR5cz58EBnVK6iyuZURJ9P2DUVfMJeTIFow3SkBC7ICDqDj', 0, NULL, 'a', NULL, NULL, 0, '2015-06-06 18:03:22', '2015-06-06 19:20:47'),
(5, 'nhu2', 'fjfjkf', 'jfjf', 'jfkfk', '0987653', 'abc@def.com', '$2y$10$PJnCS3ZzL0px1QOATvzOZecmOAVlRye/WrOpcBCI0nRX1Vzh8n0eS', 't0cpWBPPoH2nhpAdMvJ0WshgfBXEkoZznLmYKelnqNlIXwu2qjAveTydIRAQ', 0, NULL, 'a', NULL, NULL, 0, '2015-06-06 18:19:16', '2015-06-06 19:15:35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
