-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2024 a las 02:49:04
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registros_gastos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `TipoTransaccion` varchar(50) NOT NULL,
  `Fecha` date NOT NULL,
  `Monto` varchar(50) NOT NULL,
  `Categoría` varchar(50) NOT NULL,
  `Descripción` varchar(50) NOT NULL,
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`TipoTransaccion`, `Fecha`, `Monto`, `Categoría`, `Descripción`, `Id`) VALUES
('Ingreso', '2024-04-27', '1600000', 'Sueldo', 'Pago de sueldo', 91),
('Gasto', '2024-04-27', '600000', 'Servicios', 'Otros', 92),
('Gasto', '2024-04-27', '1100000', 'Inversiones', 'Apuestas', 93),
('Ingreso', '2024-04-27', '2000000', 'Sueldo', 'Pago de sueldo', 94),
('Ingreso', '2024-04-27', '1000000', 'Sueldo', 'Pago de sueldo', 95),
('Gasto', '2024-04-27', '650000', 'Servicios', 'Otros', 96);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
