-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2015 a las 06:20:16
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
(0, NULL, 'Taller', 0, 'Xalap', 4, 40, '2015-12-10', '2015-12-24', '14:01:00', '14:02:00');

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
(2, 'Espacio de terapias', 1, 1),
(7, 'Espacio conferencias', 20, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hojaclinica`
--

CREATE TABLE `hojaclinica` (
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

CREATE TABLE `hojareferencia` (
  `idhojaReferencia` int(11) NOT NULL,
  `hojaReferenciacol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada`
--

CREATE TABLE `jornada` (
  `idJornada` int(11) NOT NULL,
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

INSERT INTO `jornada` (`idJornada`, `tipo_servicio`, `detalle`, `espacio_idEspacio`, `idProfesional`, `año`, `mes`, `fechas`, `hora_inicio`, `hora_fin`, `costo`) VALUES
(1, 'Consulta', 'Ejemplo de jornada', 2, '1', 2015, 'Enero', '13', '14:00:00', '16:00:00', 400),
(2, 'Terapia', 'Ejemplo de jornada 2', 7, '1', 2015, 'Marzo', '14', '01:01:00', '02:02:00', 200),
(3, 'Terapia', 'Alguno', 2, '1', 2015, 'Marzo', '13', '15:01:00', '16:00:00', 100),
(4, 'Terapia', 'alguno', 2, '2', 2015, 'Febrero', '12', '03:01:00', '16:00:00', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada_persona`
--

CREATE TABLE `jornada_persona` (
  `idPersona` varchar(45) NOT NULL,
  `idJornada` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(4, 'Carlos', 'Medina', 'García', 'Camarillo', 2, 'Sumidero', '123454323', 'car@gmail.com', 'M', '2015-12-15'),
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
  MODIFY `idcita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `idEspacio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
  MODIFY `idJornada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
