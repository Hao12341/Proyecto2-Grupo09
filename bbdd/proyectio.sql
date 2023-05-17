-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2023 a las 17:23:25
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `huertos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huertos`
--

CREATE TABLE `huertos` (
  `IdHuerto` int(11) NOT NULL,
  `UsuarioPropietario` int(11) NOT NULL,
  `Localización` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `IdIncidencias` int(11) NOT NULL,
  `TipoIncidencia` varchar(45) NOT NULL,
  `NivelGravedad` int(11) NOT NULL,
  `Descripción` varchar(45) NOT NULL,
  `NumSensor` int(11) NOT NULL,
  `NumSonda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalaciones`
--

CREATE TABLE `instalaciones` (
  `IdHuerto` int(11) NOT NULL,
  `IdSensor` int(11) NOT NULL,
  `FechaInicio` date DEFAULT NULL,
  `FechaFin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivelgravedad`
--

CREATE TABLE `nivelgravedad` (
  `IdNivelGravedad` int(11) NOT NULL,
  `Valor` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `IdRol` int(11) NOT NULL,
  `Rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`IdRol`, `Rol`) VALUES
(1, 'Administrador'),
(2, 'Comercial'),
(3, 'Tecnico'),
(4, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensores`
--

CREATE TABLE `sensores` (
  `IdSensor` int(11) NOT NULL,
  `NumSonda` int(11) NOT NULL,
  `TipoSensor` int(11) NOT NULL,
  `Medida` decimal(10,2) NOT NULL,
  `Unidades` int(11) NOT NULL,
  `Estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sondas`
--

CREATE TABLE `sondas` (
  `IdSonda` int(11) NOT NULL,
  `NumHuerto` int(11) NOT NULL,
  `Localización` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipossensores`
--

CREATE TABLE `tipossensores` (
  `IdTipoSensor` int(11) NOT NULL,
  `TipoSensor` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE `unidades` (
  `IdUnidades` int(11) NOT NULL,
  `Unidad` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `Rol` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Contraseña` varchar(45) NOT NULL,
  `email` varchar(75) NOT NULL,
  `Dirección` varchar(75) NOT NULL,
  `UserName` varchar(75) NOT NULL,
  `Teléfono` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `Rol`, `Nombre`, `Contraseña`, `email`, `Dirección`, `UserName`, `Teléfono`) VALUES
(1, 1, 'Javi', '1234', 'j@gmail.com', 'avenida del suspenso Nº69', 'jrupmir', 666666666),
(2, 2, 'Alex', '1234', 'a@gamil', 'avenida del suspenso Nº69', 'alescr', 666666666),
(3, 3, 'Hugo', '1234', 'h@gamil.com', 'avenida del suspenso Nº69', 'hbeld', 666666666),
(4, 4, 'Cesar', '1234', 'c@gmail.com', 'avenida del suspenso Nº69', 'chersan', 666666666);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `huertos`
--
ALTER TABLE `huertos`
  ADD PRIMARY KEY (`IdHuerto`,`UsuarioPropietario`),
  ADD KEY `UsuarioPropietario` (`UsuarioPropietario`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`IdIncidencias`,`NivelGravedad`,`NumSensor`,`NumSonda`),
  ADD KEY `NumSensor` (`NumSensor`),
  ADD KEY `NumSonda` (`NumSonda`);

--
-- Indices de la tabla `instalaciones`
--
ALTER TABLE `instalaciones`
  ADD PRIMARY KEY (`IdSensor`,`IdHuerto`),
  ADD KEY `IdHuerto` (`IdHuerto`);

--
-- Indices de la tabla `nivelgravedad`
--
ALTER TABLE `nivelgravedad`
  ADD PRIMARY KEY (`IdNivelGravedad`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`IdRol`);

--
-- Indices de la tabla `sensores`
--
ALTER TABLE `sensores`
  ADD PRIMARY KEY (`IdSensor`,`NumSonda`,`Unidades`),
  ADD UNIQUE KEY `TipoSensor` (`TipoSensor`),
  ADD KEY `NumSonda` (`NumSonda`),
  ADD KEY `Unidades` (`Unidades`);

--
-- Indices de la tabla `sondas`
--
ALTER TABLE `sondas`
  ADD PRIMARY KEY (`IdSonda`,`NumHuerto`),
  ADD KEY `NumHuerto` (`NumHuerto`);

--
-- Indices de la tabla `tipossensores`
--
ALTER TABLE `tipossensores`
  ADD PRIMARY KEY (`IdTipoSensor`,`TipoSensor`);

--
-- Indices de la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`IdUnidades`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`,`Rol`),
  ADD KEY `Rol` (`Rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `huertos`
--
ALTER TABLE `huertos`
  MODIFY `IdHuerto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `IdIncidencias` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nivelgravedad`
--
ALTER TABLE `nivelgravedad`
  MODIFY `IdNivelGravedad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `IdRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sensores`
--
ALTER TABLE `sensores`
  MODIFY `IdSensor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sondas`
--
ALTER TABLE `sondas`
  MODIFY `IdSonda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipossensores`
--
ALTER TABLE `tipossensores`
  MODIFY `IdTipoSensor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidades`
--
ALTER TABLE `unidades`
  MODIFY `IdUnidades` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `huertos`
--
ALTER TABLE `huertos`
  ADD CONSTRAINT `huertos_ibfk_1` FOREIGN KEY (`UsuarioPropietario`) REFERENCES `usuarios` (`IdUsuario`);

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `incidencias_ibfk_1` FOREIGN KEY (`NumSensor`) REFERENCES `sensores` (`IdSensor`),
  ADD CONSTRAINT `incidencias_ibfk_2` FOREIGN KEY (`NumSonda`) REFERENCES `sensores` (`NumSonda`);

--
-- Filtros para la tabla `instalaciones`
--
ALTER TABLE `instalaciones`
  ADD CONSTRAINT `instalaciones_ibfk_1` FOREIGN KEY (`IdHuerto`) REFERENCES `huertos` (`IdHuerto`);

--
-- Filtros para la tabla `nivelgravedad`
--
ALTER TABLE `nivelgravedad`
  ADD CONSTRAINT `nivelgravedad_ibfk_1` FOREIGN KEY (`IdNivelGravedad`) REFERENCES `incidencias` (`IdIncidencias`);

--
-- Filtros para la tabla `sensores`
--
ALTER TABLE `sensores`
  ADD CONSTRAINT `sensores_ibfk_1` FOREIGN KEY (`NumSonda`) REFERENCES `sondas` (`IdSonda`),
  ADD CONSTRAINT `sensores_ibfk_2` FOREIGN KEY (`Unidades`) REFERENCES `unidades` (`IdUnidades`),
  ADD CONSTRAINT `sensores_ibfk_3` FOREIGN KEY (`IdSensor`) REFERENCES `instalaciones` (`IdSensor`),
  ADD CONSTRAINT `sensores_ibfk_4` FOREIGN KEY (`TipoSensor`) REFERENCES `tipossensores` (`IdTipoSensor`);

--
-- Filtros para la tabla `sondas`
--
ALTER TABLE `sondas`
  ADD CONSTRAINT `sondas_ibfk_1` FOREIGN KEY (`NumHuerto`) REFERENCES `huertos` (`IdHuerto`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Rol`) REFERENCES `roles` (`IdRol`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
