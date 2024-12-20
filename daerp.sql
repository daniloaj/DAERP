-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 04-01-2024 a las 15:44:25
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `daerp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE IF NOT EXISTS `agenda` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `responsables` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proyecto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_prevista` date NOT NULL,
  `fecha_final` date NOT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `responsables`, `proyecto`, `fecha_prevista`, `fecha_final`, `estado`) VALUES
(1, 'qweS', 'asda', '2023-02-20', '2023-02-24', 'Por iniciar'),
(2, 'asd', 'asd', '2023-06-17', '2023-06-21', 'Por iniciar');

--
-- Disparadores `agenda`
--
DROP TRIGGER IF EXISTS `actualizar_agenda_historia`;
DELIMITER $$
CREATE TRIGGER `actualizar_agenda_historia` BEFORE UPDATE ON `agenda` FOR EACH ROW UPDATE agenda_historial set agenda_historial.responsables=NEW.responsables, agenda_historial.proyecto=NEW.proyecto, agenda_historial.fecha_prevista=NEW.fecha_prevista, agenda_historial.fecha_final=NEW.fecha_final, agenda_historial.estado=NEW.estado WHERE agenda_historial.id_agenda=OLD.id_agenda
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `historial_agenda`;
DELIMITER $$
CREATE TRIGGER `historial_agenda` AFTER INSERT ON `agenda` FOR EACH ROW INSERT INTO agenda_historial SELECT * from agenda WHERE id_agenda=NEW.id_agenda
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda_historial`
--

DROP TABLE IF EXISTS `agenda_historial`;
CREATE TABLE IF NOT EXISTS `agenda_historial` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `responsables` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proyecto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_prevista` date NOT NULL,
  `fecha_final` date NOT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `agenda_historial`
--

INSERT INTO `agenda_historial` (`id_agenda`, `responsables`, `proyecto`, `fecha_prevista`, `fecha_final`, `estado`) VALUES
(1, 'qweS', 'asda', '2023-02-20', '2023-02-24', 'Por iniciar'),
(2, 'asd', 'asd', '2023-06-17', '2023-06-21', 'Por iniciar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE IF NOT EXISTS `compras` (
  `id_compra` int(11) NOT NULL AUTO_INCREMENT,
  `producto` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costo` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total_a_pagar` float NOT NULL,
  `fecha_compra` date NOT NULL,
  `proveedores` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_factura` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proyecto` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_compra`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `producto`, `costo`, `cantidad`, `total_a_pagar`, `fecha_compra`, `proveedores`, `num_factura`, `responsable`, `proyecto`) VALUES
(1, 'asdasdasdasd', 85, 5, 425, '0555-05-05', 'Siman', 'asd5', 'qwe', 'asda');

--
-- Disparadores `compras`
--
DROP TRIGGER IF EXISTS `actualizar_historial`;
DELIMITER $$
CREATE TRIGGER `actualizar_historial` BEFORE UPDATE ON `compras` FOR EACH ROW UPDATE historial_compras set historial_compras.producto=NEW.producto, historial_compras.costo=NEW.costo, historial_compras.cantidad=NEW.cantidad, historial_compras.total_a_pagar=NEW.total_a_pagar, historial_compras.fecha_compra=NEW.fecha_compra, historial_compras.proveedor=NEW.proveedores, historial_compras.num_factura=NEW.num_factura, historial_compras.responsable=NEW.responsable, historial_compras.evento=NEW.proyecto WHERE historial_compras.id_compra_historia=OLD.id_compra
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `historial`;
DELIMITER $$
CREATE TRIGGER `historial` AFTER INSERT ON `compras` FOR EACH ROW INSERT INTO historial_compras SELECT * from compras WHERE id_compra=NEW.id_compra
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE IF NOT EXISTS `departamentos` (
  `id_dep` int(11) NOT NULL AUTO_INCREMENT,
  `nom_depa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_dep`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_dep`, `nom_depa`) VALUES
