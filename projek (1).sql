-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 12:53 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `pemberi` varchar(30) NOT NULL DEFAULT 'Bendehara Umum',
  `penerima` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_transaksi`, `pemberi`, `penerima`, `jumlah`) VALUES
(10, '2020-06-06', 'Bendum', 'Ketum', 10000),
(11, '2020-06-05', 'Shinta', 'BMC', 50000),
(12, '2020-06-10', 'Shinta', 'Ketum', 10000),
(14, '2020-06-10', 'Shinta', 'Rezha', 10000),
(15, '2020-06-23', 'Shinta', 'Ketum', 15000),
(16, '2020-06-06', 'Ketupat', 'Bimbim', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` varchar(25) NOT NULL,
  `userNama` varchar(25) NOT NULL,
  `userPassword` longtext NOT NULL,
  `userGroup` varchar(15) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `userNama`, `userPassword`, `userGroup`) VALUES
('admin', 'administrator', '1234', 'admin'),
('baba', 'Asep', '1234', 'admin'),
('bambang', 'Bambang Yudi', '1234', 'admin'),
('budi', 'Budi Santoso', '12345', 'admin'),
('dandi', 'Dandi Prayoga', '1234', 'admin'),
('dodi', 'Dodi Mulyo', '1234', 'Admin'),
('rezha', 'Rezha', '1234', ''),
('susi', 'Susi Susanti', 'asd', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
