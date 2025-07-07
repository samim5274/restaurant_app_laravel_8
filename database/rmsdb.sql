-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 07, 2025 at 10:28 AM
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
  `facebook_id` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `github_id` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `facebook_id`, `google_id`, `github_id`, `password`, `photo`, `phone`, `address`, `dob`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Shamim Hossain', 'valobashi.tumake9999@gmail.com', NULL, '100218166019593847381', NULL, '$2y$10$Rt9POJI6/Ew57gdiXhTbmOO.YUFQhLTyjWUmtYpAOPblCYKYkleRe', 'user-1751876880.png', '1762164746', 'Dhaka', '2001-12-31', 1, 1, '2025-07-06 23:56:51', '2025-07-07 02:28:00'),
(3, 'Samim Hossain', 'noemail_686b7c617873b@facebook.com', '1736309200304280', NULL, NULL, '$2y$10$/Q1njnrWP31WsXO4oNcwSeGiKUrrDRFmQWHluuY7rw06jp23FqDxS', NULL, NULL, 'Not provided', NULL, 0, 1, '2025-07-07 01:50:57', '2025-07-07 01:50:57'),
(4, 'SAMIM HosseN', 'infodeegautex@gmail.com', NULL, '111521015186519758569', NULL, '$2y$10$I1HhPSB2U9y1XMGcEVS5LujATUsxw1BqCEemcobHOlLcuDaA/STRO', NULL, NULL, 'Not provide', NULL, 0, 1, '2025-07-07 02:14:09', '2025-07-07 02:14:09'),
(5, 'Samim Hossen', 'banglarcele1122@gmail.com', NULL, NULL, '85032804', '$2y$10$Rf4CWAefTqO/Ls3ZjLNVtO/hpNiKQJi2FNUhm3h4nRjjVehO6REUO', NULL, NULL, 'Not provide', NULL, 0, 1, '2025-07-07 02:25:16', '2025-07-07 02:25:16');

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
(28, 2025061711, '2025-06-17', 1, 6, 1, 450, '2025-06-16 22:18:19', '2025-06-16 22:18:19'),
(29, 2025061711, '2025-06-17', 1, 7, 2, 850, '2025-06-16 22:18:20', '2025-06-16 22:18:23'),
(30, 2025061711, '2025-06-17', 1, 9, 2, 180, '2025-06-16 22:18:21', '2025-06-16 22:18:23'),
(31, 2025061712, '2025-06-17', 1, 7, 3, 850, '2025-06-16 22:19:19', '2025-06-16 22:19:21'),
(32, 2025061713, '2025-06-17', 1, 9, 1, 180, '2025-06-16 22:33:42', '2025-06-16 22:33:42'),
(33, 2025061713, '2025-06-17', 1, 12, 2, 320, '2025-06-16 22:33:43', '2025-06-16 22:33:46'),
(34, 2025061714, '2025-06-17', 1, 9, 2, 180, '2025-06-16 22:34:25', '2025-06-16 22:34:27'),
(35, 2025061714, '2025-06-17', 1, 6, 1, 450, '2025-06-16 22:34:26', '2025-06-16 22:34:26'),
(36, 2025061715, '2025-06-17', 1, 13, 1, 180, '2025-06-16 22:34:31', '2025-06-16 22:34:31'),
(50, 2025061716, '2025-06-17', 1, 6, 1, 450, '2025-06-17 00:44:01', '2025-06-17 00:55:30'),
(51, 2025061716, '2025-06-17', 1, 7, 1, 850, '2025-06-17 00:44:02', '2025-06-17 01:09:09'),
(52, 2025061716, '2025-06-17', 1, 12, 1, 320, '2025-06-17 00:52:18', '2025-06-17 01:09:09'),
(53, 2025061816, '2025-06-18', 1, 8, 4, 450, '2025-06-17 18:04:27', '2025-06-17 18:49:17'),
(54, 2025061816, '2025-06-18', 1, 9, 4, 180, '2025-06-17 18:04:29', '2025-06-17 18:49:19'),
(66, 2025061817, '2025-06-18', 1, 8, 3, 450, '2025-06-17 18:59:54', '2025-06-17 18:59:57'),
(90, 2025061818, '2025-06-18', 1, 6, 6, 450, '2025-06-17 21:08:45', '2025-06-17 21:08:49'),
(91, 2025061819, '2025-06-18', 1, 6, 2, 450, '2025-06-17 21:28:51', '2025-06-17 21:28:55'),
(92, 2025061819, '2025-06-18', 1, 11, 2, 230, '2025-06-17 21:28:52', '2025-06-17 21:28:55'),
(93, 20250618110, '2025-06-18', 1, 8, 3, 450, '2025-06-17 21:39:10', '2025-06-17 21:39:15'),
(94, 20250618110, '2025-06-18', 1, 9, 3, 180, '2025-06-17 21:39:11', '2025-06-17 21:39:14'),
(95, 20250618110, '2025-06-18', 1, 7, 3, 850, '2025-06-17 21:39:12', '2025-06-17 21:39:16'),
(96, 20250618111, '2025-06-18', 1, 7, 3, 850, '2025-06-17 21:58:01', '2025-06-17 21:58:04'),
(97, 20250618111, '2025-06-18', 1, 11, 3, 230, '2025-06-17 21:58:02', '2025-06-17 21:58:05'),
(98, 20250618112, '2025-06-18', 1, 6, 1, 450, '2025-06-17 21:58:24', '2025-06-17 21:58:24'),
(99, 20250618112, '2025-06-18', 1, 9, 1, 180, '2025-06-17 21:58:33', '2025-06-17 21:58:33'),
(100, 20250618113, '2025-06-18', 1, 6, 3, 450, '2025-06-17 22:13:04', '2025-06-17 22:13:50'),
(101, 20250618113, '2025-06-18', 1, 9, 2, 180, '2025-06-17 22:13:44', '2025-06-17 22:13:49'),
(102, 20250618113, '2025-06-18', 1, 7, 2, 850, '2025-06-17 22:13:45', '2025-06-17 22:13:49'),
(103, 20250619114, '2025-06-19', 1, 8, 2, 450, '2025-06-18 16:05:20', '2025-06-18 16:05:26'),
(104, 20250619114, '2025-06-19', 1, 11, 2, 230, '2025-06-18 16:05:21', '2025-06-18 16:05:25'),
(105, 20250619114, '2025-06-19', 1, 12, 3, 320, '2025-06-18 16:05:22', '2025-06-18 16:05:27'),
(106, 20250619115, '2025-06-19', 1, 7, 1, 850, '2025-06-18 16:05:30', '2025-06-18 16:05:30'),
(107, 20250619115, '2025-06-19', 1, 6, 2, 450, '2025-06-18 16:05:30', '2025-06-18 16:05:35'),
(108, 20250619116, '2025-06-19', 1, 8, 1, 450, '2025-06-18 16:52:22', '2025-06-18 16:52:22'),
(109, 20250619116, '2025-06-19', 1, 9, 3, 180, '2025-06-18 16:52:23', '2025-06-18 17:59:23'),
(110, 20250619116, '2025-06-19', 1, 7, 3, 850, '2025-06-18 17:59:21', '2025-06-18 17:59:24'),
(111, 20250619116, '2025-06-19', 1, 6, 1, 450, '2025-06-18 17:59:22', '2025-06-18 17:59:22'),
(112, 20250619117, '2025-06-19', 1, 7, 1, 850, '2025-06-18 18:35:32', '2025-06-18 18:35:32'),
(113, 20250619117, '2025-06-19', 1, 8, 1, 450, '2025-06-18 18:35:34', '2025-06-18 18:35:34'),
(114, 20250619117, '2025-06-19', 1, 9, 1, 180, '2025-06-18 18:35:34', '2025-06-18 18:35:34'),
(115, 20250619218, '2025-06-19', 2, 8, 1, 450, '2025-06-18 21:18:04', '2025-06-18 21:18:04'),
(116, 20250619218, '2025-06-19', 2, 11, 2, 230, '2025-06-18 21:18:05', '2025-06-18 21:18:09'),
(117, 20250619218, '2025-06-19', 2, 7, 1, 850, '2025-06-18 21:18:06', '2025-06-18 21:18:06'),
(118, 20250619218, '2025-06-19', 2, 6, 2, 450, '2025-06-18 21:18:07', '2025-06-18 21:18:09'),
(119, 20250619219, '2025-06-19', 2, 8, 2, 450, '2025-06-18 22:12:48', '2025-06-18 22:12:52'),
(120, 20250619219, '2025-06-19', 2, 6, 2, 450, '2025-06-18 22:12:49', '2025-06-18 22:12:51'),
(121, 20250619220, '2025-06-19', 2, 12, 2, 320, '2025-06-18 22:12:54', '2025-06-18 22:12:58'),
(122, 20250619220, '2025-06-19', 2, 13, 1, 180, '2025-06-18 22:12:55', '2025-06-18 22:12:55'),
(123, 20250619221, '2025-06-19', 2, 8, 4, 450, '2025-06-18 23:39:05', '2025-06-18 23:39:10'),
(124, 20250619221, '2025-06-19', 2, 6, 4, 450, '2025-06-18 23:39:06', '2025-06-18 23:39:11'),
(125, 20250619221, '2025-06-19', 2, 7, 4, 850, '2025-06-18 23:39:07', '2025-06-18 23:39:12'),
(126, 20250619221, '2025-06-19', 2, 11, 4, 230, '2025-06-18 23:39:08', '2025-06-18 23:39:13'),
(127, 20250619222, '2025-06-19', 2, 7, 3, 850, '2025-06-19 00:15:32', '2025-06-19 00:15:35'),
(128, 20250619222, '2025-06-19', 2, 6, 3, 450, '2025-06-19 00:15:33', '2025-06-19 00:15:36'),
(129, 20250619223, '2025-06-19', 2, 8, 1, 450, '2025-06-19 01:16:52', '2025-06-19 01:16:52'),
(130, 20250619223, '2025-06-19', 2, 9, 1, 180, '2025-06-19 01:16:53', '2025-06-19 01:16:53'),
(131, 20250622124, '2025-06-22', 1, 9, 3, 180, '2025-06-21 19:02:29', '2025-06-21 19:02:35'),
(132, 20250622124, '2025-06-22', 1, 11, 3, 230, '2025-06-21 19:02:30', '2025-06-21 19:02:33'),
(133, 20250622124, '2025-06-22', 1, 13, 3, 180, '2025-06-21 19:02:31', '2025-06-21 19:02:34'),
(134, 20250622124, '2025-06-22', 1, 6, 3, 450, '2025-06-21 19:02:32', '2025-06-21 19:02:34'),
(135, 20250622125, '2025-06-22', 1, 7, 1, 850, '2025-06-21 19:06:15', '2025-06-21 19:06:15'),
(136, 20250622126, '2025-06-22', 1, 8, 1, 450, '2025-06-21 19:08:03', '2025-06-21 19:08:03'),
(137, 20250622126, '2025-06-22', 1, 9, 1, 180, '2025-06-21 19:08:05', '2025-06-21 19:08:05'),
(138, 20250622127, '2025-06-22', 1, 7, 1, 850, '2025-06-21 19:56:07', '2025-06-21 19:56:07'),
(139, 20250622127, '2025-06-22', 1, 6, 1, 450, '2025-06-21 19:56:08', '2025-06-21 19:56:08'),
(140, 20250622128, '2025-06-22', 1, 6, 1, 450, '2025-06-21 20:01:50', '2025-06-21 20:01:50'),
(141, 20250622128, '2025-06-22', 1, 7, 1, 850, '2025-06-21 20:01:50', '2025-06-21 20:01:50'),
(142, 20250622129, '2025-06-22', 1, 8, 1, 450, '2025-06-21 20:04:45', '2025-06-21 20:04:45'),
(143, 20250622130, '2025-06-22', 1, 7, 1, 850, '2025-06-21 20:05:08', '2025-06-21 20:05:08'),
(144, 20250622131, '2025-06-22', 1, 7, 1, 850, '2025-06-21 20:12:09', '2025-06-21 20:12:09'),
(145, 20250622131, '2025-06-22', 1, 8, 1, 450, '2025-06-21 20:12:10', '2025-06-21 20:12:10'),
(146, 20250622132, '2025-06-22', 1, 7, 1, 850, '2025-06-21 20:26:51', '2025-06-21 20:26:51'),
(147, 20250622133, '2025-06-22', 1, 7, 1, 850, '2025-06-21 21:04:06', '2025-06-21 21:04:06'),
(148, 20250622133, '2025-06-22', 1, 11, 1, 230, '2025-06-21 21:04:16', '2025-06-21 21:04:16'),
(149, 20250622134, '2025-06-22', 1, 6, 1, 450, '2025-06-21 21:04:35', '2025-06-21 21:04:35'),
(150, 20250622134, '2025-06-22', 1, 9, 1, 180, '2025-06-21 21:04:36', '2025-06-21 21:04:36'),
(151, 20250622134, '2025-06-22', 1, 13, 1, 180, '2025-06-21 21:04:37', '2025-06-21 21:04:37'),
(152, 20250622135, '2025-06-22', 1, 8, 1, 450, '2025-06-21 21:04:40', '2025-06-21 21:04:40'),
(153, 20250622135, '2025-06-22', 1, 6, 1, 450, '2025-06-21 21:04:41', '2025-06-21 21:04:41'),
(154, 20250622135, '2025-06-22', 1, 12, 1, 320, '2025-06-21 21:04:41', '2025-06-21 21:04:41'),
(155, 20250622135, '2025-06-22', 1, 13, 1, 180, '2025-06-21 21:04:42', '2025-06-21 21:04:42'),
(156, 20250622136, '2025-06-22', 1, 11, 1, 230, '2025-06-21 21:04:47', '2025-06-21 21:04:47'),
(157, 20250622136, '2025-06-22', 1, 6, 1, 450, '2025-06-21 21:04:47', '2025-06-21 21:04:47'),
(158, 20250622136, '2025-06-22', 1, 7, 1, 850, '2025-06-21 21:04:48', '2025-06-21 21:04:48'),
(159, 20250622137, '2025-06-22', 1, 13, 1, 180, '2025-06-21 21:04:52', '2025-06-21 21:04:52'),
(160, 20250622137, '2025-06-22', 1, 12, 1, 320, '2025-06-21 21:04:52', '2025-06-21 21:04:52'),
(161, 20250622138, '2025-06-22', 1, 13, 1, 180, '2025-06-21 21:04:55', '2025-06-21 21:04:55'),
(162, 20250622138, '2025-06-22', 1, 12, 1, 320, '2025-06-21 21:04:56', '2025-06-21 21:04:56'),
(163, 20250622139, '2025-06-22', 1, 8, 2, 450, '2025-06-21 21:25:46', '2025-06-21 21:25:57'),
(164, 20250622139, '2025-06-22', 1, 9, 2, 180, '2025-06-21 21:25:48', '2025-06-21 21:25:57'),
(165, 20250622139, '2025-06-22', 1, 6, 2, 450, '2025-06-21 21:25:50', '2025-06-21 21:25:59'),
(169, 20250622140, '2025-06-22', 1, 13, 3, 180, '2025-06-21 21:53:44', '2025-06-21 21:54:03'),
(170, 20250622140, '2025-06-22', 1, 12, 3, 320, '2025-06-21 21:53:46', '2025-06-21 21:54:04'),
(181, 20250622141, '2025-06-22', 1, 13, 3, 180, '2025-06-21 22:21:53', '2025-06-21 22:22:00'),
(182, 20250622141, '2025-06-22', 1, 12, 3, 320, '2025-06-21 22:21:54', '2025-06-21 22:22:00'),
(184, 20250622142, '2025-06-22', 1, 9, 1, 180, '2025-06-22 00:18:19', '2025-06-22 00:18:19'),
(185, 20250622142, '2025-06-22', 1, 13, 1, 180, '2025-06-22 00:23:18', '2025-06-22 00:23:18'),
(186, 20250622142, '2025-06-22', 1, 12, 1, 320, '2025-06-22 00:24:13', '2025-06-22 00:24:13'),
(188, 20250622143, '2025-06-22', 1, 13, 1, 180, '2025-06-22 00:25:18', '2025-06-22 00:25:18'),
(189, 20250622144, '2025-06-22', 1, 13, 2, 180, '2025-06-22 00:34:43', '2025-06-22 00:35:09'),
(190, 20250622144, '2025-06-22', 1, 11, 2, 230, '2025-06-22 00:35:02', '2025-06-22 00:35:08'),
(200, 20250623145, '2025-06-23', 1, 13, 1, 180, '2025-06-22 17:20:12', '2025-06-22 17:20:12'),
(201, 20250623145, '2025-06-23', 1, 12, 1, 320, '2025-06-22 17:20:14', '2025-06-22 17:20:14'),
(245, 20250623146, '2025-06-23', 1, 13, 1, 180, '2025-06-22 21:33:08', '2025-06-22 21:33:08'),
(246, 20250623146, '2025-06-23', 1, 12, 1, 320, '2025-06-22 21:33:10', '2025-06-22 21:33:10'),
(251, 20250623147, '2025-06-23', 1, 13, 1, 180, '2025-06-22 21:51:59', '2025-06-23 01:13:18'),
(253, 20250623148, '2025-06-23', 1, 13, 1, 180, '2025-06-22 21:54:23', '2025-06-22 21:54:23'),
(254, 20250623148, '2025-06-23', 1, 12, 1, 320, '2025-06-22 21:54:27', '2025-06-22 21:54:27'),
(255, 20250623148, '2025-06-23', 1, 9, 1, 180, '2025-06-22 21:54:47', '2025-06-22 21:54:47'),
(256, 20250623149, '2025-06-23', 1, 7, 1, 850, '2025-06-22 21:57:52', '2025-06-22 21:57:52'),
(257, 20250623149, '2025-06-23', 1, 8, 1, 450, '2025-06-22 21:58:02', '2025-06-22 21:58:02'),
(267, 20250623147, '2025-06-23', 1, 11, 1, 230, '2025-06-22 23:52:56', '2025-06-23 01:13:12'),
(272, 20250623147, '2025-06-23', 1, 9, 1, 180, '2025-06-22 23:56:09', '2025-06-23 01:13:23'),
(273, 20250623147, '2025-06-23', 1, 8, 1, 450, '2025-06-23 01:13:31', '2025-06-23 01:13:31'),
(274, 20250623150, '2025-06-23', 1, 13, 1, 180, '2025-06-23 01:21:19', '2025-06-23 01:21:19'),
(275, 20250623150, '2025-06-23', 1, 12, 1, 320, '2025-06-23 01:21:20', '2025-06-23 01:21:20'),
(276, 20250623150, '2025-06-23', 1, 11, 1, 230, '2025-06-23 01:21:22', '2025-06-23 01:21:22'),
(277, 20250623148, '2025-06-23', 1, 6, 1, 450, '2025-06-23 01:23:14', '2025-06-23 01:23:14'),
(278, 20250623148, '2025-06-23', 1, 7, 1, 850, '2025-06-23 01:23:15', '2025-06-23 01:23:15'),
(279, 20250623148, '2025-06-23', 1, 8, 1, 450, '2025-06-23 01:23:16', '2025-06-23 01:23:16'),
(280, 20250623148, '2025-06-23', 1, 11, 1, 230, '2025-06-23 01:23:18', '2025-06-23 01:23:18'),
(281, 20250624151, '2025-06-24', 1, 9, 2, 180, '2025-06-23 16:22:16', '2025-06-23 16:28:20'),
(282, 20250624151, '2025-06-24', 1, 13, 2, 180, '2025-06-23 16:22:17', '2025-06-23 16:27:40'),
(283, 20250624152, '2025-06-24', 1, 13, 3, 180, '2025-06-23 16:28:30', '2025-06-23 16:28:42'),
(284, 20250624152, '2025-06-24', 1, 9, 3, 180, '2025-06-23 16:28:31', '2025-06-23 16:28:35'),
(285, 20250624153, '2025-06-24', 1, 9, 1, 180, '2025-06-23 16:30:51', '2025-06-23 16:30:51'),
(286, 20250624153, '2025-06-24', 1, 12, 1, 320, '2025-06-23 16:31:33', '2025-06-23 16:31:33'),
(287, 20250624154, '2025-06-24', 1, 8, 1, 450, '2025-06-23 16:32:30', '2025-06-23 16:32:30'),
(288, 20250624154, '2025-06-24', 1, 9, 1, 180, '2025-06-23 16:32:31', '2025-06-23 16:32:31'),
(289, 20250624154, '2025-06-24', 1, 11, 1, 230, '2025-06-23 16:32:33', '2025-06-23 16:32:33'),
(291, 20250624155, '2025-06-24', 1, 8, 1, 450, '2025-06-23 19:43:12', '2025-06-23 19:43:12'),
(292, 20250624156, '2025-06-24', 1, 7, 1, 850, '2025-06-23 19:52:58', '2025-06-23 19:52:58'),
(293, 20250624156, '2025-06-24', 1, 13, 1, 180, '2025-06-23 19:53:00', '2025-06-23 19:53:00'),
(294, 2025070739, '2025-07-07', 3, 7, 1, 850, '2025-07-07 01:53:58', '2025-07-07 01:53:58'),
(295, 2025070739, '2025-07-07', 3, 8, 1, 450, '2025-07-07 01:53:58', '2025-07-07 01:53:58'),
(296, 2025070739, '2025-07-07', 3, 9, 1, 180, '2025-07-07 01:53:59', '2025-07-07 01:53:59');

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
(1, 'Food & Ingredients', '2025-06-27 19:25:33', '2025-06-27 19:25:33'),
(2, 'Kitchen Supplies', '2025-06-27 19:25:40', '2025-06-27 19:25:40'),
(3, 'Utilities', '2025-06-27 19:25:47', '2025-06-27 19:25:47'),
(4, 'Staff Salary', '2025-06-27 19:25:54', '2025-06-27 19:25:54'),
(5, 'Maintenance', '2025-06-27 19:25:59', '2025-06-27 19:25:59'),
(6, 'Marketing', '2025-06-27 19:26:11', '2025-06-27 19:26:11'),
(7, 'Rent & Licensing', '2025-06-27 19:26:17', '2025-06-27 19:26:17'),
(8, 'Transportation', '2025-06-27 19:26:21', '2025-06-27 19:26:21'),
(9, 'Miscellaneous', '2025-06-27 19:26:25', '2025-06-27 19:26:25'),
(10, 'POS & Software', '2025-06-27 19:26:34', '2025-06-27 19:26:34'),
(11, 'others', '2025-06-27 19:39:29', '2025-06-27 19:39:29');

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
(6, 'Butter Chicken', 450, 'main', 15, 1, 'food-1751370833.jpg', 'Chicken, butter, tomato, cream, spices.', 'Tender chicken cooked in a creamy tomato-based sauce.', '2025-06-13 11:30:24', '2025-07-02 20:59:55'),
(7, 'Paneer Tikka Masala', 850, 'main', 14, 1, 'food-1749879095.jpg', 'Paneer, yogurt, tomato puree, onion, masala.', 'Grilled paneer cubes in a spicy tikka masala sauce.', '2025-06-13 11:31:35', '2025-07-07 01:53:58'),
(8, 'Grilled Salmon', 450, 'main', 14, 1, 'food-1749879251.jpg', 'Salmon, garlic, lemon, herbs, olive oil.', 'Fresh salmon grilled with herbs and lemon.', '2025-06-13 11:34:11', '2025-07-07 01:53:58'),
(9, 'Chicken Wings', 180, 'starter', 16, 1, 'food-1749880468.jpg', 'Chicken wings, flour, chili powder, garlic, butter, vinegar.', 'Spicy and crispy deep-fried chicken wings served with hot sauce.', '2025-06-13 11:54:28', '2025-07-07 01:53:59'),
(11, 'Vegetable Spring Rolls', 230, 'starter', 12, 1, 'food-1749885187.jpg', 'Carrot, cabbage, onion, noodles, flour wrap, soy sauce.', 'Crispy rolls stuffed with vegetables and noodles.', '2025-06-13 13:13:07', '2025-07-03 20:17:15'),
(12, 'Nachos', 320, 'starter', 15, 1, 'food-1749896193.jpg', 'Corn tortilla chips, cheddar cheese, jalapeños, salsa, sour cream.', 'Crispy tortilla chips topped with melted cheese and toppings.', '2025-06-13 16:16:33', '2025-07-03 20:17:14'),
(13, 'Garlic Bread', 180, 'starter', 12, 1, 'food-1749896253.jpg', 'Baguette, butter, garlic, parsley, olive oil.', 'Toasted bread topped with garlic butter and herbs.', '2025-06-13 16:17:33', '2025-07-03 20:17:14');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_06_13_084624_create_tables_table', 1),
(6, '2025_06_13_120026_create_food_table', 1),
(7, '2025_06_14_115756_create_admins_table', 1),
(8, '2025_06_14_122619_create_orders_table', 1),
(9, '2025_06_15_044735_create_carts_table', 1),
(10, '2025_06_28_064147_create_categories_table', 1),
(11, '2025_06_28_065714_create_subcategories_table', 1),
(12, '2025_06_28_070038_create_expenses_table', 1),
(13, '2025_07_01_045539_create_stocks_table', 1);

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
(95, '2025-07-03', 2025070311, 4, 2660, 0, 2660, 2660, 0, 4, 2, '2025-07-02 19:05:45', '2025-07-02 19:06:23'),
(96, '2025-07-03', 2025070312, 11, 6480, 80, 6400, 6400, 0, 4, 2, '2025-07-02 19:07:26', '2025-07-02 19:08:08'),
(97, '2025-07-03', 2025070313, 9, 2480, 0, 2480, 2480, 0, 4, 2, '2025-07-02 20:59:58', '2025-07-02 21:21:56'),
(98, '2025-07-03', 2025070314, 8, 730, 0, 730, 730, 0, 4, 2, '2025-07-02 21:04:31', '2025-07-02 21:21:53'),
(99, '2025-07-03', 2025070315, 4, 180, 0, 180, 180, 0, 4, 2, '2025-07-02 21:08:04', '2025-07-02 23:00:56'),
(100, '2025-07-03', 2025070316, 9, 550, 0, 550, 550, 0, 4, 2, '2025-07-02 21:08:10', '2025-07-02 23:00:44'),
(101, '2025-07-03', 2025070317, 10, 180, 0, 180, 180, 0, 4, 2, '2025-07-02 21:08:15', '2025-07-02 22:14:01'),
(102, '2025-07-04', 2025070418, 10, 910, 0, 910, 910, 0, 4, 2, '2025-07-03 20:17:19', '2025-07-03 20:17:53'),
(103, '2025-07-07', 2025070739, 10, 1480, 0, 1480, 1480, 0, 4, 2, '2025-07-07 01:54:01', '2025-07-07 01:54:23');

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
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reg` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `foodId` bigint(20) UNSIGNED NOT NULL,
  `stockIn` int(11) NOT NULL DEFAULT 0,
  `stockOut` int(11) NOT NULL DEFAULT 0,
  `remark` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `reg`, `date`, `foodId`, `stockIn`, `stockOut`, `remark`, `status`, `created_at`, `updated_at`) VALUES
(156, 0, '2025-07-03', 6, 20, 0, 'N/A', 2, '2025-07-02 19:05:07', '2025-07-02 19:05:07'),
(157, 0, '2025-07-03', 7, 20, 0, 'N/A', 2, '2025-07-02 19:05:10', '2025-07-02 19:05:10'),
(158, 0, '2025-07-03', 8, 20, 0, 'N/A', 2, '2025-07-02 19:05:13', '2025-07-02 19:05:13'),
(159, 0, '2025-07-03', 9, 20, 0, 'N/A', 2, '2025-07-02 19:05:16', '2025-07-02 19:05:16'),
(160, 0, '2025-07-03', 11, 20, 0, 'N/A', 2, '2025-07-02 19:05:19', '2025-07-02 19:05:19'),
(161, 0, '2025-07-03', 12, 20, 0, 'N/A', 2, '2025-07-02 19:05:23', '2025-07-02 19:05:23'),
(162, 0, '2025-07-03', 13, 20, 0, 'N/A', 2, '2025-07-02 19:05:26', '2025-07-02 19:05:26'),
(163, 2025070311, '2025-07-03', 6, 0, 1, NULL, 1, '2025-07-02 19:05:37', '2025-07-02 19:05:37'),
(164, 2025070311, '2025-07-03', 7, 0, 1, NULL, 1, '2025-07-02 19:05:38', '2025-07-02 19:05:38'),
(165, 2025070311, '2025-07-03', 8, 0, 1, NULL, 1, '2025-07-02 19:05:38', '2025-07-02 19:05:38'),
(166, 2025070311, '2025-07-03', 9, 0, 1, NULL, 1, '2025-07-02 19:05:38', '2025-07-02 19:05:38'),
(167, 2025070311, '2025-07-03', 11, 0, 1, NULL, 1, '2025-07-02 19:05:40', '2025-07-02 19:05:40'),
(168, 2025070311, '2025-07-03', 12, 0, 1, NULL, 1, '2025-07-02 19:05:40', '2025-07-02 19:05:40'),
(169, 2025070311, '2025-07-03', 13, 0, 1, NULL, 1, '2025-07-02 19:05:41', '2025-07-02 19:05:41'),
(170, 2025070312, '2025-07-03', 6, 0, 3, NULL, 1, '2025-07-02 19:07:13', '2025-07-02 19:07:23'),
(171, 2025070312, '2025-07-03', 7, 0, 3, NULL, 1, '2025-07-02 19:07:14', '2025-07-02 19:07:22'),
(172, 2025070312, '2025-07-03', 8, 0, 3, NULL, 1, '2025-07-02 19:07:14', '2025-07-02 19:07:21'),
(173, 2025070312, '2025-07-03', 13, 0, 3, NULL, 1, '2025-07-02 19:07:15', '2025-07-02 19:07:24'),
(174, 2025070312, '2025-07-03', 11, 0, 3, NULL, 1, '2025-07-02 19:07:16', '2025-07-02 19:07:25'),
(175, 2025070313, '2025-07-03', 7, 0, 1, NULL, 1, '2025-07-02 20:59:51', '2025-07-02 20:59:51'),
(176, 2025070313, '2025-07-03', 8, 0, 1, NULL, 1, '2025-07-02 20:59:51', '2025-07-02 20:59:51'),
(177, 2025070313, '2025-07-03', 13, 0, 1, NULL, 1, '2025-07-02 20:59:52', '2025-07-02 20:59:52'),
(178, 2025070313, '2025-07-03', 12, 0, 1, NULL, 1, '2025-07-02 20:59:53', '2025-07-02 20:59:53'),
(179, 2025070313, '2025-07-03', 11, 0, 1, NULL, 1, '2025-07-02 20:59:53', '2025-07-02 20:59:53'),
(180, 2025070313, '2025-07-03', 6, 0, 1, NULL, 1, '2025-07-02 20:59:55', '2025-07-02 20:59:55'),
(181, 2025070314, '2025-07-03', 13, 0, 1, NULL, 1, '2025-07-02 21:04:27', '2025-07-02 21:04:27'),
(182, 2025070314, '2025-07-03', 12, 0, 1, NULL, 1, '2025-07-02 21:04:27', '2025-07-02 21:04:27'),
(183, 2025070314, '2025-07-03', 11, 0, 1, NULL, 1, '2025-07-02 21:04:27', '2025-07-02 21:04:27'),
(184, 2025070315, '2025-07-03', 9, 0, 1, NULL, 1, '2025-07-02 21:08:01', '2025-07-02 21:08:01'),
(185, 2025070316, '2025-07-03', 12, 0, 1, NULL, 1, '2025-07-02 21:08:06', '2025-07-02 21:08:06'),
(186, 2025070316, '2025-07-03', 11, 0, 1, NULL, 1, '2025-07-02 21:08:07', '2025-07-02 21:08:07'),
(187, 2025070317, '2025-07-03', 13, 0, 1, NULL, 1, '2025-07-02 21:08:12', '2025-07-02 21:08:12'),
(188, 2025070418, '2025-07-04', 9, 0, 1, NULL, 1, '2025-07-03 20:17:12', '2025-07-03 20:17:12'),
(189, 2025070418, '2025-07-04', 13, 0, 1, NULL, 1, '2025-07-03 20:17:14', '2025-07-03 20:17:14'),
(190, 2025070418, '2025-07-04', 12, 0, 1, NULL, 1, '2025-07-03 20:17:14', '2025-07-03 20:17:14'),
(191, 2025070418, '2025-07-04', 11, 0, 1, NULL, 1, '2025-07-03 20:17:15', '2025-07-03 20:17:15'),
(192, 2025070739, '2025-07-07', 7, 0, 1, NULL, 1, '2025-07-07 01:53:58', '2025-07-07 01:53:58'),
(193, 2025070739, '2025-07-07', 8, 0, 1, NULL, 1, '2025-07-07 01:53:58', '2025-07-07 01:53:58'),
(194, 2025070739, '2025-07-07', 9, 0, 1, NULL, 1, '2025-07-07 01:53:59', '2025-07-07 01:53:59');

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
(1, 1, 'Rice', '2025-06-27 22:02:41', '2025-06-27 22:02:41'),
(2, 1, 'Meat (Beef, Chicken, Mutton)', '2025-06-27 22:02:49', '2025-06-27 22:02:49'),
(3, 1, 'Fish', '2025-06-27 22:03:08', '2025-06-27 22:03:08'),
(4, 1, 'Vegetables', '2025-06-27 22:03:14', '2025-06-27 22:03:14'),
(5, 1, 'Spices', '2025-06-27 22:03:18', '2025-06-27 22:03:18'),
(6, 1, 'Oil', '2025-06-27 22:03:23', '2025-06-27 22:03:23'),
(7, 1, 'Salt/Sugar', '2025-06-27 22:03:28', '2025-06-27 22:03:28'),
(8, 1, 'Snacks/Ready Food', '2025-06-27 22:03:34', '2025-06-27 22:03:34'),
(9, 1, 'Fruits', '2025-06-27 22:03:39', '2025-06-27 22:03:39'),
(10, 1, 'Beverages (Tea, Coffee, Juice)', '2025-06-27 22:03:48', '2025-06-27 22:03:48'),
(11, 2, 'Cooking Gas', '2025-06-27 22:03:55', '2025-06-27 22:03:55'),
(12, 2, 'Utensils', '2025-06-27 22:04:02', '2025-06-27 22:04:02'),
(13, 2, 'Stove Maintenance', '2025-06-27 22:04:09', '2025-06-27 22:04:09'),
(14, 2, 'Cleaning Materials', '2025-06-27 22:04:15', '2025-06-27 22:04:15'),
(15, 2, 'Tissues/Napkins', '2025-06-27 22:04:20', '2025-06-27 22:04:20'),
(16, 2, 'Kitchen Tools (Knife, Spoon, etc.)', '2025-06-27 22:04:27', '2025-06-27 22:04:27'),
(17, 3, 'Electricity Bill', '2025-06-27 22:04:33', '2025-06-27 22:04:33'),
(18, 3, 'Gas Bill', '2025-06-27 22:04:39', '2025-06-27 22:04:39'),
(19, 3, 'Water Bill', '2025-06-27 22:04:43', '2025-06-27 22:04:43'),
(20, 3, 'Internet/WiFi', '2025-06-27 22:04:48', '2025-06-27 22:04:48'),
(21, 3, 'Generator Fuel', '2025-06-27 22:04:55', '2025-06-27 22:04:55'),
(22, 4, 'Chef Salary', '2025-06-27 22:05:02', '2025-06-27 22:05:02'),
(23, 4, 'Waiter Salary', '2025-06-27 22:05:09', '2025-06-27 22:05:09'),
(24, 4, 'Cleaner Salary', '2025-06-27 22:05:15', '2025-06-27 22:05:15'),
(25, 4, 'Manager Salary', '2025-06-27 22:05:23', '2025-06-27 22:05:23'),
(26, 4, 'Delivery Staff Salary', '2025-06-27 22:05:34', '2025-06-27 22:05:34'),
(27, 4, 'Overtime/Bonus', '2025-06-27 22:05:40', '2025-06-27 22:05:40'),
(28, 5, 'AC Repair', '2025-06-27 22:13:45', '2025-06-27 22:13:45'),
(29, 5, 'Plumbing', '2025-06-27 22:13:54', '2025-06-27 22:13:54'),
(30, 5, 'Electrical Work', '2025-06-27 22:14:09', '2025-06-27 22:14:09'),
(31, 5, 'Furniture Repair', '2025-06-27 22:14:17', '2025-06-27 22:14:17'),
(32, 5, 'Painting/Renovation', '2025-06-27 22:14:24', '2025-06-27 22:14:24'),
(33, 6, 'Facebook/Online Ads', '2025-06-27 22:14:33', '2025-06-27 22:14:33'),
(34, 6, 'Poster/Leaflet Printing', '2025-06-27 22:14:50', '2025-06-27 22:14:50'),
(35, 6, 'Offers/Discount Campaigns', '2025-06-27 22:14:57', '2025-06-27 22:14:57'),
(36, 6, 'Photography/Videography', '2025-06-27 22:15:04', '2025-06-27 22:15:04'),
(37, 7, 'Shop Rent', '2025-06-27 22:15:13', '2025-06-27 22:15:13'),
(38, 7, 'Trade License Renewal', '2025-06-27 22:15:18', '2025-06-27 22:15:18'),
(39, 7, 'Fire License', '2025-06-27 22:15:25', '2025-06-27 22:15:25'),
(40, 7, 'Food Safety License', '2025-06-27 22:15:33', '2025-06-27 22:15:33'),
(41, 8, 'Goods Transport', '2025-06-27 22:15:43', '2025-06-27 22:15:43'),
(42, 8, 'Staff Transport', '2025-06-27 22:15:49', '2025-06-27 22:15:49'),
(43, 8, 'Delivery Fuel Cost', '2025-06-27 22:15:55', '2025-06-27 22:15:55'),
(44, 9, 'Tips', '2025-06-27 22:16:00', '2025-06-27 22:16:00'),
(45, 9, 'Donation', '2025-06-27 22:16:05', '2025-06-27 22:16:05'),
(46, 9, 'Emergency Purchase', '2025-06-27 22:16:11', '2025-06-27 22:16:11'),
(47, 9, 'Mobile Recharge', '2025-06-27 22:16:18', '2025-06-27 22:16:18'),
(48, 9, 'Misc. Expenses', '2025-06-27 22:16:23', '2025-06-27 22:16:23'),
(49, 10, 'Software Subscription', '2025-06-27 22:16:30', '2025-06-27 22:16:30'),
(50, 10, 'Domain/Hosting', '2025-06-27 22:16:35', '2025-06-27 22:16:35'),
(51, 10, 'Printer Paper', '2025-06-27 22:16:42', '2025-06-27 22:16:42'),
(52, 10, 'Barcode Stickers', '2025-06-27 22:16:46', '2025-06-27 22:16:46'),
(53, 10, 'IT Support', '2025-06-27 22:16:51', '2025-06-27 22:16:51');

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
(1, 'N3C', 1, 'N/A', '2025-06-12 15:05:52', '2025-06-28 20:40:21'),
(3, 'N3B', 1, 'N/A', '2025-06-12 15:06:18', '2025-07-01 19:44:29'),
(4, 'N3A', 1, 'N/A', '2025-06-12 15:06:31', '2025-07-02 23:00:56'),
(5, 'N3D', 3, 'N/A', '2025-06-12 15:12:37', '2025-07-02 17:07:44'),
(7, 'S2A', 3, 'N/A', '2025-06-12 15:30:13', '2025-07-01 22:25:54'),
(8, 'S2B', 1, 'N/A', '2025-06-12 15:30:23', '2025-07-02 21:07:39'),
(9, 'S2C', 1, 'N/A', '2025-06-12 15:30:32', '2025-07-02 21:21:21'),
(10, 'S2D', 1, 'N/A', '2025-06-12 15:45:09', '2025-07-07 01:54:11'),
(11, 'N2A', 1, 'N/A', '2025-06-13 15:32:15', '2025-07-02 19:07:38'),
(12, 'N2B', 1, 'N/A', '2025-06-13 15:32:22', '2025-06-22 11:48:53'),
(13, 'N2C', 1, 'N/A', '2025-06-13 15:32:29', '2025-06-25 20:37:36'),
(14, 'N2D', 1, 'N/A', '2025-06-13 15:32:35', '2025-06-25 22:15:02'),
(15, 'S3A', 1, 'N/A', '2025-06-17 16:16:07', '2025-06-30 21:54:16'),
(16, 'S3B', 1, 'N/A', '2025-06-17 16:16:17', '2025-06-22 11:49:11'),
(17, 'S3C', 1, 'N/A', '2025-06-17 16:16:25', '2025-06-22 11:49:14'),
(18, 'S3D', 2, 'N/A', '2025-06-17 16:16:33', '2025-06-17 16:16:33');

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
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_foodid_foreign` (`foodId`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

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

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_foodid_foreign` FOREIGN KEY (`foodId`) REFERENCES `food` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
