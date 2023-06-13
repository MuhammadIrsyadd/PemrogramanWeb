-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3325
-- Generation Time: Jun 13, 2023 at 06:06 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `no_telp`, `alamat`, `password`) VALUES
(6, 'Admin 1', 'admin1@gmail.com', '089098890789', 'Surabaya', 'iam@admin');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`) VALUES
(1, 'Ruang Seminar'),
(2, 'Ruang Kelas'),
(3, 'Laboratorium');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `isi_notifikasi` text NOT NULL,
  `status` varchar(30) NOT NULL,
  `tgl_notifikasi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `ruangan` varchar(55) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `tgl_pinjam` datetime NOT NULL,
  `status` varchar(30) NOT NULL,
  `bukti` varchar(250) NOT NULL,
  `status_verifikasi` varchar(30) NOT NULL,
  `keperluan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(5) NOT NULL,
  `id_kategori` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kapasitas` int(4) NOT NULL,
  `status` varchar(30) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `id_kategori`, `nama`, `kapasitas`, `status`, `foto`, `deskripsi`) VALUES
(14, 1, 'Ruang Seminar 01', 60, 'available', 'img5.jpg', 'Ruang Seminar 01\r\n\r\nGedung II Fakultas Ilmu Komputer\r\nUPN Veteran Jawa Timur'),
(15, 2, 'Ruang Kelas 01', 50, 'available', 'img1.jpg', 'Ruang Kelas 01\r\n\r\nGedung I Fakultas Ilmu Komputer\r\nUPN Veteran Jawa Timur'),
(16, 2, 'Ruang Kelas 02', 50, 'available', 'img2.jpg', 'Ruang Kelas 02\r\n\r\nGedung I Fakultas Ilmu Komputer\r\nUPN Veteran Jawa Timur'),
(17, 3, 'Laboratorium Komputer 01', 40, 'available', 'img7.jpg', 'Laboratorium Komputer 01\r\n\r\nGedung II Fakultas Ilmu Komputer\r\nUPN Veteran Jawa Timur'),
(18, 2, 'Ruang Kelas 03', 50, 'available', 'img3.jpg', 'Ruang Kelas 03\r\n\r\nGedung I Fakultas Ilmu Komputer\r\nUPN Veteran Jawa Timur'),
(19, 1, 'Ruang Seminar 02', 70, 'available', 'img6.jpg', 'Ruang Seminar 02\r\n\r\nGedung II Fakultas Ilmu Komputer\r\nUPN Veteran Jawa Timur'),
(20, 1, 'Ruang Seminar 03', 50, 'available', 'img4.jpeg', 'Ruang Seminar 03\r\n\r\nGedung II Fakultas Ilmu Komputer\r\nUPN Veteran Jawa Timur'),
(21, 3, 'Laboratorium Komputer 02', 40, 'available', 'img8.jpg', 'Laboratorium Komputer 02\r\n\r\nGedung I Fakultas Ilmu Komputer\r\nUPN Veteran Jawa Timur'),
(22, 3, 'Laboratorium Komputer 03', 50, 'available', 'img9.jpg', 'Laboratorium Komputer 03\r\n\r\nGedung II Fakultas Ilmu Komputer\r\nUPN Veteran Jawa Timur');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `no_telp`, `alamat`, `password`) VALUES
(8, 'Afifa Salsa', 'afifa@gmail.com', '087567456456', 'Malang', 'afifa01');

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi`
--

CREATE TABLE `verifikasi` (
  `id_verifikasi` int(5) NOT NULL,
  `id_reservasi` int(5) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `tgl_verifikasi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `verifikasi`
--
ALTER TABLE `verifikasi`
  ADD PRIMARY KEY (`id_verifikasi`),
  ADD KEY `id_reservasi` (`id_reservasi`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `verifikasi`
--
ALTER TABLE `verifikasi`
  MODIFY `id_verifikasi` int(5) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ruang`
--
ALTER TABLE `ruang`
  ADD CONSTRAINT `ruang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `verifikasi`
--
ALTER TABLE `verifikasi`
  ADD CONSTRAINT `verifikasi_ibfk_1` FOREIGN KEY (`id_reservasi`) REFERENCES `reservasi` (`id_reservasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `verifikasi_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
