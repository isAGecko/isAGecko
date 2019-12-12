-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2019 at 03:06 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isagecko_db`
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
(8, 'admin', '2019-11-28', '19:05:23', '00:05:44', '1', 'Saya tidk bisa masuhsdnWG\'ONO VHQ IUNHIDPI IACUHnobwoqlj', 'jaya.jpg', 100),
(9, 'admin', '2019-11-29', '17:26:50', '01:31:54', '1', 'asdfgh', 'jaya.jpg', 100),
(10, 'admin', '2019-11-30', '17:05:38', '09:05:46', '0', '', 'jaya.jpg', 50),
(11, 'admin', '2019-12-01', '07:54:39', '00:05:12', '0', '', 'jaya.jpg', 100),
(12, 'kadal', '2019-12-01', '09:50:37', '01:50:41', '0', '', 'jaya.jpg', 75),
(17, 'bayu', '2019-12-02', '06:22:09', '01:37:41', '0', '', 'bayu2019-12-02.png', 75),
(18, 'bayu', '2019-12-01', '06:23:04', '01:36:46', '0', '', 'bayu2019-12-01.png', 75),
(23, 'abid', '2019-12-02', '10:30:41', '02:30:49', '0', '', 'abid2019-12-02.png', 50),
(24, 'abid', '2019-12-03', '10:32:58', '02:33:09', '0', '', 'abid2019-12-03.png', 50),
(25, 'abid', '2019-12-04', '10:33:29', '02:33:42', '0', '', 'abid2019-12-04.png', 50),
(26, 'abid', '2019-12-06', '09:23:37', '01:24:02', '0', 'aaaaaaa', 'abid2019-12-06.png', 75),
(30, 'bayu', '2019-12-10', '07:56:52', '00:02:59', '0', '', 'bayu2019-12-10.png', 100),
(31, 'abid', '2019-12-10', '07:57:28', '00:02:23', '0', '', 'abid2019-12-10.png', 100);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `auth_key`, `password_hash`, `role`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'kadal', 'olnE7u7i-27bUg_hUf1DLDjig_NIWlgS', '$2y$13$t63w.mnAr8BAfvecqdqtG.jT3bwrHLVdM08ZDZjYCb3r4hp1Teyyy', '0', NULL, 'kadal@gmail.com', 10, 1575164220, 1575164220),
(2, 'bayu', 'dWu7pmEqouAbtUicyq3DHFWFlTebnuW1', '$2y$13$JowwO/xpj4678PUDwsSPkeTvZ/lUXZVd6UZC7tt6Had/T.fJFAbnW', '0', NULL, 'bayu@gmail.com', 10, 1575169252, 1575169252),
(3, 'abid', 'RxGvbLsv6ncpS5UCqvrF0dMbnxudcAvz', '$2y$13$qUKKYfOt7GiJW8srVMeWt.s6tGbTYmUVe4uH5xu/TMKtEfpVYrEsm', '0', NULL, 'abid@gmail.com', 10, 1575169766, 1575169766),
(4, 'Fany', 'c0dCVbdBd1C0OKKK0IrcvG7ZoVueGZ7S', '$2y$13$cgNRGprhoiFnleidFN/Fue0AyVas9ElrC2Z.GQZhTAj2VXIQ.64kW', '0', NULL, 'fany@gmail.com', 10, 1575937891, 1575937891),
(5, 'lala', 'Dxjc2oO4auEpi-ECoukWXClMsCkPjObC', '$2y$13$1x35g7fHJsTUpdZAO0QiHuyE5ZOYJUe21P9vYRvM5t7MiHhRXqFGi', '1', NULL, 'lala@gmail.com', 10, 1575937954, 1575937954);

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
  `id_pegawai` varchar(200) NOT NULL,
  `total_point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `point`
--

INSERT INTO `point` (`id_point`, `id_pegawai`, `total_point`) VALUES
(36, 'bayu', 825),
(43, 'abid', 900);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'kadal', 'X51JEjMkMUuUtH_oj8zKSGWlnfyXu1cR', '$2y$13$eSvjbjbLV1SCUZQzMNxDGeGFozOrIvOt2UzU2PRiCaYOtRK5R1zDi', NULL, 'kadal@gmail.com', 10, 1575163407, 1575163407);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`id_point`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `point`
--
ALTER TABLE `point`
  MODIFY `id_point` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
