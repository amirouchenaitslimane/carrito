-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2018 a las 17:12:19
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carrito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `numvendedor` smallint(6) NOT NULL,
  `numpieza` char(16) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linped`
--

CREATE TABLE `linped` (
  `NUMPEDIDO` smallint(6) NOT NULL,
  `NUMLINEA` smallint(6) NOT NULL,
  `NUMPIEZA` char(16) DEFAULT NULL,
  `PRECIOCOMPRA` int(11) DEFAULT NULL,
  `CANTPEDIDA` smallint(6) DEFAULT NULL,
  `FECHARECEP` date DEFAULT NULL,
  `CANTRECIBIDA` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `linped`
--

INSERT INTO `linped` (`NUMPEDIDO`, `NUMLINEA`, `NUMPIEZA`, `PRECIOCOMPRA`, `CANTPEDIDA`, `FECHARECEP`, `CANTRECIBIDA`) VALUES
(14, 1, 'A-1001-L', 300, 1, '2018-01-12', 1),
(14, 2, 'C-1002-H', 400, 1, '2018-01-12', 1),
(14, 3, 'C-1002-J', 700, 1, '2018-01-12', 1),
(14, 4, 'C-400-Z', 1800, 1, '2018-01-12', 1),
(14, 5, '4', 1500, 1, '2018-01-12', 1),
(15, 1, '2', 15000, 1, '2018-01-12', 1),
(15, 2, '3', 2570, 1, '2018-01-12', 1),
(15, 3, '4', 1500, 1, '2018-01-12', 1),
(16, 1, '3', 2570, 1, '2018-01-12', 1),
(17, 1, '2', 15000, 1, '2018-01-19', 1),
(17, 2, 'C-400-Z', 1800, 1, '2018-01-19', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `NUMPEDIDO` smallint(6) NOT NULL,
  `NUMVEND` smallint(6) DEFAULT NULL,
  `FECHA` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`NUMPEDIDO`, `NUMVEND`, `FECHA`) VALUES
(7, 8002, '0992-10-02'),
(12, 8, '2018-01-04'),
(13, 8, '2018-01-04'),
(14, 1, '2018-01-12'),
(15, 1, '2018-01-12'),
(16, 1, '2018-01-12'),
(17, 7002, '2018-01-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pieza`
--

