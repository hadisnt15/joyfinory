-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table joyfinory.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table joyfinory.cache: ~2 rows (approximately)
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('laravel-cache-da4b9237bacccdf19c0760cab7aec4a8359010b0', 'i:1;', 1766112978),
	('laravel-cache-da4b9237bacccdf19c0760cab7aec4a8359010b0:timer', 'i:1766112978;', 1766112978);

-- Dumping structure for table joyfinory.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table joyfinory.cache_locks: ~0 rows (approximately)

-- Dumping structure for table joyfinory.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table joyfinory.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table joyfinory.finances
CREATE TABLE IF NOT EXISTS `finances` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `date` date NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `inventory_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `finances_user_id_foreign` (`user_id`),
  KEY `finances_category_id_foreign` (`category_id`),
  KEY `finances_inventory_id_foreign` (`inventory_id`),
  CONSTRAINT `finances_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `finance_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `finances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table joyfinory.finances: ~18 rows (approximately)
INSERT INTO `finances` (`id`, `user_id`, `date`, `type`, `category_id`, `desc`, `created_at`, `updated_at`, `amount`, `inventory_id`) VALUES
	(26, 2, '2025-12-16', 'in', 6, 'fdsherhe', '2025-12-15 19:11:08', '2025-12-29 22:10:50', 500000.00, 0),
	(27, 2, '2025-12-19', 'out', 9, 'BELI MIE LIDI 200PCS @1000', '2025-12-18 21:44:36', '2025-12-18 21:44:36', 200000.00, 2),
	(28, 2, '2025-12-19', 'out', 9, 'ffd', '2025-12-18 21:47:45', '2025-12-18 21:47:45', 1000000.00, 3),
	(29, 2, '2025-12-19', 'out', 9, 'dfdf', '2025-12-18 21:53:18', '2025-12-18 21:53:18', 1000000.00, 4),
	(30, 2, '2025-12-19', 'out', 9, 'ddd', '2025-12-18 22:14:53', '2025-12-18 22:14:53', 100000.00, 5),
	(31, 2, '2025-12-19', 'out', 9, 'dsd', '2025-12-18 22:17:34', '2025-12-18 22:17:34', 200000.00, 6),
	(34, 2, '2025-12-19', 'in', 3, '55', '2025-12-18 22:26:08', '2025-12-18 22:26:08', 500000.00, 0),
	(35, 2, '2025-12-19', 'out', 7, '32', '2025-12-18 22:26:33', '2025-12-18 22:26:33', 30000.00, 0),
	(36, 2, '2025-12-19', 'out', 9, 'eee', '2025-12-18 22:29:14', '2025-12-18 22:29:14', 500000.00, 7),
	(37, 2, '2025-12-19', 'out', 9, 'teett ksdjlksdj', '2025-12-19 00:43:12', '2025-12-29 22:11:32', 500000.00, 0),
	(38, 2, '2025-12-30', 'out', 7, 'skinker', '2025-12-29 22:12:21', '2025-12-29 22:12:21', 1000000.00, 0),
	(39, 2, '2025-12-30', 'in', 4, 'cami', '2025-12-29 22:12:44', '2025-12-29 22:12:44', 20000000.00, 0),
	(40, 2, '2025-12-30', 'in', 4, 'jajan camiko', '2025-12-29 22:15:47', '2025-12-29 22:15:47', 2000000.00, 0),
	(41, 2, '2025-12-30', 'out', 10, 'Jajan', '2025-12-29 22:17:02', '2025-12-29 22:17:02', 500000.00, 0),
	(42, 2, '2025-12-30', 'out', 9, 'hehe', '2025-12-29 22:51:35', '2025-12-29 22:51:35', 400000.00, 10),
	(43, 2, '2025-12-30', 'out', 9, '20251230 Penjualan untuk kelas 4 les sekolah', '2025-12-29 22:53:50', '2025-12-29 22:53:50', 100000.00, 11),
	(44, 2, '2025-12-30', 'in', 9, 'tes jual', '2025-12-29 23:00:33', '2025-12-29 23:00:33', 1000000.00, 13),
	(45, 2, '2025-12-30', 'out', 9, 'tesbeli', '2025-12-29 23:01:24', '2025-12-29 23:01:24', 500000.00, 14);

