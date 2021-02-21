-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-02-2021 a las 13:45:19
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sprint_7_optica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` mediumint(9) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `apellido1` varchar(30) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `piso` char(1) DEFAULT NULL,
  `puerta` char(1) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `fax` varchar(12) DEFAULT NULL,
  `nif` char(9) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `nif` (`nif`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido1`, `direccion`, `piso`, `puerta`, `cp`, `ciudad`, `pais`, `telefono`, `fax`, `nif`) VALUES
(1, 'Marta', 'García', 'Calle Rosalía, 22', '2', '3', '08080', 'Barcelona', 'Spain', '933466871', '937540218', '32446456F'),
(2, 'Joan', 'Molins', 'avinguda Diagonal, 345', '1', '6', '08036', 'Barcelona', 'Spain', '+346889572', '+345974523', '42732016V'),
(5, 'Miguel Angel', 'Benítez', 'Pasaje Los ruedos, 23 ', '5', '3', '08032', 'Barcelona', 'Spain', '364258741', NULL, '08817027T'),
(6, 'Iria', 'Ríos', 'Plaza España, 41', '1', '5', '08036', 'Barcelona', 'Spain', '123852469', NULL, '06890546E');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `id_empleado` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `nif` char(9) NOT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre`, `apellido`, `nif`) VALUES
(1, 'Silvia', 'Marín', '86724969L'),
(2, 'Pablo', 'París', '10661333M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gafas`
--

CREATE TABLE IF NOT EXISTS `gafas` (
  `id_gafas` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(30) NOT NULL,
  `graduacion_i` float(5,2) NOT NULL DEFAULT '0.00',
  `graduacion_d` float(5,2) NOT NULL DEFAULT '0.00',
  `montura` varchar(10) DEFAULT NULL,
  `color_montura` varchar(30) DEFAULT NULL,
  `color_vi` varchar(30) DEFAULT 'transparente',
  `color_vd` varchar(30) DEFAULT 'transparente',
  `precio` float(7,2) NOT NULL,
  `proveedor_id` smallint(6) NOT NULL,
  PRIMARY KEY (`id_gafas`),
  KEY `proveedor_id` (`proveedor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `gafas`
--

INSERT INTO `gafas` (`id_gafas`, `marca`, `graduacion_i`, `graduacion_d`, `montura`, `color_montura`, `color_vi`, `color_vd`, `precio`, `proveedor_id`) VALUES
(1, 'Ray Ban', 2.50, 1.50, 'flotante', 'rojo vermellón', 'amarillo', 'amarillo', 239.99, 1),
(2, 'Polaroid', 0.00, 0.00, 'pasta', 'negro tizón', NULL, NULL, 35.90, 2),
(3, 'Ray Ban', 5.00, 5.50, 'metálica', 'dorado cromo', NULL, NULL, 129.95, 1),
(4, 'Dior', 0.50, 1.50, 'pasta', 'violeta azulado', NULL, NULL, 839.99, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `id_proveedor` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `fax` varchar(12) DEFAULT NULL,
  `nif` char(9) DEFAULT NULL,
  PRIMARY KEY (`id_proveedor`),
  UNIQUE KEY `nif` (`nif`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre`, `direccion`, `telefono`, `fax`, `nif`) VALUES
(1, 'Viuda Montemerlo', 'Polígono San Vicente, 34', '597403258', '568014258', '37343414Q'),
(2, 'Macrostocks', 'Carretera Río Chungo, 344', '789123654', '258741369', '35059736P');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` mediumint(9) NOT NULL,
  `gafas_id` int(11) NOT NULL,
  `empleado_id` smallint(6) NOT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `cliente_id` (`cliente_id`),
  KEY `gafas_id` (`gafas_id`),
  KEY `empleado_id` (`empleado_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `cliente_id`, `gafas_id`, `empleado_id`) VALUES
(1, 5, 1, 2),
(2, 6, 2, 2),
(3, 1, 3, 1),
(4, 6, 4, 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gafas`
--
ALTER TABLE `gafas`
  ADD CONSTRAINT `gafas_ibfk_2` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_6` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_4` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_5` FOREIGN KEY (`gafas_id`) REFERENCES `gafas` (`id_gafas`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
