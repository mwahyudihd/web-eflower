-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 27 Jan 2024 pada 10.53
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_eflower`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `idcart` int(255) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `id_user` char(8) NOT NULL,
  `tglorder` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'Cart'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`idcart`, `orderid`, `id_user`, `tglorder`, `status`) VALUES
(83, '855b1548', '09876543', '2024-01-22 14:59:25', 'selesai'),
(84, 'c65f9440', '09876543', '2024-01-22 14:59:30', 'selesai'),
(85, '80214ef9', '09876543', '2024-01-22 14:59:35', 'dikirim'),
(87, '7dc70cff', '09876543', '2024-01-22 15:00:01', 'menunggu konfirmasi'),
(89, 'e68b9cbf', '964F05A1', '2024-01-23 08:07:36', 'menunggu pembayaran'),
(90, 'd9716e9e', '7E92C3D5', '2024-01-23 12:41:52', 'menunggu pembayaran'),
(91, '66938625', '7E92C3D5', '2024-01-23 12:49:28', 'menunggu pembayaran'),
(92, 'ad00116f', '7E92C3D5', '2024-01-23 14:05:35', 'menunggu pembayaran'),
(93, 'e2626d43', '7E92C3D5', '2024-01-23 15:02:21', 'dibatalkan penjual'),
(94, '9019fce5', '7E92C3D5', '2024-01-24 01:06:56', 'dibatalkan penjual'),
(96, '889dc0bb', '964F05A1', '2024-01-25 16:02:49', 'dibatalkan penjual'),
(97, 'c2e7ed93', '7E92C3D5', '2024-01-27 06:28:03', 'Cart'),
(98, '64c9ff79', '7E92C3D5', '2024-01-27 06:28:30', 'Cart'),
(99, '8a17d233', '7E92C3D5', '2024-01-27 06:28:46', 'Cart'),
(103, '73c08e66', '09876543', '2024-01-27 09:50:36', 'Cart');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailorder`
--