CREATE TABLE `pieza` (
  `NUMPIEZA` char(16) NOT NULL,
  `NOMPIEZA` varchar(30) DEFAULT NULL,
  `PRECIOVENT` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pieza`
--

INSERT INTO `pieza` (`NUMPIEZA`, `NOMPIEZA`, `PRECIOVENT`, `image`) VALUES
('2', 'Teclado ErgonOmico', 15000, 'Teclado_ErgonOmico.jpg'),
('3', 'Teclado ps/2', 2570, 'Teclado_ps2.jpg'),
('4', 'RatOn ps/2', 1500, 'RatOn_ps2.jpg'),
('A-1001-L', 'RATON NEGRO 3BOTONES', 300, 'RATON_NEGRO_3BOTONES.jpg'),
('C-1002-H', NULL, 400, 'noimage.gif'),
('C-1002-J', NULL, 700, 'noimage.gif'),
('C-400-Z', 'FILTRO PANTALLA 17', 1800, 'FILTRO_PANTALLA_17.jpg'),
('DD-0001-210', 'DISCO DURO 20 Gb WD', 25000, 'DISCO_DURO_20_Gb_WD.jpg'),
('DD-0001-30', 'DISCO DURO 20 Gb SEAGATE', 20000, 'DISCO_DURO_20_Gb_SEAGATE.jpg'),
('DK144-0002-P', 'CAJA DISCOS 1.44Mb', 1100, 'CAJA_DISCOS_1.44Mb.jpg'),
('DK720-0002-P', 'CAJA DISCOS 720Mb', 1500, 'CAJA_DISCOS_720Mb.jpg'),
('FD-0001-144', 'UNIDAD DISCO 1.44 SAMSUNG', 15000, 'UNIDAD_ DISCO_1.44_SAMSUNG.jpg'),
('FD-0002-720', 'UNIDAD DISCO 720 SAMSUNG', 17000, 'UNIDAD_DISCO_720_SAMSUNG.jpg'),
('M-0001-C', 'MONITOR LG 17P', 30000, 'MONITOR_LG_17P.jpg'),
('M-0003-C', 'MONITOR SONY 17P', 45000, 'MONITOR_SONY_17P.jpg'),
('O-0001-PP', 'PEGATINAS ESPECIALES FD 1.44', 400, 'PEGATINAS_ESPECIALES_FD_1.44.JPG'),
('O-0002-PP', 'PEGATINAS ESPECIALES FD 720', 450, 'PEGATINAS_ESPECIALES_FD_1.44.JPG'),
('P-0001-33', 'PLACA BASE SOLTEK 33Mhz', 25000, 'PLACA_BASE_INTEL.jpg'),
('P-0002-533', 'PLACA BASE INTEL', 75000, 'PLACA_BASE_INTEL.jpg'),
('T-0001-AT', 'TECLADO COMPATIBLE AT', 1000, 'TECLADO_COMPATIBLE_AT.jpg'),
('T-0001-IBM', 'TECLADO COMPATIBLE IBM', 1500, 'TECLADO_COMPATIBLE_AT.jpg'),
('T-0002-AT', 'TECLADO COMPATIBLE AT2', 1045, 'TECLADO_COMPATIBLE_AT.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE `vendedor` (
  `NUMVEND` smallint(6) NOT NULL,
  `NOMVEND` char(30) DEFAULT NULL,
  `NOMBRECOMER` char(30) DEFAULT NULL,
  `TELEFONO` char(15) DEFAULT NULL,
  `CALLE` char(30) DEFAULT NULL,
  `CIUDAD` char(20) DEFAULT NULL,
  `PROVINCIA` char(20) DEFAULT NULL,
  `COD_POSTAL` char(5) DEFAULT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`NUMVEND`, `NOMVEND`, `NOMBRECOMER`, `TELEFONO`, `CALLE`, `CIUDAD`, `PROVINCIA`, `COD_POSTAL`, `login`, `password`) VALUES
(1, 'AGAPITO LAFUENTE DEL CORRAL', 'MECEMSA', '965758745', 'Avda. Valencia,32', 'ALICANTE', 'ALICANTE', NULL, 'AGAPITO LAFUENTE DEL CORRAL', '1'),
(2, 'LUCIANO BLAZQUEZ VAZQUEZ', 'HARW SA', '965548726', 'General Lacy,15', 'ALICANTE', 'ALICANTE', NULL, 'LUCIANO BLAZQUEZ VAZQUEZ', '2'),
(3, 'GODOFREDO MARTIN MARTINEZ', 'MECEMSA', '965754128', 'Avda. Valencia,15', 'ALICANTE', 'ALICANTE', NULL, 'GODOFREDO MARTIN MARTINEZ', '3'),
(4, 'JUAN REINA PRINCESA', 'HARW SA', '965115342', 'C/Desconocida,7', 'New York', 'EEUU', NULL, 'JUAN REINA PRINCESA', '4'),
(5, 'JUAN REINA PRINCESA', 'LA DEAQUI', '984578115', 'San Francisco de Asis,5', 'GijOn', 'ASTURIAS', NULL, 'JUAN REINA PRINCESA', '5'),
(6, 'MANOLO PIEDRA POMEZ', 'HUMP SA', '983445879', 'Corredera,2', 'SAN VICENTE', 'ALICANTE', NULL, 'MANOLO PIEDRA POMEZ', '6'),
(7, 'MANUEL RODRIGUEZ PEREZ', 'SoftHard distribuidora S.A', '966774455', 'Perdida,3', 'NEW ORLEANS', 'LOUSSIANA', NULL, 'MANUEL RODRIGUEZ PEREZ', '7'),
(8, 'LUISA PINTO HEREDIA', 'LaMeJoR, S.A', '555447788', 'Perdida,8', 'NEW ORLEANS', 'LOUSSIANA', NULL, 'LUISA PINTO HEREDIA', '8'),
(9, 'CHEMA PAMUNDI GRANDE', 'OLE ESPA�A', NULL, NULL, 'MADRID', 'MADRID', NULL, 'CHEMA PAMUNDI GRANDE', '9'),
(10, 'GUSTAVO DE B�SICA ZURRO', 'OLE ESPA�A', NULL, NULL, 'MADRID', 'MADRID', NULL, 'GUSTAVO DE B�SICA ZURRO', '10'),
(11, 'MARIO DUQUE LIZONDO', 'BANESTOSOFT,SA', NULL, NULL, 'GIJON', 'ASTURIAS', NULL, 'MARIO DUQUE LIZONDO', '11'),
(12, 'JOSE ANT. MARTINEZ JUANO', 'OLE ESPA�A', NULL, NULL, 'MADRID', 'MADRID', NULL, 'JOSE ANT. MARTINEZ JUANO', '12'),
(13, 'MANUEL COMEZ APATILLA', 'OLE ESPA�A', '3667798', 'COLON,21', 'VALENCIA', 'VALENCIA', NULL, 'MANUEL COMEZ APATILLA', '13'),
(55, 'LUIS GRACIA LATORRE', 'DANYSOFT, S.A', '999-448734', 'AZORIN,1', 'ALICANTE', 'ALICANTE', NULL, 'LUIS GRACIA LATORRE', '55'),
(100, 'PEDRO GARCIA MORALES', 'SOFT, S.A', NULL, 'MAYOR,145', 'VALENCIA', 'VALENCIA', NULL, 'PEDRO GARCIA MORALES', '100'),
(101, 'SALVADOR PLA GRACIA', 'HOUSESOFT, S.A', '555-555555', 'MENOR,13', 'SAN VICENTE', 'ALICANTE', NULL, 'SALVADOR PLA GRACIA', '101'),
(102, 'SOLEDAD MARTINEZ ORTEGAA', 'IXSOFT, S.L', '555-468998', 'PLAZA MANILA,13', 'ALICANTE', 'ALICANTE', NULL, 'SOLEDAD MARTINEZ ORTEGAA', '102'),
(200, 'SEVERINO MARTINEZ MARTI', 'DANYSOFT, S.A', '999-448734', 'AZORIN,1', 'ALICANTE', 'ALICANTE', NULL, 'SEVERINO MARTINEZ MARTI', '200'),
(201, 'MANUEL TUNO LAFUENTE', 'HALA, S.A', '655-487711', 'QUINTANA,33', 'ALICANTE', 'ALICANTE', NULL, 'MANUEL TUNO LAFUENTE', '201'),
(7002, 'amirouche', NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin'),
(8001, 'JUAN RODRIGUEZ JUAN', 'HALA, S.A', NULL, NULL, 'SAN JUAN', 'ALICANTE', NULL, 'JUAN RODRIGUEZ JUAN', '8001'),
(8002, 'JUAN MARTINEZ GARCIA', 'HARW, S.A', '555-667713', 'CISCAR,15', 'ELCHE', 'ALICANTE', NULL, 'JUAN MARTINEZ GARCIA', '8002'),
(8003, 'LUIS RODRIGUEZ SALA', 'HARW, S.A', '555-667713', 'CISCAR,15', 'ELCHE', 'ALICANTE', NULL, 'LUIS RODRIGUEZ SALA', '8003');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD KEY `numvendedor` (`numvendedor`),
  ADD KEY `numpieza` (`numpieza`);

--
-- Indices de la tabla `linped`
--
ALTER TABLE `linped`
  ADD PRIMARY KEY (`NUMPEDIDO`,`NUMLINEA`),
  ADD KEY `CAJ_LINPED_PIEZA` (`NUMPIEZA`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`NUMPEDIDO`),
  ADD KEY `CAJ_PEDIDO_VENDEDOR` (`NUMVEND`);

--
-- Indices de la tabla `pieza`
--
ALTER TABLE `pieza`
  ADD PRIMARY KEY (`NUMPIEZA`);

--
-- Indices de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`NUMVEND`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`numvendedor`) REFERENCES `vendedor` (`NUMVEND`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`numpieza`) REFERENCES `pieza` (`NUMPIEZA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `linped`
--
ALTER TABLE `linped`
  ADD CONSTRAINT `CAJ_LINPED_PEDIDO` FOREIGN KEY (`NUMPEDIDO`) REFERENCES `pedido` (`NUMPEDIDO`),
  ADD CONSTRAINT `CAJ_LINPED_PIEZA` FOREIGN KEY (`NUMPIEZA`) REFERENCES `pieza` (`NUMPIEZA`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `CAJ_PEDIDO_VENDEDOR` FOREIGN KEY (`NUMVEND`) REFERENCES `vendedor` (`NUMVEND`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
