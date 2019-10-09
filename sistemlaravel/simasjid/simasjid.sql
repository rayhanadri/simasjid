-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2019 at 11:48 PM
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'public/dist/assets/img/avatar/avatar-1.png',
  `aktif` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `id_jabatan`, `username`, `password`, `nama`, `alamat`, `telp`, `email`, `link_foto`, `aktif`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'sadmin', '$2y$10$QD6YPDdJvZy4UOKYu6QjsuH.tfDfV7smCwvU.WXZ4VH5orXRvaLhO', 'super admin', 'malang', '123', 'sadmin@gmail.com', 'public/dist/assets/img/avatar/avatar-1.png	', 1, NULL, '2019-10-08 16:00:10', '2019-10-08 16:00:10'),
(2, 1, 'sadmin2', '$2y$10$FqeTxYOYDID6faInKn1YwO2Collj1IGHijewFadof6rSAuIOnlxr.', 'sadmin2', 'malang', '12345', 'sadmin2@gmail.com', NULL, 1, NULL, '2019-10-08 16:26:36', '2019-10-08 16:26:36'),
(3, 1, 'sadmin3', '$2y$10$bMvGvq8PKPfqdiz4tC/WPeyI4Ds3Rl16gwdLnj81SyVu4aRpPwKPO', 'sadmin3', 'malang', '123', 'sadmin3@gmail.com', NULL, 1, NULL, '2019-10-08 16:28:09', '2019-10-08 16:28:09'),
(4, 1, 'sadmin4', '$2y$10$KQcljajNWwWPTj.0CtNupeoOHa7f.vZtE4ACA6YK4vaFQt2m4Ju0q', 'asdf', 'asdf', '1234', 'asd@asd.as', NULL, 1, NULL, '2019-10-08 16:30:58', '2019-10-08 16:30:58'),
(5, 1, 'sadmin5', '$2y$10$TOIReEdsSD503bHo8TzUEeoKTZ2pLkW54/2XZglMaHRtdi73gLZ1a', 'sadmin5', 'malang', '123', 'sadmin5@gmail.com', NULL, 1, NULL, '2019-10-08 16:32:50', '2019-10-08 16:32:50'),
(6, 1, 'admin', '$2y$10$OE6L.FJaN0XLIRJpaaOW7ursZD3PIBqUMpEFuTchWsPuXviUr.eH2', 'Pak Ketua', 'Jl. Veteran Malang', '123', 'simasjid.ibnusina@gmail.com', 'public/dist/assets/img/avatar/avatar-1.png', 1, NULL, '2019-10-09 10:49:40', '2019-10-09 10:49:40'),
(7, 1, 'rayhanadri', '$2y$10$eMBywVg4pajzE9EBpR2/Eu/hbBrXeUVW8cT.7fTkXntHTtqm67XMe', 'Rayhan Adri', 'Malang', '085966556997', 'rayerzz99@gmail.com', 'foto_profil/rayhanadri.jpg', 1, 'wxYE6dvz4jr35pV7CBLtIrLRL8ETrqhWnqJx2XgrI5kajQChefTcZPbaYgqF', '2019-10-09 12:31:28', '2019-10-09 14:45:20');

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
('sadmin@gmail.com', '$2y$10$9giAJD3afHPFHoPRnFtwzu9oeM3I9.DElqKY6zi8R26DwvMVonIk6', '2019-10-08 16:07:09');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
