-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 28, 2025 at 12:17 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
