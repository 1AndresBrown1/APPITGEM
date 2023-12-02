-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2023 a las 01:42:22
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `academico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `tipo_documento` varchar(50) NOT NULL,
  `documento_identidad` varchar(50) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `contrasena` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id`, `nombre`, `apellido`, `tipo_documento`, `documento_identidad`, `direccion`, `titulo`, `email`, `fecha_nacimiento`, `contrasena`) VALUES
(1, 'Andres', 'Brown', 'cedula', '1193564006', 'Carrera 16 #13a esquina colegio mundo creativo', 'Administradora de empresas', 'admin@gmail.com', '2023-11-29', '$2y$12$RJK2U.gfm12UjpWEqF1NBuByxKmc7CihLW30Rl12VRywS/1.Jr3QW'),
(2, 'Abel', 'Tesfaye', 'cedula', '0987', 'Cali Carrera 13', 'Depote Li.', 'abel@gmail.com', '2023-11-29', '$2y$12$HsF1zyrBS8dj8qBNQozAM.JsZ65hvSE9k3mXpAFKKFH9RuMrcwBpK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `documento_identidad` int(11) NOT NULL,
  `contrasena` mediumtext NOT NULL,
  `estado_matricula` enum('pagado','sin_saldar') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `nombre`, `apellido`, `fecha_nacimiento`, `genero`, `grupo_id`, `documento_identidad`, `contrasena`, `estado_matricula`) VALUES
