-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2019 at 11:25 AM
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

DROP TABLE IF EXISTS `tc_categories`;
CREATE TABLE `tc_categories` (
  `category_id` int(11) UNSIGNED NOT NULL,
  `category_type` int(11) UNSIGNED DEFAULT '0',
  `parent_category` int(11) UNSIGNED DEFAULT '0',
  `category_name` varchar(100) DEFAULT '',
  `delete_flag` char(1) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
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
(13, 2, 0, 'Weak', '0', '2019-10-07 13:25:19', '1'),
(14, 2, 0, 'Month', '0', '2019-10-07 13:26:25', '1'),
(15, 2, 0, 'Quarter', '0', '2019-10-07 13:26:25', '1'),
(16, 2, 0, 'Half Year', '0', '2019-10-07 13:27:21', '1'),
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
-- Table structure for table `tc_courses`
--

DROP TABLE IF EXISTS `tc_courses`;
CREATE TABLE `tc_courses` (
  `course_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `sub_category_id` int(10) UNSIGNED DEFAULT NULL,
  `medium` varchar(15) DEFAULT '',
  `course_name` varchar(50) DEFAULT NULL,
  `description` varchar(1000) DEFAULT '',
  `duration_unit` varchar(100) DEFAULT NULL,
  `duration` int(10) UNSIGNED DEFAULT '0',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `logo_image` varchar(100) DEFAULT 'logodummy.jpg',
  `banner_image` varchar(100) DEFAULT 'bannerdummy.jpg',
  `fees_unit` varchar(255) DEFAULT '',
  `fees` decimal(10,2) DEFAULT NULL,
  `delete_flag` char(1) DEFAULT '0',
  `status` char(1) DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_courses`
--

INSERT INTO `tc_courses` (`course_id`, `user_id`, `category_id`, `sub_category_id`, `medium`, `course_name`, `description`, `duration_unit`, `duration`, `start_date`, `end_date`, `logo_image`, `banner_image`, `fees_unit`, `fees`, `delete_flag`, `status`, `created_at`) VALUES
(16, 17, 1, 2, '8', 'Java Development', 'Java is a simple and robust programming language.', '12', 2, '2019-10-01', '2019-10-31', 'Java.png', 'bannerdummy.jpg', '0', '1000.00', '0', '1', '2019-10-10 13:10:36'),
(19, 19, 4, 5, '8', 'PHP Development', 'PHP is a server side scripting language.', '16', 1, '2019-10-01', '2019-10-31', 'PHP.png', 'php.jpg', '17', '15000.00', '0', '1', '2019-10-13 13:32:02'),
(20, 18, 11, 28, '8', 'Csharp Development', 'Csharp is a good progamming language.', '14', 1, '2019-11-01', '2019-11-30', 'CSharp.png', 'cBanner.jpg', '14', '1000.00', '0', '1', '2019-10-13 13:35:04'),
(21, 18, 23, 24, '26', 'Android Development', 'Android is a operating system.', '15', 1, '2019-09-01', '2019-10-03', 'Android.png', 'android.jpg', '15', '6000.00', '0', '1', '2019-10-13 13:38:41'),
(22, 17, 23, 25, '10', 'Android', 'Android is a mobile application language.', '15', 2, '2019-12-01', '2019-10-07', 'Android.png', 'android.jpg', '17', '40000.00', '0', '1', '2019-10-14 15:24:06'),
(23, 19, 11, 29, '9', 'ADO DOT NET', 'ADO i.e. Active Data Object.', '14', 2, '2019-10-01', '2019-12-31', 'ADO.NET.png', 'ado-.net_.jpg', '14', '2000.00', '0', '1', '2019-10-14 15:28:48'),
(24, 17, 1, 3, '8', 'Advance Java', 'Advance java is a highly secure language.', '17', 1, '2019-09-01', '2019-12-31', 'Advance_Java_Logo.png', 'Advance_JAVA.png', '17', '50000.00', '0', '1', '2019-10-14 15:31:56'),
(25, 17, 18, 22, '27', 'Python with OOPS', 'Python is a multiple purpose language with which we can develop multi type softeware like, Machine Learning,  Artificial Intelligent.', '17', 2, '2019-09-01', '2020-01-01', 'python_logo.png', 'pythonBanner.jpg', '15', '10000.00', '0', '1', '2019-10-14 17:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `tc_data`
--

DROP TABLE IF EXISTS `tc_data`;
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
-- Table structure for table `tc_enquiries`
--

DROP TABLE IF EXISTS `tc_enquiries`;
CREATE TABLE `tc_enquiries` (
  `enquiry_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT '0',
  `course_id` int(10) UNSIGNED DEFAULT '0',
  `status` int(10) UNSIGNED DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` int(10) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tc_feedbacks`
--

DROP TABLE IF EXISTS `tc_feedbacks`;
CREATE TABLE `tc_feedbacks` (
  `feedback_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `course_id` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(1000) DEFAULT '',
  `rating` int(10) UNSIGNED DEFAULT '0',
  `status` char(1) DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_feedbacks`
--

INSERT INTO `tc_feedbacks` (`feedback_id`, `user_id`, `course_id`, `description`, `rating`, `status`, `created_at`) VALUES
(1, 22, 19, 'Average learning', 3, '1', '2019-09-18 09:28:57'),
(2, 23, 19, 'Fair study', 2, '1', '2019-10-16 10:12:19'),
(3, 24, 19, 'Nice learning', 4, '1', '2019-10-16 10:14:37'),
(4, 33, 19, 'Excellent study', 5, '1', '2019-10-16 10:16:00'),
(5, 34, 19, 'Poor study', 1, '1', '2019-10-16 10:21:51'),
(6, 35, 19, 'Fair study', 2, '1', '2019-10-16 10:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `tc_newsletters`
--

DROP TABLE IF EXISTS `tc_newsletters`;
CREATE TABLE `tc_newsletters` (
  `newsletter_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` int(10) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_newsletters`
--

INSERT INTO `tc_newsletters` (`newsletter_id`, `user_id`, `created_at`, `deleted_at`) VALUES
(1, 24, '2019-10-15 14:53:46', 0),
(5, 22, '2019-10-15 15:00:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tc_reports`
--

DROP TABLE IF EXISTS `tc_reports`;
CREATE TABLE `tc_reports` (
  `report_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED DEFAULT NULL,
  `victim_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(100) DEFAULT '',
  `description` varchar(1000) DEFAULT '',
  `status` char(1) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_reports`
--

INSERT INTO `tc_reports` (`report_id`, `course_id`, `victim_id`, `title`, `description`, `status`, `created_at`) VALUES
(1, 2, 24, 'Learning', 'Not good learning', '1', '2019-09-18 09:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `tc_sessions`
--

DROP TABLE IF EXISTS `tc_sessions`;
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

DROP TABLE IF EXISTS `tc_users`;
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
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `longitude` decimal(12,8) DEFAULT '0.00000000',
  `latitude` decimal(12,8) DEFAULT '0.00000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tc_users`
--

INSERT INTO `tc_users` (`user_id`, `name`, `contact`, `email`, `address`, `password`, `dob`, `image`, `banner_image`, `about_me`, `user_type`, `delete_flag`, `status`, `created_at`, `longitude`, `latitude`) VALUES
(17, 'Kuldeep Chand', '9799455505', 'bccfalna@gmail.com', 'Falna', 'password', '2019-10-03', 'employee20.jpeg', 'bannerdummy.jpg', '', '1', '0', '1', '2019-09-18 14:58:03', '73.23519900', '25.23590100'),
(18, 'Abhishek Agarawal', '', 'agarawal.falna@gmail.com', 'rani', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '1', '1', '0', '2019-09-18 14:59:05', '73.31050100', '25.34820000'),
(19, 'Gajendra Nagar', '', 'nagar.jalore@gmail.com', 'bali', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '1', '0', '1', '2019-09-18 14:59:32', '73.27949000', '25.19208000'),
(20, 'Rishi Mathur', '', 'mathur.jhodhpur@gmail.com', 'sumerpur', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '1', '0', '1', '2019-09-18 14:59:55', '73.08740000', '25.16820000'),
(21, 'Yameen Sharma', '', 'sharma.sumerpur@gmail.com', 'falna', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '1', '0', '1', '2019-09-18 15:00:38', '73.23519900', '25.23590100'),
(22, 'Mohit', '', 'mohitmishra.falna850@gmail.com', 'sheoganj', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '0', '0', '1', '2019-09-18 15:02:49', '73.07026300', '25.13271700'),
(23, 'Urvashi', '', 'urvashimishra.falna850@gmail.com', 'bali', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '0', '0', '1', '2019-09-18 15:03:34', '73.27949000', '25.19208000'),
(24, 'Chinmay', '8690736210', 'chinmaymishra.falna@gmail.com', 'rani', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '0', '0', '1', '2019-09-18 15:04:08', '73.31050100', '25.34820000'),
(25, 'Raaj', '', 'a@gmail.com', '', 'pass', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '1', '0', '0', '2019-09-30 17:22:41', '0.00000000', '0.00000000'),
(26, 'bharat', '', 'bharat@gmail.com', '', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '1', '0', '0', '2019-09-30 17:25:43', '0.00000000', '0.00000000'),
(27, 'Dharmesh', '', 'dharmesh@gmail.com', '', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '1', '0', '0', '2019-10-01 09:22:05', '0.00000000', '0.00000000'),
(28, 'Rishikesh', '', 'rishikesh@gmail.com', '', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '1', '0', '0', '2019-10-01 09:22:57', '0.00000000', '0.00000000'),
(29, 'Dwarkadhis', '', 'dwarkadhish@gmail.com', '', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '1', '0', '0', '2019-10-01 09:24:05', '0.00000000', '0.00000000'),
(30, 'kedarnath', '', 'kedarnath@gmail.com', '', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '1', '0', '0', '2019-10-01 09:28:15', '0.00000000', '0.00000000'),
(31, 'a', '', 'b@gmail.com', '', 'asssssss', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '1', '0', '0', '2019-10-01 09:38:12', '0.00000000', '0.00000000'),
(32, 'Rameshwaram', '', 'rameshwaram@gmail.com', '', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '1', '0', '0', '2019-10-01 10:16:36', '0.00000000', '0.00000000'),
(33, 'Khushi', '', 'khushimishra.falna@gmail.com', '', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '0', '0', '0', '2019-10-13 18:47:07', '0.00000000', '0.00000000'),
(34, 'Vijya', '', 'vijyamishra.falna@gmail.com', '', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '0', '0', '0', '2019-10-13 18:47:51', '0.00000000', '0.00000000'),
(35, 'Suvarn', '', 'suvranmishra.falna@gmail.com', '', 'password', '0000-00-00', 'dummyprofile.jpg', 'bannerdummy.jpg', '', '0', '0', '0', '2019-10-13 19:12:03', '0.00000000', '0.00000000');

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
-- AUTO_INCREMENT for table `tc_courses`
--
ALTER TABLE `tc_courses`
  MODIFY `course_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tc_data`
--
ALTER TABLE `tc_data`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tc_enquiries`
--
ALTER TABLE `tc_enquiries`
  MODIFY `enquiry_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tc_feedbacks`
--
ALTER TABLE `tc_feedbacks`
  MODIFY `feedback_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tc_newsletters`
--
ALTER TABLE `tc_newsletters`
  MODIFY `newsletter_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tc_reports`
--
ALTER TABLE `tc_reports`
  MODIFY `report_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
