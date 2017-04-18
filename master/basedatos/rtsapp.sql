-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-03-2017 a las 04:17:51
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

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
-- Estructura de tabla para la tabla `rtsasistencia_deb`
--

CREATE TABLE `rtsasistencia_deb` (
  `IdAsistencia` int(11) NOT NULL,
  `IdClase_deb` int(11) DEFAULT NULL,
  `FechaRegistro` date DEFAULT NULL,
  `FechaSistema` date DEFAULT NULL,
  `Estado` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rtsasistencia_deb`
--

INSERT INTO `rtsasistencia_deb` (`IdAsistencia`, `IdClase_deb`, `FechaRegistro`, `FechaSistema`, `Estado`) VALUES
(1, 1, '2016-11-23', '2016-11-23', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsasistencia_jugador_det`
--

CREATE TABLE `rtsasistencia_jugador_det` (
  `IdAsistenciaJugador` int(11) NOT NULL,
  `IdAsistencia` int(11) DEFAULT NULL,
  `IdPersonaRol_det` int(11) DEFAULT NULL,
  `Asistencia` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rtsasistencia_jugador_det`
--

INSERT INTO `rtsasistencia_jugador_det` (`IdAsistenciaJugador`, `IdAsistencia`, `IdPersonaRol_det`, `Asistencia`) VALUES
(1, 1, 1, b'1111111111111111111111111111111'),
(2, 1, 2, b'1111111111111111111111111111111');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsclasejugador_det`
--

CREATE TABLE `rtsclasejugador_det` (
  `IdClasejugador` int(11) NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdClase_deb` int(11) DEFAULT NULL,
  `IdPlanClase_deb` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rtsclasejugador_det`
--

INSERT INTO `rtsclasejugador_det` (`IdClasejugador`, `Estado`, `IdClase_deb`, `IdPlanClase_deb`) VALUES
(3, 1, 1, 8),
(5, 1, 1, 2),
(7, 1, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsclase_deb`
--

CREATE TABLE `rtsclase_deb` (
  `IdClase` int(11) NOT NULL,
  `NombreClase` varchar(50) COLLATE utf8_bin NOT NULL,
  `HoraInicio` varchar(20) COLLATE utf8_bin NOT NULL,
  `HoraFinal` varchar(20) COLLATE utf8_bin NOT NULL,
  `Dia` varchar(20) COLLATE utf8_bin NOT NULL,
  `CantidadJugadores` int(2) NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdPersonaRol_det` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rtsclase_deb`
--

INSERT INTO `rtsclase_deb` (`IdClase`, `NombreClase`, `HoraInicio`, `HoraFinal`, `Dia`, `CantidadJugadores`, `Estado`, `IdPersonaRol_det`) VALUES
(1, 'Clase 1', '16:29', '17:15', 'Lunes', 0, 1, 2),
(2, 'clase tres', '04:30', '05:16', 'Miercoles', 0, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtseps`
--

CREATE TABLE `rtseps` (
  `IdEps` int(11) NOT NULL,
  `NombreEps` varchar(40) COLLATE utf8_bin NOT NULL,
  `Telefono` varchar(15) COLLATE utf8_bin NOT NULL,
  `Estado` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rtseps`
--

INSERT INTO `rtseps` (`IdEps`, `NombreEps`, `Telefono`, `Estado`) VALUES
(1, 'No aplica', '-', 1),
(2, 'sura', '31825140', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtslogin_deb`
--

CREATE TABLE `rtslogin_deb` (
  `IdLogin` int(11) NOT NULL,
  `Usuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `Clave` varchar(255) COLLATE utf8_bin NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdPersonaRol` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `IdPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rtslogin_deb`
--

INSERT INTO `rtslogin_deb` (`IdLogin`, `Usuario`, `Clave`, `Estado`, `IdPersonaRol`, `IdPersona`) VALUES
(1, 'root', '827ccb0eea8a706c4c34a16891f84e7b', 1, '1,2,3', 1),
(2, 'neider2', 'b0baee9d279d34fa1dfd71aadb908c3f', 1, '7,8,9', 3),
(3, 'neider', '827ccb0eea8a706c4c34a16891f84e7b', 1, '4,5,6', 2),
(4, 'Asddfvxcl1996', '59d60fe01d78e6a46cf74457d1a64029', 1, '16,17,18', 6),
(5, 'Asdkgflskf1996', '582888aca8cf994217b7c1cd899efba2', 1, '10,11,12', 4),
(6, 'Neidermand', '827ccb0eea8a706c4c34a16891f84e7b', 1, '13,14,15', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsmaterial`
--

CREATE TABLE `rtsmaterial` (
  `IdMaterial` int(11) NOT NULL,
  `DescripcionMaterial` varchar(45) COLLATE utf8_bin NOT NULL,
  `Estado` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rtsmaterial`
--

INSERT INTO `rtsmaterial` (`IdMaterial`, `DescripcionMaterial`, `Estado`) VALUES
(1, 'Raqueta junior', 1),
(2, 'Raqueta pro adulto', 1),
(3, 'Pelotas tenis normal', 1),
(4, 'pelota', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsmaterialclase_det`
--

CREATE TABLE `rtsmaterialclase_det` (
  `IdMaterialClase` int(11) NOT NULL,
  `Cantidad` varchar(5) COLLATE utf8_bin NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdClase_deb` int(11) DEFAULT NULL,
  `IdMaterial` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rtsmaterialclase_det`
--

INSERT INTO `rtsmaterialclase_det` (`IdMaterialClase`, `Cantidad`, `Estado`, `IdClase_deb`, `IdMaterial`) VALUES
(1, '2', 1, 1, 1),
(2, '100', 1, 1, 3),
(3, '20', 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtspersonarol_det`
--

CREATE TABLE `rtspersonarol_det` (
  `IdPersonaRol` int(11) NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdPersona_deb` int(11) DEFAULT NULL,
  `IdRol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rtspersonarol_det`
--

INSERT INTO `rtspersonarol_det` (`IdPersonaRol`, `Estado`, `IdPersona_deb`, `IdRol`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2),
(3, 1, 1, 3),
(4, 0, 2, 1),
(5, 1, 2, 2),
(6, 0, 2, 3),
(7, 0, 3, 1),
(8, 1, 3, 2),
(9, 1, 3, 3),
(10, 0, 4, 1),
(11, 1, 4, 2),
(12, 0, 4, 3),
(13, 0, 5, 1),
(14, 0, 5, 2),
(15, 1, 5, 3),
(16, 0, 6, 1),
(17, 1, 6, 2),
(18, 1, 6, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtspersona_deb`
--

CREATE TABLE `rtspersona_deb` (
  `IdPersona` int(11) NOT NULL,
  `Documento` bigint(15) NOT NULL,
  `Nombre` varchar(40) COLLATE utf8_bin NOT NULL,
  `Apellidos` varchar(40) COLLATE utf8_bin NOT NULL,
  `Genero` varchar(2) COLLATE utf8_bin NOT NULL,
  `Correo` varchar(50) COLLATE utf8_bin NOT NULL,
  `DireccionResidencia` varchar(40) COLLATE utf8_bin NOT NULL,
  `Telefono` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `Celular` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `FechaNacimiento` date NOT NULL,
  `FechaIngreso` date NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdEps` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rtspersona_deb`
--

INSERT INTO `rtspersona_deb` (`IdPersona`, `Documento`, `Nombre`, `Apellidos`, `Genero`, `Correo`, `DireccionResidencia`, `Telefono`, `Celular`, `FechaNacimiento`, `FechaIngreso`, `Estado`, `IdEps`) VALUES
(1, 1000000000, 'Robledo', 'Tenis Club', 'H', 'rackettenisservices@gmail.com', 'dfghh', '', '', '1990-01-01', '2016-09-13', 1, 1),
(2, 1036956105, 'Esneider', 'Mejia Ciro', 'H', 'esneider.m12@gmail.com', 'Calle 88B #67-53', '6064973', '3218074451', '1996-04-02', '2016-09-27', 1, 1),
(3, 1036956106, 'Esneiderman', 'Mejiaa Ciroo', 'H', 'esneider.m13@gmail.com', 'calle 88 b#54-45', '1234567', '', '2011-12-07', '2016-10-28', 1, 1),
(4, 32165498, 'asdkgflsk', 'fosofi', 'H', 'easd@gsmail.com', 'sfsfd', '', '', '1996-04-02', '2016-12-07', 1, 1),
(5, 1017240689, 'luis', 'cardona', 'H', 'luis@gmai', 'cr 45  56-67', '31825146', '', '1996-03-10', '2016-12-07', 1, 1),
(6, 231564, 'asddfvxc', 'lsdfk', 'H', 'asdsad@gmail.com', 'aszxc', '', '', '1996-05-02', '2016-12-13', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsplanclase_deb`
--

CREATE TABLE `rtsplanclase_deb` (
  `IdPlanClase` int(11) NOT NULL,
  `FechaInicio` date NOT NULL,
  `DiasRestantes` int(11) NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdPersonaRol_det` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rtsplanclase_deb`
--

INSERT INTO `rtsplanclase_deb` (`IdPlanClase`, `FechaInicio`, `DiasRestantes`, `Estado`, `IdPersonaRol_det`) VALUES
(2, '2016-11-06', 24, 1, 9),
(8, '2016-11-06', 24, 1, 6),
(11, '2016-11-08', 48, 2, 6),
(12, '2016-12-07', 24, 1, 15),
(13, '2016-12-07', 24, 2, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsresponsablejugador_det`
--

CREATE TABLE `rtsresponsablejugador_det` (
  `IdResponsableJugador` int(11) NOT NULL,
  `Parentesco` varchar(20) NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdPersonaRol_det` int(11) DEFAULT NULL,
  `IdPersona_deb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rtsresponsablejugador_det`
--

INSERT INTO `rtsresponsablejugador_det` (`IdResponsableJugador`, `Parentesco`, `Estado`, `IdPersonaRol_det`, `IdPersona_deb`) VALUES
(1, 'Padre', 1, 6, 2),
(2, 'Abuelo', 1, 15, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsresset_deb`
--

CREATE TABLE `rtsresset_deb` (
  `IdResset` int(11) NOT NULL,
  `Token` varchar(255) COLLATE utf8_bin NOT NULL,
  `FechaGenerada` date NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdLogin_deb` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsrol`
--

CREATE TABLE `rtsrol` (
  `IdRol` int(11) NOT NULL,
  `NombreRol` varchar(25) COLLATE utf8_bin NOT NULL,
  `Estado` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rtsrol`
--

INSERT INTO `rtsrol` (`IdRol`, `NombreRol`, `Estado`) VALUES
(1, 'Administrador', 1),
(2, 'Instructor', 1),
(3, 'Jugador', 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vistajugadores`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vistajugadores` (
`IdPersona` int(11)
,`Documento` bigint(15)
,`Nombre` varchar(40)
,`Apellidos` varchar(40)
,`Genero` varchar(2)
,`Correo` varchar(50)
,`DireccionResidencia` varchar(40)
,`Telefono` varchar(15)
,`Celular` varchar(15)
,`FechaNacimiento` date
,`FechaIngreso` date
,`Estado` tinyint(2)
,`IdEps` int(11)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vistajugadores`
--
DROP TABLE IF EXISTS `vistajugadores`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistajugadores`  AS  select `rtspd1`.`IdPersona` AS `IdPersona`,`rtspd1`.`Documento` AS `Documento`,`rtspd1`.`Nombre` AS `Nombre`,`rtspd1`.`Apellidos` AS `Apellidos`,`rtspd1`.`Genero` AS `Genero`,`rtspd1`.`Correo` AS `Correo`,`rtspd1`.`DireccionResidencia` AS `DireccionResidencia`,`rtspd1`.`Telefono` AS `Telefono`,`rtspd1`.`Celular` AS `Celular`,`rtspd1`.`FechaNacimiento` AS `FechaNacimiento`,`rtspd1`.`FechaIngreso` AS `FechaIngreso`,`rtspd1`.`Estado` AS `Estado`,`rtspd1`.`IdEps` AS `IdEps` from (`rtspersona_deb` `rtspd1` join `rtspersonarol_det` `rtsprd1` on((`rtspd1`.`IdPersona` = `rtsprd1`.`IdPersona_deb`))) where ((`rtsprd1`.`IdRol` = 3) and ((select `rtsprd2`.`Estado` AS `est1` from (`rtspersona_deb` `rtspd2` join `rtspersonarol_det` `rtsprd2` on((`rtspd2`.`IdPersona` = `rtsprd2`.`IdPersona_deb`))) where ((`rtsprd2`.`IdRol` = 2) and (`rtspd2`.`IdPersona` = `rtspd1`.`IdPersona`))) = 0) and ((select `rtsprd3`.`Estado` AS `est2` from (`rtspersona_deb` `rtspd3` join `rtspersonarol_det` `rtsprd3` on((`rtspd3`.`IdPersona` = `rtsprd3`.`IdPersona_deb`))) where ((`rtsprd3`.`IdRol` = 1) and (`rtspd3`.`IdPersona` = `rtspd1`.`IdPersona`))) = 0)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rtsasistencia_deb`
--
ALTER TABLE `rtsasistencia_deb`
  ADD PRIMARY KEY (`IdAsistencia`),
  ADD KEY `fk_clase_asistencia` (`IdClase_deb`);

--
-- Indices de la tabla `rtsasistencia_jugador_det`
--
ALTER TABLE `rtsasistencia_jugador_det`
  ADD PRIMARY KEY (`IdAsistenciaJugador`),
  ADD KEY `fk_asistencia_asistenciajugador` (`IdAsistencia`),
  ADD KEY `fk_jugador_asistenciajugador` (`IdPersonaRol_det`);

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
-- Indices de la tabla `rtseps`
--
ALTER TABLE `rtseps`
  ADD PRIMARY KEY (`IdEps`);

--
-- Indices de la tabla `rtslogin_deb`
--
ALTER TABLE `rtslogin_deb`
  ADD PRIMARY KEY (`IdLogin`),
  ADD KEY `fkpersorol` (`IdPersonaRol`);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rtsasistencia_deb`
--
ALTER TABLE `rtsasistencia_deb`
  MODIFY `IdAsistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `rtsasistencia_jugador_det`
--
ALTER TABLE `rtsasistencia_jugador_det`
  MODIFY `IdAsistenciaJugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rtsclasejugador_det`
--
ALTER TABLE `rtsclasejugador_det`
  MODIFY `IdClasejugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `rtsclase_deb`
--
ALTER TABLE `rtsclase_deb`
  MODIFY `IdClase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rtseps`
--
ALTER TABLE `rtseps`
  MODIFY `IdEps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rtslogin_deb`
--
ALTER TABLE `rtslogin_deb`
  MODIFY `IdLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `rtsmaterial`
--
ALTER TABLE `rtsmaterial`
  MODIFY `IdMaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `rtsmaterialclase_det`
--
ALTER TABLE `rtsmaterialclase_det`
  MODIFY `IdMaterialClase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `rtspersonarol_det`
--
ALTER TABLE `rtspersonarol_det`
  MODIFY `IdPersonaRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `rtspersona_deb`
--
ALTER TABLE `rtspersona_deb`
  MODIFY `IdPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `rtsplanclase_deb`
--
ALTER TABLE `rtsplanclase_deb`
  MODIFY `IdPlanClase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `rtsresponsablejugador_det`
--
ALTER TABLE `rtsresponsablejugador_det`
  MODIFY `IdResponsableJugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rtsresset_deb`
--
ALTER TABLE `rtsresset_deb`
  MODIFY `IdResset` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rtsrol`
--
ALTER TABLE `rtsrol`
  MODIFY `IdRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `rtsasistencia_deb`
--
ALTER TABLE `rtsasistencia_deb`
  ADD CONSTRAINT `fk_clase_asistencia` FOREIGN KEY (`IdClase_deb`) REFERENCES `rtsclase_deb` (`IdClase`);

--
-- Filtros para la tabla `rtsasistencia_jugador_det`
--
ALTER TABLE `rtsasistencia_jugador_det`
  ADD CONSTRAINT `fk_asistencia_asistenciajugador` FOREIGN KEY (`IdAsistencia`) REFERENCES `rtsasistencia_deb` (`IdAsistencia`),
  ADD CONSTRAINT `fk_jugador_asistenciajugador` FOREIGN KEY (`IdPersonaRol_det`) REFERENCES `rtspersonarol_det` (`IdPersonaRol`);

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
-- Filtros para la tabla `rtsmaterialclase_det`
--
ALTER TABLE `rtsmaterialclase_det`
  ADD CONSTRAINT `fkcla` FOREIGN KEY (`IdClase_deb`) REFERENCES `rtsclase_deb` (`IdClase`),
  ADD CONSTRAINT `fkmaterial` FOREIGN KEY (`IdMaterial`) REFERENCES `rtsmaterial` (`IdMaterial`);

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
