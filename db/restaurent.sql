-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 12, 2022 at 06:03 AM
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
(82, '2022-11-11', 1, '2022-11-12 05:34:14');

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
(4, '2022-10', 1, '2022-11-01 16:57:57');

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
(5, 'Test test', 'KFC', 'Chicken fry', '4I37QICA', '2022-08-27', ' 3:00 PM', '7', '2312367890', 'monoget2@gmail.com', 8.55, 'Test', 'Test', 0, '0000-00-00 00:00:00', '2022-08-26 11:07:52');

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
  `price` varchar(100) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `restaurant_id`, `p_name`, `code`, `time`, `price`, `description`, `image`, `status`, `updated_at`) VALUES
(1, 3, 'Chicken fry', '0NVFI9ES', '10:00 AM, 3:00 PM', '7.99, 8.55', 'Yummy!', 'assets/img/product/21505_Crispy-Fried-Chicken_EXPS_TOHJJ22_6445_DR-_02_03_11b-9.jpg', 1, '2022-08-11 09:54:50'),
(2, 2, 'Pasta', 'BLU6TF4B', '10:00 AM, 3:00 PM', '7.99,79', 'Pasta with tomato sauce', '', 1, '2022-08-16 08:16:59'),
(3, 7, 'test 16aug', 'XG8YIPCQ', '10:00 AM, 3:00 PM', '7.99, 8.55', 'Test', 'assets/img/product/14069_A64A05C4-67B3-4CDB-8AC3-E0C54C3FCC45.jpeg', 1, '2022-08-16 09:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `image`, `status`, `updated_at`) VALUES
(1, 'MC Donald\'s ', 'assets/img/restaurant/65130_1.png', 1, '2022-08-11 09:49:50'),
(2, 'Pizza Hut', 'assets/img/restaurant/42185_2.png', 1, '2022-08-11 09:50:19'),
(3, 'KFC', 'assets/img/restaurant/22909_3.png', 1, '2022-08-11 09:51:05'),
(4, 'Domino\'s', 'assets/img/restaurant/73213_4.png', 1, '2022-08-11 09:51:27'),
(5, 'BurgerKing', 'assets/img/restaurant/44945_5.png', 1, '2022-08-11 09:51:49'),
(6, 'FoodCircles', 'assets/img/restaurant/90521_6.png', 1, '2022-08-25 09:46:04'),
(7, 'Chipotle', 'assets/img/restaurant/43820_78564B23-87B4-4B79-A70A-EE74B08E360C.jpeg', 1, '2022-08-16 09:05:34');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `monthly_report`
--
ALTER TABLE `monthly_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
