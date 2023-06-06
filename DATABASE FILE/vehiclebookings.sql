-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 05:56 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

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
-- Table structure for table `pass_reset`
--

CREATE TABLE `pass_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pass_reset`
--

INSERT INTO `pass_reset` (`id`, `email`, `token`) VALUES
(1, '', '2f75ef41571411bcfb04e785cd90e8e51f00f4b4a8baf4831164a96d4afb94beae005b819e3596a32e1e113831a829b1fdaa'),
(2, '', '8cad6135d4bb6b5eac855ccba463fe6087a0d18d91ba7ac85b3257cf05042cc471c96f05a5079d9a9bd856541c3ff467286d'),
(3, '', 'b956accb318eabc27e407edf620d6a0a509bf948a0fd957a05aacf757e76c0bf0d97a1a188ec2ae26c7ee4054ad99a764151'),
(4, '', '3a3f0a8b91ae9a8bac7520470ef705baf1f36cab0f1dfa3e26381ee2437b2e34cbabe3faa864c2b6926c130733be402e4ef8'),
(5, '', '14f508f4cd2da2bfd3216073441f7be312764162b9aec8b94858cbf7348b05de02d7eb9545ac1241814f3801217c2f9a6e75'),
(6, '', 'cba09e78ef3f3955e184273b794485de57659ba130e4aede0fe21caf2ef1c145c2dd8f81f0aa9e311dfa20ce380030ff0a9f'),
(7, '', '8df017de3496465171fc5680503f73db3523db72e895d9fb783ff75866c462bb55faac0a641405d93ea82c1aabc4c0f1952b'),
(8, '', 'af3c5778a0cd420ffc96eb057e704d9650036d3da043b7c0755cb3f04b2825f839436e80bfd533a4c71a47009ebd832091f9'),
(9, '', 'd0e8a386fecee8699aa46a0c9821920815a12c6ab10ba5c69425a160677ecd9b7fb1c76ecfdb43c4ee26616a9af642677808'),
(10, '', 'a0bec0ebb5ff29434064037cf7865c24f6fcc1e32ed7bc3bce90b9a25784d9d1dbd6c0b72b27e7ea1ebbe51482d5c5d4141a'),
(11, '', '3394e9a9bee765c5fa6d22f10f4519ce109d9fc2b20c085a0e8cf87d5a127813e0b7f5aced435e86c18e07abb192eab6e0cd');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `s_id` int(11) NOT NULL,
  `s_type` varchar(100) NOT NULL,
  `Sedan` varchar(150) NOT NULL,
  `suv` varchar(100) NOT NULL,
  `mpv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`s_id`, `s_type`, `Sedan`, `suv`, `mpv`) VALUES
(7, 'Regular Service', 'RM 130 - RM 300', 'RM 150 - RM 300', 'RM 200 - RM 300'),
(8, 'Oil Change', 'RM 100 - RM 300', 'RM 150 - RM 300', 'RM 200 - RM 300'),
(9, 'Regular Service', 'RM 100 - RM 300', 'RM 150 - RM 300', 'RM 200 - RM 300'),
(10, 'Brake Repair', 'RM 100 - RM 300', 'RM 150 - RM 300', 'RM 200 - RM 300');

-- --------------------------------------------------------

--
-- Table structure for table `tms_admin`
--

CREATE TABLE `tms_admin` (
  `a_id` int(20) NOT NULL,
  `a_name` varchar(200) NOT NULL,
  `a_email` varchar(200) NOT NULL,
  `a_pwd` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_admin`
--

INSERT INTO `tms_admin` (`a_id`, `a_name`, `a_email`, `a_pwd`) VALUES
(1, 'System Admin', 'mukheishrao@gmail.com', 'newpass');

-- --------------------------------------------------------

--
-- Table structure for table `tms_appointment_bookings`
--

