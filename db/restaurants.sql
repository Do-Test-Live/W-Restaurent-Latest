-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 13, 2022 at 07:49 AM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u727820269_restaurants`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `ip` varchar(150) NOT NULL,
  `image` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'sales',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `ip`, `image`, `email`, `password`, `role`, `updated_at`) VALUES
(7, 'Order', '', '', 'order@nftprj.com', 'Booking2022', 'admin', '2022-08-26 08:45:32'),
(8, 'Rico', '', '', 'ricoleung28@gmail.com', 'Ricoadmin', 'admin', '2022-08-26 13:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `daily_report`
--

CREATE TABLE `daily_report` (
  `id` int(11) NOT NULL,
  `day` date NOT NULL,
  `status` int(11) NOT NULL,
  `sends_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daily_report`
--

INSERT INTO `daily_report` (`id`, `day`, `status`, `sends_at`) VALUES
(1, '2022-08-22', 1, '2022-08-23 11:49:46'),
(2, '2022-08-23', 1, '2022-08-24 04:51:21'),
(6, '2022-08-24', 1, '2022-08-25 09:21:42'),
(7, '2022-08-25', 1, '2022-08-26 07:37:14'),
(8, '2022-08-26', 1, '2022-08-27 02:27:38'),
(9, '2022-08-27', 1, '2022-08-28 03:19:30'),
(10, '2022-08-28', 1, '2022-08-29 04:44:02'),
(11, '2022-08-29', 1, '2022-08-30 15:49:06'),
(12, '2022-08-30', 1, '2022-08-31 04:29:26'),
(13, '2022-09-02', 1, '2022-09-03 16:33:11'),
(14, '2022-09-03', 1, '2022-09-04 03:37:29'),
(15, '2022-09-05', 1, '2022-09-06 15:18:12'),
(16, '2022-09-06', 1, '2022-09-07 16:06:29'),
(17, '2022-09-07', 1, '2022-09-08 16:06:26'),
(18, '2022-09-08', 1, '2022-09-09 16:57:56'),
(19, '2022-09-09', 1, '2022-09-10 06:34:05'),
(20, '2022-09-10', 1, '2022-09-11 16:57:56'),
(21, '2022-09-11', 1, '2022-09-12 00:21:59'),
(22, '2022-09-12', 1, '2022-09-13 16:57:56'),
(23, '2022-09-13', 1, '2022-09-14 01:53:32'),
(24, '2022-09-14', 1, '2022-09-15 16:57:57'),
(25, '2022-09-15', 1, '2022-09-16 16:57:56'),
(26, '2022-09-16', 1, '2022-09-17 16:57:56'),
(27, '2022-09-17', 1, '2022-09-18 16:57:56'),
(28, '2022-09-18', 1, '2022-09-19 16:57:56'),
(29, '2022-09-19', 1, '2022-09-20 16:57:56'),
(30, '2022-09-20', 1, '2022-09-21 16:57:56'),
(31, '2022-09-21', 1, '2022-09-22 16:57:56'),
(32, '2022-09-22', 1, '2022-09-23 16:57:56'),
(33, '2022-09-23', 1, '2022-09-24 16:57:56'),
(34, '2022-09-24', 1, '2022-09-25 16:57:56'),
(35, '2022-09-25', 1, '2022-09-26 16:57:56'),
(36, '2022-09-26', 1, '2022-09-27 09:44:10'),
(37, '2022-09-27', 1, '2022-09-28 08:31:16'),
(38, '2022-09-28', 1, '2022-09-29 16:57:56'),
(39, '2022-09-29', 1, '2022-09-30 16:57:56'),
(40, '2022-09-30', 1, '2022-10-01 16:57:56'),
(41, '2022-10-01', 1, '2022-10-02 16:57:56'),
(42, '2022-10-02', 1, '2022-10-03 03:09:33'),
(43, '2022-10-03', 1, '2022-10-04 16:57:56'),
(44, '2022-10-04', 1, '2022-10-05 06:34:36'),
(45, '2022-10-05', 1, '2022-10-06 16:35:46'),
(46, '2022-10-06', 1, '2022-10-07 16:57:56'),
(47, '2022-10-07', 1, '2022-10-08 04:54:56'),
(48, '2022-10-08', 1, '2022-10-09 16:57:56'),
(49, '2022-10-09', 1, '2022-10-10 16:57:56'),
(50, '2022-10-10', 1, '2022-10-11 14:32:14'),
(51, '2022-10-11', 1, '2022-10-12 16:57:56'),
(52, '2022-10-12', 1, '2022-10-13 16:57:56'),
(53, '2022-10-13', 1, '2022-10-14 16:57:56'),
(54, '2022-10-14', 1, '2022-10-15 16:54:04'),
(55, '2022-10-15', 1, '2022-10-16 16:57:56'),
(56, '2022-10-16', 1, '2022-10-17 10:18:22'),
(57, '2022-10-17', 1, '2022-10-18 07:45:33'),
(58, '2022-10-18', 1, '2022-10-19 05:58:32'),
(59, '2022-10-19', 1, '2022-10-20 02:56:54'),
(60, '2022-10-20', 1, '2022-10-21 03:01:11'),
(61, '2022-10-21', 1, '2022-10-22 13:25:58'),
(62, '2022-10-22', 1, '2022-10-23 08:27:45'),
(63, '2022-10-23', 1, '2022-10-24 16:57:56'),
(64, '2022-10-24', 1, '2022-10-25 02:50:13'),
(65, '2022-10-25', 1, '2022-10-26 09:46:58'),
(66, '2022-10-26', 1, '2022-10-27 16:57:56'),
(67, '2022-10-27', 1, '2022-10-28 16:57:56'),
(68, '2022-10-28', 1, '2022-10-29 16:57:56'),
(69, '2022-10-29', 1, '2022-10-30 16:57:56'),
(70, '2022-10-30', 1, '2022-10-31 16:57:56'),
(71, '2022-10-31', 1, '2022-11-01 16:57:56'),
(72, '2022-11-01', 1, '2022-11-02 16:57:56'),
(73, '2022-11-02', 1, '2022-11-03 16:57:56'),
(74, '2022-11-03', 1, '2022-11-04 16:57:56'),
(75, '2022-11-04', 1, '2022-11-05 10:51:38'),
(76, '2022-11-05', 1, '2022-11-06 16:57:56'),
(77, '2022-11-06', 1, '2022-11-07 16:57:56'),
(78, '2022-11-07', 1, '2022-11-08 16:57:56'),
(79, '2022-11-08', 1, '2022-11-09 16:57:56'),
(80, '2022-11-09', 1, '2022-11-10 16:57:56'),
(81, '2022-11-10', 1, '2022-11-11 16:57:56'),
(82, '2022-11-11', 1, '2022-11-12 05:34:14'),
(83, '2022-11-12', 1, '2022-11-13 11:13:19'),
(84, '2022-11-13', 1, '2022-11-14 09:22:01'),
(85, '2022-11-14', 1, '2022-11-15 02:30:30'),
(86, '2022-11-15', 1, '2022-11-16 16:57:56'),
(87, '2022-11-16', 1, '2022-11-17 16:57:56'),
(88, '2022-11-17', 1, '2022-11-18 16:57:56'),
(89, '2022-11-18', 1, '2022-11-19 06:56:34'),
(90, '2022-11-19', 1, '2022-11-20 16:57:56'),
(91, '2022-11-20', 1, '2022-11-21 13:12:50'),
(92, '2022-11-21', 1, '2022-11-22 00:13:52'),
(93, '2022-11-22', 1, '2022-11-23 00:13:52'),
(94, '2022-11-23', 1, '2022-11-24 00:13:52'),
(95, '2022-11-24', 1, '2022-11-25 00:13:52'),
(96, '2022-11-25', 1, '2022-11-26 00:13:52'),
(97, '2022-11-26', 1, '2022-11-27 00:13:52'),
(98, '2022-11-27', 1, '2022-11-28 00:13:52'),
(99, '2022-11-28', 1, '2022-11-29 00:13:52'),
(100, '2022-11-29', 1, '2022-11-30 00:13:52'),
(101, '2022-11-30', 1, '2022-12-01 00:13:52'),
(102, '2022-12-01', 1, '2022-12-02 00:13:52'),
(103, '2022-12-02', 1, '2022-12-03 00:13:52'),
(104, '2022-12-03', 1, '2022-12-04 00:13:52'),
(105, '2022-12-04', 1, '2022-12-05 00:13:52'),
(106, '2022-12-05', 1, '2022-12-06 00:13:52'),
(107, '2022-12-06', 1, '2022-12-07 00:13:52'),
(108, '2022-12-07', 1, '2022-12-08 00:13:52'),
(109, '2022-12-08', 1, '2022-12-09 00:39:50'),
(110, '2022-12-09', 1, '2022-12-10 02:40:47'),
(111, '2022-12-10', 1, '2022-12-11 02:24:32'),
(112, '2022-12-11', 1, '2022-12-12 01:04:20'),
(113, '2022-12-12', 1, '2022-12-13 02:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_report`
--

