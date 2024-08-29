-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2024 at 10:32 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `produksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id` int NOT NULL,
  `kode_bahan_baku` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `satuan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `jumlah_persediaan` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id`, `kode_bahan_baku`, `nama`, `jenis`, `satuan`, `harga`, `jumlah_persediaan`, `created_at`) VALUES
(1, '3244', 'Bahan A', 'Roll', 'Roll', 10000.00, 410, '2024-04-26 17:10:26'),
(2, '23432', 'Bahan B', 'Roll', 'Roll', 5000.00, 775, '2024-04-26 17:10:26'),
(3, '324324', 'Bahan C', 'Roll', 'Roll', 8000.00, 887, '2024-04-26 17:10:26'),
(4, '234', 'Bahan D', 'Sheet Book Papper 52 Gram 79x109', 'Rim', 12000.00, 800, '2024-04-26 17:10:26'),
(16, 'a01', 'Sheet Book', 'Sheet Book Papper 52 Gram 79x109', 'Rim', 50000.00, 795, '2024-04-26 17:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int NOT NULL,
  `nama_user` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Utami', 'pracetak', '123', 'pracetak'),
(2, 'Naufal', 'produksi', '123', 'produksi'),
(3, 'Pranowo', 'admin', '123', 's_admin'),
(4, 'Feri', 'manager', '123', 'manager'),
(10, 'lilis', 'staf admin 1', '123', 'produksi');

-- --------------------------------------------------------

--
-- Table structure for table `spk`
--

CREATE TABLE `spk` (
  `id_spk` int NOT NULL,
  `id_pengguna` int NOT NULL,
  `no_spk` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_buku` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_isbn` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_permintaan_selesai` date NOT NULL,
  `oplah_cetak` int NOT NULL,
  `oplah_insheet` int NOT NULL,
  `ukuran_buku` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_halaman` int NOT NULL,
  `jumlah_catern` int NOT NULL,
  `jumlah_plat` int NOT NULL,
  `ukuran_kertas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kebutuhan_kertas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mesin_cetak` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spk`
--

INSERT INTO `spk` (`id_spk`, `id_pengguna`, `no_spk`, `judul_buku`, `no_isbn`, `tanggal`, `tanggal_permintaan_selesai`, `oplah_cetak`, `oplah_insheet`, `ukuran_buku`, `jumlah_halaman`, `jumlah_catern`, `jumlah_plat`, `ukuran_kertas`, `kebutuhan_kertas`, `mesin_cetak`) VALUES
(1, 1, 'SPK-001  ', 'The King SNBP 2023  ', '123-902-2021-1  ', '2024-02-01', '2024-01-12', 500, 550, '13X26', 200, 50, 100, 'BOOK PAPPER 52 GRAM-79X109 PREMIUM  ', '52 RIM  ', 'Mesin Sheet  '),
(2, 1, 'SPK-002 ', 'Olimpiade Kimia ', '234-083-2020-1 ', '2024-01-10', '2024-01-19', 120, 1100, '13x26 ', 300, 25, 50, 'BOOK PAPPER 52 GRAM-79X109 PREMIUM ', '60 RIM ', 'Mesin Sheet '),
(3, 1, 'SPK-003', 'Psikotes', '432-046-2021-2', '2023-12-21', '2023-12-23', 700, 750, '14x20', 450, 50, 100, 'BOOK PAPPER 52 GRAM-79X109 PREMIUM', '50 RIM', 'Mesin Sheet'),
(4, 1, 'SPK-004', 'Tes masuk PKN STAN', '785-097-2022-3', '2023-12-22', '2023-12-24', 5000, 5200, '19x26', 500, 120, 240, 'BOOK PAPPER 52 GRAM-79X109 PREMIUM', '150 RIM', 'Mesin Web'),
(5, 1, 'SPK-005', 'UTBK SOSHUM', '097-456-2023-1', '2023-12-23', '2023-12-27', 2500, 2600, '13X19', 900, 100, 200, 'BOOK PAPPER 52 GRAM-79X109 PREMIUM', '120 RIM', 'Mesin Sheet'),
(6, 1, 'SPK-006', 'Metode praktis Fisika', '354-927-2023-1', '2023-12-24', '2023-12-29', 800, 850, '13x19', 150, 40, 80, 'BOOK PAPPER 52 GRAM-79X109 PREMIUM', '40 RIM', 'Mesin Sheet'),
(7, 1, 'SPK-007 ', 'Triks Kimia ', '345-092-2022-2 ', '2024-01-10', '2024-01-26', 750, 800, '14x20 ', 300, 14, 110, 'BOOK PAPPER 52 GRAM-79X109 PREMIUM ', '50 RIM ', 'Mesin Sheet '),
(8, 1, 'SPK-008', 'Rekor Nilai TPA', '542-073-2023-1', '2024-01-08', '2024-01-13', 400, 450, '13x26', 500, 35, 70, 'BOOK PAPPER 52 GRAM-79X109 PREMIUM', '40 RIM', 'Mesin Sheet'),
(16, 1, 'SPK-016', 'Tes kilat Biologi SMk', '089-026-0272-1', '2024-01-12', '2024-01-17', 1, 2, '13X19', 122, 23, 2, 'Book Paper ', '177 RIM', 'web'),
(17, 1, 'SPK-017', 'Tes Masuk Kedinasan/STAN', '0876-098-2021-8', '2024-01-13', '2024-01-20', 600, 650, '13x19 ', 122, 12, 24, 'Book Paper 52 Gram', '122 RIM', 'Mesin Web');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_eoq`
--

CREATE TABLE `tabel_eoq` (
  `id` int NOT NULL,
  `id_bahan_baku` int NOT NULL,
  `jumlah_pesanan` int NOT NULL,
  `per_periode_kebutuhan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya_pesanan_per_order` decimal(10,2) NOT NULL,
  `eoq` decimal(10,2) NOT NULL,
  `frekuensi_pemesanan` decimal(10,2) NOT NULL,
  `total_biaya` decimal(10,2) NOT NULL,
  `harga_per_bahan_baku` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabel_eoq`
--

INSERT INTO `tabel_eoq` (`id`, `id_bahan_baku`, `jumlah_pesanan`, `per_periode_kebutuhan`, `biaya_pesanan_per_order`, `eoq`, `frekuensi_pemesanan`, `total_biaya`, `harga_per_bahan_baku`, `created_at`) VALUES
(2, 1, 500, 'minggu', 900.00, 96.75, 268.74, 483735.46, 5000.00, '2024-04-26 17:11:19'),
(3, 1, 5000, 'minggu', 8000.00, 644.98, 403.11, 6449806.20, 10000.00, '2024-04-26 17:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `unit_bindding`
--

CREATE TABLE `unit_bindding` (
  `id` int NOT NULL,
  `id_spk` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `shift_kerja` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_bindding` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_bindding`
--

INSERT INTO `unit_bindding` (`id`, `id_spk`, `id_unit_kerja`, `shift_kerja`, `tanggal`, `jumlah_bindding`) VALUES
(1, 1, 5, 'Pagi ', '2023-12-20', 2005),
(2, 2, 5, 'Pagi', '2023-12-21', 3000),
(3, 3, 5, 'Pagi', '2023-12-22', 3500),
(4, 4, 5, 'Pagi', '2023-12-23', 4500),
(5, 5, 5, 'Pagi', '2023-12-24', 2500),
(6, 6, 5, 'Pagi', '2023-12-25', 5600),
(7, 7, 5, 'Pagi', '2023-12-27', 5000),
(8, 8, 5, 'Malam', '2023-12-31', 7000),
(11, 1, 1, 'Pagi', '2024-01-02', 234);

-- --------------------------------------------------------

--
-- Table structure for table `unit_cetak`
--

CREATE TABLE `unit_cetak` (
  `id` int NOT NULL,
  `id_spk` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `shift_kerja` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `total_catern` int NOT NULL,
  `total_plat` int NOT NULL,
  `total_lembar` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_cetak`
--

INSERT INTO `unit_cetak` (`id`, `id_spk`, `id_unit_kerja`, `shift_kerja`, `tanggal`, `total_catern`, `total_plat`, `total_lembar`) VALUES
(1, 1, 2, 'Pagi  ', '2023-12-19', 20, 100, 21),
(2, 2, 2, 'Pagi', '2023-12-20', 25, 50, 5000),
(3, 3, 2, 'Pagi', '2023-12-24', 30, 60, 7542),
(4, 4, 2, 'Pagi', '2023-12-26', 44, 88, 880),
(5, 5, 2, 'Pagi', '2023-12-29', 22, 44, 3400),
(6, 6, 2, 'Pagi', '2024-01-02', 12, 24, 1500),
(7, 7, 2, 'Pagi', '2024-01-06', 24, 48, 2300),
(8, 8, 2, 'Pagi', '2024-01-29', 9, 18, 500),
(11, 1, 2, 'Pagi ', '2024-01-02', 12, 11, 2002),
(12, 5, 2, 'Pagi', '2024-01-03', 100, 100, 100);

-- --------------------------------------------------------

--
-- Table structure for table `unit_finishing`
--

CREATE TABLE `unit_finishing` (
  `id` int NOT NULL,
  `id_spk` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `shift_kerja` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_gabung` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_finishing`
--

INSERT INTO `unit_finishing` (`id`, `id_spk`, `id_unit_kerja`, `shift_kerja`, `tanggal`, `jumlah_gabung`) VALUES
(1, 1, 4, 'Pagi ', '2023-12-20', 25001),
(2, 2, 4, 'Pagi', '2023-12-25', 5000),
(3, 3, 4, 'Pagi', '2023-12-28', 8000),
(4, 4, 4, 'Pagi', '2023-12-31', 9500),
(5, 5, 4, 'Pagi', '2024-01-03', 8600),
(6, 6, 4, 'Pagi', '2024-01-11', 7000),
(7, 7, 4, 'Pagi', '2024-01-24', 6300),
(8, 8, 4, 'Pagi', '2024-01-31', 5420),
(12, 1, 4, 'malam', '2024-01-02', 25001);

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id_unit_kerja` int NOT NULL,
  `id_pengguna` int NOT NULL,
  `jenis_unit_kerja` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_kerja`
--

INSERT INTO `unit_kerja` (`id_unit_kerja`, `id_pengguna`, `jenis_unit_kerja`) VALUES
(1, 3, 'Unit potong'),
(2, 3, 'Unit cetak'),
(3, 3, 'Unit stahl'),
(4, 3, 'Unit finishing'),
(5, 3, 'Unit bindding'),
(6, 3, 'Unit packing'),
(7, 1, 'Unit mesin web');

-- --------------------------------------------------------

--
-- Table structure for table `unit_mesin_web`
--

CREATE TABLE `unit_mesin_web` (
  `id` int NOT NULL,
  `id_spk` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `id_bahan_baku` int DEFAULT NULL,
  `shift_kerja` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_plat` int NOT NULL,
  `jumlah_catern` int NOT NULL,
  `jumlah_roll` int NOT NULL,
  `hasil_cetak` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_mesin_web`
--

INSERT INTO `unit_mesin_web` (`id`, `id_spk`, `id_unit_kerja`, `id_bahan_baku`, `shift_kerja`, `tanggal`, `jumlah_plat`, `jumlah_catern`, `jumlah_roll`, `hasil_cetak`) VALUES
(1, 1, 7, 1, 'Pagi ', '2023-12-20', 16, 32, 40, 8002),
(2, 2, 7, 2, 'Pagi', '2023-12-27', 12, 24, 30, 9000),
(3, 3, 7, 3, 'Pagi', '2023-12-31', 15, 30, 35, 7000),
(4, 4, 7, 3, 'Malam', '2024-01-04', 15, 30, 35, 5000),
(5, 5, 7, 2, 'Pagi', '2024-01-10', 12, 24, 25, 9000),
(6, 6, 7, 1, 'Pagi', '2023-12-27', 13, 26, 50, 6000),
(7, 7, 7, 2, 'Pagi', '2024-01-24', 14, 28, 60, 9000),
(12, 7, 7, 1, 'malam', '2024-01-02', 2, 1, 0, 1),
(13, 1, 7, 1, 'Pagi ', '2024-04-26', 10, 10, 15, 10);

-- --------------------------------------------------------

--
-- Table structure for table `unit_packing`
--

CREATE TABLE `unit_packing` (
  `id` int NOT NULL,
  `id_spk` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `shift_kerja` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `total_buku` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_packing`
--

INSERT INTO `unit_packing` (`id`, `id_spk`, `id_unit_kerja`, `shift_kerja`, `tanggal`, `total_buku`) VALUES
(1, 1, 6, 'Pagi', '2023-12-20', 6000),
(2, 2, 6, 'Pagi', '2023-12-27', 7000),
(3, 3, 6, 'Pagi', '2023-12-31', 9000),
(4, 4, 6, 'Pagi', '2024-01-10', 8000),
(5, 5, 6, 'Pagi', '2024-01-17', 7800),
(6, 6, 6, 'Pagi', '2024-01-23', 8999),
(7, 7, 6, 'Malam', '2024-01-29', 9000),
(8, 8, 6, 'Malam', '2024-01-31', 4000),
(12, 1, 6, 'Pagi', '2024-01-02', 100);

-- --------------------------------------------------------

--
-- Table structure for table `unit_potong`
--

CREATE TABLE `unit_potong` (
  `id` int NOT NULL,
  `id_spk` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `id_bahan_baku` int DEFAULT NULL,
  `shift_kerja` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `total_potong` int DEFAULT NULL,
  `total_sisir` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_potong`
--

INSERT INTO `unit_potong` (`id`, `id_spk`, `id_unit_kerja`, `id_bahan_baku`, `shift_kerja`, `tanggal`, `total_potong`, `total_sisir`) VALUES
(10, 1, 1, 1, 'Pagi    ', '2023-12-29', 90, 1),
(11, 1, 1, 1, 'Pagi    ', '2023-12-29', 70, 12),
(15, 1, 1, 2, 'Pagi    ', '2023-12-29', 80, 12),
(16, 1, 1, 3, 'Pagi    ', '2023-12-29', 80, 12),
(19, 1, 1, 4, 'Pagi    ', '2023-12-29', 80, 12),
(20, 1, 1, 3, 'Pagi    ', '2023-12-29', 80, 12),
(21, 1, 1, 2, 'Pagi', '2024-01-02', 1231231, 2),
(22, 1, 1, 4, 'Pagi', '2023-12-28', 12611, 1),
(25, 1, 1, 4, 'malam', '2024-01-02', 110, 200),
(26, 1, 1, 3, 'malam', '2024-01-04', 51, 12),
(29, 1, 1, 16, 'Pagi', '2024-01-03', 123, 50),
(30, 1, 1, 1, 'Pagi', '2024-01-03', 144, 144),
(31, 1, 1, 3, 'Pagi', '2024-01-04', 90, 2121),
(32, 1, 1, 2, 'Pagi', '2024-01-11', 200, 110),
(35, 2, 1, 2, 'Pagi', '2024-01-13', 125, 12),
(36, 1, 1, 16, 'Pagi', '2024-04-26', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `unit_stahl`
--

CREATE TABLE `unit_stahl` (
  `id` int NOT NULL,
  `id_spk` int NOT NULL,
  `id_unit_kerja` int NOT NULL,
  `shift_kerja` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `hasil_lipat` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_stahl`
--

INSERT INTO `unit_stahl` (`id`, `id_spk`, `id_unit_kerja`, `shift_kerja`, `tanggal`, `hasil_lipat`) VALUES
(1, 1, 3, 'Pagi   ', '2023-12-26', 999),
(2, 2, 3, 'Pagi', '2023-12-28', 5320),
(3, 3, 3, 'Pagi', '2023-12-30', 6000),
(4, 4, 3, 'Pagi', '2023-12-31', 2000),
(5, 5, 3, 'Pagi', '2024-01-04', 600),
(6, 6, 3, 'Pagi', '2024-01-08', 7000),
(7, 7, 3, 'Pagi', '2024-01-10', 6500),
(8, 8, 3, 'Pagi', '2024-02-13', 9000),
(11, 1, 1, 'Pagi', '2023-12-28', 123),
(12, 1, 2, 'Pagi', '2024-01-02', 122),
(13, 1, 3, 'Pagi ', '2024-01-10', 999),
(14, 4, 3, 'Pagi', '2024-01-10', 88);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `spk`
--
ALTER TABLE `spk`
  ADD PRIMARY KEY (`id_spk`),
  ADD KEY `spk_ibfk_1` (`id_pengguna`);

--
-- Indexes for table `tabel_eoq`
--
ALTER TABLE `tabel_eoq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bahan_baku` (`id_bahan_baku`);

--
-- Indexes for table `unit_bindding`
--
ALTER TABLE `unit_bindding`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_unit_kerja` (`id_unit_kerja`),
  ADD KEY `unit_bindding_ibfk_1` (`id_spk`);

--
-- Indexes for table `unit_cetak`
--
ALTER TABLE `unit_cetak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_unit_kerja` (`id_unit_kerja`),
  ADD KEY `unit_cetak_ibfk_1` (`id_spk`);

--
-- Indexes for table `unit_finishing`
--
ALTER TABLE `unit_finishing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_unit_kerja` (`id_unit_kerja`),
  ADD KEY `unit_finishing_ibfk_1` (`id_spk`);

--
-- Indexes for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id_unit_kerja`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `unit_mesin_web`
--
ALTER TABLE `unit_mesin_web`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_unit_kerja` (`id_unit_kerja`),
  ADD KEY `unit_mesin_web_ibfk_1` (`id_spk`),
  ADD KEY `id_bahan_baku` (`id_bahan_baku`);

--
-- Indexes for table `unit_packing`
--
ALTER TABLE `unit_packing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_unit_kerja` (`id_unit_kerja`),
  ADD KEY `unit_packing_ibfk_1` (`id_spk`);

--
-- Indexes for table `unit_potong`
--
ALTER TABLE `unit_potong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_spk` (`id_spk`),
  ADD KEY `unit_potong_ibfk_1` (`id_unit_kerja`),
  ADD KEY `id_bahan_baku` (`id_bahan_baku`);

--
-- Indexes for table `unit_stahl`
--
ALTER TABLE `unit_stahl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_unit_kerja` (`id_unit_kerja`),
  ADD KEY `unit_stahl_ibfk_1` (`id_spk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `spk`
--
ALTER TABLE `spk`
  MODIFY `id_spk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tabel_eoq`
--
ALTER TABLE `tabel_eoq`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unit_bindding`
--
ALTER TABLE `unit_bindding`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `unit_cetak`
--
ALTER TABLE `unit_cetak`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `unit_finishing`
--
ALTER TABLE `unit_finishing`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id_unit_kerja` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `unit_mesin_web`
--
ALTER TABLE `unit_mesin_web`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `unit_packing`
--
ALTER TABLE `unit_packing`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `unit_potong`
--
ALTER TABLE `unit_potong`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `unit_stahl`
--
ALTER TABLE `unit_stahl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `spk`
--
ALTER TABLE `spk`
  ADD CONSTRAINT `spk_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_eoq`
--
ALTER TABLE `tabel_eoq`
  ADD CONSTRAINT `tabel_eoq_ibfk_1` FOREIGN KEY (`id_bahan_baku`) REFERENCES `bahan_baku` (`id`);

--
-- Constraints for table `unit_bindding`
--
ALTER TABLE `unit_bindding`
  ADD CONSTRAINT `unit_bindding_ibfk_1` FOREIGN KEY (`id_spk`) REFERENCES `spk` (`id_spk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_bindding_ibfk_2` FOREIGN KEY (`id_unit_kerja`) REFERENCES `unit_kerja` (`id_unit_kerja`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `unit_cetak`
--
ALTER TABLE `unit_cetak`
  ADD CONSTRAINT `unit_cetak_ibfk_1` FOREIGN KEY (`id_spk`) REFERENCES `spk` (`id_spk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_cetak_ibfk_2` FOREIGN KEY (`id_unit_kerja`) REFERENCES `unit_kerja` (`id_unit_kerja`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `unit_finishing`
--
ALTER TABLE `unit_finishing`
  ADD CONSTRAINT `unit_finishing_ibfk_1` FOREIGN KEY (`id_spk`) REFERENCES `spk` (`id_spk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_finishing_ibfk_2` FOREIGN KEY (`id_unit_kerja`) REFERENCES `unit_kerja` (`id_unit_kerja`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD CONSTRAINT `unit_kerja_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `unit_mesin_web`
--
ALTER TABLE `unit_mesin_web`
  ADD CONSTRAINT `unit_mesin_web_ibfk_1` FOREIGN KEY (`id_spk`) REFERENCES `spk` (`id_spk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_mesin_web_ibfk_2` FOREIGN KEY (`id_unit_kerja`) REFERENCES `unit_kerja` (`id_unit_kerja`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `unit_mesin_web_ibfk_3` FOREIGN KEY (`id_bahan_baku`) REFERENCES `bahan_baku` (`id`);

--
-- Constraints for table `unit_packing`
--
ALTER TABLE `unit_packing`
  ADD CONSTRAINT `unit_packing_ibfk_1` FOREIGN KEY (`id_spk`) REFERENCES `spk` (`id_spk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_packing_ibfk_2` FOREIGN KEY (`id_unit_kerja`) REFERENCES `unit_kerja` (`id_unit_kerja`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `unit_potong`
--
ALTER TABLE `unit_potong`
  ADD CONSTRAINT `unit_potong_ibfk_1` FOREIGN KEY (`id_unit_kerja`) REFERENCES `unit_kerja` (`id_unit_kerja`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_potong_ibfk_2` FOREIGN KEY (`id_spk`) REFERENCES `spk` (`id_spk`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `unit_potong_ibfk_3` FOREIGN KEY (`id_bahan_baku`) REFERENCES `bahan_baku` (`id`);

--
-- Constraints for table `unit_stahl`
--
ALTER TABLE `unit_stahl`
  ADD CONSTRAINT `unit_stahl_ibfk_1` FOREIGN KEY (`id_spk`) REFERENCES `spk` (`id_spk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_stahl_ibfk_2` FOREIGN KEY (`id_unit_kerja`) REFERENCES `unit_kerja` (`id_unit_kerja`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
