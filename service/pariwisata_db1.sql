-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 14, 2024 at 12:38 PM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pariwisata_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `kuliner`
--

CREATE TABLE `kuliner` (
  `id_kuliner` int NOT NULL,
  `nama_kuliner` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `harga_rata_rata` decimal(10,2) DEFAULT NULL,
  `jam_buka` time DEFAULT NULL,
  `jam_tutup` time DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `fasilitas` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kuliner`
--

INSERT INTO `kuliner` (`id_kuliner`, `nama_kuliner`, `deskripsi`, `harga_rata_rata`, `jam_buka`, `jam_tutup`, `lokasi`, `kategori`, `fasilitas`) VALUES
(2, 'Nasi Goreng', 'Makanan khas Indonesia yang terdiri dari nasi yang digoreng bersama bumbu-bumbu dan bahan lainnya', '25000.00', '08:00:00', '22:00:00', 'Jakarta', 'Makanan', 'Wifi, Tempat Duduk');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nomor_telepon` varchar(20) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `email`, `password`, `nomor_telepon`, `role`) VALUES
(66, 'A', 'A@', '81dc9bdb52d04dc20036dbd8313ed055', '1234', NULL),
(68, 'B', 'B@', '827ccb0eea8a706c4c34a16891f84e7b', '12345', NULL),
(69, 'C', 'C@', '81dc9bdb52d04dc20036dbd8313ed055', '12341', NULL),
(70, 'D', 'D@', '4c56ff4ce4aaf9573aa5dff913df997a', '121', NULL),
(71, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', NULL),
(72, 'arga', 'arga12@gmail', 'c51ce410c124a10e0db5e4b97fc2af39', '0811111', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE `statistik` (
  `id_statistik` int NOT NULL,
  `id_pengguna` int NOT NULL,
  `jumlah_pengunjung` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `bulan` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int NOT NULL,
  `id_pengguna` int DEFAULT NULL,
  `id_wisata` int DEFAULT NULL,
  `id_kuliner` int DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `komentar` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` int NOT NULL,
  `gambar` blob NOT NULL,
  `nama_wisata` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `biaya_masuk` decimal(10,2) DEFAULT NULL,
  `jam_buka` time DEFAULT NULL,
  `jam_tutup` time DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `fasilitas` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `gambar`, `nama_wisata`, `deskripsi`, `biaya_masuk`, `jam_buka`, `jam_tutup`, `lokasi`, `kategori`, `fasilitas`) VALUES
(1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kuliner`
--
ALTER TABLE `kuliner`
  ADD PRIMARY KEY (`id_kuliner`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `email` (`email`,`nomor_telepon`);

--
-- Indexes for table `statistik`
--
ALTER TABLE `statistik`
  ADD PRIMARY KEY (`id_statistik`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_wisata` (`id_wisata`),
  ADD KEY `id_kuliner` (`id_kuliner`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kuliner`
--
ALTER TABLE `kuliner`
  MODIFY `id_kuliner` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `statistik`
--
ALTER TABLE `statistik`
  MODIFY `id_statistik` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `ulasan_ibfk_2` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id_wisata`),
  ADD CONSTRAINT `ulasan_ibfk_3` FOREIGN KEY (`id_kuliner`) REFERENCES `kuliner` (`id_kuliner`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
