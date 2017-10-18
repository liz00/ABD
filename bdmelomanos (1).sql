-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2017 a las 12:56:34
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdmelomanos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgrupos`
--

CREATE TABLE `tbgrupos` (
  `idgrupo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text,
  `tipomusica` varchar(100) NOT NULL,
  `edadmin` int(11) NOT NULL,
  `edadmax` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbgrupos`
--

INSERT INTO `tbgrupos` (`idgrupo`, `nombre`, `descripcion`, `tipomusica`, `edadmin`, `edadmax`) VALUES
(1, 'ABD', 'Grupo de prueba ', 'Rock', 20, 40),
(2, 'Prueba 3', 'Nervios', 'Rock', 18, 22),
(3, 'PruebaDef', 'Grupo de prueba definitiva de rap', 'Rap', 20, 80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmensajes`
--

CREATE TABLE `tbmensajes` (
  `idmen` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `contenido` text NOT NULL,
  `fecha` text,
  `idautor` int(11) NOT NULL,
  `tipodestino` int(11) NOT NULL,
  `iddestinatario` int(11) DEFAULT NULL,
  `idgrupo` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbmensajes`
--

INSERT INTO `tbmensajes` (`idmen`, `titulo`, `contenido`, `fecha`, `idautor`, `tipodestino`, `iddestinatario`, `idgrupo`) VALUES
(3, 'HOLA', 'quiero ser el segundo mensaje global. Â¿Me lo permites?', '02:23 05/16/2017', 2, 0, NULL, NULL),
(2, 'Aymimadre', 'me llamo esti', '10:28 05/09/2017', 2, 0, NULL, NULL),
(4, 'hola', 'eres toly!!!! que tal, esti?', '03:19 05/16/2017', 2, 1, 8, NULL),
(5, 'bien', 'ya no estoy tan sola', '11:01 05/19/2017', 1, 2, NULL, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbusuario`
--

CREATE TABLE `tbusuario` (
  `idnum` int(40) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '0',
  `edad` int(11) NOT NULL,
  `tipomusica` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbusuario`
--

INSERT INTO `tbusuario` (`idnum`, `nombre`, `email`, `password`, `activo`, `edad`, `tipomusica`) VALUES
(1, 'Estibaliz', 'ebusto@ucm.es', '1234', 0, 20, 'rockdelduro'),
(2, 'esti', 'e@busto.es', 'soygorda', 0, 15, 'pop'),
(3, 'melomanos', 'melomanos', 'melomanos', 0, 24, 'clasica'),
(4, 'w1', 'w1', 'melomanos', 0, 14, 'rockdelduro'),
(5, 'w2', 'w2', 'melomanos', 0, 14, 'rockdelduro'),
(6, 'w3', 'w3', 'melomanos', 0, 14, 'rockdelduro');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbgrupos`
--
ALTER TABLE `tbgrupos`
  ADD PRIMARY KEY (`idgrupo`);

--
-- Indices de la tabla `tbmensajes`
--
ALTER TABLE `tbmensajes`
  ADD PRIMARY KEY (`idmen`);

--
-- Indices de la tabla `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`idnum`),
  ADD UNIQUE KEY `user` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbgrupos`
--
ALTER TABLE `tbgrupos`
  MODIFY `idgrupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbmensajes`
--
ALTER TABLE `tbmensajes`
  MODIFY `idmen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `idnum` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
