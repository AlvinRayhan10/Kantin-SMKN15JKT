-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2024 at 09:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `nama_level`) VALUES
(1, 'Administrator'),
(2, 'Kasir1'),
(3, 'Kasir2'),
(4, 'kasir3'),
(5, 'kasir4');

-- --------------------------------------------------------

--
-- Table structure for table `tb_masakan`
--

CREATE TABLE `tb_masakan` (
  `id_masakan` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `nama_masakan` varchar(150) NOT NULL,
  `harga` varchar(150) NOT NULL,
  `stok` int(11) NOT NULL,
  `status_masakan` varchar(150) NOT NULL,
  `gambar_masakan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_masakan`
--

INSERT INTO `tb_masakan` (`id_masakan`, `id_level`, `nama_masakan`, `harga`, `stok`, `status_masakan`, `gambar_masakan`) VALUES
(52, 3, 'Nasi Kuning', '5000', 199, 'tersedia', 'Nasi Kuning.jpg'),
(54, 5, 'Nasi Tahu Bawang Putih', '10000', 299, 'tersedia', 'Nasi Tahu Bawang Putih.jpg'),
(56, 4, 'Nasi Goreng', '15000', 148, 'tersedia', 'Nasi Goreng.jpg'),
(57, 2, 'Pecel Ayam', '15000', 93, 'tersedia', 'Pecel Ayam.jpg'),
(58, 2, 'Ayam Geprek', '1000', 99, 'tersedia', 'Ayam Geprek.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_pengunjung` int(11) NOT NULL,
  `nama_pengunjung` varchar(150) NOT NULL,
  `waktu_pesan` datetime NOT NULL,
  `no_meja` int(11) NOT NULL,
  `total_harga` varchar(150) NOT NULL,
  `uang_bayar` varchar(150) DEFAULT NULL,
  `uang_kembali` varchar(150) DEFAULT NULL,
  `status_order` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `id_admin`, `id_pengunjung`, `nama_pengunjung`, `waktu_pesan`, `no_meja`, `total_harga`, `uang_bayar`, `uang_kembali`, `status_order`) VALUES
(14, 1, 9, '', '2019-08-03 12:43:52', 1, '48000', '50000', '2000', 'sudah bayar'),
(15, 1, 1, '', '2019-08-04 16:25:45', 1, '44000', '50000', '6000', 'sudah bayar'),
(16, 1, 1, '', '2019-08-04 16:35:24', 8, '105500', '150000', '44500', 'sudah bayar'),
(19, 1, 1, '', '2019-08-04 17:17:09', 1, '22000', '50000', '28000', 'sudah bayar'),
(21, 1, 10, '', '2019-08-07 08:54:23', 1, '22000', '50000', '28000', 'sudah bayar'),
(60, 18, 18, '', '2024-03-11 16:01:01', 1, '15000', '15000', '0', 'sudah bayar'),
(63, 19, 19, '', '2024-03-11 16:19:55', 1, '10000', '10000', '0', 'sudah bayar'),
(65, 19, 19, '', '2024-03-11 16:33:09', 1, '10000', '10000', '0', 'sudah bayar'),
(66, 19, 19, '', '2024-03-11 16:38:19', 1, '10000', '20000', '10000', 'sudah bayar'),
(70, 6, 6, 'Ariq Pratama', '2024-03-11 18:04:55', 1, '15000', '15000', '0', 'sudah bayar'),
(71, 6, 6, 'Ariq', '2024-03-11 18:45:52', 1, '15000', '15000', '0', 'sudah bayar'),
(72, 6, 6, 'Ariq Pratama', '2024-03-11 18:53:08', 2, '15000', '15000', '0', 'sudah bayar'),
(73, 7, 7, 'Alvin', '2024-03-11 18:56:40', 1, '5000', '5000', '0', 'sudah bayar'),
(74, 6, 6, 'Ariq lagi', '2024-03-11 19:06:41', 1, '1000', '1000', '0', 'sudah bayar'),
(75, 8, 8, 'Ariq ', '2024-03-11 19:27:34', 1, '15000', '15000', '0', 'sudah bayar'),
(76, 15, 15, 'mumun', '2024-03-11 19:32:29', 1, '10000', '10000', '0', 'sudah bayar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `id_masakan` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `status_pesan` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_pesan`
--

INSERT INTO `tb_pesan` (`id_pesan`, `id_user`, `id_order`, `id_masakan`, `jumlah`, `status_pesan`) VALUES
(33, 9, 14, 14, 2, 'sudah'),
(34, 9, 14, 8, 3, 'sudah'),
(35, 1, 15, 19, 2, 'sudah'),
(36, 1, 15, 14, 4, 'sudah'),
(37, 1, 16, 19, 3, 'sudah'),
(38, 1, 16, 14, 1, 'sudah'),
(39, 1, 16, 8, 7, 'sudah'),
(46, 1, 19, 19, 1, 'sudah'),
(47, 1, 19, 14, 2, 'sudah'),
(50, 10, 21, 18, 2, 'sudah'),
(61, 7, 0, 19, 0, 'sudah'),
(70, 7, 0, 52, 0, 'sudah'),
(72, 7, 0, 52, 0, 'sudah'),
(73, 7, 0, 52, 0, 'sudah'),
(74, 7, 0, 52, 0, 'sudah'),
(75, 7, 0, 52, 0, 'sudah'),
(76, 7, 0, 52, 0, 'sudah'),
(78, 7, 0, 52, 0, 'sudah'),
(96, 18, 60, 52, 3, 'sudah'),
(99, 19, 63, 55, 1, 'sudah'),
(102, 19, 65, 55, 1, 'sudah'),
(106, 19, 66, 55, 1, 'sudah'),
(111, 6, 70, 57, 1, 'sudah'),
(112, 6, 71, 57, 1, 'sudah'),
(113, 6, 72, 57, 1, 'sudah'),
(114, 7, 73, 52, 1, 'sudah'),
(115, 6, 74, 58, 1, 'sudah'),
(116, 8, 75, 56, 1, 'sudah'),
(117, 15, 76, 54, 1, 'sudah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stok`
--

CREATE TABLE `tb_stok` (
  `id_stok` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `jumlah_terjual` int(11) DEFAULT NULL,
  `status_cetak` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_stok`
--

INSERT INTO `tb_stok` (`id_stok`, `id_pesan`, `jumlah_terjual`, `status_cetak`) VALUES
(1, 46, 1, 'belum cetak'),
(2, 47, 2, 'belum cetak'),
(3, 48, 2, 'belum cetak'),
(4, 49, 1, 'belum cetak'),
(5, 50, 2, 'belum cetak'),
(6, 51, 0, 'belum cetak'),
(7, 52, 0, 'belum cetak'),
(8, 53, 0, 'belum cetak'),
(9, 54, 0, 'belum cetak'),
(10, 55, 0, 'belum cetak'),
(11, 56, 2, 'belum cetak'),
(12, 57, 1, 'belum cetak'),
(13, 58, 6, 'belum cetak'),
(14, 59, 1, 'belum cetak'),
(15, 60, 1, 'belum cetak'),
(16, 62, 0, 'belum cetak'),
(17, 63, 12, 'belum cetak'),
(18, 64, 2, 'belum cetak'),
(19, 66, 1, 'belum cetak'),
(20, 67, 2, 'belum cetak'),
(21, 69, 1, 'belum cetak'),
(22, 71, 1, 'belum cetak'),
(23, 77, 1, 'belum cetak'),
(24, 79, 1, 'belum cetak'),
(25, 84, 1, 'belum cetak'),
(26, 85, 0, 'belum cetak'),
(27, 86, 0, 'belum cetak'),
(28, 87, 1, 'belum cetak'),
(29, 88, 2, 'belum cetak'),
(30, 89, 1, 'belum cetak'),
(31, 90, 1, 'belum cetak'),
(32, 91, 1, 'belum cetak'),
(33, 92, 0, 'belum cetak'),
(34, 93, 1, 'belum cetak'),
(35, 94, 6, 'belum cetak'),
(36, 95, 2, 'belum cetak'),
(37, 96, 3, 'belum cetak'),
(38, 97, 2, 'belum cetak'),
(39, 98, 1, 'belum cetak'),
(40, 99, 1, 'belum cetak'),
(41, 100, 1, 'belum cetak'),
(42, 101, 0, 'belum cetak'),
(43, 102, 1, 'belum cetak'),
(44, 103, 1, 'belum cetak'),
(45, 104, 1, 'belum cetak'),
(46, 105, 0, 'belum cetak'),
(47, 106, 1, 'belum cetak'),
(48, 107, 1, 'belum cetak'),
(49, 108, 1, 'belum cetak'),
(50, 109, 1, 'belum cetak'),
(51, 110, 0, 'belum cetak'),
(52, 111, 1, 'belum cetak'),
(53, 112, 1, 'belum cetak'),
(54, 113, 1, 'belum cetak'),
(55, 114, 1, 'belum cetak'),
(56, 115, 1, 'belum cetak'),
(57, 116, 1, 'belum cetak'),
(58, 117, 1, 'belum cetak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama_user` varchar(150) NOT NULL,
  `id_level` int(11) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_user`, `id_level`, `status`) VALUES
(1, 'admin', '123', 'Hendrik Setiawan', 1, 'aktif'),
(6, 'hendro', '123', 'Hendro', 2, 'aktif'),
(7, 'fitri', '123', 'Fitri', 3, 'aktif'),
(8, 'slamet', '123', 'Slamet', 4, 'aktif'),
(9, 'sugiastutik', '123', 'Sugiastutik', 4, 'aktif'),
(15, 'bima123', '123', 'Bima', 5, 'aktif'),
(16, 'alvin', '123', 'Alvin', 1, 'aktif'),
(18, 'ariq', '123', 'Ariq', 3, 'aktif'),
(19, 'asd', '123', 'asd', 2, 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_masakan`
--
ALTER TABLE `tb_masakan`
  ADD PRIMARY KEY (`id_masakan`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_pengunjung` (`id_pengunjung`);

--
-- Indexes for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_masakan`
--
ALTER TABLE `tb_masakan`
  MODIFY `id_masakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `tb_stok`
--
ALTER TABLE `tb_stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_masakan`
--
ALTER TABLE `tb_masakan`
  ADD CONSTRAINT `level` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
