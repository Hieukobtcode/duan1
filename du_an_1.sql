-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2024 at 01:05 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `du_an_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `Id` int NOT NULL,
  `Tieu_de` varchar(100) DEFAULT NULL,
  `Duong_dan_anh` varchar(255) DEFAULT NULL,
  `vi_tri_hien_thi` int DEFAULT NULL,
  `trang_thai` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`Id`, `Tieu_de`, `Duong_dan_anh`, `vi_tri_hien_thi`, `trang_thai`) VALUES
(5, 'Logo', 'logo.png', NULL, 'Active'),
(12, 'slider3.png', 'slider3.png', NULL, 'Active'),
(13, 'slider2.png', 'slider2.png', NULL, 'Active'),
(14, 'slider1.png', 'slider1.png', NULL, 'Active'),
(15, 'MAX', 'slider_mark.png', NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `binh_luans`
--

CREATE TABLE `binh_luans` (
  `Id` int NOT NULL,
  `San_pham_id` int DEFAULT NULL,
  `Nguoi_dung_id` int DEFAULT NULL,
  `Noi_dung` text,
  `Thoi_gian_tao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_danh_mucs`
--

CREATE TABLE `chi_tiet_danh_mucs` (
  `id` int NOT NULL,
  `id_danh_muc` int DEFAULT NULL,
  `mo_ta` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_danh_mucs`
--

INSERT INTO `chi_tiet_danh_mucs` (`id`, `id_danh_muc`, `mo_ta`) VALUES
(27, 44, 'Áo phông'),
(29, 44, 'Áo nỉ & Áo Hoodie'),
(31, 44, 'Áo khoác nữ'),
(32, 46, 'Áo thun nam'),
(33, 46, 'Áo khoác nam'),
(34, 46, 'Áo len nam'),
(35, 37, 'Áo khoác bé gái'),
(36, 37, 'Áo phông nữ'),
(37, 41, 'Áo len bé trai'),
(38, 41, 'Quần nỉ');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `Id` int NOT NULL,
  `Don_hang_id` int DEFAULT NULL,
  `San_pham_id` int DEFAULT NULL,
  `So_luong` int DEFAULT NULL,
  `Gia_san_pham` decimal(10,2) DEFAULT NULL,
  `Tong_gia_san_pham` decimal(10,2) DEFAULT NULL,
  `chi_tiet_san_pham_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`Id`, `Don_hang_id`, `San_pham_id`, `So_luong`, `Gia_san_pham`, `Tong_gia_san_pham`, `chi_tiet_san_pham_id`) VALUES
(196, 173, 83, 10, '949000.00', '9490000.00', 114);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_san_pham`
--

