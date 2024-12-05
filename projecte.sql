-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2024 a las 14:17:17
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
DROP DATABASE IF EXISTS projecte;
CREATE DATABASE IF NOT EXISTS projecte;
USE projecte;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `continentes`
--

CREATE TABLE `continentes` (
  `id_continente` int(11) NOT NULL,
  `nombre_continente` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `informacio_viatge` (
  `Data` date NOT NULL,
  `continent` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `preu_persona` int(11) NOT NULL,
  `preu_viatge` int(11) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Telefon` varchar(13) NOT NULL,
  `Persones` varchar(50) NOT NULL,
  `Descompte` tinyint(1) NOT NULL,
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `informacio_viatge`
--

INSERT INTO `informacio_viatge` (`Data`, `continent`, `pais`, `preu_persona`, `preu_viatge`, `Nom`, `Telefon`, `Persones`, `Descompte`, `Id`) VALUES
('2024-11-28', '2', 'Estados Unidos', 800, 800, 'Pedro', '6546825141', '1', 0, 43),
('2024-11-28', '4', 'España', 150, 300, 'Pedro', '6546825141', '2', 0, 44),
('2024-12-08', '3', 'India', 1000, 1, 'Pedro', '6546825141', '1', 0, 45),
('2025-01-01', '1', 'Egipto', 600, 600, 'Pedro', '6546825141', '1', 0, 47);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id_pais` int(11) NOT NULL,
  `nombre_pais` varchar(100) NOT NULL,
  `id_continente` int(11) DEFAULT NULL,
  `precio_por_persona` decimal(10,2) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id_pais`, `nombre_pais`, `id_continente`, `precio_por_persona`, `foto`) VALUES
(1, 'Egipto', 1, 600.00, 'Vista/imagenes/Egipto.jpg'),
(2, 'Sudáfrica', 1, 1200.00, 'Vista/imagenes/Sudafrica.jpg'),
(3, 'Nigeria', 1, 900.00, 'Vista/imagenes/Nigeria.jpg'),
(4, 'Kenia', 1, 1100.00, 'Vista/imagenes/Kenia.jpg'),
(5, 'Marruecos', 1, 300.00, 'Vista/imagenes/Marruecos.jpg'),
(6, 'Estados Unidos', 2, 800.00, 'Vista/imagenes/EEUU.jpg'),
(7, 'Brasil', 2, 950.00, 'Vista/imagenes/Brasil.jpg'),
(8, 'México', 2, 850.00, 'Vista/imagenes/Mexico.jpg'),
(9, 'Argentina', 2, 1000.00, 'Vista/imagenes/Argentina.jpg'),
(10, 'Canadà', 2, 1400.00, 'Vista/imagenes/Canada.jpg'),
(12, 'China', 3, 1300.00, 'Vista/imagenes/China.jpg'),
(13, 'Japón', 3, 1400.00, 'Vista/imagenes/Japon.jpg'),
(14, 'India', 3, 1000.00, 'Vista/imagenes/India.jpg'),
(15, 'Corea del Sur', 3, 1200.00, 'Vista/imagenes/CoreaSur.jpg'),
(16, 'Tailandia', 3, 1100.00, 'Vista/imagenes/Tailandia.jpg'),
(17, 'Francia', 4, 200.00, 'Vista/imagenes/Francia.jpg'),
(18, 'España', 4, 150.00, 'Vista/imagenes/Espana.jpg'),
(19, 'Alemania', 4, 300.00, 'Vista/imagenes/Alemania.jpg'),
(20, 'Italia', 4, 250.00, 'Vista/imagenes/Italia.jpg'),
(21, 'Reino Unido', 4, 400.00, 'Vista/imagenes/ReinoUnido.jpg'),
(22, 'Australia', 5, 1500.00, 'Vista/imagenes/Australia.jpg'),
(23, 'Nueva Zelanda', 5, 1600.00, 'Vista/imagenes/NuevaZelanda.jpg'),
(24, 'Fiyi', 5, 1700.00, 'Vista/imagenes/Fiji.jpg'),
(25, 'Papúa Nueva Guinea', 5, 1800.00, 'Vista/imagenes/NuevaGuinea.jpg'),
(26, 'Samoa', 5, 1750.00, 'Vista/imagenes/Samoa.jpg');


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `continentes`
--
ALTER TABLE `continentes`
  ADD PRIMARY KEY (`id_continente`);

--
-- Indices de la tabla `informacio_viatge`
--
ALTER TABLE `informacio_viatge`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id_pais`),
  ADD KEY `id_continente` (`id_continente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `continentes`
--
ALTER TABLE `continentes`
  MODIFY `id_continente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `informacio_viatge`
--
ALTER TABLE `informacio_viatge`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

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
