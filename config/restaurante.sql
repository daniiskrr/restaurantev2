-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-02-2023 a las 02:41:44
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(2) NOT NULL,
  `tipo_producto` varchar(25) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `tipo_producto`) VALUES
(1, 'Jamon'),
(2, 'Bocadillo de Jamon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(4) NOT NULL,
  `id_usuario` int(4) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `tipo_pago` varchar(7) COLLATE utf8mb4_spanish2_ci DEFAULT 'Tarjeta',
  `precio_pedido` decimal(7,2) NOT NULL,
  `descuento_total` decimal(5,2) NOT NULL,
  `precio_total` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_usuario`, `fecha_pedido`, `tipo_pago`, `precio_pedido`, `descuento_total`, `precio_total`) VALUES
(5, 10, '2023-02-17', 'Targeta', '20.00', '4.00', '16.00'),
(10, 10, '2023-02-17', 'Targeta', '718.00', '4.00', '714.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_producto`
--

CREATE TABLE `pedido_producto` (
  `id_pedido` int(4) NOT NULL,
  `id_producto` int(4) NOT NULL,
  `linea` int(3) NOT NULL,
  `cantidad` int(3) NOT NULL,
  `precio_unidad` decimal(7,2) DEFAULT NULL,
  `oferta` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(4) NOT NULL,
  `id_categoria` int(2) NOT NULL,
  `nombre_producto` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `precio_unidad` decimal(7,2) DEFAULT NULL,
  `imagen` varchar(250) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `ofertaactiva` varchar(2) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `id_categoria`, `nombre_producto`, `precio_unidad`, `imagen`, `ofertaactiva`) VALUES
(1, 2, 'Bocadillo de Jamon Serrano', '4.50', 'imagenes/pb1.webp', 'NO'),
(3, 2, 'Bocadillo de Jamon ibérico', '6.50', 'imagenes/pb3.webp', 'NO'),
(4, 2, 'Jamon de bellota 100%', '10.00', 'imagenes/pb4.webp', 'SI'),
(5, 2, 'Bocadillo de jamón de cebo', '8.00', 'imagenes/pb5.webp', 'NO'),
(6, 2, 'Flauta de jamón ibérico', '8.00', 'imagenes/pb6.webp', 'SI'),
(7, 1, 'Jamón de bellota 100% ibérico Gabriel Castaño', '299.00', 'imagenes/pj7.webp', 'NO'),
(8, 1, 'Jamón de bellota 100% ibérico 5 Jotas', '349.00', 'imagenes/pj8.webp', 'NO'),
(9, 1, 'Taco de jamón de bellota 100% 1kg', '149.00', 'imagenes/pj9.webp', 'NO'),
(10, 1, 'Jamón de Bellota Ibérico 100% 5J', '239.00', 'imagenes/pj10.webp', 'NO'),
(11, 1, 'Jamón ibérico de Cebo 100% Jose Manuel', '189.00', 'imagenes/pj11.webp', 'NO'),
(12, 1, 'Jamón ibérico de Cebo 100% Enrique Tomas', '129.00', 'imagenes/pj12.webp', 'NO'),
(13, 1, 'Jamón Serrano de la Península', '79.00', 'imagenes/pj13.webp', 'NO'),
(14, 1, 'Jamón de Bellota Ibérico 50% 5J', '89.00', 'imagenes/pj14.webp', 'NO'),
(15, 1, 'Jamón de Bellota Ibérico 50% Jose Manuel', '99.00', 'imagenes/pj15.webp', 'NO'),
(16, 1, 'Lonchas de Jamón Ibérico', '42.00', NULL, 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(4) NOT NULL,
  `correo` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `contrasena` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellidos` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` int(9) DEFAULT NULL,
  `rol` varchar(15) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `correo`, `contrasena`, `nombre`, `apellidos`, `fecha_nacimiento`, `direccion`, `telefono`, `rol`) VALUES
(8, 'danrr2001@gmail.com', '$2y$10$JQ.zdKVZZDvJDnlFxCKuIOYnyQr5rmjA/cVww2K/ngLdptp4QqO7y', 'Daniel', 'Rayo', '2001-07-25', 'Calle Murillo', 635232323, 'Admin'),
(9, 'danrr2002@gmail.com', '$2y$10$aI7cjqyxVZmnZhCiV.ewV.7XnzVqpfcoPF5.mozZim4bAprTxgUe2', 'Daniel', 'Rayo', '2001-12-21', 'Carrer Murillo N3', 637281172, 'Usuario'),
(10, 'uwu@gmail.com', '$2y$10$6./XI7vlCD9nEhjLymGDmeE8jJlcA4Pr3RsZP92npvvCBxN8w8U6i', 'uwu', 'uwu uuu', '2002-07-25', 'Carrer Murillo XD', 2147483647, 'Admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `claveforanea1` (`id_usuario`);

--
-- Indices de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD PRIMARY KEY (`id_pedido`,`id_producto`),
  ADD KEY `claveforanea4` (`id_producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `claveforanea2` (`id_categoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `claveforanea1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD CONSTRAINT `claveforanea3` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`),
  ADD CONSTRAINT `claveforanea4` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `claveforanea2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
