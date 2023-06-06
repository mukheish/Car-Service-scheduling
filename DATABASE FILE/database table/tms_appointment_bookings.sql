-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3310:3307
-- Generation Time: Apr 11, 2023 at 04:50 PM
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
-- Table structure for table `tms_appointment_bookings`
--

CREATE TABLE `tms_appointment_bookings` (
  `u_id` int(30) NOT NULL,
  `Full_Name` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Phone_no` int(50) DEFAULT NULL,
  `Car_Model` varchar(40) NOT NULL,
  `service_type` text DEFAULT NULL,
  `Date` date NOT NULL,
  `Time` time(4) DEFAULT NULL,
  `Special_Req` varchar(100) DEFAULT NULL,
  `Status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tms_appointment_bookings`
--

INSERT INTO `tms_appointment_bookings` (`u_id`, `Full_Name`, `Email`, `Phone_no`, `Car_Model`, `service_type`, `Date`, `Time`, `Special_Req`, `Status`) VALUES
(1, 'faridzuan', 'farid@gmail.com', 186844425, 'civic fk8', 'tire_rotation', '2023-04-11', NULL, 'add on turbo', 'Approved'),
(2, 'faridzuan', '1@gmail.com', 186844425, 'myvi', 'brake_repair', '2023-04-24', NULL, 'brembo', 'Pending'),
(3, 'haikal', 'haikal@gmail.com', 112561727, 'myvi', 'oil_change', '2023-04-27', '10:35:00.0000', 'turbo', ''),
(4, 'faridzuan', 'ahmad@gmail.com', 11, 'honda', 'oil_change', '2023-04-13', '11:40:00.0000', 'add on turbo', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tms_appointment_bookings`
--
ALTER TABLE `tms_appointment_bookings`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tms_appointment_bookings`
--
ALTER TABLE `tms_appointment_bookings`
  MODIFY `u_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
