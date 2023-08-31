-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2023 at 04:29 AM
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
-- Database: `pengaduan_masyarakat`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `ari`
-- (See below for the actual view)
--
CREATE TABLE `ari` (
`nik` char(16)
,`nama` varchar(35)
,`username` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `arii`
-- (See below for the actual view)
--
CREATE TABLE `arii` (
`id_petugas` int(11)
,`nama_petugas` varchar(35)
,`tanggapan` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `ariii`
-- (See below for the actual view)
--
CREATE TABLE `ariii` (
`id_petugas` int(11)
,`nama_petugas` varchar(35)
,`tanggapan` text
);

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`) VALUES
('1', 'pikri', 'pikir hetset', 'pikri123', '08521'),
('1234', 'nopal', 'opal', 'opal gaming', '08922'),
('243534543', 'apa aja', 'Ari', 'Ari123', '0812');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES
(1, '2023-08-23', '243534543', 'banjir\r\n', 'banjir.jpeg', 'ditolak'),
(2, '2023-08-30', '243534543', 'kebakaran', 'kebakaran.jpeg', 'ditolak'),
(4, '2023-08-31', '243534543', 'naufal marah besar', '40-kata-kata-bijak-marah-bantu-meredamkan-emosi.jpg', 'selesai'),
(5, '2023-08-02', '1', 'sadas', '', 'proses');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(3, 'admin1', 'admin1', 'admin1', '0851756', 'admin'),
(4, 'petugas1', 'petugas1', 'petugas1', '08752114', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(1, 1, '2023-08-31', 'fiqri ganteng', 3),
(6, 4, '2023-08-31', 'bang otot', 3),
(7, 5, '2023-08-31', 'asdsad', 4),
(8, 2, '2023-08-31', 'asdsadadasd', 4);

-- --------------------------------------------------------

--
-- Structure for view `ari`
--
DROP TABLE IF EXISTS `ari`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ari`  AS SELECT `masyarakat`.`nik` AS `nik`, `masyarakat`.`nama` AS `nama`, `masyarakat`.`username` AS `username` FROM (`masyarakat` join `pengaduan` on(`masyarakat`.`nik` = `pengaduan`.`nik`))  ;

-- --------------------------------------------------------

--
-- Structure for view `arii`
--
DROP TABLE IF EXISTS `arii`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `arii`  AS SELECT `petugas`.`id_petugas` AS `id_petugas`, `petugas`.`nama_petugas` AS `nama_petugas`, `tanggapan`.`tanggapan` AS `tanggapan` FROM (`petugas` join `tanggapan` on(`petugas`.`id_petugas` = `tanggapan`.`id_petugas`))  ;

-- --------------------------------------------------------

--
-- Structure for view `ariii`
--
DROP TABLE IF EXISTS `ariii`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ariii`  AS SELECT `petugas`.`id_petugas` AS `id_petugas`, `petugas`.`nama_petugas` AS `nama_petugas`, `tanggapan`.`tanggapan` AS `tanggapan` FROM (`tanggapan` join `petugas` on(`tanggapan`.`id_petugas` = `petugas`.`id_petugas`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`),
  ADD CONSTRAINT `tanggapan_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
