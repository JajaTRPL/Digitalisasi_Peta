-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2025 at 02:42 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restapi_dpub`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat_tanah`
--

CREATE TABLE `alamat_tanah` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `padukuhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kalurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Umbulharjo',
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Cangkringan',
  `kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Sleman',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alamat_tanah`
--

INSERT INTO `alamat_tanah` (`id`, `detail_alamat`, `rt`, `rw`, `padukuhan`, `kalurahan`, `kecamatan`, `kabupaten`, `created_at`, `updated_at`, `deleted_at`) VALUES
('AT-00001', 'xxxxx', '123', '12', 'xxxx', 'Umbulharjo', 'Cangkringan', 'Sleman', '2025-04-12 11:47:33', '2025-04-12 11:47:33', NULL),
('AT-00002', 'xx', '123', '12', 'xxxx', 'Umbulharjo', 'Cangkringan', 'Sleman', '2025-04-12 11:48:06', '2025-04-12 11:48:06', NULL),
('AT-00003', 'xx', '123', '12', 'xxxx', 'Umbulharjo', 'Cangkringan', 'Sleman', '2025-04-12 11:48:10', '2025-04-12 11:48:10', NULL),
('AT-00004', 'xx', '123', '12', 'xxxx', 'Umbulharjo', 'Cangkringan', 'Sleman', '2025-04-12 11:48:14', '2025-04-12 11:48:14', NULL),
('AT-00005', 'xx', '123', '12', 'xxxx', 'Umbulharjo', 'Cangkringan', 'Sleman', '2025-04-12 12:38:41', '2025-04-12 12:38:41', NULL),
('AT-00006', 'Jl. Contoh No. 2', '001', '002', 'Padukuhan Contoh', 'Umbulharjo', 'Cangkringan', 'Sleman', '2025-04-12 12:39:57', '2025-04-16 21:31:39', NULL),
('AT-00007', 'coba pake user', '123', '12', 'jl jl', 'Umbulharjo', 'Cangkringan', 'Sleman', '2025-04-24 17:48:54', '2025-04-24 17:48:54', NULL),
('AT-00008', 'coba lagi', '123', '12', 'jl jl', 'Umbulharjo', 'Cangkringan', 'Sleman', '2025-04-24 17:49:29', '2025-04-24 17:49:29', NULL),
('AT-00009', 'coba lagi lagi', '123', '12', 'jl jl', 'Umbulharjo', 'Cangkringan', 'Sleman', '2025-04-24 18:01:45', '2025-04-24 18:01:45', NULL),
('AT-00010', 'Jalan Diponegoro, Blok B3, No. 20', '12', '21', 'Palemsari', 'Umbulharjo', 'Cangkringan', 'Sleman', '2025-05-01 06:34:46', '2025-05-01 06:34:46', NULL),
('AT-00011', 'Jalan Proklamasi, Blok E1, No. 10', '12', '12', 'Plosorejo', 'Umbulharjo', 'Cangkringan', 'Sleman', '2025-05-01 06:35:48', '2025-05-01 06:35:48', NULL),
('AT-00012', 'Jalan 01', '12', '12', 'Karanggeneng', 'Umbulharjo', 'Cangkringan', 'Sleman', '2025-05-01 17:12:33', '2025-05-01 17:12:33', NULL),
('AT-00013', 'Jalan Merapi, Blok A1, No 15', '12', '12', 'Balong', 'Umbulharjo', 'Cangkringan', 'Sleman', '2025-05-02 00:09:20', '2025-05-02 00:09:20', NULL),
('AT-00014', 'JL JL', '123', '12', 'jl jl', 'Umbulharjo', 'Cangkringan', 'Sleman', '2025-05-02 06:19:42', '2025-05-02 06:19:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_tanah`
--

CREATE TABLE `detail_tanah` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `added_by` bigint UNSIGNED DEFAULT NULL,
  `nama_tanah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luas_tanah` double NOT NULL,
  `alamat_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kepemilikan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_tanah_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_tanah_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_tanah`
--

INSERT INTO `detail_tanah` (`id`, `deleted_by`, `updated_by`, `added_by`, `nama_tanah`, `luas_tanah`, `alamat_id`, `status_kepemilikan_id`, `status_tanah_id`, `tipe_tanah_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('DT-00002', NULL, NULL, NULL, 'x', 124, 'AT-00002', 'SK-00001', 'ST-00001', 'TG-000001', '2025-04-12 11:48:06', '2025-05-01 17:12:51', '2025-05-01 17:12:51'),
('DT-00004', NULL, NULL, NULL, 'xxx', 124, 'AT-00004', 'SK-00001', 'ST-00001', 'TG-000001', '2025-04-12 11:48:14', '2025-05-01 07:10:29', '2025-05-01 07:10:29'),
('DT-00005', NULL, NULL, NULL, 'coba', 124, 'AT-00005', 'SK-00001', 'ST-00001', 'TG-000001', '2025-04-12 12:38:41', '2025-04-12 12:38:41', NULL),
('DT-00006', NULL, NULL, NULL, 'Tanah coba', 100, 'AT-00006', 'SK-00001', 'ST-00001', 'TG-000001', '2025-04-12 12:39:57', '2025-04-16 21:31:39', NULL),
('DT-00007', NULL, NULL, NULL, 'cobalagiuserbiasa', 124, 'AT-00007', 'SK-00001', 'ST-00001', 'TG-000001', '2025-04-24 17:48:54', '2025-04-24 17:48:54', NULL),
('DT-00008', NULL, NULL, NULL, 'coba pake user', 124, 'AT-00008', 'SK-00001', 'ST-00001', 'TG-000001', '2025-04-24 17:49:29', '2025-04-24 17:49:29', NULL),
('DT-00009', NULL, NULL, NULL, 'coba coba', 124, 'AT-00009', 'SK-00001', 'ST-00001', 'TG-000001', '2025-04-24 18:01:45', '2025-04-24 18:01:45', NULL),
('DT-00010', NULL, NULL, NULL, 'test fe', 12, 'AT-00010', 'SK-00002', 'ST-00001', 'TG-000001', '2025-05-01 06:34:46', '2025-05-02 06:38:41', '2025-05-02 06:38:41'),
('DT-00011', NULL, NULL, NULL, 'test fe 2', 21, 'AT-00011', 'SK-00003', 'ST-00002', 'TG-000001', '2025-05-01 06:35:48', '2025-05-02 06:39:15', '2025-05-02 06:39:15'),
('DT-00012', 5, NULL, NULL, 'test', 12, 'AT-00012', 'SK-00003', 'ST-00001', 'TG-000002', '2025-05-01 17:12:33', '2025-05-02 06:40:38', '2025-05-02 06:40:38'),
('DT-00013', NULL, NULL, NULL, 'testttt', 12, 'AT-00013', 'SK-00001', 'ST-00002', 'TG-000001', '2025-05-02 00:09:20', '2025-05-02 00:09:32', '2025-05-02 00:09:32'),
('DT-00014', NULL, NULL, 5, 'coba user', 124, 'AT-00014', 'SK-00001', 'ST-00001', 'TG-000001', '2025-05-02 06:19:42', '2025-05-02 06:19:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_tanah`
--

CREATE TABLE `foto_tanah` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_tanah_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_foto_tanah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran_foto_tanah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foto_tanah`
--

INSERT INTO `foto_tanah` (`id`, `detail_tanah_id`, `nama_foto_tanah`, `ukuran_foto_tanah`, `created_at`, `updated_at`, `deleted_at`) VALUES
('FT-00002', 'DT-00002', 'ground_image_1744483686.jpg', '76608', '2025-04-12 11:48:07', '2025-04-12 11:48:07', NULL),
('FT-00004', 'DT-00004', 'ground_image_1744483694.jpg', '76608', '2025-04-12 11:48:14', '2025-04-12 11:48:14', NULL),
('FT-00005', 'DT-00005', 'ground_image_1744486721.jpg', '76608', '2025-04-12 12:38:41', '2025-04-12 12:38:41', NULL),
('FT-00006', 'DT-00006', 'ground_image_1744486797.jpg', '76608', '2025-04-12 12:39:57', '2025-04-12 12:39:57', NULL),
('FT-00007', 'DT-00007', 'ground_image_1745542134.jpg', '76608', '2025-04-24 17:48:55', '2025-04-24 17:48:55', NULL),
('FT-00008', 'DT-00008', 'ground_image_1745542169.jpg', '76608', '2025-04-24 17:49:29', '2025-04-24 17:49:29', NULL),
('FT-00009', 'DT-00009', 'ground_image_1745542905.jpg', '76608', '2025-04-24 18:01:45', '2025-04-24 18:01:45', NULL),
('FT-00010', 'DT-00010', 'ground_image_1746106486.jpg', '22008', '2025-05-01 06:34:47', '2025-05-01 06:34:47', NULL),
('FT-00011', 'DT-00011', 'ground_image_1746106548.jpg', '22008', '2025-05-01 06:35:48', '2025-05-01 06:35:48', NULL),
('FT-00012', 'DT-00012', 'ground_image_1746144753.jpg', '22008', '2025-05-01 17:12:34', '2025-05-01 17:12:34', NULL),
('FT-00013', 'DT-00013', 'ground_image_1746169760.jpg', '22008', '2025-05-02 00:09:21', '2025-05-02 00:09:21', NULL),
('FT-00014', 'DT-00014', 'ground_image_1746191982.jpg', '76608', '2025-05-02 06:19:43', '2025-05-02 06:19:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marker_tanah`
--

CREATE TABLE `marker_tanah` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_tanah_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(8,6) NOT NULL,
  `longitude` decimal(9,6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marker_tanah`
--

INSERT INTO `marker_tanah` (`id`, `detail_tanah_id`, `latitude`, `longitude`, `created_at`, `updated_at`, `deleted_at`) VALUES
('MT-00002', 'DT-00002', '-7.605850', '110.435938', '2025-04-12 11:48:06', '2025-04-12 11:48:06', NULL),
('MT-00004', 'DT-00004', '-7.605850', '110.435938', '2025-04-12 11:48:14', '2025-04-12 11:48:14', NULL),
('MT-00005', 'DT-00005', '-7.605850', '110.435938', '2025-04-12 12:38:41', '2025-04-12 12:38:41', NULL),
('MT-00006', 'DT-00006', '-7.123450', '110.123450', '2025-04-12 12:39:57', '2025-04-16 21:31:39', NULL),
('MT-00007', 'DT-00007', '-7.605850', '110.435938', '2025-04-24 17:48:54', '2025-04-24 17:48:54', NULL),
('MT-00008', 'DT-00008', '-7.605850', '110.435938', '2025-04-24 17:49:29', '2025-04-24 17:49:29', NULL),
('MT-00009', 'DT-00009', '-7.605850', '110.435938', '2025-04-24 18:01:45', '2025-04-24 18:01:45', NULL),
('MT-00010', 'DT-00010', '-7.613640', '110.431838', '2025-05-01 06:34:46', '2025-05-01 06:34:46', NULL),
('MT-00011', 'DT-00011', '-7.612317', '110.431609', '2025-05-01 06:35:48', '2025-05-01 06:35:48', NULL),
('MT-00012', 'DT-00012', '-7.615059', '110.432235', '2025-05-01 17:12:33', '2025-05-01 17:12:33', NULL),
('MT-00013', 'DT-00013', '-7.612083', '110.432833', '2025-05-02 00:09:20', '2025-05-02 00:09:20', NULL),
('MT-00014', 'DT-00014', '-7.605850', '110.435938', '2025-05-02 06:19:42', '2025-05-02 06:19:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_12_153756_create_personal_access_tokens_table', 1),
(5, '2025_04_12_182058_create_tipe_tanahs_table', 1),
(6, '2025_04_12_182104_create_status_tanahs_table', 1),
(7, '2025_04_12_182111_create_status_kepemilikans_table', 1),
(8, '2025_04_12_182121_create_alamat_tanahs_table', 1),
(9, '2025_04_12_182129_create_detail_tanahs_table', 1),
(10, '2025_04_12_182135_create_foto_tanahs_table', 1),
(11, '2025_04_12_182141_create_sertifikat_tanahs_table', 1),
(12, '2025_04_12_182148_create_marker_tanahs_table', 1),
(13, '2025_04_12_182209_create_polygon_tanahs_table', 1),
(14, '2025_04_12_192555_create_permission_tables', 2),
(15, '2025_04_25_004258_add_addedby_updatedby', 3),
(16, '2025_05_02_132622_deletedby', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 4),
(1, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 14),
(3, 'App\\Models\\User', 15),
(2, 'App\\Models\\User', 16),
(2, 'App\\Models\\User', 17),
(2, 'App\\Models\\User', 18);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'tambah-admin', 'api', '2025-04-12 12:35:06', '2025-04-12 12:35:06'),
(2, 'edit-admin', 'api', '2025-04-12 12:35:06', '2025-04-12 12:35:06'),
(3, 'hapus-admin', 'api', '2025-04-12 12:35:06', '2025-04-12 12:35:06'),
(4, 'lihat-admin', 'api', '2025-04-12 12:35:06', '2025-04-12 12:35:06'),
(5, 'tambah-map', 'api', '2025-04-12 12:35:06', '2025-04-12 12:35:06'),
(6, 'edit-map', 'api', '2025-04-12 12:35:06', '2025-04-12 12:35:06'),
(7, 'hapus-map', 'api', '2025-04-12 12:35:06', '2025-04-12 12:35:06'),
(8, 'lihat-map', 'api', '2025-04-12 12:35:06', '2025-04-12 12:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(46, 'App\\Models\\User', 1, 'testingSA-AuthToken', 'bc3447e3e6107974fa64228842749633ab5aa26e294d4509984493c66fd53e7f', '[\"*\"]', '2025-05-01 06:54:14', NULL, '2025-05-01 06:34:20', '2025-05-01 06:54:14'),
(47, 'App\\Models\\User', 5, 'cobaSA-AuthToken', 'dcbfd15908d834261fd5467f2750a38a9ea50c697c98a1ce69e363b5677af255', '[\"*\"]', '2025-05-01 07:10:29', NULL, '2025-05-01 07:06:12', '2025-05-01 07:10:29'),
(48, 'App\\Models\\User', 1, 'testingSA-AuthToken', 'f9853342e8b1890024b866437a3c86fe1ef12b926196d375bb289a3b2630a8bd', '[\"*\"]', NULL, NULL, '2025-05-01 17:04:18', '2025-05-01 17:04:18'),
(49, 'App\\Models\\User', 1, 'testingSA-AuthToken', '377b6a6416d3471fe97061550132916e273f1b123bc697b56192a00c29a0ec03', '[\"*\"]', NULL, NULL, '2025-05-01 17:04:20', '2025-05-01 17:04:20'),
(50, 'App\\Models\\User', 1, 'testingSA-AuthToken', '348913fb6b11eae939b4464c6b1439fa381ea4a8149e7bed953769dfe11398d3', '[\"*\"]', '2025-05-01 17:47:55', NULL, '2025-05-01 17:07:00', '2025-05-01 17:47:55'),
(51, 'App\\Models\\User', 1, 'testingSA-AuthToken', '0d1c188abcceb1aabfef1c5a3f496b5c3ab5b39eb5a22e31d3c8255a7b306a65', '[\"*\"]', NULL, NULL, '2025-05-01 17:07:01', '2025-05-01 17:07:01'),
(54, 'App\\Models\\User', 1, 'testingSA-AuthToken', '09dedac91dc026703249dc577c73061d681fe45da4a491ce0d4b7ab8e0769050', '[\"*\"]', NULL, NULL, '2025-05-01 22:02:28', '2025-05-01 22:02:28'),
(57, 'App\\Models\\User', 1, 'testingSA-AuthToken', 'cbff4e5df6bb6cb93b5b74e714460d496377eec4c9f9d26ebaa481e578ddf6a7', '[\"*\"]', '2025-05-02 00:16:36', NULL, '2025-05-02 00:13:50', '2025-05-02 00:16:36'),
(58, 'App\\Models\\User', 5, 'cobaSA-AuthToken', '1427f28866c0e55d0785f818f747cb361352a8840e1870aa56beb5196ac2e522', '[\"*\"]', '2025-05-02 22:02:24', NULL, '2025-05-02 06:18:02', '2025-05-02 22:02:24'),
(60, 'App\\Models\\User', 11, 'test5-AuthToken', '68692e05eda37a77b34cf565c9b1785375e6d66f6d1222d5855e7a093d35db08', '[\"*\"]', NULL, NULL, '2025-05-02 08:02:33', '2025-05-02 08:02:33'),
(62, 'App\\Models\\User', 1, 'testingSA-AuthToken', 'a49f96b67725715d384c0a1adb5c4d5fe43a7d29033eadc1c10704fa7f305e78', '[\"*\"]', '2025-05-02 11:24:00', NULL, '2025-05-02 11:21:47', '2025-05-02 11:24:00'),
(63, 'App\\Models\\User', 5, 'cobaSA-AuthToken', '5bdebb1d6ccda6ebc5a18b083431f31bb0e72041014541ae9d667996293fdcb1', '[\"*\"]', '2025-05-02 22:07:23', NULL, '2025-05-02 20:26:00', '2025-05-02 22:07:23'),
(64, 'App\\Models\\User', 1, 'testingSA-AuthToken', 'cb8c050d5286835075fee11e7f33f02efcf81fff95c6e28cb52ef1553537409c', '[\"*\"]', '2025-05-02 22:07:39', NULL, '2025-05-02 21:55:06', '2025-05-02 22:07:39'),
(65, 'App\\Models\\User', 1, 'testingSA-AuthToken', '7134fe66f7789a01beb3bac3ca4cacf219200573e0d8510c71e9c44acfb88f80', '[\"*\"]', NULL, NULL, '2025-05-02 21:55:07', '2025-05-02 21:55:07'),
(66, 'App\\Models\\User', 1, 'testingSA-AuthToken', '55697d9c4199628735bbd435a85fec9f78fd8ed5b4a92897cfee0af934c1618e', '[\"*\"]', '2025-05-03 19:41:41', NULL, '2025-05-03 19:23:30', '2025-05-03 19:41:41'),
(67, 'App\\Models\\User', 1, 'testingSA-AuthToken', '2ef81e86e4e69e9fbd91bae865356d8a8167ae4e1367fbd181cf8d40d0bc712c', '[\"*\"]', NULL, NULL, '2025-05-03 19:23:32', '2025-05-03 19:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `polygon_tanah`
--

CREATE TABLE `polygon_tanah` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marker_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinates` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `polygon_tanah`
--

INSERT INTO `polygon_tanah` (`id`, `marker_id`, `coordinates`, `created_at`, `updated_at`, `deleted_at`) VALUES
('PT-00002', 'MT-00002', '{\"latitude\": -7.60585, \"longitude\": 110.435938, \"luas_tanah\": 1000, \"nama_tanah\": \"Tanah A\", \"coordinates\": \"[[110.4359,-7.6058],[110.4360,-7.6060]]\"}', '2025-04-12 11:48:06', '2025-04-12 11:48:06', NULL),
('PT-00004', 'MT-00004', '{\"latitude\": -7.60585, \"longitude\": 110.435938, \"luas_tanah\": 1000, \"nama_tanah\": \"Tanah A\", \"coordinates\": \"[[110.4359,-7.6058],[110.4360,-7.6060]]\"}', '2025-04-12 11:48:14', '2025-04-12 11:48:14', NULL),
('PT-00005', 'MT-00005', '{\"latitude\": -7.60585, \"longitude\": 110.435938, \"luas_tanah\": 1000, \"nama_tanah\": \"Tanah A\", \"coordinates\": \"[[110.4359,-7.6058],[110.4360,-7.6060]]\"}', '2025-04-12 12:38:41', '2025-04-12 12:38:41', NULL),
('PT-00006', 'MT-00006', '[[-7.123, 110.123], [-7.124, 110.124]]', '2025-04-12 12:39:57', '2025-04-16 21:31:39', NULL),
('PT-00007', 'MT-00007', '{\"latitude\": -7.60585, \"longitude\": 110.435938, \"luas_tanah\": 1000, \"nama_tanah\": \"Tanah A\", \"coordinates\": \"[[110.4359,-7.6058],[110.4360,-7.6060]]\"}', '2025-04-24 17:48:54', '2025-04-24 17:48:54', NULL),
('PT-00008', 'MT-00008', '{\"latitude\": -7.60585, \"longitude\": 110.435938, \"luas_tanah\": 1000, \"nama_tanah\": \"Tanah A\", \"coordinates\": \"[[110.4359,-7.6058],[110.4360,-7.6060]]\"}', '2025-04-24 17:49:29', '2025-04-24 17:49:29', NULL),
('PT-00009', 'MT-00009', '{\"latitude\": -7.60585, \"longitude\": 110.435938, \"luas_tanah\": 1000, \"nama_tanah\": \"Tanah A\", \"coordinates\": \"[[110.4359,-7.6058],[110.4360,-7.6060]]\"}', '2025-04-24 18:01:45', '2025-04-24 18:01:45', NULL),
('PT-00010', 'MT-00010', '{\"type\": \"Feature\", \"geometry\": {\"type\": \"Polygon\", \"coordinates\": [[[110.431437, -7.613111], [110.432525, -7.612657], [110.431552, -7.615153], [110.431437, -7.613111]]]}, \"properties\": {}}', '2025-05-01 06:34:46', '2025-05-01 06:34:46', NULL),
('PT-00011', 'MT-00011', '{\"type\": \"Feature\", \"geometry\": {\"type\": \"Polygon\", \"coordinates\": [[[110.427661, -7.611069], [110.435042, -7.612147], [110.432124, -7.613735], [110.427661, -7.611069]]]}, \"properties\": {}}', '2025-05-01 06:35:48', '2025-05-01 06:35:48', NULL),
('PT-00012', 'MT-00012', '{\"type\": \"Feature\", \"geometry\": {\"type\": \"Polygon\", \"coordinates\": [[[110.431441, -7.613822], [110.433158, -7.613822], [110.432105, -7.617533], [110.431441, -7.613822]]]}, \"properties\": {}}', '2025-05-01 17:12:33', '2025-05-01 17:12:33', NULL),
('PT-00013', 'MT-00013', '{\"type\": \"Feature\", \"geometry\": {\"type\": \"Polygon\", \"coordinates\": [[[110.431519, -7.611116], [110.434914, -7.611426], [110.432066, -7.613706], [110.431519, -7.611116]]]}, \"properties\": {}}', '2025-05-02 00:09:20', '2025-05-02 00:09:20', NULL),
('PT-00014', 'MT-00014', '{\"latitude\": -7.60585, \"longitude\": 110.435938, \"luas_tanah\": 1000, \"nama_tanah\": \"Tanah A\", \"coordinates\": \"[[110.4359,-7.6058],[110.4360,-7.6060]]\"}', '2025-05-02 06:19:42', '2025-05-02 06:19:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superAdmin', 'api', '2025-04-12 12:35:06', '2025-04-12 12:35:06'),
(2, 'admin', 'api', '2025-04-12 12:35:06', '2025-04-12 12:35:06'),
(3, 'guest', 'api', '2025-04-12 12:35:06', '2025-04-12 12:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat_tanah`
--

CREATE TABLE `sertifikat_tanah` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_tanah_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_sertifikat_tanah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran_sertifikat_tanah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sertifikat_tanah`
--

INSERT INTO `sertifikat_tanah` (`id`, `detail_tanah_id`, `nama_sertifikat_tanah`, `ukuran_sertifikat_tanah`, `created_at`, `updated_at`, `deleted_at`) VALUES
('ST-00002', 'DT-00002', 'ground_sertifikat_1744483687.pdf', '940473', '2025-04-12 11:48:07', '2025-04-12 11:48:07', NULL),
('ST-00004', 'DT-00004', 'ground_sertifikat_1744483694.pdf', '940473', '2025-04-12 11:48:14', '2025-04-12 11:48:14', NULL),
('ST-00005', 'DT-00005', 'ground_sertifikat_1744486721.pdf', '940473', '2025-04-12 12:38:41', '2025-04-12 12:38:41', NULL),
('ST-00006', 'DT-00006', 'ground_sertifikat_1744486797.pdf', '940473', '2025-04-12 12:39:57', '2025-04-12 12:39:57', NULL),
('ST-00007', 'DT-00007', 'ground_sertifikat_1745542135.pdf', '940473', '2025-04-24 17:48:55', '2025-04-24 17:48:55', NULL),
('ST-00008', 'DT-00008', 'ground_sertifikat_1745542169.pdf', '940473', '2025-04-24 17:49:29', '2025-04-24 17:49:29', NULL),
('ST-00009', 'DT-00009', 'ground_sertifikat_1745542905.pdf', '940473', '2025-04-24 18:01:45', '2025-04-24 18:01:45', NULL),
('ST-00010', 'DT-00010', 'ground_sertifikat_1746106487.pdf', '799178', '2025-05-01 06:34:47', '2025-05-01 06:34:47', NULL),
('ST-00011', 'DT-00011', 'ground_sertifikat_1746106548.pdf', '799178', '2025-05-01 06:35:48', '2025-05-01 06:35:48', NULL),
('ST-00012', 'DT-00012', 'ground_sertifikat_1746144754.pdf', '799178', '2025-05-01 17:12:34', '2025-05-01 17:12:34', NULL),
('ST-00013', 'DT-00013', 'ground_sertifikat_1746169761.pdf', '799178', '2025-05-02 00:09:21', '2025-05-02 00:09:21', NULL),
('ST-00014', 'DT-00014', 'ground_sertifikat_1746191983.pdf', '940473', '2025-05-02 06:19:43', '2025-05-02 06:19:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('QqO1wyzj20qo0ZIyFYCwXh76i2lB2gKZUlCC1kJ7', NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUl1bnVIWm1XbXhWQkdiYmZhRnJudEpIV2JKa0xlSWVVQ2pLZVJaViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6MzAwMC9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746326379);

-- --------------------------------------------------------

--
-- Table structure for table `status_kepemilikan`
--

CREATE TABLE `status_kepemilikan` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_status_kepemilikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_kepemilikan`
--

INSERT INTO `status_kepemilikan` (`id`, `nama_status_kepemilikan`, `created_at`, `updated_at`, `deleted_at`) VALUES
('SK-00001', 'Milik Pemerintah', NULL, NULL, NULL),
('SK-00002', 'Milik Perorangan', NULL, NULL, NULL),
('SK-00003', 'Milik Kalurahan', NULL, NULL, NULL),
('SK-00004', 'Milik Sultan', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_tanah`
--

CREATE TABLE `status_tanah` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_status_tanah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_tanah`
--

INSERT INTO `status_tanah` (`id`, `nama_status_tanah`, `created_at`, `updated_at`, `deleted_at`) VALUES
('ST-00001', 'Disewakan', NULL, NULL, NULL),
('ST-00002', 'Tersewa', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tipe_tanah`
--

CREATE TABLE `tipe_tanah` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_tipe_tanah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipe_tanah`
--

INSERT INTO `tipe_tanah` (`id`, `nama_tipe_tanah`, `created_at`, `updated_at`, `deleted_at`) VALUES
('TG-000001', 'Tanah Bengkok', NULL, NULL, NULL),
('TG-000002', 'Tanah Kas Desa', NULL, NULL, NULL),
('TG-000003', 'Tanah Wakaf', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'testingSA', 'testingSuperA@gmail.com', NULL, '$2y$12$WArOdtVDYbIrWnCTTbc6EOEnSn0YqgTaCXIbOw1oB.ramIECGvgmW', NULL, '2025-04-12 12:35:27', '2025-04-12 12:35:27'),
(2, 'testingAdmin', 'testingAdmin@gmail.com', NULL, '$2y$12$JggGiYtS5MIYjqHlW5SYaua8ic5GMTHehKZtMh4r0ckvNY212wat6', NULL, '2025-04-12 12:35:27', '2025-04-12 12:35:27'),
(4, 'cobaAdmin', 'cobaAdmin@gmail.com', NULL, '$2y$12$qH7wYOWzAMY5BK6as9yOgOeZdB8HeNvQrIaUh4YoBJ7JoyJJqraT2', NULL, '2025-04-15 07:18:41', '2025-04-15 07:18:41'),
(5, 'cobaSA', 'cobaSA@gmail.com', NULL, '$2y$12$AlO8c52DV7h0tjDg.O40Rer3DOZHx5VHB1LysVPQ6N2Nty2s9BFKe', NULL, '2025-04-15 21:27:18', '2025-04-15 21:27:18'),
(15, 'test1', 'test1@gmail.com', NULL, '$2y$12$yQPCI0j.GAGHlV6.hgwir.Jkvu26wMKLjMMD0J6qDTbtzBKM3bC6G', NULL, '2025-05-02 08:06:01', '2025-05-02 08:06:01'),
(16, 'test admin 2', 'testAdmin2@gmail.com', NULL, '$2y$12$96oXJlIbpAk6rOlRqnN3vOZA.fjeZ0BCdiVdHbsGyCzI3HDMlkmGC', NULL, '2025-05-03 19:33:35', '2025-05-03 19:33:35'),
(17, 'test admin 3', 'testAdmin3@gmail.com', NULL, '$2y$12$LKtKY6UEnX.4o1K.VTwQpOYiGWx/UZY2TJg9KJdEaPYlkdeqRNIOe', NULL, '2025-05-03 19:34:43', '2025-05-03 19:34:43'),
(18, 'testadmin', 'testadmin@gmail.com', NULL, '$2y$12$WY0aVc.fLpL6Oi9JuvtfMePoSlANoTZVVy6RajNMzJWPuPOqSCrsi', NULL, '2025-05-03 19:38:11', '2025-05-03 19:38:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat_tanah`
--
ALTER TABLE `alamat_tanah`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `detail_tanah`
--
ALTER TABLE `detail_tanah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `detail_tanah_nama_tanah_unique` (`nama_tanah`),
  ADD KEY `detail_tanah_status_kepemilikan_id_foreign` (`status_kepemilikan_id`),
  ADD KEY `detail_tanah_status_tanah_id_foreign` (`status_tanah_id`),
  ADD KEY `detail_tanah_tipe_tanah_id_foreign` (`tipe_tanah_id`),
  ADD KEY `detail_tanah_alamat_id_foreign` (`alamat_id`),
  ADD KEY `detail_tanah_added_by_foreign` (`added_by`),
  ADD KEY `detail_tanah_updated_by_foreign` (`updated_by`),
  ADD KEY `detail_tanah_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `foto_tanah`
--
ALTER TABLE `foto_tanah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `foto_tanah_nama_foto_tanah_unique` (`nama_foto_tanah`),
  ADD KEY `foto_tanah_detail_tanah_id_foreign` (`detail_tanah_id`);

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
-- Indexes for table `marker_tanah`
--
ALTER TABLE `marker_tanah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marker_tanah_detail_tanah_id_foreign` (`detail_tanah_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `polygon_tanah`
--
ALTER TABLE `polygon_tanah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `polygon_tanah_marker_id_foreign` (`marker_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sertifikat_tanah`
--
ALTER TABLE `sertifikat_tanah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sertifikat_tanah_nama_sertifikat_tanah_unique` (`nama_sertifikat_tanah`),
  ADD KEY `sertifikat_tanah_detail_tanah_id_foreign` (`detail_tanah_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `status_kepemilikan`
--
ALTER TABLE `status_kepemilikan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `status_kepemilikan_nama_status_kepemilikan_unique` (`nama_status_kepemilikan`);

--
-- Indexes for table `status_tanah`
--
ALTER TABLE `status_tanah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `status_tanah_nama_status_tanah_unique` (`nama_status_tanah`);

--
-- Indexes for table `tipe_tanah`
--
ALTER TABLE `tipe_tanah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipe_tanah_nama_tipe_tanah_unique` (`nama_tipe_tanah`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_tanah`
--
ALTER TABLE `detail_tanah`
  ADD CONSTRAINT `detail_tanah_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `detail_tanah_alamat_id_foreign` FOREIGN KEY (`alamat_id`) REFERENCES `alamat_tanah` (`id`),
  ADD CONSTRAINT `detail_tanah_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `detail_tanah_status_kepemilikan_id_foreign` FOREIGN KEY (`status_kepemilikan_id`) REFERENCES `status_kepemilikan` (`id`),
  ADD CONSTRAINT `detail_tanah_status_tanah_id_foreign` FOREIGN KEY (`status_tanah_id`) REFERENCES `status_tanah` (`id`),
  ADD CONSTRAINT `detail_tanah_tipe_tanah_id_foreign` FOREIGN KEY (`tipe_tanah_id`) REFERENCES `tipe_tanah` (`id`),
  ADD CONSTRAINT `detail_tanah_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `foto_tanah`
--
ALTER TABLE `foto_tanah`
  ADD CONSTRAINT `foto_tanah_detail_tanah_id_foreign` FOREIGN KEY (`detail_tanah_id`) REFERENCES `detail_tanah` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `marker_tanah`
--
ALTER TABLE `marker_tanah`
  ADD CONSTRAINT `marker_tanah_detail_tanah_id_foreign` FOREIGN KEY (`detail_tanah_id`) REFERENCES `detail_tanah` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `polygon_tanah`
--
ALTER TABLE `polygon_tanah`
  ADD CONSTRAINT `polygon_tanah_marker_id_foreign` FOREIGN KEY (`marker_id`) REFERENCES `marker_tanah` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sertifikat_tanah`
--
ALTER TABLE `sertifikat_tanah`
  ADD CONSTRAINT `sertifikat_tanah_detail_tanah_id_foreign` FOREIGN KEY (`detail_tanah_id`) REFERENCES `detail_tanah` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
