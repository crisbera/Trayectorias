-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2019 a las 04:36:18
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `trayectorias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cables`
--

CREATE TABLE IF NOT EXISTS `cables` (
`id` int(11) NOT NULL,
  `cables_tipos_id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `diametro_exterior` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cables`
--

INSERT INTO `cables` (`id`, `cables_tipos_id`, `nombre`, `diametro_exterior`) VALUES
(1, 2, 'Categoria 5e', 4.5),
(2, 2, 'Categoria 6', 5.8),
(3, 2, 'Categoria 6A', 7.4),
(4, 3, 'RG-6', 8.4),
(5, 3, 'RG-58', 5),
(6, 3, 'RG-59', 6.1),
(7, 1, 'Calibre 6', 4.115),
(8, 1, 'Calibre 8', 3.264),
(9, 2, 'Categoria 6', 6.8),
(10, 4, 'Monomodo', 23.45),
(11, 4, 'Multimodo', 32.65),
(12, 1, 'Calibre 14', 1.628);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cables_tipos`
--

CREATE TABLE IF NOT EXISTS `cables_tipos` (
`id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cables_tipos`
--

INSERT INTO `cables_tipos` (`id`, `nombre`) VALUES
(1, 'Eléctrico'),
(2, 'Par trenzado'),
(3, 'Coaxial'),
(4, 'Fibra óptica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canaletas`
--

CREATE TABLE IF NOT EXISTS `canaletas` (
`id` int(11) NOT NULL,
  `canaletas_tipos_id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canaletas_tipos`
--

CREATE TABLE IF NOT EXISTS `canaletas_tipos` (
`id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `charolas`
--

CREATE TABLE IF NOT EXISTS `charolas` (
`id` int(11) NOT NULL,
  `charolas_tipos_id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `peralte` double DEFAULT NULL,
  `ancho` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `charolas_tipos`
--

CREATE TABLE IF NOT EXISTS `charolas_tipos` (
`id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `charolas_tipos`
--

INSERT INTO `charolas_tipos` (`id`, `nombre`) VALUES
(1, 'Tipo escalera'),
(2, 'Canal ventilado'),
(3, 'Fondo ventilado'),
(4, 'Fondo solido'),
(5, 'Tipo malla'),
(6, 'Otras estructuras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE IF NOT EXISTS `proyectos` (
`id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `contenido` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `usuario_id`, `nombre`, `contenido`) VALUES
(1, 1, 'Proyecto de prueba', 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48dHJheWVjdG9yaWE+PGNhYmxlcz48Y2FibGU+PG5vbWJyZT5DYXRlZ29yaWEgNjwvbm9tYnJlPjx0aXBvPlBhciB0cmVuemFkbzwvdGlwbz48ZGlhbWV0cm9fZXh0ZXJpb3I+NS44PC9kaWFtZXRyb19leHRlcmlvcj48YXJlYV9jYWJsZT4yNi40MjA4NTY8L2FyZWFfY2FibGU+PG51bWVybz4xMDwvbnVtZXJvPjxhcmVhX2NhYmxlcz4yNjQuMjA4NTY8L2FyZWFfY2FibGVzPjwvY2FibGU+PGNhYmxlPjxub21icmU+Q2F0ZWdvcmlhIDVlPC9ub21icmU+PHRpcG8+UGFyIHRyZW56YWRvPC90aXBvPjxkaWFtZXRyb19leHRlcmlvcj40LjU8L2RpYW1ldHJvX2V4dGVyaW9yPjxhcmVhX2NhYmxlPjE1LjkwNDM1PC9hcmVhX2NhYmxlPjxudW1lcm8+NTwvbnVtZXJvPjxhcmVhX2NhYmxlcz43OS41MjE3NTwvYXJlYV9jYWJsZXM+PC9jYWJsZT48c3VtYT4xNTwvc3VtYT48YXJlYV90b3RhbD4zNDMuNzMwMzE8L2FyZWFfdG90YWw+PC9jYWJsZXM+PC90cmF5ZWN0b3JpYT4=');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tubos`
--

CREATE TABLE IF NOT EXISTS `tubos` (
`id` int(11) NOT NULL,
  `tubos_tipos_id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `tamano_comercial` varchar(45) DEFAULT NULL,
  `diametro_interior` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tubos`
--

INSERT INTO `tubos` (`id`, `tubos_tipos_id`, `nombre`, `tamano_comercial`, `diametro_interior`) VALUES
(1, 2, 'Tuberia Conduit 1/2', '1/2', 18.2),
(2, 2, 'Tuberia Conduit 3/4', '3/4', 23.6),
(3, 2, 'Tuberia Conduit 1''''', '1''''', 26.6),
(4, 2, 'Tuberia Conduit 1 1/4', '1 1/4', 39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tubos_tipos`
--

CREATE TABLE IF NOT EXISTS `tubos_tipos` (
`id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tubos_tipos`
--

INSERT INTO `tubos_tipos` (`id`, `nombre`) VALUES
(1, 'PVC conduit ligero'),
(2, 'PVC conduit pesado'),
(3, 'Metal pared delgada'),
(4, 'Metal pared gruesa'),
(5, 'Corrugado no metalico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `correo_electronico` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo_electronico`, `nombre`, `apellidos`, `clave`) VALUES
(1, 'crisbera@gmail.com', 'Cristian', 'Bernal', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_cables`
--

CREATE TABLE IF NOT EXISTS `usuario_cables` (
`id` int(11) NOT NULL,
  `cables_tipos_id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `diametro_exterior` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_cables_tipos`
--

CREATE TABLE IF NOT EXISTS `usuario_cables_tipos` (
`id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_canaletas`
--

CREATE TABLE IF NOT EXISTS `usuario_canaletas` (
`id` int(11) NOT NULL,
  `usuario_canaletas_tipos_id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_canaletas_tipos`
--

CREATE TABLE IF NOT EXISTS `usuario_canaletas_tipos` (
`id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_charolas`
--

CREATE TABLE IF NOT EXISTS `usuario_charolas` (
`id` int(11) NOT NULL,
  `charolas_tipos_id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `peralte` double DEFAULT NULL,
  `ancho` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_charolas_tipos`
--

CREATE TABLE IF NOT EXISTS `usuario_charolas_tipos` (
`id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_tubos`
--

CREATE TABLE IF NOT EXISTS `usuario_tubos` (
`id` int(11) NOT NULL,
  `tubos_tipos_id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `tamano_comercial` varchar(45) DEFAULT NULL,
  `diametro_interior` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_tubos_tipos`
--

CREATE TABLE IF NOT EXISTS `usuario_tubos_tipos` (
`id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cables`
--
ALTER TABLE `cables`
 ADD PRIMARY KEY (`id`,`cables_tipos_id`), ADD KEY `fk_cables_cables_tipos1_idx` (`cables_tipos_id`);

--
-- Indices de la tabla `cables_tipos`
--
ALTER TABLE `cables_tipos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `canaletas`
--
ALTER TABLE `canaletas`
 ADD PRIMARY KEY (`id`,`canaletas_tipos_id`), ADD KEY `fk_canaletas_canaletas_tipos1_idx` (`canaletas_tipos_id`);

--
-- Indices de la tabla `canaletas_tipos`
--
ALTER TABLE `canaletas_tipos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `charolas`
--
ALTER TABLE `charolas`
 ADD PRIMARY KEY (`id`,`charolas_tipos_id`), ADD KEY `fk_charolas_charolas_tipos1_idx` (`charolas_tipos_id`);

--
-- Indices de la tabla `charolas_tipos`
--
ALTER TABLE `charolas_tipos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
 ADD PRIMARY KEY (`id`,`usuario_id`), ADD KEY `fk_proyectos_usuarios1_idx` (`usuario_id`);

--
-- Indices de la tabla `tubos`
--
ALTER TABLE `tubos`
 ADD PRIMARY KEY (`id`,`tubos_tipos_id`), ADD KEY `fk_tubos_tubos_tipos1_idx` (`tubos_tipos_id`);

--
-- Indices de la tabla `tubos_tipos`
--
ALTER TABLE `tubos_tipos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_cables`
--
ALTER TABLE `usuario_cables`
 ADD PRIMARY KEY (`id`,`cables_tipos_id`), ADD KEY `fk_cables_cables_tipos1_idx` (`cables_tipos_id`);

--
-- Indices de la tabla `usuario_cables_tipos`
--
ALTER TABLE `usuario_cables_tipos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_canaletas`
--
ALTER TABLE `usuario_canaletas`
 ADD PRIMARY KEY (`id`,`usuario_canaletas_tipos_id`), ADD KEY `fk_usuario_canaletas_usuario_canaletas_tipos1_idx` (`usuario_canaletas_tipos_id`);

--
-- Indices de la tabla `usuario_canaletas_tipos`
--
ALTER TABLE `usuario_canaletas_tipos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_charolas`
--
ALTER TABLE `usuario_charolas`
 ADD PRIMARY KEY (`id`,`charolas_tipos_id`), ADD KEY `fk_charolas_charolas_tipos1_idx` (`charolas_tipos_id`);

--
-- Indices de la tabla `usuario_charolas_tipos`
--
ALTER TABLE `usuario_charolas_tipos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_tubos`
--
ALTER TABLE `usuario_tubos`
 ADD PRIMARY KEY (`id`,`tubos_tipos_id`), ADD KEY `fk_tubos_tubos_tipos1_idx` (`tubos_tipos_id`);

--
-- Indices de la tabla `usuario_tubos_tipos`
--
ALTER TABLE `usuario_tubos_tipos`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cables`
--
ALTER TABLE `cables`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `cables_tipos`
--
ALTER TABLE `cables_tipos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `canaletas`
--
ALTER TABLE `canaletas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `canaletas_tipos`
--
ALTER TABLE `canaletas_tipos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `charolas`
--
ALTER TABLE `charolas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `charolas_tipos`
--
ALTER TABLE `charolas_tipos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tubos`
--
ALTER TABLE `tubos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tubos_tipos`
--
ALTER TABLE `tubos_tipos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuario_cables`
--
ALTER TABLE `usuario_cables`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario_cables_tipos`
--
ALTER TABLE `usuario_cables_tipos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario_canaletas`
--
ALTER TABLE `usuario_canaletas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario_canaletas_tipos`
--
ALTER TABLE `usuario_canaletas_tipos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario_charolas`
--
ALTER TABLE `usuario_charolas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario_charolas_tipos`
--
ALTER TABLE `usuario_charolas_tipos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario_tubos`
--
ALTER TABLE `usuario_tubos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario_tubos_tipos`
--
ALTER TABLE `usuario_tubos_tipos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cables`
--
ALTER TABLE `cables`
ADD CONSTRAINT `fk_cables_cables_tipos1` FOREIGN KEY (`cables_tipos_id`) REFERENCES `cables_tipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `canaletas`
--
ALTER TABLE `canaletas`
ADD CONSTRAINT `fk_canaletas_canaletas_tipos1` FOREIGN KEY (`canaletas_tipos_id`) REFERENCES `canaletas_tipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `charolas`
--
ALTER TABLE `charolas`
ADD CONSTRAINT `fk_charolas_charolas_tipos1` FOREIGN KEY (`charolas_tipos_id`) REFERENCES `charolas_tipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
ADD CONSTRAINT `fk_proyectos_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tubos`
--
ALTER TABLE `tubos`
ADD CONSTRAINT `fk_tubos_tubos_tipos1` FOREIGN KEY (`tubos_tipos_id`) REFERENCES `tubos_tipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_cables`
--
ALTER TABLE `usuario_cables`
ADD CONSTRAINT `fk_cables_cables_tipos10` FOREIGN KEY (`cables_tipos_id`) REFERENCES `usuario_cables_tipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_canaletas`
--
ALTER TABLE `usuario_canaletas`
ADD CONSTRAINT `fk_usuario_canaletas_usuario_canaletas_tipos1` FOREIGN KEY (`usuario_canaletas_tipos_id`) REFERENCES `usuario_canaletas_tipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_charolas`
--
ALTER TABLE `usuario_charolas`
ADD CONSTRAINT `fk_charolas_charolas_tipos10` FOREIGN KEY (`charolas_tipos_id`) REFERENCES `usuario_charolas_tipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_tubos`
--
ALTER TABLE `usuario_tubos`
ADD CONSTRAINT `fk_tubos_tubos_tipos10` FOREIGN KEY (`tubos_tipos_id`) REFERENCES `usuario_tubos_tipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
