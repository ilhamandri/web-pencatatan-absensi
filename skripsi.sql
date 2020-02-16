-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2020 at 09:03 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` bigint(99) NOT NULL,
  `matakuliah_id` bigint(99) NOT NULL,
  `jam_mulai` int(1) NOT NULL,
  `jam_selesai` int(1) NOT NULL,
  `tipe` int(2) NOT NULL,
  `hari` int(1) NOT NULL,
  `ruang_id` bigint(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `matakuliah_id`, `jam_mulai`, `jam_selesai`, `tipe`, `hari`, `ruang_id`) VALUES
(1, 1, 7, 9, 1, 1, 1),
(2, 2, 8, 11, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(100) NOT NULL,
  `npm` bigint(10) NOT NULL,
  `nama` varchar(25) NOT NULL DEFAULT 'DEFAULT NAME'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `npm`, `nama`) VALUES
(1, 2013730001, 'Ilham Andrian'),
(2, 2013730029, 'Kevin R');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` bigint(250) NOT NULL,
  `kode` varchar(99) NOT NULL,
  `nama` varchar(99) NOT NULL,
  `sks` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `kode`, `nama`, `sks`) VALUES
(1, 'MK-001', 'Algoritma Struktur Dasar', 4),
(2, 'MK-002', 'Pemrograman Berbasis Objek', 6);

-- --------------------------------------------------------

--
-- Table structure for table `mk_mahasiswa`
--

CREATE TABLE `mk_mahasiswa` (
  `id` bigint(99) NOT NULL,
  `matakuliah_id` bigint(99) NOT NULL,
  `mahasiswa_id` bigint(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_mahasiswa`
--

INSERT INTO `mk_mahasiswa` (`id`, `matakuliah_id`, `mahasiswa_id`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id` bigint(99) NOT NULL,
  `nama` varchar(999) NOT NULL,
  `gedung` int(99) NOT NULL,
  `lantai` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id`, `nama`, `gedung`, `lantai`) VALUES
(1, '10317', 10, 3),
(2, 'Lab Praktikum 1', 9, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_mahasiswa`
--
ALTER TABLE `mk_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` bigint(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mk_mahasiswa`
--
ALTER TABLE `mk_mahasiswa`
  MODIFY `id` bigint(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` bigint(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
