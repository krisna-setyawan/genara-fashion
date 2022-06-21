-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 09:18 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

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
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `id_suplier` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `hg_reseller1` int(11) NOT NULL,
  `hg_reseller2` int(11) NOT NULL,
  `hg_reseller3` int(11) NOT NULL,
  `hg_reseller4` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `id_suplier`, `harga_beli`, `harga_jual`, `hg_reseller1`, `hg_reseller2`, `hg_reseller3`, `hg_reseller4`, `stok`, `created_at`) VALUES
(1, 'BR-01', 'Sabun', 0, 5000, 8000, 6000, 6500, 7000, 7500, 0, '2021-06-12 14:34:55'),
(2, 'BR-01', 'Sapu', 0, 8500, 13000, 10000, 10000, 11000, 11500, 54, '2021-06-12 14:36:04'),
(3, 'BR-03', 'Sandal Jepit', 0, 3000, 5500, 4000, 4000, 4000, 4500, 14, '2021-06-12 14:36:37'),
(4, 'BR-04', 'Buku', 0, 6000, 9500, 7000, 8000, 8500, 8500, 9, '2021-06-12 14:37:18'),
(5, 'BR-05', 'Bulpen', 0, 1000, 2500, 1500, 1500, 1500, 2000, 0, '2021-06-12 14:37:59'),
(6, 'BR-06', 'Sepatu', 0, 50000, 75000, 65000, 67000, 69000, 70000, 0, '2021-06-18 16:37:02'),
(7, 'BR-07', 'Baju', 0, 35000, 45000, 37000, 38000, 39000, 40000, 0, '2021-06-18 16:37:54'),
(8, 'BR-08', 'Mie Sedap', 0, 1200, 2000, 1600, 1700, 1800, 1900, 40, '2021-06-20 06:27:14'),
(9, 'BR-09', 'Taplak', 0, 5000, 8000, 5500, 6000, 6500, 7000, 10, '2021-06-20 06:30:29'),
(10, 'BR-10', 'Baby Oil', 0, 7000, 9000, 8000, 8000, 8000, 8000, 13, '2021-06-20 06:31:57'),
(11, 'BR-11', 'Permen Yupi', 0, 1000, 2000, 1500, 1500, 1500, 1500, 25, '2021-06-20 06:33:29'),
(12, 'BR-12', 'Tolak Angin', 0, 12000, 16000, 14000, 14000, 14000, 14000, 33, '2021-06-20 06:34:59'),
(13, 'BR-13', 'Buku Sidu', 0, 5000, 7000, 6000, 6000, 6000, 6000, 13, '2021-06-20 06:36:11'),
(14, 'BR-14', 'Rinso', 0, 4500, 5000, 4750, 4750, 4750, 4750, 22, '2021-06-20 06:37:46'),
(15, 'BR-15', 'Bedak ', 0, 15000, 25000, 20000, 20000, 20000, 20000, 5, '2021-06-20 06:38:39'),
(16, 'BR-16', 'Minyak', 0, 11000, 15000, 14000, 14000, 14000, 14000, 20, '2021-06-20 06:39:51'),
(17, 'BR-17', 'Gulaku', 0, 20000, 25000, 22000, 22000, 22000, 22000, 10, '2021-06-20 06:40:45'),
(18, 'BR-18', 'Passeo', 0, 9000, 10000, 9500, 9500, 9500, 9500, 40, '2021-06-20 06:41:38'),
(19, 'BR-19', 'Piring', 0, 5000, 7500, 6000, 6000, 6000, 6000, 12, '2021-06-20 06:42:33'),
(20, 'BR-20', 'Gelas', 0, 2500, 4000, 3000, 3000, 3000, 3000, 12, '2021-06-20 06:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Jaket'),
(2, 'Celana');

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
(3, 16, '290821002', '2021-08-29 05:58:41'),
(6, 19, '290821003', '2021-08-29 07:15:55'),
(7, 20, '290821004', '2021-08-29 07:32:21'),
(8, 21, '290821005', '2021-08-29 13:14:18'),
(11, 24, '200622001', '2022-06-20 03:44:07'),
(12, 25, '200622002', '2022-06-20 04:02:28');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `no_penjualan` varchar(20) NOT NULL,
  `id_pelanggan` int(11) NOT NULL DEFAULT 0,
  `id_reseller` int(11) NOT NULL DEFAULT 0,
  `kelas_reseller` enum('Kelas 1','Kelas 2','Kelas 3','Kelas 4','0') NOT NULL DEFAULT '0',
  `jenis_penjualan` enum('Umum','Pelanggan','Reseller') NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `alamat_pembeli` varchar(60) NOT NULL,
  `no_telp_pembeli` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `grand_beli` int(11) NOT NULL DEFAULT 0,
  `grand_total` int(11) NOT NULL DEFAULT 0,
  `grand_laba` int(11) NOT NULL DEFAULT 0,
  `jumlah_bayar` int(11) NOT NULL,
  `jumlah_kembalian` int(11) NOT NULL,
  `status` enum('Proses','Selesai') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `no_penjualan`, `id_pelanggan`, `id_reseller`, `kelas_reseller`, `jenis_penjualan`, `nama_pembeli`, `alamat_pembeli`, `no_telp_pembeli`, `tanggal`, `grand_beli`, `grand_total`, `grand_laba`, `jumlah_bayar`, `jumlah_kembalian`, `status`, `created_at`) VALUES
