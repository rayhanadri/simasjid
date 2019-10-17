-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2019 at 06:48 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simasjid`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'public/dist/assets/img/avatar/avatar-1.png',
  `id_status` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `id_jabatan`, `username`, `password`, `nama`, `alamat`, `telp`, `email`, `link_foto`, `id_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'rayhanadri', '$2y$10$SArt0sqqTU2F6Vn3SO7e9e1yMl1a0EoqLo0CFplQ.1mxZQzoRvrKO', 'Rayhan Adri', 'Malang', '085966556997', 'rayerzz99@gmail.com', 'foto_profil/rayhanadri.jpg', 1, NULL, '2019-10-11 10:16:23', '2019-10-12 19:13:11'),
(2, 3, 'tatang', '$2y$10$pH/lhP0nrm1ZIHr20xfycu9KFyzqtqnvzIpQII36C.xu7/o1YjWBu', 'Ismiarta Aknuranda', 'Malang', '081111223415', 'ismiarta@gmail.com', 'public/dist/assets/img/avatar/avatar-1.png', 1, NULL, '2019-10-11 10:31:51', '2019-10-11 10:31:51'),
(5, 4, 'testdaftar', '$2y$10$cM1SjEsoLmytdCv7EAEmv.Gdqy42m6xKl97soWy.U7C4DfQtVPAUu', 'asdwqwer', 'malang', '12312312', 'tester@gmail.com', 'public/dist/assets/img/avatar/avatar-1.png', 1, NULL, '2019-10-11 12:50:09', '2019-10-12 19:15:21'),
(6, 9, 'tester123', '$2y$10$iX83T.ktB3WCk.G0Mb9j7.JypszjsQSDDL.ll.BoEUlft4p4BGxim', 'testerr', 'asdas', '123123', 'qwe@qwe.co', 'public/dist/assets/img/avatar/avatar-1.png', 2, NULL, '2019-10-11 12:50:54', '2019-10-12 08:38:56'),
(8, 6, 'budi', '$2y$10$vW9R2iU/tobHcoM7brlLveRYaS0CJMLo/7VuuX72WMKcVFDN844hW', 'Budi Budiman', 'asdasd asdas', '09819023890123', 'budi@gmail.com', 'foto_profil/budi.jpg', 1, NULL, '2019-10-11 14:30:26', '2019-10-13 14:36:32'),
(21, 8, 'zxcv', '$2y$10$rnvPXRt9A3YBlN0oCuw9AuinxEQ/jZOARaMN8OV21di8GSzSM7nIm', 'zxcv', 'zxcv', 'zxc', 'zxcv2@s.c', 'public/dist/assets/img/avatar/avatar-1.png', 3, NULL, '2019-10-11 18:51:10', '2019-10-11 18:51:10'),
(22, 9, 'calontakmir1', '$2y$10$Ap9N4vZ9C.4CzATBPBMQ0.sErqIc7Oklljdk2HlKGktSwBRQs/N1e', 'calon takmir 123', 'calon', '0801293', 'calon@c.com', 'public/dist/assets/img/avatar/avatar-1.png', 1, NULL, '2019-10-12 08:41:06', '2019-10-12 08:58:30'),
(23, 1, 'ketua', '$2y$10$JsCcNL37GUm/E9EREuMd2.J/.QkaKfJqx8M17gUn70LSmDVGdJ3gq', 'ketua', 'ketua', '123123123123', 'ketua@gmail.com', 'public/dist/assets/img/avatar/avatar-1.png', 1, NULL, '2019-10-12 09:27:12', '2019-10-12 09:28:23'),
(24, 8, 'nahyarirda', '$2y$10$qVRtiZSCUV.b0cKoCbNbP.D7/W7mXIhYRzX9Rp5gP05mbA1K.B5dG', 'Nahyar Irda', 'Jl. Bunga Coklat no.20, Kecamatan Jatimulyo, Kelurahan Lowokwaru, Kota Malang, Jawa Timur.', '08123456789', 'nahyarirda@gmail.com', 'public/dist/assets/img/avatar/avatar-1.png', 3, NULL, '2019-10-13 14:33:11', '2019-10-13 14:33:11'),
(25, 8, 'qwerty', '$2y$10$4LJG4l0itCxBZT4F586SLOJWemq5Cok/gh7ie25/HDTMhWtPjdTK2', 'qwerty', 'qwerty', '12312313', 'qwerty@gmail.com', 'public/dist/assets/img/avatar/avatar-1.png', 3, NULL, '2019-10-13 16:53:17', '2019-10-13 16:53:17'),
(26, 8, 'belumaktif', '$2y$10$yr2Q0JEl9In5PyQOlA6psu6rqCUSbw9y400kNwBbrGsEJbETvLzy2', 'belum aktif', 'qweqweqwe', '098787987', 'qwerty123@gmail.com', 'public/dist/assets/img/avatar/avatar-1.png', 3, NULL, '2019-10-14 10:26:05', '2019-10-14 10:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `anggota_jabatan`
--

CREATE TABLE `anggota_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota_jabatan`
--

INSERT INTO `anggota_jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Ketua Takmir'),
(2, 'Bendahara'),
(3, 'Sekretaris'),
(4, 'Kerohanian'),
(5, 'Kepala Rumah Tangga'),
(6, 'Humas'),
(7, 'Keamanan'),
(8, 'Takmir'),
(9, 'Remaja Masjid');

-- --------------------------------------------------------

--
-- Table structure for table `anggota_status`
--

CREATE TABLE `anggota_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota_status`
--

INSERT INTO `anggota_status` (`id_status`, `status`) VALUES
(1, 'Aktif'),
(2, 'Non-Aktif'),
(3, 'Belum Verifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `id_register` int(11) NOT NULL,
  `id_master` varchar(10) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_kondisi` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nilai` double NOT NULL,
  `tgl_terima` date NOT NULL,
  `last_id_check` int(11) DEFAULT NULL,
  `keterangan` varchar(255) NOT NULL,
  `batas_pakai` double NOT NULL,
  `link_foto` varchar(255) NOT NULL,
  `qr_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`id_register`, `id_master`, `id_jenis`, `id_kondisi`, `id_lokasi`, `nama`, `nilai`, `tgl_terima`, `last_id_check`, `keterangan`, `batas_pakai`, `link_foto`, `qr_code`) VALUES
