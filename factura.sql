-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2020 a las 20:20:26
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `factura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(255) NOT NULL,
  `descripcion_categoria` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
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
-- Estructura de tabla para la tabla `clientes`
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
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `RUC_cliente`, `nombre_cliente`, `ciudad_cliente`, `telefono_cliente`, `direccion_cliente`, `date_added`) VALUES
(11, '0916593338002', 'Rafael', 'guayaquil', '0979472490', 'Capitan Najera 4511 entre La 17ava y 18ava', '2020-07-28 18:59:29'),
(12, '0916593338001', 'jose tavares', 'guayaquil', '0979472490', 'capitan najera 4609 e/ 19 ava y 18 ava', '2020-08-07 19:34:03'),
(13, '0922353586', 'Ronny FernÃ¡ndez', 'guayaquil', '0990779521', 'Brasil 1702 Jose de antepara', '2020-08-15 22:25:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `currencies`
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
-- Volcado de datos para la tabla `currencies`
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
(17, 'Swiss Franc', 'CHF ', '2', '''', '.', 'CHF'),
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
-- Estructura de tabla para la tabla `currencies1`
--

CREATE TABLE `currencies1` (
  `id` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `symbol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `currencies1`
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
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `id_detalle` int(11) NOT NULL,
  `numero_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_factura`
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
(232, 9, 62, 4, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
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
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id_factura`, `numero_factura`, `fecha_factura`, `id_cliente`, `id_vendedor`, `condiciones`, `total_venta`, `estado_factura`) VALUES
(78, 1, '2020-08-18 19:30:43', 11, 1, '1', '206.08', 1),
(79, 2, '2020-08-18 19:50:06', 13, 1, '1', '17.92', 1),
(80, 3, '2020-08-18 19:58:06', 13, 1, '1', '107.52', 1),
(81, 4, '2020-08-18 20:06:40', 13, 1, '1', '0', 1),
(82, 5, '2020-08-18 20:10:25', 12, 1, '1', '179.2', 1),
(83, 6, '2020-08-18 20:13:28', 13, 1, '1', '17.92', 1),
(84, 7, '2020-08-18 20:14:51', 11, 1, '1', '17.92', 1),
(85, 8, '2020-08-18 20:39:20', 11, 1, '1', '197.12', 1),
(86, 9, '2020-08-19 15:15:11', 13, 1, '1', '35.84', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
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
-- Volcado de datos para la tabla `historial`
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
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `impuesto` int(2) NOT NULL,
  `moneda` varchar(6) NOT NULL,
  `descuento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `impuesto`, `moneda`, `descuento`) VALUES
(1, 12, '$', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
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
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_producto`, `codigo_producto`, `nombre_producto`, `descripcion_producto`, `proveedor_producto`, `cantidad`, `date_added`, `precio_producto`, `id_categoria`) VALUES
(62, 'PI001', 'PINTURA LATEX DE COLOR BLANCO HUESO', 'GALON', 'LATINA ', 70, '2020-08-10 15:20:21', 8, 16),
(63, 'PE001', 'PINTURA ESMALTE DE COLOR BLANCO MATE', 'GALON', 'LATINA ', 39, '2020-08-10 15:20:57', 8, 16),
(64, 'HE001', 'DESTORNILLADOR', 'ESTRELLA PEQUEÃ‘O', 'STANLEY', 84, '2020-08-10 15:22:20', 2, 18),
(65, 'IL001', 'FOTOS LED', '9W', 'ANDRETTI', 98, '2020-08-10 15:23:50', 1, 19),
(66, 'IL002', 'FOTOS LED', '12W', 'ANDRETTI', 97, '2020-08-10 15:24:02', 2, 19),
(67, 'IL003', 'FOTOS LED', '25W', 'UNIC LIGHT', 100, '2020-08-10 15:24:33', 3, 19),
(68, 'CI0001', 'CINTA', 'TRASNPARENTE GRNADE', 'ADHEPLAST', 100, '2020-08-10 15:47:17', 3, 25),
(69, 'CI0002', 'CINTA', 'TRASNPARENTE PEQUEÃ‘A', 'ADHEPLAST', 100, '2020-08-10 15:47:28', 2, 25),
(70, 'CI0003', 'CINTA', 'MARRON PEQUEÃ‘A', 'ADHEPLAST', 100, '2020-08-10 15:47:36', 2, 25),
(71, 'CI0004', 'CINTA', 'MARRON GRANDE', 'ADHEPLAST', 220, '2020-08-10 15:47:48', 3, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp`
--

CREATE TABLE `tmp` (
  `id_tmp` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_tmp` int(11) NOT NULL,
  `precio_tmp` double(8,2) DEFAULT NULL,
  `session_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tmp`
--

INSERT INTO `tmp` (`id_tmp`, `id_producto`, `cantidad_tmp`, `precio_tmp`, `session_id`) VALUES
(294, 62, 1, 7.50, '6d8rdvoibo5i79an62qkueqo12'),
(293, 62, 1, 7.50, 'aj7vgfv1lq246npl6anl3o09t2'),
(292, 62, 1, 7.50, 'aj7vgfv1lq246npl6anl3o09t2'),
(291, 62, 1, 7.50, 'aj7vgfv1lq246npl6anl3o09t2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
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
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `user_name`, `user_password_hash`, `user_email`, `date_added`) VALUES
(1, 'Efrain Santiago', 'Vazquez Vazquez', 'Bacilio', '$2y$10$hQdnBu8UOk7eLs5TFsXJqOpxJfW64oqGIdx5Wfl3fYJOuYMBGDQu.', 'bacichato@gmal.com', '2020-07-23 19:16:55'),
(2, 'Jose', 'Tavares', 'admin', '$2y$10$oLQOGctHrudh2ISkNqqc2Og5MdTB1Wq82diisvDZBGwfWAx51WaiK', 'josetavaresb@gmail.com', '2020-07-24 20:00:05');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `codigo_producto` (`RUC_cliente`);

--
-- Indices de la tabla `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `currencies1`
--
ALTER TABLE `currencies1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `descuento` (`name`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `numero_cotizacion` (`numero_factura`,`id_producto`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id_factura`),
  ADD UNIQUE KEY `numero_cotizacion` (`numero_factura`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `codigo_producto` (`codigo_producto`);

--
-- Indices de la tabla `tmp`
--
ALTER TABLE `tmp`
  ADD PRIMARY KEY (`id_tmp`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;
--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT de la tabla `tmp`
--
ALTER TABLE `tmp`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index', AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
