-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2024 at 04:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cartsystem`
--

CREATE TABLE `cartsystem` (
  `uid` int(11) NOT NULL,
  `id` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `tprice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cartsystem`
--

INSERT INTO `cartsystem` (`uid`, `id`, `name`, `price`, `image`, `qty`, `tprice`) VALUES
(48, '2', 'ASUS F15', '62990', 'image/new14.jpg', 3, '188970'),
(50, '3', 'Redmi Note12', '9999', 'image/mo3.jpg', 2, '19998'),
(51, '7', 'JIO 5G', '4999', 'image/mo10.jpg', 2, '9998');

-- --------------------------------------------------------

--
-- Table structure for table `laptops`
--

CREATE TABLE `laptops` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` varchar(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laptops`
--

INSERT INTO `laptops` (`id`, `name`, `price`, `image`) VALUES
(1, 'Acer Aspire 3', '31990', 'image/new1.jpg'),
(2, 'ASUS F15', '62990', 'image/new14.jpg'),
(3, 'DELL G5', '35489.99', 'image/new12.jpg'),
(4, 'DELL Inspiron 15', '52499', 'image/new13.jpg'),
(5, 'Intel Core i3', '31990', 'image/new14.jpg'),
(6, 'DELL Intel Core i3 ', '33990', 'image/new17.jpg'),
(7, 'HP Pavallion H15', '32299', 'image/hp15.jpeg'),
(8, 'Xiaomi Notebook', '49999', 'image/hp14.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `mobiles`
--

CREATE TABLE `mobiles` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` varchar(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobiles`
--

INSERT INTO `mobiles` (`id`, `name`, `price`, `image`) VALUES
(1, 'VIVO C55', '5999', 'image/mo1.jpg'),
(2, 'Apple 5G', '8999', 'image/mp5.jpg'),
(3, 'Redmi Note12', '9999', 'image/mo3.jpg'),
(4, 'OPPO C55', '7999', 'image/mo5.jpg'),
(5, 'iphone 12 pro', '49999', 'image/mo9.jpg'),
(6, 'oneplus 10R', '39999', 'image/mo8.jpg'),
(7, 'JIO 5G', '4999', 'image/mo10.jpg'),
(8, 'Samsung M51', '25999', 'image/sm.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `user_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `password` text NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`user_id`, `user_name`, `email`, `phone`, `password`, `Created_At`, `Updated_At`) VALUES
(1, 'anubha kasture', 'anubha@13', '8770648340', '4444', '2024-03-17 08:30:24', '2024-04-08 14:44:23'),
(2, 'zeeshan', 'z@123', '21342342333', '98765', '2024-03-17 08:32:23', '2024-03-18 12:03:32'),
(3, 'mrunal', 'hello@123', '56', '12', '2024-03-18 10:17:15', '2024-03-18 12:03:32'),
(4, 'pavan', 'p@gmail.com', '0987654321', '0909', '2024-03-18 12:38:31', '2024-03-18 12:41:41'),
(5, 'pavan rajput', 'asd@sadf', '1234567899', '12', '2024-03-18 12:46:19', '2024-03-18 12:46:19'),
(6, 'zeeshan', 'zeeshan@gmail', '9999999999', '12345', '2024-03-19 05:32:01', '2024-03-19 05:40:16'),
(7, 'mrunal', 'mrunal@123', '1234567890', '12345', '2024-03-19 07:47:58', '2024-03-19 07:47:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartsystem`
--
ALTER TABLE `cartsystem`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `laptops`
--
ALTER TABLE `laptops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobiles`
--
ALTER TABLE `mobiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartsystem`
--
ALTER TABLE `cartsystem`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `laptops`
--
ALTER TABLE `laptops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mobiles`
--
ALTER TABLE `mobiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
