-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2025 at 03:02 PM
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'samim', 'samim@gmail.com', '$2y$10$wKC61DMpRiv/YPTV9QPcPeaeYbYU899vQ62kYOzGELXGQ8PDBTGTa', NULL, NULL);

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
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `reg`, `date`, `userId`, `foodId`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(18, 2025061511, '2025-06-15', 1, 6, 1, 450.00, '2025-06-15 05:50:32', '2025-06-15 05:50:32'),
(19, 2025061511, '2025-06-15', 1, 7, 2, 850.00, '2025-06-15 05:50:33', '2025-06-15 05:50:37'),
(20, 2025061511, '2025-06-15', 1, 8, 1, 450.00, '2025-06-15 05:50:34', '2025-06-15 05:50:34'),
(21, 2025061511, '2025-06-15', 1, 9, 2, 180.00, '2025-06-15 05:50:35', '2025-06-15 05:50:38'),
(22, 2025061512, '2025-06-15', 1, 7, 1, 850.00, '2025-06-15 05:52:04', '2025-06-15 05:52:04'),
(24, 2025061513, '2025-06-15', 1, 7, 2, 850.00, '2025-06-15 06:51:30', '2025-06-15 06:51:36'),
(25, 2025061513, '2025-06-15', 1, 6, 3, 450.00, '2025-06-15 06:51:32', '2025-06-15 06:51:37'),
(26, 2025061513, '2025-06-15', 1, 11, 2, 230.00, '2025-06-15 06:51:33', '2025-06-15 06:51:35'),
(27, 2025061514, '2025-06-15', 1, 6, 1, 450.00, '2025-06-15 06:57:23', '2025-06-15 06:57:23'),
(28, 2025061514, '2025-06-15', 1, 7, 1, 850.00, '2025-06-15 06:57:24', '2025-06-15 06:57:24'),
(29, 2025061514, '2025-06-15', 1, 11, 1, 230.00, '2025-06-15 06:57:25', '2025-06-15 06:57:25'),
(30, 2025061515, '2025-06-15', 1, 13, 1, 180.00, '2025-06-15 06:57:33', '2025-06-15 06:57:33'),
(31, 2025061515, '2025-06-15', 1, 12, 1, 320.00, '2025-06-15 06:57:34', '2025-06-15 06:57:34'),
(32, 2025061515, '2025-06-15', 1, 11, 1, 230.00, '2025-06-15 06:57:34', '2025-06-15 06:57:34'),
(33, 2025061515, '2025-06-15', 1, 9, 1, 180.00, '2025-06-15 06:57:35', '2025-06-15 06:57:35'),
(34, 2025061516, '2025-06-15', 1, 9, 1, 180.00, '2025-06-15 06:58:10', '2025-06-15 06:58:10'),
(35, 2025061516, '2025-06-15', 1, 8, 1, 450.00, '2025-06-15 06:58:11', '2025-06-15 06:58:11'),
(36, 2025061517, '2025-06-15', 1, 6, 1, 450.00, '2025-06-15 06:58:17', '2025-06-15 06:58:17'),
(37, 2025061517, '2025-06-15', 1, 9, 1, 180.00, '2025-06-15 06:58:18', '2025-06-15 06:58:18'),
(38, 2025061517, '2025-06-15', 1, 11, 1, 230.00, '2025-06-15 06:58:18', '2025-06-15 06:58:18'),
(39, 2025061518, '2025-06-15', 1, 7, 1, 850.00, '2025-06-15 06:58:35', '2025-06-15 06:58:35'),
(40, 2025061519, '2025-06-15', 1, 11, 1, 230.00, '2025-06-15 06:58:40', '2025-06-15 06:58:40'),
(41, 2025061519, '2025-06-15', 1, 9, 1, 180.00, '2025-06-15 06:58:41', '2025-06-15 06:58:41'),
(42, 20250615110, '2025-06-15', 1, 7, 1, 850.00, '2025-06-15 06:58:46', '2025-06-15 06:58:46'),
(43, 20250615110, '2025-06-15', 1, 6, 1, 450.00, '2025-06-15 06:58:46', '2025-06-15 06:58:46'),
(44, 20250615111, '2025-06-15', 1, 11, 1, 230.00, '2025-06-15 06:58:50', '2025-06-15 06:58:50'),
(45, 20250615111, '2025-06-15', 1, 9, 1, 180.00, '2025-06-15 06:58:51', '2025-06-15 06:58:51'),
(46, 20250615112, '2025-06-15', 1, 12, 1, 320.00, '2025-06-15 06:58:55', '2025-06-15 06:58:55'),
(47, 20250615112, '2025-06-15', 1, 13, 1, 180.00, '2025-06-15 06:58:56', '2025-06-15 06:58:56'),
(48, 20250615113, '2025-06-15', 1, 7, 1, 850.00, '2025-06-15 06:59:00', '2025-06-15 06:59:00'),
(49, 20250615113, '2025-06-15', 1, 8, 1, 450.00, '2025-06-15 06:59:01', '2025-06-15 06:59:01'),
(50, 20250615113, '2025-06-15', 1, 9, 1, 180.00, '2025-06-15 06:59:01', '2025-06-15 06:59:01');

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
(6, 'Butter Chicken', 450, 'main', 12, 1, 'food-1749884892.jpg', 'Chicken, butter, tomato, cream, spices.', 'Tender chicken cooked in a creamy tomato-based sauce.', '2025-06-13 23:30:24', '2025-06-14 01:08:12'),
(7, 'Paneer Tikka Masala', 850, 'main', 12, 1, 'food-1749879095.jpg', 'Paneer, yogurt, tomato puree, onion, masala.', 'Grilled paneer cubes in a spicy tikka masala sauce.', '2025-06-13 23:31:35', '2025-06-14 04:42:20'),
(8, 'Grilled Salmon', 450, 'main', 5, 1, 'food-1749879251.jpg', 'Salmon, garlic, lemon, herbs, olive oil.', 'Fresh salmon grilled with herbs and lemon.', '2025-06-13 23:34:11', '2025-06-13 23:34:11'),
(9, 'Chicken Wings', 180, 'starter', 5, 1, 'food-1749880468.jpg', 'Chicken wings, flour, chili powder, garlic, butter, vinegar.', 'Spicy and crispy deep-fried chicken wings served with hot sauce.', '2025-06-13 23:54:28', '2025-06-14 02:09:58'),
(11, 'Vegetable Spring Rolls', 230, 'starter', 5, 1, 'food-1749885187.jpg', 'Carrot, cabbage, onion, noodles, flour wrap, soy sauce.', 'Crispy rolls stuffed with vegetables and noodles.', '2025-06-14 01:13:07', '2025-06-14 04:42:24'),
(12, 'Nachos', 320, 'starter', 12, 1, 'food-1749896193.jpg', 'Corn tortilla chips, cheddar cheese, jalapeños, salsa, sour cream.', 'Crispy tortilla chips topped with melted cheese and toppings.', '2025-06-14 04:16:33', '2025-06-14 04:16:33'),
(13, 'Garlic Bread', 180, 'starter', 5, 1, 'food-1749896253.jpg', 'Baguette, butter, garlic, parsley, olive oil.', 'Toasted bread topped with garlic butter and herbs.', '2025-06-14 04:17:33', '2025-06-14 04:42:27');

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
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2025_06_13_084624_create_tables_table', 1),
(16, '2025_06_13_120026_create_food_table', 2),
(17, '2025_06_14_115756_create_admins_table', 3),
(34, '2025_06_14_122619_create_orders_table', 4),
(35, '2025_06_15_044735_create_carts_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `reg` bigint(20) UNSIGNED NOT NULL,
  `tableId` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `reg`, `tableId`, `total`, `status`, `created_at`, `updated_at`) VALUES
