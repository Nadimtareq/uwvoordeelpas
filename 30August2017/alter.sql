-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 30, 2017 at 09:40 AM
-- Server version: 5.6.25-73.1-log
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `focus5kt_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `dinning_tables`
--

DROP TABLE IF EXISTS `dinning_tables`;
CREATE TABLE IF NOT EXISTS `dinning_tables` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comp_id` int(10) unsigned NOT NULL,
  `seating` int(10) unsigned NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `release_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `priority` int(10) unsigned NOT NULL,
  `duration` int(10) unsigned NOT NULL,
  `status` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `dinning_tables`
--

INSERT INTO `dinning_tables` (`id`, `table_number`, `comp_id`, `seating`, `description`, `release_time`, `priority`, `duration`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', 1, 2, 'Sample Description', NULL, 1, 30, 1, NULL, NULL),
(2, '1', 1, 2, 'Sample Description 1', NULL, 1, 120, 0, NULL, NULL),
(3, '3', 1, 1, 'Sample Description 3', NULL, 1, 600, 0, NULL, NULL),
(4, '4', 1, 1, 'Sample Description tavle 4', NULL, 1, 120, 0, NULL, NULL),
(5, '5', 1, 1, 'Sample Description tavle 5', NULL, 1, 120, 0, NULL, NULL),
(6, '6', 1, 1, 'Sample Description tavle 6', NULL, 1, 60, 0, NULL, NULL),
(7, '10', 1, 2, 'Test table number 10', NULL, 4, 120, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `floorplans`
--

DROP TABLE IF EXISTS `floorplans`;
CREATE TABLE IF NOT EXISTS `floorplans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_id` bigint(20) NOT NULL,
  `table_id` int(11) NOT NULL DEFAULT '0',
  `table_number` int(8) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `floor_plan_position` text NOT NULL,
  `status` int(8) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `floorplans`
--

INSERT INTO `floorplans` (`id`, `reservation_id`, `table_id`, `table_number`, `company_id`, `floor_plan_position`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 6, 0, 1, '{"pageX":"1295","pageY":"685","screenY":"751","screenX":"1295","clientY":"685","clientX":"1295","table_id":"6","company_id":"1","reservation_id":"0","offsetX":"663","offsetY":"1201"}', 1, '2017-08-29 16:25:01', '2017-08-29 16:25:01'),
(2, 11580, 4, 0, 1, '{"pageX":"1248","pageY":"613","screenY":"679","screenX":"1248","clientY":"613","clientX":"1248","table_id":"4","company_id":"1","reservation_id":"11580","offsetX":"597","offsetY":"1200"}', 1, '2017-08-29 16:25:07', '2017-08-29 16:25:07'),
(3, 11577, 2, 0, 1, '{"pageX":"1298","pageY":"306","screenY":"372","screenX":"1298","clientY":"306","clientX":"1298","table_id":"2","company_id":"1","reservation_id":"11577","offsetX":"292","offsetY":"1201"}', 1, '2017-08-29 18:11:34', '2017-08-29 18:11:34'),
(4, 0, 7, 0, 1, '{"pageX":"1242","pageY":"256","screenY":"322","screenX":"1242","clientY":"256","clientX":"1242","table_id":"7","company_id":"1","reservation_id":"0","offsetX":"234","offsetY":"1201"}', 1, '2017-08-29 18:12:40', '2017-08-29 18:12:40'),
(5, 11578, 1, 0, 1, '{"pageX":"1232","pageY":"815","screenY":"646","screenX":"1232","clientY":"580","clientX":"1232","table_id":"1","company_id":"1","reservation_id":"11578","offsetX":"755","offsetY":"1201"}', 1, '2017-08-29 18:28:08', '2017-08-29 18:28:08'),
(6, 0, 5, 0, 1, '{"pageX":"1247","pageY":"508","screenY":"574","screenX":"1247","clientY":"508","clientX":"1247","table_id":"5","company_id":"1","reservation_id":"0","offsetX":"499","offsetY":"1201"}', 1, '2017-08-29 18:30:28', '2017-08-29 18:30:28'),
(7, 11579, 3, 0, 1, '{"pageX":"1294","pageY":"397","screenY":"463","screenX":"1294","clientY":"397","clientX":"1294","table_id":"3","company_id":"1","reservation_id":"11579","offsetX":"392","offsetY":"1201"}', 1, '2017-08-29 18:30:32', '2017-08-29 18:30:32');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
