-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2022 at 04:28 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `genara_fashion`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'Jaket Levis'),
(2, 'Celana'),
(4, 'Hoodie');

-- --------------------------------------------------------

--
-- Table structure for table `no_pj_auto`
--

CREATE TABLE `no_pj_auto` (
  `id` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `kode_transaksi` varchar(10) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `no_pj_auto`
--

INSERT INTO `no_pj_auto` (`id`, `id_penjualan`, `kode_transaksi`, `tanggal`) VALUES
(3, 3, '030722001', '2022-07-02 19:38:55'),
(4, 4, '030722002', '2022-07-02 20:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `no_penjualan` varchar(20) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `alamat_pembeli` varchar(60) NOT NULL,
  `no_telp_pembeli` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `grand_beli` int(11) NOT NULL DEFAULT 0,
  `grand_total` int(11) NOT NULL DEFAULT 0,
  `grand_laba` int(11) NOT NULL DEFAULT 0,
  `jenis_penjualan` enum('Tokopedia','Shopee','Facebook','COD') NOT NULL,
  `status` enum('Unsaved','Proses','Otw','Selesai','Retur','Batal') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `no_penjualan`, `nama_pembeli`, `alamat_pembeli`, `no_telp_pembeli`, `tanggal`, `grand_beli`, `grand_total`, `grand_laba`, `jenis_penjualan`, `status`, `created_at`) VALUES
(3, '030722001', 'bayu', 'resapombo', '08731238123', '2022-07-03', 100000, 175000, 75000, 'Shopee', 'Selesai', '2022-07-02 20:15:26'),
(4, '030722002', 'Mama', 'wates', '081238128312', '2022-07-03', 380000, 525000, 145000, 'Shopee', 'Selesai', '2022-07-04 13:18:50');

--
-- Triggers `penjualan`
--
DELIMITER $$
CREATE TRIGGER `delete_no_pj_auto` AFTER DELETE ON `penjualan` FOR EACH ROW BEGIN
DELETE FROM no_pj_auto WHERE id_penjualan = old.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `no_penjualan` varchar(20) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(80) NOT NULL,
  `qty` int(11) NOT NULL,
  `hg_beli` int(11) NOT NULL,
  `hg_total_beli` int(11) NOT NULL,
  `hg_produk` int(11) NOT NULL,
  `hg_sablon` int(11) NOT NULL,
  `hg_jual` int(11) NOT NULL,
  `hg_total_jual` int(11) NOT NULL,
  `laba_total` int(11) NOT NULL,
  `status_tagihan` enum('Belum dibayar','Lunas','Batal','Retur') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id`, `id_penjualan`, `id_produk`, `id_suplier`, `no_penjualan`, `kode_produk`, `nama_produk`, `qty`, `hg_beli`, `hg_total_beli`, `hg_produk`, `hg_sablon`, `hg_jual`, `hg_total_jual`, `laba_total`, `status_tagihan`, `created_at`) VALUES
(11, 3, 1, 6, '030722001', 'PD01', 'Jaket 01', 1, 100000, 100000, 150000, 25000, 175000, 175000, 75000, 'Lunas', '2022-07-04 12:52:54'),
(12, 4, 1, 6, '030722002', 'PD01', 'Jaket 01', 1, 100000, 100000, 150000, 25000, 175000, 175000, 75000, 'Belum dibayar', '2022-07-04 13:18:50'),
(13, 4, 4, 7, '030722002', 'PD03', 'Hoodie Batman', 2, 140000, 280000, 150000, 25000, 175000, 350000, 70000, 'Belum dibayar', '2022-07-04 13:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode_produk` varchar(30) NOT NULL,
  `nama_produk` varchar(150) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `harga_sablon` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_warna` int(11) NOT NULL,
  `motif` varchar(50) NOT NULL,
  `ukuran` enum('S','M','L','XL','2XL','3XL','4XL','5XL','6XL','7XL') NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kode_produk`, `nama_produk`, `id_suplier`, `harga_produk`, `harga_sablon`, `harga_beli`, `id_kategori`, `id_warna`, `motif`, `ukuran`, `stok`, `created_at`) VALUES
