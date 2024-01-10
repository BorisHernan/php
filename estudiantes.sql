-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-01-2024 a las 06:04:03
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
-- Base de datos: `registro_estudiantes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(11) NOT NULL,
  `dni` varchar(255) DEFAULT NULL,
  `nivel` varchar(255) DEFAULT NULL,
  `grado` varchar(255) DEFAULT NULL,
  `seccion` varchar(255) DEFAULT NULL,
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
  `dniApo` int(11) DEFAULT NULL,
  `correoApo` varchar(255) DEFAULT NULL,
  `celularfijo` varchar(20) DEFAULT NULL,
  `celular1` varchar(20) DEFAULT NULL,
  `celular2` varchar(20) DEFAULT NULL,
  `celular3` varchar(20) DEFAULT NULL,
  `newfld` varchar(255) DEFAULT NULL,
  `deben` decimal(10,2) DEFAULT NULL,
  `f` int(11) DEFAULT NULL,
  `c` int(11) DEFAULT NULL,
  `d` int(11) DEFAULT NULL,
  `a` int(11) DEFAULT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `dni`, `nivel`, `grado`, `seccion`, `apenom`, `mensualidad`, `fecnac`, `sexo`, `direccion`, `distrito`, `procedencia`, `emailA`, `celularA`, `apoderado`, `fechnacApo`, `lugnacApo`, `gradoinstr`, `ocupacion`, `dniApo`, `correoApo`, `celularfijo`, `celular1`, `celular2`, `celular3`, `newfld`, `deben`, `f`, `c`, `d`, `a`, `img`) VALUES
(1, '77902058', 'P', '1', 'A', 'Alcazar Aldazabal, Carlos Caleb', '130', '2012-09-01', 'M', 'C.P. Hualcara Mz. C - Lote 05', 'Imperial', 'Maria Enriqueta Dominice', NULL, '', 'Aldazabal Villcas, H', '2024-01-09', 'Superior', 'Docente', '15341402', 0, NULL, '965772423', NULL, NULL, NULL, NULL, 1.00, NULL, NULL, NULL, NULL, 'img/img1.jpg'),
(2, '63695009', 'P', '1', 'A', 'Condori Alcala, Jesús Andrés', '260', '2012-05-19', 'M', 'Av. Grau C/ Panamericana Sur S/N', 'San Vicente', 'María Enriqueta Dominicci', NULL, 'Alcalá Díaz, María J', '1983-05-13', '0000-00-00', 'Superior', 'Enfermera', '41835533', 0, NULL, '962319246', NULL, NULL, NULL, NULL, 1.00, NULL, NULL, NULL, NULL, 'img/img2.jpg'),
(3, '78026836', 'P', '1', 'A', 'Cuba Pariona, Jorge Aaron', '260', '2013-02-26', 'M', 'Urb. Ramos Larrea  Jr. Jose R. Espinoza Mz. A - Lo', 'Imperial', 'Niños de Belen', NULL, '', '', '1974-12-17', 'Pariona Pérez, Lidia', 'Secundaria', 'Ama de Casa', 10000703, '', '926781349', '955347860', NULL, NULL, NULL, 1.00, NULL, NULL, NULL, NULL, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
