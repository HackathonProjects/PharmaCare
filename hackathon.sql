-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2018 at 09:08 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `dist`
--

CREATE TABLE `dist` (
  `sid` int(4) NOT NULL,
  `distance` decimal(20,5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `filter_shops`
--

CREATE TABLE `filter_shops` (
  `sid` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `genmedicine`
--

CREATE TABLE `genmedicine` (
  `gid` int(5) NOT NULL,
  `gname` varchar(50) NOT NULL,
  `gcost` float(10,2) NOT NULL,
  `tabperstrip` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genmedicine`
--

INSERT INTO `genmedicine` (`gid`, `gname`, `gcost`, `tabperstrip`) VALUES
(1, 'acarboz-25', 71.75, 10),
(2, 'glimidib', 60.00, 15),
(3, 'worm-ban', 9.57, 1),
(4, 'cefixime 200', 55.00, 10),
(5, 'glimidib m2sr', 96.00, 10),
(8, 'emicof', 26.25, 10),
(9, 'paracip 650', 20.00, 15),
(12, 'amlip at', 60.00, 10),
(13, 'lipus 10', 31.00, 10),
(16, 'norvasc', 30.00, 10);

-- --------------------------------------------------------

--
-- Stand-in structure for view `gm_view`
-- (See below for the actual view)
--
CREATE TABLE `gm_view` (
`mname` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `gs_rel`
--

CREATE TABLE `gs_rel` (
  `gid` int(5) NOT NULL,
  `sid` int(4) NOT NULL,
  `stock` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gs_rel`
--

INSERT INTO `gs_rel` (`gid`, `sid`, `stock`) VALUES
(2, 102, 100),
(1, 102, 0),
(1, 102, 20),
(16, 1, 5),
(16, 6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `sid` int(4) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`sid`, `password`) VALUES
(101, 'lauki'),
(102, 'kebab'),
(100, 'pool');

-- --------------------------------------------------------

--
-- Table structure for table `ma_rel`
--

CREATE TABLE `ma_rel` (
  `mid` int(5) NOT NULL,
  `aid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ma_rel`
--

INSERT INTO `ma_rel` (`mid`, `aid`) VALUES
(2000, 2003);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `mid` int(5) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `cost` float(10,2) NOT NULL,
  `tabperstrip` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`mid`, `mname`, `cost`, `tabperstrip`) VALUES
(2000, 'crocin', 15.89, 10),
(2001, 'glycomet gp 1', 88.23, 10),
(2002, 'glucar 25mg', 67.35, 10),
(2003, 'paracetamol', 19.50, 10),
(2004, 'taxim o 200', 97.55, 10),
(2005, 'glyclomet gp 2', 130.00, 15),
(2006, 'asthakind dx', 65.00, 10),
(2007, 'dolo 650', 28.05, 15),
(2008, 'amlopin at', 64.50, 10),
(2011, 'atormac 10', 55.78, 10),
(2012, 'clopicard 75', 86.95, 15),
(2015, 'lisinopril', 100.00, 10);

-- --------------------------------------------------------

--
-- Table structure for table `mg_rel`
--

CREATE TABLE `mg_rel` (
  `mid` int(5) NOT NULL,
  `gid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mg_rel`
--

INSERT INTO `mg_rel` (`mid`, `gid`) VALUES
(2001, 2),
(2002, 1),
(2004, 4),
(2005, 5),
(2006, 8),
(2007, 9),
(2008, 12),
(2011, 13),
(2015, 16);

-- --------------------------------------------------------

--
-- Table structure for table `ms_rel`
--

CREATE TABLE `ms_rel` (
  `mid` int(5) NOT NULL,
  `sid` int(4) NOT NULL,
  `stock` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_rel`
--

INSERT INTO `ms_rel` (`mid`, `sid`, `stock`) VALUES
(2000, 100, 30),
(2001, 100, 25),
(2000, 103, 30),
(2003, 124, 10),
(2000, 135, 5),
(2000, 124, 30),
(2015, 1, 10),
(2015, 6, 30);

-- --------------------------------------------------------

--
-- Table structure for table `shopowner`
--

CREATE TABLE `shopowner` (
  `sid` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `reg_no` varchar(25) NOT NULL DEFAULT 'unknown',
  `pincode` int(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopowner`
--

INSERT INTO `shopowner` (`sid`, `name`, `address`, `contact_no`, `emailid`, `reg_no`, `pincode`, `password`) VALUES
(1, 'shivkrupa medical', 'shop-1,plot-a1,sai sahden chs,sec-7,khanda colony,', 72768, 'shivkrupa@gmail.com', ' 0727', 410206, '202cb962ac59075b964b07152d234b70'),
(6, 'jayesh', 'panvel east', 7485933655, 'jay@gmail.com', '2589', 587898, 'baba327d241746ee0829e7e88117d4d5'),
(7, 'swastik', 'thane ', 7894561235, 'swastik@gmail.com', '12345', 457897, '00f1de4e151ccfc1fc9ff735a5efc479');

-- --------------------------------------------------------

--
-- Table structure for table `shop_location`
--

CREATE TABLE `shop_location` (
  `sid` int(4) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_location`
--

INSERT INTO `shop_location` (`sid`, `latitude`, `longitude`) VALUES
(1, '19.00620380', '73.10936810'),
(6, '19.00078500', '73.10434470');

-- --------------------------------------------------------

--
-- Table structure for table `sorted_shops`
--

CREATE TABLE `sorted_shops` (
  `sid` int(4) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `medname` varchar(30) NOT NULL,
  `stock` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`medname`, `stock`) VALUES
('lisinopril', 30),
('glycomet gp 1', 25),
('lisinopril', 30),
('glycomet gp 1', 25);

-- --------------------------------------------------------

--
-- Structure for view `gm_view`
--
DROP TABLE IF EXISTS `gm_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `gm_view`  AS  select `medicine`.`mname` AS `mname` from `medicine` union select `genmedicine`.`gname` AS `gname` from `genmedicine` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dist`
--
ALTER TABLE `dist`
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `genmedicine`
--
ALTER TABLE `genmedicine`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `gs_rel`
--
ALTER TABLE `gs_rel`
  ADD KEY `gid` (`gid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `ma_rel`
--
ALTER TABLE `ma_rel`
  ADD KEY `aid` (`aid`),
  ADD KEY `mid` (`mid`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `mg_rel`
--
ALTER TABLE `mg_rel`
  ADD KEY `gid` (`gid`),
  ADD KEY `mid` (`mid`);

--
-- Indexes for table `ms_rel`
--
ALTER TABLE `ms_rel`
  ADD KEY `mid` (`mid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `shopowner`
--
ALTER TABLE `shopowner`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `contact_no` (`contact_no`),
  ADD UNIQUE KEY `emailid` (`emailid`),
  ADD UNIQUE KEY `reg_no` (`reg_no`),
  ADD UNIQUE KEY `pincode` (`pincode`);

--
-- Indexes for table `shop_location`
--
ALTER TABLE `shop_location`
  ADD PRIMARY KEY (`latitude`,`longitude`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `sorted_shops`
--
ALTER TABLE `sorted_shops`
  ADD KEY `sid` (`sid`),
  ADD KEY `latitude` (`latitude`,`longitude`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genmedicine`
--
ALTER TABLE `genmedicine`
  MODIFY `gid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `mid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2016;

--
-- AUTO_INCREMENT for table `shopowner`
--
ALTER TABLE `shopowner`
  MODIFY `sid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dist`
--
ALTER TABLE `dist`
  ADD CONSTRAINT `dist_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `shopowner` (`sid`);

--
-- Constraints for table `gs_rel`
--
ALTER TABLE `gs_rel`
  ADD CONSTRAINT `gs_rel_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `genmedicine` (`gid`),
  ADD CONSTRAINT `gs_rel_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `shopowner` (`sid`);

--
-- Constraints for table `login_details`
--
ALTER TABLE `login_details`
  ADD CONSTRAINT `login_details_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `shopowner` (`sid`);

--
-- Constraints for table `ma_rel`
--
ALTER TABLE `ma_rel`
  ADD CONSTRAINT `ma_rel_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `medicine` (`mid`),
  ADD CONSTRAINT `ma_rel_ibfk_2` FOREIGN KEY (`mid`) REFERENCES `medicine` (`mid`);

--
-- Constraints for table `mg_rel`
--
ALTER TABLE `mg_rel`
  ADD CONSTRAINT `mg_rel_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `genmedicine` (`gid`),
  ADD CONSTRAINT `mg_rel_ibfk_2` FOREIGN KEY (`mid`) REFERENCES `medicine` (`mid`);

--
-- Constraints for table `ms_rel`
--
ALTER TABLE `ms_rel`
  ADD CONSTRAINT `ms_rel_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `medicine` (`mid`),
  ADD CONSTRAINT `ms_rel_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `shopowner` (`sid`);

--
-- Constraints for table `shop_location`
--
ALTER TABLE `shop_location`
  ADD CONSTRAINT `shop_location_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `shopowner` (`sid`);

--
-- Constraints for table `sorted_shops`
--
ALTER TABLE `sorted_shops`
  ADD CONSTRAINT `sorted_shops_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `shopowner` (`sid`),
  ADD CONSTRAINT `sorted_shops_ibfk_2` FOREIGN KEY (`latitude`,`longitude`) REFERENCES `shop_location` (`latitude`, `longitude`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
