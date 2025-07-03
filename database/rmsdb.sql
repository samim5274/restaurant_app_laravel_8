-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 03, 2025 at 12:01 PM
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
(1, 'SAMIM-HosseN', 'samim@gmail.com', '$2y$10$O8FZik3Vwpe3oVRilHDnR.WOvK95szGWDHvDDb4PBstu.mneG93qq', 'user-1751270041.jpg', '1762164746', 'Dhaka', '2001-12-31', 1, 1, NULL, '2025-06-30 03:39:49'),
(2, 'Asif Hossain', 'asif@gmail.com', '$2y$10$O8FZik3Vwpe3oVRilHDnR.WOvK95szGWDHvDDb4PBstu.mneG93qq', 'user-1751274806.jpg', '1234567895', 'Dhaka', '2025-05-29', 3, 1, '2025-06-29 07:16:49', '2025-06-30 06:01:51'),
(3, 'Akbor Ali', 'akbor@gmail.com', '$2y$10$O8FZik3Vwpe3oVRilHDnR.WOvK95szGWDHvDDb4PBstu.mneG93qq', 'user-1751452614.jpg', '1234567895', 'Dhaka', '2025-06-02', 2, 1, '2025-06-29 07:18:06', '2025-07-02 06:54:14'),
(4, 'Riyad', 'riad@gmail.com', '$2y$10$abJpM1/4NlcL07/TpZVNEeVlTGFHkEll0o3O1Os1x1WoF7RXmiery', 'user-1751276499.jpg', '1234567895', 'Dhaka', '2001-12-12', 4, 1, '2025-06-30 03:38:16', '2025-07-02 06:54:15'),
(5, 'Mokles', 'mokless@gmail.com', '$2y$10$abJpM1/4NlcL07/TpZVNEeVlTGFHkEll0o3O1Os1x1WoF7RXmiery', 'user-1751283854.jpg', '1234567895', 'Dhaka', '2000-12-12', 5, 0, '2025-06-30 05:41:27', '2025-06-30 06:01:53');

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
(272, 2025070311, '2025-07-03', 1, 6, 1, 450, '2025-07-03 01:05:37', '2025-07-03 01:05:37'),
(273, 2025070311, '2025-07-03', 1, 7, 1, 850, '2025-07-03 01:05:38', '2025-07-03 01:05:38'),
(274, 2025070311, '2025-07-03', 1, 8, 1, 450, '2025-07-03 01:05:38', '2025-07-03 01:05:38'),
(275, 2025070311, '2025-07-03', 1, 9, 1, 180, '2025-07-03 01:05:38', '2025-07-03 01:05:38'),
(276, 2025070311, '2025-07-03', 1, 11, 1, 230, '2025-07-03 01:05:40', '2025-07-03 01:05:40'),
(277, 2025070311, '2025-07-03', 1, 12, 1, 320, '2025-07-03 01:05:40', '2025-07-03 01:05:40'),
(278, 2025070311, '2025-07-03', 1, 13, 1, 180, '2025-07-03 01:05:41', '2025-07-03 01:05:41'),
(279, 2025070312, '2025-07-03', 1, 6, 3, 450, '2025-07-03 01:07:13', '2025-07-03 01:07:23'),
(280, 2025070312, '2025-07-03', 1, 7, 3, 850, '2025-07-03 01:07:14', '2025-07-03 01:07:22'),
(281, 2025070312, '2025-07-03', 1, 8, 3, 450, '2025-07-03 01:07:14', '2025-07-03 01:07:21'),
(282, 2025070312, '2025-07-03', 1, 13, 3, 180, '2025-07-03 01:07:15', '2025-07-03 01:07:24'),
(283, 2025070312, '2025-07-03', 1, 11, 3, 230, '2025-07-03 01:07:16', '2025-07-03 01:07:25'),
(284, 2025070313, '2025-07-03', 1, 7, 1, 850, '2025-07-03 02:59:51', '2025-07-03 02:59:51'),
(285, 2025070313, '2025-07-03', 1, 8, 1, 450, '2025-07-03 02:59:51', '2025-07-03 02:59:51'),
(286, 2025070313, '2025-07-03', 1, 13, 1, 180, '2025-07-03 02:59:52', '2025-07-03 02:59:52'),
(287, 2025070313, '2025-07-03', 1, 12, 1, 320, '2025-07-03 02:59:53', '2025-07-03 02:59:53'),
(288, 2025070313, '2025-07-03', 1, 11, 1, 230, '2025-07-03 02:59:53', '2025-07-03 02:59:53'),
(289, 2025070313, '2025-07-03', 1, 6, 1, 450, '2025-07-03 02:59:55', '2025-07-03 02:59:55'),
(290, 2025070314, '2025-07-03', 1, 13, 1, 180, '2025-07-03 03:04:27', '2025-07-03 03:04:27'),
(291, 2025070314, '2025-07-03', 1, 12, 1, 320, '2025-07-03 03:04:27', '2025-07-03 03:04:27'),
(292, 2025070314, '2025-07-03', 1, 11, 1, 230, '2025-07-03 03:04:27', '2025-07-03 03:04:27'),
(293, 2025070315, '2025-07-03', 1, 9, 1, 180, '2025-07-03 03:08:01', '2025-07-03 03:08:01'),
(294, 2025070316, '2025-07-03', 1, 12, 1, 320, '2025-07-03 03:08:06', '2025-07-03 03:08:06'),
(295, 2025070316, '2025-07-03', 1, 11, 1, 230, '2025-07-03 03:08:07', '2025-07-03 03:08:07'),
(296, 2025070317, '2025-07-03', 1, 13, 1, 180, '2025-07-03 03:08:12', '2025-07-03 03:08:12');

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
(26, 1, 2, 1, '2025-07-03', 1200, 'N/A', '2025-07-03 01:06:44', '2025-07-03 01:06:44'),
(27, 1, 4, 1, '2025-07-03', 1000, 'N/A', '2025-07-03 01:06:56', '2025-07-03 01:06:56'),
(28, 1, 6, 1, '2025-07-03', 900, 'N/A', '2025-07-03 01:07:07', '2025-07-03 01:07:07');

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
(6, 'Butter Chicken', 450, 'main', 15, 1, 'food-1751370833.jpg', 'Chicken, butter, tomato, cream, spices.', 'Tender chicken cooked in a creamy tomato-based sauce.', '2025-06-13 17:30:24', '2025-07-03 02:59:55'),
(7, 'Paneer Tikka Masala', 850, 'main', 15, 1, 'food-1749879095.jpg', 'Paneer, yogurt, tomato puree, onion, masala.', 'Grilled paneer cubes in a spicy tikka masala sauce.', '2025-06-13 17:31:35', '2025-07-03 02:59:51'),
(8, 'Grilled Salmon', 450, 'main', 15, 1, 'food-1749879251.jpg', 'Salmon, garlic, lemon, herbs, olive oil.', 'Fresh salmon grilled with herbs and lemon.', '2025-06-13 17:34:11', '2025-07-03 02:59:51'),
(9, 'Chicken Wings', 180, 'starter', 18, 1, 'food-1749880468.jpg', 'Chicken wings, flour, chili powder, garlic, butter, vinegar.', 'Spicy and crispy deep-fried chicken wings served with hot sauce.', '2025-06-13 17:54:28', '2025-07-03 03:08:01'),
(11, 'Vegetable Spring Rolls', 230, 'starter', 13, 1, 'food-1749885187.jpg', 'Carrot, cabbage, onion, noodles, flour wrap, soy sauce.', 'Crispy rolls stuffed with vegetables and noodles.', '2025-06-13 19:13:07', '2025-07-03 03:08:07'),
(12, 'Nachos', 320, 'starter', 16, 1, 'food-1749896193.jpg', 'Corn tortilla chips, cheddar cheese, jalapeños, salsa, sour cream.', 'Crispy tortilla chips topped with melted cheese and toppings.', '2025-06-13 22:16:33', '2025-07-03 03:08:06'),
(13, 'Garlic Bread', 180, 'starter', 13, 1, 'food-1749896253.jpg', 'Baguette, butter, garlic, parsley, olive oil.', 'Toasted bread topped with garlic butter and herbs.', '2025-06-13 22:17:33', '2025-07-03 03:08:12');

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
(54, '2025_06_28_070038_create_expenses_table', 3),
(57, '2025_07_01_045539_create_stocks_table', 4);

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
(99, '2025-07-03', 2025070315, 4, 180, NULL, NULL, NULL, NULL, 4, 1, '2025-07-03 03:08:04', '2025-07-03 03:21:49'),
(100, '2025-07-03', 2025070316, 9, 550, 0, 550, 200, 350, 4, 3, '2025-07-03 03:08:10', '2025-07-03 03:57:35'),
(101, '2025-07-03', 2025070317, 10, 180, 0, 180, 180, 0, 3, 2, '2025-07-03 03:08:15', '2025-07-03 03:59:31');

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
(156, 0, '2025-07-03', 6, 20, 0, 'N/A', 2, '2025-07-03 01:05:07', '2025-07-03 01:05:07'),
(157, 0, '2025-07-03', 7, 20, 0, 'N/A', 2, '2025-07-03 01:05:10', '2025-07-03 01:05:10'),
(158, 0, '2025-07-03', 8, 20, 0, 'N/A', 2, '2025-07-03 01:05:13', '2025-07-03 01:05:13'),
(159, 0, '2025-07-03', 9, 20, 0, 'N/A', 2, '2025-07-03 01:05:16', '2025-07-03 01:05:16'),
(160, 0, '2025-07-03', 11, 20, 0, 'N/A', 2, '2025-07-03 01:05:19', '2025-07-03 01:05:19'),
(161, 0, '2025-07-03', 12, 20, 0, 'N/A', 2, '2025-07-03 01:05:23', '2025-07-03 01:05:23'),
(162, 0, '2025-07-03', 13, 20, 0, 'N/A', 2, '2025-07-03 01:05:26', '2025-07-03 01:05:26'),
(163, 2025070311, '2025-07-03', 6, 0, 1, NULL, 1, '2025-07-03 01:05:37', '2025-07-03 01:05:37'),
(164, 2025070311, '2025-07-03', 7, 0, 1, NULL, 1, '2025-07-03 01:05:38', '2025-07-03 01:05:38'),
(165, 2025070311, '2025-07-03', 8, 0, 1, NULL, 1, '2025-07-03 01:05:38', '2025-07-03 01:05:38'),
(166, 2025070311, '2025-07-03', 9, 0, 1, NULL, 1, '2025-07-03 01:05:38', '2025-07-03 01:05:38'),
(167, 2025070311, '2025-07-03', 11, 0, 1, NULL, 1, '2025-07-03 01:05:40', '2025-07-03 01:05:40'),
(168, 2025070311, '2025-07-03', 12, 0, 1, NULL, 1, '2025-07-03 01:05:40', '2025-07-03 01:05:40'),
(169, 2025070311, '2025-07-03', 13, 0, 1, NULL, 1, '2025-07-03 01:05:41', '2025-07-03 01:05:41'),
(170, 2025070312, '2025-07-03', 6, 0, 3, NULL, 1, '2025-07-03 01:07:13', '2025-07-03 01:07:23'),
(171, 2025070312, '2025-07-03', 7, 0, 3, NULL, 1, '2025-07-03 01:07:14', '2025-07-03 01:07:22'),
(172, 2025070312, '2025-07-03', 8, 0, 3, NULL, 1, '2025-07-03 01:07:14', '2025-07-03 01:07:21'),
(173, 2025070312, '2025-07-03', 13, 0, 3, NULL, 1, '2025-07-03 01:07:15', '2025-07-03 01:07:24'),
(174, 2025070312, '2025-07-03', 11, 0, 3, NULL, 1, '2025-07-03 01:07:16', '2025-07-03 01:07:25'),
(175, 2025070313, '2025-07-03', 7, 0, 1, NULL, 1, '2025-07-03 02:59:51', '2025-07-03 02:59:51'),
(176, 2025070313, '2025-07-03', 8, 0, 1, NULL, 1, '2025-07-03 02:59:51', '2025-07-03 02:59:51'),
(177, 2025070313, '2025-07-03', 13, 0, 1, NULL, 1, '2025-07-03 02:59:52', '2025-07-03 02:59:52'),
(178, 2025070313, '2025-07-03', 12, 0, 1, NULL, 1, '2025-07-03 02:59:53', '2025-07-03 02:59:53'),
(179, 2025070313, '2025-07-03', 11, 0, 1, NULL, 1, '2025-07-03 02:59:53', '2025-07-03 02:59:53'),
(180, 2025070313, '2025-07-03', 6, 0, 1, NULL, 1, '2025-07-03 02:59:55', '2025-07-03 02:59:55'),
(181, 2025070314, '2025-07-03', 13, 0, 1, NULL, 1, '2025-07-03 03:04:27', '2025-07-03 03:04:27'),
(182, 2025070314, '2025-07-03', 12, 0, 1, NULL, 1, '2025-07-03 03:04:27', '2025-07-03 03:04:27'),
(183, 2025070314, '2025-07-03', 11, 0, 1, NULL, 1, '2025-07-03 03:04:27', '2025-07-03 03:04:27'),
(184, 2025070315, '2025-07-03', 9, 0, 1, NULL, 1, '2025-07-03 03:08:01', '2025-07-03 03:08:01'),
(185, 2025070316, '2025-07-03', 12, 0, 1, NULL, 1, '2025-07-03 03:08:06', '2025-07-03 03:08:06'),
(186, 2025070316, '2025-07-03', 11, 0, 1, NULL, 1, '2025-07-03 03:08:07', '2025-07-03 03:08:07'),
(187, 2025070317, '2025-07-03', 13, 0, 1, NULL, 1, '2025-07-03 03:08:12', '2025-07-03 03:08:12');

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
(3, 'N3B', 1, 'N/A', '2025-06-12 21:06:18', '2025-07-02 01:44:29'),
(4, 'N3A', 3, 'N/A', '2025-06-12 21:06:31', '2025-07-03 03:08:04'),
(5, 'N3D', 3, 'N/A', '2025-06-12 21:12:37', '2025-07-02 23:07:44'),
(7, 'S2A', 3, 'N/A', '2025-06-12 21:30:13', '2025-07-02 04:25:54'),
(8, 'S2B', 1, 'N/A', '2025-06-12 21:30:23', '2025-07-03 03:07:39'),
(9, 'S2C', 1, 'N/A', '2025-06-12 21:30:32', '2025-07-03 03:21:21'),
(10, 'S2D', 1, 'N/A', '2025-06-12 21:45:09', '2025-07-03 03:15:19'),
(11, 'N2A', 1, 'N/A', '2025-06-13 21:32:15', '2025-07-03 01:07:38'),
(12, 'N2B', 1, 'N/A', '2025-06-13 21:32:22', '2025-06-22 17:48:53'),
(13, 'N2C', 1, 'N/A', '2025-06-13 21:32:29', '2025-06-26 02:37:36'),
(14, 'N2D', 1, 'N/A', '2025-06-13 21:32:35', '2025-06-26 04:15:02'),
(15, 'S3A', 1, 'N/A', '2025-06-17 22:16:07', '2025-07-01 03:54:16'),
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

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
