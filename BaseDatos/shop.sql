-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2017 a las 00:18:19
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `shop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE IF NOT EXISTS `carrito` (
  `idCarrito` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `fechaCreacion` date DEFAULT NULL,
  `sold` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idCarrito`),
  KEY `idCliente` (`idCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`idCarrito`, `idCliente`, `fechaCreacion`, `sold`) VALUES
(5, 2, '2017-10-30', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `enable` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombre`, `enable`) VALUES
(1, 'Celulares y Smartphone', 1),
(2, 'Smartwatches y accesorios', 0),
(3, 'Tv y Video', 0),
(4, 'Audio', 1),
(5, 'CÃ¡maras y Video', 0),
(6, 'ComputaciÃ³n', 1),
(7, 'Portatiles', 1),
(8, 'Consolas y Videojuegos', 0),
(9, 'Accesorios de Computo', 1),
(10, 'Accesorios de Laptops', 1),
(11, 'Zona Gamer', 1),
(12, 'Impresoras y Escaners', 1),
(13, 'Ropa de Mujer', 1),
(14, 'Zapatos Mujer', 1),
(15, 'Ropa de Hombre', 1),
(16, 'Zapatos Hombre', 1),
(17, 'Joyeria', 1),
(18, 'Perfume', 1),
(19, 'Cuidado Personal', 1),
(20, 'Maquillaje', 1),
(21, 'Tablet', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `apellidos` varchar(80) DEFAULT NULL,
  `docIdentidad` varchar(80) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `idTipoCliente` int(11) NOT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL,
  `enable` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idCliente`),
  KEY `idTipoCliente` (`idTipoCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombre`, `apellidos`, `docIdentidad`, `direccion`, `telefono`, `idTipoCliente`, `correo`, `password`, `enable`) VALUES
(1, 'Administrador', 'Master', '12345678', 'Direccion', '987456321', 1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'Jorge', 'Gonzales', '12345678', 'Direccion', '987456321', 2, 'jorge@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(3, 'Milagros', 'Guarniz', '71982447', NULL, '921866944', 2, 'elig@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `idComentario` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `puntaje` int(11) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `fechaCreacion` date NOT NULL,
  `recomendar` tinyint(1) NOT NULL,
  `valido` tinyint(1) NOT NULL,
  `enable` tinyint(1) NOT NULL,
  PRIMARY KEY (`idComentario`),
  KEY `idProducto` (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`idComentario`, `idProducto`, `alias`, `email`, `puntaje`, `titulo`, `descripcion`, `fechaCreacion`, `recomendar`, `valido`, `enable`) VALUES
(1, 29, 'Milagros', 'elig.1614@gmail.co', 3, 'Buen producto', 'Excelente producto', '2017-10-26', 1, 1, 1),
(4, 29, 'Milagros', 'elig.1614@gmail.com', 2, '', '', '2017-10-26', 1, 1, 1),
(5, 29, 'Milagros', 'elig.1614@gmail.com', 4, '', 'Producto unico', '2017-10-27', 1, 1, 1),
(6, 29, 'Milagros', 'elig.1614@gmail.com', 3, '', '', '2017-10-27', 1, 1, 1),
(7, 29, 'Milly', 'elig.1614@gmail.com', 3, 'ExampleEdit', 'excelente', '2017-10-29', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `idCompra` int(11) NOT NULL AUTO_INCREMENT,
  `idCarrito` int(11) NOT NULL,
  `fechaCreacion` date DEFAULT NULL,
  `enable` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idCompra`),
  KEY `idCarrito` (`idCarrito`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detacarrito`
--

CREATE TABLE IF NOT EXISTS `detacarrito` (
  `idCarrito` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(9,2) DEFAULT NULL,
  `enable` tinyint(1) DEFAULT NULL,
  KEY `idCarrito` (`idCarrito`),
  KEY `idProducto` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detacompra`
--

CREATE TABLE IF NOT EXISTS `detacompra` (
  `idCompra` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(9,2) DEFAULT NULL,
  `enable` tinyint(1) DEFAULT NULL,
  KEY `idCompra` (`idCompra`),
  KEY `idProducto` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `idMarca` int(11) NOT NULL AUTO_INCREMENT,
  `idSubcategoria` int(11) NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `enable` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idMarca`, `idSubcategoria`, `nombre`, `enable`) VALUES
(3, 1, 'Apple', 1),
(4, 2, 'Huawei', 1),
(5, 2, 'Lenovo', 1),
(6, 2, 'Lg', 1),
(7, 2, 'Motorola', 1),
(8, 2, 'Nokia', 1),
(9, 2, 'Samsung', 1),
(10, 2, 'Sony', 1),
(11, 2, 'Verykool', 1),
(12, 2, 'Xiaomi', 1),
(13, 4, 'Apple', 1),
(14, 4, 'Xiaomi', 1),
(15, 4, 'Power bank', 1),
(16, 4, 'Intense devices', 1),
(17, 4, 'Tripp-lite', 1),
(18, 4, 'Teros', 1),
(19, 4, 'Kingston', 1),
(20, 4, 'Hp', 1),
(21, 4, 'Generic', 1),
(22, 4, 'Advance', 1),
(23, 103, 'Samsung', 1),
(24, 103, 'Advance', 1),
(25, 103, 'Lenovo', 1),
(26, 103, 'Landbyte', 1),
(27, 103, 'Alcatel', 1),
(28, 104, 'Dell', 1),
(29, 104, 'Perfect choice', 1),
(30, 104, 'Asus', 1),
(31, 104, 'Genius', 1),
(32, 104, 'Advance', 1),
(33, 104, 'Hp', 1),
(35, 105, 'Tp-link', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(100) DEFAULT NULL,
  `nombrePortada` varchar(255) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `precio` decimal(9,0) DEFAULT NULL,
  `descripcionCorta` text,
  `descripcionLarga` text,
  `garantia` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `contenidoCaja` text,
  `largoCaja` decimal(9,0) DEFAULT NULL,
  `anchoCaja` decimal(9,0) DEFAULT NULL,
  `altoCaja` decimal(9,0) DEFAULT NULL,
  `pesoCaja` decimal(9,0) DEFAULT NULL,
  `FechaCreacion` date DEFAULT NULL,
  `vip` tinyint(1) NOT NULL,
  `image` varchar(80) NOT NULL,
  `idSubCategoria` int(11) DEFAULT NULL,
  `idMarca` int(11) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `enable` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `idSubCategoria` (`idSubCategoria`),
  KEY `idMarca` (`idMarca`),
  KEY `idCliente` (`idCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `codigo`, `nombrePortada`, `modelo`, `stock`, `precio`, `descripcionCorta`, `descripcionLarga`, `garantia`, `color`, `contenidoCaja`, `largoCaja`, `anchoCaja`, `altoCaja`, `pesoCaja`, `FechaCreacion`, `vip`, `image`, `idSubCategoria`, `idMarca`, `idCliente`, `enable`) VALUES
(29, 'SSJ7', 'Nuevo Celular Samsung Galaxy J7 Blanco', 'Samsung J7', 10, '1500', 'Memoria 64 gb\r\nCamara Frontal 13 px\r\nCamara Trasera 13 px', 'Celular Samsung, 6.3 pulgadas, resoluciÃ³n 2960x1440, cÃ¡mara dual de 12 megapixels,  6GB de RAM, 64GB, 128GB o 256GB de almacenamiento interno, baterÃ­a de 3300 mAh																', '1 aÃ±o', 'Blanco', 'Memoria\r\nCargador\r\nAudifonos', '18', '18', '18', '2', '2017-10-09', 1, '1081482c0c4e05cd34356f5facf460a7.jpg', 2, 9, 1, 1),
(30, 'HUAWEIP10LITE', 'HUAWEI P10 LITE WHITE (Blanco) - 5.2 " 1920x1080, Android 7.0, LTE, Dual SIM, Desbloqueado.', 'HUAWEI P10 LITE', 20, '1132', 'ROM 32 GB\r\nRAM 3GB\r\nOctacore\r\nANDROID 7.0 NOUGAT', 'SISTEMA OPERATIVO	                                 : ANDROID 7.0 NOUGAT\r\nMARCA	                                                         :HUAWEI\r\nMODELO	                                                 :P10 LITE\r\nBANDAS Y FRECUENCIAS SOPORTADAS	:2G	1800 MHz -1900 MHz - 850 MHz - 900 MHz\r\n                                                                         3G	1700 MHz - 1900 MHz - 2100 MHz  - 850 MHz - 900 MHz\r\n                                                                         LTE	1700 MHz - 1900 MHz - 2600 MHz - 700 MHz - 850 MHz\r\nPANTALLA	TAMAÃ‘O	                         :5.2 PULG\r\nRESOLUCIÃ“N	                                         :1080 x 1920 PX\r\nNÃšCLEOS DEL PROCESADOR	                 :OCTA CORE\r\nTIPO DE PROCESADOR	                          :KIRIN 658 (2.1GHZ x 4 + 1.7GHZ x 4)\r\nMEMORIA RAM	                                          :3 GB\r\nMEMORIA ROM	                                          :32 GB\r\nSIM	                                                                  :SIM	DUAL\r\nCONECTIVIDAD	                                          :BLUETOOTH\r\nWI-FI 802.11 B/G/N\r\nCONECTOR DE AUDIO	                                   :3.5 MM\r\nDATA	                                                           :MICRO-USB 2.0\r\nCÃMARA	                                                   :POSTERIOR: 12 MP (CON LED FLASH)\r\n                                                                           :FRONTAL: 8 MP\r\nBATERIA                                                            :3000 MAH\r\nACCESORIOS	AURICULARES                         : CABLE USB - CARGADOR DE BATERIA - MANUAL DE USUARIO\r\n																																', '1 AÃ‘O', 'Blanco', 'CELULAR \r\nCABLES\r\nMANUAL', '30', '15', '30', '1', '2017-11-04', 1, '', 2, 4, 1, 1),
(31, 'J1minipro', 'Smartphone Samsung Galaxy J1 Mini Prime Blanco, 4.0", Android 6.0, Desbloqueado, Dual SIM, LTE.', 'SAMSUNG GALAXY J106M DS LTE WH ', 8, '395', 'Memoria : 8GB\r\nRAM : 1G\r\nMicro SD : Hasta 128GB', 'SISTEMA OPERATIVO	ANDROID V6.0 MARSHMALLOW\r\nMARCA	SAMSUNG\r\nMODELO	GALAXY J1 MINI PRIME\r\n\r\nPANTALLA	TAMAÃ±O	4.0 PULG\r\nRESOLUCIÃ³N	480 X 800 PX\r\nTIPO	WVGA TFT\r\n\r\nPROCESADOR	1.20 GHZ\r\nNÃšCLEOS DEL PROCESADOR	QUAD-CORE\r\nMEMORIA RAM	1 GB\r\nALMACENAMIENTO INTERNO	8 GB\r\nSIM	DUAL\r\nCONECTIVIDAD	3G - 4G LTE - BLUETOOTH - EDGE - GPRS - GPS - WI-FI\r\nPUERTOS	CONECTOR DE AUDIO	3.5 MM\r\nDATA	MICRO-USB 2.0\r\nSLOT CARD	MICRO SD (HASTA 128GB)\r\n\r\nDIMENSIONES	12.66 X 6.31 X 1.08 CM\r\nCÃMARA FRONTAL: VGA\r\nCÃMARA POSTERIOR: 5 MP FLASH LED\r\n\r\nBATERÃ­A	1500 MAH\r\nTIPO DE BATERIA	LI-ION', '1 aÃ±o', 'Blanco', 'Celular \r\nAccesorios\r\nManual', '15', '10', '7', '1', '2017-11-04', 1, '', 2, 9, 1, 1),
(32, '11', 'erwerwe', 'werwer', 11, '11', 'werwer', 'werw', 'werwer', 'werwerw', 'werwer', '11', '11', '11', '11', '2017-11-04', 0, '', 105, 35, 1, 0),
(39, 'Switch TP-Link TL-SF1005D', 'Switch TP-Link TL-SF1005D, 5 puertos RJ-45 10/100 Mbps, Auto MDI/MDIX', 'TP-Link', 3, '35', '5 puertos RJ-45 10/100 Mbps, \r\nAuto MDI/MDIX.', 'MARCA	TP-Link\r\nMODELO	TL-SF1005D\r\nTIPO	EXTERNO\r\nPUERTOS	RJ-45: 5\r\nESTÃNDAR	IEEE802.3\r\n802.3u\r\n802.3x\r\nCARACTERISTICAS GENERALES	ADMINISTRABLE	NO\r\nAUTO MDI-MDX	', '6 meses', 'Blanco', 'Equipo\r\nManual', '30', '20', '10', '1', '2017-11-05', 0, '', 105, 35, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoimage`
--

CREATE TABLE IF NOT EXISTS `productoimage` (
  `idProductoImage` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `enable` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idProductoImage`),
  KEY `idProducto` (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=148 ;

--
-- Volcado de datos para la tabla `productoimage`
--

INSERT INTO `productoimage` (`idProductoImage`, `idProducto`, `imagen`, `enable`) VALUES
(98, 30, '4c0dc3b82bf72ba6996a858a5d11ec22.jpg', 1),
(99, 30, '99aa967f25d340c60c989ff4ccd52d88.jpg', 1),
(100, 30, '6627cf49ff607fd9a9c7f1667fd388ff.jpg', 1),
(101, 30, 'c3d9b2881a7f4575057849fa3e8b70a9.jpg', 1),
(102, 30, 'f036957802bb2d7829edc308631737b6.jpg', 1),
(103, 31, '110bd9eda4eadef3f969921ebd472939.jpg', 1),
(104, 31, '46534b0b261961e6a8d7bfa1f885b70d.jpg', 1),
(105, 31, 'f7b0db0df179a3ef9f8751d6653741ec.jpg', 1),
(106, 31, '5cf7b5bf4d39c5b04775eda7be914339.jpg', 1),
(107, 31, 'a32d7a7f302ff5347a51138f27b14b7b.jpg', 1),
(111, 39, 'daaf40f43fabfa2eebe273f68d32ce81.jpg', 1),
(112, 39, 'a7990f4ef53199b00950c4e1dc988e3f.jpg', 1),
(113, 39, 'a0828beccb3e86ba7a23cfe77e972c5e.jpg', 1),
(146, 29, '1081482c0c4e05cd34356f5facf460a7.jpg', 1),
(147, 29, '4a0c27e0c1eb238d529a48e4962e5901.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoitem`
--

CREATE TABLE IF NOT EXISTS `productoitem` (
  `idProductoItem` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `enable` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idProductoItem`),
  KEY `idProducto` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE IF NOT EXISTS `subcategoria` (
  `idSubCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `idCategoria` int(11) NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `enable` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idSubCategoria`),
  KEY `idCategoria` (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`idSubCategoria`, `idCategoria`, `nombre`, `enable`) VALUES
(1, 1, 'Iphone', 1),
(2, 1, 'Smartphone Android', 1),
(3, 1, 'Celulares basicos', 0),
(4, 1, 'Accesorios de celular', 1),
(5, 2, 'Smartwhatch', 0),
(6, 2, 'Accesorios de smartwach', 0),
(7, 3, 'Televisores', 0),
(8, 3, 'Home Theater', 0),
(9, 3, 'Blu-ray', 0),
(10, 4, 'Mp3 y Mp4', 1),
(11, 4, 'AudÃ­fonos', 1),
(12, 4, 'Parlantes', 1),
(13, 5, 'CÃ¡maras Digitales', 0),
(14, 5, 'Go-Pro', 0),
(15, 5, 'CÃ¡maras Instantaneas', 0),
(16, 5, 'VideocÃ¡maras', 0),
(17, 5, 'Accesorios de CÃ¡maras', 0),
(18, 6, 'Desktop', 1),
(19, 6, 'Case', 1),
(20, 6, 'Monitores', 1),
(21, 6, 'Memoria Ram', 1),
(22, 6, 'Fuentes', 1),
(23, 6, 'Procesadores', 1),
(24, 6, 'Motherboard', 1),
(25, 6, 'Tarjeta de sonido', 1),
(26, 6, 'Tarjeta grÃ¡fica', 1),
(27, 6, 'Disco Duros internos', 1),
(28, 6, 'Ventilador o cooler', 1),
(29, 7, 'Laptops', 1),
(30, 7, 'All in One', 1),
(31, 8, 'Play Station', 0),
(32, 8, 'Nintendo', 0),
(33, 8, 'Xbox', 0),
(34, 8, 'Accesorios de videojuegos', 0),
(35, 9, 'Memorias Usb', 1),
(36, 9, 'CÃ¡maras Web', 1),
(37, 9, 'Disco Duros Externos', 1),
(38, 9, 'Microfonos y audifonos', 1),
(39, 9, 'Mouses', 1),
(40, 9, 'Teclados', 1),
(41, 9, 'Parlantes para computadoras', 1),
(42, 9, 'Proyector', 1),
(43, 9, 'Routers', 1),
(44, 10, 'Fundas para laptops', 1),
(45, 10, 'Mochilas y maletines para laptops', 1),
(46, 10, 'Cooler para Laptops', 1),
(47, 11, 'Zona Gamer', 1),
(48, 12, 'Impresoras BÃ¡sicas', 1),
(49, 12, 'Impresoras Multifuncionales', 1),
(50, 12, 'Impresoras Sistema continuo', 1),
(51, 12, 'EscÃ¡neres', 1),
(52, 12, 'Tintas', 1),
(53, 13, 'Vestidos', 1),
(54, 13, 'Blusas', 1),
(55, 13, 'Polos y tops', 1),
(56, 13, 'Casacas y abrigos', 1),
(57, 13, 'Pantalones mujer', 1),
(58, 13, 'Jeans mujer', 1),
(59, 13, 'Faldas', 1),
(60, 13, 'Shorts mujer', 1),
(61, 13, 'Sacos y blazers', 1),
(62, 13, 'Ropa formal mujer', 1),
(63, 13, 'Ropa deportiva mujer', 1),
(64, 13, 'Ropa interior y pijamas mujer', 1),
(65, 13, 'Trajes de baÃ±o mujer', 1),
(66, 14, 'Balerinas', 1),
(67, 14, 'Tacos', 1),
(68, 14, 'Plataformas', 1),
(69, 14, 'Zapatillas urbanas mujer', 1),
(70, 14, 'Sandalias mujer', 1),
(71, 14, 'Deportivo mujer', 1),
(72, 14, 'Botas y botines mujer', 1),
(73, 14, 'Pantuflas mujer', 1),
(74, 15, 'Camisas hombre', 1),
(75, 15, 'Polos hombre', 1),
(76, 15, 'VividÃ­ o vivirÃ­ hombre', 1),
(77, 15, 'Casacas y abrigos', 1),
(78, 15, 'Pantalones hombre', 1),
(79, 15, 'Jeans hombre', 1),
(80, 15, 'Shorts y bermudas', 1),
(81, 15, 'Trajes y sacos hombre', 1),
(82, 15, 'Ropa deportiva hombre', 1),
(83, 15, 'Ropa interior y pijamas hombre', 1),
(84, 15, 'Trajes de baÃ±o hombre', 1),
(85, 16, 'Zapatillas urbanas hombre', 1),
(86, 16, 'Mocasines hombre', 1),
(87, 16, 'Deportivo hombre', 1),
(88, 16, 'Sandalias hombre', 1),
(89, 16, 'Pantuflas hombre', 1),
(90, 17, 'Anillos', 1),
(91, 17, 'Aretes', 1),
(92, 17, 'Collares', 1),
(93, 17, 'Pulseras', 1),
(94, 18, 'Mujer', 1),
(95, 18, 'Hombre', 1),
(96, 19, 'Cremas y tratamiento', 1),
(97, 19, 'Bloqueadores', 1),
(98, 20, 'Rostro', 1),
(99, 20, 'Ojos y Cejas', 1),
(100, 20, 'Labios', 1),
(101, 20, 'UÃ±as', 1),
(102, 20, 'Brochas y accesorios', 1),
(103, 21, 'Tablet', 1),
(104, 21, 'Accesorios para tablet', 1),
(105, 9, 'Swich', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta`
--

CREATE TABLE IF NOT EXISTS `tarjeta` (
  `idTarjeta` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `numeroTarjeta` varchar(50) DEFAULT NULL,
  `codSeguridad` varchar(10) DEFAULT NULL,
  `vencimiento` varchar(20) DEFAULT NULL,
  `enable` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idTarjeta`),
  KEY `idCliente` (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocliente`
--

CREATE TABLE IF NOT EXISTS `tipocliente` (
  `idTipoCLiente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `enable` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idTipoCLiente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tipocliente`
--

INSERT INTO `tipocliente` (`idTipoCLiente`, `nombre`, `enable`) VALUES
(1, 'Administrador', 1),
(2, 'Cliente', 1),
(3, 'Vendedor', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`idTipoCliente`) REFERENCES `tipocliente` (`idTipoCLiente`);

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`idCarrito`) REFERENCES `carrito` (`idCarrito`);

--
-- Filtros para la tabla `detacarrito`
--
ALTER TABLE `detacarrito`
  ADD CONSTRAINT `detacarrito_ibfk_1` FOREIGN KEY (`idCarrito`) REFERENCES `carrito` (`idCarrito`),
  ADD CONSTRAINT `detacarrito_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `detacompra`
--
ALTER TABLE `detacompra`
  ADD CONSTRAINT `detacompra_ibfk_1` FOREIGN KEY (`idCompra`) REFERENCES `compra` (`idCompra`),
  ADD CONSTRAINT `detacompra_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idSubCategoria`) REFERENCES `subcategoria` (`idSubCategoria`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`idMarca`) REFERENCES `marca` (`idMarca`),
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

--
-- Filtros para la tabla `productoimage`
--
ALTER TABLE `productoimage`
  ADD CONSTRAINT `productoimage_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `subcategoria_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`);

--
-- Filtros para la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  ADD CONSTRAINT `tarjeta_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
