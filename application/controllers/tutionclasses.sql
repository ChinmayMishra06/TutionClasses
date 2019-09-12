-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2019 at 05:12 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

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
(1, 'Mohit Mishra', '8690716407', 'mohitmishra.falna850@gmail.com', 'falna', 'password', '2019-09-25', 'http://127.0.0.1/galary.jpg', '0', '0', '0', '2019-09-12 14:20:24'),
(2, 'Chinmay Mishra', '8690736210', 'chinmaymishra.falna@gmail.com', 'falna', 'password', '2019-09-09', 'http://www.galary.com/galary', '0', '0', '0', '2019-09-12 14:21:40'),
(5, 'Khushi Mishra', '', 'khushimishra.falna@gmail.com', '', 'password', '0000-00-00', '', '0', '0', '0', '2019-09-12 20:00:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tc_data`
--
ALTER TABLE `tc_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Indexes for table `tc_users`
--
ALTER TABLE `tc_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tc_data`
--
ALTER TABLE `tc_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tc_users`
--
ALTER TABLE `tc_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
