-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2024 a las 14:12:18
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
-- Base de datos: `chedraui`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(10) NOT NULL,
  `nombre` varchar(400) NOT NULL,
  `foto_categoria` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `foto_categoria`) VALUES
(9, 'Linea Blanca', 'linea_blanca.jpg'),
(10, 'Farmacia', 'Farmacia.jpg'),
(11, 'Frutas y verduras', 'Perecederos.jpg'),
(12, 'Jugueteria', 'Jugueteria.jpg'),
(13, 'Automoviles', 'Autos.jpg.png'),
(14, 'Ropa', 'Ropa.jpg'),
(15, 'Mascotas', 'Mascotas.jpg'),
(16, 'Vinos y Licores', 'VinosYLicores.jpg'),
(17, 'Perfumeria', 'Perfumeria.jpg'),
(18, 'Aseo personal', 'CuidadoPersonal.jpg'),
(19, 'Deportes', 'Deportes.jpg'),
(20, 'Limpieza del hogar', 'LimpiezaHogar.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallescarrito`
--

CREATE TABLE `detallescarrito` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `detallescarrito`
--

INSERT INTO `detallescarrito` (`id`, `pedido_id`, `producto_id`, `cantidad`, `id_usuario`) VALUES
(16, 1, 3, 1, 2),
(17, 1, 3, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `fecha_pedido` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado_pedido` enum('pendiente','en_proceso','completado') DEFAULT 'pendiente',
  `total` decimal(10,2) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `detalles` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `usuario_id`, `fecha_pedido`, `estado_pedido`, `total`, `direccion`, `detalles`) VALUES
(109, 7, '2024-05-22 05:53:26', NULL, 50.00, 'Recibe: Admin, en calle: Luis Donaldo Colosio, colonia: Arroyo del maiz, CP: 12345, Teléfono: 1234567890. Instrucciones de entrega: ninguna', 'Producto 1'),
(110, 1, '2024-05-23 05:15:17', NULL, 75.00, 'Recibe: jorge marcos, en calle: Luis Donaldo Colosio, colonia: emiliano zapatilla, CP: 92858, Teléfono: 9999999999. Instrucciones de entrega: ninguna', 'Producto 3, Producto 5'),
(111, 1, '2024-05-23 05:41:10', NULL, 130.00, 'Recibe: jorge marcos, en calle: palmeras, colonia: emiliano zapatilla, CP: 92858, Teléfono: 1234567890. Instrucciones de entrega: ninguna', 'Producto 1, Producto 6'),
(112, 1, '2024-05-23 13:44:25', NULL, 50.00, 'Recibe: jorge marcos, en calle: palmeras, colonia: emiliano zapatilla, CP: 92858, Teléfono: 1234567890. Instrucciones de entrega: ninguna', 'Producto 1'),
(113, 1, '2024-05-24 07:36:54', NULL, 35.00, 'Recibe: jorge marcos, en calle: Luis Donaldo Colosio, colonia: emiliano zapatilla, CP: 92858, Teléfono: 7831279890. Instrucciones de entrega: ninguna', 'Producto 5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(20) NOT NULL,
  `nombre_producto` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` varchar(250) NOT NULL,
  `foto_producto` varchar(500) NOT NULL,
  `id_categoria` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `descripcion`, `precio`, `stock`, `foto_producto`, `id_categoria`, `id_usuario`) VALUES
(3, 'Refrigerador', 'Descripcion del refrigerador', 15.00, '5', 'linea_blanca.jpg', 9, 1),
(4, 'Estufa', 'Estufa MABE', 20.00, '5', 'linea_blanca.jpg', 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetasusuario`
--

CREATE TABLE `tarjetasusuario` (
  `id` int(11) NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `ultimos_digitos` char(4) NOT NULL,
  `nombre_titular` varchar(255) NOT NULL,
  `fecha_expiracion` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tarjetasusuario`
--

INSERT INTO `tarjetasusuario` (`id`, `usuario_id`, `token`, `ultimos_digitos`, `nombre_titular`, `fecha_expiracion`) VALUES
(41, 7, '1234 5678 9123 4567', '1234', 'Admin', '24/24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicaciones`
--

CREATE TABLE `ubicaciones` (
  `idUbicacion` int(10) UNSIGNED NOT NULL,
  `idUsuario` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `C.P.` varchar(5) DEFAULT NULL,
  `calle` varchar(50) DEFAULT NULL,
  `colonia` varchar(80) DEFAULT NULL,
  `numTelefono` varchar(10) DEFAULT NULL,
  `instruccionesEntrega` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ubicaciones`
--

INSERT INTO `ubicaciones` (`idUbicacion`, `idUsuario`, `nombre`, `C.P.`, `calle`, `colonia`, `numTelefono`, `instruccionesEntrega`) VALUES
(27, 7, 'Admin', '12345', 'Luis Donaldo Colosio', 'Arroyo del maiz', '1234567890', 'ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL,
  `Nombres` varchar(250) NOT NULL,
  `Apellidos` varchar(250) NOT NULL,
  `Correo` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `Nombres`, `Apellidos`, `Correo`, `username`, `password`, `rol`) VALUES
(1, 'Jorge Luis', 'Zaleta Valdez', 'zaletagames@hotmail.com', 'Panda', 'admin', 1),
(2, 'Jorge luis ', 'Marcos Canales', 'canales@hotmail.com', 'marcos', 'marcos+', 2),
(3, 'Nestor', 'Ibarra', 'ibarra@hotmail.com', 'nestor', '12345', 2),
(4, 'Michelle', 'Ramirez ', 'ramirez@hotmail.com', 'pando', 'dias', 2),
(5, 'Admin', 'user', 'admin', 'admin', '123456', 2),
(6, 'ru1h', '43rre', 'addsssdsdsd', '564432', 'luun', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `detallescarrito`
--
ALTER TABLE `detallescarrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `tarjetasusuario`
--
ALTER TABLE `tarjetasusuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  ADD PRIMARY KEY (`idUbicacion`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `detallescarrito`
--
ALTER TABLE `detallescarrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tarjetasusuario`
--
ALTER TABLE `tarjetasusuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  MODIFY `idUbicacion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallescarrito`
--
ALTER TABLE `detallescarrito`
  ADD CONSTRAINT `detallescarrito_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `detallescarrito_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `permisos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