(16, '290821002', 0, 4, 'Kelas 2', 'Reseller', 'Nindi', 'Mojorejo', '5555555', '2021-08-29', 25000, 30000, 5000, 50000, 20000, 'Selesai', '2021-08-29 14:09:28'),
(19, '290821003', 0, 0, '0', 'Umum', 'coba beli lagi', 'alamadaasd asd', '084545154514', '2021-08-29', 30000, 50000, 20000, 100000, 50000, 'Selesai', '2021-08-29 07:29:59'),
(20, '290821004', 0, 3, 'Kelas 1', 'Reseller', 'Reseller1', 'Alamat Reseller', '084561325', '2021-08-29', 6000, 8000, 2000, 10000, 2000, 'Selesai', '2021-08-29 07:33:09'),
(21, '290821005', 0, 1, 'Kelas 4', 'Reseller', 'Pendikss', 'Samben', '0845465445', '2021-08-29', 13000, 16500, 3500, 17000, 500, 'Selesai', '2021-08-29 14:11:11'),
(24, '200622001', 1, 0, '0', 'Umum', 'kristin', 'brongkos', '08192849821', '2022-06-20', 59000, 93000, 34000, 100000, 7000, 'Selesai', '2022-06-20 03:45:57'),
(25, '200622002', 0, 0, '0', 'Umum', 'genta', 'brongkos', '081929371024', '2022-06-20', 0, 0, 0, 0, 0, 'Proses', '2022-06-20 04:02:28');

--
-- Triggers `penjualan`
--
DELIMITER $$
CREATE TRIGGER `delete_detail_jual` AFTER DELETE ON `penjualan` FOR EACH ROW BEGIN
DELETE FROM penjualan_detail WHERE id_penjualan = old.id;
END
$$
DELIMITER ;
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
  `id_barang` int(11) NOT NULL,
  `no_penjualan` varchar(20) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(80) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hg_beli` int(11) NOT NULL,
  `hg_total_beli` int(11) NOT NULL,
  `hg_satuan` int(11) NOT NULL,
  `hg_total` int(11) NOT NULL,
  `laba_total` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id`, `id_penjualan`, `id_barang`, `no_penjualan`, `kode_barang`, `nama_barang`, `jumlah`, `hg_beli`, `hg_total_beli`, `hg_satuan`, `hg_total`, `laba_total`, `created_at`) VALUES
(39, 16, 13, '290821002', 'BR-13', 'Buku Sidu', 5, 5000, 25000, 6000, 30000, 5000, '2021-08-29 06:52:17'),
(42, 19, 15, '290821003', 'BR-15', 'Bedak ', 2, 15000, 30000, 25000, 50000, 20000, '2021-08-29 07:25:42'),
(43, 20, 8, '290821004', 'BR-08', 'Mie Sedap', 5, 1200, 6000, 1600, 8000, 2000, '2021-08-29 07:32:47'),
(44, 21, 13, '290821005', 'BR-13', 'Buku Sidu', 2, 5000, 10000, 6000, 12000, 2000, '2021-08-29 13:14:57'),
(45, 21, 3, '290821005', 'BR-03', 'Sandal Jepit', 1, 3000, 3000, 4500, 4500, 1500, '2021-08-29 13:15:11'),
(50, 24, 15, '200622001', 'BR-15', 'Bedak ', 3, 15000, 45000, 25000, 75000, 30000, '2022-06-20 03:45:13'),
(51, 24, 10, '200622001', 'BR-10', 'Baby Oil', 2, 7000, 14000, 9000, 18000, 4000, '2022-06-20 03:45:42');

--
-- Triggers `penjualan_detail`
--
DELIMITER $$
CREATE TRIGGER `add_barang_jual` AFTER INSERT ON `penjualan_detail` FOR EACH ROW BEGIN
UPDATE barang SET stok = stok - NEW.jumlah WHERE id = NEW.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_barang_jual` AFTER DELETE ON `penjualan_detail` FOR EACH ROW BEGIN
UPDATE barang SET stok = stok + OLD.jumlah WHERE id = OLD.id_barang;
END
$$
DELIMITER ;

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
(1, 'Muflih Id Blitar', 'Reseller Resmi Beauty Glow & Apapun', '08512312312', 'Pagergunung, Kesamben, Blitar', '30ca40e888ab8ba2520061d1c11facf7.png');

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
(6, 'Toko Bangunan', 'Kesamben', '08456565', '2021-06-12 14:39:36'),
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
(27, 2, 10);

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
(3, 'Lihat Barang', 'lihatbarang', 'shopping-bag'),
(4, 'Master Barang', 'masterbarang', 'package'),
(5, 'Suplier', 'suplier', 'download'),
(6, 'Kategori', 'kategori', 'users'),
(7, 'Reseller', 'reseller', 'user-check'),
(8, 'Pembelian', 'pembelian', 'arrow-down-circle'),
(9, 'Penjualan', 'penjualan', 'arrow-up-circle'),
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `no_pj_auto`
--
ALTER TABLE `no_pj_auto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
