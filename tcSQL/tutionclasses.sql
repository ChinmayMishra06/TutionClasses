-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2019 at 06:16 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutionclasses`
--

-- --------------------------------------------------------

--
-- Table structure for table `tc_categories`
--

CREATE TABLE `tc_categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `parent_category` int(10) UNSIGNED DEFAULT NULL,
  `category_name` varchar(100) DEFAULT '',
  `delete_flag` char(1) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` char(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_categories`
--

INSERT INTO `tc_categories` (`category_id`, `parent_category`, `category_name`, `delete_flag`, `created_at`, `status`) VALUES
(1, 0, 'Java', '0', '2019-09-16 19:00:32', '0'),
(2, 1, 'Core Java\r\n', '0', '2019-09-16 19:00:53', '0'),
(3, 1, 'Advance Java', '0', '2019-09-16 19:01:11', '0'),
(4, 0, 'PHP', '0', '2019-09-16 19:02:13', '0'),
(5, 4, 'Core PHP\r\n', '0', '2019-09-16 19:02:45', '0'),
(6, 4, 'Advance PHP', '0', '2019-09-16 19:02:45', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tc_courses`
--

CREATE TABLE `tc_courses` (
  `course_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `course_name` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `description` varchar(1000) DEFAULT '',
  `duration` varchar(100) DEFAULT '',
  `medium` varchar(15) DEFAULT '',
  `logo_image` varchar(100) DEFAULT '',
  `banner_image` varchar(100) DEFAULT '',
  `letitude` decimal(12,8) DEFAULT '0.00000000',
  `longitude` decimal(12,8) DEFAULT '0.00000000',
  `fees` decimal(10,2) DEFAULT '0.00',
  `delete_flag` char(1) DEFAULT '0',
  `status` char(1) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tc_data`
--

CREATE TABLE `tc_data` (
  `id` int(11) NOT NULL,
  `key` varchar(30) NOT NULL DEFAULT '',
  `value` varchar(1000) NOT NULL DEFAULT '',
  `create_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tc_data`
--

INSERT INTO `tc_data` (`id`, `key`, `value`, `create_on`) VALUES
(8, 'min_ver', '2', '2019-09-12 15:57:22'),
(9, 'cur_ver', '9', '2019-09-12 16:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `tc_feedbacks`
--

CREATE TABLE `tc_feedbacks` (
  `feedback_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(1000) DEFAULT '',
  `status` char(1) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_feedbacks`
--

INSERT INTO `tc_feedbacks` (`feedback_id`, `user_id`, `category_id`, `description`, `status`, `created_at`) VALUES
(1, 1, 2, 'Nice Tution.', '0', '2019-09-18 09:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `tc_reports`
--

CREATE TABLE `tc_reports` (
  `report_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `victim_id` int(10) UNSIGNED DEFAULT NULL,
  `criminal_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(100) DEFAULT '',
  `description` varchar(1000) DEFAULT '',
  `status` char(1) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_reports`
--

INSERT INTO `tc_reports` (`report_id`, `category_id`, `victim_id`, `criminal_id`, `title`, `description`, `status`, `created_at`) VALUES
(1, 1, 1, 16, 'Learning', 'Not good learning', '0', '2019-09-18 09:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `tc_sessions`
--

CREATE TABLE `tc_sessions` (
  `sess_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(100) DEFAULT '',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_sessions`
--

INSERT INTO `tc_sessions` (`sess_id`, `user_id`, `email`, `created_at`, `status`) VALUES
(34, 16, 'mohitmishra.falna850@gmail.com', '2019-09-17 18:04:40', '1'),
(35, 1, 'mohitmishra.falna850@gmail.com', '2019-09-17 18:04:57', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tc_users`
--

CREATE TABLE `tc_users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL DEFAULT '',
  `contact` varchar(12) NOT NULL DEFAULT '',
  `email` varchar(60) NOT NULL DEFAULT '',
  `address` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(40) NOT NULL DEFAULT '',
  `dob` date NOT NULL,
  `image` varchar(80) NOT NULL DEFAULT '',
  `user_type` char(1) NOT NULL DEFAULT '0',
  `delete_flag` char(1) NOT NULL DEFAULT '0',
  `status` char(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_users`
--

INSERT INTO `tc_users` (`user_id`, `name`, `contact`, `email`, `address`, `password`, `dob`, `image`, `user_type`, `delete_flag`, `status`, `created_at`) VALUES
(1, 'mohit kumar mishra', '8690716407', 'mohitmishra.falna850@gmail.com', 'Ahmedabad', 'password', '2019-09-25', 'http://www.galary.com/galary', '0', '0', '0', '2019-09-12 14:20:24'),
(16, 'Mohit Mishra', '', 'mohitmishra.falna850@gmail.com', '', 'password', '0000-00-00', '', '1', '0', '0', '2019-09-17 18:00:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tc_categories`
--
ALTER TABLE `tc_categories`
  ADD PRIMARY KEY (`category_id`);

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
-- Indexes for table `tc_feedbacks`
--
ALTER TABLE `tc_feedbacks`
  ADD PRIMARY KEY (`feedback_id`);

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
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tc_courses`
--
ALTER TABLE `tc_courses`
  MODIFY `course_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tc_data`
--
ALTER TABLE `tc_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tc_feedbacks`
--
ALTER TABLE `tc_feedbacks`
  MODIFY `feedback_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tc_reports`
--
ALTER TABLE `tc_reports`
  MODIFY `report_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tc_sessions`
--
ALTER TABLE `tc_sessions`
  MODIFY `sess_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tc_users`
--
ALTER TABLE `tc_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
