-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table dbpharmacy.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbpharmacy.cache: ~0 rows (approximately)

-- Dumping structure for table dbpharmacy.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbpharmacy.cache_locks: ~0 rows (approximately)

-- Dumping structure for table dbpharmacy.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbpharmacy.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table dbpharmacy.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbpharmacy.jobs: ~0 rows (approximately)

-- Dumping structure for table dbpharmacy.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbpharmacy.job_batches: ~0 rows (approximately)

-- Dumping structure for table dbpharmacy.medicines
CREATE TABLE IF NOT EXISTS `medicines` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Unique ID of medicine',
  `supplier_id` int(10) NOT NULL COMMENT 'Unique ID of supplier',
  `type_id` int(10) NOT NULL COMMENT 'Unique ID of medicine type',
  `name` varchar(100) NOT NULL COMMENT 'Name of medicine',
  `description` text DEFAULT NULL COMMENT 'Description of medicine',
  `cover_image` text DEFAULT NULL,
  `stock` int(6) NOT NULL COMMENT 'Medicine stocks',
  `price` double NOT NULL COMMENT 'Medicine price',
  `created_at` timestamp NULL DEFAULT current_timestamp() COMMENT 'Time when data is created',
  `created_by` int(10) DEFAULT NULL COMMENT 'Who created the data',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Time when data being updated',
  `updated_by` int(10) DEFAULT NULL COMMENT 'Who update the data',
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`),
  KEY `supplier_id` (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dbpharmacy.medicines: ~4 rows (approximately)
INSERT INTO `medicines` (`id`, `supplier_id`, `type_id`, `name`, `description`, `cover_image`, `stock`, `price`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 1, 1, 'Counter Pain', 'Pain reliever cream to relieve muscle pain, joint pain, sprains and pain due to gout. Relieves muscle pain, joint pain, sprains and pain due to gout. Use 1-3 times a day.', 'https://d2qjkwm11akmwu.cloudfront.net/products/2020-1665761233.webp', 50, 20000, '2024-06-05 14:47:11', 0, NULL, NULL),
	(2, 1, 3, 'OBH Combi', 'Cough medicine containing OBH, Paracetamol, Ephedrine HCl, and Chlorphenamine Maleate which is used to relieve coughs accompanied by flu symptoms such as fever, headache, blocked nose, and sneezing.', 'https://d2qjkwm11akmwu.cloudfront.net/products/247171_19-1-2023_10-49-30.webp', 20, 40000, '2024-06-05 14:48:04', NULL, NULL, NULL),
	(5, 1, 5, 'Cardio Aspirin', 'Drugs used to thin the blood to prevent blockages in the blood vessels in people with heart disease, infarction and stroke.', 'https://images.tokopedia.net/img/cache/700/OJWluG/2022/9/20/c187f032-ad12-4a9c-8c82-140bc43ba629.jpg', 12, 32000, '2024-06-05 11:00:13', NULL, '2024-06-05 11:00:13', NULL),
	(9, 1, 3, 'Nelco', 'Medicine to treat flu symptoms such as runny nose, stuffy nose, sneezing accompanied by coughing.', 'https://d2qjkwm11akmwu.cloudfront.net/products/668244_18-12-2019_10-46-21-1665809352.webp', 21, 26500, '2024-06-05 18:45:55', NULL, '2024-06-05 18:45:55', NULL);

-- Dumping structure for table dbpharmacy.medicine_type
CREATE TABLE IF NOT EXISTS `medicine_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique ID of medicine type',
  `name` varchar(100) DEFAULT NULL COMMENT 'Type of medicine',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dbpharmacy.medicine_type: ~9 rows (approximately)
INSERT INTO `medicine_type` (`id`, `name`) VALUES
	(1, 'Analgesics'),
	(2, 'Antibiotics'),
	(3, 'Cough syrup'),
	(4, 'Vitamins & minerals'),
	(5, 'Non steroidal Anti-inflammatory Drugs'),
	(6, 'Anti-allergies'),
	(7, 'Anti-diarrheal'),
	(8, 'Oral Rehydration salt'),
	(9, 'Antiseptics');

-- Dumping structure for table dbpharmacy.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbpharmacy.migrations: ~9 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2024_06_05_143951_create_personal_access_tokens_table', 2),
	(5, '2024_06_06_011549_create_oauth_auth_codes_table', 3),
	(6, '2024_06_06_011550_create_oauth_access_tokens_table', 3),
	(7, '2024_06_06_011551_create_oauth_refresh_tokens_table', 3),
	(8, '2024_06_06_011552_create_oauth_clients_table', 3),
	(9, '2024_06_06_011553_create_oauth_personal_access_clients_table', 3);

