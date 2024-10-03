-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2024 at 11:31 AM
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
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita_acaras`
--

CREATE TABLE `berita_acaras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `komputer_id` bigint(20) UNSIGNED NOT NULL,
  `cabang_id` bigint(20) UNSIGNED NOT NULL,
  `NIP` varchar(255) NOT NULL,
  `merek` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `keterangan` enum('bisa diambil','dikembalikan') DEFAULT NULL,
  `tgl_di_ambil` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cabangs`
--

CREATE TABLE `cabangs` (
  `No_Cabang` bigint(20) UNSIGNED NOT NULL,
  `Nama_Cabang` varchar(255) NOT NULL,
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
-- Table structure for table `komputers`
--

CREATE TABLE `komputers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cabang_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kondisi` enum('baru','second') NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(4, '2024_10_02_071635_create_cabang_table', 2),
(5, '2024_10_03_034822_create_komputers_table', 3),
(7, '2024_10_03_041015_create_services_table', 4),
(8, '2024_10_03_091138_create__berita_acara_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NIP` varchar(255) NOT NULL,
  `Komputer_ID` bigint(20) UNSIGNED NOT NULL,
  `Cabang_ID` bigint(20) UNSIGNED NOT NULL,
  `Merek` varchar(255) NOT NULL,
  `Service` enum('install OS','service khusus','jaringan','full service') NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Di_Kerjakan` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('cg09o2shD2gocWsNi9D8WXu0bAwNX38AL9G8pPzO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:130.0) Gecko/20100101 Firefox/130.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZ2pqWnF1VzZWVEtOVklQRnZvUDlxOEtFVzdzYUZLbVpPQlUxeUZKNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9rb21wdXRlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyIjt9fQ==', 1727853318),
('MCws0UXXjqCzEcRgIBB2XDUVkBG35WNwsNylUEmp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:130.0) Gecko/20100101 Firefox/130.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRXBzdm5VQk80MkYydHBKZTJJMndkNWFPRW5RTXlDUE91aWxOWXRrWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zZXJ2aWNlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1727928303),
('1Prugi4tU5qZKtJn52xHozJ1Zdd6bbkFWIG8IKw5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:130.0) Gecko/20100101 Firefox/130.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZkJTMlpPT1RpSHB4RU9uZkdIQlZ0WkJGR09LcmI5UGhnQTdEZ2FXaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1727943329),
('OzUyKjA1aHTthyHAOo4H6zXsMIOej9yqChTwOXSU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:130.0) Gecko/20100101 Firefox/130.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOEJWMU4zeGoxZGMzbU1zdUJUOG82WDQ5UVdaQk5LdHdzWDZ5VTVHQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1727947733);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `NIP` varchar(255) NOT NULL,
  `Nama_Staff` varchar(255) NOT NULL,
  `Role` enum('admin','staff') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`NIP`, `Nama_Staff`, `Role`, `password`, `created_at`, `updated_at`) VALUES
('123456789', 'admin', 'admin', '$2y$12$pZIOsMYm/jjUJ27t8O37ruSuLoslqbpCZoEa4W8a/SfPBGieDCLuW', '2024-10-01 21:12:56', '2024-10-01 21:12:56'),
('987654321', 'staff', 'staff', '$2y$12$hFSrVDRTgKvDbPQw3N3zou/P6jc.3Qg6jckSjHhS40hSSBHYHifdS', '2024-10-01 21:12:56', '2024-10-01 21:12:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita_acaras`
--
ALTER TABLE `berita_acaras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berita_acaras_nip_foreign` (`NIP`),
  ADD KEY `berita_acaras_komputer_id_foreign` (`komputer_id`),
  ADD KEY `berita_acaras_cabang_id_foreign` (`cabang_id`);

--
-- Indexes for table `cabangs`
--
ALTER TABLE `cabangs`
  ADD PRIMARY KEY (`No_Cabang`);

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
-- Indexes for table `komputers`
--
ALTER TABLE `komputers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komputers_cabang_id_foreign` (`cabang_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_nip_foreign` (`NIP`),
  ADD KEY `services_komputer_id_foreign` (`Komputer_ID`),
  ADD KEY `services_cabang_id_foreign` (`Cabang_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`NIP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita_acaras`
--
ALTER TABLE `berita_acaras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cabangs`
--
ALTER TABLE `cabangs`
  MODIFY `No_Cabang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komputers`
--
ALTER TABLE `komputers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita_acaras`
--
ALTER TABLE `berita_acaras`
  ADD CONSTRAINT `berita_acaras_cabang_id_foreign` FOREIGN KEY (`cabang_id`) REFERENCES `cabangs` (`No_Cabang`) ON DELETE CASCADE,
  ADD CONSTRAINT `berita_acaras_komputer_id_foreign` FOREIGN KEY (`komputer_id`) REFERENCES `komputers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `berita_acaras_nip_foreign` FOREIGN KEY (`NIP`) REFERENCES `users` (`NIP`) ON DELETE CASCADE;

--
-- Constraints for table `komputers`
--
ALTER TABLE `komputers`
  ADD CONSTRAINT `komputers_cabang_id_foreign` FOREIGN KEY (`cabang_id`) REFERENCES `cabangs` (`No_Cabang`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_cabang_id_foreign` FOREIGN KEY (`Cabang_ID`) REFERENCES `cabangs` (`No_Cabang`) ON DELETE CASCADE,
  ADD CONSTRAINT `services_komputer_id_foreign` FOREIGN KEY (`Komputer_ID`) REFERENCES `komputers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `services_nip_foreign` FOREIGN KEY (`NIP`) REFERENCES `users` (`NIP`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
