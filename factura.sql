-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 23, 2020 at 11:20 PM
-- Server version: 10.3.23-MariaDB-0+deb10u1
-- PHP Version: 7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `factura`
--
CREATE DATABASE IF NOT EXISTS `factura` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `factura`;

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(255) NOT NULL,
  `descripcion_categoria` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `descripcion_categoria`, `date_added`) VALUES
(15, 'Gafiteria', '', '2020-08-10 15:15:48'),
(16, 'Pinturas', '', '2020-08-10 15:16:18'),
(17, 'Electricidad', '', '2020-08-10 15:16:28'),
(18, 'Herramientas', '', '2020-08-10 15:16:39'),
(19, 'Iluminacion', '', '2020-08-10 15:16:49'),
(20, 'Plomeria', '', '2020-08-10 15:16:57'),
(21, 'Adhesivos y Demas', '', '2020-08-10 15:17:12'),
(22, 'Cerraduras', '', '2020-08-10 15:17:23'),
(23, 'Brochas', '', '2020-08-10 15:17:32'),
(24, 'Carpinteria', '', '2020-08-10 15:17:43'),
(25, 'Cintas', '', '2020-08-10 15:18:00'),
(26, 'Laca Nitro', '', '2020-08-10 15:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `RUC_cliente` varchar(255) NOT NULL,
  `nombre_cliente` varchar(255) NOT NULL,
  `ciudad_cliente` varchar(255) NOT NULL,
  `telefono_cliente` char(30) NOT NULL,
  `direccion_cliente` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `RUC_cliente`, `nombre_cliente`, `ciudad_cliente`, `telefono_cliente`, `direccion_cliente`, `date_added`) VALUES
