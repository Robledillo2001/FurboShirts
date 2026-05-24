-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2026 a las 00:15:33
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
-- Base de datos: `furboshirts`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `ID_CAT` int(11) NOT NULL,
  `PRENDA` varchar(50) NOT NULL,
  `DESCRIPCION` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`ID_CAT`, `PRENDA`, `DESCRIPCION`) VALUES
(6, 'Camiseta', 'Camiseta  Deportiva'),
(7, 'Pantalones', 'Pantalones Deportivos'),
(8, 'Calcetines', 'Calcetines Deportivos'),
(10, 'Chandal', 'Chandal deportivo'),
(18, 'Chaqueta', 'Chaqueta Deportiva');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_deportes`
--

CREATE TABLE `categorias_deportes` (
  `ID_CAT` int(11) NOT NULL,
  `ID_DEPORTE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias_deportes`
--

INSERT INTO `categorias_deportes` (`ID_CAT`, `ID_DEPORTE`) VALUES
(8, 1),
(10, 1),
(10, 2),
(18, 1),
(18, 2),
(18, 3),
(7, 1),
(7, 2),
(6, 1),
(6, 2),
(6, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competiciones`
--

CREATE TABLE `competiciones` (
  `ID_COMP` int(11) NOT NULL,
  `NOMBRE_COMP` varchar(100) NOT NULL,
  `TIPO_COMP` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `competiciones`
--

INSERT INTO `competiciones` (`ID_COMP`, `NOMBRE_COMP`, `TIPO_COMP`) VALUES
(1, 'La Liga', 'nacional'),
(2, 'La Liga Hypermotion', 'nacional'),
(4, 'UEFA CHAMPIONS LEAGUE', 'intercontinental'),
(5, 'Mundial FIFA', 'seleccion'),
(6, 'Premier League', 'nacional'),
(8, 'Ligue 1', 'nacional'),
(9, 'Bundesliga', 'nacional'),
(10, 'Eredivise', 'nacional'),
(11, 'UEFA Eurapa League', 'intercontinental'),
(12, 'UEFA Conference LEAGUE', 'intercontinental'),
(13, 'Seria A', 'nacional'),
(14, 'Liga MX', 'nacional'),
(15, 'Copa Libertadores', 'intercontinental'),
(16, 'EuroCopa', 'seleccion'),
(23, 'Brasileirão ', 'nacional'),
(24, 'Liga Argentina', 'nacional'),
(29, 'Copa Konami', 'intercontinental');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportes`
--

CREATE TABLE `deportes` (
  `ID_DEPORTE` int(11) NOT NULL,
  `DEPORTE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `deportes`
--

INSERT INTO `deportes` (`ID_DEPORTE`, `DEPORTE`) VALUES
(1, 'Fútbol'),
(2, 'Baloncesto'),
(3, 'F1'),
(6, 'Tenis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_pedido`
--

CREATE TABLE `detalles_pedido` (
  `ID_DETALLE` int(11) NOT NULL,
  `ID_PEDIDO` int(11) DEFAULT NULL,
  `ID_PRODUCTO` int(11) DEFAULT NULL,
  `TALLA` varchar(10) NOT NULL,
  `PARCHE` varchar(50) DEFAULT 'Sin Parche',
  `CANTIDAD` int(11) NOT NULL,
  `PRECIO_UNITARIO` decimal(10,2) NOT NULL,
  `DORSAL` varchar(10) DEFAULT NULL,
  `NOMBRE_PERSONALIZADO` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalles_pedido`
--

INSERT INTO `detalles_pedido` (`ID_DETALLE`, `ID_PEDIDO`, `ID_PRODUCTO`, `TALLA`, `PARCHE`, `CANTIDAD`, `PRECIO_UNITARIO`, `DORSAL`, `NOMBRE_PERSONALIZADO`) VALUES
(2, 2, 8, 'XL', 'La Liga', 1, 60.00, '15', 'GULER'),
(3, 2, 12, 'S', 'UEFA Eurapa League', 1, 55.00, 'S/N', 'Sin nombre'),
(4, 3, 16, 'M', 'Sin Parche', 1, 45.00, '42', 'MARLEY'),
(5, 3, 27, 'XL', 'La Liga Hypermotion', 1, 60.00, 'S/N', 'Sin nombre'),
(10, 6, 11, 'XS', 'Sin Parche', 1, 45.00, '10', 'MESSI'),
(11, 6, 19, 'XS', 'Sin Parche', 1, 45.00, '11', 'BALE'),
(12, 7, 9, '2XL', 'UEFA CHAMPIONS LEAGUE', 1, 30.00, 'S/N', 'Sin nombre'),
(13, 8, 34, 'XS', 'Sin Parche', 1, 55.00, '4', 'GASOL'),
(14, 8, 28, 'XS', 'Liga MX', 1, 45.00, 'S/N', 'Sin nombre'),
(15, 9, 12, 'S', 'UEFA Eurapa League', 1, 55.00, '9', 'LEWANDOSKY'),
(16, 10, 21, 'M', 'Sin Parche', 1, 35.00, 'S/N', 'Sin nombre'),
(17, 11, 36, 'XL', 'Sin Parche', 1, 25.00, 'S/N', 'Sin nombre'),
(18, 12, 20, '2XL', 'Premier League', 1, 75.00, '3', 'CUCURELLA'),
(20, 14, 13, 'XS', 'Sin Parche', 1, 25.00, 'S/N', 'Sin nombre'),
(21, 15, 10, 'XL', 'EuroCopa', 1, 45.00, 'S/N', 'Sin nombre'),
(23, 17, 9, 'M', '0', 1, 30.00, 'S/N', 'Sin nombre'),
(24, 17, 26, 'XS', 'Sin Parche', 1, 20.00, 'S/N', 'Sin nombre'),
(25, 17, 12, 'S', 'UEFA Eurapa League', 2, 55.00, '11', 'ANSU');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad_deportiva`
--

CREATE TABLE `entidad_deportiva` (
  `ID_EQUIPO` int(11) NOT NULL,
  `NOMBRE_EQUIPO` varchar(100) NOT NULL,
  `ESCUDO` varchar(255) DEFAULT NULL,
  `TIPO` enum('Equipo','Seleccion') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entidad_deportiva`
--

INSERT INTO `entidad_deportiva` (`ID_EQUIPO`, `NOMBRE_EQUIPO`, `ESCUDO`, `TIPO`) VALUES
(1, 'Real Madrid', 'assets/img/equipos/1773769722_RealMadrid.png', 'Equipo'),
(2, 'España', 'assets/img/equipos/1773769988_España.png', 'Seleccion'),
(3, 'Germany', 'assets/img/equipos/1773770131_Alemania.png', 'Seleccion'),
(4, 'Argentina', 'assets/img/equipos/1773770168_Argentina.png', 'Seleccion'),
(5, 'Italia', 'assets/img/equipos/1773770224_Italia.png', 'Seleccion'),
(6, 'Albacete Balompie', 'assets/img/equipos/1773771290_Albacete.png', 'Equipo'),
(12, 'Barcelona', 'assets/img/equipos/1773953926_Barcelona.png', 'Equipo'),
(13, 'Chelsea', 'assets/img/equipos/1773953941_Chelsea.png', 'Equipo'),
(14, 'Arsenal', 'assets/img/equipos/1773953967_Arsenal.png', 'Equipo'),
(15, 'PSG', 'assets/img/equipos/1773953984_PSG.png', 'Equipo'),
(16, 'TRUE BOYS', 'assets/img/equipos/1774045893_TB.png', 'Equipo'),
(17, 'Brasil', 'assets/img/equipos/1774048243_Brasil.jpg', 'Seleccion'),
(18, 'Atletico de Madrid', 'assets/img/equipos/1774281992_ATM.png', 'Equipo'),
(19, 'Real Betis', 'assets/img/equipos/1774288138_Betih.png', 'Equipo'),
(20, 'Bayern', 'assets/img/equipos/1774288151_Bayern.png', 'Equipo'),
(21, 'Getafe', 'assets/img/equipos/1774288167_Getafe.png', 'Equipo'),
(22, 'Real Sociedad', 'assets/img/equipos/1774288197_RSO.png', 'Equipo'),
(23, 'Athletic Bilbao', 'assets/img/equipos/1774288229_Bilbao.png', 'Equipo'),
(24, 'Manchester City', 'assets/img/equipos/1774288288_City.png', 'Equipo'),
(25, 'Manchester United', 'assets/img/equipos/1774288319_ManU.png', 'Equipo'),
(26, 'Roma', 'assets/img/equipos/1774288342_Roma.png', 'Equipo'),
(27, 'Inter de MIlan', 'assets/img/equipos/1774288371_Inter.png', 'Equipo'),
(28, 'AC Milan', 'assets/img/equipos/1774288388_Milan.png', 'Equipo'),
(29, 'Napoli', 'assets/img/equipos/1774288413_Napoli.png', 'Equipo'),
(30, 'Juventus', 'assets/img/equipos/1774288426_Juve.png', 'Equipo'),
(31, 'Bolonia', 'assets/img/equipos/1774288454_Bolonia.png', 'Equipo'),
(32, 'Alcorcon', 'assets/img/equipos/1774288467_ALK.png', 'Equipo'),
(33, 'Al NASR', 'assets/img/equipos/1774288482_ALNASSR.png', 'Equipo'),
(34, 'Ajax', 'assets/img/equipos/1774288501_AJAX.png', 'Equipo'),
(35, 'Pumas UNAM', 'assets/img/equipos/1774288531_Pumas.png', 'Equipo'),
(36, 'Sporting Gijon', 'assets/img/equipos/1774288556_Gijon.png', 'Equipo'),
(37, 'Real Oviedo', 'assets/img/equipos/1774288569_Oviedo.png', 'Equipo'),
(38, 'Malaga', 'assets/img/equipos/1774288596_Malaga.png', 'Equipo'),
(39, 'Osasuna', 'assets/img/equipos/1774288636_Osasuna.png', 'Equipo'),
(40, 'Real Zaragoza', 'assets/img/equipos/1774288659_Zaragoza.png', 'Equipo'),
(41, 'Sevilla', 'assets/img/equipos/1774289007_Sevilla.png', 'Equipo'),
(42, 'Swansea City', 'assets/img/equipos/1774289027_Swansea.png', 'Equipo'),
(43, 'Noruega', 'assets/img/equipos/1774293693_Noruega.png', 'Seleccion'),
(44, 'Estados Unidos', 'assets/img/equipos/1774293712_USA.png', 'Seleccion'),
(47, 'España Basket', 'assets/img/equipos/1776808239_EspañaBasket.png', 'Seleccion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `N_FACTURA` int(11) NOT NULL,
  `RUTA` varchar(255) NOT NULL,
  `ID_PEDIDO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`N_FACTURA`, `RUTA`, `ID_PEDIDO`) VALUES
(3, 'assets/facturas/factura_6.pdf', 6),
(4, 'assets/facturas/factura_7.pdf', 7),
(5, 'assets/facturas/factura_8.pdf', 8),
(6, 'assets/facturas/factura_9.pdf', 9),
(7, 'assets/facturas/factura_10.pdf', 10),
(8, 'assets/facturas/factura_11.pdf', 11),
(9, 'assets/facturas/factura_12.pdf', 12),
(11, 'assets/facturas/factura_14.pdf', 14),
(12, 'assets/facturas/factura_15.pdf', 15),
(14, 'assets/facturas/factura_17.pdf', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `ID_IMAGEN` int(11) NOT NULL,
  `RUTA` varchar(255) NOT NULL,
  `ID_PRODUCTO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`ID_IMAGEN`, `RUTA`, `ID_PRODUCTO`) VALUES
(10, 'assets/img/productos/1774294216_RMA_AWAY_FRONT_24-25.jpeg', 8),
(11, 'assets/img/productos/1774294216_2_RMA_AWAY_BACK_24-25.jpeg', 8),
(12, 'assets/img/productos/1774294312_RMA_AWAY_FRONT_20-21.jpeg', 9),
(13, 'assets/img/productos/1774294312_2_RMA_AWAY_BACK_20-21.jpeg', 9),
(14, 'assets/img/productos/1774294652_España_Home_Front_2024.jpeg', 10),
(15, 'assets/img/productos/1774294652_2_España_Home_Back_2024.jpeg', 10),
(16, 'assets/img/productos/1774294765_Argentina_Away_Front_2022.jpeg', 11),
(17, 'assets/img/productos/1774294765_2_Argentina_Away_Back_2022.jpeg', 11),
(18, 'assets/img/productos/1774294873_FCB_AWAY_FRONT_22-23.jpeg', 12),
(19, 'assets/img/productos/1774294873_2_FCB_AWAY_BACK_22-23.jpeg', 12),
(26, 'assets/img/productos/1774895811_Ajax_Away_Fron_23-24.jpeg', 16),
(27, 'assets/img/productos/1774895811_Ajax_Away_Back_23-24.jpeg', 16),
(31, 'assets/img/productos/1774903043_Nor_Away_Front_2021.jpeg', 13),
(32, 'assets/img/productos/1774903043_Nor_Away_Back_2021.jpeg', 13),
(35, 'assets/img/productos/1774950692_RMA_DRAGON_FRONT_14-15.jpeg', 19),
(36, 'assets/img/productos/1774950952_Chelsea_Away_front_25-26.jpeg', 20),
(37, 'assets/img/productos/1774950952_2_Chelsea_Away_back_25-26.jpeg', 20),
(38, 'assets/img/productos/1774951227_Alnassr_Home_Front_22-23.jpeg', 21),
(39, 'assets/img/productos/1774951227_2_Alnassr_Home_Back_22-23.jpeg', 21),
(40, 'assets/img/productos/1774951421_Arsenal_Away_FRONT_22-23.jpeg', 22),
(41, 'assets/img/productos/1774951669_España_Home_2008.jpeg', 23),
(42, 'assets/img/productos/1774951669_2_España_HOME_2008_Back.jpeg', 23),
(43, 'assets/img/productos/1774951845_RMA_ALT_FRONT_20-21.jpeg', 24),
(44, 'assets/img/productos/1774951845_2_RMA_ALT_BACK_20-21.jpeg', 24),
(47, 'assets/img/productos/1774952351_RMA_HOME_FRONT_21-22.jpeg', 25),
(48, 'assets/img/productos/1774952351_RMA_HOME_BACK_21-22.jpeg', 25),
(49, 'assets/img/productos/1776034122_TB_POR_FRONT_2023.jpeg', 26),
(50, 'assets/img/productos/1776034122_2_TB_POR_BACK_2023.jpeg', 26),
(51, 'assets/img/productos/1776182027_Albacete_Home_Front_25-26.jpeg', 27),
(52, 'assets/img/productos/1776182027_2_Albacete_Home_Back_25-26.jpeg', 27),
(53, 'assets/img/productos/1776191289_Pumas_Front_24-25.jpeg', 28),
(54, 'assets/img/productos/1776191289_2_Pumas_Back_24-25.jpeg', 28),
(55, 'assets/img/productos/1776215431_ATM_HOME_FRONT_16-17.jpeg', 29),
(56, 'assets/img/productos/1776272833_Swansea_Away_Front_17-18.jpeg', 32),
(58, 'assets/img/productos/1776808743_EspañaBaket_Away_2014_Front.jpeg', 34),
(59, 'assets/img/productos/1776808743_2_EspañaBaket_Away_2014_Back.jpeg', 34),
(60, 'assets/img/productos/1776857633_Milan_home_Front_22-23.jpeg', 35),
(61, 'assets/img/productos/1776857633_2_Milan_home_back_22-23.jpeg', 35),
(62, 'assets/img/productos/1776977882_Milan_home_Front_Pants_22-23.jpeg', 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parches`
--

CREATE TABLE `parches` (
  `ID_LOGO` int(11) NOT NULL,
  `PARCHE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `parches`
--

INSERT INTO `parches` (`ID_LOGO`, `PARCHE`) VALUES
(1, 'assets/img/parches/1773949474_LaLiga.png'),
(4, 'assets/img/parches/1773951972_ucl.png'),
(5, 'assets/img/parches/1773953159_Mundial2026.png'),
(6, 'assets/img/parches/1773959734_Premier.png'),
(8, 'assets/img/parches/1774289150_Ligue1.png'),
(9, 'assets/img/parches/1774289203_Bundesliga.png'),
(10, 'assets/img/parches/1774289573_eredivise.png'),
(11, 'assets/img/parches/1774289663_uel.png'),
(12, 'assets/img/parches/1774289997_conference.png'),
(13, 'assets/img/parches/1774290123_SeriaA.png'),
(14, 'assets/img/parches/1774292129_LigaMx.png'),
(15, 'assets/img/parches/1774292346_Libertadores.png'),
(16, 'assets/img/parches/1774292584_euro2024.png'),
(23, 'assets/img/parches/1776017556_brasileirao.png'),
(24, 'assets/img/parches/1776030527_LPF.png'),
(26, 'assets/img/parches/1776210275_Laliga-old.png'),
(27, 'assets/img/parches/1776210293_Premier-old.png'),
(29, 'assets/img/parches/1776210741_Laliga-old2.png'),
(30, 'assets/img/parches/1776215812_ucl-old.png'),
(32, 'assets/img/parches/1777302997_KonamiCup.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `ID_PEDIDO` int(11) NOT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `FECHA` datetime DEFAULT current_timestamp(),
  `TOTAL` decimal(10,2) NOT NULL,
  `ESTADO` varchar(50) DEFAULT NULL,
  `DIRECCION_ENVIO` varchar(255) DEFAULT NULL,
  `METODO_PAGO` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`ID_PEDIDO`, `ID_USUARIO`, `FECHA`, `TOTAL`, `ESTADO`, `DIRECCION_ENVIO`, `METODO_PAGO`) VALUES
(2, 13, '2026-04-24 12:49:46', 120.00, 'Entregado', 'Calle de Prueba 66', 'Tarjeta'),
(3, 13, '2026-04-29 00:10:36', 109.50, 'Pendiente', 'Calle Santa María de la Cabeza, Barrio de Tiradores, Cuenca, Castilla-La Mancha, 16004, España', 'Tarjeta'),
(6, 13, '2026-04-29 00:26:12', 94.50, 'Pendiente', 'La Graciosa, Teguise, Las Palmas, Canarias, 35540, España', 'Transferencia'),
(7, 13, '2026-04-29 00:47:01', 34.50, 'Pendiente', 'Calle Santa María de la Cabeza, Barrio de Tiradores, Cuenca, Castilla-La Mancha, 16004, España', 'Tarjeta'),
(8, 5, '2026-04-29 16:15:42', 104.50, 'Pendiente', 'Calle Juan Francisco Cobo, Fuente de Pedro Naharro, Cuenca, Castilla-La Mancha, España', 'PayPal'),
(9, 5, '2026-04-29 16:20:05', 59.50, 'Pendiente', 'Calle Juan Francisco Cobo, Fuente de Pedro Naharro, Cuenca, Castilla-La Mancha, España', 'Tarjeta'),
(10, 5, '2026-04-29 16:27:25', 39.50, 'Pendiente', 'La Graciosa, Teguise, Las Palmas, Canarias, 35540, España', 'Tarjeta'),
(11, 5, '2026-04-29 16:28:24', 29.50, 'Pendiente', 'La Graciosa, Teguise, Las Palmas, Canarias, 35540, España', 'Tarjeta'),
(12, 5, '2026-04-29 16:29:42', 79.50, 'Pendiente', 'La Graciosa, Teguise, Las Palmas, Canarias, 35540, España', 'Tarjeta'),
(14, 13, '2026-04-29 17:18:25', 29.50, 'Pendiente', 'Calle Juan Francisco Cobo, Fuente de Pedro Naharro, Cuenca, Castilla-La Mancha, España', 'Tarjeta (Nº: 1121)'),
(15, 13, '2026-05-04 22:00:58', 48.00, 'Pendiente', 'Calle Lusones, Barrio de Tiradores, Cuenca, Castilla-La Mancha, 16001, España', 'Tarjeta (Nº: 1111)'),
(17, 13, '2026-05-20 16:46:13', 206.90, 'Pendiente', 'Calle Juan Francisco Cobo, Fuente de Pedro Naharro, Cuenca, Castilla-La Mancha, España', 'PayPal (Email: rl4845011@gmail.com)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `ID_EQUIPO` int(11) DEFAULT NULL,
  `ID_CAT` int(11) DEFAULT NULL,
  `ID_DEPORTE` int(11) DEFAULT NULL,
  `NOMBRE` varchar(255) NOT NULL,
  `DESCRIPCION` text DEFAULT NULL,
  `PRECIO` decimal(10,2) NOT NULL,
  `FECHA_ALTA` date DEFAULT NULL,
  `ANO_EDICION` varchar(4) DEFAULT NULL,
  `CARACTERISTICAS` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID_PRODUCTO`, `ID_EQUIPO`, `ID_CAT`, `ID_DEPORTE`, `NOMBRE`, `DESCRIPCION`, `PRECIO`, `FECHA_ALTA`, `ANO_EDICION`, `CARACTERISTICAS`) VALUES
(8, 1, 6, 1, 'Camiseta Real Madrid Visita  Fan Version 24/25', 'Camiseta del real Madrid de la temporada 2024/25', 60.00, '2026-03-23', '2025', 'Escudo, y logos bordados'),
(9, 1, 6, 1, 'Camiseta Real Madrid Visita Fan Version 20/21', 'Camiseta del Real Madrid de la temporada 2020/21', 30.00, '2026-03-23', '2021', 'Escudo termosellado y logo bordado'),
(10, 2, 6, 1, 'Camiseta España Local  Fan versión Euro2024', 'Camiseta usada por la selección española en la Eurocopa de alemania 2024', 45.00, '2026-03-23', '2024', 'Escudo termosellado y logotipo bordado'),
(11, 4, 6, 1, '	Camiseta Argentina Visitante Fan versión Mundial 2022', 'Camiseta usada por la seleccion argentina en el mundial de qatar 2022', 45.00, '2026-03-23', '2022', 'Camiseta con logos y escudos bordados'),
(12, 12, 6, 1, 'Camiseta Visitante FC Barcelona  Fan versión 22/23', 'Camiseta usada del Barsa de la temporada 2022/23', 55.00, '2026-03-23', '2023', ''),
(13, 43, 6, 1, 'Camiseta Noruega Visitante 2021', 'Camiseta utilizada en 2022 por noruega para partidos amistosos y clasificatorias', 25.00, '2026-03-23', '2022', ''),
(16, 34, 6, 1, 'Camiseta Ajax Visitante Fan Version 2023/24', 'Camiseta del Ajax de Amsterdam de la temporada 2023/24', 45.00, '2026-03-30', '2024', 'Escudo y logo cosidos'),
(19, 1, 6, 1, 'Camiseta Alternativa Real Madrid Fan Version 2014/15', 'Camiseta alternativa del real madrid usada en la temporada 2014/15', 45.00, '2026-03-31', '2015', 'Escudo y logos cosidos'),
(20, 13, 6, 1, 'Camiseta Chelsea Visitante Fan Versión 2025/26', 'Camiseta del Chelsea Visitante usada en la temporada 2025/26', 75.00, '2026-03-31', '2026', 'Escudo y logo bordados'),
(21, 33, 6, 1, 'Camiseta Al Nassr Fan Version Local 2022/23', 'Camiseta del Al Nassr de la temporada 2022/23', 35.00, '2026-03-31', '2023', 'Escudo y logos cosidos'),
(22, 14, 6, 1, 'Camiseta Arsenal Fan Version 2022/23', 'Camiseta del Arsenal visitante utilizada en la temporada 2022/23', 45.00, '2026-03-31', '2023', 'Escudo y logos cosidos'),
(23, 2, 6, 1, 'Camiseta España Local 2008', 'Camiseta de la seleccion Española utilizada en la Euro 2008', 40.00, '2026-03-31', '2008', 'Escudo y logos cosidos'),
(24, 1, 6, 1, 'Camiseta Real Madrid Fan Version 2020/21', 'Camiseta del Real Madrid Alternativa utilizada en la temporada 2020/21', 40.00, '2026-03-31', '2021', 'Escudo termosellado y logo cosido'),
(25, 1, 6, 1, 'Camiseta Real Madrid Local Player Version 2021/22', 'Camiseta del Real Madrid Local Version Jugador de la temporada 2021/22', 45.00, '2026-03-31', '2022', 'Escudo y logo termoselados'),
(26, 16, 6, 1, 'Camiseta TRUE BOYS Portero 2023', 'Camiseta TRUE BOYS de Portero usada en la Copa KONAMI del año 2023', 20.00, '2026-04-13', '2023', 'Escudo pegado y logo cosido'),
(27, 6, 6, 1, 'Camiseta Albacete Fan Version 2025/26', 'Camiseta del Albacete Balompie usada en la temporada 2025/26', 60.00, '2026-04-14', '2026', 'Escudo y logo bordados'),
(28, 35, 6, 1, 'Camiseta PUMAS UNAM Fan Version 2024/25', 'Camiseta de los PUMAS del año 2025', 45.00, '2026-04-14', '2025', 'Logo bordado'),
(29, 18, 6, 1, 'Camiseta Atletico de Madrid Fan Version 2016/17', 'Camiseta del Atlético de Madrid usada en la temporada 2016/17', 30.00, '2026-04-15', '2017', 'Escudo termosellado y logo bordados'),
(32, 42, 6, 1, 'Camiseta Fan version Swansea City 2017/18', 'Camiseta utilizada en la temporada 2017/18 del Swansea City', 34.00, '2026-04-15', '2018', 'Escudo y logos bordados'),
(34, 47, 6, 2, 'Réplica Camiseta España Visitante 2015', 'Camiseta de la Selección de Básquet usada en el europeo de 2015', 55.00, '2026-04-21', '2015', 'Logo y publicidad termosellado'),
(35, 28, 6, 1, 'Camiseta Fan version Milan 2022/23', 'Camiseta del AC Milan de la temporada 2022/23', 45.00, '2026-04-22', '2023', 'Escudo y logo bordados'),
(36, 28, 7, 1, 'Pantalon AC Milan 2022/23', 'Pantalón del AC Milan 2022/23', 25.00, '2026-04-23', '2023', 'Escudo y logo bordado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_competiciones`
--

CREATE TABLE `productos_competiciones` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `ID_COMP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos_competiciones`
--

INSERT INTO `productos_competiciones` (`ID_PRODUCTO`, `ID_COMP`) VALUES
(8, 1),
(8, 4),
(8, 4),
(9, 1),
(9, 4),
(9, 4),
(10, 5),
(10, 16),
(11, 5),
(12, 1),
(12, 4),
(12, 11),
(16, 10),
(19, 1),
(19, 4),
(19, 4),
(20, 6),
(22, 6),
(23, 5),
(23, 16),
(24, 1),
(24, 4),
(24, 4),
(25, 1),
(25, 4),
(25, 4),
(27, 2),
(8, 4),
(9, 4),
(19, 4),
(24, 4),
(25, 4),
(20, 4),
(28, 14),
(8, 1),
(9, 1),
(19, 1),
(24, 1),
(25, 1),
(22, 6),
(29, 1),
(29, 1),
(12, 1),
(12, 4),
(8, 4),
(9, 4),
(19, 4),
(24, 4),
(25, 4),
(12, 4),
(8, 4),
(9, 4),
(19, 4),
(24, 4),
(25, 4),
(35, 13),
(36, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_tallas`
--

CREATE TABLE `productos_tallas` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `ID_TALLA` int(11) NOT NULL,
  `STOCK_ESPECIFICO` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos_tallas`
--

INSERT INTO `productos_tallas` (`ID_PRODUCTO`, `ID_TALLA`, `STOCK_ESPECIFICO`) VALUES
(8, 1, 40),
(8, 2, 39),
(8, 4, 30),
(8, 5, 25),
(8, 6, 12),
(8, 7, 40),
(9, 1, 25),
(9, 2, 24),
(9, 4, 20),
(9, 5, 14),
(9, 6, 9),
(9, 7, 19),
(10, 1, 20),
(10, 2, 20),
(10, 4, 10),
(10, 5, 8),
(10, 6, 7),
(10, 7, 17),
(11, 1, 12),
(11, 2, 12),
(11, 4, 11),
(11, 5, 9),
(11, 6, 7),
(11, 7, 13),
(12, 1, 22),
(12, 2, 16),
(12, 4, 12),
(12, 5, 22),
(12, 6, 1),
(12, 7, 1),
(13, 1, 35),
(13, 2, 34),
(13, 4, 29),
(13, 5, 24),
(13, 6, 22),
(13, 7, 33),
(16, 1, 20),
(16, 2, 17),
(16, 4, 20),
(16, 5, 15),
(16, 6, 15),
(16, 7, 21),
(19, 1, 15),
(19, 2, 20),
(19, 4, 19),
(19, 5, 12),
(19, 6, 9),
(19, 7, 25),
(20, 1, 30),
(20, 2, 30),
(20, 4, 30),
(20, 5, 21),
(20, 6, 13),
(20, 7, 26),
(21, 1, 25),
(21, 2, 24),
(21, 4, 25),
(21, 5, 20),
(21, 6, 14),
(21, 7, 30),
(22, 1, 30),
(22, 2, 25),
(22, 4, 21),
(22, 5, 14),
(22, 6, 10),
(22, 7, 18),
(23, 1, 9),
(23, 2, 8),
(23, 4, 12),
(23, 5, 7),
(23, 6, 3),
(23, 7, 10),
(24, 1, 15),
(24, 2, 15),
(24, 4, 14),
(24, 5, 20),
(24, 6, 14),
(24, 7, 21),
(25, 1, 10),
(25, 2, 15),
(25, 4, 12),
(25, 5, 13),
(25, 6, 9),
(25, 7, 18),
(26, 1, 30),
(26, 2, 25),
(26, 4, 20),
(26, 5, 14),
(26, 6, 12),
(26, 7, 22),
(27, 1, 29),
(27, 2, 30),
(27, 4, 30),
(27, 5, 27),
(27, 6, 30),
(27, 7, 30),
(28, 1, 25),
(28, 2, 26),
(28, 4, 26),
(28, 5, 13),
(28, 6, 15),
(28, 7, 30),
(29, 1, 15),
(29, 2, 15),
(29, 4, 15),
(29, 5, 9),
(29, 6, 4),
(29, 7, 15),
(32, 1, 12),
(32, 2, 12),
(32, 4, 12),
(32, 5, 7),
(32, 6, 5),
(32, 7, 14),
(34, 1, 12),
(34, 2, 10),
(34, 4, 10),
(34, 5, 12),
(34, 6, 10),
(34, 7, 9),
(35, 1, 22),
(35, 2, 22),
(35, 4, 21),
(35, 5, 10),
(35, 6, 9),
(35, 7, 13),
(36, 1, 12),
(36, 2, 12),
(36, 4, 10),
(36, 5, 7),
(36, 6, 9),
(36, 7, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE `tallas` (
  `ID_TALLA` int(11) NOT NULL,
  `TALLA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tallas`
--

INSERT INTO `tallas` (`ID_TALLA`, `TALLA`) VALUES
(1, 'L'),
(2, 'M'),
(4, 'XS'),
(5, 'XL'),
(6, '2XL'),
(7, 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporadas`
--

CREATE TABLE `temporadas` (
  `ID_COMP` int(11) NOT NULL,
  `ID_EQUIPO` int(11) NOT NULL,
  `ID_LOGO` int(11) NOT NULL,
  `ANO_EDICION` int(11) NOT NULL,
  `PARCHE_ESPECIAL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `temporadas`
--

INSERT INTO `temporadas` (`ID_COMP`, `ID_EQUIPO`, `ID_LOGO`, `ANO_EDICION`, `PARCHE_ESPECIAL`) VALUES
(1, 1, 26, 2021, 'assets/img/parches/1776214108_LaligaWin-old.png'),
(1, 1, 1, 2025, 'assets/img/parches/1773960001_LaligaWin.png'),
(1, 12, 1, 2023, NULL),
(1, 12, 1, 2026, 'assets/img/parches/1773960458_LaligaWin.png'),
(1, 18, 26, 2017, NULL),
(1, 21, 1, 2025, NULL),
(2, 6, 1, 2026, NULL),
(4, 13, 4, 2026, 'assets/img/parches/1776790382_chelseaWin.png'),
(5, 2, 5, 2026, NULL),
(5, 3, 5, 2026, NULL),
(5, 4, 5, 2026, 'assets/img/parches/1774293743_MundialWin.png'),
(5, 17, 5, 2026, NULL),
(6, 13, 6, 2026, 'assets/img/parches/1776790349_chelseaWin2.png'),
(6, 14, 6, 2023, NULL),
(6, 24, 6, 2022, 'assets/img/parches/1774291734_PremierWin.png'),
(8, 15, 8, 2025, NULL),
(9, 20, 9, 2025, NULL),
(9, 20, 9, 2026, 'assets/img/parches/1774289558_bundelisgaWin.png'),
(10, 34, 10, 2022, 'assets/img/parches/1774289630_erediviseWin.png'),
(11, 12, 11, 2023, NULL),
(12, 39, 12, 2024, NULL),
(13, 27, 13, 2025, 'assets/img/parches/1774292371_Seria_aWin.png'),
(13, 29, 13, 2026, 'assets/img/parches/1774290485_Seria_aWin.png'),
(14, 35, 14, 2025, NULL),
(16, 2, 16, 2024, 'assets/img/parches/1774292676_NationsWIn24.png'),
(16, 5, 16, 2024, 'assets/img/parches/1774292708_euro2020Win.png'),
(4, 1, 4, 2025, 'assets/img/parches/1776787866_ucl15.png'),
(4, 12, 4, 2023, 'assets/img/parches/1776787918_ucl5.png'),
(4, 1, 30, 2021, 'assets/img/parches/1776787960_ucl13.png'),
(13, 28, 13, 2023, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `APELLIDOS` varchar(50) NOT NULL,
  `CORREO` varchar(50) NOT NULL,
  `PASSWD` varchar(255) NOT NULL,
  `ROL` enum('admin','cliente') DEFAULT 'cliente',
  `FECHA_REGISTRO` timestamp NOT NULL DEFAULT current_timestamp(),
  `IMAGEN_USER` varchar(255) DEFAULT NULL,
  `NOMBRE_USUARIO` varchar(50) NOT NULL,
  `TOKEN_RECUPERACION` varchar(255) DEFAULT NULL,
  `EXPIRACION_TOKEN` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_USUARIO`, `NOMBRE`, `APELLIDOS`, `CORREO`, `PASSWD`, `ROL`, `FECHA_REGISTRO`, `IMAGEN_USER`, `NOMBRE_USUARIO`, `TOKEN_RECUPERACION`, `EXPIRACION_TOKEN`) VALUES
(4, 'Rubén', 'Lopez-Reina Robledillo', 'lopezreinarobledilloruben@gmail.com', '$2y$10$Kll/g2kTWCt9eszcJtz6UO3QTuSw5lO4npOvz6zFBugDa1Et7SQ9.', 'admin', '2026-03-13 19:36:29', 'assets/img/users/1776088027_mbappe.jpg', 'R0BL3', NULL, NULL),
(5, 'Ruben', 'Muñoz Magaña', 'rl4845011@gmail.com', '$2y$10$nYuKpMHvy3nNNxE.LEVEkuQbYWWt8MLlZw7.EanZM/zG3U5oh36/C', 'cliente', '2026-03-13 19:45:36', 'assets/img/users/1776088076_satriano.jpg', '29Ruben', NULL, NULL),
(13, 'Jose', 'Bordalas', 'robleruben22@gmail.com', '$2y$10$3AagdiEVRfZ67qbJX.DooeMd8RTQXG6dMJw4q1XIiws0RTym9hnHK', 'cliente', '2026-03-24 15:14:32', 'assets/img/users/1774367889_bordalas.jpg', 'Bordaneta69', '5dcfbb56050abaec2dff1dccedd58932bc76bf0c5a2cd6305eca1ab3697ee105', '2026-05-25 01:20:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `ID_VALORACION` int(11) NOT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `ID_PRODUCTO` int(11) DEFAULT NULL,
  `PUNTUACION` int(11) NOT NULL,
  `COMENTARIOS` text DEFAULT NULL
) ;

--
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`ID_VALORACION`, `ID_USER`, `ID_PRODUCTO`, `PUNTUACION`, `COMENTARIOS`) VALUES
(5, 13, 8, 4, 'Buena calidad');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID_CAT`);

--
-- Indices de la tabla `categorias_deportes`
--
ALTER TABLE `categorias_deportes`
  ADD KEY `fk_deporte` (`ID_DEPORTE`),
  ADD KEY `fk_cat_deportes_cat_rel` (`ID_CAT`);

--
-- Indices de la tabla `competiciones`
--
ALTER TABLE `competiciones`
  ADD PRIMARY KEY (`ID_COMP`);

--
-- Indices de la tabla `deportes`
--
ALTER TABLE `deportes`
  ADD PRIMARY KEY (`ID_DEPORTE`);

--
-- Indices de la tabla `detalles_pedido`
--
ALTER TABLE `detalles_pedido`
  ADD PRIMARY KEY (`ID_DETALLE`),
  ADD KEY `fk_det_pedido_p` (`ID_PEDIDO`),
  ADD KEY `fk_det_pedido_prod` (`ID_PRODUCTO`);

--
-- Indices de la tabla `entidad_deportiva`
--
ALTER TABLE `entidad_deportiva`
  ADD PRIMARY KEY (`ID_EQUIPO`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`N_FACTURA`),
  ADD UNIQUE KEY `ID_PEDIDO` (`ID_PEDIDO`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`ID_IMAGEN`),
  ADD KEY `fk_img_prod` (`ID_PRODUCTO`);

--
-- Indices de la tabla `parches`
--
ALTER TABLE `parches`
  ADD PRIMARY KEY (`ID_LOGO`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ID_PEDIDO`),
  ADD KEY `fk_pedido_user` (`ID_USUARIO`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID_PRODUCTO`),
  ADD KEY `fk_prod_cat` (`ID_CAT`),
  ADD KEY `fk_producto_equipo` (`ID_EQUIPO`),
  ADD KEY `fk_prod_deporte` (`ID_DEPORTE`);

--
-- Indices de la tabla `productos_competiciones`
--
ALTER TABLE `productos_competiciones`
  ADD KEY `fk_p_comp_prod_rel` (`ID_PRODUCTO`),
  ADD KEY `fk_p_comp_comp_rel` (`ID_COMP`);

--
-- Indices de la tabla `productos_tallas`
--
ALTER TABLE `productos_tallas`
  ADD KEY `fk_prod_talla_talla` (`ID_TALLA`),
  ADD KEY `fk_prod_talla_p_rel` (`ID_PRODUCTO`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`ID_TALLA`);

--
-- Indices de la tabla `temporadas`
--
ALTER TABLE `temporadas`
  ADD KEY `fk_cp_logo` (`ID_LOGO`),
  ADD KEY `fk_cp_equipo` (`ID_EQUIPO`),
  ADD KEY `idx_respaldo_fk` (`ID_COMP`,`ID_EQUIPO`,`ID_LOGO`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD UNIQUE KEY `CORREO` (`CORREO`),
  ADD UNIQUE KEY `NOMBRE_USUARIO` (`NOMBRE_USUARIO`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`ID_VALORACION`),
  ADD KEY `fk_val_user` (`ID_USER`),
  ADD KEY `fk_val_prod` (`ID_PRODUCTO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID_CAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `competiciones`
--
ALTER TABLE `competiciones`
  MODIFY `ID_COMP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `deportes`
--
ALTER TABLE `deportes`
  MODIFY `ID_DEPORTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detalles_pedido`
--
ALTER TABLE `detalles_pedido`
  MODIFY `ID_DETALLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `entidad_deportiva`
--
ALTER TABLE `entidad_deportiva`
  MODIFY `ID_EQUIPO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `N_FACTURA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `ID_IMAGEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `parches`
--
ALTER TABLE `parches`
  MODIFY `ID_LOGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ID_PEDIDO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `ID_TALLA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  MODIFY `ID_VALORACION` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias_deportes`
--
ALTER TABLE `categorias_deportes`
  ADD CONSTRAINT `fk_cat_deportes_cat_rel` FOREIGN KEY (`ID_CAT`) REFERENCES `categorias` (`ID_CAT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`ID_CAT`) REFERENCES `categorias` (`ID_CAT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_deporte` FOREIGN KEY (`ID_DEPORTE`) REFERENCES `deportes` (`ID_DEPORTE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_pedido`
--
ALTER TABLE `detalles_pedido`
  ADD CONSTRAINT `fk_det_pedido` FOREIGN KEY (`ID_PEDIDO`) REFERENCES `pedidos` (`ID_PEDIDO`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_det_pedido_p` FOREIGN KEY (`ID_PEDIDO`) REFERENCES `pedidos` (`ID_PEDIDO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_det_pedido_prod` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `productos` (`ID_PRODUCTO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_det_prod` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `productos` (`ID_PRODUCTO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `fk_factura_pedido` FOREIGN KEY (`ID_PEDIDO`) REFERENCES `pedidos` (`ID_PEDIDO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `fk_img_prod` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `productos` (`ID_PRODUCTO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedido_user` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_prod_cat` FOREIGN KEY (`ID_CAT`) REFERENCES `categorias` (`ID_CAT`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_prod_deporte` FOREIGN KEY (`ID_DEPORTE`) REFERENCES `deportes` (`ID_DEPORTE`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prod_equipo` FOREIGN KEY (`ID_EQUIPO`) REFERENCES `entidad_deportiva` (`ID_EQUIPO`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_producto_equipo` FOREIGN KEY (`ID_EQUIPO`) REFERENCES `entidad_deportiva` (`ID_EQUIPO`);

--
-- Filtros para la tabla `productos_competiciones`
--
ALTER TABLE `productos_competiciones`
  ADD CONSTRAINT `fk_p_comp_comp` FOREIGN KEY (`ID_COMP`) REFERENCES `competiciones` (`ID_COMP`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_p_comp_comp_rel` FOREIGN KEY (`ID_COMP`) REFERENCES `competiciones` (`ID_COMP`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_p_comp_prod` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `productos` (`ID_PRODUCTO`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_p_comp_prod_rel` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `productos` (`ID_PRODUCTO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos_tallas`
--
ALTER TABLE `productos_tallas`
  ADD CONSTRAINT `fk_prod_talla_p_rel` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `productos` (`ID_PRODUCTO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prod_talla_prod` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `productos` (`ID_PRODUCTO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_stock_prod` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `productos` (`ID_PRODUCTO`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_stock_talla` FOREIGN KEY (`ID_TALLA`) REFERENCES `tallas` (`ID_TALLA`) ON DELETE CASCADE;

--
-- Filtros para la tabla `temporadas`
--
ALTER TABLE `temporadas`
  ADD CONSTRAINT `fk_cp_comp` FOREIGN KEY (`ID_COMP`) REFERENCES `competiciones` (`ID_COMP`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cp_equipo` FOREIGN KEY (`ID_EQUIPO`) REFERENCES `entidad_deportiva` (`ID_EQUIPO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cp_logo` FOREIGN KEY (`ID_LOGO`) REFERENCES `parches` (`ID_LOGO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `fk_val_prod` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `productos` (`ID_PRODUCTO`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_val_user` FOREIGN KEY (`ID_USER`) REFERENCES `usuarios` (`ID_USUARIO`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
