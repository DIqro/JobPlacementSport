-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2018 at 08:52 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jps`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) UNSIGNED NOT NULL,
  `nama` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `password`, `remember_token`) VALUES
(1, 'Admin', 'admin@min.com', '$2y$10$w6jFf.wiSYaeEnLcWdZWruua9Rig.zU2HoUYT3KubWDzCaq3432eK', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_lowker` int(11) NOT NULL,
  `id_komentator` int(11) NOT NULL,
  `isi` text NOT NULL,
  `tgl_komen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_lowker`, `id_komentator`, `isi`, `tgl_komen`) VALUES
(1, 1, 1, 'deskripsinya ga jelas', '2017-11-06 14:58:35'),
(2, 1, 2, 'iya nih', '2017-11-06 15:17:52'),
(3, 1, 2, 'hahaha', '2017-11-06 15:31:38'),
(4, 1, 1, 'Quas aut expedita qui qui. Doloribus voluptas enim numquam.', '2017-11-07 03:38:09'),
(5, 1, 1, 'Aut ratione quam ut assumenda est ipsa illum', '2017-11-07 03:38:20'),
(6, 1, 1, 'wewowlll', '2017-11-11 05:15:06'),
(7, 3, 4, 'haha', '2017-11-13 08:10:36'),
(10, 3, 2, 'wew', '2017-11-13 08:32:12'),
(11, 3, 2, 'kok?', '2017-11-13 08:34:21'),
(12, 1, 1, 'Message', '2017-12-08 04:23:38'),
(13, 2, 1, 'Aut maiores voluptatum quos ipsam voluptas nam ipsum. Maiores quis dolor explicabo qui quam mollitia. Id nostrum', '2017-12-13 23:26:48');

-- --------------------------------------------------------

--
-- Table structure for table `lamaran`
--

