-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2022 at 03:18 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce2`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'df', 'sdf', 1, NULL, NULL),
(2, 'fd', 'sd', 1, NULL, NULL),
(3, 'Power', '/uploads/brand/375807.jpg', 2, '2022-01-04 12:43:46', '2022-01-04 12:43:46'),
(8, 'Powerssss', '/uploads/brand/666369.png', 2, '2022-01-04 12:44:38', '2022-01-04 12:44:38'),
(9, 'Gree', '/uploads/brand/767897.jpg', 5, '2022-01-04 12:45:35', '2022-01-04 12:45:35'),
(11, 'Microsoft', '/uploads/brand/868210.PNG', 2, '2022-01-04 12:48:22', '2022-01-04 12:48:22'),
(12, 'Samsung', '/uploads/brand/910538.png', 1, '2022-01-04 12:55:39', '2022-01-04 12:55:39'),
(13, 'Grees', '/uploads/brand/812074.png', 2, '2022-01-04 12:56:34', '2022-01-04 12:56:34'),
(16, 'sdf', '/uploads/brand/896917.png', 2, '2022-01-04 13:01:50', '2022-01-04 13:01:50'),
(17, 'Greefd', '/uploads/brand/334643.png', 2, '2022-01-04 13:02:44', '2022-01-04 13:02:44'),
(19, 'Greefdsd', '/uploads/brand/815660.png', 2, '2022-01-04 13:03:06', '2022-01-04 13:03:06'),
(20, 'd', '/uploads/brand/850092.png', 2, '2022-01-04 13:04:15', '2022-01-04 13:04:15'),
(23, 'dfgggg', '/uploads/brand/575778.PNG', 2, '2022-01-04 13:05:03', '2022-01-04 13:05:03'),
(24, 'Waltondd', '/uploads/brand/837689.jpg', 22, '2022-01-04 13:08:42', '2022-01-04 13:08:42'),
(25, 'Greesg', '/uploads/brand/368310.PNG', 2, '2022-01-04 13:09:41', '2022-01-04 13:09:41'),
(26, 'dz', '/uploads/brand/319255.jpg', 1, '2022-01-04 23:27:47', '2022-01-04 23:27:47'),
(32, 'Greesdfdg', '/uploads/brand/979967.PNG', 1, '2022-01-05 03:26:19', '2022-01-05 03:26:19'),
(33, 'fg', '/uploads/brand/956768.PNG', 223, '2022-01-05 03:29:25', '2022-01-05 03:29:25'),
(34, 'Powersfg', '/uploads/brand/142065.PNG', 12, '2022-01-05 04:08:15', '2022-01-05 04:08:15'),
(35, 'cc', '/uploads/brand/149583.PNG', 223, '2022-01-05 04:12:18', '2022-01-05 04:12:18'),
(36, 'xxx', '/uploads/brand/210656.PNG', 111, '2022-01-05 07:01:39', '2022-01-05 07:01:39'),
(37, 'eww', '/uploads/brand/775239.PNG', 2, '2022-01-05 07:04:27', '2022-01-05 07:04:27'),
(38, 'cs', '/uploads/brand/916132.PNG', 2, '2022-01-05 07:10:54', '2022-01-05 07:10:54'),
(39, 'qwq', '/uploads/brand/724993.PNG', 2, '2022-01-05 13:12:30', '2022-01-05 13:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(6, 1, 'Mobile Accessories', 1, '2022-01-02 23:08:32', '2022-01-02 23:08:32'),
(7, 1, 'Mobile', 1, '2022-01-02 23:08:43', '2022-01-02 23:08:43'),
(8, 1, 'Desktops', 2, '2022-01-02 23:10:25', '2022-01-03 01:15:48'),
(10, 1, 'Furniture', 2, '2022-01-03 11:04:32', '2022-01-03 11:04:32'),
(12, 1, 'Lens', 1, '2022-01-03 11:08:39', '2022-01-03 11:08:39'),
(13, 1, 'Books', 1, '2022-01-03 11:08:58', '2022-01-03 11:08:58'),
(14, 1, 'Air Condition', 2, '2022-01-03 11:09:49', '2022-01-03 11:09:49'),
(15, 1, 'Electric Devices', 2, '2022-01-03 11:10:17', '2022-01-05 07:07:02'),
(19, 1, 'Hot Collection', 1, '2022-01-05 07:07:37', '2022-01-05 07:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_01_01_033205_create_roles_table', 1),
(5, '2022_01_01_043815_create_categories_table', 2),
(6, '2022_01_03_052105_create_brands_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'User', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2 COMMENT '1->admin,2->user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Arat', 'aratislamsafol@gmail.com', 1, NULL, '$2y$10$icNi5QemqTJ6EuNrvoOcs.SI3wmaJDRBEuLr5IvpaPipZ103WWdhu', 'vVdmItc0QNrzNP4xEYJ45dCpuTKUqZrvQElap0tDVq7XHIMSYlDAqXhOAbxF', '2021-12-31 21:43:28', '2021-12-31 21:43:28'),
(2, 'farhana', 'farhana@gmail.com', 2, NULL, '$2y$10$s6bWY7zdvFgtxcOyuHIBFeA62YatSsr8Te1IcXSe3ODEF6EID8C1G', NULL, '2021-12-31 21:43:43', '2021-12-31 21:43:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_brand_name_unique` (`brand_name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
