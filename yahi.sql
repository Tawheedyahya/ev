-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2025 at 04:35 AM
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
(6, 4, 3, NULL, NULL),
(9, 6, 2, NULL, NULL),
(10, 6, 3, NULL, NULL),
(11, 6, 4, NULL, NULL),
(13, 7, 2, NULL, NULL),
(15, 3, 2, NULL, NULL),
(17, 9, 2, NULL, NULL),
(19, 9, 3, NULL, NULL),
(21, 9, 4, NULL, NULL),
(22, 10, 2, NULL, NULL),
(23, 10, 3, NULL, NULL),
(24, 11, 2, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `bookprofessionals`
--

CREATE TABLE `bookprofessionals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `professional_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` enum('pending','cancelled','rejected','approved') NOT NULL DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `order_date` datetime NOT NULL,
  `upto_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-occasions:v1', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:9:{i:0;O:19:\"App\\Models\\Occasion\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"occasions\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:2:{s:2:\"id\";i:2;s:4:\"name\";s:8:\"Marriage\";}s:11:\"\0*\0original\";a:2:{s:2:\"id\";i:2;s:4:\"name\";s:8:\"Marriage\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:19:\"App\\Models\\Occasion\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"occasions\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:2:{s:2:\"id\";i:3;s:4:\"name\";s:5:\"party\";}s:11:\"\0*\0original\";a:2:{s:2:\"id\";i:3;s:4:\"name\";s:5:\"party\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:19:\"App\\Models\\Occasion\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"occasions\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:2:{s:2:\"id\";i:4;s:4:\"name\";s:15:\"corporate party\";}s:11:\"\0*\0original\";a:2:{s:2:\"id\";i:4;s:4:\"name\";s:15:\"corporate party\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:19:\"App\\Models\\Occasion\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"occasions\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:2:{s:2:\"id\";i:5;s:4:\"name\";s:6:\"temple\";}s:11:\"\0*\0original\";a:2:{s:2:\"id\";i:5;s:4:\"name\";s:6:\"temple\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:4;O:19:\"App\\Models\\Occasion\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"occasions\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:2:{s:2:\"id\";i:6;s:4:\"name\";s:7:\"puperty\";}s:11:\"\0*\0original\";a:2:{s:2:\"id\";i:6;s:4:\"name\";s:7:\"puperty\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:5;O:19:\"App\\Models\\Occasion\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"occasions\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:2:{s:2:\"id\";i:7;s:4:\"name\";s:6:\"school\";}s:11:\"\0*\0original\";a:2:{s:2:\"id\";i:7;s:4:\"name\";s:6:\"school\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:6;O:19:\"App\\Models\\Occasion\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"occasions\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:2:{s:2:\"id\";i:8;s:4:\"name\";s:7:\"college\";}s:11:\"\0*\0original\";a:2:{s:2:\"id\";i:8;s:4:\"name\";s:7:\"college\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:7;O:19:\"App\\Models\\Occasion\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"occasions\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:2:{s:2:\"id\";i:9;s:4:\"name\";s:6:\"social\";}s:11:\"\0*\0original\";a:2:{s:2:\"id\";i:9;s:4:\"name\";s:6:\"social\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:8;O:19:\"App\\Models\\Occasion\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"occasions\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:2:{s:2:\"id\";i:10;s:4:\"name\";s:6:\"lovers\";}s:11:\"\0*\0original\";a:2:{s:2:\"id\";i:10;s:4:\"name\";s:6:\"lovers\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 1762159400),
('laravel-cache-venue_cities_distinct:v1', 'a:4:{i:0;s:10:\"ashdjashkd\";i:1;s:3:\"cbe\";i:2;s:10:\"coimbatore\";i:3;s:7:\"malysia\";}', 1762159400),
('laravel-cache-venue_facilities:v1', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:4:{i:0;O:24:\"App\\Models\\Venuefacility\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:15:\"venuefacilities\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:2:{s:2:\"id\";i:2;s:4:\"name\";s:4:\"wifi\";}s:11:\"\0*\0original\";a:2:{s:2:\"id\";i:2;s:4:\"name\";s:4:\"wifi\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:24:\"App\\Models\\Venuefacility\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:15:\"venuefacilities\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:2:{s:2:\"id\";i:3;s:4:\"name\";s:13:\"dancing floor\";}s:11:\"\0*\0original\";a:2:{s:2:\"id\";i:3;s:4:\"name\";s:13:\"dancing floor\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:24:\"App\\Models\\Venuefacility\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:15:\"venuefacilities\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:2:{s:2:\"id\";i:4;s:4:\"name\";s:12:\"sound system\";}s:11:\"\0*\0original\";a:2:{s:2:\"id\";i:4;s:4:\"name\";s:12:\"sound system\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:24:\"App\\Models\\Venuefacility\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:15:\"venuefacilities\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:2:{s:2:\"id\";i:5;s:4:\"name\";s:12:\"food provide\";}s:11:\"\0*\0original\";a:2:{s:2:\"id\";i:5;s:4:\"name\";s:12:\"food provide\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 1762159400),
('laravel-cache-venue_locations_all:v1', 'a:8:{i:0;s:8:\"mk halll\";i:1;s:1:\"2\";i:2;s:8:\"gvm hall\";i:3;s:2:\"kg\";i:4;s:7:\"jk hall\";i:5;s:7:\"jk hall\";i:6;s:4:\"yahi\";i:7;s:5:\"bismi\";}', 1762159400);

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

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, 'fdf89ed8-8dcb-41fe-8c43-e9001e104bb1', 'database', 'default', '{\"uuid\":\"fdf89ed8-8dcb-41fe-8c43-e9001e104bb1\",\"displayName\":\"App\\\\Mail\\\\Confirmation\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:21:\\\"App\\\\Mail\\\\Confirmation\\\":3:{s:7:\\\"message\\\";s:5:\\\"sorry\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:23:\\\"tawheedyahya0@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"},\"createdAt\":1761622017,\"delay\":null}', 'InvalidArgumentException: View [view.name] not found. in D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\View\\FileViewFinder.php:138\nStack trace:\n#0 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\View\\FileViewFinder.php(78): Illuminate\\View\\FileViewFinder->findInPaths(\'view.name\', Array)\n#1 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Factory.php(150): Illuminate\\View\\FileViewFinder->find(\'view.name\')\n#2 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(444): Illuminate\\View\\Factory->make(\'view.name\', Array)\n#3 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(419): Illuminate\\Mail\\Mailer->renderView(\'view.name\', Array)\n#4 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(312): Illuminate\\Mail\\Mailer->addContent(Object(Illuminate\\Mail\\Message), \'view.name\', NULL, NULL, Array)\n#5 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(207): Illuminate\\Mail\\Mailer->send(\'view.name\', Array, Object(Closure))\n#6 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#7 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(200): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#8 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\SendQueuedMailable.php(82): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\MailManager))\n#9 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Mail\\SendQueuedMailable->handle(Object(Illuminate\\Mail\\MailManager))\n#10 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#11 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#12 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#13 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(836): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#14 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Container\\Container->call(Array)\n#15 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(180): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#16 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(137): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#17 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(136): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#18 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(134): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Mail\\SendQueuedMailable), false)\n#19 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(180): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#20 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(137): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#21 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(127): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#22 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(68): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Mail\\SendQueuedMailable))\n#23 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#24 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(444): Illuminate\\Queue\\Jobs\\Job->fire()\n#25 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(394): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#26 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(180): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#27 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(148): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#28 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(131): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#29 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#30 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#31 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#32 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#33 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(836): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#34 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#35 D:\\speedbots\\ev\\vendor\\symfony\\console\\Command\\Command.php(318): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#36 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(180): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#37 D:\\speedbots\\ev\\vendor\\symfony\\console\\Application.php(1110): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#38 D:\\speedbots\\ev\\vendor\\symfony\\console\\Application.php(359): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#39 D:\\speedbots\\ev\\vendor\\symfony\\console\\Application.php(194): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#40 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(197): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1234): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#42 D:\\speedbots\\ev\\artisan(16): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#43 {main}', '2025-10-27 21:57:01'),
(2, '7317f82a-5033-4671-9d8d-55ba718634f0', 'database', 'default', '{\"uuid\":\"7317f82a-5033-4671-9d8d-55ba718634f0\",\"displayName\":\"App\\\\Mail\\\\Confirmation\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:21:\\\"App\\\\Mail\\\\Confirmation\\\":3:{s:7:\\\"message\\\";s:21:\\\"sorry for inconvience\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:18:\\\"yahi0733@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"},\"createdAt\":1761622155,\"delay\":null}', 'InvalidArgumentException: View [view.name] not found. in D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\View\\FileViewFinder.php:138\nStack trace:\n#0 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\View\\FileViewFinder.php(78): Illuminate\\View\\FileViewFinder->findInPaths(\'view.name\', Array)\n#1 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Factory.php(150): Illuminate\\View\\FileViewFinder->find(\'view.name\')\n#2 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(444): Illuminate\\View\\Factory->make(\'view.name\', Array)\n#3 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(419): Illuminate\\Mail\\Mailer->renderView(\'view.name\', Array)\n#4 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(312): Illuminate\\Mail\\Mailer->addContent(Object(Illuminate\\Mail\\Message), \'view.name\', NULL, NULL, Array)\n#5 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(207): Illuminate\\Mail\\Mailer->send(\'view.name\', Array, Object(Closure))\n#6 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#7 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(200): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#8 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\SendQueuedMailable.php(82): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\MailManager))\n#9 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Mail\\SendQueuedMailable->handle(Object(Illuminate\\Mail\\MailManager))\n#10 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#11 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#12 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#13 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(836): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#14 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Container\\Container->call(Array)\n#15 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(180): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#16 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(137): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#17 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(136): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#18 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(134): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Mail\\SendQueuedMailable), false)\n#19 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(180): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#20 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(137): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#21 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(127): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#22 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(68): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Mail\\SendQueuedMailable))\n#23 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#24 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(444): Illuminate\\Queue\\Jobs\\Job->fire()\n#25 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(394): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#26 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(180): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#27 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(148): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#28 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(131): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#29 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#30 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(43): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#31 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(96): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#32 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#33 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(836): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#34 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#35 D:\\speedbots\\ev\\vendor\\symfony\\console\\Command\\Command.php(318): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#36 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(180): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#37 D:\\speedbots\\ev\\vendor\\symfony\\console\\Application.php(1110): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#38 D:\\speedbots\\ev\\vendor\\symfony\\console\\Application.php(359): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#39 D:\\speedbots\\ev\\vendor\\symfony\\console\\Application.php(194): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#40 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(197): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 D:\\speedbots\\ev\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1234): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#42 D:\\speedbots\\ev\\artisan(16): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#43 {main}', '2025-10-27 21:59:17');

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
(37, 1, 2, 'venue', '2025-10-14 00:00:54', '2025-10-14 00:00:54');

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
(46, '2025_10_08_055259_add_price_in_professionals', 35),
(47, '2025_10_10_051717_create_bookprofessionals_table', 36),
(48, '2025_10_13_093147_professionallike', 37),
(49, '2025_10_15_052612_create_servicecategories_table', 38),
(52, '2025_10_15_063507_create_serviceproviders_table', 39),
(54, '2025_10_20_085028_create_serviceblogs_table', 40),
(55, '2025_10_22_092352_add_logo_in_serviceproviders', 41),
(56, '2025_10_22_094212_create_serserviceplaces_table', 42),
(57, '2025_10_22_102404_create_serfacilities_table', 43),
(58, '2025_10_27_050850_create_superadmins_table', 44),
(59, '2025_10_28_064234_change_status_in_professionals', 45),
(60, '2025_10_29_045217_change_status_in_serviceproviders', 46),
(61, '2025_11_03_044033_add_food_in_venues', 47),
(62, '2025_11_03_052559_add_priceattr_in_professionals', 48),
(63, '2025_11_03_052823_add_priceattr_in_professionals', 49),
(64, '2025_11_05_092638_add_fields_in_serviceproviders', 50),
(65, '2025_11_06_053815_create_seviceinfos_table', 51),
(66, '2025_11_06_083153_add_column_in_venues', 52),
(67, '2025_11_06_091407_create_profinfos_table', 53);

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
  `status` enum('pending','approved','disapproved') NOT NULL DEFAULT 'pending',
  `amount` decimal(5,2) DEFAULT NULL,
  `prof_logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `price` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professionals`
--

INSERT INTO `professionals` (`id`, `name`, `address`, `companyname`, `phone`, `password`, `doc`, `experience`, `profession`, `status`, `amount`, `prof_logo`, `created_at`, `updated_at`, `email_verified_at`, `token`, `email`, `price`) VALUES
(9, 'abi', 'cbe', 'abi company', '12434231', '$2y$12$RnVzS3tQ1A4yUeLBkJlAKuUjPN.AmfpcJeRSw3olbTftfUV0NpUk.', '1762147764abi.pdf', 1.0, 2, 'approved', 100.00, 'prof_logo/9.jpg', '2025-11-02 23:59:24', '2025-11-04 00:45:35', '2025-10-07 08:38:36', NULL, 'yahi0733@gmail.com', NULL),
(10, 'abi mass', 'kuniyamputhur', 'abi comapny', '378264368', '$2y$12$RnVzS3tQ1A4yUeLBkJlAKuUjPN.AmfpcJeRSw3olbTftfUV0NpUk.', '1762147764abi.pdf', 1.0, 3, 'approved', 10.00, 'prof_logo/9.jpg', NULL, NULL, '2025-11-04 11:48:40', NULL, 'abi@gmail.com', NULL),
(11, 'abi mass', 'kuniyamputhur', 'abi comapny', '378264368', '$2y$12$RnVzS3tQ1A4yUeLBkJlAKuUjPN.AmfpcJeRSw3olbTftfUV0NpUk.', '1762147764abi.pdf', 1.0, 3, 'approved', 10.00, 'prof_logo/9.jpg', NULL, NULL, '2025-11-04 11:48:40', NULL, 'abii@gmail.com', NULL),
(12, 'abi mass', 'kuniyamputhur', 'abi comapny', '378264368', '$2y$12$RnVzS3tQ1A4yUeLBkJlAKuUjPN.AmfpcJeRSw3olbTftfUV0NpUk.', '1762147764abi.pdf', 1.0, 3, 'approved', 10.00, 'prof_logo/9.jpg', NULL, NULL, '2025-11-04 11:48:40', NULL, 'abiii@gmail.com', NULL),
(13, 'yahi', 'coimbatore', 'abi name', '72363887468', '$2y$12$ITtYvcDn49FYqKbZ0CzzB.toBxc19zTRQkv9sPqEvOtevSl5SspGe', '1762329424yahi.pdf', 2.0, 2, 'approved', 100.00, 'prof_logo/13.jpg', '2025-11-05 02:27:05', '2025-11-05 02:33:34', '2025-11-05 07:58:04', NULL, 'tawheedyahya0@gmail.com', NULL);

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
-- Table structure for table `professionllikes`
--

CREATE TABLE `professionllikes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `professional_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profinfos`
--

CREATE TABLE `profinfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `professional_id` bigint(20) UNSIGNED NOT NULL,
  `about_us` longtext NOT NULL,
  `long_description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profinfos`
--

INSERT INTO `profinfos` (`id`, `professional_id`, `about_us`, `long_description`, `created_at`, `updated_at`) VALUES
(1, 13, '<p><strong>dsad</strong>hiiwww</p>', '<figure class=\"table\"><table><tbody><tr><td>dasd</td><td>das</td></tr><tr><td>dsa</td><td>das</td></tr></tbody></table></figure><p>byeee</p>', NULL, '2025-11-06 22:51:29');

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
(8, 9, 2, NULL, NULL),
(9, 13, 2, NULL, NULL),
(10, 13, 3, NULL, NULL);

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
-- Table structure for table `serfacilities`
--

CREATE TABLE `serfacilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serpro_id` bigint(20) UNSIGNED NOT NULL,
  `features` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `serserviceplaces`
--

CREATE TABLE `serserviceplaces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serpro_id` bigint(20) UNSIGNED NOT NULL,
  `serpla_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `serserviceplaces`
--

INSERT INTO `serserviceplaces` (`id`, `serpro_id`, `serpla_id`, `created_at`, `updated_at`) VALUES
(1, 1, 6, NULL, NULL),
(2, 1, 1, NULL, NULL),
(3, 1, 2, NULL, NULL),
(4, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `serviceblogs`
--

CREATE TABLE `serviceblogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serviceproviderid` bigint(20) UNSIGNED NOT NULL,
  `blogimg` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `serviceblogs`
--

INSERT INTO `serviceblogs` (`id`, `serviceproviderid`, `blogimg`, `description`, `created_at`, `updated_at`) VALUES
(4, 1, 'service_blogs/1_1761119565.jpg', 'jnkjfnskh', '2025-10-22 02:22:45', '2025-10-22 02:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `servicecategories`
--

CREATE TABLE `servicecategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `servicecategories`
--

INSERT INTO `servicecategories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'caterer', NULL, NULL),
(2, 'transport', NULL, NULL);

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
-- Table structure for table `serviceproviders`
--

CREATE TABLE `serviceproviders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `status` enum('pending','approved','disapproved') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `about_us` text DEFAULT NULL,
  `long_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `serviceproviders`
--

INSERT INTO `serviceproviders` (`id`, `category`, `name`, `companyname`, `city`, `phone`, `email`, `password`, `instagram`, `facebook`, `logo`, `token`, `email_verified_at`, `status`, `created_at`, `updated_at`, `about_us`, `long_description`) VALUES
(1, 1, 'yahi', 'suva company', 'a', '2234324321', 'tawheedyahya0@gmail.com', '$2y$12$HavVyT6t/90d77GcDrPqvOvNkwy.WzsNTkog5nqjYL2OqNIQYKABi', 'asdasdasdas', 'adsad', 'service_provider_logos/1_1761128610.jpg', NULL, '2025-10-15 07:50:11', 'approved', '2025-10-15 02:19:59', '2025-10-26 21:04:36', NULL, NULL),
(2, 2, 'sindhu', 'sindhu', 'pollachi', '+919994780436', 'yahi0733@gmail.com', '$2y$12$glSEEm/Oz0W1DE0YkdD/l.8py2z218vk.KayvVoHPHGtP6MNc.sCC', 'https://www.instagram.com/_yahi_j/', NULL, 'service_provider_logos/2_1761207065.jpg', NULL, '2025-10-23 08:10:08', 'disapproved', '2025-10-23 02:38:54', '2025-10-28 23:23:56', NULL, NULL);

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
('4ON4a8lYvsh7EQahVXCVEZjcE3Tef7LnzISQgvpO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicWtVUzFoNTVlbUlNQW9DbzRsMjY5Q0JGWThwaEFKV2h1TmVSeHNXeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC92ZW51ZV9wcm92aWRlci92ZW51ZXMvZGFzaGJhb3JkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2MToibG9naW5fdmVudWVfcHJvdmlkZXJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMDt9', 1762771232);

-- --------------------------------------------------------

--
-- Table structure for table `seviceinfos`
--

CREATE TABLE `seviceinfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_provider_id` bigint(20) UNSIGNED NOT NULL,
  `about_us` longtext DEFAULT NULL,
  `long_description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seviceinfos`
--

INSERT INTO `seviceinfos` (`id`, `service_provider_id`, `about_us`, `long_description`, `created_at`, `updated_at`) VALUES
(1, 1, '<p><i>dsadasda</i>yahi</p>', '<figure class=\"table\"><table><tbody><tr><td><strong>da</strong></td><td>asda</td></tr><tr><td>dsadas</td><td>dsad</td></tr></tbody></table></figure><p>d<strong>dasdasdasd</strong></p>', '2025-11-06 00:22:48', '2025-11-06 00:54:37');

-- --------------------------------------------------------

--
-- Table structure for table `superadmins`
--

CREATE TABLE `superadmins` (
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
-- Dumping data for table `superadmins`
--

INSERT INTO `superadmins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'naga', 'naga@gmail.com', NULL, '$2y$12$V4bLktAysP/lrvvgqvfZqueoyZnpFKvBIwnFq/Wd2YZOxKwoR5SsS', NULL, '2025-10-26 23:42:10', '2025-10-26 23:42:10'),
(3, 'naga', 'nagaa@gmail.com', NULL, '$2y$12$E17ZwRZFnmym3S/HDxNJIefndqLzuDWRqCf63tX85JjFAS.SBGSWe', NULL, '2025-10-27 02:40:16', '2025-10-27 02:40:16');

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
(1, 'yahi', 'tawheedyahya0@gmail.com', '9994780436', NULL, '$2y$12$21vkkHxawy1YaMB0j8wV8uo/u/sIcG32SYs1feYjdz0rdzVVSAHna', '', '2025-09-03 03:15:17', '2025-10-26 20:24:52'),
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
(8, 8, 'verified_venue_images/1759903447jk-hall.jpg', '2025-10-08 00:34:07', '2025-10-08 00:34:07'),
(9, 9, 'verified_venue_images/1762148405yahi.jpg', '2025-11-03 00:10:05', '2025-11-03 00:10:05'),
(10, 10, 'verified_venue_images/1762148671bismi.jpg', '2025-11-03 00:14:31', '2025-11-03 00:14:31'),
(11, 11, 'verified_venue_images/1762329124abinav.jpg', '2025-11-05 02:22:04', '2025-11-05 02:22:04');

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
(10, 'approved', 'dasdas', 'tawheedyahya0@gmail.com', '09994780436', '1757062338_dasdas.pdf', '2025-09-05 03:26:44', '$2y$12$FIL9gPFmeDFekeKylbrF9.yiLLQT3vW17/x9Z7/8CaT7RHDMKzfa2', '', '2025-09-05 03:22:18', '2025-11-06 03:05:39'),
(11, 'approved', 'yahi', 'yahi0733@gmail.com', '213', '1757495216_yahi.jpg', '2025-09-10 03:37:45', '$2y$12$Tu8QqSOZoao2lBM4UIjusOye25WYsRH.2CvSB7xFqp1Em3VlDW6ni', NULL, '2025-09-10 03:36:56', '2025-10-28 04:44:51'),
(12, 'approved', 'abinav', 'abinav@soulcreationz.com', '7838468732', '1757498886_abinav.jpg', NULL, '$2y$12$qJfNGHdVJzsE3C2L5UTkP.YRbEgLbVqsf0KvziFa07pWyilXTKSgy', 'oIYNQIK9FQDy2fXIUdbNmMaHF5LNvjgCghwtOCrLuUUUIMxn2vz7Hv6ipK9P', '2025-09-10 04:38:06', '2025-10-28 02:36:34');

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
  `vr` varchar(200) DEFAULT NULL,
  `food_provide` enum('yes','no') NOT NULL DEFAULT 'no',
  `breakfast` decimal(6,2) DEFAULT NULL,
  `lunch` decimal(6,2) DEFAULT NULL,
  `dinner` decimal(6,2) DEFAULT NULL,
  `halal` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`id`, `venue_provider_id`, `venue_name`, `venue_address`, `venue_city`, `venue_seat_capacity`, `latitude`, `longitude`, `description`, `amount`, `created_at`, `updated_at`, `vr`, `food_provide`, `breakfast`, `lunch`, `dinner`, `halal`) VALUES
