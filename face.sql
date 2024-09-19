-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2024 at 01:37 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `face`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_labeled_image`
--

CREATE TABLE `data_labeled_image` (
  `id` int(11) NOT NULL,
  `space_id` int(11) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `personal_id` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_personal`
--

CREATE TABLE `data_personal` (
  `id` int(11) NOT NULL COMMENT 'auto increment id',
  `space_id` int(11) NOT NULL,
  `personal_id` varchar(13) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_personal`
--

INSERT INTO `data_personal` (`id`, `space_id`, `personal_id`, `name`, `surname`, `group_id`) VALUES
(1, 1, '1', 'เชาวลิต', 'ลำพาย', 1),
(2, 1, '2', 'สุธี', 'เกินกลาง', 3);

-- --------------------------------------------------------

--
-- Table structure for table `data_space`
--

CREATE TABLE `data_space` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_space`
--

INSERT INTO `data_space` (`id`, `name`) VALUES
(1, 'วิทยาลัยอาชีวศึกษาร้อยเอ็ด');

-- --------------------------------------------------------

--
-- Table structure for table `system_config`
--

CREATE TABLE `system_config` (
  `id` varchar(32) NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_config`
--

INSERT INTO `system_config` (`id`, `value`) VALUES
('systemName', 'Face');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `user_type_id` int(11) NOT NULL DEFAULT 2,
  `picture` varchar(100) DEFAULT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `username`, `password`, `email`, `name`, `surname`, `user_type_id`, `picture`, `active`) VALUES
(1, 'admin', '25d55ad283aa400af464c76d713c07ad', 'noppol.ins@bncc.ac.th', 'นพพล', 'อินศร', 1, 'YWRtaW4=.jpg', '1'),
(3, 'noppol', '8689391a8b93cd2d55ccf3f436eef4e2', 'noppol@rvc.ac.th', 'อาจารย์นพพล', 'อินศร', 3, 'bm9wcG9s.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(32) NOT NULL,
  `active_menu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `type_name`, `active_menu`) VALUES
(1, 'admin', 'admin,\ncourses,\nuser_menu'),
(2, 'user', 'courses_enroll,\r\nuser_menu'),
(3, 'teacher', 'courses_teaching,\r\nuser_menu'),
(4, 'student', 'courses_enroll,\r\nuser_menu,'),
(5, 'CVM', 'cvm_management,\r\nuser_menu'),
(6, 'admin_school', 'admin_school,\r\nuser_menu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_labeled_image`
--
ALTER TABLE `data_labeled_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_personal`
--
ALTER TABLE `data_personal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `space_id` (`space_id`,`personal_id`),
  ADD UNIQUE KEY `space_id_2` (`space_id`,`group_id`);

--
-- Indexes for table `data_space`
--
ALTER TABLE `data_space`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_config`
--
ALTER TABLE `system_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_labeled_image`
--
ALTER TABLE `data_labeled_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_personal`
--
ALTER TABLE `data_personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto increment id', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_space`
--
ALTER TABLE `data_space`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