CREATE TABLE `chi_tiet_san_pham` (
  `id` int NOT NULL,
  `san_pham_id` int DEFAULT NULL,
  `mau_sac_id` int DEFAULT NULL,
  `kich_thuoc_id` int DEFAULT NULL,
  `ma_sku` varchar(50) DEFAULT NULL,
  `ngay_nhap` date DEFAULT NULL,
  `so_luong_ton_kho` int DEFAULT '0',
  `anh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_san_pham`
--

INSERT INTO `chi_tiet_san_pham` (`id`, `san_pham_id`, `mau_sac_id`, `kich_thuoc_id`, `ma_sku`, `ngay_nhap`, `so_luong_ton_kho`, `anh`) VALUES
(26, 40, 19, 3, 'ao_phong_nam1', '2019-11-24', 50, 'Screenshot 2024-11-18 210346.png'),
(27, 40, 4, 4, 'ao_phong_nam_2', '2024-11-21', 50, 'Screenshot 2024-11-18 211132.png'),
(28, 41, 20, 3, 'ao_phong_active_nam_1', '2019-11-24', 30, 'Screenshot 2024-11-18 211807.png'),
(29, 41, 4, 6, 'ao_phong_active_nam_2', '2024-11-21', 30, 'Screenshot 2024-11-18 212305.png'),
(30, 42, 21, 3, 'ao_phong_suong_nam_1', '2019-11-24', 30, 'Screenshot 2024-11-18 212516.png'),
(31, 42, 4, 4, 'ao_phong_suong_nam_2', '2024-11-21', 30, 'Screenshot 2024-11-18 212832.png'),
(32, 43, 26, 5, 'USA_1', '2024-11-21', 30, 'Screenshot 2024-11-18 213121.png'),
(33, 43, 4, 3, 'USA_2', '2019-11-24', 30, 'Screenshot 2024-11-18 213137.png'),
(34, 44, 23, 6, 'co_tron_1', '2024-11-21', 30, 'Screenshot 2024-11-18 214201.png'),
(35, 44, 22, 3, 'co_tron_2', '2019-11-24', 28, 'Screenshot 2024-11-18 214210.png'),
(36, 45, 22, 3, 'dai_tay_1', '2019-11-24', 30, 'Screenshot 2024-11-18 213642.png'),
(37, 45, 19, 6, 'dai_tay_2', '2024-11-21', 30, 'Screenshot 2024-11-18 213707.png'),
(38, 46, 23, 3, 'co_tim_1', '2019-11-24', 30, 'Screenshot 2024-11-19 154204.png'),
(39, 46, 22, 4, 'co_tim_2', '2024-11-21', 30, 'Screenshot 2024-11-19 154230.png'),
(40, 47, 24, 3, 'basic_co_tron_1', '2019-11-24', 30, 'Screenshot 2024-11-19 154717.png'),
(41, 47, 25, 4, 'basic_co_tron_2', '2024-11-21', 30, 'Screenshot 2024-11-19 154741.png'),
(42, 48, 4, 5, 'oversize_1', '2024-11-21', 30, 'Screenshot 2024-11-19 155028.png'),
(43, 48, 19, 3, 'oversize_2', '2019-11-24', 30, 'Screenshot 2024-11-19 155050.png'),
(44, 49, 26, 5, 'ba_lo_1', '2024-11-21', 30, 'Screenshot 2024-11-19 155601.png'),
(45, 49, 27, 3, 'ba_lo_2', '2019-11-24', 30, 'Screenshot 2024-11-19 155624.png'),
(46, 50, 28, 6, 'mickey_1', '2024-11-21', 30, 'Screenshot 2024-11-19 161625.png'),
(47, 50, 4, 3, 'mickey_2', '2019-11-24', 30, 'Screenshot 2024-11-19 161646.png'),
(48, 8, 26, 3, 'nhiet', '2019-11-24', 30, 'Screenshot 2024-11-19 161826.png'),
(49, 53, 4, 3, 'chan_bong_1', '2019-11-24', 30, 'Screenshot 2024-11-19 162122.png'),
(50, 53, 20, 6, 'chan_bong_2', '2024-11-21', 30, 'Screenshot 2024-11-19 162146.png'),
(51, 54, 20, 5, 'khoac_ni_1', '2024-11-21', 30, 'Screenshot 2024-11-19 163049.png'),
(52, 54, 4, 3, 'khoac_ni_2', '2019-11-24', 30, 'Screenshot 2024-11-19 163027.png'),
(57, 55, 20, 4, 'khoac_gio_1', '2024-11-21', 30, 'Screenshot 2024-11-19 163241.png'),
(58, 55, 22, 3, 'khoac_gio_2', '2019-11-24', 30, 'Screenshot 2024-11-19 163254.png'),
(59, 56, 4, 3, 'bomber_1', '2019-11-24', 30, 'Screenshot 2024-11-19 163643.png'),
(60, 56, 19, 5, 'bomber_2', '2024-11-21', 30, 'Screenshot 2024-11-19 163747.png'),
(61, 57, 20, 3, 'gilet_1', '2019-11-24', 30, 'Screenshot 2024-11-19 164605.png'),
(62, 57, 4, 3, 'gilet_2', '2019-11-24', 30, 'Screenshot 2024-11-19 164622.png'),
(63, 58, 22, 3, 'blazer_1', '2019-11-24', 30, 'Screenshot 2024-11-19 171114.png'),
(64, 58, 20, 6, 'blazer_2', '2024-11-21', 30, 'Screenshot 2024-11-19 171056.png'),
(65, 59, 19, 4, 'unisex_1', '2024-11-21', 30, 'Screenshot 2024-11-19 171821.png'),
(66, 59, 4, 3, 'unisex_2', '2019-11-24', 30, 'Screenshot 2024-11-19 171834.png'),
(67, 60, 4, 3, 'long_vu_1', '2019-11-24', 30, 'Screenshot 2024-11-19 171957.png'),
(68, 60, 26, 6, 'long_vu_2', '2024-11-21', 30, 'Screenshot 2024-11-19 172013.png'),
(69, 61, 22, 3, 'cardigan_1', '2019-11-24', 30, 'Screenshot 2024-11-19 172233.png'),
(70, 61, 4, 5, 'cardigan_2', '2024-11-21', 30, 'Screenshot 2024-11-19 172256.png'),
(71, 61, 20, 4, 'cardigan_3', '2024-11-21', 30, 'Screenshot 2024-11-19 172308.png'),
(72, 62, 4, 3, 'ni_mu_1', '2019-11-24', 30, 'Screenshot 2024-11-19 172755.png'),
(73, 62, 20, 4, 'ni_mu_2', '2024-11-21', 30, 'Screenshot 2024-11-19 172802.png'),
(74, 63, 22, 5, 'len_nam_1', '2024-11-21', 30, 'Screenshot 2024-11-19 173210.png'),
(75, 63, 4, 3, 'len_nam_2', '2019-11-24', 30, 'Screenshot 2024-11-19 173231.png'),
(76, 64, 4, 3, 'len_gilet_1', '2019-11-24', 30, 'Screenshot 2024-11-19 173615.png'),
(77, 64, 20, 6, 'len_gilet_2', '2024-11-21', 30, 'Screenshot 2024-11-19 173628.png'),
(78, 65, 19, 5, 'len_polo_1', '2024-11-21', 30, 'Screenshot 2024-11-19 173940.png'),
(79, 65, 22, 3, 'len_polo_2', '2019-11-24', 30, 'Screenshot 2024-11-19 173946.png'),
(80, 65, 20, 3, 'len_co_tron_1', '2019-11-24', 30, 'Screenshot 2024-11-19 174248.png'),
(82, 66, 4, 4, 'len_co_tron_2', '2024-11-21', 30, 'Screenshot 2024-11-19 174258.png'),
(83, 66, 20, 3, 'len_co_tron_3', '2019-11-24', 30, 'Screenshot 2024-11-19 174248.png'),
(84, 67, 22, 3, 'long_cuu_1', '2019-11-24', 30, 'Screenshot 2024-11-19 174537.png'),
(85, 67, 4, 6, 'long_cuu_2', '2024-11-21', 30, 'Screenshot 2024-11-19 174545.png'),
(86, 68, 19, 3, 'len_polo_dai_1', '2019-11-24', 30, 'Screenshot 2024-11-19 174859.png'),
(87, 68, 4, 4, 'len_polo_dai_2', '2024-11-21', 30, 'Screenshot 2024-11-19 174908.png'),
(88, 69, 20, 3, 'len_det', '2019-11-24', 30, 'Screenshot 2024-11-19 175205.png'),
(89, 70, 29, 4, 'len_dang_om_1', '2024-11-21', 24, 'Screenshot 2024-11-19 175416.png'),
(90, 70, 20, 3, 'len_dang_om_2', '2019-11-24', 32, 'Screenshot 2024-11-19 175423.png'),
(91, 71, 4, 3, 'gilet_co_tim', '2019-11-24', 60, 'Screenshot 2024-11-19 175825.png'),
(92, 72, 22, 3, 'phong_nu_1', '2019-11-24', 81, 'Screenshot 2024-11-19 180226.png'),
(93, 72, 4, 6, 'phong_nu_2', '2024-11-21', 29, 'Screenshot 2024-11-19 180231.png'),
(94, 73, 26, 3, 'body_nu_1', '2019-11-24', 30, 'Screenshot 2024-11-19 180616.png'),
(95, 73, 4, 4, 'body_nu_2', '2024-11-21', 26, 'Screenshot 2024-11-19 180622.png'),
(96, 74, 25, 5, 'dai_om_1', '2024-11-21', 22, 'Screenshot 2024-11-19 200820.png'),
(97, 74, 19, 3, 'dai_om_2', '2019-11-24', 29, 'Screenshot 2024-11-19 200827.png'),
(98, 75, 4, 3, 'co_vuong_1', '2019-11-24', 30, 'Screenshot 2024-11-19 201117.png'),
(99, 75, 25, 6, 'co_vuong_2', '2024-11-21', 30, 'Screenshot 2024-11-19 201123.png'),
(100, 76, 26, 3, 'USA_nu_1', '2019-11-24', 27, 'Screenshot 2024-11-19 201428.png'),
(101, 76, 4, 6, 'USA_nu_2', '2024-11-23', 30, 'Screenshot 2024-11-19 201434.png'),
(102, 77, 30, 3, 'active_nu_1', '2019-11-24', 19, 'Screenshot 2024-11-19 201653.png'),
(103, 77, 29, 5, 'active_nu_2', '2024-11-22', 83, 'Screenshot 2024-11-19 201659.png'),
(104, 78, 24, 4, 'phoi_khoa_1', '2024-11-21', 10, 'Screenshot 2024-11-19 202147.png'),
(105, 78, 20, 3, 'phoi_khoa_2', '2019-11-24', 21, 'Screenshot 2024-11-19 202151.png'),
(106, 79, 4, 3, 'babytee_1', '2019-11-24', 30, 'Screenshot 2024-11-19 202544.png'),
(107, 79, 24, 6, 'babytee_2', '2024-11-21', 30, 'Screenshot 2024-11-19 202549.png'),
(108, 80, 4, 3, 'crotop_1', '2019-11-24', 30, 'Screenshot 2024-11-19 203102.png'),
(109, 80, 22, 4, 'crotop_2', '2024-11-21', 28, 'Screenshot 2024-11-19 203107.png'),
(110, 81, 19, 3, '3_lo_1', '2019-11-24', 31, 'Screenshot 2024-11-19 203319.png'),
(111, 81, 4, 4, '3_lo_2', '2024-11-21', 31, 'Screenshot 2024-11-19 203325.png'),
(112, 82, 4, 3, 'ni_nu_1', '2019-11-24', 13, 'Screenshot 2024-11-19 203902.png'),
(113, 82, 26, 5, 'ni_nu_2', '2024-11-21', 25, 'Screenshot 2024-11-19 203907.png'),
(114, 83, 19, 3, 'bo_nu_1', '2024-12-06', -5, 'Screenshot 2024-11-19 204055.png'),
(115, 83, 25, 3, 'bo_nu_2', '2024-11-21', 19, 'Screenshot 2024-11-19 204101.png'),
(116, 84, 19, 3, 'hoodie_nu', '2019-11-24', 30, 'Screenshot 2024-11-19 204249.png'),
(117, 85, 30, 3, 'bo_1', '2019-11-24', 31, 'Screenshot 2024-11-19 204545.png'),
(118, 85, 31, 5, 'bo_2', '2024-11-21', 55, 'Screenshot 2024-11-19 204550.png'),
(119, 86, 31, 3, 'ni_hinh_1', '2019-11-24', 2, 'Screenshot 2024-11-19 204818.png'),
(120, 86, 4, 4, 'ni_hinh_2', '2024-11-21', 30, 'Screenshot 2024-11-19 204824.png'),
(121, 87, 22, 3, 'ni_basic_1', '2024-11-19', 30, 'Screenshot 2024-11-19 205218.png'),
(122, 87, 20, 6, 'ni_basic_2', '2024-11-21', 30, 'Screenshot 2024-11-19 205223.png'),
(123, 88, 20, 3, 'basic_tron', '2019-11-24', 30, 'Screenshot 2024-11-19 205445.png'),
(124, 89, 31, 3, 'mu_rong_1', '2019-11-24', 30, 'Screenshot 2024-11-19 205722.png'),
(125, 89, 4, 5, 'mu_rong_2', '2024-11-21', 30, 'Screenshot 2024-11-19 205728.png'),
(126, 90, 4, 3, 'uns_1', '2019-11-24', 30, 'Screenshot 2024-11-19 205954.png'),
(127, 90, 20, 4, 'uns_2', '2024-11-21', 30, 'Screenshot 2024-11-19 205959.png'),
(128, 91, 4, 3, 'in_hinh', '2019-11-24', 30, 'Screenshot 2024-11-19 210228.png'),
(129, 92, 4, 3, 'bong_nu_1', '2019-11-24', 30, 'Screenshot 2024-11-19 211417.png'),
(130, 92, 19, 5, 'bong_nu_2', '2024-11-21', 30, 'Screenshot 2024-11-19 211425.png'),
(131, 94, 4, 3, 'khoac_cao_1', '2019-11-24', 30, 'Screenshot 2024-11-19 212106.png'),
(132, 95, 31, 3, 'mu_1', '2019-11-24', 30, 'Screenshot 2024-11-19 212418.png'),
(133, 95, 22, 5, 'mu_2', '2024-11-21', 30, 'Screenshot 2024-11-19 212425.png'),
(134, 96, 4, 3, 'cotton_1', '2019-11-24', 30, 'Screenshot 2024-11-19 212738.png'),
(135, 96, 25, 5, 'cotton_2', '2024-11-21', 30, 'Screenshot 2024-11-19 212744.png'),
(136, 97, 22, 3, 'la_co', '2019-11-24', 27, 'Screenshot 2024-11-19 220908.png'),
(137, 98, 20, 3, 'khoac_gilet_1', '2019-11-24', 30, 'Screenshot 2024-11-19 221107.png'),
(138, 98, 22, 4, 'khoac_gilet_2', '2024-11-21', 30, 'Screenshot 2024-11-19 221112.png'),
(139, 99, 4, 3, 'crg_nu_1', '2019-11-24', 30, 'Screenshot 2024-11-19 221424.png'),
(140, 99, 31, 4, 'crg_nu_2', '2024-11-21', 30, 'Screenshot 2024-11-19 221431.png'),
(141, 100, 4, 3, 'da_1', '2019-11-24', 30, 'Screenshot 2024-11-19 221643.png'),
(142, 100, 19, 5, 'da_2', '2024-11-21', 30, 'Screenshot 2024-11-19 221650.png'),
(143, 101, 19, 3, 'long_nu', '2019-11-24', 30, 'Screenshot 2024-11-19 222014.png'),
(144, 102, 4, 3, 'uni_nu', '2019-11-24', 30, 'Screenshot 2024-11-19 222108.png'),
(147, 104, 4, 3, 'ao_khoác_1', '2019-11-24', 30, 'Screenshot 2024-11-19 231008.png'),
(148, 104, 19, 4, 'ao_khoác_2', '2019-11-24', 43, 'Screenshot 2024-11-19 231358.png'),
(149, 105, 19, 4, 'ao_khoác_3', '2019-11-24', 57, 'Screenshot 2024-11-19 231512.png'),
(150, 105, 4, 3, 'ao_khoác_4', '2019-11-24', 79, 'Screenshot 2024-11-19 231802.png'),
(151, 106, 25, 3, 'ao_khoác_5', '2020-11-24', 12, 'Screenshot 2024-11-20 090114.png'),
(152, 106, 4, 4, 'ao_khoác_6', '2020-11-24', 54, 'Screenshot 2024-11-20 090304.png'),
(153, 107, 19, 3, 'ao_khoác_8', '2020-11-24', 44, 'Screenshot 2024-11-20 091209.png'),
(156, 107, 32, 6, 'ao_khoác_9', '2020-11-24', 55, ''),
(157, 108, 28, 3, 'ao_khoác_10', '2020-11-24', 67, 'Screenshot 2024-11-20 091828.png'),
(158, 108, 32, 4, 'ao_khoác_11', '2020-11-24', 45, 'Screenshot 2024-11-20 091912.png'),
(159, 109, 28, 3, 'ao_khoác_12', '2020-11-24', 44, 'Screenshot 2024-11-20 092339.png'),
(160, 109, 6, 4, 'ao_khoác_13', '2020-11-24', 66, 'Screenshot 2024-11-20 092439.png'),
(161, 110, 32, 3, 'ao_phong_1', '2020-11-24', 79, 'Screenshot 2024-11-20 092853.png'),
(162, 110, 28, 4, 'ao_phong_2', '2020-11-24', 33, 'Screenshot 2024-11-20 092947.png'),
(163, 111, 32, 3, 'ao_phong_3', '2020-11-24', 55, 'Screenshot 2024-11-20 093150.png'),
(164, 111, 28, 4, 'ao_phong_4', '2020-11-24', 56, 'Screenshot 2024-11-20 093251.png'),
(165, 112, 32, 3, 'ao_phong_5', '2020-11-24', 65, 'Screenshot 2024-11-20 093504.png'),
(166, 112, 28, 4, 'ao_phong_6', '2020-11-24', 55, 'Screenshot 2024-11-20 093608.png'),
(167, 113, 32, 3, 'ao_phong_7', '2020-11-24', 23, 'Screenshot 2024-11-20 093805.png'),
(169, 113, 20, 4, 'ao_phong_8', '2020-11-24', 19, 'Screenshot 2024-11-20 093927.png'),
(170, 114, 22, 3, 'ao_len_1', '2020-11-24', 45, 'Screenshot 2024-11-20 094256.png'),
(171, 114, 31, 4, 'ao_len_2', '2020-11-24', 55, 'Screenshot 2024-11-20 094352.png'),
(172, 115, 22, 3, 'ao_len_3', '2020-11-24', 66, 'Screenshot 2024-11-20 094514.png'),
(173, 115, 31, 4, 'ao_len_4', '2020-11-24', 56, 'Screenshot 2024-11-20 094458.png'),
(174, 116, 4, 3, 'ao_len_5', '2020-11-24', 78, 'Screenshot 2024-11-20 094804.png'),
(175, 116, 28, 4, 'ao_len_6', '2020-11-24', -2, 'Screenshot 2024-11-20 094821.png'),
(176, 117, 28, 3, 'ao_len_7', '2020-11-24', 77, 'Screenshot 2024-11-20 095152.png'),
(178, 117, 24, 4, 'ao_len_8', '2020-11-24', 54, 'Screenshot 2024-11-20 095406.png'),
(180, 118, 4, 3, 'ao_len_9', '2020-11-24', 34, 'Screenshot 2024-11-20 095552.png'),
(181, 118, 31, 4, 'ao_len_10', '2020-11-24', 89, 'Screenshot 2024-11-20 095534.png'),
(182, 120, 4, 3, 'quân_ni', '2020-11-24', 66, 'Screenshot 2024-11-20 100742.png'),
(183, 120, 6, 4, 'quân_ni_1', '2020-11-24', 76, 'Screenshot 2024-11-20 100802.png'),
(184, 121, 4, 3, 'quân_ni_2', '2020-11-24', 87, 'Screenshot 2024-11-20 101148.png'),
(185, 121, 19, 4, 'quân_ni_4', '2020-11-24', 78, 'Screenshot 2024-11-20 101135.png'),
(186, 123, 4, 3, 'quân_ni_5', '2020-11-24', 5, 'Screenshot 2024-11-20 101436.png'),
(187, 123, 28, 4, 'quân_ni_6', '2020-11-24', 23, 'Screenshot 2024-11-20 101454.png'),
(188, 124, 32, 3, 'quân_ni_7', '2024-12-03', 68, 'Screenshot 2024-11-20 101747.png'),
(189, 124, 4, 4, 'quân_ni_9', '2020-11-24', 77, 'Screenshot 2024-11-20 101805.png'),
(190, 127, 4, 3, 'quân_ni_8', '2020-11-24', 100, 'Screenshot 2024-11-20 102100.png'),
(192, 127, 28, 4, 'quân_ni_10', '2020-11-24', 6, 'Screenshot 2024-11-20 102020.png'),
(195, 78, 24, 3, 'phoi_khoa_3', '2024-11-24', 19, 'Screenshot 2024-11-19 202147.png'),
(196, 78, 20, 4, ' cổ cao', '2024-11-24', 22, 'Screenshot 2024-11-19 202151.png'),
(197, 40, 19, 4, 'ao_phong_00', '2025-11-24', 59, 'Screenshot 2024-11-18 210346.png'),
(198, 40, 4, 3, 'ao_phong_11', '2025-11-24', 55, 'Screenshot 2024-11-18 211132.png'),
(199, 41, 20, 6, 'ao_phong_88', '2024-11-25', 66, 'Screenshot 2024-11-18 211807.png'),
(200, 41, 4, 3, 'ao_phong_12', '2025-11-24', 77, 'Screenshot 2024-11-18 212305.png'),
(201, 42, 21, 4, 'ao_phong_13', '2025-11-24', 78, 'Screenshot 2024-11-18 212516.png'),
(202, 42, 4, 3, 'ao_phong_14', '2024-11-25', 55, 'Screenshot 2024-11-18 212832.png'),
(203, 43, 23, 3, 'ao_phong_70', '2025-11-24', 88, 'Screenshot 2024-11-18 213121.png'),
(204, 43, 4, 5, 'ao_phong_75', '2025-11-24', 88, 'Screenshot 2024-11-18 213137.png'),
(206, 44, 22, 6, 'ao_phong_99', '2025-11-24', 56, 'Screenshot 2024-11-18 214210.png'),
(208, 44, 23, 3, 'ao_phong_01', '2025-11-24', 88, 'Screenshot 2024-11-18 214201.png'),
(209, 76, 26, 6, 'ao_phong_02', '2025-11-24', 44, 'Screenshot 2024-11-19 201428.png'),
(210, 76, 4, 3, 'ao_phong_03', '2025-11-24', 55, 'Screenshot 2024-11-19 201434.png'),
(211, 77, 30, 5, 'ao_len_80', '2025-11-24', 41, 'Screenshot 2024-11-19 201653.png'),
(212, 77, 29, 3, 'quân_ni_65', '2025-11-24', 76, 'Screenshot 2024-11-19 201659.png'),
(213, 79, 4, 6, 'quân_ni_63', '2025-11-24', 76, 'Screenshot 2024-11-19 202544.png'),
(214, 79, 24, 3, 'ao_len_86', '2025-11-24', 28, 'Screenshot 2024-11-19 202549.png'),
(215, 80, 4, 4, 'ao_len_81', '2025-11-24', 65, 'Screenshot 2024-11-19 203102.png'),
(216, 80, 22, 3, 'quân_ni_91', '2025-11-24', 0, 'Screenshot 2024-11-19 203107.png'),
(217, 81, 19, 4, 'ao_phong_009', '2025-11-24', 91, 'Screenshot 2024-11-19 203319.png'),
(218, 81, 4, 3, 'quân_ni_95', '2025-11-24', 77, 'Screenshot 2024-11-19 203325.png'),
(219, 82, 4, 5, 'quân_ni_96', '2025-11-24', 87, 'Screenshot 2024-11-19 203902.png'),
(220, 82, 26, 3, 'quân_ni_94', '2025-11-24', 58, 'Screenshot 2024-11-19 203907.png');

-- --------------------------------------------------------

--
-- Table structure for table `danh_gias`
--

CREATE TABLE `danh_gias` (
  `Id` int NOT NULL,
  `San_pham_id` int DEFAULT NULL,
  `Nguoi_dung_id` int DEFAULT NULL,
  `So_diem_danh_gia` int DEFAULT NULL,
  `Noi_dung` text,
  `Thoi_gian_tao` datetime DEFAULT NULL,
  `trang_thai` enum('Active','Inactive') DEFAULT 'Active',
  `chi_tiet_san_pham_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `Id` int NOT NULL,
  `Ten_danh_muc` varchar(100) NOT NULL,
  `Ngay_tao` date DEFAULT NULL,
  `Ngay_cap_nhat` date DEFAULT NULL,
  `Mo_ta` text,
  `trang_thai` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `danh_mucs`
--

INSERT INTO `danh_mucs` (`Id`, `Ten_danh_muc`, `Ngay_tao`, `Ngay_cap_nhat`, `Mo_ta`, `trang_thai`) VALUES
(37, 'Bé gái', '2024-11-08', '2024-11-11', 'Đồ cho bé giá', 'Active'),
(41, 'Bé trai', '2024-11-08', '2024-11-11', 'Đồ cho bé trai', 'Active'),
(44, 'Nữ', '2024-11-09', '2024-11-11', 'Đồ cho nữ', 'Active'),
(46, 'Nam', '2024-11-10', '2024-11-12', 'Đồ cho nam', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `Id` int NOT NULL,
  `Nguoi_dung_id` int DEFAULT NULL,
  `ma_don_hang` varchar(50) DEFAULT NULL,
  `ten_nguoi_nhan` varchar(100) DEFAULT NULL,
  `so_dien_thoai_nguoi_nhan` varchar(15) DEFAULT NULL,
  `email_nguoi_nhan` varchar(100) DEFAULT NULL,
  `dia_chi_nguoi_nhan` text,
  `ghi_chu` text,
  `tong_tien` decimal(15,2) DEFAULT NULL,
  `thanh_toan` enum('Đã thanh toán','Chưa thanh toán') DEFAULT 'Chưa thanh toán',
  `phuong_thuc_thanh_toan` enum('Tiền mặt','Chuyển khoản') DEFAULT 'Tiền mặt',
  `ngay_dat` datetime DEFAULT CURRENT_TIMESTAMP,
  `trang_thai_don_hang_id` int DEFAULT NULL,
  `khuyen_mai_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`Id`, `Nguoi_dung_id`, `ma_don_hang`, `ten_nguoi_nhan`, `so_dien_thoai_nguoi_nhan`, `email_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ghi_chu`, `tong_tien`, `thanh_toan`, `phuong_thuc_thanh_toan`, `ngay_dat`, `trang_thai_don_hang_id`, `khuyen_mai_id`) VALUES
(173, 16, 'DH-6514', 'ne hieuss', '0862319515', 'hieuthethoi@gmail.com', 'Quarmng nih', '', '9520000.00', 'Chưa thanh toán', 'Tiền mặt', '2024-12-06 13:04:38', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `Id` int NOT NULL,
  `Nguoi_dung_id` int DEFAULT NULL,
  `San_pham_id` int DEFAULT NULL,
  `So_luong` int DEFAULT '1',
  `chi_tiet_san_pham_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gio_hangs`
--

INSERT INTO `gio_hangs` (`Id`, `Nguoi_dung_id`, `San_pham_id`, `So_luong`, `chi_tiet_san_pham_id`) VALUES
(179, 16, 83, 10, 114);

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh_san_phams`
--

CREATE TABLE `hinh_anh_san_phams` (
  `id` int NOT NULL,
  `chi_tiet_san_pham_id` int DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `mo_ta` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khuyen_mais`
--

CREATE TABLE `khuyen_mais` (
  `Id` int NOT NULL,
  `Ma_khuyen_mai` varchar(50) DEFAULT NULL,
  `Loai_giam_gia` enum('percent','amount','freeShip') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Gia_tri_giam_gia` decimal(10,0) DEFAULT NULL,
  `Ngay_bat_dau` timestamp NULL DEFAULT NULL,
  `Ngay_ket_thuc` timestamp NULL DEFAULT NULL,
  `Trang_thai` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Active',
  `mo_ta` text,
  `ten_khuyen_mai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `khuyen_mais`
--

INSERT INTO `khuyen_mais` (`Id`, `Ma_khuyen_mai`, `Loai_giam_gia`, `Gia_tri_giam_gia`, `Ngay_bat_dau`, `Ngay_ket_thuc`, `Trang_thai`, `mo_ta`, `ten_khuyen_mai`) VALUES
(2, 'giam15%', 'percent', '5', '2024-11-09 17:00:00', '2024-11-27 17:00:00', 'Active', 'Giảm 15%', 'Giảm 15'),
(5, 'Giam20k', 'amount', '20000', '2024-11-15 09:36:00', '2024-11-12 06:34:00', 'Active', 'Giảm 20 K', 'Không giảm giá');

-- --------------------------------------------------------

--
-- Table structure for table `kich_thuocs`
--

CREATE TABLE `kich_thuocs` (
  `id` int NOT NULL,
  `ten_kich_thuoc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kich_thuocs`
--

INSERT INTO `kich_thuocs` (`id`, `ten_kich_thuoc`) VALUES
(3, 'M'),
(4, 'L'),
(5, 'XL'),
(6, 'S');

-- --------------------------------------------------------

--
-- Table structure for table `lien_hes`
--

CREATE TABLE `lien_hes` (
  `Id` int NOT NULL,
  `Ten` varchar(255) NOT NULL,
  `Nguoi_dung_id` int DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Noi_dung` text,
  `Thoi_gian_gui_lien_he` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Trang_thai` enum('New','Processed') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mau_sacs`
--

CREATE TABLE `mau_sacs` (
  `id` int NOT NULL,
  `ten_mau` varchar(50) NOT NULL,
  `ma_mau` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mau_sacs`
--

INSERT INTO `mau_sacs` (`id`, `ten_mau`, `ma_mau`) VALUES
(4, 'Đen', '#000000'),
(5, 'Xanh', '#0000FF'),
(6, 'Cam', '#FFA500'),
(19, 'Be', '#F5F5DC'),
(20, 'Xám sáng', '#D3D3D3'),
(21, 'Xanh rêu', '#808000'),
(22, 'Xanh than', '#000080'),
(23, 'Trắng', '#FFFFFF'),
(24, 'Vàng nhạt', '#FFFF99'),
(25, 'Nâu', '#8B4513'),
(26, 'Xám đậm', '#A9A9A9'),
(27, 'Xanh lam', '#0000FF'),
(28, 'Xanh nhạt', '#17a2b8'),
(29, 'Đỏ mận', '#800020'),
(30, 'Xanh lục lam', '#40E0D0'),
(31, 'Đỏ', '#FF0000'),
(32, 'hồng', '#FFC0CB');

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dungs`
--

CREATE TABLE `nguoi_dungs` (
  `Id` int NOT NULL,
  `Ten_dang_nhap` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Mat_khau` varchar(255) NOT NULL,
  `Thoi_gian_tao` date DEFAULT NULL,
  `Ho_ten` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Anh_dai_dien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `So_dien_thoai` varchar(20) DEFAULT NULL,
  `Dia_chi` text,
  `Ngay_thang_nam_sinh` date DEFAULT NULL,
  `Vai_tro` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'user',
  `Trang_thai` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Active',
  `gioi_tinh` enum('Nam','Nữ','Khác') DEFAULT 'Khác'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nguoi_dungs`
--

INSERT INTO `nguoi_dungs` (`Id`, `Ten_dang_nhap`, `Email`, `Mat_khau`, `Thoi_gian_tao`, `Ho_ten`, `Anh_dai_dien`, `So_dien_thoai`, `Dia_chi`, `Ngay_thang_nam_sinh`, `Vai_tro`, `Trang_thai`, `gioi_tinh`) VALUES
(4, 'Hiếu12455511', 'lhieu9254@gmail.com', '123456', '2024-11-08', 'Lee hieues', 'xlsx.xlsx', '0862319515', 'Quảng Ninh', '2024-11-22', 'admin', 'Active', 'Nam'),
(6, 'Hiếu124', 'hieu2@gmail.com', '$2y$10$VbmsgW1hOyDQw52Ktfq7Xe4pzk8F/3sZNX.XBj7guFfgzz2duAzR6', '2024-11-08', NULL, NULL, '0978910788', NULL, NULL, 'admin', 'Active', 'Khác'),
(9, 'chuuoiiiiiiii', 'cococo#124', '$2y$10$8gmHiTdxfcr4/XnwH0Qd0OmU0OvkYjWMBp6TKaeg5JpWnc8kiVYCW', '2024-11-08', NULL, NULL, '0862319515', NULL, NULL, 'admin', 'Active', 'Khác'),
(10, 'cococo', 'lth@gmail.com', '$2y$10$e7nNe1j.ViInc1HpBFr.YOiVc1r0Op8KTza5Qbh6A6nRsRBGf1zFO', '2024-11-14', 'Chuối', NULL, '012345677', NULL, NULL, 'user', 'Active', 'Khác'),
(11, 'aaaa', 'aa@gmail.com', '$2y$10$5WTVseO6NJNw9E2JL8JoPOqiSWTEtGz3MPd1oGVuCx4nYQA9BPN5u', NULL, NULL, NULL, '0987654321', NULL, NULL, 'admin', 'Active', 'Khác'),
(12, 'hieu@123', 'hieu2123@gmail.com', '$2y$10$51iyQsbMrxQTpIJrDTjRBOjbiKYMOlgpVbV/2sGLNevBBEn8vn3hG', NULL, NULL, NULL, '09867455555', NULL, NULL, 'user', 'Active', 'Khác'),
(13, '1222222', 'hieu@789gmail.com', '$2y$10$gSfvolLnJdTvtayzqrKj3.S5kyUr4Xb5RWAk47EQU1ZZitavZX/Ba', NULL, NULL, NULL, '123456789', NULL, NULL, 'user', 'Active', 'Khác'),
(14, 'ahieu', 'ahieu@gmail.com', '$2y$10$jQXLyd9ahbZGB8BoQJkGN.xUYCl1bSsLTKx6lPh2WI.fnXSgy.T8W', NULL, 'Hiếu', 'women-7341444.jpg', '0978919999', 'haf noi', '2024-12-05', 'user', 'Active', 'Nữ'),
(16, 'hieuthethoi', 'hieuthethoi@gmail.com', '$2y$10$AlCXLNnLd9fJfF0/VHrK0OW6h8UqtfTymxGUkzecHYR4LZGfxgosq', NULL, 'ne hieuss', 'danh_muc_2.png', '0862319515', 'Quarmng nih', '2024-11-10', 'user', 'Active', 'Nam'),
(18, 'ahieu000', 'ahieu000@gmail.com', '$2y$10$FOq4icilTNuaK3NYfMCa0ugOH2oMr4dNVq1o/RgWEp6OzG7dH2JpO', NULL, NULL, NULL, '111111111', NULL, NULL, 'user', 'Active', 'Khác'),
(19, '111', '111@gmail.com', '$2y$10$N1ONhQS1uWWf2w9zWCi52.u3dudyaCGKDuXcErDqj/YG464/ERTYi', NULL, NULL, NULL, '111', NULL, NULL, 'user', 'Active', 'Khác'),
(20, 'hi', 'hi@gmail.com', '$2y$10$jEl64UIHu9RsCbZwsi3GKeGTwBNZ2gqaKf032JV/j34ZAbp.wuldq', NULL, NULL, NULL, '1111111', NULL, NULL, 'user', 'Active', 'Khác'),
(21, 'vvvvv', 'v@gmail.com', '$2y$10$vEpoPdhWruWkGXWKLrjmbOECGDHpdF3HKi29cy19XSUtB/EzV/JD.', NULL, NULL, NULL, '123', NULL, NULL, 'user', 'Active', 'Khác');

-- --------------------------------------------------------

--
-- Table structure for table `noi_dungs`
--

CREATE TABLE `noi_dungs` (
  `Id` int NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sdt_lien_he` varchar(15) DEFAULT NULL,
  `link_fb` varchar(255) DEFAULT NULL,
  `link_ig` varchar(255) DEFAULT NULL,
  `dia_chi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `noi_dungs`
--

INSERT INTO `noi_dungs` (`Id`, `logo`, `email`, `sdt_lien_he`, `link_fb`, `link_ig`, `dia_chi`) VALUES
(1, 'logo.png', 'lhieu9254@gmaila.com', '0862319515', 'https://www.facebook.com/profile.php?id=100087437105440', 'https://www.instagram.com/hhiieu2005/', 'Thành phố Hà Nội - Việt Nam');

-- --------------------------------------------------------

--
-- Table structure for table `san_phams`
--

CREATE TABLE `san_phams` (
  `Id` int NOT NULL,
  `Ma_san_pham` varchar(50) DEFAULT NULL,
  `Ten_san_pham` varchar(100) NOT NULL,
  `Mo_ta` text,
  `Trang_thai` enum('Active','Inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Active',
  `luot_xem` int DEFAULT '0',
  `khuyen_mai_id` int DEFAULT NULL,
  `chi_tiet_danh_muc_id` int DEFAULT NULL,
  `gia_nhap` decimal(10,2) NOT NULL DEFAULT '0.00',
  `gia_ban` decimal(10,2) NOT NULL DEFAULT '0.00',
  `gia_khuyen_mai` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `san_phams`
--

INSERT INTO `san_phams` (`Id`, `Ma_san_pham`, `Ten_san_pham`, `Mo_ta`, `Trang_thai`, `luot_xem`, `khuyen_mai_id`, `chi_tiet_danh_muc_id`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`) VALUES
(8, 'SP0', 'Áo giữ nhiệt', 'Áo chống nắng', 'Active', 3, 2, 27, '199000.00', '299000.00', '249000.00'),
(40, 'SP01', 'Áo phông nam', 'Áo phông nam.\r\n57% cotton 38% polyester 5% spandex.\r\nGiặt máy ở chế độ nhẹ, nhiệt độ thường.\r\nKhông sử dụng hóa chất tẩy có chứa Clo.\r\nPhơi trong bóng mát.\r\nSấy khô ở nhiệt độ thấp.\r\nLà ở nhiệt độ thấp 110 độ C.\r\nGiặt với sản phẩm cùng màu.\r\nKhông là lên chi tiết trang trí.', 'Active', 0, 2, 32, '80000.00', '149000.00', '120000.00'),
(41, 'SP02', 'Áo phông active nam', 'Áo active nam dài tay thiết kế vừa vặn, thái mái cho người mặc. Điểm nhấn đồ họa trước ngực và sau gáy.\r\n84% nylon 16% spandex.\r\nGiặt máy ở nhiệt độ thường,không ngâm.\r\nKhông sử dụng hóa chất tẩy có chứa Clo.\r\nPhơi ngay khi giặt xong.\r\nKhông sử dụng máy sấy.\r\nLà ở nhiệt độ thấp 110 độ C.\r\nGiặt với sản phẩm cùng màu.\r\nKhông là lên chi tiết trang trí.', 'Active', 0, 2, 32, '289000.00', '399000.00', '349000.00'),
(42, 'SP03', 'Áo phông nam dáng suông in chữ', 'Áo phông nam basic dáng regular cổ tròn, có chi tiết đồ họa là điểm nhấn trên sản phẩm.\r\n60% cotton 40% polyester.\r\nGiặt máy ở chế độ nhẹ, nhiệt độ thường.\r\nKhông sử dụng hóa chất tẩy có chứa Clo.\r\nPhơi trong bóng mát.\r\nSấy khô ở nhiệt độ thấp.\r\nLà ở nhiệt độ thấp 110 độ C.\r\nGiặt với sản phẩm cùng màu.\r\nKhông là lên chi tiết trang trí.', 'Active', 3, 2, 32, '200000.00', '299000.00', '249000.00'),
(43, 'SP04', 'Áo phông nam cotton USA có hình in', 'Áo phông nam dáng regular với đồ họa chủ đề Marvel.\r\n100% cotton.\r\nGiặt máy ở chế độ nhẹ, nhiệt độ thường.\r\nKhông sử dụng hóa chất tẩy có chứa Clo.\r\nPhơi trong bóng mát.\r\nSấy khô ở nhiệt độ thấp.\r\nLà ở nhiệt độ thấp 110 độ C.\r\nGiặt với sản phẩm cùng màu.\r\nKhông là lên chi tiết trang trí.', 'Active', 0, 2, 32, '289000.00', '399000.00', '349000.00'),
(44, 'SP05', 'Áo phông nam cổ tròn dáng suông', 'Áo phông nam basic dáng regular cổ tròn.\r\n57% cotton 38% polyester 5% spandex.\r\nGiặt máy ở chế độ nhẹ, nhiệt độ thường.\r\nKhông sử dụng hóa chất tẩy có chứa Clo.\r\nPhơi trong bóng mát.\r\nSấy khô ở nhiệt độ thấp.\r\nLà ở nhiệt độ thấp 110 độ C.\r\nGiặt với sản phẩm cùng màu.\r\nKhông là lên chi tiết trang trí.', 'Active', 19, 2, 32, '80000.00', '149000.00', '120000.00'),
(45, 'SP06', 'Áo phông dài tay nam', 'Áo phông dài tay nam.\r\n65% polyester 35% cotton.\r\nGiặt máy ở chế độ nhẹ, nhiệt độ thường.\r\nKhông sử dụng hóa chất tẩy có chứa Clo.\r\nPhơi trong bóng mát.\r\nSấy khô ở nhiệt độ thấp.\r\nLà ở nhiệt độ thấp 110 độ C.\r\nGiặt với sản phẩm cùng màu.\r\nKhông là lên chi tiết trang trí.', 'Active', 0, 2, 32, '399000.00', '499000.00', '449000.00'),
(46, 'SP07', 'Áo phông nam cổ tim dáng suông', 'Áo phông nam basic dáng regular cổ tim.\r\n95% cotton 5% spandex màu SB013, SB262.\r\n57% cotton 38% polyester 5% spandex màu SA476.\r\nGiặt máy ở chế độ nhẹ, nhiệt độ thường.\r\nKhông sử dụng hóa chất tẩy có chứa Clo.\r\nPhơi trong bóng mát.\r\nSấy khô ở nhiệt độ thấp.\r\nLà ở nhiệt độ thấp 110 độ C.\r\nGiặt với sản phẩm cùng màu.\r\nKhông là lên chi tiết trang trí.', 'Active', 0, 2, 32, '80000.00', '149000.00', '120000.00'),
(47, 'SP08', 'Áo phông nam basic cổ tròn dáng suông', 'Áo T-shirt nam cổ tròn phom regular.\r\n100% cotton.\r\nGiặt máy ở chế độ nhẹ, nhiệt độ thường.\r\nKhông sử dụng hóa chất tẩy có chứa Clo.\r\nPhơi trong bóng mát.\r\nSấy thùng, chế độ nhẹ nhàng.\r\nLà ở nhiệt độ trung bình 150 độ C.\r\nGiặt với sản phẩm cùng màu.\r\nKhông là lên chi tiết trang trí.', 'Active', 0, 2, 32, '60000.00', '104200.00', '89000.00'),
(48, 'SP09', 'Áo phông nam cotton USA dáng oversize có hình in', 'Áo phông nam dáng oversize với chất liệu 100% cotton dày dặn, điểm nhấn là phần chỉ phối màu và đồ họa tạo cho sản phẩm 1 sự mới mẻ và năng động.\r\n100% cotton.\r\nGiặt máy ở chế độ nhẹ, nhiệt độ thường.\r\nKhông sử dụng hóa chất tẩy có chứa Clo.\r\nPhơi trong bóng mát.\r\nSấy khô ở nhiệt độ thấp.\r\nLà ở nhiệt độ thấp 110 độ C.\r\nGiặt với sản phẩm cùng màu.\r\nKhông là lên chi tiết trang trí.', 'Active', 1, 2, 32, '299000.00', '399000.00', '349000.00'),
(49, 'SP10', 'Áo ba lỗ active nam có hình in', 'Áo sát nách active nam với chi tiết cắt cầu vai và hình đồ họa làm điểm nhấn.\r\n100% polyester.\r\nGiặt máy ở chế độ nhẹ, nhiệt độ thường.\r\nKhông sử dụng chất tẩy.\r\nPhơi trong bóng mát.\r\nSấy khô ở nhiệt độ thấp.\r\nLà ở nhiệt độ thấp 110 độ C.\r\nGiặt với sản phẩm cùng màu.\r\nKhông là lên chi tiết trang trí.', 'Active', 0, 2, 32, '149000.00', '209300.00', '189000.00'),
(50, 'SP11', 'Áo phông nam in hình Mickey', 'Áo phông nam chất liệu 100% cotton USA với điểm nhấn là phần đồ họa licence chủ đề Mickey.\r\n100% cotton.\r\nGiặt máy ở chế độ nhẹ, nhiệt độ thường.\r\nKhông sử dụng hóa chất tẩy có chứa Clo.\r\nPhơi trong bóng mát.\r\nSấy khô ở nhiệt độ thấp.\r\nLà ở nhiệt độ thấp 110 độ C.\r\nGiặt với sản phẩm cùng màu.\r\nKhông là lên chi tiết trang trí.', 'Active', 0, 2, 32, '199000.00', '279300.00', '239000.00'),
(53, 'SP12', 'Áo khoác chần bông nam siêu nhẹ siêu ấm', 'Áo có trọng lượng nhẹ, mang lại trải nghiệm mặc nhẹ nhàng, dễ chịu mà vẫn có khả năng giữ ấm tốt nhờ cấu trúc vải và bông kẹp ba lớp.\r\nÁo có thể gập gọn cho vào túi được tặng kèm.\r\nThiết kế vừa vặn, khỏe khoắn thuận tiện cho các hoạt động ngoài trời.\r\nMũ có thể tháo rời, cổ tay áo và gấu chun ôm người, giữ ấm tốt.\r\nTúi áo 2 bên có khóa kéo chắc chắn chống rơi đồ, túi rộng dễ để vật dụng cần thiết.\r\nVải ít bám bẩn, dễ vệ sinh.\r\nVải ít nhăn nhàu và dễ làm phẳng lại.\r\nCó khả năng cản gió, giữ ấm tốt.', 'Active', 0, 2, 33, '650000.00', '899000.00', '839000.00'),
(54, 'SP13', 'Áo khoác nỉ nam', 'Áo khoác nỉ nam cổ cao, kéo khóa phía trước, được làm từ chất liệu nỉ cào bông. Chất liệu có khả năng giữ nhiệt, giữ ấm tốt. Áo khoác nam nỉ là loại áo cơ bản được phái mạnh yêu thích khi mùa đông tới không chỉ bởi khả năng giữ ấm mà còn bởi tính thời trang và tiện dụng của nó.\r\nSự kết hợp của 2 thành phần sợi cotton và polyester giúp sản phẩm giữ phom, dáng tốt nhưng vẫn đảm bảo độ xốp và thoáng khí. Màu sắc bền đẹp và độ bền của sản phẩm cao.', 'Active', 0, 2, 33, '639000.00', '799000.00', '749000.00'),
(55, 'SP14', 'Áo khoác gió nam', 'Áo khoác gió nam 2 lớp, phom regular, chống thấm nước, ngăn nước thấm qua vải, thích hợp thời tiết mưa ẩm tại Việt Na.\r\nVải ít bám bẩn, dễ vệ sinh nhờ tác dụng của lớp tráng chống thấm nước.\r\nKhông nhăn nhàu.', 'Active', 0, 2, 33, '649000.00', '799000.00', '749000.00'),
(56, 'SP15', 'Áo khoác bomber nam chống thấm nước', 'Áo khoác bomber giúp giữ ấm tốt và khiến diện mạo của người mặc thêm phần nổi bật, cá tính hơn. Áo không quá dày, chất vải không thấm nước mưa nhẹ. Lớp bông cách nhiệt vừa đủ để giữ ấm mà không dày cộp nặng nề.\r\nNgăn nước thấm qua vải, thích hợp thời tiết mưa ẩm tại Việt Nam.\r\nVải ít bám bẩn, dễ vệ sinh nhờ tác dụng của lớp tráng chống thấm nước.\r\nKhông nhăn nhàu.', 'Active', 16, 2, 33, '890000.00', '1299000.00', '1100000.00'),
(57, 'SP16', 'Áo khoác gilet chần bông nam siêu nhẹ', 'Áo khoác gilet chần bông nam có mũ được thiết kế vừa vặn thoải mái, có thể kết hợp với nhiều lớp áo. Áo có trọng lượng nhẹ, mang lại trải nghiệm mặc nhẹ nhàng, dễ chịu mà vẫn có khả năng giữ ấm tốt nhờ cấu trúc vải và bông kẹp ba lớp. Áo có thể gập gọn nhét vào túi ẩn trên lót áo\r\nVải ít bám bẩn, dễ vệ sinh.\r\nVải ít nhăn nhàu và dễ làm phẳng lại.\r\nCó khả năng cản gió, giữ ấm tốt.', 'Active', 1, 2, 33, '490000.00', '639200.00', '599000.00'),
(58, 'SP17', 'Áo khoác blazer nam', 'Áo khoác blazer nam.\r\nVải chính:100% polyester.\r\nLớp lót: 100% polyester.\r\nGiặt máy ở nhiệt độ thường.\r\nKhông sử dụng hóa chất tẩy có chứa Clo.\r\nPhơi trong bóng mát.\r\nKhông sử dụng máy sấy.\r\nLà ở nhiệt độ thấp 110 độ C.\r\nCó thể giặt khô.\r\nGiặt với sản phẩm cùng màu.\r\nKhông là lên chi tiết trang trí.', 'Active', 0, 2, 33, '890000.00', '1299000.00', '1100000.00'),
(59, 'SP18', 'Áo khoác unisex người lớn', 'Áo khoác unisex có chất liệu từ vải cotton spandex. Áo được cắt may rộng rãi, tạo cảm giác dễ chịu khi vận động. Kiểu dáng basic, dễ dàng phối hợp với nhiều trang phục khác nhau, phù hợp cho cả nam và nữ.\r\nNguyên liệu thân thiện với môi trường. Độ bền tốt. Thấm hút tốt, thoáng mát, không gây hại cho sức khỏe.\r\nLà item thoải mái, linh hoạt. Thiết kế theo phong cách basic dễ mặc và dễ phối với nhiều trang phục khác nhau.', 'Active', 0, 2, 33, '799000.00', '999000.00', '949000.00'),
(60, 'SP19', 'Áo khoác lông vũ nam', 'Áo khoác lông vũ nam.\r\nVải chính: 100% nylon.\r\nLớp giữa: 90% down 10% feather.\r\nLớp lót: 100% nylon.', 'Active', 0, 2, 33, '930000.00', '1299000.00', '1100000.00'),
(61, 'SP20', 'Áo cardigan nỉ nam', 'Áo khoác có thiết kế cơ bản giúp tạo kiểu dễ dàng.\r\nGấu thân, gấu tau dùng bo rid có gân ôm gọn quanh phần hông.\r\nRộng rãi thoải mái dễ dàng kết hợp với những trang phục khác.\r\nCó túi bên sườn tiện dụng.\r\nSự kết hợp của 2 thành phần sợi cotton và polyester giúp sản phẩm giữ form dáng tốt nhưng vẫn đảm bảo độ xốp và thoáng khí. Màu sắc bền đẹp và độ bền của sản phẩm cao.', 'Active', 0, 2, 33, '580000.00', '699000.00', '649000.00'),
(62, 'SP21', 'Áo khoác nỉ nam có mũ', 'Áo khoác nỉ nam có mũ, kéo khóa phía trước, được làm từ chất liệu nỉ cào bông - chất liệu có khả năng giữ nhiệt, giữ ấm tốt. Áo khoác nam nỉ có mũ là loại áo cơ bản được phái mạnh yêu thích khi mùa đông tới không chỉ bởi khả năng giữ ấm mà còn bởi tính thời trang và tiện dụng của nó.\r\nSự kết hợp của 2 thành phần sợi cotton và polyester giúp sản phẩm giữ form dáng tốt nhưng vẫn đảm bảo độ xốp và thoáng khí. Màu sắc bền đẹp và độ bền của sản phẩm cao.', 'Active', 0, 2, 33, '590000.00', '699000.00', '649000.00'),
(63, 'SP22', 'Áo len nam', 'Áo len nam', 'Active', 0, 2, 34, '279000.00', '349000.00', '300000.00'),
(64, 'SP23', 'Áo len gilet nam', 'Áo gilê len cổ tim dệt mặt hàng trám, form slimfit ôm gọn gàng. Sự kết hợp giữa áo len ghile cổ tim với áo sơ mi dài tay và áo khoác là một sự lựa chọn thú vị cho nam giới trong mùa thu đông này.\r\nChất liệu kết hợp giữa sợi len nhân tạo acrylic và cotton giúp sản phẩm mềm mại, nhẹ và giữ ấm tốt đồng thời vẫn thoáng khí dễ chịu.\r\nChất liệu kết hợp giữa sợi len nhân tạo acrylic và cotton giúp sản phẩm mềm mại, nhẹ và giữ ấm tốt đồng thời vẫn thoáng khí dễ chịu.', 'Active', 0, 2, 34, '369000.00', '499000.00', '449000.00'),
(65, 'SP24', 'Áo len polo nam cộc tay', 'Áo len polo nam phối kẻ được dệt từ sợi cotton acrylic với kiểu dáng suông cộc tay, dáng regular, đặc điểm là phần vai, thân áo và tay áo vừa vặn vào cơ thể nhưng không gây cảm giác bó sát hay khó chịu. Sử dụng chất liệu kết hợp giữa sợi len nhân tạo acrylic và cotton giúp sản phẩm trở nên mềm mại, nhẹ nhàng và thoáng khí.\r\nChất liệu kết hợp giữa sợi len nhân tạo acrylic và cotton giúp sản phẩm mềm mại, nhẹ và giữ ấm tốt đồng thời vẫn thoáng khí dễ chịu.', 'Active', 0, 2, 34, '329000.00', '519200.00', '489000.00'),
(66, 'SP25', 'Áo len nam cổ tròn dáng suông', 'Áo len nam dài tay, cổ tròn, dáng regular không quá ôm cũng không quá rộng tạo cho người mặc thấy thoải mái, vừa vặn. Phần thân áo dệt bằng chất liệu len dày dặn, ấm áp nhưng vẫn nhẹ nhàng, thoải mái khi mặc.\r\nChất liệu dầy dặn, mềm mại, nhẹ nhưng ấm tạo cảm giác thoải mái cho người mặc trong thời tiết thu đông. Màu sắc rất đa dạng, bắt mắt.', 'Active', 0, 2, 34, '189000.00', '249500.00', '219000.00'),
(67, 'SP26', 'Áo len lông cừu cao cấp nam cổ tròn dáng suông', 'Áo len nam dài tay, cổ tròn, dáng regular không quá ôm cũng không quá rộng tạo cho người mặc thấy thoải mái, vừa vặn. Phần thân áo dệt bằng chất liệu len lông cừu mềm, mịn, ấm áp, nhẹ nhàng, thoải mái khi mặc.\r\nÁo được dệt từ sợi 100% wool. Sợi có khả năng giữ ấm cực tốt do kết cấu từ sợi siêu mảnh, xốp với các lỗ trống có khả năng giữ không khí ấm bên trong tránh thoát hơi ấm ra ngoài.\r\nAn toàn cho người sử dụng: chống, ngăn ngừa sự xâm nhập và phát triển của vi khuẩn do thoát ẩm tốt.\r\nCảm giác tay khi sờ áo: mềm mại, xốp, không tích điện, mát tay.', 'Active', 0, 2, 34, '389000.00', '449500.00', '399000.00'),
(68, 'SP27', 'Áo polo sợi nam dài tay dáng suông', 'Áo polo sợi nam dài tay, dệt mặt hàng dáng suông dài tay. Áo dáng regular với đặc trưng vừa phần vai, phần thân và tay áo hơi ôm vào body nhưng không đem lại sự khó chịu hay bó sát.Chất liệu kết hợp giữa sợi len nhân tạo acrylic và cotton giúp sản phẩm mềm mại, nhẹ đồng thời vẫn thoáng khí dễ chịu.', 'Active', 0, 2, 34, '289000.00', '349500.00', '299000.00'),
(69, 'SP28', 'Áo polo nam dệt dáng suông', 'Áo polo sợi nam cộc tay dáng regular với đặc trưng vừa phần vai, phần thân và tay áo hơi ôm vào body nhưng không đem lại sự khó chịu hay bó sát. Trong tiết trời nóng lạnh thất thường mỗi khi giao mùa, áo polo sợi sẽ là sự lựa chọn hoàn hảo. Áo polo sợi hội tụ đủ những yếu tố cần thiết: lịch sự, chỉn chu nhưng lại không quá trang trọng.', 'Active', 0, 2, 34, '159000.00', '249500.00', '219000.00'),
(70, 'SP29', 'Áo len nam cổ tròn dáng ôm', 'Áo len nam cổ tròn dáng ôm gọn bằng sợi 50% acrylic 50% Polyester mềm, mịn có cổ tròn, viền gân nổi, tay dài với cổ tay và gấu bo gân nổi.\r\nChất liệu mềm mại, nhẹ nhưng ấm tạo cảm giác thoải mái cho người mặc trong thời tiết thu đông. Màu sắc rất đa dạng, bắt mắt.', 'Active', 0, 2, 34, '189000.00', '299000.00', '249000.00'),
(71, 'SP30', 'Áo len gilet nam cổ tim', 'Áo len gilet cổ tim Canifa dễ dàng kết hợp với áo sơ mi dài tay và áo khoác là một sự lựa chọn thú vị cho nam giới trong mùa thu đông này. Kiểu dáng ôm vừa, gọn gàng và kiểu dệt họa tiết trám chìm trẻ trung, nổi bật mà vẫn tinh tế.\r\nChất liệu kết hợp giữa sợi len nhân tạo acrylic và cotton giúp sản phẩm mềm mại, nhẹ và giữ ấm tốt đồng thời vẫn thoáng khí dễ chịu.', 'Active', 2, 2, 34, '149000.00', '249500.00', '199000.00'),
(72, 'SP31', 'Áo phông nữ tay lỡ dáng ôm', 'Áo t-shirt nữ tay lỡ dáng ôm, với chi tiết thiết kế cuốn bèo mép cổ và cửa tay tạo nét nữ tính cho sản phẩm, đơn giản mà vẫn tinh tế.', 'Active', 0, 2, 27, '169000.00', '249000.00', '199000.00'),
(73, 'SP33', 'Áo body nữ cổ lửng', 'Áo body nữ cổ lửng, điểm nhấn ở chi tiết cuốn bèo cổ áo tạo sự nữ tính cho sản phẩm.', 'Active', 0, 2, 27, '169.00', '279000.00', '229.00'),
(74, 'SP34', 'Áo phông nữ dài tay dáng ôm', 'Áo t-shirt nữ cổ tròn dáng ôm. Chi tiết gân dọc thân và 2 vai theo xu hướng đang thịnh hành, tạo nên 1 sản phẩm đơn giản nhưng vẫn thời trang.', 'Active', 0, 2, 27, '189000.00', '299000.00', '249000.00'),
(75, 'SP35', 'Áo phông nữ cổ vuống dáng ôm', 'Áo phông nữ cổ vuống dáng ôm.\r\n98% cotton 2% spandex.', 'Active', 0, 2, 27, '169000.00', '249000.00', '199000.00'),
(76, 'SP36', 'Áo phông nữ cotton USA dáng oversize có hình in', 'Áo t-shirt nữ dáng oversize với chất liệu cotton dày dặn thoáng mát và đồ họa ấn tượng nổi bật.', 'Active', 0, 2, 27, '289000.00', '399000.00', '349000.00'),
(77, 'SP37', 'Áo phông ngắn tay active nữ', 'Áo t-shirt active nữ basic, sự lựa chọn đơn giản và dễ kết hợp nhất cho khác hàng.\r\n83% nylon 17% spandex.', 'Active', 3, 2, 27, '159000.00', '249000.00', '199000.00'),
(78, 'SP38', 'Áo phông nữ cổ cao phối khoá', 'Áo phông nữ cộc tay cổ kiểu với chi tiết điểm nhấn là bản cố có khóa kéo tạo sự năng động khỏe khoắn cho sản phẩm.\r\n60% polyester 40% cotton.', 'Active', 0, 2, 27, '269000.00', '349000.00', '299000.00'),
(79, 'SP39', 'Áo phông nữ dáng babytee có hình in', 'Áo t-shirt nữ dáng babytee với hình in đa dạng các chủ đề mang đến nhiều lựa chọn cho khách hàng.\r\n60% cotton 40% polyester.', 'Active', 0, 2, 27, '169000.00', '249000.00', '199000.00'),
(80, 'SP40', 'Áo phông croptop nữ cotton có hình in', 'Áo phông croptop với điểm nhấn là phần đồ họa nổi bật và ấn tượng.\r\n100% cotton.', 'Active', 0, 2, 27, '189000.00', '299000.00', '249000.00'),
(81, 'SP41', 'Áo ba lỗ nữ dáng ôm có hình in', 'Áo sát nách nữ dáng ôm, với cấu trúc dệt rib tạo sự đàn hồi tối đa cho sản phẩm. Điểm nhấn là phần đồ họa tinh tế trên ngực.\r\n94% cotton 6% spandex.', 'Active', 1, 2, 27, '139000.00', '199000.00', '169000.00'),
(82, 'SP42', 'Áo nỉ nữ', 'Áo nỉ nữ cổ tròn dáng rộng, chi tiết đồ họa khớp màu với kẻ nhấn ở bo cổ và tay.\r\n60% cotton 40% polyester.', 'Active', 2, 2, 29, '349000.00', '479200.00', '439000.00'),
(83, 'SP43', 'Bộ quần áo nữ', 'Bộ quần áo nữ.\r\n63% cotton 37% polyester.', 'Active', 9, 2, 29, '789000.00', '949000.00', '899000.00'),
(84, 'SP44', 'Áo hoodie nữ', 'Áo hoodie nữ.\r\n56% cotton 44% polyester.', 'Active', 5, 2, 29, '549000.00', '699000.00', '649000.00'),
(85, 'SP45', 'Bộ quần áo nỉ nữ có hình in', 'Bộ nỉ nữ quần suông kết hợp với áo bo gấu và chi tiết lé phối khớp màu với hình đồ họa, tạo nên một sự lựa chọn hoàn hảo cho khách hàng.', 'Active', 0, 2, 29, '529000.00', '639200.00', '599000.00'),
(86, 'SP46', 'Áo nỉ nữ có hình in', 'Áo nỉ nữ dáng relax, hình in đa dạng và đơn giản, giúp khách hàng dễ dàng lựa chọn và phối đồ. Phong cách thoải mái, phù hợp cho nhiều hoàn cảnh.', 'Active', 1, 2, 29, '249000.00', '399000.00', '349000.00'),
(87, 'SP47', 'Bộ quần áo nỉ nữ dài tay quần dài có hình in', 'Bộ nỉ nữ basic với điểm nhấn là hình đồ họa nổi bật cùng với chất liệu vải cào bông ấm áp, phù hợp với nhiều hoàn cảnh sử dụng.', 'Active', 0, 2, 29, '369000.00', '594300.00', '549000.00'),
(88, 'SP48', 'Áo nỉ nữ basic cổ tròn', 'Áo nỉ dáng basic cổ tròn, thiết kế bo gấu tạo sự thoải mái khi mặc, kết hợp với các chi tiết đồ họa đơn giản tạo điểm nhấn cho sản phẩm.\r\nChất liệu: 95% poly 5% spandex.\r\nCo giãn, nhanh khô.', 'Active', 0, 2, 29, '159000.00', '244300.00', '199000.00'),
(89, 'SP49', 'Áo nỉ nữ có mũ dáng rộng', 'Áo nỉ nữ có mũ dáng relax với thiết kế đơn giản và điểm nhấn là hình đồ họa, dễ kết hợp với nhiều trang phục và nhiều hoàn cảnh sử dụng.\r\nSự kết hợp của 2 thành phần sợi cotton và polyester với cấu trúc dệt vòng lông ở mặt trái, giúp cho sản phẩm giữ nhiệt tốt và bề mặt vải đanh mịn, thoải mái khi mặc và vận động.', 'Active', 0, 2, 29, '239000.00', '349300.00', '299000.00'),
(90, 'SP50', 'Áo nỉ unisex người lớn có mũ in hình Mickey', 'Áo nỉ có mũ unisex người lớn dáng relax với thiết kế đơn giản và điểm nhấn là hình đồ họa nhân vật Mickey, dễ kết hợp trang phục và nhiều hoàn cảnh sử dụng.\r\nBề mặt vải đanh lỳ, cấu trúc dệt mặt trái giữ nhiệt tốt.', 'Active', 0, 2, 29, '349000.00', '489300.00', '439000.00'),
(91, 'SP51', 'Áo nỉ unisex người lớn in hình Chip & Dale', 'Áo nỉ cổ tròn dáng unisex, phù hợp cho cả nam và nữ mặc. Áo có bo gấu rib, co giãn đàn hồi tốt, áo in hình in nhân vật bản quyền Disney Chip & Dale.\r\n70% cotton 30% polyester.', 'Active', 0, 2, 29, '139000.00', '249500.00', '199000.00'),
(92, 'SP52', 'Áo khoác bông thổi, kéo khóa', 'Áo khoác thổi bông nhẹ, cổ cao giữ ấm tốt. Phom dáng vừa vặn, gọn gàng. Túi áo cách điệu hiện đại, tiện lợi. Màu sắc sạch sẽ, phù hợp nhiều độ tuổi, nhiều phong cách.', 'Active', 0, 2, 31, '649000.00', '799000.00', '749000.00'),
(94, 'SP53', 'Áo khoác chần bông nữ', 'Áo khoác bông thổi dài tay kéo khóa của nữ. Phần cổ bẻ với chi tiết cúc bấm, có thể thay đổi kiểu mặc cho người sử dụng. Phù hợp với thời tiết lạnh sâu và có khả năng chống thấm nhẹ.', 'Active', 0, 2, 31, '890000.00', '1039200.00', '999000.00'),
(95, 'SP54', 'Áo khoác gió nữ hai lớp có mũ, kéo khóa', 'Áo khoác gió nữ hai lớp có mũ. Phom dáng rộng vừa, phù hợp với thời tiết gió, mưa nhẹ.', 'Active', 0, 2, 31, '639000.00', '799000.00', '749000.00'),
(96, 'SP55', 'Áo khoác nỉ cotton USD nữ', 'Áo khoác nỉ nữ basic dáng relax, thiết kế phom áo rộng thoải mái với chiều dài vừa phải dễ phù hợp với nhiều đối tượng khách hàng.', 'Active', 0, 2, 31, '549000.00', '699000.00', '649000.00'),
(97, 'SP56', 'Áo khoác chần bông kéo khóa, lá cổ và tay áo phối nhung tăm', 'Áo khoác chần bông kéo khóa, lá cổ và tay áo phối màu nhung tăm. Phom dáng ngắn, rộng vừa, thoải mái, phù hợp với thời tiết lạnh, mưa nhẹ.', 'Active', 0, 2, 31, '869000.00', '1099000.00', '999000.00'),
(98, 'SP57', 'Áo khoác gilet chần bông cổ cao, kéo khóa', 'Áo khoác gilet chần bông cổ cao, kéo khóa. Phom dáng rộng vừa, thoải mái, phù hợp với thời tiết lạnh, mưa nhẹ.\r\n100% nylon.', 'Active', 0, 2, 31, '629000.00', '799000.00', '749000.00'),
(99, 'SP58', 'Áo cardigan nữ', 'Áo khoác len dài tay nữ, cổ tròn dáng rộng vừa. Chất liệu mỏng nhẹ, có khả năng giữ ấm tốt.\r\nChất liệu kết hợp acrylic polyester mỏng nhẹ, có khả năng giữ ấm tốt.', 'Active', 0, 2, 31, '269000.00', '399000.00', '349000.00'),
(100, 'SP59', 'Áo dạ nữ dài tay, cổ tròn dáng suông vừa', 'Áo dạ hai lớp dài tay, cổ tròn, cài cúc, dáng suông. Chất liệu dạ mịn mang lại cảm giác mềm mại, ấm áp, đứng dáng. Phù hợp với môi trường công sở, dạo phố.', 'Active', 0, 2, 31, '649000.00', '799200.00', '749000.00'),
(101, 'SP60', 'Áo khoác lông nữ', 'Áo khoác lông nữ dáng relax, với chất liệu lông cao cấp mềm mịn tạo nên một outfit sang trọng và không thể thiếu trong các dịp lễ tết.\r\nVải chính: 100% polyester.\r\nLớp lót: 100% polyester.\r\n', 'Active', 0, 2, 31, '980000.00', '1499000.00', '1299000.00'),
(102, 'SP61', 'Áo khoác nỉ unisex người lớn in hình Mickey', 'Áo khoác nỉ unisex dáng bomber, với chất liệu vải dày dặn kết hợp với phần thiết kế bo kẻ ấn tượng và đồ họa nhân vật Mickey nổi bật phía sau lưng áo, rất phụ hợp với giới trẻ.\r\nBề mặt vải đanh lỳ, cấu trúc dệt mặt trái giữ nhiệt tốt.\r\n83% cotton 17% polyester.', 'Active', 0, 2, 31, '349000.00', '499500.00', '449000.00'),
(104, 'sp62', 'Áo khoác gile chần bông bé gái', 'Áo khoác gile thổi bông bé gái có mũ. Phom dáng thời trang, màu sắc trung tính dễ kết hợp trang phục, phù hợp nhiều phong cách.\r\nNguyên liệu vải gió polyester dày dặn, bề mặt bóng ánh trai hiện đại, cản gió chống thấm nước.\r\nVải chính: 100% polyester.\r\nLớp giữa: bông 100% polyester.\r\nLớp lót: 100% polyester.\r\nGiặt máy ở nhiệt độ thường.\r\nKhông sử dụng hóa chất tẩy.\r\nPhơi trong bóng mát.\r\nSấy khô ở nhiệt độ thấp.\r\nKhông được là.\r\nKhông được giặt khô.\r\nGiặt với sản phẩm cùng màu.\r\nTránh xa nguồn lửa.', 'Active', 0, 5, 35, '400000.00', '512000.00', '500000.00'),
(105, 'SP63', 'Áo khoác gilet chần bông unisex trẻ em', 'Áo khoác gilet chần bông unisex trẻ em\r\nLớp ngoài: 100% nylon.\r\nLớp giữa:100% polyester.\r\nLớp lót: 100% nylon.\r\nGiặt máy ở nhiệt độ thường.\r\nKhông sử dụng hóa chất tẩy có chứa Clo.\r\nPhơi trong bóng mát.\r\nKhông sử dụng máy sấy.\r\nKhông được là.\r\nGiặt với sản phẩm cùng màu.\r\nTránh xa nguồn lửa.', 'Active', 0, 5, 35, '300000.00', '499000.00', '449000.00'),
(106, 'SP64', 'Áo khoác unisex trẻ em', 'Áo khoác unisex trẻ em.\r\n100% cotton.\r\nGiặt máy ở nhiệt độ thường.\r\nKhông sử dụng hóa chất tẩy có chứa Clo.\r\nPhơi trong bóng mát.\r\nSấy khô ở nhiệt độ trung bình.\r\nLà ở nhiệt độ trung bình 150 độ C.\r\nGiặt với sản phẩm cùng màu.\r\nKhông là lên chi tiết trang trí.', 'Active', 0, 2, 35, '400.00', '599.00', '549.00'),
(107, 'SP65', 'Áo khoác nỉ bé gái đính patch trang trí', 'Áo khoác nỉ bé gái đính patch trang trí.\r\n60% cotton 40% polyester.\r\nGiặt máy ở chế độ nhẹ, nhiệt độ thường.\r\nKhông sử dụng hóa chất tẩy có chứa Clo.\r\nPhơi trong bóng mát.\r\nSấy thùng, chế độ nhẹ nhàng.\r\nLà ở nhiệt độ trung bình 150 độ C.\r\nGiặt với sản phẩm cùng màu.\r\nKhông là lên chi tiết trang trí.', 'Active', 0, 2, 35, '300.00', '499.00', '449.00'),
(108, 'SL67', 'Áo khoác gió bé gái 2 lớp chống thấm nước', 'Áo khoác gió bé gái 2 lớp, có mũ. Nguyên liệu gió mỏng nhẹ chống thấm nước và cản gió tốt. Phù hợp nhiều hoàn cảnh sử dụng.\r\nVải chính: 100% nylon.\r\nVải lót tay: 100% polyester.\r\nGiặt máy ở nhiệt độ thường.\r\nKhông sử dụng hóa chất tẩy.\r\nPhơi trong bóng mát.\r\nSấy khô ở nhiệt độ thấp.\r\nKhông được là.\r\nKhông được giặt khô.\r\nGiặt với sản phẩm cùng màu.\r\nTránh xa nguồn lửa.', 'Active', 0, 2, 35, '299000.00', '399000.00', '349000.00'),
(109, 'SP68', 'Áo body unisex trẻ em cotton', 'Áo body unisex, chất liệu mềm mại co giãn tốt, phom dáng vừa vặn cho các bé, họa tiết ngộ nghĩnh đáng yêu.\r\n100% cotton.\r\nGiặt máy ở chế độ nhẹ, nhiệt độ thường.\r\nKhông sử dụng hóa chất tẩy có chứa Clo.\r\nPhơi trong bóng mát.\r\nSấy thùng, chế độ nhẹ nhàng.\r\nLà ở nhiệt độ trung bình 150 độ C.\r\nGiặt với sản phẩm cùng màu.\r\nKhông là lên chi tiết trang trí.', 'Active', 0, 2, 36, '349.00', '499.00', '400.00'),
(110, 'SP69', 'Áo phông bé gái cotton USA có hình in', 'Áo phông ngắn tay bé gái kiểu dáng Baby tee hiện đại, gọn gàng, nữ tính. Màu sắc tươi sáng, phối màu cổ áo và gấu tay lạ mắt, hình in dễ thương phù hợp cho bé sử dụng trong nhiều hoàn cảnh.\r\nChất liệu 100% cotton thấm hút mồ hôi tốt, mềm mại thoáng mát giúp các bé dễ dàng vận động.\r\n100% cotton.\r\nGiặt máy ở chế độ nhẹ, nhiệt độ thường.\r\nKhông sử dụng hóa chất tẩy có chứa Clo.\r\nPhơi trong bóng mát.\r\nSấy khô ở nhiệt độ thấp.\r\nLà ở nhiệt độ thấp 110 độ C.\r\nGiặt với sản phẩm cùng màu.\r\nKhông là lên chi tiết trang trí.', 'Active', 0, 2, 36, '431.00', '590.00', '500.00'),
(111, 'SP70', 'Áo phông bé gái dài tay đính patch trang trí', 'Áo phông dài tay, cổ leo bé gái. Phom dáng ôm sát, chi tiết trang trí cuốn bèo cổ và gấu tay, đính nơ hạt trai trên ngực xinh xắn, hiện đại, dễ kết hợp đồ cho bé gái.\r\nChất liệu tự nhiên Rayon pha, co giãn đàn hồi tốt, mềm mại , dễ chịu khi sử dụng.', 'Active', 0, 5, 36, '300.00', '490.00', '400.00'),
(112, 'SP71', 'Áo phông dài tay bé gái cotton USA hình Wolfoo', 'Áo phông dài tay bé gái. Kiểu dáng cơ bản dễ mặc, chi tiết trang trí bèo nhún vai nữ tính, màu sắc tươi sáng, hình in dễ thương, phù hợp nhiều hoàn cảnh sử dụng cho bé gái.\r\nChất liệu 100% cotton thấm hút mồ hôi tốt, mềm mại thoáng mát giúp các bé dễ dàng vận động.', 'Active', 0, 5, 36, '212.12', '399.00', '300.00'),
(113, 'SP72', 'Áo phông bé gái thêu nơ dáng ôm', 'Áo phông bé gái ngắn tay, cổ tròn. Phom dáng ôm sát, chi tiết trang trí cuốn bèo gấu tay, thêu nơ đính hạt trên ngực xinh xắn, hiện đại, dễ kết hợp trang phục cho bé gái', 'Active', 0, 2, 36, '123.00', '234.00', '200.00'),
(114, 'SP73', 'Áo gilet len bé trai', 'Áo gilet len bé trai\r\n48% acrylic 47% polyester 5% nylon hoặc\r\n92% acrylic 8% nylon hoặc\r\n96% acrylic 4% nylon.\r\nHướng dẫn sử dụng\r\nGiặt máy ở chế độ nhẹ,không ngâm.\r\nKhông sử dụng hóa chất tẩy có chứa clo.\r\nPhơi vắt ngang, trong bóng mát.\r\nKhông sử dụng máy sấy.\r\nLà ở nhiệt độ trung bình 130 độ C.\r\nGiặt mặt trái sản phẩm.\r\nSản phẩm có nguy cơ xù lông, rụng lông và phai ra màu nhạt hơn.', 'Active', 0, 5, 37, '199000.00', '399000.00', '300000.00'),
(115, 'SP74', 'Áo len bé trai', 'Áo len bé trai\r\nChất liệu\r\n60% cotton 40% acrylic\r\nHướng dẫn sử dụng\r\nGiặt máy ở chế độ nhẹ, nhiệt độ thường.\r\nKhông sử dụng hóa chất tẩy có chứa Clo.\r\nPhơi vắt ngang, trong bóng mát.\r\nSấy khô ở nhiệt độ thấp.\r\nLà ở nhiệt độ trung bình 150 độ C.\r\nGiặt mặt trái sản phẩm.\r\nGiặt với sản phẩm cùng màu.\r\nLàm ẩm sản phẩm khi là.', 'Active', 0, 5, 37, '230000.00', '499000.00', '400000.00'),
(116, 'SP75', 'Áo len bé trai có túi ốp ngực', 'Áo len cổ tròn, dài tay, túi ốp phối nguyên liệu. Phom dáng thời trang, kiểu dệt interlock chắc chắn.\r\nSợi 60% acrylic 40% polyester.', 'Active', 0, 2, 37, '300000.00', '499000.00', '449000.00'),
(117, 'SP76', 'Áo len bé trai dệt gân phối màu', 'Áo len cổ tròn, dài tay. Phom dáng cơ bản, dệt gân kiều, thân trước dệt chữ khỏe khoắn. Cổ, gấu áo, gấu tay dệt kẻ phối màu.\r\nSợi 100% cotton melange.', 'Active', 1, 5, 37, '444000.00', '500000.00', '487000.00'),
(118, 'SP77', 'Áo len gilet bé trai cổ V basic', 'Áo len gilet cổ chữ V, phom dáng cơ bản dễ mặc.\r\nSợi acrylic và sợi acrylic pha.', 'Active', 0, 5, 37, '200.00', '399.00', '369.00'),
(120, 'SP78', 'Quần nỉ bé trai có hình in', 'Quần nỉ bé trai có hình in\r\nChất liệu\r\n60% cotton 40% polyester.\r\nHướng dẫn sử dụng\r\nGiặt máy ở chế độ nhẹ, nhiệt độ thường.\r\nKhông sử dụng hóa chất tẩy có chứa Clo.\r\nPhơi trong bóng mát.\r\nSấy thùng, chế độ nhẹ nhàng.\r\nLà ở nhiệt độ trung bình 150 độ C.\r\nGiặt với sản phẩm cùng màu.\r\nKhông là lên chi tiết trang trí.', 'Active', 0, 5, 38, '150000.00', '299000.00', '250000.00'),
(121, 'SP79', 'Quần nỉ bé trai', 'Quần nỉ bé trai\r\n\r\n93% cotton 7% spandex.\r\nHướng dẫn sử dụng\r\nGiặt máy ở chế độ nhẹ, nhiệt độ thường.\r\nKhông sử dụng hóa chất tẩy có chứa Clo.\r\nPhơi trong bóng mát.\r\nSấy khô ở nhiệt độ thấp.\r\nLà ở nhiệt độ thấp 110 độ C.\r\nGiặt với sản phẩm cùng màu.\r\nKhông là lên chi tiết trang trí.', 'Active', 0, 2, 38, '290000.00', '500000.00', '400000.00'),
(123, 'SP80', 'Quần nỉ bé trai basic có bo gấu', 'Quần nỉ bé trai chất liệu cotton pha phom dáng cơ bản basic, thoải mái cho trẻ vận động.\r\nChất liệu cotton pha.', 'Active', 0, 5, 38, '390000.00', '500000.00', '450000.00'),
(124, 'SP81', 'Quần nỉ unisex trẻ em chun gấu', 'Quần nỉ unisex trẻ em, phom dáng basic có chun gấu, chất liệu vảy cá mỏng thoải mái cho trẻ vận động và sử dụng cho nhiều hoàn cảnh.\r\nChất liệu polyester pha spandex.', 'Active', 1, 5, 38, '300000.00', '400000.00', '450000.00'),
(127, 'SP82', 'Quần nỉ bé trai basic có bo gấu', 'Quần nỉ bé trai chất liệu 100% polyester phom dáng cơ bản basic, thoải mái cho trẻ vận động.\r\nChất liệu 100% polyester.', 'Active', 0, 2, 38, '300000.00', '500000.00', '400000.00');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham_yeu_thich`
--

CREATE TABLE `san_pham_yeu_thich` (
  `Id` int NOT NULL,
  `Nguoi_dung_id` int DEFAULT NULL,
  `San_pham_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tin_tucs`
--

CREATE TABLE `tin_tucs` (
  `Id` int NOT NULL,
  `Tieu_de` varchar(100) DEFAULT NULL,
  `Noi_dung` text,
  `Thoi_gian_tao` date DEFAULT NULL,
  `Thoi_gian_cap_nhat` date DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Trang_thai` enum('Published','Draft') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tin_tucs`
--

INSERT INTO `tin_tucs` (`Id`, `Tieu_de`, `Noi_dung`, `Thoi_gian_tao`, `Thoi_gian_cap_nhat`, `img`, `Trang_thai`) VALUES
(6, 'Áo louis vuitton', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sapien dignissim a elementum. Sociis metus, hendrerit mauris id in. Quis sit sit ultrices tincidunt euismod luctus diam. Turpis sodales orci etiam phasellus lacus id leo. Amet turpis nunc, nulla massa est viverra interdum. Praesent auctor nulla morbi non posuere mattis. Arcu eu id maecenas cras. Eget fames tincidunt leo, sed vitae, pretium interdum. Non massa, imperdiet nunc sit sapien. Tempor lectus ornare quis mi vel. Nibh euismod donec elit posuere lobortis consequat faucibus aliquam metus. Ornare consequat, vulputate sit maecenas mauris urna sed fringilla. Urna fermentum iaculis pharetra, maecenas dui nullam nullam rhoncus. Facilisis quis vulputate sem gravida lacus, justo placerat.\n\nSed do eiusmod tempor incididunt ut labore\nSaw wherein fruitful good days image them, midst, waters upon, saw. Seas lights seasons. Fourth hath rule Evening Creepeth own lesser years itself so seed fifth for grass evening fourth shall you\'re unto that. Had. Female replenish for yielding so saw all one to yielding grass you\'ll air sea it, open waters subdue, hath. Brought second Made. Be. Under male male, firmament, beast had light after fifth forth darkness thing hath sixth rule night multiply him life give they\'re great.\n\nWhy choose product?\nCreat by cotton fibric with soft and smooth\nSimple, Configurable (e.g. size, color, etc.), bundled\nDownloadable/Digital Products, Virtual Products\nSample Number List\nCreate Store-specific attrittbutes on the fly\nSimple, Configurable (e.g. size, color, etc.), bundled\nDownloadable/Digital Products, Virtual Products\nShe\'d years darkness days. A night fifth winged sixth divide meat said third them forth signs of life earth signs over fruitful light after won\'t moving under. Thing yielding upon seed. Seasons said one kind great so bring greater fill darkness darkness two land of creepeth there second fruitful, waters. Make don\'t void years Gathering gathering divide fill.', '2024-11-18', '2024-11-18', 'loui.jpg', 'Published'),
(7, 'Áo balenciaga chính hãng', 'Áo balenciaga chính hãng', '2024-11-18', '2024-11-18', 'balen.jpg', 'Draft'),
(8, 'Áo da nam', 'Áo da nam', '2024-11-18', '2024-11-18', 'aoda.jpg', 'Draft'),
(9, 'Quần louis vuitton', 'Quần louis vuitton', '2024-11-18', '2024-11-18', 'quanloui.jpg', 'Published'),
(10, 'Quần balenciaga', 'Quần balenciaga', '2024-11-18', '2024-11-18', 'quanbalen.jpg', 'Published');

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hangs`
--

CREATE TABLE `trang_thai_don_hangs` (
  `Id` int NOT NULL,
  `Ten_trang_thai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trang_thai_don_hangs`
--

INSERT INTO `trang_thai_don_hangs` (`Id`, `Ten_trang_thai`) VALUES
(1, 'Chờ xác nhận'),
(3, 'Đã xác nhận'),
(4, 'Đang giao'),
(5, 'Đã giao'),
(6, 'Giao hàng thành công'),
(7, 'Giao hàng thất bại'),
(8, 'Đã hủy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `San_pham_id` (`San_pham_id`),
  ADD KEY `Nguoi_dung_id` (`Nguoi_dung_id`);

--
-- Indexes for table `chi_tiet_danh_mucs`
--
ALTER TABLE `chi_tiet_danh_mucs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_danh_muc` (`id_danh_muc`);

--
-- Indexes for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Don_hang_id` (`Don_hang_id`),
  ADD KEY `San_pham_id` (`San_pham_id`);

--
-- Indexes for table `chi_tiet_san_pham`
--
ALTER TABLE `chi_tiet_san_pham`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma_sku` (`ma_sku`),
  ADD KEY `mau_sac_id` (`mau_sac_id`),
  ADD KEY `kich_thuoc_id` (`kich_thuoc_id`),
  ADD KEY `chi_tiet_san_pham_ibfk_1` (`san_pham_id`);

--
-- Indexes for table `danh_gias`
--
ALTER TABLE `danh_gias`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `San_pham_id` (`San_pham_id`),
  ADD KEY `Nguoi_dung_id` (`Nguoi_dung_id`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Nguoi_dung_id` (`Nguoi_dung_id`),
  ADD KEY `trang_thai_don_hang_id` (`trang_thai_don_hang_id`);

--
-- Indexes for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Nguoi_dung_id` (`Nguoi_dung_id`),
  ADD KEY `San_pham_id` (`San_pham_id`);

--
-- Indexes for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chi_tiet_san_pham_id` (`chi_tiet_san_pham_id`);

--
-- Indexes for table `khuyen_mais`
--
ALTER TABLE `khuyen_mais`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Ma_khuyen_mai` (`Ma_khuyen_mai`);

--
-- Indexes for table `kich_thuocs`
--
ALTER TABLE `kich_thuocs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lien_hes`
--
ALTER TABLE `lien_hes`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Nguoi_dung_id` (`Nguoi_dung_id`);

--
-- Indexes for table `mau_sacs`
--
ALTER TABLE `mau_sacs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nguoi_dungs`
--
ALTER TABLE `nguoi_dungs`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Ten_dang_nhap` (`Ten_dang_nhap`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `noi_dungs`
--
ALTER TABLE `noi_dungs`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Ma_san_pham` (`Ma_san_pham`),
  ADD KEY `khuyen_mai_id` (`khuyen_mai_id`),
  ADD KEY `fk_chi_tiet_danh_muc_id` (`chi_tiet_danh_muc_id`);

--
-- Indexes for table `san_pham_yeu_thich`
--
ALTER TABLE `san_pham_yeu_thich`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Nguoi_dung_id` (`Nguoi_dung_id`),
  ADD KEY `San_pham_id` (`San_pham_id`);

--
-- Indexes for table `tin_tucs`
--
ALTER TABLE `tin_tucs`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `chi_tiet_danh_mucs`
--
ALTER TABLE `chi_tiet_danh_mucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `chi_tiet_san_pham`
--
ALTER TABLE `chi_tiet_san_pham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `danh_gias`
--
ALTER TABLE `danh_gias`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `khuyen_mais`
--
ALTER TABLE `khuyen_mais`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kich_thuocs`
--
ALTER TABLE `kich_thuocs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lien_hes`
--
ALTER TABLE `lien_hes`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mau_sacs`
--
ALTER TABLE `mau_sacs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `nguoi_dungs`
--
ALTER TABLE `nguoi_dungs`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `noi_dungs`
--
ALTER TABLE `noi_dungs`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `san_pham_yeu_thich`
--
ALTER TABLE `san_pham_yeu_thich`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tin_tucs`
--
ALTER TABLE `tin_tucs`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD CONSTRAINT `binh_luans_ibfk_1` FOREIGN KEY (`San_pham_id`) REFERENCES `san_phams` (`Id`),
  ADD CONSTRAINT `binh_luans_ibfk_2` FOREIGN KEY (`Nguoi_dung_id`) REFERENCES `nguoi_dungs` (`Id`);

--
-- Constraints for table `chi_tiet_danh_mucs`
--
ALTER TABLE `chi_tiet_danh_mucs`
  ADD CONSTRAINT `chi_tiet_danh_mucs_ibfk_1` FOREIGN KEY (`id_danh_muc`) REFERENCES `danh_mucs` (`Id`);

--
-- Constraints for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD CONSTRAINT `chi_tiet_don_hangs_ibfk_1` FOREIGN KEY (`Don_hang_id`) REFERENCES `don_hangs` (`Id`),
  ADD CONSTRAINT `chi_tiet_don_hangs_ibfk_2` FOREIGN KEY (`San_pham_id`) REFERENCES `san_phams` (`Id`);

--
-- Constraints for table `chi_tiet_san_pham`
--
ALTER TABLE `chi_tiet_san_pham`
  ADD CONSTRAINT `chi_tiet_san_pham_ibfk_1` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chi_tiet_san_pham_ibfk_2` FOREIGN KEY (`mau_sac_id`) REFERENCES `mau_sacs` (`id`),
  ADD CONSTRAINT `chi_tiet_san_pham_ibfk_3` FOREIGN KEY (`kich_thuoc_id`) REFERENCES `kich_thuocs` (`id`);

--
-- Constraints for table `danh_gias`
--
ALTER TABLE `danh_gias`
  ADD CONSTRAINT `danh_gias_ibfk_1` FOREIGN KEY (`San_pham_id`) REFERENCES `san_phams` (`Id`),
  ADD CONSTRAINT `danh_gias_ibfk_2` FOREIGN KEY (`Nguoi_dung_id`) REFERENCES `nguoi_dungs` (`Id`);

--
-- Constraints for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD CONSTRAINT `don_hangs_ibfk_1` FOREIGN KEY (`Nguoi_dung_id`) REFERENCES `nguoi_dungs` (`Id`),
  ADD CONSTRAINT `trang_thai_don_hang_id` FOREIGN KEY (`trang_thai_don_hang_id`) REFERENCES `trang_thai_don_hangs` (`Id`);

--
-- Constraints for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD CONSTRAINT `gio_hangs_ibfk_1` FOREIGN KEY (`Nguoi_dung_id`) REFERENCES `nguoi_dungs` (`Id`),
  ADD CONSTRAINT `gio_hangs_ibfk_2` FOREIGN KEY (`San_pham_id`) REFERENCES `san_phams` (`Id`);

--
-- Constraints for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD CONSTRAINT `hinh_anh_san_phams_ibfk_1` FOREIGN KEY (`chi_tiet_san_pham_id`) REFERENCES `chi_tiet_san_pham` (`id`);

--
-- Constraints for table `lien_hes`
--
ALTER TABLE `lien_hes`
  ADD CONSTRAINT `lien_hes_ibfk_1` FOREIGN KEY (`Nguoi_dung_id`) REFERENCES `nguoi_dungs` (`Id`);

--
-- Constraints for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD CONSTRAINT `fk_chi_tiet_danh_muc_id` FOREIGN KEY (`chi_tiet_danh_muc_id`) REFERENCES `chi_tiet_danh_mucs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `san_phams_ibfk_2` FOREIGN KEY (`khuyen_mai_id`) REFERENCES `khuyen_mais` (`Id`);

--
-- Constraints for table `san_pham_yeu_thich`
--
ALTER TABLE `san_pham_yeu_thich`
  ADD CONSTRAINT `san_pham_yeu_thich_ibfk_1` FOREIGN KEY (`Nguoi_dung_id`) REFERENCES `nguoi_dungs` (`Id`),
  ADD CONSTRAINT `san_pham_yeu_thich_ibfk_2` FOREIGN KEY (`San_pham_id`) REFERENCES `san_phams` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
