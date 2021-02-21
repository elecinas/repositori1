-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-02-2021 a las 13:46:20
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sprint_7_pizzeria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`) VALUES
(1, 'Calzone'),
(2, 'Vegana'),
(3, 'Picante'),
(5, 'Especial quesos'),
(6, 'Carnivora');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` tinyint(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(70) DEFAULT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `codi_postal` char(5) DEFAULT NULL,
  `localidad_id` tinyint(4) DEFAULT NULL,
  `telefono` varchar(12) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `localidad_id` (`localidad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellidos`, `direccion`, `codi_postal`, `localidad_id`, `telefono`) VALUES
(1, 'Marta', 'García Calleja', 'Calle Rosalía, 22', NULL, 1, '933466871'),
(2, 'Joan', 'Laoz Ballester', 'carrer prim, 12', '08172', 6, '+34561028743');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comanda`
--

CREATE TABLE IF NOT EXISTS `comanda` (
  `id_comanda` tinyint(4) NOT NULL AUTO_INCREMENT,
  `data_hora` datetime DEFAULT NULL,
  `precio` float(6,2) NOT NULL,
  `cliente_id` tinyint(4) NOT NULL,
  `reparto_id` tinyint(4) NOT NULL,
  `tienda_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_comanda`),
  KEY `cliente_id` (`cliente_id`),
  KEY `reparto_id` (`reparto_id`),
  KEY `tienda_id` (`tienda_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `comanda`
--

INSERT INTO `comanda` (`id_comanda`, `data_hora`, `precio`, `cliente_id`, `reparto_id`, `tienda_id`) VALUES
(1, '2021-02-08 21:06:44', 22.00, 1, 1, 1),
(2, '2021-02-11 21:44:04', 18.50, 2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_items`
--

CREATE TABLE IF NOT EXISTS `lista_items` (
  `id_item` tinyint(4) NOT NULL AUTO_INCREMENT,
  `cantidad` tinyint(4) NOT NULL,
  `producto_id` tinyint(4) NOT NULL,
  `comanda_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_item`),
  KEY `producto_id` (`producto_id`),
  KEY `comanda_id` (`comanda_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `lista_items`
--

INSERT INTO `lista_items` (`id_item`, `cantidad`, `producto_id`, `comanda_id`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 6, 2),
(4, 1, 11, 2),
(5, 1, 12, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE IF NOT EXISTS `localidad` (
  `id_localidad` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `provincia_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_localidad`),
  KEY `provincia_id` (`provincia_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`id_localidad`, `nombre`, `provincia_id`) VALUES
(1, 'Abella de la Conca', 3),
(2, 'Abrera', 1),
(3, 'Agramunt', 3),
(4, 'Aguilar de Segarra', 1),
(5, 'Barcelona', 1),
(6, 'Sant Cugat', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_productos` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `imagen` varchar(70) DEFAULT NULL,
  `precio` float(5,2) NOT NULL,
  `categoria_id` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_productos`),
  KEY `categoria_id` (`categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_productos`, `nombre`, `descripcion`, `imagen`, `precio`, `categoria_id`) VALUES
(1, 'Margarita', 'Los ingredientes de esta pionera no fallan, y son los preferidos de los auténticos amantes de la pizza tradicional: salsa de tomate, mozzarella, albahaca, orégano y aceite de oliva. ¿A qué te recuerda', NULL, 9.50, 1),
(2, 'Cuatro quesos', 'La pizza 4 quesos es una de las más consumidas del mundo, claro está, por los amantes del queso. Pero ojo, porque si seguimos la receta tradicional, no nos vale cualquier queso; de hecho, los cuatro q', 'https://imag.bonviveur.es/articulos/pizza-cuatro-quesos-de-del-poble-p', 12.50, 5),
(3, 'Napolitana', 'Junto con la margarita, la pizza napolitana se sitúa como la segunda más tradicional de Italia. Una de las peculiaridades de esta pizza, también conocida como romana, es su masa: suave, esponjosa y al', NULL, 12.50, 2),
(4, 'Diavola', 'No apta para los paladares más delicados, la pizza Diávola se distingue por el sabor picante de su salsa, que debe notarse en cada bocado. Pero también del resto de ingredientes, que potencian aún más', 'https://imag.bonviveur.es/articulos/pizza-diavola-de-del-poble-pizzeri', 12.50, 3),
(5, 'Calzone', 'La calzone es una pizza especial por esconder en su interior todos sus ingredientes (queso, carne, atún, vegetales, etc.), ya que está cubierta por otra masa del mismo tamaño que la base, y en forma d', NULL, 13.50, 1),
(6, 'Barbacoa', 'Junto a la salsa barbacoa, esta pizza se elabora con carne picada y, a elección del comensal, con cebolla, que aporta un contraste de sabor único con el resto de ingredientes.', NULL, 13.50, 6),
(9, 'Hamburguesa de queso', 'Hamburguesa con queso, cebolla, tomate, pepinillos y lechuga', NULL, 9.50, NULL),
(10, 'Hamburguesa deluxe', 'Hamburguesa con beicon, huevo frito, queso, cebolla, tomate, pepinillos y lechuga', NULL, 12.50, NULL),
(11, 'refresco', 'bebida en lata 33 cl', NULL, 2.50, NULL),
(12, 'agua', 'agua mineral 50 cl', NULL, 2.50, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE IF NOT EXISTS `provincia` (
  `id_provincia` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id_provincia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id_provincia`, `nombre`) VALUES
(1, 'Barcelona'),
(2, 'Tarragona'),
(3, 'Lleida'),
(4, 'Girona');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repartos`
--

CREATE TABLE IF NOT EXISTS `repartos` (
  `id_reparto` tinyint(4) NOT NULL AUTO_INCREMENT,
  `data_hora` datetime DEFAULT NULL,
  `repartidor_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_reparto`),
  KEY `repartidor_id` (`repartidor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `repartos`
--

INSERT INTO `repartos` (`id_reparto`, `data_hora`, `repartidor_id`) VALUES
(1, '2021-02-08 21:43:37', 1),
(2, '2021-02-11 22:09:21', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas`
--

CREATE TABLE IF NOT EXISTS `tiendas` (
  `id_tienda` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  `codi_postal` char(5) NOT NULL,
  `localidad_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_tienda`),
  KEY `localidad_id` (`localidad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tiendas`
--

INSERT INTO `tiendas` (`id_tienda`, `nombre`, `direccion`, `codi_postal`, `localidad_id`) VALUES
(1, 'La trattoria de Luigi', 'carrer floresta, 2', '25651', 3),
(2, 'Il forno di la mamma', 'avinguda Diagonal, 345', '08080', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE IF NOT EXISTS `trabajador` (
  `id_trabajador` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `nif` char(9) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `puesto` varchar(12) NOT NULL,
  `tienda_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_trabajador`),
  KEY `tienda_id` (`tienda_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`id_trabajador`, `nombre`, `apellidos`, `nif`, `telefono`, `puesto`, `tienda_id`) VALUES
(1, 'Juan José', 'villalva Paz', '63334459A', '933466871', 'repartidor', 1),
(2, 'Helena', 'Peláez Solá', '07510859W', '+346889572', 'cocinero', 1),
(3, 'Aurora', 'Prada Col', '39219004W', '598742103', 'repartidor', 2),
(4, 'Ramón', 'Criollo Pollo', '41418782Z', '+34561028743', 'cocinero', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`localidad_id`) REFERENCES `localidad` (`id_localidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comanda`
--
ALTER TABLE `comanda`
  ADD CONSTRAINT `comanda_ibfk_4` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comanda_ibfk_5` FOREIGN KEY (`reparto_id`) REFERENCES `repartos` (`id_reparto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comanda_ibfk_6` FOREIGN KEY (`tienda_id`) REFERENCES `tiendas` (`id_tienda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lista_items`
--
ALTER TABLE `lista_items`
  ADD CONSTRAINT `lista_items_ibfk_3` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id_productos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lista_items_ibfk_4` FOREIGN KEY (`comanda_id`) REFERENCES `comanda` (`id_comanda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD CONSTRAINT `localidad_ibfk_2` FOREIGN KEY (`provincia_id`) REFERENCES `provincia` (`id_provincia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `repartos`
--
ALTER TABLE `repartos`
  ADD CONSTRAINT `repartos_ibfk_2` FOREIGN KEY (`repartidor_id`) REFERENCES `trabajador` (`id_trabajador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tiendas`
--
ALTER TABLE `tiendas`
  ADD CONSTRAINT `tiendas_ibfk_2` FOREIGN KEY (`localidad_id`) REFERENCES `localidad` (`id_localidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD CONSTRAINT `trabajador_ibfk_2` FOREIGN KEY (`tienda_id`) REFERENCES `tiendas` (`id_tienda`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
