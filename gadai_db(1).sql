-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 07:39 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gadai_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absen`
--

CREATE TABLE `tbl_absen` (
  `tbl_absen` int(20) NOT NULL,
  `id_karyawan` int(20) NOT NULL,
  `lat_absen` varchar(255) NOT NULL,
  `long_absen` varchar(255) NOT NULL,
  `waktu_absen` datetime NOT NULL,
  `status_absen` enum('masuk','izin dispensasi','alfa','izin cuti','keluar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cuti`
--

CREATE TABLE `tbl_cuti` (
  `id_cuti` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_karyawan` int(20) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_cuti_mulai` date NOT NULL,
  `tgl_cuti_selesai` date NOT NULL,
  `alasan_cuti` text NOT NULL,
  `status_cuti` enum('pengajuan','diterima','ditolak','keluar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cuti_tgl`
--

CREATE TABLE `tbl_cuti_tgl` (
  `id_cuti_tgl` int(20) NOT NULL,
  `id_cuti` int(20) NOT NULL,
  `id_karyawan` int(20) NOT NULL,
  `tgl_cuti` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dispensasi`
--

CREATE TABLE `tbl_dispensasi` (
  `id_dispensasi` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_karyawan` int(20) NOT NULL,
  `jenis_dispensasi` varchar(255) NOT NULL,
  `keterangan_dispensasi` varchar(255) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `file_dispensasi` varchar(255) NOT NULL,
  `tgl_diterima` date NOT NULL,
  `status_dispensasi` enum('pengajuan','diterima','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dispensasi_tgl`
--

CREATE TABLE `tbl_dispensasi_tgl` (
  `id_dispensasi_tgl` int(20) NOT NULL,
  `id_dispensasi` int(20) NOT NULL,
  `id_karyawan` int(20) NOT NULL,
  `tgl_dispensasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gaji`
--

CREATE TABLE `tbl_gaji` (
  `id_gaji` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_karyawan` int(20) NOT NULL,
  `nama_gaji` varchar(255) NOT NULL,
  `catatan_gaji` varchar(255) NOT NULL,
  `gaji_seharusnya` varchar(255) NOT NULL,
  `gaji_diterima` varchar(255) NOT NULL,
  `waktu_gajian` date NOT NULL,
  `waktu_gajian_diterima` date NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hari_masuk`
--

CREATE TABLE `tbl_hari_masuk` (
  `id_hari_masuk` int(20) NOT NULL,
  `no_hari` varchar(5) NOT NULL,
  `nama_hari` varchar(255) NOT NULL,
  `nama_hari_en` varchar(255) NOT NULL,
  `status_masuk` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hari_masuk`
--

INSERT INTO `tbl_hari_masuk` (`id_hari_masuk`, `no_hari`, `nama_hari`, `nama_hari_en`, `status_masuk`) VALUES
(1, '1', 'senin', 'monday', 1),
(2, '2', 'selasa', 'tuesday', 1),
(3, '3', 'rabu', 'wednesday', 1),
(4, '4', 'kamis', 'thursday', 1),
(5, '5', 'jumat', 'friday', 1),
(6, '6', 'sabtu', 'saturday', 0),
(7, '7', 'minggu', 'sunday', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id_karyawan` int(20) NOT NULL,
  `id_pekerjaan` int(20) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `no_telp_karyawan` varchar(255) NOT NULL,
  `nik_karyawan` varchar(255) NOT NULL,
  `alamat_karyawan` varchar(255) NOT NULL,
  `unit_kerja` varchar(255) NOT NULL,
  `alamat_unit` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `atasan_langsung` varchar(255) NOT NULL,
  `tgl_bergabung` date DEFAULT current_timestamp(),
  `email_karyawan` varchar(255) NOT NULL,
  `password_karyawan` varchar(255) NOT NULL,
  `status_karyawan` enum('aktif','non_aktif') NOT NULL,
  `salary` varchar(255) NOT NULL,
  `tgl_terdaftar_karyawan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_password_temp`
--

CREATE TABLE `tbl_password_temp` (
  `id_password_temp` int(20) NOT NULL,
  `id_karyawan` int(20) NOT NULL,
  `password_temp` varchar(255) NOT NULL,
  `expired_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pekerjaan`
--

CREATE TABLE `tbl_pekerjaan` (
  `id_pekerjaan` int(20) NOT NULL,
  `nama_pekerjaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pekerjaan`
--

INSERT INTO `tbl_pekerjaan` (`id_pekerjaan`, `nama_pekerjaan`) VALUES
(1, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reimburse`
--

CREATE TABLE `tbl_reimburse` (
  `id_reimburse` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_karyawan` int(20) NOT NULL,
  `jenis_klaim` varchar(255) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_berkas` date NOT NULL,
  `nominal_reimburse` varchar(255) NOT NULL,
  `file_reimburse` varchar(255) NOT NULL,
  `tgl_reimburse` date NOT NULL,
  `status_reimburse` enum('pengajuan','selesai','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int(20) NOT NULL,
  `nama_setting` varchar(255) NOT NULL,
  `isi_setting` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `isi_setting`, `latitude`, `longitude`) VALUES
(1, 'location', 'Jl. Almadaniah', '-6.254703693303939', '106.92501783370973');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(5) NOT NULL,
  `username_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `level_user` enum('super_admin','admin') NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `no_hp_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `foto_user` varchar(255) NOT NULL,
  `tgl_aktif` datetime NOT NULL,
  `status_user` enum('aktif','non aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username_user`, `password_user`, `level_user`, `nama_user`, `no_hp_user`, `email_user`, `foto_user`, `tgl_aktif`, `status_user`) VALUES
(1, 'admin', '$2y$10$rgQJY6gJHA4KdJZYU6ZKB.gJ6nS4NYB5ah1DcQkw4.esv8wX1aTVG', 'super_admin', 'Fajar', '992', 'admin@admin.com', 'files/prof_pic1.jpg', '2020-06-24 14:44:32', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_absen`
--
ALTER TABLE `tbl_absen`
  ADD PRIMARY KEY (`tbl_absen`);

--
-- Indexes for table `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indexes for table `tbl_cuti_tgl`
--
ALTER TABLE `tbl_cuti_tgl`
  ADD PRIMARY KEY (`id_cuti_tgl`);

--
-- Indexes for table `tbl_dispensasi`
--
ALTER TABLE `tbl_dispensasi`
  ADD PRIMARY KEY (`id_dispensasi`);

--
-- Indexes for table `tbl_dispensasi_tgl`
--
ALTER TABLE `tbl_dispensasi_tgl`
  ADD PRIMARY KEY (`id_dispensasi_tgl`);

--
-- Indexes for table `tbl_gaji`
--
ALTER TABLE `tbl_gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `tbl_hari_masuk`
--
ALTER TABLE `tbl_hari_masuk`
  ADD PRIMARY KEY (`id_hari_masuk`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tbl_password_temp`
--
ALTER TABLE `tbl_password_temp`
  ADD PRIMARY KEY (`id_password_temp`);

--
-- Indexes for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `tbl_reimburse`
--
ALTER TABLE `tbl_reimburse`
  ADD PRIMARY KEY (`id_reimburse`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_absen`
--
ALTER TABLE `tbl_absen`
  MODIFY `tbl_absen` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  MODIFY `id_cuti` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cuti_tgl`
--
ALTER TABLE `tbl_cuti_tgl`
  MODIFY `id_cuti_tgl` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dispensasi`
--
ALTER TABLE `tbl_dispensasi`
  MODIFY `id_dispensasi` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dispensasi_tgl`
--
ALTER TABLE `tbl_dispensasi_tgl`
  MODIFY `id_dispensasi_tgl` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_gaji`
--
ALTER TABLE `tbl_gaji`
  MODIFY `id_gaji` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_hari_masuk`
--
ALTER TABLE `tbl_hari_masuk`
  MODIFY `id_hari_masuk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `id_karyawan` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_password_temp`
--
ALTER TABLE `tbl_password_temp`
  MODIFY `id_password_temp` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pekerjaan`
--
ALTER TABLE `tbl_pekerjaan`
  MODIFY `id_pekerjaan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_reimburse`
--
ALTER TABLE `tbl_reimburse`
  MODIFY `id_reimburse` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
