-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 01:31 PM
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
-- Database: `ao`
--

-- --------------------------------------------------------

--
-- Table structure for table `change_log`
--

CREATE TABLE `change_log` (
  `id` int(11) NOT NULL,
  `table_name` varchar(255) DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `choice1`
--

CREATE TABLE `choice1` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `img` varchar(60) NOT NULL,
  `availability` enum('Available','Sold Out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `choice2`
--

CREATE TABLE `choice2` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `img` varchar(60) NOT NULL,
  `availability` enum('Available','Sold Out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `choice2`
--

INSERT INTO `choice2` (`id`, `name`, `price`, `img`, `availability`) VALUES
(22, 'Table 2', 1, 'logo_processed.png', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `choice3`
--

CREATE TABLE `choice3` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `img` varchar(60) NOT NULL,
  `availability` enum('Available','Sold Out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `choice4`
--

CREATE TABLE `choice4` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `img` varchar(60) NOT NULL,
  `availability` enum('Available','Sold Out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `choice5`
--

CREATE TABLE `choice5` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `img` varchar(60) NOT NULL,
  `availability` enum('Available','Sold Out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `choice5`
--

INSERT INTO `choice5` (`id`, `name`, `price`, `img`, `availability`) VALUES
(1, 'Table 5', 123, 'chicken-katsudon-removebg-preview.png', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `choice6`
--

CREATE TABLE `choice6` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `img` varchar(60) NOT NULL,
  `availability` enum('Available','Sold Out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `choice6`
--

INSERT INTO `choice6` (`id`, `name`, `price`, `img`, `availability`) VALUES
(1, 'Table 6', 321321, 'chicken-katsudon-removebg-preview.png', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `choice7`
--

CREATE TABLE `choice7` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `img` varchar(60) NOT NULL,
  `availability` enum('Available','Sold Out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `choice7`
--

INSERT INTO `choice7` (`id`, `name`, `price`, `img`, `availability`) VALUES
(1, 'Table 7', 123, 'chicken-katsudon-removebg-preview.png', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `choice8`
--

CREATE TABLE `choice8` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `img` varchar(60) NOT NULL,
  `availability` enum('Available','Sold Out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `choice8`
--

INSERT INTO `choice8` (`id`, `name`, `price`, `img`, `availability`) VALUES
(1, 'Table 8', 123, 'chicken-katsudon-removebg-preview.png', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `choice9`
--

CREATE TABLE `choice9` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `img` varchar(60) NOT NULL,
  `availability` enum('Available','Sold Out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `choice10`
--

CREATE TABLE `choice10` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `img` varchar(60) NOT NULL,
  `availability` enum('Available','Sold Out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `ticketNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `AGE` int(11) NOT NULL,
  `SEX` enum('Male','Female') NOT NULL,
  `POSITION` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `username`, `password`, `usertype`) VALUES
(1, 'admin', 'a13fcb3e7196cc9c93d8ee3cf594c3538b1b582a', 'admin'),
(2, 'user', '6789', 'user'),
(3, 'Aaron', '8ceb993588e1bd828aa46e49e1776e4680fc4d69', 'admin'),
(4, 'Aaron', '8ceb993588e1bd828aa46e49e1776e4680fc4d69', 'admin'),
(5, 'EJ', '8ceb993588e1bd828aa46e49e1776e4680fc4d69', 'admin'),
(6, 'robert pogi', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin'),
(7, 'Lebron James', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `change_log`
--
ALTER TABLE `change_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choice1`
--
ALTER TABLE `choice1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choice2`
--
ALTER TABLE `choice2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choice3`
--
ALTER TABLE `choice3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choice4`
--
ALTER TABLE `choice4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choice5`
--
ALTER TABLE `choice5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choice6`
--
ALTER TABLE `choice6`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choice7`
--
ALTER TABLE `choice7`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choice8`
--
ALTER TABLE `choice8`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choice9`
--
ALTER TABLE `choice9`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choice10`
--
ALTER TABLE `choice10`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `change_log`
--
ALTER TABLE `change_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `choice1`
--
ALTER TABLE `choice1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `choice2`
--
ALTER TABLE `choice2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `choice3`
--
ALTER TABLE `choice3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `choice4`
--
ALTER TABLE `choice4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `choice5`
--
ALTER TABLE `choice5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `choice6`
--
ALTER TABLE `choice6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `choice7`
--
ALTER TABLE `choice7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `choice8`
--
ALTER TABLE `choice8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `choice9`
--
ALTER TABLE `choice9`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `choice10`
--
ALTER TABLE `choice10`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
