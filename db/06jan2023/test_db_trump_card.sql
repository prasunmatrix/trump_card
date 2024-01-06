-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2024 at 05:00 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_db_trump_card`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `address` text NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `email_id`, `password`, `contact_no`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PRASUN KUNDU', 'admin', 'prasunk@mridayaitservices.com', 'e6e061838856bf47e1de730719fb2609', 9874522660, 'Kolkata, West Bengal, India', '1', '2020-08-25 09:18:17', '2020-09-16 04:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `admin_bkp09sep2020`
--

CREATE TABLE `admin_bkp09sep2020` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_bkp09sep2020`
--

INSERT INTO `admin_bkp09sep2020` (`id`, `username`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'e6e061838856bf47e1de730719fb2609', '1', '2020-08-25 09:18:17', '2020-09-08 16:19:38');

-- --------------------------------------------------------

--
-- Table structure for table `attributes_points`
--

CREATE TABLE `attributes_points` (
  `attributeid` int(11) NOT NULL,
  `category_id` int(11) NOT NULL COMMENT 'foreign key of category table categoryid',
  `subcategory_id` int(11) NOT NULL COMMENT 'foreign key of subcategory table subcategoryid ',
  `card_type_id` int(11) NOT NULL COMMENT 'foreign key of card_type table cardtypeid ',
  `attribute_name` varchar(255) NOT NULL,
  `attribute_win` varchar(255) NOT NULL,
  `point_assigned` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attributes_points`
--

INSERT INTO `attributes_points` (`attributeid`, `category_id`, `subcategory_id`, `card_type_id`, `attribute_name`, `attribute_win`, `point_assigned`, `status`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 1, 1, 4, 'Economy  Rate', 'Lowest Value', '25.45', 1, '2020-09-05 17:26:44', '2020-09-08 12:12:05', 0),
(2, 1, 1, 4, 'Bowling Average', 'Lowest Value', '50.00', 1, '2020-09-05 17:26:44', '2020-09-05 17:26:44', 0),
(3, 1, 2, 6, 'Speed of the serve', 'Highest Value', '24.65', 1, '2020-09-07 11:29:52', '2020-09-07 11:29:52', 0),
(4, 1, 2, 6, 'Swing of the server555', 'Highest Value', '45.50', 1, '2020-09-07 11:29:52', '2020-09-10 10:56:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `attributes_points_bkp05sep2020`
--

CREATE TABLE `attributes_points_bkp05sep2020` (
  `attributeid` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL COMMENT 'foreign key of subcategory table subcategoryid ',
  `card_type_id` int(11) NOT NULL COMMENT 'foreign key of card_type table cardtypeid ',
  `attribute_name` varchar(255) NOT NULL,
  `attribute_value` int(11) NOT NULL,
  `attribute_win` varchar(255) NOT NULL,
  `point_assigned` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attributes_points_bkp07sep2020`
--

CREATE TABLE `attributes_points_bkp07sep2020` (
  `attributeid` int(11) NOT NULL,
  `category_id` int(11) NOT NULL COMMENT 'foreign key of category table categoryid',
  `subcategory_id` int(11) NOT NULL COMMENT 'foreign key of subcategory table subcategoryid ',
  `card_type_id` int(11) NOT NULL COMMENT 'foreign key of card_type table cardtypeid ',
  `attribute_name` varchar(255) NOT NULL,
  `attribute_value` decimal(10,2) NOT NULL,
  `attribute_win` varchar(255) NOT NULL,
  `point_assigned` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attributes_points_bkp07sep2020`
--

INSERT INTO `attributes_points_bkp07sep2020` (`attributeid`, `category_id`, `subcategory_id`, `card_type_id`, `attribute_name`, `attribute_value`, `attribute_win`, `point_assigned`, `status`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 1, 1, 4, 'Economy  Rate', '4.65', 'Lowest Value', '25.45', 1, '2020-09-05 17:26:44', '2020-09-05 19:30:06', 0),
(2, 1, 1, 4, 'Bowling Average', '20.50', 'Lowest Value', '50.00', 1, '2020-09-05 17:26:44', '2020-09-05 17:26:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `carddetails`
--

CREATE TABLE `carddetails` (
  `carddetailsid` int(11) NOT NULL,
  `category_id` int(11) NOT NULL COMMENT 'foreign key of category table categoryid',
  `subcategory_id` int(11) NOT NULL COMMENT 'foreign key of subcategory table subcategoryid ',
  `card_type_id` int(11) NOT NULL COMMENT 'foreign key of card_type table cardtypeid ',
  `card_name` varchar(255) NOT NULL,
  `card_image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carddetails`
--

INSERT INTO `carddetails` (`carddetailsid`, `category_id`, `subcategory_id`, `card_type_id`, `card_name`, `card_image`, `status`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 1, 1, 4, 'Jasprit Bumrah', '1600077347.jpg', 1, '2020-09-14 08:13:49', '2020-09-14 09:56:52', 0),
(2, 1, 1, 4, 'Pat Cummins', '16000712291.jpg', 1, '2020-09-14 08:13:49', '2020-09-14 08:13:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `cardsid` int(11) NOT NULL,
  `category_id` int(11) NOT NULL COMMENT 'foreign key of category table categoryid',
  `subcategory_id` int(11) NOT NULL COMMENT 'foreign key of subcategory table subcategoryid ',
  `card_type_id` int(11) NOT NULL COMMENT 'foreign key of card_type table cardtypeid ',
  `carddetails_id` int(11) NOT NULL COMMENT 'foreign key of carddetails table carddetailsid ',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`cardsid`, `category_id`, `subcategory_id`, `card_type_id`, `carddetails_id`, `status`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 1, 1, 4, 1, 1, '2020-09-14 13:04:37', '2020-09-16 05:26:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cards_attribute`
--

CREATE TABLE `cards_attribute` (
  `cards_attribute_id` int(11) NOT NULL,
  `cards_id` int(11) NOT NULL COMMENT 'foreign key of cards table cardsid',
  `attribute_id` int(11) NOT NULL COMMENT 'foreign key of attributes_points table attributeid ',
  `attribute_value` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cards_attribute`
--

INSERT INTO `cards_attribute` (`cards_attribute_id`, `cards_id`, `attribute_id`, `attribute_value`, `status`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 1, 1, '2.55', 1, '2020-09-14 13:04:37', '2020-09-16 05:26:46', 0),
(2, 1, 2, '24.50', 1, '2020-09-14 13:04:38', '2020-09-15 15:05:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cards_bkp02sep2020`
--

CREATE TABLE `cards_bkp02sep2020` (
  `cardsid` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL COMMENT 'foreign key of subcategory table subcategoryid ',
  `card_name` varchar(255) NOT NULL,
  `card_banner_image` varchar(255) NOT NULL,
  `type_of_card` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cards_bkp14sep2020`
--

CREATE TABLE `cards_bkp14sep2020` (
  `cardsid` int(11) NOT NULL,
  `category_id` int(11) NOT NULL COMMENT 'foreign key of category table categoryid',
  `subcategory_id` int(11) NOT NULL COMMENT 'foreign key of subcategory table subcategoryid ',
  `card_type_id` int(11) NOT NULL COMMENT 'foreign key of card_type table cardtypeid ',
  `attribute_ id` int(11) NOT NULL COMMENT 'foreign key of attributes_points table attributeid ',
  `card_name` varchar(255) NOT NULL,
  `card_banner_image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `card_type`
--

CREATE TABLE `card_type` (
  `cardtypeid` int(11) NOT NULL,
  `category_id` int(11) NOT NULL COMMENT 'foreign key of category table categoryid',
  `subcategory_id` int(11) NOT NULL COMMENT 'foreign key of subcategory table subcategoryid ',
  `card_type` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card_type`
--

INSERT INTO `card_type` (`cardtypeid`, `category_id`, `subcategory_id`, `card_type`, `status`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 0, 2, 'test card type test 6565', 1, '2020-09-03 17:37:09', '2020-09-04 06:12:35', 0),
(2, 0, 1, 'test card type2', 0, '2020-09-03 17:37:10', '2020-09-04 15:45:32', 0),
(3, 3, 2, 'batsman545', 1, '2020-09-04 15:44:45', '2020-09-04 19:11:38', 0),
(4, 1, 1, 'bowler', 1, '2020-09-04 15:44:45', '2020-09-05 14:00:41', 0),
(5, 1, 1, 'Batsman', 1, '2020-09-05 14:32:01', '2020-09-07 10:13:32', 0),
(6, 1, 2, 'Best Server', 1, '2020-09-05 14:32:01', '2020-09-07 10:14:11', 0),
(7, 1, 3, 'Goal Keeper', 1, '2020-09-10 10:27:37', '2020-09-10 10:27:37', 0),
(8, 1, 3, 'Forward', 1, '2020-09-10 10:27:37', '2020-09-10 10:38:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_banner_image` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `category_name`, `category_banner_image`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'Sports', '1599470677.jpg', '', '', 1, '2020-09-07 09:24:37', '2020-09-22 15:09:29', 0),
(2, 'Test', '1600782366.jpg', 'testing', 'testing..', 1, '2020-09-22 13:46:06', '2020-09-22 15:09:32', 0),
(3, 'Test 22', '1704555514.jpg', 'test 22', 'test 22', 1, '2024-01-06 15:11:21', '2024-01-06 15:38:34', 0),
(4, 'Test 44', '1704555621.jpg', 'test 44', 'test 44', 1, '2024-01-06 15:39:19', '2024-01-06 15:40:21', 0),
(6, 'Test New', '1704556373.jpg', 'Test New', 'Test New', 1, '2024-01-06 15:45:16', '2024-01-06 15:52:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `enquiryid` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `message_subject` varchar(255) NOT NULL,
  `message_body` text NOT NULL,
  `message_date` date NOT NULL,
  `is_reply` tinyint(1) NOT NULL DEFAULT 0,
  `reply_date` date NOT NULL,
  `reply_meeage` text NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`enquiryid`, `full_name`, `email_id`, `mobile_no`, `location`, `message_subject`, `message_body`, `message_date`, `is_reply`, `reply_date`, `reply_meeage`, `is_deleted`) VALUES
(1, 'Tapash Sinha', 'tapash@gmail.com', '9874522660', 'test', 'Please download link of the app', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2020-09-15', 1, '2020-09-18', 'test reply message...', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gametype`
--

CREATE TABLE `gametype` (
  `gametypeid` int(11) NOT NULL,
  `category_id` int(11) NOT NULL COMMENT 'foreign key of category table categoryid',
  `subcategory_id` int(11) NOT NULL COMMENT 'foreign key of subcategory table subcategoryid ',
  `gamecategory_id` int(11) NOT NULL COMMENT 'foreign key of game_category table gamecategoryid',
  `cards_to_be_played` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gametype`
--

INSERT INTO `gametype` (`gametypeid`, `category_id`, `subcategory_id`, `gamecategory_id`, `cards_to_be_played`, `status`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 1, 1, 1, '14,22,30,50', 1, '2020-09-16 14:14:54', '2020-09-16 15:32:46', 0),
(2, 1, 1, 2, '15,20,25', 1, '2020-09-16 14:14:54', '2020-09-16 14:14:54', 0),
(3, 1, 1, 3, '10,12,14', 1, '2020-09-16 14:14:54', '2020-09-16 14:14:54', 0),
(4, 1, 1, 4, '20,28,40,75', 1, '2020-09-16 14:14:54', '2020-09-16 15:33:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `game_category`
--

CREATE TABLE `game_category` (
  `gamecategoryid` int(11) NOT NULL,
  `gametype_name` varchar(255) NOT NULL,
  `no_of_player_played` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game_category`
--

INSERT INTO `game_category` (`gamecategoryid`, `gametype_name`, `no_of_player_played`, `status`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'Player vs Player', '2', 1, '2020-09-15 10:09:36', '2020-09-15 10:09:36', 0),
(2, 'Player vs Computer', '2', 1, '2020-09-15 10:09:36', '2020-09-15 10:09:36', 0),
(3, 'Tournament', '2', 1, '2020-09-15 10:12:10', '2020-09-15 10:12:10', 0),
(4, 'Player vs Multi Players', '4', 1, '2020-09-15 10:12:10', '2020-09-15 10:12:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gifts`
--

CREATE TABLE `gifts` (
  `giftsid` int(11) NOT NULL,
  `category_id` varchar(255) NOT NULL COMMENT 'foreign key of category table categoryid',
  `subcategory_id` int(11) NOT NULL COMMENT 'foreign key of subcategory table subcategoryid ',
  `gift_voucher_name` varchar(255) NOT NULL,
  `gift_voucher_value` int(11) NOT NULL,
  `coin_reedem_value` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gifts`
--

INSERT INTO `gifts` (`giftsid`, `category_id`, `subcategory_id`, `gift_voucher_name`, `gift_voucher_value`, `coin_reedem_value`, `status`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, '1', 1, 'IPL Ticket', 40, 75, 1, '2020-09-16 12:00:20', '2020-09-21 06:37:15', 0),
(2, '1', 2, '500 in paytm wallet', 40, 60, 1, '2020-09-16 12:00:20', '2020-09-16 13:53:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `managecms`
--

CREATE TABLE `managecms` (
  `cmsid` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managecms`
--

INSERT INTO `managecms` (`cmsid`, `page_title`, `page_slug`, `image`, `content`, `status`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'About Us', 'about-us', '1599561605.jpeg', '<p><img src=\"http://localhost/mridayaitservices/trump_card/assets/uploads/cms/summernote/1599664559.jpg\" style=\"width: 275px;\"><strong style=\"margin: 0px; padding: 0px; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\"><br></strong></p><p><strong style=\"margin: 0px; padding: 0px; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Lorem Ipsum</strong><span style=\"font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span><br></p><p></p><p></p><p></p>', 1, '2020-09-08 10:40:05', '2020-09-09 15:16:02', 0),
(2, 'Contact Us', 'contact-us', '1599562086.jpg', '<p><strong open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\" style=\"background-color: transparent; font-size: 0.875rem; margin: 0px; padding: 0px;\">Lorem Ipsum</strong><span open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\" style=\"background-color: transparent; font-size: 0.875rem;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span><br></p>', 1, '2020-09-08 10:48:06', '2020-09-09 15:19:14', 0),
(3, 'Terms & Condition', 'terms-condition', '1599575335.jpg', '<p><img src=\"data:image/jpeg;base64,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\" data-filename=\"flower8.jpg\" style=\"width: 351px;\"></p><p><strong style=\"margin: 0px; padding: 0px; font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span><br></p>', 0, '2020-09-08 14:28:04', '2020-09-08 14:29:48', 0),
(4, 'test', 'test', '1599663060.jpg', '<p><img src=\"http://localhost/mridayaitservices/trump_card/assets/uploads/cms/summernote/1599663049.jpeg\" style=\"width: 525px;\"><br></p>', 1, '2020-09-09 14:49:24', '2020-09-21 05:40:41', 0),
(5, 'test new', 'test-new', '', '<p><img src=\"http://localhost/mridayaitservices/trump_card/assets/uploads/cms/summernote/1599663569.jpeg\" style=\"width: 467px;\"><br></p>', 1, '2020-09-09 14:57:23', '2020-09-09 14:59:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `memberid` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `displayname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `mobile_number` bigint(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `memberid`, `photo`, `fullname`, `displayname`, `age`, `email_id`, `mobile_number`, `password`, `location`, `status`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, '477997771', '', 'Shovan Nandi', 'shovan123', '26', 'shovann@mridayaitservices.com', 8348338409, '', 'Arambag,West Bengal, India', 1, '2020-09-01 09:16:26', '2020-09-21 05:43:56', 0),
(2, '495176042', '', 'Sanjay Saha', 'sanjay222', '30', 'sanjay@gmail.com', 9874522556, '', 'Kestopur, Kolkata, India', 1, '2020-09-01 09:16:26', '2020-09-01 09:16:47', 0),
(3, '744945333', '', 'Subrata Podder', 'subrata007', '32', 'subrata@gmail.com', 8974566990, '', 'Barrackpore, West Bengal, India  ', 1, '2020-09-01 09:36:56', '2020-09-01 09:36:56', 0),
(4, '503399804', '', 'Debraj Ghosh', 'debraj556', '32', 'debraj@gmail.com', 9856033550, '', 'Salt Lake, Kolkata, India', 1, '2020-05-20 09:36:56', '2020-09-02 14:43:02', 0),
(5, '383064745', '', 'Vivek Roy', 'vivek665', '28', 'vivek@gmail.com', 6587866899, '', 'Chandi Chawk, New Delhi, India', 1, '2020-07-15 09:36:56', '2020-09-02 14:43:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `registration_bkp02sep2020`
--

CREATE TABLE `registration_bkp02sep2020` (
  `id` int(11) NOT NULL,
  `memberid` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `displayname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `mobile_number` bigint(20) NOT NULL,
  `location` text NOT NULL,
  `member_since` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration_bkp02sep2020`
--

INSERT INTO `registration_bkp02sep2020` (`id`, `memberid`, `photo`, `fullname`, `displayname`, `age`, `email_id`, `mobile_number`, `location`, `member_since`, `status`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, '477997771', '', 'Shovan Nandi', 'shovan123', '26', 'shovann@mridayaitservices.com', 8348338409, 'Arambag,West Bengal, India', '2020-09-01 09:16:26', 1, '2020-09-01 09:16:26', '2020-09-01 09:16:26', 0),
(2, '495176042', '', 'Sanjay Saha', 'sanjay222', '30', 'sanjay@gmail.com', 9874522556, 'Kestopur, Kolkata, India', '2020-09-01 09:16:47', 1, '2020-09-01 09:16:26', '2020-09-01 09:16:47', 0),
(3, '744945333', '', 'Subrata Podder', 'subrata007', '32', 'subrata@gmail.com', 8974566990, 'Barrackpore, West Bengal, India  ', '2020-09-01 09:36:56', 1, '2020-09-01 09:36:56', '2020-09-01 09:36:56', 0),
(4, '503399804', '', 'Debraj Ghosh', 'debraj556', '32', 'debraj@gmail.com', 9856033550, 'Salt Lake, Kolkata, India', '2020-09-02 14:43:02', 1, '2020-05-20 09:36:56', '2020-09-02 14:43:02', 0),
(5, '383064745', '', 'Vivek Roy', 'vivek665', '28', 'vivek@gmail.com', 6587866899, 'Chandi Chawk, New Delhi, India', '2020-09-02 14:43:15', 1, '2020-07-15 09:36:56', '2020-09-02 14:43:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `registration_bkp22sep2020`
--

CREATE TABLE `registration_bkp22sep2020` (
  `id` int(11) NOT NULL,
  `memberid` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `displayname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `mobile_number` bigint(20) NOT NULL,
  `location` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration_bkp22sep2020`
--

INSERT INTO `registration_bkp22sep2020` (`id`, `memberid`, `photo`, `fullname`, `displayname`, `age`, `email_id`, `mobile_number`, `location`, `status`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, '477997771', '', 'Shovan Nandi', 'shovan123', '26', 'shovann@mridayaitservices.com', 8348338409, 'Arambag,West Bengal, India', 1, '2020-09-01 09:16:26', '2020-09-21 05:43:56', 0),
(2, '495176042', '', 'Sanjay Saha', 'sanjay222', '30', 'sanjay@gmail.com', 9874522556, 'Kestopur, Kolkata, India', 1, '2020-09-01 09:16:26', '2020-09-01 09:16:47', 0),
(3, '744945333', '', 'Subrata Podder', 'subrata007', '32', 'subrata@gmail.com', 8974566990, 'Barrackpore, West Bengal, India  ', 1, '2020-09-01 09:36:56', '2020-09-01 09:36:56', 0),
(4, '503399804', '', 'Debraj Ghosh', 'debraj556', '32', 'debraj@gmail.com', 9856033550, 'Salt Lake, Kolkata, India', 1, '2020-05-20 09:36:56', '2020-09-02 14:43:02', 0),
(5, '383064745', '', 'Vivek Roy', 'vivek665', '28', 'vivek@gmail.com', 6587866899, 'Chandi Chawk, New Delhi, India', 1, '2020-07-15 09:36:56', '2020-09-02 14:43:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `special_point`
--

CREATE TABLE `special_point` (
  `specialpointid` int(11) NOT NULL,
  `category_id` int(11) NOT NULL COMMENT 'foreign key of category table categoryid',
  `subcategory_id` int(11) NOT NULL COMMENT 'foreign key of subcategory table subcategoryid ',
  `tournament_id` varchar(255) NOT NULL COMMENT 'foreign key of tournament table tournamentid',
  `points_on_win` varchar(255) NOT NULL,
  `tenure_from_date` varchar(255) NOT NULL,
  `tenure_to_date` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `special_point`
--

INSERT INTO `special_point` (`specialpointid`, `category_id`, `subcategory_id`, `tournament_id`, `points_on_win`, `tenure_from_date`, `tenure_to_date`, `status`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 1, 1, '1', '2X', '09/15/2020', '09/25/2020', 1, '2020-09-17 10:02:28', '2020-09-17 10:53:47', 0),
(2, 1, 1, '2', '2X', '09/18/2020', '09/28/2020', 1, '2020-09-17 10:02:58', '2020-09-17 11:49:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `statisticsid` int(11) NOT NULL,
  `registration_id` int(11) NOT NULL COMMENT 'foreign key of registration table id ',
  `total_played` int(11) NOT NULL,
  `win` int(11) NOT NULL,
  `loss` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `coins` int(11) NOT NULL,
  `redeem` int(11) NOT NULL,
  `opponent_id` int(11) NOT NULL COMMENT 'foreign key of registration table id',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`statisticsid`, `registration_id`, `total_played`, `win`, `loss`, `points`, `coins`, `redeem`, `opponent_id`, `status`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 2, 4, 2, 2, 50, 100, 10, 3, 1, '2020-09-02 15:09:31', '2020-09-02 15:09:31', 0),
(2, 4, 6, 4, 2, 100, 50, 20, 5, 1, '2020-09-02 15:09:31', '2020-09-02 15:09:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategoryid` int(11) NOT NULL,
  `category_id` int(11) NOT NULL COMMENT 'foreign key of category table categoryid ',
  `subcategory_name` varchar(255) NOT NULL,
  `subcategory_banner_image` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategoryid`, `category_id`, `subcategory_name`, `subcategory_banner_image`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 1, 'Cricket', '1599470715.jpeg', '', '', 1, '2020-09-07 09:25:15', '2020-09-22 15:15:14', 0),
(2, 1, 'Badminton', '1599473386.jpg', '', '', 1, '2020-09-07 10:09:46', '2020-09-22 15:15:17', 0),
(3, 1, 'Football', '1599473775.jpeg', '', '', 1, '2020-09-07 10:15:49', '2020-09-22 15:15:20', 0),
(4, 1, 'Hockey', '1599732429.jpg', '', '', 1, '2020-09-10 10:07:09', '2020-09-22 15:15:23', 0),
(5, 1, 'Car Racing', '15997324291.jpg', '', '', 1, '2020-09-10 10:07:09', '2020-09-22 15:15:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

CREATE TABLE `tournament` (
  `tournamentid` int(11) NOT NULL,
  `category_id` int(11) NOT NULL COMMENT 'foreign key of category table categoryid',
  `subcategory_id` int(11) NOT NULL COMMENT 'foreign key of subcategory table subcategoryid ',
  `tournament_name` varchar(255) NOT NULL,
  `tournament_banner_image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tournament`
--

INSERT INTO `tournament` (`tournamentid`, `category_id`, `subcategory_id`, `tournament_name`, `tournament_banner_image`, `status`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 1, 1, 'IPL', '1600156401.jpg', 0, '2020-09-15 06:23:20', '2020-09-22 15:19:15', 0),
(2, 1, 1, 'Australia Legue', '1600156385.jpg', 0, '2020-09-15 06:23:20', '2020-09-22 15:19:18', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_bkp09sep2020`
--
ALTER TABLE `admin_bkp09sep2020`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes_points`
--
ALTER TABLE `attributes_points`
  ADD PRIMARY KEY (`attributeid`);

--
-- Indexes for table `attributes_points_bkp05sep2020`
--
ALTER TABLE `attributes_points_bkp05sep2020`
  ADD PRIMARY KEY (`attributeid`);

--
-- Indexes for table `attributes_points_bkp07sep2020`
--
ALTER TABLE `attributes_points_bkp07sep2020`
  ADD PRIMARY KEY (`attributeid`);

--
-- Indexes for table `carddetails`
--
ALTER TABLE `carddetails`
  ADD PRIMARY KEY (`carddetailsid`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`cardsid`);

--
-- Indexes for table `cards_attribute`
--
ALTER TABLE `cards_attribute`
  ADD PRIMARY KEY (`cards_attribute_id`);

--
-- Indexes for table `cards_bkp02sep2020`
--
ALTER TABLE `cards_bkp02sep2020`
  ADD PRIMARY KEY (`cardsid`);

--
-- Indexes for table `cards_bkp14sep2020`
--
ALTER TABLE `cards_bkp14sep2020`
  ADD PRIMARY KEY (`cardsid`);

--
-- Indexes for table `card_type`
--
ALTER TABLE `card_type`
  ADD PRIMARY KEY (`cardtypeid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`enquiryid`);

--
-- Indexes for table `gametype`
--
ALTER TABLE `gametype`
  ADD PRIMARY KEY (`gametypeid`);

--
-- Indexes for table `game_category`
--
ALTER TABLE `game_category`
  ADD PRIMARY KEY (`gamecategoryid`);

--
-- Indexes for table `gifts`
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`giftsid`);

--
-- Indexes for table `managecms`
--
ALTER TABLE `managecms`
  ADD PRIMARY KEY (`cmsid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_bkp02sep2020`
--
ALTER TABLE `registration_bkp02sep2020`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_bkp22sep2020`
--
ALTER TABLE `registration_bkp22sep2020`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_point`
--
ALTER TABLE `special_point`
  ADD PRIMARY KEY (`specialpointid`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`statisticsid`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategoryid`);

--
-- Indexes for table `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`tournamentid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_bkp09sep2020`
--
ALTER TABLE `admin_bkp09sep2020`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attributes_points`
--
ALTER TABLE `attributes_points`
  MODIFY `attributeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attributes_points_bkp05sep2020`
--
ALTER TABLE `attributes_points_bkp05sep2020`
  MODIFY `attributeid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attributes_points_bkp07sep2020`
--
ALTER TABLE `attributes_points_bkp07sep2020`
  MODIFY `attributeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carddetails`
--
ALTER TABLE `carddetails`
  MODIFY `carddetailsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `cardsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cards_attribute`
--
ALTER TABLE `cards_attribute`
  MODIFY `cards_attribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cards_bkp02sep2020`
--
ALTER TABLE `cards_bkp02sep2020`
  MODIFY `cardsid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cards_bkp14sep2020`
--
ALTER TABLE `cards_bkp14sep2020`
  MODIFY `cardsid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `card_type`
--
ALTER TABLE `card_type`
  MODIFY `cardtypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `enquiryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gametype`
--
ALTER TABLE `gametype`
  MODIFY `gametypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `game_category`
--
ALTER TABLE `game_category`
  MODIFY `gamecategoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gifts`
--
ALTER TABLE `gifts`
  MODIFY `giftsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `managecms`
--
ALTER TABLE `managecms`
  MODIFY `cmsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registration_bkp02sep2020`
--
ALTER TABLE `registration_bkp02sep2020`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registration_bkp22sep2020`
--
ALTER TABLE `registration_bkp22sep2020`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `special_point`
--
ALTER TABLE `special_point`
  MODIFY `specialpointid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `statisticsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tournament`
--
ALTER TABLE `tournament`
  MODIFY `tournamentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