-- Dumping structure for table dbpharmacy.oauth_access_tokens
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbpharmacy.oauth_access_tokens: ~13 rows (approximately)
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
	('05d937fe4be95293695a1e9d088463522126a805e2c4231d9a5645a80c72305d63c6ddfde1f8d33b', 1, '9c37d7a2-f89d-4c5e-8d97-c7a0a61160e7', 'All Yours', '[]', 0, '2024-06-05 19:09:02', '2024-06-05 19:09:03', '2024-12-06 02:09:02'),
	('09189259399053f62744324032489337a8e686cf9e68f5a1592bd128b68274c122d3a176e76951fb', 1, '9c37d7a2-f89d-4c5e-8d97-c7a0a61160e7', 'All Yours', '[]', 1, '2024-06-05 19:16:45', '2024-06-05 19:17:02', '2024-12-06 02:16:45'),
	('1bd927c3bd2689e0fb0eaa2edf9d58d35a1b8e541dbd0c093405bab08c33b362d0f0b6b0fc65b281', 1, '9c37d7a2-f89d-4c5e-8d97-c7a0a61160e7', 'All Yours', '[]', 0, '2024-06-14 22:56:16', '2024-06-14 22:56:16', '2024-12-15 05:56:16'),
	('1df057be4152e2a4ff649adb14444055cc6b906ee36e307dca8f27a647dacbad24c3dd528a026373', 1, '9c37d7a2-f89d-4c5e-8d97-c7a0a61160e7', 'All Yours', '[]', 1, '2024-06-14 22:41:31', '2024-06-14 22:55:44', '2024-12-15 05:41:31'),
	('2bc43d3e8f8d9898aca0a6709ed2e6a21efb6923ad50a4716b49d2e39f7cbf5ce10024941e1a6c55', 1, '9c37d7a2-f89d-4c5e-8d97-c7a0a61160e7', 'All Yours', '[]', 1, '2024-06-06 23:28:45', '2024-06-06 23:29:11', '2024-12-07 06:28:45'),
	('2e2bed1de93d43e31ba154f6882e921b53f3fabd07b919db356ece82deeeae9d816943d525d30b23', 1, '9c37d7a2-f89d-4c5e-8d97-c7a0a61160e7', 'All Yours', '[]', 0, '2024-06-05 19:09:25', '2024-06-05 19:09:25', '2024-12-06 02:09:25'),
	('719ff316364e8823f3601b5fa3c498898ae9dcea4cc8cda050c096d265f9936a636f38bcbb0f5d8d', 1, '9c37d7a2-f89d-4c5e-8d97-c7a0a61160e7', 'All Yours', '[]', 1, '2024-06-14 22:22:28', '2024-06-14 22:35:53', '2024-12-15 05:22:28'),
	('7e3e9de30a267e3f4d872b50531e9460969c385ed42e9112bb72cb7c521a53b1e8014efd9cdd8e4d', 1, '9c37d7a2-f89d-4c5e-8d97-c7a0a61160e7', 'All Yours', '[]', 1, '2024-06-06 23:25:04', '2024-06-06 23:51:28', '2024-12-07 06:25:04'),
	('a299a333da87a358362feff43cda22cc0f7c29d6deea5da664ea289a400ee81e1e7907b6236e46db', 2, '9c37d7a2-f89d-4c5e-8d97-c7a0a61160e7', 'All Yours', '[]', 1, '2024-06-06 23:56:12', '2024-06-06 23:56:15', '2024-12-07 06:56:12'),
	('ac12b5a3888dca82c98b729fdd26a6f4be1c8804edee8fda54f3d0719a791c5f6e1ccc2a07064db2', 1, '9c37d7a2-f89d-4c5e-8d97-c7a0a61160e7', 'All Yours', '[]', 1, '2024-06-14 22:36:32', '2024-06-14 22:38:05', '2024-12-15 05:36:32'),
	('cfef3603948d7c2838dbbe074dc2fffbf9378af63165d8d7c3184a8c8d6a3dde0fb3551fb47a8894', 1, '9c37d7a2-f89d-4c5e-8d97-c7a0a61160e7', 'All Yours', '[]', 1, '2024-06-06 23:36:14', '2024-06-06 23:36:38', '2024-12-07 06:36:14'),
	('d622fd47716a3642a54cccf914fea26ca6ca00828a65fa9212cc7a887d55c4214a27fb7756b5b4fa', 2, '9c37d7a2-f89d-4c5e-8d97-c7a0a61160e7', 'All Yours', '[]', 0, '2024-06-06 23:55:14', '2024-06-06 23:55:14', '2024-12-07 06:55:14'),
	('eb2f7db263dc303525cfdb4eea6097aca7f947c1779a8b40a22fe342413c7ecb692f470f2d954a91', 1, '9c37d7a2-f89d-4c5e-8d97-c7a0a61160e7', 'All Yours', '[]', 0, '2024-06-06 23:33:03', '2024-06-06 23:33:03', '2024-12-07 06:33:03');

