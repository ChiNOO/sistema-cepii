-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2015 a las 09:16:40
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
  `hora` varchar(45) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `consultorio` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Tipo_Servicio` varchar(20) NOT NULL
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesional`
--

INSERT INTO `profesional` (`idProfesional`, `nombrePro`, `apaPro`, `amaPro`, `celPro`, `correoPro`, `ramaMedica`, `usuario`, `contraseña`) VALUES
(0, 'Roberto', 'Garcia', 'Perez', '2255686', 'roberto@gmail.com', 'Medicina', 'robert', 'robert');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
