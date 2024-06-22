-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jun 2024 pada 10.39
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kel2_laravel_fix`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `atur_pesanans`
--

CREATE TABLE `atur_pesanans` (
  `atur_pesanan` bigint(20) UNSIGNED NOT NULL,
  `parfum` enum('downy','kispray','repika','molto') NOT NULL,
  `antar_jemput` enum('iya','tidak') NOT NULL,
  `diskon` enum('2000','5000') NOT NULL,
  `proses_pesanan` enum('antrian','siap ambil','belum bayar') NOT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `atur_pesanans`
--

INSERT INTO `atur_pesanans` (`atur_pesanan`, `parfum`, `antar_jemput`, `diskon`, `proses_pesanan`, `catatan`, `created_at`, `updated_at`) VALUES
(2, 'downy', 'iya', '5000', 'antrian', 'reer', '2024-06-21 23:31:53', '2024-06-21 23:31:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `durasis`
--

CREATE TABLE `durasis` (
  `id_durasi` bigint(20) UNSIGNED NOT NULL,
  `jenis_durasi` varchar(255) NOT NULL,
  `waktu_durasi` varchar(255) NOT NULL,
  `harga_durasi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `durasis`
--

INSERT INTO `durasis` (`id_durasi`, `jenis_durasi`, `waktu_durasi`, `harga_durasi`, `created_at`, `updated_at`) VALUES
(1, 'Kilat', '6 jam', 20000, '2024-06-21 02:35:42', '2024-06-21 02:35:42'),
(2, 'Ekspress', '24 jam', 15000, '2024-06-21 02:36:18', '2024-06-21 02:36:18'),
(3, 'Reguler', '72 jam', 10000, '2024-06-21 02:37:06', '2024-06-21 22:02:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_pesanans`
--

CREATE TABLE `item_pesanans` (
  `id_item_pesanan` bigint(20) UNSIGNED NOT NULL,
  `nama_item` text NOT NULL,
  `harga_item` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `item_pesanans`
--

INSERT INTO `item_pesanans` (`id_item_pesanan`, `nama_item`, `harga_item`, `created_at`, `updated_at`) VALUES
(1, 'Baju', 3000, '2024-06-21 02:40:14', '2024-06-21 02:40:14'),
(2, 'Celana', 4000, '2024-06-21 02:40:27', '2024-06-21 02:40:27'),
(3, 'Jacket', 6000, '2024-06-21 02:40:46', '2024-06-21 02:40:46'),
(4, 'Bad Cover Single', 10000, '2024-06-21 02:41:17', '2024-06-21 02:41:17'),
(5, 'Bad Cover Double', 20000, '2024-06-21 02:41:36', '2024-06-21 02:41:36'),
(6, 'Sprei Single', 7000, '2024-06-21 02:42:05', '2024-06-21 02:42:05'),
(7, 'Sprei Double', 12000, '2024-06-21 02:42:17', '2024-06-21 02:42:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanans`
--

CREATE TABLE `layanans` (
  `id_layanan` bigint(20) UNSIGNED NOT NULL,
  `nama_layanan` varchar(255) NOT NULL,
  `harga_layanan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `layanans`
--

INSERT INTO `layanans` (`id_layanan`, `nama_layanan`, `harga_layanan`, `created_at`, `updated_at`) VALUES
(1, 'cuci + setrika', 18000, '2024-06-21 02:37:48', '2024-06-21 02:37:48'),
(2, 'Setrika', 6000, '2024-06-21 02:38:16', '2024-06-21 02:38:16'),
(3, 'Cuci', 12000, '2024-06-21 02:38:42', '2024-06-21 02:38:42');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2024_06_12_132728_create_pelanggans_table', 2),
(3, '2024_06_12_132729_create_durasis_table', 3),
(4, '2024_06_12_132729_create_layanans_table', 4),
(5, '2024_06_14_131521_create_item_pesanans_table', 5),
(6, '2024_06_15_084325_create_table_kiloan', 6),
(7, '2024_06_16_082627_create_atur_pesanans_table', 7),
(8, '2024_06_16_083219_create_pesanan_kilos_table', 8),
(9, '2024_06_12_132729_create_pesanans_table', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id_pelanggan` bigint(20) UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `nomer_hp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelanggans`
--

INSERT INTO `pelanggans` (`id_pelanggan`, `nama_pelanggan`, `nomer_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'jamal', '092091830042', 'karawang', '2024-06-21 02:32:10', '2024-06-21 22:16:49'),
(2, 'adhitya', '081212162723', 'pwk', '2024-06-21 02:34:52', '2024-06-21 02:34:52'),
(3, 'agung', '081212162724', 'purwakarta', '2024-06-21 09:09:08', '2024-06-21 09:09:08'),
(4, 'agung', '081212162724', 'purwakarta', '2024-06-21 09:17:09', '2024-06-21 09:17:09'),
(5, 'agung', '081212162724', 'purwakarta', '2024-06-21 09:17:23', '2024-06-21 09:17:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pelanggan` bigint(20) UNSIGNED NOT NULL,
  `id_layanan` bigint(20) UNSIGNED NOT NULL,
  `id_durasi` bigint(20) UNSIGNED NOT NULL,
  `id_item_pesanan` bigint(20) UNSIGNED NOT NULL,
  `atur_pesanan` bigint(20) UNSIGNED NOT NULL,
  `harga_pesanan` int(11) NOT NULL,
  `nota_satuan` varchar(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanans`
--

INSERT INTO `pesanans` (`id`, `id_pelanggan`, `id_layanan`, `id_durasi`, `id_item_pesanan`, `atur_pesanan`, `harga_pesanan`, `nota_satuan`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 1, 1, 2, 20000, 'NOTAsatuan', '2024-06-21 23:54:59', '2024-06-21 23:54:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_kilo`
--

CREATE TABLE `pesanan_kilo` (
  `id_pesanan_kilo` bigint(20) UNSIGNED NOT NULL,
  `id_pelanggan` bigint(20) UNSIGNED NOT NULL,
  `id_layanan` bigint(20) UNSIGNED NOT NULL,
  `id_durasi` bigint(20) UNSIGNED NOT NULL,
  `atur_pesanan` bigint(20) UNSIGNED NOT NULL,
  `nota_kiloan` varchar(11) NOT NULL,
  `harga_kilo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanan_kilo`
--

INSERT INTO `pesanan_kilo` (`id_pesanan_kilo`, `id_pelanggan`, `id_layanan`, `id_durasi`, `atur_pesanan`, `nota_kiloan`, `harga_kilo`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 1, 2, '002', 20000, '2024-06-21 23:55:18', '2024-06-21 23:55:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kilo`
--

CREATE TABLE `tbl_kilo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kilo` int(11) NOT NULL,
  `harga_kilo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_kilo`
--

INSERT INTO `tbl_kilo` (`id`, `kilo`, `harga_kilo`, `created_at`, `updated_at`) VALUES
(1, 1, 7000, '2024-06-21 02:42:56', '2024-06-21 23:10:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `no_hp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, 'udin', 'adhitya@gmail.com', '$2y$12$DVhB7.qknRXxvjGgoAu12.Biiym/bjsLG480n5KO2TToBrzu3PuaK', 'user', '082125932957', '2024-06-21 02:19:54', '2024-06-21 02:19:54'),
(3, 'admin', 'admin@gmail.com', '$2y$12$sVfCjEyoEtw05Rz7Ht3cw.osol0AmmbL.Ud0oaEMs/YANObttpY5O', 'admin', '082125932957', '2024-06-21 02:34:22', '2024-06-21 02:34:22'),
(4, 'qodrat', 'qodrat@gmail.com', '$2y$12$GkhqmdQYZDmARpmbN05GJexYOQA8One2F1IQhIvmmWrK46bo8LDtS', 'user', '085612344321', '2024-06-21 09:00:52', '2024-06-21 09:00:52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `atur_pesanans`
--
ALTER TABLE `atur_pesanans`
  ADD PRIMARY KEY (`atur_pesanan`);

--
-- Indeks untuk tabel `durasis`
--
ALTER TABLE `durasis`
  ADD PRIMARY KEY (`id_durasi`);

--
-- Indeks untuk tabel `item_pesanans`
--
ALTER TABLE `item_pesanans`
  ADD PRIMARY KEY (`id_item_pesanan`);

--
-- Indeks untuk tabel `layanans`
--
ALTER TABLE `layanans`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanans_id_pelanggan_foreign` (`id_pelanggan`),
  ADD KEY `pesanans_id_layanan_foreign` (`id_layanan`),
  ADD KEY `pesanans_id_durasi_foreign` (`id_durasi`),
  ADD KEY `pesanans_atur_pesanan_foreign` (`atur_pesanan`),
  ADD KEY `pesanans_id_item_pesanan_foreign` (`id_item_pesanan`);

--
-- Indeks untuk tabel `pesanan_kilo`
--
ALTER TABLE `pesanan_kilo`
  ADD PRIMARY KEY (`id_pesanan_kilo`),
  ADD KEY `pesanan_kilo_id_pelanggan_foreign` (`id_pelanggan`),
  ADD KEY `pesanan_kilo_id_layanan_foreign` (`id_layanan`),
  ADD KEY `pesanan_kilo_id_durasi_foreign` (`id_durasi`),
  ADD KEY `pesanan_kilo_atur_pesanan_foreign` (`atur_pesanan`);

--
-- Indeks untuk tabel `tbl_kilo`
--
ALTER TABLE `tbl_kilo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `atur_pesanans`
--
ALTER TABLE `atur_pesanans`
  MODIFY `atur_pesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `durasis`
--
ALTER TABLE `durasis`
  MODIFY `id_durasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `item_pesanans`
--
ALTER TABLE `item_pesanans`
  MODIFY `id_item_pesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `layanans`
--
ALTER TABLE `layanans`
  MODIFY `id_layanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id_pelanggan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pesanan_kilo`
--
ALTER TABLE `pesanan_kilo`
  MODIFY `id_pesanan_kilo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_kilo`
--
ALTER TABLE `tbl_kilo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `pesanans_atur_pesanan_foreign` FOREIGN KEY (`atur_pesanan`) REFERENCES `atur_pesanans` (`atur_pesanan`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanans_id_durasi_foreign` FOREIGN KEY (`id_durasi`) REFERENCES `durasis` (`id_durasi`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanans_id_item_pesanan_foreign` FOREIGN KEY (`id_item_pesanan`) REFERENCES `item_pesanans` (`id_item_pesanan`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanans_id_layanan_foreign` FOREIGN KEY (`id_layanan`) REFERENCES `layanans` (`id_layanan`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanans_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggans` (`id_pelanggan`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan_kilo`
--
ALTER TABLE `pesanan_kilo`
  ADD CONSTRAINT `pesanan_kilo_atur_pesanan_foreign` FOREIGN KEY (`atur_pesanan`) REFERENCES `atur_pesanans` (`atur_pesanan`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanan_kilo_id_durasi_foreign` FOREIGN KEY (`id_durasi`) REFERENCES `durasis` (`id_durasi`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanan_kilo_id_layanan_foreign` FOREIGN KEY (`id_layanan`) REFERENCES `layanans` (`id_layanan`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanan_kilo_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggans` (`id_pelanggan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
