-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2023 at 06:48 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `focusgym`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `mid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nic` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `joindate` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `epno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mid`, `name`, `nic`, `gender`, `phone`, `joindate`, `relationship`, `epno`) VALUES
(1092, 'haridran ramanathan', 860973669, 'Male', 715487240, '2021-07-22', '', 715487241),
(1456, 'abc', 8477477, 'Male', 715487240, '2021-07-22', 'mother', 244556666),
(1566, 'Rajesh', 860973639, 'Male', 94848473, '2021-07-22', 'Father', 123123123),
(4568, 'Jamess', 38383838, 'Male', 983377444, '2021-07-28', 'Mother', 9237737),
(9088, 'abc', 3838388, 'Male', 715487240, '2021-07-22', 'Father', 715487222),
(9089, 'Raja', 543534, 'Male', 43434, '2023-07-31', 'Father', 324234);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `mid` int(11) NOT NULL,
  `planid` int(11) NOT NULL,
  `paid_date` varchar(255) NOT NULL,
  `expire_date` varchar(255) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`mid`, `planid`, `paid_date`, `expire_date`, `month`, `year`) VALUES
(1456, 1, '22-07-2021', '22-10-2021', 7, 2021),
(1566, 2, '22-07-2021', '22-01-2022', 7, 2021),
(4568, 5, '28-07-2021', '28-01-2022', 7, 2021),
(9088, 1, '22-07-2021', '22-10-2021', 7, 2021),
(9089, 6, '31-07-2023', '31-07-2024', 7, 2023);

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `pid` int(11) NOT NULL,
  `planname` varchar(255) NOT NULL,
  `validity` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`pid`, `planname`, `validity`, `amount`) VALUES
(4, '3 months', 3, 3000),
(5, '6 months', 6, 6000),
(6, '1 Year', 12, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `transation`
--

CREATE TABLE `transation` (
  `mid` int(11) NOT NULL,
  `planid` varchar(11) NOT NULL,
  `paid_date` varchar(255) NOT NULL,
  `expire_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transation`
--

INSERT INTO `transation` (`mid`, `planid`, `paid_date`, `expire_date`) VALUES
(1456, '1', '22-07-2021', '22-10-2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `transation`
--
ALTER TABLE `transation`
  ADD PRIMARY KEY (`mid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9090;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9090;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transation`
--
ALTER TABLE `transation`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1457;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