CREATE TABLE `detailorder` (
  `detailid` char(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `id_produk` char(8) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detailorder`
--

INSERT INTO `detailorder` (`detailid`, `orderid`, `id_produk`, `qty`) VALUES
('027E6EE5D5', 'd9716e9e', '5B12F026', 4),
('0FA28B9096', 'c2e7ed93', '38265EC6', 50),
('0FC45224F3', 'ad00116f', 'F9DC0F42', 3),
('1354C1EA71', 'e2626d43', '5B12F026', 3),
('169134617E', '7dc70cff', 'F9DC0F42', 5),
('16AE140DEA', '8a17d233', '5B12F026', 37),
('26810F9ACA', '73c08e66', '4282943B', 1),
('4D1B5F30D1', '80214ef9', '137D4863', 3),
('68908F486A', 'c65f9440', '4282943B', 1),
('7F36F0B9C0', '889dc0bb', '1A19C3CC', 1),
('9BF8DBD69F', '855b1548', '137D4863', 4),
('A788801BDD', '9019fce5', '67709522', 1),
('C11AE34649', 'e68b9cbf', '1A19C3CC', 5),
('EABFF63DEA', '66938625', 'F9DC0F42', 3);

--
-- Trigger `detailorder`
--
DELIMITER $$
CREATE TRIGGER `delete_cart_if_orderid_deleted` AFTER DELETE ON `detailorder` FOR EACH ROW BEGIN
   DELETE FROM cart
   WHERE orderid = OLD.orderid;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_row_if_qty_zero` AFTER UPDATE ON `detailorder` FOR EACH ROW BEGIN
   IF NEW.qty = 0 THEN
      DELETE FROM detailorder
      WHERE id_produk = NEW.id_produk;
   END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_qty` AFTER INSERT ON `detailorder` FOR EACH ROW BEGIN
   UPDATE produk
   SET qty = qty - NEW.qty
   WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_qty_after_update` AFTER UPDATE ON `detailorder` FOR EACH ROW BEGIN
   IF NEW.qty < OLD.qty THEN
      UPDATE produk
      SET qty = qty + (OLD.qty - NEW.qty)
      WHERE id_produk = NEW.id_produk;
   ELSEIF NEW.qty > OLD.qty THEN
      UPDATE produk
      SET qty = qty - (NEW.qty - OLD.qty)
      WHERE id_produk = NEW.id_produk;
   END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `idkonfirmasi` char(8) NOT NULL,
  `orderid` char(8) NOT NULL,
  `id_user` char(8) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `namarekening` varchar(25) NOT NULL,
  `tglbayar` date NOT NULL,
  `tglsubmit` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_produk` char(8) DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `catatan` varchar(500) DEFAULT NULL,
  `id_pemilik_produk` char(8) DEFAULT NULL,
  `total_bayar` decimal(10,0) DEFAULT NULL,
  `total_tagihan` decimal(10,0) DEFAULT NULL,
  `no_rek_pembayar` char(50) DEFAULT NULL,
  `catatan_penjual` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`idkonfirmasi`, `orderid`, `id_user`, `payment`, `namarekening`, `tglbayar`, `tglsubmit`, `id_produk`, `bukti`, `catatan`, `id_pemilik_produk`, `total_bayar`, `total_tagihan`, `no_rek_pembayar`, `catatan_penjual`) VALUES
('3D8BBC7F', 'c65f9440', '09876543', 'internet-banking', 'a/n Jhon Doe', '2024-01-24', '2024-01-24 08:23:03', '4282943B', 'assets/img/payment/a50e5e839949d2f19271d83c12bd0abc.jpg', '-', '7E92C3D5', 1200000, 400000, '', ''),
('8BF2F734', '80214ef9', '09876543', 'internet-banking', 'a/n Leman', '2024-01-24', '2024-01-24 09:07:12', '137D4863', 'assets/img/payment/68eddcea02ceb29abde1b1c752fa29eb.jpg', 'Tolong Kirim Secepatnya', '7E92C3D5', 2410000, 2410000, '12345675HA(BRI)', ''),
('8C478C6F', '9019fce5', '7E92C3D5', 'bank', 'a/n Dodi', '2024-01-25', '2024-01-25 10:33:12', '67709522', 'assets/img/payment/a50e5e839949d2f19271d83c12bd0abc.jpg', 'Tolong kirim secepatnya', '964F05A1', 70000, 70000, '21415412351135(BCA)', 'Pesanan Anda dibatalkan karena bukti tidak sesuai'),
('8ED10F87', 'e2626d43', '7E92C3D5', 'internet-banking', 'a/n Dadan', '2024-01-23', '2024-01-23 09:52:00', '5B12F026', 'assets/img/payment/images.jpeg', 'zqazgqayz', '964F05A1', 565454, 119000, NULL, 'Transaksi tidak sah'),
('C33A5299', '889dc0bb', '964F05A1', 'e-wallet', 'a/n Rohmat', '2024-01-25', '2024-01-25 10:18:00', '1A19C3CC', 'assets/img/payment/68eddcea02ceb29abde1b1c752fa29eb.jpg', '-', '7E92C3D5', 2000, 37200, '123ABCD(DANA)', 'Bayaran tidak sesuai'),
('F3C53CDF', '855b1548', '09876543', 'internet-banking', 'a/n Jafar', '2024-01-24', '2024-01-23 19:14:05', '137D4863', 'assets/img/payment/images.jpeg', '-', '7E92C3D5', 3225000, 3225000, NULL, '');

--
-- Trigger `konfirmasi`
--
DELIMITER $$
CREATE TRIGGER `insert_konfirmasi` AFTER INSERT ON `konfirmasi` FOR EACH ROW BEGIN
    UPDATE `cart`
    SET `status` = 'menunggu konfirmasi'
    WHERE orderid = NEW.orderid;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kwitansi`
--

CREATE TABLE `kwitansi` (
  `id_kwitansi` int(255) NOT NULL,
  `id_order` char(8) NOT NULL,
  `produkid` char(8) NOT NULL,
  `tgl_terbit` date NOT NULL DEFAULT current_timestamp(),
  `status_order` varchar(50) DEFAULT NULL,
  `id_pemilik_kwitansi` char(8) DEFAULT NULL,
  `id_toko` char(8) DEFAULT NULL,
  `qty_pembelian` int(255) DEFAULT NULL,
  `nama_penerima` varchar(255) DEFAULT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `ongkir` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `alamat_pembeli` varchar(500) NOT NULL,
  `alamat_toko` varchar(500) NOT NULL,
  `total_bersih` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kwitansi`
--

INSERT INTO `kwitansi` (`id_kwitansi`, `id_order`, `produkid`, `tgl_terbit`, `status_order`, `id_pemilik_kwitansi`, `id_toko`, `qty_pembelian`, `nama_penerima`, `nama_toko`, `nama_barang`, `ongkir`, `total`, `alamat_pembeli`, `alamat_toko`, `total_bersih`) VALUES
(2, 'e2626d43', '5B12F026', '2024-01-25', 'DIBATALKAN', '7E92C3D5', '964F05A1', 3, 'Mr Adam', 'KOJOYAJA', 'Lidah Mertua', 50000, 69000, 'Cimahi Jalan Abcd No 123', 'Sarijadi Bandung', 119000),
(3, '9019fce5', '67709522', '2024-01-25', 'DIBATALKAN', '7E92C3D5', '964F05A1', 1, 'Mr Adam', 'KOJOYAJA', 'Bunga Mawar Berduri', 20000, 50000, 'Cimahi Jalan Abcd No 123', 'Sarijadi Bandung', 70000),
(4, '889dc0bb', '1A19C3CC', '2024-01-27', 'DIBATALKAN', '964F05A1', '7E92C3D5', 1, 'Fajar Adha Fadillah', 'adam Store', 'Eceng Gondok', 30000, 7200, 'Sarijadi Bandung', 'Cimahi Jalan Abcd No 123', 37200),
(5, '80214ef9', '137D4863', '2024-01-27', 'LUNAS', '09876543', '7E92C3D5', 3, 'rifki sulaeman', 'adam Store', 'Paket 9 aglonema super cantik', 10000, 2400000, 'Majalaya', 'Cimahi Jalan Abcd No 123', 2410000),
(6, '855b1548', '137D4863', '2024-01-27', 'LUNAS', '09876543', '7E92C3D5', 4, 'rifki sulaeman', 'adam Store', 'Paket 9 aglonema super cantik', 250, 3200000, 'Majalaya', 'Cimahi Jalan Abcd No 123', 3200250),
(7, 'c65f9440', '4282943B', '2024-01-27', 'LUNAS', '09876543', '7E92C3D5', 1, 'rifki sulaeman', 'adam Store', 'Tanaman Hias Daun Gelombang Cinta', 5000, 350000, 'Majalaya', 'Cimahi Jalan Abcd No 123', 355000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `no_pembayaran` char(8) NOT NULL,
  `id_user_toko` char(8) NOT NULL,
  `id_user` char(8) NOT NULL,
  `norek` varchar(25) NOT NULL,
  `total_tagihan` decimal(10,0) DEFAULT NULL,
  `an` varchar(20) NOT NULL,
  `time_info` timestamp NOT NULL DEFAULT curdate(),
  `time_exp` char(50) DEFAULT NULL,
  `ongkir` decimal(10,0) DEFAULT NULL,
  `nama_pembeli` varchar(255) DEFAULT NULL,
  `nmr_telp_pembeli` char(14) DEFAULT NULL,
  `alamat_pembeli` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`no_pembayaran`, `id_user_toko`, `id_user`, `norek`, `total_tagihan`, `an`, `time_info`, `time_exp`, `ongkir`, `nama_pembeli`, `nmr_telp_pembeli`, `alamat_pembeli`) VALUES
('80214ef9', '7E92C3D5', '09876543', '21415412351135', 2400000, 'adam Store', '2024-01-24 14:56:33', '2024-01-25 14:56:33', 10000, 'rifki sulaeman', '081387678', 'Majalaya'),
('855b1548', '7E92C3D5', '09876543', '21415412351135', 3200000, 'adam Store', '2024-01-24 01:09:11', '2024-01-25 01:09:11', 250, 'rifki sulaeman', '081387678', 'Majalaya'),
('889dc0bb', '7E92C3D5', '964F05A1', '21415412351135', 7200, 'adam Store', '2024-01-25 16:02:54', '2024-01-26 16:02:54', 30000, 'Fajar Adha Fadillah', '123', 'Sarijadi Bandung'),
('9019fce5', '964F05A1', '7E92C3D5', '123ABCD(DANA)', 50000, 'KOJOYAJA', '2024-01-25 02:15:42', '2024-01-26 02:15:42', 20000, 'Mr Adam', '080000032', 'Cimahi Jalan Abcd No 123'),
('c65f9440', '7E92C3D5', '09876543', '21415412351135', 350000, 'adam Store', '2024-01-24 01:21:24', '2024-01-25 01:21:24', 5000, 'rifki sulaeman', '081387678', 'Majalaya'),
('e2626d43', '964F05A1', '7E92C3D5', '123ABCD(DANA)', 69000, 'KOJOYAJA', '2024-01-23 15:02:26', '2024-01-24 15:02:26', 50000, 'Mr Adam', '080000032', 'Cimahi Jalan Abcd No 123');

--
-- Trigger `pembayaran`
--
DELIMITER $$
CREATE TRIGGER `update_cart_status` AFTER INSERT ON `pembayaran` FOR EACH ROW BEGIN
   UPDATE cart
   SET status = 'menunggu pembayaran'
   WHERE orderid = NEW.no_pembayaran;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` char(8) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `id_pemilik` char(8) DEFAULT NULL,
  `kategori` char(50) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `rate` int(5) NOT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT current_timestamp(),
  `qty` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT NULL,
  `di_edit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_pemilik`, `kategori`, `deskripsi`, `harga`, `gambar`, `rate`, `tgl_buat`, `qty`, `slug`, `status`, `di_edit`) VALUES
('137D4863', 'Paket 9 aglonema super cantik', '7E92C3D5', 'daun', 'Selalu ready stok. \r\nSilahkan diorder. \r\n                                        ', 800000, 'assets/img/product/0d5e6afb16616530aa7795aada38d52a.jpeg', 0, '2024-01-19 12:02:31', 987, 'paket-9-aglonema-super-cantik', 'aktif', '2024-01-19 12:02:31'),
('1A19C3CC', 'Eceng Gondok', '7E92C3D5', 'Merambat', 'Eceng gondok hidup mengapung di air dan kadang-kadang berakar dalam tanah. Tingginya sekitar 0,4–0,8 meter.\r\n                                        ', 7200, 'assets/img/product/202109201323240000002358857039.jpg', 0, '2024-01-19 07:34:27', 81, 'eceng-gondok', 'aktif', '2024-01-19 07:34:27'),
('38265EC6', 'Janda Bolong', '964F05A1', 'daun', 'Bunga janda bolong memiliki ciri daun yang berlubang dengan warna hijau tua yang mendominasi hampir di seluruh bagian daunnya. \r\n                                        ', 500000, 'assets/img/product/5fdb7653e130d.jpg', 0, '2024-01-17 05:17:42', 1, 'janda-bolong', 'aktif', '2024-01-17 05:17:42'),
('3DE9D9C4', 'pepaya', '7E92C3D5', 'other', '                                                                                                                                                                                enak segar dan nikmat\r\n                                                                                                                                                                                                        ', 11111, 'assets/img/product/mawar-002.jpg', 0, '2024-01-16 07:56:39', 100, 'pepaya', 'aktif', '2024-01-16 10:08:35'),
('4282943B', 'Tanaman Hias Daun Gelombang Cinta', '7E92C3D5', 'daun', '                                            ready stok\r\n\r\nNama tanaman hias: gelombang cinta\r\nAsal bibit : Biji\r\nTinggi Bibit : 30 - 50 cm\r\nIklim / Dataran Tumbuh : dataran rendah - dataran tinggi\r\nTempat Penanaman : Indoor (Dibawah Naungan / Teduh, Plastik UV, Paranet)\r\nUkuran pot minimal : > 40 cm\r\nMedia tanam : tanah : humus : Sekam : Pakis Cacah\r\nPenyiraman : 1 - 2 kli sehari\r\nPemupukan : 1 - 3 bulan sekali\r\nPerawatan : Sedang\r\n\r\n💐 Selalu Memberikan Tanaman Terbaik untuk Anda 💐\r\n     \"Siap Melayani pengiriman ke seluruh Indonesia\"\r\n\r\n\"Packing Aman Bergaransi\"\r\n\r\n💞 Selamat berbelanja. 💞\r\n                                                                                ', 350000, 'assets/img/product/1d1c408ebb7b6cf01090fded9cbf23ce.jpeg', 0, '2024-01-19 12:04:39', 49, 'tanaman-hias-daun-gelombang-cinta', 'aktif', '2024-01-27 05:50:45'),
('5B12F026', 'Lidah Mertua', '964F05A1', 'daun', '                                            Selain mempercantik ruangan, tanaman lidah mertua memiliki manfaat lain bagi penghuni rumah. Tanaman ini mampu meringankan Sick Building Syndrome (SBS) dengan memperbaiki sistem pemanasan, ventilasi, dan pendingin ruang yang buruk.\r\n                                                                                ', 23000, 'assets/img/product/16102021061506-Grujugan-Kebumen-gutama.jpg', 0, '2024-01-17 05:22:30', 0, 'lidah-mertua', 'aktif', '2024-01-17 05:35:00'),
('67709522', 'Bunga Mawar Berduri', '964F05A1', 'bunga', 'Mawar atau ros adalah tumbuhan perdu, pohonnya berduri, bunganya berbau wangi dan berwarna indah, terdiri atas daun bunga yang bersusun\r\n                                        ', 50000, 'assets/img/product/mawar-002.jpg', 0, '2024-01-17 04:55:27', 195, 'bunga-mawar-berduri', 'aktif', '2024-01-17 04:55:27'),
('D343230F', 'pepaya', '7E92C3D5', 'buah manis', '                                            Enak lho mantep lho\r\n                                                                                ', 10000, 'assets/img/product/pepaya-001.jpg', 0, '2024-01-16 08:03:49', 100, 'pepaya', 'aktif', '2024-01-16 10:08:35'),
('E6BD62D5', 'Bunga Mawar', '7E92C3D5', 'bunga', 'Bunga indah dan cocok untuk menghiasi taman anda dapatkan sekarang juga di toko kami\r\n                                                                                                                        ', 231, 'assets/img/product/mawar-001.jpeg', 0, '2024-01-15 23:05:37', 4, 'bunga-mawar', 'aktif', '2024-01-20 09:51:11'),
('ED3F3D7D', 'pepaya', '7E92C3D5', 'buah-buahan', 'MATAP DAN MANIS RASANYA\r\n                                        ', 120000, 'assets/img/product/pepaya-001.jpg', 0, '2024-01-16 08:10:39', 150, 'pepaya', 'aktif', '2024-01-16 10:08:35'),
('F9DC0F42', 'tanaman hias Epiphyllum guatemalense | wijaya keriting', '964F05A1', 'Gantung', 'ready stok silahkan diorder\r\n                                        ', 35000, 'assets/img/product/66daeb3653f000ca9855b32d04b7f2f0.jpeg', 0, '2024-01-19 12:12:07', 487, 'tanaman-hias-epiphyllum-guatemalense-wijaya-keriting', 'aktif', '2024-01-19 12:12:07');

--
-- Trigger `produk`
--
DELIMITER $$
CREATE TRIGGER `check_stock_before_update` BEFORE UPDATE ON `produk` FOR EACH ROW BEGIN
    IF NEW.qty < 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Stok tidak bisa kurang dari 0';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` char(8) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT NULL,
  `user_mail` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `no_telp` char(13) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `alamat` longtext DEFAULT NULL,
  `no_rek` char(20) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `status_user` enum('aktif','nonaktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `password`, `role`, `user_mail`, `foto`, `no_telp`, `nama_lengkap`, `alamat`, `no_rek`, `kota`, `status_user`) VALUES
('09876543', '', '04a4d542d62d3474008958ce456993f5', 'user', 'rifki123@gmail.com', 'assets/img/profile/rif-min (1)-min.png', '081387678', 'rifki sulaeman', 'Majalaya', '12345675HA(BRI)', NULL, 'aktif'),
('0E1E7671', NULL, 'e807f1fcf82d132f9bb018ca6738a19f', 'user', 'JhonDoe@mail.com', NULL, '081234567890', 'Jhon Doe', 'Banten, Jl.Merak No.1', '123456789012(DANA)', NULL, 'aktif'),
('111101HD', 'wahyudi_admin', '25e4ee4e9229397b6b17776bfceaf8e7', 'admin', 'wawprjct@gmail.com', 'assets/img/profile/myphoto.jpg', '895616088828', 'M Wahyudi Hidayatullah', 'Bandung', '6789054321', NULL, 'aktif'),
('123456FA', 'fajar_admin', '25e4ee4e9229397b6b17776bfceaf8e7', 'admin', 'fajar@gmail.com', '', '895351276161', 'Fajar Adha Fadhillah', 'Bandung', NULL, NULL, 'aktif'),
('7E92C3D5', 'adam Store', 'e051858adafe388133a80b63009722e4', 'user', 'Adam@gmail.com', 'assets/img/profile/icon-256x256.png', '080000032', 'Mr Adam', 'Cimahi Jalan Abcd No 123', '21415412351135', 'Cimahi', 'aktif'),
('964F05A1', 'KOJOYAJA', 'dce2a7ed69a44d91ca285ac7e61da41a', 'user', 'fajar2024@gmail.com', 'assets/img/profile/picprofilepintrest-b2134414d7608e67c18a883b34344c38.jpg', '123', 'Fajar Adha Fadillah', 'Sarijadi Bandung', '123ABCD(DANA)', 'Bandung', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idcart`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  ADD PRIMARY KEY (`detailid`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`idkonfirmasi`);

--
-- Indeks untuk tabel `kwitansi`
--
ALTER TABLE `kwitansi`
  ADD PRIMARY KEY (`id_kwitansi`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`no_pembayaran`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_user` (`id_pemilik`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_mail` (`user_mail`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `idcart` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT untuk tabel `kwitansi`
--
ALTER TABLE `kwitansi`
  MODIFY `id_kwitansi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  ADD CONSTRAINT `detailorder_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
