-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
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

-- Dumping structure for table laravel_12.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_12.cache: ~0 rows (approximately)

-- Dumping structure for table laravel_12.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_12.cache_locks: ~0 rows (approximately)

-- Dumping structure for table laravel_12.dosen
CREATE TABLE IF NOT EXISTS `dosen` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_studi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alumni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_dosen` enum('T','L') COLLATE utf8mb4_unicode_ci NOT NULL,
  `homebase` smallint NOT NULL,
  `alamat_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sandi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_login` enum('A','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` enum('A','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `signature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chatid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_12.dosen: ~0 rows (approximately)

-- Dumping structure for table laravel_12.failed_jobs
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

-- Dumping data for table laravel_12.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table laravel_12.fakultas
CREATE TABLE IF NOT EXISTS `fakultas` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `kode_fakultas` char(4) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `nama_fakultas` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dekan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_12.fakultas: ~0 rows (approximately)
INSERT INTO `fakultas` (`id`, `kode_fakultas`, `nama_fakultas`, `dekan`, `created_at`, `updated_at`) VALUES
	(1, '12', 'Kedokteran', 90, '2025-06-26 02:15:52', '2025-06-25 18:30:48');

-- Dumping structure for table laravel_12.institusi
CREATE TABLE IF NOT EXISTS `institusi` (
  `kode_institusi` smallint NOT NULL,
  `nama_institusi` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `singkatan` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_institusi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_12.institusi: ~0 rows (approximately)
INSERT INTO `institusi` (`kode_institusi`, `nama_institusi`, `singkatan`, `created_at`, `updated_at`) VALUES
	(1001, 'Universitas Bumigora', 'UBG', '2025-06-25 07:04:04', '2025-06-24 23:05:39');

-- Dumping structure for table laravel_12.jenjang
CREATE TABLE IF NOT EXISTS `jenjang` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `nama_jenjang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_12.jenjang: ~1 rows (approximately)
INSERT INTO `jenjang` (`id`, `nama_jenjang`, `created_at`, `updated_at`) VALUES
	(2, 'S2', '2025-06-25 21:26:20', '2025-06-25 22:27:43');

-- Dumping structure for table laravel_12.jobs
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

-- Dumping data for table laravel_12.jobs: ~0 rows (approximately)

-- Dumping structure for table laravel_12.job_batches
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

-- Dumping data for table laravel_12.job_batches: ~0 rows (approximately)

-- Dumping structure for table laravel_12.mahasiswa
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nim` char(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npm` char(23) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nisn` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_pendaftaran` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_pendaftaran_ulang` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_studi_kode` int NOT NULL,
  `nama_mahasiswa` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `propinsi` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` enum('Islam','Hindu','Kristen','Katolik','Budha','Konghucu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan_darah` enum('O','A','AB','B','-') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` enum('WNI','WNA') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_instansi` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ayah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama_ayah` enum('Islam','Hindu','Kristen','Katolik','Budha','Konghucu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ayah` enum('Pegawai Negeri Sipil','Pegawai Swasta','Wiraswasta','TNI/Polri','Dosen','Guru','Petani','Rumah Tangga','Lainnya') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama_ibu` enum('Islam','Hindu','Kristen','Katolik','Budha','Konghucu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ibu` enum('Pegawai Negeri Sipil','Pegawai Swasta','Wiraswasta','TNI/Polri','Dosen','Guru','Petani','Rumah Tangga','Lainnya') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_orangtua` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_orangtua` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `propinsi_orangtua` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon_orangtua` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sandi` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('A','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pendaftaran` enum('B','T','L') COLLATE utf8mb4_unicode_ci NOT NULL,
  `ta_lulus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mahasiswa_nim_unique` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_12.mahasiswa: ~10 rows (approximately)
INSERT INTO `mahasiswa` (`id`, `nim`, `nik`, `npm`, `nisn`, `nomor_pendaftaran`, `nomor_pendaftaran_ulang`, `program_studi_kode`, `nama_mahasiswa`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kota`, `propinsi`, `telepon`, `jenis_kelamin`, `agama`, `golongan_darah`, `kewarganegaraan`, `nama_instansi`, `email`, `nama_ayah`, `agama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `agama_ibu`, `pekerjaan_ibu`, `alamat_orangtua`, `kota_orangtua`, `propinsi_orangtua`, `telepon_orangtua`, `foto`, `sandi`, `status`, `status_pendaftaran`, `ta_lulus`, `created_at`, `updated_at`) VALUES
	(1, '61JTjWihFoO', '2CMrZq', 'YKmKFh', '8wCwze', 'YAYYfz', 'a4kIsm', 1, 'Tanner Schroeder Sr.', 'Luettgenview', '2025-03-19', '685 Steuber Knolls Apt. 426\nColefort, IA 48450-0314', 'Strackeborough', 'West Virginia', 'I9B4Uh', 'L', 'Islam', 'A', 'WNI', '-', 'stehr.sage@example.com', 'Prof. Werner Collins MD', 'Islam', 'Lainnya', 'Bria Hoppe', 'Islam', 'Lainnya', '46956 Gilberto Spurs\nChristiansenbury, TN 48420', 'Dawsonmouth', 'New Jersey', 'hSbOyN', 'IO4QiS', '$2y$12$Y8Pr/gbqQDWgRe1uoXvfIu/Hme1ATstLp3ts.cGWg7bfCNaauz44q', 'A', 'B', '-', '2025-03-18 22:14:08', '2025-03-18 22:14:08'),
	(2, 'ndOjBsyQVPj', 'hlkNSa', '306ezf', 'V2msim', 'jjR62a', 'ARIRIy', 1, 'Leanne Schuppe', 'Marksborough', '2025-03-19', '248 Noble Light Apt. 968\nDachshire, IN 59953-9719', 'Rafaelafort', 'Montana', 'bsZrT8', 'L', 'Islam', 'A', 'WNI', '-', 'sauer.addie@example.com', 'Mrs. Thalia Jones', 'Islam', 'Lainnya', 'Baby Schuster', 'Islam', 'Lainnya', '1687 Wisoky Ferry\nGastonborough, MA 91233', 'Wisozkchester', 'North Carolina', 'CnvZQP', 't3nydm', '$2y$12$vgOaOb9d2TOztdvQCUkEbuHUv2yY6CqUoheAf43iPMLaTuJjwkhJu', 'A', 'B', '-', '2025-03-18 22:14:08', '2025-03-18 22:14:08'),
	(3, 'kHsKYAqOu4o', 'oyCkF4', 'pCG7Fo', 'P43EsG', 'k4BFTc', 'EdVOo9', 1, 'Miss Shany Walter', 'Loraside', '2025-03-19', '92713 Guido Plaza\nEast Jalen, MD 91853', 'East Aftonhaven', 'District of Columbia', '9xxTL8', 'L', 'Islam', 'A', 'WNI', '-', 'zrutherford@example.org', 'Thelma Rodriguez', 'Islam', 'Lainnya', 'Antoinette Murazik', 'Islam', 'Lainnya', '4219 Jasmin Inlet\nEast Dedricmouth, RI 47522-3718', 'Gusikowskiville', 'Mississippi', 'RIN7s5', '9UlnnJ', '$2y$12$sbhpBGzhOMVpjAItTIXz5.qhSmBp8t6hUH75aPFvDqBp6fCvDn46C', 'A', 'B', '-', '2025-03-18 22:14:08', '2025-03-18 22:14:08'),
	(4, 'JVi4v27OZQP', 'n2Qyt1', 'D58yHZ', 'yEnDrk', 'Eo8019', '8ZkFRB', 1, 'Dr. Rodrick Schulist V', 'New Ronnymouth', '2025-03-19', '11965 Freida Mall Suite 910\nMullerville, GA 83823', 'Volkmanburgh', 'Louisiana', 'JgZwq5', 'L', 'Islam', 'A', 'WNI', '-', 'mitchell.sanford@example.com', 'Lurline Steuber', 'Islam', 'Lainnya', 'Mr. Stanley Upton I', 'Islam', 'Lainnya', '3283 Hamill Shores\nWest Daron, UT 26904', 'Port Lavernaburgh', 'Nevada', 'Ww8tEg', 'vlW1ZI', '$2y$12$JtSg7p5p2o4EpC55bhZ1QOVgzM6ooCg7khqRT88smmaj4Tp79JsOe', 'A', 'B', '-', '2025-03-18 22:14:08', '2025-03-18 22:14:08'),
	(5, 'wpTTaR7FMuq', 'Ee4HwO', 'kRMkST', 'j6K2vO', 'xzKeKR', 'RCgOT0', 1, 'Rafael Boehm II', 'Lake Jasentown', '2025-03-19', '270 Virginie Harbor\nTremblayfurt, FL 67284-0086', 'Geohaven', 'Idaho', 'TQgWCe', 'L', 'Islam', 'A', 'WNI', '-', 'kbartoletti@example.com', 'Mr. Montana Hartmann IV', 'Islam', 'Lainnya', 'Melyssa Wilkinson', 'Islam', 'Lainnya', '3650 Lynch Path Apt. 429\nBrakusport, DE 86821', 'East Caden', 'New Mexico', '8iZ1B1', '9lrTtU', '$2y$12$OklHPpbiCN..YCP38R4ds.9c/efDoyus11i4kKlQuIRsIpFeLmlni', 'A', 'B', '-', '2025-03-18 22:14:08', '2025-03-18 22:14:08'),
	(6, '20triObw19I', 'TnE6wZ', '1XjtqP', 'I2gvaC', '6lCo81', 'HnHmsL', 1, 'Isabell Ullrich', 'Tremaynetown', '2025-03-19', '8563 Colten Falls\nLake Luisshire, MT 88124-1516', 'New Lexus', 'Washington', 've9frr', 'L', 'Islam', 'A', 'WNI', '-', 'alesch@example.net', 'Mrs. Janae Runte MD', 'Islam', 'Lainnya', 'Therese Morar', 'Islam', 'Lainnya', '928 Rempel Forest\nSwiftstad, NV 58185', 'Skylaburgh', 'Ohio', 'lbJy9C', 'rCYMzk', '$2y$12$CzSzSzXWC.vtuzzFWkrbPeCcl4qUYz2Na1zjuqajvk3YYeFhBngWq', 'A', 'B', '-', '2025-03-18 22:14:08', '2025-03-18 22:14:08'),
	(7, '79NZcMysgYz', 'uER8EU', 'LzSkV6', 'iZDF7n', 'qT6Pu1', '3Kylr4', 1, 'Ashlynn Hickle', 'McCulloughview', '2025-03-19', '951 Reilly Burg\nNew Rhoda, ND 59514', 'Kaneberg', 'Pennsylvania', '1WeIlP', 'L', 'Islam', 'A', 'WNI', '-', 'oda53@example.com', 'Miss Marjorie Koss V', 'Islam', 'Lainnya', 'Lolita Walker', 'Islam', 'Lainnya', '991 Donato Forest Suite 921\nMylenestad, SC 12928-7024', 'Wolfffurt', 'Nebraska', 'E5f10S', 'Zku8oJ', '$2y$12$HMp1NjmfrzlK6HVLnRwfhOB3.dnXvvpPTolpX851XWmv6lAORATiW', 'A', 'B', '-', '2025-03-18 22:14:08', '2025-03-18 22:14:08'),
	(8, 'C1TaYg0C2OE', 'k8QG7R', 'z4nBnE', 'OTKXRJ', 'ESJp0C', 'fVt0zt', 1, 'Zachary Wolff', 'East Samirfort', '2025-03-19', '3321 Hector Mews\nEast Dean, ID 89862-1737', 'Lake Roelmouth', 'Idaho', 'ImU8UV', 'L', 'Islam', 'A', 'WNI', '-', 'schimmel.maddison@example.net', 'Dr. Brooks Bartoletti I', 'Islam', 'Lainnya', 'Dr. Deshaun Skiles', 'Islam', 'Lainnya', '342 Barrows Manors\nLake Marquise, CA 74100-7709', 'East Icietown', 'Nevada', 'p2Qhtg', 'RybwBX', '$2y$12$UFi.0haRYvoLmRFVq9FrAeHvdScfVeVpH.LntRo/Kvudd2frfpkQy', 'A', 'B', '-', '2025-03-18 22:14:08', '2025-03-18 22:14:08'),
	(9, 'aFtUp6av87F', 'j8jzGg', 'GqzpLZ', 'l8ackP', 'T0TVD9', 'eky2dL', 1, 'Ms. Nyasia Bradtke', 'Mauriciomouth', '2025-03-19', '331 Jailyn Branch Suite 399\nAmelyton, SD 12016', 'Hoppeberg', 'South Carolina', 'V19KYK', 'L', 'Islam', 'A', 'WNI', '-', 'ldurgan@example.com', 'Idella Klein', 'Islam', 'Lainnya', 'Delbert VonRueden', 'Islam', 'Lainnya', '449 Rutherford Motorway Apt. 996\nCasperton, HI 64036', 'New Luciano', 'Michigan', 'Sd1IPD', 'gIFkaM', '$2y$12$BAxl1Me7y.Db66bRm/ITjuLuDDBJ3pn5dFBve/5yIojVX6Laa/9Ge', 'A', 'B', '-', '2025-03-18 22:14:08', '2025-03-18 22:14:08'),
	(10, 'OmINXnKiLbY', '64ungH', 'WdhLoV', '7GE2Mm', 'DvqWlM', '9jJiyR', 1, 'Maximillia McCullough DVM', 'Dangeloberg', '2025-03-19', '419 Jayce Junctions Suite 554\nDayanastad, MO 27840', 'Port Christellehaven', 'Tennessee', '0adovg', 'L', 'Islam', 'A', 'WNI', '-', 'liana.ziemann@example.com', 'Dr. Julien Kunze V', 'Islam', 'Lainnya', 'Ms. Rosemary Rowe', 'Islam', 'Lainnya', '19883 Marcia Skyway Suite 794\nLarkinborough, ID 31082', 'West Ianshire', 'Vermont', 'oBynAM', 'ET6UqC', '$2y$12$xCWnhnJ2uW5F/nGxZA7D9OGwfiueN1o55kljdvNKDGylQftkdEAjm', 'A', 'B', '-', '2025-03-18 22:14:08', '2025-03-18 22:14:08');

-- Dumping structure for table laravel_12.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_12.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_02_26_061800_create_personal_access_tokens_table', 1),
	(5, '2025_03_13_021813_create_mahasiswa', 1),
	(6, '2025_03_14_061108_create_program_studi', 1),
	(7, '2025_03_14_061123_create_dosen', 1),
	(8, '2025_03_14_065913_create_univ', 1);

-- Dumping structure for table laravel_12.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_12.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table laravel_12.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_12.personal_access_tokens: ~8 rows (approximately)
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
	(1, 'App\\Models\\Mahasiswa', 1, 'Mahasiswa', '800ad4928ec8eb1720ba2a098af7612688a1b2456968f8835d1c07061c7a9e71', '["*"]', NULL, NULL, '2025-03-18 22:33:20', '2025-03-18 22:33:20'),
	(2, 'App\\Models\\Mahasiswa', 1, 'Mahasiswa', 'be87fe9863aa51a964bd81c4bbfa582ed33097b35cb01a7854761872862e2cfb', '["*"]', '2025-03-18 22:36:26', NULL, '2025-03-18 22:33:28', '2025-03-18 22:36:26'),
	(3, 'App\\Models\\Mahasiswa', 1, 'Mahasiswa', 'e87fb227569f53e3530460cc3914aa59de1ee2f718ef9bb958af85345a2df620', '["*"]', NULL, NULL, '2025-03-18 22:48:11', '2025-03-18 22:48:11'),
	(4, 'App\\Models\\Mahasiswa', 1, 'Mahasiswa', 'ea06bbefa752f58d1a91e1c55642d82169f06034ff027470deea7e01b610d5bd', '["*"]', NULL, NULL, '2025-03-18 22:48:30', '2025-03-18 22:48:30'),
	(5, 'App\\Models\\Mahasiswa', 1, 'Mahasiswa', '7b4fe32939189ddf9dd31c8f56c24e82863d1458e6db9c706a6eda06388cd12e', '["*"]', NULL, NULL, '2025-03-18 23:05:43', '2025-03-18 23:05:43'),
	(6, 'App\\Models\\Mahasiswa', 1, 'Mahasiswa', 'e348274d80bbeab6dd8916c33d0c7f35599e4df8743ffad0acc692b1db652c15', '["*"]', NULL, NULL, '2025-03-18 23:11:46', '2025-03-18 23:11:46'),
	(7, 'App\\Models\\Mahasiswa', 1, 'Mahasiswa', 'c49b7f1898c5e1bf7e914969c06acfd71e15d237ed8c3d45e4d5e1521757a09f', '["*"]', '2025-03-19 00:06:48', NULL, '2025-03-18 23:12:34', '2025-03-19 00:06:48'),
	(8, 'App\\Models\\Mahasiswa', 1, 'Mahasiswa', 'd9d877f8d8076a6fb591fc66eac2135a43f26188d7ad5b85f0060da90c191d37', '["*"]', '2025-03-19 00:12:20', NULL, '2025-03-19 00:12:12', '2025-03-19 00:12:20');

-- Dumping structure for table laravel_12.program_studi
CREATE TABLE IF NOT EXISTS `program_studi` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `kode_program_studi` smallint DEFAULT NULL,
  `id_jenjang` smallint NOT NULL,
  `nama_program_studi` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `singkatan_program_studi` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kaprodi` int DEFAULT NULL,
  `kompetensi` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_12.program_studi: ~1 rows (approximately)
INSERT INTO `program_studi` (`id`, `kode_program_studi`, `id_jenjang`, `nama_program_studi`, `singkatan_program_studi`, `kaprodi`, `kompetensi`, `created_at`, `updated_at`) VALUES
	(2, 56, 2, '55', '55', 1, 'N', '2025-06-25 23:38:30', '2025-06-25 23:38:30');

-- Dumping structure for table laravel_12.sessions
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

-- Dumping data for table laravel_12.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('76SqjXJPtQs0JLbqZzYprGl6spgSBh3rRROWxLEl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidlMxWXhYRDNhZWczcmx3cURDVG1TOUlhQ0gxQmV3UWhNSERxN05hRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wcm9ncmFtX3N0dWRpIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1OiJhbGVydCI7YTowOnt9fQ==', 1750928870);

-- Dumping structure for table laravel_12.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_12.users: ~10 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Osvaldo Cummerata', 'pkub@example.org', '2025-03-18 22:14:03', '$2y$12$QgDHsaWncZpdMbTZYKVtiO7zReLPt6dwhWnsz9BTt.jnLwygmIOQO', 'ZOlpajT7gJ', '2025-03-18 22:14:04', '2025-03-18 22:14:04'),
	(2, 'Mrs. Salma Sanford', 'mcclure.parker@example.org', '2025-03-18 22:14:04', '$2y$12$QgDHsaWncZpdMbTZYKVtiO7zReLPt6dwhWnsz9BTt.jnLwygmIOQO', 'wEnew5kFOT', '2025-03-18 22:14:04', '2025-03-18 22:14:04'),
	(3, 'Prof. Gideon Corwin', 'dickens.murl@example.com', '2025-03-18 22:14:04', '$2y$12$QgDHsaWncZpdMbTZYKVtiO7zReLPt6dwhWnsz9BTt.jnLwygmIOQO', 'dCQDeh1xbT', '2025-03-18 22:14:04', '2025-03-18 22:14:04'),
	(4, 'Ms. Gerry Kshlerin MD', 'ryleigh.wyman@example.net', '2025-03-18 22:14:04', '$2y$12$QgDHsaWncZpdMbTZYKVtiO7zReLPt6dwhWnsz9BTt.jnLwygmIOQO', 'QqoiHOBR4s', '2025-03-18 22:14:04', '2025-03-18 22:14:04'),
	(5, 'Mrs. Eudora McGlynn III', 'johnathon.mertz@example.com', '2025-03-18 22:14:04', '$2y$12$QgDHsaWncZpdMbTZYKVtiO7zReLPt6dwhWnsz9BTt.jnLwygmIOQO', 'Vs9ylYttPT', '2025-03-18 22:14:04', '2025-03-18 22:14:04'),
	(6, 'Cleve Dickinson', 'austyn55@example.com', '2025-03-18 22:14:04', '$2y$12$QgDHsaWncZpdMbTZYKVtiO7zReLPt6dwhWnsz9BTt.jnLwygmIOQO', 'VNoTmVt6sI', '2025-03-18 22:14:04', '2025-03-18 22:14:04'),
	(7, 'Mack Monahan', 'rdaniel@example.org', '2025-03-18 22:14:04', '$2y$12$QgDHsaWncZpdMbTZYKVtiO7zReLPt6dwhWnsz9BTt.jnLwygmIOQO', 'zhC4RhAqtz', '2025-03-18 22:14:04', '2025-03-18 22:14:04'),
	(8, 'Tracey Heidenreich', 'deja44@example.com', '2025-03-18 22:14:04', '$2y$12$QgDHsaWncZpdMbTZYKVtiO7zReLPt6dwhWnsz9BTt.jnLwygmIOQO', 'HJ83JF22VV', '2025-03-18 22:14:04', '2025-03-18 22:14:04'),
	(9, 'Athena Goodwin', 'xrowe@example.com', '2025-03-18 22:14:04', '$2y$12$QgDHsaWncZpdMbTZYKVtiO7zReLPt6dwhWnsz9BTt.jnLwygmIOQO', 'gNOIb5kt7v', '2025-03-18 22:14:04', '2025-03-18 22:14:04'),
	(10, 'Mrs. Nora Hauck', 'kcollins@example.org', '2025-03-18 22:14:04', '$2y$12$QgDHsaWncZpdMbTZYKVtiO7zReLPt6dwhWnsz9BTt.jnLwygmIOQO', 'ARrFoP7ZXb', '2025-03-18 22:14:04', '2025-03-18 22:14:04');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
