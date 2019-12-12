-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 04:42 AM
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
(31, 'abid', '2019-12-10', '07:57:28', '00:02:23', '0', '', 'abid2019-12-10.png', 100),
(32, 'jaya ', '2019-12-11', '10:02:13', '02:02:21', '0', '', 'jaya 2019-12-11.png', 50),
(33, 'abid', '2019-12-11', '10:15:40', '02:15:47', '0', '', 'abid2019-12-11.png', 50),
(34, 'bayu', '2019-12-11', '10:16:02', '02:16:10', '0', '', 'bayu2019-12-11.png', 50),
(35, 'fany', '2019-12-11', '10:18:52', '02:19:04', '0', '', 'fany2019-12-11.png', 50),
(36, 'lala', '2019-12-11', '10:20:09', '02:20:17', '0', '', 'lala2019-12-11.png', 50),
(37, 'budi', '2019-12-11', '10:24:53', '02:25:00', '0', '', 'budi2019-12-11.png', 50);

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
(8, 'jaya ', 'kdxuzeLnrh-sEYQj7nki1_3P4yD1fzkO', '$2y$13$075fUhI.a5oGQUom0IMj9ucyz5og8Jd0p6qR6xgUqS8YP4eaEp7pa', '0', NULL, 'jaya@gmail.com', 10, 1576033234, 1576033234),
(9, 'bayu', 'ypII3G_cVdVVWcZ6Sn5CqJ91chqY1FU1', '$2y$13$EJpad.0yh1/BvMY1/3XUBeDqsHIHK9I69.yGn2gvCPVdbiwY93TXC', '0', NULL, 'bayu@gmail.com', 10, 1576033500, 1576033500),
(10, 'abid', 'NLjIhvmswHkwYWpBCTBO1A9c--ibBfBB', '$2y$13$5peyuZUH7fIJ1UyLeJSYzejz8TfT8cdtgkcHmb/ZGAyIyUslNRxKe', '0', NULL, 'abid@gmail.com', 10, 1576033559, 1576033559),
(11, 'fany', '4e8c6yEu5s0ODlwXHppGF-nyYgA0R2Fv', '$2y$13$V3A4c0w4mbojPVL1rvxacu9KvSblS4PlAao7B9CXiD6BflNQNljx2', '0', NULL, 'fany@gmail.com', 10, 1576034252, 1576034252),
(12, 'lala', 'mvWvekjBwodKGEgdrXiIKi98h-T64J-a', '$2y$13$VNsY7FHCpMfRlYniUL7jHe2aC122kOrdmPJ26bsWxyLThqJrr1qaG', '0', NULL, 'lala@gmail.com', 10, 1576034326, 1576034326),
(15, 'budi', 'Bkfy1Gt8fDWkIj-5rhyIFxvYfpK1QRqM', '$2y$13$cmDylrSnI8Rbg5mMv9HWouC5DARbOENtd8p6L4Uu1qea6fRiJ3edq', '1', NULL, 'budi@gmail.com', 10, 1576034673, 1576034673);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(2, 'Manager'),
(3, 'Direktur'),
(4, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_point` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nama_pegawai` varchar(225) NOT NULL,
  `nomor_telp` varchar(111) NOT NULL,
  `alamat` varchar(1111) NOT NULL,
  `email` varchar(1111) NOT NULL,
  `role` varchar(255) NOT NULL,
  `gender` varchar(1111) NOT NULL,
  `password` varchar(1111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_point`, `nama`, `id_jabatan`, `nama_pegawai`, `nomor_telp`, `alamat`, `email`, `role`, `gender`, `password`) VALUES
(4, 0, 'Fahrul Sanjaya', 2, 'jaya ', '082264046359', 'Lamongan', 'jaya@gmail.com', '0', 'Laki-Laki', 'jayajaya'),
(5, 0, 'Bayu Agung P', 3, 'bayu', '085852876543', 'Surabaya', 'bayu@gmail.com', '0', 'Laki-Laki', 'bayubayu'),
(6, 0, 'Abidurrohman', 4, 'abid', '082264042356', 'Lamongan', 'abid@gmail.com', '0', 'Laki-Laki', 'abidabid'),
(7, 0, 'Astarika Fany A D', 3, 'fany', '082264042377', 'Lamongan', 'fany@gmail.com', '0', 'Perempuan', 'fanyfany'),
(8, 0, 'Lailatus Saadah', 2, 'lala', '082264046654', 'Lamongan', 'lala@gmail.com', '0', 'Perempuan', 'lalalala'),
(11, 0, 'Budi Sibudi', 4, 'budi', '082264046454', 'Lamongan', 'budi@gmail.com', '1', 'Laki-Laki', 'budibudi');

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
(36, 'bayu', 875),
(43, 'abid', 950),
(44, 'jaya ', 50),
(45, 'fany', 50),
(46, 'lala', 50),
(47, 'budi', 50);

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
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

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
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `point`
--
ALTER TABLE `point`
  MODIFY `id_point` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
