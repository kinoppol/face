-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 06:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `space_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `space_id`, `username`, `name`, `surname`, `email`, `password`) VALUES
(1, 1, 'noppol', 'นพพล', 'อินศร', 'noppol@rvc.ac.th', '25d55ad283aa400af464c76d713c07ad');

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
