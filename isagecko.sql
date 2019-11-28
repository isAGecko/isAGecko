-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2019 at 01:11 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isagecko`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `terlambat` time NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `detail` varchar(6500) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `id_pegawai`, `tanggal`, `jam`, `terlambat`, `keterangan`, `detail`, `foto`, `point`) VALUES
(1, '123456789', '2019-11-25', '07:31:08', '00:00:00', 'Masuk', 'Masuk', 'jaya.jpg', 100),
(2, 'admin', '2019-11-27', '10:29:41', '00:00:00', '1', 'aaaaa', 'jaya.jpg', 100),
(3, 'admin', '2019-11-27', '10:29:41', '00:00:00', '1', 'aaaaa', 'jaya.jpg', 100),
(4, 'admin', '2019-11-28', '10:30:02', '08:27:30', '1', 'aaa', 'jaya.jpg', 100),
(5, 'admin', '2019-11-28', '10:32:30', '08:24:16', '0', '', 'jaya.jpg', 100),
(6, 'admin', '2019-11-28', '10:51:32', '08:08:23', '0', '', 'jaya.jpg', 100),
(7, 'admin', '2019-11-28', '11:28:04', '07:31:43', '0', '', 'jaya.jpg', 100),
(8, 'admin', '2019-11-28', '19:05:23', '00:05:44', '1', 'Saya tidk bisa masuhsdnWG\'ONO VHQ IUNHIDPI IACUHnobwoqlj', 'jaya.jpg', 100);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_point` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nama_pegawai` int(11) NOT NULL,
  `nomor_telp` int(11) NOT NULL,
  `alamat` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `point`
--

CREATE TABLE `point` (
  `id_point` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `total_point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
