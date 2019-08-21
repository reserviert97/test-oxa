-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2019 at 11:50 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lumen_simpleapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimum_level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`id`, `name`, `description`, `minimum_level`, `created_at`, `updated_at`) VALUES
(1, 'Newbie', 'This is badge for new player', 1, '2019-08-21 16:49:15', '2019-08-21 16:49:15'),
(2, 'Beginner', 'This badge for new player who has stream on this app', 3, '2019-08-21 16:49:15', '2019-08-21 16:49:15'),
(3, 'Amateur', 'For those people who stream for a litle bit', 5, '2019-08-21 16:49:15', '2019-08-21 16:49:15'),
(4, 'Intermediate', 'these player is started enjoyed the stream world', 7, '2019-08-21 16:49:15', '2019-08-21 16:49:15'),
(5, 'Pro', 'these player is Pro streamer', 10, '2019-08-21 16:49:15', '2019-08-21 16:49:15'),
(6, 'Expert', 'These Human is a Legend', 15, '2019-08-21 16:49:15', '2019-08-21 16:49:15');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` int(11) NOT NULL,
  `minimum_generated` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level`, `minimum_generated`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2019-08-21 16:49:15', '2019-08-21 16:49:15'),
(2, 2, 3, '2019-08-21 16:49:15', '2019-08-21 16:49:15'),
(3, 3, 4, '2019-08-21 16:49:15', '2019-08-21 16:49:15'),
(4, 4, 5, '2019-08-21 16:49:15', '2019-08-21 16:49:15'),
(5, 5, 6, '2019-08-21 16:49:15', '2019-08-21 16:49:15'),
(6, 6, 7, '2019-08-21 16:49:15', '2019-08-21 16:49:15'),
(7, 7, 8, '2019-08-21 16:49:15', '2019-08-21 16:49:15'),
(8, 8, 9, '2019-08-21 16:49:15', '2019-08-21 16:49:15'),
(9, 9, 10, '2019-08-21 16:49:15', '2019-08-21 16:49:15'),
(10, 10, 11, '2019-08-21 16:49:15', '2019-08-21 16:49:15'),
(11, 11, 12, '2019-08-21 16:49:15', '2019-08-21 16:49:15'),
(12, 12, 13, '2019-08-21 16:49:15', '2019-08-21 16:49:15'),
(13, 13, 14, '2019-08-21 16:49:15', '2019-08-21 16:49:15'),
(14, 14, 15, '2019-08-21 16:49:15', '2019-08-21 16:49:15'),
(15, 15, 16, '2019-08-21 16:49:15', '2019-08-21 16:49:15'),
(16, 16, 17, '2019-08-21 16:49:15', '2019-08-21 16:49:15'),
(17, 17, 18, '2019-08-21 16:49:15', '2019-08-21 16:49:15'),
(18, 18, 19, '2019-08-21 16:49:15', '2019-08-21 16:49:15'),
(19, 19, 20, '2019-08-21 16:49:15', '2019-08-21 16:49:15'),
(20, 20, 21, '2019-08-21 16:49:15', '2019-08-21 16:49:15');

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
(1, '2019_08_20_085923_create_users_table', 1),
(2, '2019_08_20_094237_create_badge_table', 1),
(3, '2019_08_20_094435_create_level_table', 1),
(4, '2019_08_20_094635_create_users_detail_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Nurlatif Ardhi Pratama', 'nurlatif@gmail.com', '$2y$10$WtQSMsdxY.u/hjrcQIKNuudldCPMCP2WaVR1VATyxQBt6sEZit3re', '2019-08-21 16:49:18', '2019-08-21 16:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `users_detail`
--

CREATE TABLE `users_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED DEFAULT NULL,
  `badge_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_generated` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_detail`
--

INSERT INTO `users_detail` (`id`, `user_id`, `level_id`, `badge_id`, `total_generated`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 0, '2019-08-21 16:49:18', '2019-08-21 16:49:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_detail`
--
ALTER TABLE `users_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_detail_user_id_foreign` (`user_id`),
  ADD KEY `users_detail_badge_id_foreign` (`badge_id`),
  ADD KEY `users_detail_level_id_foreign` (`level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_detail`
--
ALTER TABLE `users_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_detail`
--
ALTER TABLE `users_detail`
  ADD CONSTRAINT `users_detail_badge_id_foreign` FOREIGN KEY (`badge_id`) REFERENCES `badges` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_detail_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_detail_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