(1, 'Felipe', 'Bolaños', '2023-11-29', 'Masculino', 1, 1234, '$2y$12$TWxZFKex7A2fTa/t63Stle59OgqQBnIeoxgxsdD9DknczuNmphyuW', 'pagado'),
(2, 'Christofer', 'Bolanos', '2023-11-29', 'Masculino', 1, 12345, '$2y$12$OK7aWO3MobKk3GZSJS7JUOVSKqHPimE.pEowZtEMzmH8/OoSwaG2G', 'pagado'),
(3, 'Kevin', 'Duran', '2023-11-29', 'Masculino', 1, 123456, '$2y$12$uppf3ZO3Rvz7YxAk0J/wVeNk8B2XEhYCVMziI67pU/aJZU107rd7W', 'pagado'),
(4, 'Dayana', 'Bolanos', '2023-11-22', 'Femenino', 1, 1234567, '$2y$12$b2l49s1pANuuwZjAN3cC3eAwwM/0HiwHEcQBfRa9PVJB84GrltT6m', 'pagado'),
(5, 'Wilmer', 'Gomez', '2023-11-12', 'Masculino', 3, 12345678, '$2y$12$Jml4815c9OhNYZ4.D4vy9u6wGT7okYKJ5cnNZq03Ehv21ZqFitnM6', 'pagado'),
(6, 'Lorena', 'Guasa', '2023-11-15', 'Femenino', 3, 123456789, '$2y$10$JVZgR1Sz.oPsadoLdSO2eeG4.TZPC00FzCN6V9/7n.s6/v8ZaCn1.', 'pagado'),
(7, 'Heider', 'Carabali', '2023-11-14', 'Masculino', 3, 2147483647, '$2y$12$KUuMUblLt9Zhs.np7eeR6OreCnAb2taSMlmcPC6WozHJ0iPjQMY42', 'pagado'),
(8, 'Camilo', 'Gonsa', '2023-12-01', 'Masculino', 2, 121212, '$2y$12$1DFIfkfsxs.9bCFDQRaqE.7oNRdVInl7V5PuLWEFVP2otkG0k086S', 'pagado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_a`
--

CREATE TABLE `gestion_a` (
  `id` int(11) NOT NULL,
  `nombre_a` varchar(255) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `gestion_a`
--

INSERT INTO `gestion_a` (`id`, `nombre_a`, `fecha_creacion`) VALUES
(1, '2023A', '2023-11-29 20:39:47'),
(2, '2024A', '2023-11-29 20:40:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `nombre_grupo` varchar(255) NOT NULL,
  `id_año` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `nombre_grupo`, `id_año`, `id_docente`) VALUES
(1, 'Tecnico en sistemas', 1, 1),
(2, 'Tecnico en sistemas 2', 2, 1),
(3, 'Tecnico en deporte', 1, 2),
(4, 'Asistente administrativo', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `nombre_materia` varchar(255) NOT NULL,
  `codigo_materia` varchar(20) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `id_grupo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `nombre_materia`, `codigo_materia`, `id_docente`, `id_grupo`) VALUES
(1, 'Sistemas Basico 1', 'SIS2023', 1, 1),
(2, 'Sistemas Basico 1', 'SIS2024', 1, 2),
(3, 'Anatomia', 'ANA2023A', 2, 3),
(4, 'Redes', 'RED2023A', 1, 1),
(5, 'Mantenimiento de Software 1', 'MFSISTEMAS2023', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `estudiante_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `nota` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `estudiante_id`, `materia_id`, `nota`) VALUES
(1, 5, 3, 4),
(2, 6, 3, 3),
(3, 7, 3, 2),
(4, 1, 1, 4),
(5, 2, 1, 4),
(6, 3, 1, 4),
(7, 4, 1, 4),
(8, 1, 4, 3),
(9, 2, 4, 3),
(10, 3, 4, 5),
(11, 4, 4, 2.1),
(12, 1, 5, 2),
(13, 2, 5, 4.4),
(14, 3, 5, 3.2),
(15, 4, 5, 2.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` bigint(20) NOT NULL,
  `tipo_rol` varchar(25) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `tipo_rol`, `descripcion`) VALUES
(1, 'Admin', 'Este rol generalmente tiene acceso completo al sistema y tiene la capacidad de gestionar usuarios, cursos, asignación de roles, y otros aspectos de la plataforma. Los administradores son responsables de administrar y mantener la plataforma en su totalidad.'),
(2, 'Docente', 'Los docentes tienen acceso a las funciones relacionadas con la enseñanza y la interacción con los estudiantes. Pueden crear cursos, cargar materiales de estudio, evaluar a los estudiantes y proporcionar retroalimentación. Los docentes pueden tener ciertos privilegios de gestión limitados en relación con los cursos y materiales de enseñanza.'),
(3, 'Estudiante', 'Los estudiantes tienen acceso a los cursos en los que están inscritos. Pueden ver el contenido del curso, realizar tareas, participar en discusiones y tomar exámenes. En general, tienen acceso limitado en comparación con los docentes y los administradores, centrándose principalmente en la participación y el aprendizaje en el curso.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` bigint(10) NOT NULL,
  `contrasena` varchar(250) NOT NULL,
  `id_rol` bigint(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `contrasena`, `id_rol`, `email`, `name`) VALUES
(1, '$2y$10$krOzKCdEO5iUu0ZcZdIxdOAkUZ5V56LZwmCLUxu.qX8yQLJ1VCWmG', 1, 'andres@gmail.com', 'Andres');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grupo_id` (`grupo_id`);

--
-- Indices de la tabla `gestion_a`
--
ALTER TABLE `gestion_a`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_año` (`id_año`),
  ADD KEY `g_d1` (`id_docente`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_materia` (`codigo_materia`),
  ADD KEY `id_grupo` (`id_grupo`),
  ADD KEY `id_docente` (`id_docente`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estudiante_id` (`estudiante_id`),
  ADD KEY `materia_id` (`materia_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `gestion_a`
--
ALTER TABLE `gestion_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`);

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `g_d1` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id`),
  ADD CONSTRAINT `grupos_ibfk_1` FOREIGN KEY (`id_año`) REFERENCES `gestion_a` (`id`);

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id`),
  ADD CONSTRAINT `materias_ibfk_2` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
