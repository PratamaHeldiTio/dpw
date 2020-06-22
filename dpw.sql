-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 11:13 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dpw`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_buku`
--

CREATE TABLE `daftar_buku` (
  `ISBN` varchar(7) NOT NULL,
  `judul_buku` varchar(128) NOT NULL,
  `penulis` varchar(128) NOT NULL,
  `penerbit` varchar(128) NOT NULL,
  `tahun_terbit` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_buku`
--

INSERT INTO `daftar_buku` (`ISBN`, `judul_buku`, `penulis`, `penerbit`, `tahun_terbit`) VALUES
('1111110', 'Para Priyayi: Sebuah Novel', 'Umar Kayam', 'PT Pustaka Utama Grafiti', 1991),
('1111111', 'Bumi Manusia', 'Pramoedya Ananta Toer ', 'Hasta Mitra', 1980),
('1111112', 'Anak Semua Bangsa', 'Pramoedya Ananta Toer ', 'Hasta Mitra', 1981),
('1111113', 'Arus Balik', 'Pramoedya Ananta Toer ', 'Hasta Mitra', 1995),
('1111114', 'Muhammad - Lelaki Penggenggam Hujan', 'Tasaro GK', 'Bentang ', 2016),
('1111115', 'Jejak Langkah', 'Pramoedya Ananta Toer ', 'Lentera Dipantara', 1985),
('1111116', 'Rumah Kaca', 'Pramoedya Ananta Toer ', 'Lentera Dipantara', 1988),
('1111117', 'Anak Bajang Menggiring Angin', 'Sindhunata', 'Gramedia', 2013),
('1111118', 'Pulang', 'Leila S. Chud', 'Gramedia', 2013),
('1111119', 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', 2005),
('1111120', 'Tenggelamnya Kapal Van Der Wijck', 'Hamka', 'Several ', 1938),
('1111121', 'Ronggeng Dukuh Paruk', 'Ahmad Tohari', 'Gramedia Pustaka Utama', 1982),
('1111122', 'Sang Pemimpi', 'Andrea Hirata', 'Bentang Pustaka', 2006),
('1111124', 'Burung-Burung Manyar', 'Y.B. Mangunwijaya R', 'Djambatan', 1981),
('1111125', 'Negeri 5 Menara', 'Ahmad Fuadi', 'Gramedia', 2009),
('1234567', 'Dasar Pemograman Web', 'Heldi Tio Pratama', 'Bukuku', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `img` varchar(256) NOT NULL,
  `date_time` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `img`, `date_time`) VALUES
(1, 'HELDI TIO PRATAMA', 'heldigemsel@gmail.com', '$2y$10$exqLpz6zEB.MdrOBp7vVJ.zAVDjHKknDhFBC004nBg8OdwvQlpwt.', 'heldigemsel@gmail.com.jpg', 1592719509);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_buku`
--
ALTER TABLE `daftar_buku`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