(11, '0916593338002', 'Rafael', 'guayaquil', '0979472490', 'Capitan Najera 4511 entre La 17ava y 18ava', '2020-07-28 18:59:29'),
(12, '0916593338001', 'jose tavares', 'guayaquil', '0979472490', 'capitan najera 4609 e/ 19 ava y 18 ava', '2020-08-07 19:34:03'),
(13, '0922353586', 'Ronny FernÃ¡ndez', 'guayaquil', '0990779521', 'Brasil 1702 Jose de antepara', '2020-08-15 22:25:12'),
(14, '123123', 'asda', 'asd', '123123213', 'asdasd', '2020-08-24 03:21:53'),
(15, '123', 'asdas', 'asdasd', '123123123', 'asdasdsad', '2020-08-25 22:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `compra_productos`
--

CREATE TABLE `compra_productos` (
  `id` int(11) NOT NULL,
  `id_historial_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `compra_productos`
--

INSERT INTO `compra_productos` (`id`, `id_historial_compra`, `id_producto`, `cantidad`) VALUES
(171, 157, 282, 110),
(195, 160, 304, 116);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `precision` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thousand_separator` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `decimal_separator` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `symbol`, `precision`, `thousand_separator`, `decimal_separator`, `code`) VALUES
(1, 'US Dollar', '$', '2', ',', '.', 'USD'),
(2, 'Libra Esterlina', '&pound;', '2', ',', '.', 'GBP'),
(3, 'Euro', 'â‚¬', '2', '.', ',', 'EUR'),
(4, 'South African Rand', 'R', '2', '.', ',', 'ZAR'),
(5, 'Danish Krone', 'kr ', '2', '.', ',', 'DKK'),
(6, 'Israeli Shekel', 'NIS ', '2', ',', '.', 'ILS'),
(7, 'Swedish Krona', 'kr ', '2', '.', ',', 'SEK'),
(8, 'Kenyan Shilling', 'KSh ', '2', ',', '.', 'KES'),
(9, 'Canadian Dollar', 'C$', '2', ',', '.', 'CAD'),
(10, 'Philippine Peso', 'P ', '2', ',', '.', 'PHP'),
(11, 'Indian Rupee', 'Rs. ', '2', ',', '.', 'INR'),
(12, 'Australian Dollar', '$', '2', ',', '.', 'AUD'),
(13, 'Singapore Dollar', 'SGD ', '2', ',', '.', 'SGD'),
(14, 'Norske Kroner', 'kr ', '2', '.', ',', 'NOK'),
(15, 'New Zealand Dollar', '$', '2', ',', '.', 'NZD'),
(16, 'Vietnamese Dong', 'VND ', '0', '.', ',', 'VND'),
(17, 'Swiss Franc', 'CHF ', '2', '\'', '.', 'CHF'),
(18, 'Quetzal Guatemalteco', 'Q', '2', ',', '.', 'GTQ'),
(19, 'Malaysian Ringgit', 'RM', '2', ',', '.', 'MYR'),
(20, 'Real Brasile&ntilde;o', 'R$', '2', '.', ',', 'BRL'),
(21, 'Thai Baht', 'THB ', '2', ',', '.', 'THB'),
(22, 'Nigerian Naira', 'NGN ', '2', ',', '.', 'NGN'),
(23, 'Peso Argentino', '$', '2', '.', ',', 'ARS'),
(24, 'Bangladeshi Taka', 'Tk', '2', ',', '.', 'BDT'),
(25, 'United Arab Emirates Dirham', 'DH ', '2', ',', '.', 'AED'),
(26, 'Hong Kong Dollar', '$', '2', ',', '.', 'HKD'),
(27, 'Indonesian Rupiah', 'Rp', '2', ',', '.', 'IDR'),
(28, 'Peso Mexicano', '$', '2', ',', '.', 'MXN'),
(29, 'Egyptian Pound', '&pound;', '2', ',', '.', 'EGP'),
(30, 'Peso Colombiano', '$', '2', '.', ',', 'COP'),
(31, 'West African Franc', 'CFA ', '2', ',', '.', 'XOF'),
(32, 'Chinese Renminbi', 'RMB ', '2', ',', '.', 'CNY');

-- --------------------------------------------------------

--
-- Table structure for table `currencies1`
--

CREATE TABLE `currencies1` (
  `id` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `symbol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currencies1`
--

INSERT INTO `currencies1` (`id`, `name`, `symbol`) VALUES
(1, '0.00', '0.00'),
(2, '1', '1'),
(3, '2', '2'),
(4, '3', '3'),
(5, '4', '4'),
(6, '5', '5'),
(7, '6', '6'),
(8, '7', '7'),
(9, '8', '8'),
(10, '9', '9'),
(11, '10', '10'),
(12, '15', '15'),
(13, '20', '20');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `id_detalle` int(11) NOT NULL,
  `numero_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detalle_factura`
--

INSERT INTO `detalle_factura` (`id_detalle`, `numero_factura`, `id_producto`, `cantidad`, `precio_venta`) VALUES
(211, 1, 62, 20, 8),
(218, 6, 62, 2, 8),
(217, 5, 62, 20, 8),
(213, 3, 62, 12, 8),
(216, 5, 62, 20, 8),
(210, 2, 62, 2, 8),
(208, 1, 62, 3, 8),
(219, 6, 62, 2, 8),
(220, 7, 62, 2, 8),
(223, 8, 62, 2, 8),
(221, 8, 62, 2, 8),
(222, 8, 62, 2, 8),
(224, 8, 62, 2, 8),
(225, 8, 62, 2, 8),
(226, 8, 62, 2, 8),
(227, 8, 62, 2, 8),
(228, 8, 62, 2, 8),
(229, 8, 62, 2, 8),
(230, 8, 62, 2, 8),
(231, 8, 62, 2, 8),
(232, 9, 62, 4, 8),
(233, 10, 62, 70, 8),
(234, 11, 63, 1, 8),
(236, 13, 63, 1, 8),
(235, 12, 63, 1, 8),
(241, 18, 63, 1, 8),
(243, 20, 63, 1, 8),
(245, 23, 63, 26, 0),
(247, 24, 63, 0, 0),
(240, 17, 63, 1, 8),
(242, 19, 63, 1, 8),
(244, 23, 63, 0, 0),
(246, 23, 63, 26, 0),
(237, 14, 63, 1, 8),
(238, 15, 63, 1, 8),
(239, 16, 63, 1, 8),
(248, 24, 63, 0, 0),
(249, 24, 63, 1, 0),
(250, 24, 63, 1, 0),
(251, 24, 63, 1, 8),
(252, 24, 63, 1, 8),
(253, 25, 63, 1, 8),
(254, 26, 63, 3, 8),
(255, 27, 63, 1, 8),
(256, 28, 65, 2, 1),
(257, 28, 64, 1, 2),
(258, 28, 63, 1, 8),
(259, 29, 63, 1, 8),
(260, 30, 63, 1, 8),
(263, 33, 269, 10, 3),
(265, 37, 269, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `facturas`
--

CREATE TABLE `facturas` (
  `id_factura` int(11) NOT NULL,
  `numero_factura` int(11) NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `condiciones` varchar(30) NOT NULL,
  `total_venta` varchar(20) NOT NULL,
  `estado_factura` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facturas`
--

INSERT INTO `facturas` (`id_factura`, `numero_factura`, `fecha_factura`, `id_cliente`, `id_vendedor`, `condiciones`, `total_venta`, `estado_factura`) VALUES
(91, 14, '2020-08-22 17:01:56', 13, 1, '1', '8.72', 1),
(92, 15, '2020-08-22 17:06:03', 13, 1, '1', '8.72', 1),
(93, 16, '2020-08-22 17:06:37', 13, 1, '1', '8.72', 1),
(94, 17, '2020-08-22 17:07:06', 13, 1, '1', '8.72', 1),
(78, 1, '2020-08-18 19:30:43', 11, 1, '1', '206.08', 1),
(79, 2, '2020-08-18 19:50:06', 13, 1, '1', '17.92', 1),
(80, 3, '2020-08-18 19:58:06', 13, 1, '1', '107.52', 1),
(81, 4, '2020-08-18 20:06:40', 13, 1, '1', '0', 1),
(82, 5, '2020-08-18 20:10:25', 12, 1, '1', '179.2', 1),
(83, 6, '2020-08-18 20:13:28', 13, 1, '1', '17.92', 1),
(84, 7, '2020-08-18 20:14:51', 11, 1, '1', '17.92', 1),
(85, 8, '2020-08-18 20:39:20', 11, 1, '1', '197.12', 1),
(86, 9, '2020-08-19 15:15:11', 13, 1, '1', '35.84', 1),
(87, 10, '2020-08-22 16:20:41', 13, 1, '1', '610.4', 1),
(88, 11, '2020-08-22 16:30:24', 13, 1, '1', '8.72', 1),
(89, 12, '2020-08-22 16:31:50', 13, 1, '1', '8.72', 1),
(90, 13, '2020-08-22 17:01:12', 13, 1, '1', '8.72', 1),
(95, 18, '2020-08-22 17:07:54', 12, 1, '1', '8.72', 1),
(96, 19, '2020-08-22 17:08:42', 12, 1, '1', '8.72', 1),
(97, 20, '2020-08-22 17:15:44', 12, 1, '1', '8.72', 1),
(98, 21, '2020-08-22 17:17:04', 12, 1, '1', '0', 1),
(99, 22, '2020-08-22 17:18:00', 12, 1, '1', '0', 1),
(100, 23, '2020-08-22 17:19:09', 12, 1, '1', '0', 1),
(101, 24, '2020-08-22 17:20:57', 12, 1, '1', '17.44', 1),
(102, 25, '2020-08-22 17:21:42', 12, 1, '1', '8.72', 1),
(103, 26, '2020-08-22 17:24:45', 12, 1, '1', '26.16', 1),
(104, 27, '2020-08-22 17:25:54', 11, 1, '1', '8.72', 1),
(105, 28, '2020-08-22 17:26:21', 11, 1, '1', '13.08', 1),
(106, 29, '2020-08-22 17:30:15', 11, 1, '1', '8.72', 1),
(107, 30, '2020-08-22 17:30:27', 11, 1, '1', '8.72', 1),
(108, 31, '2020-08-24 03:23:35', 14, 2, '1', '65.4', 1),
(109, 32, '2020-08-26 00:47:22', 15, 2, '1', '10.9', 1),
(110, 33, '2020-08-26 00:48:48', 15, 2, '1', '32.7', 1),
(111, 34, '2020-08-26 01:13:21', 15, 2, '1', '1.09', 1),
(112, 35, '2020-08-26 21:57:37', 15, 2, '1', '3.27', 1),
(113, 36, '2020-09-16 01:07:39', 14, 2, '1', '0', 1),
(114, 37, '2020-09-17 22:28:07', 14, 2, '1', '913.92', 1),
(115, 38, '2020-09-17 22:28:43', 14, 1, '1', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `nota` varchar(255) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `historial`
--

INSERT INTO `historial` (`id_historial`, `id_producto`, `user_id`, `fecha`, `nota`, `referencia`, `cantidad`) VALUES
(1, 1, 1, '2020-08-01 11:03:10', ' agregÃ³ 10 producto(s) al inventario', 'PI0002', 10),
(5, 1, 1, '2020-08-04 16:01:42', ' agregÃ³ 20 producto(s) al inventario', 'hfh', 20),
(6, 5, 1, '2020-08-04 16:43:47', ' agregÃ³ 2 producto(s) al inventario', 'PI0009', 2),
(7, 6, 1, '2020-08-04 18:42:31', ' agregÃ³ 2 producto(s) al inventario', 'PI00010', 2),
(8, 8, 1, '2020-08-05 19:00:05', ' agregÃ³ 2 producto(s) al inventario', 'PI0005', 2),
(9, 33, 1, '2020-08-06 17:02:40', ' agregÃ³ 20 producto(s) al inventario', 'PI0002-9', 20),
(10, 31, 1, '2020-08-06 17:15:34', ' agregÃ³ 100 producto(s) al inventario', '', 100),
(11, 34, 1, '2020-08-06 17:15:50', ' agregÃ³ 20 producto(s) al inventario', 'PI0002-22', 20),
(12, 34, 1, '2020-08-06 18:15:08', ' agregÃ³ 20 producto(s) al inventario', '', 20),
(13, 35, 1, '2020-08-06 18:25:29', ' agregÃ³ 123 producto(s) al inventario', 'PI0002-90', 123),
(14, 36, 1, '2020-08-06 18:25:47', ' agregÃ³ 123 producto(s) al inventario', 'PI0002-91', 123),
(15, 37, 1, '2020-08-06 18:25:49', ' agregÃ³ 123 producto(s) al inventario', 'PI0002-92', 123),
(16, 38, 1, '2020-08-06 18:25:50', ' agregÃ³ 123 producto(s) al inventario', 'PI0002-93', 123),
(17, 39, 1, '2020-08-06 18:25:51', ' agregÃ³ 123 producto(s) al inventario', 'PI0002-94', 123),
(18, 40, 1, '2020-08-06 18:25:52', ' agregÃ³ 123 producto(s) al inventario', 'PI0002-95', 123),
(19, 41, 1, '2020-08-06 18:25:53', ' agregÃ³ 123 producto(s) al inventario', 'PI0002-96', 123),
(20, 42, 1, '2020-08-06 18:25:54', ' agregÃ³ 123 producto(s) al inventario', 'PI0002-97', 123),
(21, 43, 1, '2020-08-06 18:25:55', ' agregÃ³ 123 producto(s) al inventario', 'PI0002-98', 123),
(22, 44, 1, '2020-08-06 18:25:56', ' agregÃ³ 123 producto(s) al inventario', 'PI0002-99', 123),
(23, 45, 1, '2020-08-06 18:25:58', ' agregÃ³ 123 producto(s) al inventario', 'PI0002-911', 123),
(24, 46, 1, '2020-08-06 18:26:00', ' agregÃ³ 123 producto(s) al inventario', 'PI0002-912', 123),
(25, 47, 1, '2020-08-06 18:26:01', ' agregÃ³ 123 producto(s) al inventario', 'PI0002-913', 123),
(26, 48, 1, '2020-08-06 18:26:02', ' agregÃ³ 123 producto(s) al inventario', 'PI0002-914', 123),
(27, 49, 1, '2020-08-06 18:26:03', ' agregÃ³ 123 producto(s) al inventario', 'PI0002-915', 123),
(28, 50, 1, '2020-08-06 18:26:04', ' agregÃ³ 123 producto(s) al inventario', 'PI0002-916', 123),
(29, 51, 1, '2020-08-06 18:26:05', ' agregÃ³ 123 producto(s) al inventario', 'PI0002-917', 123),
(30, 50, 1, '2020-08-06 19:05:15', ' agregÃ³ 20 producto(s) al inventario', '', 20),
(31, 52, 1, '2020-08-06 19:39:06', ' agregÃ³ 20 producto(s) al inventario', 'P12', 20),
(32, 53, 1, '2020-08-07 15:33:15', ' agregÃ³ 20 producto(s) al inventario', 'PI0002', 20),
(33, 54, 1, '2020-08-07 17:00:31', ' agregÃ³ 20 producto(s) al inventario', 'PI00003', 20),
(34, 55, 1, '2020-08-07 17:25:09', ' agregÃ³ 100 producto(s) al inventario', 'PI0001', 100),
(35, 56, 1, '2020-08-07 17:25:59', ' agregÃ³ 100 producto(s) al inventario', 'PI0001-1', 100),
(36, 57, 1, '2020-08-07 18:07:53', ' agregÃ³ 20 producto(s) al inventario', 'PI0002', 20),
(37, 58, 1, '2020-08-07 18:21:52', ' agregÃ³ 20 producto(s) al inventario', 'PI0003', 20),
(38, 58, 1, '2020-08-07 18:23:50', ' agregÃ³ 100 producto(s) al inventario', 'PEDIDO ADHEPLAST', 100),
(39, 58, 1, '2020-08-07 20:17:34', ' agregÃ³ 2147483647 producto(s) al inventario', '', 2147483647),
(40, 58, 1, '2020-08-07 20:17:45', ' agregÃ³ 222 producto(s) al inventario', '', 222),
(41, 58, 1, '2020-08-07 20:18:05', ' agregÃ³ 2147483647 producto(s) al inventario', '', 2147483647),
(42, 58, 1, '2020-08-07 20:18:12', ' eliminÃ³ 2147483647 producto(s) del inventario', '', 2147483647),
(43, 58, 1, '2020-08-07 20:18:22', ' agregÃ³ 2147483647 producto(s) al inventario', '', 2147483647),
(44, 58, 1, '2020-08-08 15:52:28', ' agregÃ³ 20 producto(s) al inventario', '', 20),
(45, 57, 1, '2020-08-08 15:52:36', ' agregÃ³ 20 producto(s) al inventario', '', 20),
(46, 58, 1, '2020-08-08 15:56:41', ' agregÃ³ 1000 producto(s) al inventario', '', 1000),
(47, 57, 1, '2020-08-08 15:56:48', ' agregÃ³ 1000 producto(s) al inventario', '', 1000),
(48, 58, 1, '2020-08-08 16:35:25', ' eliminÃ³ 999 producto(s) del inventario', '', 999),
(49, 58, 1, '2020-08-08 16:35:32', ' agregÃ³ 999 producto(s) al inventario', '', 999),
(50, 58, 1, '2020-08-08 16:55:17', ' agregÃ³ 1000 producto(s) al inventario', '', 1000),
(51, 59, 1, '2020-08-08 17:00:14', ' agregÃ³ 10000 producto(s) al inventario', 'C0001', 10000),
(52, 59, 1, '2020-08-08 17:11:35', ' agregÃ³ 20 producto(s) al inventario', '', 20),
(53, 59, 1, '2020-08-08 17:11:55', '', '', 20),
(54, 59, 1, '2020-08-08 17:14:19', '', '20', 0),
(55, 59, 1, '2020-08-08 17:14:56', '', '', 20),
(56, 59, 1, '2020-08-08 17:14:58', '', '', 20),
(57, 59, 1, '2020-08-08 17:15:04', '', '', 20),
(58, 59, 1, '2020-08-08 17:15:08', '', '', 20),
(59, 59, 1, '2020-08-08 17:15:23', '', '', 20),
(60, 59, 1, '2020-08-08 17:15:31', '', '', 20),
(61, 59, 1, '2020-08-08 17:15:41', '', 'ghjhgjhgjghjghjhg', 20),
(62, 59, 1, '2020-08-08 17:16:00', '', ' eliminÃ³ 20 producto(s) del inventario', 0),
(63, 59, 1, '2020-08-08 17:17:08', '', '', 20),
(64, 60, 1, '2020-08-08 17:18:01', '', ' agregÃ³ 10000 producto(s) al inventario', 0),
(65, 61, 1, '2020-08-08 17:19:38', '', 'C0003', 1000),
(66, 61, 1, '2020-08-08 17:22:44', '', 'PEDIDO ', 20),
(67, 62, 1, '2020-08-10 15:20:21', '', 'P001', 100),
(68, 63, 1, '2020-08-10 15:20:57', '', 'P002', 100),
(69, 64, 1, '2020-08-10 15:22:20', '', 'HE001', 100),
(70, 65, 1, '2020-08-10 15:23:50', '', 'IL001', 100),
(71, 66, 1, '2020-08-10 15:24:02', '', 'IL002', 100),
(72, 67, 1, '2020-08-10 15:24:33', '', 'IL003', 100),
(73, 68, 1, '2020-08-10 15:47:17', '', 'CI0001', 100),
(74, 69, 1, '2020-08-10 15:47:28', '', 'CI0002', 100),
(75, 70, 1, '2020-08-10 15:47:36', '', 'CI0003', 100),
(76, 71, 1, '2020-08-10 15:47:48', '', 'CI0004', 100),
(77, 71, 1, '2020-08-12 20:44:13', '', '', 20),
(78, 71, 1, '2020-08-13 19:53:17', '', '', 80),
(79, 71, 1, '2020-08-18 17:59:32', '', '', 20),
(80, 62, 1, '2020-08-18 19:30:26', '', '', 99);

-- --------------------------------------------------------

--
-- Table structure for table `historial_compras`
--

CREATE TABLE `historial_compras` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `neto` varchar(255) NOT NULL,
  `iva` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `proveedor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `historial_compras`
--

INSERT INTO `historial_compras` (`id`, `fecha`, `neto`, `iva`, `id_user`, `proveedor`) VALUES
(157, '2020-09-23', '330.00', 12, 2, 'Pola 1'),
(160, '2020-09-23', '30.00', 12, 2, 'Polar');

-- --------------------------------------------------------

--
-- Table structure for table `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `impuesto` int(2) NOT NULL,
  `moneda` varchar(6) NOT NULL,
  `descuento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `impuesto`, `moneda`, `descuento`) VALUES
(1, 12, '$', 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_producto` int(11) NOT NULL,
  `codigo_producto` char(20) NOT NULL,
  `nombre_producto` char(255) NOT NULL,
  `descripcion_producto` varchar(255) NOT NULL,
  `proveedor_producto` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `precio_producto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_producto`, `codigo_producto`, `nombre_producto`, `descripcion_producto`, `proveedor_producto`, `cantidad`, `date_added`, `precio_producto`, `id_categoria`) VALUES
(62, 'PI001', 'PINTURA LATEX DE COLOR BLANCO HUESO', 'GALON', 'LATINA ', 0, '2020-08-10 15:20:21', 8, 16),
(63, 'PE001', 'PINTURA ESMALTE DE COLOR BLANCO MATE', 'GALON', 'LATINA ', 0, '2020-08-10 15:20:57', 8, 16),
(64, 'HE001', 'DESTORNILLADOR', 'ESTRELLA PEQUEÃ‘O', 'STANLEY', 0, '2020-08-10 15:22:20', 2, 18),
(65, 'IL001', 'FOTOS LED', '9W', 'ANDRETTI', 5, '2020-08-10 15:23:50', 1, 19),
(66, 'IL002', 'FOTOS LED', '12W', 'ANDRETTI', 0, '2020-08-10 15:24:02', 2, 19),
(67, 'IL003', 'FOTOS LED', '25W', 'UNIC LIGHT', 116, '2020-08-10 15:24:33', 3, 19),
(68, 'CI0001', 'CINTA', 'TRASNPARENTE GRNADE', 'ADHEPLAST', 126, '2020-08-10 15:47:17', 3, 25),
(69, 'CI0002', 'CINTA', 'TRASNPARENTE PEQUEÃ‘A', 'ADHEPLAST', 150, '2020-08-10 15:47:28', 2, 25),
(70, 'CI0003', 'CINTA', 'MARRON PEQUEÃ‘A', 'ADHEPLAST', 210, '2020-08-10 15:47:36', 2, 25),
(71, 'CI0004', 'CINTA', 'MARRON GRANDE', 'ADHEPLAST', 278, '2020-08-10 15:47:48', 3, 25),
(288, 'CI000401158869505', 'CINTA', 'MARRON GRANDE', 'Polar', 10, '2020-09-23 21:36:14', 3, 25),
(287, 'CI000401158869506', 'CINTA', 'MARRON GRANDE', 'Polar', 10, '2020-09-23 21:33:45', 3, 25),
(286, 'CI00040115886950', 'CINTA', 'MARRON GRANDE', 'Polar', 10, '2020-09-23 21:32:00', 3, 25),
(285, 'CI00040115886957', 'CINTA', 'MARRON GRANDE', 'Polar', 10, '2020-09-23 21:27:43', 3, 25),
(284, 'CI0004011588695', 'CINTA', 'MARRON GRANDE', 'Pola 1', 1, '2020-09-23 16:48:49', 3, 25),
(283, 'CI000401158869', 'CINTA', 'MARRON GRANDE', 'Pola 1', 10, '2020-09-23 16:42:39', 3, 25),
(282, 'CI000401158860', 'CINTA', 'MARRON GRANDE', 'Pola 1', 10, '2020-09-23 16:42:12', 3, 25),
(281, 'CI000401158866', 'CINTA', 'MARRON GRANDE', 'Pola 1', 10, '2020-09-23 16:40:33', 3, 25),
(280, 'CI000401158863', 'CINTA', 'MARRON GRANDE', 'Pola 1', 10, '2020-09-23 16:40:18', 3, 25),
(279, 'CI00040115886', 'CINTA', 'MARRON GRANDE', 'Polar', 10, '2020-09-23 16:38:38', 3, 25),
(276, 'CI0004035770317', 'CINTA', 'MARRON GRANDE', 'Pola 1', 333, '2020-09-23 03:36:20', 3, 25),
(277, 'CI0004035770306', 'CINTA', 'MARRON GRANDE', 'Pola 1', 333, '2020-09-23 03:37:08', 3, 25),
(304, 'IL00303', 'FOTOS LED', '25W', 'Polar', 117, '2020-09-23 22:46:09', 3, 19);

-- --------------------------------------------------------

--
-- Table structure for table `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `numero_impusto` varchar(255) NOT NULL,
  `sitio_web` varchar(255) DEFAULT NULL,
  `telefono_empresa` varchar(255) DEFAULT NULL,
  `nombre_contacto` varchar(255) NOT NULL,
  `apellido_contacto` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `direccion` text NOT NULL,
  `nombre_empresa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proveedores`
--

INSERT INTO `proveedores` (`id`, `numero_impusto`, `sitio_web`, `telefono_empresa`, `nombre_contacto`, `apellido_contacto`, `email`, `telefono`, `direccion`, `nombre_empresa`) VALUES
(15, '12312', 'Polar.com', '123123', 'Jesus', 'Villalta', 'root@root.com', '123123', 'adads', 'Polar'),
(18, '123demo', 'demo.com', '(000)000-000', 'demo', 'demo', 'demo@gmail.com', '(000)-000-00', 'demo, demo, demo, demo, (2020)', 'demo'),
(19, 'demo1', 'demo1.com', '(000)', 'demo1', 'demo1', 'demo@gmail.com', '(0000)', 'demo1, demo, demo, demo1, (123)', 'demo1'),
(20, 'd212', 'd.com', '(0000)', 'd', 'd', 'dasdas@adasdasd.com', '(0000)', 'd, d, d, d, (1212)', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `tmp`
--

CREATE TABLE `tmp` (
  `id_tmp` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_tmp` int(11) NOT NULL,
  `precio_tmp` double(8,2) DEFAULT NULL,
  `session_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tmp`
--

INSERT INTO `tmp` (`id_tmp`, `id_producto`, `cantidad_tmp`, `precio_tmp`, `session_id`) VALUES
(294, 62, 1, 7.50, '6d8rdvoibo5i79an62qkueqo12'),
(293, 62, 1, 7.50, 'aj7vgfv1lq246npl6anl3o09t2'),
(292, 62, 1, 7.50, 'aj7vgfv1lq246npl6anl3o09t2'),
(291, 62, 1, 7.50, 'aj7vgfv1lq246npl6anl3o09t2'),
(386, 65, 10, 1.00, 'th9u6c3snn2oeubobb3q97fg31'),
(385, 64, 10, 2.00, 'th9u6c3snn2oeubobb3q97fg31'),
(384, 64, 10, 2.00, 'th9u6c3snn2oeubobb3q97fg31'),
(383, 64, 10, 2.00, 'th9u6c3snn2oeubobb3q97fg31'),
(382, 64, 10, 2.00, 'th9u6c3snn2oeubobb3q97fg31'),
(387, 64, 10, 2.00, 'th9u6c3snn2oeubobb3q97fg31'),
(388, 65, 10, 1.00, 'th9u6c3snn2oeubobb3q97fg31'),
(389, 66, 10, 2.00, 'th9u6c3snn2oeubobb3q97fg31'),
(390, 66, 10, 2.00, 'th9u6c3snn2oeubobb3q97fg31'),
(391, 64, 10, 2.00, 'th9u6c3snn2oeubobb3q97fg31'),
(392, 64, 10, 2.00, 'th9u6c3snn2oeubobb3q97fg31'),
(393, 64, 10, 2.00, 'th9u6c3snn2oeubobb3q97fg31'),
(394, 64, 1, 2.00, 'ud0ijv28q5cgoqc8cbmckf4270'),
(395, 64, 1, 2.00, 'ud0ijv28q5cgoqc8cbmckf4270'),
(396, 64, 1, 2.00, 'ud0ijv28q5cgoqc8cbmckf4270'),
(464, 71, 10, 3.00, 'vtq8pr5qj2bgkf6gmtkehd02j8'),
(447, 71, 1, 3.00, '2o3vc44qrmr425oniuoqe0bl8c'),
(446, 71, 10, 3.00, '2o3vc44qrmr425oniuoqe0bl8c'),
(445, 71, 10, 3.00, '2o3vc44qrmr425oniuoqe0bl8c'),
(440, 71, 10, 3.00, '2o3vc44qrmr425oniuoqe0bl8c'),
(444, 71, 10, 3.00, '2o3vc44qrmr425oniuoqe0bl8c'),
(438, 71, 10, 3.00, '2o3vc44qrmr425oniuoqe0bl8c'),
(449, 71, 10, 3.00, '2o3vc44qrmr425oniuoqe0bl8c'),
(485, 122, 10, 23123.00, 'g31h1v2l48cgm83enm0s86919s'),
(466, 70, 10, 2.00, 's5cq7l67brvg3vdulikra6l16a'),
(474, 70, 10, 2.00, 'g31h1v2l48cgm83enm0s86919s'),
(484, 71, 10, 3.00, 's5cq7l67brvg3vdulikra6l16a'),
(479, 71, 10, 3.00, 'g31h1v2l48cgm83enm0s86919s'),
(478, 68, 10, 3.00, 'g31h1v2l48cgm83enm0s86919s'),
(482, 121, 10, 2.00, 'g31h1v2l48cgm83enm0s86919s'),
(487, 137, 10, 3.00, 'nce880d4jo2u0p6466l8uo0p8p'),
(488, 71, 10, 3.00, 'cmkr3t4u4t0bbo9gv6cveeefcr'),
(597, 304, 1, 3.00, '4hdlcfcqqre33a2lla4nh0qpdp'),
(589, 269, 110, 3.00, ''),
(590, 270, 10, 3.00, ''),
(588, 270, 10, 3.00, ''),
(594, 276, 10, 3.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `user_name`, `user_password_hash`, `user_email`, `date_added`) VALUES
(1, 'Efrain Santiago', 'Vazquez Vazquez', 'Bacilio', '$2y$10$hQdnBu8UOk7eLs5TFsXJqOpxJfW64oqGIdx5Wfl3fYJOuYMBGDQu.', 'bacichato@gmal.com', '2020-07-23 19:16:55'),
(2, 'Admin', 'Admin', 'admin', '$2y$10$uubsztczDNzO8WVe.w4wCebF.ATW/syygbRByhTRNB0ayROodWgZu', 'Admin@gmail.com', '2020-07-24 20:00:05'),
(4, 'root', 'root', 'adminn', '123456', 'admin@gmail.com', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `codigo_producto` (`RUC_cliente`);

--
-- Indexes for table `compra_productos`
--
ALTER TABLE `compra_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_historial_compra` (`id_historial_compra`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies1`
--
ALTER TABLE `currencies1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `descuento` (`name`);

--
-- Indexes for table `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `numero_cotizacion` (`numero_factura`,`id_producto`);

--
-- Indexes for table `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id_factura`),
  ADD UNIQUE KEY `numero_cotizacion` (`numero_factura`);

--
-- Indexes for table `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `historial_compras`
--
ALTER TABLE `historial_compras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `codigo_producto` (`codigo_producto`);

--
-- Indexes for table `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp`
--
ALTER TABLE `tmp`
  ADD PRIMARY KEY (`id_tmp`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `compra_productos`
--
ALTER TABLE `compra_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `historial_compras`
--
ALTER TABLE `historial_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;

--
-- AUTO_INCREMENT for table `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tmp`
--
ALTER TABLE `tmp`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=598;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index', AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `compra_productos`
--
ALTER TABLE `compra_productos`
  ADD CONSTRAINT `id_historial_compra` FOREIGN KEY (`id_historial_compra`) REFERENCES `historial_compras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
