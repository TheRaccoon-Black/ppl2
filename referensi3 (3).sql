-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2023 at 03:12 PM
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
-- Database: `referensi3`
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
-- Table structure for table `detail_tujuan`
--

CREATE TABLE `detail_tujuan` (
  `id_detail` int NOT NULL,
  `id_rencana` int NOT NULL,
  `jumlah` int NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `detail_tujuan`
--

INSERT INTO `detail_tujuan` (`id_detail`, `id_rencana`, `jumlah`, `tanggal`) VALUES
(26, 29, 60000000, '2023-12-13'),
(27, 30, 100000, '2023-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_parent`
--

CREATE TABLE `kategori_parent` (
  `id_parent` int NOT NULL,
  `id_user` int NOT NULL,
  `kategori_parent` varchar(25) NOT NULL,
  `persentase` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori_parent`
--

INSERT INTO `kategori_parent` (`id_parent`, `id_user`, `kategori_parent`, `persentase`) VALUES
(1, 9, 'live cost ', 70),
(2, 9, 'saving', 20),
(3, 9, 'Pemasukkan', 0),
(4, 9, 'investasi', 10);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_transaksi`
--

CREATE TABLE `kategori_transaksi` (
  `id_kategori` int NOT NULL,
  `id_user` int NOT NULL,
  `id_parent` int NOT NULL,
  `namaKategori` varchar(255) DEFAULT NULL,
  `Deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori_transaksi`
--

INSERT INTO `kategori_transaksi` (`id_kategori`, `id_user`, `id_parent`, `namaKategori`, `Deskripsi`) VALUES
(51, 9, 2, 'keluar_2', 'pengeluaran'),
(56, 9, 3, 'sampingan', 'pemasukkan'),
(57, 9, 1, 'keluar', 'pengeluaran'),
(58, 9, 1, 'keluar_3', 'pengeluaran'),
(59, 9, 3, 'gaji', 'pemasukkan'),
(61, 9, 1, 'mobil xenia', 'pengeluaran'),
(62, 9, 4, 'emas', 'pengeluaran'),
(63, 9, 4, 'mobil', 'pengeluaran');

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

--
-- Dumping data for table `rencana_keuangan`
--

INSERT INTO `rencana_keuangan` (`id_rencana`, `id_user`, `id_kategori`, `tujuan_keuangan`, `uang_sekarang`, `jumlah_dibutuhkan`, `tanggal_buat`, `tanggal_target`) VALUES
(29, 9, 61, 'mobil xenia', 60000000, 160000000, '2023-12-13', '2025-11-12'),
(30, 9, 63, 'mobil', 100000, 120000, '2023-12-14', '2025-11-12');

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

--
-- Dumping data for table `transaksi_keuangan`
--

INSERT INTO `transaksi_keuangan` (`id_transaksi`, `id_user`, `id_kategori`, `jumlah`, `tanggal`, `keterangan`) VALUES
(47, 9, 51, 120000, '2023-11-12', 'belibli'),
(48, 9, 56, 16000000, '2023-12-12', 'tes masuk'),
(49, 9, 59, 14000000, '2023-11-01', 'tes gaji'),
(50, 9, 61, 60000000, '2023-12-13', 'mobil xenia'),
(51, 9, 57, 17000000, '2023-11-12', 'beli baju'),
(52, 9, 51, 1000000, '2023-12-13', 'beli teh'),
(53, 9, 56, 100000000, '2023-11-12', 'sampingan'),
(54, 9, 62, 120000, '2023-11-12', 'emas'),
(55, 9, 63, 100000, '2023-12-14', 'mobil');

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
-- Indexes for table `detail_tujuan`
--
ALTER TABLE `detail_tujuan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_rencana` (`id_rencana`);

--
-- Indexes for table `kategori_parent`
--
ALTER TABLE `kategori_parent`
  ADD PRIMARY KEY (`id_parent`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kategori_transaksi`
--
ALTER TABLE `kategori_transaksi`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `id_parent` (`id_parent`);

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
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `kategori_parent`
--
ALTER TABLE `kategori_parent`
  MODIFY `id_parent` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori_transaksi`
--
ALTER TABLE `kategori_transaksi`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `rencana_keuangan`
--
ALTER TABLE `rencana_keuangan`
  MODIFY `id_rencana` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `transaksi_keuangan`
--
ALTER TABLE `transaksi_keuangan`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_tujuan`
--
ALTER TABLE `detail_tujuan`
  ADD CONSTRAINT `detail_tujuan_ibfk_1` FOREIGN KEY (`id_rencana`) REFERENCES `rencana_keuangan` (`id_rencana`);

--
-- Constraints for table `kategori_parent`
--
ALTER TABLE `kategori_parent`
  ADD CONSTRAINT `kategori_parent_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `kategori_transaksi`
--
ALTER TABLE `kategori_transaksi`
  ADD CONSTRAINT `kategori_transaksi_ibfk_1` FOREIGN KEY (`id_parent`) REFERENCES `kategori_parent` (`id_parent`);

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