(10, '2025-06-15', 2025061511, 14, 2960.00, 1, '2025-06-15 05:50:40', '2025-06-15 05:50:40'),
(11, '2025-06-15', 2025061512, 4, 850.00, 1, '2025-06-15 05:52:11', '2025-06-15 05:52:11'),
(12, '2025-06-15', 2025061513, 12, 3510.00, 1, '2025-06-15 06:51:40', '2025-06-15 06:51:40'),
(13, '2025-06-15', 2025061514, 9, 1530.00, 1, '2025-06-15 06:57:29', '2025-06-15 06:57:29'),
(14, '2025-06-15', 2025061515, 7, 910.00, 1, '2025-06-15 06:57:38', '2025-06-15 06:57:38'),
(15, '2025-06-15', 2025061516, 5, 630.00, 1, '2025-06-15 06:58:15', '2025-06-15 06:58:15'),
(16, '2025-06-15', 2025061517, 10, 860.00, 1, '2025-06-15 06:58:21', '2025-06-15 06:58:21'),
(17, '2025-06-15', 2025061518, 1, 850.00, 1, '2025-06-15 06:58:37', '2025-06-15 06:58:37'),
(18, '2025-06-15', 2025061519, 8, 410.00, 1, '2025-06-15 06:58:44', '2025-06-15 06:58:44'),
(19, '2025-06-15', 20250615110, 3, 1300.00, 1, '2025-06-15 06:58:49', '2025-06-15 06:58:49'),
(20, '2025-06-15', 20250615111, 11, 410.00, 1, '2025-06-15 06:58:54', '2025-06-15 06:58:54'),
(21, '2025-06-15', 20250615112, 13, 500.00, 1, '2025-06-15 06:58:59', '2025-06-15 06:58:59');

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
(1, 'N3C', 3, 'N/A', '2025-06-13 03:05:52', '2025-06-15 06:58:37'),
(3, 'N3B', 3, 'N/A', '2025-06-13 03:06:18', '2025-06-15 06:58:49'),
(4, 'N3A', 3, 'N/A', '2025-06-13 03:06:31', '2025-06-15 05:52:11'),
(5, 'N3D', 3, 'N/A', '2025-06-13 03:12:37', '2025-06-15 06:58:15'),
(7, 'S2A', 3, 'N/A', '2025-06-13 03:30:13', '2025-06-15 06:57:38'),
(8, 'S2B', 3, 'N/A', '2025-06-13 03:30:23', '2025-06-15 06:58:44'),
(9, 'S2C', 3, 'N/A', '2025-06-13 03:30:32', '2025-06-15 06:57:29'),
(10, 'S2D', 3, 'N/A', '2025-06-13 03:45:09', '2025-06-15 06:58:21'),
(11, 'N2A', 3, 'N/A', '2025-06-14 03:32:15', '2025-06-15 06:58:54'),
(12, 'N2B', 3, 'N/A', '2025-06-14 03:32:22', '2025-06-15 06:51:40'),
(13, 'N2C', 3, 'N/A', '2025-06-14 03:32:29', '2025-06-15 06:58:59'),
(14, 'N2D', 3, 'N/A', '2025-06-14 03:32:35', '2025-06-15 05:50:40');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
