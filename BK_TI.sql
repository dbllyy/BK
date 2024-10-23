-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Okt 2024 pada 19.02
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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
-- Struktur dari tabel `berita_acaras`
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
-- Struktur dari tabel `cabangs`
--

CREATE TABLE `cabangs` (
  `No_Cabang` bigint(20) NOT NULL,
  `Nama_Cabang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cabangs`
--

INSERT INTO `cabangs` (`No_Cabang`, `Nama_Cabang`) VALUES
(1, 'Kantor Pusat'),
(100, 'Kantor Cabang Utama Palangka Raya'),
(101, 'Capem Pasar Baru'),
(102, 'Capem Pasar Kahayan'),
(103, 'Cabang Kuala Kurun'),
(104, 'Capem Tumbang Samba'),
(105, 'Cabang Kasongan '),
(106, 'Capem Tangkiling'),
(107, 'Capem Tewah'),
(108, 'Capem Pegatan'),
(109, 'Capem Pujon'),
(110, 'Kantor Kas Samsat'),
(111, 'Kantor Kas RSUD Doris'),
(112, 'Kantor Kas Walikota'),
(113, 'Capem Tumbang Jutuh'),
(114, 'Capem Sei Hanyo'),
(115, 'Kas Kantor Gubernur'),
(116, 'Capem Telaken'),
(117, 'Capem Tbg. Miri'),
(118, 'Capem Rajawali'),
(119, 'Capem Tumbang Hiran'),
(120, 'Capem Sepang'),
(121, 'Capem Kereng Pangi'),
(200, 'Cabang Buntok'),
(201, 'Capem Ampah'),
(202, 'Cabang Tamiang Layang'),
(203, 'Capem Patas'),
(300, 'Cabang Sampit'),
(301, 'Cabang Kuala Pembuang'),
(302, 'Capem Parenggean'),
(303, 'Capem Simpang Sebabi'),
(304, 'Capem Samuda'),
(305, 'Capem Rantau Pulut'),
(306, 'Capem Pundu'),
(400, 'Cabang Pangkalan Bun'),
(401, 'Cabang Sukamara'),
(402, 'Capem Pembuang Hulu'),
(403, 'Cabang Nanga Bulik'),
(404, 'Capem Kumai'),
(405, 'Capem Karang Mulya'),
(406, 'Capem Kolam'),
(407, 'Capem Bukit Raya'),
(408, 'Kas Despot'),
(409, 'Capem Balai Riam'),
(500, 'Cabang Muara Teweh'),
(501, 'Cabang Puruk Cahu'),
(502, 'Capem Muara Laung'),
(503, 'Capem Kandui'),
(504, 'Capem Tumbang Lahung'),
(600, 'Cabang Kuala Kapuas'),
(601, 'Cabang Pulang Pisau'),
(602, 'Capem Bahaur'),
(603, 'Capem Timpah'),
(987, 'Divisi Pemasaran'),
(988, 'Divisi Umum'),
(989, 'Divisi Strategy & Initiative Management Office'),
(990, 'Divisi SDM dan Umum'),
(991, 'Divisi Audit Intern'),
(992, 'Divisi Perencana dan Corporate Secretary'),
(993, 'Divisi Manajemen Risiko'),
(994, 'Divisi Operasional dan Layanan'),
(995, 'Divisi Bisnis'),
(996, 'Divisi Kepatuhan'),
(997, 'Divisi Treasury'),
(998, 'Divisi Akuntansi'),
(999, 'Divisi Teknologi Informasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('ada|127.0.0.1', 'i:1;', 1728484047),
('ada|127.0.0.1:timer', 'i:1728484047;', 1728484047);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `job_batches`
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
-- Struktur dari tabel `komputers`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
-- Struktur dari tabel `services`
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
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('LSXRqVsdLsrETqb632XjfXCZBtFSgMHLgemZwqH7', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYnJNaXg4b2RBVHVtNnozQ0FaeE5UUjZubG1NWlhEcmlseFBYaHh0MCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1729610270);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`NIP`, `Nama_Staff`, `Role`, `password`, `created_at`, `updated_at`) VALUES
('123456789', 'admin', 'admin', '$2y$12$uJH1ut1vbDsLRna/pMS5MOB8.q.uTzaRqb3SQITqBglz1KZipn1Ey', '2024-10-11 02:31:35', '2024-10-11 02:31:35'),
('2354548', 'staff', 'staff', '$2y$12$XBQJ1DJVEmJeFSLh4C1fRup4TwWd6olnUox.6uwgA5pY5z.LL5Dma', '2024-10-20 20:17:50', '2024-10-20 20:23:14');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita_acaras`
--
ALTER TABLE `berita_acaras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berita_acaras_nip_foreign` (`NIP`),
  ADD KEY `berita_acaras_komputer_id_foreign` (`komputer_id`),
  ADD KEY `berita_acaras_cabang_id_foreign` (`cabang_id`);

--
-- Indeks untuk tabel `cabangs`
--
ALTER TABLE `cabangs`
  ADD PRIMARY KEY (`No_Cabang`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komputers`
--
ALTER TABLE `komputers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komputers_cabang_id_foreign` (`cabang_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_nip_foreign` (`NIP`),
  ADD KEY `services_komputer_id_foreign` (`Komputer_ID`),
  ADD KEY `services_cabang_id_foreign` (`Cabang_ID`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`NIP`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita_acaras`
--
ALTER TABLE `berita_acaras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cabangs`
--
ALTER TABLE `cabangs`
  MODIFY `No_Cabang` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `komputers`
--
ALTER TABLE `komputers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita_acaras`
--
ALTER TABLE `berita_acaras`
  ADD CONSTRAINT `berita_acaras_komputer_id_foreign` FOREIGN KEY (`komputer_id`) REFERENCES `komputers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `berita_acaras_nip_foreign` FOREIGN KEY (`NIP`) REFERENCES `users` (`NIP`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_komputer_id_foreign` FOREIGN KEY (`Komputer_ID`) REFERENCES `komputers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `services_nip_foreign` FOREIGN KEY (`NIP`) REFERENCES `users` (`NIP`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
