-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2018 at 06:36 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sas`
--

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

CREATE TABLE `administration` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`admin_id`, `admin_name`, `admin_pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `cus_first_name` varchar(100) NOT NULL,
  `cus_last_name` varchar(100) NOT NULL,
  `cus_user_name` varchar(100) NOT NULL,
  `cus_pass` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_first_name`, `cus_last_name`, `cus_user_name`, `cus_pass`, `email`) VALUES
(1, 'Moshfiq', 'Rony', 'mrid', '123456789', '15203012@iubat.edu'),
(2, 'Saifur', 'Rahman', 'saifur', '111111111', '15203049@iubat.edu'),
(3, 'Nurul Islam', 'Adam', 'adam', 'adamnurul', 'adamnurul@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `id` int(11) NOT NULL,
  `flightNumber` varchar(256) NOT NULL,
  `pnr` varchar(256) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dest` int(11) NOT NULL,
  `depart` int(11) NOT NULL,
  `depDate` date NOT NULL,
  `depTime` time NOT NULL,
  `retTime` time NOT NULL,
  `retDate` date NOT NULL,
  `amount` int(11) NOT NULL,
  `accept` int(11) NOT NULL,
  `user` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`id`, `flightNumber`, `pnr`, `fname`, `lname`, `phone`, `email`, `dob`, `dest`, `depart`, `depDate`, `depTime`, `retTime`, `retDate`, `amount`, `accept`, `user`) VALUES
(10, 'ANAH117', '1ANAH11711400411', 'samia', 'mim', '9348508', 'samiamoshfiq@gmail.com', '2018-03-23 13:27:21', 20, 28, '2018-03-29', '10:23:00', '00:23:00', '2018-03-30', 1000, 1, 'mrid'),
(11, 'ANAH117', '1ANAH11711300311', 'samia', 'mim', '47958739', 'samiamoshfiq@gmail.com', '2018-03-26 16:38:04', 20, 28, '2018-03-29', '10:23:00', '00:23:00', '2018-03-30', 1000, 1, 'admin'),
(13, 'ANAH117', '1ANAH11711133111', 'shamim', 'sarkar', '01625424245', 'asifrsham@gmail.com', '2018-03-18 18:00:00', 20, 28, '2018-03-29', '10:23:00', '00:00:00', '0000-00-00', 4000, 1, 'mrid'),
(15, 'ANAH117', '1ANAH11710300301', 'samia', 'mim', '0138575656', 'samiamoshfiq@gmail.com', '2018-03-24 14:50:35', 20, 28, '2018-03-29', '10:23:00', '00:23:00', '2018-03-30', 1000, 0, 'admin'),
(17, 'BAN112M', '3BAN112M19911991', 'gfjhg', 'jhigsdifg', '2116546565', '15203012@iubat.edu', '2018-03-17 14:52:00', 8, 26, '2018-03-13', '00:00:00', '12:00:00', '2018-03-13', 3000, 1, 'admin'),
(18, 'BAN112M', '3BAN112M1983113891', 'mbsdfjhsgd', 'khkjdhfgksd', '5464654654', 'sfdgsdfg@gdfgsdf', '2018-03-24 14:52:52', 8, 26, '2018-03-13', '00:00:00', '12:00:00', '2018-03-13', 25000, 1, 'mrid'),
(19, 'BAN112M', '3BAN112M18511581', 'Md. Moshfiqur Rahman', 'Rony', '01722667722', '15203012@iubat.edu', '2018-03-18 17:30:35', 8, 26, '2018-03-13', '00:00:00', '12:00:00', '2018-03-13', 3000, 1, 'admin'),
(28, 'BAN112M', '3BAN112M16522561', 'mbsdfjhsgd', 'khkjdhfgksd', '4536453', 'kbjfkdjbgksdjb@gmail.com', '2018-03-24 15:29:31', 8, 26, '2018-03-13', '00:00:00', '00:00:00', '0000-00-00', 3000, 0, 'mrid'),
(29, 'BAN112M', '3BAN112M16311361', 'Md. Moshfiqur Rahman', 'Rony', '011124444', '15203012@iubat.edu', '2018-03-26 16:38:39', 8, 26, '2018-03-13', '00:00:00', '00:00:00', '0000-00-00', 3000, 1, 'admin'),
(30, 'BAN112M', '3BAN112M16222261', 'Md. Moshfiqur Rahman', 'Rony', '452045', '15203012@iubat.edu', '2018-03-26 16:40:19', 8, 26, '2018-03-13', '00:00:00', '12:00:00', '2018-03-13', 3000, 0, 'mrid');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `Name`) VALUES
(1, 'Dhaka'),
(2, 'Chittagong'),
(3, 'Sayadpur'),
(4, 'Mumbai'),
(5, 'Sayadpur'),
(6, 'Khulna'),
(7, 'Jesshor'),
(8, 'Rajshahi'),
(9, 'Jakarta'),
(10, 'Dubai'),
(11, 'New York'),
(12, 'Nepal'),
(13, 'Bhutan'),
(14, 'Hunululu'),
(15, 'China'),
(16, 'Bali'),
(17, 'Singapur'),
(18, 'Malaysia'),
(19, 'Japan'),
(20, 'Tahiti'),
(21, 'Morocco'),
(22, 'Rajsthan'),
(23, 'Eygpt'),
(24, 'Koria'),
(25, 'Morishasus'),
(26, 'Brazil'),
(27, 'Madrid'),
(28, 'Barcelona'),
(29, 'Paris'),
(30, 'Delhi');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `sms` varchar(500) NOT NULL,
  `adminPriority` tinyint(1) NOT NULL,
  `userPriority` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user`, `sms`, `adminPriority`, `userPriority`) VALUES
(4, 'mrid', 'Your Ticket Is Accepted For Flight Number BAN112M For Date 2018-03-13 Time 00:00:00 And PNR Is 3BAN112M17322371', 1, 1),
(5, 'mrid', 'Your Ticket Is Accepted For Flight Number BAN112M For Date 2018-03-13 And PNR Is 3BAN112M17122171', 1, 1),
(6, 'mrid', 'Your Ticket Is Accepted For Flight Number BAN112M For Date 2018-03-13 And PNR Is 3BAN112M16922961', 1, 1),
(7, 'mrid', 'Your Ticket Is Accepted For Flight Number BAN112M For Date 2018-03-13 And PNR Is 3BAN112M16722761', 1, 1),
(8, 'mrid', 'Your Ticket Is Accepted For Flight Number BAN112M For Date 2018-03-13 And PNR Is 3BAN112M16522561', 1, 1),
(9, 'mrid', 'Your Ticket Is Accepted For Flight Number BAN112M For Date 2018-03-13 And PNR Is 3BAN112M16222261', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `retlocation`
--

CREATE TABLE `retlocation` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retlocation`
--

