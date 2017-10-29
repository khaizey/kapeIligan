-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2017 at 04:09 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kapeiligan`
--

-- --------------------------------------------------------

--
-- Table structure for table `accntspayable`
--

CREATE TABLE IF NOT EXISTS `accntspayable` (
  `accntsId` int(11) NOT NULL,
  `debtQty` varchar(40) NOT NULL,
  `debtDate` varchar(40) NOT NULL,
  `debtPayment` varchar(40) NOT NULL,
  `customerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bean`
--

CREATE TABLE IF NOT EXISTS `bean` (
  `beansId` int(11) NOT NULL,
  `beansName` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bean`
--

INSERT INTO `bean` (`beansId`, `beansName`) VALUES
(1, 'Robusta'),
(2, 'Arabica');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customerId` int(11) NOT NULL,
  `cosLastname` varchar(40) NOT NULL,
  `cosFirstname` varchar(40) NOT NULL,
  `birthDate` varchar(40) NOT NULL,
  `address` varchar(40) NOT NULL,
  `contactNum` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mix`
--

CREATE TABLE IF NOT EXISTS `mix` (
  `mixId` int(11) NOT NULL,
  `productionId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `mixVolume` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(40) NOT NULL,
  `productVolume` varchar(40) NOT NULL,
  `productQty` varchar(40) NOT NULL,
  `productPrice` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE IF NOT EXISTS `production` (
  `productionId` int(11) NOT NULL,
  `rawInvent` int(11) NOT NULL,
  `volumeInput` varchar(40) NOT NULL,
  `volumeOut` varchar(40) NOT NULL,
  `batchName` varchar(40) NOT NULL,
  `productDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`productionId`, `rawInvent`, `volumeInput`, `volumeOut`, `batchName`, `productDate`) VALUES
(1, 7, '1250', '1000', '1', '2017-10-02 16:00:00'),
(2, 7, '1250', '1000', '2', '2017-10-02 16:00:00'),
(3, 10, '1250', '1000', '1', '2017-10-04 16:00:00'),
(4, 11, '1250', '1000', '', '2017-10-28 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rawinvent`
--

CREATE TABLE IF NOT EXISTS `rawinvent` (
  `rawInvent` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `source` varchar(50) NOT NULL,
  `beansId` int(11) NOT NULL,
  `volAmount` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rawinvent`
--

INSERT INTO `rawinvent` (`rawInvent`, `date`, `source`, `beansId`, `volAmount`) VALUES
(7, '2017-09-30 16:00:00', 'Sapad', 1, '50000'),
(8, '2017-10-01 16:00:00', 'Tubod', 1, '20000'),
(10, '2017-10-29 01:45:57', 'Hinaplanon', 2, '40000'),
(11, '2017-10-29 01:46:04', 'Sapad', 2, '10000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accntspayable`
--
ALTER TABLE `accntspayable`
  ADD PRIMARY KEY (`accntsId`), ADD KEY `Customer_accntsPayable` (`customerId`), ADD KEY `Product_accntsPayable` (`productId`);

--
-- Indexes for table `bean`
--
ALTER TABLE `bean`
  ADD PRIMARY KEY (`beansId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `mix`
--
ALTER TABLE `mix`
  ADD PRIMARY KEY (`mixId`), ADD KEY `Production_Mix` (`productionId`), ADD KEY `Product_Mix` (`productId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`productionId`), ADD KEY `rawInvent_Production` (`rawInvent`);

--
-- Indexes for table `rawinvent`
--
ALTER TABLE `rawinvent`
  ADD PRIMARY KEY (`rawInvent`), ADD KEY `Bean_rawInvent` (`beansId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accntspayable`
--
ALTER TABLE `accntspayable`
  MODIFY `accntsId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bean`
--
ALTER TABLE `bean`
  MODIFY `beansId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mix`
--
ALTER TABLE `mix`
  MODIFY `mixId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `productionId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rawinvent`
--
ALTER TABLE `rawinvent`
  MODIFY `rawInvent` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `accntspayable`
--
ALTER TABLE `accntspayable`
ADD CONSTRAINT `Customer_accntsPayable` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`),
ADD CONSTRAINT `Product_accntsPayable` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);

--
-- Constraints for table `mix`
--
ALTER TABLE `mix`
ADD CONSTRAINT `Product_Mix` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`),
ADD CONSTRAINT `Production_Mix` FOREIGN KEY (`productionId`) REFERENCES `production` (`productionId`);

--
-- Constraints for table `production`
--
ALTER TABLE `production`
ADD CONSTRAINT `rawInvent_Production` FOREIGN KEY (`rawInvent`) REFERENCES `rawinvent` (`rawInvent`);

--
-- Constraints for table `rawinvent`
--
ALTER TABLE `rawinvent`
ADD CONSTRAINT `Bean_rawInvent` FOREIGN KEY (`beansId`) REFERENCES `bean` (`beansId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
