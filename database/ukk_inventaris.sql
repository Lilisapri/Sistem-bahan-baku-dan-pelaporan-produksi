-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14 Jul 2020 pada 05.36
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_inventaris_leviana`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `id_detail_pinjam` varchar(20) NOT NULL,
  `id_inventaris` int(11) NOT NULL,
  `jml` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `id_inventaris` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `kondisi` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_register` date NOT NULL,
  `id_ruang` varchar(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kode_inventaris` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`id_inventaris`, `nama`, `jenis`, `kondisi`, `jumlah`, `tgl_register`, `id_ruang`, `keterangan`, `kode_inventaris`) VALUES
(0, 'Meja', 'seken', 'baik', 10, '2010-09-10', '3', 'bagus', 'in-meja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` varchar(10) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status_pinjam` varchar(20) NOT NULL,
  `nama_pinjam` varchar(32) NOT NULL,
  `id_inventaris` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `tgl_pinjam`, `tgl_kembali`, `status_pinjam`, `nama_pinjam`, `id_inventaris`, `jumlah`) VALUES
('1000', '2020-02-08', '2020-03-06', 'dikembalikan', 'asd', '0', 0),
('3456', '2020-02-07', '0000-00-00', 'dipinjam', 'asd', '0', 0),
('5656', '2020-02-06', '0000-00-00', 'dipinjam', '54564', '0', 456456),
('6577', '2020-02-07', '0000-00-00', 'dipinjam', '5675', '0', 5675),
('678768', '2020-02-14', '0000-00-00', 'dipinjam', 'et', '0', 0),
('8889', '2020-02-10', '0000-00-00', 'dipinjam', '567', '0', 567),
('khk', '2020-02-07', '0000-00-00', 'dipinjam', ',jlkj', '==pilih==', 8),
('p-01', '2020-01-20', '0000-00-00', '', 'Wig', '0', 10),
('p-014', '0000-00-00', '2020-01-24', 'dikembalikan', 'siti muntamah', '0', 123),
('p-02', '2020-01-20', '0000-00-00', 'dikembalikan', 'Wig', '0', 10),
('p-04', '2020-01-20', '0000-00-00', 'dikembalikan', 'nia', '0', 1),
('p-05', '2020-01-20', '0000-00-00', 'dikembalikan', 'yen', '0', 32),
('p-06', '2020-01-20', '0000-00-00', 'dikembalikan', 'yun', '0', 1),
('p-07', '2020-01-20', '2020-01-20', 'dikembalikan', 'ras', '0', 3),
('p-08', '2020-01-20', '2020-01-20', 'dikembalikan', 'FAU', '0', 5),
('P-09', '2020-01-20', '2020-01-20', 'dikembalikan', 'SRI', '0', 1),
('P-10', '2020-01-19', '2020-01-20', 'dikembalikan', 'WAR', '0', 5),
('p-11', '2020-01-20', '2020-01-21', 'dikembalikan', 'lit', '0', 5),
('p-13', '2020-01-20', '2020-01-24', 'dikembalikan', 'Wig', '0', 6),
('p-15', '2020-01-20', '2020-01-24', 'dikembalikan', 'lev', '0', 7),
('P-16', '2020-01-08', '0000-00-00', 'dipinjam', 'Restia', '0', 12),
('p03', '2020-01-20', '0000-00-00', 'dikembalikan', 'JOs', '0', 10),
('sdsad', '2020-02-08', '0000-00-00', 'dipinjam', 'asd', '0', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'administrator'),
(2, 'operator', 'operator', 'operator', 'operator'),
(3, 'PUSPA', 'puspa', '', 'administrator'),
(4, 'sa', 'sa', 's', 'administrator'),
(5, 'd', 'wd', 'wed', 'administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` varchar(10) NOT NULL,
  `nama_ruang` varchar(30) NOT NULL,
  `kode_ruang` varchar(20) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `kode_ruang`, `ket`) VALUES
('1', 'aa', 'as', 'RUANG BAWAH'),
('3', 'Lab', 'L01', 'Lab Atas'),
('4', 'Lab', 'L04', 'sd'),
('5', 'Bengkel', 'B01', 'Bengkel TSM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD PRIMARY KEY (`id_detail_pinjam`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_inventaris`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
