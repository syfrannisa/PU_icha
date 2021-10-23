-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2021 at 03:17 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbj`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_pbj`
--

CREATE TABLE `data_pbj` (
  `id_kpa` int(10) UNSIGNED DEFAULT NULL,
  `id_program` int(10) UNSIGNED DEFAULT NULL,
  `id_kegiatan` int(10) UNSIGNED DEFAULT NULL,
  `id_pptk` int(10) UNSIGNED DEFAULT NULL,
  `id_sub_kegiatan` int(10) UNSIGNED DEFAULT NULL,
  `id_rincian` int(10) UNSIGNED DEFAULT NULL,
  `id_sub_rincian` int(10) UNSIGNED DEFAULT NULL,
  `pagu_anggaran` int(11) DEFAULT NULL,
  `nilai_kontrak` int(11) DEFAULT NULL,
  `pelaksana` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_kontrak` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mulai` date DEFAULT NULL,
  `selesai` date DEFAULT NULL,
  `sistem_pengadaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fisik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rupiah` int(11) DEFAULT NULL,
  `sisa_dana` int(11) DEFAULT NULL,
  `catatan_masalah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_pbj`
--

INSERT INTO `data_pbj` (`id_kpa`, `id_program`, `id_kegiatan`, `id_pptk`, `id_sub_kegiatan`, `id_rincian`, `id_sub_rincian`, `pagu_anggaran`, `nilai_kontrak`, `pelaksana`, `nomor_kontrak`, `mulai`, `selesai`, `sistem_pengadaan`, `fisik`, `rupiah`, `sisa_dana`, `catatan_masalah`, `created_at`, `updated_at`) VALUES
(NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 02:49:42', '2021-10-23 02:49:42'),
(NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 02:50:07', '2021-10-23 02:50:07'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:37:22', '2021-10-23 03:37:22'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:37:36', '2021-10-23 03:37:36'),
(NULL, NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:38:15', '2021-10-23 03:38:15'),
(NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:38:26', '2021-10-23 03:38:26'),
(NULL, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:39:07', '2021-10-23 03:39:07'),
(NULL, NULL, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:39:32', '2021-10-23 03:39:32'),
(NULL, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:39:46', '2021-10-23 03:39:46'),
(NULL, NULL, NULL, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:40:02', '2021-10-23 03:40:02'),
(NULL, NULL, NULL, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:40:15', '2021-10-23 03:40:15'),
(NULL, NULL, NULL, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:40:26', '2021-10-23 03:40:26'),
(NULL, NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:41:22', '2021-10-23 03:41:22'),
(NULL, NULL, NULL, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:41:37', '2021-10-23 03:41:37'),
(NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:42:06', '2021-10-23 03:42:06'),
(NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:42:34', '2021-10-23 03:42:34'),
(NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:43:06', '2021-10-23 03:43:06'),
(NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:43:26', '2021-10-23 03:43:26'),
(NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:43:53', '2021-10-23 03:43:53'),
(NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:44:27', '2021-10-23 03:44:27'),
(NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:46:07', '2021-10-23 03:46:07'),
(NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:52:45', '2021-10-23 03:52:45'),
(NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:53:46', '2021-10-23 03:53:46'),
(NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:55:42', '2021-10-23 03:55:42'),
(NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:56:28', '2021-10-23 03:56:28'),
(NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:56:50', '2021-10-23 03:56:50'),
(NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:57:09', '2021-10-23 03:57:09'),
(NULL, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:57:37', '2021-10-23 03:57:37'),
(NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:58:07', '2021-10-23 03:58:07'),
(NULL, NULL, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:58:43', '2021-10-23 03:58:43'),
(NULL, NULL, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 03:59:39', '2021-10-23 03:59:39'),
(NULL, NULL, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 04:00:40', '2021-10-23 04:00:40'),
(NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 04:01:03', '2021-10-23 04:01:03'),
(NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 04:01:35', '2021-10-23 04:01:35'),
(NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 04:01:52', '2021-10-23 04:01:52'),
(NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 04:03:25', '2021-10-23 04:03:25'),
(NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 04:03:43', '2021-10-23 04:03:43'),
(NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 04:04:04', '2021-10-23 04:04:04'),
(NULL, NULL, NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 04:04:20', '2021-10-23 04:04:20'),
(NULL, NULL, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 04:04:36', '2021-10-23 04:04:36'),
(NULL, NULL, NULL, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 04:04:56', '2021-10-23 04:04:56'),
(NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 04:05:13', '2021-10-23 04:05:13'),
(NULL, NULL, NULL, NULL, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 04:05:29', '2021-10-23 04:05:29'),
(NULL, NULL, NULL, NULL, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 04:05:51', '2021-10-23 04:05:51'),
(NULL, NULL, NULL, NULL, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 04:06:58', '2021-10-23 04:06:58'),
(NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 04:08:24', '2021-10-23 04:08:24'),
(NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 04:08:33', '2021-10-23 04:08:33'),
(NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 04:09:49', '2021-10-23 04:09:49'),
(NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 04:10:09', '2021-10-23 04:10:09'),
(NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 04:10:26', '2021-10-23 04:10:26'),
(NULL, NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 04:11:13', '2021-10-23 04:11:13'),
(NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-23 04:12:00', '2021-10-23 04:12:00'),
(NULL, NULL, NULL, NULL, NULL, NULL, 7, 174603000, 173916574, 'CV.RAKHALINDO ALTAMIRA', '02/SPK-SEKRE/PUPR-PYK/2021', '2021-05-05', '2021-07-09', 'PL', '100', 0, 686426, NULL, '2021-10-23 04:18:22', '2021-10-23 04:18:22'),
(NULL, NULL, NULL, NULL, NULL, NULL, 9, 2143651, 12244567, 'CV.RAKHALINDO ALTAMIRA', '02/SPK-SEKRE/PUPR-PYK/2021', '2021-10-13', '2021-10-13', 'PL', '536', 0, 233, NULL, '2021-10-23 05:21:34', '2021-10-23 05:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_program` int(10) UNSIGNED DEFAULT NULL,
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `id_program`, `nama_kegiatan`, `created_at`, `updated_at`) VALUES
(6, 1, 'Kegiatan Pemeliharaan Barang Milik Daerah Penunjang Urusan Pemerintah Daerah', '2021-10-23 03:52:45', '2021-10-23 03:52:45'),
(7, 3, 'Kegiatan Pengolahan SDA dan Bangunan Pengaman Pantai pada Wilayah Sungai (WS) dalam 1 (satu) Daerah Kabupaten/Kota', '2021-10-23 03:53:46', '2021-10-23 03:53:46'),
(8, 3, 'Kegiatan Pengembangan dan Pengelolaan Sistem Irigasi yang Luasnya dibawah 1000 Ha dalam 1 (satu) Daerah Kabupaten/Kota', '2021-10-23 03:55:42', '2021-10-23 03:55:42'),
(9, 4, 'Pengelolaan dan Pengembangan Sistem Penyediaan Air Minum SPAM di Daerah Kabupaten/Kota', '2021-10-23 03:56:28', '2021-10-23 03:56:28'),
(10, 5, 'Pengelolaan dan Pengembangan Sistem Drainase yang Terhubung Langsung dengan Sungai Dalam Daerah Kabupaten/Kota', '2021-10-23 03:56:50', '2021-10-23 03:56:50'),
(11, 6, 'Kegiatan Penyelenggaraan Insfrastruktur pada Permukaan di Kaawasan Strategis Daerah Kabupaten/Kota', '2021-10-23 03:57:09', '2021-10-23 03:57:09'),
(12, 7, 'Penyelenggaraan Bangunan Gedung di Wilayah Daerah Kabupaten/Kota, Pemberian Izin Mendirikan Bangunan (IMB) dan Sertifikat Laik Fungsi Bangunan Gedung', '2021-10-23 03:57:37', '2021-10-23 03:57:37'),
(13, 8, 'Kegiatan Penyelenggaraan Jalan Kabupaten/Kota', '2021-10-23 03:58:07', '2021-10-23 03:58:07'),
(14, 9, 'Kegiatan Penetapan Rencana Tata Ruangan Wilayah (RTRW) dan Rencana Rinci Tata Ruang (RRTR) Kabupaten/Kota', '2021-10-23 03:58:43', '2021-10-23 03:58:43'),
(15, 9, 'Kegiatan Koordinasi dan Sinkronisasi Perancangan Ruang Daerah Kabupaten/Kota', '2021-10-23 03:59:39', '2021-10-23 03:59:39'),
(16, 9, 'Kegiatan Koordinasi dan Sinkronisasi Pengendalian Pemanfaatan Ruang Daerah Kabupaten/Kota', '2021-10-23 04:00:40', '2021-10-23 04:00:40');

-- --------------------------------------------------------

--
-- Table structure for table `kpa`
--

CREATE TABLE `kpa` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kpa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kpa`
--

INSERT INTO `kpa` (`id`, `nama_kpa`, `created_at`, `updated_at`) VALUES
(1, 'RAJMAN SUNARDI, ST. MT', '2021-10-23 02:31:59', '2021-10-23 02:31:59'),
(2, 'HARLON, M.Si', '2021-10-23 02:32:10', '2021-10-23 02:32:10'),
(3, 'YASRIL, S.ST', '2021-10-23 02:32:21', '2021-10-23 02:32:21'),
(4, 'ERWIN, S.ST,MT', '2021-10-23 03:37:22', '2021-10-23 03:37:22'),
(5, 'EKA DIANA RILVA, ST., M.Eng', '2021-10-23 03:37:36', '2021-10-23 03:37:36');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_10_22_040547_create_kpa_table', 1),
(5, '2021_10_22_040715_create_program_table', 1),
(6, '2021_10_22_043305_create_kegiatan_table', 1),
(7, '2021_10_22_053937_create_pptk_table', 1),
(8, '2021_10_22_071755_create_sub_kegiatan_table', 1),
(9, '2021_10_22_143418_create_rincian_subk_kegiatan', 1),
(10, '2021_10_23_063138_create_sub_rincian_table', 1),
(11, '2021_10_23_065856_create_data_pbj_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pptk`
--

CREATE TABLE `pptk` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kpa` int(10) UNSIGNED DEFAULT NULL,
  `nama_pptk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pptk`
--

INSERT INTO `pptk` (`id`, `id_kpa`, `nama_pptk`, `created_at`, `updated_at`) VALUES
(6, 1, 'YULIANDRI PUTRA, SP', '2021-10-23 02:49:42', '2021-10-23 02:49:42'),
(7, 2, 'NINA MUHANAROH, ST, MT', '2021-10-23 03:38:15', '2021-10-23 03:38:15'),
(8, 2, 'ZUYEN, SST, MPSDA', '2021-10-23 03:38:26', '2021-10-23 03:38:26'),
(11, 3, 'KHAIRUL FAHMI, S.ST', '2021-10-23 03:39:07', '2021-10-23 03:39:07'),
(12, 3, 'NURUL ADHAINI, ST., MT', '2021-10-23 03:39:32', '2021-10-23 03:39:32'),
(13, 3, 'TOMI ARIADI, ST, MT', '2021-10-23 03:39:46', '2021-10-23 03:39:46'),
(14, 4, 'LOREN HARI, ST, MT', '2021-10-23 03:40:02', '2021-10-23 03:40:02'),
(15, 4, 'ILHAM HIDAYAT, ST, MT', '2021-10-23 03:40:15', '2021-10-23 03:40:15'),
(17, 4, 'DAVID PUTRA, ST, M.Eng', '2021-10-23 03:40:26', '2021-10-23 03:40:40'),
(20, 5, 'IVVA CIENNA, ST', '2021-10-23 03:41:22', '2021-10-23 03:41:22'),
(21, 5, 'HANAFI', '2021-10-23 03:41:37', '2021-10-23 03:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kpa` int(10) UNSIGNED DEFAULT NULL,
  `nama_program` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `id_kpa`, `nama_program`, `created_at`, `updated_at`) VALUES
(1, 1, 'Program Penunjang Urusan Pemerintah Daerah Kabupaten/Kota', '2021-10-23 02:50:07', '2021-10-23 02:50:07'),
(3, 2, 'Program Pengolahan Sumber Daya Air', '2021-10-23 03:42:06', '2021-10-23 03:42:06'),
(4, 3, 'Program Pengelolaan dan Pengembangan Sistem Air Minum', '2021-10-23 03:42:34', '2021-10-23 03:42:34'),
(5, 3, 'Progman Pengelolaan dan Pengembangan Sistem Drainase', '2021-10-23 03:43:06', '2021-10-23 03:43:06'),
(6, 3, 'Program Pengembangan Pemukiman', '2021-10-23 03:43:26', '2021-10-23 03:43:26'),
(7, 3, 'Program Penataan Bangunan Gedung', '2021-10-23 03:43:53', '2021-10-23 03:43:53'),
(8, 4, 'Program Penyelengaraan Jalan', '2021-10-23 03:44:26', '2021-10-23 03:44:26'),
(9, 5, 'Program Penyelenggaraan Penataan Ruang', '2021-10-23 03:46:07', '2021-10-23 03:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_subk_kegiatan`
--

CREATE TABLE `rincian_subk_kegiatan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_sub_kegiatan` int(10) UNSIGNED DEFAULT NULL,
  `nama_rincian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rincian_subk_kegiatan`
--

INSERT INTO `rincian_subk_kegiatan` (`id`, `id_sub_kegiatan`, `nama_rincian`, `created_at`, `updated_at`) VALUES
(2, 2, '1 Rehabilitasi Gedung', '2021-10-23 04:08:24', '2021-10-23 04:08:24'),
(3, 2, '2 Perencanaan Kostruksi Gedung Negara Sederhana', '2021-10-23 04:08:33', '2021-10-23 04:08:33'),
(4, 3, '1 Konsultasi Jasa Penilai Publik (KJPP) Ganti Wajar Tanah I', '2021-10-23 04:09:49', '2021-10-23 04:09:49'),
(5, 3, '2 Konsultasi Jasa Penilai Publik (KJPP) Ganti Wajar Tanah III', '2021-10-23 04:10:09', '2021-10-23 04:10:09'),
(6, 3, '3 Konsultasi Jasa Penilai Publik (KJPP) Ganti Wajar Tanah III', '2021-10-23 04:10:25', '2021-10-23 04:10:25'),
(7, 3, '4 Pembukaan Jalan Inspeksi Sungai Batang Agam', '2021-10-23 04:11:12', '2021-10-23 04:11:12'),
(8, 3, '5 Normalisasi dan Pengendalian Banjir Sungai Batang Agam', '2021-10-23 04:12:00', '2021-10-23 04:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kegiatan`
--

CREATE TABLE `sub_kegiatan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pptk` int(10) UNSIGNED DEFAULT NULL,
  `subkgt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_kegiatan`
--

INSERT INTO `sub_kegiatan` (`id`, `id_pptk`, `subkgt`, `created_at`, `updated_at`) VALUES
(2, 6, 'Pemeliharaan/Rehabilitasi Gedung Kantor dan Bangunan Lainnya', '2021-10-23 04:01:03', '2021-10-23 04:01:03'),
(3, 7, 'Pembangunan Bangunan Perkuatan Tebing', '2021-10-23 04:01:35', '2021-10-23 04:01:35'),
(4, 8, 'Rehabilitas Jaringan Irigasi Permukaan', '2021-10-23 04:01:52', '2021-10-23 04:01:52'),
(7, 12, 'Pembangunan dan Pengembangan Insfrastruktur Kawasan Permukiman di Kawasan Strategi Daerah Kabupaten/Kota', '2021-10-23 04:03:25', '2021-10-23 04:03:25'),
(8, 13, 'Perencanaan, Pembangunan,Pengawasan, dan Pemanfaatan Banguanan Gedung Daerah Kabupaten/Kota', '2021-10-23 04:03:43', '2021-10-23 04:03:43'),
(9, 14, 'Pengadaan Tanah', '2021-10-23 04:04:04', '2021-10-23 04:04:04'),
(10, 15, 'Pengelolaan Leger Jalan', '2021-10-23 04:04:20', '2021-10-23 04:04:20'),
(11, 17, 'Survey Kondisi Jalan/Jembatan', '2021-10-23 04:04:36', '2021-10-23 04:04:36'),
(12, 14, 'Pembangunan Jalan', '2021-10-23 04:04:56', '2021-10-23 04:04:56'),
(13, 14, 'Pelebaran Jalan Menuju Strandar', '2021-10-23 04:05:13', '2021-10-23 04:05:13'),
(14, 14, 'Rekonstruksi Jalan', '2021-10-23 04:05:29', '2021-10-23 04:05:29'),
(15, 17, 'Pemeliharaan Berkala Jalan', '2021-10-23 04:05:51', '2021-10-23 04:05:51'),
(18, 21, 'Koordinasi dan Sinkronisasi Pemberian Insentif dan Disisentif Bidang Penataan Ruang', '2021-10-23 04:06:58', '2021-10-23 04:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `sub_rincian`
--

CREATE TABLE `sub_rincian` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_rincian` int(10) UNSIGNED DEFAULT NULL,
  `nama_sub_rincian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_rincian`
--

INSERT INTO `sub_rincian` (`id`, `id_rincian`, `nama_sub_rincian`, `created_at`, `updated_at`) VALUES
(7, 2, NULL, '2021-10-23 04:18:21', '2021-10-23 04:18:21'),
(9, 3, 'jalan', '2021-10-23 05:21:34', '2021-10-23 05:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_pbj`
--
ALTER TABLE `data_pbj`
  ADD KEY `data_pbj_id_kpa_foreign` (`id_kpa`),
  ADD KEY `data_pbj_id_program_foreign` (`id_program`),
  ADD KEY `data_pbj_id_kegiatan_foreign` (`id_kegiatan`),
  ADD KEY `data_pbj_id_pptk_foreign` (`id_pptk`),
  ADD KEY `data_pbj_id_sub_kegiatan_foreign` (`id_sub_kegiatan`),
  ADD KEY `data_pbj_id_rincian_foreign` (`id_rincian`),
  ADD KEY `data_pbj_id_sub_rincian_foreign` (`id_sub_rincian`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kegiatan_id_program_foreign` (`id_program`);

--
-- Indexes for table `kpa`
--
ALTER TABLE `kpa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pptk`
--
ALTER TABLE `pptk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pptk_id_kpa_foreign` (`id_kpa`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_id_kpa_foreign` (`id_kpa`);

--
-- Indexes for table `rincian_subk_kegiatan`
--
ALTER TABLE `rincian_subk_kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rincian_subk_kegiatan_id_sub_kegiatan_foreign` (`id_sub_kegiatan`);

--
-- Indexes for table `sub_kegiatan`
--
ALTER TABLE `sub_kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_kegiatan_id_pptk_foreign` (`id_pptk`);

--
-- Indexes for table `sub_rincian`
--
ALTER TABLE `sub_rincian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_rincian_id_rincian_foreign` (`id_rincian`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kpa`
--
ALTER TABLE `kpa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pptk`
--
ALTER TABLE `pptk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rincian_subk_kegiatan`
--
ALTER TABLE `rincian_subk_kegiatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_kegiatan`
--
ALTER TABLE `sub_kegiatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sub_rincian`
--
ALTER TABLE `sub_rincian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_pbj`
--
ALTER TABLE `data_pbj`
  ADD CONSTRAINT `data_pbj_id_kegiatan_foreign` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_pbj_id_kpa_foreign` FOREIGN KEY (`id_kpa`) REFERENCES `kpa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_pbj_id_pptk_foreign` FOREIGN KEY (`id_pptk`) REFERENCES `pptk` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_pbj_id_program_foreign` FOREIGN KEY (`id_program`) REFERENCES `program` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_pbj_id_rincian_foreign` FOREIGN KEY (`id_rincian`) REFERENCES `rincian_subk_kegiatan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_pbj_id_sub_kegiatan_foreign` FOREIGN KEY (`id_sub_kegiatan`) REFERENCES `sub_kegiatan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_pbj_id_sub_rincian_foreign` FOREIGN KEY (`id_sub_rincian`) REFERENCES `sub_rincian` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_id_program_foreign` FOREIGN KEY (`id_program`) REFERENCES `program` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pptk`
--
ALTER TABLE `pptk`
  ADD CONSTRAINT `pptk_id_kpa_foreign` FOREIGN KEY (`id_kpa`) REFERENCES `kpa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_id_kpa_foreign` FOREIGN KEY (`id_kpa`) REFERENCES `kpa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rincian_subk_kegiatan`
--
ALTER TABLE `rincian_subk_kegiatan`
  ADD CONSTRAINT `rincian_subk_kegiatan_id_sub_kegiatan_foreign` FOREIGN KEY (`id_sub_kegiatan`) REFERENCES `sub_kegiatan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_kegiatan`
--
ALTER TABLE `sub_kegiatan`
  ADD CONSTRAINT `sub_kegiatan_id_pptk_foreign` FOREIGN KEY (`id_pptk`) REFERENCES `pptk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_rincian`
--
ALTER TABLE `sub_rincian`
  ADD CONSTRAINT `sub_rincian_id_rincian_foreign` FOREIGN KEY (`id_rincian`) REFERENCES `rincian_subk_kegiatan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
