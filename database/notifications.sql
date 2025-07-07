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
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('06119a70-9a26-496c-851a-45e0c39cd6c6', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 3, '{\"reg\":2025070316,\"status\":\"2\",\"order_id\":100,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:41:34', '2025-07-03 04:41:34'),
('1a72e6ce-3c1b-4131-89b7-184865619c8e', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 1, '{\"reg\":2025070316,\"status\":\"3\",\"order_id\":100,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:35:30', '2025-07-03 04:35:30'),
('27f7ff12-8e8a-42b6-b6b7-261058fa9b9b', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 1, '{\"reg\":2025070317,\"status\":\"3\",\"order_id\":101,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:13:26', '2025-07-03 04:13:26'),
('2c62d27b-ea4a-486c-81fd-7f6afe3cdaea', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 1, '{\"reg\":2025070316,\"status\":\"4\",\"order_id\":100,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:45:22', '2025-07-03 04:45:22'),
('3144fa2e-8ad3-495f-bd07-6bd26434ead0', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 1, '{\"reg\":2025070316,\"status\":\"3\",\"order_id\":100,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:39:52', '2025-07-03 04:39:52'),
('36dcb802-e76c-4969-8c60-90cb1df54869', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 1, '{\"reg\":2025070317,\"status\":\"4\",\"order_id\":101,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:14:05', '2025-07-03 04:14:05'),
('42fd24b3-f29d-4f1a-a20a-e5cc26730f25', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 3, '{\"reg\":2025070316,\"status\":\"2\",\"order_id\":100,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:14:53', '2025-07-03 04:14:53'),
('53ebbf22-f9ad-4e49-9816-63185d25962c', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 3, '{\"reg\":2025070317,\"status\":\"4\",\"order_id\":101,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:46:01', '2025-07-03 04:46:01'),
('55b6bd8c-62c3-4599-803e-cd3ee41632fe', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 4, '{\"reg\":2025070418,\"status\":\"4\",\"order_id\":102,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-04 02:18:06', '2025-07-04 02:18:06'),
('644eef28-7852-4d52-9121-1560c64f2137', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 3, '{\"reg\":2025070316,\"status\":\"3\",\"order_id\":100,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:35:33', '2025-07-03 04:35:33'),
('65db3b9a-d34d-4323-b2d7-9a08c3ce6101', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 1, '{\"reg\":2025070317,\"status\":\"4\",\"order_id\":101,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:45:57', '2025-07-03 04:45:57'),
('6b5d145f-d525-4dcc-8eef-b9290c9dc6da', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 3, '{\"reg\":2025070317,\"status\":\"3\",\"order_id\":101,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:13:30', '2025-07-03 04:13:30'),
('70f1c11f-11e7-4f4b-ab49-5210ea4054f0', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 2, '{\"reg\":2025070418,\"status\":\"4\",\"order_id\":102,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-04 02:17:59', '2025-07-04 02:17:59'),
('7c5f4d7c-acc9-4e5a-ada8-dfafa03f6ccc', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 1, '{\"reg\":2025070317,\"status\":\"2\",\"order_id\":101,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:02:58', '2025-07-03 04:02:58'),
('813d8d40-1ecc-4550-899b-9ccdea0eb13a', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 1, '{\"reg\":2025070316,\"status\":\"2\",\"order_id\":100,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:41:30', '2025-07-03 04:41:30'),
('820aa79c-22e8-4421-9061-69a0f238646a', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 3, '{\"reg\":2025070316,\"status\":\"4\",\"order_id\":100,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:45:26', '2025-07-03 04:45:26'),
('8d9bdcae-5bd6-477f-befb-18c128694340', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 1, '{\"reg\":2025070316,\"status\":\"2\",\"order_id\":100,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:19:03', '2025-07-03 04:19:03'),
('9bb7f7ce-748c-42ac-a914-5c39b70e77e1', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 1, '{\"reg\":2025070316,\"status\":\"2\",\"order_id\":100,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:14:50', '2025-07-03 04:14:50'),
('a3535644-6e90-410b-8595-f6a7f5e01d57', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 3, '{\"reg\":2025070316,\"status\":\"4\",\"order_id\":100,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:20:35', '2025-07-03 04:20:35'),
('a69f9816-5d29-4695-b11f-77507793f286', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 1, '{\"reg\":2025070418,\"status\":\"4\",\"order_id\":102,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-04 02:17:56', '2025-07-04 02:17:56'),
('b39085fe-12e7-48a5-8076-fa4fa07dfafd', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 3, '{\"reg\":2025070316,\"status\":\"2\",\"order_id\":100,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:32:34', '2025-07-03 04:32:34'),
('b45cde3b-3cc3-4a4d-91c3-c26d14960c4e', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 3, '{\"reg\":2025070317,\"status\":\"2\",\"order_id\":101,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:03:01', '2025-07-03 04:03:01'),
('b57e508d-c70a-4e43-b80a-58091edd0bdf', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 3, '{\"reg\":2025070316,\"status\":\"2\",\"order_id\":100,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:36:18', '2025-07-03 04:36:18'),
('b640723f-9aeb-4fd6-a90c-f1fc6e6d1067', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 3, '{\"reg\":2025070316,\"status\":\"2\",\"order_id\":100,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:19:07', '2025-07-03 04:19:07'),
('b796328a-f8d9-4d1c-b101-6d4ef4f7c5f8', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 1, '{\"reg\":2025070316,\"status\":\"2\",\"order_id\":100,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:36:15', '2025-07-03 04:36:15'),
('bc1440ec-3459-46a5-b147-8bd708d58efb', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 3, '{\"reg\":2025070317,\"status\":\"4\",\"order_id\":101,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:14:08', '2025-07-03 04:14:08'),
('bc1fecdc-a8a4-41ec-8414-7b58bf4004c9', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 1, '{\"reg\":2025070316,\"status\":\"3\",\"order_id\":100,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:37:11', '2025-07-03 04:37:11'),
('c9be6e3f-f394-4836-965d-0f0020768aa2', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 3, '{\"reg\":2025070316,\"status\":\"3\",\"order_id\":100,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:37:14', '2025-07-03 04:37:14'),
('cbd15afa-1b88-4fdc-98bb-62158e7aa334', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 1, '{\"reg\":2025070316,\"status\":\"4\",\"order_id\":100,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:18:15', '2025-07-03 04:18:15'),
('cff48426-5ee5-4689-aeb6-501a5d0b5626', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 1, '{\"reg\":2025070316,\"status\":\"4\",\"order_id\":100,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:20:31', '2025-07-03 04:20:31'),
('d49fec4b-753d-4559-83f3-b43cf4edaae4', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 3, '{\"reg\":2025070418,\"status\":\"4\",\"order_id\":102,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-04 02:18:03', '2025-07-04 02:18:03'),
('e297e2b9-e7bd-4f5f-8d8f-d2c166259e4d', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 1, '{\"reg\":2025070316,\"status\":\"2\",\"order_id\":100,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:32:30', '2025-07-03 04:32:30'),
('f9b60c5d-4659-4e38-878b-2e4ca9d23581', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 3, '{\"reg\":2025070316,\"status\":\"4\",\"order_id\":100,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:18:18', '2025-07-03 04:18:18'),
('fc4ebf84-741c-4248-bdbb-1de6426bd7a9', 'App\\Notifications\\OrderStatusUpdated', 'App\\Models\\Admin', 3, '{\"reg\":2025070316,\"status\":\"3\",\"order_id\":100,\"message\":\"Order status has been updated.\"}', NULL, '2025-07-03 04:39:56', '2025-07-03 04:39:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
