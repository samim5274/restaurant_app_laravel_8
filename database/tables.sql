-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 24, 2025 at 01:11 PM
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
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tName` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `tName`, `status`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'N3C', 1, 'N/A', '2025-06-13 03:05:52', '2025-06-23 07:13:50'),
(3, 'N3B', 3, 'N/A', '2025-06-13 03:06:18', '2025-06-24 01:43:21'),
(4, 'N3A', 1, 'N/A', '2025-06-13 03:06:31', '2025-06-22 23:54:21'),
(5, 'N3D', 1, 'N/A', '2025-06-13 03:12:37', '2025-06-23 22:21:55'),
(7, 'S2A', 1, 'N/A', '2025-06-13 03:30:13', '2025-06-23 22:29:33'),
(8, 'S2B', 3, 'N/A', '2025-06-13 03:30:23', '2025-06-24 04:44:30'),
(9, 'S2C', 2, 'N/A', '2025-06-13 03:30:32', '2025-06-18 03:58:18'),
(10, 'S2D', 3, 'N/A', '2025-06-13 03:45:09', '2025-06-23 22:32:15'),
(11, 'N2A', 1, 'N/A', '2025-06-14 03:32:15', '2025-06-23 07:13:40'),
(12, 'N2B', 1, 'N/A', '2025-06-14 03:32:22', '2025-06-22 23:48:53'),
(13, 'N2C', 1, 'N/A', '2025-06-14 03:32:29', '2025-06-22 23:49:00'),
(14, 'N2D', 1, 'N/A', '2025-06-14 03:32:35', '2025-06-23 22:34:27'),
(15, 'S3A', 1, 'N/A', '2025-06-18 04:16:07', '2025-06-22 23:49:07'),
(16, 'S3B', 1, 'N/A', '2025-06-18 04:16:17', '2025-06-22 23:49:11'),
(17, 'S3C', 1, 'N/A', '2025-06-18 04:16:25', '2025-06-22 23:49:14'),
(18, 'S3D', 1, 'N/A', '2025-06-18 04:16:33', '2025-06-18 04:16:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tables_tname_unique` (`tName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
