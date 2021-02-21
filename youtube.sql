-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-02-2021 a las 13:47:03
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sprint_7_youtube`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canal`
--

CREATE TABLE IF NOT EXISTS `canal` (
  `id_canal` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `data_creacio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuari_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_canal`),
  KEY `usuari_id` (`usuari_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `canal`
--

INSERT INTO `canal` (`id_canal`, `nombre`, `descripcion`, `data_creacio`, `usuari_id`) VALUES
(1, 'mi_canal', 'probando probando :D', '2021-02-17 17:10:31', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canal_video`
--

CREATE TABLE IF NOT EXISTS `canal_video` (
  `id_canal_video` int(11) NOT NULL AUTO_INCREMENT,
  `canal_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  PRIMARY KEY (`id_canal_video`),
  KEY `canal_id` (`canal_id`),
  KEY `video_id` (`video_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `canal_video`
--

INSERT INTO `canal_video` (`id_canal_video`, `canal_id`, `video_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `id_comentario` tinyint(4) NOT NULL AUTO_INCREMENT,
  `texto` varchar(10000) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_id` tinyint(4) NOT NULL,
  `video_id` int(11) NOT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `usuario_id` (`usuario_id`),
  KEY `video_id` (`video_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `texto`, `data_hora`, `usuario_id`, `video_id`) VALUES
(1, 'Me encanta!! Esto es genial :D', '2021-02-17 16:55:44', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crea_playlist`
--

CREATE TABLE IF NOT EXISTS `crea_playlist` (
  `id_crea_playlist` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) NOT NULL,
  `playlist_id` int(11) NOT NULL,
  PRIMARY KEY (`id_crea_playlist`),
  KEY `video_id` (`video_id`),
  KEY `playlist_id` (`playlist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `crea_playlist`
--

INSERT INTO `crea_playlist` (`id_crea_playlist`, `video_id`, `playlist_id`) VALUES
(1, 1, 1),
(2, 3, 1),
(4, 4, 2),
(5, 1, 2),
(6, 2, 2),
(8, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta`
--

CREATE TABLE IF NOT EXISTS `etiqueta` (
  `id_etiqueta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id_etiqueta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `etiqueta`
--

INSERT INTO `etiqueta` (`id_etiqueta`, `nombre`) VALUES
(1, 'humor'),
(2, 'salud');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetaje`
--

CREATE TABLE IF NOT EXISTS `etiquetaje` (
  `id_etiquetaje` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) NOT NULL,
  `etiqueta_id` int(11) NOT NULL,
  PRIMARY KEY (`id_etiquetaje`),
  KEY `video_id` (`video_id`),
  KEY `etiqueta_id` (`etiqueta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `etiquetaje`
--

INSERT INTO `etiquetaje` (`id_etiquetaje`, `video_id`, `etiqueta_id`) VALUES
(1, 1, 1),
(2, 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `like_comment`
--

CREATE TABLE IF NOT EXISTS `like_comment` (
  `id_like_comment` int(11) NOT NULL AUTO_INCREMENT,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estat` char(6) NOT NULL,
  `usuari_id` tinyint(4) NOT NULL,
  `comentario_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_like_comment`),
  UNIQUE KEY `indice_unico_2` (`usuari_id`,`comentario_id`),
  KEY `comentario_id` (`comentario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `like_comment`
--

INSERT INTO `like_comment` (`id_like_comment`, `data_hora`, `estat`, `usuari_id`, `comentario_id`) VALUES
(1, '2021-02-17 17:04:26', 'like', 1, 1),
(2, '2021-02-17 17:04:26', 'like', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `like_video`
--

CREATE TABLE IF NOT EXISTS `like_video` (
  `id_like_video` int(11) NOT NULL AUTO_INCREMENT,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` varchar(8) NOT NULL,
  `usuario_id` tinyint(4) NOT NULL,
  `video_id` int(11) NOT NULL,
  PRIMARY KEY (`id_like_video`),
  UNIQUE KEY `indice_unico_video` (`usuario_id`,`video_id`),
  KEY `video_id` (`video_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `like_video`
--

INSERT INTO `like_video` (`id_like_video`, `data_hora`, `estado`, `usuario_id`, `video_id`) VALUES
(5, '2021-02-17 16:17:29', 'like', 1, 2),
(6, '2021-02-17 16:17:29', 'unlike', 2, 2),
(7, '2021-02-17 16:18:13', 'like', 3, 2),
(8, '2021-02-17 16:18:13', 'like', 4, 2),
(9, '2021-02-17 16:20:41', 'unlike', 3, 1),
(10, '2021-02-17 16:20:41', 'like', 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playlist`
--

CREATE TABLE IF NOT EXISTS `playlist` (
  `id_playlist` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` char(7) NOT NULL,
  `usuario_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_playlist`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `playlist`
--

INSERT INTO `playlist` (`id_playlist`, `nombre`, `data`, `estado`, `usuario_id`) VALUES
(1, 'varios', '2021-02-17 16:40:56', 'publico', 2),
(2, 'videos_varios', '2021-02-17 16:40:56', 'privado', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacio_video`
--

CREATE TABLE IF NOT EXISTS `publicacio_video` (
  `id_publicacio` bigint(20) NOT NULL AUTO_INCREMENT,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuari_id` tinyint(4) NOT NULL,
  `video_id` int(11) NOT NULL,
  PRIMARY KEY (`id_publicacio`),
  KEY `usuari_id` (`usuari_id`),
  KEY `video_id` (`video_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `publicacio_video`
--

INSERT INTO `publicacio_video` (`id_publicacio`, `data_hora`, `usuari_id`, `video_id`) VALUES
(1, '2021-02-17 15:13:34', 1, 1),
(2, '2021-02-17 15:13:34', 1, 2),
(3, '2021-02-17 15:14:15', 1, 3),
(4, '2021-02-17 15:14:15', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcio_canal`
--

CREATE TABLE IF NOT EXISTS `suscripcio_canal` (
  `id_suscripcio_canal` int(11) NOT NULL AUTO_INCREMENT,
  `usuari_id` tinyint(4) NOT NULL,
  `canal_id` int(11) NOT NULL,
  PRIMARY KEY (`id_suscripcio_canal`),
  UNIQUE KEY `indice_unico3` (`usuari_id`,`canal_id`),
  KEY `canal_id` (`canal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `suscripcio_canal`
--

INSERT INTO `suscripcio_canal` (`id_suscripcio_canal`, `usuari_id`, `canal_id`) VALUES
(3, 1, 1),
(4, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuari`
--

CREATE TABLE IF NOT EXISTS `usuari` (
  `id_usuari` tinyint(4) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nom_usuari` varchar(50) NOT NULL,
  `data_naixement` date DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `codi_postal` char(5) DEFAULT NULL,
  PRIMARY KEY (`id_usuari`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuari`
--

INSERT INTO `usuari` (`id_usuari`, `email`, `password`, `nom_usuari`, `data_naixement`, `sexe`, `pais`, `codi_postal`) VALUES
(1, 'briljert@malchikzer.cf', 'patata', 'willbur23', '2000-12-28', 'H', 'spain', '08080'),
(2, 'unsall@crossroadsone.org', 'lollypop', 'laly2008', '1998-03-18', 'M', 'EEUU', '05907'),
(3, 'gerstmar@gmailvn.net', 'vpegd_lloopo54', 'littlefrog_2', '2005-01-20', 'H', 'United Kingdom', 'AB15'),
(4, 'colymbiform@comparabet.es', '12345678**AA', 'callixto', '1989-09-12', 'M', 'Greece', '11141');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id_video` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(90) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `size` decimal(15,2) NOT NULL,
  `nombre_archivo` varchar(30) NOT NULL,
  `duracion` double(12,2) NOT NULL,
  `thumbnail` varchar(30) DEFAULT NULL,
  `reproducciones` bigint(20) NOT NULL,
  `estado` char(7) NOT NULL,
  PRIMARY KEY (`id_video`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `video`
--

INSERT INTO `video` (`id_video`, `titulo`, `descripcion`, `size`, `nombre_archivo`, `duracion`, `thumbnail`, `reproducciones`, `estado`) VALUES
(1, 'Gato bailando wiggle wiggle-jason derulo', 'Jolin v: hola como mo he echo videos aqui les dejo un gato bailando v: que se que a mas de 4 les sacara una sonrisa, subire videos prontito vale? Solo esperar y ser pacientes que estava arreglando alg', '365480.25', 'gatobaila.mp4', 568.50, 'dapra.thumnails', 8456871202, 'publico'),
(2, 'Dile Adiós a tu BARRIGA CAÍDA', '¿Te molesta tener esa barriga caída? Dile adiós a la barriga caída con estos sencillos, fáciles, pero muy eficaces ejercicios en casa para eliminar esa barriga, y quemar grasa. Pero antes, activa la c', '598742589.23', 'adiosbarriga.mp4', 325880002.25, 'dapra2.thumnails', 325870022, 'publico'),
(3, 'Música para estudiar', 'Musica para Estudiar, Concentrarse y Realizar Tareas ? Musica Relajante para Trabajar Eficientemente', '1255745865.25', 'musicaestudiar.mp4', 1258885447.36, 'alga.thumnails', 7255825, 'privado'),
(4, 'Yoga dinámico', 'Has llegado al final de tu segunda semana del reto de yoga de Objetivo Bienestar. En esta clase de yoga dinámico de 30 minutos donde recopilaremos todo lo que has aprendido hasta el momento.  Namasté.', '12548885215.25', 'dinamicyoga.mp4', 652358.36, 'hattha.thumbnails', 125558, 'oculto');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `canal`
--
ALTER TABLE `canal`
  ADD CONSTRAINT `canal_ibfk_2` FOREIGN KEY (`usuari_id`) REFERENCES `usuari` (`id_usuari`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `canal_video`
--
ALTER TABLE `canal_video`
  ADD CONSTRAINT `canal_video_ibfk_4` FOREIGN KEY (`video_id`) REFERENCES `video` (`id_video`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `canal_video_ibfk_3` FOREIGN KEY (`canal_id`) REFERENCES `canal` (`id_canal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_4` FOREIGN KEY (`video_id`) REFERENCES `video` (`id_video`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_3` FOREIGN KEY (`usuario_id`) REFERENCES `usuari` (`id_usuari`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `crea_playlist`
--
ALTER TABLE `crea_playlist`
  ADD CONSTRAINT `crea_playlist_ibfk_4` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`id_playlist`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crea_playlist_ibfk_3` FOREIGN KEY (`video_id`) REFERENCES `video` (`id_video`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `etiquetaje`
--
ALTER TABLE `etiquetaje`
  ADD CONSTRAINT `etiquetaje_ibfk_4` FOREIGN KEY (`etiqueta_id`) REFERENCES `etiqueta` (`id_etiqueta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `etiquetaje_ibfk_3` FOREIGN KEY (`video_id`) REFERENCES `video` (`id_video`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `like_comment`
--
ALTER TABLE `like_comment`
  ADD CONSTRAINT `like_comment_ibfk_4` FOREIGN KEY (`comentario_id`) REFERENCES `comentario` (`id_comentario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_comment_ibfk_3` FOREIGN KEY (`usuari_id`) REFERENCES `usuari` (`id_usuari`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `like_video`
--
ALTER TABLE `like_video`
  ADD CONSTRAINT `like_video_ibfk_3` FOREIGN KEY (`usuario_id`) REFERENCES `usuari` (`id_usuari`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_video_ibfk_4` FOREIGN KEY (`video_id`) REFERENCES `video` (`id_video`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `playlist_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuari` (`id_usuari`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `publicacio_video`
--
ALTER TABLE `publicacio_video`
  ADD CONSTRAINT `publicacio_video_ibfk_4` FOREIGN KEY (`video_id`) REFERENCES `video` (`id_video`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `publicacio_video_ibfk_3` FOREIGN KEY (`usuari_id`) REFERENCES `usuari` (`id_usuari`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `suscripcio_canal`
--
ALTER TABLE `suscripcio_canal`
  ADD CONSTRAINT `suscripcio_canal_ibfk_4` FOREIGN KEY (`canal_id`) REFERENCES `canal` (`id_canal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suscripcio_canal_ibfk_3` FOREIGN KEY (`usuari_id`) REFERENCES `usuari` (`id_usuari`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
