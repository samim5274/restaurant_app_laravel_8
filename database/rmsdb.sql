-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2025 at 03:18 PM
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `photo`, `phone`, `address`, `dob`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SAMIM-HosseN', 'samim@gmail.com', '$2y$10$wKC61DMpRiv/YPTV9QPcPeaeYbYU899vQ62kYOzGELXGQ8PDBTGTa', NULL, NULL, 'Dhaka', NULL, 1, 1, NULL, NULL),
(2, 'Shamim', 'asdf@asdf.asdf', '$2y$10$XErGlTHRXT5vM7iN9MyN5ODxxWuvO2pAzm5Tp9XZrN4/Z1/W4rTb6', NULL, '123456789', 'Dhaka', '2025-05-29', 3, 0, '2025-06-29 07:16:49', '2025-06-29 07:16:49'),
(3, 'Akbor', 'akbor@gmail.com', '$2y$10$kBKACZq6vFof1kQqQeaE3uOV4uiyCN4kTtKYf9TDmyZbRHP8Jgx1O', NULL, '123123123', 'Dhaka', '2025-06-02', 2, 0, '2025-06-29 07:18:06', '2025-06-29 07:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reg` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `userId` int(11) NOT NULL,
  `foodId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `reg`, `date`, `userId`, `foodId`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(10, 2025062511, '2025-06-25', 1, 13, 1, 180, '2025-06-25 06:15:04', '2025-06-25 06:15:04'),
(11, 2025062511, '2025-06-25', 1, 12, 1, 320, '2025-06-25 06:15:05', '2025-06-25 06:15:05'),
(12, 2025062511, '2025-06-25', 1, 11, 1, 230, '2025-06-25 06:15:06', '2025-06-25 06:15:06'),
(13, 2025062512, '2025-06-25', 1, 8, 1, 450, '2025-06-25 06:15:39', '2025-06-25 06:15:39'),
(14, 2025062512, '2025-06-25', 1, 6, 1, 450, '2025-06-25 06:15:40', '2025-06-25 06:15:40'),
(17, 2025062513, '2025-06-25', 1, 11, 1, 230, '2025-06-25 06:18:18', '2025-06-25 06:18:18'),
(18, 2025062513, '2025-06-25', 1, 6, 1, 450, '2025-06-25 06:18:19', '2025-06-25 06:18:19'),
(19, 2025062514, '2025-06-25', 1, 8, 2, 450, '2025-06-25 06:19:48', '2025-06-25 06:19:58'),
(20, 2025062514, '2025-06-25', 1, 6, 2, 450, '2025-06-25 06:19:49', '2025-06-25 06:19:57'),
(21, 2025062514, '2025-06-25', 1, 7, 2, 850, '2025-06-25 06:19:49', '2025-06-25 06:19:59'),
(22, 2025062514, '2025-06-25', 1, 9, 1, 180, '2025-06-25 06:20:02', '2025-06-25 06:20:02'),
(23, 2025062515, '2025-06-25', 1, 6, 5, 450, '2025-06-25 06:31:15', '2025-06-25 06:31:17'),
(24, 2025062516, '2025-06-25', 1, 7, 2, 850, '2025-06-25 06:37:30', '2025-06-25 06:37:39'),
(25, 2025062516, '2025-06-25', 1, 8, 2, 450, '2025-06-25 06:37:33', '2025-06-25 06:37:40'),
(26, 2025062617, '2025-06-26', 1, 6, 1, 450, '2025-06-25 22:37:13', '2025-06-25 22:37:13'),
(27, 2025062617, '2025-06-26', 1, 12, 1, 320, '2025-06-25 22:37:22', '2025-06-25 22:37:22'),
(28, 2025062617, '2025-06-26', 1, 9, 1, 180, '2025-06-25 22:37:28', '2025-06-25 22:37:28'),
(29, 2025062618, '2025-06-26', 1, 8, 1, 450, '2025-06-25 22:40:41', '2025-06-25 22:40:41'),
(30, 2025062618, '2025-06-26', 1, 6, 2, 450, '2025-06-25 22:40:43', '2025-06-25 23:16:29'),
(31, 2025062618, '2025-06-26', 1, 12, 2, 320, '2025-06-25 22:40:45', '2025-06-25 23:16:31'),
(32, 2025062619, '2025-06-26', 1, 9, 1, 180, '2025-06-25 22:54:28', '2025-06-25 22:54:28'),
(33, 20250626110, '2025-06-26', 1, 9, 1, 180, '2025-06-26 01:56:06', '2025-06-26 01:56:06'),
(34, 20250626111, '2025-06-26', 1, 9, 1, 180, '2025-06-26 02:25:53', '2025-06-26 02:25:53'),
(35, 20250626112, '2025-06-26', 1, 7, 1, 850, '2025-06-26 02:25:57', '2025-06-26 02:25:57'),
(36, 20250626113, '2025-06-26', 1, 12, 1, 320, '2025-06-26 02:26:11', '2025-06-26 02:26:11'),
(37, 20250626114, '2025-06-26', 1, 8, 1, 450, '2025-06-26 02:26:55', '2025-06-26 02:26:55'),
(38, 20250626115, '2025-06-26', 1, 9, 1, 180, '2025-06-26 02:37:20', '2025-06-26 02:37:20'),
(39, 20250626115, '2025-06-26', 1, 8, 1, 450, '2025-06-26 02:37:21', '2025-06-26 02:37:21'),
(40, 20250626116, '2025-06-26', 1, 8, 1, 450, '2025-06-26 04:09:59', '2025-06-26 04:09:59'),
(41, 20250626117, '2025-06-26', 1, 8, 1, 450, '2025-06-26 04:10:04', '2025-06-26 04:10:04'),
(42, 20250626118, '2025-06-26', 1, 12, 1, 320, '2025-06-26 04:10:08', '2025-06-26 04:10:08'),
(43, 20250626119, '2025-06-26', 1, 8, 1, 450, '2025-06-26 04:15:40', '2025-06-26 04:15:40'),
(44, 20250626119, '2025-06-26', 1, 9, 1, 180, '2025-06-26 04:15:41', '2025-06-26 04:15:41'),
(45, 20250626119, '2025-06-26', 1, 6, 1, 450, '2025-06-26 04:15:42', '2025-06-26 04:15:42'),
(46, 20250626120, '2025-06-26', 1, 13, 1, 180, '2025-06-26 04:15:48', '2025-06-26 04:15:48'),
(47, 20250626121, '2025-06-26', 1, 12, 1, 320, '2025-06-26 04:15:52', '2025-06-26 04:15:52'),
(48, 20250626121, '2025-06-26', 1, 7, 1, 850, '2025-06-26 04:15:54', '2025-06-26 04:15:54'),
(49, 20250626121, '2025-06-26', 1, 9, 1, 180, '2025-06-26 04:15:56', '2025-06-26 04:28:07'),
(50, 20250626121, '2025-06-26', 1, 8, 1, 450, '2025-06-26 04:15:56', '2025-06-26 04:15:56'),
(51, 20250626122, '2025-06-26', 1, 12, 1, 320, '2025-06-26 04:43:37', '2025-06-26 04:43:37'),
(52, 20250626122, '2025-06-26', 1, 8, 1, 450, '2025-06-26 04:43:42', '2025-06-26 04:43:42'),
(54, 20250626123, '2025-06-26', 1, 9, 1, 180, '2025-06-26 05:12:23', '2025-06-26 05:12:23'),
(55, 20250626123, '2025-06-26', 1, 13, 1, 180, '2025-06-26 05:12:25', '2025-06-26 05:12:25'),
(56, 20250628124, '2025-06-28', 1, 9, 1, 180, '2025-06-27 22:14:04', '2025-06-27 22:14:04'),
(57, 20250628124, '2025-06-28', 1, 12, 1, 320, '2025-06-27 22:15:11', '2025-06-27 22:15:11'),
(58, 20250628124, '2025-06-28', 1, 11, 1, 230, '2025-06-27 22:15:20', '2025-06-27 22:15:20'),
(59, 20250628124, '2025-06-28', 1, 7, 1, 850, '2025-06-27 22:15:43', '2025-06-27 22:15:43'),
(60, 20250628125, '2025-06-28', 1, 11, 1, 230, '2025-06-27 22:16:01', '2025-06-27 22:16:01'),
(61, 20250628125, '2025-06-28', 1, 9, 1, 180, '2025-06-27 22:16:06', '2025-06-27 22:16:06'),
(62, 20250628126, '2025-06-28', 1, 11, 1, 230, '2025-06-27 22:18:28', '2025-06-27 22:18:28'),
(63, 20250628126, '2025-06-28', 1, 6, 1, 450, '2025-06-27 22:18:29', '2025-06-27 22:18:29'),
(64, 20250628127, '2025-06-28', 1, 8, 1, 450, '2025-06-27 22:21:14', '2025-06-27 22:21:14'),
(65, 20250628128, '2025-06-28', 1, 9, 3, 180, '2025-06-27 22:34:37', '2025-06-27 22:34:50'),
(66, 20250628128, '2025-06-28', 1, 8, 3, 450, '2025-06-27 22:34:37', '2025-06-27 22:34:48'),
(67, 20250628128, '2025-06-28', 1, 7, 3, 850, '2025-06-27 22:34:38', '2025-06-27 22:34:47'),
(68, 20250628128, '2025-06-28', 1, 6, 3, 450, '2025-06-27 22:34:39', '2025-06-27 22:34:51'),
(69, 20250628129, '2025-06-28', 1, 6, 1, 450, '2025-06-27 23:34:29', '2025-06-27 23:34:29'),
(70, 20250628130, '2025-06-28', 1, 7, 1, 850, '2025-06-27 23:34:32', '2025-06-27 23:34:32'),
(71, 20250628131, '2025-06-28', 1, 8, 1, 450, '2025-06-27 23:34:36', '2025-06-27 23:34:36'),
(72, 20250628132, '2025-06-28', 1, 9, 1, 180, '2025-06-27 23:34:40', '2025-06-27 23:34:40'),
(73, 20250628133, '2025-06-28', 1, 6, 1, 450, '2025-06-27 23:42:41', '2025-06-27 23:42:41'),
(74, 20250628133, '2025-06-28', 1, 7, 1, 850, '2025-06-27 23:42:42', '2025-06-27 23:42:42'),
(75, 20250628133, '2025-06-28', 1, 8, 1, 450, '2025-06-27 23:42:43', '2025-06-27 23:42:43'),
(76, 20250628133, '2025-06-28', 1, 9, 1, 180, '2025-06-27 23:42:43', '2025-06-27 23:42:43'),
(77, 20250628133, '2025-06-28', 1, 11, 1, 230, '2025-06-27 23:42:45', '2025-06-27 23:42:45'),
(78, 20250628133, '2025-06-28', 1, 12, 1, 320, '2025-06-27 23:42:48', '2025-06-27 23:42:48'),
(79, 20250628133, '2025-06-28', 1, 13, 1, 180, '2025-06-27 23:42:49', '2025-06-27 23:42:49'),
(80, 20250628134, '2025-06-28', 1, 7, 1, 850, '2025-06-27 23:46:21', '2025-06-27 23:46:21'),
(81, 20250628134, '2025-06-28', 1, 9, 1, 180, '2025-06-27 23:46:33', '2025-06-27 23:46:33'),
(82, 20250628134, '2025-06-28', 1, 8, 1, 450, '2025-06-27 23:46:35', '2025-06-27 23:46:35'),
(83, 20250628134, '2025-06-28', 1, 13, 1, 180, '2025-06-27 23:46:36', '2025-06-27 23:46:36'),
(84, 20250628134, '2025-06-28', 1, 11, 1, 230, '2025-06-27 23:46:37', '2025-06-27 23:46:37'),
(85, 20250628135, '2025-06-28', 1, 6, 1, 450, '2025-06-27 23:53:28', '2025-06-27 23:53:28'),
(86, 20250628135, '2025-06-28', 1, 7, 1, 850, '2025-06-27 23:53:29', '2025-06-27 23:53:29'),
(87, 20250628135, '2025-06-28', 1, 8, 1, 450, '2025-06-27 23:53:29', '2025-06-27 23:53:29'),
(88, 20250628135, '2025-06-28', 1, 9, 1, 180, '2025-06-27 23:53:30', '2025-06-27 23:53:30'),
(89, 20250628135, '2025-06-28', 1, 11, 1, 230, '2025-06-27 23:53:33', '2025-06-27 23:53:33'),
(90, 20250628135, '2025-06-28', 1, 12, 1, 320, '2025-06-27 23:53:35', '2025-06-27 23:53:35'),
(91, 20250628135, '2025-06-28', 1, 13, 1, 180, '2025-06-27 23:53:36', '2025-06-27 23:53:36'),
(93, 20250629136, '2025-06-29', 1, 12, 1, 320, '2025-06-28 22:22:36', '2025-06-28 22:22:36'),
(94, 20250629136, '2025-06-29', 1, 8, 1, 450, '2025-06-28 22:22:37', '2025-06-28 22:22:37'),
(95, 20250629137, '2025-06-29', 1, 9, 3, 180, '2025-06-29 02:39:45', '2025-06-29 02:39:52'),
(96, 20250629137, '2025-06-29', 1, 13, 3, 180, '2025-06-29 02:39:46', '2025-06-29 02:39:51'),
(97, 20250629137, '2025-06-29', 1, 11, 3, 230, '2025-06-29 02:39:47', '2025-06-29 02:39:49'),
(98, 20250629138, '2025-06-29', 1, 13, 2, 180, '2025-06-29 02:39:56', '2025-06-29 02:40:03'),
(99, 20250629138, '2025-06-29', 1, 7, 2, 850, '2025-06-29 02:39:57', '2025-06-29 02:40:02'),
(100, 20250629138, '2025-06-29', 1, 9, 2, 180, '2025-06-29 02:39:58', '2025-06-29 02:40:01'),
(101, 20250629139, '2025-06-29', 1, 9, 1, 180, '2025-06-29 02:41:28', '2025-06-29 02:41:28'),
(102, 20250629139, '2025-06-29', 1, 6, 1, 450, '2025-06-29 02:41:29', '2025-06-29 02:41:29'),
(103, 20250629140, '2025-06-29', 1, 9, 1, 180, '2025-06-29 03:31:20', '2025-06-29 03:31:20');

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

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catId` bigint(20) UNSIGNED NOT NULL,
  `subcatId` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `remark` text NOT NULL DEFAULT 'N/A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `catId`, `subcatId`, `userId`, `date`, `amount`, `remark`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2025-06-28', 1500, 'N/A', '2025-06-28 04:17:30', '2025-06-28 04:17:30'),
