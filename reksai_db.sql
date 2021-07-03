-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2021 a las 08:15:46
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reksai_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) COLLATE latin1_bin NOT NULL,
  `nombre` varchar(100) COLLATE latin1_bin NOT NULL,
  `estado` varchar(10) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`id`, `codigo`, `nombre`, `estado`) VALUES
(1, 'MT500', 'ingieneria de software', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id` int(11) NOT NULL,
  `grupo_estudiante` int(11) NOT NULL,
  `tipo_asistencia` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id`, `grupo_estudiante`, `tipo_asistencia`, `fecha`) VALUES
(1, 1, 0, '2021-06-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia_semana`
--

CREATE TABLE `dia_semana` (
  `id` int(11) NOT NULL,
  `nombre` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dia_semana`
--

INSERT INTO `dia_semana` (`id`, `nombre`) VALUES
(0, 'domingo'),
(1, 'lunes'),
(2, 'martes'),
(3, 'miércoles'),
(4, 'jueves'),
(5, 'viernes'),
(6, 'sábado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(10) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `nombre`) VALUES
(1, 'activo'),
(2, 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL,
  `dni` varchar(11) COLLATE latin1_bin NOT NULL,
  `programa` varchar(100) COLLATE latin1_bin NOT NULL,
  `estado` varchar(10) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `dni`, `programa`, `estado`) VALUES
(4, '1003243683', 'Derecho', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE latin1_bin NOT NULL,
  `estado` varchar(10) COLLATE latin1_bin NOT NULL DEFAULT 'activa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`id`, `nombre`, `estado`) VALUES
(1, 'Ingieneria y tecnologia', 'activo'),
(2, 'Derecho', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id` int(11) NOT NULL,
  `numero` int(2) NOT NULL,
  `asignatura` varchar(10) COLLATE latin1_bin NOT NULL,
  `periodo` varchar(7) COLLATE latin1_bin NOT NULL,
  `profesor` varchar(11) COLLATE latin1_bin NOT NULL,
  `estado` varchar(10) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id`, `numero`, `asignatura`, `periodo`, `profesor`, `estado`) VALUES
(1, 1, 'MT500', '2021-2', '1003243682', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_estudiante`
--

CREATE TABLE `grupo_estudiante` (
  `id` int(11) NOT NULL,
  `grupo` int(11) NOT NULL,
  `estudiante` varchar(11) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo_estudiante`
--

INSERT INTO `grupo_estudiante` (`id`, `grupo`, `estudiante`) VALUES
(1, 1, '1003243683');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_horario`
--

CREATE TABLE `grupo_horario` (
  `id` int(11) NOT NULL,
  `grupo` int(11) NOT NULL,
  `horario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo_horario`
--

INSERT INTO `grupo_horario` (`id`, `grupo`, `horario`) VALUES
(1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `dia_semana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `hora_inicio`, `hora_fin`, `dia_semana`) VALUES
(0, '09:00:00', '10:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kind`
--

CREATE TABLE `kind` (
  `id` int(11) NOT NULL,
  `titulo` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `kind`
--

INSERT INTO `kind` (`id`, `titulo`) VALUES
(1, 'administrador'),
(2, 'docente'),
(0, 'estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kind_user`
--

CREATE TABLE `kind_user` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kind` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `kind_user`
--

INSERT INTO `kind_user` (`id`, `id_user`, `id_kind`) VALUES
(2, 1, 1),
(3, 3, 2),
(4, 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perido_academico`
--

CREATE TABLE `perido_academico` (
  `id` int(11) NOT NULL,
  `nombre` varchar(7) COLLATE latin1_bin NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` varchar(10) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `perido_academico`
--

INSERT INTO `perido_academico` (`id`, `nombre`, `fecha_inicio`, `fecha_fin`, `estado`) VALUES
(1, '2021-2', '2021-04-17', '2021-07-31', 'Cerrado'),
(9, 'Luis', '2021-07-13', '2021-07-29', 'Abierto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE latin1_bin NOT NULL,
  `facultad` varchar(100) COLLATE latin1_bin NOT NULL,
  `estado` varchar(10) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`id`, `nombre`, `facultad`, `estado`) VALUES
(6, 'Ingenieria de sistema', 'Ingieneria y tecnologia', 'activo'),
(7, 'Derecho', 'Derecho', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_asistencia`
--

CREATE TABLE `tipo_asistencia` (
  `id` int(11) NOT NULL,
  `tipo` varchar(15) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_asistencia`
--

INSERT INTO `tipo_asistencia` (`id`, `tipo`) VALUES
(0, 'Asistencia'),
(1, 'Falta'),
(3, 'Justificacion'),
(2, 'Retardo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE latin1_bin NOT NULL,
  `dni` varchar(11) COLLATE latin1_bin NOT NULL,
  `nombre` varchar(50) COLLATE latin1_bin NOT NULL,
  `apellidos` varchar(50) COLLATE latin1_bin NOT NULL,
  `password` varchar(41) COLLATE latin1_bin NOT NULL,
  `estado` varchar(10) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `dni`, `nombre`, `apellidos`, `password`, `estado`) VALUES
(1, 'admin@gmail.com', '1003243681', 'Luis Fernando', 'Campo Montero', '56c6fbdc1f299d0a753ac029343d380afa3919a8', 'activo'),
(3, 'docente@gmail.com', '1003243682', 'Leonardo', 'Rodriguez', '56c6fbdc1f299d0a753ac029343d380afa3919a8', 'activo'),
(4, 'estudiante@gmail.com', '1003243683', 'Jose', 'Camargo', '56c6fbdc1f299d0a753ac029343d380afa3919a8', 'activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grupo_estudiante` (`grupo_estudiante`,`tipo_asistencia`,`fecha`),
  ADD KEY `tipo_asistencia` (`tipo_asistencia`);

--
-- Indices de la tabla `dia_semana`
--
ALTER TABLE `dia_semana`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD KEY `estado` (`estado`),
  ADD KEY `programa` (`programa`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero` (`numero`,`asignatura`),
  ADD KEY `profesor` (`profesor`),
  ADD KEY `periodo` (`periodo`),
  ADD KEY `estado` (`estado`),
  ADD KEY `asignatura` (`asignatura`);

--
-- Indices de la tabla `grupo_estudiante`
--
ALTER TABLE `grupo_estudiante`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grupo_2` (`grupo`,`estudiante`),
  ADD KEY `grupo` (`grupo`),
  ADD KEY `estudiante` (`estudiante`);

--
-- Indices de la tabla `grupo_horario`
--
ALTER TABLE `grupo_horario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grupo` (`grupo`,`horario`),
  ADD KEY `horario` (`horario`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hora_inicio` (`hora_inicio`,`hora_fin`,`dia_semana`),
  ADD KEY `dia_semana` (`dia_semana`);

--
-- Indices de la tabla `kind`
--
ALTER TABLE `kind`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `titulo` (`titulo`);

--
-- Indices de la tabla `kind_user`
--
ALTER TABLE `kind_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kind_user_unico` (`id_user`,`id_kind`),
  ADD KEY `id_kind` (`id_kind`);

--
-- Indices de la tabla `perido_academico`
--
ALTER TABLE `perido_academico`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `facultad_fk` (`facultad`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `tipo_asistencia`
--
ALTER TABLE `tipo_asistencia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo` (`tipo`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`email`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD KEY `estado` (`estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `grupo_estudiante`
--
ALTER TABLE `grupo_estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `grupo_horario`
--
ALTER TABLE `grupo_horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `kind_user`
--
ALTER TABLE `kind_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `perido_academico`
--
ALTER TABLE `perido_academico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD CONSTRAINT `asignatura_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado` (`nombre`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`grupo_estudiante`) REFERENCES `grupo_estudiante` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `asistencia_ibfk_2` FOREIGN KEY (`tipo_asistencia`) REFERENCES `tipo_asistencia` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado` (`nombre`) ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`programa`) REFERENCES `programa` (`nombre`) ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiante_ibfk_3` FOREIGN KEY (`dni`) REFERENCES `user` (`dni`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD CONSTRAINT `facultad_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado` (`nombre`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`profesor`) REFERENCES `user` (`dni`) ON UPDATE CASCADE,
  ADD CONSTRAINT `grupo_ibfk_2` FOREIGN KEY (`periodo`) REFERENCES `perido_academico` (`nombre`) ON UPDATE CASCADE,
  ADD CONSTRAINT `grupo_ibfk_3` FOREIGN KEY (`estado`) REFERENCES `estado` (`nombre`) ON UPDATE CASCADE,
  ADD CONSTRAINT `grupo_ibfk_4` FOREIGN KEY (`asignatura`) REFERENCES `asignatura` (`codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupo_estudiante`
--
ALTER TABLE `grupo_estudiante`
  ADD CONSTRAINT `grupo_estudiante_ibfk_1` FOREIGN KEY (`grupo`) REFERENCES `grupo` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `grupo_estudiante_ibfk_3` FOREIGN KEY (`estudiante`) REFERENCES `estudiante` (`dni`);

--
-- Filtros para la tabla `grupo_horario`
--
ALTER TABLE `grupo_horario`
  ADD CONSTRAINT `grupo_horario_ibfk_1` FOREIGN KEY (`grupo`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `grupo_horario_ibfk_2` FOREIGN KEY (`horario`) REFERENCES `horarios` (`id`);

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`dia_semana`) REFERENCES `dia_semana` (`id`);

--
-- Filtros para la tabla `kind_user`
--
ALTER TABLE `kind_user`
  ADD CONSTRAINT `kind_user_ibfk_1` FOREIGN KEY (`id_kind`) REFERENCES `kind` (`id`),
  ADD CONSTRAINT `kind_user_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `programa`
--
ALTER TABLE `programa`
  ADD CONSTRAINT `facultad_fk` FOREIGN KEY (`facultad`) REFERENCES `facultad` (`nombre`),
  ADD CONSTRAINT `programa_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado` (`nombre`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado` (`nombre`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
