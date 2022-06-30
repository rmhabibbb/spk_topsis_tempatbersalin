-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 30, 2022 at 09:43 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk_topsis_rs`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

DROP TABLE IF EXISTS `alternatif`;
CREATE TABLE IF NOT EXISTS `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama_alternatif` varchar(35) NOT NULL,
  `alamat` text,
  `kontak` varchar(20) DEFAULT NULL,
  `foto` text,
  `email` varchar(30) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_alternatif`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama_alternatif`, `alamat`, `kontak`, `foto`, `email`, `status`) VALUES
(1, 'Bidan Mismal Jumaini', '-', '-', 'alternatif/432020882753.jpg', 'a1@gmail.com', 1),
(2, 'Bidan Lesi ', '-', '-', 'alternatif/451074.jpg', 'a2@gmail.com', 1),
(3, 'Bidan Cik Awa', '-', '-', 'alternatif/491341.jpg', 'a3@gmail.com', 1),
(4, 'Bidan Siti Khodijah', '-', '-', 'alternatif/514052.jpg', 'a4@gmail.com', 1),
(5, 'Puskesmas Tebing Bulang ', '-', '-', 'alternatif/600574.jpg', 'a5@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE IF NOT EXISTS `kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(35) NOT NULL,
  `keterangan` text NOT NULL,
  `bobot` int(2) NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `keterangan`, `bobot`) VALUES
(8, 'Biaya', '', 5),
(9, 'Fasilitas', '', 5),
(10, 'Pelayanan Imunisasi', '', 4),
(11, 'Lokasi', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE IF NOT EXISTS `pengguna` (
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `role` int(1) NOT NULL,
  `temp_kode` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`email`, `password`, `nama_pengguna`, `role`, `temp_kode`) VALUES
('a1@gmail.com', 'f8b51ea3dab97270c3d1df3cebd452a1', 'A1', 2, NULL),
('a2@gmail.com', '0be2e2181e44147226f01f97c939891b', 'A2', 2, NULL),
('a3@gmail.com', 'ccc0bf40a4ce6f31e511ddf16a32661b', 'A3', 2, NULL),
('a4@gmail.com', 'ce46c294226006ca45dcc40fc07db941', 'A4', 2, NULL),
('a5@gmail.com', '51500b906caa1422b9aeb7204aed2096', 'A5', 2, NULL),
('henioktaria@gmail.com', 'ddf52da2241fadd4721d6fe21f71804e', 'Heni Oktaria', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

DROP TABLE IF EXISTS `penilaian`;
CREATE TABLE IF NOT EXISTS `penilaian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_klinik` (`id_alternatif`),
  KEY `id_kriteria` (`id_kriteria`),
  KEY `id_subkriteria` (`id_subkriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id`, `id_alternatif`, `id_kriteria`, `id_subkriteria`) VALUES
(1, 1, 8, 33),
(2, 1, 9, 39),
(3, 1, 10, 44),
(4, 1, 11, 48),
(9, 2, 8, 33),
(10, 2, 9, 43),
(11, 2, 10, 44),
(12, 2, 11, 49),
(13, 3, 8, 33),
(14, 3, 9, 39),
(15, 3, 10, 45),
(16, 3, 11, 48),
(17, 4, 8, 35),
(18, 4, 9, 39),
(19, 4, 10, 44),
(20, 4, 11, 49),
(21, 5, 8, 37),
(22, 5, 9, 43),
(23, 5, 10, 45),
(24, 5, 11, 48);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

DROP TABLE IF EXISTS `subkriteria`;
CREATE TABLE IF NOT EXISTS `subkriteria` (
  `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkriteria` varchar(50) NOT NULL,
  `bobot` int(3) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  PRIMARY KEY (`id_subkriteria`),
  KEY `id_kriteria` (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `nama_subkriteria`, `bobot`, `id_kriteria`) VALUES
(33, '600.000 - 1.120.000', 5, 8),
(34, '1.130.000 - 1.640.000', 1, 8),
(35, '1.650.000 - 2.160.000', 2, 8),
(36, '2.170.000 - 2.680.000', 3, 8),
(37, '2.690.000 - 3.200.000', 4, 8),
(39, 'Peralatan, ruangan', 1, 9),
(40, 'Peralatan, ruangan, keamanan', 2, 9),
(41, 'Peralatan, ruangan, keamanan, makanan', 3, 9),
(42, 'Peralatan, ruangan, keamanan, makanan, kebersihan', 4, 9),
(43, 'Peralatan, ruangan, keamanan, makanan, kebersihan,', 5, 9),
(44, 'Menerima', 5, 10),
(45, 'Tidak Menerima', 4, 10),
(46, 'Pasar', 1, 11),
(47, 'Rumah makan', 2, 11),
(48, 'Jalan raya ', 5, 11),
(49, 'Rumah warga', 4, 11),
(50, 'Tempat ibadah', 3, 11);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD CONSTRAINT `fk_emailklinik` FOREIGN KEY (`email`) REFERENCES `pengguna` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `fk_penilaian2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_penilain1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `fk_subkriteria` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
