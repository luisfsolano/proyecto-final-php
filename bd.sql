-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2021 a las 23:52:38
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_login_database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `estado` int(11) NOT NULL,
  `rol` int(11) NOT NULL,
  `depa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `estado`, `rol`, `depa`) VALUES
(4, 'garita@condominio.com', '$2y$10$mUsltF6gkOrUBEtJKrLMJuZ6pVmuwS9bmpGQRIalacizIEyoD7Wuq', 1, 1, 'n/a'),
(5, 'admin@condominio.com', '$2y$10$bAgc8IhGINJxkaxjVbsYW.BCCzI8OWaGVj8lR2KM33GwVyt8XbTVe', 1, 2, 'n/a'),
(6, 'residente@condominio.com', '$2y$10$RzQV4gw1aYS95kmDIE4YZ.2aFxXXcdjFhc6cqRx.5r3IQRYlMD1hq', 1, 3, 'Torre 1,2,B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cedula` varchar(50) NOT NULL,
  `torre` varchar(50) NOT NULL,
  `piso` varchar(50) NOT NULL,
  `apartamento` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`id`, `nombre`, `cedula`, `torre`, `piso`, `apartamento`, `image`, `fecha`, `usuario`, `estado`) VALUES
(10, 'ertgertg', 'ertgertg', 'Torre 2', '2', 'B', '1639717925-6-704-336.png', '2021-12-17 00:19:32', '4', 2),
(11, 'erterthe', 'erreth', 'Torre 1', '2', 'B', '1639717925-6-704-336.png', '2021-12-17 00:20:49', '4', 1),
(12, 'Luis Solano', '6-720-388', 'Torre 3', '2', 'A', '1639717925-6-704-336.png', '2021-12-17 00:41:38', '4', 1),
(13, 'Yarelis Melgar', '7-709-256', 'Torre 1', '2', 'B', '1639717925-6-704-336.png', '2021-12-17 02:15:48', '4', 2),
(14, 'Mirian Calderón', '6-704-336', 'Torre 1', '2', 'B', '1639725832-6-704-336.png', '2021-12-17 02:23:52', '4', 1),
(15, 'Luis Fernando Solano', '6-720-388', 'Torre 1', '1', 'A', '1639781044-6-720-388.png', '2021-12-17 17:44:04', '4', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
