-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 07, 2025 at 07:47 AM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Food & Ingredients', '2025-06-28 01:25:33', '2025-06-28 01:25:33'),
(2, 'Kitchen Supplies', '2025-06-28 01:25:40', '2025-06-28 01:25:40'),
(3, 'Utilities', '2025-06-28 01:25:47', '2025-06-28 01:25:47'),
(4, 'Staff Salary', '2025-06-28 01:25:54', '2025-06-28 01:25:54'),
(5, 'Maintenance', '2025-06-28 01:25:59', '2025-06-28 01:25:59'),
(6, 'Marketing', '2025-06-28 01:26:11', '2025-06-28 01:26:11'),
(7, 'Rent & Licensing', '2025-06-28 01:26:17', '2025-06-28 01:26:17'),
(8, 'Transportation', '2025-06-28 01:26:21', '2025-06-28 01:26:21'),
(9, 'Miscellaneous', '2025-06-28 01:26:25', '2025-06-28 01:26:25'),
(10, 'POS & Software', '2025-06-28 01:26:34', '2025-06-28 01:26:34'),
(11, 'others', '2025-06-28 01:39:29', '2025-06-28 01:39:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
