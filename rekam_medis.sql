-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jun 2022 pada 14.00
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekam_medis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_05_10_191044_create_t_user_table', 1),
(3, '2022_05_10_191738_add_status_user_to_t_user_table', 1),
(4, '2022_05_11_163639_create_t_pasien', 1),
(5, '2022_05_13_140256_create_obats_table', 1),
(6, '2022_05_14_115311_create_polikliniks_table', 1),
(7, '2022_05_14_124539_create_t_dokter', 1),
(8, '2022_05_15_120530_create_rekam_medis_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_dokter`
--

CREATE TABLE `t_dokter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_dokter` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spesialis` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_poli` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_dokter`
--

INSERT INTO `t_dokter` (`id`, `nama_dokter`, `spesialis`, `no_telp`, `alamat`, `id_poli`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'Akaza uchihaaa', 'jantung', '09898922', 'Jogodayuh', 1, 3, '2022-06-04 08:13:57', '2022-06-05 00:49:47'),
(2, 'John doe', 'kepala', '08921626', 'madiun', 1, 4, '2022-06-04 08:13:57', '2022-06-04 08:13:57'),
(3722, 'deka pramesta', 'Gusi', '09889347928', 'Jogodayuh', 2, 8, '2022-06-04 14:44:54', '2022-06-04 14:44:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_obat`
--

CREATE TABLE `t_obat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_obat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_obat`
--

INSERT INTO `t_obat` (`id`, `nama_obat`, `harga`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Paramex', '7000', 'Obat Pusing Kepala', '2022-06-04 08:13:57', '2022-06-04 08:13:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pasien`
--

CREATE TABLE `t_pasien` (
  `id_pasien` bigint(20) UNSIGNED NOT NULL,
  `no_rm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pasien` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Pria','Wanita') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_pasien`
--

INSERT INTO `t_pasien` (`id_pasien`, `no_rm`, `nama_pasien`, `gender`, `nik`, `no_telp`, `alamat`, `ttl`, `pekerjaan`, `pendidikan`, `status`, `agama`, `created_at`, `updated_at`) VALUES
(1, 'RM002192', 'mamad', 'Pria', '1212918', '0867237236', 'nglanduk', 'madiun 12-november-2000', 'mahasiswa', 'sma', 'Menikah', 'islam', '2022-06-04 08:13:57', '2022-06-04 08:13:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_poliklinik`
--

CREATE TABLE `t_poliklinik` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_poliklinik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gedung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_poliklinik`
--

INSERT INTO `t_poliklinik` (`id`, `nama_poliklinik`, `gedung`, `created_at`, `updated_at`) VALUES
(1, 'Poli anak', 'Lt 3', '2022-06-04 08:13:57', '2022-06-04 08:13:57'),
(2, 'Poli GIgi', 'lt 2', '2022-06-04 13:38:40', '2022-06-04 13:38:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_rekammedis`
--

CREATE TABLE `t_rekammedis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pasien` bigint(20) UNSIGNED NOT NULL,
  `keluhan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosa` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tindakan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resep_obat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_dokter` bigint(20) UNSIGNED NOT NULL,
  `id_poli` bigint(20) UNSIGNED NOT NULL,
  `tgl_periksa` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_rekammedis`
--

INSERT INTO `t_rekammedis` (`id`, `id_pasien`, `keluhan`, `diagnosa`, `tindakan`, `resep_obat`, `id_dokter`, `id_poli`, `tgl_periksa`, `created_at`, `updated_at`) VALUES
(1, 1, 'Panas', 'migrain', 'diperiksa', 'Paracetamol', 1, 1, '2022-05-17', '2022-06-04 08:13:57', '2022-06-04 08:13:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_user` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id`, `username`, `password`, `foto`, `level`, `created_at`, `updated_at`, `status_user`) VALUES
(1, 'deka', '$2y$10$OApBulHs1JgIsO8kPN.b0.fBH9dNXBTfiBkpxuXkXJVBaU3nE7jDC', '4443.jpg', 1, '2022-06-04 08:13:57', '2022-06-04 13:04:22', 1),
(2, 'admin', '$2y$10$uRjMyOnAjjsypR7Mi1LPXOoPNrtJTu4WjLcZSLKHXFv7ehrE2/88y', '6332.jpg', 2, '2022-06-04 08:13:57', '2022-06-04 12:50:14', 1),
(3, 'akaza', '$2y$10$cntZeukNlWV7ZoLmM50YZ.HEXbzBeoha6fx5mOrDf/kemlr2UrhWq', '1373.jpg', 3, '2022-06-04 08:13:57', '2022-06-04 13:07:10', 1),
(4, 'patrick', '$2y$10$X4kx715dZBvONWwV3bxzbOaKZjR7f.DamD8o9QAPQyJpsPAMLxgzu', NULL, 3, '2022-06-04 08:13:57', '2022-06-04 08:13:57', 1),
(8, 'pramesta', '$2y$10$ODdcXg6PFxprCsedXIzKhOxktB3g/lv6jGtCsw8PfQmKjnoOurrQi', NULL, 3, '2022-06-04 14:44:54', '2022-06-04 14:44:54', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `t_dokter`
--
ALTER TABLE `t_dokter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_dokter_id_poli_foreign` (`id_poli`),
  ADD KEY `t_dokter_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `t_obat`
--
ALTER TABLE `t_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_pasien`
--
ALTER TABLE `t_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `t_poliklinik`
--
ALTER TABLE `t_poliklinik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_rekammedis`
--
ALTER TABLE `t_rekammedis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_rekammedis_id_pasien_foreign` (`id_pasien`),
  ADD KEY `t_rekammedis_id_dokter_foreign` (`id_dokter`),
  ADD KEY `t_rekammedis_id_poli_foreign` (`id_poli`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `t_user_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_obat`
--
ALTER TABLE `t_obat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_pasien`
--
ALTER TABLE `t_pasien`
  MODIFY `id_pasien` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_poliklinik`
--
ALTER TABLE `t_poliklinik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_rekammedis`
--
ALTER TABLE `t_rekammedis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_dokter`
--
ALTER TABLE `t_dokter`
  ADD CONSTRAINT `t_dokter_id_poli_foreign` FOREIGN KEY (`id_poli`) REFERENCES `t_poliklinik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_dokter_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_rekammedis`
--
ALTER TABLE `t_rekammedis`
  ADD CONSTRAINT `t_rekammedis_id_dokter_foreign` FOREIGN KEY (`id_dokter`) REFERENCES `t_dokter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_rekammedis_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `t_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_rekammedis_id_poli_foreign` FOREIGN KEY (`id_poli`) REFERENCES `t_poliklinik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
