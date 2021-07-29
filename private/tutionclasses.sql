-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 29, 2021 at 02:17 AM
-- Server version: 10.3.30-MariaDB-log-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bccfalna_rm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tc_categories`
--

CREATE TABLE `tc_categories` (
  `category_id` int(11) UNSIGNED NOT NULL,
  `category_type` int(11) UNSIGNED DEFAULT 0,
  `parent_category` int(11) UNSIGNED DEFAULT 0,
  `category_name` varchar(100) DEFAULT '',
  `delete_flag` char(1) DEFAULT '0',
  `created_at` datetime DEFAULT current_timestamp(),
  `status` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_categories`
--

INSERT INTO `tc_categories` (`category_id`, `category_type`, `parent_category`, `category_name`, `delete_flag`, `created_at`, `status`) VALUES
(1, 0, 0, 'Java', '0', '2019-09-16 19:00:32', '1'),
(2, 0, 1, 'Core Java\r\n', '0', '2019-09-16 19:00:53', '1'),
(3, 0, 1, 'Advance Java', '0', '2019-09-16 19:01:11', '1'),
(4, 0, 0, 'PHP', '0', '2019-09-16 19:02:13', '1'),
(5, 0, 4, 'Core PHP\r\n', '0', '2019-09-16 19:02:45', '1'),
(6, 0, 4, 'Advance PHP', '0', '2019-09-16 19:02:45', '1'),
(7, 1, 0, 'Hindi', '0', '2019-09-19 16:51:36', '1'),
(8, 1, 0, 'English', '0', '2019-09-19 16:51:36', '1'),
(9, 1, 0, 'Tamil', '0', '2019-09-19 17:00:53', '1'),
(10, 1, 0, 'Malyalam', '0', '2019-09-19 17:00:53', '1'),
(11, 0, 0, 'DOT NET', '0', '2019-10-05 09:46:48', '1'),
(12, 2, 0, 'Day', '0', '2019-10-07 13:25:19', '1'),
(13, 2, 0, 'Week', '0', '2019-10-07 13:25:19', '1'),
(14, 2, 0, 'Month', '0', '2019-10-07 13:26:25', '1'),
(17, 2, 0, 'Year', '0', '2019-10-07 13:27:21', '1'),
(18, 0, 0, 'Python', '0', '2019-10-13 10:57:16', '1'),
(21, 0, 18, 'Core Python', '0', '2019-10-13 11:07:12', '1'),
(22, 0, 18, 'Advance Python', '0', '2019-10-13 11:08:01', '1'),
(23, 0, 0, 'Android', '0', '2019-10-13 11:17:07', '1'),
(24, 0, 23, 'Marshmallow', '0', '2019-10-13 11:17:45', '1'),
(25, 0, 23, 'Jelly Bean', '0', '2019-10-13 11:18:47', '1'),
(26, 1, 0, 'Gujrati', '0', '2019-10-13 11:21:55', '1'),
(27, 1, 0, 'Rajasthani', '0', '2019-10-13 11:23:25', '1'),
(28, 0, 11, 'CSharp', '0', '2019-10-13 11:26:13', '1'),
(29, 0, 11, 'ADO', '0', '2019-10-13 11:26:42', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tc_contacts`
--

CREATE TABLE `tc_contacts` (
  `contact_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(50) DEFAULT '',
  `message` varchar(1000) DEFAULT NULL,
  `unread` int(10) UNSIGNED DEFAULT 0,
  `status` int(1) UNSIGNED DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `delete_flag` int(10) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_contacts`
--

INSERT INTO `tc_contacts` (`contact_id`, `name`, `email`, `subject`, `message`, `unread`, `status`, `created_at`, `delete_flag`) VALUES
(1, 'Chinmay Mishra', 'chinmaymishra.falna@gmail.com', 'Website Panel', 'Website created', 0, 1, '2019-10-21 15:32:36', 0),
(2, 'Mohit Mishra', 'mohitmishra.falna850@gmail.com', 'Backend', 'Backend created', 0, 1, '2019-10-21 15:38:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tc_courses`
--

CREATE TABLE `tc_courses` (
  `course_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `sub_category_id` int(10) UNSIGNED DEFAULT NULL,
  `medium` varchar(15) DEFAULT '',
  `course_name` varchar(50) DEFAULT NULL,
  `description` varchar(1000) DEFAULT '',
  `duration_unit` varchar(100) DEFAULT NULL,
  `duration` int(10) UNSIGNED DEFAULT 0,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `logo_image` varchar(100) DEFAULT 'logodummy.jpg',
  `banner_image` varchar(100) DEFAULT 'bannerdummy.jpg',
  `fees_unit` varchar(255) DEFAULT '',
  `fees` decimal(10,2) DEFAULT NULL,
  `avg_rating` int(10) UNSIGNED DEFAULT 0,
  `status` char(1) DEFAULT '1',
  `created_at` datetime DEFAULT current_timestamp(),
  `delete_flag` char(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_courses`
--

INSERT INTO `tc_courses` (`course_id`, `user_id`, `category_id`, `sub_category_id`, `medium`, `course_name`, `description`, `duration_unit`, `duration`, `start_date`, `end_date`, `logo_image`, `banner_image`, `fees_unit`, `fees`, `avg_rating`, `status`, `created_at`, `delete_flag`) VALUES
(26, 17, 1, 2, '7', 'Core Java', 'Java is a general-purpose programming language that is class-based, object-oriented, and designed to have as few implementation dependencies as possible', '13', 1, '2019-07-01', '2019-10-19', 'Javalogo.png', 'javaBanner.jpg', '12', 100.00, 4, '1', '2019-10-18 18:03:17', '0'),
(27, 17, 4, 5, '8', 'Core Php', 'PHP: Hypertext Preprocessor is a general-purpose programming language originally designed for web development. It was originally created by Rasmus Lerdorf in 1994; the PHP reference implementation is now produced by The PHP Group.', '13', 2, '2019-08-01', '2019-08-06', 'PHP.png', 'php.jpg', '13', 1000.00, 3, '1', '2019-10-18 18:10:47', '0'),
(28, 18, 11, 28, '9', 'CSharp', 'C# is a general-purpose, multi-paradigm programming language encompassing strong typing, lexically scoped, imperative, declarative, functional, generic, object-oriented, and component-oriented programming disciplines. W', '14', 10, '2019-09-01', '2019-10-31', 'CSharp.png', 'cBanner.jpg', '14', 1000.00, 4, '1', '2019-10-18 18:11:33', '0'),
(29, 18, 18, 21, '10', 'Core Python', 'Core Python Programming is a textbook on the Python programming language, written by Wesley J. Chun. The first edition of the book was released on December 14, 2000. The second edition was released several years later on September 18, 2006.', '17', 2, '2019-10-01', '2019-10-31', 'python_logo.png', 'pythonBanner.jpg', '17', 20000.00, 5, '1', '2019-10-18 18:12:38', '0'),
(30, 18, 23, 24, '26', 'Android Development', 'Android is a mobile operating system based on a modified version of the Linux kernel and other open source software, designed primarily for touchscreen mobile devices such as smartphones and tablets.', '14', 10, '2019-11-01', '2019-10-30', 'Android.png', 'android.jpg', '14', 5000.00, 1, '1', '2019-10-18 18:13:48', '0'),
(31, 18, 11, 29, '27', 'ADO Development', 'ADO.NET is a data access technology from the Microsoft .NET Framework that provides communication between relational and non-relational systems through a common set of components. ADO.NET is a set of computer software components that programmers can use to access data and data services from a database.', '17', 2, '2019-12-01', '2019-10-31', 'ADO.NET.png', 'ado-.net_.jpg', '17', 50000.00, 4, '1', '2019-10-18 18:15:03', '0'),
(32, 18, 23, 25, '8', 'Jelly Bean', 'Android \"Jelly Bean\" is the tenth version of Android and the codename given to three major point releases of the Android mobile operating system developed by Google, spanning versions between 4.1 and 4.3.1. Some operating systems that run Android 4.3/4.4 are Asus Nexus 7.', '13', 50, '2020-01-01', '2019-10-31', 'Android.png', 'android.jpg', '13', 1000.00, 5, '1', '2019-10-18 18:16:29', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tc_data`
--

CREATE TABLE `tc_data` (
  `id` int(11) UNSIGNED NOT NULL,
  `key` varchar(30) NOT NULL DEFAULT '',
  `value` varchar(1000) NOT NULL DEFAULT '',
  `create_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tc_data`
--

INSERT INTO `tc_data` (`id`, `key`, `value`, `create_on`) VALUES
(8, 'min_ver', '2', '2019-09-12 15:57:22'),
(9, 'cur_ver', '9', '2019-09-12 16:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `tc_enquiries`
--

CREATE TABLE `tc_enquiries` (
  `enquiry_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT 0,
  `course_id` int(10) UNSIGNED DEFAULT 0,
  `status` int(10) UNSIGNED DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` int(10) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_enquiries`
--

INSERT INTO `tc_enquiries` (`enquiry_id`, `user_id`, `course_id`, `status`, `created_at`, `deleted_at`) VALUES
(1, 24, 31, 1, '2019-10-21 15:58:57', 0),
(2, 24, 27, 1, '2019-10-21 16:47:42', 0),
(3, 24, 28, 1, '2019-10-21 18:31:59', 0),
(4, 24, 30, 1, '2019-10-21 18:34:01', 0),
(5, 24, 28, 1, '2019-10-21 18:42:32', 0),
(6, 24, 27, 1, '2019-10-21 18:44:03', 0),
(7, 24, 31, 1, '2019-10-21 18:45:47', 0),
(8, 24, 28, 1, '2019-10-21 18:55:04', 0),
(9, 24, 27, 1, '2019-10-21 18:56:08', 0),
(10, 24, 28, 1, '2019-10-21 18:56:56', 0),
(11, 24, 30, 1, '2019-10-21 18:59:50', 0),
(12, 24, 31, 1, '2019-10-21 19:02:11', 0),
(13, 24, 28, 1, '2019-10-22 12:17:33', 0),
(14, 24, 28, 1, '2019-10-22 12:19:00', 0),
(15, 24, NULL, 1, '2019-10-22 12:19:48', 0),
(16, 24, 30, 1, '2019-10-22 12:20:44', 0),
(17, 24, 29, 1, '2019-10-22 12:22:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tc_feedbacks`
--

CREATE TABLE `tc_feedbacks` (
  `feedback_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `course_id` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(1000) DEFAULT '',
  `rating` int(10) UNSIGNED DEFAULT 0,
  `status` char(1) DEFAULT '1',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_feedbacks`
--

INSERT INTO `tc_feedbacks` (`feedback_id`, `user_id`, `course_id`, `description`, `rating`, `status`, `created_at`) VALUES
(1, 22, 26, 'Average learning', 3, '1', '2019-09-18 09:28:57'),
(5, 34, 27, 'Poor study', 1, '1', '2019-10-16 10:21:51'),
(6, 35, 28, 'Fair study', 2, '1', '2019-10-16 10:21:51'),
(7, 24, 28, 'very very very good learning\r\n\r\n                                                                                                ', 4, '1', '2019-10-18 14:50:13'),
(8, 24, 26, 'Good', 4, '1', '2019-10-23 12:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `tc_newsletters`
--

CREATE TABLE `tc_newsletters` (
  `newsletter_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) DEFAULT '',
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` int(10) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_newsletters`
--

INSERT INTO `tc_newsletters` (`newsletter_id`, `email`, `created_at`, `deleted_at`) VALUES
(3, 'chinmaymishra.falna@gmail.com', '2019-10-21 12:38:20', 0),
(4, 'bccfalna@gmail.com', '2019-10-21 12:38:30', 0),
(5, 'mohitmishra.falna850@gmail.com', '2019-10-21 12:38:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tc_reports`
--

CREATE TABLE `tc_reports` (
  `report_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED DEFAULT NULL,
  `victim_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(100) DEFAULT '',
  `description` varchar(1000) DEFAULT '',
  `status` char(1) DEFAULT '1',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_reports`
--

INSERT INTO `tc_reports` (`report_id`, `course_id`, `victim_id`, `title`, `description`, `status`, `created_at`) VALUES
(7, 27, 24, 'Misbehave', 'Not good', '1', '2019-10-23 16:57:00'),
(8, 27, 24, 'Wrong teacher', 'Teacher details is wrong.', '1', '2019-10-23 16:58:35'),
(9, 30, 22, 'Fees high', 'Teacher fees is very high', '1', '2019-10-23 17:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `tc_sessions`
--

CREATE TABLE `tc_sessions` (
  `sess_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(100) DEFAULT '',
  `created_at` datetime DEFAULT current_timestamp(),
  `status` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_sessions`
--

INSERT INTO `tc_sessions` (`sess_id`, `user_id`, `email`, `created_at`, `status`) VALUES
(34, 16, 'mohitmishra.falna850@gmail.com', '2019-09-17 18:04:40', '1'),
(35, 1, 'mohitmishra.falna850@gmail.com', '2019-09-17 18:04:57', '1'),
(36, 1, 'mohitmishra.falna850@gmail.com', '2019-09-18 12:23:45', '1'),
(37, 22, 'mohitmishra.falna850@gmail.com', '2019-09-18 15:11:29', '1'),
(38, 17, 'bccfalna@gmail.com', '2019-09-18 15:41:20', '1'),
(39, 24, 'chinmaymishra.falna@gmail.com', '2019-09-18 16:00:40', '1'),
(40, 17, 'bccfalna@gmail.com', '2019-09-18 16:05:49', '1'),
(41, 24, 'chinmaymishra.falna@gmail.com', '2019-09-18 16:07:09', '1'),
(42, 24, 'chinmaymishra.falna@gmail.com', '2019-09-27 17:56:54', '1'),
(43, 24, 'chinmaymishra.falna@gmail.com', '2019-09-27 21:20:46', '1'),
(44, 24, 'chinmaymishra.falna@gmail.com', '2019-09-27 21:22:45', '1'),
(45, 24, 'chinmaymishra.falna@gmail.com', '2019-09-27 21:22:49', '1'),
(46, 24, 'chinmaymishra.falna@gmail.com', '2019-09-27 21:23:02', '1'),
(47, 24, 'chinmaymishra.falna@gmail.com', '2019-09-27 21:23:04', '1'),
(48, 24, 'chinmaymishra.falna@gmail.com', '2019-09-27 21:23:30', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tc_users`
--

CREATE TABLE `tc_users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL DEFAULT '',
  `contact` varchar(12) NOT NULL DEFAULT '',
  `email` varchar(60) NOT NULL DEFAULT '',
  `address` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(40) NOT NULL DEFAULT '',
  `dob` date NOT NULL,
  `image` varchar(80) NOT NULL DEFAULT 'dummyprofile.jpg',
  `banner_image` varchar(50) DEFAULT 'bannerdummy.jpg',
  `about_me` varchar(1000) DEFAULT '',
  `user_type` char(1) NOT NULL DEFAULT '0',
  `delete_flag` char(1) NOT NULL DEFAULT '0',
  `status` char(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `longitude` decimal(12,8) DEFAULT 0.00000000,
  `latitude` decimal(12,8) DEFAULT 0.00000000
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_users`
--

INSERT INTO `tc_users` (`user_id`, `name`, `contact`, `email`, `address`, `password`, `dob`, `image`, `banner_image`, `about_me`, `user_type`, `delete_flag`, `status`, `created_at`, `longitude`, `latitude`) VALUES
(17, 'Kuldeep Chand', '9799455505', 'bccfalna@gmail.com', 'Falna', 'password', '2019-10-03', 'employee20.jpeg', 'bannerdummy.jpg', '', '1', '0', '1', '2019-09-18 14:58:03', 73.23519900, 25.23590100),
(18, 'Abhishek Agarawal', '', 'agarawal.falna@gmail.com', 'rani', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '1', '1', '0', '2019-09-18 14:59:05', 73.31050100, 25.34820000),
(19, 'Gajendra Nagar', '', 'nagar.jalore@gmail.com', 'bali', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '1', '0', '1', '2019-09-18 14:59:32', 73.27949000, 25.19208000),
(20, 'Rishi Mathur', '', 'mathur.jhodhpur@gmail.com', 'sumerpur', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '1', '0', '1', '2019-09-18 14:59:55', 73.08740000, 25.16820000),
(21, 'Yameen Sharma', '', 'sharma.sumerpur@gmail.com', 'falna', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '1', '0', '1', '2019-09-18 15:00:38', 73.23519900, 25.23590100),
(22, 'Mohit', '', 'mohitmishra.falna850@gmail.com', 'sheoganj', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '0', '0', '1', '2019-09-18 15:02:49', 73.07026300, 25.13271700),
(23, 'Urvashi', '', 'urvashimishra.falna850@gmail.com', 'bali', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '0', '0', '1', '2019-09-18 15:03:34', 73.27949000, 25.19208000),
(24, 'Chinmay', '8690736210', 'chinmaymishra.falna@gmail.com', 'Falna', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', 'Gold Medalist', '1', '0', '1', '2019-09-18 15:04:08', 73.31050100, 25.34820000),
(25, 'Raaj', '', 'a@gmail.com', '', 'pass', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '1', '0', '0', '2019-09-30 17:22:41', 0.00000000, 0.00000000),
(26, 'Bharat', '', 'bharat@gmail.com', '', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '1', '0', '0', '2019-09-30 17:25:43', 0.00000000, 0.00000000),
(27, 'Dharmesh', '', 'dharmesh@gmail.com', '', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '1', '0', '0', '2019-10-01 09:22:05', 0.00000000, 0.00000000),
(28, 'Rishikesh', '', 'rishikesh@gmail.com', '', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '1', '0', '0', '2019-10-01 09:22:57', 0.00000000, 0.00000000),
(29, 'Dwarkadhis', '', 'dwarkadhish@gmail.com', '', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '1', '0', '0', '2019-10-01 09:24:05', 0.00000000, 0.00000000),
(30, 'kedarnath', '', 'kedarnath@gmail.com', '', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '1', '0', '0', '2019-10-01 09:28:15', 0.00000000, 0.00000000),
(31, 'a', '', 'b@gmail.com', '', 'asssssss', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '1', '0', '0', '2019-10-01 09:38:12', 0.00000000, 0.00000000),
(32, 'Rameshwaram', '', 'rameshwaram@gmail.com', '', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '1', '0', '0', '2019-10-01 10:16:36', 0.00000000, 0.00000000),
(33, 'Khushi', '', 'khushimishra.falna@gmail.com', '', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '0', '0', '0', '2019-10-13 18:47:07', 0.00000000, 0.00000000),
(34, 'Vijya', '', 'vijyamishra.falna@gmail.com', '', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '0', '0', '0', '2019-10-13 18:47:51', 0.00000000, 0.00000000),
(35, 'Suvarn', '', 'suvranmishra.falna@gmail.com', '', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '0', '0', '0', '2019-10-13 19:12:03', 0.00000000, 0.00000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tc_categories`
--
ALTER TABLE `tc_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tc_contacts`
--
ALTER TABLE `tc_contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tc_courses`
--
ALTER TABLE `tc_courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tc_data`
--
ALTER TABLE `tc_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Indexes for table `tc_enquiries`
--
ALTER TABLE `tc_enquiries`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- Indexes for table `tc_feedbacks`
--
ALTER TABLE `tc_feedbacks`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tc_newsletters`
--
ALTER TABLE `tc_newsletters`
  ADD PRIMARY KEY (`newsletter_id`);

--
-- Indexes for table `tc_reports`
--
ALTER TABLE `tc_reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `tc_sessions`
--
ALTER TABLE `tc_sessions`
  ADD PRIMARY KEY (`sess_id`);

--
-- Indexes for table `tc_users`
--
ALTER TABLE `tc_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tc_categories`
--
ALTER TABLE `tc_categories`
  MODIFY `category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tc_contacts`
--
ALTER TABLE `tc_contacts`
  MODIFY `contact_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tc_courses`
--
ALTER TABLE `tc_courses`
  MODIFY `course_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tc_data`
--
ALTER TABLE `tc_data`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tc_enquiries`
--
ALTER TABLE `tc_enquiries`
  MODIFY `enquiry_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tc_feedbacks`
--
ALTER TABLE `tc_feedbacks`
  MODIFY `feedback_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tc_newsletters`
--
ALTER TABLE `tc_newsletters`
  MODIFY `newsletter_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tc_reports`
--
ALTER TABLE `tc_reports`
  MODIFY `report_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tc_sessions`
--
ALTER TABLE `tc_sessions`
  MODIFY `sess_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tc_users`
--
ALTER TABLE `tc_users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
