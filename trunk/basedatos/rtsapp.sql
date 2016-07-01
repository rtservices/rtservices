-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2016 a las 20:28:13
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rtsapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtscategoria`
--

CREATE TABLE IF NOT EXISTS `rtscategoria` (
  `IdCategoria` int(11) NOT NULL,
  `NombreCategoria` varchar(45) COLLATE utf8_bin NOT NULL,
  `Estado` tinyint(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rtscategoria`
--

INSERT INTO `rtscategoria` (`IdCategoria`, `NombreCategoria`, `Estado`) VALUES
(1, 'Cuarta', 1),
(2, 'Quinta', 1),
(3, 'Tercera', 1),
(4, 'Segunda', 1),
(5, 'Primera', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsclasejugador_det`
--

CREATE TABLE IF NOT EXISTS `rtsclasejugador_det` (
  `IdClasejugador` int(11) NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdClase_deb` int(11) DEFAULT NULL,
  `IdPlanClase_deb` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rtsclasejugador_det`
--

INSERT INTO `rtsclasejugador_det` (`IdClasejugador`, `Estado`, `IdClase_deb`, `IdPlanClase_deb`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsclase_deb`
--

CREATE TABLE IF NOT EXISTS `rtsclase_deb` (
  `IdClase` int(11) NOT NULL,
  `NombreClase` varchar(50) COLLATE utf8_bin NOT NULL,
  `HoraInicio` varchar(20) COLLATE utf8_bin NOT NULL,
  `HoraFinal` varchar(20) COLLATE utf8_bin NOT NULL,
  `Dia` varchar(20) COLLATE utf8_bin NOT NULL,
  `CantidadJugadores` int(2) NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdPersonaRol_det` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rtsclase_deb`
--

INSERT INTO `rtsclase_deb` (`IdClase`, `NombreClase`, `HoraInicio`, `HoraFinal`, `Dia`, `CantidadJugadores`, `Estado`, `IdPersonaRol_det`) VALUES
(1, 'Primera clase', '16:30', '17:15', 'Lunes', 0, 1, 1),
(2, 'Segunda clase', '17:15', '18:00', 'Lunes', 0, 1, 1),
(3, 'Tercera clase', '18:00', '18:45', 'Lunes', 0, 1, 1),
(4, 'Cuarta clase', '18:45', '19:30', 'Lunes', 0, 1, 1),
(5, 'Quinta clase', '19:30', '20:15', 'Lunes', 0, 1, 1),
(6, 'Sexta clase', '20:15', '21:00', 'Lunes', 0, 1, 1),
(7, 'Primera clase', '16:30', '17:15', 'Martes', 0, 1, 1),
(8, 'Segunda clase', '17:15', '18:00', 'Martes', 0, 1, 1),
(9, '', '0', '0', '0', 0, 0, NULL),
(10, 'asdasd', '0', '0', '0', 0, 1, NULL),
(11, '', '0', '0', '0', 0, 1, NULL),
(12, '', '0', '0', '0', 0, 1, NULL),
(13, '', '0', '0', '0', 0, 0, NULL),
(14, '', '0', '0', '0', 0, 1, NULL),
(15, '', '0', '0', '0', 0, 1, NULL),
(16, '', '0', '0', '0', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtscuadro_deb`
--

CREATE TABLE IF NOT EXISTS `rtscuadro_deb` (
  `IdCuadro` int(11) NOT NULL,
  `NombreCuadro` varchar(25) COLLATE utf8_bin NOT NULL,
  `FechaCreacion` date NOT NULL,
  `Nivel` varchar(45) COLLATE utf8_bin NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdEtapa_deb` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtseps`
--

CREATE TABLE IF NOT EXISTS `rtseps` (
  `IdEps` int(11) NOT NULL,
  `NombreEps` varchar(40) COLLATE utf8_bin NOT NULL,
  `Telefono` varchar(15) COLLATE utf8_bin NOT NULL,
  `Estado` tinyint(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rtseps`
--

INSERT INTO `rtseps` (`IdEps`, `NombreEps`, `Telefono`, `Estado`) VALUES
(1, 'Fundación Medico Preventiva', '123', 1),
(2, 'Sisben', '12345', 1),
(3, 'Sura EPS', '4178744', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsetapajugador_det`
--

CREATE TABLE IF NOT EXISTS `rtsetapajugador_det` (
  `IdEtapaJugador` int(11) NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdEtapa_deb` int(11) DEFAULT NULL,
  `IdPersonaRol_det` int(11) DEFAULT NULL,
  `IdCategoria` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rtsetapajugador_det`
--

INSERT INTO `rtsetapajugador_det` (`IdEtapaJugador`, `Estado`, `IdEtapa_deb`, `IdPersonaRol_det`, `IdCategoria`) VALUES
(1, 1, 1, 3, 2),
(2, 1, 1, 6, 2),
(3, 0, 1, 9, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsetapa_deb`
--

CREATE TABLE IF NOT EXISTS `rtsetapa_deb` (
  `IdEtapa` int(11) NOT NULL,
  `NombreEtapa` varchar(55) COLLATE utf8_bin NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaFin` date NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdTorneo` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rtsetapa_deb`
--

INSERT INTO `rtsetapa_deb` (`IdEtapa`, `NombreEtapa`, `FechaInicio`, `FechaFin`, `Estado`, `IdTorneo`) VALUES
(1, 'Etapa 1', '2016-02-10', '2016-02-29', 0, 1),
(2, 'Etapa 2', '0000-00-00', '2016-04-28', 1, 1),
(3, 'Etapa 3', '2016-06-13', '2016-07-01', 1, 1),
(4, 'Etapa 4', '2016-03-09', '2016-03-16', 1, 1),
(5, 'Etapa 5', '2016-05-03', '2016-03-25', 1, 1),
(6, 'Etapa 6', '2016-03-08', '2016-03-18', 1, 1),
(7, 'Etapa 1', '2016-03-03', '2016-03-08', 0, 2),
(8, 'Etapa 2', '2016-03-01', '2016-03-10', 1, 2),
(9, 'Etapa 3', '2016-03-03', '2016-03-04', 1, 2),
(10, 'Etapa 4', '2016-03-11', '2016-03-18', 1, 2),
(11, 'Etapa 5', '2016-03-16', '2016-03-09', 1, 2),
(12, 'Etapa 6', '2016-03-15', '2016-03-16', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsjugadorcuadro_det`
--

CREATE TABLE IF NOT EXISTS `rtsjugadorcuadro_det` (
  `IdJugadorCuadro` int(11) NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdEtapaJugador_det` int(11) DEFAULT NULL,
  `IdCuadro_deb` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtslogin_deb`
--

CREATE TABLE IF NOT EXISTS `rtslogin_deb` (
  `IdLogin` int(11) NOT NULL,
  `Usuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `Clave` varchar(255) COLLATE utf8_bin NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdPersonaRol_det` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rtslogin_deb`
--

INSERT INTO `rtslogin_deb` (`IdLogin`, `Usuario`, `Clave`, `Estado`, `IdPersonaRol_det`) VALUES
(1, 'Admin', '$2y$10$FxpPxFfN5vnvEkSnezbjYOByVeaXuwp9RQryrP6UToTlo3INb52N.', 1, 1),
(2, 'Instructor', '$2y$10$rfvvq3.UGpsxzjCt7hOe6.QV660jW5A2uPTjr9BqtcIdTnOGG8NBa', 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsmaterial`
--

CREATE TABLE IF NOT EXISTS `rtsmaterial` (
  `IdMaterial` int(11) NOT NULL,
  `DescripcionMaterial` varchar(45) COLLATE utf8_bin NOT NULL,
  `Estado` tinyint(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rtsmaterial`
--

INSERT INTO `rtsmaterial` (`IdMaterial`, `DescripcionMaterial`, `Estado`) VALUES
(1, 'Raqueta adulto', 1),
(2, 'Raqueta niño', 1),
(3, 'Raqueta transición', 1),
(4, 'Pelota sencilla', 0),
(5, 'Pelota 15cm x 10cm', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsmaterialclase_det`
--

CREATE TABLE IF NOT EXISTS `rtsmaterialclase_det` (
  `IdMaterialClase` int(11) NOT NULL,
  `Cantidad` varchar(5) COLLATE utf8_bin NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdClase_deb` int(11) DEFAULT NULL,
  `IdMaterial` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtspartidotennis_deb`
--

CREATE TABLE IF NOT EXISTS `rtspartidotennis_deb` (
  `IdPartidotennis` int(11) NOT NULL,
  `Set1Jug1` int(2) NOT NULL,
  `Set1Jug2` int(2) NOT NULL,
  `Set2Jug1` int(2) NOT NULL,
  `Set2Jug2` int(2) NOT NULL,
  `TieBreakJug1` int(2) NOT NULL,
  `TieBreakJug2` int(2) NOT NULL,
  `Horario` datetime NOT NULL,
  `Lugar` varchar(50) COLLATE utf8_bin NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdJugadorCuadro_detJug1` int(11) NOT NULL,
  `IdJugadorCuadro_detJug2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtspersonarol_det`
--

CREATE TABLE IF NOT EXISTS `rtspersonarol_det` (
  `IdPersonaRol` int(11) NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdPersona_deb` int(11) DEFAULT NULL,
  `IdRol` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rtspersonarol_det`
--

INSERT INTO `rtspersonarol_det` (`IdPersonaRol`, `Estado`, `IdPersona_deb`, `IdRol`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2),
(3, 1, 1, 3),
(4, 0, 2, 1),
(5, 1, 2, 2),
(6, 1, 2, 3),
(7, 0, 3, 1),
(8, 0, 3, 2),
(9, 1, 3, 3),
(10, 0, 4, 1),
(11, 0, 4, 2),
(12, 1, 4, 3),
(13, 0, 5, 1),
(14, 0, 5, 2),
(15, 0, 5, 3),
(16, 0, 6, 1),
(17, 0, 6, 2),
(18, 1, 6, 3),
(19, 0, 7, 1),
(20, 0, 7, 2),
(21, 0, 7, 3),
(22, 0, 8, 1),
(23, 0, 8, 2),
(24, 1, 8, 3),
(25, 0, 9, 1),
(26, 0, 9, 2),
(27, 1, 9, 3),
(28, 0, 10, 1),
(29, 0, 10, 2),
(30, 0, 10, 3),
(31, 0, 11, 1),
(32, 0, 11, 2),
(33, 0, 11, 3),
(34, 0, 12, 1),
(35, 0, 12, 2),
(36, 0, 12, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtspersona_deb`
--

CREATE TABLE IF NOT EXISTS `rtspersona_deb` (
  `IdPersona` int(11) NOT NULL,
  `Documento` bigint(15) NOT NULL,
  `Nombre` varchar(40) COLLATE utf8_bin NOT NULL,
  `Apellidos` varchar(40) COLLATE utf8_bin NOT NULL,
  `Genero` varchar(2) COLLATE utf8_bin NOT NULL,
  `Correo` varchar(50) COLLATE utf8_bin NOT NULL,
  `DireccionResidencia` varchar(40) COLLATE utf8_bin NOT NULL,
  `Telefono` bigint(10) NOT NULL,
  `Celular` varchar(12) COLLATE utf8_bin NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `FechaIngreso` date NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdEps` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rtspersona_deb`
--

INSERT INTO `rtspersona_deb` (`IdPersona`, `Documento`, `Nombre`, `Apellidos`, `Genero`, `Correo`, `DireccionResidencia`, `Telefono`, `Celular`, `FechaNacimiento`, `FechaIngreso`, `Estado`, `IdEps`) VALUES
(1, 1036956105, 'Esneider ', 'Mejia Ciro ', 'H', 'esneider.m12@gmail.com', 'Calle 88B #67-53', 6064973, '3218074451', '1996-04-02', '2016-02-08', 1, 1),
(2, 1035433509, 'Carlos Alberto', 'Acevedo Vallejo', 'M', 'carlos.acevedo152011@gmail.com', 'Calle 89A #74-27 ', 4414017, '3217090693', '1995-06-06', '2015-10-14', 1, 2),
(3, 1254444874, 'Santiago ', 'Velasquez Montoya ', 'M', 'svelasquez@gmail.com', ' Carrera 25 #21-45', 2144455, '3125441122', '1997-10-31', '2016-02-08', 1, 1),
(4, 1036543123, 'Yeison Alexander', 'Diaz Gallo   ', 'H', 'yeison1325@gmail.com ', ' Calle 91# 69-17', 4416364, '3125669888', '1995-12-06', '2016-02-08', 1, 2),
(5, 12544221111, 'Jose Esneider', 'Mejia Ciro', 'H', 'esneidermanss@gmail.com', 'Carrera 45 # 45-98', 2571478, '3125441122', '1996-04-02', '2016-07-15', 0, 1),
(6, 2354411111, 'Maryely', 'Gonzales Garcia', 'M', 'aaaa@aaa.com', 'Calle 57 #14-23', 3215422, '2114455541', '2016-02-05', '2016-11-15', 1, 1),
(7, 32541125541, 'Camila Rogelia', 'Artrozis Meridos', 'M', 'estosirve@gmail.com', 'Calle 89D #56-87', 3125441, '3145774444', '1990-02-08', '2016-02-16', 1, 3),
(8, 1032112144, 'Miguel', 'Ansermo Pancracio', 'H', 'pancramiguel@gmail.com', 'Carrera 35 #45-12', 2114455, '3214511122', '2016-03-23', '2016-05-18', 1, 1),
(9, 1023541122, 'Arturo Ramiro', 'Hernandez Ramirez', 'H', 'arturra@gmail.com', 'Calle 25 # 45-65', 3652211, '3218045522', '1999-02-04', '2016-03-21', 1, 3),
(10, 96020417883, 'Erica', 'Londoño Prieto', 'M', 'erikayul@hotmail.com', 'carrera 25 # 58- 69', 3215411, '', '2000-02-02', '2016-03-22', 0, 2),
(11, 10326511122, 'Julian Jose', 'Jaramillo Velez', 'H', 'JosedeJesus@gmail.com', 'Carrera 12 # 12-14', 6321111, '3215412233', '1996-06-06', '2016-04-10', 0, 3),
(12, 24234234243, 'qeqweqweqwe', 'qweqweqwe', 'H', 'qweqw@gmail.com', 'qweqweqwe', 31233333, '312331233333', '1999-06-09', '2016-04-10', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsplanclase_deb`
--

CREATE TABLE IF NOT EXISTS `rtsplanclase_deb` (
  `IdPlanClase` int(11) NOT NULL,
  `FechaInicio` date NOT NULL,
  `DiasRestantes` int(11) NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdPersonaRol_det` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rtsplanclase_deb`
--

INSERT INTO `rtsplanclase_deb` (`IdPlanClase`, `FechaInicio`, `DiasRestantes`, `Estado`, `IdPersonaRol_det`) VALUES
(1, '2016-01-06', 24, 1, 3),
(2, '2016-02-03', 24, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsresponsablejugador_det`
--

CREATE TABLE IF NOT EXISTS `rtsresponsablejugador_det` (
  `IdResponsableJugador` int(11) NOT NULL,
  `Parentesco` varchar(20) NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdPersonaRol_det` int(11) DEFAULT NULL,
  `IdPersona_deb` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rtsresponsablejugador_det`
--

INSERT INTO `rtsresponsablejugador_det` (`IdResponsableJugador`, `Parentesco`, `Estado`, `IdPersonaRol_det`, `IdPersona_deb`) VALUES
(1, 'Hermano', 1, 6, 1),
(2, 'Primo', 1, 6, 3),
(3, 'Madre', 1, 18, 7),
(4, 'Padre', 1, 18, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsresset_deb`
--

CREATE TABLE IF NOT EXISTS `rtsresset_deb` (
  `IdResset` int(11) NOT NULL,
  `Token` varchar(255) COLLATE utf8_bin NOT NULL,
  `FechaGenerada` date NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdLogin_deb` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rtsresset_deb`
--

INSERT INTO `rtsresset_deb` (`IdResset`, `Token`, `FechaGenerada`, `Estado`, `IdLogin_deb`) VALUES
(2, '3MYJBSDY3L41C1SKBKGQY5Q8IAOCWXYQEHKMX05SSYUCS853CE998CPIVKL201IP38KLX4BGT6XJMBYJQ2FOXE1NLQVPK2GK5WXF94V179DLUA2UGN.YZBSO', '2016-04-28', 0, 1),
(3, 'XKNFCAP84ETI3WKZL73TFCZQ.SA.3GNB3U4WUWCGO4D7FHUWGESPLXUD7F243Z3OOZ08PEEJLQCS4YGOQHUH5C1WTZ74IDXXMZ9GYRTHV6P779HCCF942NOA', '2016-05-01', 0, 1),
(4, 'TK8MC4QGBC4Q2MKNFZLXRUARW7AW5JOKET0F.HGSSJJA2FD6Q4K6346I0CVWUAOIEY641QJZMMAPG4KLE6XBTAG4JDTRXY0DRXQQGT.0TLF.7P3VG4NCXB4N', '2016-05-01', 0, 1),
(5, '21KG488F1B7ALL.2YXHEVN7CIM4JO5P1J4WGTW6VP8JWZKELUPSLZZ3ZM7DBIT1RUL3UCW.O8JPV8XOIKUX6YNVZL7HI7VAU0F6LR9PVN7R7DNVS6CY4TQHC', '2016-05-01', 0, 2),
(6, 'YLFI439UCL1FVGXGLOFNTRP7ENCXQUEXL8I.BDRBU6QME5I4X9PKPYE4L76JYH61LRZCWIMNPORPBSGPMQBCY0GX4NF2J0B1.5SLUIVVY16NL8T4P1C0KZWK', '2016-05-18', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsrol`
--

CREATE TABLE IF NOT EXISTS `rtsrol` (
  `IdRol` int(11) NOT NULL,
  `NombreRol` varchar(25) COLLATE utf8_bin NOT NULL,
  `Estado` tinyint(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rtsrol`
--

INSERT INTO `rtsrol` (`IdRol`, `NombreRol`, `Estado`) VALUES
(1, 'Administrador', 1),
(2, 'Instructor', 1),
(3, 'Jugador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtstorneo`
--

CREATE TABLE IF NOT EXISTS `rtstorneo` (
  `IdTorneo` int(11) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaFinal` date NOT NULL,
  `NombreTorneo` varchar(45) COLLATE utf8_bin NOT NULL,
  `Estado` tinyint(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rtstorneo`
--

INSERT INTO `rtstorneo` (`IdTorneo`, `FechaInicio`, `FechaFinal`, `NombreTorneo`, `Estado`) VALUES
(1, '2016-01-01', '2016-12-01', 'Torneo 2016', 1),
(2, '2017-01-01', '2017-12-31', 'Torneo 2017', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rtscategoria`
--
ALTER TABLE `rtscategoria`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `rtsclasejugador_det`
--
ALTER TABLE `rtsclasejugador_det`
  ADD PRIMARY KEY (`IdClasejugador`),
  ADD KEY `fkcl` (`IdClase_deb`),
  ADD KEY `fkplacla` (`IdPlanClase_deb`);

--
-- Indices de la tabla `rtsclase_deb`
--
ALTER TABLE `rtsclase_deb`
  ADD PRIMARY KEY (`IdClase`),
  ADD KEY `fkins` (`IdPersonaRol_det`);

--
-- Indices de la tabla `rtscuadro_deb`
--
ALTER TABLE `rtscuadro_deb`
  ADD PRIMARY KEY (`IdCuadro`),
  ADD KEY `fketp` (`IdEtapa_deb`);

--
-- Indices de la tabla `rtseps`
--
ALTER TABLE `rtseps`
  ADD PRIMARY KEY (`IdEps`);

--
-- Indices de la tabla `rtsetapajugador_det`
--
ALTER TABLE `rtsetapajugador_det`
  ADD PRIMARY KEY (`IdEtapaJugador`),
  ADD KEY `fkEta` (`IdEtapa_deb`),
  ADD KEY `fkj` (`IdPersonaRol_det`),
  ADD KEY `fkcate` (`IdCategoria`);

--
-- Indices de la tabla `rtsetapa_deb`
--
ALTER TABLE `rtsetapa_deb`
  ADD PRIMARY KEY (`IdEtapa`),
  ADD KEY `fktor` (`IdTorneo`);

--
-- Indices de la tabla `rtsjugadorcuadro_det`
--
ALTER TABLE `rtsjugadorcuadro_det`
  ADD PRIMARY KEY (`IdJugadorCuadro`),
  ADD KEY `fketapa` (`IdEtapaJugador_det`),
  ADD KEY `fkcuadro` (`IdCuadro_deb`);

--
-- Indices de la tabla `rtslogin_deb`
--
ALTER TABLE `rtslogin_deb`
  ADD PRIMARY KEY (`IdLogin`),
  ADD KEY `fkpersorol` (`IdPersonaRol_det`);

--
-- Indices de la tabla `rtsmaterial`
--
ALTER TABLE `rtsmaterial`
  ADD PRIMARY KEY (`IdMaterial`);

--
-- Indices de la tabla `rtsmaterialclase_det`
--
ALTER TABLE `rtsmaterialclase_det`
  ADD PRIMARY KEY (`IdMaterialClase`),
  ADD KEY `fkcla` (`IdClase_deb`),
  ADD KEY `fkmaterial` (`IdMaterial`);

--
-- Indices de la tabla `rtspartidotennis_deb`
--
ALTER TABLE `rtspartidotennis_deb`
  ADD PRIMARY KEY (`IdPartidotennis`),
  ADD KEY `IdJugadorCuadro_detJug1` (`IdJugadorCuadro_detJug1`),
  ADD KEY `IdJugadorCuadro_detJug2` (`IdJugadorCuadro_detJug2`);

--
-- Indices de la tabla `rtspersonarol_det`
--
ALTER TABLE `rtspersonarol_det`
  ADD PRIMARY KEY (`IdPersonaRol`),
  ADD KEY `fkPer` (`IdPersona_deb`),
  ADD KEY `fkrol` (`IdRol`);

--
-- Indices de la tabla `rtspersona_deb`
--
ALTER TABLE `rtspersona_deb`
  ADD PRIMARY KEY (`IdPersona`),
  ADD UNIQUE KEY `Documento` (`Documento`),
  ADD UNIQUE KEY `Correo` (`Correo`),
  ADD KEY `fkEps` (`IdEps`);

--
-- Indices de la tabla `rtsplanclase_deb`
--
ALTER TABLE `rtsplanclase_deb`
  ADD PRIMARY KEY (`IdPlanClase`),
  ADD KEY `fkJug` (`IdPersonaRol_det`);

--
-- Indices de la tabla `rtsresponsablejugador_det`
--
ALTER TABLE `rtsresponsablejugador_det`
  ADD PRIMARY KEY (`IdResponsableJugador`),
  ADD KEY `fkpersona` (`IdPersonaRol_det`),
  ADD KEY `IdPersona_deb` (`IdPersona_deb`);

--
-- Indices de la tabla `rtsresset_deb`
--
ALTER TABLE `rtsresset_deb`
  ADD PRIMARY KEY (`IdResset`),
  ADD UNIQUE KEY `Token` (`Token`),
  ADD KEY `fklo` (`IdLogin_deb`);

--
-- Indices de la tabla `rtsrol`
--
ALTER TABLE `rtsrol`
  ADD PRIMARY KEY (`IdRol`);

--
-- Indices de la tabla `rtstorneo`
--
ALTER TABLE `rtstorneo`
  ADD PRIMARY KEY (`IdTorneo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rtscategoria`
--
ALTER TABLE `rtscategoria`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `rtsclasejugador_det`
--
ALTER TABLE `rtsclasejugador_det`
  MODIFY `IdClasejugador` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rtsclase_deb`
--
ALTER TABLE `rtsclase_deb`
  MODIFY `IdClase` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `rtscuadro_deb`
--
ALTER TABLE `rtscuadro_deb`
  MODIFY `IdCuadro` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rtseps`
--
ALTER TABLE `rtseps`
  MODIFY `IdEps` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `rtsetapajugador_det`
--
ALTER TABLE `rtsetapajugador_det`
  MODIFY `IdEtapaJugador` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `rtsetapa_deb`
--
ALTER TABLE `rtsetapa_deb`
  MODIFY `IdEtapa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `rtsjugadorcuadro_det`
--
ALTER TABLE `rtsjugadorcuadro_det`
  MODIFY `IdJugadorCuadro` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rtslogin_deb`
--
ALTER TABLE `rtslogin_deb`
  MODIFY `IdLogin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rtsmaterial`
--
ALTER TABLE `rtsmaterial`
  MODIFY `IdMaterial` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `rtsmaterialclase_det`
--
ALTER TABLE `rtsmaterialclase_det`
  MODIFY `IdMaterialClase` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rtspartidotennis_deb`
--
ALTER TABLE `rtspartidotennis_deb`
  MODIFY `IdPartidotennis` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rtspersonarol_det`
--
ALTER TABLE `rtspersonarol_det`
  MODIFY `IdPersonaRol` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `rtspersona_deb`
--
ALTER TABLE `rtspersona_deb`
  MODIFY `IdPersona` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `rtsplanclase_deb`
--
ALTER TABLE `rtsplanclase_deb`
  MODIFY `IdPlanClase` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rtsresponsablejugador_det`
--
ALTER TABLE `rtsresponsablejugador_det`
  MODIFY `IdResponsableJugador` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `rtsresset_deb`
--
ALTER TABLE `rtsresset_deb`
  MODIFY `IdResset` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `rtsrol`
--
ALTER TABLE `rtsrol`
  MODIFY `IdRol` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `rtstorneo`
--
ALTER TABLE `rtstorneo`
  MODIFY `IdTorneo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `rtsclasejugador_det`
--
ALTER TABLE `rtsclasejugador_det`
  ADD CONSTRAINT `fkcl` FOREIGN KEY (`IdClase_deb`) REFERENCES `rtsclase_deb` (`IdClase`),
  ADD CONSTRAINT `fkplacla` FOREIGN KEY (`IdPlanClase_deb`) REFERENCES `rtsplanclase_deb` (`IdPlanClase`);

--
-- Filtros para la tabla `rtsclase_deb`
--
ALTER TABLE `rtsclase_deb`
  ADD CONSTRAINT `fkins` FOREIGN KEY (`IdPersonaRol_det`) REFERENCES `rtspersonarol_det` (`IdPersonaRol`);

--
-- Filtros para la tabla `rtscuadro_deb`
--
ALTER TABLE `rtscuadro_deb`
  ADD CONSTRAINT `fketp` FOREIGN KEY (`IdEtapa_deb`) REFERENCES `rtsetapa_deb` (`IdEtapa`);

--
-- Filtros para la tabla `rtsetapajugador_det`
--
ALTER TABLE `rtsetapajugador_det`
  ADD CONSTRAINT `fkEta` FOREIGN KEY (`IdEtapa_deb`) REFERENCES `rtsetapa_deb` (`IdEtapa`),
  ADD CONSTRAINT `fkcate` FOREIGN KEY (`IdCategoria`) REFERENCES `rtscategoria` (`IdCategoria`),
  ADD CONSTRAINT `fkj` FOREIGN KEY (`IdPersonaRol_det`) REFERENCES `rtspersonarol_det` (`IdPersonaRol`);

--
-- Filtros para la tabla `rtsetapa_deb`
--
ALTER TABLE `rtsetapa_deb`
  ADD CONSTRAINT `fktor` FOREIGN KEY (`IdTorneo`) REFERENCES `rtstorneo` (`IdTorneo`);

--
-- Filtros para la tabla `rtsjugadorcuadro_det`
--
ALTER TABLE `rtsjugadorcuadro_det`
  ADD CONSTRAINT `fkcuadro` FOREIGN KEY (`IdCuadro_deb`) REFERENCES `rtscuadro_deb` (`IdCuadro`),
  ADD CONSTRAINT `fketapa` FOREIGN KEY (`IdEtapaJugador_det`) REFERENCES `rtsetapajugador_det` (`IdEtapaJugador`);

--
-- Filtros para la tabla `rtslogin_deb`
--
ALTER TABLE `rtslogin_deb`
  ADD CONSTRAINT `fkpersorol` FOREIGN KEY (`IdPersonaRol_det`) REFERENCES `rtspersonarol_det` (`IdPersonaRol`);

--
-- Filtros para la tabla `rtsmaterialclase_det`
--
ALTER TABLE `rtsmaterialclase_det`
  ADD CONSTRAINT `fkcla` FOREIGN KEY (`IdClase_deb`) REFERENCES `rtsclase_deb` (`IdClase`),
  ADD CONSTRAINT `fkmaterial` FOREIGN KEY (`IdMaterial`) REFERENCES `rtsmaterial` (`IdMaterial`);

--
-- Filtros para la tabla `rtspartidotennis_deb`
--
ALTER TABLE `rtspartidotennis_deb`
  ADD CONSTRAINT `rtspartidotennis_deb_ibfk_1` FOREIGN KEY (`IdJugadorCuadro_detJug1`) REFERENCES `rtsjugadorcuadro_det` (`IdJugadorCuadro`),
  ADD CONSTRAINT `rtspartidotennis_deb_ibfk_2` FOREIGN KEY (`IdJugadorCuadro_detJug2`) REFERENCES `rtsjugadorcuadro_det` (`IdJugadorCuadro`);

--
-- Filtros para la tabla `rtspersonarol_det`
--
ALTER TABLE `rtspersonarol_det`
  ADD CONSTRAINT `fkPer` FOREIGN KEY (`IdPersona_deb`) REFERENCES `rtspersona_deb` (`IdPersona`),
  ADD CONSTRAINT `fkrol` FOREIGN KEY (`IdRol`) REFERENCES `rtsrol` (`IdRol`);

--
-- Filtros para la tabla `rtspersona_deb`
--
ALTER TABLE `rtspersona_deb`
  ADD CONSTRAINT `fkEps` FOREIGN KEY (`IdEps`) REFERENCES `rtseps` (`IdEps`);

--
-- Filtros para la tabla `rtsplanclase_deb`
--
ALTER TABLE `rtsplanclase_deb`
  ADD CONSTRAINT `fkJug` FOREIGN KEY (`IdPersonaRol_det`) REFERENCES `rtspersonarol_det` (`IdPersonaRol`);

--
-- Filtros para la tabla `rtsresponsablejugador_det`
--
ALTER TABLE `rtsresponsablejugador_det`
  ADD CONSTRAINT `fkpersona` FOREIGN KEY (`IdPersonaRol_det`) REFERENCES `rtspersonarol_det` (`IdPersonaRol`),
  ADD CONSTRAINT `rtsresponsablejugador_det_ibfk_1` FOREIGN KEY (`IdPersona_deb`) REFERENCES `rtspersona_deb` (`IdPersona`);

--
-- Filtros para la tabla `rtsresset_deb`
--
ALTER TABLE `rtsresset_deb`
  ADD CONSTRAINT `fklo` FOREIGN KEY (`IdLogin_deb`) REFERENCES `rtslogin_deb` (`IdLogin`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
