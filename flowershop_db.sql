-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2018 at 06:57 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+08:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flowershop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `orderID` varchar(10) NOT NULL,
  `StaffID` varchar(10) DEFAULT NULL,
  `orderDate` datetime DEFAULT NULL,
  `Payment` varchar(10) DEFAULT NULL,
  `paymentDate` varchar(15) DEFAULT NULL,
  `custID` varchar(10) DEFAULT NULL,
  `custName` varchar(25) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `deliveredDate` varchar(15) DEFAULT NULL,
  `deliveryAddress` varchar(50) NOT NULL,
  `payTime` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`orderID`, `StaffID`, `orderDate`, `Payment`, `paymentDate`, `custID`, `custName`, `status`, `deliveredDate`, `deliveryAddress`, `payTime`) VALUES
('10', NULL, '2018-08-02 00:00:00', '28.8', NULL, '1', 'asdasdasd', 'Pending', '2018-08-30', 'Kuala LIm[pr', NULL),
('12', NULL, '2018-08-02 00:00:00', '269.7', NULL, '1', 'asdasdasd', 'Pending', '2018-08-22', 'Kuala LIm[pr', NULL),
('14', NULL, '2018-08-02 00:00:00', '2069.3', NULL, '1', 'asdasdasd', 'Pending', '2018-08-31', 'Kuala LIm[pr', NULL),
('15', NULL, '2018-08-02 00:00:00', '179.8', NULL, '1', 'asdasdasd', 'Pending', '2018-08-28', 'Kuala LIm[pr', NULL),
('16', NULL, '2018-08-02 00:00:00', '179.8', NULL, '1', 'asdasdasd', 'Pending', '2018-08-27', 'Kuala LIm[pr', NULL),
('21', NULL, '2018-08-02 00:00:00', '57.6', NULL, '1', 'asdasdasd', 'Pending', '2018-08-10', 'Kuala LIm[pr', NULL),
('4', NULL, '2018-08-02 00:00:00', '89.9', NULL, '1', 'asdasdasd', 'Pending', '2018-08-04', 'Kuala LIm[pr', NULL),
('5', NULL, '2018-08-02 00:00:00', '28.8', NULL, '1', 'asdasdasd', 'Pending', '2018-08-04', 'Kuala LIm[pr', NULL),
('6', NULL, '2018-08-02 00:00:00', '28.8', NULL, '1', 'asdasdasd', 'Pending', '2018-08-04', 'Kuala LIm[pr', NULL),
('7', NULL, '2018-08-02 00:00:00', '28.8', NULL, '1', 'asdasdasd', 'Pending', '2018-08-11', 'Kuala LIm[pr', NULL),
('O1001', 'S1001', '0000-00-00 00:00:00', '200', '2018-08-02', 'C1001', 'Lim', 'Delivered', '2018-08-02', '', '09:47:00'),
('O1002', 'S1002', '0000-00-00 00:00:00', '500', '2018-08-02', 'C1002', 'JunKit', 'Delivered', '2018-08-02', '', '09:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `floral_order`
--

CREATE TABLE `floral_order` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_amount` double NOT NULL,
  `status` varchar(6) NOT NULL DEFAULT 'unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `floral_order`
--

INSERT INTO `floral_order` (`id`, `customer_id`, `date`, `total_amount`, `status`) VALUES
(1, 1, '2018-08-02 00:00:00', 115, '0'),
(2, 1, '2018-08-02 00:00:00', 360, '0'),
(3, 1, '2018-08-02 00:00:00', 90, '0'),
(4, 1, '2018-08-02 00:00:00', 90, '0'),
(5, 1, '2018-08-02 00:00:00', 29, '0'),
(6, 1, '2018-08-02 00:00:00', 29, '0'),
(7, 1, '2018-08-02 00:00:00', 29, '0'),
(8, 1, '2018-08-02 00:00:00', 90, '0'),
(9, 1, '2018-08-02 00:00:00', 90, '0'),
(10, 1, '2018-08-02 00:00:00', 29, '0'),
(11, 1, '2018-08-02 00:00:00', 29, '0'),
(12, 1, '2018-08-02 00:00:00', 270, '0'),
(13, 1, '2018-08-02 00:00:00', 1710, '0'),
(14, 1, '2018-08-02 00:00:00', 2069, '0'),
(15, 1, '2018-08-02 00:00:00', 180, '0'),
(16, 1, '2018-08-02 00:00:00', 180, '0'),
(17, 1, '2018-08-02 00:00:00', 270, '0'),
(18, 1, '2018-08-02 00:00:00', 180, '0'),
(19, 1, '2018-08-02 00:00:00', 180, '0'),
(20, 1, '2018-08-02 00:00:00', 180, '0'),
(21, 1, '2018-08-02 21:18:25', 57.6, ''),
(22, 1, '2018-08-02 21:19:49', 89.9, ''),
(23, 1, '2018-08-02 21:21:47', 179.8, ''),
(24, 1, '2018-08-02 21:27:15', 28.8, ''),
(25, 1, '2018-08-02 21:33:58', 359.6, 'unpaid'),
(26, 1, '2018-08-03 01:32:59', 237.4, 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 100001, 4),
(2, 2, 100002, 4),
(3, 3, 100002, 1),
(4, 4, 100002, 1),
(5, 5, 100001, 1),
(6, 6, 100001, 1),
(7, 7, 100001, 1),
(8, 8, 100002, 1),
(9, 9, 100002, 1),
(10, 10, 100001, 1),
(11, 11, 100001, 1),
(12, 12, 100002, 3),
(13, 13, 100002, 3),
(14, 13, 100001, 50),
(15, 14, 100002, 7),
(16, 14, 100001, 50),
(17, 15, 100002, 2),
(18, 16, 100002, 2),
(19, 17, 100002, 3),
(20, 18, 100002, 2),
(21, 19, 100002, 2),
(22, 20, 100002, 2),
(23, 21, 100001, 2),
(24, 22, 100002, 1),
(25, 23, 100002, 2),
(26, 24, 100001, 1),
(27, 25, 100002, 4),
(28, 26, 100001, 2),
(29, 26, 100002, 2);

-- --------------------------------------------------------

--
-- Table structure for table `self_pickup`
--

CREATE TABLE `self_pickup` (
  `custName` varchar(25) DEFAULT NULL,
  `custID` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `paymentDate` varchar(20) DEFAULT NULL,
  `Payment` varchar(10) DEFAULT NULL,
  `OrderID` varchar(10) NOT NULL,
  `staffID` varchar(10) DEFAULT NULL,
  `pickupDate` varchar(20) DEFAULT NULL,
  `orderDate` datetime DEFAULT NULL,
  `payTime` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `self_pickup`
--

INSERT INTO `self_pickup` (`custName`, `custID`, `status`, `paymentDate`, `Payment`, `OrderID`, `staffID`, `pickupDate`, `orderDate`, `payTime`) VALUES
('', '', '', '1 August 2018', '', '', '', '1 August 2018', NULL, NULL),
('asdasdasd', '1', 'Pending', NULL, '28.8', '11', NULL, '2018-08-31', '2018-08-02 00:00:00', NULL),
('JJ', 'JJ1001', 'Done', '1 August 2018', '44', '122', '212', '1 August 2018', NULL, NULL),
('asdasdasd', '1', 'Pending', NULL, '1709.7', '13', NULL, '2018-08-31', '2018-08-02 00:00:00', NULL),
('asdasdasd', '1', 'Pending', NULL, '269.7', '17', NULL, '2018-09-01', '2018-08-02 00:00:00', NULL),
('asdasdasd', '1', 'Pending', NULL, '179.8', '20', NULL, '2018-08-31', '2018-08-02 00:00:00', NULL),
('asdasdasd', '1', 'Pending', NULL, '89.9', '22', NULL, '2018-08-31', '2018-08-02 00:00:00', NULL),
('asdasdasd', '1', 'Pending', NULL, '179.8', '23', NULL, '2018-07-02', '2018-08-02 00:00:00', NULL),
('asdasdasd', '1', 'Pending', NULL, '28.8', '24', NULL, '2018-08-23', '2018-08-02 00:00:00', NULL),
('asdasdasd', '1', 'Pending', NULL, '359.6', '25', NULL, '2018-08-24', '2018-08-02 00:00:00', NULL),
('asdasdasd', '1', 'Pending', NULL, '237.4', '26', NULL, '2018-08-18', '2018-08-02 00:00:00', NULL),
('asdasdasd', '1', 'Pending', NULL, '89.9', '3', NULL, '2018-08-04', '2018-08-02 00:00:00', NULL),
('asdasdasd', '1', 'Pending', NULL, '89.9', '8', NULL, '2018-08-11', '2018-08-02 00:00:00', NULL),
('asdasdasd', '1', 'Pending', NULL, '89.9', '9', NULL, '2018-08-23', '2018-08-02 00:00:00', NULL),
('aa', 'aa', 'Done', '1 August 2018', 'aa', 'aa', 'aa', '1 August 2018', NULL, NULL),
('Lim Jun Kit', 'C10001', 'Done', '2018-08-01', '50', 'O10001', 'S10001', '2018-08-01', NULL, NULL),
('test', 'test', 'Done', '2018-08-02', '50', 'test', 'test', '2018-08-02', NULL, '09:34:36'),
('vv', 'vv', 'Done', '1 August 2018', 'vv', 'vv', 'vv', '1 August 2018', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `floral_order`
--
ALTER TABLE `floral_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `self_pickup`
--
ALTER TABLE `self_pickup`
  ADD PRIMARY KEY (`OrderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `floral_order`
--
ALTER TABLE `floral_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
