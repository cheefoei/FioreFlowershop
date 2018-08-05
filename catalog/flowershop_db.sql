-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2018 at 06:05 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `floralassignment_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `catalog_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date_created` date NOT NULL,
  `date_expired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`catalog_id`, `name`, `description`, `date_created`, `date_expired`) VALUES
(200001, 'Fathers day test', 'Suitable for all the couples who are celebrating valentines day.', '2018-08-03', '2018-08-23'),
(200002, 'Mother\'s day', 'For all the lovely mums', '2018-08-01', '2018-08-31'),
(200003, 'Valentine', 'Just buy one', '2018-08-16', '2018-08-15'),
(200004, 'Valentine special', 'asdasdasd', '2018-08-15', '2018-08-23'),
(200005, 'Graduation day', 'sdasdasd', '2018-08-01', '2018-08-02'),
(200006, 'Valentine', 'For all the lovers', '2018-08-01', '2018-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `catalog_list`
--

CREATE TABLE `catalog_list` (
  `catlist_id` int(11) NOT NULL,
  `catalog_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalog_list`
--

INSERT INTO `catalog_list` (`catlist_id`, `catalog_id`, `product_id`) VALUES
(300002, 200001, 100001),
(300003, 200001, 100002),
(300004, 200001, 100003),
(300005, 200001, 100005);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(80) DEFAULT NULL,
  `product_type` varchar(50) DEFAULT NULL,
  `product_description` varchar(500) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_expired` date DEFAULT NULL,
  `total_stock` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `weight` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_type`, `product_description`, `date_created`, `date_expired`, `total_stock`, `price`, `weight`) VALUES
(100001, 'Rose', 'fresh_flower', 'Perfectly red in color', '2018-07-03', '2018-07-25', 10, 28.8, 800.5),
(100002, 'Hibiscus', 'bouquet', 'As pretty as your face.', '2018-07-03', '2018-07-24', 10, 89.9, 150.2),
(100003, 'rose', 'seasonal\r\npromotion item', 'Perfect in color for all those couples', '2018-07-02', '2018-07-28', 11, 198.2, 160.4),
(100005, 'Rose Slvar', 'bouquet,', 'pretty flower suitable for all occasions', '2018-08-14', '2018-08-31', 2, 11, 22),
(100006, 'Trinity Box-Red', 'Seasonal Item', 'An elegant box specially handcrafted by our artisan florist. Each rose bud is highlighted with a beautiful crystal gem to symbolise everlasting love. The box is accentuated with a classic ribbon and a drawer which holds 16 pieces of Ferrero Rocher chocolates perfectly.', '2018-08-03', '2018-08-31', 20, 59.9, 22),
(100007, 'Just For You', 'Seasonal Item', 'pretty flower suitable for all occasions', '2018-08-09', '2018-08-23', 20, 59.9, 22),
(100008, 'Rose Slvar', 'Seasonal Item', 'pretty flower suitable for all occasions', '2018-08-09', '2018-08-01', 2, 59.9, 22),
(100009, 'Pink Blush', 'bouquet', 'Beautiful Pink rose', '2018-08-01', '2018-08-31', 20, 59.9, 22),
(100010, 'Red Blush', 'floral_arrangements', 'Red color roses', '2018-08-01', '2018-08-31', 2, 59.9, 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