-- Dumping structure for table dbpharmacy.oauth_auth_codes
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbpharmacy.oauth_auth_codes: ~0 rows (approximately)

-- Dumping structure for table dbpharmacy.oauth_clients
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbpharmacy.oauth_clients: ~2 rows (approximately)
INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
	('9c37d7a2-f89d-4c5e-8d97-c7a0a61160e7', NULL, 'Laravel Personal Access Client', 'rw0LRG9HRrRMjWkMHHXDiYyrexQEz8ZfjEfuixFE', NULL, 'http://localhost', 1, 0, 0, '2024-06-05 18:15:49', '2024-06-05 18:15:49'),
	('9c37d7a2-fc27-4b74-91c7-42e439f06229', NULL, 'Laravel Password Grant Client', 'UcYwt9yAPoAzHvujLkMJ8awJuROAM4PrDpuKev9c', 'users', 'http://localhost', 0, 1, 0, '2024-06-05 18:15:49', '2024-06-05 18:15:49');

-- Dumping structure for table dbpharmacy.oauth_personal_access_clients
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbpharmacy.oauth_personal_access_clients: ~0 rows (approximately)
INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
	(1, '9c37d7a2-f89d-4c5e-8d97-c7a0a61160e7', '2024-06-05 18:15:49', '2024-06-05 18:15:49');

-- Dumping structure for table dbpharmacy.oauth_refresh_tokens
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbpharmacy.oauth_refresh_tokens: ~0 rows (approximately)

-- Dumping structure for table dbpharmacy.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbpharmacy.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table dbpharmacy.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbpharmacy.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table dbpharmacy.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbpharmacy.sessions: ~4 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('Esm1PSURgnPaDetQfe7VK2Vezy3DLBfxezfdbyJs', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMGpySXNWTERCY2Rya2RiRDFZWVFvdk9XWE1RbWlQSmZ2d1U3NHhoViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZWRpY2luZS81Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1718431108),
	('IHpHRI2sAw0EOWzvTybjJISn7lGKdVC3PbBAYkYL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVkcxSkIxdTRRS2RLNVQ5S2hpU0JmVzhIQUY1cm03cThCSFZiR2x0SCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZWRpY2luZS85Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1717785126),
	('ynLS9WhkMJ8r5lEAYYhhIk3IHfi7CYy7wdpSYiNx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidlRGRUhmNTB0NHRBWTFzU1B4UG51Zkx4UGZOSGxpdloyMGZWS0hZYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZWRpY2luZS8yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1717785922),
	('ZJiAv2OliJxUUkmWGn7S4HDrhAE84wREv3BGHjBB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieGFCeWllMERTQUJGa2EwUzhRMExqVWRQZnNYTGpaTWtOOENLVHExMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718427085);

-- Dumping structure for table dbpharmacy.suppliers
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique ID of supplier',
  `name` varchar(50) DEFAULT NULL COMMENT 'Name of supplier',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dbpharmacy.suppliers: ~9 rows (approximately)
INSERT INTO `suppliers` (`id`, `name`) VALUES
	(1, 'PT Kalbe Farma Tbk'),
	(2, 'PT Sido Muncul Tbk'),
	(3, 'PT Kimia Farma'),
	(4, 'Tempo Scan Pacific'),
	(5, 'Phapros'),
	(6, 'Pyridam Farma'),
	(7, 'Merck Tbk'),
	(8, 'Indofarma'),
	(9, 'Darya-Varia Laboratoria Tbk');

-- Dumping structure for table dbpharmacy.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbpharmacy.users: ~0 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Levron Abigail', 'levron.abigail@gmail.com', NULL, '$2y$12$rGolLzVDwXh8N6arKsWZEuiK6U.ddPSxNQC.Ghbdh3ocQz8ZXtAm2', NULL, '2024-06-05 19:09:02', '2024-06-05 19:09:02'),
	(2, 'Demo Frontend', 'frontend.demo@demo.com', NULL, '$2y$12$5wEUAxx/KbGfJdKpchlvJu114b5Usz1xvVJutsVV510mIw9Djjjgq', NULL, '2024-06-06 23:55:14', '2024-06-06 23:55:14');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
