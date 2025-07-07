-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 07, 2025 at 07:48 AM
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
-- Database: `rmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `reg` bigint(20) UNSIGNED NOT NULL,
  `tableId` bigint(20) UNSIGNED NOT NULL,
  `total` int(10) UNSIGNED DEFAULT NULL,
  `discount` int(10) UNSIGNED DEFAULT NULL,
  `payable` int(10) UNSIGNED DEFAULT NULL,
  `pay` int(10) UNSIGNED DEFAULT NULL,
  `due` int(10) UNSIGNED DEFAULT NULL,
  `kitchen` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `reg`, `tableId`, `total`, `discount`, `payable`, `pay`, `due`, `kitchen`, `status`, `created_at`, `updated_at`) VALUES
(95, '2025-07-03', 2025070311, 4, 2660, 0, 2660, 2660, 0, 4, 2, '2025-07-03 01:05:45', '2025-07-03 01:06:23'),
(96, '2025-07-03', 2025070312, 11, 6480, 80, 6400, 6400, 0, 4, 2, '2025-07-03 01:07:26', '2025-07-03 01:08:08'),
(97, '2025-07-03', 2025070313, 9, 2480, 0, 2480, 2480, 0, 4, 2, '2025-07-03 02:59:58', '2025-07-03 03:21:56'),
(98, '2025-07-03', 2025070314, 8, 730, 0, 730, 730, 0, 4, 2, '2025-07-03 03:04:31', '2025-07-03 03:21:53'),
(99, '2025-07-03', 2025070315, 4, 180, 0, 180, 180, 0, 4, 2, '2025-07-03 03:08:04', '2025-07-03 05:00:56'),
(100, '2025-07-03', 2025070316, 9, 550, 0, 550, 550, 0, 4, 2, '2025-07-03 03:08:10', '2025-07-03 05:00:44'),
(101, '2025-07-03', 2025070317, 10, 180, 0, 180, 180, 0, 4, 2, '2025-07-03 03:08:15', '2025-07-03 04:14:01'),
(102, '2025-07-04', 2025070418, 10, 910, 0, 910, 910, 0, 4, 2, '2025-07-04 02:17:19', '2025-07-04 02:17:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_reg_unique` (`reg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
