-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 11, 2021 at 05:47 PM
-- Server version: 8.0.23
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pln`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblogin`
--

CREATE TABLE `tblogin` (
  `KodeLogin` int NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `NamaLengkap` varchar(80) NOT NULL,
  `Level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblogin`
--

INSERT INTO `tblogin` (`KodeLogin`, `Username`, `Password`, `NamaLengkap`, `Level`) VALUES
(9, 'admin', 'admin', 'Ahmad Badawi', 'Admin'),
(21, '10692', '10692', 'andika', 'Pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `tbpelanggan`
--

CREATE TABLE `tbpelanggan` (
  `KodePelanggan` int NOT NULL,
  `NoPelanggan` varchar(10) NOT NULL,
  `NoMeter` varchar(18) NOT NULL,
  `KodeTarif` int NOT NULL,
  `NamaLengkap` varchar(80) NOT NULL,
  `Telp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpelanggan`
--

INSERT INTO `tbpelanggan` (`KodePelanggan`, `NoPelanggan`, `NoMeter`, `KodeTarif`, `NamaLengkap`, `Telp`, `Alamat`) VALUES
(12, '10692', '122441', 9, 'andika', '081318469734', 'KP. Margabhakti  RT 004/002, no.10  (warung pak ujang)');

-- --------------------------------------------------------

--
-- Table structure for table `tbpembayaran`
--

CREATE TABLE `tbpembayaran` (
  `KodePembayaran` int NOT NULL,
  `KodeTagihan` int NOT NULL,
  `TglBayar` date NOT NULL,
  `JumlahTagihan` double(10,0) NOT NULL,
  `BuktiPembayaran` varchar(100) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpembayaran`
--

INSERT INTO `tbpembayaran` (`KodePembayaran`, `KodeTagihan`, `TglBayar`, `JumlahTagihan`, `BuktiPembayaran`, `Status`) VALUES
(9, 41, '2021-06-11', 36200, 'Case DRD - 7 Juni 21 - 2 sd 4 (edited).docx', 'Belum'),
(10, 41, '2021-06-11', 36200, 'Case DRD - 7 Juni 21 - 6 (edited).docx', 'Belum'),
(11, 41, '2021-06-11', 36200, 'sheet protected 2.xlsx', 'Sudah'),
(12, 41, '2021-06-11', 36200, 'sheet protected.xlsx', 'Sudah');

-- --------------------------------------------------------

--
-- Table structure for table `tbtagihan`
--

CREATE TABLE `tbtagihan` (
  `KodeTagihan` int NOT NULL,
  `NoTagihan` varchar(10) NOT NULL,
  `NoPelanggan` varchar(10) NOT NULL,
  `TahunTagih` int NOT NULL,
  `BulanTagih` varchar(10) NOT NULL,
  `JumlahPemakaian` int NOT NULL,
  `TotalBayar` double(10,0) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbtagihan`
--

INSERT INTO `tbtagihan` (`KodeTagihan`, `NoTagihan`, `NoPelanggan`, `TahunTagih`, `BulanTagih`, `JumlahPemakaian`, `TotalBayar`, `Status`) VALUES
(41, '2HTWSG', '10692', 2021, 'Januari', 20, 36200, 'Sudah');

-- --------------------------------------------------------

--
-- Table structure for table `tbtarif`
--

CREATE TABLE `tbtarif` (
  `KodeTarif` int NOT NULL,
  `Daya` int NOT NULL,
  `TarifPerKwh` int NOT NULL,
  `Beban` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbtarif`
--

INSERT INTO `tbtarif` (`KodeTarif`, `Daya`, `TarifPerKwh`, `Beban`) VALUES
(9, 300, 1800, 200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblogin`
--
ALTER TABLE `tblogin`
  ADD PRIMARY KEY (`KodeLogin`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `tbpelanggan`
--
ALTER TABLE `tbpelanggan`
  ADD PRIMARY KEY (`KodePelanggan`),
  ADD UNIQUE KEY `NoPelanggan` (`NoPelanggan`),
  ADD KEY `KodeTarif` (`KodeTarif`);

--
-- Indexes for table `tbpembayaran`
--
ALTER TABLE `tbpembayaran`
  ADD PRIMARY KEY (`KodePembayaran`),
  ADD KEY `KodeTagihan` (`KodeTagihan`);

--
-- Indexes for table `tbtagihan`
--
ALTER TABLE `tbtagihan`
  ADD PRIMARY KEY (`KodeTagihan`),
  ADD KEY `tbtagihan_ibfk_1` (`NoPelanggan`);

--
-- Indexes for table `tbtarif`
--
ALTER TABLE `tbtarif`
  ADD PRIMARY KEY (`KodeTarif`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblogin`
--
ALTER TABLE `tblogin`
  MODIFY `KodeLogin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbpelanggan`
--
ALTER TABLE `tbpelanggan`
  MODIFY `KodePelanggan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbpembayaran`
--
ALTER TABLE `tbpembayaran`
  MODIFY `KodePembayaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbtagihan`
--
ALTER TABLE `tbtagihan`
  MODIFY `KodeTagihan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbtarif`
--
ALTER TABLE `tbtarif`
  MODIFY `KodeTarif` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbpelanggan`
--
ALTER TABLE `tbpelanggan`
  ADD CONSTRAINT `tbpelanggan_ibfk_1` FOREIGN KEY (`KodeTarif`) REFERENCES `tbtarif` (`KodeTarif`);

--
-- Constraints for table `tbpembayaran`
--
ALTER TABLE `tbpembayaran`
  ADD CONSTRAINT `tbpembayaran_ibfk_1` FOREIGN KEY (`KodeTagihan`) REFERENCES `tbtagihan` (`KodeTagihan`);

--
-- Constraints for table `tbtagihan`
--
ALTER TABLE `tbtagihan`
  ADD CONSTRAINT `tbtagihan_ibfk_1` FOREIGN KEY (`NoPelanggan`) REFERENCES `tbpelanggan` (`NoPelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
