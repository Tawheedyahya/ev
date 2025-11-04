-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2025 at 08:15 AM
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
-- Database: `ev`
--

-- --------------------------------------------------------

--
-- Table structure for table `appvenuefacilities`
--

CREATE TABLE `appvenuefacilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `venue_id` bigint(20) UNSIGNED NOT NULL,
  `venue_facilities` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appvenuefacilities`
--

INSERT INTO `appvenuefacilities` (`id`, `venue_id`, `venue_facilities`, `created_at`, `updated_at`) VALUES
(3, 2, 3, NULL, NULL),
(4, 2, 4, NULL, NULL),
(5, 3, 1, NULL, NULL),
(6, 4, 3, NULL, NULL),
(9, 6, 2, NULL, NULL),
(10, 6, 3, NULL, NULL),
(11, 6, 4, NULL, NULL),
(12, 7, 1, NULL, NULL),
(13, 7, 2, NULL, NULL),
(14, 8, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookingdates`
--

CREATE TABLE `bookingdates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `order_date` datetime NOT NULL,
  `upto_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `venue_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `status` enum('pending','approved','cancelled','rejected') NOT NULL DEFAULT 'pending',
  `notes` varchar(255) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `upto_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `venue_id`, `user_id`, `name`, `email`, `phone`, `status`, `notes`, `order_date`, `upto_date`, `created_at`, `updated_at`) VALUES
(2, 3, 1, 'yahi', 'tawheedyahya0@gmail.com', '9994780436', 'rejected', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2025-09-23 09:00:00', '2025-09-24 09:00:00', '2025-09-23 00:49:49', '2025-09-23 03:52:23'),
(3, 4, 1, 'yahi', 'tawheedyahya0@gmail.com', '9994780436', 'cancelled', NULL, '2025-09-24 12:00:00', '2025-09-30 12:00:00', '2025-09-23 01:33:32', '2025-09-28 23:32:24'),
(4, 2, 1, 'yahi', 'tawheedyahya0@gmail.com', '9994780436', 'rejected', 'aaaa', '2025-09-23 12:00:00', '2025-09-25 12:00:00', '2025-09-23 02:29:38', '2025-09-28 23:36:54'),
(5, 2, 1, 'yahi', 'tawheedyahya0@gmail.com', '9994780436', 'cancelled', NULL, '2025-09-23 12:00:00', '2025-09-30 12:00:00', '2025-09-23 02:29:50', '2025-09-23 05:32:44'),
(6, 2, 1, 'yahi', 'tawheedyahya0@gmail.com', '9994780436', 'cancelled', NULL, '2025-09-23 12:00:00', '2025-09-30 12:00:00', '2025-09-23 02:30:02', '2025-09-23 05:49:47'),
(7, 2, 1, 'yahi', 'tawheedyahya0@gmail.com', '9994780436', 'cancelled', NULL, '2025-09-24 12:00:00', '2025-09-26 12:00:00', '2025-09-23 02:30:13', '2025-09-25 00:56:30'),
(8, 2, 1, 'yahi', 'tawheedyahya0@gmail.com', '9994780436', 'cancelled', NULL, '2025-09-29 12:00:00', '2025-09-30 12:00:00', '2025-09-23 02:30:24', '2025-09-28 23:28:38'),
(9, 2, 1, 'yahi', 'tawheedyahya0@gmail.com', '9994780436', 'cancelled', NULL, '2025-09-23 12:00:00', '2025-09-24 11:00:00', '2025-09-23 05:30:37', '2025-09-28 23:28:20'),
(10, 2, 1, 'yahi', 'tawheedyahya0@gmail.com', '9994780436', 'cancelled', NULL, '2025-09-29 12:00:00', '2025-09-29 12:00:00', '2025-09-28 23:38:12', '2025-09-28 23:39:04'),
(12, 2, 1, 'yahi', 'tawheedyahya0@gmail.com', '9994780436', 'rejected', 'the date is already booked', '2025-10-03 12:00:00', '2025-10-09 12:00:00', '2025-10-03 03:52:17', '2025-10-03 03:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `hearts`
--

CREATE TABLE `hearts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `venue_id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hearts`
--

INSERT INTO `hearts` (`id`, `user_id`, `venue_id`, `category`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 'like', '2025-09-24 04:33:58', '2025-09-24 04:33:58'),
(34, 1, 2, 'venue', '2025-10-03 04:56:53', '2025-10-03 04:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_03_064246_user_phone', 2),
(6, '2025_09_05_053447_create_venueproviders_table', 3),
(7, '2025_09_05_094719_create_occasions_table', 4),
(8, '2025_09_05_102453_occasion_pic', 5),
(10, '2025_09_08_102935_create_venuefacilities_table', 6),
(11, '2025_09_09_075914_addforeign_venues', 7),
(12, '2025_09_09_080314_drop_venues', 8),
(13, '2025_09_09_074417_create_venues_table', 9),
(14, '2025_09_09_081101_create_venuetypes_table', 10),
(15, '2025_09_09_081210_create_appvenuefacilities_table', 11),
(16, '2025_09_09_081224_create_venueimages_table', 12),
(17, '2025_09_09_092003_venuetype', 13),
(20, '2025_09_10_050254_addamountdes_in_venues', 14),
(23, '2025_09_17_040633_create_rooms_table', 15),
(26, '2025_09_18_053043_vr_venues', 16),
(27, '2025_09_19_051544_create_bookings_table', 17),
(28, '2025_09_19_053132_create_bookingdates_table', 18),
(29, '2025_09_23_044610_add_bookingdetails_bookings_upto', 19),
(30, '2025_09_23_043324_add_bookingdetails_bookings', 20),
(31, '2025_09_23_045229_add_bookingdetails_bookings_order', 21),
(32, '2025_09_24_083358_create_hearts_table', 22),
(33, '2025_09_29_052616_create_professionlists_table', 23),
(34, '2025_09_29_060233_create_professionals_table', 24),
(35, '2025_09_29_073906_create_serviceplaces_table', 25),
(36, '2025_09_29_073859_create_proserviceplaces_table', 26),
(37, '2025_09_29_094320_add_email_verified_at', 27),
(38, '2025_09_29_094841_add_email_verified_at', 28),
(39, '2025_09_29_095416_add_email_in_prof', 29),
(41, '2025_10_02_042744_add_logo_in_professionals', 30),
(42, '2025_10_02_072240_add_amount_professionals', 31),
(43, '2025_10_07_082641_add_foreign_in_professionals', 32),
(44, '2025_10_07_083422_add_foreign_in_professionals_org', 33),
(45, '2025_10_07_084723_add_foreign_in_professionals_org_', 34),
(46, '2025_10_08_055259_add_price_in_professionals', 35);

-- --------------------------------------------------------

--
-- Table structure for table `occasions`
--

CREATE TABLE `occasions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `occasion_icon` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `occasions`
--

INSERT INTO `occasions` (`id`, `name`, `occasion_icon`, `created_at`, `updated_at`) VALUES
(2, 'Marriage', NULL, NULL, NULL),
(3, 'party', NULL, NULL, NULL),
(4, 'corporate party', NULL, NULL, NULL),
(5, 'temple', NULL, NULL, NULL),
(6, 'puperty', NULL, NULL, NULL),
(7, 'school', NULL, NULL, NULL),
(8, 'college', NULL, NULL, NULL),
(9, 'social', NULL, NULL, NULL),
(10, 'lovers', NULL, NULL, NULL);

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
-- Table structure for table `professionals`
--

CREATE TABLE `professionals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `companyname` varchar(40) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `doc` varchar(255) NOT NULL,
  `experience` decimal(5,1) NOT NULL,
  `profession` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `amount` decimal(5,2) DEFAULT NULL,
  `prof_logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `price` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professionals`
--

INSERT INTO `professionals` (`id`, `name`, `address`, `companyname`, `phone`, `password`, `doc`, `experience`, `profession`, `status`, `amount`, `prof_logo`, `created_at`, `updated_at`, `email_verified_at`, `token`, `email`, `price`) VALUES
(7, 'yahi', 'malaysia', 'squid dancing', '213321312', '$2y$12$9rzclsG0M/Caa6SU7laCc.r80KNwBCqdMa0Vaq5G0WyqjJmK55Cm.', '1759826176yahi.pdf', 1.0, 2, 'approved', NULL, 'prof_logo/7.jpg', '2025-10-07 03:06:16', '2025-10-08 02:48:02', '2025-10-07 08:38:36', NULL, 'tawheedyahya0@gmail.com', 50.00),
(8, 'yahi', 'MALAYSIA', 'NITHI', '6025805024', '$2y$12$7DrZlUgsxzHVXfCp7R7XPuy3TEve7u8ZhAX5.gd4HH2Q.lHeNv/Xa', '1759830974yahi.pdf', 1.0, 2, 'approved', NULL, 'prof_logo/8.jpg', '2025-10-07 04:26:14', '2025-10-08 02:46:38', '2025-10-07 09:57:09', NULL, 'yahi0733@gmail.com', 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `professionlists`
--

CREATE TABLE `professionlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professionlists`
--

INSERT INTO `professionlists` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'photography', NULL, NULL),
(2, 'dancing', NULL, NULL),
(3, 'event manager', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `proserviceplaces`
--

CREATE TABLE `proserviceplaces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pro_id` bigint(20) UNSIGNED NOT NULL,
  `ser_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proserviceplaces`
--

INSERT INTO `proserviceplaces` (`id`, `pro_id`, `ser_id`, `created_at`, `updated_at`) VALUES
(4, 7, 4, NULL, NULL),
(5, 7, 3, NULL, NULL),
(6, 8, 4, NULL, NULL),
(7, 8, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `venue_id` bigint(20) UNSIGNED NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `room_capacity` int(11) NOT NULL,
  `room_doc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `venue_id`, `room_name`, `room_capacity`, `room_doc`, `created_at`, `updated_at`) VALUES
(7, 2, 'marriage ', 100, 'room_images/17580961671', '2025-09-17 02:32:47', '2025-09-17 02:32:47'),
(8, 2, 'second', 200, 'room_images/1758096490second', '2025-09-17 02:35:35', '2025-09-17 02:38:10'),
(9, 2, 'dinning', 2000, 'room_images/1758103002dinning-hall', '2025-09-17 04:26:42', '2025-09-17 04:27:03'),
(10, 6, 'dinning', 2000, 'room_images/1759481292dinning', '2025-10-03 03:18:12', '2025-10-03 03:18:12'),
(11, 7, 'dinning', 100, 'room_images/1759482607dinning', '2025-10-03 03:40:07', '2025-10-03 03:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `serviceplaces`
--

CREATE TABLE `serviceplaces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `serviceplaces`
--

INSERT INTO `serviceplaces` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'kula lampur', NULL, NULL),
(2, 'Kota Bharu', NULL, NULL),
(3, 'penang', NULL, NULL),
(4, 'chennai', NULL, NULL),
(5, 'madurai', NULL, NULL),
(6, 'coimbatore', NULL, NULL),
(7, 'salem', NULL, NULL),
(8, 'sivakasi', NULL, NULL),
(9, 'apk', NULL, NULL),
(10, 'kallai', NULL, NULL),
(11, 'pollachi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('hD4AM1sQRwlj80UVcUU1D5vGGDPSc7b0Q62dH1VK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTlZVNWtrS2Q4eUxxWDZDR2pxVTdKRmgzdkVlcHJpNFV4Unp3aUJJRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ldmVudHNwYWNlL3Byb2YvcHJvZmVzc2lvbmFsLzciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1759990399);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'yahi', 'tawheedyahya0@gmail.com', '9994780436', NULL, '$2y$12$kEOg5Mj/Fh.x5.aNzfiGf.R05hXrM3Rki527bW9hA0X1yiS/6REwS', 'StOfXv7Xr3l2V9trnG5VO5DEuEfHlKXBbImvcyTXOGFTdernzIRJHQvHi5JQ', '2025-09-03 03:15:17', '2025-09-05 00:49:07'),
(2, 'yahi', 'tawheedyahi@gmail.com', '92839', NULL, '$2y$12$MoDP/Nrg5EeGvbPf0bx1auBqYb7lhORBauprI3yurw50veWWZPfMq', NULL, '2025-09-03 03:38:08', '2025-09-03 03:38:08'),
(3, 'ysh', 'tawheedyahya000@gmail.com', '83478342', NULL, '$2y$12$rr8DkrwKGYj.vMU02jCjOeR9Rnz8YlchC3eFpPuJHMI42J6YfAGqq', NULL, '2025-09-03 22:26:31', '2025-09-03 22:26:31'),
(4, 'suva', 'suva@gmail.com', '213213', NULL, '$2y$12$R.Pxa54pN2iMXs7d6KDlzeaY51coGfCgd6NTaaW1bn9PPLvR6DlGq', NULL, '2025-09-11 05:27:51', '2025-09-11 05:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `venuefacilities`
--

CREATE TABLE `venuefacilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `venuefacilities`
--

INSERT INTO `venuefacilities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'parking', NULL, NULL),
(2, 'wifi', NULL, NULL),
(3, 'dancing floor', NULL, NULL),
(4, 'sound system', NULL, NULL),
(5, 'food provide', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `venueimages`
--

CREATE TABLE `venueimages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `venue_id` bigint(20) UNSIGNED NOT NULL,
  `doc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `venueimages`
--

INSERT INTO `venueimages` (`id`, `venue_id`, `doc`, `created_at`, `updated_at`) VALUES
(2, 2, 'verified_venue_images/1758081858gvm-hall.jpg', '2025-09-16 22:34:18', '2025-09-16 22:34:18'),
(3, 3, 'verified_venue_images/1758096286gvm-hall.jpg', '2025-09-17 02:34:46', '2025-09-17 02:34:46'),
(4, 4, 'verified_venue_images/1758099494gvm-hall.jpg', '2025-09-17 03:28:14', '2025-09-17 03:28:14'),
(6, 6, 'verified_venue_images/1758099530gvm-hall.jpg', '2025-09-17 03:28:50', '2025-09-17 03:28:50'),
(7, 7, 'verified_venue_images/1759482560jk-hall.png', '2025-10-03 03:39:20', '2025-10-03 03:39:20'),
(8, 8, 'verified_venue_images/1759903447jk-hall.jpg', '2025-10-08 00:34:07', '2025-10-08 00:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `venueproviders`
--

CREATE TABLE `venueproviders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','approved','disapproved') NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `doc` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `venueproviders`
--

INSERT INTO `venueproviders` (`id`, `status`, `name`, `email`, `phone`, `doc`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 'approved', 'dasdas', 'tawheedyahya0@gmail.com', '09994780436', '1757062338_dasdas.pdf', '2025-09-05 03:26:44', '$2y$12$pDBoXHwh3sWynVooHiYZTe.7etZkBAat2W47ISvwyzskf7YQcZeMy', '', '2025-09-05 03:22:18', '2025-09-05 03:26:44'),
(11, 'approved', 'yahi', 'yahi0733@gmail.com', '213', '1757495216_yahi.jpg', '2025-09-10 03:37:45', '$2y$12$Tu8QqSOZoao2lBM4UIjusOye25WYsRH.2CvSB7xFqp1Em3VlDW6ni', NULL, '2025-09-10 03:36:56', '2025-09-10 03:37:45'),
(12, 'pending', 'abinav', 'abinav@soulcreationz.com', '7838468732', '1757498886_abinav.jpg', NULL, '$2y$12$qJfNGHdVJzsE3C2L5UTkP.YRbEgLbVqsf0KvziFa07pWyilXTKSgy', 'oIYNQIK9FQDy2fXIUdbNmMaHF5LNvjgCghwtOCrLuUUUIMxn2vz7Hv6ipK9P', '2025-09-10 04:38:06', '2025-09-10 04:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `venue_provider_id` bigint(20) UNSIGNED NOT NULL,
  `venue_name` varchar(255) NOT NULL,
  `venue_address` varchar(255) NOT NULL,
  `venue_city` varchar(255) NOT NULL,
  `venue_seat_capacity` int(11) NOT NULL,
  `latitude` decimal(10,6) NOT NULL,
  `longitude` decimal(10,6) NOT NULL,
  `description` text DEFAULT NULL,
  `amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vr` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`id`, `venue_provider_id`, `venue_name`, `venue_address`, `venue_city`, `venue_seat_capacity`, `latitude`, `longitude`, `description`, `amount`, `created_at`, `updated_at`, `vr`) VALUES
(2, 10, 'mk halll', 'Coimbatore, Coimbatore North, Coimbatore, Tamil Nadu, 641001, India', 'coimbatore', 100, 10.977144, 76.965919, 'This venue is designed to provide the perfect setting for both intimate gatherings and large-scale celebrations. Located in the heart of the city, it combines modern architecture with elegant interiors, offering a warm and inviting atmosphere for guests.', 1.00, '2025-09-16 22:34:18', '2025-10-03 03:14:19', NULL),
(3, 11, '2', '76, vallal nagar, coimbatore-641008', 'coimbatore', 1000, 19.816977, 105.862035, 'it is a good venue', 2.00, '2025-09-17 02:34:46', '2025-09-17 02:34:46', NULL),
(4, 10, 'gvm hall', '76, vallal nagar, coimbatore-641008', 'coimbatore', 1000, 22.880544, 77.804114, 'hiii', 3.00, '2025-09-17 03:28:14', '2025-10-03 03:14:37', NULL),
(6, 10, 'kg', '76, vallal nagar, coimbatore-641008', 'coimbatore', 1000, 23.097531, 78.288094, 'dasdsad', 5.00, '2025-09-17 03:28:50', '2025-10-03 03:16:19', NULL),
(7, 10, 'jk hall', 'Coimbatore, Coimbatore North, Coimbatore, Tamil Nadu, 641001, India', 'malysia', 200, 11.001812, 76.962842, 'jjkkk', 200.00, '2025-10-03 03:39:20', '2025-10-03 03:39:20', NULL),
(8, 10, 'jk hall', 'Coimbatore, Coimbatore North, Coimbatore, Tamil Nadu, 641001, India', 'ashdjashkd', 200, 11.047000, 76.998900, 'asdas', 200.00, '2025-10-08 00:34:07', '2025-10-08 00:34:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `venuetypes`
--

CREATE TABLE `venuetypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `venue_id` bigint(20) UNSIGNED NOT NULL,
  `occasion_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `venuetypes`
--

INSERT INTO `venuetypes` (`id`, `venue_id`, `occasion_id`, `created_at`, `updated_at`) VALUES
(2, 2, 3, NULL, NULL),
(3, 3, 4, NULL, NULL),
(4, 4, 3, NULL, NULL),
(6, 6, 5, NULL, NULL),
(7, 7, 3, NULL, NULL),
(8, 7, 5, NULL, NULL),
(9, 7, 6, NULL, NULL),
(10, 8, 3, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appvenuefacilities`
--
ALTER TABLE `appvenuefacilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appvenuefacilities_venue_id_foreign` (`venue_id`),
  ADD KEY `appvenuefacilities_venue_facilities_foreign` (`venue_facilities`);

--
-- Indexes for table `bookingdates`
--
ALTER TABLE `bookingdates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookingdates_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_venue_id_foreign` (`venue_id`),
  ADD KEY `fk_bookings_user` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hearts`
--
ALTER TABLE `hearts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hearts_user_id_foreign` (`user_id`),
  ADD KEY `hearts_venue_id_foreign` (`venue_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occasions`
--
ALTER TABLE `occasions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `professionals`
--
ALTER TABLE `professionals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_profession` (`profession`);

--
-- Indexes for table `professionlists`
--
ALTER TABLE `professionlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proserviceplaces`
--
ALTER TABLE `proserviceplaces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proserviceplaces_pro_id_foreign` (`pro_id`),
  ADD KEY `proserviceplaces_ser_id_foreign` (`ser_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_venue_id_foreign` (`venue_id`);

--
-- Indexes for table `serviceplaces`
--
ALTER TABLE `serviceplaces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `venuefacilities`
--
ALTER TABLE `venuefacilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venueimages`
--
ALTER TABLE `venueimages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venueimages_venue_id_foreign` (`venue_id`);

--
-- Indexes for table `venueproviders`
--
ALTER TABLE `venueproviders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `venueproviders_email_unique` (`email`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venues_venue_provider_id_foreign` (`venue_provider_id`);

--
-- Indexes for table `venuetypes`
--
ALTER TABLE `venuetypes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venuetypes_venue_id_foreign` (`venue_id`),
  ADD KEY `venuetypes_venue_type_foreign` (`occasion_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appvenuefacilities`
--
ALTER TABLE `appvenuefacilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `bookingdates`
--
ALTER TABLE `bookingdates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hearts`
--
ALTER TABLE `hearts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `occasions`
--
ALTER TABLE `occasions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `professionals`
--
ALTER TABLE `professionals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `professionlists`
--
ALTER TABLE `professionlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `proserviceplaces`
--
ALTER TABLE `proserviceplaces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `serviceplaces`
--
ALTER TABLE `serviceplaces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `venuefacilities`
--
ALTER TABLE `venuefacilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `venueimages`
--
ALTER TABLE `venueimages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `venueproviders`
--
ALTER TABLE `venueproviders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `venuetypes`
--
ALTER TABLE `venuetypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appvenuefacilities`
--
ALTER TABLE `appvenuefacilities`
  ADD CONSTRAINT `appvenuefacilities_venue_facilities_foreign` FOREIGN KEY (`venue_facilities`) REFERENCES `venuefacilities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appvenuefacilities_venue_id_foreign` FOREIGN KEY (`venue_id`) REFERENCES `venues` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bookingdates`
--
ALTER TABLE `bookingdates`
  ADD CONSTRAINT `bookingdates_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_venue_id_foreign` FOREIGN KEY (`venue_id`) REFERENCES `venues` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_bookings_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hearts`
--
ALTER TABLE `hearts`
  ADD CONSTRAINT `hearts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hearts_venue_id_foreign` FOREIGN KEY (`venue_id`) REFERENCES `venues` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `professionals`
--
ALTER TABLE `professionals`
  ADD CONSTRAINT `fk_profession` FOREIGN KEY (`profession`) REFERENCES `professionlists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proserviceplaces`
--
ALTER TABLE `proserviceplaces`
  ADD CONSTRAINT `proserviceplaces_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `professionals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proserviceplaces_ser_id_foreign` FOREIGN KEY (`ser_id`) REFERENCES `serviceplaces` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_venue_id_foreign` FOREIGN KEY (`venue_id`) REFERENCES `venues` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `venueimages`
--
ALTER TABLE `venueimages`
  ADD CONSTRAINT `venueimages_venue_id_foreign` FOREIGN KEY (`venue_id`) REFERENCES `venues` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `venues`
--
ALTER TABLE `venues`
  ADD CONSTRAINT `venues_venue_provider_id_foreign` FOREIGN KEY (`venue_provider_id`) REFERENCES `venueproviders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `venuetypes`
--
ALTER TABLE `venuetypes`
  ADD CONSTRAINT `venuetypes_venue_id_foreign` FOREIGN KEY (`venue_id`) REFERENCES `venues` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `venuetypes_venue_type_foreign` FOREIGN KEY (`occasion_id`) REFERENCES `occasions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