-- Dumping structure for table joyfinory.finance_categories
CREATE TABLE IF NOT EXISTS `finance_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'in',
  `category_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table joyfinory.finance_categories: ~10 rows (approximately)
INSERT INTO `finance_categories` (`id`, `category_name`, `category_type`, `category_description`, `created_at`, `updated_at`, `active`) VALUES
	(1, 'Les Kelas', 'in', 'Les Kelas sd updatee', '2025-11-30 21:36:51', '2025-11-30 22:36:23', 1),
	(2, 'Les Privat', 'in', 'Les Privat', '2025-11-30 21:37:00', '2025-11-30 21:37:00', 1),
	(3, 'Gaji Bulanan', 'in', 'Gaji Bulanan hehe', '2025-11-30 21:37:11', '2025-12-09 00:47:52', 1),
	(4, 'Jajan Cami', 'in', 'Jajan Cami', '2025-11-30 21:37:24', '2025-12-09 00:50:16', 1),
	(5, 'Les Kelas2', 'in', 'sdlksd', '2025-11-30 21:50:04', '2025-11-30 21:50:04', 1),
	(6, 'Penjualan', 'in', 'testtt', '2025-11-30 21:50:19', '2025-11-30 21:50:19', 1),
	(7, 'Jajan skinker', 'out', 'jajan skinker', '2025-12-08 18:37:54', '2025-12-08 18:37:54', 1),
	(8, 'Project', 'in', 'Pemasukan dari project', '2025-12-09 00:44:45', '2025-12-09 00:44:45', 1),
	(9, 'Pembelian', 'out', 'sdfsd', '2025-12-12 20:10:36', '2025-12-12 20:10:36', 1),
	(10, 'hlaohald', 'out', 'dsfds', '2025-12-12 20:10:48', '2025-12-12 20:10:48', 1);

