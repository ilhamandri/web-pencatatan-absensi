-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 06:42 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

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
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` bigint(20) NOT NULL,
  `matakuliah_id` bigint(20) NOT NULL,
  `mahasiswa_id` bigint(20) NOT NULL,
  `jam` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `matakuliah_id`, `mahasiswa_id`, `jam`) VALUES
(7, 1, 1, '2020-03-26 12:20:37');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `password` varchar(99) NOT NULL,
  `session` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`, `session`) VALUES
(1, 'admin', 'admin@unpar.ac.id', 'admin123', 'bddcfce23ccad2813c9e41691f4d9b43');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` bigint(99) NOT NULL,
  `matakuliah_id` bigint(99) NOT NULL,
  `jam_mulai` int(1) NOT NULL,
  `jam_selesai` int(1) NOT NULL,
  `hari` int(1) NOT NULL,
  `ruang_id` bigint(99) NOT NULL,
  `token` text,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `matakuliah_id`, `jam_mulai`, `jam_selesai`, `hari`, `ruang_id`, `token`, `last_update`) VALUES
(1, 1, 7, 9, 1, 1, '9f0657027fed1efcd20849d9a25370cc', '2020-03-26 12:20:37'),
(2, 2, 8, 11, 2, 2, 'a021d9f19396a05b039b6fe5cdc9c1e3', '2020-03-24 17:00:00'),
(3, 1, 9, 12, 4, 2, '1d62b5633a971a4e38e862ab040d1f67', '2020-03-28 03:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(100) NOT NULL,
  `npm` bigint(10) NOT NULL,
  `nama` varchar(25) NOT NULL DEFAULT 'DEFAULT NAME',
  `session_key` text NOT NULL,
  `email` varchar(99) NOT NULL,
  `password` varchar(99) NOT NULL,
  `prodi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `npm`, `nama`, `session_key`, `email`, `password`, `prodi_id`) VALUES
(1, 2013730001, 'Ilham Andrians', '2a4aeeb964ba086e32795ef346ee32d4', 'ilham@unpar.ac.id', 'ilham', 1),
(2, 2013730029, 'Kevin R', 'd41d8cd98f00b204e9800998ecf8427e', '', '', NULL),
(3, 20137300514, 'Walah', 'd41d8cd98f00b204e9800998ecf8427e', '', '', NULL),
(4, 20137300512, 'Fadel Amien', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` bigint(250) NOT NULL,
  `kode` varchar(99) NOT NULL,
  `nama` varchar(99) NOT NULL,
  `sks` int(1) NOT NULL,
  `absent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `kode`, `nama`, `sks`, `absent`) VALUES
(1, 'MK-001s', 'Algoritma Struktur Dasar', 4, 3),
(2, 'MK-002', 'Pemrograman Berbasis Objek', 6, 4),
(15, 'AIF512', 'ADBO', 4, 5),
(16, 'AIF612', 'DAA', 4, 6),
(17, 'AIF12332', 'Matkul1', 2, 0),
(18, 'AIF1233', 'cantikmart', 2, 0);

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
(2, 2, 1),
(3, 15, 1),
(4, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `nama`) VALUES
(1, 'Teknik Informatika'),
(2, 'Matematika');

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
(2, 'Lab Praktikum 1', 9, 0),
(3, '10321', 10, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
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
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` bigint(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` bigint(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mk_mahasiswa`
--
ALTER TABLE `mk_mahasiswa`
  MODIFY `id` bigint(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` bigint(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
