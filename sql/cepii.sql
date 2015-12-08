-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2015 a las 08:42:07
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cepii`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `curso_taller` (
  `id` int(11) NOT NULL,
  `tipo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `profesional` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `lugar` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `num_horas` int(11) DEFAULT NULL,
  `cantidad_personas` int(11) NOT NULL,
  `f_inicio` date NOT NULL,
  `f_fin` date NOT NULL,
  `h_inicio` time NOT NULL,
  `h_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

ALTER TABLE `curso_taller`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `curso_taller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `espacio` (
  `idEspacio` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Capacidad` int(11) NOT NULL,
  `Tipo_Servicio` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `espacio`
  ADD PRIMARY KEY (`idEspacio`);
ALTER TABLE `espacio`
  MODIFY `idEspacio` int(11) NOT NULL AUTO_INCREMENT;


CREATE TABLE IF NOT EXISTS `cita` (
`idcita` int(11) NOT NULL,
  `persona_idpersona` int(11) NOT NULL,
  `profesional_idProfesional` int(11) NOT NULL,
  `hora` varchar(45) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `consultorio` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cita`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donativo`
--

CREATE TABLE IF NOT EXISTS `donativo` (
  `iddonativo` varchar(45) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `tipoDonativo` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `persona_idpersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hojaclinica`
--

CREATE TABLE IF NOT EXISTS `hojaclinica` (
`idhojaClinica` int(11) NOT NULL,
  `estatura` double DEFAULT NULL,
  `consumoAlcohol` varchar(45) DEFAULT NULL,
  `practicaDeporte` varchar(45) DEFAULT NULL,
  `peso` double DEFAULT NULL,
  `consumoCigarro` varchar(45) DEFAULT NULL,
  `persona_idpersona` int(11) NOT NULL,
  `hojaReferencia_idhojaReferencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hojareferencia`
--

CREATE TABLE IF NOT EXISTS `hojareferencia` (
  `idhojaReferencia` int(11) NOT NULL,
  `hojaReferenciacol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
`idpersona` int(11) NOT NULL,
  `nombrePersona` varchar(45) DEFAULT NULL,
  `apaPersona` varchar(45) DEFAULT NULL,
  `amaPersona` varchar(45) DEFAULT NULL,
  `callePersona` varchar(45) DEFAULT NULL,
  `numDirPersona` int(10) DEFAULT NULL,
  `coloniaPersona` varchar(45) DEFAULT NULL,
  `celPersona` varchar(45) DEFAULT NULL,
  `correoPersona` varchar(45) DEFAULT NULL,
  `sexo` varchar(45) DEFAULT NULL,
  `fechaNa` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--



--
-- Estructura de tabla para la tabla `profesional`
--

CREATE TABLE IF NOT EXISTS `profesional` (
`idProfesional` int(11) NOT NULL,
  `nombrePro` varchar(45) DEFAULT NULL,
  `apaPro` varchar(45) DEFAULT NULL,
  `amaPro` varchar(45) DEFAULT NULL,
  `celPro` varchar(45) DEFAULT NULL,
  `correoPro` varchar(45) DEFAULT NULL,
  `ramaMedica` varchar(45) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `contraseña` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesional`
--


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
 ADD PRIMARY KEY (`idcita`), ADD KEY `fk_cita_persona1_idx` (`persona_idpersona`), ADD KEY `fk_cita_profesional1_idx` (`profesional_idProfesional`);

--
-- Indices de la tabla `donativo`
--
ALTER TABLE `donativo`
 ADD PRIMARY KEY (`iddonativo`), ADD KEY `fk_donativo_persona1_idx` (`persona_idpersona`);

--
-- Indices de la tabla `hojaclinica`
--
ALTER TABLE `hojaclinica`
 ADD PRIMARY KEY (`idhojaClinica`), ADD KEY `fk_hojaClinica_persona1_idx` (`persona_idpersona`), ADD KEY `fk_hojaClinica_hojaReferencia1_idx` (`hojaReferencia_idhojaReferencia`);

--
-- Indices de la tabla `hojareferencia`
--
ALTER TABLE `hojareferencia`
 ADD PRIMARY KEY (`idhojaReferencia`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
 ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `profesional`
--
ALTER TABLE `profesional`
 ADD PRIMARY KEY (`idProfesional`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
MODIFY `idcita` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `hojaclinica`
--
ALTER TABLE `hojaclinica`
MODIFY `idhojaClinica` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `profesional`
--
ALTER TABLE `profesional`
MODIFY `idProfesional` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
--
-- Filtros para la tabla `donativo`
--
ALTER TABLE `donativo`
ADD CONSTRAINT `fk_donativo_persona1` FOREIGN KEY (`persona_idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `hojaclinica`
--
ALTER TABLE `hojaclinica`
ADD CONSTRAINT `fk_hojaClinica_hojaReferencia1` FOREIGN KEY (`hojaReferencia_idhojaReferencia`) REFERENCES `hojareferencia` (`idhojaReferencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_hojaClinica_persona1` FOREIGN KEY (`persona_idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
