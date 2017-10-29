-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2017 at 07:53 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kapeiligan`
--

-- --------------------------------------------------------

--
-- Table structure for table `accntspayable`
--

CREATE TABLE `accntspayable` (
  `accntsId` int(11) NOT NULL,
  `debtQty` varchar(40) NOT NULL,
  `debtDate` varchar(40) NOT NULL,
  `debtPayment` varchar(40) NOT NULL,
  `customerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `password`) VALUES
(1, 'jeep', '877f6f3ea8fa11bbdbd65cf04b8973bf3ba77b7c');

-- --------------------------------------------------------

--
-- Table structure for table `bean`
--

CREATE TABLE `bean` (
  `beansId` int(11) NOT NULL,
  `beansName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `customer` (
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

CREATE TABLE `mix` (
  `mixId` int(11) NOT NULL,
  `productionId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `mixVolume` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
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

CREATE TABLE `production` (
  `productionId` int(11) NOT NULL,
  `rawInvent` int(11) NOT NULL,
  `volumeInput` varchar(40) NOT NULL,
  `volumeOut` varchar(40) NOT NULL,
  `batchName` varchar(40) NOT NULL,
  `productDate` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rawinvent`
--

CREATE TABLE `rawinvent` (
  `rawInvent` int(11) NOT NULL,
  `beansId` int(11) NOT NULL,
  `volAmount` varchar(40) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `dateAcquired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rawinvent`
--

INSERT INTO `rawinvent` (`rawInvent`, `beansId`, `volAmount`, `supplier`, `dateAcquired`) VALUES
(1, 1, '50', 'iligan', '2017-10-22'),
(2, 1, '54554', '2017-10-29', '2017-10-23'),
(3, 2, '123456', '12354', '2017-10-24'),
(4, 2, '123', '123456', '2017-10-30'),
(7, 1, '50000', 'Sapad', '2017-09-30'),
(8, 1, '20000', 'Tubod', '2017-10-01'),
(10, 2, '40000', 'Hinaplanon', '2017-10-29'),
(11, 2, '10000', 'Sapad', '2017-10-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accntspayable`
--
ALTER TABLE `accntspayable`
  ADD PRIMARY KEY (`accntsId`),
  ADD KEY `Customer_accntsPayable` (`customerId`),
  ADD KEY `Product_accntsPayable` (`productId`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

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
  ADD PRIMARY KEY (`mixId`),
  ADD KEY `Production_Mix` (`productionId`),
  ADD KEY `Product_Mix` (`productId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`productionId`),
  ADD KEY `rawInvent_Production` (`rawInvent`);

--
-- Indexes for table `rawinvent`
--
ALTER TABLE `rawinvent`
  ADD PRIMARY KEY (`rawInvent`),
  ADD KEY `Bean_rawInvent` (`beansId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accntspayable`
--
ALTER TABLE `accntspayable`
  MODIFY `accntsId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bean`
--
ALTER TABLE `bean`
  MODIFY `beansId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `productionId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rawinvent`
--
ALTER TABLE `rawinvent`
  MODIFY `rawInvent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
