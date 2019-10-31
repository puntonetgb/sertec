-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 31-10-2019 a las 16:03:20
-- Versión del servidor: 10.2.27-MariaDB
-- Versión de PHP: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u904533129_serte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idcliente` mediumint(8) NOT NULL,
  `Nombre` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Celular` text CHARACTER SET latin1 NOT NULL,
  `Email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Direccion` varchar(160) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idcliente`, `Nombre`, `Celular`, `Email`, `Direccion`) VALUES
(1, 'Alejandro Cabral', '2243409820', 'puntonetbelgrano@gmail.com', 'Lombardo 40'),
(8, 'Gaston Alcuri', '2243419898', 'alcurigaston@gmail.com', '37 456'),
(9, 'Gonzalo Villalba', '2241459898', 'gonza13@hotmail.com', 'Amenabar 456'),
(11, 'Claudia Toledo', '2241549063', 'pata.toledo@hotmail.com', 'Av. Sarmiento 1165'),
(12, 'Ariel Cabral', '2243418819', 'cabralariel@gmail.com', 'Julio Llanos 872'),
(13, 'Pepe Argento', '3463457475', 'pepe.arg@hotmail.com', 'gerhejh'),
(15, 'Celia Laraignee', '2241548097', 'puntonetbelgrano@gmail.com', 'Lombardo 40'),
(19, 'Juanjo Aranzabal', '2243409820', 'juanj0@gmail.com', 'Estrada 333');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `idequipo` mediumint(8) NOT NULL,
  `Nombre` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`idequipo`, `Nombre`) VALUES
(1, 'PC de Escritorio'),
(2, 'Notebook'),
(3, 'Netboook'),
(4, 'Tablet'),
(5, 'GPS'),
(6, 'Monitor'),
(7, 'Impresora'),
(8, 'Router'),
(9, 'All in One'),
(11, 'Otro'),
(19, 'Celular'),
(20, 'Gabinete');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idestado` mediumint(8) NOT NULL,
  `Estado` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Color` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idestado`, `Estado`, `Color`) VALUES
(1, 'Ingresado', 'badge badge-info'),
(2, 'En Curso', 'badge badge-success'),
(3, 'Presupuestado', 'badge badge-warning'),
(4, 'Facturado', 'badge badge-primary'),
(5, 'Finalizado', 'badge badge-dark'),
(6, 'Cancelado', 'badge badge-danger');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `idingreso` mediumint(8) NOT NULL,
  `tecnico` int(2) NOT NULL,
  `Fecha` date NOT NULL,
  `Importe` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `idmarca` mediumint(8) NOT NULL,
  `Nombre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`idmarca`, `Nombre`) VALUES
(1, 'HP'),
(2, 'Lenovo'),
(3, 'Samsung'),
(4, 'BGH Positivo'),
(5, 'Exo'),
(6, 'Bangho'),
(7, 'TP LINK'),
(8, 'Epson'),
(9, 'Acer'),
(10, 'Commodore'),
(11, 'Toshiba'),
(12, 'Generico'),
(13, 'Otra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` mediumint(8) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Precio` int(10) NOT NULL,
  `Stock` int(10) NOT NULL,
  `Grupo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `Nombre`, `Precio`, `Stock`, `Grupo`) VALUES
