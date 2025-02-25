-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2025 at 02:45 AM
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
-- Database: `kost_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `otp` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `nomor` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`id`, `id_user`, `otp`, `waktu`, `nomor`) VALUES
(24, 24, 5356, 1736300625, '085742140994');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_WA` varchar(15) DEFAULT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `role` enum('Admin','Staff Gudang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `password`, `no_WA`, `nama_pengguna`, `role`) VALUES
(24, '123', '', 'admin', 'Admin'),
(25, '123', NULL, 'staff', 'Staff Gudang');

-- --------------------------------------------------------

--
-- Table structure for table `t_bahan_baku`
--

CREATE TABLE `t_bahan_baku` (
  `id_bahan_baku` varchar(6) NOT NULL,
  `kode_barcode` varchar(50) NOT NULL,
  `nama_bahan_baku` varchar(255) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `id_kategori` varchar(4) DEFAULT NULL,
  `kuantitas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_bahan_masuk_keluar`
--

CREATE TABLE `t_bahan_masuk_keluar` (
  `id_transaksi` int(6) NOT NULL,
  `id_bahan_baku` varchar(6) NOT NULL,
  `nama_pengguna` varchar(255) DEFAULT NULL,
  `nama_bahan_baku` varchar(255) NOT NULL,
  `id_stok_masuk` varchar(6) DEFAULT NULL,
  `id_stok_keluar` varchar(6) DEFAULT NULL,
  `kode_barcode` varchar(25) NOT NULL,
  `kuantitas` int(5) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_kategori` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_kategori`
--

CREATE TABLE `t_kategori` (
  `id_kategori` varchar(4) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `otp_ibfk_1` (`id_user`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nama_pengguna` (`nama_pengguna`);

--
-- Indexes for table `t_bahan_baku`
--
ALTER TABLE `t_bahan_baku`
  ADD PRIMARY KEY (`id_bahan_baku`),
  ADD KEY `fk_id_kategori` (`id_kategori`);

--
-- Indexes for table `t_bahan_masuk_keluar`
--
ALTER TABLE `t_bahan_masuk_keluar`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_bahan_baku` (`id_bahan_baku`),
  ADD KEY `fk_pengguna` (`nama_pengguna`);

--
-- Indexes for table `t_kategori`
--
ALTER TABLE `t_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `t_bahan_masuk_keluar`
--
ALTER TABLE `t_bahan_masuk_keluar`
  MODIFY `id_transaksi` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `otp`
--
ALTER TABLE `otp`
  ADD CONSTRAINT `otp_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pengguna` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_bahan_baku`
--
ALTER TABLE `t_bahan_baku`
  ADD CONSTRAINT `fk_id_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `t_kategori` (`id_kategori`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `t_bahan_masuk_keluar`
--
ALTER TABLE `t_bahan_masuk_keluar`
  ADD CONSTRAINT `fk_bahan_baku` FOREIGN KEY (`id_bahan_baku`) REFERENCES `t_bahan_baku` (`id_bahan_baku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pengguna` FOREIGN KEY (`nama_pengguna`) REFERENCES `pengguna` (`nama_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
