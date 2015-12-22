-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 25. Desember 2014 jam 09:36
-- Versi Server: 5.1.41
-- Versi PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbkmean`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin Perusahaan', 'admin.perusahaan@yahoo.com', '081267771344', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `centroid`
--

CREATE TABLE IF NOT EXISTS `centroid` (
  `id_centroid` int(5) NOT NULL AUTO_INCREMENT,
  `data_centroid` varchar(255) NOT NULL,
  PRIMARY KEY (`id_centroid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data untuk tabel `centroid`
--

INSERT INTO `centroid` (`id_centroid`, `data_centroid`) VALUES
(61, '250,130'),
(62, '125,90');

-- --------------------------------------------------------

--
-- Struktur dari tabel `centroid2`
--

CREATE TABLE IF NOT EXISTS `centroid2` (
  `id_centroid` int(5) NOT NULL AUTO_INCREMENT,
  `data_centroid` varchar(255) NOT NULL,
  PRIMARY KEY (`id_centroid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `centroid2`
--

INSERT INTO `centroid2` (`id_centroid`, `data_centroid`) VALUES
(1, '358.64,245.9775'),
(2, '60.95125,34.28375');

-- --------------------------------------------------------

--
-- Struktur dari tabel `centroid_data`
--

CREATE TABLE IF NOT EXISTS `centroid_data` (
  `id_new_centroid` int(11) NOT NULL AUTO_INCREMENT,
  `nilai_data_centroid` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_new_centroid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data untuk tabel `centroid_data`
--

INSERT INTO `centroid_data` (`id_new_centroid`, `nilai_data_centroid`, `status`) VALUES
(1, '8.08', 'B-0'),
(2, '0', 'R-0'),
(3, '8.08', 'B-0'),
(4, '0', 'R-0'),
(5, '57.45', 'B-0'),
(6, '40.27', 'R-0'),
(7, '308.16', 'R-1'),
(8, '166.51', 'B-1'),
(9, '153.49', 'B-0'),
(10, '99.63', 'R-0'),
(11, '290.81', 'R-1'),
(12, '193.39', 'B-1'),
(13, '56.93', 'B-0'),
(14, '0', 'R-0'),
(15, '21.60', 'B-0'),
(16, '17.31', 'R-0'),
(17, '12.10', 'B-0'),
(18, '2.56', 'R-0'),
(19, '547.78', 'R-1'),
(20, '443.33', 'B-1'),
(21, '287.81', 'R-1'),
(22, '180.68', 'B-1'),
(23, '169.88', 'B-0'),
(24, '114.50', 'R-0'),
(25, '8.08', 'B-0'),
(26, '0', 'R-0'),
(27, '8.08', 'B-0'),
(28, '0', 'R-0'),
(29, '57.45', 'B-0'),
(30, '40.27', 'R-0'),
(31, '308.16', 'R-1'),
(32, '166.51', 'B-1'),
(33, '153.49', 'B-0'),
(34, '99.63', 'R-0'),
(35, '290.81', 'R-1'),
(36, '193.39', 'B-1'),
(37, '56.93', 'B-0'),
(38, '0', 'R-0'),
(39, '21.60', 'B-0'),
(40, '17.31', 'R-0'),
(41, '12.10', 'B-0'),
(42, '2.56', 'R-0'),
(43, '547.78', 'R-1'),
(44, '443.33', 'B-1'),
(45, '287.81', 'R-1'),
(46, '180.68', 'B-1'),
(47, '169.88', 'B-0'),
(48, '114.50', 'R-0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagram`
--

CREATE TABLE IF NOT EXISTS `diagram` (
  `id_diagram` int(5) NOT NULL AUTO_INCREMENT,
  `x` text NOT NULL,
  `y` text NOT NULL,
  PRIMARY KEY (`id_diagram`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data untuk tabel `diagram`
--

INSERT INTO `diagram` (`id_diagram`, `x`, `y`) VALUES
(1, '8.08,', ''),
(2, '8.08,', ''),
(3, '57.45,', ''),
(4, '308.16,', ''),
(5, '153.49,', ''),
(6, '290.81,', ''),
(7, '56.93,', ''),
(8, '21.60,', ''),
(9, '12.10,', ''),
(10, '547.78,', ''),
(11, '287.81,', ''),
(12, '169.88,', ''),
(13, '', '0,'),
(14, '', '0,'),
(15, '', '40.27,'),
(16, '', '166.51,'),
(17, '', '99.63,'),
(18, '', '193.39,'),
(19, '', '0,'),
(20, '', '17.31,'),
(21, '', '2.56,'),
(22, '', '443.33,'),
(23, '', '180.68,'),
(24, '', '114.50,');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagram_centroid`
--

CREATE TABLE IF NOT EXISTS `diagram_centroid` (
  `id_diagram_centroid` int(5) NOT NULL AUTO_INCREMENT,
  `x` varchar(255) NOT NULL,
  `y` varchar(255) NOT NULL,
  PRIMARY KEY (`id_diagram_centroid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `diagram_centroid`
--

INSERT INTO `diagram_centroid` (`id_diagram_centroid`, `x`, `y`) VALUES
(1, '250,', ''),
(2, '125,', ''),
(3, '', '130,'),
(4, '', '90,');

-- --------------------------------------------------------

--
-- Struktur dari tabel `objek`
--

CREATE TABLE IF NOT EXISTS `objek` (
  `id_objek` int(5) NOT NULL AUTO_INCREMENT,
  `nama_objek` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  PRIMARY KEY (`id_objek`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `objek`
--

INSERT INTO `objek` (`id_objek`, `nama_objek`, `data`) VALUES
(8, 'Energen Vanila', '153.49,99.63'),
(7, 'Energen Coklat', '290.81,193.39'),
(6, 'Kopiko White Cofee', '56.93,0'),
(5, 'Kopiko Brown Coffee', '21.60,17.31'),
(4, 'Torabika Jahe Susu', '12.10,2.56'),
(3, 'Torabika Cappucino', '547.78,443.33'),
(2, 'Torabika Moka', '287.81,180.68'),
(1, 'Torabika Susu', '169.88,114.50'),
(9, 'Energen Kacang Hijau', '308.16,166.51'),
(10, 'Energen Jahe', '57.45,40.27'),
(11, 'Energen Banana', '8.08,0'),
(12, 'Energen Strauwbery', '8.08,0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satukan`
--

CREATE TABLE IF NOT EXISTS `satukan` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `satukan`
--

INSERT INTO `satukan` (`id`, `data`) VALUES
(1, '8.08,8.08,57.45,308.16,153.49,290.81,56.93,21.60,12.10,547.78,287.81,169.88,'),
(2, '0,0,40.27,166.51,99.63,193.39,0,17.31,2.56,443.33,180.68,114.50,'),
(3, '250,125,'),
(4, '130,90,');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
