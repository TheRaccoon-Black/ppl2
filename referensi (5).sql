-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2023 at 05:53 PM
-- Server version: 8.0.35-0ubuntu0.22.04.1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `referensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `nama`, `email`, `password`) VALUES
(1, 'Admin', 'ozjibuwat@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `anggaran_bulanan`
--

CREATE TABLE `anggaran_bulanan` (
  `id_anggaran` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `jumlah_anggaran` decimal(10,2) DEFAULT NULL,
  `kategori_anggaran` varchar(255) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_berakhir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_tujuan`
--

CREATE TABLE `detail_tujuan` (
  `id_detail` int NOT NULL,
  `id_rencana` int NOT NULL,
  `jumlah` int NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hutang_piutang`
--

CREATE TABLE `hutang_piutang` (
  `id_hutang` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `nama_pemberi_hutang` varchar(255) DEFAULT NULL,
  `jumlah_hutang` decimal(10,2) DEFAULT NULL,
  `tanggal_peminjaman` date DEFAULT NULL,
  `tanggal_jatuh_tempo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_transaksi`
--

CREATE TABLE `kategori_transaksi` (
  `id_kategori` int NOT NULL,
  `id_user` int NOT NULL,
  `namaKategori` varchar(255) DEFAULT NULL,
  `Deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rencana_keuangan`
--

CREATE TABLE `rencana_keuangan` (
  `id_rencana` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `id_kategori` int NOT NULL,
  `tujuan_keuangan` varchar(255) DEFAULT NULL,
  `uang_sekarang` int NOT NULL,
  `jumlah_dibutuhkan` int DEFAULT NULL,
  `tanggal_buat` date DEFAULT NULL,
  `tanggal_target` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_keuangan`
--

CREATE TABLE `transaksi_keuangan` (
  `id_transaksi` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `id_kategori` int DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`) VALUES
(1, 'ojik', 'ozjibuwat@gmail.com', 'ojik', 'c20ad4d76fe97759aa27a0c99bff6710'),
(4, 'cut', 'admin@gmail.com', 'cut24', '21232f297a57a5a743894a0e4a801fc3'),
(5, 'cutt', 'cut@gmail.com', 'cut24', '21232f297a57a5a743894a0e4a801fc3'),
(6, 'ojik', 'ojik@gmail.com', 'ojik', '21232f297a57a5a743894a0e4a801fc3'),
(7, 'Muhammmad fachrurrozi', 'ozjibuwat003@gmail.com', 'ozi', 'c20ad4d76fe97759aa27a0c99bff6710'),
(8, 'Muhammmad fachrurrozi', 'admin2@gmail.com', 'ojik12', '21232f297a57a5a743894a0e4a801fc3'),
(9, 'fachrurrozi', 'ozjibuwat004@gmail.com', 'fachrurrozi', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `anggaran_bulanan`
--
ALTER TABLE `anggaran_bulanan`
  ADD PRIMARY KEY (`id_anggaran`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `detail_tujuan`
--
ALTER TABLE `detail_tujuan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_rencana` (`id_rencana`);

--
-- Indexes for table `hutang_piutang`
--
ALTER TABLE `hutang_piutang`
  ADD PRIMARY KEY (`id_hutang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kategori_transaksi`
--
ALTER TABLE `kategori_transaksi`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `rencana_keuangan`
--
ALTER TABLE `rencana_keuangan`
  ADD PRIMARY KEY (`id_rencana`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `transaksi_keuangan`
--
ALTER TABLE `transaksi_keuangan`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_tujuan`
--
ALTER TABLE `detail_tujuan`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kategori_transaksi`
--
ALTER TABLE `kategori_transaksi`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `rencana_keuangan`
--
ALTER TABLE `rencana_keuangan`
  MODIFY `id_rencana` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transaksi_keuangan`
--
ALTER TABLE `transaksi_keuangan`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggaran_bulanan`
--
ALTER TABLE `anggaran_bulanan`
  ADD CONSTRAINT `anggaran_bulanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `detail_tujuan`
--
ALTER TABLE `detail_tujuan`
  ADD CONSTRAINT `detail_tujuan_ibfk_1` FOREIGN KEY (`id_rencana`) REFERENCES `rencana_keuangan` (`id_rencana`);

--
-- Constraints for table `hutang_piutang`
--
ALTER TABLE `hutang_piutang`
  ADD CONSTRAINT `hutang_piutang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `rencana_keuangan`
--
ALTER TABLE `rencana_keuangan`
  ADD CONSTRAINT `rencana_keuangan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `rencana_keuangan_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_transaksi` (`id_kategori`);

--
-- Constraints for table `transaksi_keuangan`
--
ALTER TABLE `transaksi_keuangan`
  ADD CONSTRAINT `transaksi_keuangan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `transaksi_keuangan_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_transaksi` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
