-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2023 at 08:54 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmi_pusat`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_pmi`
--

CREATE TABLE `user_pmi` (
  `id` int(11) NOT NULL,
  `nama_cabang` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_pmi`
--

INSERT INTO `user_pmi` (`id`, `nama_cabang`, `username`, `password`, `role`) VALUES
(1, 'Jakarta', 'admin1', 'admin', 'user'),
(2, 'Bekasi', 'admin2', 'admin', 'user'),
(3, 'Jakarta', 'admin3', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_rs`
--

CREATE TABLE `user_rs` (
  `id` int(11) NOT NULL,
  `nama_rs` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `lokasi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_rs`
--

INSERT INTO `user_rs` (`id`, `nama_rs`, `username`, `password`, `lokasi`) VALUES
(1, 'RS Siloam M', 'admin_siloam', 'admin', 'Jakarta'),
(2, 'RS Kramat Pulo', 'admin_kramat', 'admin', 'Jakarta'),
(3, 'RS Bekasi', 'admin_bekasi', 'admin', 'Bekasi'),
(4, 'RS Jakasampurna', 'admin_jaka', 'admin', 'Bekasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_pmi`
--
ALTER TABLE `user_pmi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_rs`
--
ALTER TABLE `user_rs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_pmi`
--
ALTER TABLE `user_pmi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_rs`
--
ALTER TABLE `user_rs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
