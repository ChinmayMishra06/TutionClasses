-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2019 at 03:39 PM
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
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES
(1, 'Heir Apparel', 'Crowea Pl, Frenchs Forest NSW 2086', -33.737885, 151.235260),
(2, 'BeeYourself Clothing', 'Thalia St, Hassall Grove NSW 2761', -33.729752, 150.836090),
(3, 'Dress Code', 'Glenview Avenue, Revesby, NSW 2212', -33.949448, 151.008591),
(4, 'The Legacy', 'Charlotte Ln, Chatswood NSW 2067', -33.796669, 151.183609),
(5, 'Fashiontasia', 'Braidwood Dr, Prestons NSW 2170', -33.944489, 150.854706),
(6, 'Trish & Tash', 'Lincoln St, Lane Cove West NSW 2066', -33.812222, 151.143707),
(7, 'Perfect Fit', 'Darley Rd, Randwick NSW 2031', -33.903557, 151.237732),
(8, 'Buena Ropa!', 'Brodie St, Rydalmere NSW 2116', -33.815521, 151.026642),
(9, 'Coxcomb and Lily Boutique', 'Ferrers Rd, Horsley Park NSW 2175', -33.829525, 150.873764),
(10, 'Moda Couture', 'Northcote Rd, Glebe NSW 2037', -33.873882, 151.177460);

-- --------------------------------------------------------

--
-- Table structure for table `tc_categories`
--

CREATE TABLE `tc_categories` (
  `category_id` int(11) UNSIGNED NOT NULL,
  `category_type` int(11) UNSIGNED DEFAULT '0',
  `parent_category` int(11) UNSIGNED DEFAULT '0',
  `category_name` varchar(100) DEFAULT '',
  `delete_flag` char(1) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` char(1) DEFAULT '0'
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
(10, 1, 0, 'Malyalam', '0', '2019-09-19 17:00:53', '1');

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
  `medium` int(10) UNSIGNED DEFAULT '0',
  `logo_image` varchar(100) DEFAULT '',
  `fees` decimal(10,2) DEFAULT '0.00',
  `delete_flag` char(1) DEFAULT '0',
  `status` char(1) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_courses`
--

INSERT INTO `tc_courses` (`course_id`, `category_id`, `user_id`, `course_name`, `start_date`, `description`, `duration`, `medium`, `logo_image`, `fees`, `delete_flag`, `status`, `created_at`) VALUES
(1, 1, 17, 'English', '2019-09-18', 'This is english course.', 'Quarterly', 7, 'logoImage', '2500.00', '0', '0', '2019-09-18 17:27:43'),
(2, 2, 18, 'Hindi', '2019-09-18', 'This is hindi course.', 'Monthly', 0, 'logoImage', '1000.00', '0', '0', '2019-09-18 17:28:41'),
(3, 5, 19, 'Maths', '2019-09-18', 'This is maths course.', 'Half Yearly', 8, 'logoImage', '4000.00', '0', '0', '2019-09-18 17:29:17'),
(4, 1, 20, 'Science', '2019-09-18', 'This is science course.', 'Yearly', 9, 'logoImage', '5000.00', '0', '0', '2019-09-18 17:30:50'),
(5, 3, 21, 'Social Science', '2019-09-19', 'This is science course.', 'Yearly', 10, 'logoImage', '5000.00', '0', '0', '2019-09-19 13:44:56'),
(6, 1, 19, 'English', '2019-09-19', 'This is English course.', 'Half Yearly', 8, 'logoImage', '5000.00', '0', '0', '2019-09-19 15:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `tc_data`
--

CREATE TABLE `tc_data` (
  `id` int(11) UNSIGNED NOT NULL,
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
(1, 1, 2, 'Nice Tution.', '1', '2019-09-18 09:28:57');

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
(1, 1, 1, 16, 'Learning', 'Not good learning', '1', '2019-09-18 09:44:32');

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
(35, 1, 'mohitmishra.falna850@gmail.com', '2019-09-17 18:04:57', '1'),
(36, 1, 'mohitmishra.falna850@gmail.com', '2019-09-18 12:23:45', '1'),
(37, 22, 'mohitmishra.falna850@gmail.com', '2019-09-18 15:11:29', '1'),
(38, 17, 'bccfalna@gmail.com', '2019-09-18 15:41:20', '1'),
(39, 24, 'chinmaymishra.falna@gmail.com', '2019-09-18 16:00:40', '1'),
(40, 17, 'bccfalna@gmail.com', '2019-09-18 16:05:49', '1'),
(41, 24, 'chinmaymishra.falna@gmail.com', '2019-09-18 16:07:09', '1');

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
  `logo_image` varchar(80) NOT NULL DEFAULT '',
  `banner_image` varchar(100) DEFAULT NULL,
  `user_type` char(1) NOT NULL DEFAULT '0',
  `delete_flag` char(1) NOT NULL DEFAULT '0',
  `status` char(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `latitude` decimal(12,8) DEFAULT '0.00000000',
  `longitude` decimal(12,8) DEFAULT '0.00000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_users`
--

INSERT INTO `tc_users` (`user_id`, `name`, `contact`, `email`, `address`, `password`, `dob`, `logo_image`, `banner_image`, `user_type`, `delete_flag`, `status`, `created_at`, `latitude`, `longitude`) VALUES
(17, 'Kuldeep Chand', '', 'bccfalna@gmail.com', 'falna', 'password', '0000-00-00', '', NULL, '1', '0', '1', '2019-09-18 14:58:03', '25.23590100', '73.23519900'),
(18, 'Abhishek Agarawal', '', 'agarawal.falna@gmail.com', 'rani', 'password', '0000-00-00', '', NULL, '1', '1', '0', '2019-09-18 14:59:05', '25.34820000', '73.31050100'),
(19, 'Gajendra Nagar', '', 'nagar.jalore@gmail.com', 'bali', 'password', '0000-00-00', '', NULL, '1', '0', '1', '2019-09-18 14:59:32', '25.19208000', '73.27949000'),
(20, 'Rishi Mathur', '', 'mathur.jhodhpur@gmail.com', 'sumerpur', 'password', '0000-00-00', '', NULL, '1', '0', '1', '2019-09-18 14:59:55', '25.16820000', '73.08740000'),
(21, 'Yameen Sharma', '', 'sharma.sumerpur@gmail.com', 'falna', 'password', '0000-00-00', '', NULL, '1', '0', '1', '2019-09-18 15:00:38', '25.23590100', '73.23519900'),
(22, 'Mohit Mishra', '', 'mohitmishra.falna850@gmail.com', 'sheoganj', 'password', '0000-00-00', '', NULL, '0', '0', '1', '2019-09-18 15:02:49', '25.13271700', '73.07026300'),
(23, 'Urvashi Mishra', '', 'urvashimishra.falna850@gmail.com', 'bali', 'password', '0000-00-00', '', NULL, '0', '0', '1', '2019-09-18 15:03:34', '25.19208000', '73.27949000'),
(24, 'Chinmay Mishra', '', 'chinmaymishra.falna@gmail.com', 'rani', 'password', '0000-00-00', '', NULL, '0', '0', '1', '2019-09-18 15:04:08', '25.34820000', '73.31050100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tc_categories`
--
ALTER TABLE `tc_categories`
  MODIFY `category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tc_courses`
--
ALTER TABLE `tc_courses`
  MODIFY `course_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tc_data`
--
ALTER TABLE `tc_data`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `sess_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tc_users`
--
ALTER TABLE `tc_users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
