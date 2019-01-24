-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2018 at 07:29 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `africa2`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `tags` varchar(55) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `content`, `tags`, `created_by`, `updated_by`, `created_at`, `updated_at`, `delete_status`) VALUES
(1, 'test blog1', 'test blog1 test blog1 test blog1 test blog1 test blog1 test blog1 test blog1 test blog1 test blog1 test blog1 test blog1 test blog1', '2', 0, 0, '2018-11-01 09:53:44', '2018-11-01 09:53:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `goal` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `terms` text NOT NULL,
  `startdate` date NOT NULL,
  `todate` date NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `title`, `goal`, `about`, `terms`, `startdate`, `todate`, `created_by`, `updated_by`, `created_at`, `updated_at`, `delete_status`) VALUES
(1, 'entrepreneur test campaign', 'test campaign to investors', 'test1 test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test', 'test1 test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test', '2018-10-17', '2018-10-30', 2, 2, '2018-10-31 17:04:10', '2018-10-31 17:04:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `groupid` int(11) NOT NULL,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `groupid`, `delete_status`) VALUES
(1, 'Diaspora', 1, 0),
(2, 'Social Entrepreneur', 1, 0),
(3, 'Uncategorized', 1, 0),
(4, 'Women', 1, 0),
(5, 'Youth', 1, 0),
(6, 'Angel investor', 4, 0),
(7, 'Banks/MFI', 4, 0),
(8, 'Peer to Peer Lender', 4, 0),
(9, 'Personal Investor', 4, 0),
(10, 'Venture Capitalist', 4, 0),
(11, 'Bank', 3, 0),
(12, 'Government', 3, 0),
(13, 'Media', 3, 0),
(14, 'Mentor', 3, 0),
(15, 'Non-profit', 3, 0),
(16, 'Student', 3, 0),
(17, 'University', 3, 0),
(18, 'Women', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(90) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `codename` int(20) NOT NULL,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `codename`, `delete_status`) VALUES
(1, 'Africa', 1, 0),
(2, 'Afganistan', 2, 0),
(3, 'India', 3, 0),
(4, 'Germany', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `entrepreneurs`
--

CREATE TABLE `entrepreneurs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(90) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(55) NOT NULL,
  `zipcode` varchar(90) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `women_stage` varchar(55) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `website` varchar(200) NOT NULL,
  `fb_url` varchar(255) NOT NULL,
  `tw_url` varchar(200) NOT NULL,
  `linked_url` varchar(155) NOT NULL,
  `blog_url` text NOT NULL,
  `gp_url` varchar(111) NOT NULL,
  `is_featured` int(11) NOT NULL DEFAULT '0',
  `is_top` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entrepreneurs`
--

INSERT INTO `entrepreneurs` (`id`, `name`, `city`, `state`, `country`, `zipcode`, `gender`, `women_stage`, `logo`, `website`, `fb_url`, `tw_url`, `linked_url`, `blog_url`, `gp_url`, `is_featured`, `is_top`, `created_by`, `updated_by`, `created_at`, `updated_at`, `delete_status`) VALUES
(1, 'yogesh Waran', 'madurai', 'tamilnadu', 'india', '12331', 'Male', '1', 'http://127.0.0.1:8000/files/documents/20181101043049_123_Xmen-Wolverine-iPhone-wallpaper.jpg', 'www.entrepreneur.com', 'entrepreneurfb.com', 'entrepreneurtweeeter.com', 'entrepreneurlinkedin.com', 'entrepreneurblog.com', 'entrepreneurgp.com', 1, 1, 2, 2, '2018-10-31 16:56:26', '2018-11-03 11:10:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ent_businessplan`
--

CREATE TABLE `ent_businessplan` (
  `id` int(11) NOT NULL,
  `idea` text NOT NULL,
  `women_model` text NOT NULL,
  `customer` text NOT NULL,
  `market` text NOT NULL,
  `industry` text NOT NULL,
  `product` text NOT NULL,
  `campaign` text NOT NULL,
  `budget` text NOT NULL,
  `team` text NOT NULL,
  `pitch` text NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ent_businessplan`
--

INSERT INTO `ent_businessplan` (`id`, `idea`, `women_model`, `customer`, `market`, `industry`, `product`, `campaign`, `budget`, `team`, `pitch`, `created_by`, `updated_by`, `created_at`, `updated_at`, `delete_status`) VALUES
(1, 'test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur', 'test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur', 'test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur', 'test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur', 'test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur', 'test entrepreneur test entrepreneur test entrepreneur test entrepreneur', 'test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur', 'test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur', 'test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur', 'test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur test entrepreneur', 2, 2, '2018-11-01 10:06:04', '2018-11-01 10:06:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ent_company`
--

CREATE TABLE `ent_company` (
  `id` int(11) NOT NULL,
  `overview` varchar(255) NOT NULL,
  `category` varchar(90) NOT NULL,
  `p_yr_revenue` varchar(55) NOT NULL,
  `c_yr_revenue` varchar(55) NOT NULL,
  `n_yr_revenue` varchar(55) NOT NULL,
  `founded_date` date DEFAULT NULL,
  `no_employees` int(55) NOT NULL,
  `filepath` varchar(200) NOT NULL,
  `filetitle` varchar(255) NOT NULL,
  `fileurl` varchar(200) NOT NULL,
  `project_img` varchar(155) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ent_company`
--

INSERT INTO `ent_company` (`id`, `overview`, `category`, `p_yr_revenue`, `c_yr_revenue`, `n_yr_revenue`, `founded_date`, `no_employees`, `filepath`, `filetitle`, `fileurl`, `project_img`, `created_by`, `updated_by`, `created_at`, `updated_at`, `delete_status`) VALUES
(1, 'entrepreneur company overview', '2,3,4', '150', '1500', '2500', '2018-11-08', 12, '', 'ftitle', 'flink', '', 2, 2, '2018-10-31 16:58:53', '2018-11-08 17:14:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ent_funding`
--

CREATE TABLE `ent_funding` (
  `id` int(11) NOT NULL,
  `goal` varchar(255) NOT NULL,
  `fund_for` varchar(255) NOT NULL,
  `fund_type` varchar(100) NOT NULL,
  `fund_pvt` varchar(100) NOT NULL,
  `pre_money` varchar(90) NOT NULL,
  `interest` varchar(90) NOT NULL,
  `prev_fund` varchar(255) NOT NULL,
  `fund_commitment` varchar(200) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ent_funding`
--

INSERT INTO `ent_funding` (`id`, `goal`, `fund_for`, `fund_type`, `fund_pvt`, `pre_money`, `interest`, `prev_fund`, `fund_commitment`, `created_by`, `updated_by`, `created_at`, `updated_at`, `delete_status`) VALUES
(1, 'test entrepreneur goal', 'test entrepreneur test entrepreneur', 'Equity', '1500', '150', '15', '15000', 'test entrepreneur test entrepreneur', 2, 2, '2018-11-01 10:04:40', '2018-11-01 10:05:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ent_market`
--

CREATE TABLE `ent_market` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `market` varchar(100) NOT NULL,
  `market_size` varchar(55) NOT NULL,
  `growth_rate` varchar(90) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ent_mgmnt_team`
--

CREATE TABLE `ent_mgmnt_team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photograph` varchar(155) NOT NULL,
  `linked_url` varchar(255) DEFAULT NULL,
  `fb_url` varchar(255) DEFAULT NULL,
  `tw_url` varchar(200) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ent_mgmnt_team`
--

INSERT INTO `ent_mgmnt_team` (`id`, `name`, `position`, `email`, `description`, `photograph`, `linked_url`, `fb_url`, `tw_url`, `created_by`, `updated_by`, `created_at`, `updated_at`, `delete_status`) VALUES
(1, 'yogesh Waran', 'team lead', 'test@gmail.com', 'test team lead test team lead test team lead test team lead test team lead test team lead', 'http://127.0.0.1:8000/files/documents/20181101043346_123_Xmen-Wolverine-iPhone-wallpaper-Retina.jpg', 'entrepreneurlinkedin.com', 'entrepreneurfb.com', 'entrepreneurtweeeter.com', 2, 2, '2018-11-01 10:03:46', '2018-11-01 10:03:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `investors`
--

CREATE TABLE `investors` (
  `id` int(11) NOT NULL,
  `expertise` text NOT NULL,
  `capital_invesment` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `country_interest` varchar(55) NOT NULL,
  `roi` varchar(90) NOT NULL,
  `women_stage` varchar(90) NOT NULL,
  `expectation` text NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marketplace_settings`
--

CREATE TABLE `marketplace_settings` (
  `id` int(11) NOT NULL,
  `storename` varchar(60) NOT NULL,
  `org_id` int(11) NOT NULL,
  `store_slug` varchar(100) DEFAULT NULL,
  `description` text,
  `buyer_msg` varchar(200) DEFAULT NULL,
  `phone` varchar(90) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `addressline1` varchar(255) DEFAULT NULL,
  `addressline2` varchar(255) DEFAULT NULL,
  `country` varchar(55) DEFAULT NULL,
  `state` varchar(55) DEFAULT NULL,
  `city` varchar(55) DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `logopath` varchar(255) DEFAULT NULL,
  `bannerpath` varchar(255) DEFAULT NULL,
  `fb_link` varchar(90) DEFAULT NULL,
  `gp_link` varchar(90) DEFAULT NULL,
  `tw_link` varchar(90) DEFAULT NULL,
  `linked_link` varchar(90) DEFAULT NULL,
  `yt_link` varchar(90) DEFAULT NULL,
  `insta_link` varchar(90) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `msg_to` varchar(11) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `subject`, `message`, `msg_to`, `created_by`, `updated_by`, `created_at`, `updated_at`, `delete_status`) VALUES
(1, 'msg to admin reply', 'fettsgghjasfdvxv', '0', 2, 0, '2018-10-31 21:23:36', '2018-11-01 09:50:04', 0),
(2, 'testing', 'reply to entrepreneur', '2', 0, 0, '2018-11-01 09:51:16', '2018-11-01 09:51:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `qty`, `amount`, `created_by`, `updated_by`, `created_at`, `updated_at`, `delete_status`) VALUES
(1, 1, 1, 200.00, 2, 2, '2018-11-01 14:38:54', '2018-11-01 14:38:54', 0),
(2, 4, 1, 5.00, 2, 2, '2018-11-12 11:05:50', '2018-11-12 11:05:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_address`
--

CREATE TABLE `order_address` (
  `id` int(11) NOT NULL,
  `firstname` varchar(90) NOT NULL,
  `lastname` varchar(90) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `country` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(55) NOT NULL,
  `address` varchar(255) NOT NULL,
  `appartmentno` varchar(222) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(200) NOT NULL,
  `zipcode` varchar(22) NOT NULL,
  `notes` text NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_address`
--

INSERT INTO `order_address` (`id`, `firstname`, `lastname`, `companyname`, `country`, `email`, `phone`, `address`, `appartmentno`, `city`, `state`, `zipcode`, `notes`, `created_by`, `updated_by`, `created_at`, `updated_at`, `delete_status`) VALUES
(1, 'test', 'entrepreneur', 'webneo', 'India', 'admin@aim.com', '086088900', '12,middle', 'apartment test', 'madurai', 'Africa', '12331', 'productsproductsproductsproducts', NULL, NULL, '2018-11-01 14:38:54', '2018-11-01 14:38:54', 0),
(2, 'Yogesh', 'Waran', 'webneo', 'India', 'arasanya06@gmail.com', '8608890030', '12,middle', 'apartment test', 'madurai', 'India', '12331', 'notes', 2, 2, '2018-11-12 11:05:50', '2018-11-12 11:05:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `description` varchar(255) NOT NULL,
  `country` varchar(100) NOT NULL,
  `org_logo` text NOT NULL,
  `founded_date` date DEFAULT NULL,
  `org_file` varchar(100) NOT NULL,
  `file_title` varchar(60) NOT NULL,
  `mission` varchar(255) NOT NULL,
  `categories` varchar(90) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`, `description`, `country`, `org_logo`, `founded_date`, `org_file`, `file_title`, `mission`, `categories`, `created_by`, `updated_by`, `created_at`, `updated_at`, `delete_status`) VALUES
(1, 'test org', 'test org', '1', 'http://127.0.0.1:8000/files/logo/20181102053655_123_Steve-Jobs-movie-poster1.jpg', NULL, 'http://127.0.0.1:8000/files/documents/20181102053656_123_Steve-Jobs-movie-poster1.jpg', 'test file', 'test mission', '3', 3, 3, '2018-11-02 11:06:56', '2018-11-02 11:06:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `org_files`
--

CREATE TABLE `org_files` (
  `id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `delete_status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `short_desc` text NOT NULL,
  `description` text NOT NULL,
  `product_data` double(8,2) NOT NULL,
  `sale_price` double(8,2) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `categories` varchar(90) NOT NULL,
  `tags` varchar(90) NOT NULL,
  `imagepath` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `short_desc`, `description`, `product_data`, `sale_price`, `start_date`, `end_date`, `categories`, `tags`, `imagepath`, `userid`, `created_by`, `updated_by`, `created_at`, `updated_at`, `delete_status`) VALUES
(1, 'product1', 'product1 product1 product1 product1 product1 product1 product1 product1 product1', 'product1 product1 product1 product1 product1 product1 product1 product1 product1 product1 product1 product1 product1 product1 product1 product1 product1 product1 product1 product1 product1 product1 product1 product1 product1 product1 product1 product1 product1 product1\"', 300.00, 200.00, '2018-11-01', '2018-12-31', '1', 'africa', 'http://127.0.0.1:8000/files/logo/20181103051454_123_baby_groot_2-1.jpg', 2, 2, 2, '2018-10-31 21:50:17', '2018-11-03 10:44:54', 0),
(2, 'product2', 'product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2', 'product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2 product2', 500.00, 400.00, '2018-11-01', '2018-11-01', 'Uncategorized', 'africa', 'http://127.0.0.1:8000/files/documents/20181031162215_123_DEADPOOL_marvel_superhero_-iPhone-XR-Wallpaper-1.jpg', 2, 2, 2, '2018-10-31 21:52:16', '2018-11-12 10:55:09', 0),
(3, 'product3', 'product3 product3 product3', 'product3 product3 product3 product3 product3 product3 product3 product3 product3 product3 product3 product3 product3 product3 product3 product3 product3', 200.00, 300.00, '2018-11-01', '2018-12-30', 'Diaspora', 'africa', 'http://127.0.0.1:8000/files/logo/20181103051623_123_the-hobbit-movie-poster1.jpg', 2, 2, 2, '2018-11-03 10:46:23', '2018-11-03 10:46:40', 0),
(4, 'product4', 'product4 product4 product4 product4 product4 product4 product4 product4 product4 product4 product4 product4 product4 product4', 'product4 product4 product4 product4 product4 product4 product4 product4 product4 product4 product4 product4 product4 product4 product4 product4 product4 product4 product4 product4 product4 product4 product4 product4 product4 product4 product4', 10.00, 5.00, NULL, NULL, 'Uncategorized,Uncategorized', 'africa', 'http://127.0.0.1:8000/files/documents/20181112052954_123_Xmen-Wolverine-iPhone-wallpaper-Retina.jpg', 2, 2, 2, '2018-11-12 10:59:54', '2018-11-12 10:59:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_cart`
--

CREATE TABLE `product_cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_cart`
--

INSERT INTO `product_cart` (`id`, `product_id`, `qty`, `created_by`, `updated_by`, `created_at`, `updated_at`, `delete_status`) VALUES
(3, 4, 1, 2, 2, '2018-11-12 11:00:11', '2018-11-12 11:00:11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `progress` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `content`, `progress`, `created_by`, `updated_by`, `created_at`, `updated_at`, `delete_status`) VALUES
(1, 'test project', 'test project test project test project test project test project test project  test project test project test project test project test project test project', 12, 2, 2, '2018-11-01 18:49:34', '2018-11-01 18:52:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_donations`
--

CREATE TABLE `project_donations` (
  `id` int(11) NOT NULL,
  `project_from` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `pay_type` varchar(100) NOT NULL,
  `created_by` int(55) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_funding`
--

CREATE TABLE `project_funding` (
  `id` int(11) NOT NULL,
  `project_from` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `pay_type` varchar(255) DEFAULT NULL,
  `comments` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_funding`
--

INSERT INTO `project_funding` (`id`, `project_from`, `amount`, `pay_type`, `comments`, `created_by`, `updated_by`, `created_at`, `updated_at`, `delete_status`) VALUES
(1, 2, 20.00, 'monthly', 'test fund', 1, 1, '2018-11-01 16:27:49', '2018-11-04 23:03:10', 0),
(2, 2, 25.00, 'monthly', 'best of luck', 1, 1, '2018-11-02 12:04:43', '2018-11-02 12:43:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `emailid` varchar(90) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supporters`
--

CREATE TABLE `supporters` (
  `id` int(11) NOT NULL,
  `expertise` text NOT NULL,
  `category` varchar(90) NOT NULL,
  `area_interest` varchar(100) NOT NULL,
  `country_interest` varchar(55) NOT NULL,
  `women_stage` varchar(90) NOT NULL,
  `expectation` text NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_users`
--

CREATE TABLE `temp_users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `groupid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `approve_status` int(11) DEFAULT '0',
  `approve_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_users`
--

INSERT INTO `temp_users` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `phone`, `groupid`, `userid`, `approve_status`, `approve_by`, `created_at`, `updated_at`, `delete_status`) VALUES
(1, 'arsanya', 'test', 'arsanya06@gmail.com', 'arsanya06', 'e3b81d385ca4c26109dfbda28c563e2b', NULL, 1, NULL, 1, NULL, '2018-10-31 17:05:56', '2018-10-31 17:12:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `id` int(11) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `groupid` int(11) NOT NULL,
  `is_hide` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete_status` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `phone`, `groupid`, `is_hide`, `userid`, `created_at`, `updated_at`, `delete_status`, `created_by`, `updated_by`) VALUES
(1, 'support', 'test', 'supporter@gmail.com', 'supporter', 'e3b81d385ca4c26109dfbda28c563e2b', NULL, 3, 0, NULL, '2018-10-23 16:13:11', '2018-10-29 12:58:38', 0, NULL, NULL),
(2, 'entrepreneur', 'test', 'entrepreneur@gmail.com', 'entrepreneur', 'e3b81d385ca4c26109dfbda28c563e2b', NULL, 1, 0, NULL, '2018-10-23 16:15:04', '2018-10-29 12:59:07', 0, NULL, NULL),
(3, 'Organization', 'test', 'organization@gmail.com', 'organization', 'e3b81d385ca4c26109dfbda28c563e2b', NULL, 2, 0, NULL, '2018-10-23 16:53:59', '2018-10-23 16:55:39', 0, NULL, NULL),
(4, 'Investor', 'test', 'investor@gmail.com', 'investor', 'e3b81d385ca4c26109dfbda28c563e2b', NULL, 4, 0, NULL, '2018-10-23 16:56:53', '2018-10-23 16:56:53', 0, NULL, NULL),
(9, 'arasanya', 'pandian', 'arasanya06@gmail.com', 'arasanya06', 'e3b81d385ca4c26109dfbda28c563e2b', NULL, 4, 0, NULL, '2018-10-31 17:07:41', '2018-10-31 17:07:41', 0, NULL, NULL),
(10, 'arsanya', 'test', 'arsanya06@gmail.com', 'arsanya06', 'e3b81d385ca4c26109dfbda28c563e2b', NULL, 1, 0, NULL, '2018-10-31 17:12:16', '2018-10-31 17:12:16', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE `usergroup` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `url` varchar(50) DEFAULT NULL,
  `reg_url` varchar(100) NOT NULL,
  `view_status` int(11) DEFAULT '0',
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`id`, `name`, `url`, `reg_url`, `view_status`, `delete_status`) VALUES
(1, 'Entrepreneur', 'entrepreneur', 'ent-register', 0, 0),
(2, 'Organization', 'organization', 'org-register', 0, 0),
(3, 'Supporter', 'supporter', 'sup-register', 0, 0),
(4, 'Investor', 'investor', 'inv-register', 0, 0),
(7, 'admin', 'admin', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userlogs`
--

CREATE TABLE `userlogs` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` varchar(55) DEFAULT NULL,
  `datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `login_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogs`
--

INSERT INTO `userlogs` (`id`, `userid`, `status`, `datetime`, `login_status`) VALUES
(1, 2, 'LOGIN', '2018-10-31 11:24:04', 0),
(2, 2, 'LOGOUT', '2018-10-31 11:35:06', 0),
(3, 9, 'LOGOUT', '2018-10-31 11:41:06', 0),
(4, 2, 'LOGIN', '2018-10-31 11:41:25', 0),
(5, 2, 'LOGOUT', '2018-10-31 11:42:37', 0),
(6, 10, 'LOGIN', '2018-10-31 11:42:59', 0),
(7, 10, 'LOGOUT', '2018-10-31 11:54:17', 0),
(8, 2, 'LOGIN', '2018-10-31 15:29:17', 0),
(9, 0, 'LOGIN', '2018-10-31 15:55:08', 0),
(10, 0, 'LOGIN', '2018-11-01 04:15:11', 0),
(11, 2, 'LOGIN', '2018-11-01 04:29:45', 0),
(12, 2, 'LOGIN', '2018-11-01 08:38:36', 0),
(13, 2, 'LOGOUT', '2018-11-01 10:45:35', 0),
(14, 4, 'LOGIN', '2018-11-01 10:46:04', 0),
(15, 4, 'LOGOUT', '2018-11-01 12:57:10', 0),
(16, 2, 'LOGIN', '2018-11-01 12:59:30', 0),
(17, 2, 'LOGOUT', '2018-11-01 13:32:55', 0),
(18, 4, 'LOGIN', '2018-11-01 13:33:18', 0),
(19, 4, 'LOGOUT', '2018-11-01 13:55:14', 0),
(20, 1, 'LOGIN', '2018-11-01 13:55:45', 0),
(21, 1, 'LOGOUT', '2018-11-01 14:06:48', 0),
(22, 2, 'LOGIN', '2018-11-02 04:39:48', 0),
(23, 2, 'LOGOUT', '2018-11-02 05:32:29', 0),
(24, 3, 'LOGIN', '2018-11-02 05:33:14', 0),
(25, 3, 'LOGIN', '2018-11-02 06:47:29', 0),
(26, 1, 'LOGIN', '2018-11-02 10:22:18', 0),
(27, 1, 'LOGOUT', '2018-11-02 11:28:24', 0),
(28, 4, 'LOGIN', '2018-11-02 11:28:46', 0),
(29, 0, 'LOGIN', '2018-11-03 04:23:10', 0),
(30, 3, 'LOGIN', '2018-11-03 05:41:05', 0),
(31, 3, 'LOGOUT', '2018-11-03 05:43:48', 0),
(32, 1, 'LOGIN', '2018-11-03 05:44:05', 0),
(33, 1, 'LOGOUT', '2018-11-03 05:44:52', 0),
(34, 4, 'LOGIN', '2018-11-03 05:45:14', 0),
(35, 4, 'LOGOUT', '2018-11-03 05:48:43', 0),
(36, 2, 'LOGIN', '2018-11-03 05:49:04', 0),
(37, 2, 'LOGIN', '2018-11-04 13:43:28', 0),
(38, 2, 'LOGOUT', '2018-11-04 13:47:11', 0),
(39, 1, 'LOGIN', '2018-11-04 13:47:53', 0),
(40, 1, 'LOGOUT', '2018-11-04 13:58:55', 0),
(41, 2, 'LOGIN', '2018-11-04 14:00:15', 0),
(42, 2, 'LOGIN', '2018-11-04 17:28:36', 0),
(43, 2, 'LOGIN', '2018-11-12 05:16:18', 0),
(44, 2, 'LOGOUT', '2018-11-12 05:41:41', 0),
(45, 1, 'LOGIN', '2018-11-12 05:42:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_status`, `display_name`) VALUES
(1, 'admin aim', 'e3b81d385ca4c26109dfbda28c563e2b', 'Africa Innovation Market', 'admin@aim.com', '/admin', 0, 'Admin AIM'),
(2, 'praveenperfeitoo', 'e3b81d385ca4c26109dfbda28c563e2b', 'praveen perfeitoo', 'praveenperfeitoo@gmail.com', '/admin', 0, 'Praveen Perfeitoo');

-- --------------------------------------------------------

--
-- Table structure for table `user_invites`
--

CREATE TABLE `user_invites` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `groupid` int(11) NOT NULL,
  `invited_by` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `invite_status` int(11) NOT NULL DEFAULT '0' COMMENT '0.not register 1.register',
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_invites`
--

INSERT INTO `user_invites` (`id`, `name`, `email`, `groupid`, `invited_by`, `created_by`, `updated_by`, `created_at`, `updated_at`, `invite_status`, `delete_status`) VALUES
(1, 'arasanya', 'arasanya06@gmail.com', 4, 2, 2, 2, '2018-10-31 17:01:53', '2018-10-31 17:07:41', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `women_stage`
--

CREATE TABLE `women_stage` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `delete_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `women_stage`
--

INSERT INTO `women_stage` (`id`, `name`, `created_by`, `delete_status`) VALUES
(1, 'Idea to pilot (experimentation)', NULL, 0),
(2, 'Investment ready to revenue generation (sustainability)', NULL, 0),
(3, 'Pilot to proof of concept (customer feedback & viability)', NULL, 0),
(4, 'Proof of concept to investment ready (profitability)', NULL, 0),
(5, 'Revenue generation to shared value creation (co-creation)', NULL, 0),
(6, 'Shared Value creation to Community well-being (well-being)', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entrepreneurs`
--
ALTER TABLE `entrepreneurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ent_businessplan`
--
ALTER TABLE `ent_businessplan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ent_company`
--
ALTER TABLE `ent_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ent_funding`
--
ALTER TABLE `ent_funding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ent_market`
--
ALTER TABLE `ent_market`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ent_mgmnt_team`
--
ALTER TABLE `ent_mgmnt_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investors`
--
ALTER TABLE `investors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketplace_settings`
--
ALTER TABLE `marketplace_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_address`
--
ALTER TABLE `order_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_files`
--
ALTER TABLE `org_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_cart`
--
ALTER TABLE `product_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_donations`
--
ALTER TABLE `project_donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_funding`
--
ALTER TABLE `project_funding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supporters`
--
ALTER TABLE `supporters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_users`
--
ALTER TABLE `temp_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlogs`
--
ALTER TABLE `userlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `user_invites`
--
ALTER TABLE `user_invites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `women_stage`
--
ALTER TABLE `women_stage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `entrepreneurs`
--
ALTER TABLE `entrepreneurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ent_businessplan`
--
ALTER TABLE `ent_businessplan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ent_company`
--
ALTER TABLE `ent_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ent_funding`
--
ALTER TABLE `ent_funding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ent_market`
--
ALTER TABLE `ent_market`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ent_mgmnt_team`
--
ALTER TABLE `ent_mgmnt_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `investors`
--
ALTER TABLE `investors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marketplace_settings`
--
ALTER TABLE `marketplace_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_address`
--
ALTER TABLE `order_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `org_files`
--
ALTER TABLE `org_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_cart`
--
ALTER TABLE `product_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_donations`
--
ALTER TABLE `project_donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_funding`
--
ALTER TABLE `project_funding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supporters`
--
ALTER TABLE `supporters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_users`
--
ALTER TABLE `temp_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usergroup`
--
ALTER TABLE `usergroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `userlogs`
--
ALTER TABLE `userlogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_invites`
--
ALTER TABLE `user_invites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `women_stage`
--
ALTER TABLE `women_stage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
