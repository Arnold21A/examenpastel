-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2023 a las 21:40:16
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pasteleria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingrediente`
--

CREATE TABLE `ingrediente` (
  `id_ingrediente` int(15) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `ingreso` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `vencimiento` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ingrediente`
--

INSERT INTO `ingrediente` (`id_ingrediente`, `nombre`, `descripcion`, `ingreso`, `vencimiento`) VALUES
(1, 'harina', 'De trigo', '10/08/2023', '10/10/2023'),
(2, 'Azucar', 'morena', '15/10/2023', '15/11/2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pastel`
--

CREATE TABLE `pastel` (
  `id_Pastel` int(5) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `preparado_por` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `creacion` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `vencimiento` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pastel`
--

INSERT INTO `pastel` (`id_Pastel`, `nombre`, `descripcion`, `preparado_por`, `creacion`, `vencimiento`) VALUES
(1, 'Pastel de Chocolate', 'La base es un bizcocho versátil, endiabladamente oscuro y chocolatoso, lo que se consigue por el uso de chocolate y cacao en la masa', 'Carmen Alia', '02/10/2023', '15/10/2023'),
(2, 'Tres Leches', 'El pastel de 3 leches es un tipo de postre muy adecuado para cualquier fiesta, cumpleaños o celebración especial ya que se trata de una torta o tarta que queda muy bonita y vistosa', 'Clara Rodriguez', '19/10/2023', '25/10/2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pastel_ingrediente`
--

CREATE TABLE `pastel_ingrediente` (
  `id_pastel_ingrediente` int(15) NOT NULL,
  `id_Pastel` int(5) NOT NULL,
  `id_ingrediente` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`id_ingrediente`);

--
-- Indices de la tabla `pastel`
--
ALTER TABLE `pastel`
  ADD PRIMARY KEY (`id_Pastel`);

--
-- Indices de la tabla `pastel_ingrediente`
--
ALTER TABLE `pastel_ingrediente`
  ADD PRIMARY KEY (`id_pastel_ingrediente`),
  ADD KEY `id_Pastel` (`id_Pastel`),
  ADD KEY `id_ingrediente` (`id_ingrediente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  MODIFY `id_ingrediente` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pastel`
--
ALTER TABLE `pastel`
  MODIFY `id_Pastel` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pastel_ingrediente`
--
ALTER TABLE `pastel_ingrediente`
  MODIFY `id_pastel_ingrediente` int(15) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pastel_ingrediente`
--
ALTER TABLE `pastel_ingrediente`
  ADD CONSTRAINT `pastel_ingrediente_ibfk_1` FOREIGN KEY (`id_ingrediente`) REFERENCES `ingrediente` (`id_ingrediente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pastel_ingrediente_ibfk_2` FOREIGN KEY (`id_Pastel`) REFERENCES `pastel` (`id_Pastel`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
