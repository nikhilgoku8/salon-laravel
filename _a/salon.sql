-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 12, 2026 at 06:20 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `fname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fname`, `email`, `password`, `role`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$12$h04hzwJl6kLDX6T/mo6lWuOF98x2OJjvX6Ph9rZgEpQRu3gRNELAy', 'superadmin', '2026-01-12 05:38:02', '2026-01-09 01:46:36', '2026-01-12 00:08:02');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `fname` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_id` bigint UNSIGNED DEFAULT NULL,
  `package_title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` int NOT NULL,
  `slot_id` bigint UNSIGNED NOT NULL,
  `booking_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'pending, confirmed, cancelled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_services`
--

CREATE TABLE `booking_services` (
  `id` bigint UNSIGNED NOT NULL,
  `booking_id` bigint UNSIGNED NOT NULL,
  `service_id` bigint UNSIGNED NOT NULL,
  `service_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'WAXING (Regular & Rica)', 'waxing-regular-and-rica', 1, '2026-01-09 02:12:51', '2026-01-09 02:12:51'),
(2, 'FACIALS & CLEANUPS', 'facials-and-cleanups', 2, '2026-01-09 02:12:59', '2026-01-09 02:12:59'),
(3, 'THREADING & BLEACH', 'threading-and-bleach', 3, '2026-01-09 02:13:05', '2026-01-09 02:13:05'),
(4, 'MANICURE & PEDICURE', 'manicure-and-pedicure', 4, '2026-01-09 02:13:11', '2026-01-09 02:13:11'),
(5, 'HAIRCUT & HAIR CARE', 'haircut-and-hair-care', 5, '2026-01-09 02:13:18', '2026-01-09 02:13:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2026_01_01_154803_create_admins_table', 1),
(2, '2026_01_01_154804_create_categories_table', 1),
(3, '2026_01_01_154809_create_sub_categories_table', 1),
(4, '2026_01_01_154816_create_services_table', 1),
(5, '2026_01_01_154838_create_packages_table', 1),
(6, '2026_01_01_154847_create_time_slots_table', 1),
(8, '2026_01_01_154853_create_booking_services_table', 1),
(10, '2026_01_01_154848_create_bookings_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` int NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `description`, `price`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Party Ready Pack', 'Party Ready Pack', 1999, 1, '2026-01-09 03:33:41', '2026-01-09 03:33:41'),
(2, 'Basic Pre-Bridal – 1 Day', 'Basic Pre-Bridal – 1 Day', 3499, 2, '2026-01-09 03:35:23', '2026-01-09 03:35:23'),
(3, 'Complete Pre-Bridal – 2 Days', 'Complete Pre-Bridal – 2 Days', 5499, 3, '2026-01-09 03:44:36', '2026-01-09 03:44:36'),
(4, 'Glow Combo', 'Glow Combo', 1299, 3, '2026-01-09 03:45:31', '2026-01-09 03:45:31'),
(5, 'Detan Duo', 'Detan Duo', 1199, 5, '2026-01-09 03:58:19', '2026-01-09 03:58:19'),
(6, 'Bridal Glow Pack', 'Bridal Glow Pack', 1799, 6, '2026-01-09 04:01:29', '2026-01-09 04:01:29'),
(7, 'Basic Wax Combo', 'Basic Wax Combo', 999, 7, '2026-01-09 04:02:35', '2026-01-09 04:02:35'),
(8, 'Rica Combo', 'Rica Combo', 999, 8, '2026-01-09 04:03:25', '2026-01-09 04:03:25'),
(9, 'Quick Groom Combo', 'Quick Groom Combo', 1249, 9, '2026-01-09 04:04:11', '2026-01-09 04:04:27'),
(10, 'Smooth & Shine', 'Smooth & Shine', 1349, 10, '2026-01-09 04:04:53', '2026-01-09 04:04:53'),
(11, 'Root Refresh', 'Root Refresh', 1299, 11, '2026-01-09 04:05:20', '2026-01-09 04:05:20'),
(12, 'Style Set', 'Style Set', 1499, 12, '2026-01-09 04:05:55', '2026-01-09 04:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `package_service`
--

CREATE TABLE `package_service` (
  `id` bigint UNSIGNED NOT NULL,
  `package_id` bigint UNSIGNED NOT NULL,
  `service_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_service`
--

INSERT INTO `package_service` (`id`, `package_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 1, 16, '2026-01-09 03:33:41', '2026-01-09 03:33:41'),
(2, 1, 12, '2026-01-09 03:33:41', '2026-01-09 03:33:41'),
(3, 1, 26, '2026-01-09 03:33:41', '2026-01-09 03:33:41'),
(4, 1, 30, '2026-01-09 03:33:41', '2026-01-09 03:33:41'),
(5, 1, 31, '2026-01-09 03:33:41', '2026-01-09 03:33:41'),
(6, 2, 4, '2026-01-09 03:35:23', '2026-01-09 03:35:23'),
(7, 2, 12, '2026-01-09 03:35:23', '2026-01-09 03:35:23'),
(8, 3, 25, '2026-01-09 03:44:36', '2026-01-09 03:44:36'),
(9, 3, 8, '2026-01-09 03:44:36', '2026-01-09 03:44:36'),
(10, 3, 21, '2026-01-09 03:44:36', '2026-01-09 03:44:36'),
(11, 3, 28, '2026-01-09 03:44:36', '2026-01-09 03:44:36'),
(12, 3, 32, '2026-01-09 03:44:36', '2026-01-09 03:44:36'),
(13, 4, 9, '2026-01-09 03:45:31', '2026-01-09 03:45:31'),
(14, 4, 11, '2026-01-09 03:45:31', '2026-01-09 03:45:31'),
(15, 5, 9, '2026-01-09 03:58:19', '2026-01-09 03:58:19'),
(16, 5, 24, '2026-01-09 03:58:19', '2026-01-09 03:58:19'),
(17, 6, 16, '2026-01-09 04:01:29', '2026-01-09 04:01:29'),
(18, 6, 17, '2026-01-09 04:01:29', '2026-01-09 04:01:29'),
(19, 6, 14, '2026-01-09 04:01:29', '2026-01-09 04:01:29'),
(20, 6, 21, '2026-01-09 04:01:29', '2026-01-09 04:01:29'),
(21, 7, 1, '2026-01-09 04:02:35', '2026-01-09 04:02:35'),
(22, 7, 2, '2026-01-09 04:02:35', '2026-01-09 04:02:35'),
(23, 7, 3, '2026-01-09 04:02:35', '2026-01-09 04:02:35'),
(24, 8, 5, '2026-01-09 04:03:25', '2026-01-09 04:03:25'),
(25, 8, 6, '2026-01-09 04:03:25', '2026-01-09 04:03:25'),
(26, 8, 7, '2026-01-09 04:03:25', '2026-01-09 04:03:25'),
(27, 9, 4, '2026-01-09 04:04:11', '2026-01-09 04:04:11'),
(28, 9, 19, '2026-01-09 04:04:11', '2026-01-09 04:04:11'),
(29, 9, 21, '2026-01-09 04:04:11', '2026-01-09 04:04:11'),
(30, 10, 30, '2026-01-09 04:04:53', '2026-01-09 04:04:53'),
(31, 10, 32, '2026-01-09 04:04:53', '2026-01-09 04:04:53'),
(32, 11, 32, '2026-01-09 04:05:20', '2026-01-09 04:05:20'),
(33, 11, 33, '2026-01-09 04:05:20', '2026-01-09 04:05:20'),
(34, 12, 29, '2026-01-09 04:05:55', '2026-01-09 04:05:55'),
(35, 12, 30, '2026-01-09 04:05:55', '2026-01-09 04:05:55'),
(36, 12, 31, '2026-01-09 04:05:55', '2026-01-09 04:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `sub_category_id` bigint UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `sub_category_id`, `title`, `slug`, `price`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Full Arms Regular Wax', 'full-arms-regular-wax', 299, 1, '2026-01-09 02:15:31', '2026-01-09 05:34:03'),
(2, 1, 'Full Legs Regular Wax', 'full-legs-regular-wax', 349, 2, '2026-01-09 02:15:52', '2026-01-09 05:34:07'),
(3, 1, 'Underarms Regular Wax', 'underarms-regular-wax', 169, 3, '2026-01-09 02:16:05', '2026-01-09 05:34:11'),
(4, 1, 'Full Body (Arms + Legs + Underarms) Regular Wax', 'full-body-arms-legs-underarms-regular-wax', 549, 4, '2026-01-09 02:16:22', '2026-01-09 05:34:15'),
(5, 2, 'Full Arms Rica Wax', 'full-arms-rica-wax', 499, 1, '2026-01-09 02:16:57', '2026-01-09 05:37:39'),
(6, 2, 'Full Legs Rica Wax', 'full-legs-rica-wax', 599, 2, '2026-01-09 02:17:10', '2026-01-09 05:37:45'),
(7, 2, 'Underarms Rica Wax', 'underarms-rica-wax', 249, 3, '2026-01-09 02:17:22', '2026-01-09 05:37:48'),
(8, 2, 'Full Body (Arms + Legs + Underarms) Rica Wax', 'full-body-arms-legs-underarms-rica-wax', 1099, 4, '2026-01-09 02:17:36', '2026-01-09 05:37:52'),
(9, 3, 'Detan Cleanup', 'detan-cleanup', 499, 1, '2026-01-09 02:18:00', '2026-01-09 02:18:00'),
(10, 3, 'Fruit Cleanup', 'fruit-cleanup', 599, 2, '2026-01-09 02:18:12', '2026-01-09 02:18:12'),
(11, 4, 'Fruit Facial', 'fruit-facial', 649, 1, '2026-01-09 02:18:27', '2026-01-09 02:18:27'),
(12, 4, 'Gold Facial', 'gold-facial', 799, 2, '2026-01-09 02:18:40', '2026-01-09 02:18:40'),
(13, 4, 'Pearl Facial', 'pearl-facial', 849, 3, '2026-01-09 02:18:52', '2026-01-09 02:18:52'),
(14, 4, 'O3+ Facial', 'o3-facial', 1049, 4, '2026-01-09 02:19:06', '2026-01-09 02:19:06'),
(15, 4, 'Anti-Ageing Facial', 'anti-ageing-facial', 1299, 5, '2026-01-09 02:19:20', '2026-01-09 02:19:20'),
(16, 5, 'Eyebrows Threading', 'eyebrows-threading', 149, 1, '2026-01-09 02:19:37', '2026-01-09 05:38:18'),
(17, 5, 'Upper Lip Threading', 'upper-lip-threading', 129, 2, '2026-01-09 02:19:51', '2026-01-09 05:38:25'),
(18, 5, 'Forehead Threading', 'forehead-threading', 139, 3, '2026-01-09 02:20:05', '2026-01-09 05:38:32'),
(19, 5, 'Full Face Threading', 'full-face-threading', 249, 4, '2026-01-09 02:20:20', '2026-01-09 02:20:20'),
(20, 6, 'Face Bleach', 'face-bleach', 349, 1, '2026-01-09 02:20:34', '2026-01-09 02:20:34'),
(21, 6, 'Face + Neck Bleach', 'face-neck-bleach', 399, 2, '2026-01-09 02:20:49', '2026-01-09 02:20:49'),
(22, 6, 'Detan Pack (Face + Neck)', 'detan-pack-face-neck', 449, 3, '2026-01-09 02:21:05', '2026-01-09 02:21:05'),
(23, 7, 'Classic Manicure', 'classic-manicure', 499, 1, '2026-01-09 02:21:21', '2026-01-09 02:21:21'),
(24, 7, 'Detan Manicure', 'detan-manicure', 599, 2, '2026-01-09 02:21:33', '2026-01-09 02:21:33'),
(25, 7, 'Gel Manicure', 'gel-manicure', 799, 3, '2026-01-09 02:21:46', '2026-01-09 02:21:46'),
(26, 8, 'Classic Pedicure', 'classic-pedicure', 599, 1, '2026-01-09 03:29:53', '2026-01-09 03:29:53'),
(27, 8, 'Detan Pedicure', 'detan-pedicure', 699, 2, '2026-01-09 03:30:05', '2026-01-09 03:30:05'),
(28, 8, 'Gel Pedicure', 'gel-pedicure', 849, 3, '2026-01-09 03:30:18', '2026-01-09 03:30:18'),
(29, 9, 'Haircut (Any Length)', 'haircut-any-length', 399, 1, '2026-01-09 03:30:36', '2026-01-09 03:30:36'),
(30, 9, 'Blow Dry', 'blow-dry', 399, 2, '2026-01-09 03:30:47', '2026-01-09 05:39:55'),
(31, 9, 'Hair Ironing', 'hair-ironing', 499, 3, '2026-01-09 03:30:59', '2026-01-09 05:40:26'),
(32, 10, 'Hair Spa (Any Length)', 'hair-spa-any-length', 699, 1, '2026-01-09 03:31:16', '2026-01-09 03:31:16'),
(33, 10, 'Root Touch-Up', 'root-touch-up', 499, 2, '2026-01-09 03:31:30', '2026-01-09 03:31:30'),
(34, 10, 'Global Hair Colour – Short Hair', 'global-hair-colour-short-hair', 799, 3, '2026-01-09 03:31:49', '2026-01-09 03:31:49'),
(35, 10, 'Global Hair Colour – Long Hair', 'global-hair-colour-long-hair', 1099, 4, '2026-01-09 03:32:07', '2026-01-09 03:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `title`, `slug`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Regular Wax', 'regular-wax', 1, '2026-01-09 02:13:39', '2026-01-09 02:13:39'),
(2, 1, 'Rica Wax', 'rica-wax', 2, '2026-01-09 02:13:48', '2026-01-09 02:13:48'),
(3, 2, 'Cleanups', 'cleanups', 1, '2026-01-09 02:13:58', '2026-01-09 02:13:58'),
(4, 2, 'Facials', 'facials', 2, '2026-01-09 02:14:05', '2026-01-09 02:14:05'),
(5, 3, 'Threading', 'threading', 1, '2026-01-09 02:14:14', '2026-01-09 02:14:14'),
(6, 3, 'Bleach & Detan', 'bleach-and-detan', 2, '2026-01-09 02:14:22', '2026-01-09 02:14:22'),
(7, 4, 'Manicure', 'manicure', 1, '2026-01-09 02:14:31', '2026-01-09 02:14:31'),
(8, 4, 'Pedicure', 'pedicure', 2, '2026-01-09 02:14:38', '2026-01-09 02:14:38'),
(9, 5, 'Haircuts & Styling', 'haircuts-and-styling', 1, '2026-01-09 02:14:48', '2026-01-09 02:14:48'),
(10, 5, 'Hair Spa & Colour', 'hair-spa-and-colour', 2, '2026-01-09 02:14:58', '2026-01-09 02:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `time_slots`
--

CREATE TABLE `time_slots` (
  `id` bigint UNSIGNED NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_slots`
--

INSERT INTO `time_slots` (`id`, `start_time`, `end_time`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '09:00:00', '10:00:00', 1, '2026-01-09 04:06:26', '2026-01-09 04:06:26'),
(2, '10:00:00', '11:00:00', 1, '2026-01-09 04:06:34', '2026-01-09 04:06:34'),
(3, '11:00:00', '12:00:00', 1, '2026-01-09 04:06:45', '2026-01-09 04:06:45'),
(4, '12:00:00', '13:00:00', 1, '2026-01-09 04:07:25', '2026-01-09 04:07:25'),
(5, '13:00:00', '14:00:00', 1, '2026-01-09 04:07:39', '2026-01-09 04:07:39'),
(6, '14:00:00', '15:00:00', 1, '2026-01-09 04:07:45', '2026-01-09 04:07:45'),
(7, '15:00:00', '16:00:00', 1, '2026-01-09 04:07:51', '2026-01-09 04:07:51'),
(8, '16:00:00', '17:00:00', 1, '2026-01-09 04:07:59', '2026-01-09 04:07:59'),
(9, '17:00:00', '18:00:00', 1, '2026-01-09 04:08:05', '2026-01-09 04:08:05'),
(10, '18:00:00', '19:00:00', 1, '2026-01-09 04:08:11', '2026-01-09 04:08:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_package_id_foreign` (`package_id`),
  ADD KEY `bookings_slot_id_booking_date_index` (`slot_id`,`booking_date`);

--
-- Indexes for table `booking_services`
--
ALTER TABLE `booking_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_services_booking_id_foreign` (`booking_id`),
  ADD KEY `booking_services_service_id_foreign` (`service_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_service`
--
ALTER TABLE `package_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_service_package_id_foreign` (`package_id`),
  ADD KEY `package_service_service_id_foreign` (`service_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `time_slots`
--
ALTER TABLE `time_slots`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_services`
--
ALTER TABLE `booking_services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `package_service`
--
ALTER TABLE `package_service`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `time_slots`
--
ALTER TABLE `time_slots`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`),
  ADD CONSTRAINT `bookings_slot_id_foreign` FOREIGN KEY (`slot_id`) REFERENCES `time_slots` (`id`) ON DELETE RESTRICT;

--
-- Constraints for table `booking_services`
--
ALTER TABLE `booking_services`
  ADD CONSTRAINT `booking_services_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `booking_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE RESTRICT;

--
-- Constraints for table `package_service`
--
ALTER TABLE `package_service`
  ADD CONSTRAINT `package_service_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `package_service_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