(2, 10, 'mk halll', 'Coimbatore, Coimbatore North, Coimbatore, Tamil Nadu, 641001, India', 'coimbatore', 100, 10.977144, 76.965919, 'This venue is designed to provide the perfect setting for both intimate gatherings and large-scale celebrations. Located in the heart of the city, it combines modern architecture with elegant interiors, offering a warm and inviting atmosphere for guests.', 1.00, '2025-09-16 22:34:18', '2025-11-06 03:32:42', 'https://my.matterport.com/show/?m=BDhGVDaKpnw', 'yes', NULL, NULL, 20.00, 1),
(3, 11, '2', '76, vallal nagar, coimbatore-641008', 'coimbatore', 1000, 19.816977, 105.862035, 'it is a good venue', 2.00, '2025-09-17 02:34:46', '2025-11-03 02:57:15', NULL, 'no', NULL, NULL, NULL, NULL),
(4, 10, 'gvm hall', '76, vallal nagar, coimbatore-641008', 'coimbatore', 1000, 22.880544, 77.804114, 'hiii', 3.00, '2025-09-17 03:28:14', '2025-10-22 23:08:45', 'dasdas', 'no', NULL, NULL, NULL, NULL),
(6, 10, 'kg', '76, vallal nagar, coimbatore-641008', 'coimbatore', 1000, 23.097531, 78.288094, 'dasdsad', 5.00, '2025-09-17 03:28:50', '2025-10-03 03:16:19', NULL, 'no', NULL, NULL, NULL, NULL),
(7, 10, 'jk hall', 'Coimbatore, Coimbatore North, Coimbatore, Tamil Nadu, 641001, India', 'malysia', 200, 11.001812, 76.962842, 'jjkkk', 200.00, '2025-10-03 03:39:20', '2025-10-03 03:39:20', NULL, 'no', NULL, NULL, NULL, NULL),
(8, 10, 'jk hall', 'Coimbatore, Coimbatore North, Coimbatore, Tamil Nadu, 641001, India', 'ashdjashkd', 200, 11.047000, 76.998900, 'asdas', 200.00, '2025-10-08 00:34:07', '2025-10-08 00:34:07', NULL, 'no', NULL, NULL, NULL, NULL),
(9, 11, 'yahi', 'cbe', 'cbe', 100, 10.977149, 76.965929, '1', 1.00, '2025-11-03 00:10:05', '2025-11-03 00:19:34', NULL, 'no', NULL, NULL, NULL, NULL),
(10, 11, 'bismi', 'cbe', 'cbe', 1, 10.977149, 76.965929, '1', 1.00, '2025-11-03 00:14:31', '2025-11-03 00:14:45', NULL, 'no', NULL, NULL, NULL, NULL),
(11, 10, 'abinav', 'kuniyamputhur', 'cbe', 1, 10.977144, 76.965889, 'ajsdjashuid', 10000.00, '2025-11-05 02:22:04', '2025-11-05 02:22:04', NULL, 'yes', NULL, 100.00, NULL, NULL);

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
(10, 8, 3, NULL, NULL),
(11, 9, 3, NULL, NULL),
(12, 10, 3, NULL, NULL),
(13, 6, 3, NULL, NULL),
(14, 11, 6, NULL, NULL);

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
-- Indexes for table `bookprofessionals`
--
ALTER TABLE `bookprofessionals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookprofessionals_professional_id_foreign` (`professional_id`),
  ADD KEY `bookprofessionals_user_id_foreign` (`user_id`);

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
-- Indexes for table `professionllikes`
--
ALTER TABLE `professionllikes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professionllikes_user_id_foreign` (`user_id`),
  ADD KEY `professionllikes_professional_id_foreign` (`professional_id`);