INSERT INTO `retlocation` (`id`, `Name`) VALUES
(1, 'Dhaka'),
(2, 'Delhi'),
(3, 'Dubai'),
(4, 'New York'),
(5, 'Nepal'),
(6, 'Bhutan'),
(7, 'Hunululu'),
(8, 'China'),
(9, 'Bali'),
(10, 'Singapur'),
(11, 'Malaysia'),
(12, 'Japan'),
(13, 'Tahiti'),
(14, 'Morocco'),
(15, 'Rajsthan'),
(16, 'Eygpt'),
(17, 'Koria'),
(18, 'Morishasus'),
(19, 'Brazil'),
(20, 'Madrid'),
(21, 'Barcelona'),
(22, 'Paris'),
(23, 'Mumbai');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `planeName` varchar(255) NOT NULL,
  `fromLoc` int(11) NOT NULL,
  `toLoc` int(11) NOT NULL,
  `depDate` date NOT NULL,
  `depTime` time NOT NULL,
  `retDate` date NOT NULL,
  `retTime` time NOT NULL,
  `seat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `planeName`, `fromLoc`, `toLoc`, `depDate`, `depTime`, `retDate`, `retTime`, `seat`) VALUES
(2, 'IND1162', 30, 18, '2018-03-20', '12:23:00', '2018-03-22', '00:32:00', 100),
(3, 'BAN112M', 26, 8, '2018-03-13', '00:00:00', '2018-03-13', '12:00:00', 160);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`),
  ADD UNIQUE KEY `cus_user_name` (`cus_user_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pnr` (`pnr`),
  ADD KEY `dest` (`dest`),
  ADD KEY `depart` (`depart`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retlocation`
--
ALTER TABLE `retlocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `toLoc` (`toLoc`),
  ADD KEY `fromLoc` (`fromLoc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administration`
--
ALTER TABLE `administration`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `retlocation`
--
ALTER TABLE `retlocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flight`
--
ALTER TABLE `flight`
  ADD CONSTRAINT `flight_ibfk_1` FOREIGN KEY (`dest`) REFERENCES `retlocation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flight_ibfk_2` FOREIGN KEY (`depart`) REFERENCES `location` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`fromLoc`) REFERENCES `location` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`toLoc`) REFERENCES `retlocation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