(1, 'contabilidad'),
(2, 'recursos humanos'),
(3, 'marketing'),
(4, 'comercial'),
(5, 'compras'),
(6, 'logistica'),
(7, 'control de gestion'),
(8, 'direccion general'),
(9, 'direccion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_compras`
--

DROP TABLE IF EXISTS `historial_compras`;
CREATE TABLE IF NOT EXISTS `historial_compras` (
  `id_compra_historia` int(11) NOT NULL AUTO_INCREMENT,
  `producto` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costo` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total_a_pagar` float NOT NULL,
  `fecha_compra` date NOT NULL,
  `proveedor` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_factura` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `evento` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_compra_historia`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `historial_compras`
--

INSERT INTO `historial_compras` (`id_compra_historia`, `producto`, `costo`, `cantidad`, `total_a_pagar`, `fecha_compra`, `proveedor`, `num_factura`, `responsable`, `evento`) VALUES
(1, 'asdasdasdasd', 85, 5, 425, '0555-05-05', 'Siman', 'asd5', 'qwe', 'asda'),
(2, 'uyguygu', 85, 5, 425, '0055-05-05', 'la curacao', '85', 'yo', 'asda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

DROP TABLE IF EXISTS `inventario`;
CREATE TABLE IF NOT EXISTS `inventario` (
  `id_inventario` int(11) NOT NULL AUTO_INCREMENT,
  `insumo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` float NOT NULL,
  `unidades` int(11) NOT NULL,
  `total` float NOT NULL,
  `fecha` date NOT NULL,
  `provee` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `n_factura` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comprador` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_inventario`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_inventario`, `insumo`, `precio`, `unidades`, `total`, `fecha`, `provee`, `n_factura`, `comprador`) VALUES
(1, 'el microondas', 0.25, 5, 1.25, '2022-11-10', '1', 'qwe52', 'CoordinaciÃ³n OT-CBUES'),
(3, 'a', 52, 5, 260, '2023-03-24', '1', '85', 'yui'),
(10, 'asdasdas', 5555, 25, 138875, '2023-07-13', '1', '55', 'sdd');

--
-- Disparadores `inventario`
--
DROP TRIGGER IF EXISTS `actualizar_historial_inventario`;
DELIMITER $$
CREATE TRIGGER `actualizar_historial_inventario` BEFORE UPDATE ON `inventario` FOR EACH ROW UPDATE inventario_historial set inventario_historial.insumo=NEW.insumo, inventario_historial.precio=NEW.precio, inventario_historial.unidades=NEW.unidades, inventario_historial.total=NEW.total, inventario_historial.fecha=NEW.fecha, inventario_historial.provee=NEW.provee, inventario_historial.n_factura=NEW.n_factura, inventario_historial.comprador=NEW.comprador WHERE inventario_historial.id_inventario=OLD.id_inventario
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `historial_inventario`;
DELIMITER $$
CREATE TRIGGER `historial_inventario` AFTER INSERT ON `inventario` FOR EACH ROW INSERT INTO inventario_historial SELECT * from inventario WHERE id_inventario=NEW.id_inventario
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_historial`
--

DROP TABLE IF EXISTS `inventario_historial`;
CREATE TABLE IF NOT EXISTS `inventario_historial` (
  `id_inventario` int(11) NOT NULL AUTO_INCREMENT,
  `insumo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` float NOT NULL,
  `unidades` int(11) NOT NULL,
  `total` float NOT NULL,
  `fecha` date NOT NULL,
  `provee` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `n_factura` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comprador` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_inventario`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inventario_historial`
--

INSERT INTO `inventario_historial` (`id_inventario`, `insumo`, `precio`, `unidades`, `total`, `fecha`, `provee`, `n_factura`, `comprador`) VALUES
(1, 'el microondas', 0.25, 5, 1.25, '2022-11-10', '1', 'qwe52', 'CoordinaciÃ³n OT-CBUES'),
(2, 'asd', 5, 5, 25, '0005-05-05', '1', '545', 'asd'),
(3, 'a', 52, 5, 260, '2023-03-24', '1', '85', 'yui'),
(9, 'asd', 45, 25, 1125, '2023-07-20', '1', 'as11d1as1', 'OT-CBUES'),
(4, 'micro', 45, 1, 45, '2023-04-17', '3', 'as11d1as1', 'OT-CBUES'),
(5, 'microasdasd', 45, 250, 11250, '2023-05-31', '3', 'as11d1as1', 'asdasdasdasdasda'),
(6, 'microasdasd', 5, 25, 125, '2023-06-08', 'No especificado', '5', 'OT-CBUES'),
(7, 'microasdasd', 45, 5, 225, '2023-06-07', 'No especificado', 'as11d1as1', 'OT-CBUES'),
(8, 'aasd', 25, 5, 125, '2023-06-07', '1', '5', 'asdasdasdasdasda'),
(10, 'asdasdas', 5555, 25, 138875, '2023-07-13', '1', '55', 'sdd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `empresa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `representante` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel1` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel2` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `empresa`, `representante`, `tel1`, `tel2`, `fax`, `email`) VALUES
(1, 'la curacao', '', '7585-6969', '', '', ''),
(3, 'Siman', 'yo merengues', '85585', '5858', '5858', 'asdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_dep` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `usuario`, `password`, `tipo`, `id_dep`) VALUES
(2, 'danilo', 'danilo', 'f10e2821bbbea527ea02200352313bc059445190', 'super usuario', 9);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
