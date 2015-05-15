-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2015 a las 15:31:33
-- Versión del servidor: 10.1.8-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cepii`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `idcita` int(11) NOT NULL,
  `persona_idpersona` int(11) NOT NULL,
  `profesional_idProfesional` int(11) NOT NULL,
  `horaIni` time DEFAULT NULL,
  `horaFin` time NOT NULL,
  `fecha` date DEFAULT NULL,
  `espacio_idEspacio` int(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `conferencias` (
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

CREATE TABLE `curso_taller` (
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
(1, 'Masaje lumbar', 'Curso', 1, '8', 2, 10, '2015-12-08', '2015-12-08', '11:00:00', '14:00:00'),
(16, 'Masajes terapéutico', 'Certificación', 2, 'CC1', 2, 2, '2015-01-01', '2015-01-01', '01:00:00', '01:00:00');

--
-- Disparadores `curso_taller`
--
DELIMITER $$
CREATE TRIGGER `Donativo_curso_taller` AFTER INSERT ON `curso_taller` FOR EACH ROW INSERT INTO donativo_curso_taller SET id_curso_taller = NEW.id, tipo= NEW.tipo, fecha_ini = NEW.f_inicio, Monto_monetario = 0, Monto_especie = 0
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donativo`
--

CREATE TABLE `donativo` (
  `idDonativo` int(11) NOT NULL,
  `Nombre` varchar(20) DEFAULT NULL,
  `TipoDonativo` varchar(20) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Fecha` date NOT NULL,
  `Persona_idpersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `donativo`
--

INSERT INTO `donativo` (`idDonativo`, `Nombre`, `TipoDonativo`, `Cantidad`, `Fecha`, `Persona_idpersona`) VALUES
(11, 'Donativo', 'Monetario', 21, '2015-12-08', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donativo_citas`
--

CREATE TABLE `donativo_citas` (
  `id_donativo_cita` int(11) NOT NULL,
  `año` int(10) NOT NULL,
  `mes` int(10) NOT NULL,
  `Monto_monetario` float(10,4) NOT NULL,
  `Monto_especie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `donativo_citas`
--

INSERT INTO `donativo_citas` (`id_donativo_cita`, `año`, `mes`, `Monto_monetario`, `Monto_especie`) VALUES
(1, 2015, 8, 0.0000, 134),
(2, 2015, 1, 0.0000, 0),
(3, 2015, 8, 0.0000, 0),
(4, 2015, 8, 0.0000, 0),
(5, 2015, 8, 0.0000, 0),
(6, 2015, 7, 0.0000, 0),
(7, 2015, 5, 0.0000, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donativo_curso_taller`
--

CREATE TABLE `donativo_curso_taller` (
  `id_donativo_cur_tall` int(11) NOT NULL,
  `id_curso_taller` int(11) NOT NULL,
  `Tipo` varchar(45) NOT NULL,
  `fecha_ini` date NOT NULL,
  `Monto_monetario` float NOT NULL,
  `Monto_especie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `donativo_curso_taller`
--

INSERT INTO `donativo_curso_taller` (`id_donativo_cur_tall`, `id_curso_taller`, `Tipo`, `fecha_ini`, `Monto_monetario`, `Monto_especie`) VALUES
(11, 1, 'Curso', '2015-12-08', 847, 1056),
(12, 16, 'Certificación', '2015-01-01', 100, 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donativo_jornadas`
--

CREATE TABLE `donativo_jornadas` (
  `id_donativo_jornada` int(11) NOT NULL,
  `nombreJornadaD` varchar(45) NOT NULL,
  `tipoServicioD` varchar(45) NOT NULL,
  `detalleD` varchar(45) NOT NULL,
  `añoD` int(11) NOT NULL,
  `mesD` varchar(30) NOT NULL,
  `Monto_monetario` float(10,2) NOT NULL,
  `Monto_especie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `donativo_jornadas`
--

INSERT INTO `donativo_jornadas` (`id_donativo_jornada`, `nombreJornadaD`, `tipoServicioD`, `detalleD`, `añoD`, `mesD`, `Monto_monetario`, `Monto_especie`) VALUES
(1, 'Jornada', 'Jornadita', 'dddd', 2015, 'Marzo', 24.00, 23),
(3, 'eeee', 'Terapia', 'eee', 2015, 'Enero', 0.00, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espacio`
--

CREATE TABLE `espacio` (
  `idEspacio` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Capacidad` int(11) NOT NULL,
  `Tipo` tinyint(1) NOT NULL COMMENT '1 si es espacio interno--0 si es externo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `espacio`
--

INSERT INTO `espacio` (`idEspacio`, `Nombre`, `Capacidad`, `Tipo`) VALUES
(8, 'CC1', 20, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada`
--

CREATE TABLE `jornada` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jornada`
--

INSERT INTO `jornada` (`idJornada`, `nombreJornada`, `tipo_servicio`, `detalle`, `espacio_idEspacio`, `idProfesional`, `año`, `mes`, `fechas`, `hora_inicio`, `hora_fin`, `costo`) VALUES
(1, 'lkmkl', 'lkmkkmlkkl', 'km k', 8, 'al', 23, 'klmk', 'klmk', '03:00:00', '00:08:00', 23),
(7, 'www', 'Terapia', 'ddd', 8, '2', 2015, 'Enero', '4', '01:00:00', '01:00:00', 2),
(8, 'eeee', 'Terapia', 'eee', 8, '2', 2015, 'Enero', 'w,2', '01:00:00', '01:00:00', 13);

--
-- Disparadores `jornada`
--
DELIMITER $$
CREATE TRIGGER `Donativo_jornada` AFTER INSERT ON `jornada` FOR EACH ROW INSERT INTO donativo_jornadas SET nombreJornadaD = NEW.nombreJornada, tipoServicioD= NEW.tipo_servicio, detalleD = NEW.detalle, añoD = NEW.año, mesD = NEW.mes, Monto_monetario = 0, Monto_especie = 0
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada_persona`
--

CREATE TABLE `jornada_persona` (
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
-- Estructura de tabla para la tabla `monto_especie_cita`
--

CREATE TABLE `monto_especie_cita` (
  `id_donativo_cita` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `monto_especie_cita`
--

INSERT INTO `monto_especie_cita` (`id_donativo_cita`, `fecha`, `cantidad`, `descripcion`) VALUES
(1, '2015-12-10', 2, 'kkk'),
(1, '2015-12-08', 100, 'Ahora si'),
(1, '2015-08-04', 134, 'xxxx');

--
-- Disparadores `monto_especie_cita`
--
DELIMITER $$
CREATE TRIGGER `Especie_cita` AFTER INSERT ON `monto_especie_cita` FOR EACH ROW UPDATE donativo_citas
SET Monto_especie = Monto_especie + NEW.cantidad
WHERE id_donativo_cita = NEW.id_donativo_cita
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monto_especie_cur_tall`
--

CREATE TABLE `monto_especie_cur_tall` (
  `id_donativo_cur_tall` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `monto_especie_cur_tall`
--

INSERT INTO `monto_especie_cur_tall` (`id_donativo_cur_tall`, `fecha`, `cantidad`, `descripcion`) VALUES
(11, '2015-12-15', 23, 'wdd'),
(11, '2015-12-15', 33, 'tt'),
(11, '2015-12-15', 1000, 'calcetines'),
(12, '2015-05-15', 500, 'jabones');

--
-- Disparadores `monto_especie_cur_tall`
--
DELIMITER $$
CREATE TRIGGER `Especie_curso_taller` AFTER INSERT ON `monto_especie_cur_tall` FOR EACH ROW UPDATE donativo_curso_taller
SET monto_especie = monto_especie + NEW.cantidad
WHERE id_donativo_cur_tall = NEW.id_donativo_cur_tall
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monto_especie_jornada`
--

CREATE TABLE `monto_especie_jornada` (
  `id_donativo_jornada` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `monto_especie_jornada`
--

INSERT INTO `monto_especie_jornada` (`id_donativo_jornada`, `fecha`, `cantidad`, `descripcion`) VALUES
(1, '2015-12-01', 23, 'mmm');

--
-- Disparadores `monto_especie_jornada`
--
DELIMITER $$
CREATE TRIGGER `Especie_jornada` AFTER INSERT ON `monto_especie_jornada` FOR EACH ROW UPDATE donativo_jornadas
SET monto_especie = monto_especie + NEW.cantidad
WHERE id_donativo_jornada = NEW.id_donativo_jornada
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monto_monetario_cita`
--

CREATE TABLE `monto_monetario_cita` (
  `id_donativo_cita` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `monto_monetario_cita`
--

INSERT INTO `monto_monetario_cita` (`id_donativo_cita`, `fecha`, `cantidad`) VALUES
(1, '2015-12-02', 23);

--
-- Disparadores `monto_monetario_cita`
--
DELIMITER $$
CREATE TRIGGER `Monetario_cita` AFTER INSERT ON `monto_monetario_cita` FOR EACH ROW UPDATE donativo_citas
SET monto_monetario = monto_monetario + NEW.cantidad
WHERE id_donativo_cita = NEW.id_donativo_cita
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monto_monetario_cur_tall`
--

CREATE TABLE `monto_monetario_cur_tall` (
  `id_donativo_cur_tall` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `monto_monetario_cur_tall`
--

INSERT INTO `monto_monetario_cur_tall` (`id_donativo_cur_tall`, `fecha`, `cantidad`) VALUES
(11, '2015-12-15', 23),
(11, '2015-12-15', 120),
(11, '2015-12-15', 120),
(11, '2015-12-15', 40),
(11, '2015-12-15', 200),
(11, '2015-12-09', 344),
(12, '2015-05-15', 100);

--
-- Disparadores `monto_monetario_cur_tall`
--
DELIMITER $$
CREATE TRIGGER `Monetario_curso_taller` AFTER INSERT ON `monto_monetario_cur_tall` FOR EACH ROW UPDATE donativo_curso_taller
SET monto_monetario = monto_monetario + NEW.cantidad
WHERE id_donativo_cur_tall = NEW.id_donativo_cur_tall
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monto_monetario_jornada`
--

CREATE TABLE `monto_monetario_jornada` (
  `id_donativo_jornada` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `monto_monetario_jornada`
--

INSERT INTO `monto_monetario_jornada` (`id_donativo_jornada`, `fecha`, `cantidad`) VALUES
(1, '2015-12-08', 24);

--
-- Disparadores `monto_monetario_jornada`
--
DELIMITER $$
CREATE TRIGGER `Monetario_jornada` AFTER INSERT ON `monto_monetario_jornada` FOR EACH ROW UPDATE donativo_jornadas
SET monto_monetario = monto_monetario + NEW.cantidad
WHERE id_donativo_jornada = NEW.id_donativo_jornada
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `profesional` (
  `idProfesional` int(11) NOT NULL,
  `nombrePro` varchar(45) DEFAULT NULL,
  `apaPro` varchar(45) DEFAULT NULL,
  `amaPro` varchar(45) DEFAULT NULL,
  `celPro` varchar(45) DEFAULT NULL,
  `correoPro` varchar(45) DEFAULT NULL,
  `ramaMedica` varchar(45) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `contraseña` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `servicios` (
  `id_servicio` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indices de la tabla `curso_taller`
--
ALTER TABLE `curso_taller`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `donativo`
--
ALTER TABLE `donativo`
  ADD PRIMARY KEY (`idDonativo`);

--
-- Indices de la tabla `donativo_citas`
--
ALTER TABLE `donativo_citas`
  ADD PRIMARY KEY (`id_donativo_cita`);

--
-- Indices de la tabla `donativo_curso_taller`
--
ALTER TABLE `donativo_curso_taller`
  ADD PRIMARY KEY (`id_donativo_cur_tall`);

--
-- Indices de la tabla `donativo_jornadas`
--
ALTER TABLE `donativo_jornadas`
  ADD PRIMARY KEY (`id_donativo_jornada`);

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
  MODIFY `idcita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `conferencias`
--
ALTER TABLE `conferencias`
  MODIFY `idConferencia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `curso_taller`
--
ALTER TABLE `curso_taller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `donativo`
--
ALTER TABLE `donativo`
  MODIFY `idDonativo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `donativo_citas`
--
ALTER TABLE `donativo_citas`
  MODIFY `id_donativo_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `donativo_curso_taller`
--
ALTER TABLE `donativo_curso_taller`
  MODIFY `id_donativo_cur_tall` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `donativo_jornadas`
--
ALTER TABLE `donativo_jornadas`
  MODIFY `id_donativo_jornada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `espacio`
--
ALTER TABLE `espacio`
  MODIFY `idEspacio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `jornada`
--
ALTER TABLE `jornada`
  MODIFY `idJornada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `profesional`
--
ALTER TABLE `profesional`
  MODIFY `idProfesional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
