-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 23, 2024 at 09:24 AM
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
(5, 'Emoji', 'category_thumbnails/gsYpSKfx8PcxSNMo1qvJ99Nue4oPNXyqPO5SAplV.png', '2024-10-03 04:40:32', '2024-10-07 08:03:30'),
(7, 'Neon', 'category_thumbnails/ROYTebn5X1cW58FWBtijlxfE8rH5RiIFUDPBEpF7.jpg', '2024-10-04 04:43:22', '2024-10-04 04:43:22'),
(10, 'Birds', NULL, '2024-10-07 10:22:10', '2024-10-07 10:22:10'),
(11, 'Circle', NULL, '2024-10-07 10:23:57', '2024-10-07 10:23:57'),
(12, 'Battery', NULL, '2024-10-07 12:14:16', '2024-10-07 12:14:16'),
(13, 'Animals', NULL, '2024-10-10 12:13:27', '2024-10-10 12:13:27'),
(14, 'Robot', NULL, '2024-10-11 05:19:26', '2024-10-11 05:19:26'),
(15, 'Flowers', NULL, '2024-10-15 04:52:08', '2024-10-15 04:52:08'),
(16, 'Funny', NULL, '2024-10-15 09:27:29', '2024-10-15 09:27:29'),
(17, 'Others', NULL, '2024-10-21 10:28:41', '2024-10-21 10:28:41'),
(18, 'Galaxy', NULL, '2024-10-21 10:43:14', '2024-10-21 10:43:14'),
(19, 'Halloween', NULL, '2024-10-23 04:25:30', '2024-10-23 04:25:30');

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
(58, 'Battery', 'resources/6703d0b52b04a.json', 'thumbnail/WyClZefQFtsiN9uXtBYz7AaDMtqhpPe9qWHF1rYh.jpg', '12', 'Lottie', '2024-10-07 12:14:45', '2024-10-07 12:14:45'),
(59, 'circle 10', 'resources/6707bb7995a56.json', 'thumbnail/in8gwqoX5duEhGUX3toRttT3b8i5K87S2k5cHcbI.jpg', '11', 'Lottie', '2024-10-10 11:33:13', '2024-10-10 11:33:13'),
(60, 'circle 11', 'resources/6707bbbff14c8.json', 'thumbnail/f1Mai77GsNil6kMQG2AtoHNrjhZIQdiirPtJQfer.jpg', '11', 'Lottie', '2024-10-10 11:34:23', '2024-10-10 11:34:23'),
(61, 'Circle 12', 'resources/6707bc0059d23.json', 'thumbnail/FkmGDbdMmlhHZsMrkq5V2o1cfLY6BbsufpigB8og.jpg', '11', 'Lottie', '2024-10-10 11:35:28', '2024-10-10 11:35:28'),
(62, 'Circle 13', 'resources/6707bc1dcce12.json', 'thumbnail/a2TNcZA1LEtAJvrAKphaIS4GGbKWdkn5yLtcgQZH.jpg', '11', 'Lottie', '2024-10-10 11:35:57', '2024-10-10 11:35:57'),
(63, 'Circle 14', 'resources/6707bc608e032.json', 'thumbnail/SL1zN8oekBEusilaur2ZBjSuTgnOMp96pJmI5YfC.jpg', '11', 'Lottie', '2024-10-10 11:37:04', '2024-10-10 11:37:04'),
(64, 'Circle 15', 'resources/6707bcb571e13.json', 'thumbnail/ZwVzo54kAsonLGDuVz7waNZ3nYaACB8q8A2Nh5j3.jpg', '11', 'Lottie', '2024-10-10 11:38:29', '2024-10-10 11:38:29'),
(65, 'Circle 16', 'resources/6707bccff02b6.json', 'thumbnail/eshSczK9L8OK59vASAYPzIw5kqw61eHcs7Y2fYNK.png', '11', 'Lottie', '2024-10-10 11:38:55', '2024-10-10 11:38:55'),
(66, 'Emoji 15', 'resources/6707bed513ece.json', 'thumbnail/TnKXAXf2C12YzmkhxK4TTEXnT6pgQxj1WCsCNYXp.jpg', '5', 'Lottie', '2024-10-10 11:47:33', '2024-10-10 11:47:33'),
(67, 'Emoji 16', 'resources/6707bee8df1b7.json', 'thumbnail/GLnp3FehPV5E2euq39c2Zr2o7oQdDf0OH1wpoY6K.jpg', '5', 'Lottie', '2024-10-10 11:47:52', '2024-10-10 11:47:52'),
(68, 'Emoji 17', 'resources/6707befd556f6.json', 'thumbnail/TzhJqKnDzfUdTf6c23wjNSq7ZWLMR0CygAlVBxio.png', '5', 'Lottie', '2024-10-10 11:48:13', '2024-10-10 11:48:13'),
(69, 'Emoji 18', 'resources/6707bf1297ccf.json', 'thumbnail/J2qpZSn1RlNlVjsAP8IdKXy2JO1Kp01CzFlTVOks.jpg', '5', 'Lottie', '2024-10-10 11:48:34', '2024-10-10 11:48:34'),
(70, 'Emoji 19', 'resources/6707bf23f2a80.json', 'thumbnail/YOLtOnFOA3Ru1OA80oBcvo44QfgIxnx9zptPSn4A.jpg', '5', 'Lottie', '2024-10-10 11:48:51', '2024-10-10 11:48:51'),
(71, 'Emoji 20', 'resources/6707bf34f074e.json', 'thumbnail/oU43WJ9vjgO79c7jfdAEUwOS3YNCKQeXySuaQVpu.jpg', '5', 'Lottie', '2024-10-10 11:49:08', '2024-10-10 11:49:08'),
(72, 'Emoji 21', 'resources/6707bf4689404.json', 'thumbnail/fwMpTk189aaIffhVU4982fDQrWAQv93NygvCg3f8.jpg', '5', 'Lottie', '2024-10-10 11:49:26', '2024-10-10 11:49:26'),
(73, 'Emoji 22', 'resources/6707bf590cd7b.json', 'thumbnail/hBDuD7N9RoSgrE2hcNRiiPv1qLLn616t3GlJe7Zt.jpg', '5', 'Lottie', '2024-10-10 11:49:45', '2024-10-10 11:49:45'),
(74, 'circle 15', 'resources/6707c102b7e7c.json', 'thumbnail/cBW0RDc7ALYp1Deq3QzNkVysNqfwAcZq1ASLr7nT.jpg', '11', 'Lottie', '2024-10-10 11:56:50', '2024-10-10 11:56:50'),
(75, 'Animal 1', 'resources/6707c5ab47f95.json', 'thumbnail/LAlK5GsbgFbD0G14iZf3jKgceLKtJm0sm04manr8.jpg', '13', 'Lottie', '2024-10-10 12:16:43', '2024-10-10 12:16:43'),
(76, 'Animal 2', 'resources/6707c63538330.json', 'thumbnail/8nERSAfuO0aHW25snKSmtaxIDpJI91IqiRhiiZRc.jpg', '13', 'Lottie', '2024-10-10 12:19:01', '2024-10-10 12:19:01'),
(77, 'Animal 3', 'resources/6707c651bafd6.json', 'thumbnail/MVLfOkRywxgqLnAJU0o8hqy6XVmphv9oVhNqIfDn.jpg', '13', 'Lottie', '2024-10-10 12:19:29', '2024-10-10 12:19:29'),
(78, 'Animal 4', 'resources/6707c695adcc0.json', 'thumbnail/1tTJWoitoU5yZ0viHh26vtlwl9rLLdvFX11nwrVC.png', '13', 'Lottie', '2024-10-10 12:20:37', '2024-10-10 12:20:37'),
(79, 'Animal 5', 'resources/6707c6e0809f9.json', 'thumbnail/nRGssDrq9Rz3st0sdvmpZXgrLkocDJI1U2g2LMb8.jpg', '13', 'Lottie', '2024-10-10 12:21:52', '2024-10-10 12:21:52'),
(80, 'Animal 6', 'resources/6707c70b02c8e.json', 'thumbnail/acn0z3mxZabYo8Q1nwLwsEONzOZXufZ7EyCqNVD1.jpg', '13', 'Lottie', '2024-10-10 12:22:35', '2024-10-10 12:22:35'),
(81, 'Animal 7', 'resources/6707c7482dc44.json', 'thumbnail/05IuNoFn6obIqHDL3j5uDZ13CtGsVzNOT7n3EEzO.jpg', '13', 'Lottie', '2024-10-10 12:23:36', '2024-10-10 12:23:36'),
(82, 'Animal 8', 'resources/6707c780172b1.json', 'thumbnail/c0gACaif0qkCHxZ1z4xPMxGELVZRKgFuZEMjgPqK.png', '13', 'Lottie', '2024-10-10 12:24:32', '2024-10-10 12:24:32'),
(83, 'Animal 9', 'resources/6707c79517c8f.json', 'thumbnail/1MfC4Mh6elNVSlm9YurA7ck9lvbDCZaLW9jTyQ9C.png', '13', 'Lottie', '2024-10-10 12:24:53', '2024-10-10 12:24:53'),
(84, 'Animal 10', 'resources/6707c7abcde94.json', 'thumbnail/Xz9ekjFh3xWmiH36PBXUgAPid1YteaKn9uzXDz89.png', '13', 'Lottie', '2024-10-10 12:25:15', '2024-10-10 12:25:15'),
(85, 'Animal 11', 'resources/6707c7bcd8b50.json', 'thumbnail/27j8bVY7wuBKrIPKMKXOjuszecSSwhFdndEzAtlh.png', '13', 'Lottie', '2024-10-10 12:25:32', '2024-10-10 12:25:32'),
(86, 'Animal 12', 'resources/6707cabc4229a.json', 'thumbnail/fknARHV3K7VnEiAXWbLD0kRkCpK9aDeMSkCrRsj2.jpg', '13', 'Lottie', '2024-10-10 12:38:20', '2024-10-10 12:38:20'),
(87, 'Animal 13', 'resources/6707cace59709.json', 'thumbnail/7Is1UyH05fM5fxB8rVO7um5BJrt5Mj39bojwRuz8.jpg', '13', 'Lottie', '2024-10-10 12:38:38', '2024-10-10 12:38:38'),
(88, 'Animal 14', 'resources/6707cae7af5f8.json', 'thumbnail/GvB7pj09qjTewSO2HcLyu2OyalU5REFKncL0gRRc.jpg', '13', 'Lottie', '2024-10-10 12:39:03', '2024-10-10 12:39:03'),
(89, 'Robot', 'resources/6708b710793b9.json', 'thumbnail/D9v8VugT2Z7wGqhNemBZnTtbImuKp0y46ucnYNcS.jpg', '14', 'Lottie', '2024-10-11 05:22:06', '2024-10-11 05:26:40'),
(90, 'Robot 1', 'resources/6708bb4cef028.json', 'thumbnail/vKfLAV6LiIHt01lAtRCV4BafUJAx81uOIljDlj2x.jpg', '14', 'Lottie', '2024-10-11 05:42:41', '2024-10-11 05:44:44'),
(91, 'Animal 35', 'resources/670df3ce4ed0c.json', 'thumbnail/cboKiS30KcadbNne9E3edNTGwTLVFk50W5V6MS9K.jpg', '13', 'Lottie', '2024-10-15 04:47:10', '2024-10-15 04:47:10'),
(92, 'Circle dfgtr', 'resources/670df46d62d54.json', 'thumbnail/n2exGJZdLuRlwKWyX4syeTnGbPX7yyP1rRQZK88i.png', '11', 'Lottie', '2024-10-15 04:49:49', '2024-10-15 04:49:49'),
(93, 'Flower 1', 'resources/670df516d6723.json', 'thumbnail/fDvZ8se67ANnFklIaHk91z7vFIkEr69a9KpiDeM8.jpg', '15', 'Lottie', '2024-10-15 04:52:38', '2024-10-15 04:52:38'),
(94, 'Flower 2', 'resources/670df52a0c3f7.json', 'thumbnail/SDEs64REShKrfBuMCdmkJAVZSEkEkd3eYqynxpG4.png', '15', 'Lottie', '2024-10-15 04:52:58', '2024-10-15 04:52:58'),
(95, 'Flower 3', 'resources/670e07b0409eb.json', 'thumbnail/7Mzo6H9SLfRWyXOyrlzAXoTD6ck3udxyqHZtWzew.png', '15', 'Lottie', '2024-10-15 04:53:17', '2024-10-15 06:12:00'),
(96, 'Flower 4', 'resources/670e1d6671fc4.mov', 'thumbnail/byRXdSxDcWNSOl3RdrxiYX1AxawPR4nFcYGSxqTD.png', '15', 'Video', '2024-10-15 04:53:35', '2024-10-15 07:44:38'),
(97, 'Flower 5', 'resources/670df56405f81.json', 'thumbnail/1Qdmhn4EAv6obzAHCVlzQlfb0pG0qS7YZagWdava.png', '15', 'Lottie', '2024-10-15 04:53:56', '2024-10-15 04:53:56'),
(98, 'Flower 6', 'resources/670df61e2bf08.json', 'thumbnail/6FZpF3raiY1tgzAq3GWTS2Au8KOb4xBVsBnzqVP2.png', '15', 'Lottie', '2024-10-15 04:57:02', '2024-10-15 04:57:02'),
(99, 'Flower 7', 'resources/670df62fa95a7.json', 'thumbnail/cmA2IaJ5gg4diaJ8F3Hv610lnNU1E2w7MdTBKPzX.png', '15', 'Lottie', '2024-10-15 04:57:19', '2024-10-15 04:57:19'),
(100, 'Flower 8', 'resources/670df640b5d70.json', 'thumbnail/tCBmVJQy75C4zx6RAK6c3HEhc4ecKCh2r9IvA7vu.png', '15', 'Lottie', '2024-10-15 04:57:36', '2024-10-15 04:57:36'),
(101, 'Flower 9', 'resources/670df651c2004.json', 'thumbnail/v56XS3IYQuhgwDq7etBcvcLu7R2cMgdU5znNJk5b.png', '15', 'Lottie', '2024-10-15 04:57:53', '2024-10-15 04:57:53'),
(102, 'Flower 10', 'resources/670df66311210.json', 'thumbnail/jlZ9QImqfUuuWdL9jYzwFag7sKy8ECM7TyhVeuvv.png', '15', 'Lottie', '2024-10-15 04:58:11', '2024-10-15 04:58:11'),
(103, 'Flower 11', 'resources/670df6d6590f5.json', 'thumbnail/HMYX29bPII7IwjZ8HwShVFO2HRi83KEV2yBhgGPv.png', '15', 'Lottie', '2024-10-15 05:00:06', '2024-10-15 05:00:06'),
(105, 'Flower 12', 'resources/670df6ecd447f.json', 'thumbnail/4K8R5rNQJ6jqhjqKI7sATDrSbq3ww92pFqIIG1ep.png', '15', 'Lottie', '2024-10-15 05:00:28', '2024-10-15 05:00:28'),
(106, 'Flower 13', 'resources/670df7014907e.json', 'thumbnail/i6yVnp3pZXQa4ugC8vmeQXzNa9QX7woG5KIzb37t.png', '15', 'Lottie', '2024-10-15 05:00:49', '2024-10-15 05:00:49'),
(107, 'Flower 14', 'resources/670df714bda0b.json', 'thumbnail/thmo5Avp5vmhPhfdhYqdhKBE4MxQSCh57J1GrPck.png', '15', 'Lottie', '2024-10-15 05:01:08', '2024-10-15 05:01:08'),
(108, 'Flower 15', 'resources/670df7293bdf6.json', 'thumbnail/nG81oZj9Tt2RnoLmprRrtpSdUQgd2gDvB78y2qI3.png', '15', 'Lottie', '2024-10-15 05:01:29', '2024-10-15 05:01:29'),
(109, 'Flower 16', 'resources/670df73c1e14a.json', 'thumbnail/MUOvpLbxmoO0b3AWe8vfN0iUzlSbkusDqewrmw5U.png', '15', 'Lottie', '2024-10-15 05:01:48', '2024-10-15 05:01:48'),
(110, 'Flower 17', 'resources/670df74d23862.json', 'thumbnail/N39cgp3Cup4TkpmtxEdQ4ZNcimNhGaRirL9Dt3MV.png', '15', 'Lottie', '2024-10-15 05:02:05', '2024-10-15 05:02:05'),
(112, 'Flower 19', 'resources/670df7737f0e4.json', 'thumbnail/Imskds6LvYQGhI1wGME17UzKxO1OtOaZpdn3NkKG.png', '15', 'Lottie', '2024-10-15 05:02:43', '2024-10-15 05:02:43'),
(113, 'Funny', 'resources/670e359de3b8a.json', 'thumbnail/Ay55sykAFtTTyfJmhPxluSFVMPpkdyAYF4btBSP5.jpg', '16', 'Lottie', '2024-10-15 09:27:57', '2024-10-15 09:27:57'),
(114, 'Funny 1', 'resources/670e35bf9bfb4.json', 'thumbnail/R8gGu5ME3uBvGedaYa2CPLTI3sSWI58bUFYf3LvY.jpg', '16', 'Lottie', '2024-10-15 09:28:31', '2024-10-15 09:28:31'),
(115, 'Funny 2', 'resources/670e35d5b9eb4.json', 'thumbnail/L6Aq9bfZQn3EakwooLFFVYk0jq7yCcM9KSVkB08t.jpg', '16', 'Lottie', '2024-10-15 09:28:53', '2024-10-15 09:28:53'),
(116, 'Funny 3', 'resources/670e35f26cd5a.json', 'thumbnail/5xXTlFST2o9Bb0INskgag3Q5UTXD2m9M2IuS1Sio.jpg', '16', 'Lottie', '2024-10-15 09:29:22', '2024-10-15 09:29:22'),
(117, 'Funny 4', 'resources/670e3606ec77a.json', 'thumbnail/OdKs2MShH83ymNmJJqQSAYauYKPwpB9CZmSCSENm.jpg', '16', 'Lottie', '2024-10-15 09:29:42', '2024-10-15 09:29:42'),
(119, 'Funny 5', 'resources/670e371b899d0.json', 'thumbnail/Na2cZDnS9TwAehJu65XiYYwe6KV7NtoWA8JdQTcF.jpg', '16', 'Lottie', '2024-10-15 09:34:19', '2024-10-15 09:34:19'),
(120, 'Robot 3', 'resources/67162c0eedbc2.json', 'thumbnail/qpjUadJ8u3zTKYWX098BSazVXayHVu8ANPCuMtUk.jpg', '14', 'Lottie', '2024-10-21 10:25:18', '2024-10-21 10:25:18'),
(121, 'Other 1', 'resources/67162d35d346e.json', 'thumbnail/LkTsB3T5vy1m7B8XYHfozkHRhqH2Cggmtg6lGWV2.jpg', '17', 'Lottie', '2024-10-21 10:30:13', '2024-10-21 10:30:13'),
(122, 'Other 2', 'resources/67162d478304a.json', 'thumbnail/LAqC7zuNvskGDSc8C6JUvWT44Ui6EBwJtb4h9bTQ.jpg', '17', 'Lottie', '2024-10-21 10:30:31', '2024-10-21 10:30:31'),
(123, 'Other 3', 'resources/67162d58c0165.json', 'thumbnail/jaH0D4WcMQD9ijYe68p2sLG0XDyshemRtf0GesS5.jpg', '17', 'Lottie', '2024-10-21 10:30:48', '2024-10-21 10:30:48'),
(124, 'Other 4', 'resources/67162d6918951.json', 'thumbnail/ZFeN6NcWh81N854tkWxivpquGQ3NnbpP4y03NuEZ.jpg', '17', 'Lottie', '2024-10-21 10:31:05', '2024-10-21 10:31:05'),
(125, 'Other 5', 'resources/67162d7950b7f.json', 'thumbnail/GDACvZzXeQIQ8hPucU0EF61vJc8RMg8i7kXPqxJf.jpg', '17', 'Lottie', '2024-10-21 10:31:21', '2024-10-21 10:31:21'),
(127, 'Other 6', 'resources/67162d8b27d89.json', 'thumbnail/tjmSudhBUNCIUbQTuNOIByx3AsnGVPDaZTIHujWQ.jpg', '17', 'Lottie', '2024-10-21 10:31:39', '2024-10-21 10:31:39'),
(128, 'Other 7', 'resources/67162d9b152c3.json', 'thumbnail/Dhsd7bnMKBrTg24mKWNGHCAud69DKlo89ne9Z2dZ.jpg', '17', 'Lottie', '2024-10-21 10:31:55', '2024-10-21 10:31:55'),
(129, 'Other 8', 'resources/67162daa3da3a.json', 'thumbnail/FgZtzzxKHHazJowYcJW2qlIVUJJaelZ8kFz96Ls0.jpg', '17', 'Lottie', '2024-10-21 10:32:10', '2024-10-21 10:32:10'),
(130, 'Neon 8', 'resources/67162f3bc7a10.mov', 'thumbnail/ZccYHJ6jzSgK7HSP9cEkM4zzqZCxUvzTONj1BwB2.jpg', '7', 'Video', '2024-10-21 10:38:51', '2024-10-21 10:38:51'),
(131, 'Galaxy', 'resources/6716306412d1e.json', 'thumbnail/emFO2k7gtDGuN9fvcpr8qi9IYvtlBgChyHrQ61GU.jpg', '18', 'Lottie', '2024-10-21 10:43:48', '2024-10-21 10:43:48'),
(132, 'Galaxy 1', 'resources/671630922719e.json', 'thumbnail/yKE9qK5e0dgJIebOhRKMmnQp06kYZmQagl7yiWgD.jpg', '18', 'Lottie', '2024-10-21 10:44:34', '2024-10-21 10:44:34'),
(133, 'Galaxy 2', 'resources/671630d306088.json', 'thumbnail/FjdaK71bZXN0jfgvxox6CRXSjK544wlH4E69JwdL.jpg', '18', 'Lottie', '2024-10-21 10:45:39', '2024-10-21 10:45:39'),
(134, 'Galaxy 3', 'resources/671630e4b1ba0.json', 'thumbnail/GfguqAxyAfAAnsJPElluojfcfnMkZ0wX82x7VaSP.jpg', '18', 'Lottie', '2024-10-21 10:45:56', '2024-10-21 10:45:56'),
(135, 'Galaxy 4', 'resources/671630f9238e8.json', 'thumbnail/k0vv4SVaZDro0XCV9wrfShTxxB6KLT9l4B8VFSGA.jpg', '18', 'Lottie', '2024-10-21 10:46:17', '2024-10-21 10:46:17'),
(136, 'Galaxy 5', 'resources/671631083ac75.json', 'thumbnail/ABaMV32XbmxdY2RdAQNyRVMxfHY27pelLnFyVMPe.jpg', '18', 'Lottie', '2024-10-21 10:46:32', '2024-10-21 10:46:32'),
(137, 'Galaxy 6', 'resources/6716311ab7c19.json', 'thumbnail/slFLkHDM0TWQYljt7MIBdsn70rIHkjeTn6nxLgz8.jpg', '18', 'Lottie', '2024-10-21 10:46:50', '2024-10-21 10:46:50'),
(138, 'Galaxy 7', 'resources/6716312ca5e2b.json', 'thumbnail/db1BR6zoXX1wFovlDQ15qk1wnnkFqhhg7xNb0Hbp.jpg', '18', 'Lottie', '2024-10-21 10:47:08', '2024-10-21 10:47:08'),
(139, 'Galaxy 8', 'resources/6716313d5a231.json', 'thumbnail/JBf8wxMDLlXVEtYU4rsu5SLf5Fz0xHvPVoH6UNZ9.jpg', '18', 'Lottie', '2024-10-21 10:47:25', '2024-10-21 10:47:25'),
(140, 'Funny 7', 'resources/67163266c7e27.json', 'thumbnail/NvGLW7xHTMsilkaoIzrXJHYf64U980XQhK5Mtfeu.jpg', '16', 'Lottie', '2024-10-21 10:52:22', '2024-10-21 10:52:22'),
(141, 'Battery 1', 'resources/67163ebcdba39.json', 'thumbnail/SezqYEtvrVZ9jyLs2KguUMDwZ1W2jnnwAnnBQxuh.jpg', '12', 'Lottie', '2024-10-21 11:45:00', '2024-10-21 11:45:00'),
(142, 'Animal 16', 'resources/67163f8202487.json', 'thumbnail/iWybFR2OJPZqcz1RqqBYDXbvqBo9evns3DRkD196.jpg', '13', 'Lottie', '2024-10-21 11:48:18', '2024-10-21 11:48:18'),
(143, 'Battery 3', 'resources/671642589b83e.json', 'thumbnail/B1pbBzd91vyfqxDm4eei6NwI1DPuYTvjwXOvn3qs.jpg', '12', 'Lottie', '2024-10-21 12:00:24', '2024-10-21 12:00:24'),
(144, 'Circle 18', 'resources/671731c1f3b51.json', 'thumbnail/BbcOXED5a59Nk3omGn44qQNPc0s9l89uz5SL6kwl.jpg', '11', 'Lottie', '2024-10-22 05:01:54', '2024-10-22 05:01:54'),
(145, 'battery 6', 'resources/671739abac579.json', 'thumbnail/SxtnCzKj6VLrC29wpQPKEhQtaR4A8QPBLUcu6DSC.jpg', '12', 'Lottie', '2024-10-22 05:35:39', '2024-10-22 05:35:39'),
(146, 'battery 5', 'resources/67173a4255fc9.json', 'thumbnail/EADzs1qoTtFnVQfTxP7o59RPGa5uVJd3v0PbSHkk.jpg', '12', 'Lottie', '2024-10-22 05:38:10', '2024-10-22 05:38:10'),
(147, 'Halloween 1', 'resources/67187ad835f46.json', 'thumbnail/WMSmvcmXF7EdhM3M8JWYA8cLFKpaecm5abKwGupK.jpg', '19', 'Lottie', '2024-10-23 04:26:00', '2024-10-23 04:26:00'),
(148, 'Halloween 2', 'resources/67187ae834c3b.json', 'thumbnail/sTVuWR94wriOAIvJNiOEi7msAmBy9RpZdCW4gZKj.jpg', '19', 'Lottie', '2024-10-23 04:26:16', '2024-10-23 04:26:16'),
(149, 'Halloween 3', 'resources/67187af9281a0.json', 'thumbnail/1CTTVvQZss0fey9yU8MwR0Zw30RJHEKnivby0fRN.jpg', '19', 'Lottie', '2024-10-23 04:26:33', '2024-10-23 04:26:33'),
(150, 'Halloween 4', 'resources/67187b0ab10c2.json', 'thumbnail/YfN8YJRaYGyfVZYpYzHINlq3I3g37Thm70qj3l60.jpg', '19', 'Lottie', '2024-10-23 04:26:50', '2024-10-23 04:26:50'),
(151, 'Halloween 5', 'resources/67187b1c80042.json', 'thumbnail/xtne1wTnPwWNm1ug7vyWu4wuFIuCdVkVezoKXsC5.jpg', '19', 'Lottie', '2024-10-23 04:27:08', '2024-10-23 04:27:08'),
(152, 'Halloween 6', 'resources/67187b2d6999e.json', 'thumbnail/tb4vmtHnZ6dN7zY7Um2Mgho2Yv6eDkuXuIEecCYb.jpg', '19', 'Lottie', '2024-10-23 04:27:25', '2024-10-23 04:27:25'),
(153, 'Halloween 7', 'resources/67187b42ab4bf.json', 'thumbnail/f2312LzURFexQWY5HCUVGZfER8aWsy9gYnlKTZ9L.jpg', '19', 'Lottie', '2024-10-23 04:27:46', '2024-10-23 04:27:46'),
(154, 'Halloween 8', 'resources/67187b5067061.json', 'thumbnail/ekl3OANGgNEW4zu2OIURvIIqH7dH6ae9yvKgQCi2.jpg', '19', 'Lottie', '2024-10-23 04:28:00', '2024-10-23 04:28:00'),
(155, 'Halloween 9', 'resources/67187b5e2f1cc.json', 'thumbnail/k9DuRDrF9SoOB1GE1aPYkBqwEdWmta825408y52V.jpg', '19', 'Lottie', '2024-10-23 04:28:14', '2024-10-23 04:28:14'),
(156, 'Halloween 10', 'resources/67187b6e381d9.json', 'thumbnail/rvJyIZPDlc33rqPg1RkBkUDD9chor51CrTOhMVQu.jpg', '19', 'Lottie', '2024-10-23 04:28:30', '2024-10-23 04:28:30'),
(157, 'Halloween 11', 'resources/67187c85ce3cb.json', 'thumbnail/7fafnYS0470KRaPQjcrG59TZo72FSH44aWNEKNPh.jpg', '19', 'Lottie', '2024-10-23 04:33:09', '2024-10-23 04:33:09'),
(158, 'Halloween 12', 'resources/67187c98e6a7f.json', 'thumbnail/ucsRIP6GdNFVZfd1JIzCZbJr76LN2nibkns5WNjT.jpg', '19', 'Lottie', '2024-10-23 04:33:28', '2024-10-23 04:33:28'),
(159, 'Halloween 13', 'resources/67187cabea2db.json', 'thumbnail/iTgKWa3QIJZyhQWcdd5vh0KTG0TBcDCEBeU4oPSz.jpg', '19', 'Lottie', '2024-10-23 04:33:47', '2024-10-23 04:33:47'),
(160, 'Halloween 14', 'resources/67187cbd547c6.json', 'thumbnail/auZelrKRNKfFaWvw6pdEB2yCj2tuzeuyHpGMoyA2.jpg', '19', 'Lottie', '2024-10-23 04:34:05', '2024-10-23 04:34:05'),
(161, 'Halloween 15', 'resources/67187ccc9ac38.json', 'thumbnail/5yLtfGOEVQK2JhpXZ7ETqdodj3cvGOybNdLdOUbW.jpg', '19', 'Lottie', '2024-10-23 04:34:20', '2024-10-23 04:34:20'),
(162, 'Halloween 16', 'resources/67187cdddd713.json', 'thumbnail/Z7l6Q3WEP0OlXGe2gWext1oovVyIIhHCsbyC2ymb.jpg', '19', 'Lottie', '2024-10-23 04:34:37', '2024-10-23 04:34:37'),
(163, 'Halloween 17', 'resources/67187ced5af8f.json', 'thumbnail/5ULAJwiZv1SikL32WWtsFeP538Bbco0wMKPJiYvj.jpg', '19', 'Lottie', '2024-10-23 04:34:53', '2024-10-23 04:38:24'),
(164, 'Halloween 18', 'resources/67187cfd125d1.json', 'thumbnail/XjHXIITIpcrNNFy3hUAF7eqykhUruaynJHWtOlUV.jpg', '19', 'Lottie', '2024-10-23 04:35:09', '2024-10-23 04:35:09'),
(165, 'Halloween 19', 'resources/67187d102e637.json', 'thumbnail/CU1KzKyvZEgGB3Z8m72DeJn34kEeFcpOQRI50j03.jpg', '19', 'Lottie', '2024-10-23 04:35:28', '2024-10-23 04:35:28'),
(166, 'Halloween 20', 'resources/67187d2106ec4.json', 'thumbnail/Car6FAU6u1IVEJ3irSIe33NaR5xWzNldlGtmQtSM.jpg', '19', 'Lottie', '2024-10-23 04:35:45', '2024-10-23 04:35:45'),
(167, 'Halloween 21', 'resources/67187e4992cc6.json', 'thumbnail/MkY9OnnyQeYtZYxHMINev1j6PLbhDBa169ELW1lF.jpg', '19', 'Lottie', '2024-10-23 04:40:41', '2024-10-23 04:40:41'),
(168, 'Halloween 22', 'resources/67187e58a05ac.json', 'thumbnail/vzTDFOMLzNm6OiqnmSGWsFvxqEoUg2iTvId8fauL.jpg', '19', 'Lottie', '2024-10-23 04:40:56', '2024-10-23 04:40:56'),
(169, 'Halloween 23', 'resources/67187e6887d21.json', 'thumbnail/8fkzQIEzOZBMsKiJl5hAkcc4k6e9CC7Sp7zi1bOt.jpg', '19', 'Lottie', '2024-10-23 04:41:12', '2024-10-23 04:41:12'),
(170, 'Halloween 24', 'resources/67187e7ebce70.json', 'thumbnail/EwOfVDG32jwh4UWaQKlFeelytYCRsVT2nOu4Pc01.jpg', '19', 'Lottie', '2024-10-23 04:41:34', '2024-10-23 04:41:34'),
(171, 'Halloween 25', 'resources/67187e903ccac.json', 'thumbnail/xnpcatelLbRwCw3wrgSGk8tmx4IsE8RPksKwT13O.jpg', '19', 'Lottie', '2024-10-23 04:41:52', '2024-10-23 04:41:52'),
(172, 'Halloween 26', 'resources/67187e9f17333.json', 'thumbnail/B7VhvfFdFQ9YCCHpfqWOS2wzTIeInxDGxJEY8Ofi.jpg', '19', 'Lottie', '2024-10-23 04:42:07', '2024-10-23 04:42:07'),
(173, 'Halloween 27', 'resources/67187eaec209e.json', 'thumbnail/dqydrURctWEtsoqe28n1HflRxGlJqTP9TRZbGnIm.jpg', '19', 'Lottie', '2024-10-23 04:42:22', '2024-10-23 04:42:22'),
(174, 'Halloween 28', 'resources/67187ec0c2590.json', 'thumbnail/SCXBmTuqYtgJp6E3AHbolAWrSVr73O4aLpgH6WVc.jpg', '19', 'Lottie', '2024-10-23 04:42:40', '2024-10-23 04:42:40'),
(175, 'Halloween 29', 'resources/67187ed172085.json', 'thumbnail/qDhTTRaAGaTp85Q8GIaEPSSYawliJvjFLJQERMkZ.jpg', '19', 'Lottie', '2024-10-23 04:42:57', '2024-10-23 04:42:57'),
(176, 'Halloween 30', 'resources/67187ee27dbf6.json', 'thumbnail/MlcueVKJdOB7eO1ceYxMQ2UilM69bJQB65c5N6vP.jpg', '19', 'Lottie', '2024-10-23 04:43:14', '2024-10-23 04:43:14'),
(177, 'Halloween 31', 'resources/67188027012da.json', 'thumbnail/voXnTa2xS3okx4EaBHZX1mqq0VfFNv8A1dcghkNd.jpg', '19', 'Lottie', '2024-10-23 04:48:39', '2024-10-23 04:48:39'),
(178, 'Halloween 32', 'resources/671880364b6bd.json', 'thumbnail/dnFlmu8uLTyFWynsvgUIrAD1DOE54KjfaKyUGuwK.jpg', '19', 'Lottie', '2024-10-23 04:48:54', '2024-10-23 04:48:54'),
(179, 'Halloween 33', 'resources/671880477f796.json', 'thumbnail/MucNyb2tvkajjN13Wkyfmx2PdpUqKM2VGGoQyseB.jpg', '19', 'Lottie', '2024-10-23 04:49:11', '2024-10-23 04:49:11'),
(180, 'Halloween 34', 'resources/67188056d82a3.json', 'thumbnail/NRc1Cd53AxHa9qFT1NwZ0vg7BFeLbDDUq7kTZGh1.jpg', '19', 'Lottie', '2024-10-23 04:49:26', '2024-10-23 04:49:26'),
(181, 'Halloween 35', 'resources/6718806762dc9.json', 'thumbnail/6uRTHVSvhCzXXRuzLQdbt4Hm7aOiA0LnWyLSNHGc.jpg', '19', 'Lottie', '2024-10-23 04:49:43', '2024-10-23 04:49:43'),
(182, 'Halloween 36', 'resources/6718807bc5867.json', 'thumbnail/mI8eikWK5pvns7KIvN5DYq6fSBsUlAn9STXoZJg2.jpg', '19', 'Lottie', '2024-10-23 04:50:03', '2024-10-23 04:50:03'),
(183, 'Halloween 37', 'resources/6718808d608c3.json', 'thumbnail/l6prrwN3IrGpK3bObJjank1hi9Ry9kpEeA8y7s4C.jpg', '19', 'Lottie', '2024-10-23 04:50:21', '2024-10-23 04:50:21'),
(184, 'Halloween 38', 'resources/6718809c8d7dd.json', 'thumbnail/7m5j98lfWwRP9GJDQYiZz0vXvDzsysbbO4CH0Zwr.jpg', '19', 'Lottie', '2024-10-23 04:50:36', '2024-10-23 04:50:36'),
(185, 'Halloween 38', 'resources/671880e71c600.json', 'thumbnail/AXgSF6qat4CpKV2Agny8cKV7SvTM6nQB21hqOQsR.jpg', '19', 'Lottie', '2024-10-23 04:51:51', '2024-10-23 04:51:51'),
(186, 'Halloween 39', 'resources/671880f8e18cd.json', 'thumbnail/FwNbhCBHO4Y7UvUheOATZebnaVPtBHHjfCDRs9wM.jpg', '19', 'Lottie', '2024-10-23 04:52:08', '2024-10-23 04:52:08'),
(187, 'Halloween 40', 'resources/671881081b37f.json', 'thumbnail/o97WDyXaLffoAxoG948kPlfMN0VP8CtuE6IH0cce.jpg', '19', 'Lottie', '2024-10-23 04:52:24', '2024-10-23 04:52:24'),
(188, 'Halloween 41', 'resources/6718820b76d1b.json', 'thumbnail/PCwTeH1tyT7QpvgVxgYNmW2yTKVtHUmX469l7lNb.jpg', '19', 'Lottie', '2024-10-23 04:56:43', '2024-10-23 04:56:43'),
(189, 'Halloween 42', 'resources/6718822013f63.json', 'thumbnail/E5mDuv7310gHt0rRUb8hTdNpHDbdr58tV8YyEjjG.jpg', '19', 'Lottie', '2024-10-23 04:57:04', '2024-10-23 04:57:04'),
(190, 'Halloween 43', 'resources/67188232d2954.json', 'thumbnail/X80FtteO7uNdpF3HAdmhz1gApgoyr2Rfi6njgn5Q.jpg', '19', 'Lottie', '2024-10-23 04:57:22', '2024-10-23 04:57:22'),
(191, 'Halloween 44', 'resources/67188248c1820.json', 'thumbnail/IurDCluDaVVTojJK5ARIolKNLGcDIjqOgwqh5GBt.jpg', '19', 'Lottie', '2024-10-23 04:57:44', '2024-10-23 04:57:44'),
(192, 'Halloween 45', 'resources/6718825a7124b.json', 'thumbnail/FcKAJ3b9povQtEhYIf5prpsZhuA9uedKPegA5JZj.jpg', '19', 'Lottie', '2024-10-23 04:58:02', '2024-10-23 04:58:02'),
(193, 'Halloween 46', 'resources/6718826a25d1c.json', 'thumbnail/dWC2XePDLcJnUP0gojmJZYg5oaER3D1OOWGt8Etl.jpg', '19', 'Lottie', '2024-10-23 04:58:18', '2024-10-23 04:58:18'),
(194, 'Halloween 47', 'resources/6718827b4047e.json', 'thumbnail/c01ynJ0vxNM84i9NNxCiI0JsZHCfVR8Z02L4RJ0i.jpg', '19', 'Lottie', '2024-10-23 04:58:35', '2024-10-23 04:58:35'),
(195, 'Halloween 48', 'resources/6718828ed31c6.json', 'thumbnail/4CEq4WbbP6LCEq2mKSyVn5tq5cyTkEGaKljORNJS.jpg', '19', 'Lottie', '2024-10-23 04:58:54', '2024-10-23 04:58:54'),
(196, 'Halloween 49', 'resources/671882a339ba3.json', 'thumbnail/DkoyBIP84S1W0UrVtL8de6iudyz8wmxN4BSts2Y5.jpg', '19', 'Lottie', '2024-10-23 04:59:15', '2024-10-23 04:59:15'),
(197, 'Halloween 50', 'resources/671882b4d2f7a.json', 'thumbnail/06WkaIUM0lSNdOdQLFO8Vv1Wm2SCdyPEZ04XtoEU.jpg', '19', 'Lottie', '2024-10-23 04:59:32', '2024-10-23 04:59:32'),
(198, 'Halloween 51', 'resources/6718839844694.json', 'thumbnail/2rdScsjAwRQmc4w2EunC0il5DmuPY14sWH5cPQRw.jpg', '19', 'Lottie', '2024-10-23 05:03:20', '2024-10-23 05:03:20'),
(199, 'Halloween 52', 'resources/671883a838008.json', 'thumbnail/EKgeHalD42Gh58671UNBYz9BfjzziK6XWfNfbvAe.jpg', '19', 'Lottie', '2024-10-23 05:03:36', '2024-10-23 05:03:36'),
(200, 'Halloween 53', 'resources/671883b7e5640.json', 'thumbnail/7xQl0ccl059lVjBRYs50p3COSN1f5oVIaT5tzMzI.jpg', '19', 'Lottie', '2024-10-23 05:03:51', '2024-10-23 05:03:51'),
(201, 'Halloween 54', 'resources/671883cada928.json', 'thumbnail/tJ2Ra0GUyU1XYsVY6xmSicXWksy3F1ESOeif2DFz.jpg', '19', 'Lottie', '2024-10-23 05:04:10', '2024-10-23 05:04:10');

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
(1, 'maya khan', 'shoaib.mobipixels@gmail.com', NULL, '$2y$12$Vci/gHy2hE.ihvIsqyUAYeBnOgTUcID/d0o0lSjfnjzYMXzFkOkHq', '8eAloF5ajlhgalBAtSQsEEcm7P1f0RYwQYLDbby9qNdmxDhcZ6r32xppjAkl', '2024-09-27 06:13:32', '2024-09-27 06:13:32');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