-- Dumping structure for table joyfinory.galleries
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table joyfinory.galleries: ~18 rows (approximately)
INSERT INTO `galleries` (`id`, `photo`, `date`, `title`, `caption`, `created_at`, `updated_at`) VALUES
	(1, 'out_moments/LSKBgzvsar7j5jwoijeT2Nf2bvSWyxXntXAdhCVR.png', '2025-12-18', 'Test', 'Test', '2025-12-17 21:36:59', '2025-12-17 22:41:20'),
	(2, 'out_moments/uK5J4NW2xLFV0CdHF0dKsI30r8ST1xd2DEUOfNdG.png', '2025-12-19', 'test2', 'test2', '2025-12-18 18:13:39', '2025-12-18 18:13:39'),
	(3, 'out_moments/wTFhoPffRo7M7159VitsEm9TPBN1UaDuvP1kxyWw.png', '2025-12-19', 'test3', 'testt', '2025-12-18 18:14:18', '2025-12-18 18:14:18'),
	(4, 'out_moments/rnSrgmdBI0DPN95qkmeUa21EbIaVRZxK27dOLIoX.png', '2025-12-19', 'test4', 'test4', '2025-12-18 18:14:44', '2025-12-18 18:14:44'),
	(5, 'out_moments/1cpWkisT4lZfEgRcJjKjXxCBWe4nXkgwqqOZYYcw.png', '2025-12-19', 'test5', 'test5', '2025-12-18 18:15:05', '2025-12-18 18:15:05'),
	(6, 'out_moments/SK0VpPVUnu3xR4ppF90P9mX1HZfME0zQQv9Hocaf.png', '2025-12-19', 'test6', 'test6', '2025-12-18 18:15:30', '2025-12-18 18:15:30'),
	(7, 'out_moments/X9otmBvbr3QjOgv43wOtJQ1aa2EAkPpBs8wKOiF2.png', '2025-12-19', 'test7', 'test7', '2025-12-18 18:16:07', '2025-12-18 18:16:07'),
	(8, 'out_moments/wDTz6FV8pdAvKqHJh4QIpKdwTxASeiT2V4VfunAE.png', '2025-12-19', 'test8', 'test8', '2025-12-18 18:16:27', '2025-12-18 18:16:27'),
	(9, 'out_moments/yXvKYXOTv7y6VAAZAbccdnDvjjOrFzHJaX3OZJ6h.png', '2025-12-19', 'test9', 'test9', '2025-12-18 18:16:50', '2025-12-18 18:16:50'),
	(10, 'out_moments/4IdUxGHOtENiI9WLwsTnc6XsGLkeBdXHq1ZUtkdm.png', '2025-12-19', 'test10', 'test10', '2025-12-18 18:17:10', '2025-12-18 18:17:10'),
	(11, 'out_moments/7bPAT0Yebvic45s5kSHZutCO27zdthDnt3gzGSp9.png', '2025-12-19', 'test11', 'test11', '2025-12-18 18:38:55', '2025-12-18 18:38:55'),
	(12, 'out_moments/zEBlVkEtJmxgoBYl9VtuJRYwsHFkW571tQFSE3NN.png', '2025-12-19', 'test12', 'test12', '2025-12-18 18:39:27', '2025-12-18 18:39:27'),
	(13, 'out_moments/jXwovEYMzRtrBUKFq5P6pHxRZ61fgjKDISwmpOZ1.png', '2025-12-19', 'test13', 'test13', '2025-12-18 18:39:57', '2025-12-18 18:39:57'),
	(14, 'out_moments/HNJMNbTIwgX4hV3wy27HfaYfrSiyd9AEJKiY98S0.png', '2025-12-19', 'test14', 'test14', '2025-12-18 18:43:10', '2025-12-18 18:43:10'),
	(15, 'out_moments/VWTu6yn9INVwKwD3LBSn9Nd8EXb2yq3AJO17F19j.png', '2025-12-19', 'test15', 'test15', '2025-12-18 18:43:25', '2025-12-18 18:43:25'),
	(16, 'out_moments/fgaoDaVgaCY6sTyrpBiWXvqstaUCl6tXx79eQaT9.png', '2025-12-19', 'test16', 'test16', '2025-12-18 18:54:01', '2025-12-18 18:54:01'),
	(17, 'out_moments/0EfdKNm6DplMZ9CUmfYsFvFyzfZ1NWDkCXjbskNL.png', '2025-12-19', 'test17', 'test17', '2025-12-18 18:54:16', '2025-12-18 18:54:16'),
	(18, 'out_moments/L9hqUENxGvCjPTIaueTmYZDanC6qFwBYc7x8gq6E.png', '2025-12-19', 'test18', 'test18', '2025-12-18 18:54:41', '2025-12-18 18:54:41'),
	(19, 'out_moments/q3LztUlVFSA2TYm0ifSisq5SQACSeB7TdpTCSMC4.png', '2025-12-19', 'test19', 'test19', '2025-12-18 18:54:57', '2025-12-18 18:54:57'),
	(20, 'out_moments/UidxUWkxcptUrTiiRd03xsH9VOwvWix5itbw5PIf.png', '2025-12-19', 'test20', 'test20', '2025-12-18 18:55:19', '2025-12-18 18:55:19');

-- Dumping structure for table joyfinory.inventories
CREATE TABLE IF NOT EXISTS `inventories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `date` date NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_source_id` bigint unsigned NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` decimal(15,2) NOT NULL DEFAULT '0.00',
  `unit_price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `inventories_user_id_foreign` (`user_id`),
  KEY `inventories_item_source_id_foreign` (`item_source_id`),
  KEY `inventories_item_id_foreign` (`item_id`),
  CONSTRAINT `inventories_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  CONSTRAINT `inventories_item_source_id_foreign` FOREIGN KEY (`item_source_id`) REFERENCES `item_sources` (`id`) ON DELETE CASCADE,
  CONSTRAINT `inventories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table joyfinory.inventories: ~13 rows (approximately)
