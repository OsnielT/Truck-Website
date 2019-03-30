-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2019 at 03:11 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Trucks`
--

-- --------------------------------------------------------

--
-- Table structure for table `trucks`
--

CREATE TABLE `trucks` (
  `id` int(10) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `truck_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(9,2) DEFAULT NULL,
  `towing_capacity` decimal(9,2) DEFAULT NULL,
  `miles` decimal(9,2) DEFAULT NULL,
  `mpg_city` decimal(9,2) DEFAULT NULL,
  `mpg_highway` decimal(9,2) DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `int_color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `engine` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `drive_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fuel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transmission` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trucks`
--

INSERT INTO `trucks` (`id`, `image`, `truck_name`, `price`, `towing_capacity`, `miles`, `mpg_city`, `mpg_highway`, `color`, `int_color`, `engine`, `drive_type`, `fuel`, `transmission`) VALUES
(65, 'truck4sale.jpg', 'MyFirst and Last Car', '355.00', '1.00', '1.00', '1.00', '1.00', 'red', 'grey', '2.5', 'Automatic', 'Automatic', 'Automatic'),
(66, 'truck4sale.jpg', 'Second Car', '500.00', '1.00', '1.00', '1.00', '1.00', 'red', 'grey', '2.5', 'Automatic', 'Automatic', 'Automatic'),
(69, 'truck4sale.jpg,Trucks1.jpg', 'This has 2 images', '2.00', '2.00', '2.00', '2.00', '2.00', 'red', 'ref', '2.5', 'Automatic', 'Automatic', 'Automatic'),
(71, 'truck4sale.jpg', 'osniel is awesome', '200.00', '300.00', '100000.00', '122.00', '555.00', 'gey', 'anthiny is gayyere', '2.5', 'Automatic', 'Automatic', 'Automatic'),
(72, 'truck4sale.jpg', 'title 22', '234.00', '234.00', '234.00', '234.00', '234.00', 'red', 'red', '3.5', 'RWD', 'Gasoline', 'Automatic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trucks`
--
ALTER TABLE `trucks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trucks`
--
ALTER TABLE `trucks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
