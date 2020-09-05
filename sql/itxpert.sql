-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2020 at 08:33 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itxpert`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `is_super`, `remember_token`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Micronet Services admin', 'adarsh64681994@gmail.com', '$2y$10$Z7scAcv66o8m5yp8VJDRCOcywoyjz/s3q6EeaIqll9VaUnQl1A.mm', 0, 'P8d3fxI5usIiI7SUXULeh5Hvf5af4VzTQ31dIiyNdVBvtOhPuQ1Pd1bNAk6T', 'Admin1593270766.jpg', '2019-07-30 02:41:27', '2020-06-27 09:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(255) NOT NULL,
  `token` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_password_resets`
--

INSERT INTO `admin_password_resets` (`email`, `token`, `created_at`) VALUES
('adarsh@braintechnosys.com', '$2y$10$9a9o7e6g14.RlJOKEWEi4.UAD/LWM4MXBfAuv0vpU5Vkz42pe8Q82', '2019-10-09 03:50:18'),
('admin@braintechnosys.com', '$2y$10$mRdy/Zk05CvqZWfE9PvdPObjuNvyC3FDEL3tcjSR5onUB6l3m3qje', '2019-10-09 03:49:53'),
('adarsh64681994@gmail.com', '$2y$10$fR2hBWlkVER/qCUvK3MizOXnE8.Pzn3ViCqWpjPsWyxgJKi.OkB82', '2020-05-19 13:37:34'),
('shiwalisaraswat@gmail.com', '$2y$10$3fm7Qj93g5Jt7okOzH5lIutpqubgV7zEKY9zuHnJKE.7C8sc5Uj9.', '2020-05-23 14:37:45'),
('adarsh@braintechnosys.com', '$2y$10$9a9o7e6g14.RlJOKEWEi4.UAD/LWM4MXBfAuv0vpU5Vkz42pe8Q82', '2019-10-09 03:50:18'),
('admin@braintechnosys.com', '$2y$10$mRdy/Zk05CvqZWfE9PvdPObjuNvyC3FDEL3tcjSR5onUB6l3m3qje', '2019-10-09 03:49:53'),
('adarsh64681994@gmail.com', '$2y$10$fR2hBWlkVER/qCUvK3MizOXnE8.Pzn3ViCqWpjPsWyxgJKi.OkB82', '2020-05-19 13:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'Home', 'Type1593234416.jpg', '2020-06-27 05:06:56', '2020-09-05 11:38:39', NULL),
(8, 'Appliance2', 'Type1599324670.jpeg', '2020-06-27 05:07:31', '2020-09-05 11:21:10', NULL),
(9, 'Home2', 'Type1599325744.png', '2020-09-05 11:33:57', '2020-09-05 11:39:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2014_10_12_000000_create_users_table', 2),
(10, '2019_10_03_131019_create_settings_table', 4),
(11, '2019_10_03_131522_create_ratings_table', 5),
(12, '2019_10_03_122435_create_bookings_table', 6),
(13, '2020_05_19_162304_create_states_table', 7),
(14, '2020_05_20_030351_create_categories_table', 8),
(15, '2020_05_20_181635_cities_fk', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('vipin.vsworx@gmail.com', '$2y$10$sQxweKs0ymZB6.BjC/KjC./DmEwPo0hGQjI0qUgcysLopTlcrXFHq', '2019-11-06 20:19:54'),
('roopchand@braintechnosys.com', '$2y$10$S9dU4Nix8c4iSgYOni984uFMRGbjh.7Falsc66DvIT3Li5ELtpz9u', '2019-11-06 20:22:25'),
('adarsh@braintechnosys.com', '$2y$10$aHoJMWbtyCdBEyDk7B7LoeZbkI.eXqkjzs5uLI./YzI6K5MI8m4m6', '2020-01-07 11:06:49'),
('adarsh64681994@gmail.com', '$2y$10$ak5XYei/FQ1VMrVHouHof.HnrvfzzB2nFyBJpVRe0CKd8MobnfFX6', '2020-01-17 07:49:51'),
('vipin.vsworx@gmail.com', '$2y$10$sQxweKs0ymZB6.BjC/KjC./DmEwPo0hGQjI0qUgcysLopTlcrXFHq', '2019-11-06 20:19:54'),
('roopchand@braintechnosys.com', '$2y$10$S9dU4Nix8c4iSgYOni984uFMRGbjh.7Falsc66DvIT3Li5ELtpz9u', '2019-11-06 20:22:25'),
('adarsh@braintechnosys.com', '$2y$10$aHoJMWbtyCdBEyDk7B7LoeZbkI.eXqkjzs5uLI./YzI6K5MI8m4m6', '2020-01-07 11:06:49'),
('adarsh64681994@gmail.com', '$2y$10$ak5XYei/FQ1VMrVHouHof.HnrvfzzB2nFyBJpVRe0CKd8MobnfFX6', '2020-01-17 07:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `discount` float(10,2) NOT NULL,
  `new_price` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `short_description`, `description`, `price`, `discount`, `new_price`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 'Home Cleaning2', '', '', 0, 0.00, 0, 'Services1599327310.png', '2020-06-27 05:13:50', '2020-09-05 12:05:10', NULL),
(14, 'Home Repair', 'test testdrgbd dfgfdgdf fgdfgdf dfgreg', 'test testdrgbd dfgfdgdf fgdfgdf dfgreg  test testdrgbd dfgfdgdf fgdfgdf dfgreg  test testdrgbd dfgfdgdf fgdfgdf dfgreg', 10, 10.00, 9, 'Services1599327544.png', '2020-06-27 05:14:12', '2020-09-05 12:45:09', NULL),
(15, 'Appliance Services', '', '', 0, 0.00, 0, 'Category1593234870.jpg', '2020-06-27 05:14:30', '2020-06-27 05:14:30', NULL),
(16, 'test', '', '', 0, 0.00, 0, 'Services1599327327.png', '2020-09-05 12:05:27', '2020-09-05 12:05:27', NULL),
(17, 'admin', '', '', 0, 0.00, 0, 'Services1599327524.png', '2020-09-05 12:08:44', '2020-09-05 12:08:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` int(11) NOT NULL,
  `commission` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `mobile`, `address`, `zip`, `commission`, `created_at`, `updated_at`) VALUES
(1, 'admin@bananewala.com', '9876543210', 'Delhi', 123456, 10.00, NULL, '2020-06-26 03:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Andhra Pradesh', '2020-05-21 12:51:26', '2020-05-21 12:51:26', NULL),
(2, 'Arunachal Pradesh', '2020-05-21 12:51:26', '2020-05-21 12:51:26', NULL),
(3, 'Assam', '2020-05-21 12:51:26', '2020-05-21 12:51:26', NULL),
(4, 'Bihar', '2020-05-21 12:51:26', '2020-05-21 12:51:26', NULL),
(5, 'Chhattisgarh', '2020-05-21 12:51:26', '2020-05-21 12:51:26', NULL),
(6, 'Goa', '2020-05-21 12:51:26', '2020-05-21 12:51:26', NULL),
(7, 'Gujarat', '2020-05-21 12:51:26', '2020-05-21 12:51:26', NULL),
(8, 'Haryana', '2020-05-21 12:51:26', '2020-05-21 12:51:26', NULL),
(9, 'Himachal Pradesh', '2020-05-21 12:51:26', '2020-05-21 12:51:26', NULL),
(10, 'Jammu and Kashmir', '2020-05-21 12:51:26', '2020-05-21 12:51:26', NULL),
(11, 'Jharkhand', '2020-05-21 12:51:27', '2020-05-21 12:51:27', NULL),
(12, 'Karnataka', '2020-05-21 12:51:27', '2020-05-21 12:51:27', NULL),
(13, 'Kerala', '2020-05-21 12:51:27', '2020-05-21 12:51:27', NULL),
(14, 'Madhya Pradesh', '2020-05-21 12:51:27', '2020-05-21 12:51:27', NULL),
(15, 'Maharashtra', '2020-05-21 12:51:27', '2020-05-21 12:51:27', NULL),
(16, 'Manipur', '2020-05-21 12:51:27', '2020-05-21 12:51:27', NULL),
(17, 'Meghalaya', '2020-05-21 12:51:27', '2020-05-21 12:51:27', NULL),
(18, 'Mizoram', '2020-05-21 12:51:27', '2020-05-21 12:51:27', NULL),
(19, 'Nagaland', '2020-05-21 12:51:27', '2020-05-21 12:51:27', NULL),
(20, 'Odisha', '2020-05-21 12:51:27', '2020-05-21 12:51:27', NULL),
(21, 'Punjab', '2020-05-21 12:51:27', '2020-05-21 12:51:27', NULL),
(22, 'Rajasthan', '2020-05-21 12:51:27', '2020-05-21 12:51:27', NULL),
(23, 'Sikkim', '2020-05-21 12:51:27', '2020-05-21 12:51:27', NULL),
(24, 'Tamil Nadu', '2020-05-21 12:51:27', '2020-05-21 12:51:27', NULL),
(25, 'Telangana', '2020-05-21 12:51:27', '2020-05-21 12:51:27', NULL),
(26, 'Tripura', '2020-05-21 12:51:27', '2020-05-21 12:51:27', NULL),
(27, 'Uttarakhand', '2020-05-21 12:51:27', '2020-05-21 12:51:27', NULL),
(28, 'Uttar Pradesh', '2020-05-21 12:51:27', '2020-05-21 12:51:27', NULL),
(29, 'West Bengal', '2020-05-21 12:51:27', '2020-05-21 12:51:27', NULL),
(30, 'Andaman and Nicobar Islands', '2020-05-21 12:51:27', '2020-05-21 12:51:27', NULL),
(31, 'Chandigarh', '2020-05-21 12:51:27', '2020-05-21 12:51:27', NULL),
(32, 'Dadra and Nagar Haveli', '2020-05-21 12:51:27', '2020-05-21 12:51:27', NULL),
(33, 'Daman and Diu', '2020-05-21 12:51:27', '2020-05-21 12:51:27', NULL),
(34, 'Delhi', '2020-05-21 12:51:28', '2020-05-21 12:51:28', NULL),
(35, 'Lakshadweep', '2020-05-21 12:51:28', '2020-05-21 12:51:28', NULL),
(36, 'Puducherry', '2020-05-21 12:51:28', '2020-05-21 12:51:28', NULL),
(37, 'abc123', '2020-06-26 03:07:55', '2020-06-26 03:40:11', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
