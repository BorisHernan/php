-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-01-2024 a las 23:38:07
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: ``
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistenciae`
--

CREATE DATABASE registro_estudiantes;

USE registro_estudiantes;

CREATE TABLE `asistenciae` (
  `idasisentr` int(11) NOT NULL,
  `idalum` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechadate` date DEFAULT curdate(),
  `fechatime` time DEFAULT curtime(),
  `asis` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asistenciae`
--

INSERT INTO `asistenciae` (`idasisentr`, `idalum`, `fecha`, `fechadate`, `fechatime`, `asis`) VALUES
(1, 1, '2024-01-10 15:27:57', '2024-01-10', '10:27:57', 'A'),
(2, 1, '2024-01-10 16:18:48', '2024-01-10', '11:18:48', 'A'),
(3, 1, '2024-01-10 16:18:57', '2024-01-10', '11:18:57', 'A'),
(4, 1, '2024-01-10 16:18:58', '2024-01-10', '11:18:58', 'A'),
(5, 1, '2024-01-10 16:19:00', '2024-01-10', '11:19:00', 'A'),
(6, 1, '2024-01-10 16:19:27', '2024-01-10', '11:19:27', 'F'),
(7, 2, '2024-01-10 16:39:54', '2024-01-10', '11:39:54', 'A'),
(8, 3, '2024-01-10 16:44:23', '2024-01-10', '11:44:23', 'A'),
(9, 1, '2024-01-10 17:01:24', '2024-01-10', '12:01:24', 'A'),
(10, 1, '2024-01-10 17:01:28', '2024-01-10', '12:01:28', 'A'),
(11, 1, '2024-01-10 17:01:31', '2024-01-10', '12:01:31', 'F'),
(12, 1, '2024-01-10 17:05:56', '2024-01-10', '12:05:56', 'A'),
(13, 1, '2024-01-10 17:06:07', '2024-01-10', '12:06:07', 'F'),
(14, 1, '2024-01-10 17:06:31', '2024-01-10', '12:06:31', 'F'),
(15, 1, '2024-01-10 17:06:33', '2024-01-10', '12:06:33', 'F'),
(16, 1, '2024-01-10 17:06:33', '2024-01-10', '12:06:33', 'A'),
(17, 1, '2024-01-10 17:09:57', '2024-01-10', '12:09:57', 'A'),
(18, 1, '2024-01-10 17:10:29', '2024-01-10', '12:10:29', 'A'),
(19, 0, '2024-01-10 21:59:20', '2024-01-10', '16:59:20', 'A'),
(20, 1, '2024-01-10 22:03:26', '2024-01-10', '17:03:26', 'A'),
(21, 1, '2024-01-10 22:03:56', '2024-01-10', '17:03:56', 'A'),
(22, 2, '2024-01-10 22:04:05', '2024-01-10', '17:04:05', 'A'),
(23, 2, '2024-01-10 22:04:16', '2024-01-10', '17:04:16', 'A'),
(24, 3, '2024-01-10 22:04:57', '2024-01-10', '17:04:57', 'A'),
(25, 2, '2024-01-10 22:13:49', '2024-01-10', '17:13:49', 'A'),
(26, 2, '2024-01-10 22:13:51', '2024-01-10', '17:13:51', 'A'),
(27, 1, '2024-01-10 22:14:05', '2024-01-10', '17:14:05', 'A'),
(28, 2, '2024-01-10 22:14:30', '2024-01-10', '17:14:30', 'A'),
(29, 1, '2024-01-10 22:14:45', '2024-01-10', '17:14:45', 'A'),
(30, 2, '2024-01-10 22:15:14', '2024-01-10', '17:15:14', 'A'),
(31, 1, '2024-01-10 22:15:26', '2024-01-10', '17:15:26', 'A'),
(32, 1, '2024-01-10 22:18:06', '2024-01-10', '17:18:06', 'A'),
(33, 1, '2024-01-10 22:18:19', '2024-01-10', '17:18:19', 'A'),
(34, 2, '2024-01-10 22:18:30', '2024-01-10', '17:18:30', 'A'),
(35, 1, '2024-01-10 22:36:42', '2024-01-10', '17:36:42', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `idasissali` int(11) NOT NULL,
  `idalum` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechadate` date DEFAULT curdate(),
  `fechatime` time DEFAULT curtime(),
  `asis` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(11) NOT NULL,
  `dni` char(8) NOT NULL,
  `nivel` varchar(255) DEFAULT NULL,
  `grado` char(1) DEFAULT NULL,
  `seccion` char(1) DEFAULT NULL,
  `apenom` varchar(255) DEFAULT NULL,
  `mensualidad` varchar(255) DEFAULT NULL,
  `fecnac` date DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `distrito` varchar(255) DEFAULT NULL,
  `procedencia` varchar(255) DEFAULT NULL,
  `emailA` varchar(255) DEFAULT NULL,
  `celularA` varchar(20) DEFAULT NULL,
  `apoderado` varchar(255) DEFAULT NULL,
  `fechnacApo` date DEFAULT NULL,
  `lugnacApo` varchar(255) DEFAULT NULL,
  `gradoinstr` varchar(255) DEFAULT NULL,
  `ocupacion` varchar(255) DEFAULT NULL,
  `dniApo` char(8) DEFAULT NULL,
  `correoApo` varchar(255) DEFAULT NULL,
  `celularfijo` varchar(20) DEFAULT NULL,
  `celular1` char(9) DEFAULT NULL,
  `celular2` char(9) DEFAULT NULL,
  `celular3` char(9) DEFAULT NULL,
  `newfld` varchar(255) DEFAULT NULL,
  `deben` int(3) DEFAULT NULL,
  `f` int(11) DEFAULT NULL,
  `c` int(11) DEFAULT NULL,
  `d` int(11) DEFAULT NULL,
  `a` int(11) DEFAULT NULL,
  `img` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `dni`, `nivel`, `grado`, `seccion`, `apenom`, `mensualidad`, `fecnac`, `sexo`, `direccion`, `distrito`, `procedencia`, `emailA`, `celularA`, `apoderado`, `fechnacApo`, `lugnacApo`, `gradoinstr`, `ocupacion`, `dniApo`, `correoApo`, `celularfijo`, `celular1`, `celular2`, `celular3`, `newfld`, `deben`, `f`, `c`, `d`, `a`, `img`) VALUES
