-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Okt 2020 pada 05.00
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', 'admin', 'wahyu winaldi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'computer'),
(2, 'smartphone'),
(3, 'acsessoris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Kota medan', 20000),
(2, 'Tembung', 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(250) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `alamat`, `telepon_pelanggan`) VALUES
(1, 'wahyuwinaldi@gmail.com', 'wahyu123', 'wahyu winaldi', '', '082163393379'),
(2, 'secondegay14@gmail.com', 'wahyu1234', 'prakasa jaya', '', '082163393382'),
(3, 'alfaruq@gmail.com', '$2y$10$jc1Tcb1XQsTTMKHxOS.H1uoppo9h3e1877v6jJKZE5x', 'Muhammad Alfath', 'N4-Pancasila', '081234567898'),
(4, 'albattar@gmail.com', '$2y$10$MqGaq039uDI7yByGj2.ty.AkUfGXlswizlfGQU.KnV0', 'albattar', 'medan', '081234567898'),
(5, 'alfath@gmail.com', '$2y$10$YFUxlVaedUu5xlROok7oOe35N2ZpFIYxRVMPh5YGgCd', 'alfat', 'medan', '081234567898'),
(6, 'amal@gmail.com', '$2y$10$HufgYciB4F1p8sxl3nUHHOoXQh2iD5OfMzTSC2f32Yb', 'ikhlasul amal', 'kisaran', '081234567898'),
(7, 'buna@gmail.com', '$2y$10$IlQeaNEyHITE0FNAjsbIM.BnMMXwFaTU2Tueo6Hr9SH', 'buna', 'medan', '081234567898'),
(8, 'dani.w.aparat@gmail.com', '$2y$10$BITyA52FxfbxDS/bmxIJGOsPMDc9HWiaHsHYOM.EwSK', 'asc', 'medan', '081234567898'),
(9, 'kamu@gmail.com', '$2y$10$hvdtrUWEwYHTLfKWQzkq.uJ.hsZAx9ifZMrWmWtI7Az', 'kamu', 'medan', '081234567898'),
(10, 'wahyuwinaldi@gmail.com', '$2y$10$KQawGJBI3lht6icLEbbcku0/T3ohRWGmfa6S8Xf3dCI', 'anjay', 'anjay', '081234567898'),
(11, 'isan@gmail.com', '$2y$10$4ZRrvEQBZnJ.l08RmC6h..VuXVbCSAT3HembSXFT.2G', 'isan', 'medan', '081234567898'),
(12, 'asu@gmail.com', '', 'asu', 'medan', '081234567898'),
(13, 'asc@gmail.com', '', 'asc', 'medan', '081234567898'),
(14, 'redni@gmail.com', '$2y$10$IEN/CXHA7j2pjn7K3qVH4e.oXA/yMBFeKDIESy7E52R', 'redni', 'medan', '081234567898'),
(15, 'inung@gmail.com', '$2y$10$24vr5OFzdv87emHwwnlUlO79y4W9OE1k4c7wKoYyrAw', 'inung', 'medan', '081234567898'),
(16, 'asd@gmail.com', '$2y$10$HRCZluUpGnKPMOD3Qo2NiO1DqZ14HqjRYeaRiteRtLM', 'asd', 'medan', '081234567898'),
(17, 'ass@gmail.com', '$2y$10$GgUt3pqQlUM4mwSmGGOBCe.s4DDTjvnFd4qg6uGElOY', 'ass', 'medan', '081234567898'),
(18, 'ww@gmail.com', '$2y$10$omqZFBBkN4fMO7K38GnJJ.b14x26JLEgjXtJfDnVWSx', 'ww', 'medan', '081234567898'),
(19, 'sdsdf@gmail.com', '$2y$10$PYhalKo1JKNwbgE/JUI6tui4tPQQgxSwIp5FEVNqcPz', 'coba', 'dsfsdgs', '3535'),
(20, 'jibril@gmail.com', '$2y$10$5aU8puCa434MChD2cpNZiuZgnMH/5VgVw9MWShsnSzc', 'jibril', 'medan', '4556'),
(21, 'una@gmail.com', '$2y$10$oj90gXrqnVCmtVCRIINU0OUVfRevrfLkkNNCh7u2WSj', 'una', 'medan', '1233'),
(23, 't@gmail.com', '$2y$10$4Ft76dPChcu./oDaPZ1l5OH5tsICugNTpXSlNbQUHrTIx0nWYcyFq', 'yrdq', '', ''),
(24, 'w@gmail.com', '$2y$10$wVTSWMAcSgLLs7C4JeUM0eYhe94w7rhhDJ90TZSRFDu78yeFqxGzG', 'raj', 'medan', '125367'),
(25, 'wahyuw@gmail.com', '$2y$10$W5bmAs56hX5EPUFUrh1a1eqJNxUZu5zycmGCuiNsuHAtyvKc7Ml3G', 'Wahyu Winaldi', 'Jl. Pancasila Dusun IX No.169', '123456'),
(26, 'kaminyong@gmail.com', '$2y$10$PdW32xVgvyIuxm86rbsn2e3U2M3Zk.3xZjJYTz036AdBqK2u0sv1O', 'kaminyong', 'medan', '98676544'),
(27, 'idham@gmail.com', '$2y$10$alOpYN8PcCP/CX99mWqNr.Cy2hZTEYenYrJ6RaUH3uXriztDYMgZi', 'idham fahri ', 'tembung', '1234566'),
(28, 'ekorpanjang@gmail.com', '$2y$10$c3Gi2ELcuGayxBXZGkB3b.FvMRycF1Tp2jh.fsRQ/Ot6l8tqxEIjS', 'ekor panjang', 'medan', '13224284y'),
(29, 'khairulbahri@gmail.com', '$2y$10$Fqzcu8BZBcz7cxmplsjfIuzduBpTTrt26p0MqZZYsS8JQPTuq3Uvi', 'Khairul Bahri', 'tembung', '0987776776'),
(30, 'gio@gmail.com', '$2y$10$yRTiViDDtJq0Bx4r1w7BWOV52ehV3alA7VqsLy2bBDkQEBO9pw626', 'gio', 'bgfbff', '1223234234'),
(31, 'bro@gmail.com', '$2y$10$K0a2vtqDkfuthH9sxMd3fuGyND25ZUGtac4e3.MXu.izrTVfA6c8a', 'bro', 'cbfb', '09878787');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 25, 'zdasas', 'ddcsc', 1324, '2020-07-23', '5f195d293a592.jpg'),
(2, 25, 'Wahyu Winaldi', 'cscs', 34334, '2020-07-23', '5f195ea53a5dc.jpg'),
(3, 25, 'Wahyu Winaldi', 'cscs', 34334, '2020-07-23', '5f195f5b3a157.jpg'),
(4, 24, 'eefe', 'dvdvdvd', 133123123, '2020-07-23', '5f19609cbbcef.png'),
(5, 27, 'ekor panjang', 'BNI', 24020000, '2020-07-23', '5f1996fa1832c.png'),
(6, 28, 'Wahyu Winaldi', 'BNI', 60015000, '2020-07-25', '5f1bc0bb0bd9e.jpg'),
(7, 31, 'Khairul Bahri', 'BNI', 17015000, '2020-07-25', '5f1bfc2d75d2f.jpg'),
(8, 33, 'Gio', 'BNI', 12520000, '2020-07-27', '5f1ee045a52be.jpg'),
(9, 34, 'Wahyu Winaldi', 'ngtfnt', 84015000, '2020-07-28', '5f1fd3fdc82dc.jpg'),
(10, 35, 'bro', 'ncjsnkn', 30015000, '2020-07-28', '5f1fd584b39bc.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tarif` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `status_pembelian` varchar(250) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `nama_kota`, `alamat`, `tarif`, `tanggal_pembelian`, `total_pembelian`, `status_pembelian`, `resi_pengiriman`) VALUES
(16, 24, 1, 'Kota medan', 'zczcs', 20000, '2020-07-20', 12020000, 'pending', ''),
(17, 24, 1, 'Kota medan', 'zczcs', 20000, '2020-07-20', 12020000, 'pending', ''),
(18, 24, 1, 'Kota medan', 'zczcs', 20000, '2020-07-20', 12020000, 'pending', ''),
(19, 24, 1, 'Kota medan', 'zczcs', 20000, '2020-07-20', 12020000, 'pending', ''),
(20, 24, 1, 'Kota medan', 'sdaa', 20000, '2020-07-20', 12020000, 'pending', ''),
(21, 24, 1, 'Kota medan', 'cscs', 20000, '2020-07-20', 12020000, 'pending', ''),
(22, 24, 1, 'Kota medan', 'dscsc', 20000, '2020-07-20', 12020000, 'pending', ''),
(23, 25, 2, 'Tembung', 'Jl. Pancasila Dusun IX No.169 (20371)', 15000, '2020-07-20', 17015000, 'pending', ''),
(24, 26, 2, 'Tembung', 'medan', 15000, '2020-07-21', 2915000, 'sudah bayar', ''),
(25, 26, 1, 'Kota medan', 'medan', 20000, '2020-07-21', 5020000, 'sudah bayar', ''),
(26, 27, 2, 'Tembung', 'jl.pancasila no. 168', 15000, '2020-07-21', 17015000, '', ''),
(27, 28, 1, 'Kota medan', 'medan', 20000, '2020-07-23', 24020000, 'sudah bayar', ''),
(28, 25, 2, 'Tembung', 'tembung', 15000, '2020-07-25', 60015000, 'barang dikirim', '3r34r4r4'),
(29, 25, 2, 'Tembung', 'mh', 15000, '2020-07-25', 24015000, 'pending', ''),
(30, 25, 1, 'Kota medan', 'medan', 20000, '2020-07-25', 820000, 'pending', ''),
(31, 29, 2, 'Tembung', 'tembung', 15000, '2020-07-25', 17015000, 'barang dikirim', 'acd1232242'),
(32, 30, 1, 'Kota medan', 'fsfsfw', 20000, '2020-07-27', 5020000, 'pending', ''),
(33, 30, 1, 'Kota medan', 'ddd', 20000, '2020-07-27', 12520000, 'barang dikirim', 'AFSDGF676T6755'),
(34, 25, 2, 'Tembung', 'tembung', 15000, '2020-07-28', 84015000, 'sudah bayar', ''),
(35, 31, 2, 'Tembung', 'fhfhfhr', 15000, '2020-07-28', 30015000, 'sudah bayar', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `sub_berat` int(11) NOT NULL,
  `sub_harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `nama`, `harga`, `berat`, `sub_berat`, `sub_harga`, `jumlah`) VALUES
(1, 1, 1, '', 0, 0, 0, 0, 1),
(2, 2, 3, '', 0, 0, 0, 0, 1),
(3, 3, 4, '', 0, 0, 0, 0, 1),
(4, 4, 7, '', 0, 0, 0, 0, 1),
(5, 5, 6, '', 0, 0, 0, 0, 1),
(6, 6, 5, '', 0, 0, 0, 0, 1),
(7, 7, 7, '', 0, 0, 0, 0, 1),
(8, 8, 1, '', 0, 0, 0, 0, 1),
(9, 8, 3, '', 0, 0, 0, 0, 1),
(10, 9, 1, 'Mac Book ', 12000000, 1000, 0, 0, 1),
(11, 9, 3, 'Canon', 5000000, 1500, 0, 0, 1),
(12, 11, 1, 'Mac Book ', 16000000, 1000, 3000, 48000000, 3),
(13, 12, 6, 'Speaker', 300000, 100, 100, 300000, 1),
(14, 12, 7, 'Ssd super cepat', 400000, 100, 100, 400000, 1),
(15, 13, 3, 'Canon', 5000000, 1500, 1500, 5000000, 1),
(16, 14, 3, 'Canon', 5000000, 1500, 1500, 5000000, 1),
(17, 15, 5, 'Headphone', 500000, 3000, 3000, 500000, 1),
(18, 15, 1, 'Mac Book ', 12000000, 1000, 1000, 12000000, 1),
(19, 0, 1, 'Mac Book ', 12000000, 1000, 1000, 12000000, 1),
(20, 0, 3, 'Canon', 5000000, 1500, 1500, 5000000, 1),
(21, 22, 1, 'Mac Book ', 12000000, 1000, 1000, 12000000, 1),
(22, 23, 1, 'Mac Book ', 12000000, 1000, 1000, 12000000, 1),
(23, 23, 3, 'Canon', 5000000, 1500, 1500, 5000000, 1),
(24, 24, 2, 'jacket', 2500000, 500, 500, 2500000, 1),
(25, 24, 7, 'Ssd super cepat', 400000, 100, 100, 400000, 1),
(26, 25, 3, 'Canon', 5000000, 1500, 1500, 5000000, 1),
(27, 26, 1, 'Mac Book ', 12000000, 1000, 1000, 12000000, 1),
(28, 26, 3, 'Canon', 5000000, 1500, 1500, 5000000, 1),
(29, 27, 1, 'Mac Book ', 12000000, 1000, 2000, 24000000, 2),
(30, 28, 1, 'Mac Book ', 12000000, 1000, 5000, 60000000, 5),
(31, 29, 1, 'Mac Book ', 12000000, 1000, 2000, 24000000, 2),
(32, 30, 7, 'Ssd super cepat', 400000, 100, 200, 800000, 2),
(33, 31, 1, 'Mac Book ', 12000000, 1000, 1000, 12000000, 1),
(34, 31, 3, 'Canon', 5000000, 1500, 1500, 5000000, 1),
(35, 0, 7, 'Ssd super cepat', 400000, 100, 600, 2400000, 6),
(36, 0, 6, 'Speaker', 300000, 100, 800, 2400000, 8),
(37, 0, 2, 'jacket', 2500000, 500, 500, 2500000, 1),
(38, 0, 2, 'jacket', 2500000, 500, 500, 2500000, 1),
(39, 0, 2, 'jacket', 2500000, 500, 500, 2500000, 1),
(40, 0, 3, 'Canon', 5000000, 1500, 1500, 5000000, 1),
(41, 33, 2, 'jacket', 2500000, 500, 2500, 12500000, 5),
(42, 34, 1, 'Mac Book ', 12000000, 1000, 7000, 84000000, 7),
(43, 35, 3, 'Canon', 5000000, 1500, 9000, 30000000, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `harga_produk` int(50) NOT NULL,
  `berat_produk` int(100) NOT NULL,
  `foto_produk` varchar(200) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(1, 1, 'Mac Book ', 12000000, 1000, '5ef611b49ab9f.jpg', 'ini macbook mantul', 11),
(2, 3, 'jacket', 2500000, 500, '5ef6158599860.jpg', 'ini Jacket mantul sekali', 10),
(3, 2, 'Canon', 5000000, 1500, '5ef615eb73412.jpg', 'Ini kamera mantul', 10),
(4, 2, 'Sd Card', 200000, 100, '5ef616739d228.jpg', 'Ini sd card mantul', 10),
(5, 2, 'Headphone', 500000, 3000, '5ef616ffd6243.jpg', 'Ini Headphone mantul', 8),
(6, 3, 'Speaker', 300000, 100, '5ef6f41779ddd.jpg', 'Speaker mantul', 10),
(7, 3, 'Ssd super cepat', 400000, 100, '5ef6f44d86ee9.jpg', 'bikin laptop kamu secepat kilat', 10),
(8, 3, 'Kabel usb ', 200000, 50, '5ef6f4bbb5223.jpg', 'kabel usb mantul', 0),
(9, 3, 'casing hp mantul', 150000, 100, '5f29829a4704a.jpg', 'Casing HP keren', 12),
(10, 3, 'Printer Epson', 500000, 1000, '5f2987b43c5d9.jpg', 'Printer Epson Bagus', 10),
(11, 1, 'Laptop Asus', 3000000, 1000, '5f2987e7c2a3e.jpg', 'Laptop Asus Mantul', 10),
(12, 3, 'Mouse', 100000, 50, '5f298865033b1.jpg', 'Mouse Mantul Banget', 10);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