CREATE TABLE `lamaran` (
  `id_lamaran` int(11) NOT NULL,
  `id_lowker` int(11) NOT NULL,
  `id_pelamar` int(11) NOT NULL,
  `status_lamaran` varchar(255) NOT NULL,
  `tanggal_melamar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lamaran`
--

INSERT INTO `lamaran` (`id_lamaran`, `id_lowker`, `id_pelamar`, `status_lamaran`, `tanggal_melamar`) VALUES
(1, 2, 1, 'lolos', '2017-11-11 05:51:27'),
(3, 1, 2, 'lolos', '2017-11-11 07:10:38'),
(4, 1, 6, 'lolos', '2017-12-08 05:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `lowker`
--

CREATE TABLE `lowker` (
  `id_lowker` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `nama_lembaga` varchar(100) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `syarat` text NOT NULL,
  `masa_berlaku` varchar(50) NOT NULL,
  `gaji` int(11) NOT NULL DEFAULT '0',
  `deadline` date NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(25) NOT NULL,
  `tgl_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `lowker`
--

INSERT INTO `lowker` (`id_lowker`, `id_pemilik`, `judul`, `nama_lembaga`, `kategori`, `syarat`, `masa_berlaku`, `gaji`, `deadline`, `alamat`, `kontak`, `deskripsi`, `status`, `tgl_post`) VALUES
(1, 1, 'Dicari pelatih badminton', 'CV Mandala Oktaviani (Persero) Tbk', 'Pelatih', 'Dolores at ipsum corrupti libero sint ut. Doloribus molestiae molestias distinctio quasi voluptas neque mollitia. Earum ipsam modi perspiciatis sint. Quaerat maiores quia et sed dicta officia et.', 'sampai kapanpun', 7000, '2017-11-15', 'Ki. Basket No. 990, Banda Aceh 71432, JaBar', '+3562173182453 (momod)', 'Aliquid ipsa cumque ipsum ut et explicabo. Quos sequi recusandae nostrum quibusdam. Aut explicabo quod optio est. Rerum illo qui odio velit voluptatem laborum.', 'valid', '2017-11-08 12:31:08'),
(2, 2, 'Dicari komentator bla', 'PT Sudiati (Persero) Tbk', 'veteran', 'Quos dolorem et fugit et sequi. Aut maiores voluptatum quos ipsam voluptas nam ipsum. Maiores quis dolor explicabo qui quam mollitia. Id nostrum eligendi aperiam aut velit voluptas sit.', 'besok', 552793, '2017-11-07', 'Ds. Jayawijaya No. 650, Bontang 40730, KalTeng', 'Wa : +1944003532492 (momod).', 'Quos dolorem et fugit et sequi. Aut maiores voluptatum quos ipsam voluptas nam ipsum. Maiores quis dolor explicabo qui quam mollitia. Id nostrum eligendi aperiam aut velit voluptas sit.', 'valid', '2017-11-08 12:01:49'),
(3, 1, 'dicari atlet lari', 'PD Halim Mardhiyah Tbk', 'atlet', 'Est ex nihil laborum sed itaque sequi ea. Ipsum beatae sed illo amet ea. Earum sit et totam numquam magni ex illo. Qui voluptas odio aut quidem ducimus optio quis.', '-', 0, '2018-08-02', 'Jr. Rajawali No. 470, Banjarbaru 27483, Jambi', '+4054909689594', 'Repellendus illo exercitationem laudantium ut non neque. Tenetur fugit tempora tempore ut sit architecto quidem. Eligendi corrupti harum numquam ut nesciunt nihil.Est ducimus vel ex dolor voluptatem corporis. Sit dolor deleniti minima impedit omnis inventore modi. Aliquid saepe facilis fugit occaecati eos.', 'valid', '2017-11-07 04:48:49'),
(4, 5, 'shashba', 'sbhbhbd', 'bdybdybs', 'bshsdbhsdbh', 'ybyebwybe', 378327287, '2018-08-02', 'ysdbybsy', 'dbybydbys', 'dnunsduds', 'ditolak', '2017-11-24 09:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `nama`, `email`, `password`, `alamat`, `tgl_lahir`, `remember_token`) VALUES
(1, 'Melody NL', 'melody@chan.com', '$2y$10$UFaHDM568iT1YneYsQVFTOxxoezLBEAWqnzXwQ.UeHeqBGGYyPOfq', 'Bandung', '1997-03-21', 'I1jf77uuq2R3X9s21mbZKDTII3P1A9OelN9iYYyW7bwo39A5bCylFjODyRNx'),
(2, 'Yupi chan', 'yupi@chan.com', '$2y$10$WODUElCKkzDyofnua83xYuD8bIItUSNp.6R5gEstx4fTWiyzwcxzG', 'Madiun', '1999-11-09', 'VeKbP4hoFliX7acTTTMkyz65vUdjzWghGnZFPzXa81XiUys7uwj1k3xmW6rH'),
(4, 'Minmin Temur Z', 'minmin@temur.com', '$2y$10$gTl07VFZJJl9pJYZ23WADe355e9IdkDNCBwrA/aWMRD.1lBA.1QCS', 'jlJr. Batako No. 974, Kupang 98837, Aceh', '1971-04-01', 'OB4IpyEqlMormfe5Aj6OXtvOYBPxrZcPAYPXF4vW2PjG8uZv2Dqp2XbnQNA1'),
(5, 'Rizky', 'Risky@gmail.com', '$2y$10$Xo.pqxCL5szO5JCRf12H/.jVw0qznKBqxmZGnpoX0i/clS7hwQ1v6', 'Jakarta', '1997-03-21', 'VP7xQUrJEEpmAQejfqvsphcArZeobzJ4UVTOIIt8artcU3kSFUcuWZe0j1vQ'),
(6, 'NamikazeZ', 'namikaze@mail.com', '$2y$10$v6bFHmQLSZus0S720g7eCewC/FG62HiTNY0TPZtbmPNEDe2MTX.E6', 'Indon', '1992-10-21', 'bI55sqV0kyXBsd7YaPuYfac1GYgaDvsbhdN1z2wpCtMnknMebtl5UEYB97nC');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `id_lowker` int(11) NOT NULL,
  `pesan` varchar(150) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `id_pengirim`, `id_penerima`, `id_lowker`, `pesan`, `waktu`) VALUES
(1, 2, 1, 2, 'lolos', '2017-11-11 07:17:11'),
(2, 2, 1, 2, 'tidak lolos', '2017-11-11 07:17:28'),
(3, 2, 1, 2, 'lolos', '2017-11-11 07:19:19'),
(4, 1, 2, 1, 'tidak lolos', '2017-12-07 06:23:23'),
(5, 1, 2, 1, 'lolos', '2017-12-07 06:23:31'),
(6, 1, 6, 1, 'lolos', '2017-12-08 05:56:02'),
(7, 1, 6, 1, 'tidak lolos', '2017-12-08 05:56:26'),
(8, 1, 6, 1, 'lolos', '2017-12-08 05:56:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `pk_id_komentator` (`id_komentator`),
  ADD KEY `pk_id_lowker` (`id_lowker`);

--
-- Indexes for table `lamaran`
--
ALTER TABLE `lamaran`
  ADD PRIMARY KEY (`id_lamaran`),
  ADD KEY `fk_id_pelamar` (`id_pelamar`),
  ADD KEY `fk_id_lowker` (`id_lowker`);

--
-- Indexes for table `lowker`
--
ALTER TABLE `lowker`
  ADD PRIMARY KEY (`id_lowker`),
  ADD KEY `pk_id_pemilik` (`id_pemilik`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `member_email_unique` (`email`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `pk_id_pengirim` (`id_pengirim`),
  ADD KEY `pk_id_penerima` (`id_penerima`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `lamaran`
--
ALTER TABLE `lamaran`
  MODIFY `id_lamaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lowker`
--
ALTER TABLE `lowker`
  MODIFY `id_lowker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `pk_id_komentator` FOREIGN KEY (`id_komentator`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `pk_id_lowker` FOREIGN KEY (`id_lowker`) REFERENCES `lowker` (`id_lowker`);

--
-- Constraints for table `lamaran`
--
ALTER TABLE `lamaran`
  ADD CONSTRAINT `fk_id_lowker` FOREIGN KEY (`id_lowker`) REFERENCES `lowker` (`id_lowker`),
  ADD CONSTRAINT `fk_id_pelamar` FOREIGN KEY (`id_pelamar`) REFERENCES `member` (`id`);

--
-- Constraints for table `lowker`
--
ALTER TABLE `lowker`
  ADD CONSTRAINT `pk_id_pemilik` FOREIGN KEY (`id_pemilik`) REFERENCES `member` (`id`);

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `pk_id_penerima` FOREIGN KEY (`id_penerima`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `pk_id_pengirim` FOREIGN KEY (`id_pengirim`) REFERENCES `member` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
