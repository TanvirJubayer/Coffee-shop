-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2026 at 04:07 AM
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
-- Database: `coffe_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
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
('laravel-cache-setting.auto_print_receipt', 'b:1;', 1768894810),
('laravel-cache-setting.business_address', 's:36:\"123 Coffee Street, Dhaka, Bangladesh\";', 1768894810),
('laravel-cache-setting.business_email', 's:19:\"info@coffeeshop.com\";', 1768894810),
('laravel-cache-setting.business_logo', 's:50:\"logos/hxcXEKwHtwOkugB7kD4mia6P1V9wjdsshmoDDWOd.png\";', 1768894810),
('laravel-cache-setting.business_name', 's:11:\"Coffee Shop\";', 1768894810),
('laravel-cache-setting.business_phone', 's:13:\"+123 456 7890\";', 1768894810),
('laravel-cache-setting.currency_position', 's:6:\"before\";', 1768894810),
('laravel-cache-setting.currency_symbol', 's:1:\"$\";', 1768894810),
('laravel-cache-setting.low_stock_threshold', 'd:10;', 1768894810),
('laravel-cache-setting.receipt_footer', 's:18:\"Please come again!\";', 1768894810),
('laravel-cache-setting.receipt_header', 's:23:\"Thank you for visiting!\";', 1768894810),
('laravel-cache-setting.receipt_show_logo', 'b:1;', 1768894810),
('laravel-cache-setting.tax_rate', 'd:6;', 1768894810),
('laravel-cache-settings.all', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:4:{s:8:\"business\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:5:{i:0;O:18:\"App\\Models\\Setting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:1;s:3:\"key\";s:13:\"business_name\";s:5:\"value\";s:11:\"Coffee Shop\";s:5:\"group\";s:8:\"business\";s:4:\"type\";s:4:\"text\";s:10:\"created_at\";s:19:\"2026-01-18 05:25:36\";s:10:\"updated_at\";s:19:\"2026-01-18 05:25:36\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:1;s:3:\"key\";s:13:\"business_name\";s:5:\"value\";s:11:\"Coffee Shop\";s:5:\"group\";s:8:\"business\";s:4:\"type\";s:4:\"text\";s:10:\"created_at\";s:19:\"2026-01-18 05:25:36\";s:10:\"updated_at\";s:19:\"2026-01-18 05:25:36\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:5:\"group\";i:3;s:4:\"type\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:18:\"App\\Models\\Setting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:2;s:3:\"key\";s:16:\"business_address\";s:5:\"value\";s:36:\"123 Coffee Street, Dhaka, Bangladesh\";s:5:\"group\";s:8:\"business\";s:4:\"type\";s:4:\"text\";s:10:\"created_at\";s:19:\"2026-01-18 05:25:36\";s:10:\"updated_at\";s:19:\"2026-01-20 06:40:09\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:2;s:3:\"key\";s:16:\"business_address\";s:5:\"value\";s:36:\"123 Coffee Street, Dhaka, Bangladesh\";s:5:\"group\";s:8:\"business\";s:4:\"type\";s:4:\"text\";s:10:\"created_at\";s:19:\"2026-01-18 05:25:36\";s:10:\"updated_at\";s:19:\"2026-01-20 06:40:09\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:5:\"group\";i:3;s:4:\"type\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:18:\"App\\Models\\Setting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:3;s:3:\"key\";s:14:\"business_phone\";s:5:\"value\";s:13:\"+123 456 7890\";s:5:\"group\";s:8:\"business\";s:4:\"type\";s:4:\"text\";s:10:\"created_at\";s:19:\"2026-01-18 05:25:36\";s:10:\"updated_at\";s:19:\"2026-01-18 05:25:36\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:3;s:3:\"key\";s:14:\"business_phone\";s:5:\"value\";s:13:\"+123 456 7890\";s:5:\"group\";s:8:\"business\";s:4:\"type\";s:4:\"text\";s:10:\"created_at\";s:19:\"2026-01-18 05:25:36\";s:10:\"updated_at\";s:19:\"2026-01-18 05:25:36\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:5:\"group\";i:3;s:4:\"type\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:18:\"App\\Models\\Setting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:4;s:3:\"key\";s:14:\"business_email\";s:5:\"value\";s:19:\"info@coffeeshop.com\";s:5:\"group\";s:8:\"business\";s:4:\"type\";s:4:\"text\";s:10:\"created_at\";s:19:\"2026-01-18 05:25:36\";s:10:\"updated_at\";s:19:\"2026-01-18 05:25:36\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:4;s:3:\"key\";s:14:\"business_email\";s:5:\"value\";s:19:\"info@coffeeshop.com\";s:5:\"group\";s:8:\"business\";s:4:\"type\";s:4:\"text\";s:10:\"created_at\";s:19:\"2026-01-18 05:25:36\";s:10:\"updated_at\";s:19:\"2026-01-18 05:25:36\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:5:\"group\";i:3;s:4:\"type\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:4;O:18:\"App\\Models\\Setting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:13;s:3:\"key\";s:13:\"business_logo\";s:5:\"value\";s:50:\"logos/hxcXEKwHtwOkugB7kD4mia6P1V9wjdsshmoDDWOd.png\";s:5:\"group\";s:8:\"business\";s:4:\"type\";s:4:\"text\";s:10:\"created_at\";s:19:\"2026-01-19 05:59:08\";s:10:\"updated_at\";s:19:\"2026-01-19 05:59:08\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:13;s:3:\"key\";s:13:\"business_logo\";s:5:\"value\";s:50:\"logos/hxcXEKwHtwOkugB7kD4mia6P1V9wjdsshmoDDWOd.png\";s:5:\"group\";s:8:\"business\";s:4:\"type\";s:4:\"text\";s:10:\"created_at\";s:19:\"2026-01-19 05:59:08\";s:10:\"updated_at\";s:19:\"2026-01-19 05:59:08\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:5:\"group\";i:3;s:4:\"type\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:3:\"tax\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:3:{i:0;O:18:\"App\\Models\\Setting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:5;s:3:\"key\";s:8:\"tax_rate\";s:5:\"value\";s:1:\"6\";s:5:\"group\";s:3:\"tax\";s:4:\"type\";s:6:\"number\";s:10:\"created_at\";s:19:\"2026-01-18 05:25:36\";s:10:\"updated_at\";s:19:\"2026-01-19 05:57:20\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:5;s:3:\"key\";s:8:\"tax_rate\";s:5:\"value\";s:1:\"6\";s:5:\"group\";s:3:\"tax\";s:4:\"type\";s:6:\"number\";s:10:\"created_at\";s:19:\"2026-01-18 05:25:36\";s:10:\"updated_at\";s:19:\"2026-01-19 05:57:20\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:5:\"group\";i:3;s:4:\"type\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:18:\"App\\Models\\Setting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:6;s:3:\"key\";s:15:\"currency_symbol\";s:5:\"value\";s:1:\"$\";s:5:\"group\";s:3:\"tax\";s:4:\"type\";s:4:\"text\";s:10:\"created_at\";s:19:\"2026-01-18 05:25:36\";s:10:\"updated_at\";s:19:\"2026-01-18 05:25:36\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:6;s:3:\"key\";s:15:\"currency_symbol\";s:5:\"value\";s:1:\"$\";s:5:\"group\";s:3:\"tax\";s:4:\"type\";s:4:\"text\";s:10:\"created_at\";s:19:\"2026-01-18 05:25:36\";s:10:\"updated_at\";s:19:\"2026-01-18 05:25:36\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:5:\"group\";i:3;s:4:\"type\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:18:\"App\\Models\\Setting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:7;s:3:\"key\";s:17:\"currency_position\";s:5:\"value\";s:6:\"before\";s:5:\"group\";s:3:\"tax\";s:4:\"type\";s:4:\"text\";s:10:\"created_at\";s:19:\"2026-01-18 05:25:36\";s:10:\"updated_at\";s:19:\"2026-01-18 05:25:36\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:7;s:3:\"key\";s:17:\"currency_position\";s:5:\"value\";s:6:\"before\";s:5:\"group\";s:3:\"tax\";s:4:\"type\";s:4:\"text\";s:10:\"created_at\";s:19:\"2026-01-18 05:25:36\";s:10:\"updated_at\";s:19:\"2026-01-18 05:25:36\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:5:\"group\";i:3;s:4:\"type\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:7:\"receipt\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:3:{i:0;O:18:\"App\\Models\\Setting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:8;s:3:\"key\";s:14:\"receipt_header\";s:5:\"value\";s:23:\"Thank you for visiting!\";s:5:\"group\";s:7:\"receipt\";s:4:\"type\";s:4:\"text\";s:10:\"created_at\";s:19:\"2026-01-18 05:25:36\";s:10:\"updated_at\";s:19:\"2026-01-18 05:25:36\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:8;s:3:\"key\";s:14:\"receipt_header\";s:5:\"value\";s:23:\"Thank you for visiting!\";s:5:\"group\";s:7:\"receipt\";s:4:\"type\";s:4:\"text\";s:10:\"created_at\";s:19:\"2026-01-18 05:25:36\";s:10:\"updated_at\";s:19:\"2026-01-18 05:25:36\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:5:\"group\";i:3;s:4:\"type\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:18:\"App\\Models\\Setting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:9;s:3:\"key\";s:14:\"receipt_footer\";s:5:\"value\";s:18:\"Please come again!\";s:5:\"group\";s:7:\"receipt\";s:4:\"type\";s:4:\"text\";s:10:\"created_at\";s:19:\"2026-01-18 05:25:36\";s:10:\"updated_at\";s:19:\"2026-01-18 05:25:36\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:9;s:3:\"key\";s:14:\"receipt_footer\";s:5:\"value\";s:18:\"Please come again!\";s:5:\"group\";s:7:\"receipt\";s:4:\"type\";s:4:\"text\";s:10:\"created_at\";s:19:\"2026-01-18 05:25:36\";s:10:\"updated_at\";s:19:\"2026-01-18 05:25:36\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:5:\"group\";i:3;s:4:\"type\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:18:\"App\\Models\\Setting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:10;s:3:\"key\";s:17:\"receipt_show_logo\";s:5:\"value\";s:1:\"1\";s:5:\"group\";s:7:\"receipt\";s:4:\"type\";s:7:\"boolean\";s:10:\"created_at\";s:19:\"2026-01-18 05:25:36\";s:10:\"updated_at\";s:19:\"2026-01-18 05:25:36\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:10;s:3:\"key\";s:17:\"receipt_show_logo\";s:5:\"value\";s:1:\"1\";s:5:\"group\";s:7:\"receipt\";s:4:\"type\";s:7:\"boolean\";s:10:\"created_at\";s:19:\"2026-01-18 05:25:36\";s:10:\"updated_at\";s:19:\"2026-01-18 05:25:36\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:5:\"group\";i:3;s:4:\"type\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:6:\"system\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:2:{i:0;O:18:\"App\\Models\\Setting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:11;s:3:\"key\";s:19:\"low_stock_threshold\";s:5:\"value\";s:2:\"10\";s:5:\"group\";s:6:\"system\";s:4:\"type\";s:6:\"number\";s:10:\"created_at\";s:19:\"2026-01-18 05:25:36\";s:10:\"updated_at\";s:19:\"2026-01-18 05:25:36\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:11;s:3:\"key\";s:19:\"low_stock_threshold\";s:5:\"value\";s:2:\"10\";s:5:\"group\";s:6:\"system\";s:4:\"type\";s:6:\"number\";s:10:\"created_at\";s:19:\"2026-01-18 05:25:36\";s:10:\"updated_at\";s:19:\"2026-01-18 05:25:36\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:5:\"group\";i:3;s:4:\"type\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:18:\"App\\Models\\Setting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:12;s:3:\"key\";s:18:\"auto_print_receipt\";s:5:\"value\";s:1:\"1\";s:5:\"group\";s:6:\"system\";s:4:\"type\";s:7:\"boolean\";s:10:\"created_at\";s:19:\"2026-01-18 05:25:36\";s:10:\"updated_at\";s:19:\"2026-01-19 05:57:20\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:12;s:3:\"key\";s:18:\"auto_print_receipt\";s:5:\"value\";s:1:\"1\";s:5:\"group\";s:6:\"system\";s:4:\"type\";s:7:\"boolean\";s:10:\"created_at\";s:19:\"2026-01-18 05:25:36\";s:10:\"updated_at\";s:19:\"2026-01-19 05:57:20\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:3:\"key\";i:1;s:5:\"value\";i:2;s:5:\"group\";i:3;s:4:\"type\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 1768894810);

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Hot Coffee', 'hot-coffee', 'hot-coffee.png', '2026-01-03 22:51:05', '2026-01-03 22:51:05'),
(2, 'Cold Coffee', 'cold-coffee', 'cold-coffee.png', '2026-01-03 22:51:05', '2026-01-03 22:51:05'),
(3, 'Pastries', 'pastries', 'pastries.png', '2026-01-03 22:51:05', '2026-01-03 22:51:05'),
(4, 'Jashim\'s Latte', 'jashims-latte', '20260120045957.png', '2026-01-03 23:02:20', '2026-01-19 22:59:57'),
(5, 'Beverages', 'beverages', '20260120050335.png', '2026-01-18 00:48:37', '2026-01-19 23:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` enum('percentage','fixed') NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `min_order` decimal(10,2) NOT NULL DEFAULT 0.00,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `name`, `code`, `type`, `value`, `min_order`, `start_date`, `end_date`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Welcome Discount', 'WELCOME10', 'percentage', 7.00, 10.00, NULL, NULL, 1, '2026-01-19 22:33:22', '2026-01-19 23:34:53'),
(2, 'Summer Sale', 'SUMMER5', 'fixed', 5.00, 20.00, NULL, NULL, 1, '2026-01-19 22:33:22', '2026-01-19 22:40:55');

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
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL DEFAULT 'kg',
  `quantity` decimal(10,2) NOT NULL DEFAULT 0.00,
  `cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `alert_threshold` decimal(10,2) NOT NULL DEFAULT 5.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `slug`, `unit`, `quantity`, `cost`, `alert_threshold`, `created_at`, `updated_at`) VALUES
(1, 'Coffee Beans', 'coffee-beans', 'kg', 55.00, 2000.00, 10.00, '2026-01-20 00:09:03', '2026-01-20 00:17:01'),
(2, 'Milk', 'milk', 'liter', 112.00, 110.00, 20.00, '2026-01-20 00:09:03', '2026-01-20 00:27:58'),
(3, 'Sugar', 'sugar', 'kg', 58.00, 130.00, 5.00, '2026-01-20 00:09:03', '2026-01-20 00:17:01'),
(4, 'Syrup', 'syrup', 'bottle', 27.00, 160.00, 3.00, '2026-01-20 00:09:04', '2026-01-20 00:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_transactions`
--

