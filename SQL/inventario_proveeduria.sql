-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2024 a las 18:33:18
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario_proveeduria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `ud` varchar(255) NOT NULL,
  `existencia` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `categoria`, `nombre`, `ud`, `existencia`) VALUES
(1, 'ARTICULOS DE LIMPIEZA', 'PAPEL HIHIENICO P/DISPENSADOR', 'UNIDAD', 10),
(3, 'ARTICULOS DE LIMPIEZA', 'AMBIENTADOR GLADE', 'UNIDAD', 7),
(4, 'ARTICULOS DE LIMPIEZA', 'BAYGON BAYER', 'UNIDAD', 5),
(5, 'ARTICULOS DE LIMPIEZA', 'DESINFECTANTE', 'GALON', 4),
(7, 'ARTICULOS DE LIMPIEZA', 'VASOS PLASTICO GRANDE', 'PAQUETE', 5),
(8, 'ARTICULOS DE LIMPIEZA', 'CLORO ', 'GALON', 8),
(9, 'ARTICULOS DE LIMPIEZA', 'DESINFECTANTE ', 'GALON', 4),
(10, 'ARTICULOS DE LIMPIEZA', 'PASTILLA DE BAÑO WC', 'UNIDAD', 3),
(11, 'ARTICULOS DE LIMPIEZA', 'DETERGENTE EN POLVO', 'UNIDAD', 3),
(12, 'ARTICULOS DE LIMPIEZA', 'LANILLAS', 'UNIDAD', 2),
(13, 'ARTICULOS DE LIMPIEZA', 'ESCOBILLON CON ESTENSOR', 'UNIDAD', 2),
(14, 'ARTICULOS DE LIMPIEZA', 'LIMPIADOR EN POLVO GRASSOFF', 'UNIDAD', 2),
(15, 'ARTICULOS DE LIMPIEZA', 'CERA ACRILICA BLANCA', 'GALON', 3),
(16, 'ARTICULOS DE LIMPIEZA', 'PRIDE DE 400CC', 'UNIDAD', 3),
(17, 'ARTICULOS DE LIMPIEZA', 'BOLSAS PLASTICA PARA PAPELERA DE 15KG', 'UNIDAD', 3),
(18, 'ARTICULOS DE LIMPIEZA', 'CEPILLO DE PULIDORA DE 13 P', 'UNIDAD', 0),
(19, 'ARTICULOS DE LIMPIEZA', 'CEPILLO DE PULIDORA DE 13 P', 'UNIDAD', 2),
(20, 'CARATULAS Y FICHAS', 'FICHAS F 20', 'UNIDAD', 4),
(21, 'CARATULAS Y FICHAS', 'CARATULAS C 11', 'UNIDAD', 5),
(22, 'CARATULAS Y FICHAS', 'PLACAS PARA IDENTIFICAR LAS OFICINAS DE LA DEM', 'UNIDAD', 3),
(24, 'INSUMOS DE COMPUTACION', 'REGULADOR DE VOTAGE TTR-2500', 'UNIDAD', 3),
(25, 'INSUMOS DE COMPUTACION', 'COMPUTADORA LENOVO SN° M-SVLTY163,CPU SKHFZKI', 'UNIDAD', 2),
(27, 'INSUMOS DE COMPUTACION', 'DISCO DURO DE 80GB', 'UNIDAD', 2),
(28, 'INSUMOS DE COMPUTACION', 'TECLADO OPTICO', 'UNIDAD', 3),
(29, 'INSUMOS DE COMPUTACION', 'MAUSE OPTICO', 'UNIDAD', 4),
(30, 'INSUMOS DE COMPUTACION', 'UNIDAD DE C.D.', 'UNIDAD', 12),
(31, 'INSUMOS DE COMPUTACION', 'MEMORIA DDR 256MB', 'UNIDAD', 2),
(32, 'INSUMOS DE COMPUTACION', 'DISCO DURO 80 GB', 'UNIDAD', 0),
(33, 'ELECTRICIDAD', 'PROTECTOR DE NEVERA ', 'UNIDAD', 2),
(34, 'ELECTRICIDAD', 'LAMPARAS DE 22', 'UNIDAD', 2),
(35, 'ELECTRICIDAD', 'CABLE 10 ELECTRICO', 'METRO', 30),
(36, 'ELECTRICIDAD', 'CABLE NO. 12 ', 'METRO', 40),
(37, 'ELECTRICIDAD', 'TUBO LED T8 DE 60 CM', 'UNIDAD', 3),
(38, 'ELECTRICIDAD', 'TUBO LED T8 DE 120 CM', 'UNIDAD', 5),
(39, 'FERRETERIA', 'MANTOASFALTICO', 'ROLLO', 3),
(40, 'FERRETERIA', 'PINTURA ASFALTICA COLOR ALUMINIO', 'CUÑETE', 3),
(41, 'FERRETERIA', 'TIRRA MEDIANO', 'UNIDAD', 2),
(42, 'FERRETERIA', 'SIFON DE LAVAMANO', 'UNIDAD', 3),
(43, 'FERRETERIA', 'GRIFO DE LAVAMANO', 'UNIDAD', 2),
(44, 'FERRETERIA', 'PINTURA BLANCA', 'GALON', 2),
(45, 'FERRETERIA', 'MARTILLO DE CONSTRUCCION', 'UNIDAD', 2),
(46, 'FERRETERIA', 'PIQUETA DE ELECTRICDAD', 'UNIDAD', 3),
(47, 'FERRETERIA', 'CINTA ANTIRRESBALANTE', 'UNIDAD', 2),
(48, 'FERRETERIA', 'ALICATE PINZA 6MM', 'UNIDAD', 3),
(50, 'LIBROS', 'LIBROS DE ACTAS DE 200 FOLIOS', 'UNIDAD', 2),
(51, 'LIBROS', 'LIBROS DE ACTAS DE 500 FOLIOS', 'UNIDAD', 3),
(52, 'LIBROS', 'LIBROS L-3', 'UNIDAD', 3),
(53, 'MATERIAL DE OFICINA', 'MICROONDAS OSTER', 'UNIDAD', 3),
(54, 'MATERIAL DE OFICINA', 'AIRE-ACONDICIONADO DE 18000 BTU', 'UNIDAD', 2),
(55, 'MATERIAL DE OFICINA', 'SACAPUNTA ELECTRICO', 'UNIDAD', 2),
(56, 'MATERIAL DE OFICINA', 'PAPEL BOND', 'UNIDAD', 0),
(57, 'MATERIAL DE OFICINA', 'CLIPS N° 01', 'CAJA', 7),
(58, 'MATERIAL DE OFICINA', 'PIZARRA ACRILICA ', 'UNIDAD', 2),
(59, 'MATERIAL DE OFICINA', 'SOBRE MANILLA TAMAÑO OFICIO', 'UNIDAD', 30),
(60, 'MATERIAL DE OFICINA', 'LAPICES BICOLOR', 'UNIDAD', 20),
(61, 'MATERIAL DE OFICINA', 'SELLO RECTANGULAR GRANDE', 'UNIDAD', 5),
(62, 'MAQUINARIA', 'AIRE ACONDICIONADO TIPO SPLIT DE 36000 BTU ', 'UNIDAD', 2),
(63, 'MAQUINARIA', 'COMPRESOR DE 5 TONELADA', 'UNIDAD', 2),
(64, 'PLOMERIA', 'W.C. COMPLETO DE PORCELANA', 'UNIDAD', 2),
(77, 'TELEFONOS', 'CABLETELEFONICO', 'METRO', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_lagunetica`
--

CREATE TABLE `articulos_lagunetica` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `ud` varchar(255) NOT NULL,
  `existencia` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulos_lagunetica`
--

INSERT INTO `articulos_lagunetica` (`id`, `categoria`, `nombre`, `ud`, `existencia`) VALUES
(12, 'ARTICULOS DE LIMPIEZA', 'LANILLAS', 'UNIDAD', 2),
(15, 'ARTICULOS DE LIMPIEZA', 'CERA ACRILICA BLANCA', 'GALON', 3),
(17, 'ARTICULOS DE LIMPIEZA', 'BOLSAS PLASTICA PARA PAPELERA DE 15KG', 'UNIDAD', 3),
(18, 'ARTICULOS DE LIMPIEZA', 'CEPILLO DE PULIDORA DE 13 P', 'UNIDAD', 0),
(19, 'ARTICULOS DE LIMPIEZA', 'CEPILLO DE PULIDORA DE 13 P', 'UNIDAD', 2),
(22, 'CARATULAS Y FICHAS', 'PLACAS PARA IDENTIFICAR LAS OFICINAS DE LA DEM', 'UNIDAD', 3),
(26, 'INSUMOS DE COMPUTACION', 'DISCO DURO DE 120GB', 'UNIDAD', 3),
(36, 'ELECTRICIDAD', 'CABLE NO. 12 ', 'METRO', 40),
(39, 'FERRETERIA', 'MANTO ASFALTICO', 'ROLLO', 2),
(43, 'FERRETERIA', 'GRIFO DE LAVAMANO', 'UNIDAD', 2),
(49, 'LIBROS', 'LIBROS DE ACTAS DE 100 FOLIOS', 'UNIDAD', 2),
(61, 'MATERIAL DE OFICINA', 'SELLO RECTANGULAR GRANDE', 'UNIDAD', 5),
(64, 'PLOMERIA', 'W.C. COMPLETO DE PORCELANA', 'UNIDAD', 2),
(69, 'TELEFONOS', 'CAJETIN', 'UNIDAD', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `codigo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `codigo`) VALUES
(1, 'articulos de limpieza', 'al'),
(2, 'caratulas y fichas', 'cf'),
(3, 'electricidad', 'el'),
(4, 'ferreteria', 'fe'),
(5, 'insumos de computacion', 'co'),
(6, 'libros', 'li'),
(7, 'maquinaria', 'mq'),
(8, 'material de oficina', 'mo'),
(9, 'papeleria', 'pa'),
(10, 'plomeria', 'pl'),
(11, 'reproduccion', 'rp'),
(12, 'telefonos', 'tf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `rif` varchar(255) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `telefonos` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `rif`, `direccion`, `telefonos`) VALUES
(3, 'DEM CENTRAL	', 'G-200000287', 'AVENIDA FRANCISCO DE MIRANDA, CARACAS 1060, DISTRTO CAPITAL', '0212-2375874');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(3, 'Administrador', '$2y$10$IGpeRcbcXBAQ7ZindHnRPObp.bYUoN1af1FjbHo.5ehaFSSLOES2y', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `articulos_lagunetica`
--
ALTER TABLE `articulos_lagunetica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `articulos_lagunetica`
--
ALTER TABLE `articulos_lagunetica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
