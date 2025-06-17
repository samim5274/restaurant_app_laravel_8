-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2025 at 09:10 AM
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
  `price` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `reg`, `date`, `userId`, `foodId`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 2025061711, '2025-06-17', 1, 6, 1, 450, '2025-06-16 22:46:38', '2025-06-16 22:46:38'),
(2, 2025061711, '2025-06-17', 1, 7, 1, 850, '2025-06-16 22:46:39', '2025-06-16 22:46:39'),
(3, 2025061712, '2025-06-17', 1, 8, 1, 450, '2025-06-16 22:46:44', '2025-06-16 22:46:44'),
(4, 2025061712, '2025-06-17', 1, 9, 1, 180, '2025-06-16 22:46:45', '2025-06-16 22:46:45'),
(5, 2025061713, '2025-06-17', 1, 11, 1, 230, '2025-06-16 22:46:48', '2025-06-16 22:46:48'),
(6, 2025061713, '2025-06-17', 1, 12, 1, 320, '2025-06-16 22:46:49', '2025-06-16 22:46:49'),
(7, 2025061714, '2025-06-17', 1, 6, 1, 450, '2025-06-16 22:49:10', '2025-06-16 22:49:10'),
(8, 2025061715, '2025-06-17', 1, 6, 1, 450, '2025-06-16 22:49:34', '2025-06-16 22:49:34'),
(9, 2025061716, '2025-06-17', 1, 7, 1, 850, '2025-06-16 22:51:28', '2025-06-16 22:51:28'),
(10, 2025061717, '2025-06-17', 1, 7, 2, 850, '2025-06-16 22:52:53', '2025-06-16 22:52:57'),
(11, 2025061718, '2025-06-17', 1, 9, 1, 180, '2025-06-16 22:57:54', '2025-06-16 22:57:54'),
(12, 2025061718, '2025-06-17', 1, 12, 2, 320, '2025-06-16 22:57:55', '2025-06-16 22:57:58'),
(13, 2025061718, '2025-06-17', 1, 13, 2, 180, '2025-06-16 22:57:56', '2025-06-16 22:58:01'),
(14, 2025061719, '2025-06-17', 1, 7, 1, 850, '2025-06-16 23:24:11', '2025-06-16 23:24:11'),
(15, 20250617110, '2025-06-17', 1, 12, 1, 320, '2025-06-16 23:24:16', '2025-06-16 23:24:16'),
(16, 20250617111, '2025-06-17', 1, 9, 1, 180, '2025-06-16 23:24:19', '2025-06-16 23:24:19'),
(17, 20250617112, '2025-06-17', 1, 9, 1, 180, '2025-06-16 23:29:01', '2025-06-16 23:29:01'),
(18, 20250617113, '2025-06-17', 1, 9, 1, 180, '2025-06-16 23:29:05', '2025-06-16 23:29:05'),
(19, 20250617114, '2025-06-17', 1, 6, 1, 450, '2025-06-16 23:29:08', '2025-06-16 23:29:08'),
(20, 20250617115, '2025-06-17', 1, 6, 4, 450, '2025-06-16 23:29:11', '2025-06-16 23:29:14'),
(21, 20250617116, '2025-06-17', 1, 13, 1, 180, '2025-06-16 23:59:41', '2025-06-16 23:59:41'),
(22, 20250617117, '2025-06-17', 1, 6, 1, 450, '2025-06-17 00:17:58', '2025-06-17 00:17:58'),
(23, 20250617118, '2025-06-17', 1, 6, 1, 450, '2025-06-17 01:02:56', '2025-06-17 01:02:56');

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
(13, 'Garlic Bread', 180, 'starter', 5, 1, 'food-1749896253.jpg', 'Baguette, butter, garlic, parsley, olive oil.', 'Toasted bread topped with garlic butter and herbs.', '2025-06-14 04:17:33', '2025-06-16 07:11:47');

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
(42, '2025_06_14_122619_create_orders_table', 4),
(43, '2025_06_15_044735_create_carts_table', 4);

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
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `reg`, `tableId`, `total`, `discount`, `payable`, `pay`, `due`, `status`, `created_at`, `updated_at`) VALUES
(1, '2025-06-17', 2025061711, 3, 1300, 100, 1200, 1200, 0, 2, '2025-06-16 22:46:42', '2025-06-16 22:47:48'),
(2, '2025-06-17', 2025061712, 11, 630, 30, 600, 50, 550, 3, '2025-06-16 22:46:47', '2025-06-17 00:41:44'),
(3, '2025-06-17', 2025061713, 13, 550, 50, 500, 500, 0, 2, '2025-06-16 22:46:52', '2025-06-16 22:47:01'),
(4, '2025-06-17', 2025061714, 9, 450, 0, 450, 450, 0, 2, '2025-06-16 22:49:12', '2025-06-16 22:49:18'),
(5, '2025-06-17', 2025061715, 4, 450, 0, 450, 450, 0, 2, '2025-06-16 22:49:37', '2025-06-16 22:49:44'),
(6, '2025-06-17', 2025061716, 12, 850, 50, 800, 800, 0, 2, '2025-06-16 22:51:32', '2025-06-16 22:51:41'),
(7, '2025-06-17', 2025061717, 4, 1700, 200, 1500, 1500, 0, 2, '2025-06-16 22:52:58', '2025-06-16 22:53:08'),
(8, '2025-06-17', 2025061718, 9, 1180, 0, 1180, 0, 1180, 3, '2025-06-16 22:58:03', '2025-06-16 23:29:38'),
(9, '2025-06-17', 2025061719, 10, 850, 0, 850, 110, 40, 3, '2025-06-16 23:24:13', '2025-06-16 23:28:34'),
(10, '2025-06-17', 20250617110, 11, 320, NULL, NULL, NULL, NULL, 1, '2025-06-16 23:24:18', '2025-06-16 23:24:18'),
(11, '2025-06-17', 20250617111, 5, 180, 0, 180, 180, 0, 2, '2025-06-16 23:24:21', '2025-06-16 23:26:46'),
(12, '2025-06-17', 20250617112, 3, 180, 0, 180, 0, 180, 3, '2025-06-16 23:29:04', '2025-06-16 23:29:35'),
(13, '2025-06-17', 20250617113, 5, 180, NULL, NULL, NULL, NULL, 1, '2025-06-16 23:29:07', '2025-06-16 23:29:07'),
(14, '2025-06-17', 20250617114, 7, 450, 0, 450, 200, 250, 3, '2025-06-16 23:29:10', '2025-06-16 23:29:24'),
(15, '2025-06-17', 20250617115, 12, 1800, 0, 1800, 200, 1000, 3, '2025-06-16 23:29:16', '2025-06-16 23:47:39'),
(16, '2025-06-17', 20250617116, 7, 180, 0, 180, 0, 180, 3, '2025-06-16 23:59:43', '2025-06-16 23:59:54'),
(17, '2025-06-17', 20250617117, 3, 450, 150, 300, 0, 300, 3, '2025-06-17 00:18:02', '2025-06-17 00:41:18'),
(18, '2025-06-17', 20250617118, 3, 450, 100, 350, 0, 350, 3, '2025-06-17 01:02:59', '2025-06-17 01:09:12');

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
(1, 'N3C', 3, 'N/A', '2025-06-13 03:05:52', '2025-06-16 07:06:19'),
(3, 'N3B', 1, 'N/A', '2025-06-13 03:06:18', '2025-06-17 01:03:06'),
(4, 'N3A', 1, 'N/A', '2025-06-13 03:06:31', '2025-06-16 22:53:08'),
(5, 'N3D', 3, 'N/A', '2025-06-13 03:12:37', '2025-06-16 23:29:07'),
(7, 'S2A', 1, 'N/A', '2025-06-13 03:30:13', '2025-06-16 23:59:54'),
(8, 'S2B', 3, 'N/A', '2025-06-13 03:30:23', '2025-06-16 22:29:10'),
(9, 'S2C', 1, 'N/A', '2025-06-13 03:30:32', '2025-06-16 23:29:38'),
(10, 'S2D', 1, 'N/A', '2025-06-13 03:45:09', '2025-06-16 23:24:35'),
(11, 'N2A', 3, 'N/A', '2025-06-14 03:32:15', '2025-06-16 23:24:18'),
(12, 'N2B', 1, 'N/A', '2025-06-14 03:32:22', '2025-06-16 23:29:31'),
(13, 'N2C', 1, 'N/A', '2025-06-14 03:32:29', '2025-06-16 22:47:01'),
(14, 'N2D', 1, 'N/A', '2025-06-14 03:32:35', '2025-06-16 22:42:44');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
