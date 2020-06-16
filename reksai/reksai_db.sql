-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2020 a las 16:41:47
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

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
  `id_asig` int(11) NOT NULL,
  `codigo` varchar(10) COLLATE latin1_bin NOT NULL,
  `nombre` varchar(100) COLLATE latin1_bin NOT NULL,
  `creditos` int(2) NOT NULL,
  `horas_semanales` int(2) NOT NULL,
  `estado` varchar(10) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`id_asig`, `codigo`, `nombre`, `creditos`, `horas_semanales`, `estado`) VALUES
(1, 'MT500', 'ingieneria de software', 4, 4, 'Abierto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura_plan`
--

CREATE TABLE `asignatura_plan` (
  `id_asig_plan` int(11) NOT NULL,
  `plan` varchar(10) COLLATE latin1_bin NOT NULL,
  `$this->asignatura = "";` varchar(100) COLLATE latin1_bin NOT NULL,
  `s` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asig_plan_requisito`
--

CREATE TABLE `asig_plan_requisito` (
  `id_asig_plan_req` int(11) NOT NULL,
  `asig_plan` int(11) NOT NULL,
  `asignatura` varchar(100) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id` int(11) NOT NULL,
  `tipo` varchar(10) DEFAULT NULL,
  `fecha` date NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id`, `tipo`, `fecha`, `id_estudiante`, `id_grado`) VALUES
(1, '1', '2018-08-01', 34, 70),
(2, '1', '2018-08-01', 35, 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a_academico`
--

CREATE TABLE `a_academico` (
  `id_a` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `fechainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  `iniciomatricula` date NOT NULL,
  `finmatricula` date NOT NULL,
  `inicioprimerparcial` date NOT NULL,
  `finprimerparcial` date NOT NULL,
  `iniciosegundoparcial` date NOT NULL,
  `finsegundoparcial` date DEFAULT current_timestamp(),
  `inicioparcialfinal` date NOT NULL DEFAULT current_timestamp(),
  `finparcialfinal` date NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `a_academico`
--

INSERT INTO `a_academico` (`id_a`, `nombre`, `fechainicio`, `fechafin`, `iniciomatricula`, `finmatricula`, `inicioprimerparcial`, `finprimerparcial`, `iniciosegundoparcial`, `finsegundoparcial`, `inicioparcialfinal`, `finparcialfinal`, `estado`) VALUES
(7, '2020-2', '2020-06-15', '2020-06-14', '2020-06-17', '2020-06-15', '2020-06-11', '2020-06-16', '2020-06-10', '2020-06-03', '2020-06-10', '2020-06-21', 'Abierto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloque_cal`
--

CREATE TABLE `bloque_cal` (
  `id` int(11) NOT NULL,
  `nom_cal` varchar(80) DEFAULT NULL,
  `id_grado` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bloque_cal`
--

INSERT INTO `bloque_cal` (`id`, `nom_cal`, `id_grado`) VALUES
(1, 'ingles', 70),
(2, 'qyechua', 70),
(3, 'Ciencias', 70),
(4, 'Literatura', 70),
(5, 'Ed. Fisica', 70),
(6, 'ingles', 69),
(7, 'Literatura', 69),
(8, 'Ed. Fisica', 69);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conducta`
--

CREATE TABLE `conducta` (
  `id` int(11) NOT NULL,
  `id_estudiante` int(11) DEFAULT NULL,
  `date_at` date DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `id_grado` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `profesor` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nombre`, `profesor`) VALUES
(31, 'Sotfware - 01', '9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `nombre`) VALUES
(1, 'activo'),
(2, 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id_estudiante` int(11) NOT NULL,
  `dni` varchar(11) NOT NULL,
  `primer_apellido` varchar(50) DEFAULT NULL,
  `segundo_apellido` varchar(50) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `genero` varchar(20) NOT NULL,
  `fecha_nac` date NOT NULL,
  `programa` varchar(100) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `fecha_reg` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiante`, `dni`, `primer_apellido`, `segundo_apellido`, `nombre`, `genero`, `fecha_nac`, `programa`, `email`, `estado`, `fecha_reg`) VALUES
(67, '1003243681', 'Campo', 'Montero', 'Luis Fernando ', 'Masculino', '1999-12-12', 'Ingenieria de sistema', 'lcampomontero@gmail.com', 'activo', '2020-06-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `est_cur`
--

CREATE TABLE `est_cur` (
  `id` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `est_cur`
--

INSERT INTO `est_cur` (`id`, `id_estudiante`, `id_grado`) VALUES
(1, 34, 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `est_gra`
--

CREATE TABLE `est_gra` (
  `id` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `est_gra`
--

INSERT INTO `est_gra` (`id`, `id_estudiante`, `id_grado`) VALUES
(8, 34, 70),
(9, 35, 70),
(10, 36, 69),
(11, 37, 72),
(12, 38, 72);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `id_facultad` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE latin1_bin NOT NULL,
  `estado` varchar(10) COLLATE latin1_bin NOT NULL DEFAULT 'activa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`id_facultad`, `nombre`, `estado`) VALUES
(1, 'Ingieneria y tecnologia', 'Abierto'),
(2, 'Derecho', 'Abierto'),
(4, '', 'Abierto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `genero` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `genero`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id_grado` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `nivel` varchar(150) NOT NULL,
  `fav` int(1) NOT NULL,
  `id_prof` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id_grado`, `nombre`, `nivel`, `fav`, `id_prof`) VALUES
(72, 'Ingenieria de sistema', 'Ingieneria y tecnologia', 0, 0),
(73, 'Ingieneria electronica', 'Ingieneria y tecnologia', 0, 0),
(74, 'Ingenieria de sistema', 'Ingieneria y tecnologia', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gra_cu`
--

CREATE TABLE `gra_cu` (
  `id_gra_cu` int(11) NOT NULL,
  `id_grado` int(11) DEFAULT NULL,
  `curso` int(11) NOT NULL,
  `cu` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `id_nivel` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`id_nivel`, `nombre`) VALUES
(5, 'Ingieneria y tecnologia'),
(6, 'Ingieneria y tecnologia'),
(7, 'Ingieneria y tecnologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina`
--

CREATE TABLE `nomina` (
  `id_nomina` int(11) NOT NULL,
  `id_estudiante` int(11) DEFAULT NULL,
  `id_grado` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `id_a` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_estudio`
--

CREATE TABLE `plan_estudio` (
  `id_plan` int(11) NOT NULL,
  `codigo` varchar(10) COLLATE latin1_bin NOT NULL,
  `programa` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id_prof` int(11) NOT NULL,
  `dni` int(11) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `primer_apellido` varchar(50) NOT NULL,
  `segundo_apellido` varchar(50) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id_prof`, `dni`, `nombres`, `primer_apellido`, `segundo_apellido`, `email`, `estado`) VALUES
(14, 1003243689, 'Fulano', 'Perez', 'Perez', 'perez@gmail.com', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `id_programa` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE latin1_bin NOT NULL,
  `facultad` varchar(100) COLLATE latin1_bin NOT NULL,
  `numeroPeriodos` int(2) NOT NULL,
  `estado` varchar(10) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`id_programa`, `nombre`, `facultad`, `numeroPeriodos`, `estado`) VALUES
(6, 'Ingenieria de sistema', 'Ingieneria y tecnologia', 10, 'Abierto'),
(7, 'Derecho', 'Derecho', 10, 'Abierto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `id_prof` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `RFID` varchar(8) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `kind` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_prof`, `name`, `lastname`, `username`, `password`, `email`, `RFID`, `status`, `kind`, `created_at`) VALUES
(1, 1, 'Administrador', 'admin', 'admin', '56c6fbdc1f299d0a753ac029343d380afa3919a8', NULL, NULL, 1, 1, '2018-07-15 13:36:00'),
(27, 9, 'Daniel', 'danielito dadielito', '12345678', '56c6fbdc1f299d0a753ac029343d380afa3919a8', 'profesor@gmail.com', NULL, 1, 0, '2018-08-12 13:19:03'),
(29, 10, 'juan carlos', 'Quispe Mamani', 'juanC', '56c6fbdc1f299d0a753ac029343d380afa3919a8', 'profesor@gmail.com', NULL, 1, 0, '2020-05-21 20:31:32');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`id_asig`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `asignatura_plan`
--
ALTER TABLE `asignatura_plan`
  ADD PRIMARY KEY (`id_asig_plan`);

--
-- Indices de la tabla `asig_plan_requisito`
--
ALTER TABLE `asig_plan_requisito`
  ADD PRIMARY KEY (`id_asig_plan_req`);

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_curso` (`id_estudiante`),
  ADD KEY `id_nomina` (`id_grado`);

--
-- Indices de la tabla `a_academico`
--
ALTER TABLE `a_academico`
  ADD PRIMARY KEY (`id_a`);

--
-- Indices de la tabla `bloque_cal`
--
ALTER TABLE `bloque_cal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_grado` (`id_grado`);

--
-- Indices de la tabla `conducta`
--
ALTER TABLE `conducta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_grado` (`id_grado`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`) USING BTREE;

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id_estudiante`);

--
-- Indices de la tabla `est_cur`
--
ALTER TABLE `est_cur`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `est_gra`
--
ALTER TABLE `est_gra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_grado` (`id_grado`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`id_facultad`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`id_grado`),
  ADD KEY `user_id` (`id_prof`);

--
-- Indices de la tabla `gra_cu`
--
ALTER TABLE `gra_cu`
  ADD PRIMARY KEY (`id_gra_cu`),
  ADD KEY `id_grado` (`id_grado`),
  ADD KEY `curso` (`curso`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`id_nivel`);

--
-- Indices de la tabla `nomina`
--
ALTER TABLE `nomina`
  ADD PRIMARY KEY (`id_nomina`),
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_a` (`id_a`),
  ADD KEY `id_grado` (`id_grado`) USING BTREE;

--
-- Indices de la tabla `plan_estudio`
--
ALTER TABLE `plan_estudio`
  ADD PRIMARY KEY (`id_plan`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id_prof`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`id_programa`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `facultad_fk` (`facultad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `id_asig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `asignatura_plan`
--
ALTER TABLE `asignatura_plan`
  MODIFY `id_asig_plan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asig_plan_requisito`
--
ALTER TABLE `asig_plan_requisito`
  MODIFY `id_asig_plan_req` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `a_academico`
--
ALTER TABLE `a_academico`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `bloque_cal`
--
ALTER TABLE `bloque_cal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `conducta`
--
ALTER TABLE `conducta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `est_cur`
--
ALTER TABLE `est_cur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `est_gra`
--
ALTER TABLE `est_gra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `id_facultad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id_grado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `gra_cu`
--
ALTER TABLE `gra_cu`
  MODIFY `id_gra_cu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `nomina`
--
ALTER TABLE `nomina`
  MODIFY `id_nomina` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plan_estudio`
--
ALTER TABLE `plan_estudio`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id_prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `id_programa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `programa`
--
ALTER TABLE `programa`
  ADD CONSTRAINT `facultad_fk` FOREIGN KEY (`facultad`) REFERENCES `facultad` (`nombre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
