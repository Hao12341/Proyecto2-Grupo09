/*
-- Query: SELECT * FROM gti09.usuarios
LIMIT 0, 1000

-- Date: 2023-05-16 16:56
*/
INSERT INTO `usuarios` (`IdUsuario`,`Rol`,`Nombre`,`Contraseña`,`email`,`Dirección`,`UserName`,`Teléfono`) VALUES (1,1,'Javier','1234','javierruperez13@gamil.com','Avenida del Suspenso Nº69','jrupmir',666666666);
INSERT INTO `usuarios` (`IdUsuario`,`Rol`,`Nombre`,`Contraseña`,`email`,`Dirección`,`UserName`,`Teléfono`) VALUES (2,2,'Alex','1234','alex@gmail.com','Avenida del suspenso Nº69','alesc',666666666);
INSERT INTO `usuarios` (`IdUsuario`,`Rol`,`Nombre`,`Contraseña`,`email`,`Dirección`,`UserName`,`Teléfono`) VALUES (3,3,'Alberto','1234','alberto@gmail.com','Avenida del suspenso Nº69','apermo',666666666);
INSERT INTO `usuarios` (`IdUsuario`,`Rol`,`Nombre`,`Contraseña`,`email`,`Dirección`,`UserName`,`Teléfono`) VALUES (4,4,'Cesar','1234','cesar@gmail.com','Avenida del suspenso Nº69','chersan',666666666);
INSERT INTO `usuarios` (`IdUsuario`,`Rol`,`Nombre`,`Contraseña`,`email`,`Dirección`,`UserName`,`Teléfono`) VALUES (5,1,'Hugo','1234','hugo@gmail.com','Avenida del suspenso Nº69','hbelda',666666666);
INSERT INTO `usuarios` (`IdUsuario`,`Rol`,`Nombre`,`Contraseña`,`email`,`Dirección`,`UserName`,`Teléfono`) VALUES (6,4,'Lucia','1234','lucia@gmail.com','Avenida del suspenso Nº69','lpreseg',666666666);
INSERT INTO `usuarios` (`IdUsuario`,`Rol`,`Nombre`,`Contraseña`,`email`,`Dirección`,`UserName`,`Teléfono`) VALUES (7,4,'Oscar','1234','oscar@gmail.com','Avenida del suspenso Nº69','oshao',666666666);


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `huertos`
--

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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`,`Rol`),
  ADD KEY `Rol` (`Rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Rol`) REFERENCES `roles` (`IdRol`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