(1, 'PEL1', 1, 1, 1, 'Proyektor HP', 2000000, '2019-01-01', 0, '', 5, '', ''),
(2, 'PEL1', 1, 3, 1, 'Proyektor HP', 2000000, '2019-10-01', 1, '', 5, '', ''),
(3, 'FUR2', 1, 3, 1, 'Meja Kayu Jati', 2000000, '2012-04-18', NULL, '', 2, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `aset_jenis`
--

CREATE TABLE `aset_jenis` (
  `id_jenis` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset_jenis`
--

INSERT INTO `aset_jenis` (`id_jenis`, `jenis`) VALUES
(1, 'Aset Tetap');

-- --------------------------------------------------------

--
-- Table structure for table `aset_kondisi`
--

CREATE TABLE `aset_kondisi` (
  `id_kondisi` int(11) NOT NULL,
  `kondisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset_kondisi`
--

INSERT INTO `aset_kondisi` (`id_kondisi`, `kondisi`) VALUES
(1, 'Baik'),
(2, 'Rusak Ringan'),
(3, 'Rusak Berat'),
(4, 'Hilang');

-- --------------------------------------------------------

--
-- Table structure for table `aset_lokasi`
--

CREATE TABLE `aset_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset_lokasi`
--

INSERT INTO `aset_lokasi` (`id_lokasi`, `lokasi`) VALUES
(1, 'Gudang Penyimpanan'),
(2, 'Ruang Dalam Masjid');

-- --------------------------------------------------------

--
-- Table structure for table `aset_master`
--

CREATE TABLE `aset_master` (
  `id_master` varchar(10) NOT NULL,
  `master` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset_master`
--

INSERT INTO `aset_master` (`id_master`, `master`) VALUES
('PEL1', 'Peralatan Elektronik'),
('FUR2', 'Furniture');

-- --------------------------------------------------------

--
-- Stand-in structure for view `aset_view`
-- (See below for the actual view)
--
CREATE TABLE `aset_view` (
`id_register` int(11)
,`id_master` varchar(10)
,`id_jenis` int(11)
,`id_kondisi` int(11)
,`id_lokasi` int(11)
,`nama` varchar(255)
,`nilai` double
,`tgl_terima` date
,`last_id_check` int(11)
,`keterangan` varchar(255)
,`batas_pakai` double
,`masa_pakai` bigint(21)
,`lewat_masa` varchar(5)
,`link_foto` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `aset_view_2`
-- (See below for the actual view)
--
CREATE TABLE `aset_view_2` (
`id_register` int(11)
,`id_master` varchar(10)
,`master` varchar(255)
,`id_jenis` int(11)
,`jenis` varchar(255)
,`id_kondisi` int(11)
,`kondisi` varchar(100)
,`id_lokasi` int(11)
,`lokasi` varchar(255)
,`nilai` double
,`tgl_terima` date
,`last_id_check` int(11)
,`batas_pakai` double
,`masa_pakai` bigint(21)
,`lewat_batas` varchar(5)
,`link_foto` varchar(255)
,`qr_code` varchar(255)
,`keterangan` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_10_08_215357_anggota', 1),
(3, '2019_10_08_220400_anggota', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sadmin@gmail.com', '$2y$10$9giAJD3afHPFHoPRnFtwzu9oeM3I9.DElqKY6zi8R26DwvMVonIk6', '2019-10-08 16:07:09'),
('rayerzz99@gmail.com', '$2y$10$8ZlKAARXDDg0XIa2hSKsW.ntMDriXg3VO9KI7U0/VLygq.SfhCwBa', '2019-10-12 09:15:37');

-- --------------------------------------------------------

--
-- Structure for view `aset_view`
--
DROP TABLE IF EXISTS `aset_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `aset_view`  AS  select `aset`.`id_register` AS `id_register`,`aset`.`id_master` AS `id_master`,`aset`.`id_jenis` AS `id_jenis`,`aset`.`id_kondisi` AS `id_kondisi`,`aset`.`id_lokasi` AS `id_lokasi`,`aset`.`nama` AS `nama`,`aset`.`nilai` AS `nilai`,`aset`.`tgl_terima` AS `tgl_terima`,`aset`.`last_id_check` AS `last_id_check`,`aset`.`keterangan` AS `keterangan`,`aset`.`batas_pakai` AS `batas_pakai`,timestampdiff(YEAR,`aset`.`tgl_terima`,current_timestamp()) AS `masa_pakai`,if(timestampdiff(YEAR,`aset`.`tgl_terima`,current_timestamp()) < `aset`.`batas_pakai`,'Tidak','Ya') AS `lewat_masa`,`aset`.`link_foto` AS `link_foto` from `aset` ;

-- --------------------------------------------------------

--
-- Structure for view `aset_view_2`
--
DROP TABLE IF EXISTS `aset_view_2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `aset_view_2`  AS  select `aset`.`id_register` AS `id_register`,`aset`.`id_master` AS `id_master`,(select `aset_master`.`master` from `aset_master` where `aset`.`id_master` = `aset_master`.`id_master`) AS `master`,`aset`.`id_jenis` AS `id_jenis`,(select `aset_jenis`.`jenis` from `aset_jenis` where `aset`.`id_jenis` = `aset_jenis`.`id_jenis`) AS `jenis`,`aset`.`id_kondisi` AS `id_kondisi`,(select `aset_kondisi`.`kondisi` from `aset_kondisi` where `aset`.`id_kondisi` = `aset_kondisi`.`id_kondisi`) AS `kondisi`,`aset`.`id_lokasi` AS `id_lokasi`,(select `aset_lokasi`.`lokasi` from `aset_lokasi` where `aset`.`id_lokasi` = `aset_lokasi`.`id_lokasi`) AS `lokasi`,`aset`.`nilai` AS `nilai`,`aset`.`tgl_terima` AS `tgl_terima`,`aset`.`last_id_check` AS `last_id_check`,`aset`.`batas_pakai` AS `batas_pakai`,timestampdiff(YEAR,`aset`.`tgl_terima`,curdate()) AS `masa_pakai`,if(timestampdiff(YEAR,`aset`.`tgl_terima`,curdate()) > `aset`.`batas_pakai`,'Ya','Tidak') AS `lewat_batas`,`aset`.`link_foto` AS `link_foto`,`aset`.`qr_code` AS `qr_code`,`aset`.`keterangan` AS `keterangan` from `aset` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `anggota_username_unique` (`username`),
  ADD UNIQUE KEY `anggota_email_unique` (`email`);

--
-- Indexes for table `anggota_jabatan`
--
ALTER TABLE `anggota_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `anggota_status`
--
ALTER TABLE `anggota_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id_register`);

--
-- Indexes for table `aset_jenis`
--
ALTER TABLE `aset_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `aset_kondisi`
--
ALTER TABLE `aset_kondisi`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indexes for table `aset_lokasi`
--
ALTER TABLE `aset_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `anggota_jabatan`
--
ALTER TABLE `anggota_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `anggota_status`
--
ALTER TABLE `anggota_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `id_register` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aset_jenis`
--
ALTER TABLE `aset_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aset_kondisi`
--
ALTER TABLE `aset_kondisi`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `aset_lokasi`
--
ALTER TABLE `aset_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