INSERT INTO `inventories` (`id`, `user_id`, `date`, `type`, `item_source_id`, `desc`, `quantity`, `unit_price`, `created_at`, `updated_at`, `item_id`) VALUES
	(1, 2, '2025-12-16', 'jual', 4, 'fds', 100.00, 5000.00, '2025-12-15 19:11:08', '2025-12-15 19:11:08', 1),
	(2, 2, '2025-12-19', 'beli', 2, 'BELI MIE LIDI 200PCS @1000', 200.00, 1000.00, '2025-12-18 21:44:36', '2025-12-18 21:44:36', 1),
	(3, 2, '2025-12-19', 'beli', 3, 'ffd', 1000.00, 1000.00, '2025-12-18 21:47:45', '2025-12-18 21:47:45', 1),
	(4, 2, '2025-12-19', 'beli', 2, 'dfdf', 1000.00, 1000.00, '2025-12-18 21:53:18', '2025-12-18 21:53:18', 1),
	(5, 2, '2025-12-19', 'beli', 1, 'ddd', 100.00, 1000.00, '2025-12-18 22:14:53', '2025-12-18 22:14:53', 1),
	(6, 2, '2025-12-19', 'beli', 1, 'dsd', 200.00, 1000.00, '2025-12-18 22:17:34', '2025-12-18 22:17:34', 1),
	(7, 2, '2025-12-19', 'beli', 3, 'eee', 1000.00, 500.00, '2025-12-18 22:29:14', '2025-12-18 22:29:14', 1),
	(8, 2, '2025-12-19', 'beli', 1, 'weqwe', 10.00, 1000.00, '2025-12-18 22:30:33', '2025-12-18 22:30:33', 1),
	(9, 2, '2025-12-19', 'beli', 1, 'teett', 100.00, 5000.00, '2025-12-19 00:43:12', '2025-12-19 00:43:12', 2),
	(10, 2, '2025-12-30', 'jual', 6, 'hehe', 200.00, 2000.00, '2025-12-29 22:51:35', '2025-12-29 22:51:35', 2),
	(11, 2, '2025-12-30', 'jual', 4, '20251230 Penjualan untuk kelas 4 les sekolah', 100.00, 1000.00, '2025-12-29 22:53:50', '2025-12-29 22:53:50', 5),
	(13, 2, '2025-12-30', 'jual', 4, 'tes jual', 1000.00, 1000.00, '2025-12-29 23:00:33', '2025-12-29 23:00:33', 2),
	(14, 2, '2025-12-30', 'beli', 3, 'tesbeli', 1000.00, 500.00, '2025-12-29 23:01:24', '2025-12-29 23:01:24', 1);

