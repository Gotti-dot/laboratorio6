-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-04-2025 a las 23:27:03
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_instituto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` int(11) NOT NULL,
  `CarreraCodigo` varchar(15) DEFAULT NULL,
  `CarreraNombre` varchar(100) DEFAULT NULL,
  `CarreraAbreviacion` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `CarreraCodigo`, `CarreraNombre`, `CarreraAbreviacion`) VALUES
(1, 'INF123', 'INFORMATICA ', 'INF');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id` int(11) NOT NULL,
  `DocenteCodigo` varchar(15) DEFAULT NULL,
  `DocenteCarnetIdentidad` varchar(15) DEFAULT NULL,
  `DocenteNombres` varchar(50) DEFAULT NULL,
  `DocenteFechaNacimiento` varchar(12) DEFAULT NULL,
  `DocenteDireccion` varchar(255) DEFAULT NULL,
  `DocenteCelular` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id`, `DocenteCodigo`, `DocenteCarnetIdentidad`, `DocenteNombres`, `DocenteFechaNacimiento`, `DocenteDireccion`, `DocenteCelular`) VALUES
(1, '0001', '524252', 'Erik', '02-23-2000', '333', '73535423');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `ci` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `carrera` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`ci`, `nombres`, `apellidos`, `email`, `celular`, `carrera`) VALUES
(8405553, 'Americo', 'Flores', 'americo@gmail.com', '74014388', 'INFORMATICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `MateriaCodigo` varchar(15) DEFAULT NULL,
  `MateriaNombre` varchar(8) DEFAULT NULL,
  `MateriaHoraAcademica` varchar(10) DEFAULT NULL,
  `MateriaTipo` int(1) DEFAULT NULL,
  `MateriaPensum` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `MateriaCodigo`, `MateriaNombre`, `MateriaHoraAcademica`, `MateriaTipo`, `MateriaPensum`) VALUES
(1, 'TEW01', 'TEW', '3', 0, 'Basico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestres`
--

CREATE TABLE `semestres` (
  `id` int(11) NOT NULL,
  `SemestreCodigo` varchar(15) DEFAULT NULL,
  `SemestreNumeral` bit(1) DEFAULT NULL,
  `SemestreLiteral` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `semestres`
--

INSERT INTO `semestres` (`id`, `SemestreCodigo`, `SemestreNumeral`, `SemestreLiteral`) VALUES
(1, '001', b'1', 'PRIMERO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`ci`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `semestres`
--
ALTER TABLE `semestres`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
