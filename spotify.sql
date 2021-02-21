-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-02-2021 a las 13:47:58
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sprint_7_spotify`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id_album` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `year_publication` year(4) DEFAULT NULL,
  `img_portada` varchar(200) DEFAULT NULL,
  `artista_id` int(11) NOT NULL,
  PRIMARY KEY (`id_album`),
  KEY `artista_id` (`artista_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`id_album`, `titulo`, `year_publication`, `img_portada`, `artista_id`) VALUES
(3, 'Una mattina', 2004, 'https://images-na.ssl-images-amazon.com/images/I/718YfJ-WyNL._SL1400_.jpg', 1),
(4, 'The Lord of the Rings: The Return of the King', 2003, 'https://images-na.ssl-images-amazon.com/images/I/81kUINEtUbL._AC_SL1408_.jpg', 2),
(5, 'Hunting High and Low', 1984, 'https://images-na.ssl-images-amazon.com/images/I/71DOjcwjz2L._SL1200_.jpg', 3),
(6, 'Greatest Hits', 1992, 'https://images-na.ssl-images-amazon.com/images/I/81QRQcXsiUL._SL1420_.jpg', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album_fav`
--

CREATE TABLE IF NOT EXISTS `album_fav` (
  `id_af` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id_af`),
  KEY `album_id` (`album_id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `album_fav`
--

INSERT INTO `album_fav` (`id_af`, `album_id`, `usuario_id`) VALUES
(1, 5, 1),
(2, 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista`
--

CREATE TABLE IF NOT EXISTS `artista` (
  `id_artista` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `img_artista` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_artista`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `artista`
--

INSERT INTO `artista` (`id_artista`, `nombre`, `img_artista`) VALUES
(1, 'Ludovico Einaudi', 'https://upload.wikimedia.org/wikipedia/commons/e/e5/Ludovico_Einaudi_in_Tehran_12_%28cropped%292.jpg'),
(2, 'Fran Walsh', 'https://m.media-amazon.com/images/M/MV5BNTg2MzE0ODAyNV5BMl5BanBnXkFtZTcwNjk4NDgxOA@@._V1_.jpg'),
(3, 'A-ha', 'https://radiolatinamerika.no/images-posts/2018/A_ha3344.jpg'),
(4, 'Samantha Fox', 'https://c8.alamy.com/compes/pjydf5/samantha-fox-en-08-04-1986-en-londres-uso-en-todo-el-mundo-pjydf5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista_rel`
--

CREATE TABLE IF NOT EXISTS `artista_rel` (
  `id_art_rel` int(11) NOT NULL AUTO_INCREMENT,
  `id_art1` int(11) NOT NULL,
  `id_art2` int(11) NOT NULL,
  PRIMARY KEY (`id_art_rel`),
  UNIQUE KEY `indice_artistas` (`id_art1`,`id_art2`),
  KEY `id_art2` (`id_art2`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `artista_rel`
--

INSERT INTO `artista_rel` (`id_art_rel`, `id_art1`, `id_art2`) VALUES
(1, 1, 2),
(2, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion`
--

CREATE TABLE IF NOT EXISTS `cancion` (
  `id_cancion` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `duracion` time NOT NULL,
  `num_reproducciones` bigint(20) NOT NULL,
  `album_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cancion`),
  KEY `album_id` (`album_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `cancion`
--

INSERT INTO `cancion` (`id_cancion`, `titulo`, `duracion`, `num_reproducciones`, `album_id`) VALUES
(1, 'Una mattina', '00:06:42', 5987102, 3),
(2, 'Into the west', '00:04:34', 7000256994, 4),
(3, 'Take on me', '00:04:03', 1918981624, 5),
(4, 'Nothig gonna stop me now', '00:03:46', 1522689, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion_fav`
--

CREATE TABLE IF NOT EXISTS `cancion_fav` (
  `id_cf` int(11) NOT NULL AUTO_INCREMENT,
  `cancion_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id_cf`),
  UNIQUE KEY `indice_cf` (`cancion_id`,`usuario_id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `cancion_fav`
--

INSERT INTO `cancion_fav` (`id_cf`, `cancion_id`, `usuario_id`) VALUES
(5, 1, 2),
(1, 1, 3),
(6, 1, 4),
(2, 2, 3),
(3, 3, 2),
(4, 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE IF NOT EXISTS `forma_pago` (
  `id_fpago` int(11) NOT NULL AUTO_INCREMENT,
  `tcredito_id` int(11) DEFAULT NULL,
  `paypal_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_fpago`),
  KEY `tcredito_id` (`tcredito_id`),
  KEY `paypal_id` (`paypal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `forma_pago`
--

INSERT INTO `forma_pago` (`id_fpago`, `tcredito_id`, `paypal_id`) VALUES
(1, NULL, 1),
(2, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paypal`
--

CREATE TABLE IF NOT EXISTS `paypal` (
  `id_paypal` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_paypal` varchar(50) NOT NULL,
  PRIMARY KEY (`id_paypal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `paypal`
--

INSERT INTO `paypal` (`id_paypal`, `usuario_paypal`) VALUES
(1, 'entrolle@nyc-md.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playlist`
--

CREATE TABLE IF NOT EXISTS `playlist` (
  `id_playlist` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `data_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activa` enum('si','no') NOT NULL,
  `data_desactivacion` datetime DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id_playlist`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `playlist`
--

INSERT INTO `playlist` (`id_playlist`, `titulo`, `data_creacion`, `activa`, `data_desactivacion`, `usuario_id`) VALUES
(1, 'Musica para estudiar', '2021-02-20 17:56:24', 'si', NULL, 1),
(2, 'Top 80''s', '2021-02-20 17:56:24', 'no', '2021-02-24 10:11:09', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premium`
--

CREATE TABLE IF NOT EXISTS `premium` (
  `id_premium` int(11) NOT NULL AUTO_INCREMENT,
  `data_inicio` date NOT NULL,
  `data_fin` date NOT NULL,
  `fecha_pago` date NOT NULL,
  `num_orden` int(11) NOT NULL,
  `total` float(8,2) NOT NULL,
  `fpago_id` int(11) NOT NULL,
  PRIMARY KEY (`id_premium`),
  UNIQUE KEY `num_orden` (`num_orden`),
  KEY `fpago_id` (`fpago_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `premium`
--

INSERT INTO `premium` (`id_premium`, `data_inicio`, `data_fin`, `fecha_pago`, `num_orden`, `total`, `fpago_id`) VALUES
(1, '2021-02-01', '2021-02-28', '2021-03-01', 12345, 35.00, 1),
(2, '2021-02-09', '2021-03-10', '2021-02-01', 9876543, 40.00, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sigue_artista`
--

CREATE TABLE IF NOT EXISTS `sigue_artista` (
  `id_sa` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `artista_id` int(11) NOT NULL,
  PRIMARY KEY (`id_sa`),
  UNIQUE KEY `index_sa` (`usuario_id`,`artista_id`),
  KEY `artista_id` (`artista_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `sigue_artista`
--

INSERT INTO `sigue_artista` (`id_sa`, `usuario_id`, `artista_id`) VALUES
(3, 1, 2),
(4, 4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subir_cancion`
--

CREATE TABLE IF NOT EXISTS `subir_cancion` (
  `id_sc` int(11) NOT NULL AUTO_INCREMENT,
  `cancion_id` int(11) NOT NULL,
  `playlist_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id_sc`),
  KEY `cancion_id` (`cancion_id`),
  KEY `playlist_id` (`playlist_id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `subir_cancion`
--

INSERT INTO `subir_cancion` (`id_sc`, `cancion_id`, `playlist_id`, `usuario_id`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 3),
(3, 3, 2, 1),
(4, 4, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcredito`
--

CREATE TABLE IF NOT EXISTS `tcredito` (
  `id_tcredito` int(11) NOT NULL AUTO_INCREMENT,
  `num_tarja` int(11) NOT NULL,
  `data_caducidad` date NOT NULL,
  `codigo_seguridad` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tcredito`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tcredito`
--

INSERT INTO `tcredito` (`id_tcredito`, `num_tarja`, `data_caducidad`, `codigo_seguridad`) VALUES
(1, 123567890, '2023-03-17', 'pareprofro987');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `data_naix` date DEFAULT NULL,
  `sexo` enum('hombre','mujer','fluido') DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `premium_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `premium_id` (`premium_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `email`, `password`, `data_naix`, `sexo`, `pais`, `cp`, `premium_id`) VALUES
(1, 'plirbert19', 'entrolle@nyc-md.com', '87***989___09', '2002-12-09', 'mujer', 'Spain', '08025', 1),
(2, 'liriorosa85', 'wass@laldo.com', 'tuyooksut12588*', '1985-05-11', 'mujer', 'Spain', '08036', 2),
(3, 'ragnar_fox', 'boxier@btcmod.com', '669tiibjgups', '1993-01-28', 'hombre', 'France', '75000', NULL),
(4, 'tiquitoco_kong', 'entergo@medicamentpharmacie.com', 'tuyhte45ññ88*', '1970-06-20', 'fluido', 'Spain', '08045', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`artista_id`) REFERENCES `artista` (`id_artista`);

--
-- Filtros para la tabla `album_fav`
--
ALTER TABLE `album_fav`
  ADD CONSTRAINT `album_fav_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `album` (`id_album`),
  ADD CONSTRAINT `album_fav_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `artista_rel`
--
ALTER TABLE `artista_rel`
  ADD CONSTRAINT `artista_rel_ibfk_1` FOREIGN KEY (`id_art1`) REFERENCES `artista` (`id_artista`),
  ADD CONSTRAINT `artista_rel_ibfk_2` FOREIGN KEY (`id_art2`) REFERENCES `artista` (`id_artista`);

--
-- Filtros para la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD CONSTRAINT `cancion_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `album` (`id_album`);

--
-- Filtros para la tabla `cancion_fav`
--
ALTER TABLE `cancion_fav`
  ADD CONSTRAINT `cancion_fav_ibfk_1` FOREIGN KEY (`cancion_id`) REFERENCES `cancion` (`id_cancion`),
  ADD CONSTRAINT `cancion_fav_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  ADD CONSTRAINT `forma_pago_ibfk_1` FOREIGN KEY (`tcredito_id`) REFERENCES `tcredito` (`id_tcredito`),
  ADD CONSTRAINT `forma_pago_ibfk_2` FOREIGN KEY (`paypal_id`) REFERENCES `paypal` (`id_paypal`);

--
-- Filtros para la tabla `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `playlist_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `premium`
--
ALTER TABLE `premium`
  ADD CONSTRAINT `premium_ibfk_1` FOREIGN KEY (`fpago_id`) REFERENCES `forma_pago` (`id_fpago`);

--
-- Filtros para la tabla `sigue_artista`
--
ALTER TABLE `sigue_artista`
  ADD CONSTRAINT `sigue_artista_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `sigue_artista_ibfk_2` FOREIGN KEY (`artista_id`) REFERENCES `artista` (`id_artista`);

--
-- Filtros para la tabla `subir_cancion`
--
ALTER TABLE `subir_cancion`
  ADD CONSTRAINT `subir_cancion_ibfk_1` FOREIGN KEY (`cancion_id`) REFERENCES `cancion` (`id_cancion`),
  ADD CONSTRAINT `subir_cancion_ibfk_2` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`id_playlist`),
  ADD CONSTRAINT `subir_cancion_ibfk_3` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`premium_id`) REFERENCES `premium` (`id_premium`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