-- Dumping structure for table joyfinory.items
CREATE TABLE IF NOT EXISTS `items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_uom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_category_id` bigint unsigned NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `items_item_category_id_foreign` (`item_category_id`),
  CONSTRAINT `items_item_category_id_foreign` FOREIGN KEY (`item_category_id`) REFERENCES `item_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table joyfinory.items: ~5 rows (approximately)
INSERT INTO `items` (`id`, `item_name`, `item_description`, `item_uom`, `item_category_id`, `active`, `created_at`, `updated_at`) VALUES
	(1, 'Mie Lidi', 'Mie lidi gege', 'Pcs', 1, 1, '2025-12-12 22:48:51', '2025-12-17 20:37:10'),
	(2, 'Pisang Roll ', 'Pisang Roll', 'Pcs', 2, 1, '2025-12-19 00:38:49', '2025-12-19 00:38:49'),
	(3, 'testes', 'testse', 'Pcs', 1, 1, '2025-12-19 00:39:26', '2025-12-19 00:39:26'),
	(4, 'dlkslksdflk', 'dfdfs', 'Pcs', 2, 1, '2025-12-19 00:40:17', '2025-12-28 19:05:32'),
	(5, 'heheh', 'jejejej', 'Pcs', 1, 1, '2025-12-19 00:42:40', '2025-12-19 00:42:40');

-- Dumping structure for table joyfinory.item_categories
CREATE TABLE IF NOT EXISTS `item_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `item_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_category_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table joyfinory.item_categories: ~14 rows (approximately)
INSERT INTO `item_categories` (`id`, `item_category_name`, `item_category_description`, `active`, `created_at`, `updated_at`) VALUES
	(1, 'Snack Gurih', 'Jajanan Snack Gurih ddsgd', 1, '2025-12-12 22:19:20', '2025-12-28 22:31:07'),
	(2, 'Snack Manis', 'Jajanan Snack Manis', 1, '2025-12-12 22:27:17', '2025-12-12 22:27:17'),
	(3, 'Snack Nonactive', 'test snack nonactive', 0, '2025-12-28 22:33:33', '2025-12-28 22:33:49'),
	(4, 'Snack Pedas', 'Snack Pedas', 1, '2025-12-29 22:35:33', '2025-12-29 22:35:53'),
	(5, 'Minuman Jus', 'Minuman Jus', 1, '2025-12-29 22:37:11', '2025-12-29 22:37:11'),
	(6, 'Air Mineral', 'Air Mineral', 1, '2025-12-29 22:37:20', '2025-12-29 22:37:20'),
	(7, 'Es Krim', 'eskrim', 1, '2025-12-29 22:38:27', '2025-12-29 22:38:27'),
	(8, 'Makanan Berat manis', 'makanan berat manis', 1, '2025-12-29 22:38:50', '2025-12-29 22:38:50'),
	(9, 'Makanan Berat Gurih', 'makanan berat gurih', 1, '2025-12-29 22:39:00', '2025-12-29 22:39:00'),
	(10, 'Makanan berat pedas', 'makanan berat pedass', 1, '2025-12-29 22:39:11', '2025-12-29 22:39:11'),
	(11, 'Bakarbakaran', 'bakarbakaran', 1, '2025-12-29 22:39:44', '2025-12-29 22:39:44'),
	(12, 'Gorenggorengan', 'gorengan', 1, '2025-12-29 22:39:59', '2025-12-29 22:39:59'),
	(13, 'Kukusan', 'kukusan', 1, '2025-12-29 22:40:04', '2025-12-29 22:40:04'),
	(14, 'Coklat', 'coklat', 1, '2025-12-29 22:40:31', '2025-12-29 22:40:31');

-- Dumping structure for table joyfinory.item_sources
CREATE TABLE IF NOT EXISTS `item_sources` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `item_source_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_source_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_source_type` enum('penyuplai','pelanggan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_source_platform` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table joyfinory.item_sources: ~14 rows (approximately)
INSERT INTO `item_sources` (`id`, `item_source_name`, `item_source_description`, `item_source_type`, `item_source_platform`, `active`, `created_at`, `updated_at`) VALUES
	(1, 'Toko A', 'Toko A Shopee eee', 'penyuplai', 'shopee', 1, '2025-12-14 20:37:04', '2025-12-29 22:23:50'),
	(2, 'TOKO B', 'TOKO B', 'penyuplai', 'shopee', 0, '2025-12-14 21:51:57', '2025-12-14 22:49:01'),
	(3, 'TKOIOK C', 'TOKO Cgee', 'penyuplai', 'tiktok', 1, '2025-12-14 21:52:16', '2025-12-17 20:31:47'),
	(4, 'Kelas 4', 'kelas 4 les sekolah hehe', 'pelanggan', 'les_sekolah', 1, '2025-12-14 21:53:14', '2025-12-29 22:22:17'),
	(5, 'Kelas 5A', 'KELAS 5 A SEKOLAH', 'pelanggan', 'sekolah', 1, '2025-12-29 22:42:09', '2025-12-29 22:42:09'),
	(6, 'Kelas 5B', 'Kelas 5b', 'pelanggan', 'sekolah', 1, '2025-12-29 22:42:23', '2025-12-29 22:42:23'),
	(7, 'Kelas 5A LES', 'KELAS 5A LES', 'pelanggan', 'les_sekolah', 1, '2025-12-29 22:42:46', '2025-12-29 22:42:46'),
	(8, 'KELAS 5B LES', 'KELAS 5B LES', 'pelanggan', 'les_sekolah', 1, '2025-12-29 22:43:01', '2025-12-29 22:43:01'),
	(9, 'TOKO C SHOPEE', 'TOKO C', 'penyuplai', 'shopee', 1, '2025-12-29 22:43:13', '2025-12-29 22:43:13'),
	(10, 'KELAS 6A', 'KELAS 6A', 'pelanggan', 'sekolah', 1, '2025-12-29 22:44:22', '2025-12-29 22:44:22'),
	(11, 'KELAS 6B', 'KELAS 6B', 'pelanggan', 'sekolah', 1, '2025-12-29 22:44:31', '2025-12-29 22:44:31'),
	(12, 'KELAS 6A LES', 'KEALS 6A LES', 'pelanggan', 'les_sekolah', 1, '2025-12-29 22:44:42', '2025-12-29 22:44:42'),
	(13, 'KELAS 6B LES', 'LES 6B', 'pelanggan', 'les_sekolah', 1, '2025-12-29 22:44:55', '2025-12-29 22:44:55'),
	(14, 'KELAS 4A', 'KELAS 4A', 'pelanggan', 'sekolah', 1, '2025-12-29 22:45:14', '2025-12-29 22:45:14');

