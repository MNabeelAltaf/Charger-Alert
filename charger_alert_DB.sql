-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 09, 2024 at 06:23 AM
-- Server version: 10.11.9-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u945088377_charger_alert`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `thumb` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `thumb`, `created_at`, `updated_at`) VALUES
(1, 'Animal', 'category_thumbnails/p4Tbt4TrHokdZ993xAdnqYwDMgtyf9ba6oj6uQ3L.jpg', '2024-10-01 07:01:50', '2024-10-07 05:26:18'),
(2, 'Human', 'category_thumbnails/dkf5MntblItrgyp6lzt4c5pw2eUndUgSCdVMzLEY.png', '2024-10-01 07:08:49', '2024-10-07 04:40:50'),
(3, 'IT', 'category_thumbnails/K40QqSHmkMd2AWnQpzU7GbvoSTXcUP6yAedtYY17.jpg', '2024-10-01 07:16:07', '2024-10-07 05:26:38'),
(4, 'Cars', 'category_thumbnails/s4nEvhEQl1UGSGIkKcSYNPknOiiY72PDKMGg0kTC.jpg', '2024-10-02 11:34:34', '2024-10-07 05:26:50'),
(5, 'Emoji', 'category_thumbnails/gsYpSKfx8PcxSNMo1qvJ99Nue4oPNXyqPO5SAplV.png', '2024-10-03 04:40:32', '2024-10-07 08:03:30'),
(7, 'Neon', 'category_thumbnails/ROYTebn5X1cW58FWBtijlxfE8rH5RiIFUDPBEpF7.jpg', '2024-10-04 04:43:22', '2024-10-04 04:43:22'),
(10, 'Birds', NULL, '2024-10-07 10:22:10', '2024-10-07 10:22:10'),
(11, 'Circle', NULL, '2024-10-07 10:23:57', '2024-10-07 10:23:57'),
(12, 'Battery', NULL, '2024-10-07 12:14:16', '2024-10-07 12:14:16');

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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2024_09_25_101356_create_resources_table', 1),
(11, '2024_10_01_114928_create_categories_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `category_id` varchar(10) NOT NULL,
  `animation_type` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `name`, `path`, `thumbnail`, `category_id`, `animation_type`, `created_at`, `updated_at`) VALUES
(17, 'Cars-Animation', 'resources/66fe1cb34e7f9.json', 'thumbnail/fJbNwbpSwx1NH1MqgMOg2FruOmUIQAXZu818Gho2.jpg', '4', 'Lottie', '2024-10-03 04:25:23', '2024-10-03 04:25:23'),
(18, 'Animal-Animation', 'resources/66fe1cceb2c1b.json', 'thumbnail/MLdMB2NQSVTj0U0qhpNFr5uu1EWY1tCz7UGspr0v.jpg', '1', 'Lottie', '2024-10-03 04:25:50', '2024-10-03 04:25:50'),
(19, 'Computer-Animation', 'resources/66fe1ce8638a0.json', 'thumbnail/oguy43SpjALbpNWqK49Ad9SBE1anjHCBdAbrd0RM.jpg', '3', 'Lottie', '2024-10-03 04:26:16', '2024-10-04 15:01:32'),
(20, 'Human', 'resources/66fe1d4256ae1.mp4', 'thumbnail/TBqkSnLE2JbuMLmYmSKcfcf2zeahp9cziZIS8z11.jpg', '2', 'Video', '2024-10-03 04:27:46', '2024-10-03 04:27:46'),
(25, 'Emoji 2', 'resources/66fe92ca6a4ec.json', 'thumbnail/2gmtRAlo62dPnuEuPw9BO9HSEGTvP7dpRSo6kfN0.jpg', '5', 'Lottie', '2024-10-03 12:49:14', '2024-10-07 07:55:27'),
(29, 'Circle 1', 'resources/66ff7298e5652.mov', 'thumbnail/xtU9vGmv8riuACcoHZ7UGIc6RtVqLTWdhI3DbQqu.jpg', '11', 'Video', '2024-10-04 04:44:08', '2024-10-07 10:24:34'),
(30, 'Neon 2', 'resources/66ff77158ef14.mov', 'thumbnail/yGiWlmN214knuROSvcCCzMudy2PpZ3QouxB3v2DG.jpg', '7', 'Video', '2024-10-04 05:03:17', '2024-10-07 07:23:11'),
(31, 'neon 3', 'resources/66ff78fca18b2.mov', 'thumbnail/hyWO9vK2c6VWvSkUPqHtpLayoFhebhKkwlVrYKra.jpg', '7', 'Video', '2024-10-04 05:11:24', '2024-10-07 07:23:33'),
(32, 'Neon 4', 'resources/66ff796e6c892.mov', 'thumbnail/18TRn3FaGnkReB5u2HVTNjCVDlhzgvYZ824p3zTI.jpg', '7', 'Video', '2024-10-04 05:13:18', '2024-10-07 07:23:57'),
(33, 'Neon 4', 'resources/66ff8608ad0ca.mov', 'thumbnail/kT8EBvACqlPecDy4ZvmQ2HokXq66fmTm62zJIYxU.png', '7', 'Video', '2024-10-04 06:07:04', '2024-10-04 06:07:04'),
(34, 'Emoji 2', 'resources/670394375f018.json', 'thumbnail/6qHhK1IlXxhdhssNClxFm6pL7nEYxE7HZJrZA7T4.jpg', '5', 'Lottie', '2024-10-07 07:56:39', '2024-10-07 07:56:39'),
(35, 'Emoji 3', 'resources/670394575391e.json', 'thumbnail/fCowbTfhlEFYeuH73EXilyaNFcmCQqvK7pIdU18t.jpg', '5', 'Lottie', '2024-10-07 07:57:11', '2024-10-07 07:57:11'),
(36, 'Emoji 4', 'resources/6703946c26020.json', 'thumbnail/e9fqNXsLHTsANKsP6ncoQyoc6tE56KqcrVDtVB4r.jpg', '5', 'Lottie', '2024-10-07 07:57:32', '2024-10-07 07:57:32'),
(38, 'Emoji 5', 'resources/6703949b96f18.json', 'thumbnail/8Z0JxZ3X3NXNglDGLBQiBDtCbGT7ljsRvdhAMKjO.jpg', '5', 'Lottie', '2024-10-07 07:58:19', '2024-10-07 07:58:19'),
(39, 'Emoji 5', 'resources/670394d56229a.json', 'thumbnail/NAuRncsubQioJ0tSWCm8PRXldkwG6M7zAZWm9T0S.jpg', '5', 'Lottie', '2024-10-07 07:59:17', '2024-10-07 07:59:17'),
(40, 'Emoji 6', 'resources/670394f2ccbdb.json', 'thumbnail/FVsYQF491waq7IvqaVDwGhYJ6t8EVOvmmScGJgi2.jpg', '5', 'Lottie', '2024-10-07 07:59:46', '2024-10-07 07:59:46'),
(41, 'Emoji 9', 'resources/670395476ff2d.json', 'thumbnail/H9rIbXVWVDhnwDyM7SDq9woisZVqwtmSDrpKT3xA.jpg', '5', 'Lottie', '2024-10-07 08:01:11', '2024-10-07 08:01:11'),
(42, 'Emoji 10', 'resources/6703955e24ef5.json', 'thumbnail/RvO7A5vX40J0XSRz3lg1W1dxRaYQjvSV8rz3NJbE.jpg', '5', 'Lottie', '2024-10-07 08:01:34', '2024-10-07 08:01:34'),
(45, 'Emoji 10', 'resources/6703a7f592d33.json', 'thumbnail/wu6ctP12NPUvcdb9WqzgJe5N1WKcfawO5G5vSwzK.jpg', '5', 'Lottie', '2024-10-07 09:20:53', '2024-10-07 09:20:53'),
(46, 'Emoji 11', 'resources/6703b2df2c613.json', 'thumbnail/XpFthYsH1eBoZoa6l7gCSV0Ngjg0Qar4xrfZLUiy.jpg', '5', 'Lottie', '2024-10-07 09:28:12', '2024-10-07 10:07:27'),
(47, 'Emoji 12', 'resources/6703aa588a8f1.json', 'thumbnail/BsCmKzmfomhl7B3iwgUCqZGnCw0qyvc9oDH6onwe.jpg', '5', 'Lottie', '2024-10-07 09:31:04', '2024-10-07 09:31:04'),
(48, 'Emoji 13', 'resources/6703aac5150a7.json', 'thumbnail/KUqAn4w1cNWzDTD1phimH8sOzVmj9nY788sMJSco.jpg', '5', 'Lottie', '2024-10-07 09:32:53', '2024-10-07 09:32:53'),
(49, 'Emoji 14', 'resources/6703ab0c507ee.json', 'thumbnail/tkChm9t0gHiGWqM8kGMbgiqaDR1CoDHoajWKskzj.jpg', '5', 'Lottie', '2024-10-07 09:34:04', '2024-10-07 09:34:04'),
(50, 'Neon 5', 'resources/6703b714e11ab.mov', 'thumbnail/1NigkjuJsrLMRD0fAZG6eeSg3q4y2VlkPiCH0afT.jpg', '7', 'Video', '2024-10-07 10:25:24', '2024-10-07 10:25:24'),
(51, 'circle 2', 'resources/6703b96400fdd.mp4', 'thumbnail/pfdws8kckIj5K8ddaOJSpyBEQDGI7zeVabZOoJxB.jpg', '11', 'Video', '2024-10-07 10:35:16', '2024-10-07 10:35:16'),
(52, 'Circle 3', 'resources/6703c37a6ea00.mov', 'thumbnail/x0mVEU3rgAbNRI2LDKIjQMMre6ekDjJXXV3ymCtZ.jpg', '11', 'Video', '2024-10-07 11:18:18', '2024-10-07 11:18:18'),
(53, 'circle 4', 'resources/6703ccae487e6.json', 'thumbnail/sLRlZQozi7To6vNqUjhE536s13Y1NZrlWLcMzAqg.png', '11', 'Lottie', '2024-10-07 11:57:34', '2024-10-07 12:03:36'),
(54, 'circle 5', 'resources/6703cccd00da6.json', 'thumbnail/U7N3iIt7IPU2LnQq09OnoRKRu0LLfxDBoeNcPfFe.png', '11', 'Lottie', '2024-10-07 11:58:05', '2024-10-07 12:03:23'),
(55, 'circle 5', 'resources/6703ccef64706.json', 'thumbnail/n838RPRSW8EblecBvXLvfkqIVCJw4jX49P1pvEVZ.png', '11', 'Lottie', '2024-10-07 11:58:39', '2024-10-07 12:02:50'),
(56, 'circle 6', 'resources/6703cd09e79de.json', 'thumbnail/nYOFNrAWBKVOCDz89nCoqGnRsaS1sP8CagRUHWha.png', '11', 'Lottie', '2024-10-07 11:59:05', '2024-10-07 12:03:07'),
(57, 'Circle 8', 'resources/6703ce95a0750.json', 'thumbnail/jMbOx7PjIIGUztbrB5a4aSokeY9HPETWPRqAUyBg.png', '11', 'Lottie', '2024-10-07 12:05:41', '2024-10-07 12:05:41'),
(58, 'Battery', 'resources/6703d0b52b04a.json', 'thumbnail/WyClZefQFtsiN9uXtBYz7AaDMtqhpPe9qWHF1rYh.jpg', '12', 'Lottie', '2024-10-07 12:14:45', '2024-10-07 12:14:45');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'maya khan', 'shoaib.mobipixels@gmail.com', NULL, '$2y$12$Vci/gHy2hE.ihvIsqyUAYeBnOgTUcID/d0o0lSjfnjzYMXzFkOkHq', 'Tn58C9GiF3Qj3EaujGIwR2heXJE79GeQKjx1jI1y3RNKfCzkOIvLtdAN732t', '2024-09-27 06:13:32', '2024-09-27 06:13:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
