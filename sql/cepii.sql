-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2015 a las 03:03:39
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`idcita`, `persona_idpersona`, `profesional_idProfesional`, `horaIni`, `horaFin`, `fecha`, `espacio_idEspacio`) VALUES
(3, 1, 1, '01:00:00', '02:00:00', '2015-01-01', 2),
(4, 5, 2, '13:30:00', '14:30:00', '2015-03-08', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conferencias`
--

CREATE TABLE IF NOT EXISTS `conferencias` (
`idConferencia` int(11) NOT NULL,
  `acompañantes` varchar(50) DEFAULT NULL,
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
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
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

INSERT INTO `curso_taller` (`id`, `nombre`, `tipo`, `Profesional_idProfesional`, `lugar`, `num_horas`, `cantidad_personas`, `f_inicio`, `f_fin`, `h_inicio`, `h_fin`) VALUES
(0, NULL, 'Taller', 0, 'Xalap', 4, 40, '2015-12-10', '2015-12-24', '14:01:00', '14:02:00'),
(0, 'lo que sea', 'Curso', 1, 'aaaa', 3, 4, '2015-02-02', '2015-03-02', '02:01:00', '14:00:00'),
(0, 'rfrf', 'Curso', 2, 'eee', 3, 3, '2015-02-02', '2015-01-02', '01:00:00', '01:00:00'),
(11, 'asd', 'sadsa', 2, 'scas', 2, 2, '2015-12-03', '2015-12-02', '01:00:00', '01:00:00'),
(0, 'dfsd', 'Taller', 1, 'ssd', 1, 1, '2015-01-01', '2015-01-01', '01:00:00', '01:00:00'),
(0, 'asdda', 'Certificación', 1, 'Espacio de terapias', 1, 1, '2015-01-01', '2015-01-02', '01:00:00', '01:02:00'),
(0, 'loco', 'Taller', 1, 'Espacio conferencias', 1, 3, '2015-01-01', '2015-01-01', '01:00:00', '01:00:00'),
(0, 'wwwwwwwwww', 'Dilplomado', 2, 'Espacio de terapias', 1, 1, '2015-01-02', '2015-01-01', '01:01:00', '01:00:00'),
(0, 'lo que sea', 'Curso', 1, 'Espacio de terapias', 2, 2, '2015-01-01', '2015-01-01', '01:00:00', '01:00:00');

--
-- Disparadores `curso_taller`
--
DELIMITER //
CREATE TRIGGER `Donativo_curso_taller` AFTER INSERT ON `curso_taller`
 FOR EACH ROW INSERT INTO donativo_curso_taller SET id_curso_taller = NEW.id, tipo= NEW.tipo, fecha_ini = NEW.f_inicio, Monto_monetario = 0, Monto_especie = 0
//
DELIMITER ;

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `donativo`
--

INSERT INTO `donativo` (`idDonativo`, `Nombre`, `TipoDonativo`, `Cantidad`, `Fecha`, `Persona_idpersona`) VALUES
(11, 'Donativo', 'Monetario', 21, '2015-12-08', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donativo_curso_taller`
--

CREATE TABLE IF NOT EXISTS `donativo_curso_taller` (
`id_donativo_cur_tall` int(11) NOT NULL,
  `id_curso_taller` int(11) NOT NULL,
  `Tipo` varchar(45) NOT NULL,
  `fecha_ini` date NOT NULL,
  `Monto_monetario` float NOT NULL,
  `Monto_especie` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `donativo_curso_taller`
--

INSERT INTO `donativo_curso_taller` (`id_donativo_cur_tall`, `id_curso_taller`, `Tipo`, `fecha_ini`, `Monto_monetario`, `Monto_especie`) VALUES
(4, 0, 'Curso', '2015-01-01', 267.98, 0);

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
-- Estructura de tabla para la tabla `jornada`
--

CREATE TABLE IF NOT EXISTS `jornada` (
`idJornada` int(11) NOT NULL,
  `nombreJornada` varchar(35) NOT NULL,
  `tipo_servicio` varchar(45) NOT NULL,
  `detalle` varchar(45) NOT NULL,
  `espacio_idEspacio` int(11) NOT NULL,
  `idProfesional` varchar(45) NOT NULL,
  `año` int(11) NOT NULL,
  `mes` varchar(30) NOT NULL,
  `fechas` varchar(45) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `costo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jornada`
--

INSERT INTO `jornada` (`idJornada`, `nombreJornada`, `tipo_servicio`, `detalle`, `espacio_idEspacio`, `idProfesional`, `año`, `mes`, `fechas`, `hora_inicio`, `hora_fin`, `costo`) VALUES
(2, 'jornada1', 'Terapia', 'Ejemplo de jornada 2', 7, '1', 2015, 'Marzo', '14', '01:01:00', '02:02:00', 200),
(3, 'jornada2', 'Terapia', 'Alguno', 2, '1', 2015, 'Marzo', '13', '15:01:00', '16:00:00', 100),
(4, 'jornada3', 'Terapia', 'alguno', 2, '2', 2015, 'Febrero', '12', '03:01:00', '16:00:00', 10),
(5, 'Jornada prueba final', 'Terapia', 'algo algo', 7, '2', 2015, 'Marzo', '11,12,13', '14:00:00', '15:00:00', 400);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada_persona`
--

CREATE TABLE IF NOT EXISTS `jornada_persona` (
  `idPersona` int(11) NOT NULL,
  `jornada_persona_idJornada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jornada_persona`
--

INSERT INTO `jornada_persona` (`idPersona`, `jornada_persona_idJornada`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monto_monetario_cur_tall`
--

CREATE TABLE IF NOT EXISTS `monto_monetario_cur_tall` (
  `id_donativo_cur_tall` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `monto_monetario_cur_tall`
--

INSERT INTO `monto_monetario_cur_tall` (`id_donativo_cur_tall`, `fecha`, `cantidad`) VALUES
(0, '2015-12-09', 67.98),
(4, '2015-12-01', 100),
(4, '2015-12-02', 100);

--
-- Disparadores `monto_monetario_cur_tall`
--
DELIMITER //
CREATE TRIGGER `Monetario_curso_taller` AFTER INSERT ON `monto_monetario_cur_tall`
 FOR EACH ROW UPDATE donativo_curso_taller
SET monto_monetario = monto_monetario + NEW.cantidad
WHERE id_donativo_cur_tall = NEW.id_donativo_cur_tall
//
DELIMITER ;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `nombrePersona`, `apaPersona`, `amaPersona`, `callePersona`, `numDirPersona`, `coloniaPersona`, `celPersona`, `correoPersona`, `sexo`, `fechaNa`) VALUES
(1, 'Christian', 'Vargas', 'Saavedra', 'Apeninos', 8, 'Lomas de Casa Blanca', '012281404359', 'lirical_niggar@hotmail.com', 'M', '1992-02-29'),
(3, 'Diana', 'Espiritu', 'Vaes', 'Alguna', 5, 'Otra colonia', '51213', 'algo@gmail.com', 'F', '1988-03-02'),
(4, 'Carlos', 'Medina', 'Garcia', 'Camarillo', 2, 'Sumidero', '123454323', 'car@gmail.com', 'M', '2015-12-15'),
(5, 'Karen ', 'Murrieta', 'Hernandez', 'Miradores', 2, 'Progreso', '1234543213', 'kar@hotmail.com', 'F', '1994-02-02');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesional`
--

INSERT INTO `profesional` (`idProfesional`, `nombrePro`, `apaPro`, `amaPro`, `celPro`, `correoPro`, `ramaMedica`, `usuario`, `contraseña`) VALUES
(1, 'Aldo', 'Jose', 'Espiritu', '82458556', 'aldikistrikis_pocholate@gmail.com', 'Psicología', 'aldo', 'aldo'),
(2, 'Carlos', 'Alguno', 'Alguno', '1232323221', 'car@hotmail.com', 'Medicina', 'car', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE IF NOT EXISTS `servicios` (
`id_servicio` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `Nombre`) VALUES
(1, 'Cita'),
(2, 'Taller');

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
-- Indices de la tabla `donativo_curso_taller`
--
ALTER TABLE `donativo_curso_taller`
 ADD PRIMARY KEY (`id_donativo_cur_tall`);

--
-- Indices de la tabla `espacio`
--
ALTER TABLE `espacio`
 ADD PRIMARY KEY (`idEspacio`);

--
-- Indices de la tabla `jornada`
--
ALTER TABLE `jornada`
 ADD PRIMARY KEY (`idJornada`);

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
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
 ADD PRIMARY KEY (`id_servicio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
MODIFY `idcita` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `conferencias`
--
ALTER TABLE `conferencias`
MODIFY `idConferencia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `donativo`
--
ALTER TABLE `donativo`
MODIFY `idDonativo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `donativo_curso_taller`
--
ALTER TABLE `donativo_curso_taller`
MODIFY `id_donativo_cur_tall` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `espacio`
--
ALTER TABLE `espacio`
MODIFY `idEspacio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `jornada`
--
ALTER TABLE `jornada`
MODIFY `idJornada` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `profesional`
--
ALTER TABLE `profesional`
MODIFY `idProfesional` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