-- Dumping structure for table joyfinory.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table joyfinory.jobs: ~0 rows (approximately)

-- Dumping structure for table joyfinory.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table joyfinory.job_batches: ~0 rows (approximately)

-- Dumping structure for table joyfinory.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table joyfinory.migrations: ~25 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_11_30_073647_create_journals_table', 1),
	(5, '2025_11_30_074204_create_categories_table', 1),
	(6, '2025_12_01_061818_add_active_to_categories_table', 2),
	(7, '2025_12_02_032538_create_journals_table', 3),
	(8, '2025_12_08_052030_create_finances_table', 4),
	(9, '2025_12_09_025610_add_amount_to_finances_table', 5),
	(10, '2025_12_09_025820_drop_in_out_from_finances_table', 6),
	(11, '2025_12_11_035831_add_username_to_users_table', 7),
	(16, '2025_12_13_032656_create_item_categories_table', 8),
	(17, '2025_12_13_032753_create_items_table', 8),
	(18, '2025_12_13_033546_create_inventory_categories_table', 8),
	(19, '2025_12_13_033724_create_inventories_table', 8),
	(20, '2025_12_13_035900_rename_category_to_finance_category', 9),
	(21, '2025_12_15_040816_create_item_sources_table', 10),
	(22, '2025_12_15_041219_create_item_sources_table', 11),
	(23, '2025_12_15_041226_create_inventories_table', 11),
	(24, '2025_12_15_042731_add_item_source_platform_to_item_sources', 12),
	(25, '2025_12_15_043410_add_item_source_platform_to_item_sources', 13),
	(26, '2025_12_15_054807_add_item_source_type_to_item_sources', 14),
	(27, '2025_12_15_081337_add_invetory_id_to_finances.php', 15),
	(28, '2025_12_15_081337_add_invetory_id_to_finances', 16),
	(29, '2025_12_16_024909_add_item_id_to_inventories_table', 16),
	(30, '2025_12_18_042239_create_galleries_table', 17),
	(31, '2025_12_19_062507_modify_inventory_id_nullable_on_finances_table', 18),
	(32, '2025_12_30_053513_add_category_type_to_finance_categories_table', 19);

-- Dumping structure for table joyfinory.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table joyfinory.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table joyfinory.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table joyfinory.sessions: ~2 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('itsrGJZ6ZVsibbTgndkLKA3kplUMBUfRqyyBzHdq', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSUpyakpBb3NHVmQ3SkVLRzJFUjBXMmJHZm1qT2dPejNRbUJMTjZDSyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9qb3lmaW5hbmNlLnRlc3Qva2V1YW5nYW4va2F0ZWdvcmkiO3M6NToicm91dGUiO3M6MTY6ImZpbmFuY2UuY2F0ZWdvcnkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1767581855),
	('JIbpM0selmBiL9BuNW7mjFEsKieHpOYtBcDBd8mC', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTWFyVENXNTZUWXlmY2dkM1BvVFJlZ2RZTmVTWEllWVFpYTd5cFBTVCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozOToiaHR0cDovL2pveWZpbm9yeS50ZXN0L2tldWFuZ2FuL2thdGVnb3JpIjt9czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9qb3lmaW5vcnkudGVzdCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1767582080);

-- Dumping structure for table joyfinory.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table joyfinory.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Dini Nadia', 'dininadia', 'dini@gmail.com', '2025-12-07 22:08:45', '$2y$12$OI6ystAumhBLzRuzz1eAsuGVWF.TOoPysyD89B9c9jVYbW1He3yD6', 'idRzYCfZeZ', '2025-12-07 22:08:45', '2025-12-07 22:08:45'),
	(2, 'Hadi Santoso', 'hadisantoso', 'hadi@gmail.com', '2025-12-07 22:08:46', '$2y$12$.KqdyBf6Kj1mEDbyy/nUu.VeZrHz5k5d84tE7PvoYo.IJov2GC/vi', 'zwhL2nnKHJVW8Lrxfy2SaTNbsCx4o7U0vRHdxstEAuXlh2OPlu2raxBYg1vM', '2025-12-07 22:08:46', '2025-12-07 22:08:46');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
