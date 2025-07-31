-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jul 2025 pada 22.13
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
-- Database: `kemaki_store`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$QI96Lpxp7egjLNIGhnJ0/OpAbMAcGJ8YrGS6sqgn87abkk5rGABLu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `banners`
--

INSERT INTO `banners` (`id`, `filename`, `uploaded_at`) VALUES
(15, '81d25f8053ac1244ebcc765b059550fb.jpg', '2025-07-08 09:08:31'),
(16, 'bannerml.png', '2025-06-16 13:26:17'),
(17, 'bannerpubgm.jpg', '2025-06-16 13:26:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dm_aov`
--

CREATE TABLE `dm_aov` (
  `id` int(11) NOT NULL,
  `jumlah_dm` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dm_aov`
--

INSERT INTO `dm_aov` (`id`, `jumlah_dm`, `harga`) VALUES
(1, '40', 10000),
(2, '90', 22000),
(3, '230', 55000),
(4, '470', 105000),
(5, '950', 210000),
(6, '1430', 310000),
(7, '2390', 495000),
(8, '4770', 975000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dm_codm`
--

CREATE TABLE `dm_codm` (
  `id` int(11) NOT NULL,
  `jumlah_dm` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dm_codm`
--

INSERT INTO `dm_codm` (`id`, `jumlah_dm`, `harga`) VALUES
(1, '31', 5000),
(2, '62', 10000),
(3, '127', 20000),
(4, '318', 50000),
(5, '634', 95000),
(6, '1270', 189000),
(7, '1910', 279000),
(8, '3180', 449000),
(9, '6360', 875000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dm_freefire`
--

CREATE TABLE `dm_freefire` (
  `id` int(11) NOT NULL,
  `jumlah_dm` varchar(10) DEFAULT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dm_freefire`
--

INSERT INTO `dm_freefire` (`id`, `jumlah_dm`, `harga`) VALUES
(1, '5', 900),
(2, '10', 1000),
(3, '12', 1000),
(4, '20', 3000),
(5, '25', 4000),
(6, '30', 5000),
(7, '40', 6000),
(8, '50', 7000),
(9, '55', 7000),
(10, '70', 9000),
(11, '80', 11000),
(12, '90', 12000),
(13, '100', 13000),
(14, '120', 15000),
(15, '140', 18000),
(16, '150', 20000),
(17, '160', 22000),
(18, '190', 25000),
(19, '200', 27000),
(20, '280', 37000),
(21, '355', 46000),
(22, '400', 53000),
(23, '425', 56000),
(24, '500', 66000),
(25, '565', 74000),
(26, '635', 84000),
(27, '720', 92000),
(28, '860', 112000),
(29, '1000', 131000),
(30, '1075', 140000),
(31, '1450', 188000),
(32, '2000', 262000),
(33, '2180', 284000),
(34, '2720', 357000),
(35, '3640', 473000),
(36, '4000', 523000),
(37, '7290', 936000),
(38, '36500', 4681000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dm_genshin`
--

CREATE TABLE `dm_genshin` (
  `id` int(11) NOT NULL,
  `jumlah_dm` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dm_genshin`
--

INSERT INTO `dm_genshin` (`id`, `jumlah_dm`, `harga`) VALUES
(1, '60', 15000),
(2, '300', 75000),
(3, '980', 230000),
(4, '1980', 460000),
(5, '3280', 770000),
(6, '6480', 1390000),
(7, '100', 10000),
(8, '200', 19000),
(9, '500', 47000),
(10, '1000', 92000),
(11, '1500', 135000),
(12, '2000', 175000),
(13, '3000', 260000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dm_hok`
--

CREATE TABLE `dm_hok` (
  `id` int(11) NOT NULL,
  `jumlah_dm` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dm_hok`
--

INSERT INTO `dm_hok` (`id`, `jumlah_dm`, `harga`) VALUES
(1, '50', 10000),
(2, '100', 18000),
(3, '250', 45000),
(4, '500', 89000),
(5, '1000', 175000),
(6, '2000', 340000),
(7, '4000', 660000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dm_lol`
--

CREATE TABLE `dm_lol` (
  `id` int(11) NOT NULL,
  `jumlah_dm` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dm_lol`
--

INSERT INTO `dm_lol` (`id`, `jumlah_dm`, `harga`) VALUES
(1, '150', 25000),
(2, '300', 50000),
(3, '600', 95000),
(4, '1000', 155000),
(5, '1500', 230000),
(6, '2000', 310000),
(7, '3500', 535000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dm_mcgg`
--

CREATE TABLE `dm_mcgg` (
  `id` int(11) NOT NULL,
  `jumlah_dm` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dm_mcgg`
--

INSERT INTO `dm_mcgg` (`id`, `jumlah_dm`, `harga`) VALUES
(1, '5', 1425),
(2, '12', 3325),
(3, '19', 5225),
(4, '28', 7600),
(5, '44', 10830),
(6, '59', 14440),
(7, '85', 20757),
(8, '170', 41515),
(9, '240', 58862),
(10, '296', 72200),
(11, '408', 99275),
(12, '568', 135375),
(13, '875', 207575),
(14, '2010', 451250),
(15, '4830', 1083000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dm_mlbb`
--

CREATE TABLE `dm_mlbb` (
  `id` int(11) NOT NULL,
  `jumlah_dm` varchar(10) DEFAULT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dm_mlbb`
--

INSERT INTO `dm_mlbb` (`id`, `jumlah_dm`, `harga`) VALUES
(1, '12', 3500),
(2, '28', 7000),
(3, '36', 10000),
(4, '56', 16000),
(5, '85', 23000),
(6, '169', 46000),
(7, '220', 60000),
(8, '282', 80000),
(9, '366', 100000),
(10, '568', 150000),
(11, '875', 230000),
(12, '2010', 500000),
(13, '4804', 1200000),
(14, '6004', 1500000),
(28, '100', 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dm_pubg`
--

CREATE TABLE `dm_pubg` (
  `id` int(11) NOT NULL,
  `jumlah_dm` varchar(10) DEFAULT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dm_pubg`
--

INSERT INTO `dm_pubg` (`id`, `jumlah_dm`, `harga`) VALUES
(1, '5', 1000),
(2, '10', 1800),
(3, '20', 3600),
(4, '25', 4500),
(5, '30', 5400),
(6, '40', 7200),
(7, '50', 9000),
(8, '60', 10800),
(9, '70', 12600),
(10, '80', 14400),
(11, '100', 18000),
(12, '120', 21600),
(13, '150', 27000),
(14, '180', 32400),
(15, '250', 45000),
(16, '300', 54000),
(17, '400', 72000),
(18, '500', 90000),
(19, '600', 108000),
(20, '700', 126000),
(21, '800', 144000),
(22, '1000', 180000),
(23, '1200', 216000),
(24, '1500', 270000),
(25, '2000', 360000),
(26, '2500', 450000),
(27, '3000', 540000),
(28, '4000', 720000),
(29, '5000', 900000),
(30, '6000', 1080000),
(31, '7000', 1260000),
(32, '8000', 1440000),
(33, '10000', 1800000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `semua_game`
--

CREATE TABLE `semua_game` (
  `id` int(11) NOT NULL,
  `nama_game` varchar(100) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `link_update` varchar(255) NOT NULL,
  `tampil` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `semua_game`
--

INSERT INTO `semua_game` (`id`, `nama_game`, `logo`, `link_update`, `tampil`) VALUES
(15, 'Mobile Legends: Bang Bang', '../assets/logoML.png', 'mlbb.html', 1),
(16, 'PUBG Mobile', '../assets/logoPUBG.png', 'pubgm.html', 1),
(17, 'Free Fire', '../assets/logoEPEP.png', 'freefire.html', 1),
(18, 'Genshin Impact', '../assets/logoGenshinImpact.png', 'genshinimpact.html', 1),
(19, 'Call Of Duty Mobile', '../assets/logoCODM.jpg', 'codm.html', 1),
(20, 'Honor Of Kings', '../assets/logohok.jpg', 'hok.html', 1),
(21, 'League Of Legends Wild Rift', '../assets/logolol.jpg', 'lol.html', 1),
(22, 'Arena Of Valor', '../assets/aovlogo.jpg', 'aov.html', 1),
(23, 'Magic Chess GO GO', '../assets/mcgglogo.png', 'mcgg.html', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `semua_game_admin`
--

CREATE TABLE `semua_game_admin` (
  `id` int(11) NOT NULL,
  `nama_game` varchar(100) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `link_update` varchar(255) NOT NULL,
  `tampil` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `semua_game_admin`
--

INSERT INTO `semua_game_admin` (`id`, `nama_game`, `logo`, `link_update`, `tampil`) VALUES
(1, 'Mobile Legends: Bang Bang', '../assets/logoML.png', 'updatemlbb.html', 1),
(2, 'PUBG Mobile', '../assets/logoPUBG.png', 'updatepubgm.html', 1),
(3, 'Free Fire', '../assets/logoEPEP.png', 'updatefreefire.html', 1),
(4, 'Genshin Impact', '../assets/logoGenshinImpact.png', 'updategenshin.html', 1),
(5, 'Call Of Duty Mobile', '../assets/logoCODM.jpg', 'updatecodm.html', 1),
(6, 'Honor Of Kings', '../assets/logohok.jpg', 'updatehok.html', 1),
(7, 'League Of Legends Wild Rift', '../assets/logolol.jpg', 'updatelol.html', 1),
(8, 'Arena Of Valor', '../assets/aovlogo.jpg', 'updateaov.html', 1),
(9, 'Magic Chess GO GO', '../assets/mcgglogo.png', 'updatemcgg.html', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` varchar(10) NOT NULL,
  `nama_game` varchar(50) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `server_id` varchar(20) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `no_wa` varchar(30) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `metode_pembayaran` varchar(20) NOT NULL,
  `waktu` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `nama_game`, `user_id`, `server_id`, `nickname`, `no_wa`, `jumlah`, `harga`, `metode_pembayaran`, `waktu`, `status`) VALUES
('48CLE1C', 'Mobile Legends: Bang Bang', '1234567', '2345', 'qwert', '08532918411', '36', 10000, 'DANA', '2025-07-08 16:13:53', 'SUCCESS'),
('AG339EY', 'Mobile Legends: Bang Bang', 'gah3jj3', '1212', 'haloword', '08313133131', '220', 60000, 'DANA', '2025-06-16 15:05:18', 'SUCCESS'),
('C2P3216', 'Mobile Legends: Bang Bang', '3234922', '123456', 'mex', '08532918411', '6004', 1500000, 'DANA', '2025-06-14 19:15:51', 'SUCCESS'),
('HX01ECR', 'Mobile Legends: Bang Bang', '253431', '2345', 'mans', '08755443222', '568', 150000, 'OVO', '2025-06-14 22:08:02', 'SUCCESS'),
('K5YNYPR', 'PUBG Mobile', 'gah3jj3', '-', 'haloword', '087655433344', '8000', 1440000, 'ShopeePay', '2025-06-16 16:45:55', 'SUCCESS'),
('LKDCNIC', 'FreeFire', 'qwert', '-', 'rakacuks', '08532918411', '1075', 140000, 'DANA', '2025-06-14 15:29:10', 'SUCCESS'),
('S9PXJNY', 'Mobile Legends: Bang Bang', '123456677', '1212', 'memek', '08313133131', '568', 150000, 'DANA', '2025-06-16 14:43:19', 'SUCCESS'),
('TKB9KEB', 'PUBG Mobile', '1234141', '-', 'memek', '08313133131', '25', 4500, 'ShopeePay', '2025-06-16 20:11:04', 'SUCCESS'),
('VW3TQ27', 'Magic Chess GO GO', '3234922', '9291', 'Vano', '082647857663', '2010', 451250, 'DANA', '2025-07-07 10:53:10', 'PENDING'),
('YXN4OY7', 'Mobile Legends: Bang Bang', '1234567', '1234', 'raka', '08543212346', '28', 7000, 'DANA', '2025-07-08 16:05:40', 'SUCCESS'),
('ZXGQMZN', 'Mobile Legends: Bang Bang', '12345', '12345', 'riandompu', '085230117990', '568', 150000, 'DANA', '2025-07-08 16:24:24', 'PENDING');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dm_aov`
--
ALTER TABLE `dm_aov`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jumlah_dm` (`jumlah_dm`);

--
-- Indeks untuk tabel `dm_codm`
--
ALTER TABLE `dm_codm`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jumlah_dm` (`jumlah_dm`);

--
-- Indeks untuk tabel `dm_freefire`
--
ALTER TABLE `dm_freefire`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jumlah_dm` (`jumlah_dm`);

--
-- Indeks untuk tabel `dm_genshin`
--
ALTER TABLE `dm_genshin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jumlah_dm` (`jumlah_dm`);

--
-- Indeks untuk tabel `dm_hok`
--
ALTER TABLE `dm_hok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jumlah_dm` (`jumlah_dm`);

--
-- Indeks untuk tabel `dm_lol`
--
ALTER TABLE `dm_lol`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jumlah_dm` (`jumlah_dm`);

--
-- Indeks untuk tabel `dm_mcgg`
--
ALTER TABLE `dm_mcgg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jumlah_dm` (`jumlah_dm`);

--
-- Indeks untuk tabel `dm_mlbb`
--
ALTER TABLE `dm_mlbb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jumlah_dm` (`jumlah_dm`);

--
-- Indeks untuk tabel `dm_pubg`
--
ALTER TABLE `dm_pubg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jumlah_dm` (`jumlah_dm`);

--
-- Indeks untuk tabel `semua_game`
--
ALTER TABLE `semua_game`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `semua_game_admin`
--
ALTER TABLE `semua_game_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `dm_aov`
--
ALTER TABLE `dm_aov`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `dm_codm`
--
ALTER TABLE `dm_codm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `dm_freefire`
--
ALTER TABLE `dm_freefire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `dm_genshin`
--
ALTER TABLE `dm_genshin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `dm_hok`
--
ALTER TABLE `dm_hok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `dm_lol`
--
ALTER TABLE `dm_lol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `dm_mcgg`
--
ALTER TABLE `dm_mcgg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `dm_mlbb`
--
ALTER TABLE `dm_mlbb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `dm_pubg`
--
ALTER TABLE `dm_pubg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `semua_game`
--
ALTER TABLE `semua_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `semua_game_admin`
--
ALTER TABLE `semua_game_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