--
-- Indexes for table `profinfos`
--
ALTER TABLE `profinfos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profinfos_professional_id_foreign` (`professional_id`);

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
-- Indexes for table `serfacilities`
--
ALTER TABLE `serfacilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serfacilities_serpro_id_foreign` (`serpro_id`);

--
-- Indexes for table `serserviceplaces`
--
ALTER TABLE `serserviceplaces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serserviceplaces_serpro_id_foreign` (`serpro_id`),
  ADD KEY `serserviceplaces_serpla_id_foreign` (`serpla_id`);

--
-- Indexes for table `serviceblogs`
--
ALTER TABLE `serviceblogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serviceblogs_serviceproviderid_foreign` (`serviceproviderid`);

--
-- Indexes for table `servicecategories`
--
ALTER TABLE `servicecategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serviceplaces`
--
ALTER TABLE `serviceplaces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serviceproviders`
--
ALTER TABLE `serviceproviders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `serviceproviders_email_unique` (`email`),
  ADD KEY `serviceproviders_category_foreign` (`category`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `seviceinfos`
--
ALTER TABLE `seviceinfos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seviceinfos_service_provider_id_foreign` (`service_provider_id`);

--
-- Indexes for table `superadmins`
--
ALTER TABLE `superadmins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `superadmins_email_unique` (`email`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `bookingdates`
--
ALTER TABLE `bookingdates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookprofessionals`
--
ALTER TABLE `bookprofessionals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hearts`
--
ALTER TABLE `hearts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `occasions`
--
ALTER TABLE `occasions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `professionals`
--
ALTER TABLE `professionals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `professionlists`
--
ALTER TABLE `professionlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `professionllikes`
--
ALTER TABLE `professionllikes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profinfos`
--
ALTER TABLE `profinfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `proserviceplaces`
--
ALTER TABLE `proserviceplaces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `serfacilities`
--
ALTER TABLE `serfacilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `serserviceplaces`
--
ALTER TABLE `serserviceplaces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `serviceblogs`
--
ALTER TABLE `serviceblogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `servicecategories`
--
ALTER TABLE `servicecategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `serviceplaces`
--
ALTER TABLE `serviceplaces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `serviceproviders`
--
ALTER TABLE `serviceproviders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seviceinfos`
--
ALTER TABLE `seviceinfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `superadmins`
--
ALTER TABLE `superadmins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `venueproviders`
--
ALTER TABLE `venueproviders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `venuetypes`
--
ALTER TABLE `venuetypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- Constraints for table `bookprofessionals`
--
ALTER TABLE `bookprofessionals`
  ADD CONSTRAINT `bookprofessionals_professional_id_foreign` FOREIGN KEY (`professional_id`) REFERENCES `professionals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookprofessionals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `professionllikes`
--
ALTER TABLE `professionllikes`
  ADD CONSTRAINT `professionllikes_professional_id_foreign` FOREIGN KEY (`professional_id`) REFERENCES `professionals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `professionllikes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profinfos`
--
ALTER TABLE `profinfos`
  ADD CONSTRAINT `profinfos_professional_id_foreign` FOREIGN KEY (`professional_id`) REFERENCES `professionals` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `serfacilities`
--
ALTER TABLE `serfacilities`
  ADD CONSTRAINT `serfacilities_serpro_id_foreign` FOREIGN KEY (`serpro_id`) REFERENCES `serviceproviders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `serserviceplaces`
--
ALTER TABLE `serserviceplaces`
  ADD CONSTRAINT `serserviceplaces_serpla_id_foreign` FOREIGN KEY (`serpla_id`) REFERENCES `serviceplaces` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `serserviceplaces_serpro_id_foreign` FOREIGN KEY (`serpro_id`) REFERENCES `serviceproviders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `serviceblogs`
--
ALTER TABLE `serviceblogs`
  ADD CONSTRAINT `serviceblogs_serviceproviderid_foreign` FOREIGN KEY (`serviceproviderid`) REFERENCES `serviceproviders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `serviceproviders`
--
ALTER TABLE `serviceproviders`
  ADD CONSTRAINT `serviceproviders_category_foreign` FOREIGN KEY (`category`) REFERENCES `servicecategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seviceinfos`
--
ALTER TABLE `seviceinfos`
  ADD CONSTRAINT `seviceinfos_service_provider_id_foreign` FOREIGN KEY (`service_provider_id`) REFERENCES `serviceproviders` (`id`) ON DELETE CASCADE;

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
