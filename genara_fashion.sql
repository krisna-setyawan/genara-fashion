-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 09:28 AM
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
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `id_provinsi`, `nama_kota`, `urutan`) VALUES
(1103, 11, 'KABUPATEN ACEH SELATAN', 5),
(1104, 11, 'KABUPATEN ACEH TENGGARA', 5),
(1105, 11, 'KABUPATEN ACEH TIMUR', 5),
(1106, 11, 'KABUPATEN ACEH TENGAH', 5),
(1107, 11, 'KABUPATEN ACEH BARAT', 5),
(1108, 11, 'KABUPATEN ACEH BESAR', 5),
(1109, 11, 'KABUPATEN PIDIE', 5),
(1110, 11, 'KABUPATEN BIREUEN', 5),
(1111, 11, 'KABUPATEN ACEH UTARA', 5),
(1112, 11, 'KABUPATEN ACEH BARAT DAYA', 5),
(1113, 11, 'KABUPATEN GAYO LUES', 5),
(1114, 11, 'KABUPATEN ACEH TAMIANG', 5),
(1115, 11, 'KABUPATEN NAGAN RAYA', 5),
(1116, 11, 'KABUPATEN ACEH JAYA', 5),
(1117, 11, 'KABUPATEN BENER MERIAH', 5),
(1118, 11, 'KABUPATEN PIDIE JAYA', 5),
(1171, 11, 'KOTA BANDA ACEH', 5),
(1172, 11, 'KOTA SABANG', 5),
(1173, 11, 'KOTA LANGSA', 5),
(1174, 11, 'KOTA LHOKSEUMAWE', 5),
(1175, 11, 'KOTA SUBULUSSALAM', 5),
(1201, 12, 'KABUPATEN NIAS', 5),
(1202, 12, 'KABUPATEN MANDAILING NATAL', 5),
(1203, 12, 'KABUPATEN TAPANULI SELATAN', 5),
(1204, 12, 'KABUPATEN TAPANULI TENGAH', 5),
(1205, 12, 'KABUPATEN TAPANULI UTARA', 5),
(1206, 12, 'KABUPATEN TOBA SAMOSIR', 5),
(1207, 12, 'KABUPATEN LABUHAN BATU', 5),
(1208, 12, 'KABUPATEN ASAHAN', 5),
(1209, 12, 'KABUPATEN SIMALUNGUN', 5),
(1210, 12, 'KABUPATEN DAIRI', 5),
(1211, 12, 'KABUPATEN KARO', 5),
(1212, 12, 'KABUPATEN DELI SERDANG', 5),
(1213, 12, 'KABUPATEN LANGKAT', 5),
(1214, 12, 'KABUPATEN NIAS SELATAN', 5),
(1215, 12, 'KABUPATEN HUMBANG HASUNDUTAN', 5),
(1216, 12, 'KABUPATEN PAKPAK BHARAT', 5),
(1217, 12, 'KABUPATEN SAMOSIR', 5),
(1218, 12, 'KABUPATEN SERDANG BEDAGAI', 5),
(1219, 12, 'KABUPATEN BATU BARA', 5),
(1220, 12, 'KABUPATEN PADANG LAWAS UTARA', 5),
(1221, 12, 'KABUPATEN PADANG LAWAS', 5),
(1222, 12, 'KABUPATEN LABUHAN BATU SELATAN', 5),
(1223, 12, 'KABUPATEN LABUHAN BATU UTARA', 5),
(1224, 12, 'KABUPATEN NIAS UTARA', 5),
(1225, 12, 'KABUPATEN NIAS BARAT', 5),
(1271, 12, 'KOTA SIBOLGA', 5),
(1272, 12, 'KOTA TANJUNG BALAI', 5),
(1273, 12, 'KOTA PEMATANG SIANTAR', 5),
(1274, 12, 'KOTA TEBING TINGGI', 5),
(1275, 12, 'KOTA MEDAN', 5),
(1276, 12, 'KOTA BINJAI', 5),
(1277, 12, 'KOTA PADANGSIDIMPUAN', 5),
(1278, 12, 'KOTA GUNUNGSITOLI', 5),
(1301, 13, 'KABUPATEN KEPULAUAN MENTAWAI', 5),
(1302, 13, 'KABUPATEN PESISIR SELATAN', 5),
(1303, 13, 'KABUPATEN SOLOK', 5),
(1304, 13, 'KABUPATEN SIJUNJUNG', 5),
(1305, 13, 'KABUPATEN TANAH DATAR', 5),
(1306, 13, 'KABUPATEN PADANG PARIAMAN', 5),
(1307, 13, 'KABUPATEN AGAM', 5),
(1308, 13, 'KABUPATEN LIMA PULUH KOTA', 5),
(1309, 13, 'KABUPATEN PASAMAN', 5),
(1310, 13, 'KABUPATEN SOLOK SELATAN', 5),
(1311, 13, 'KABUPATEN DHARMASRAYA', 5),
(1312, 13, 'KABUPATEN PASAMAN BARAT', 5),
(1371, 13, 'KOTA PADANG', 5),
(1372, 13, 'KOTA SOLOK', 5),
(1373, 13, 'KOTA SAWAH LUNTO', 5),
(1374, 13, 'KOTA PADANG PANJANG', 5),
(1375, 13, 'KOTA BUKITTINGGI', 5),
(1376, 13, 'KOTA PAYAKUMBUH', 5),
(1377, 13, 'KOTA PARIAMAN', 5),
(1401, 14, 'KABUPATEN KUANTAN SINGINGI', 5),
(1402, 14, 'KABUPATEN INDRAGIRI HULU', 5),
(1403, 14, 'KABUPATEN INDRAGIRI HILIR', 5),
(1404, 14, 'KABUPATEN PELALAWAN', 5),
(1405, 14, 'KABUPATEN S I A K', 5),
(1406, 14, 'KABUPATEN KAMPAR', 5),
(1407, 14, 'KABUPATEN ROKAN HULU', 5),
(1408, 14, 'KABUPATEN BENGKALIS', 5),
(1409, 14, 'KABUPATEN ROKAN HILIR', 5),
(1410, 14, 'KABUPATEN KEPULAUAN MERANTI', 5),
(1471, 14, 'KOTA PEKANBARU', 5),
(1473, 14, 'KOTA D U M A I', 5),
(1501, 15, 'KABUPATEN KERINCI', 5),
(1502, 15, 'KABUPATEN MERANGIN', 5),
(1503, 15, 'KABUPATEN SAROLANGUN', 5),
(1504, 15, 'KABUPATEN BATANG HARI', 5),
(1505, 15, 'KABUPATEN MUARO JAMBI', 5),
(1506, 15, 'KABUPATEN TANJUNG JABUNG TIMUR', 5),
(1507, 15, 'KABUPATEN TANJUNG JABUNG BARAT', 5),
(1508, 15, 'KABUPATEN TEBO', 5),
(1509, 15, 'KABUPATEN BUNGO', 5),
(1571, 15, 'KOTA JAMBI', 5),
(1572, 15, 'KOTA SUNGAI PENUH', 5),
(1601, 16, 'KABUPATEN OGAN KOMERING ULU', 5),
(1602, 16, 'KABUPATEN OGAN KOMERING ILIR', 5),
(1603, 16, 'KABUPATEN MUARA ENIM', 5),
(1604, 16, 'KABUPATEN LAHAT', 5),
(1605, 16, 'KABUPATEN MUSI RAWAS', 5),
(1606, 16, 'KABUPATEN MUSI BANYUASIN', 5),
(1607, 16, 'KABUPATEN BANYU ASIN', 5),
(1608, 16, 'KABUPATEN OGAN KOMERING ULU SELATAN', 5),
(1609, 16, 'KABUPATEN OGAN KOMERING ULU TIMUR', 5),
(1610, 16, 'KABUPATEN OGAN ILIR', 5),
(1611, 16, 'KABUPATEN EMPAT LAWANG', 5),
(1612, 16, 'KABUPATEN PENUKAL ABAB LEMATANG ILIR', 5),
(1613, 16, 'KABUPATEN MUSI RAWAS UTARA', 5),
(1671, 16, 'KOTA PALEMBANG', 5),
(1672, 16, 'KOTA PRABUMULIH', 5),
(1673, 16, 'KOTA PAGAR ALAM', 5),
(1674, 16, 'KOTA LUBUKLINGGAU', 5),
(1701, 17, 'KABUPATEN BENGKULU SELATAN', 5),
(1702, 17, 'KABUPATEN REJANG LEBONG', 5),
(1703, 17, 'KABUPATEN BENGKULU UTARA', 5),
(1704, 17, 'KABUPATEN KAUR', 5),
(1705, 17, 'KABUPATEN SELUMA', 5),
(1706, 17, 'KABUPATEN MUKOMUKO', 5),
(1707, 17, 'KABUPATEN LEBONG', 5),
(1708, 17, 'KABUPATEN KEPAHIANG', 5),
(1709, 17, 'KABUPATEN BENGKULU TENGAH', 5),
(1771, 17, 'KOTA BENGKULU', 5),
(1801, 18, 'KABUPATEN LAMPUNG BARAT', 5),
(1802, 18, 'KABUPATEN TANGGAMUS', 5),
(1803, 18, 'KABUPATEN LAMPUNG SELATAN', 5),
(1804, 18, 'KABUPATEN LAMPUNG TIMUR', 5),
(1805, 18, 'KABUPATEN LAMPUNG TENGAH', 5),
(1806, 18, 'KABUPATEN LAMPUNG UTARA', 5),
(1807, 18, 'KABUPATEN WAY KANAN', 5),
(1808, 18, 'KABUPATEN TULANGBAWANG', 5),
(1809, 18, 'KABUPATEN PESAWARAN', 5),
(1810, 18, 'KABUPATEN PRINGSEWU', 5),
(1811, 18, 'KABUPATEN MESUJI', 5),
(1812, 18, 'KABUPATEN TULANG BAWANG BARAT', 5),
(1813, 18, 'KABUPATEN PESISIR BARAT', 5),
(1871, 18, 'KOTA BANDAR LAMPUNG', 5),
(1872, 18, 'KOTA METRO', 5),
(1901, 19, 'KABUPATEN BANGKA', 5),
(1902, 19, 'KABUPATEN BELITUNG', 5),
(1903, 19, 'KABUPATEN BANGKA BARAT', 5),
(1904, 19, 'KABUPATEN BANGKA TENGAH', 5),
(1905, 19, 'KABUPATEN BANGKA SELATAN', 5),
(1906, 19, 'KABUPATEN BELITUNG TIMUR', 5),
(1971, 19, 'KOTA PANGKAL PINANG', 5),
(2101, 21, 'KABUPATEN KARIMUN', 5),
(2102, 21, 'KABUPATEN BINTAN', 5),
(2103, 21, 'KABUPATEN NATUNA', 5),
(2104, 21, 'KABUPATEN LINGGA', 5),
(2105, 21, 'KABUPATEN KEPULAUAN ANAMBAS', 5),
(2171, 21, 'KOTA BATAM', 5),
(2172, 21, 'KOTA TANJUNG PINANG', 5),
(3101, 31, 'KABUPATEN KEPULAUAN SERIBU', 5),
(3171, 31, 'KOTA JAKARTA SELATAN', 5),
(3172, 31, 'KOTA JAKARTA TIMUR', 5),
(3173, 31, 'KOTA JAKARTA PUSAT', 5),
(3174, 31, 'KOTA JAKARTA BARAT', 5),
(3175, 31, 'KOTA JAKARTA UTARA', 5),
(3201, 32, 'KABUPATEN BOGOR', 5),
(3202, 32, 'KABUPATEN SUKABUMI', 5),
(3203, 32, 'KABUPATEN CIANJUR', 5),
(3204, 32, 'KABUPATEN BANDUNG', 5),
(3205, 32, 'KABUPATEN GARUT', 5),
(3206, 32, 'KABUPATEN TASIKMALAYA', 5),
(3207, 32, 'KABUPATEN CIAMIS', 5),
(3208, 32, 'KABUPATEN KUNINGAN', 5),
(3209, 32, 'KABUPATEN CIREBON', 5),
(3210, 32, 'KABUPATEN MAJALENGKA', 5),
(3211, 32, 'KABUPATEN SUMEDANG', 5),
(3212, 32, 'KABUPATEN INDRAMAYU', 5),
(3213, 32, 'KABUPATEN SUBANG', 5),
(3214, 32, 'KABUPATEN PURWAKARTA', 5),
(3215, 32, 'KABUPATEN KARAWANG', 5),
(3216, 32, 'KABUPATEN BEKASI', 5),
(3217, 32, 'KABUPATEN BANDUNG BARAT', 5),
(3218, 32, 'KABUPATEN PANGANDARAN', 5),
(3271, 32, 'KOTA BOGOR', 5),
(3272, 32, 'KOTA SUKABUMI', 5),
(3273, 32, 'KOTA BANDUNG', 5),
(3274, 32, 'KOTA CIREBON', 5),
(3275, 32, 'KOTA BEKASI', 5),
(3276, 32, 'KOTA DEPOK', 5),
(3277, 32, 'KOTA CIMAHI', 5),
(3278, 32, 'KOTA TASIKMALAYA', 5),
(3279, 32, 'KOTA BANJAR', 5),
(3301, 33, 'KABUPATEN CILACAP', 5),
(3302, 33, 'KABUPATEN BANYUMAS', 5),
(3303, 33, 'KABUPATEN PURBALINGGA', 5),
(3304, 33, 'KABUPATEN BANJARNEGARA', 5),
(3305, 33, 'KABUPATEN KEBUMEN', 5),
(3306, 33, 'KABUPATEN PURWOREJO', 5),
(3307, 33, 'KABUPATEN WONOSOBO', 5),
(3308, 33, 'KABUPATEN MAGELANG', 5),
(3309, 33, 'KABUPATEN BOYOLALI', 5),
(3310, 33, 'KABUPATEN KLATEN', 5),
(3311, 33, 'KABUPATEN SUKOHARJO', 5),
(3312, 33, 'KABUPATEN WONOGIRI', 5),
(3313, 33, 'KABUPATEN KARANGANYAR', 5),
(3314, 33, 'KABUPATEN SRAGEN', 5),
(3315, 33, 'KABUPATEN GROBOGAN', 5),
(3316, 33, 'KABUPATEN BLORA', 5),
(3317, 33, 'KABUPATEN REMBANG', 5),
(3318, 33, 'KABUPATEN PATI', 5),
(3319, 33, 'KABUPATEN KUDUS', 5),
(3320, 33, 'KABUPATEN JEPARA', 5),
(3321, 33, 'KABUPATEN DEMAK', 5),
(3322, 33, 'KABUPATEN SEMARANG', 5),
(3323, 33, 'KABUPATEN TEMANGGUNG', 5),
(3324, 33, 'KABUPATEN KENDAL', 5),
(3325, 33, 'KABUPATEN BATANG', 5),
(3326, 33, 'KABUPATEN PEKALONGAN', 5),
(3327, 33, 'KABUPATEN PEMALANG', 5),
(3328, 33, 'KABUPATEN TEGAL', 5),
(3329, 33, 'KABUPATEN BREBES', 5),
(3371, 33, 'KOTA MAGELANG', 5),
(3372, 33, 'KOTA SURAKARTA', 5),
(3373, 33, 'KOTA SALATIGA', 5),
(3374, 33, 'KOTA SEMARANG', 5),
(3375, 33, 'KOTA PEKALONGAN', 5),
(3376, 33, 'KOTA TEGAL', 5),
(3401, 34, 'KABUPATEN KULON PROGO', 5),
(3402, 34, 'KABUPATEN BANTUL', 5),
(3403, 34, 'KABUPATEN GUNUNG KIDUL', 5),
(3404, 34, 'KABUPATEN SLEMAN', 5),
(3471, 34, 'KOTA YOGYAKARTA', 5),
(3501, 35, 'KABUPATEN PACITAN', 5),
(3502, 35, 'KABUPATEN PONOROGO', 5),
(3503, 35, 'KABUPATEN TRENGGALEK', 5),
(3504, 35, 'KABUPATEN TULUNGAGUNG', 5),
(3505, 35, 'KABUPATEN BLITAR', 2),
(3506, 35, 'KABUPATEN KEDIRI', 5),
(3507, 35, 'KABUPATEN MALANG', 5),
(3508, 35, 'KABUPATEN LUMAJANG', 5),
(3509, 35, 'KABUPATEN JEMBER', 5),
(3510, 35, 'KABUPATEN BANYUWANGI', 5),
(3511, 35, 'KABUPATEN BONDOWOSO', 5),
(3512, 35, 'KABUPATEN SITUBONDO', 5),
(3513, 35, 'KABUPATEN PROBOLINGGO', 5),
(3514, 35, 'KABUPATEN PASURUAN', 5),
(3515, 35, 'KABUPATEN SIDOARJO', 5),
(3516, 35, 'KABUPATEN MOJOKERTO', 5),
(3517, 35, 'KABUPATEN JOMBANG', 5),
(3518, 35, 'KABUPATEN NGANJUK', 5),
(3519, 35, 'KABUPATEN MADIUN', 5),
(3520, 35, 'KABUPATEN MAGETAN', 5),
(3521, 35, 'KABUPATEN NGAWI', 5),
(3522, 35, 'KABUPATEN BOJONEGORO', 5),
(3523, 35, 'KABUPATEN TUBAN', 5),
(3524, 35, 'KABUPATEN LAMONGAN', 5),
(3525, 35, 'KABUPATEN GRESIK', 5),
(3526, 35, 'KABUPATEN BANGKALAN', 5),
(3527, 35, 'KABUPATEN SAMPANG', 5),
(3528, 35, 'KABUPATEN PAMEKASAN', 5),
(3529, 35, 'KABUPATEN SUMENEP', 5),
(3571, 35, 'KOTA KEDIRI', 5),
(3572, 35, 'KOTA BLITAR', 1),
(3573, 35, 'KOTA MALANG', 5),
(3574, 35, 'KOTA PROBOLINGGO', 5),
(3575, 35, 'KOTA PASURUAN', 5),
(3576, 35, 'KOTA MOJOKERTO', 5),
(3577, 35, 'KOTA MADIUN', 5),
(3578, 35, 'KOTA SURABAYA', 5),
(3579, 35, 'KOTA BATU', 5),
(3601, 36, 'KABUPATEN PANDEGLANG', 5),
(3602, 36, 'KABUPATEN LEBAK', 5),
(3603, 36, 'KABUPATEN TANGERANG', 5),
(3604, 36, 'KABUPATEN SERANG', 5),
(3671, 36, 'KOTA TANGERANG', 5),
(3672, 36, 'KOTA CILEGON', 5),
(3673, 36, 'KOTA SERANG', 5),
(3674, 36, 'KOTA TANGERANG SELATAN', 5),
(5101, 51, 'KABUPATEN JEMBRANA', 5),
(5102, 51, 'KABUPATEN TABANAN', 5),
(5103, 51, 'KABUPATEN BADUNG', 5),
(5104, 51, 'KABUPATEN GIANYAR', 5),
(5105, 51, 'KABUPATEN KLUNGKUNG', 5),
(5106, 51, 'KABUPATEN BANGLI', 5),
(5107, 51, 'KABUPATEN KARANG ASEM', 5),
(5108, 51, 'KABUPATEN BULELENG', 5),
(5171, 51, 'KOTA DENPASAR', 5),
(5201, 52, 'KABUPATEN LOMBOK BARAT', 5),
(5202, 52, 'KABUPATEN LOMBOK TENGAH', 5),
(5203, 52, 'KABUPATEN LOMBOK TIMUR', 5),
(5204, 52, 'KABUPATEN SUMBAWA', 5),
(5205, 52, 'KABUPATEN DOMPU', 5),
(5206, 52, 'KABUPATEN BIMA', 5),
(5207, 52, 'KABUPATEN SUMBAWA BARAT', 5),
(5208, 52, 'KABUPATEN LOMBOK UTARA', 5),
(5271, 52, 'KOTA MATARAM', 5),
(5272, 52, 'KOTA BIMA', 5),
(5301, 53, 'KABUPATEN SUMBA BARAT', 5),
(5302, 53, 'KABUPATEN SUMBA TIMUR', 5),
(5303, 53, 'KABUPATEN KUPANG', 5),
(5304, 53, 'KABUPATEN TIMOR TENGAH SELATAN', 5),
(5305, 53, 'KABUPATEN TIMOR TENGAH UTARA', 5),
(5306, 53, 'KABUPATEN BELU', 5),
(5307, 53, 'KABUPATEN ALOR', 5),
(5308, 53, 'KABUPATEN LEMBATA', 5),
(5309, 53, 'KABUPATEN FLORES TIMUR', 5),
(5310, 53, 'KABUPATEN SIKKA', 5),
(5311, 53, 'KABUPATEN ENDE', 5),
(5312, 53, 'KABUPATEN NGADA', 5),
(5313, 53, 'KABUPATEN MANGGARAI', 5),
(5314, 53, 'KABUPATEN ROTE NDAO', 5),
(5315, 53, 'KABUPATEN MANGGARAI BARAT', 5),
(5316, 53, 'KABUPATEN SUMBA TENGAH', 5),
(5317, 53, 'KABUPATEN SUMBA BARAT DAYA', 5),
(5318, 53, 'KABUPATEN NAGEKEO', 5),
(5319, 53, 'KABUPATEN MANGGARAI TIMUR', 5),
(5320, 53, 'KABUPATEN SABU RAIJUA', 5),
(5321, 53, 'KABUPATEN MALAKA', 5),
(5371, 53, 'KOTA KUPANG', 5),
(6101, 61, 'KABUPATEN SAMBAS', 5),
(6102, 61, 'KABUPATEN BENGKAYANG', 5),
(6103, 61, 'KABUPATEN LANDAK', 5),
(6104, 61, 'KABUPATEN MEMPAWAH', 5),
(6105, 61, 'KABUPATEN SANGGAU', 5),
(6106, 61, 'KABUPATEN KETAPANG', 5),
(6107, 61, 'KABUPATEN SINTANG', 5),
(6108, 61, 'KABUPATEN KAPUAS HULU', 5),
(6109, 61, 'KABUPATEN SEKADAU', 5),
(6110, 61, 'KABUPATEN MELAWI', 5),
(6111, 61, 'KABUPATEN KAYONG UTARA', 5),
(6112, 61, 'KABUPATEN KUBU RAYA', 5),
(6171, 61, 'KOTA PONTIANAK', 5),
(6172, 61, 'KOTA SINGKAWANG', 5),
(6201, 62, 'KABUPATEN KOTAWARINGIN BARAT', 5),
(6202, 62, 'KABUPATEN KOTAWARINGIN TIMUR', 5),
(6203, 62, 'KABUPATEN KAPUAS', 5),
(6204, 62, 'KABUPATEN BARITO SELATAN', 5),
(6205, 62, 'KABUPATEN BARITO UTARA', 5),
(6206, 62, 'KABUPATEN SUKAMARA', 5),
(6207, 62, 'KABUPATEN LAMANDAU', 5),
(6208, 62, 'KABUPATEN SERUYAN', 5),
(6209, 62, 'KABUPATEN KATINGAN', 5),
(6210, 62, 'KABUPATEN PULANG PISAU', 5),
(6211, 62, 'KABUPATEN GUNUNG MAS', 5),
(6212, 62, 'KABUPATEN BARITO TIMUR', 5),
(6213, 62, 'KABUPATEN MURUNG RAYA', 5),
(6271, 62, 'KOTA PALANGKA RAYA', 5),
(6301, 63, 'KABUPATEN TANAH LAUT', 5),
(6302, 63, 'KABUPATEN KOTA BARU', 5),
(6303, 63, 'KABUPATEN BANJAR', 5),
(6304, 63, 'KABUPATEN BARITO KUALA', 5),
(6305, 63, 'KABUPATEN TAPIN', 5),
(6306, 63, 'KABUPATEN HULU SUNGAI SELATAN', 5),
(6307, 63, 'KABUPATEN HULU SUNGAI TENGAH', 5),
(6308, 63, 'KABUPATEN HULU SUNGAI UTARA', 5),
(6309, 63, 'KABUPATEN TABALONG', 5),
(6310, 63, 'KABUPATEN TANAH BUMBU', 5),
(6311, 63, 'KABUPATEN BALANGAN', 5),
(6371, 63, 'KOTA BANJARMASIN', 5),
(6372, 63, 'KOTA BANJAR BARU', 5),
(6401, 64, 'KABUPATEN PASER', 5),
(6402, 64, 'KABUPATEN KUTAI BARAT', 5),
(6403, 64, 'KABUPATEN KUTAI KARTANEGARA', 5),
(6404, 64, 'KABUPATEN KUTAI TIMUR', 5),
(6405, 64, 'KABUPATEN BERAU', 5),
(6409, 64, 'KABUPATEN PENAJAM PASER UTARA', 5),
(6411, 64, 'KABUPATEN MAHAKAM HULU', 5),
(6471, 64, 'KOTA BALIKPAPAN', 5),
(6472, 64, 'KOTA SAMARINDA', 5),
(6474, 64, 'KOTA BONTANG', 5),
(6501, 65, 'KABUPATEN MALINAU', 5),
(6502, 65, 'KABUPATEN BULUNGAN', 5),
(6503, 65, 'KABUPATEN TANA TIDUNG', 5),
(6504, 65, 'KABUPATEN NUNUKAN', 5),
(6571, 65, 'KOTA TARAKAN', 5),
(7101, 71, 'KABUPATEN BOLAANG MONGONDOW', 5),
(7102, 71, 'KABUPATEN MINAHASA', 5),
(7103, 71, 'KABUPATEN KEPULAUAN SANGIHE', 5),
(7104, 71, 'KABUPATEN KEPULAUAN TALAUD', 5),
(7105, 71, 'KABUPATEN MINAHASA SELATAN', 5),
(7106, 71, 'KABUPATEN MINAHASA UTARA', 5),
(7107, 71, 'KABUPATEN BOLAANG MONGONDOW UTARA', 5),
(7108, 71, 'KABUPATEN SIAU TAGULANDANG BIARO', 5),
(7109, 71, 'KABUPATEN MINAHASA TENGGARA', 5),
(7110, 71, 'KABUPATEN BOLAANG MONGONDOW SELATAN', 5),
(7111, 71, 'KABUPATEN BOLAANG MONGONDOW TIMUR', 5),
(7171, 71, 'KOTA MANADO', 5),
(7172, 71, 'KOTA BITUNG', 5),
(7173, 71, 'KOTA TOMOHON', 5),
(7174, 71, 'KOTA KOTAMOBAGU', 5),
(7201, 72, 'KABUPATEN BANGGAI KEPULAUAN', 5),
(7202, 72, 'KABUPATEN BANGGAI', 5),
(7203, 72, 'KABUPATEN MOROWALI', 5),
(7204, 72, 'KABUPATEN POSO', 5),
(7205, 72, 'KABUPATEN DONGGALA', 5),
(7206, 72, 'KABUPATEN TOLI-TOLI', 5),
(7207, 72, 'KABUPATEN BUOL', 5),
(7208, 72, 'KABUPATEN PARIGI MOUTONG', 5),
(7209, 72, 'KABUPATEN TOJO UNA-UNA', 5),
(7210, 72, 'KABUPATEN SIGI', 5),
(7211, 72, 'KABUPATEN BANGGAI LAUT', 5),
(7212, 72, 'KABUPATEN MOROWALI UTARA', 5),
(7271, 72, 'KOTA PALU', 5),
(7301, 73, 'KABUPATEN KEPULAUAN SELAYAR', 5),
(7302, 73, 'KABUPATEN BULUKUMBA', 5),
(7303, 73, 'KABUPATEN BANTAENG', 5),
(7304, 73, 'KABUPATEN JENEPONTO', 5),
(7305, 73, 'KABUPATEN TAKALAR', 5),
(7306, 73, 'KABUPATEN GOWA', 5),
(7307, 73, 'KABUPATEN SINJAI', 5),
(7308, 73, 'KABUPATEN MAROS', 5),
(7309, 73, 'KABUPATEN PANGKAJENE DAN KEPULAUAN', 5),
(7310, 73, 'KABUPATEN BARRU', 5),
(7311, 73, 'KABUPATEN BONE', 5),
(7312, 73, 'KABUPATEN SOPPENG', 5),
(7313, 73, 'KABUPATEN WAJO', 5),
(7314, 73, 'KABUPATEN SIDENRENG RAPPANG', 5),
(7315, 73, 'KABUPATEN PINRANG', 5),
(7316, 73, 'KABUPATEN ENREKANG', 5),
(7317, 73, 'KABUPATEN LUWU', 5),
(7318, 73, 'KABUPATEN TANA TORAJA', 5),
(7322, 73, 'KABUPATEN LUWU UTARA', 5),
(7325, 73, 'KABUPATEN LUWU TIMUR', 5),
(7326, 73, 'KABUPATEN TORAJA UTARA', 5),
(7371, 73, 'KOTA MAKASSAR', 5),
(7372, 73, 'KOTA PAREPARE', 5),
(7373, 73, 'KOTA PALOPO', 5),
(7401, 74, 'KABUPATEN BUTON', 5),
(7402, 74, 'KABUPATEN MUNA', 5),
(7403, 74, 'KABUPATEN KONAWE', 5),
(7404, 74, 'KABUPATEN KOLAKA', 5),
(7405, 74, 'KABUPATEN KONAWE SELATAN', 5),
(7406, 74, 'KABUPATEN BOMBANA', 5),
(7407, 74, 'KABUPATEN WAKATOBI', 5),
(7408, 74, 'KABUPATEN KOLAKA UTARA', 5),
(7409, 74, 'KABUPATEN BUTON UTARA', 5),
(7410, 74, 'KABUPATEN KONAWE UTARA', 5),
(7411, 74, 'KABUPATEN KOLAKA TIMUR', 5),
(7412, 74, 'KABUPATEN KONAWE KEPULAUAN', 5),
(7413, 74, 'KABUPATEN MUNA BARAT', 5),
(7414, 74, 'KABUPATEN BUTON TENGAH', 5),
(7415, 74, 'KABUPATEN BUTON SELATAN', 5),
(7471, 74, 'KOTA KENDARI', 5),
(7472, 74, 'KOTA BAUBAU', 5),
(7501, 75, 'KABUPATEN BOALEMO', 5),
(7502, 75, 'KABUPATEN GORONTALO', 5),
(7503, 75, 'KABUPATEN POHUWATO', 5),
(7504, 75, 'KABUPATEN BONE BOLANGO', 5),
(7505, 75, 'KABUPATEN GORONTALO UTARA', 5),
(7571, 75, 'KOTA GORONTALO', 5),
(7601, 76, 'KABUPATEN MAJENE', 5),
(7602, 76, 'KABUPATEN POLEWALI MANDAR', 5),
(7603, 76, 'KABUPATEN MAMASA', 5),
(7604, 76, 'KABUPATEN MAMUJU', 5),
(7605, 76, 'KABUPATEN MAMUJU UTARA', 5),
(7606, 76, 'KABUPATEN MAMUJU TENGAH', 5),
(8101, 81, 'KABUPATEN MALUKU TENGGARA BARAT', 5),
(8102, 81, 'KABUPATEN MALUKU TENGGARA', 5),
(8103, 81, 'KABUPATEN MALUKU TENGAH', 5),
(8104, 81, 'KABUPATEN BURU', 5),
(8105, 81, 'KABUPATEN KEPULAUAN ARU', 5),
(8106, 81, 'KABUPATEN SERAM BAGIAN BARAT', 5),
(8107, 81, 'KABUPATEN SERAM BAGIAN TIMUR', 5),
(8108, 81, 'KABUPATEN MALUKU BARAT DAYA', 5),
(8109, 81, 'KABUPATEN BURU SELATAN', 5),
(8171, 81, 'KOTA AMBON', 5),
(8172, 81, 'KOTA TUAL', 5),
(8201, 82, 'KABUPATEN HALMAHERA BARAT', 5),
(8202, 82, 'KABUPATEN HALMAHERA TENGAH', 5),
(8203, 82, 'KABUPATEN KEPULAUAN SULA', 5),
(8204, 82, 'KABUPATEN HALMAHERA SELATAN', 5),
(8205, 82, 'KABUPATEN HALMAHERA UTARA', 5),
(8206, 82, 'KABUPATEN HALMAHERA TIMUR', 5),
(8207, 82, 'KABUPATEN PULAU MOROTAI', 5),
(8208, 82, 'KABUPATEN PULAU TALIABU', 5),
(8271, 82, 'KOTA TERNATE', 5),
(8272, 82, 'KOTA TIDORE KEPULAUAN', 5),
(9101, 91, 'KABUPATEN FAKFAK', 5),
(9102, 91, 'KABUPATEN KAIMANA', 5),
(9103, 91, 'KABUPATEN TELUK WONDAMA', 5),
(9104, 91, 'KABUPATEN TELUK BINTUNI', 5),
(9105, 91, 'KABUPATEN MANOKWARI', 5),
(9106, 91, 'KABUPATEN SORONG SELATAN', 5),
(9107, 91, 'KABUPATEN SORONG', 5),
(9108, 91, 'KABUPATEN RAJA AMPAT', 5),
(9109, 91, 'KABUPATEN TAMBRAUW', 5),
(9110, 91, 'KABUPATEN MAYBRAT', 5),
(9111, 91, 'KABUPATEN MANOKWARI SELATAN', 5),
(9112, 91, 'KABUPATEN PEGUNUNGAN ARFAK', 5),
(9171, 91, 'KOTA SORONG', 5),
(9401, 94, 'KABUPATEN MERAUKE', 5),
(9402, 94, 'KABUPATEN JAYAWIJAYA', 5),
(9403, 94, 'KABUPATEN JAYAPURA', 5),
(9404, 94, 'KABUPATEN NABIRE', 5),
(9408, 94, 'KABUPATEN KEPULAUAN YAPEN', 5),
(9409, 94, 'KABUPATEN BIAK NUMFOR', 5),
(9410, 94, 'KABUPATEN PANIAI', 5),
(9411, 94, 'KABUPATEN PUNCAK JAYA', 5),
(9412, 94, 'KABUPATEN MIMIKA', 5),
(9413, 94, 'KABUPATEN BOVEN DIGOEL', 5),
(9414, 94, 'KABUPATEN MAPPI', 5),
(9415, 94, 'KABUPATEN ASMAT', 5),
(9416, 94, 'KABUPATEN YAHUKIMO', 5),
(9417, 94, 'KABUPATEN PEGUNUNGAN BINTANG', 5),
(9418, 94, 'KABUPATEN TOLIKARA', 5),
(9419, 94, 'KABUPATEN SARMI', 5),
(9420, 94, 'KABUPATEN KEEROM', 5),
(9426, 94, 'KABUPATEN WAROPEN', 5),
(9427, 94, 'KABUPATEN SUPIORI', 5),
(9428, 94, 'KABUPATEN MAMBERAMO RAYA', 5),
(9429, 94, 'KABUPATEN NDUGA', 5),
(9430, 94, 'KABUPATEN LANNY JAYA', 5),
(9431, 94, 'KABUPATEN MAMBERAMO TENGAH', 5),
(9432, 94, 'KABUPATEN YALIMO', 5),
(9433, 94, 'KABUPATEN PUNCAK', 5),
(9434, 94, 'KABUPATEN DOGIYAI', 5),
(9435, 94, 'KABUPATEN INTAN JAYA', 5),
(9436, 94, 'KABUPATEN DEIYAI', 5),
(9471, 94, 'KOTA JAYAPURA', 5),
(9472, 31, 'cakung', 0),
(9473, 34, 'DI  YOGYAKARTA', 0),
(9474, 33, 'DI YOGYAKARTA', 0),
(9475, 0, 'LEBAK', 0),
(9477, 0, 'KOTA BATAM', 0),
(9478, 21, 'BATAM', 0),
(9479, 32, 'CIANJUR', 0),
(9480, 64, 'KOTA TENGGARONG', 0),
(9481, 14, 'TANJUNG PINANG BARAT', 0),
(9482, 14, 'TANJUNG PINANG', 0),
(9484, 81, 'KABUPATEN KEPULAUAN TANIBAR', 0),
(9486, 65, 'KABUPATEN BULUNGAN', 0),
(9487, 62, 'KABUPATEN BANYUMAS', 0),
(9489, 33, 'KABUPATEN WONOGIRI', 0),
(9490, 14, 'KOTA BATAM', 0),
(9491, 36, 'KABUPATEN RANGKAS BITUNG', 0),
(9492, 35, 'KABUPATEN KLATEN', 0),
(9493, 32, 'KOTA JAKARTA BARAT', 0),
(9494, 72, 'KABUPATEN KONAWE', 0),
(9495, 61, 'KABUPATEN KUBURAYA', 0),
(9496, 96, 'UNITED STATE', 0),
(9497, 96, 'GENT', 0),
(9498, 97, 'GENT', 0),
(9499, 96, 'BELGIA', 0),
(9500, 16, 'OKU TIMUR', 0),
(9501, 98, 'TARRAGONA', 0),
(9502, 61, 'BENGKAYANG', 0);

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
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(11, 'ACEH'),
(12, 'SUMATERA UTARA'),
(13, 'SUMATERA BARAT'),
(14, 'RIAU'),
(15, 'JAMBI'),
(16, 'SUMATERA SELATAN'),
(17, 'BENGKULU'),
(18, 'LAMPUNG'),
(19, 'KEPULAUAN BANGKA BELITUNG'),
(21, 'KEPULAUAN RIAU'),
(31, 'DKI JAKARTA'),
(32, 'JAWA BARAT'),
(33, 'JAWA TENGAH'),
(34, 'DI YOGYAKARTA'),
(35, 'JAWA TIMUR'),
(36, 'BANTEN'),
(51, 'BALI'),
(52, 'NUSA TENGGARA BARAT'),
(53, 'NUSA TENGGARA TIMUR'),
(61, 'KALIMANTAN BARAT'),
(62, 'KALIMANTAN TENGAH'),
(63, 'KALIMANTAN SELATAN'),
(64, 'KALIMANTAN TIMUR'),
(65, 'KALIMANTAN UTARA'),
(71, 'SULAWESI UTARA'),
(72, 'SULAWESI TENGAH'),
(73, 'SULAWESI SELATAN'),
(74, 'SULAWESI TENGGARA'),
(75, 'GORONTALO'),
(76, 'SULAWESI BARAT'),
(81, 'MALUKU'),
(82, 'MALUKU UTARA'),
(91, 'PAPUA BARAT'),
(94, 'PAPUA'),
(95, 'KEPULAUAN SERIBU');

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
(1, 1, 16),
(2, 1, 1),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 2, 1),
(17, 2, 3),
(18, 2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `sidebar` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `judul`, `url`, `icon`, `sidebar`) VALUES
(1, 'Dashboard', 'dashboard', 'home', 'yes'),
(3, 'Lihat Produk', 'lihatproduk', 'shopping-bag', 'yes'),
(4, 'Master Produk', 'masterproduk', 'package', 'no'),
(5, 'Master Kategori', 'kategori', 'folder-minus', 'no'),
(6, 'Master Warna', 'warna', 'circle', 'no'),
(7, 'Master Suplier', 'suplier', 'users', 'no'),
(8, 'Master Provinsi', 'provinsi', '-', 'no'),
(9, 'Master Kota', 'kota', '-', 'no'),
(10, 'Master Kecamatan', 'kecamatan', '-', 'no'),
(11, 'Master Kelurahan', 'kelurahan', '-', 'no'),
(12, 'Data Master', 'masterdata', 'folder-minus', 'yes'),
(13, 'Penjualan', 'penjualan', 'arrow-up-circle', 'yes'),
(14, 'Tagihan Penjualan', 'tagihan', 'credit-card', 'yes'),
(15, 'Laporan', 'laporan', 'activity', 'yes'),
(16, 'Pengaturan', 'pengaturan', 'sliders', 'yes');

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
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

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
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

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
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9503;

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
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