(1, '77902058', 'P', '1', 'A', 'Alcazar Aldazabal, Carlos Caleb', '130', '2012-09-01', 'M', 'C.P. Hualcara Mz. C - Lote 05', 'Imperial', 'Maria Enriqueta Dominice', NULL, '', 'Aldazabal Villcas, H', '2024-01-09', 'Superior', 'Docente', 'Profesor', '15341402', NULL, '965772423', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 'img/img1.jpg'),
(2, '63695009', 'P', '1', 'A', 'Condori Alcala, Jesús Andrés', '260', '2012-05-19', 'M', 'Av. Grau C/ Panamericana Sur S/N', 'San Vicente', 'María Enriqueta Dominicci', NULL, '960847347', 'Alcalá Díaz, María J', '1983-05-13', '', 'Superior', 'Enfermera', '41835533', NULL, '962319246', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 'img/img2.jpg'),
(3, '78026836', 'P', '1', 'A', 'Cuba Pariona, Jorge Aaron', '260', '2013-02-26', 'M', 'Urb. Ramos Larrea  Jr. Jose R. Espinoza Mz. A - Lo', 'Imperial', 'Niños de Belen', NULL, '', '', '1974-12-17', 'Pariona Pérez, Lidia', 'Secundaria', 'Ama de Casa', '10000703', '', '926781349', '955347860', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistenciae`
--
ALTER TABLE `asistenciae`
  ADD PRIMARY KEY (`idasisentr`);

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`idasissali`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistenciae`
--
ALTER TABLE `asistenciae`
  MODIFY `idasisentr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `idasissali` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