CREATE TABLE `monthly_report` (
  `id` int(11) NOT NULL,
  `month` text NOT NULL,
  `status` int(11) NOT NULL,
  `sends_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monthly_report`
--

INSERT INTO `monthly_report` (`id`, `month`, `status`, `sends_at`) VALUES
(1, '2022-07', 1, '2022-08-23 11:49:46'),
(2, '2022-08', 1, '2022-09-03 16:33:13'),
(3, '2022-09', 1, '2022-10-01 16:57:56'),
(4, '2022-10', 1, '2022-11-01 16:57:57'),
(5, '2022-11', 1, '2022-12-01 00:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `restaurant` varchar(100) NOT NULL,
  `food` varchar(100) NOT NULL,
  `code` varchar(8) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `seat_number` varchar(20) NOT NULL,
  `number` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `price` double(10,2) NOT NULL,
  `occasion` varchar(150) NOT NULL,
  `alergies` varchar(150) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `inserted_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `name`, `restaurant`, `food`, `code`, `date`, `time`, `seat_number`, `number`, `email`, `price`, `occasion`, `alergies`, `status`, `inserted_at`, `updated_at`) VALUES
(1, 'Jimmy Cheng', 'Pizza Hut', 'Pasta', 'RZBKA384', '2022-07-20', '10:00 AM', '2', '93058873', 'jc2009jc@yahoo.com.hk', 7.99, '', '', 1, '0000-00-00 00:00:00', '2022-08-24 07:13:25'),
(2, 'Pasta night', 'Pizza Hut', 'Pasta', 'XH2YUXPV', '2022-07-16', '10:00 AM', '3', '93058873', 'jc', 7.99, '', '', 1, '0000-00-00 00:00:00', '2022-08-24 07:13:25'),
(3, 'TEST', 'KFC', 'Chicken fry', 'B7TG1I6G', '2022-08-25', ' 3:00 PM', '2', '23456789', 'francis00358@gmail.com', 8.55, 'test', 'test', 0, '0000-00-00 00:00:00', '2022-08-25 07:35:05'),
(4, 'Monoget Saha', 'KFC', 'Chicken fry', 'UJ2QD6JP', '2022-08-25', ' 3:00 PM', '10', '0178858585875', 'frogbidofficial@gmail.com', 8.55, 'NO', 'NO', 1, '0000-00-00 00:00:00', '2022-08-25 09:49:50'),
(5, 'Test test', 'KFC', 'Chicken fry', '4I37QICA', '2022-08-27', ' 3:00 PM', '7', '2312367890', 'monoget2@gmail.com', 8.55, 'Test', 'Test', 0, '0000-00-00 00:00:00', '2022-08-26 11:07:52'),
(6, '000000', '江振偉', '9折', 'NTQIWHX8', '2022-11-23', '10:00 AM', '3', '55555555', 'boborice.info@gmail.com', 0.00, '', '', 0, '0000-00-00 00:00:00', '2022-11-14 09:27:20'),
(7, 'ricebobo', 'Fanny Lo', '', 'DKPS1JCA', '2022-11-18', '10:00 AM', '10', '55555555', 'boborice.info@gmail.com', 0.00, '', '', 0, '0000-00-00 00:00:00', '2022-11-15 02:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `code` varchar(10) NOT NULL,
  `time` varchar(100) NOT NULL,
  `discount` int(11) NOT NULL,
  `price` varchar(100) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `restaurant_id`, `p_name`, `code`, `time`, `discount`, `price`, `description`, `image`, `status`, `updated_at`) VALUES
(1, 1, '9折', 'YV8Z3BCC', '10:00 AM, 3:00 PM', 0, '0,0', '手工食品， 雪花酥， 蛋糕', 'assets/img/product/27714_1.jpg', 1, '2022-12-10 11:13:43'),
(2, 2, '9折', 'ZXX7J1UL', '10:00 AM, 3:00 PM', 0, '0,0', '泰國菜', 'assets/img/product/73141_2.jpg', 1, '2022-12-10 11:13:48'),
(3, 3, '9折', 'N3OJGOZ7', '10:00 AM, 3:00 PM', 0, '0,0', '日式火鍋', 'assets/img/product/34430_3.jpg', 1, '2022-12-10 11:13:50'),
(4, 4, '9折', 'P0SU6U35', '10:00 AM, 3:00 PM', 0, '0,0', '紅，白，酒', 'assets/img/product/98266_4.jpg', 1, '2022-12-10 11:13:52'),
(5, 5, '9折', '9BXGXXFE', '10:00 AM, 3:00 PM', 0, '0,0', '燒味店+餐廳', 'assets/img/product/8815_5.JPG', 1, '2022-12-10 11:13:54'),
(6, 6, '9折', 'NLP7MVAR', '10:00 AM, 3:00 PM', 0, '0,0', '寵物cafe', 'assets/img/product/42880_6.jpg', 1, '2022-12-10 11:13:58'),
(7, 7, '9折', 'BA7GZ96T', '10:00 AM, 3:00 PM', 0, '', '日本低溫保鮮高質水果', 'assets/img/product/41464_7.jpg', 1, '2022-11-12 10:17:48'),
(8, 8, '8折', '6BNIVEB5', '10:00 AM, 3:00 PM', 0, '', ' ', 'assets/img/product/83889_8.jpg', 1, '2022-11-12 10:17:51'),
(9, 9, '  ', 'TZWZR1AB', '10:00 AM, 3:00 PM', 0, '', '兩位消費滿$800送湯底(此優惠只\r\n限星期日至三)\r\n', 'assets/img/product/5545_9.jpg', 1, '2022-11-12 10:17:55'),
(10, 10, '8折', 'FY7SK5NB', '10:00 AM, 3:00 PM', 0, '', '所有套餐', 'assets/img/product/92162_10.jpg', 1, '2022-11-12 10:17:59'),
(11, 11, '全單九折 送小食現炸酥肉一客', 'XDD3K94O', '10:00 AM, 3:00 PM', 0, '', '川式火鍋店', 'assets/img/product/23421_11.jpg', 1, '2022-11-12 10:18:02');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand` varchar(150) NOT NULL,
  `number` varchar(150) NOT NULL,
  `address` varchar(500) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `brand`, `number`, `address`, `image`, `status`, `updated_at`) VALUES
(1, 'Wendy Sze', '甜施施', '5136 3672', '香港島中西區', 'assets/img/restaurant/86118_transparent.png', 1, '2022-11-12 08:05:50'),
(2, '江振偉', '泰出色泰國餐廳', '2571 2287', '油尖旺區', 'assets/img/restaurant/86118_transparent.png', 1, '2022-11-12 08:05:50'),
(3, 'Fanny Lo', '酒鍋 ( 銅鑼灣 ) ', '2838 8000', '灣仔區', 'assets/img/restaurant/86118_transparent.png', 1, '2022-11-12 08:05:50'),
(4, 'Fanny Lo', 'E1 Cerdo', '2838 8000', '荃灣區', 'assets/img/restaurant/86118_transparent.png', 1, '2022-11-12 08:05:50'),
(5, 'Fanny Lo', '明昇行酒業', '2838 8000', '香港島東區', 'assets/img/restaurant/86118_transparent.png', 1, '2022-11-12 08:05:50'),
(6, 'Chan Yuk<br/> Bowie', '香港豆+柴咖啡廳', '5931 8931', '灣仔區', 'assets/img/restaurant/86118_transparent.png', 1, '2022-11-12 08:11:25'),
(7, 'Felix Lau', '薈萃果品有限公司', '9239 8757', '觀塘區', 'assets/img/restaurant/86118_transparent.png', 1, '2022-11-12 08:05:50'),
(8, '鄭生', '樂 Teppanyaki', '', '沙田區', 'assets/img/restaurant/86118_transparent.png', 1, '2022-11-12 08:05:50'),
(9, 'Victor', '酒鍋 ', '9081 4907', '油尖旺區', 'assets/img/restaurant/86118_transparent.png', 1, '2022-11-12 08:05:50'),
(10, '鄭生', '鐵板燒', '6339 0012', '油尖旺區', 'assets/img/restaurant/86118_transparent.png', 1, '2022-11-12 08:05:50'),
(11, '鄭生', '碼頭故事', '6339 0012', '油尖旺區', 'assets/img/restaurant/86118_transparent.png', 1, '2022-11-12 08:05:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_report`
--
ALTER TABLE `daily_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_report`
--
ALTER TABLE `monthly_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `daily_report`
--
ALTER TABLE `daily_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `monthly_report`
--
ALTER TABLE `monthly_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
