-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 01:25 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoo`
--
CREATE DATABASE IF NOT EXISTS `zoo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `zoo`;

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

DROP TABLE IF EXISTS `animals`;
CREATE TABLE `animals` (
  `animal_id` varchar(20) NOT NULL,
  `animal_name` varchar(50) NOT NULL,
  `dob` date DEFAULT NULL,
  `measurement` varchar(100) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `age` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `cage_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`animal_id`, `animal_name`, `dob`, `measurement`, `weight`, `age`, `gender`, `cage_no`) VALUES
('an1009', 'Draco', '0000-00-00', '2.4', 3.9, '3', 'male', 1),
('an1031', 'Likr', '2015-11-05', '5', 40.8, '4', 'male', 3),
('an1034', 'Maki', '2006-12-31', '8', 67.8, '13', 'female', 4),
('an1037', 'Malf', '2018-03-25', '2', 4.7, '2', 'male', 5),
('an1099', 'Sheela', '0000-00-00', '7', 69, '8', 'female', 6),
('an2000', 'Tom', '2020-01-06', '3', 48, '0', 'male', 7),
('an2010', 'Cindy', '0000-00-00', '4', 39.9, '3', 'female', 8),
('an2029', 'Harry', '2019-10-29', '4', 3.9, '34', 'male', 11),
('an2091', 'Potah', '2019-10-29', '1.9', 4, '5', 'male', 12),
('an3035', 'Lina', '2018-08-09', '3.7', 4.5, '1', 'female', 14),
('an3053', 'Simba', '2015-06-06', '8', 52.3, '4', 'male', 13);

-- --------------------------------------------------------

--
-- Table structure for table `animal_checkup`
--

DROP TABLE IF EXISTS `animal_checkup`;
CREATE TABLE `animal_checkup` (
  `animal_id` varchar(20) NOT NULL,
  `checkup_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animal_checkup`
--

INSERT INTO `animal_checkup` (`animal_id`, `checkup_id`) VALUES
('an1099', 'chk394'),
('an1031', 'chk890'),
('an3035', 'chk680'),
('an1034', 'chk523'),
('an1034', 'ch299');

-- --------------------------------------------------------

--
-- Table structure for table `animal_species`
--

DROP TABLE IF EXISTS `animal_species`;
CREATE TABLE `animal_species` (
  `animal_id` varchar(20) NOT NULL,
  `specie_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animal_species`
--

INSERT INTO `animal_species` (`animal_id`, `specie_id`) VALUES
('an1031', 'sp101'),
('an3053', 'sp101'),
('an2010', 'sp101'),
('an2000', 'sp101'),
('an1099', 'sp103'),
('an1034', 'sp103'),
('an3035', 'sp305'),
('an2029', 'sp305'),
('an2091', 'sp305'),
('an1009', 'sp305'),
('an1037', 'sp305');

-- --------------------------------------------------------

--
-- Table structure for table `checkup`
--

DROP TABLE IF EXISTS `checkup`;
CREATE TABLE `checkup` (
  `checkup_id` varchar(20) NOT NULL,
  `date_time` datetime NOT NULL,
  `symptoms` varchar(500) DEFAULT NULL,
  `treatment` varchar(500) DEFAULT NULL,
  `cost` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkup`
--

INSERT INTO `checkup` (`checkup_id`, `date_time`, `symptoms`, `treatment`, `cost`) VALUES
('ch299', '2020-06-17 16:37:00', 'Flu', 'Medicines', 2000),
('chk394', '2019-09-14 08:15:00', 'Fracture, Femur', 'Cast', 9500),
('chk523', '2019-04-17 10:00:00', 'Regular Check-up', 'none', 200),
('chk680', '2020-03-25 07:30:00', 'Cataract', 'Minor Surgery', 20000),
('chk890', '2020-01-28 12:00:00', 'Stomach Infection', 'Antibiotics', 6500);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `dept_id` varchar(20) NOT NULL,
  `dept_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
('d1', 'Research'),
('d2', 'Doctor'),
('d3', 'Plant Caretaking'),
('d4', 'Worker'),
('d5', 'Volunteer'),
('d6', 'Finance and Accounts'),
('d7', 'Animal Caretaking'),
('d8', 'Tours and Giftshop'),
('d9', 'Management');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

DROP TABLE IF EXISTS `donor`;
CREATE TABLE `donor` (
  `donor_id` varchar(20) NOT NULL,
  `aadhar_no` char(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`donor_id`, `aadhar_no`) VALUES
('govt', '0000 0000 0000'),
('d1002', '1013 2567 2397'),
('d1001', '2518 2518 2152'),
('d1003', '5123 2547 5223'),
('d1004', '6220 5492 5513'),
('d1005', '6928 6192 5892');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `emp_id` varchar(10) NOT NULL,
  `aadhar_no` varchar(14) NOT NULL,
  `post_id` varchar(3) DEFAULT NULL,
  `education` varchar(50) DEFAULT NULL,
  `experience` int(2) DEFAULT NULL,
  `health_bg` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `aadhar_no`, `post_id`, `education`, `experience`, `health_bg`) VALUES
('emp1011', '1953 4250 2579', 'p1', 'B.Sc. biology', 1, 'asthma'),
('emp1021', '2084 5792 1024', 'p2', 'B.Sc. biology', 1, 'healthy'),
('emp1022', '6083 3580 1248', 'p2', 'B.Sc. biology', 1, 'limp'),
('emp2031', '5082 5120 1280', 'p3', 'MBBS', 10, 'high BP'),
('emp2032', '0648 5380 1248', 'p3', 'MBBS', 11, 'healthy'),
('emp3041', '1258 1502 6948', 'p4', 'B.Sc. biology', 5, 'healthy'),
('emp3051', '6918 5379 1704', 'p5', 'PhD biology', 1, 'mild asthma'),
('emp3061', '6029 5025 1579', 'p6', 'B.Sc. biology', 5, 'healthy'),
('emp4071', '6204 1295 1670', 'p7', 'CBSE +2', 3, 'healthy'),
('emp4072', '6192 5368 1369', 'p7', 'IGCSE 10th', 1, 'healthy'),
('emp5081', '3681 5702 6390', 'p8', 'IGCSE 12th', 1, 'healthy'),
('emp6091', '6917 2570 1255', 'p9', 'CA completion', 10, 'high BP'),
('emp6101', '3961 2501 3691', 'p10', 'CA completion', 5, 'healthy'),
('emp7111', '5827 1973 6925', 'p11', 'PhD biology', 15, 'healthy'),
('emp7121', '5123 2547 5223', 'p12', 'B.Sc. biology', 10, 'healthy'),
('emp7131', '3864 6916 1239', 'p13', 'PhD biology', 15, 'healthy'),
('emp7141', '5019 6520 1692', 'p14', 'PhD biology', 12, 'healthy'),
('emp7142', '6928 1358 6294', 'p14', 'B.Sc. biology', 10, 'healthy'),
('emp7151', '6923 1529 6236', 'p15', 'B.Sc. biology', 5, 'healthy'),
('emp7152', '3968 2590 2590', 'p15', 'B.Sc. biology', 7, 'healthy'),
('emp7153', '1249 2589 6319', 'p15', 'B.Sc. biology', 4, 'healthy'),
('emp7154', '6938 1239 5293', 'p15', 'B.Sc. biology', 5, 'healthy'),
('emp7161', '6928 6192 5892', 'p16', 'PhD biology', 13, 'mild asthma'),
('emp8171', '5928 6928 1592', 'p17', 'CBSE +2', 5, 'healthy'),
('emp8172', '5928 1249 5284', 'p17', 'B.Sc. biology', 5, 'healthy'),
('emp8181', '5927 1542 2150', 'p18', 'B.com', 3, 'mild asthma'),
('emp9191', '2581 2589 1248', 'p19', 'B.com', 12, 'limp'),
('emp9201', '2591 1285 1329', 'p20', 'CA completion', 10, 'high BP'),
('emp9211', '3698 1238 2594', 'p21', 'B.com', 7, 'healthy'),
('emp9221', '1953 4210 2559', 'p22', 'B.com', 5, 'healthy'),
('emp9222', '2518 2518 2152', 'p22', 'B.com', 2, 'healthy'),
('emp9231', '3581 2598 1249', 'p23', 'CA completion', 7, 'high BP');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
  `aadhar_no` char(14) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `blood_group` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`aadhar_no`, `name`, `dob`, `age`, `gender`, `address`, `phone`, `blood_group`) VALUES
('', 'government', '0000-00-00', 0, '', '', 0, ''),
('0000 0000 0000', 'Government', '2020-05-11', 0, '', '', 0, ''),
('0648 5380 1248', 'Arvind', '1979-01-31', 41, 'f', '23/5 Raja Colony', 2147483647, 'A-'),
('1013 2567 2397', 'John', '2011-01-26', 9, 'm', '5/23 MRC nagar', 2147483647, 'AB-'),
('1249 2589 6319', 'Chandar', '1990-02-20', 30, 'm', '60/26 Sastri Nagar', 2147483647, 'O-'),
('1258 1502 6948', 'Jill', '1990-09-30', 30, 'f', '5/63 Sastri Nagar', 2147483647, 'B+'),
('1953 4210 2559', 'Jessica', '1990-12-23', 29, 'f', '9/3 Gandhi Nagar', 2147483647, 'AB+'),
('1953 4250 2579', 'Salman', '1993-12-12', 27, 'm', '12/6 Raja Colony', 2147483647, 'AB+'),
('2084 5792 1024', 'Ananya', '1996-01-29', 24, 'f', '4/23 Chithappa Colony', 2147483647, 'O-'),
('2518 2518 2152', 'Jocelyn', '1998-03-12', 32, 'O', '#123 Shangi', 2147483647, 'A+'),
('2581 2589 1248', 'Subramaniam', '1983-02-23', 37, 'm', '32/13 Gandhi Nagar', 2147483647, 'A-'),
('2591 1285 1329', 'Pradyuksha', '1984-03-23', 36, 'f', '46/12 Nandanam', 2147483647, 'A+'),
('3581 2598 1249', 'Barghavan', '1981-03-12', 39, 'm', '3/5 Adyar', 2147483647, 'A+'),
('3681 5702 6390', 'Noella', '1999-03-27', 21, 'f', '1/5 Adyar', 2147483647, 'B-'),
('3698 1238 2594', 'Aditi', '1988-02-25', 32, 'f', '42/62 Nandanam', 2147483647, 'A-'),
('3864 6916 1239', 'Khan', '1975-05-24', 45, 'm', '61/3 Sastri Nagar', 2147483647, 'B-'),
('3961 2501 3691', 'Barghavi', '1993-02-20', 27, 'f', '#259 Shangi', 2147483647, 'A-'),
('3968 2590 2590', 'Rekha', '1987-05-12', 33, 'f', '25/6 Raja Colony', 1266812395, 'AB+'),
('5019 6520 1692', 'Danush', '1977-02-14', 43, 'm', '52/62 Nandanam', 2147483647, 'O+'),
('5082 5120 1280', 'Arvind', '1980-08-12', 40, 'm', '#656 Shangi', 2147483647, 'O+'),
('5123 2547 5223', 'Nikhil', '1980-12-24', 39, 'm', '#634 Shangi', 2147483647, 'B-'),
('5827 1973 6925', 'Nikita', '1976-07-19', 44, 'f', '5/25 Saidapet', 2147483647, 'A+'),
('5927 1542 2150', 'Ashwath', '1995-03-18', 25, 'm', '63/6 Gandhi Nagar', 2147483647, 'B+'),
('5928 1249 5284', 'Sankar', '1985-02-24', 25, 'f', '53/15 Adyar', 2147483647, 'O+'),
('5928 6928 1592', 'Taarika', '1997-03-31', 23, 'f', '24/5 MRC Nagar', 2147483647, 'B-'),
('6029 5025 1579', 'Vishnu', '1995-01-28', 25, 'm', '2/5 MRC Nagar', 1523058023, 'A-'),
('6083 3580 1248', 'Leslie', '1996-03-31', 24, 'm', '34/42 Gandhi Nagar', 2147483647, 'AB-'),
('6192 5368 1369', 'Jacob', '2002-12-25', 18, 'm', '12/7 Adyar', 2147483647, 'O+'),
('6204 1295 1670', 'John', '2000-01-26', 20, 'm', '5/23 MRC Nagar', 2147483647, 'AB-'),
('6220 5492 5513', 'Teena', '1973-01-31', 47, 'f', '23/5 Raja Colony', 2147483647, 'A-'),
('6917 2570 1255', 'Krishna', '1980-12-24', 39, 'm', '24/15 Rani Colony', 2147483647, 'A+'),
('6918 5379 1704', 'Karan', '1993-12-12', 27, 'm', '18/1 Raja Colony', 2147483647, 'B-'),
('6923 1529 6236', 'Ravi', '1989-02-04', 31, 'm', '9/35 Nandanam', 2147483647, 'B+'),
('6928 1358 6294', 'Kayla', '1980-12-06', 39, 'f', '#756 Shangi', 2147483647, 'B-'),
('6928 6192 5892', 'Jeffords', '1965-12-23', 55, 'm', '42/2 Adyar', 2147483647, 'O+'),
('6938 1239 5293', 'Reyna', '1988-02-04', 32, 'f', '#029 Shangi', 2147483647, 'AB-');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `post_id` varchar(20) NOT NULL,
  `post_title` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`) VALUES