(1, 'PD01', 'Jaket 01', 6, 150000, 25000, 100000, 1, 2, 'Polos', 'L', 0, '2022-07-02 06:33:34'),
(3, 'PD02', 'Celana Jean', 6, 90000, 0, 70000, 2, 2, '-', 'S', 0, '2022-07-02 17:16:31'),
(4, 'PD03', 'Hoodie Batman', 7, 150000, 25000, 140000, 4, 1, 'Batman', 'M', 0, '2022-07-02 17:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `profil_toko`
--

CREATE TABLE `profil_toko` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `keterangan` varchar(80) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `logo` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profil_toko`
--

INSERT INTO `profil_toko` (`id`, `nama`, `keterangan`, `telepon`, `alamat`, `logo`) VALUES
(1, 'Genara Fashion', 'Fashion Gaul ya Genara Fashion', '08512312312', 'Brongkos, Kesamben, Blitar', '82d8cfb9cba0245b19040bb9489644fd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(80) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id`, `nama`, `alamat`, `no_telp`, `created_at`) VALUES
(1, 'Suplier BG', 'Malang', '085777555444', '2021-06-08 09:22:29'),
(2, 'Suplier msglowss', 'Jakarta Selatan', '111111111111', '2021-06-08 09:39:07'),
(5, 'Royal ATK', 'Malang', '084564564', '2021-06-12 14:39:03'),
(6, 'Toko Baju', 'Kesamben', '08456565', '2021-06-12 14:39:36'),
(7, 'Maju Jaya ', 'Blitar', 'xxx', '2021-06-20 07:42:59'),
(8, 'Sejahtera Sentosa', 'Malang', '222', '2021-06-20 07:43:21'),
(9, 'Jaya Abadi', 'Malang', '77777', '2021-06-20 07:43:48'),
(10, 'Sentosa Abadi', 'Blitar', '55555', '2021-06-20 07:45:03'),
(11, 'suplier 1', 'laamat', '0882523233223', '2021-11-28 06:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama_user`, `id_role`) VALUES
(1, 'krisna', 'krisna', 'Admin Krisna', 1),
(2, 'karyawan', '12345', 'Karyawan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `id_user`, `id_menu`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 2),
(4, 2, 2),
(5, 1, 3),
(6, 2, 3),
(7, 1, 4),
(8, 1, 5),
(9, 1, 6),
(10, 1, 7),
(11, 1, 8),
(12, 1, 9),
(13, 2, 9),
(18, 1, 10),
(19, 1, 11),
(20, 8, 1),
(27, 2, 10),
(30, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `judul`, `url`, `icon`) VALUES
(1, 'Dashboard', 'dashboard', 'home'),
(3, 'Lihat Produk', 'lihatproduk', 'shopping-bag'),
(4, 'Master Produk', 'masterproduk', 'package'),
(5, 'Master Kategori', 'kategori', 'folder-minus'),
(6, 'Master Warna', 'warna', 'circle'),
(7, 'Master Suplier', 'suplier', 'users'),
(8, 'Penjualan', 'penjualan', 'arrow-up-circle'),
(9, 'Tagihan Penjualan', 'tagihan', 'credit-card'),
(10, 'Laporan', 'laporan', 'activity'),
(11, 'Pengaturan', 'pengaturan', 'sliders');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `id` int(11) NOT NULL,
  `warna` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`id`, `warna`) VALUES
(1, 'Merah'),
(2, 'Hitam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `no_pj_auto`
--
ALTER TABLE `no_pj_auto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_toko`
--
ALTER TABLE `profil_toko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `no_pj_auto`
--
ALTER TABLE `no_pj_auto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profil_toko`
--
ALTER TABLE `profil_toko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warna`
--
ALTER TABLE `warna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
