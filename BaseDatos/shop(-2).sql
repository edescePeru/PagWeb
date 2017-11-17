-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2017 a las 21:08:51
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

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
(33, 104, 'Hp', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) NOT NULL,
  `nombrePortada` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` decimal(9,2) NOT NULL,
  `descripcionCorta` text NOT NULL,
  `descripcionLarga` text NOT NULL,
  `garantia` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `contenidoCaja` text NOT NULL,
  `largoCaja` decimal(9,2) NOT NULL,
  `anchoCaja` decimal(9,2) NOT NULL,
  `altoCaja` decimal(9,2) NOT NULL,
  `pesoCaja` decimal(9,2) NOT NULL,
  `FechaCreacion` date NOT NULL,
  `idSubCategoria` int(11) NOT NULL,
  `idMarca` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `enable` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `idSubCategoria` (`idSubCategoria`),
  KEY `idMarca` (`idMarca`),
  KEY `idCliente` (`idCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `codigo`, `nombrePortada`, `modelo`, `stock`, `precio`, `descripcionCorta`, `descripcionLarga`, `garantia`, `color`, `contenidoCaja`, `largoCaja`, `anchoCaja`, `altoCaja`, `pesoCaja`, `FechaCreacion`, `idSubCategoria`, `idMarca`, `idCliente`, `enable`) VALUES
(29, 'SSJ7', 'Nuevo Celular Samsung Galaxy J7 Blanco', 'Samsung J7', 10, '1500.00', 'Memoria 64 gb\r\nCamara Frontal 13 px\r\nCamara Trasera 13 px', 'Celular Samsung, 6.3 pulgadas, resoluciÃ³n 2960x1440, cÃ¡mara dual de 12 megapixels,  6GB de RAM, 64GB, 128GB o 256GB de almacenamiento interno, baterÃ­a de 3300 mAh																', '1 aÃ±o', 'Blanco', 'Memoria\r\nCargador\r\nAudifonos', '18.00', '18.00', '18.00', '1.64', '2017-10-09', 2, 9, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

--
-- Volcado de datos para la tabla `productoimage`
--

INSERT INTO `productoimage` (`idProductoImage`, `idProducto`, `imagen`, `enable`) VALUES
(92, 29, '5779b8a4d4fa59f20db74b6ae3ff8a66.jpg', 1),
(93, 29, 'a4f0300403622287f14d2a8df2bb99da.jpg', 1),
(94, 29, '15c927c86d5aca7c19cb2d5fae04e3dd.jpg', 1),
(95, 29, '4259e7172db8ca2f18e6c5d31e946818.jpg', 1),
(96, 29, '604eaf60731091a16d80ab340730979c.png', 1),
(97, 29, '226371485a190f666f766766d5ecfe49.jpg', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

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
(104, 21, 'Accesorios para tablet', 1);

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
