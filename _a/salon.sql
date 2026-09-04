-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 04, 2026 at 02:18 PM
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
(1, 'Admin', 'admin@gmail.com', '$2y$12$h04hzwJl6kLDX6T/mo6lWuOF98x2OJjvX6Ph9rZgEpQRu3gRNELAy', 'superadmin', '2026-07-14 10:59:05', '2026-01-09 01:46:36', '2026-07-14 05:29:05');

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
  `payment_method` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'cod, online',
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'pending, confirmed, cancelled, failed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `fname`, `lname`, `email`, `phone`, `address`, `package_id`, `package_title`, `total_price`, `slot_id`, `booking_date`, `payment_method`, `start_time`, `end_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 169, 2, '2026-01-24', NULL, '10:00:00', '11:00:00', 'pending', '2026-01-23 07:08:42', '2026-01-23 07:08:42'),
(2, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 169, 2, '2026-01-24', NULL, '10:00:00', '11:00:00', 'pending', '2026-01-23 07:11:35', '2026-01-23 07:11:35'),
(3, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 169, 3, '2026-01-24', NULL, '11:00:00', '12:00:00', 'pending', '2026-01-23 07:12:43', '2026-01-23 07:12:43'),
(4, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 169, 3, '2026-01-24', NULL, '11:00:00', '12:00:00', 'pending', '2026-01-23 07:13:16', '2026-01-23 07:13:16'),
(5, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 169, 4, '2026-01-24', NULL, '12:00:00', '13:00:00', 'pending', '2026-01-23 07:14:35', '2026-01-23 07:14:35'),
(6, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 169, 1, '2026-01-24', NULL, '09:00:00', '10:00:00', 'cancelled', '2026-01-23 07:16:49', '2026-04-07 05:26:30'),
(7, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 169, 1, '2026-01-24', NULL, '09:00:00', '10:00:00', 'pending', '2026-01-23 07:19:49', '2026-01-23 07:19:49'),
(8, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 169, 4, '2026-01-24', NULL, '12:00:00', '13:00:00', 'pending', '2026-01-23 07:45:33', '2026-01-23 07:45:33'),
(9, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', 3, 'Complete Pre-Bridal – 2 Days', 5848, 5, '2026-01-24', NULL, '13:00:00', '14:00:00', 'pending', '2026-01-23 07:48:24', '2026-01-23 07:48:24'),
(10, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 718, 1, '2026-04-15', NULL, '09:00:00', '10:00:00', 'pending', '2026-04-03 02:01:32', '2026-04-03 02:01:32'),
(11, 'Test', 'LastName', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 4, 1, '2026-04-08', NULL, '09:00:00', '10:00:00', 'pending', '2026-04-07 05:25:19', '2026-04-07 05:25:19'),
(12, 'TEst', 'LastName', 'nikhilgoku8@gmail.com', '8879161283', '104 Eco House', NULL, NULL, 4, 1, '2026-04-08', 'online', '09:00:00', '10:00:00', 'pending', '2026-04-07 05:27:04', '2026-04-07 05:27:04'),
(13, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 4, 2, '2026-04-08', 'online', '10:00:00', '11:00:00', 'pending', '2026-04-07 05:29:25', '2026-04-07 05:29:25'),
(14, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 4, 2, '2026-04-08', 'online', '10:00:00', '11:00:00', 'pending', '2026-04-07 05:30:35', '2026-04-07 05:30:35'),
(15, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 4, 3, '2026-04-08', 'online', '11:00:00', '12:00:00', 'pending', '2026-04-07 05:38:29', '2026-04-07 05:38:29'),
(16, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 4, 3, '2026-04-08', 'online', '11:00:00', '12:00:00', 'pending', '2026-04-07 05:47:39', '2026-04-07 05:47:39'),
(17, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 2, 4, '2026-04-08', 'online', '12:00:00', '13:00:00', 'pending', '2026-04-07 05:51:21', '2026-04-07 05:51:21'),
(18, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 2, 4, '2026-04-08', 'online', '12:00:00', '13:00:00', 'pending', '2026-04-07 05:54:07', '2026-04-07 05:54:07'),
(19, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 2, 5, '2026-04-08', 'online', '13:00:00', '14:00:00', 'pending', '2026-04-07 06:20:15', '2026-04-07 06:20:15'),
(20, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 2, 5, '2026-04-08', 'online', '13:00:00', '14:00:00', 'pending', '2026-04-07 06:25:38', '2026-04-07 06:25:38'),
(21, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 2, 6, '2026-04-08', 'online', '14:00:00', '15:00:00', 'pending', '2026-04-07 06:31:11', '2026-04-07 06:31:11'),
(22, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 2, 1, '2026-04-09', 'online', '09:00:00', '10:00:00', 'pending', '2026-04-08 05:29:44', '2026-04-08 05:29:44'),
(23, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 4, 1, '2026-04-09', 'online', '09:00:00', '10:00:00', 'pending', '2026-04-08 05:31:43', '2026-04-08 05:31:43'),
(24, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 4, 2, '2026-04-09', 'online', '10:00:00', '11:00:00', 'pending', '2026-04-08 06:21:26', '2026-04-08 06:21:26'),
(25, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 2, 2, '2026-04-09', 'online', '10:00:00', '11:00:00', 'pending', '2026-04-08 06:22:00', '2026-04-08 06:22:00'),
(26, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 4, 3, '2026-04-09', 'online', '11:00:00', '12:00:00', 'pending', '2026-04-08 06:22:24', '2026-04-08 06:22:24'),
(27, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 4, 3, '2026-04-09', 'online', '11:00:00', '12:00:00', 'pending', '2026-04-08 06:40:43', '2026-04-08 06:40:43'),
(28, 'Water', 'Communications', 'nikhilhemantsonawane@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 4, 4, '2026-04-09', 'online', '12:00:00', '13:00:00', 'pending', '2026-04-08 06:43:25', '2026-04-08 06:43:25'),
(29, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', 1, 'Party Ready Pack', 2298, 4, '2026-04-09', 'online', '12:00:00', '13:00:00', 'pending', '2026-04-08 06:46:31', '2026-04-08 06:46:31'),
(30, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 4, 5, '2026-04-09', 'online', '13:00:00', '14:00:00', 'pending', '2026-04-08 07:17:43', '2026-04-08 07:17:43'),
(31, 'Water', 'Communications', 'nikhilgoku8@gmail.com', '8879161283', '302, Eco House, Near Udipi Hotel, Goregaon East', NULL, NULL, 551, 6, '2026-04-09', 'online', '14:00:00', '15:00:00', 'pending', '2026-04-08 07:25:54', '2026-04-08 07:25:54'),
(32, 'Nikhil', '-', 'nikhilhemantsonawane@gmail.com', '8879161283', 'Plot - 229, Room - 18, Visawa CHS, Gorai -2, Borivali west', 1, 'Party Ready Pack', 2348, 1, '2026-06-04', 'online', '09:00:00', '10:00:00', 'pending', '2026-06-02 08:33:12', '2026-06-02 08:33:12'),
(33, 'Nikhil', '-', 'nikhilhemantsonawane@gmail.com', '8879161283', 'Plot - 229, Room - 18, Visawa CHS, Gorai -2, Borivali west', NULL, NULL, 2053, 1, '2026-06-06', 'online', '09:00:00', '10:00:00', 'pending', '2026-06-04 03:18:42', '2026-06-04 03:18:42'),
(34, 'Nikhil', '-', 'nikhilhemantsonawane@gmail.com', '8879161283', 'Plot - 229, Room - 18, Visawa CHS, Gorai -2, Borivali west', NULL, NULL, 2398, 1, '2026-06-06', 'online', '09:00:00', '10:00:00', 'pending', '2026-06-04 03:30:14', '2026-06-04 03:30:14'),
(35, 'Nikhil', '-', 'nikhilhemantsonawane@gmail.com', '8879161283', 'Plot - 229, Room - 18, Visawa CHS, Gorai -2, Borivali west', NULL, NULL, 3047, 2, '2026-06-06', 'online', '10:00:00', '11:00:00', 'pending', '2026-06-04 03:41:27', '2026-06-04 03:41:27'),
(36, 'Nikhil', '-', 'nikhilhemantsonawane@gmail.com', '8879161283', 'Plot - 229, Room - 18, Visawa CHS, Gorai -2, Borivali west', NULL, NULL, 2697, 2, '2026-06-06', 'online', '10:00:00', '11:00:00', 'confirmed', '2026-06-04 03:47:21', '2026-06-04 03:48:10'),
(37, 'Nikhil', '-', 'nikhilhemantsonawane@gmail.com', '8879161283', 'Plot - 229, Room - 18, Visawa CHS, Gorai -2, Borivali west', NULL, NULL, 2596, 3, '2026-06-06', 'online', '11:00:00', '12:00:00', 'pending', '2026-06-04 03:50:10', '2026-06-04 03:50:10'),
(38, 'Nikhil', '-', 'nikhilhemantsonawane@gmail.com', '8879161283', 'Plot - 229, Room - 18, Visawa CHS, Gorai -2, Borivali west', NULL, NULL, 2497, 3, '2026-06-06', 'online', '11:00:00', '12:00:00', 'confirmed', '2026-06-04 03:50:50', '2026-06-04 03:51:24'),
(39, 'Nikhil', '-', 'nikhilhemantsonawane@gmail.com', '8879161283', 'Plot - 229, Room - 18, Visawa CHS, Gorai -2, Borivali west', NULL, NULL, 2447, 1, '2026-06-07', 'online', '09:00:00', '10:00:00', 'pending', '2026-06-04 04:01:02', '2026-06-04 04:01:02'),
(40, 'Nikhil', '-', 'nikhilhemantsonawane@gmail.com', '8879161283', 'Plot - 229, Room - 18, Visawa CHS, Gorai -2, Borivali west', NULL, NULL, 2416, 4, '2026-06-06', 'online', '12:00:00', '13:00:00', 'pending', '2026-06-04 04:33:20', '2026-06-04 04:33:20'),
(41, 'Nikhil', '-', 'nikhilhemantsonawane@gmail.com', '8879161283', 'Plot - 229, Room - 18, Visawa CHS, Gorai -2, Borivali west', 1, 'Party Ready Pack', 2001, 4, '2026-06-06', 'online', '12:00:00', '13:00:00', 'cancelled', '2026-06-04 06:24:55', '2026-06-04 06:25:06'),
(42, 'Nikhil', '-', 'nikhilhemantsonawane@gmail.com', '8879161283', 'Plot - 229, Room - 18, Visawa CHS, Gorai -2, Borivali west', 2, 'Basic Pre-Bridal – 1 Day', 3848, 4, '2026-06-06', 'online', '12:00:00', '13:00:00', 'failed', '2026-06-04 06:25:32', '2026-06-04 06:25:50'),
(43, 'Nikhil', '-', 'nikhilhemantsonawane@gmail.com', '8879161283', 'Plot - 229, Room - 18, Visawa CHS, Gorai -2, Borivali west', 2, 'Basic Pre-Bridal – 1 Day', 3501, 4, '2026-06-06', 'online', '12:00:00', '13:00:00', 'confirmed', '2026-06-04 06:28:46', '2026-06-04 06:29:20'),
(44, 'Nikhil', '-', 'nikhilhemantsonawane@gmail.com', '8879161283', 'Plot - 229, Room - 18, Visawa CHS, Gorai -2, Borivali west', 2, 'Basic Pre-Bridal – 1 Day', 3501, 5, '2026-06-06', 'online', '13:00:00', '14:00:00', 'failed', '2026-06-04 06:30:15', '2026-06-04 06:30:39'),
(45, 'Nikhil', '-', 'nikhilhemantsonawane@gmail.com', '8879161283', 'Plot - 229, Room - 18, Visawa CHS, Gorai -2, Borivali west', NULL, NULL, 2385, 1, '2026-07-05', 'cod', '09:00:00', '10:00:00', 'cancelled', '2026-07-03 08:07:36', '2026-07-03 08:07:47'),
(46, 'Nikhil', '-', 'nikhilhemantsonawane@gmail.com', '8879161283', 'Plot - 229, Room - 18, Visawa CHS, Gorai -2, Borivali west', NULL, NULL, 2447, 1, '2026-07-05', 'cod', '09:00:00', '10:00:00', 'confirmed', '2026-07-03 08:09:04', '2026-07-03 08:10:21'),
(47, 'Test', '-', 'nikhilgoku8@gmail.com', '8879161283', 'test', NULL, NULL, 2413, 1, '2026-07-16', 'cod', '09:00:00', '10:00:00', 'confirmed', '2026-07-14 05:29:59', '2026-07-14 05:29:59'),
(48, 'Test', '-', 'nikhilgoku8@gmail.com', '8879161283', 'TEst', NULL, NULL, 2447, 1, '2026-07-16', 'online', '09:00:00', '10:00:00', 'confirmed', '2026-07-14 05:34:02', '2026-07-14 05:34:02');

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

--
-- Dumping data for table `booking_services`
--

INSERT INTO `booking_services` (`id`, `booking_id`, `service_id`, `service_name`, `service_price`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Underarms Regular Wax', 169, '2026-01-23 07:08:42', '2026-01-23 07:08:42'),
(2, 2, 3, 'Underarms Regular Wax', 169, '2026-01-23 07:11:35', '2026-01-23 07:11:35'),
(3, 3, 3, 'Underarms Regular Wax', 169, '2026-01-23 07:12:43', '2026-01-23 07:12:43'),
(4, 4, 3, 'Underarms Regular Wax', 169, '2026-01-23 07:13:16', '2026-01-23 07:13:16'),
(5, 5, 3, 'Underarms Regular Wax', 169, '2026-01-23 07:14:35', '2026-01-23 07:14:35'),
(6, 6, 3, 'Underarms Regular Wax', 169, '2026-01-23 07:16:49', '2026-01-23 07:16:49'),
(7, 7, 3, 'Underarms Regular Wax', 169, '2026-01-23 07:19:49', '2026-01-23 07:19:49'),
(8, 8, 3, 'Underarms Regular Wax', 169, '2026-01-23 07:45:33', '2026-01-23 07:45:33'),
(9, 9, 25, 'Gel Manicure', 799, '2026-01-23 07:48:24', '2026-01-23 07:48:24'),
(10, 9, 8, 'Full Body (Arms + Legs + Underarms) Rica Wax', 1099, '2026-01-23 07:48:24', '2026-01-23 07:48:24'),
(11, 9, 21, 'Face + Neck Bleach', 399, '2026-01-23 07:48:24', '2026-01-23 07:48:24'),
(12, 9, 28, 'Gel Pedicure', 849, '2026-01-23 07:48:24', '2026-01-23 07:48:24'),
(13, 9, 32, 'Hair Spa (Any Length)', 699, '2026-01-23 07:48:24', '2026-01-23 07:48:24'),
(14, 9, 2, 'Full Legs Regular Wax', 349, '2026-01-23 07:48:24', '2026-01-23 07:48:24'),
(15, 10, 3, 'Underarms Regular Wax', 169, '2026-04-03 02:01:32', '2026-04-03 02:01:32'),
(16, 10, 4, 'Full Body (Arms + Legs + Underarms) Regular Wax', 549, '2026-04-03 02:01:32', '2026-04-03 02:01:32'),
(17, 11, 36, 'test 1', 2, '2026-04-07 05:25:19', '2026-04-07 05:25:19'),
(18, 11, 37, 'test 2', 2, '2026-04-07 05:25:19', '2026-04-07 05:25:19'),
(19, 12, 36, 'test 1', 2, '2026-04-07 05:27:04', '2026-04-07 05:27:04'),
(20, 12, 37, 'test 2', 2, '2026-04-07 05:27:04', '2026-04-07 05:27:04'),
(21, 13, 36, 'test 1', 2, '2026-04-07 05:29:25', '2026-04-07 05:29:25'),
(22, 13, 37, 'test 2', 2, '2026-04-07 05:29:25', '2026-04-07 05:29:25'),
(23, 14, 36, 'test 1', 2, '2026-04-07 05:30:35', '2026-04-07 05:30:35'),
(24, 14, 37, 'test 2', 2, '2026-04-07 05:30:35', '2026-04-07 05:30:35'),
(25, 15, 36, 'test 1', 2, '2026-04-07 05:38:29', '2026-04-07 05:38:29'),
(26, 15, 37, 'test 2', 2, '2026-04-07 05:38:29', '2026-04-07 05:38:29'),
(27, 16, 36, 'test 1', 2, '2026-04-07 05:47:39', '2026-04-07 05:47:39'),
(28, 16, 37, 'test 2', 2, '2026-04-07 05:47:39', '2026-04-07 05:47:39'),
(29, 17, 36, 'test 1', 2, '2026-04-07 05:51:21', '2026-04-07 05:51:21'),
(30, 18, 36, 'test 1', 2, '2026-04-07 05:54:07', '2026-04-07 05:54:07'),
(31, 19, 36, 'test 1', 2, '2026-04-07 06:20:15', '2026-04-07 06:20:15'),
(32, 20, 36, 'test 1', 2, '2026-04-07 06:25:38', '2026-04-07 06:25:38'),
(33, 21, 36, 'test 1', 2, '2026-04-07 06:31:11', '2026-04-07 06:31:11'),
(34, 22, 36, 'test 1', 2, '2026-04-08 05:29:44', '2026-04-08 05:29:44'),
(35, 23, 36, 'test 1', 2, '2026-04-08 05:31:43', '2026-04-08 05:31:43'),
(36, 23, 37, 'test 2', 2, '2026-04-08 05:31:43', '2026-04-08 05:31:43'),
(37, 24, 36, 'test 1', 2, '2026-04-08 06:21:26', '2026-04-08 06:21:26'),
(38, 24, 37, 'test 2', 2, '2026-04-08 06:21:26', '2026-04-08 06:21:26'),
(39, 25, 36, 'test 1', 2, '2026-04-08 06:22:00', '2026-04-08 06:22:00'),
(40, 26, 36, 'test 1', 2, '2026-04-08 06:22:24', '2026-04-08 06:22:24'),
(41, 26, 37, 'test 2', 2, '2026-04-08 06:22:24', '2026-04-08 06:22:24'),
(42, 27, 36, 'test 1', 2, '2026-04-08 06:40:43', '2026-04-08 06:40:43'),
(43, 27, 37, 'test 2', 2, '2026-04-08 06:40:43', '2026-04-08 06:40:43'),
(44, 28, 36, 'test 1', 2, '2026-04-08 06:43:25', '2026-04-08 06:43:25'),
(45, 28, 37, 'test 2', 2, '2026-04-08 06:43:25', '2026-04-08 06:43:25'),
(46, 29, 16, 'Eyebrows Threading', 149, '2026-04-08 06:46:31', '2026-04-08 06:46:31'),
(47, 29, 12, 'Gold Facial', 799, '2026-04-08 06:46:31', '2026-04-08 06:46:31'),
(48, 29, 26, 'Classic Pedicure', 599, '2026-04-08 06:46:31', '2026-04-08 06:46:31'),
(49, 29, 30, 'Blow Dry', 399, '2026-04-08 06:46:31', '2026-04-08 06:46:31'),
(50, 29, 31, 'Hair Ironing', 499, '2026-04-08 06:46:31', '2026-04-08 06:46:31'),
(51, 29, 1, 'Full Arms Regular Wax', 299, '2026-04-08 06:46:31', '2026-04-08 06:46:31'),
(52, 30, 36, 'test 1', 2, '2026-04-08 07:17:43', '2026-04-08 07:17:43'),
(53, 30, 37, 'test 2', 2, '2026-04-08 07:17:43', '2026-04-08 07:17:43'),
(54, 31, 36, 'test 1', 2, '2026-04-08 07:25:54', '2026-04-08 07:25:54'),
(55, 31, 4, 'Full Body (Arms + Legs + Underarms) Regular Wax', 549, '2026-04-08 07:25:54', '2026-04-08 07:25:54'),
(56, 32, 16, 'Eyebrows Threading', 149, '2026-06-02 08:33:12', '2026-06-02 08:33:12'),
(57, 32, 12, 'Gold Facial', 799, '2026-06-02 08:33:12', '2026-06-02 08:33:12'),
(58, 32, 26, 'Classic Pedicure', 599, '2026-06-02 08:33:12', '2026-06-02 08:33:12'),
(59, 32, 30, 'Blow Dry', 399, '2026-06-02 08:33:12', '2026-06-02 08:33:12'),
(60, 32, 31, 'Hair Ironing', 499, '2026-06-02 08:33:12', '2026-06-02 08:33:12'),
(61, 32, 2, 'Full Legs Regular Wax', 349, '2026-06-02 08:33:12', '2026-06-02 08:33:12'),
(62, 33, 1, 'Full Arms Regular Wax', 299, '2026-06-04 03:18:42', '2026-06-04 03:18:42'),
(63, 33, 2, 'Full Legs Regular Wax', 349, '2026-06-04 03:18:42', '2026-06-04 03:18:42'),
(64, 33, 3, 'Underarms Regular Wax', 169, '2026-06-04 03:18:42', '2026-06-04 03:18:42'),
(65, 33, 4, 'Full Body (Arms + Legs + Underarms) Regular Wax', 549, '2026-06-04 03:18:42', '2026-06-04 03:18:42'),
(66, 33, 16, 'Eyebrows Threading', 149, '2026-06-04 03:18:42', '2026-06-04 03:18:42'),
(67, 33, 18, 'Forehead Threading', 139, '2026-06-04 03:18:42', '2026-06-04 03:18:42'),
(68, 33, 29, 'Haircut (Any Length)', 399, '2026-06-04 03:18:42', '2026-06-04 03:18:42'),
(69, 34, 15, 'Anti-Ageing Facial', 1299, '2026-06-04 03:30:14', '2026-06-04 03:30:14'),
(70, 34, 35, 'Global Hair Colour – Long Hair', 1099, '2026-06-04 03:30:14', '2026-06-04 03:30:14'),
(71, 35, 8, 'Full Body (Arms + Legs + Underarms) Rica Wax', 1099, '2026-06-04 03:41:27', '2026-06-04 03:41:27'),
(72, 35, 11, 'Fruit Facial', 649, '2026-06-04 03:41:27', '2026-06-04 03:41:27'),
(73, 35, 15, 'Anti-Ageing Facial', 1299, '2026-06-04 03:41:27', '2026-06-04 03:41:27'),
(74, 36, 4, 'Full Body (Arms + Legs + Underarms) Regular Wax', 549, '2026-06-04 03:47:21', '2026-06-04 03:47:21'),
(75, 36, 9, 'Detan Cleanup', 499, '2026-06-04 03:47:21', '2026-06-04 03:47:21'),
(76, 36, 37, 'test 2', 2, '2026-06-04 03:47:21', '2026-06-04 03:47:21'),
(77, 36, 16, 'Eyebrows Threading', 149, '2026-06-04 03:47:21', '2026-06-04 03:47:21'),
(78, 36, 29, 'Haircut (Any Length)', 399, '2026-06-04 03:47:21', '2026-06-04 03:47:21'),
(79, 36, 8, 'Full Body (Arms + Legs + Underarms) Rica Wax', 1099, '2026-06-04 03:47:21', '2026-06-04 03:47:21'),
(80, 37, 2, 'Full Legs Regular Wax', 349, '2026-06-04 03:50:10', '2026-06-04 03:50:10'),
(81, 37, 4, 'Full Body (Arms + Legs + Underarms) Regular Wax', 549, '2026-06-04 03:50:10', '2026-06-04 03:50:10'),
(82, 37, 24, 'Detan Manicure', 599, '2026-06-04 03:50:10', '2026-06-04 03:50:10'),
(83, 37, 8, 'Full Body (Arms + Legs + Underarms) Rica Wax', 1099, '2026-06-04 03:50:10', '2026-06-04 03:50:10'),
(84, 38, 4, 'Full Body (Arms + Legs + Underarms) Regular Wax', 549, '2026-06-04 03:50:50', '2026-06-04 03:50:50'),
(85, 38, 8, 'Full Body (Arms + Legs + Underarms) Rica Wax', 1099, '2026-06-04 03:50:50', '2026-06-04 03:50:50'),
(86, 38, 28, 'Gel Pedicure', 849, '2026-06-04 03:50:50', '2026-06-04 03:50:50'),
(87, 39, 4, 'Full Body (Arms + Legs + Underarms) Regular Wax', 549, '2026-06-04 04:01:02', '2026-06-04 04:01:02'),
(88, 39, 25, 'Gel Manicure', 799, '2026-06-04 04:01:02', '2026-06-04 04:01:02'),
(89, 39, 8, 'Full Body (Arms + Legs + Underarms) Rica Wax', 1099, '2026-06-04 04:01:02', '2026-06-04 04:01:02'),
(90, 40, 3, 'Underarms Regular Wax', 169, '2026-06-04 04:33:20', '2026-06-04 04:33:20'),
(91, 40, 4, 'Full Body (Arms + Legs + Underarms) Regular Wax', 549, '2026-06-04 04:33:20', '2026-06-04 04:33:20'),
(92, 40, 10, 'Fruit Cleanup', 599, '2026-06-04 04:33:20', '2026-06-04 04:33:20'),
(93, 40, 8, 'Full Body (Arms + Legs + Underarms) Rica Wax', 1099, '2026-06-04 04:33:20', '2026-06-04 04:33:20'),
(94, 41, 16, 'Eyebrows Threading', 149, '2026-06-04 06:24:55', '2026-06-04 06:24:55'),
(95, 41, 12, 'Gold Facial', 799, '2026-06-04 06:24:55', '2026-06-04 06:24:55'),
(96, 41, 26, 'Classic Pedicure', 599, '2026-06-04 06:24:55', '2026-06-04 06:24:55'),
(97, 41, 30, 'Blow Dry', 399, '2026-06-04 06:24:55', '2026-06-04 06:24:55'),
(98, 41, 31, 'Hair Ironing', 499, '2026-06-04 06:24:55', '2026-06-04 06:24:55'),
(99, 41, 36, 'test 1', 2, '2026-06-04 06:24:55', '2026-06-04 06:24:55'),
(100, 42, 4, 'Full Body (Arms + Legs + Underarms) Regular Wax', 549, '2026-06-04 06:25:32', '2026-06-04 06:25:32'),
(101, 42, 12, 'Gold Facial', 799, '2026-06-04 06:25:32', '2026-06-04 06:25:32'),
(102, 42, 2, 'Full Legs Regular Wax', 349, '2026-06-04 06:25:32', '2026-06-04 06:25:32'),
(103, 43, 4, 'Full Body (Arms + Legs + Underarms) Regular Wax', 549, '2026-06-04 06:28:46', '2026-06-04 06:28:46'),
(104, 43, 12, 'Gold Facial', 799, '2026-06-04 06:28:46', '2026-06-04 06:28:46'),
(105, 43, 36, 'test 1', 2, '2026-06-04 06:28:46', '2026-06-04 06:28:46'),
(106, 44, 4, 'Full Body (Arms + Legs + Underarms) Regular Wax', 549, '2026-06-04 06:30:15', '2026-06-04 06:30:15'),
(107, 44, 12, 'Gold Facial', 799, '2026-06-04 06:30:15', '2026-06-04 06:30:15'),
(108, 44, 36, 'test 1', 2, '2026-06-04 06:30:15', '2026-06-04 06:30:15'),
(109, 45, 1, 'Full Arms Regular Wax', 299, '2026-07-03 08:07:36', '2026-07-03 08:07:36'),
(110, 45, 4, 'Full Body (Arms + Legs + Underarms) Regular Wax', 549, '2026-07-03 08:07:36', '2026-07-03 08:07:36'),
(111, 45, 10, 'Fruit Cleanup', 599, '2026-07-03 08:07:36', '2026-07-03 08:07:36'),
(112, 45, 18, 'Forehead Threading', 139, '2026-07-03 08:07:36', '2026-07-03 08:07:36'),
(113, 45, 25, 'Gel Manicure', 799, '2026-07-03 08:07:36', '2026-07-03 08:07:36'),
(114, 46, 4, 'Full Body (Arms + Legs + Underarms) Regular Wax', 549, '2026-07-03 08:09:04', '2026-07-03 08:09:04'),
(115, 46, 25, 'Gel Manicure', 799, '2026-07-03 08:09:04', '2026-07-03 08:09:04'),
(116, 46, 8, 'Full Body (Arms + Legs + Underarms) Rica Wax', 1099, '2026-07-03 08:09:04', '2026-07-03 08:09:04'),
(117, 47, 1, 'Full Arms Regular Wax', 299, '2026-07-14 05:29:59', '2026-07-14 05:29:59'),
(118, 47, 2, 'Full Legs Regular Wax', 349, '2026-07-14 05:29:59', '2026-07-14 05:29:59'),
(119, 47, 3, 'Underarms Regular Wax', 169, '2026-07-14 05:29:59', '2026-07-14 05:29:59'),
(120, 47, 4, 'Full Body (Arms + Legs + Underarms) Regular Wax', 549, '2026-07-14 05:29:59', '2026-07-14 05:29:59'),
(121, 47, 9, 'Detan Cleanup', 499, '2026-07-14 05:29:59', '2026-07-14 05:29:59'),
(122, 47, 16, 'Eyebrows Threading', 149, '2026-07-14 05:29:59', '2026-07-14 05:29:59'),
(123, 47, 29, 'Haircut (Any Length)', 399, '2026-07-14 05:29:59', '2026-07-14 05:29:59'),
(124, 48, 4, 'Full Body (Arms + Legs + Underarms) Regular Wax', 549, '2026-07-14 05:34:02', '2026-07-14 05:34:02'),
(125, 48, 25, 'Gel Manicure', 799, '2026-07-14 05:34:02', '2026-07-14 05:34:02'),
(126, 48, 8, 'Full Body (Arms + Legs + Underarms) Rica Wax', 1099, '2026-07-14 05:34:02', '2026-07-14 05:34:02');

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
(10, '2026_01_01_154848_create_bookings_table', 2),
(13, '2026_04_03_071048_create_payments_table', 3);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `booking_id` bigint UNSIGNED NOT NULL,
  `razorpay_order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razorpay_payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int NOT NULL,
  `error_json` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'pending, successful, cancelled, failed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `booking_id`, `razorpay_order_id`, `razorpay_payment_id`, `amount`, `error_json`, `status`, `created_at`, `updated_at`) VALUES
(1, 32, 'order_SwmxwWToX0zEm7', NULL, 2348, NULL, 'pending', '2026-06-02 08:33:13', '2026-06-02 08:33:13'),
(2, 33, 'order_SxUfzB0CBNVCWG', NULL, 2053, NULL, 'pending', '2026-06-04 03:18:42', '2026-06-04 03:18:42'),
(3, 34, 'order_SxUsA70m1HfYY0', NULL, 2398, NULL, 'pending', '2026-06-04 03:30:14', '2026-06-04 03:30:14'),
(4, 35, 'order_SxV40tz2ECEiSG', NULL, 3047, NULL, 'pending', '2026-06-04 03:41:27', '2026-06-04 03:41:27'),
(5, 36, 'order_SxVAFwwft4j6VU', 'pay_SxVAnBsfHwbzOq', 2697, NULL, 'successful', '2026-06-04 03:47:22', '2026-06-04 03:48:10'),
(6, 37, 'order_SxVDDgYp8ImFRA', NULL, 2596, NULL, 'pending', '2026-06-04 03:50:10', '2026-06-04 03:50:10'),
(7, 38, 'order_SxVDvecj5i2haY', 'pay_SxVECy0fcFZ6Nt', 2497, NULL, 'successful', '2026-06-04 03:50:50', '2026-06-04 03:51:24'),
(8, 39, 'order_SxVOhOHgWv1IUj', NULL, 2447, NULL, 'pending', '2026-06-04 04:01:02', '2026-06-04 04:01:02'),
(9, 40, 'order_SxVwojlGHadPkJ', NULL, 2416, '{\"code\":\"BAD_REQUEST_ERROR\",\"description\":\"Invalid Token\",\"source\":\"internal\",\"step\":\"payment_creation\",\"reason\":\"invalid_token\",\"metadata\":[]}', 'failed', '2026-06-04 04:33:20', '2026-06-04 04:33:40'),
(10, 41, 'order_SxXqhRBFDZXQ7o', NULL, 2001, '\"User Cancelled\"', 'cancelled', '2026-06-04 06:24:56', '2026-06-04 06:25:06'),
(11, 42, 'order_SxXrKhGeuzDH29', NULL, 3848, '{\"code\":\"BAD_REQUEST_ERROR\",\"description\":\"Invalid Token\",\"source\":\"internal\",\"step\":\"payment_creation\",\"reason\":\"invalid_token\",\"metadata\":[]}', 'failed', '2026-06-04 06:25:32', '2026-06-04 06:25:50'),
(12, 43, 'order_SxXulGHxkIGdV5', 'pay_SxXv1miSS6clne', 3501, NULL, 'successful', '2026-06-04 06:28:47', '2026-06-04 06:29:20'),
(13, 44, 'order_SxXwJuBDMojHp4', NULL, 3501, '{\"code\":\"BAD_REQUEST_ERROR\",\"description\":\"Payment failed\",\"source\":\"gateway\",\"step\":\"payment_authorization\",\"reason\":\"payment_failed\",\"metadata\":{\"payment_id\":\"pay_SxXwZiYsC1WRH8\",\"order_id\":\"order_SxXwJuBDMojHp4\"}}', 'failed', '2026-06-04 06:30:15', '2026-06-04 06:30:39'),
(14, 45, 'order_T935dw1sgosdZA', NULL, 358, '\"User Cancelled\"', 'cancelled', '2026-07-03 08:07:36', '2026-07-03 08:07:47'),
(15, 46, 'order_T937CRWCKSOUKD', 'pay_T938CppcI2BeTl', 367, NULL, 'successful', '2026-07-03 08:09:05', '2026-07-03 08:10:21'),
(16, 47, 'order_TDMFzIhs1a0oov', 'pay_TDMH946dD9ekJO', 362, NULL, 'successful', '2026-07-14 05:29:59', '2026-07-14 05:29:59'),
(17, 48, 'order_TDMKxEbEP8QDKB', 'pay_TDMLN9SuHGsN8a', 2447, NULL, 'successful', '2026-07-14 05:34:02', '2026-07-14 05:34:02');

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
(35, 10, 'Global Hair Colour – Long Hair', 'global-hair-colour-long-hair', 1099, 4, '2026-01-09 03:32:07', '2026-01-09 03:32:07'),
(36, 1, 'test 1', 'test-1', 2, 1, '2026-04-07 05:23:33', '2026-04-07 05:23:33'),
(37, 3, 'test 2', 'test-2', 2, 1, '2026-04-07 05:23:48', '2026-04-07 05:23:48');

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_booking_id_foreign` (`booking_id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `booking_services`
--
ALTER TABLE `booking_services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;

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