('p1', 'Scientist'),
('p10', 'Accountant'),
('p11', 'Veterinarian'),
('p12', 'Veterinary Technician'),
('p13', 'Head Keeper'),
('p14', 'Senior Keeper'),
('p15', 'Zoo Keeper'),
('p16', 'Zoologist'),
('p17', 'Tour Guide'),
('p18', 'Clerk'),
('p19', 'Manager'),
('p2', 'Apprentice'),
('p20', 'Curator'),
('p21', 'Director'),
('p22', 'Coordinator'),
('p23', 'Registrar'),
('p3', 'Physician'),
('p4', 'Floriculturist'),
('p5', 'Conservation Biologist'),
('p6', 'Horticulturist'),
('p7', 'Worker'),
('p8', 'Volunteer'),
('p9', 'Finance Manager');

-- --------------------------------------------------------

--
-- Table structure for table `postdept`
--

DROP TABLE IF EXISTS `postdept`;
CREATE TABLE `postdept` (
  `post_id` varchar(20) DEFAULT NULL,
  `dept_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postdept`
--

INSERT INTO `postdept` (`post_id`, `dept_id`) VALUES
('p1', 'd1'),
('p2', 'd1'),
('p3', 'd2'),
('p4', 'd3'),
('p5', 'd3'),
('p6', 'd3'),
('p7', 'd4'),
('p8', 'd5'),
('p9', 'd6'),
('p10', 'd6'),
('p11', 'd7'),
('p12', 'd7'),
('p13', 'd7'),
('p14', 'd7'),
('p15', 'd7'),
('p16', 'd7'),
('p17', 'd8'),
('p18', 'd8'),
('p19', 'd9'),
('p20', 'd9'),
('p22', 'd9'),
('p23', 'd9'),
('p21', 'd9');

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

DROP TABLE IF EXISTS `species`;
CREATE TABLE `species` (
  `specie_id` varchar(20) NOT NULL,
  `specie_name` varchar(50) NOT NULL,
  `food` varchar(200) DEFAULT NULL,
  `requirements` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`specie_id`, `specie_name`, `food`, `requirements`) VALUES
('sp101', 'Cassowary', 'Fruits, Vegetables', 'Climbing Structure'),
('sp103', 'Cheetah', 'Meat', 'Trees'),
('sp305', 'Echidna', 'Fruits, Vegetables', 'Hollow Log, Rock Crevice, Hay');

-- --------------------------------------------------------

--
-- Table structure for table `specie_type`
--

DROP TABLE IF EXISTS `specie_type`;
CREATE TABLE `specie_type` (
  `type_id` varchar(20) NOT NULL,
  `specie_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specie_type`
--

INSERT INTO `specie_type` (`type_id`, `specie_id`) VALUES
('at2', 'sp101'),
('at3', 'sp103'),
('at3', 'sp305');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

DROP TABLE IF EXISTS `transfer`;
CREATE TABLE `transfer` (
  `transfer_id` varchar(20) NOT NULL,
  `date_t` date NOT NULL,
  `amount` float NOT NULL,
  `purpose` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`transfer_id`, `date_t`, `amount`, `purpose`) VALUES
('f001', '2003-03-03', 200000, 'Breeding'),
('f002', '2020-01-13', 400000, 'Developement'),
('f003', '2019-07-16', 100000000, 'Yearly Donation'),
('f004', '2020-05-19', 9999, 'Food'),
('f005', '2019-12-16', 1234360, 'Facilities');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_donor`
--

DROP TABLE IF EXISTS `transfer_donor`;
CREATE TABLE `transfer_donor` (
  `transfer_id` varchar(20) DEFAULT NULL,
  `donor_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfer_donor`
--

INSERT INTO `transfer_donor` (`transfer_id`, `donor_id`) VALUES
('f001', 'd1001'),
('f004', 'govt'),
('f002', 'd1003'),
('f003', 'd1002'),
('f005', 'd1002');

-- --------------------------------------------------------

--
-- Table structure for table `typeof`
--

DROP TABLE IF EXISTS `typeof`;
CREATE TABLE `typeof` (
  `type_id` varchar(20) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typeof`
--

INSERT INTO `typeof` (`type_id`, `type_name`) VALUES
('at2', 'Birds'),
('at3', 'Mammals');

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

DROP TABLE IF EXISTS `visit`;
CREATE TABLE `visit` (
  `visit_id` varchar(20) NOT NULL,
  `date_v` date NOT NULL,
  `itime` time NOT NULL,
  `otime` time NOT NULL,
  `adult` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `camera` int(11) NOT NULL,
  `mobile` int(11) NOT NULL,
  `bill` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visit`
--

INSERT INTO `visit` (`visit_id`, `date_v`, `itime`, `otime`, `adult`, `child`, `camera`, `mobile`, `bill`) VALUES
('v1101', '2011-01-26', '10:30:00', '13:15:00', 4, 1, 0, 2, 500),
('v1302', '2013-03-04', '16:15:00', '18:00:00', 3, 0, 1, 2, 400),
('v1485', '2014-09-30', '14:45:00', '17:45:00', 2, 0, 1, 3, 325),
('v1832', '2018-03-27', '11:15:00', '14:45:00', 3, 2, 1, 3, 525),
('v1835', '2018-02-28', '15:00:00', '17:30:00', 2, 0, 0, 2, 250);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animal_id`),
  ADD UNIQUE KEY `animal_name` (`animal_name`);

--
-- Indexes for table `animal_checkup`
--
ALTER TABLE `animal_checkup`
  ADD KEY `animal_id` (`animal_id`),
  ADD KEY `checkup_id` (`checkup_id`);

--
-- Indexes for table `animal_species`
--
ALTER TABLE `animal_species`
  ADD KEY `animal_id` (`animal_id`),
  ADD KEY `specie_id` (`specie_id`);

--
-- Indexes for table `checkup`
--
ALTER TABLE `checkup`
  ADD PRIMARY KEY (`checkup_id`),
  ADD UNIQUE KEY `date_time` (`date_time`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`donor_id`),
  ADD KEY `kuk` (`aadhar_no`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`aadhar_no`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `postdept`
--
ALTER TABLE `postdept`
  ADD KEY `post_id` (`post_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`specie_id`),
  ADD UNIQUE KEY `specie_name` (`specie_name`);

--
-- Indexes for table `specie_type`
--
ALTER TABLE `specie_type`
  ADD KEY `type_id` (`type_id`),
  ADD KEY `specie_id` (`specie_id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`transfer_id`);

--
-- Indexes for table `transfer_donor`
--
ALTER TABLE `transfer_donor`
  ADD KEY `donor_id` (`donor_id`),
  ADD KEY `transfer_id` (`transfer_id`);

--
-- Indexes for table `typeof`
--
ALTER TABLE `typeof`
  ADD PRIMARY KEY (`type_id`),
  ADD UNIQUE KEY `type_name` (`type_name`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`visit_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animal_checkup`
--
ALTER TABLE `animal_checkup`
  ADD CONSTRAINT `animal_checkup_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`),
  ADD CONSTRAINT `animal_checkup_ibfk_2` FOREIGN KEY (`checkup_id`) REFERENCES `checkup` (`checkup_id`);

--
-- Constraints for table `animal_species`
--
ALTER TABLE `animal_species`
  ADD CONSTRAINT `animal_species_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`),
  ADD CONSTRAINT `animal_species_ibfk_2` FOREIGN KEY (`specie_id`) REFERENCES `species` (`specie_id`);

--
-- Constraints for table `donor`
--
ALTER TABLE `donor`
  ADD CONSTRAINT `kuk` FOREIGN KEY (`aadhar_no`) REFERENCES `person` (`aadhar_no`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`);

--
-- Constraints for table `postdept`
--
ALTER TABLE `postdept`
  ADD CONSTRAINT `postdept_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`),
  ADD CONSTRAINT `postdept_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `postdept_ibfk_3` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`),
  ADD CONSTRAINT `postdept_ibfk_4` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `specie_type`
--
ALTER TABLE `specie_type`
  ADD CONSTRAINT `specie_type_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `typeof` (`type_id`),
  ADD CONSTRAINT `specie_type_ibfk_2` FOREIGN KEY (`specie_id`) REFERENCES `species` (`specie_id`);

--
-- Constraints for table `transfer_donor`
--
ALTER TABLE `transfer_donor`
  ADD CONSTRAINT `transfer_donor_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`donor_id`),
  ADD CONSTRAINT `transfer_donor_ibfk_2` FOREIGN KEY (`transfer_id`) REFERENCES `transfer` (`transfer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