CREATE TABLE `tms_appointment_bookings` (
  `booking_id` int(50) NOT NULL,
  `u_id` int(50) NOT NULL,
  `Full_Name` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Phone_no` int(50) UNSIGNED ZEROFILL DEFAULT NULL,
  `Car_Model` varchar(40) NOT NULL,
  `service_type` text DEFAULT NULL,
  `Date` date NOT NULL,
  `Time` time(4) DEFAULT NULL,
  `Special_Req` varchar(100) DEFAULT NULL,
  `mechanic_Name` varchar(256) NOT NULL,
  `Status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tms_appointment_bookings`
--

INSERT INTO `tms_appointment_bookings` (`booking_id`, `u_id`, `Full_Name`, `Email`, `Phone_no`, `Car_Model`, `service_type`, `Date`, `Time`, `Special_Req`, `mechanic_Name`, `Status`) VALUES
(10, 6, 'mukheish', 'mukheishrao@gmail.com', 00000000000000000000000000000000000000000012424254, 'm330i', 'Regular Service', '2023-05-24', '15:14:00.0000', 'nn', 'farid', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `tms_feedback`
--

CREATE TABLE `tms_feedback` (
  `f_id` int(20) NOT NULL,
  `f_uname` varchar(200) NOT NULL,
  `f_content` longtext NOT NULL,
  `f_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_feedback`
--

INSERT INTO `tms_feedback` (`f_id`, `f_uname`, `f_content`, `f_status`) VALUES
(1, 'Elliot Gape', 'This is a demo feedback text. This is a demo feedback text. This is a demo feedback text.', 'Published'),
(2, 'Mark L. Anderson', 'Sample Feedback Text for testing! Sample Feedback Text for testing! Sample Feedback Text for testing!', 'Published'),
(3, 'Liam Moore ', 'test number 3', '');

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

-- --------------------------------------------------------

--
-- Table structure for table `tms_pwd_resets`
--

CREATE TABLE `tms_pwd_resets` (
  `r_id` int(20) NOT NULL,
  `r_email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_pwd_resets`
--

INSERT INTO `tms_pwd_resets` (`r_id`, `r_email`) VALUES
(2, 'admin@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tms_syslogs`
--

CREATE TABLE `tms_syslogs` (
  `l_id` int(20) NOT NULL,
  `u_id` varchar(200) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `u_ip` varbinary(200) NOT NULL,
  `u_city` varchar(200) NOT NULL,
  `u_country` varchar(200) NOT NULL,
  `u_logintime` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tms_user`
--

CREATE TABLE `tms_user` (
  `u_id` int(20) NOT NULL,
  `u_fname` varchar(200) NOT NULL,
  `u_lname` varchar(200) NOT NULL,
  `u_phone` varchar(200) NOT NULL,
  `u_addr` varchar(200) NOT NULL,
  `u_category` varchar(200) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `u_pwd` varchar(20) NOT NULL,
  `u_car_type` varchar(200) NOT NULL,
  `u_car_regno` varchar(200) NOT NULL,
  `u_car_bookdate` varchar(200) NOT NULL,
  `u_car_book_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_user`
--

INSERT INTO `tms_user` (`u_id`, `u_fname`, `u_lname`, `u_phone`, `u_addr`, `u_category`, `u_email`, `u_pwd`, `u_car_type`, `u_car_regno`, `u_car_bookdate`, `u_car_book_status`) VALUES
(3, 'Demo', 'User', '070678909', '90100 Machakos ', 'Driver', 'demouser@tms.com', 'demo123', 'SUV', 'CA1001', '2022-09-01', 'Approved'),
(4, 'John', 'Settles', '7145698540', '45 Clearview Drive', 'Driver', 'johns@mail.com', 'password', '', '', '', ''),
(5, 'Joseph', 'Yung', '7896587777', '72 Doe Meadow Drive', 'Driver', 'joseph@mail.com', 'password', '', '', '', ''),
(6, 'Vincent', 'Pelletier', '4580001456', '58 Farland Avenue', 'Driver', 'mukheishrao@gmail.com', 'pas', '', '', '', ''),
(7, 'Jesse', 'Robinson', '1458887855', '73 Fleming Way', 'Driver', 'jesser@mail.com', 'password', '', '', '', ''),
(8, 'Nelson', 'Ford', '7458965874', '58 West Side Avenue', 'User', 'nelford@mail.com', 'password', 'Sedan', 'CA1690', '2022-09-13', 'Approved'),
(9, 'Paul', 'Mills', '7412563258', '12 Red Maple Drive', 'User', 'paul@mail.com', 'password', 'Sedan', 'CA2077', '2022-09-14', 'Pending'),
(10, 'Liam', 'Moore', '7410001212', '114 Bleck Street', 'User', 'liamoore@mail.com', 'password', 'Sedan', 'CA1690', '2022-09-14', 'Approved'),
(11, 'Jeff', 'Lewis', '7854545454', '114 Test Adr', 'User', 'jeff@mail.com', 'password', 'Sedan', 'CA7700', '2022-09-14', 'Pending'),
(12, 'Kenya', 'Norman', '7896547855', '114 Test Addr', 'User', 'normank@mail.com', 'password', 'Bus', 'CA7766', '2022-09-15', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tms_vehicle`
--

CREATE TABLE `tms_vehicle` (
  `v_id` int(20) NOT NULL,
  `v_name` varchar(200) NOT NULL,
  `v_reg_no` varchar(200) NOT NULL,
  `v_pass_no` varchar(200) NOT NULL,
  `v_driver` varchar(200) NOT NULL,
  `v_category` varchar(200) NOT NULL,
  `v_dpic` varchar(200) NOT NULL,
  `v_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_vehicle`
--

INSERT INTO `tms_vehicle` (`v_id`, `v_name`, `v_reg_no`, `v_pass_no`, `v_driver`, `v_category`, `v_dpic`, `v_status`) VALUES
(3, 'Euro Bond', 'CA7766', '50', 'Vincent Pelletier', 'Bus', 'buscch.jpg', 'Available'),
(4, 'Honda Accord', 'CA2077', '5', 'Joseph Yung', 'Sedan', '2019_honda_accord_angularfront.jpg', 'Available'),
(5, 'Volkswagen Passat', 'CA1690', '5', 'Jesse Robinson', 'Sedan', 'volkswagen-passat-500.jpg', 'Available'),
(6, 'Nissan Rogue', 'CA1001', '7', 'Demo User', 'SUV', 'Nissan_Rogue_SV_2021.jpg', 'Available'),
(7, 'Subaru Legacy', 'CA7700', '5', 'John Settles', 'Sedan', 'Subaru_Legacy_Premium_2022_2.jpg', 'Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pass_reset`
--
ALTER TABLE `pass_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tms_admin`
--
ALTER TABLE `tms_admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `tms_appointment_bookings`
--
ALTER TABLE `tms_appointment_bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tms_feedback`
--
ALTER TABLE `tms_feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `tms_mechanic`
--
ALTER TABLE `tms_mechanic`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `tms_pwd_resets`
--
ALTER TABLE `tms_pwd_resets`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tms_syslogs`
--
ALTER TABLE `tms_syslogs`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `tms_user`
--
ALTER TABLE `tms_user`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `tms_vehicle`
--
ALTER TABLE `tms_vehicle`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pass_reset`
--
ALTER TABLE `pass_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tms_admin`
--
ALTER TABLE `tms_admin`
  MODIFY `a_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tms_appointment_bookings`
--
ALTER TABLE `tms_appointment_bookings`
  MODIFY `booking_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tms_feedback`
--
ALTER TABLE `tms_feedback`
  MODIFY `f_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tms_mechanic`
--
ALTER TABLE `tms_mechanic`
  MODIFY `m_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tms_pwd_resets`
--
ALTER TABLE `tms_pwd_resets`
  MODIFY `r_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tms_syslogs`
--
ALTER TABLE `tms_syslogs`
  MODIFY `l_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tms_user`
--
ALTER TABLE `tms_user`
  MODIFY `u_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tms_vehicle`
--
ALTER TABLE `tms_vehicle`
  MODIFY `v_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
