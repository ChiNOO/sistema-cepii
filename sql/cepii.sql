-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2015 a las 21:36:34
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

CREATE TABLE IF NOT EXISTS `cita` (
`idcita` int(11) NOT NULL,
  `persona_idpersona` int(11) NOT NULL,
  `profesional_idProfesional` int(11) NOT NULL,
  `horaIni` time DEFAULT NULL,
  `horaFin` time NOT NULL,
  `fecha` date DEFAULT NULL,
  `espacio_idEspacio` int(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`idcita`, `persona_idpersona`, `profesional_idProfesional`, `horaIni`, `horaFin`, `fecha`, `espacio_idEspacio`) VALUES
(3, 1, 1, '01:00:00', '02:00:00', '2015-01-01', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conferencias`
--

CREATE TABLE IF NOT EXISTS `conferencias` (
`idConferencia` int(11) NOT NULL,
  `tema` varchar(50) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `nombrePonente` varchar(50) DEFAULT NULL,
  `numAsistentes` int(10) DEFAULT NULL,
  `lugar` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_taller`
--

CREATE TABLE IF NOT EXISTS `curso_taller` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `tipo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Profesional_idProfesional` int(11) NOT NULL,
  `lugar` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `num_horas` int(11) DEFAULT NULL,
  `cantidad_personas` int(11) NOT NULL,
  `f_inicio` date NOT NULL,
  `f_fin` date NOT NULL,
  `h_inicio` time NOT NULL,
  `h_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `curso_taller`
--

INSERT INTO `curso_taller` (`id`, `tipo`, `Profesional_idProfesional`, `lugar`, `num_horas`, `cantidad_personas`, `f_inicio`, `f_fin`, `h_inicio`, `h_fin`) VALUES
(0, 'Taller', 0, 'Xalap', 4, 40, '2015-12-10', '2015-12-24', '14:01:00', '14:02:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donativo`
--

CREATE TABLE IF NOT EXISTS `donativo` (
`idDonativo` int(11) NOT NULL,
  `Nombre` varchar(20) DEFAULT NULL,
  `TipoDonativo` varchar(20) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Fecha` date NOT NULL,
  `Persona_idpersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espacio`
--

CREATE TABLE IF NOT EXISTS `espacio` (
`idEspacio` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Capacidad` int(11) NOT NULL,
  `Tipo` tinyint(1) NOT NULL COMMENT '1 si es espacio interno--0 si es externo'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `espacio`
--

INSERT INTO `espacio` (`idEspacio`, `Nombre`, `Capacidad`, `Tipo`) VALUES
(2, 'Espacio de terapias', 1, 1),
(7, 'Espacio conferencias', 20, 0);

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
-- Estructura de tabla para la tabla `jornada`
--

CREATE TABLE IF NOT EXISTS `jornada` (
`idJornada` int(11) NOT NULL,
  `nombre_jornada` varchar(45) NOT NULL,
  `tipo_servicio` varchar(45) NOT NULL,
  `detalle` varchar(45) NOT NULL,
  `espacio` varchar(45) NOT NULL,
  `idProfesional` varchar(45) NOT NULL,
  `fechas` varchar(45) NOT NULL,
  `horario` varchar(45) NOT NULL,
  `costo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada_persona`
--

CREATE TABLE IF NOT EXISTS `jornada_persona` (
`idPersona` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `idJornada` int(11) NOT NULL
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `nombrePersona`, `apaPersona`, `amaPersona`, `callePersona`, `numDirPersona`, `coloniaPersona`, `celPersona`, `correoPersona`, `sexo`, `fechaNa`) VALUES
(1, 'Christian', 'Vargas', 'Saavedra', 'Apeninos', 8, 'Lomas de Casa Blanca', '012281404359', 'lirical_niggar@hotmail.com', 'M', '1992-02-29'),
(3, 'Diana', 'Espiritu', 'Vaes', 'Alguna', 5, 'Otra colonia', '51213', 'algo@gmail.com', 'F', '1988-03-02'),
(4, 'Carlos', 'Medina', 'García', 'Camarillo', 2, 'Sumidero', '123454323', 'car@gmail.com', 'M', '2015-12-15');

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesional`
--

INSERT INTO `profesional` (`idProfesional`, `nombrePro`, `apaPro`, `amaPro`, `celPro`, `correoPro`, `ramaMedica`, `usuario`, `contraseña`) VALUES
(1, 'Aldo', 'Jose', 'Espiritu', '82458556', 'aldikistrikis_pocholate@gmail.com', 'Psicología', 'aldo', 'aldo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
 ADD PRIMARY KEY (`idcita`);

--
-- Indices de la tabla `conferencias`
--
ALTER TABLE `conferencias`
 ADD PRIMARY KEY (`idConferencia`);

--
-- Indices de la tabla `donativo`
--
ALTER TABLE `donativo`
 ADD PRIMARY KEY (`idDonativo`);

--
-- Indices de la tabla `espacio`
--
ALTER TABLE `espacio`
 ADD PRIMARY KEY (`idEspacio`);

--
-- Indices de la tabla `hojaclinica`
--
ALTER TABLE `hojaclinica`
 ADD PRIMARY KEY (`idhojaClinica`);

--
-- Indices de la tabla `hojareferencia`
--
ALTER TABLE `hojareferencia`
 ADD PRIMARY KEY (`idhojaReferencia`);

--
-- Indices de la tabla `jornada`
--
ALTER TABLE `jornada`
 ADD PRIMARY KEY (`idJornada`);

--
-- Indices de la tabla `jornada_persona`
--
ALTER TABLE `jornada_persona`
 ADD PRIMARY KEY (`idPersona`);

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
MODIFY `idcita` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `conferencias`
--
ALTER TABLE `conferencias`
MODIFY `idConferencia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `donativo`
--
ALTER TABLE `donativo`
MODIFY `idDonativo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `espacio`
--
ALTER TABLE `espacio`
MODIFY `idEspacio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `hojaclinica`
--
ALTER TABLE `hojaclinica`
MODIFY `idhojaClinica` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `hojareferencia`
--
ALTER TABLE `hojareferencia`
MODIFY `idhojaReferencia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `jornada`
--
ALTER TABLE `jornada`
MODIFY `idJornada` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `jornada_persona`
--
ALTER TABLE `jornada_persona`
MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `profesional`
--
ALTER TABLE `profesional`
MODIFY `idProfesional` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