(1, 'Router TP LINK 840N', 1550, 3, 'Redes'),
(4, 'Fuente ATX 550W ', 730, 8, 'Energia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sertec`
--

CREATE TABLE `sertec` (
  `idsertec` mediumint(8) NOT NULL,
  `idcliente` int(3) NOT NULL,
  `Tecnico` mediumint(8) NOT NULL,
  `Equipo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Marca` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descripcion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Accesorio` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Estado` mediumint(2) NOT NULL,
  `Fecha` date NOT NULL,
  `Resolucion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Presupuesto` int(10) NOT NULL,
  `Importe` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sertec`
--

INSERT INTO `sertec` (`idsertec`, `idcliente`, `Tecnico`, `Equipo`, `Marca`, `Descripcion`, `Accesorio`, `Estado`, `Fecha`, `Resolucion`, `Presupuesto`, `Importe`) VALUES
(12, 11, 3, 'Monitor', 'Lenovo', 'roto', '', 4, '2019-08-26', 'cambio de fuente', 0, 1800),
(13, 19, 1, 'Notebook', 'Bangho', 'no enciende', 'cargador', 6, '2019-08-26', '', 0, 0),
(14, 13, 2, 'GPS', 'Otro', 'Actualizar', '', 6, '2019-08-27', '', 0, 0),
(15, 12, 1, 'PC de Escritorio', 'Commodore', 'Se cuelga', '', 5, '2019-08-27', 'cambio de pila', 0, 200),
(16, 9, 1, 'Notebook', 'HP', 'Problemas con la pantalla', 'Maletin', 2, '2019-08-27', 'Cambio de Disco Rigido\r\nInstalacion de Sistema', 3850, 0),
(17, 15, 3, 'Impresora', 'Otro', 'error', '', 2, '2019-08-27', '', 0, 0),
(18, 1, 0, 'Notebook', 'Acer', 'dgjdj', '', 6, '2019-08-27', '', 0, 0),
(19, 9, 2, 'Notebook', 'HP', 'NO enciende', 'c/cargador', 6, '2019-08-27', '', 0, 0),
(20, 12, 2, 'PC de Escritorio', 'Otro', 'Explicar funcionamiento del sistema, ver modificaciones futuras, configuración de router.', '', 5, '2019-08-28', 'cambio de pantalla', 0, 4800),
(21, 12, 1, 'Netboook', 'Exo', 'No enciende', '', 6, '2019-08-28', 'Cambio de pantalla', 4800, 0),
(22, 1, 3, 'GPS', 'Bangho', 'Actualizar', 'cargador', 6, '2019-08-28', 'qdwefegwergqerg', 480, 0),
(23, 1, 1, 'Gabinete', 'Generico', 'No enciende', '', 4, '2019-10-31', 'CAMBIO DE FUENTE', 1950, 1950);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `idservicio` mediumint(8) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Precio` int(10) NOT NULL,
  `Grupo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`idservicio`, `Nombre`, `Precio`, `Grupo`) VALUES
(1, 'Instalación Sistema Operativo + Aplicaciones', 750, 'Mantenimiento'),
(3, 'Actualizacion de GPS', 350, 'Actualizacion'),
(4, 'Mantenimiento de PC Simple', 400, 'Mantenimiento'),
(5, 'Mantenimiento de PC', 550, 'Mantenimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnico`
--

CREATE TABLE `tecnico` (
  `idtecnico` mediumint(8) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tecnico`
--

INSERT INTO `tecnico` (`idtecnico`, `Nombre`) VALUES
(1, 'Alejandro Cabral'),
(2, 'Gaston Alcuri'),
(3, 'Gonzalo Villalba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'alejandro', '$2y$10$m9XVM9nqS2QfoicS73h/SOwdKY.Ci3ovgS7FLsB1tACg0SmiDp2Xy', '2019-08-18 19:30:42'),
(2, 'gaston', '$2y$10$EbhJEpgTOxzZWgKEBeZZzutdkvRv2Px1c46YrE8ufjMbABvPInWKu', '2019-08-19 14:10:11'),
(3, 'gonzalo', '$2y$10$sejo9LczumKBd.DGixy25OvPkuUUolMFJNkbvsxA0HP7kjrE/2VRS', '2019-08-19 14:10:31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`idequipo`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idestado`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`idingreso`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`idmarca`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `sertec`
--
ALTER TABLE `sertec`
  ADD PRIMARY KEY (`idsertec`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`idservicio`);

--
-- Indices de la tabla `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`idtecnico`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcliente` mediumint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `idequipo` mediumint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idestado` mediumint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `idingreso` mediumint(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `idmarca` mediumint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` mediumint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sertec`
--
ALTER TABLE `sertec`
  MODIFY `idsertec` mediumint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `idservicio` mediumint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tecnico`
--
ALTER TABLE `tecnico`
  MODIFY `idtecnico` mediumint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
