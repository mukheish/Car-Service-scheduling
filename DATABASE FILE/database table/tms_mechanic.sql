-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3310:3307
-- Generation Time: Apr 11, 2023 at 04:52 PM
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
-- Database: `vehiclebookings`
--

-- --------------------------------------------------------

--
-- Table structure for table `tms_mechanic`
--

CREATE TABLE `tms_mechanic` (
  `m_id` int(30) NOT NULL,
  `m_Name` varchar(30) NOT NULL,
  `m_Contact` int(30) NOT NULL,
  `m_Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tms_mechanic`
--

INSERT INTO `tms_mechanic` (`m_id`, `m_Name`, `m_Contact`, `m_Email`) VALUES
(1, 'farid', 123124, 'farid@gmail.com'),
(2, 'sakthi', 155325255, 'sakthi@gmail.com'),
(3, 'sakthi', 123124, 'sakthi@gmail.com'),
(4, 'sakthi', 123124, 'sakthi@gmail.com'),
(5, 'sakthi', 123124, 'sakthi@gmail.com'),
(6, 'abc', 123456, 'sakthi@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tms_mechanic`
--
ALTER TABLE `tms_mechanic`
  ADD PRIMARY KEY (`m_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tms_mechanic`
--
ALTER TABLE `tms_mechanic`
  MODIFY `m_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
