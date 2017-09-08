-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2017 a las 23:15:33
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

DROP DATABASE if exists shop;
CREATE DATABASE shop;
USE shop;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(20, 'Maquillaje', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombre`, `apellidos`, `docIdentidad`, `direccion`, `telefono`, `idTipoCliente`, `correo`, `password`, `enable`) VALUES
(1, 'Administrador', 'Master', '12345678', 'Direccion', '987456321', 1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'Jorge', 'Gonzales', '12345678', 'Direccion', '987456321', 2, 'jorge@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1);

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
  `nombre` varchar(80) DEFAULT NULL,
  `enable` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombrePortada` varchar(200) DEFAULT NULL,
  `descripcionCorta` text,
  `descripcionLarga` text,
  `contenidoCaja` text,
  `color` varchar(80) DEFAULT NULL,
  `precio` decimal(9,2) DEFAULT NULL,
  `idSubCategoria` int(11) NOT NULL,
  `idMarca` int(11) NOT NULL,
  `enable` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `idSubCategoria` (`idSubCategoria`),
  KEY `idMarca` (`idMarca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoimage`
--

CREATE TABLE IF NOT EXISTS `productoItem` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`idSubCategoria`, `idCategoria`, `nombre`, `enable`) VALUES
(1, 1, 'Iphone', 1),
(2, 1, 'Smartphone Android', 1),
(3, 1, 'Celulares basicos', 1),
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
(102, 20, 'Brochas y accesorios', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipocliente`
--

INSERT INTO `tipocliente` (`idTipoCLiente`, `nombre`, `enable`) VALUES
(1, 'Administrador', 1),
(2, 'Cliente', 1);

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
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`idMarca`) REFERENCES `marca` (`idMarca`);

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
