-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 03:59 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comtechstock`
--

-- --------------------------------------------------------

--
-- Table structure for table `addproductname`
--

CREATE TABLE `addproductname` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addproductname`
--

INSERT INTO `addproductname` (`id`, `name`) VALUES
(1, 'Monitor'),
(2, 'Mouse'),
(3, 'Keyboard'),
(4, 'Keyboard');

-- --------------------------------------------------------

--
-- Table structure for table `addthink`
--

CREATE TABLE `addthink` (
  `id` int(11) NOT NULL,
  `think` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addthink`
--

INSERT INTO `addthink` (`id`, `think`) VALUES
(1, 'គ្រឿង'),
(2, 'ប្រអប់'),
(3, 'កេស'),
(4, 'ក្បាល'),
(5, 'ដើម'),
(6, 'រាយ');

-- --------------------------------------------------------

--
-- Table structure for table `itproduct`
--

CREATE TABLE `itproduct` (
  `id` int(15) NOT NULL,
  `code` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `how` text NOT NULL,
  `account` int(10) NOT NULL,
  `saccount` int(10) NOT NULL,
  `model` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `think` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `retail_price` int(20) NOT NULL,
  `total_price` int(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `date_use` date DEFAULT NULL,
  `place` varchar(50) NOT NULL,
  `BORROW` int(11) NOT NULL DEFAULT 0,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itproduct`
--

INSERT INTO `itproduct` (`id`, `code`, `name`, `how`, `account`, `saccount`, `model`, `country`, `think`, `quantity`, `retail_price`, `total_price`, `status`, `date`, `date_use`, `place`, `BORROW`, `picture`) VALUES
(8, 129, 'ទូទឹកកក', 'ថ្មី', 6005, 60051, 'samsung', 'Korea', 'គ្រឿង', 1, 101, 101, 'ល្អ', '2023-04-28', NULL, 'office', 0, ''),
(9, 789, 'អំពូល', 'ល្អ', 6005, 60052, '', '', 'គ្រឿង', 1, 12, 12, 'ល្អ', '2023-04-28', NULL, 'com.lab1', 0, ''),
(12, 50, 'អំបោស', 'វែង', 6005, 60053, '', 'កម្ពុជា', 'រាយ', 1, 2, 2, 'ល្អ', '2023-05-03', NULL, 'com.lab1', 0, 'clearner.jpg'),
(38, 565647, 'Mouse', 'Good', 6005, 60055, 'Dell', 'China', 'ប្រអប់', 12, 20000, 240000, 'ល្អ', '2023-05-31', NULL, 'in stock', 0, 'mouse.jpg'),
(39, 89076, 'Mouse', 'Good', 6005, 60055, 'Dell', 'China', 'គ្រឿង', 1, 20000, 20000, 'ល្អ', '2023-05-31', NULL, 'com.lab2', 0, 'mouse.jpg'),
(40, 1233, 'Mouse', 'Good', 6005, 60055, 'Dell', 'China', 'គ្រឿង', 1, 2000, 2000, 'មធ្យម', '2023-05-31', NULL, 'office', 0, 'mouse.jpg'),
(41, 879684, 'Mouse', 'Good', 6005, 60055, 'Dell', 'China', 'គ្រឿង', 1, 2000, 2000, 'មធ្យម', '2023-05-31', NULL, 'com.media', 0, 'mouse.jpg'),
(42, 6548, 'Mouse', 'd', 6005, 60055, 'd', 'd', 'គ្រឿង', 1, 234, 234, 'មធ្យម', '2023-05-31', NULL, 'com.media', 0, 'mouse.jpg'),
(43, 22, 'Mouse', '2', 6005, 60055, '34', '234', 'គ្រឿង', 1, 23, 23, 'ល្អ', '2023-05-31', NULL, 'com.lab1', 0, 'adminicon.jpg'),
(45, 55666, 'Mouse', 'Good', 6005, 60055, 'ឈើ', 'កម្ពុជា', 'គ្រឿង', 1, 10000, 10000, 'ល្អ', '2023-06-02', NULL, 'in stock', 0, 'refreagerator.jpg'),
(46, 5555, 'Keyboard', 'g', 6005, 60052, 'g', 'g', 'គ្រឿង', 1, 2, 2, 'ល្អ', '2023-06-02', NULL, 'com.lab2', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `listborrow`
--

CREATE TABLE `listborrow` (
  `id` int(10) NOT NULL,
  `code_id` int(15) NOT NULL,
  `borrowDepartment` varchar(100) NOT NULL,
  `borrowSkill` varchar(100) NOT NULL,
  `borrowName` varchar(100) NOT NULL,
  `borrowStatus` varchar(30) NOT NULL,
  `borrowDate` date NOT NULL,
  `returnName` varchar(100) DEFAULT NULL,
  `returnStatus` varchar(30) DEFAULT NULL,
  `returnDate` date DEFAULT NULL,
  `STATUS` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listborrow`
--

INSERT INTO `listborrow` (`id`, `code_id`, `borrowDepartment`, `borrowSkill`, `borrowName`, `borrowStatus`, `borrowDate`, `returnName`, `returnStatus`, `returnDate`, `STATUS`) VALUES
(26, 35, 'ដេប៉ាតឺម៉ង់វិទ្យាសាស្រ្ដកុំព្យូទ័រ', 'បច្ចេកវិទ្យាកុំព្យូទ័រ', 'ឃីម សុខា', 'ល្អ', '2023-05-29', 'ឃីម សុខា', 'ល្អ', '2023-05-29', 0),
(27, 8, 'ដេប៉ាតឺម៉ង់វិទ្យាសាស្រ្ដកុំព្យូទ័រ', 'បច្ចេកវិទ្យាកុំព្យូទ័រ', 'khim sokha', 'ល្អ', '2023-06-05', 'khim sokha', 'ល្អ', '2023-06-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `listtaketouse`
--

CREATE TABLE `listtaketouse` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `saccount` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_use` date NOT NULL,
  `place_use` varchar(50) NOT NULL,
  `datestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listtaketouse`
--

INSERT INTO `listtaketouse` (`id`, `code`, `name`, `saccount`, `status`, `date_use`, `place_use`, `datestamp`) VALUES
(1, 9001, 'Keyboard', 60055, 'ល្អ', '2023-05-19', 'com.lab2', '2023-05-18 18:18:54'),
(2, 9001, 'Keyboard', 60055, 'ល្អ', '2023-05-19', 'com.lab1', '2023-05-18 18:18:54'),
(3, 9001, 'Keyboard', 60055, 'ល្អ', '2023-05-19', 'com.lab1', '2023-05-18 18:18:54'),
(4, 9001, 'Keyboard', 60055, 'ល្អ', '2023-05-19', 'com.lab1', '2023-05-18 18:18:54'),
(5, 9001, 'Keyboard', 60055, 'ល្អ', '2023-05-19', 'com.lab1', '2023-05-18 18:18:54'),
(6, 9001, 'Keyboard', 60055, 'ល្អ', '2023-05-19', 'com.lab1', '2023-05-18 18:18:54'),
(7, 9001, 'Keyboard', 60055, 'ល្អ', '2023-05-19', 'com.lab1', '2023-05-18 18:18:54'),
(8, 9001, 'Keyboard', 60055, 'ល្អ', '2023-05-19', 'com.lab2', '2023-05-18 18:20:29'),
(9, 8, 'q', 60055, 'ល្អ', '2023-05-19', 'com.lab1', '2023-05-18 19:11:03'),
(10, 8, 'q', 60055, 'ល្អ', '0000-00-00', 'office', '2023-05-18 19:11:26'),
(11, 8, 'q', 60055, 'ល្អ', '0000-00-00', 'office', '2023-05-18 19:12:34'),
(12, 9001, 'Keyboard', 60055, 'ល្អ', '2023-05-22', 'office', '2023-05-22 14:00:58'),
(13, 9001, 'Keyboard', 60055, 'ល្អ', '2023-05-23', 'office', '2023-05-22 14:03:38'),
(14, 9001, 'Keyboard', 60055, 'ល្អ', '2023-05-23', 'com.media', '2023-05-22 14:12:36'),
(15, 9001, 'Keyboard', 60055, 'ល្អ', '2023-05-23', 'com.media', '2023-05-22 14:13:27'),
(16, 9001, 'Keyboard', 60055, 'ល្អ', '2023-05-24', 'office', '2023-05-23 07:08:22'),
(17, 9001, 'Keyboard', 60055, 'ល្អ', '2023-05-24', 'office', '2023-05-23 07:08:22'),
(18, 9001, 'Keyboard', 60055, 'ល្អ', '2023-05-23', 'com.media', '2023-05-23 16:42:52'),
(19, 9001, 'Keyboard', 60055, 'ល្អ', '2023-05-24', 'in stock', '2023-05-23 17:22:06'),
(20, 12, 's', 60055, 'ល្អ', '2023-05-24', 'com.lab1', '2023-05-24 03:10:43'),
(21, 9002, 'Keyboard', 60055, 'ល្អ', '2023-05-27', 'com.lab1', '2023-05-27 14:26:24'),
(22, 789, 'អំពូល', 60052, 'ល្អ', '2023-05-28', 'com.lab1', '2023-05-28 10:38:22'),
(23, 9001, 'Keyboard', 60055, 'ល្អ', '0000-00-00', '', '2023-05-28 10:42:18'),
(24, 9002, 'Keyboard', 60055, 'ល្អ', '0000-00-00', '', '2023-05-28 10:42:52'),
(25, 9001, 'Mouse', 60055, 'ល្អ', '2023-05-29', 'com.lab1', '2023-05-29 02:56:07'),
(26, 9001, 'Mouse', 60055, 'ល្អ', '0000-00-00', 'អ្នកគ្រូ', '2023-05-29 03:14:27'),
(27, 565647, 'Mouse', 60055, 'ល្អ', '2023-06-06', 'in stock', '2023-06-06 03:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE `userlist` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userType` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneNum` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`id`, `firstName`, `lastName`, `username`, `password`, `userType`, `email`, `phoneNum`, `photo`, `createDate`) VALUES
(24, 'លោកគ្រូ', 'អ្នកគ្រូ', 'Teacher', '$2y$10$NVcPHnPjxz3k6.M5ux7GNupUWf8YofNaaBGsofS4GvSLBVsq63Ln6', 'admin', 'Teacher@gmail.com', '98776', NULL, '2023-06-04 14:23:46'),
(25, 'Staff', 'Staff', 'Staff', '$2y$10$NVcPHnPjxz3k6.M5ux7GNupUWf8YofNaaBGsofS4GvSLBVsq63Ln6', 'staff', 'staff@gmail.com', '099999999', NULL, '2023-06-04 14:49:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addproductname`
--
ALTER TABLE `addproductname`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addthink`
--
ALTER TABLE `addthink`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itproduct`
--
ALTER TABLE `itproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listborrow`
--
ALTER TABLE `listborrow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listtaketouse`
--
ALTER TABLE `listtaketouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addproductname`
--
ALTER TABLE `addproductname`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `addthink`
--
ALTER TABLE `addthink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `itproduct`
--
ALTER TABLE `itproduct`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `listborrow`
--
ALTER TABLE `listborrow`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `listtaketouse`
--
ALTER TABLE `listtaketouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `userlist`
--
ALTER TABLE `userlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