(2, 1, 2, 1, '2025-06-28', 2500, 'N/A', '2025-06-28 04:17:36', '2025-06-28 04:17:36'),
(3, 1, 3, 1, '2025-06-28', 1200, 'N/A', '2025-06-28 04:17:44', '2025-06-28 04:17:44'),
(4, 5, 28, 1, '2025-06-28', 500, 'N/A', '2025-06-28 04:17:53', '2025-06-28 04:17:53'),
(5, 8, 41, 1, '2025-06-28', 50, 'N/A', '2025-06-28 04:32:52', '2025-06-28 04:32:52'),
(6, 6, 36, 1, '2025-06-28', 1200, 'N/A', '2025-06-28 04:42:55', '2025-06-28 04:42:55'),
(7, 5, 31, 1, '2025-06-28', 100, 'N/A', '2025-06-28 04:46:50', '2025-06-28 04:46:50'),
(8, 10, 50, 1, '2025-06-28', 5500, 'N/A', '2025-06-28 04:46:59', '2025-06-28 04:46:59'),
(9, 6, 33, 1, '2025-06-28', 550, 'N/A', '2025-06-28 04:47:11', '2025-06-28 04:47:11'),
(10, 9, 47, 1, '2025-06-28', 250, 'N/A', '2025-06-28 04:47:20', '2025-06-28 04:47:20'),
(11, 9, 45, 1, '2025-06-28', 150, 'N/A', '2025-06-28 04:47:29', '2025-06-28 04:47:29'),
(12, 2, 15, 1, '2025-06-28', 230, 'N/A', '2025-06-28 04:49:05', '2025-06-28 04:49:05'),
(13, 1, 6, 1, '2025-06-28', 190, 'N/A', '2025-06-28 05:39:58', '2025-06-28 05:39:58'),
(14, 8, 43, 1, '2025-06-29', 500, 'N/A', '2025-06-28 22:23:48', '2025-06-28 22:23:48'),
(15, 1, 9, 1, '2025-06-29', 450, 'N/A', '2025-06-28 22:24:34', '2025-06-28 22:24:34'),
(16, 2, 13, 1, '2025-06-29', 250, 'N/A', '2025-06-28 23:05:15', '2025-06-28 23:05:15'),
(17, 1, 9, 1, '2025-06-29', 650, 'N/A', '2025-06-28 23:12:07', '2025-06-28 23:12:07'),
(18, 1, 3, 1, '2025-06-29', 1800, 'N/A', '2025-06-29 00:39:08', '2025-06-29 00:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `ingredients` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `price`, `category`, `stock`, `status`, `image`, `ingredients`, `remark`, `created_at`, `updated_at`) VALUES
(6, 'Butter Chicken', 450, 'main', 32, 1, 'food-1749884892.jpg', 'Chicken, butter, tomato, cream, spices.', 'Tender chicken cooked in a creamy tomato-based sauce.', '2025-06-13 17:30:24', '2025-06-29 02:41:29'),
(7, 'Paneer Tikka Masala', 850, 'main', 60, 1, 'food-1749879095.jpg', 'Paneer, yogurt, tomato puree, onion, masala.', 'Grilled paneer cubes in a spicy tikka masala sauce.', '2025-06-13 17:31:35', '2025-06-29 02:40:02'),
(8, 'Grilled Salmon', 450, 'main', 11, 1, 'food-1749879251.jpg', 'Salmon, garlic, lemon, herbs, olive oil.', 'Fresh salmon grilled with herbs and lemon.', '2025-06-13 17:34:11', '2025-06-28 22:22:37'),
(9, 'Chicken Wings', 180, 'starter', 78, 1, 'food-1749880468.jpg', 'Chicken wings, flour, chili powder, garlic, butter, vinegar.', 'Spicy and crispy deep-fried chicken wings served with hot sauce.', '2025-06-13 17:54:28', '2025-06-29 03:31:20'),
(11, 'Vegetable Spring Rolls', 230, 'starter', 90, 1, 'food-1749885187.jpg', 'Carrot, cabbage, onion, noodles, flour wrap, soy sauce.', 'Crispy rolls stuffed with vegetables and noodles.', '2025-06-13 19:13:07', '2025-06-29 02:39:49'),
(12, 'Nachos', 320, 'starter', 66, 1, 'food-1749896193.jpg', 'Corn tortilla chips, cheddar cheese, jalapeños, salsa, sour cream.', 'Crispy tortilla chips topped with melted cheese and toppings.', '2025-06-13 22:16:33', '2025-06-28 22:22:36'),
(13, 'Garlic Bread', 180, 'starter', 40, 1, 'food-1749896253.jpg', 'Baguette, butter, garlic, parsley, olive oil.', 'Toasted bread topped with garlic butter and herbs.', '2025-06-13 22:17:33', '2025-06-29 02:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(38, '2014_10_12_000000_create_users_table', 1),
(39, '2014_10_12_100000_create_password_resets_table', 1),
(40, '2019_08_19_000000_create_failed_jobs_table', 1),
(41, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(42, '2025_06_13_084624_create_tables_table', 1),
(43, '2025_06_13_120026_create_food_table', 1),
(44, '2025_06_14_115756_create_admins_table', 1),
(45, '2025_06_14_122619_create_orders_table', 1),
(46, '2025_06_15_044735_create_carts_table', 1),
(48, '2025_06_28_064147_create_categories_table', 2),
(53, '2025_06_28_065714_create_subcategories_table', 3),
(54, '2025_06_28_070038_create_expenses_table', 3);

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
(4, '2025-06-25', 2025062511, 4, 730, 30, 700, 700, 0, 4, 2, '2025-06-25 06:15:09', '2025-06-25 22:37:04'),
(5, '2025-06-25', 2025062512, 7, 900, 0, 900, 900, 0, 4, 2, '2025-06-25 06:15:43', '2025-06-25 22:36:12'),
(7, '2025-06-25', 2025062513, 4, 680, 0, 680, 680, 0, 4, 2, '2025-06-25 06:18:22', '2025-06-25 22:36:55'),
(8, '2025-06-25', 2025062514, 7, 3680, 80, 3600, 3600, 0, 4, 2, '2025-06-25 06:19:52', '2025-06-25 22:36:22'),
(9, '2025-06-25', 2025062515, 7, 2250, 0, 2250, 2250, 0, 4, 2, '2025-06-25 06:31:19', '2025-06-25 22:36:46'),
(10, '2025-06-25', 2025062516, 15, 2600, 0, 2600, 2600, 0, 4, 2, '2025-06-25 06:37:43', '2025-06-25 22:36:33'),
(11, '2025-06-26', 2025062617, 4, 950, 0, 950, 950, 0, 4, 2, '2025-06-25 22:37:31', '2025-06-26 00:43:42'),
(12, '2025-06-26', 2025062618, 11, 1990, 0, 1990, 1990, 0, 4, 2, '2025-06-25 22:40:50', '2025-06-26 00:43:10'),
(13, '2025-06-26', 2025062619, 5, 180, 0, 180, 180, 0, 4, 2, '2025-06-25 22:54:30', '2025-06-26 01:14:40'),
(14, '2025-06-26', 20250626110, 5, 180, 0, 180, 180, 0, 4, 2, '2025-06-26 01:56:09', '2025-06-26 04:11:58'),
(15, '2025-06-26', 20250626111, 4, 180, 0, 180, 180, 0, 4, 2, '2025-06-26 02:25:56', '2025-06-26 04:12:03'),
(16, '2025-06-26', 20250626112, 14, 850, 0, 850, 850, 0, 4, 2, '2025-06-26 02:26:09', '2025-06-26 04:12:11'),
(17, '2025-06-26', 20250626113, 13, 320, 0, 320, 320, 0, 4, 2, '2025-06-26 02:26:17', '2025-06-26 04:12:14'),
(18, '2025-06-26', 20250626114, 11, 450, 0, 450, 450, 0, 4, 2, '2025-06-26 02:27:00', '2025-06-26 04:12:07'),
(19, '2025-06-26', 20250626115, 4, 630, 0, 630, 630, 0, 4, 2, '2025-06-26 02:37:23', '2025-06-26 04:12:18'),
(20, '2025-06-26', 20250626116, 7, 450, 0, 450, 450, 0, 4, 2, '2025-06-26 04:10:02', '2025-06-26 04:15:16'),
(21, '2025-06-26', 20250626117, 5, 450, 0, 450, 450, 0, 4, 2, '2025-06-26 04:10:07', '2025-06-26 04:15:11'),
(22, '2025-06-26', 20250626118, 14, 320, 20, 300, 300, 0, 4, 2, '2025-06-26 04:10:12', '2025-06-26 04:15:02'),
(23, '2025-06-26', 20250626119, 5, 1080, 0, 1080, 1080, 0, 4, 2, '2025-06-26 04:15:44', '2025-06-26 04:54:01'),
(24, '2025-06-26', 20250626120, 7, 180, 0, 180, 180, 0, 4, 2, '2025-06-26 04:15:51', '2025-06-26 05:10:39'),
(25, '2025-06-26', 20250626121, 4, 1800, 0, 1800, 1800, 0, 4, 2, '2025-06-26 04:15:59', '2025-06-26 05:10:36'),
(26, '2025-06-26', 20250626122, 7, 770, 0, 770, 770, 0, 4, 2, '2025-06-26 04:53:23', '2025-06-26 05:10:31'),
(27, '2025-06-26', 20250626123, 4, 360, 10, 350, 350, 0, 4, 2, '2025-06-26 05:12:31', '2025-06-26 05:13:17'),
(28, '2025-06-28', 20250628124, 4, 1580, 0, 1580, 1580, 0, 4, 2, '2025-06-27 22:15:48', '2025-06-27 22:35:14'),
(29, '2025-06-28', 20250628125, 5, 410, 10, 400, 400, 0, 4, 2, '2025-06-27 22:16:57', '2025-06-27 23:43:37'),
(30, '2025-06-28', 20250628126, 10, 680, 0, 680, 680, 0, 4, 2, '2025-06-27 22:18:33', '2025-06-27 23:43:41'),
(31, '2025-06-28', 20250628127, 11, 450, 0, 450, 450, 0, 4, 2, '2025-06-27 22:21:17', '2025-06-27 23:43:33'),
(32, '2025-06-28', 20250628128, 3, 5790, 500, 5290, 5290, 0, 4, 2, '2025-06-27 22:34:42', '2025-06-27 23:43:45'),
(33, '2025-06-28', 20250628129, 4, 450, 0, 450, 450, 0, 4, 2, '2025-06-27 23:34:31', '2025-06-27 23:44:33'),
(34, '2025-06-28', 20250628130, 3, 850, 0, 850, 850, 0, 4, 2, '2025-06-27 23:34:35', '2025-06-27 23:44:29'),
(35, '2025-06-28', 20250628131, 7, 450, 0, 450, 450, 0, 4, 2, '2025-06-27 23:34:39', '2025-06-27 23:44:25'),
(36, '2025-06-28', 20250628132, 8, 180, 0, 180, 180, 0, 4, 2, '2025-06-27 23:34:42', '2025-06-27 23:44:21'),
(37, '2025-06-28', 20250628133, 5, 2660, 60, 2600, 2600, 0, 4, 2, '2025-06-27 23:42:51', '2025-06-27 23:44:17'),
(38, '2025-06-28', 20250628134, 7, 1890, 0, 1890, 1890, 0, 4, 2, '2025-06-27 23:46:24', '2025-06-28 00:03:11'),
(39, '2025-06-28', 20250628135, 5, 2660, 0, 2660, 2660, 0, 4, 2, '2025-06-27 23:53:46', '2025-06-28 00:03:05'),
(40, '2025-06-29', 20250629136, 4, 770, 70, 700, 700, 0, 4, 2, '2025-06-28 22:22:40', '2025-06-28 22:23:19'),
(41, '2025-06-29', 20250629137, 4, 1770, 0, 1770, 1700, 70, 4, 3, '2025-06-29 02:39:54', '2025-06-29 02:40:36'),
(42, '2025-06-29', 20250629138, 1, 2420, 0, 2420, 2400, 20, 4, 3, '2025-06-29 02:40:04', '2025-06-29 02:40:31'),
(43, '2025-06-29', 20250629139, 5, 630, 0, 630, 630, 0, 4, 2, '2025-06-29 02:41:31', '2025-06-29 03:31:08'),
(44, '2025-06-29', 20250629140, 3, 180, 0, 180, 180, 0, 4, 2, '2025-06-29 03:31:23', '2025-06-29 03:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catId` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `catId`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rice', '2025-06-28 04:02:41', '2025-06-28 04:02:41'),
(2, 1, 'Meat (Beef, Chicken, Mutton)', '2025-06-28 04:02:49', '2025-06-28 04:02:49'),
(3, 1, 'Fish', '2025-06-28 04:03:08', '2025-06-28 04:03:08'),
(4, 1, 'Vegetables', '2025-06-28 04:03:14', '2025-06-28 04:03:14'),
(5, 1, 'Spices', '2025-06-28 04:03:18', '2025-06-28 04:03:18'),
(6, 1, 'Oil', '2025-06-28 04:03:23', '2025-06-28 04:03:23'),
(7, 1, 'Salt/Sugar', '2025-06-28 04:03:28', '2025-06-28 04:03:28'),
(8, 1, 'Snacks/Ready Food', '2025-06-28 04:03:34', '2025-06-28 04:03:34'),
(9, 1, 'Fruits', '2025-06-28 04:03:39', '2025-06-28 04:03:39'),
(10, 1, 'Beverages (Tea, Coffee, Juice)', '2025-06-28 04:03:48', '2025-06-28 04:03:48'),
(11, 2, 'Cooking Gas', '2025-06-28 04:03:55', '2025-06-28 04:03:55'),
(12, 2, 'Utensils', '2025-06-28 04:04:02', '2025-06-28 04:04:02'),
(13, 2, 'Stove Maintenance', '2025-06-28 04:04:09', '2025-06-28 04:04:09'),
(14, 2, 'Cleaning Materials', '2025-06-28 04:04:15', '2025-06-28 04:04:15'),
(15, 2, 'Tissues/Napkins', '2025-06-28 04:04:20', '2025-06-28 04:04:20'),
(16, 2, 'Kitchen Tools (Knife, Spoon, etc.)', '2025-06-28 04:04:27', '2025-06-28 04:04:27'),
(17, 3, 'Electricity Bill', '2025-06-28 04:04:33', '2025-06-28 04:04:33'),
(18, 3, 'Gas Bill', '2025-06-28 04:04:39', '2025-06-28 04:04:39'),
(19, 3, 'Water Bill', '2025-06-28 04:04:43', '2025-06-28 04:04:43'),
(20, 3, 'Internet/WiFi', '2025-06-28 04:04:48', '2025-06-28 04:04:48'),
(21, 3, 'Generator Fuel', '2025-06-28 04:04:55', '2025-06-28 04:04:55'),
(22, 4, 'Chef Salary', '2025-06-28 04:05:02', '2025-06-28 04:05:02'),
(23, 4, 'Waiter Salary', '2025-06-28 04:05:09', '2025-06-28 04:05:09'),
(24, 4, 'Cleaner Salary', '2025-06-28 04:05:15', '2025-06-28 04:05:15'),
(25, 4, 'Manager Salary', '2025-06-28 04:05:23', '2025-06-28 04:05:23'),
(26, 4, 'Delivery Staff Salary', '2025-06-28 04:05:34', '2025-06-28 04:05:34'),
(27, 4, 'Overtime/Bonus', '2025-06-28 04:05:40', '2025-06-28 04:05:40'),
(28, 5, 'AC Repair', '2025-06-28 04:13:45', '2025-06-28 04:13:45'),
(29, 5, 'Plumbing', '2025-06-28 04:13:54', '2025-06-28 04:13:54'),
(30, 5, 'Electrical Work', '2025-06-28 04:14:09', '2025-06-28 04:14:09'),
(31, 5, 'Furniture Repair', '2025-06-28 04:14:17', '2025-06-28 04:14:17'),
(32, 5, 'Painting/Renovation', '2025-06-28 04:14:24', '2025-06-28 04:14:24'),
(33, 6, 'Facebook/Online Ads', '2025-06-28 04:14:33', '2025-06-28 04:14:33'),
(34, 6, 'Poster/Leaflet Printing', '2025-06-28 04:14:50', '2025-06-28 04:14:50'),
(35, 6, 'Offers/Discount Campaigns', '2025-06-28 04:14:57', '2025-06-28 04:14:57'),
(36, 6, 'Photography/Videography', '2025-06-28 04:15:04', '2025-06-28 04:15:04'),
(37, 7, 'Shop Rent', '2025-06-28 04:15:13', '2025-06-28 04:15:13'),
(38, 7, 'Trade License Renewal', '2025-06-28 04:15:18', '2025-06-28 04:15:18'),
(39, 7, 'Fire License', '2025-06-28 04:15:25', '2025-06-28 04:15:25'),
(40, 7, 'Food Safety License', '2025-06-28 04:15:33', '2025-06-28 04:15:33'),
(41, 8, 'Goods Transport', '2025-06-28 04:15:43', '2025-06-28 04:15:43'),
(42, 8, 'Staff Transport', '2025-06-28 04:15:49', '2025-06-28 04:15:49'),
(43, 8, 'Delivery Fuel Cost', '2025-06-28 04:15:55', '2025-06-28 04:15:55'),
(44, 9, 'Tips', '2025-06-28 04:16:00', '2025-06-28 04:16:00'),
(45, 9, 'Donation', '2025-06-28 04:16:05', '2025-06-28 04:16:05'),
(46, 9, 'Emergency Purchase', '2025-06-28 04:16:11', '2025-06-28 04:16:11'),
(47, 9, 'Mobile Recharge', '2025-06-28 04:16:18', '2025-06-28 04:16:18'),
(48, 9, 'Misc. Expenses', '2025-06-28 04:16:23', '2025-06-28 04:16:23'),
(49, 10, 'Software Subscription', '2025-06-28 04:16:30', '2025-06-28 04:16:30'),
(50, 10, 'Domain/Hosting', '2025-06-28 04:16:35', '2025-06-28 04:16:35'),
(51, 10, 'Printer Paper', '2025-06-28 04:16:42', '2025-06-28 04:16:42'),
(52, 10, 'Barcode Stickers', '2025-06-28 04:16:46', '2025-06-28 04:16:46'),
(53, 10, 'IT Support', '2025-06-28 04:16:51', '2025-06-28 04:16:51');

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
(1, 'N3C', 1, 'N/A', '2025-06-12 21:05:52', '2025-06-29 02:40:21'),
(3, 'N3B', 1, 'N/A', '2025-06-12 21:06:18', '2025-06-29 03:31:30'),
(4, 'N3A', 1, 'N/A', '2025-06-12 21:06:31', '2025-06-29 02:40:13'),
(5, 'N3D', 1, 'N/A', '2025-06-12 21:12:37', '2025-06-29 03:31:08'),
(7, 'S2A', 1, 'N/A', '2025-06-12 21:30:13', '2025-06-27 23:46:45'),
(8, 'S2B', 1, 'N/A', '2025-06-12 21:30:23', '2025-06-27 23:34:50'),
(9, 'S2C', 1, 'N/A', '2025-06-12 21:30:32', '2025-06-17 21:58:18'),
(10, 'S2D', 1, 'N/A', '2025-06-12 21:45:09', '2025-06-27 22:24:44'),
(11, 'N2A', 1, 'N/A', '2025-06-13 21:32:15', '2025-06-27 22:26:17'),
(12, 'N2B', 1, 'N/A', '2025-06-13 21:32:22', '2025-06-22 17:48:53'),
(13, 'N2C', 1, 'N/A', '2025-06-13 21:32:29', '2025-06-26 02:37:36'),
(14, 'N2D', 1, 'N/A', '2025-06-13 21:32:35', '2025-06-26 04:15:02'),
(15, 'S3A', 1, 'N/A', '2025-06-17 22:16:07', '2025-06-25 06:38:34'),
(16, 'S3B', 1, 'N/A', '2025-06-17 22:16:17', '2025-06-22 17:49:11'),
(17, 'S3C', 1, 'N/A', '2025-06-17 22:16:25', '2025-06-22 17:49:14'),
(18, 'S3D', 2, 'N/A', '2025-06-17 22:16:33', '2025-06-17 22:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_catid_foreign` (`catId`),
  ADD KEY `expenses_subcatid_foreign` (`subcatId`),
  ADD KEY `expenses_userid_foreign` (`userId`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_reg_unique` (`reg`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tables_tname_unique` (`tName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_catid_foreign` FOREIGN KEY (`catId`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `expenses_subcatid_foreign` FOREIGN KEY (`subcatId`) REFERENCES `subcategories` (`id`),
  ADD CONSTRAINT `expenses_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
