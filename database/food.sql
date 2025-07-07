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
(9, 'Chicken Wings', 180, 'starter', 17, 1, 'food-1749880468.jpg', 'Chicken wings, flour, chili powder, garlic, butter, vinegar.', 'Spicy and crispy deep-fried chicken wings served with hot sauce.', '2025-06-13 17:54:28', '2025-07-04 02:17:12'),
(11, 'Vegetable Spring Rolls', 230, 'starter', 12, 1, 'food-1749885187.jpg', 'Carrot, cabbage, onion, noodles, flour wrap, soy sauce.', 'Crispy rolls stuffed with vegetables and noodles.', '2025-06-13 19:13:07', '2025-07-04 02:17:15'),
(12, 'Nachos', 320, 'starter', 15, 1, 'food-1749896193.jpg', 'Corn tortilla chips, cheddar cheese, jalapeños, salsa, sour cream.', 'Crispy tortilla chips topped with melted cheese and toppings.', '2025-06-13 22:16:33', '2025-07-04 02:17:14'),
(13, 'Garlic Bread', 180, 'starter', 12, 1, 'food-1749896253.jpg', 'Baguette, butter, garlic, parsley, olive oil.', 'Toasted bread topped with garlic butter and herbs.', '2025-06-13 22:17:33', '2025-07-04 02:17:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
