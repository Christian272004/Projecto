-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-10-2024 a las 18:26:26
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
-- Base de datos: `projecte`
--
CREATE DATABASE IF NOT EXISTS `projecte` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projecte`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `continentes`
--

DROP TABLE IF EXISTS `continentes`;
CREATE TABLE IF NOT EXISTS `continentes` (
  `id_continente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_continente` varchar(100) NOT NULL,
  PRIMARY KEY (`id_continente`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `continentes`
--

INSERT INTO `continentes` (`id_continente`, `nombre_continente`) VALUES
(1, 'África'),
(2, 'América'),
(3, 'Asia'),
(4, 'Europa'),
(5, 'Oceanía');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacio_viatge`
--

DROP TABLE IF EXISTS `informacio_viatge`;
CREATE TABLE IF NOT EXISTS `informacio_viatge` (
  `Data` date NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Telefon` varchar(13) NOT NULL,
  `Persones` varchar(50) NOT NULL,
  `Descompte` tinyint(1) NOT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

DROP TABLE IF EXISTS `paises`;
CREATE TABLE IF NOT EXISTS `paises` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_pais` varchar(100) NOT NULL,
  `id_continente` int(11) DEFAULT NULL,
  `precio_por_persona` decimal(10,2) NOT NULL,
  `foto` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_pais`),
  KEY `id_continente` (`id_continente`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id_pais`, `nombre_pais`, `id_continente`, `precio_por_persona`, `foto`) VALUES
(1, 'Egipto', 1, 600.00, ''),
(2, 'Sudáfrica', 1, 1200.00, ''),
(3, 'Nigeria', 1, 900.00, ''),
(4, 'Kenia', 1, 1100.00, ''),
(5, 'Marruecos', 1, 300.00, ''),
(6, 'Estados Unidos', 2, 800.00, ''),
(7, 'Brasil', 2, 950.00, ''),
(8, 'México', 2, 850.00, ''),
(9, 'Argentina', 2, 1000.00, ''),
(11, 'China', 3, 1300.00, ''),
(12, 'Japón', 3, 1400.00, ''),
(13, 'India', 3, 1000.00, ''),
(14, 'Corea del Sur', 3, 1200.00, ''),
(15, 'Tailandia', 3, 1100.00, ''),
(16, 'Francia', 4, 200.00, ''),
(17, 'España', 4, 150.00, ''),
(18, 'Alemania', 4, 300.00, ''),
(19, 'Italia', 4, 250.00, ''),
(20, 'Reino Unido', 4, 400.00, ''),
(21, 'Australia', 5, 1500.00, ''),
(22, 'Nueva Zelanda', 5, 1600.00, ''),
(23, 'Fiyi', 5, 1700.00, ''),
(24, 'Papúa Nueva Guinea', 5, 1800.00, ''),
(25, 'Samoa', 5, 1750.00, '');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `paises`
--
ALTER TABLE `paises`
  ADD CONSTRAINT `paises_ibfk_1` FOREIGN KEY (`id_continente`) REFERENCES `continentes` (`id_continente`) ON DELETE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
