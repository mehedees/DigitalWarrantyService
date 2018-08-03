-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2018 at 12:50 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalwarrantyservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `customer_phone` varchar(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `replace_date` date DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `uid`, `product_name`, `customer_phone`, `purchase_date`, `expiry_date`, `replace_date`, `status`) VALUES
(1, 'b123', 'Product1', '01711222333', '2018-08-04', '2019-08-04', NULL, 'start warranty'),
(2, 'b123', 'Product1', '01711222333', '2018-08-04', '2019-08-04', '2018-08-01', 'replaced'),
(3, 'b123', 'Product1', '01711222333', '2018-08-04', '2019-08-04', '2018-08-01', 'replaced'),
(4, 'c567', 'Product5', '01711222333', '2018-08-02', '2019-11-02', NULL, 'start warranty'),
(5, 'b126', 'Product2', '01711222333', '2016-04-05', '2017-10-05', NULL, 'start warranty');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mehedees@live.com', '$2y$10$CS6o15kdrlejHoOfpts0FutSmpIco1OD1HwBq6eSCdgO0m5ZRASMu', '2018-08-01 22:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `validity` float NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `product_name`, `validity`, `product_type`, `created_at`, `updated_at`) VALUES
(6, 'Product1', 12, 'Type1', '2018-07-31 07:45:31', NULL),
(7, 'Product2', 18, 'Type2', '2018-07-31 07:45:31', NULL),
(8, 'Product3', 36, 'Type3', '2018-07-31 07:45:31', NULL),
(9, 'Product4', 24, 'Type2', '2018-07-31 07:45:31', NULL),
(10, 'Product5', 15, 'Type4', '2018-07-31 07:45:31', NULL),
(11, 'Product10', 24, 'Type4', '2018-07-31 10:11:50', NULL),
(12, 'ihkjbjk', 12, 'kjhkjhjk', '2018-08-01 18:50:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registered_shops`
--

CREATE TABLE `registered_shops` (
  `id` int(11) NOT NULL,
  `shop_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_shops`
--

INSERT INTO `registered_shops` (`id`, `shop_name`) VALUES
(1, 'testShop'),
(2, 'testShop2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `shopName`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'testShop', 'mehedees@live.com', '$2y$10$V1gIQt0/b2O8EAupZGdWKeGhpAVtckn7S2RzSsF/tNwCn.26jZyRW', 'CUrc3D6KeTmyfInNCKnsKUPOAaEED5wYNW3iAnrEVeamElYOOU70YPwXA1Wd', '2018-07-30 14:12:14', '2018-07-30 14:12:14'),
(2, 'shop1', 'testShop', 'a@b.c', '$2y$10$mVyMn3m/9YaCAMxESycIdOxeGKn7xIkz8kftXB2AEmy3Alz67mC8m', 'uOFrBchRpfUifWzRhGbA50rbPwLdjO6TRUz1sz9FTJP7Pb48L4BWjqRTYYcG', '2018-08-01 20:51:47', '2018-08-01 20:51:47'),
(3, 'shop2', 'testShop2', 'b@c.d', '$2y$10$tgbYGi0lZlnE1j/lI6EOUuU5lZVfUpWG.HUMXlOuM8zhhdDyhrKyS', 'JLRW6L4HKy6kZp3h0vxvelDmuKyI5BzF4qRiw2psTyQL7X5JHEYwA7FXYQef', '2018-08-01 20:57:30', '2018-08-01 20:57:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_phone` (`customer_phone`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `registered_shops`
--
ALTER TABLE `registered_shops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_name` (`shop_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `registered_shops`
--
ALTER TABLE `registered_shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
