-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2017 at 02:52 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livepas_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE IF NOT EXISTS `activations` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `affiliates`
--

CREATE TABLE IF NOT EXISTS `affiliates` (
  `id` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `domain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `clicks` int(11) NOT NULL,
  `api_clicks` int(11) NOT NULL,
  `api_views` int(11) NOT NULL,
  `no_show` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `tracking_duration` text COLLATE utf8_unicode_ci NOT NULL,
  `affiliate_network` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `tracking_link` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `compensations` text COLLATE utf8_unicode_ci NOT NULL,
  `image_extension` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'jpg',
  `terms` text COLLATE utf8_unicode_ci,
  `time_duration_confirmed` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `percent_sales` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `affiliates_categories`
--

CREATE TABLE IF NOT EXISTS `affiliates_categories` (
  `id` int(11) NOT NULL,
  `affiliate_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `alert_notifications`
--

CREATE TABLE IF NOT EXISTS `alert_notifications` (
  `id` int(10) unsigned NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_on` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alert_notifications_groups`
--

CREATE TABLE IF NOT EXISTS `alert_notifications_groups` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notification_ids` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(10) unsigned NOT NULL,
  `send_mail` int(11) NOT NULL,
  `send_reminder` int(11) DEFAULT NULL,
  `comment` longtext COLLATE utf8_unicode_ci,
  `status` text COLLATE utf8_unicode_ci,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `place` longtext COLLATE utf8_unicode_ci,
  `appointment_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `caller_id` int(11) NOT NULL,
  `last_reminder_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barcodes`
--

CREATE TABLE IF NOT EXISTS `barcodes` (
  `id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expires` datetime DEFAULT NULL,
  `expire_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barcodes_users`
--

CREATE TABLE IF NOT EXISTS `barcodes_users` (
  `id` int(10) unsigned NOT NULL,
  `is_active` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `barcode_id` int(11) NOT NULL,
  `expire_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barcode_users`
--

CREATE TABLE IF NOT EXISTS `barcode_users` (
  `id` int(10) unsigned NOT NULL,
  `is_active` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `barcode_id` int(11) NOT NULL,
  `expire_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subcategory_id` int(10) unsigned NOT NULL,
  `extra_categories_id` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ad_page_id` int(11) NOT NULL,
  `no_show` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `caller_id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `about_us` longtext COLLATE utf8_unicode_ci,
  `menu` longtext COLLATE utf8_unicode_ci,
  `details` longtext COLLATE utf8_unicode_ci,
  `contact` longtext COLLATE utf8_unicode_ci,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_role` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `financial_iban` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `financial_iban_tnv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `financial_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `preferences` text COLLATE utf8_unicode_ci,
  `price` text COLLATE utf8_unicode_ci,
  `kitchens` text COLLATE utf8_unicode_ci,
  `allergies` text COLLATE utf8_unicode_ci,
  `facilities` text COLLATE utf8_unicode_ci,
  `kids` text COLLATE utf8_unicode_ci,
  `person` text COLLATE utf8_unicode_ci,
  `sustainability` text COLLATE utf8_unicode_ci,
  `discount` text COLLATE utf8_unicode_ci,
  `kvk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `btw` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_show` int(11) NOT NULL,
  `min_saldo` decimal(10,2) NOT NULL,
  `waiter_user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `regio` text COLLATE utf8_unicode_ci NOT NULL,
  `days` text COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pdf_active` int(11) NOT NULL,
  `pdf_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pdf_activate_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `signature_url` longtext COLLATE utf8_unicode_ci,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_invoice` int(11) NOT NULL,
  `click_registration` int(11) NOT NULL,
  `discount_comment` text COLLATE utf8_unicode_ci,
  `clicks` int(11) NOT NULL,
  `price_per_guest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies_callcenter`
--

CREATE TABLE IF NOT EXISTS `companies_callcenter` (
  `id` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_role` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `financial_iban` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `financial_iban_tnv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `financial_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kvk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `btw` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regio` text COLLATE utf8_unicode_ci NOT NULL,
  `called_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `comment` longtext COLLATE utf8_unicode_ci,
  `callback_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `caller_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `preferences` longtext COLLATE utf8_unicode_ci,
  `price` longtext COLLATE utf8_unicode_ci,
  `kitchens` longtext COLLATE utf8_unicode_ci,
  `allergies` longtext COLLATE utf8_unicode_ci,
  `facilities` longtext COLLATE utf8_unicode_ci,
  `kids` longtext COLLATE utf8_unicode_ci,
  `person` longtext COLLATE utf8_unicode_ci,
  `sustainability` longtext COLLATE utf8_unicode_ci,
  `discount` longtext COLLATE utf8_unicode_ci,
  `no_show` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_reservations`
--

CREATE TABLE IF NOT EXISTS `company_reservations` (
  `id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `per_time` int(11) NOT NULL,
  `available_persons` text COLLATE utf8_unicode_ci NOT NULL,
  `available_deals` text COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `is_locked` int(11) NOT NULL,
  `max_persons` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `locked_times` text COLLATE utf8_unicode_ci NOT NULL,
  `closed_before_time` int(11) NOT NULL,
  `cancel_before_time` int(11) NOT NULL,
  `update_before_time` int(11) NOT NULL,
  `is_manual` int(11) NOT NULL,
  `reminder_before_date` int(11) NOT NULL DEFAULT '0',
  `extra_reservations` int(11) NOT NULL,
  `closed_at_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_services`
--

CREATE TABLE IF NOT EXISTS `company_services` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `tax` int(11) NOT NULL DEFAULT '21',
  `price` decimal(5,2) unsigned NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `period` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contactfrom`
--

CREATE TABLE IF NOT EXISTS `contactfrom` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('new','read','replied') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_form_messages`
--

CREATE TABLE IF NOT EXISTS `contact_form_messages` (
  `id` int(10) unsigned NOT NULL,
  `contact_reply_id` int(11) DEFAULT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `recipient_id` int(11) DEFAULT NULL,
  `recipient_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sender_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Recipient_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unread` tinyint(4) NOT NULL DEFAULT '1',
  `toCustomer` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_blocks`
--

CREATE TABLE IF NOT EXISTS `content_blocks` (
  `id` int(10) unsigned NOT NULL,
  `category` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crons_log`
--

CREATE TABLE IF NOT EXISTS `crons_log` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cron_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dinning_tables`
--

CREATE TABLE IF NOT EXISTS `dinning_tables` (
  `id` int(10) unsigned NOT NULL,
  `table_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comp_id` int(10) unsigned NOT NULL,
  `seating` int(10) unsigned NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `release_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `priority` int(10) unsigned NOT NULL,
  `duration` int(10) unsigned NOT NULL,
  `status` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE IF NOT EXISTS `faq_categories` (
  `id` int(10) unsigned NOT NULL,
  `slug` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq_questions`
--

CREATE TABLE IF NOT EXISTS `faq_questions` (
  `id` int(10) unsigned NOT NULL,
  `category` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `clicks` int(11) NOT NULL,
  `subcategory` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite_affiliates`
--

CREATE TABLE IF NOT EXISTS `favorite_affiliates` (
  `id` int(10) unsigned NOT NULL,
  `affiliate_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite_companies`
--

CREATE TABLE IF NOT EXISTS `favorite_companies` (
  `id` int(10) unsigned NOT NULL,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `floorplans`
--

CREATE TABLE IF NOT EXISTS `floorplans` (
  `id` int(11) NOT NULL,
  `reservation_id` bigint(20) NOT NULL,
  `table_id` int(11) NOT NULL DEFAULT '0',
  `table_number` int(8) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `floor_plan_position` text NOT NULL,
  `status` int(8) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `future_deals`
--

CREATE TABLE IF NOT EXISTS `future_deals` (
  `id` int(10) unsigned NOT NULL,
  `deal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reference_id` int(10) unsigned DEFAULT NULL,
  `deal_price` decimal(10,2) NOT NULL,
  `deal_base_price` decimal(10,2) NOT NULL,
  `persons` int(11) NOT NULL,
  `persons_reserved` int(11) NOT NULL,
  `persons_remain` int(11) NOT NULL,
  `user_discount` decimal(10,2) NOT NULL,
  `extra_pay` decimal(10,2) NOT NULL,
  `purchased_date` date NOT NULL,
  `expired_at` date NOT NULL,
  `status` enum('pending','purchased','partially_reserved','full_reserved') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giftcards`
--

CREATE TABLE IF NOT EXISTS `giftcards` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `code` varchar(99) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `max_usage` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `used_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `buy_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giftcards_buy`
--

CREATE TABLE IF NOT EXISTS `giftcards_buy` (
  `id` int(10) unsigned NOT NULL,
  `giftcard_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giftcard_use`
--

CREATE TABLE IF NOT EXISTS `giftcard_use` (
  `id` int(10) unsigned NOT NULL,
  `giftcard_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE IF NOT EXISTS `guests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guests_third_party`
--

CREATE TABLE IF NOT EXISTS `guests_third_party` (
  `id` int(10) unsigned NOT NULL,
  `reservation_number` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `network_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reservation_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `persons` int(11) NOT NULL,
  `comment` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `network` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `restaurant_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `restaurant_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `restaurant_zipcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reservation_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reservation_date` datetime DEFAULT NULL,
  `mail_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guests_wifi`
--

CREATE TABLE IF NOT EXISTS `guests_wifi` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guest_list_extension`
--

CREATE TABLE IF NOT EXISTS `guest_list_extension` (
  `id` int(10) unsigned NOT NULL,
  `email_extension` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incassos`
--

CREATE TABLE IF NOT EXISTS `incassos` (
  `id` int(11) NOT NULL,
  `paid` int(1) NOT NULL,
  `invoicenumber` varchar(255) NOT NULL,
  `xml` longtext NOT NULL,
  `no_of_invoices` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(10) unsigned NOT NULL,
  `invoice_number` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `week` int(11) NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `invoicenumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_saldo` decimal(10,2) NOT NULL,
  `total_persons` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `period` int(11) NOT NULL,
  `products` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `next_invoice_at` datetime NOT NULL,
  `reminder` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `is_debit` int(11) NOT NULL,
  `debit_credit` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'debit',
  `payment_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ideal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ltm_translations`
--

CREATE TABLE IF NOT EXISTS `ltm_translations` (
  `id` int(10) unsigned NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mail_templates`
--

CREATE TABLE IF NOT EXISTS `mail_templates` (
  `id` int(10) unsigned NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `explanation` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'mail'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(10) unsigned NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `collection_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `disk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `manipulations` text COLLATE utf8_unicode_ci NOT NULL,
  `custom_properties` text COLLATE utf8_unicode_ci NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE IF NOT EXISTS `meta` (
  `id` int(10) unsigned NOT NULL,
  `metable_id` int(10) unsigned NOT NULL,
  `metable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `key` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_published` int(11) NOT NULL DEFAULT '0',
  `company_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `meta_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE IF NOT EXISTS `newsletters` (
  `id` int(10) unsigned NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `companies_ids` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletters_guests`
--

CREATE TABLE IF NOT EXISTS `newsletters_guests` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `newsletter_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_show` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletters_jobs`
--

CREATE TABLE IF NOT EXISTS `newsletters_jobs` (
  `id` int(10) unsigned NOT NULL,
  `city_id` int(11) NOT NULL,
  `date` text COLLATE utf8_unicode_ci,
  `time` text COLLATE utf8_unicode_ci,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `is_hidden` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mollie_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE IF NOT EXISTS `persistences` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE IF NOT EXISTS `preferences` (
  `id` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `no_frontpage` int(11) NOT NULL,
  `clicks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE IF NOT EXISTS `referrals` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `referrer_id` int(10) unsigned NOT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deals` int(11) DEFAULT NULL,
  `status` enum('Pending','Partial','Complete') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `amount` double(8,2) NOT NULL DEFAULT '5.00',
  `due` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE IF NOT EXISTS `reminders` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `persons` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `preferences` text COLLATE utf8_unicode_ci NOT NULL,
  `allergies` text COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `saldo` decimal(5,2) NOT NULL DEFAULT '0.00',
  `newsletter_company` int(11) NOT NULL,
  `is_cancelled` int(11) NOT NULL,
  `user_is_paid_back` int(11) NOT NULL,
  `restaurant_is_paid` int(11) NOT NULL,
  `source` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `table_nr` int(11) NOT NULL,
  `custom_res_id` varchar(800) COLLATE utf8_unicode_ci DEFAULT NULL,
  `option_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations_options`
--

CREATE TABLE IF NOT EXISTS `reservations_options` (
  `id` int(10) unsigned NOT NULL,
  `total_amount` int(11) NOT NULL,
  `total_reservations` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price_from` decimal(5,2) unsigned DEFAULT NULL,
  `price` decimal(5,2) unsigned DEFAULT NULL,
  `price_per_guest` decimal(10,2) NOT NULL,
  `expired_at` date NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `newsletter` tinyint(1) NOT NULL DEFAULT '1',
  `no_show` tinyint(4) NOT NULL,
  `signature_url` longtext COLLATE utf8_unicode_ci,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `deal_id` int(10) unsigned DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `food` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `decor` int(11) NOT NULL,
  `is_approved` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE IF NOT EXISTS `role_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `search_history`
--

CREATE TABLE IF NOT EXISTS `search_history` (
  `id` int(10) unsigned NOT NULL,
  `term` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `page` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE IF NOT EXISTS `system_settings` (
  `id` int(10) unsigned NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temporary_auth`
--

CREATE TABLE IF NOT EXISTS `temporary_auth` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `redirect_to` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `terms_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_reservations`
--

CREATE TABLE IF NOT EXISTS `temp_reservations` (
  `id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `persons` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `preferences` text COLLATE utf8_unicode_ci NOT NULL,
  `allergies` text COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `rest_pay` decimal(10,2) NOT NULL,
  `newsletter_company` int(11) NOT NULL,
  `is_cancelled` int(11) NOT NULL,
  `user_is_paid_back` int(11) NOT NULL,
  `restaurant_is_paid` int(11) NOT NULL,
  `source` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `table_nr` int(11) NOT NULL,
  `custom_res_id` varchar(800) COLLATE utf8_unicode_ci NOT NULL,
  `option_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(10) unsigned NOT NULL,
  `external_id` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `program_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `processed` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `paid` int(11) NOT NULL,
  `affiliate_network` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(10) unsigned NOT NULL,
  `external_id` varchar(90) DEFAULT NULL,
  `program_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `used_amount` decimal(10,2) NOT NULL,
  `remain_amount` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `ip` varchar(64) NOT NULL,
  `processed` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `paid` int(11) NOT NULL,
  `affiliate_network` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unwanted_word`
--

CREATE TABLE IF NOT EXISTS `unwanted_word` (
  `id` int(10) unsigned NOT NULL,
  `word` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `city` text COLLATE utf8_unicode_ci,
  `preferences` text COLLATE utf8_unicode_ci,
  `kitchens` text COLLATE utf8_unicode_ci,
  `allergies` text COLLATE utf8_unicode_ci,
  `facilities` text COLLATE utf8_unicode_ci,
  `kids` text COLLATE utf8_unicode_ci,
  `price` text COLLATE utf8_unicode_ci,
  `sustainability` text COLLATE utf8_unicode_ci,
  `discount` text COLLATE utf8_unicode_ci,
  `new_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new_email_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_saldo` decimal(10,2) NOT NULL,
  `paid_saldo` decimal(10,2) NOT NULL,
  `transaction_saldo` decimal(10,2) NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `newsletter` int(11) NOT NULL,
  `reference_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expired_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `default_role_id` int(11) NOT NULL,
  `google_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `terms_active` int(11) NOT NULL,
  `cashback_popup` int(11) NOT NULL,
  `source` text COLLATE utf8_unicode_ci,
  `facebook_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `from_company_id` int(11) NOT NULL,
  `expire_code` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `birthday_at` date DEFAULT NULL,
  `lang` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extension_downloaded` int(11) DEFAULT '0',
  `attempts` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_18072017`
--

CREATE TABLE IF NOT EXISTS `users_18072017` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `city` text COLLATE utf8_unicode_ci,
  `preferences` text COLLATE utf8_unicode_ci,
  `kitchens` text COLLATE utf8_unicode_ci,
  `allergies` text COLLATE utf8_unicode_ci,
  `facilities` text COLLATE utf8_unicode_ci,
  `kids` text COLLATE utf8_unicode_ci,
  `price` text COLLATE utf8_unicode_ci,
  `sustainability` text COLLATE utf8_unicode_ci,
  `discount` text COLLATE utf8_unicode_ci,
  `new_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new_email_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_saldo` decimal(10,2) NOT NULL,
  `paid_saldo` decimal(10,2) NOT NULL,
  `transaction_saldo` decimal(10,2) NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `newsletter` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expired_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `default_role_id` int(11) NOT NULL,
  `google_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `terms_active` int(11) NOT NULL,
  `cashback_popup` int(11) NOT NULL,
  `source` text COLLATE utf8_unicode_ci,
  `facebook_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `from_company_id` int(11) NOT NULL,
  `expire_code` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `birthday_at` date DEFAULT NULL,
  `extension_downloaded` int(11) DEFAULT '0',
  `attempts` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_21072017`
--

CREATE TABLE IF NOT EXISTS `users_21072017` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `city` text COLLATE utf8_unicode_ci,
  `preferences` text COLLATE utf8_unicode_ci,
  `kitchens` text COLLATE utf8_unicode_ci,
  `allergies` text COLLATE utf8_unicode_ci,
  `facilities` text COLLATE utf8_unicode_ci,
  `kids` text COLLATE utf8_unicode_ci,
  `price` text COLLATE utf8_unicode_ci,
  `sustainability` text COLLATE utf8_unicode_ci,
  `discount` text COLLATE utf8_unicode_ci,
  `new_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new_email_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_saldo` decimal(10,2) NOT NULL,
  `paid_saldo` decimal(10,2) NOT NULL,
  `transaction_saldo` decimal(10,2) NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `newsletter` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expired_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `default_role_id` int(11) NOT NULL,
  `google_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `terms_active` int(11) NOT NULL,
  `cashback_popup` int(11) NOT NULL,
  `source` text COLLATE utf8_unicode_ci,
  `facebook_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `from_company_id` int(11) NOT NULL,
  `expire_code` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `birthday_at` date DEFAULT NULL,
  `extension_downloaded` int(11) DEFAULT '0',
  `attempts` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_24072017`
--

CREATE TABLE IF NOT EXISTS `users_24072017` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `city` text COLLATE utf8_unicode_ci,
  `preferences` text COLLATE utf8_unicode_ci,
  `kitchens` text COLLATE utf8_unicode_ci,
  `allergies` text COLLATE utf8_unicode_ci,
  `facilities` text COLLATE utf8_unicode_ci,
  `kids` text COLLATE utf8_unicode_ci,
  `price` text COLLATE utf8_unicode_ci,
  `sustainability` text COLLATE utf8_unicode_ci,
  `discount` text COLLATE utf8_unicode_ci,
  `new_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new_email_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_saldo` decimal(10,2) NOT NULL,
  `paid_saldo` decimal(10,2) NOT NULL,
  `transaction_saldo` decimal(10,2) NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `newsletter` int(11) NOT NULL,
  `reference_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expired_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `default_role_id` int(11) NOT NULL,
  `google_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `terms_active` int(11) NOT NULL,
  `cashback_popup` int(11) NOT NULL,
  `source` text COLLATE utf8_unicode_ci,
  `facebook_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `from_company_id` int(11) NOT NULL,
  `expire_code` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `birthday_at` date DEFAULT NULL,
  `extension_downloaded` int(11) DEFAULT '0',
  `attempts` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_180720171`
--

CREATE TABLE IF NOT EXISTS `users_180720171` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `city` text COLLATE utf8_unicode_ci,
  `preferences` text COLLATE utf8_unicode_ci,
  `kitchens` text COLLATE utf8_unicode_ci,
  `allergies` text COLLATE utf8_unicode_ci,
  `facilities` text COLLATE utf8_unicode_ci,
  `kids` text COLLATE utf8_unicode_ci,
  `price` text COLLATE utf8_unicode_ci,
  `sustainability` text COLLATE utf8_unicode_ci,
  `discount` text COLLATE utf8_unicode_ci,
  `new_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new_email_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_saldo` decimal(10,2) NOT NULL,
  `paid_saldo` decimal(10,2) NOT NULL,
  `transaction_saldo` decimal(10,2) NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `newsletter` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expired_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `default_role_id` int(11) NOT NULL,
  `google_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `terms_active` int(11) NOT NULL,
  `cashback_popup` int(11) NOT NULL,
  `source` text COLLATE utf8_unicode_ci,
  `facebook_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `from_company_id` int(11) NOT NULL,
  `expire_code` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `birthday_at` date DEFAULT NULL,
  `extension_downloaded` int(11) DEFAULT '0',
  `attempts` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_bans`
--

CREATE TABLE IF NOT EXISTS `users_bans` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `reason` text COLLATE utf8_unicode_ci,
  `expired_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_ip`
--

CREATE TABLE IF NOT EXISTS `users_ip` (
  `id` int(10) unsigned NOT NULL,
  `user_ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `affiliates`
--
ALTER TABLE `affiliates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `affiliates_id_index` (`id`);

--
-- Indexes for table `affiliates_categories`
--
ALTER TABLE `affiliates_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `affiliates_categories_id_index` (`id`),
  ADD KEY `affiliates_categories_affiliate_id_index` (`affiliate_id`);

--
-- Indexes for table `alert_notifications`
--
ALTER TABLE `alert_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alert_notifications_groups`
--
ALTER TABLE `alert_notifications_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barcodes`
--
ALTER TABLE `barcodes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barcodes_code_unique` (`code`);

--
-- Indexes for table `barcodes_users`
--
ALTER TABLE `barcodes_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barcode_users`
--
ALTER TABLE `barcode_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_id_index` (`id`),
  ADD KEY `categories_name_index` (`name`),
  ADD KEY `categories_subcategory_id_index` (`subcategory_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies_callcenter`
--
ALTER TABLE `companies_callcenter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_reservations`
--
ALTER TABLE `company_reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_services`
--
ALTER TABLE `company_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactfrom`
--
ALTER TABLE `contactfrom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form_messages`
--
ALTER TABLE `contact_form_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_blocks`
--
ALTER TABLE `content_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crons_log`
--
ALTER TABLE `crons_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dinning_tables`
--
ALTER TABLE `dinning_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_questions`
--
ALTER TABLE `faq_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorite_affiliates`
--
ALTER TABLE `favorite_affiliates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorite_companies`
--
ALTER TABLE `favorite_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floorplans`
--
ALTER TABLE `floorplans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `future_deals`
--
ALTER TABLE `future_deals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `future_deals_reference_id_foreign` (`reference_id`);

--
-- Indexes for table `giftcards`
--
ALTER TABLE `giftcards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giftcards_buy`
--
ALTER TABLE `giftcards_buy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giftcard_use`
--
ALTER TABLE `giftcard_use`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guests_third_party`
--
ALTER TABLE `guests_third_party`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guests_wifi`
--
ALTER TABLE `guests_wifi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_list_extension`
--
ALTER TABLE `guest_list_extension`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incassos`
--
ALTER TABLE `incassos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_reserved_reserved_at_index` (`queue`,`reserved`,`reserved_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dinning_tables`
--
ALTER TABLE `dinning_tables`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `floorplans`
--
ALTER TABLE `floorplans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
