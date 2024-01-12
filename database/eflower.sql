-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 12:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eflower`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `ID_barang` int(50) NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `deskripsi` varchar(500) DEFAULT NULL,
  `gambar` varchar(500) DEFAULT NULL,
  `kategori` enum('Bunga','Daun') DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `id_toko` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID_barang`, `nama_barang`, `harga`, `deskripsi`, `gambar`, `kategori`, `stok`, `id_toko`) VALUES
(1, 'Produk A', 50.00, NULL, NULL, NULL, 151, 1),
(2, 'Produk B', 30.00, NULL, NULL, NULL, 151, 1),
(3, 'Produk C', 40.00, NULL, NULL, NULL, 121, 1),
(4, 'Produk D', 25.00, NULL, NULL, NULL, 201, 1);

-- --------------------------------------------------------

--
-- Table structure for table `barangkeluar`
--

CREATE TABLE `barangkeluar` (
  `ID_barang` int(50) NOT NULL,
  `nama barang` varchar(150) NOT NULL,
  `keluar` int(11) NOT NULL,
  `tanggal_keluar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `barangkeluar`
--
DELIMITER $$
CREATE TRIGGER `after_insert_on_barangkeluar` AFTER INSERT ON `barangkeluar` FOR EACH ROW BEGIN
   UPDATE barang 
   SET stok = stok - NEW.keluar
   WHERE id_barang = NEW.ID_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `ID_barang` int(50) NOT NULL,
  `nama barang` varchar(150) NOT NULL,
  `masuk` int(11) NOT NULL,
  `tanggal_masuk` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangmasuk`
--

INSERT INTO `barangmasuk` (`ID_barang`, `nama barang`, `masuk`, `tanggal_masuk`) VALUES
(1, '', 50, '2024-01-07 23:40:09');

--
-- Triggers `barangmasuk`
--
DELIMITER $$
CREATE TRIGGER `after_insert_on_barangmasuk` AFTER INSERT ON `barangmasuk` FOR EACH ROW BEGIN
   UPDATE barang 
   SET stok = stok + NEW.masuk
   WHERE id_barang = NEW.ID_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_total_stok_trigger` AFTER UPDATE ON `barangmasuk` FOR EACH ROW BEGIN
UPDATE barang set stok = stok + NEW.masuk
where ID_barang = new.ID_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `email`, `id_barang`, `qty`, `subtotal`) VALUES
(4, NULL, 1, 5, 250.00);

--
-- Triggers `cart`
--
DELIMITER $$
CREATE TRIGGER `before_insert_before_update_on_cart` BEFORE INSERT ON `cart` FOR EACH ROW BEGIN
    SET NEW.subtotal = (SELECT harga FROM barang WHERE id_barang = NEW.id_barang) * NEW.qty;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `ID_Toko` int(50) NOT NULL,
  `Nama_Toko` varchar(100) NOT NULL,
  `Deskripsi` varchar(500) NOT NULL,
  `Gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`ID_Toko`, `Nama_Toko`, `Deskripsi`, `Gambar`) VALUES
(1, 'Eflower', 'ini test', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(8) NOT NULL,
  `no_telp` int(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Nama`, `email`, `password`, `no_telp`) VALUES
('Fajar Adha Fadillah', 'fajaradhafadillah@gmail.com', '123', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_barang`),
  ADD KEY `fk_barang_toko` (`id_toko`),
  ADD KEY `idx_harga` (`harga`);

--
-- Indexes for table `barangkeluar`
--
ALTER TABLE `barangkeluar`
  ADD PRIMARY KEY (`ID_barang`);

--
-- Indexes for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD PRIMARY KEY (`ID_barang`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `fk_cart_barang1` (`id_barang`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`ID_Toko`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `ID_barang` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `barangkeluar`
--
ALTER TABLE `barangkeluar`
  MODIFY `ID_barang` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `ID_Toko` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_barang_toko` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`ID_Toko`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`ID_barang`) REFERENCES `barang` (`ID_barang`),
  ADD CONSTRAINT `fk_cart_barang1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`ID_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
