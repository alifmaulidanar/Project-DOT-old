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
-- Database: `pmi_jakarta`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cabang_pmi`
--

CREATE TABLE `tb_cabang_pmi` (
  `cabang_pmi` int(11) NOT NULL,
  `nama_cabang` varchar(50) NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_cabang_pmi`
--

INSERT INTO `tb_cabang_pmi` (`cabang_pmi`, `nama_cabang`, `no_telp`, `alamat`) VALUES
(1, 'Jakarta', '(021) 3906666', 'Jl. Kramat Raya No.47, RT.3/RW.4, Kramat, Kec. Senen, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10450');

-- --------------------------------------------------------

--
-- Table structure for table `tb_distribusi_darah`
--

CREATE TABLE `tb_distribusi_darah` (
  `nomor_distribusi` int(11) NOT NULL,
  `kd_rs` int(11) NOT NULL,
  `kd_cabang_pmi` int(11) NOT NULL,
  `kd_gol_darah` varchar(11) NOT NULL,
  `tgl_distribusi` date NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_distribusi_darah`
--

INSERT INTO `tb_distribusi_darah` (`nomor_distribusi`, `kd_rs`, `kd_cabang_pmi`, `kd_gol_darah`, `tgl_distribusi`, `qty`) VALUES
(1, 1, 1, 'AB', '2023-01-06', 1),
(2, 2, 1, 'A', '2023-01-06', 3);

--
-- Triggers `tb_distribusi_darah`
--
DELIMITER $$
CREATE TRIGGER `kurangin_stok` AFTER INSERT ON `tb_distribusi_darah` FOR EACH ROW BEGIN

UPDATE tb_gol_darah SET stok = stok - NEW.qty WHERE gol_darah = NEW.kd_gol_darah;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gol_darah`
--

CREATE TABLE `tb_gol_darah` (
  `gol_darah` varchar(11) NOT NULL,
  `kd_cabang_pmi` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_gol_darah`
--

INSERT INTO `tb_gol_darah` (`gol_darah`, `kd_cabang_pmi`, `stok`) VALUES
('A', 1, 5),
('AB', 1, 4),
('B', 1, 5),
('O', 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendonor`
--

CREATE TABLE `tb_pendonor` (
  `id_pendonor` int(11) NOT NULL,
  `nama_pendonor` varchar(100) NOT NULL,
  `golongan_darah` enum('A','B','O','AB') NOT NULL,
  `jenis_kelamin` enum('Male','Female') NOT NULL,
  `umur` int(11) NOT NULL,
  `berat_badan` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `anamnesa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pendonor`
--

INSERT INTO `tb_pendonor` (`id_pendonor`, `nama_pendonor`, `golongan_darah`, `jenis_kelamin`, `umur`, `berat_badan`, `alamat`, `anamnesa`) VALUES
(1, 'Bradley Ganap', 'O', 'Male', 20, '68', 'RR 2', 'Sehat'),
(2, 'Maria F', 'O', 'Male', 20, '50', 'xczczc', 'czczczczc'),
(3, 'Bennet', 'B', 'Male', 13, '39', 'adad', 'adad'),
(4, 'Brandon', 'O', 'Male', 22, '59', 'adad', 'adad'),
(5, 'Alif Zaki', 'A', 'Male', 22, '60', 'adadad', 'adada'),
(6, 'Galuh Trihanggara', 'O', 'Male', 22, '70', 'adada', 'adad'),
(7, 'Anjang Pangestu', 'A', 'Male', 21, '70', 'adad', 'adad');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekam_medis`
--

CREATE TABLE `tb_rekam_medis` (
  `nomor_rekam_medis` int(11) NOT NULL,
  `kd_cabang_pmi` int(11) NOT NULL,
  `kd_pendonor` int(11) NOT NULL,
  `kd_gol_darah` varchar(11) NOT NULL,
  `tgl_donor` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_rekam_medis`
--

INSERT INTO `tb_rekam_medis` (`nomor_rekam_medis`, `kd_cabang_pmi`, `kd_pendonor`, `kd_gol_darah`, `tgl_donor`) VALUES
(1, 1, 1, 'O', '2023-01-05'),
(2, 1, 3, 'B', '2023-01-05'),
(3, 1, 4, 'O', '2023-01-05'),
(4, 1, 5, 'A', '2023-01-06'),
(5, 1, 6, 'O', '2023-01-06'),
(6, 1, 7, 'A', '2023-01-06');

--
-- Triggers `tb_rekam_medis`
--
DELIMITER $$
CREATE TRIGGER `tambah_stok` AFTER INSERT ON `tb_rekam_medis` FOR EACH ROW BEGIN

UPDATE tb_gol_darah SET stok = stok + 1 WHERE gol_darah = NEW.kd_gol_darah;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rumah_sakit`
--

CREATE TABLE `tb_rumah_sakit` (
  `id_rs` int(11) NOT NULL,
  `nama_rs` varchar(100) NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_rumah_sakit`
--

INSERT INTO `tb_rumah_sakit` (`id_rs`, `nama_rs`, `no_telp`, `alamat`) VALUES
(1, 'RS Siloam M', '3144989', 'JL H.O.S COKROAMINOTO 31-33'),
(2, 'RS Kramat Pulo', '082114735105', 'Citra Garden City Jakarta Jl. Boulevard G1 no 1 Citra 5 Jakarta Barat 11830');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cabang_pmi`
--
ALTER TABLE `tb_cabang_pmi`
  ADD PRIMARY KEY (`cabang_pmi`);

--
-- Indexes for table `tb_distribusi_darah`
--
ALTER TABLE `tb_distribusi_darah`
  ADD PRIMARY KEY (`nomor_distribusi`),
  ADD KEY `kd_rs` (`kd_rs`),
  ADD KEY `kd_cabang_pmi` (`kd_cabang_pmi`),
  ADD KEY `kd_gol_darah` (`kd_gol_darah`);

--
-- Indexes for table `tb_gol_darah`
--
ALTER TABLE `tb_gol_darah`
  ADD PRIMARY KEY (`gol_darah`),
  ADD KEY `kd_cabang_pmi` (`kd_cabang_pmi`);

--
-- Indexes for table `tb_pendonor`
--
ALTER TABLE `tb_pendonor`
  ADD PRIMARY KEY (`id_pendonor`);

--
-- Indexes for table `tb_rekam_medis`
--
ALTER TABLE `tb_rekam_medis`
  ADD PRIMARY KEY (`nomor_rekam_medis`),
  ADD KEY `kd_pendonor` (`kd_pendonor`),
  ADD KEY `kd_cabang_pmi` (`kd_cabang_pmi`),
  ADD KEY `kd_gol_darah` (`kd_gol_darah`);

--
-- Indexes for table `tb_rumah_sakit`
--
ALTER TABLE `tb_rumah_sakit`
  ADD PRIMARY KEY (`id_rs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_distribusi_darah`
--
ALTER TABLE `tb_distribusi_darah`
  MODIFY `nomor_distribusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pendonor`
--
ALTER TABLE `tb_pendonor`
  MODIFY `id_pendonor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_rekam_medis`
--
ALTER TABLE `tb_rekam_medis`
  MODIFY `nomor_rekam_medis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_distribusi_darah`
--
ALTER TABLE `tb_distribusi_darah`
  ADD CONSTRAINT `fk_distribusi_darah_0` FOREIGN KEY (`kd_rs`) REFERENCES `tb_rumah_sakit` (`id_rs`),
  ADD CONSTRAINT `fk_distribusi_darah_1` FOREIGN KEY (`kd_cabang_pmi`) REFERENCES `tb_cabang_pmi` (`cabang_pmi`),
  ADD CONSTRAINT `fk_distribusi_darah_2` FOREIGN KEY (`kd_gol_darah`) REFERENCES `tb_gol_darah` (`gol_darah`);

--
-- Constraints for table `tb_gol_darah`
--
ALTER TABLE `tb_gol_darah`
  ADD CONSTRAINT `fk_gol_darah_0` FOREIGN KEY (`kd_cabang_pmi`) REFERENCES `tb_cabang_pmi` (`cabang_pmi`);

--
-- Constraints for table `tb_rekam_medis`
--
ALTER TABLE `tb_rekam_medis`
  ADD CONSTRAINT `fk_rekam_medis_0` FOREIGN KEY (`kd_cabang_pmi`) REFERENCES `tb_cabang_pmi` (`cabang_pmi`),
  ADD CONSTRAINT `fk_rekam_medis_1` FOREIGN KEY (`kd_pendonor`) REFERENCES `tb_pendonor` (`id_pendonor`),
  ADD CONSTRAINT `fk_rekam_medis_2` FOREIGN KEY (`kd_gol_darah`) REFERENCES `tb_gol_darah` (`gol_darah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
