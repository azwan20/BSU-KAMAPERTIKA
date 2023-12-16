-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 01:47 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kamapertika`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', '11');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `keluar` bigint(50) NOT NULL,
  `masuk` bigint(50) NOT NULL,
  `saldo` bigint(50) NOT NULL,
  `ket` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `tanggal`, `nama`, `alamat`, `keluar`, `masuk`, `saldo`, `ket`) VALUES
(1, '2023-12-15', 'Ehsan', 'Malaysia', 12000, 20000, 30000, 'nda adaji'),
(2, '2023-12-30', 'Ehsan', 'Sudiang', 12000, 23000, 12000, 'okesi'),
(3, '2023-12-24', 'Jein', 'Malaysia', 20000, 100000, 10000, 'oke');

-- --------------------------------------------------------

--
-- Table structure for table `penjemputan`
--

CREATE TABLE `penjemputan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjemputan`
--

INSERT INTO `penjemputan` (`id`, `tanggal`, `nama`, `alamat`) VALUES
(1, '2023-12-31', 'Ehsan', 'Malaysia'),
(7, '2023-12-16', 'Thor Son of Odin', 'Amerika');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `p_kg` bigint(11) NOT NULL,
  `p_rp` bigint(100) NOT NULL,
  `k_kg` bigint(50) NOT NULL,
  `k_rp` bigint(50) NOT NULL,
  `l_kg` bigint(50) NOT NULL,
  `l_rp` bigint(50) NOT NULL,
  `b_kg` bigint(50) NOT NULL,
  `b_rp` bigint(50) NOT NULL,
  `t_kg` bigint(50) NOT NULL,
  `t_rp` bigint(50) NOT NULL,
  `plastik` decimal(10,2) DEFAULT NULL,
  `kertas` decimal(10,2) DEFAULT NULL,
  `logam` decimal(10,2) DEFAULT NULL,
  `botol` decimal(10,2) DEFAULT NULL,
  `berat` bigint(20) NOT NULL,
  `harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `tanggal`, `p_kg`, `p_rp`, `k_kg`, `k_rp`, `l_kg`, `l_rp`, `b_kg`, `b_rp`, `t_kg`, `t_rp`, `plastik`, `kertas`, `logam`, `botol`, `berat`, `harga`) VALUES
(7, '2023-12-25', 0, 0, 2, 120000, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `id` int(11) NOT NULL,
  `fName` varchar(100) NOT NULL,
  `lName` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`id`, `fName`, `lName`, `username`, `password`) VALUES
(4, 'Rakaaa', 'Targaryan', 'jein', '123'),
(5, 'Aegon', 'Targaryan', 'loki', '123'),
(6, 'Rakaaa', 'diningrat', 'raka', '1234'),
(7, '', '', '', ''),
(8, '', '', '', ''),
(9, 'Rakaaa', 'Targaryan', 'loki', '0909'),
(10, 'Captain', 'America', 'captain10', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjemputan`
--
ALTER TABLE `penjemputan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penjemputan`
--
ALTER TABLE `penjemputan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
