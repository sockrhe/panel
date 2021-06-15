-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2021 a las 20:41:01
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `panel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `us_id` int(10) NOT NULL,
  `us_nombre` varchar(45) DEFAULT NULL,
  `us_apellidos` varchar(100) DEFAULT NULL,
  `us_nickname` varchar(45) DEFAULT NULL,
  `us_password` varchar(255) DEFAULT NULL,
  `us_fecha_registro` datetime DEFAULT NULL,
  `us_estado` enum('Activo','Inactivo') DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`us_id`, `us_nombre`, `us_apellidos`, `us_nickname`, `us_password`, `us_fecha_registro`, `us_estado`) VALUES
(1, 'admin', 'administrador', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2021-06-15 18:12:57', 'Activo'),
(2, 'erick', 'rodriguez', 'admins', '827ccb0eea8a706c4c34a16891f84e7b', '2021-06-15 00:00:00', 'Activo'),
(3, 'erick', 'rodriguez', 'adminss', '827ccb0eea8a706c4c34a16891f84e7b', '2021-06-15 00:00:00', 'Activo'),
(4, 'erick', 'rodriguez', 'erick', '827ccb0eea8a706c4c34a16891f84e7b', '2021-06-15 00:00:00', 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`us_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `us_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