CREATE TABLE `inventory_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ingredient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('purchase','sale','adjustment','return') NOT NULL,
  `quantity` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_transactions`
--

INSERT INTO `inventory_transactions` (`id`, `product_id`, `ingredient_id`, `supplier_id`, `user_id`, `type`, `quantity`, `balance`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, 2, 'sale', -4, 0, 'Order #52', '2026-01-11 01:37:35', '2026-01-11 01:37:35'),
(2, 2, NULL, NULL, 2, 'sale', -2, 41, 'Order #53', '2026-01-11 21:31:35', '2026-01-11 21:31:35'),
(3, 3, NULL, NULL, 2, 'sale', -1, 49, 'Order #53', '2026-01-11 21:31:35', '2026-01-11 21:31:35'),
(4, 3, NULL, NULL, 2, 'sale', -1, 48, 'Order #54', '2026-01-11 21:46:04', '2026-01-11 21:46:04'),
(5, 5, NULL, NULL, 2, 'sale', -1, 47, 'Order #55', '2026-01-11 22:38:32', '2026-01-11 22:38:32'),
(6, 4, NULL, NULL, 2, 'sale', -1, 49, 'Order #55', '2026-01-11 22:38:32', '2026-01-11 22:38:32'),
(7, 3, NULL, NULL, 2, 'sale', -1, 47, 'Order #56', '2026-01-11 22:57:33', '2026-01-11 22:57:33'),
(8, 2, NULL, NULL, 2, 'sale', -1, 40, 'Order #56', '2026-01-11 22:57:33', '2026-01-11 22:57:33'),
(9, 7, NULL, NULL, 2, 'sale', -1, 45, 'Order #56', '2026-01-11 22:57:33', '2026-01-11 22:57:33'),
(10, 3, NULL, NULL, 2, 'sale', -1, 46, 'Order #57', '2026-01-11 23:00:35', '2026-01-11 23:00:35'),
(11, 2, NULL, NULL, 2, 'sale', -1, 39, 'Order #57', '2026-01-11 23:00:35', '2026-01-11 23:00:35'),
(12, 7, NULL, NULL, 2, 'sale', -1, 44, 'Order #57', '2026-01-11 23:00:35', '2026-01-11 23:00:35'),
(13, 5, NULL, NULL, 2, 'sale', -1, 46, 'Order #58', '2026-01-11 23:05:10', '2026-01-11 23:05:10'),
(14, 2, NULL, NULL, 2, 'sale', -2, 37, 'Order #58', '2026-01-11 23:05:10', '2026-01-11 23:05:10'),
(15, 3, NULL, NULL, 2, 'sale', -1, 45, 'Order #59', '2026-01-17 22:09:13', '2026-01-17 22:09:13'),
(16, 3, NULL, NULL, 2, 'sale', -1, 44, 'Order #60', '2026-01-17 22:14:44', '2026-01-17 22:14:44'),
(17, 7, NULL, NULL, 2, 'sale', -1, 43, 'Order #61', '2026-01-17 22:40:58', '2026-01-17 22:40:58'),
(18, 3, NULL, NULL, 2, 'sale', -1, 43, 'Order #61', '2026-01-17 22:40:58', '2026-01-17 22:40:58'),
(19, 7, NULL, NULL, 2, 'sale', -1, 42, 'Order #62', '2026-01-17 22:41:27', '2026-01-17 22:41:27'),
(20, 3, NULL, NULL, 2, 'sale', -1, 42, 'Order #62', '2026-01-17 22:41:27', '2026-01-17 22:41:27'),
(21, 4, NULL, NULL, 2, 'sale', -1, 48, 'Order #63', '2026-01-17 23:27:51', '2026-01-17 23:27:51'),
(22, 6, NULL, NULL, 2, 'sale', -1, 64, 'Order #63', '2026-01-17 23:27:51', '2026-01-17 23:27:51'),
(23, 6, NULL, NULL, 2, 'sale', -2, 62, 'Order #64', '2026-01-17 23:29:11', '2026-01-17 23:29:11'),
(24, 2, NULL, NULL, 2, 'sale', -1, 36, 'Order #64', '2026-01-17 23:29:11', '2026-01-17 23:29:11'),
(25, 3, NULL, NULL, 2, 'sale', -2, 40, 'Order #64', '2026-01-17 23:29:11', '2026-01-17 23:29:11'),
(26, 5, NULL, NULL, 2, 'sale', -1, 45, 'Order #64', '2026-01-17 23:29:11', '2026-01-17 23:29:11'),
(27, 6, NULL, NULL, 2, 'sale', -2, 60, 'Order #65', '2026-01-17 23:30:17', '2026-01-17 23:30:17'),
(28, 2, NULL, NULL, 2, 'sale', -1, 35, 'Order #65', '2026-01-17 23:30:17', '2026-01-17 23:30:17'),
(29, 3, NULL, NULL, 2, 'sale', -2, 38, 'Order #65', '2026-01-17 23:30:17', '2026-01-17 23:30:17'),
(30, 5, NULL, NULL, 2, 'sale', -1, 44, 'Order #65', '2026-01-17 23:30:17', '2026-01-17 23:30:17'),
(31, 3, NULL, NULL, 2, 'sale', -1, 37, 'Order #66', '2026-01-18 00:25:27', '2026-01-18 00:25:27'),
(32, 2, NULL, NULL, 2, 'sale', -1, 34, 'Order #66', '2026-01-18 00:25:27', '2026-01-18 00:25:27'),
(33, 3, NULL, NULL, 2, 'sale', -1, 36, 'Order #67', '2026-01-18 00:27:25', '2026-01-18 00:27:25'),
(34, 2, NULL, NULL, 2, 'sale', -1, 33, 'Order #67', '2026-01-18 00:27:25', '2026-01-18 00:27:25'),
(35, 4, NULL, NULL, 2, 'sale', -1, 47, 'Order #68', '2026-01-18 01:02:12', '2026-01-18 01:02:12'),
(36, 3, NULL, NULL, 2, 'sale', -2, 34, 'Order #68', '2026-01-18 01:02:12', '2026-01-18 01:02:12'),
(37, 7, NULL, NULL, 2, 'sale', -1, 41, 'Order #68', '2026-01-18 01:02:12', '2026-01-18 01:02:12'),
(38, 2, NULL, NULL, 2, 'sale', -4, 29, 'Order #68', '2026-01-18 01:02:12', '2026-01-18 01:02:12'),
(39, 1, NULL, NULL, 2, 'sale', -1, 49, 'Order #68', '2026-01-18 01:02:12', '2026-01-18 01:02:12'),
(40, 4, NULL, NULL, 2, 'sale', -1, 46, 'Order #69', '2026-01-18 01:06:48', '2026-01-18 01:06:48'),
(41, 3, NULL, NULL, 2, 'sale', -2, 32, 'Order #69', '2026-01-18 01:06:48', '2026-01-18 01:06:48'),
(42, 7, NULL, NULL, 2, 'sale', -1, 40, 'Order #69', '2026-01-18 01:06:48', '2026-01-18 01:06:48'),
(43, 2, NULL, NULL, 2, 'sale', -4, 25, 'Order #69', '2026-01-18 01:06:48', '2026-01-18 01:06:48'),
(44, 1, NULL, NULL, 2, 'sale', -1, 48, 'Order #69', '2026-01-18 01:06:48', '2026-01-18 01:06:48'),
(45, 4, NULL, NULL, 5, 'sale', -3, 43, 'Order #70', '2026-01-19 00:02:53', '2026-01-19 00:02:53'),
(46, 3, NULL, NULL, 5, 'sale', -1, 31, 'Order #70', '2026-01-19 00:02:53', '2026-01-19 00:02:53'),
(47, 2, NULL, NULL, 5, 'sale', -1, 24, 'Order #70', '2026-01-19 00:02:53', '2026-01-19 00:02:53'),
(48, 8, NULL, 1, 1, 'purchase', 140, 140, 'Bulk restock Purchase #1', '2026-01-19 00:17:33', '2026-01-19 00:17:33'),
(49, 9, NULL, 1, 1, 'purchase', 103, 103, 'Bulk restock Purchase #1', '2026-01-19 00:17:33', '2026-01-19 00:17:33'),
(50, 10, NULL, 1, 1, 'purchase', 119, 119, 'Bulk restock Purchase #1', '2026-01-19 00:17:33', '2026-01-19 00:17:33'),
(51, 11, NULL, 1, 1, 'purchase', 108, 108, 'Bulk restock Purchase #1', '2026-01-19 00:17:33', '2026-01-19 00:17:33'),
(52, 12, NULL, 1, 1, 'purchase', 147, 147, 'Bulk restock Purchase #1', '2026-01-19 00:17:33', '2026-01-19 00:17:33'),
(53, 13, NULL, 1, 1, 'purchase', 102, 102, 'Bulk restock Purchase #1', '2026-01-19 00:17:33', '2026-01-19 00:17:33'),
(54, 14, NULL, 1, 1, 'purchase', 120, 120, 'Bulk restock Purchase #1', '2026-01-19 00:17:33', '2026-01-19 00:17:33'),
(55, 11, NULL, NULL, 5, 'sale', -1, 107, 'Order #71', '2026-01-19 00:34:31', '2026-01-19 00:34:31'),
(56, 10, NULL, NULL, 5, 'sale', -1, 118, 'Order #71', '2026-01-19 00:34:31', '2026-01-19 00:34:31'),
(57, 9, NULL, NULL, 5, 'sale', -1, 102, 'Order #71', '2026-01-19 00:34:31', '2026-01-19 00:34:31'),
(58, 2, NULL, NULL, 3, 'sale', -1, 23, 'Order #72', '2026-01-19 21:57:18', '2026-01-19 21:57:18'),
(59, 5, NULL, NULL, 3, 'sale', -1, 43, 'Order #72', '2026-01-19 21:57:18', '2026-01-19 21:57:18'),
(60, 6, NULL, NULL, 3, 'sale', -1, 59, 'Order #72', '2026-01-19 21:57:18', '2026-01-19 21:57:18'),
(61, 7, NULL, NULL, 3, 'sale', -1, 39, 'Order #72', '2026-01-19 21:57:19', '2026-01-19 21:57:19'),
(62, 11, NULL, NULL, 3, 'sale', -1, 106, 'Order #72', '2026-01-19 21:57:19', '2026-01-19 21:57:19'),
(63, 1, NULL, NULL, NULL, 'sale', -1, 57, 'Order #73', '2026-01-19 22:39:11', '2026-01-19 22:39:11'),
(64, 4, NULL, NULL, 3, 'sale', -1, 42, 'Order #74', '2026-01-19 22:44:30', '2026-01-19 22:44:30'),
(65, 3, NULL, NULL, 3, 'sale', -1, 30, 'Order #74', '2026-01-19 22:44:30', '2026-01-19 22:44:30'),
(66, 1, NULL, NULL, 3, 'sale', -1, 56, 'Order #74', '2026-01-19 22:44:30', '2026-01-19 22:44:30'),
(67, 4, NULL, NULL, 3, 'sale', -1, 41, 'Order #75', '2026-01-19 22:46:10', '2026-01-19 22:46:10'),
(68, 3, NULL, NULL, 3, 'sale', -1, 29, 'Order #75', '2026-01-19 22:46:10', '2026-01-19 22:46:10'),
(69, 1, NULL, NULL, 3, 'sale', -1, 55, 'Order #75', '2026-01-19 22:46:10', '2026-01-19 22:46:10'),
(70, 3, NULL, NULL, 3, 'sale', -1, 28, 'Order #76', '2026-01-19 22:51:55', '2026-01-19 22:51:55'),
(71, 14, NULL, NULL, 3, 'sale', -2, 118, 'Order #76', '2026-01-19 22:51:55', '2026-01-19 22:51:55'),
(72, 13, NULL, NULL, 3, 'sale', -2, 100, 'Order #76', '2026-01-19 22:51:55', '2026-01-19 22:51:55'),
(73, 10, NULL, NULL, 3, 'sale', -1, 117, 'Order #76', '2026-01-19 22:51:55', '2026-01-19 22:51:55'),
(74, 9, NULL, NULL, 3, 'sale', -2, 100, 'Order #76', '2026-01-19 22:51:55', '2026-01-19 22:51:55'),
(75, 7, NULL, NULL, 3, 'sale', -1, 38, 'Order #77', '2026-01-19 23:14:49', '2026-01-19 23:14:49'),
(76, 8, NULL, NULL, 3, 'sale', -1, 139, 'Order #77', '2026-01-19 23:14:49', '2026-01-19 23:14:49'),
(77, 5, NULL, NULL, 3, 'sale', -1, 42, 'Order #78', '2026-01-19 23:49:26', '2026-01-19 23:49:26'),
(78, 6, NULL, NULL, 3, 'sale', -3, 56, 'Order #78', '2026-01-19 23:49:26', '2026-01-19 23:49:26'),
(79, 7, NULL, NULL, 3, 'sale', -2, 36, 'Order #78', '2026-01-19 23:49:26', '2026-01-19 23:49:26'),
(80, 12, NULL, NULL, 3, 'sale', -1, 146, 'Order #78', '2026-01-19 23:49:26', '2026-01-19 23:49:26'),
(81, 11, NULL, NULL, 3, 'sale', -1, 105, 'Order #78', '2026-01-19 23:49:26', '2026-01-19 23:49:26'),
(82, 10, NULL, NULL, 3, 'sale', -1, 116, 'Order #78', '2026-01-19 23:49:26', '2026-01-19 23:49:26'),
(83, NULL, 1, 2, 3, 'purchase', 5, 55, 'Purchase #2', '2026-01-20 00:17:01', '2026-01-20 00:17:01'),
(84, NULL, 2, 2, 3, 'purchase', 10, 110, 'Purchase #2', '2026-01-20 00:17:01', '2026-01-20 00:17:01'),
(85, NULL, 3, 2, 3, 'purchase', 8, 58, 'Purchase #2', '2026-01-20 00:17:01', '2026-01-20 00:17:01'),
(86, NULL, 4, 2, 3, 'purchase', 7, 27, 'Purchase #2', '2026-01-20 00:17:01', '2026-01-20 00:17:01'),
(87, 13, NULL, 3, 3, 'purchase', 40, 140, 'Purchase #3', '2026-01-20 00:27:58', '2026-01-20 00:27:58'),
(88, NULL, 2, 3, 3, 'purchase', 2, 112, 'Purchase #3', '2026-01-20 00:27:58', '2026-01-20 00:27:58'),
(89, 1, NULL, 2, 3, 'purchase', 30, 85, 'Purchase #4', '2026-01-20 00:32:54', '2026-01-20 00:32:54'),
(90, 2, NULL, 2, 3, 'purchase', 30, 53, 'Purchase #4', '2026-01-20 00:32:54', '2026-01-20 00:32:54'),
(91, 12, NULL, 2, 3, 'purchase', 80, 226, 'Purchase #4', '2026-01-20 00:32:54', '2026-01-20 00:32:54'),
(92, 3, NULL, NULL, 3, 'sale', -25, 3, 'Order #79', '2026-01-20 00:36:04', '2026-01-20 00:36:04'),
(93, 7, NULL, NULL, 3, 'sale', -3, 33, 'Order #80', '2026-01-20 01:16:32', '2026-01-20 01:16:32'),
(94, 5, NULL, NULL, 3, 'sale', -1, 41, 'Order #80', '2026-01-20 01:16:32', '2026-01-20 01:16:32'),
(95, 6, NULL, NULL, 3, 'sale', -1, 55, 'Order #80', '2026-01-20 01:16:32', '2026-01-20 01:16:32'),
(96, 2, NULL, NULL, 3, 'sale', -1, 52, 'Order #80', '2026-01-20 01:16:32', '2026-01-20 01:16:32'),
(97, 12, NULL, NULL, 3, 'sale', -2, 224, 'Order #80', '2026-01-20 01:16:32', '2026-01-20 01:16:32'),
(98, 8, NULL, NULL, 3, 'sale', -1, 138, 'Order #80', '2026-01-20 01:16:32', '2026-01-20 01:16:32'),
(99, 11, NULL, NULL, 2, 'sale', -1, 104, 'Order #81', '2026-01-20 21:04:18', '2026-01-20 21:04:18'),
(100, 10, NULL, NULL, 2, 'sale', -1, 115, 'Order #81', '2026-01-20 21:04:19', '2026-01-20 21:04:19'),
(101, 12, NULL, NULL, 2, 'sale', -1, 223, 'Order #81', '2026-01-20 21:04:19', '2026-01-20 21:04:19'),
(102, 3, NULL, NULL, 2, 'sale', -1, 2, 'Order #81', '2026-01-20 21:04:19', '2026-01-20 21:04:19');

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
(4, '2026_01_04_044830_create_categories_table', 2),
(5, '2026_01_04_044832_create_products_table', 2),
(6, '2026_01_04_051148_add_quantity_to_products_table', 3),
(7, '2026_01_04_051148_create_suppliers_table', 4),
(8, '2026_01_04_000000_create_orders_table', 5),
(9, '2026_01_04_051200_create_inventory_transactions_table', 6),
(10, '2026_01_05_034337_add_role_to_users_table', 6),
(11, '2026_01_05_034337_create_restaurant_tables_table', 6),
(12, '2026_01_05_034338_create_addons_tables', 6),
(13, '2026_01_05_034338_create_payments_table', 6),
(14, '2026_01_05_034338_update_orders_schema_for_pos', 6),
(15, '2026_01_05_034339_add_notes_to_order_items', 6),
(16, '2026_01_11_040309_create_personal_access_tokens_table', 7),
(17, '2026_01_11_072530_add_sku_to_products_table', 8),
(18, '2026_01_18_000001_create_settings_table', 9),
(19, '2026_01_18_000002_create_discounts_table', 9),
(20, '2026_01_18_000003_add_details_to_orders_table', 9),
(21, '2026_01_18_000004_create_ingredients_table', 10),
(22, '2026_01_18_000007_update_inventory_transactions_table', 11),
(23, '2026_01_18_060258_create_purchases_table', 11),
(24, '2026_01_18_070502_add_tendered_amount_to_payments_table', 12),
(25, '2026_01_19_121500_update_orders_status_enum', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `table_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `discount_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` enum('pending','preparing','ready','completed','cancelled','refunded') NOT NULL DEFAULT 'pending',
  `type` varchar(255) NOT NULL DEFAULT 'dine_in',
  `customer_name` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `table_id`, `total_amount`, `discount_amount`, `status`, `type`, `customer_name`, `notes`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 35.00, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-01 00:34:42', '2026-01-04 00:34:42'),
(2, NULL, NULL, 26.00, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-02 00:34:42', '2026-01-04 00:34:42'),
(3, NULL, NULL, 22.50, 0.00, 'completed', 'dine_in', NULL, NULL, '2025-12-28 00:34:42', '2026-01-04 00:34:42'),
(4, NULL, NULL, 40.66, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-03 00:34:42', '2026-01-04 00:34:43'),
(5, NULL, NULL, 14.00, 0.00, 'completed', 'dine_in', NULL, NULL, '2025-12-31 00:34:43', '2026-01-04 00:34:43'),
(6, NULL, NULL, 33.00, 0.00, 'completed', 'dine_in', NULL, NULL, '2025-12-28 00:34:43', '2026-01-04 00:34:43'),
(7, NULL, NULL, 14.00, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-01 00:34:43', '2026-01-04 00:34:43'),
(8, NULL, NULL, 28.32, 0.00, 'completed', 'dine_in', NULL, NULL, '2025-12-31 00:34:43', '2026-01-04 00:34:43'),
(9, NULL, NULL, 12.00, 0.00, 'completed', 'dine_in', NULL, NULL, '2025-12-31 00:34:43', '2026-01-04 00:34:43'),
(10, NULL, NULL, 39.98, 0.00, 'completed', 'dine_in', NULL, NULL, '2025-12-30 00:34:43', '2026-01-04 00:34:44'),
(11, NULL, NULL, 45.82, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-03 00:34:44', '2026-01-04 00:34:44'),
(12, NULL, NULL, 13.50, 0.00, 'completed', 'dine_in', NULL, NULL, '2025-12-31 00:34:44', '2026-01-04 00:34:44'),
(13, NULL, NULL, 17.50, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-01 00:34:44', '2026-01-04 00:34:44'),
(14, NULL, NULL, 26.50, 0.00, 'completed', 'dine_in', NULL, NULL, '2025-12-29 00:34:44', '2026-01-04 00:34:44'),
(15, NULL, NULL, 12.50, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-04 00:34:44', '2026-01-04 00:34:45'),
(16, NULL, NULL, 7.00, 0.00, 'completed', 'dine_in', NULL, NULL, '2025-12-29 00:34:45', '2026-01-04 00:34:45'),
(17, NULL, NULL, 6.00, 0.00, 'completed', 'dine_in', NULL, NULL, '2025-12-29 00:34:45', '2026-01-04 00:34:45'),
(18, NULL, NULL, 27.00, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-02 00:34:45', '2026-01-04 00:34:45'),
(19, NULL, NULL, 6.00, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-04 00:34:45', '2026-01-04 00:34:45'),
(20, NULL, NULL, 19.50, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-03 00:34:45', '2026-01-04 00:34:45'),
(21, NULL, NULL, 37.16, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-04 00:34:45', '2026-01-04 00:34:45'),
(22, NULL, NULL, 16.50, 0.00, 'completed', 'dine_in', NULL, NULL, '2025-12-31 00:34:45', '2026-01-04 00:34:45'),
(23, NULL, NULL, 4.50, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-02 00:34:45', '2026-01-04 00:34:45'),
(24, NULL, NULL, 27.00, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-02 00:34:45', '2026-01-04 00:34:46'),
(25, NULL, NULL, 13.50, 0.00, 'completed', 'dine_in', NULL, NULL, '2025-12-28 00:34:46', '2026-01-04 00:34:46'),
(26, NULL, NULL, 42.50, 0.00, 'completed', 'dine_in', NULL, NULL, '2025-12-28 00:34:46', '2026-01-04 00:34:47'),
(27, NULL, NULL, 12.50, 0.00, 'completed', 'dine_in', NULL, NULL, '2025-12-29 00:34:47', '2026-01-04 00:34:47'),
(28, NULL, NULL, 49.32, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-02 00:34:47', '2026-01-04 00:34:47'),
(29, NULL, NULL, 5.00, 0.00, 'completed', 'dine_in', NULL, NULL, '2025-12-29 00:34:47', '2026-01-04 00:34:47'),
(30, NULL, NULL, 15.50, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-02 00:34:47', '2026-01-04 00:34:47'),
(31, NULL, NULL, 38.48, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-02 00:34:47', '2026-01-04 00:34:47'),
(32, NULL, NULL, 46.32, 0.00, 'completed', 'dine_in', NULL, NULL, '2025-12-28 00:34:47', '2026-01-04 00:34:47'),
(33, NULL, NULL, 25.00, 0.00, 'completed', 'dine_in', NULL, NULL, '2025-12-29 00:34:47', '2026-01-04 00:34:47'),
(34, NULL, NULL, 31.50, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-03 00:34:47', '2026-01-04 00:34:48'),
(35, NULL, NULL, 13.32, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-04 00:34:48', '2026-01-04 00:34:48'),
(36, NULL, NULL, 13.00, 0.00, 'completed', 'dine_in', NULL, NULL, '2025-12-31 00:34:48', '2026-01-04 00:34:48'),
(37, NULL, NULL, 40.64, 0.00, 'completed', 'dine_in', NULL, NULL, '2025-12-29 00:34:48', '2026-01-04 00:34:48'),
(38, NULL, NULL, 31.66, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-01 00:34:48', '2026-01-04 00:34:48'),
(39, NULL, NULL, 9.00, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-01 00:34:48', '2026-01-04 00:34:49'),
(40, NULL, NULL, 27.00, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-01 00:34:49', '2026-01-04 00:34:49'),
(41, NULL, NULL, 48.48, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-02 00:34:49', '2026-01-04 00:34:49'),
(42, NULL, NULL, 9.00, 0.00, 'completed', 'dine_in', NULL, NULL, '2025-12-30 00:34:49', '2026-01-04 00:34:49'),
(43, NULL, NULL, 37.00, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-02 00:34:49', '2026-01-04 00:34:49'),
(44, NULL, NULL, 44.50, 0.00, 'completed', 'dine_in', NULL, NULL, '2025-12-30 00:34:50', '2026-01-04 00:34:50'),
(45, NULL, NULL, 18.00, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-01 00:34:50', '2026-01-04 00:34:50'),
(46, NULL, NULL, 22.50, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-04 00:34:50', '2026-01-04 00:34:50'),
(47, NULL, NULL, 17.50, 0.00, 'completed', 'dine_in', NULL, NULL, '2025-12-31 00:34:50', '2026-01-04 00:34:51'),
(48, NULL, NULL, 23.82, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-03 00:34:51', '2026-01-04 00:34:51'),
(49, NULL, NULL, 19.50, 0.00, 'completed', 'dine_in', NULL, NULL, '2025-12-31 00:34:51', '2026-01-04 00:34:51'),
(50, NULL, NULL, 10.00, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-04 00:34:51', '2026-01-04 00:34:51'),
(51, 2, NULL, 13.75, 0.00, 'completed', 'takeaway', NULL, NULL, '2026-01-04 23:42:03', '2026-01-04 23:42:03'),
(52, 2, NULL, 13.20, 0.00, 'completed', 'takeaway', NULL, NULL, '2026-01-11 01:37:35', '2026-01-11 01:37:35'),
(53, 2, NULL, 14.85, 0.00, 'completed', 'takeaway', NULL, NULL, '2026-01-11 21:31:35', '2026-01-11 21:31:35'),
(54, 2, NULL, 4.95, 0.00, 'completed', 'takeaway', NULL, NULL, '2026-01-11 21:46:04', '2026-01-11 21:46:04'),
(55, 2, NULL, 9.35, 0.00, 'completed', 'takeaway', NULL, NULL, '2026-01-11 22:38:32', '2026-01-11 22:38:32'),
(56, 2, NULL, 17.23, 0.00, 'completed', 'takeaway', NULL, NULL, '2026-01-11 22:57:33', '2026-01-11 22:57:33'),
(57, 2, NULL, 17.23, 0.00, 'completed', 'takeaway', NULL, NULL, '2026-01-11 23:00:35', '2026-01-11 23:00:35'),
(58, 2, NULL, 15.40, 0.00, 'completed', 'takeaway', NULL, NULL, '2026-01-11 23:05:10', '2026-01-11 23:05:10'),
(59, 2, NULL, 4.95, 0.00, 'completed', 'takeaway', NULL, NULL, '2026-01-17 22:09:13', '2026-01-17 22:09:13'),
(60, 2, NULL, 4.95, 0.00, 'completed', 'takeaway', NULL, NULL, '2026-01-17 22:14:44', '2026-01-17 22:14:44'),
(61, 2, NULL, 12.28, 0.00, 'completed', 'takeaway', NULL, NULL, '2026-01-17 22:40:58', '2026-01-17 22:40:58'),
(62, 2, NULL, 12.28, 0.00, 'completed', 'takeaway', NULL, NULL, '2026-01-17 22:41:27', '2026-01-17 22:41:27'),
(63, 2, 9, 7.15, 0.00, 'completed', 'dine_in', 'Ape Akter', NULL, '2026-01-17 23:27:51', '2026-01-17 23:27:51'),
(64, 2, 6, 26.95, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-17 23:29:11', '2026-01-17 23:29:11'),
(65, 2, 6, 26.95, 0.00, 'completed', 'dine_in', 'Alamgir Rahman', NULL, '2026-01-17 23:30:17', '2026-01-17 23:30:17'),
(66, 2, 3, 9.90, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-18 00:25:27', '2026-01-18 00:25:27'),
(67, 2, 3, 9.90, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-18 00:27:25', '2026-01-18 00:27:25'),
(68, 2, 2, 44.18, 0.00, 'ready', 'dine_in', NULL, NULL, '2026-01-18 01:02:12', '2026-01-19 00:18:03'),
(69, 2, 2, 44.18, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-18 01:06:48', '2026-01-18 01:06:48'),
(70, 5, 10, 21.45, 0.00, 'pending', 'dine_in', NULL, NULL, '2026-01-19 00:02:53', '2026-01-19 00:04:54'),
(71, 5, 7, 12.10, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-19 00:34:31', '2026-01-19 00:34:31'),
(72, 3, NULL, 25.48, 0.00, 'completed', 'takeaway', NULL, NULL, '2026-01-19 21:57:18', '2026-01-19 21:57:18'),
(73, NULL, NULL, 45.00, 5.00, 'completed', 'takeaway', 'Backend Check', NULL, '2026-01-19 22:39:11', '2026-01-19 22:39:11'),
(74, 3, 18, 12.10, 0.00, 'completed', 'dine_in', 'Amazad', NULL, '2026-01-19 22:44:30', '2026-01-19 22:44:30'),
(75, 3, 16, 12.10, 0.00, 'completed', 'dine_in', 'Amazad', NULL, '2026-01-19 22:46:10', '2026-01-19 22:46:10'),
(76, 3, 13, 30.80, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-19 22:51:55', '2026-01-19 22:51:55'),
(77, 3, 20, 10.63, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-19 23:14:49', '2026-01-19 23:14:49'),
(78, 3, NULL, 40.50, 0.00, 'completed', 'takeaway', NULL, NULL, '2026-01-19 23:49:26', '2026-01-19 23:49:26'),
(79, 3, NULL, 123.75, 0.00, 'completed', 'takeaway', 'ABC Bnk ltd', 'Evening Snacks Purchase', '2026-01-20 00:36:04', '2026-01-20 00:36:04'),
(80, 3, NULL, 43.43, 0.00, 'completed', 'takeaway', 'latif siddique', NULL, '2026-01-20 01:16:32', '2026-01-20 01:16:32'),
(81, 2, 21, 15.40, 0.00, 'completed', 'dine_in', NULL, NULL, '2026-01-20 21:04:18', '2026-01-20 21:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 1, 5.00, NULL, '2026-01-01 00:34:42', '2026-01-01 00:34:42'),
(2, 1, 5, 3, 5.00, NULL, '2026-01-01 00:34:42', '2026-01-01 00:34:42'),
(3, 1, 5, 3, 5.00, NULL, '2026-01-01 00:34:42', '2026-01-01 00:34:42'),
(4, 2, 1, 1, 3.00, NULL, '2026-01-02 00:34:42', '2026-01-02 00:34:42'),
(5, 2, 3, 2, 4.50, NULL, '2026-01-02 00:34:42', '2026-01-02 00:34:42'),
(6, 2, 4, 2, 3.50, NULL, '2026-01-02 00:34:42', '2026-01-02 00:34:42'),
(7, 2, 4, 1, 3.50, NULL, '2026-01-02 00:34:42', '2026-01-02 00:34:42'),
(8, 2, 4, 1, 3.50, NULL, '2026-01-02 00:34:42', '2026-01-02 00:34:42'),
(9, 3, 3, 3, 4.50, NULL, '2025-12-28 00:34:42', '2025-12-28 00:34:42'),
(10, 3, 2, 2, 4.50, NULL, '2025-12-28 00:34:42', '2025-12-28 00:34:42'),
(11, 4, 5, 2, 5.00, NULL, '2026-01-03 00:34:42', '2026-01-03 00:34:42'),
(12, 4, 4, 3, 3.50, NULL, '2026-01-03 00:34:42', '2026-01-03 00:34:42'),
(13, 4, 3, 1, 4.50, NULL, '2026-01-03 00:34:42', '2026-01-03 00:34:42'),
(14, 4, 7, 1, 6.66, NULL, '2026-01-03 00:34:42', '2026-01-03 00:34:42'),
(15, 4, 2, 2, 4.50, NULL, '2026-01-03 00:34:42', '2026-01-03 00:34:42'),
(16, 5, 6, 3, 3.00, NULL, '2025-12-31 00:34:43', '2025-12-31 00:34:43'),
(17, 5, 5, 1, 5.00, NULL, '2025-12-31 00:34:43', '2025-12-31 00:34:43'),
(18, 6, 5, 2, 5.00, NULL, '2025-12-28 00:34:43', '2025-12-28 00:34:43'),
(19, 6, 4, 1, 3.50, NULL, '2025-12-28 00:34:43', '2025-12-28 00:34:43'),
(20, 6, 3, 3, 4.50, NULL, '2025-12-28 00:34:43', '2025-12-28 00:34:43'),
(21, 6, 1, 2, 3.00, NULL, '2025-12-28 00:34:43', '2025-12-28 00:34:43'),
(22, 7, 2, 1, 4.50, NULL, '2026-01-01 00:34:43', '2026-01-01 00:34:43'),
(23, 7, 6, 2, 3.00, NULL, '2026-01-01 00:34:43', '2026-01-01 00:34:43'),
(24, 7, 4, 1, 3.50, NULL, '2026-01-01 00:34:43', '2026-01-01 00:34:43'),
(25, 8, 7, 2, 6.66, NULL, '2025-12-31 00:34:43', '2025-12-31 00:34:43'),
(26, 8, 4, 3, 3.50, NULL, '2025-12-31 00:34:43', '2025-12-31 00:34:43'),
(27, 8, 2, 1, 4.50, NULL, '2025-12-31 00:34:43', '2025-12-31 00:34:43'),
(28, 9, 1, 1, 3.00, NULL, '2025-12-31 00:34:43', '2025-12-31 00:34:43'),
(29, 9, 3, 2, 4.50, NULL, '2025-12-31 00:34:43', '2025-12-31 00:34:43'),
(30, 10, 7, 2, 6.66, NULL, '2025-12-30 00:34:43', '2025-12-30 00:34:43'),
(31, 10, 7, 1, 6.66, NULL, '2025-12-30 00:34:43', '2025-12-30 00:34:43'),
(32, 10, 6, 2, 3.00, NULL, '2025-12-30 00:34:43', '2025-12-30 00:34:43'),
(33, 10, 6, 3, 3.00, NULL, '2025-12-30 00:34:43', '2025-12-30 00:34:43'),
(34, 10, 5, 1, 5.00, NULL, '2025-12-30 00:34:43', '2025-12-30 00:34:43'),
(35, 11, 5, 2, 5.00, NULL, '2026-01-03 00:34:44', '2026-01-03 00:34:44'),
(36, 11, 7, 2, 6.66, NULL, '2026-01-03 00:34:44', '2026-01-03 00:34:44'),
(37, 11, 2, 1, 4.50, NULL, '2026-01-03 00:34:44', '2026-01-03 00:34:44'),
(38, 11, 3, 1, 4.50, NULL, '2026-01-03 00:34:44', '2026-01-03 00:34:44'),
(39, 11, 3, 3, 4.50, NULL, '2026-01-03 00:34:44', '2026-01-03 00:34:44'),
(40, 12, 3, 3, 4.50, NULL, '2025-12-31 00:34:44', '2025-12-31 00:34:44'),
(41, 13, 3, 1, 4.50, NULL, '2026-01-01 00:34:44', '2026-01-01 00:34:44'),
(42, 13, 4, 2, 3.50, NULL, '2026-01-01 00:34:44', '2026-01-01 00:34:44'),
(43, 13, 1, 2, 3.00, NULL, '2026-01-01 00:34:44', '2026-01-01 00:34:44'),
(44, 14, 3, 3, 4.50, NULL, '2025-12-29 00:34:44', '2025-12-29 00:34:44'),
(45, 14, 1, 2, 3.00, NULL, '2025-12-29 00:34:44', '2025-12-29 00:34:44'),
(46, 14, 4, 2, 3.50, NULL, '2025-12-29 00:34:44', '2025-12-29 00:34:44'),
(47, 15, 4, 1, 3.50, NULL, '2026-01-04 00:34:44', '2026-01-04 00:34:44'),
(48, 15, 1, 3, 3.00, NULL, '2026-01-04 00:34:44', '2026-01-04 00:34:44'),
(49, 16, 4, 2, 3.50, NULL, '2025-12-29 00:34:45', '2025-12-29 00:34:45'),
(50, 17, 6, 2, 3.00, NULL, '2025-12-29 00:34:45', '2025-12-29 00:34:45'),
(51, 18, 2, 3, 4.50, NULL, '2026-01-02 00:34:45', '2026-01-02 00:34:45'),
(52, 18, 1, 3, 3.00, NULL, '2026-01-02 00:34:45', '2026-01-02 00:34:45'),
(53, 18, 2, 1, 4.50, NULL, '2026-01-02 00:34:45', '2026-01-02 00:34:45'),
(54, 19, 6, 2, 3.00, NULL, '2026-01-04 00:34:45', '2026-01-04 00:34:45'),
(55, 20, 5, 3, 5.00, NULL, '2026-01-03 00:34:45', '2026-01-03 00:34:45'),
(56, 20, 3, 1, 4.50, NULL, '2026-01-03 00:34:45', '2026-01-03 00:34:45'),
(57, 21, 5, 1, 5.00, NULL, '2026-01-04 00:34:45', '2026-01-04 00:34:45'),
(58, 21, 5, 3, 5.00, NULL, '2026-01-04 00:34:45', '2026-01-04 00:34:45'),
(59, 21, 7, 1, 6.66, NULL, '2026-01-04 00:34:45', '2026-01-04 00:34:45'),
(60, 21, 4, 3, 3.50, NULL, '2026-01-04 00:34:45', '2026-01-04 00:34:45'),
(61, 22, 6, 1, 3.00, NULL, '2025-12-31 00:34:45', '2025-12-31 00:34:45'),
(62, 22, 3, 3, 4.50, NULL, '2025-12-31 00:34:45', '2025-12-31 00:34:45'),
(63, 23, 3, 1, 4.50, NULL, '2026-01-02 00:34:45', '2026-01-02 00:34:45'),
(64, 24, 1, 3, 3.00, NULL, '2026-01-02 00:34:45', '2026-01-02 00:34:45'),
(65, 24, 4, 1, 3.50, NULL, '2026-01-02 00:34:45', '2026-01-02 00:34:45'),
(66, 24, 5, 2, 5.00, NULL, '2026-01-02 00:34:45', '2026-01-02 00:34:45'),
(67, 24, 2, 1, 4.50, NULL, '2026-01-02 00:34:45', '2026-01-02 00:34:45'),
(68, 25, 1, 1, 3.00, NULL, '2025-12-28 00:34:46', '2025-12-28 00:34:46'),
(69, 25, 6, 2, 3.00, NULL, '2025-12-28 00:34:46', '2025-12-28 00:34:46'),
(70, 25, 3, 1, 4.50, NULL, '2025-12-28 00:34:46', '2025-12-28 00:34:46'),
(71, 26, 5, 1, 5.00, NULL, '2025-12-28 00:34:46', '2025-12-28 00:34:46'),
(72, 26, 3, 1, 4.50, NULL, '2025-12-28 00:34:46', '2025-12-28 00:34:46'),
(73, 26, 4, 3, 3.50, NULL, '2025-12-28 00:34:46', '2025-12-28 00:34:46'),
(74, 26, 2, 3, 4.50, NULL, '2025-12-28 00:34:46', '2025-12-28 00:34:46'),
(75, 26, 2, 2, 4.50, NULL, '2025-12-28 00:34:46', '2025-12-28 00:34:46'),
(76, 27, 4, 1, 3.50, NULL, '2025-12-29 00:34:47', '2025-12-29 00:34:47'),
(77, 27, 6, 3, 3.00, NULL, '2025-12-29 00:34:47', '2025-12-29 00:34:47'),
(78, 28, 5, 3, 5.00, NULL, '2026-01-02 00:34:47', '2026-01-02 00:34:47'),
(79, 28, 4, 3, 3.50, NULL, '2026-01-02 00:34:47', '2026-01-02 00:34:47'),
(80, 28, 4, 3, 3.50, NULL, '2026-01-02 00:34:47', '2026-01-02 00:34:47'),
(81, 28, 7, 2, 6.66, NULL, '2026-01-02 00:34:47', '2026-01-02 00:34:47'),
(82, 29, 5, 1, 5.00, NULL, '2025-12-29 00:34:47', '2025-12-29 00:34:47'),
(83, 30, 5, 1, 5.00, NULL, '2026-01-02 00:34:47', '2026-01-02 00:34:47'),
(84, 30, 4, 3, 3.50, NULL, '2026-01-02 00:34:47', '2026-01-02 00:34:47'),
(85, 31, 5, 1, 5.00, NULL, '2026-01-02 00:34:47', '2026-01-02 00:34:47'),
(86, 31, 4, 3, 3.50, NULL, '2026-01-02 00:34:47', '2026-01-02 00:34:47'),
(87, 31, 7, 3, 6.66, NULL, '2026-01-02 00:34:47', '2026-01-02 00:34:47'),
(88, 31, 6, 1, 3.00, NULL, '2026-01-02 00:34:47', '2026-01-02 00:34:47'),
(89, 32, 4, 3, 3.50, NULL, '2025-12-28 00:34:47', '2025-12-28 00:34:47'),
(90, 32, 7, 2, 6.66, NULL, '2025-12-28 00:34:47', '2025-12-28 00:34:47'),
(91, 32, 3, 2, 4.50, NULL, '2025-12-28 00:34:47', '2025-12-28 00:34:47'),
(92, 32, 2, 3, 4.50, NULL, '2025-12-28 00:34:47', '2025-12-28 00:34:47'),
(93, 33, 1, 3, 3.00, NULL, '2025-12-29 00:34:47', '2025-12-29 00:34:47'),
(94, 33, 5, 2, 5.00, NULL, '2025-12-29 00:34:47', '2025-12-29 00:34:47'),
(95, 33, 1, 2, 3.00, NULL, '2025-12-29 00:34:47', '2025-12-29 00:34:47'),
(96, 34, 5, 3, 5.00, NULL, '2026-01-03 00:34:47', '2026-01-03 00:34:47'),
(97, 34, 1, 2, 3.00, NULL, '2026-01-03 00:34:47', '2026-01-03 00:34:47'),
(98, 34, 1, 1, 3.00, NULL, '2026-01-03 00:34:47', '2026-01-03 00:34:47'),
(99, 34, 2, 1, 4.50, NULL, '2026-01-03 00:34:47', '2026-01-03 00:34:47'),
(100, 34, 6, 1, 3.00, NULL, '2026-01-03 00:34:47', '2026-01-03 00:34:47'),
(101, 35, 7, 2, 6.66, NULL, '2026-01-04 00:34:48', '2026-01-04 00:34:48'),
(102, 36, 2, 1, 4.50, NULL, '2025-12-31 00:34:48', '2025-12-31 00:34:48'),
(103, 36, 4, 1, 3.50, NULL, '2025-12-31 00:34:48', '2025-12-31 00:34:48'),
(104, 36, 5, 1, 5.00, NULL, '2025-12-31 00:34:48', '2025-12-31 00:34:48'),
(105, 37, 7, 2, 6.66, NULL, '2025-12-29 00:34:48', '2025-12-29 00:34:48'),
(106, 37, 7, 2, 6.66, NULL, '2025-12-29 00:34:48', '2025-12-29 00:34:48'),
(107, 37, 5, 1, 5.00, NULL, '2025-12-29 00:34:48', '2025-12-29 00:34:48'),
(108, 37, 2, 2, 4.50, NULL, '2025-12-29 00:34:48', '2025-12-29 00:34:48'),
(109, 38, 7, 1, 6.66, NULL, '2026-01-01 00:34:48', '2026-01-01 00:34:48'),
(110, 38, 5, 2, 5.00, NULL, '2026-01-01 00:34:48', '2026-01-01 00:34:48'),
(111, 38, 5, 2, 5.00, NULL, '2026-01-01 00:34:48', '2026-01-01 00:34:48'),
(112, 38, 5, 1, 5.00, NULL, '2026-01-01 00:34:48', '2026-01-01 00:34:48'),
(113, 39, 1, 2, 3.00, NULL, '2026-01-01 00:34:48', '2026-01-01 00:34:48'),
(114, 39, 6, 1, 3.00, NULL, '2026-01-01 00:34:48', '2026-01-01 00:34:48'),
(115, 40, 3, 2, 4.50, NULL, '2026-01-01 00:34:49', '2026-01-01 00:34:49'),
(116, 40, 1, 3, 3.00, NULL, '2026-01-01 00:34:49', '2026-01-01 00:34:49'),
(117, 40, 1, 3, 3.00, NULL, '2026-01-01 00:34:49', '2026-01-01 00:34:49'),
(118, 41, 7, 3, 6.66, NULL, '2026-01-02 00:34:49', '2026-01-02 00:34:49'),
(119, 41, 2, 3, 4.50, NULL, '2026-01-02 00:34:49', '2026-01-02 00:34:49'),
(120, 41, 1, 2, 3.00, NULL, '2026-01-02 00:34:49', '2026-01-02 00:34:49'),
(121, 41, 2, 2, 4.50, NULL, '2026-01-02 00:34:49', '2026-01-02 00:34:49'),
(122, 42, 2, 2, 4.50, NULL, '2025-12-30 00:34:49', '2025-12-30 00:34:49'),
(123, 43, 2, 3, 4.50, NULL, '2026-01-02 00:34:49', '2026-01-02 00:34:49'),
(124, 43, 4, 3, 3.50, NULL, '2026-01-02 00:34:49', '2026-01-02 00:34:49'),
(125, 43, 6, 1, 3.00, NULL, '2026-01-02 00:34:49', '2026-01-02 00:34:49'),
(126, 43, 5, 2, 5.00, NULL, '2026-01-02 00:34:49', '2026-01-02 00:34:49'),
(127, 44, 3, 2, 4.50, NULL, '2025-12-30 00:34:50', '2025-12-30 00:34:50'),
(128, 44, 6, 1, 3.00, NULL, '2025-12-30 00:34:50', '2025-12-30 00:34:50'),
(129, 44, 3, 3, 4.50, NULL, '2025-12-30 00:34:50', '2025-12-30 00:34:50'),
(130, 44, 5, 2, 5.00, NULL, '2025-12-30 00:34:50', '2025-12-30 00:34:50'),
(131, 44, 1, 3, 3.00, NULL, '2025-12-30 00:34:50', '2025-12-30 00:34:50'),
(132, 45, 6, 1, 3.00, NULL, '2026-01-01 00:34:50', '2026-01-01 00:34:50'),
(133, 45, 1, 1, 3.00, NULL, '2026-01-01 00:34:50', '2026-01-01 00:34:50'),
(134, 45, 1, 1, 3.00, NULL, '2026-01-01 00:34:50', '2026-01-01 00:34:50'),
(135, 45, 2, 2, 4.50, NULL, '2026-01-01 00:34:50', '2026-01-01 00:34:50'),
(136, 46, 2, 3, 4.50, NULL, '2026-01-04 00:34:50', '2026-01-04 00:34:50'),
(137, 46, 3, 2, 4.50, NULL, '2026-01-04 00:34:50', '2026-01-04 00:34:50'),
(138, 47, 5, 2, 5.00, NULL, '2025-12-31 00:34:50', '2025-12-31 00:34:50'),
(139, 47, 1, 1, 3.00, NULL, '2025-12-31 00:34:50', '2025-12-31 00:34:50'),
(140, 47, 2, 1, 4.50, NULL, '2025-12-31 00:34:50', '2025-12-31 00:34:50'),
(141, 48, 7, 2, 6.66, NULL, '2026-01-03 00:34:51', '2026-01-03 00:34:51'),
(142, 48, 4, 3, 3.50, NULL, '2026-01-03 00:34:51', '2026-01-03 00:34:51'),
(143, 49, 4, 3, 3.50, NULL, '2025-12-31 00:34:51', '2025-12-31 00:34:51'),
(144, 49, 1, 3, 3.00, NULL, '2025-12-31 00:34:51', '2025-12-31 00:34:51'),
(145, 50, 5, 2, 5.00, NULL, '2026-01-04 00:34:51', '2026-01-04 00:34:51'),
(146, 51, 2, 1, 4.50, NULL, '2026-01-04 23:42:03', '2026-01-04 23:42:03'),
(147, 51, 6, 1, 3.00, NULL, '2026-01-04 23:42:03', '2026-01-04 23:42:03'),
(148, 51, 5, 1, 5.00, NULL, '2026-01-04 23:42:03', '2026-01-04 23:42:03'),
(149, 52, 1, 4, 3.00, NULL, '2026-01-11 01:37:35', '2026-01-11 01:37:35'),
(150, 53, 2, 2, 4.50, NULL, '2026-01-11 21:31:35', '2026-01-11 21:31:35'),
(151, 53, 3, 1, 4.50, NULL, '2026-01-11 21:31:35', '2026-01-11 21:31:35'),
(152, 54, 3, 1, 4.50, NULL, '2026-01-11 21:46:04', '2026-01-11 21:46:04'),
(153, 55, 5, 1, 5.00, NULL, '2026-01-11 22:38:32', '2026-01-11 22:38:32'),
(154, 55, 4, 1, 3.50, NULL, '2026-01-11 22:38:32', '2026-01-11 22:38:32'),
(155, 56, 3, 1, 4.50, NULL, '2026-01-11 22:57:33', '2026-01-11 22:57:33'),
(156, 56, 2, 1, 4.50, NULL, '2026-01-11 22:57:33', '2026-01-11 22:57:33'),
(157, 56, 7, 1, 6.66, NULL, '2026-01-11 22:57:33', '2026-01-11 22:57:33'),
(158, 57, 3, 1, 4.50, NULL, '2026-01-11 23:00:35', '2026-01-11 23:00:35'),
(159, 57, 2, 1, 4.50, NULL, '2026-01-11 23:00:35', '2026-01-11 23:00:35'),
(160, 57, 7, 1, 6.66, NULL, '2026-01-11 23:00:35', '2026-01-11 23:00:35'),
(161, 58, 5, 1, 5.00, NULL, '2026-01-11 23:05:10', '2026-01-11 23:05:10'),
(162, 58, 2, 2, 4.50, NULL, '2026-01-11 23:05:10', '2026-01-11 23:05:10'),
(163, 59, 3, 1, 4.50, NULL, '2026-01-17 22:09:13', '2026-01-17 22:09:13'),
(164, 60, 3, 1, 4.50, NULL, '2026-01-17 22:14:44', '2026-01-17 22:14:44'),
(165, 61, 7, 1, 6.66, NULL, '2026-01-17 22:40:58', '2026-01-17 22:40:58'),
(166, 61, 3, 1, 4.50, NULL, '2026-01-17 22:40:58', '2026-01-17 22:40:58'),
(167, 62, 7, 1, 6.66, NULL, '2026-01-17 22:41:27', '2026-01-17 22:41:27'),
(168, 62, 3, 1, 4.50, NULL, '2026-01-17 22:41:27', '2026-01-17 22:41:27'),
(169, 63, 4, 1, 3.50, NULL, '2026-01-17 23:27:51', '2026-01-17 23:27:51'),
(170, 63, 6, 1, 3.00, NULL, '2026-01-17 23:27:51', '2026-01-17 23:27:51'),
(171, 64, 6, 2, 3.00, NULL, '2026-01-17 23:29:11', '2026-01-17 23:29:11'),
(172, 64, 2, 1, 4.50, NULL, '2026-01-17 23:29:11', '2026-01-17 23:29:11'),
(173, 64, 3, 2, 4.50, NULL, '2026-01-17 23:29:11', '2026-01-17 23:29:11'),
(174, 64, 5, 1, 5.00, NULL, '2026-01-17 23:29:11', '2026-01-17 23:29:11'),
(175, 65, 6, 2, 3.00, NULL, '2026-01-17 23:30:17', '2026-01-17 23:30:17'),
(176, 65, 2, 1, 4.50, NULL, '2026-01-17 23:30:17', '2026-01-17 23:30:17'),
(177, 65, 3, 2, 4.50, NULL, '2026-01-17 23:30:17', '2026-01-17 23:30:17'),
(178, 65, 5, 1, 5.00, NULL, '2026-01-17 23:30:17', '2026-01-17 23:30:17'),
(179, 66, 3, 1, 4.50, NULL, '2026-01-18 00:25:27', '2026-01-18 00:25:27'),
(180, 66, 2, 1, 4.50, NULL, '2026-01-18 00:25:27', '2026-01-18 00:25:27'),
(181, 67, 3, 1, 4.50, NULL, '2026-01-18 00:27:25', '2026-01-18 00:27:25'),
(182, 67, 2, 1, 4.50, NULL, '2026-01-18 00:27:25', '2026-01-18 00:27:25'),
(183, 68, 4, 1, 3.50, NULL, '2026-01-18 01:02:12', '2026-01-18 01:02:12'),
(184, 68, 3, 2, 4.50, NULL, '2026-01-18 01:02:12', '2026-01-18 01:02:12'),
(185, 68, 7, 1, 6.66, NULL, '2026-01-18 01:02:12', '2026-01-18 01:02:12'),
(186, 68, 2, 4, 4.50, NULL, '2026-01-18 01:02:12', '2026-01-18 01:02:12'),
(187, 68, 1, 1, 3.00, NULL, '2026-01-18 01:02:12', '2026-01-18 01:02:12'),
(188, 69, 4, 1, 3.50, NULL, '2026-01-18 01:06:48', '2026-01-18 01:06:48'),
(189, 69, 3, 2, 4.50, NULL, '2026-01-18 01:06:48', '2026-01-18 01:06:48'),
(190, 69, 7, 1, 6.66, NULL, '2026-01-18 01:06:48', '2026-01-18 01:06:48'),
(191, 69, 2, 4, 4.50, NULL, '2026-01-18 01:06:48', '2026-01-18 01:06:48'),
(192, 69, 1, 1, 3.00, NULL, '2026-01-18 01:06:48', '2026-01-18 01:06:48'),
(193, 70, 4, 3, 3.50, NULL, '2026-01-19 00:02:53', '2026-01-19 00:02:53'),
(194, 70, 3, 1, 4.50, NULL, '2026-01-19 00:02:53', '2026-01-19 00:02:53'),
(195, 70, 2, 1, 4.50, NULL, '2026-01-19 00:02:53', '2026-01-19 00:02:53'),
(196, 71, 11, 1, 4.00, NULL, '2026-01-19 00:34:31', '2026-01-19 00:34:31'),
(197, 71, 10, 1, 3.50, NULL, '2026-01-19 00:34:31', '2026-01-19 00:34:31'),
(198, 71, 9, 1, 3.50, NULL, '2026-01-19 00:34:31', '2026-01-19 00:34:31'),
(199, 72, 2, 1, 4.50, NULL, '2026-01-19 21:57:18', '2026-01-19 21:57:18'),
(200, 72, 5, 1, 5.00, NULL, '2026-01-19 21:57:18', '2026-01-19 21:57:18'),
(201, 72, 6, 1, 3.00, NULL, '2026-01-19 21:57:18', '2026-01-19 21:57:18'),
(202, 72, 7, 1, 6.66, NULL, '2026-01-19 21:57:19', '2026-01-19 21:57:19'),
(203, 72, 11, 1, 4.00, NULL, '2026-01-19 21:57:19', '2026-01-19 21:57:19'),
(204, 73, 1, 1, 50.00, NULL, '2026-01-19 22:39:11', '2026-01-19 22:39:11'),
(205, 74, 4, 1, 3.50, NULL, '2026-01-19 22:44:30', '2026-01-19 22:44:30'),
(206, 74, 3, 1, 4.50, NULL, '2026-01-19 22:44:30', '2026-01-19 22:44:30'),
(207, 74, 1, 1, 3.00, NULL, '2026-01-19 22:44:30', '2026-01-19 22:44:30'),
(208, 75, 4, 1, 3.50, NULL, '2026-01-19 22:46:10', '2026-01-19 22:46:10'),
(209, 75, 3, 1, 4.50, NULL, '2026-01-19 22:46:10', '2026-01-19 22:46:10'),
(210, 75, 1, 1, 3.00, NULL, '2026-01-19 22:46:10', '2026-01-19 22:46:10'),
(211, 76, 3, 1, 4.50, NULL, '2026-01-19 22:51:55', '2026-01-19 22:51:55'),
(212, 76, 14, 2, 4.00, NULL, '2026-01-19 22:51:55', '2026-01-19 22:51:55'),
(213, 76, 13, 2, 2.50, NULL, '2026-01-19 22:51:55', '2026-01-19 22:51:55'),
(214, 76, 10, 1, 3.50, NULL, '2026-01-19 22:51:55', '2026-01-19 22:51:55'),
(215, 76, 9, 2, 3.50, NULL, '2026-01-19 22:51:55', '2026-01-19 22:51:55'),
(216, 77, 7, 1, 6.66, NULL, '2026-01-19 23:14:49', '2026-01-19 23:14:49'),
(217, 77, 8, 1, 3.00, NULL, '2026-01-19 23:14:49', '2026-01-19 23:14:49'),
(218, 78, 5, 1, 5.00, NULL, '2026-01-19 23:49:26', '2026-01-19 23:49:26'),
(219, 78, 6, 3, 3.00, NULL, '2026-01-19 23:49:26', '2026-01-19 23:49:26'),
(220, 78, 7, 2, 6.66, NULL, '2026-01-19 23:49:26', '2026-01-19 23:49:26'),
(221, 78, 12, 1, 2.00, NULL, '2026-01-19 23:49:26', '2026-01-19 23:49:26'),
(222, 78, 11, 1, 4.00, NULL, '2026-01-19 23:49:26', '2026-01-19 23:49:26'),
(223, 78, 10, 1, 3.50, NULL, '2026-01-19 23:49:26', '2026-01-19 23:49:26'),
(224, 79, 3, 25, 4.50, NULL, '2026-01-20 00:36:04', '2026-01-20 00:36:04'),
(225, 80, 7, 3, 6.66, NULL, '2026-01-20 01:16:32', '2026-01-20 01:16:32'),
(226, 80, 5, 1, 5.00, NULL, '2026-01-20 01:16:32', '2026-01-20 01:16:32'),
(227, 80, 6, 1, 3.00, NULL, '2026-01-20 01:16:32', '2026-01-20 01:16:32'),
(228, 80, 2, 1, 4.50, NULL, '2026-01-20 01:16:32', '2026-01-20 01:16:32'),
(229, 80, 12, 2, 2.00, NULL, '2026-01-20 01:16:32', '2026-01-20 01:16:32'),
(230, 80, 8, 1, 3.00, NULL, '2026-01-20 01:16:32', '2026-01-20 01:16:32'),
(231, 81, 11, 1, 4.00, NULL, '2026-01-20 21:04:18', '2026-01-20 21:04:18'),
(232, 81, 10, 1, 3.50, NULL, '2026-01-20 21:04:19', '2026-01-20 21:04:19'),
(233, 81, 12, 1, 2.00, NULL, '2026-01-20 21:04:19', '2026-01-20 21:04:19'),
(234, 81, 3, 1, 4.50, NULL, '2026-01-20 21:04:19', '2026-01-20 21:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `order_item_addons`
--

CREATE TABLE `order_item_addons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `addon_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `tendered_amount` decimal(10,2) DEFAULT NULL COMMENT 'Amount received/tendered by customer',
  `payment_method` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'completed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `amount`, `tendered_amount`, `payment_method`, `status`, `created_at`, `updated_at`) VALUES
(1, 51, 13.75, NULL, 'cash', 'completed', '2026-01-04 23:42:03', '2026-01-04 23:42:03'),
(2, 52, 13.20, NULL, 'cash', 'completed', '2026-01-11 01:37:35', '2026-01-11 01:37:35'),
(3, 53, 14.85, NULL, 'cash', 'completed', '2026-01-11 21:31:35', '2026-01-11 21:31:35'),
(4, 54, 4.95, NULL, 'card', 'completed', '2026-01-11 21:46:04', '2026-01-11 21:46:04'),
(5, 55, 9.35, NULL, 'cash', 'completed', '2026-01-11 22:38:32', '2026-01-11 22:38:32'),
(6, 56, 17.23, NULL, 'cash', 'completed', '2026-01-11 22:57:33', '2026-01-11 22:57:33'),
(7, 57, 20.00, NULL, 'cash', 'completed', '2026-01-11 23:00:35', '2026-01-11 23:00:35'),
(8, 58, 20.00, NULL, 'cash', 'completed', '2026-01-11 23:05:10', '2026-01-11 23:05:10'),
(9, 59, 10.00, NULL, 'cash', 'completed', '2026-01-17 22:09:13', '2026-01-17 22:09:13'),
(10, 60, 10.00, NULL, 'cash', 'completed', '2026-01-17 22:14:44', '2026-01-17 22:14:44'),
(11, 61, 13.00, NULL, 'cash', 'completed', '2026-01-17 22:40:58', '2026-01-17 22:40:58'),
(12, 62, 12.28, NULL, 'card', 'completed', '2026-01-17 22:41:27', '2026-01-17 22:41:27'),
(13, 63, 7.15, NULL, 'cash', 'completed', '2026-01-17 23:27:51', '2026-01-17 23:27:51'),
(14, 64, 26.95, NULL, 'cash', 'completed', '2026-01-17 23:29:11', '2026-01-17 23:29:11'),
(15, 65, 26.95, NULL, 'cash', 'completed', '2026-01-17 23:30:17', '2026-01-17 23:30:17'),
(16, 66, 9.90, NULL, 'cash', 'completed', '2026-01-18 00:25:27', '2026-01-18 00:25:27'),
(17, 67, 9.90, NULL, 'cash', 'completed', '2026-01-18 00:27:25', '2026-01-18 00:27:25'),
(18, 68, 44.18, NULL, 'cash', 'completed', '2026-01-18 01:02:12', '2026-01-18 01:02:12'),
(19, 69, 44.18, 45.00, 'cash', 'completed', '2026-01-18 01:06:48', '2026-01-18 01:06:48'),
(20, 70, 21.45, 22.00, 'cash', 'completed', '2026-01-19 00:02:53', '2026-01-19 00:02:53'),
(21, 71, 12.10, 13.00, 'cash', 'completed', '2026-01-19 00:34:31', '2026-01-19 00:34:31'),
(22, 72, 25.48, 26.00, 'cash', 'completed', '2026-01-19 21:57:19', '2026-01-19 21:57:19'),
(23, 73, 45.00, 50.00, 'cash', 'completed', '2026-01-19 22:39:11', '2026-01-19 22:39:11'),
(24, 74, 12.10, 13.00, 'cash', 'completed', '2026-01-19 22:44:30', '2026-01-19 22:44:30'),
(25, 75, 12.10, 13.00, 'cash', 'completed', '2026-01-19 22:46:10', '2026-01-19 22:46:10'),
(26, 76, 30.80, 31.00, 'cash', 'completed', '2026-01-19 22:51:55', '2026-01-19 22:51:55'),
(27, 77, 10.63, 11.00, 'cash', 'completed', '2026-01-19 23:14:49', '2026-01-19 23:14:49'),
(28, 78, 40.50, 41.00, 'cash', 'completed', '2026-01-19 23:49:26', '2026-01-19 23:49:26'),
(29, 79, 123.75, 124.00, 'cash', 'completed', '2026-01-20 00:36:04', '2026-01-20 00:36:04'),
(30, 80, 43.43, 44.00, 'cash', 'completed', '2026-01-20 01:16:32', '2026-01-20 01:16:32'),
(31, 81, 15.40, 16.00, 'cash', 'completed', '2026-01-20 21:04:19', '2026-01-20 21:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `cost` decimal(8,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `alert_threshold` int(11) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `sku`, `slug`, `price`, `cost`, `image`, `description`, `status`, `created_at`, `updated_at`, `quantity`, `alert_threshold`) VALUES
(1, 1, 'Espressoyut', 'SKU-696352D538E18', 'espressoyut', 3.00, 1.10, '20260119071304.png', 'Strong and bold concentrated coffee.', 1, '2026-01-03 22:51:05', '2026-01-20 00:32:54', 85, 10),
(2, 1, 'Cappuccino', 'SKU-6963567245E2A', 'cappuccino', 4.50, 1.20, 'cappuccino.png', 'Espresso with steamed milk and foam.', 1, '2026-01-03 22:51:05', '2026-01-20 01:16:32', 52, 10),
(3, 1, 'Latte', 'SKU-696356A9273C7', 'latte', 4.50, 1.20, 'latte.png', 'Espresso with steamed milk.', 1, '2026-01-03 22:51:05', '2026-01-20 21:04:19', 2, 10),
(4, 2, 'Iced Americano', 'SKU-696356BD817EE', 'iced-americano', 3.50, 0.60, 'iced_americano.png', 'Espresso poured over ice and water.', 1, '2026-01-03 22:51:05', '2026-01-19 22:46:10', 41, 10),
(5, 2, 'Cold Brew', 'SKU-696356DC75359', 'cold-brew', 5.00, 1.50, 'cold_brew.png', 'Slow-steeped cold coffee.', 1, '2026-01-03 22:51:05', '2026-01-20 01:16:32', 41, 10),
(6, 3, 'Croissant', 'SKU-69647DE266925', 'croissant', 3.00, 1.00, '20260112045146.jpg', 'Buttery flaky pastry.', 1, '2026-01-03 22:51:05', '2026-01-20 01:16:32', 55, 10),
(7, 3, 'Jashim\'s special pastries', 'SKU-696356FBE478B', 'jashims-special-pastries', 6.66, 0.00, '20260120033239.png', 'dsfrer', 1, '2026-01-03 23:13:22', '2026-01-20 01:16:32', 33, 10),
(8, 1, 'Espresso', 'SKU-69647DE266542', 'espresso', 3.00, 0.50, 'espresso_shot.png', 'Strong and bold concentrated coffee.', 1, '2026-01-18 00:48:37', '2026-01-20 01:16:32', 138, 10),
(9, 3, 'Chocolate Muffin', 'SKU-696EF7D9B7F68', 'chocolate-muffin', 3.50, 1.20, '20260120033839.png', 'Rich chocolate muffin.', 1, '2026-01-18 00:48:37', '2026-01-19 22:51:55', 100, 10),
(10, 3, 'Blueberry Muffin', 'SKU-696EFBA00C3DA', 'blueberry-muffin', 3.50, 1.20, '20260120035056.jpg', 'Fresh blueberry muffin.', 1, '2026-01-18 00:48:37', '2026-01-20 21:04:19', 115, 10),
(11, 3, 'Cinnamon Roll', 'SKU-696EFB6CD46D3', 'cinnamon-roll', 4.00, 1.50, '20260120035402.png', 'Glazed cinnamon roll.', 1, '2026-01-18 00:48:37', '2026-01-20 21:04:18', 104, 10),
(12, 5, 'Bottled Water', 'SKU-696EFB4AB317E', 'bottled-water', 2.00, 0.50, '20260120034930.jpg', 'Still mineral water.', 1, '2026-01-18 00:48:38', '2026-01-20 21:04:19', 223, 10),
(13, 5, 'Sparkling Water', 'SKU-696EFB3116E70', 'sparkling-water', 2.50, 1.60, '20260120034905.jpg', 'Carbonated mineral water.', 1, '2026-01-18 00:48:38', '2026-01-20 00:27:58', 140, 10),
(14, 5, 'Orange Juice', 'SKU-696EFB105F0E0', 'orange-juice', 4.00, 1.50, '20260120034832.jpeg', 'Freshly squeezed orange juice.', 1, '2026-01-18 00:48:38', '2026-01-19 22:51:55', 118, 10);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `purchase_date` date NOT NULL,
  `status` enum('pending','received') NOT NULL DEFAULT 'received',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `supplier_id`, `reference_no`, `total_amount`, `purchase_date`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 'PUR-20260119061733', 823.30, '2026-01-19', 'received', 'Bulk restock for items below threshold', '2026-01-19 00:17:33', '2026-01-19 00:17:33'),
(2, 2, NULL, 13260.00, '2026-01-20', 'received', NULL, '2026-01-20 00:17:01', '2026-01-20 00:17:01'),
(3, 3, NULL, 284.00, '2026-01-20', 'received', NULL, '2026-01-20 00:27:58', '2026-01-20 00:27:58'),
(4, 2, 'r56t45e6ft675444', 109.00, '2026-01-20', 'received', NULL, '2026-01-20 00:32:54', '2026-01-20 00:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ingredient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `unit_cost` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_items`
--

INSERT INTO `purchase_items` (`id`, `purchase_id`, `product_id`, `ingredient_id`, `quantity`, `unit_cost`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 8, NULL, 140.00, 0.50, 70.00, '2026-01-19 00:17:33', '2026-01-19 00:17:33'),
(2, 1, 9, NULL, 103.00, 1.20, 123.60, '2026-01-19 00:17:33', '2026-01-19 00:17:33'),
(3, 1, 10, NULL, 119.00, 1.20, 142.80, '2026-01-19 00:17:33', '2026-01-19 00:17:33'),
(4, 1, 11, NULL, 108.00, 1.50, 162.00, '2026-01-19 00:17:33', '2026-01-19 00:17:33'),
(5, 1, 12, NULL, 147.00, 0.50, 73.50, '2026-01-19 00:17:33', '2026-01-19 00:17:33'),
(6, 1, 13, NULL, 102.00, 0.70, 71.40, '2026-01-19 00:17:33', '2026-01-19 00:17:33'),
(7, 1, 14, NULL, 120.00, 1.50, 180.00, '2026-01-19 00:17:33', '2026-01-19 00:17:33'),
(8, 2, NULL, 1, 5.00, 2000.00, 10000.00, '2026-01-20 00:17:01', '2026-01-20 00:17:01'),
(9, 2, NULL, 2, 10.00, 110.00, 1100.00, '2026-01-20 00:17:01', '2026-01-20 00:17:01'),
(10, 2, NULL, 3, 8.00, 130.00, 1040.00, '2026-01-20 00:17:01', '2026-01-20 00:17:01'),
(11, 2, NULL, 4, 7.00, 160.00, 1120.00, '2026-01-20 00:17:01', '2026-01-20 00:17:01'),
(12, 3, 13, NULL, 40.00, 1.60, 64.00, '2026-01-20 00:27:58', '2026-01-20 00:27:58'),
(13, 3, NULL, 2, 2.00, 110.00, 220.00, '2026-01-20 00:27:58', '2026-01-20 00:27:58'),
(14, 4, 1, NULL, 30.00, 1.10, 33.00, '2026-01-20 00:32:54', '2026-01-20 00:32:54'),
(15, 4, 2, NULL, 30.00, 1.20, 36.00, '2026-01-20 00:32:54', '2026-01-20 00:32:54'),
(16, 4, 12, NULL, 80.00, 0.50, 40.00, '2026-01-20 00:32:54', '2026-01-20 00:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_tables`
--

CREATE TABLE `restaurant_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL DEFAULT 4,
  `status` enum('available','occupied','reserved') NOT NULL DEFAULT 'available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_tables`
--

INSERT INTO `restaurant_tables` (`id`, `name`, `capacity`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Table 1', 2, 'available', '2026-01-17 23:03:42', '2026-01-17 23:03:42'),
(2, 'Table 2', 2, 'occupied', '2026-01-17 23:03:42', '2026-01-18 01:06:48'),
(3, 'Table 3', 4, 'occupied', '2026-01-17 23:03:43', '2026-01-18 00:27:25'),
(4, 'Table 4', 4, 'available', '2026-01-17 23:03:43', '2026-01-17 23:03:43'),
(5, 'Table 5', 6, 'available', '2026-01-17 23:03:43', '2026-01-17 23:03:43'),
(6, 'Window 1', 2, 'occupied', '2026-01-17 23:03:43', '2026-01-17 23:30:17'),
(7, 'Window 2', 2, 'occupied', '2026-01-17 23:03:43', '2026-01-19 00:34:31'),
(8, 'Patio 1', 4, 'available', '2026-01-17 23:03:43', '2026-01-17 23:03:43'),
(9, 'Patio 2', 4, 'occupied', '2026-01-17 23:03:43', '2026-01-17 23:27:51'),
(10, 'Table 1', 2, 'occupied', '2026-01-18 00:48:38', '2026-01-19 00:02:53'),
(11, 'Table 2', 2, 'available', '2026-01-18 00:48:38', '2026-01-18 00:48:38'),
(12, 'Table 3', 4, 'available', '2026-01-18 00:48:38', '2026-01-18 00:48:38'),
(13, 'Table 4', 4, 'occupied', '2026-01-18 00:48:38', '2026-01-19 22:51:55'),
(14, 'Table 5', 6, 'available', '2026-01-18 00:48:38', '2026-01-18 00:48:38'),
(15, 'Window 1', 2, 'available', '2026-01-18 00:48:38', '2026-01-18 00:48:38'),
(16, 'Window 2', 2, 'occupied', '2026-01-18 00:48:38', '2026-01-19 22:46:10'),
(17, 'Patio 3', 4, 'available', '2026-01-18 00:48:38', '2026-01-18 00:48:38'),
(18, 'Patio 4', 6, 'occupied', '2026-01-18 00:48:38', '2026-01-19 22:44:30'),
(19, 'Patio 5', 2, 'available', '2026-01-18 00:48:38', '2026-01-18 00:48:38'),
(20, 'Window 3', 2, 'occupied', '2026-01-18 00:48:38', '2026-01-19 23:14:49'),
(21, 'Window 4', 2, 'occupied', '2026-01-18 00:48:38', '2026-01-20 21:04:19'),
(22, 'Window 5', 4, 'available', '2026-01-18 00:48:38', '2026-01-18 00:48:38');

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
('tneleNsKYtrDnCxILrarXrRICk2ImdNryOfcFExX', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiakkzUUdXTzFIR0VkdnZ0Qldmb25sbEtLUlZkVDhRcXhUQUNYUWN3SyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6MTU6ImFkbWluLmRhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzY4ODc5NTE4O319', 1768893610),
('ZyZJ1ATu353zvcpofjD1U8flGpRfcmkC2WUEeuTJ', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUFduQmZQUE9rNE52SDN1alg5MDc2NDZkaWRNbU5tWjROQnNKVlpYOSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0cy9jcmVhdGUiO3M6NToicm91dGUiO3M6MTU6InByb2R1Y3RzLmNyZWF0ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzY4OTY0NTg2O319', 1768964695);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `group` varchar(255) NOT NULL DEFAULT 'general',
  `type` varchar(255) NOT NULL DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `created_at`, `updated_at`) VALUES
(1, 'business_name', 'Coffee Shop', 'business', 'text', '2026-01-17 23:25:36', '2026-01-17 23:25:36'),
(2, 'business_address', '123 Coffee Street, Dhaka, Bangladesh', 'business', 'text', '2026-01-17 23:25:36', '2026-01-20 00:40:09'),
(3, 'business_phone', '+123 456 7890', 'business', 'text', '2026-01-17 23:25:36', '2026-01-17 23:25:36'),
(4, 'business_email', 'info@coffeeshop.com', 'business', 'text', '2026-01-17 23:25:36', '2026-01-17 23:25:36'),
(5, 'tax_rate', '6', 'tax', 'number', '2026-01-17 23:25:36', '2026-01-18 23:57:20'),
(6, 'currency_symbol', '$', 'tax', 'text', '2026-01-17 23:25:36', '2026-01-17 23:25:36'),
(7, 'currency_position', 'before', 'tax', 'text', '2026-01-17 23:25:36', '2026-01-17 23:25:36'),
(8, 'receipt_header', 'Thank you for visiting!', 'receipt', 'text', '2026-01-17 23:25:36', '2026-01-17 23:25:36'),
(9, 'receipt_footer', 'Please come again!', 'receipt', 'text', '2026-01-17 23:25:36', '2026-01-17 23:25:36'),
(10, 'receipt_show_logo', '1', 'receipt', 'boolean', '2026-01-17 23:25:36', '2026-01-17 23:25:36'),
(11, 'low_stock_threshold', '10', 'system', 'number', '2026-01-17 23:25:36', '2026-01-17 23:25:36'),
(12, 'auto_print_receipt', '1', 'system', 'boolean', '2026-01-17 23:25:36', '2026-01-18 23:57:20'),
(13, 'business_logo', 'logos/hxcXEKwHtwOkugB7kD4mia6P1V9wjdsshmoDDWOd.png', 'business', 'text', '2026-01-18 23:59:08', '2026-01-18 23:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `contact_person`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Nayan Tara', 'Jashim Uddin', 'nayan76@gmail.com', '01875464663', 'Mahanagar Project, Hatir jheel, West Rampura, Dhaka-1200', '2026-01-03 23:49:00', '2026-01-03 23:49:30'),
(2, 'Jamal Sheikh', 'Karim Mridha', 'jamalsheikh57@gmail.com', '01856355856', 'Merul Badda, Dhaka-1200', '2026-01-03 23:52:18', '2026-01-03 23:52:18'),
(3, 'Abir Mahmud', 'Abir Mahmud', 'abirmahmud65@gmail.com', '01867532469', 'A, 115, 116 Bir Uttam Mir Shawkat Sarak, Dhaka 1208', '2026-01-19 22:12:27', '2026-01-19 22:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'staff',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', 'staff', '2026-01-02 22:35:17', '$2y$12$HaZ.ShkydSqNl5auqpQarO9Qlcp94p11.bZJNCpF/tP9fQjRgulvy', 'UX5RtL0AsQ', '2026-01-02 22:35:18', '2026-01-02 22:35:18'),
(2, 'Jashim', 'jashim@gmail.com', 'staff', NULL, '$2y$12$0YlB0RIlNSHDn1vu62XDnuVlccCxZzjyIqcfhiFFG2DlttyO2OoH2', NULL, '2026-01-02 22:36:00', '2026-01-02 22:36:00'),
(3, 'Tanvir', 'tnvirjubayer96@gmail.com', 'staff', NULL, '$2y$12$otmzBQP3k1w15ScDPcIg4u.ojLzzGE5VBDTlFIUJLJLYWsDQ4/FfW', NULL, '2026-01-02 22:39:30', '2026-01-02 22:39:30'),
(4, 'Dr. Marlee Hayes', 'kausarhabib94@gmail.com', 'staff', NULL, '$2y$12$hnIbk3LNWu/lUse8p5tMxOWNzKyEbtA6YqnNldnlKP/ntrXzslc2O', NULL, '2026-01-17 00:26:16', '2026-01-17 00:26:16'),
(5, 'Selim', 'selim@gmail.com', 'staff', NULL, '$2y$12$GdRJO5awtCrT0VTXv6b.MOC3aLcwbEk7t1LpiSZGXtd9HknRtEEMO', NULL, '2026-01-18 21:12:17', '2026-01-18 21:12:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addons_category_id_foreign` (`category_id`);

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `discounts_code_unique` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ingredients_slug_unique` (`slug`);

--
-- Indexes for table `inventory_transactions`
--
ALTER TABLE `inventory_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_transactions_product_id_foreign` (`product_id`),
  ADD KEY `inventory_transactions_ingredient_id_foreign` (`ingredient_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_table_id_foreign` (`table_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `order_item_addons`
--
ALTER TABLE `order_item_addons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_item_addons_order_item_id_foreign` (`order_item_id`),
  ADD KEY `order_item_addons_addon_id_foreign` (`addon_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_items_purchase_id_foreign` (`purchase_id`),
  ADD KEY `purchase_items_product_id_foreign` (`product_id`),
  ADD KEY `purchase_items_ingredient_id_foreign` (`ingredient_id`);

--
-- Indexes for table `restaurant_tables`
--
ALTER TABLE `restaurant_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
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
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventory_transactions`
--
ALTER TABLE `inventory_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `order_item_addons`
--
ALTER TABLE `order_item_addons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `restaurant_tables`
--
ALTER TABLE `restaurant_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addons`
--
ALTER TABLE `addons`
  ADD CONSTRAINT `addons_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `inventory_transactions`
--
ALTER TABLE `inventory_transactions`
  ADD CONSTRAINT `inventory_transactions_ingredient_id_foreign` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventory_transactions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_table_id_foreign` FOREIGN KEY (`table_id`) REFERENCES `restaurant_tables` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `order_item_addons`
--
ALTER TABLE `order_item_addons`
  ADD CONSTRAINT `order_item_addons_addon_id_foreign` FOREIGN KEY (`addon_id`) REFERENCES `addons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_item_addons_order_item_id_foreign` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD CONSTRAINT `purchase_items_ingredient_id_foreign` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_items_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
