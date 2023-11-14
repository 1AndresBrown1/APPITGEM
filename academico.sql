-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2023 at 01:19 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academico`
--

-- --------------------------------------------------------

--
-- Table structure for table `docentes`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `docentes`
--

INSERT INTO `docentes` (`id`, `nombre`, `apellido`, `tipo_documento`, `documento_identidad`, `direccion`, `titulo`, `email`, `fecha_nacimiento`, `contrasena`) VALUES
(1, 'Juan Camilo', 'Gonzalias Aponza', 'cedulas', '1060419059', 'cra 6 # 5  - 31', 'ingeniero de sistemas', 'juancamilo8756@hotmail.es', '2023-11-07', '$2y$10$krOzKCdEO5iUu0ZcZdIxdOAkUZ5V56LZwmCLUxu.qX8yQLJ1VCWmG'),
(2, 'Alisson', 'Becker', 'CC', '123456789', 'jumm', 'Fuerza armada del peru :v', 'alison@necesitoquemepaguen.com', '2023-11-02', '$2y$12$xsB8U2P2xhc3MYWCclPl6uRtUDojFHT2ztoNIzaIOv09isBcC3pv.');

-- --------------------------------------------------------

--
-- Table structure for table `estudiantes`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `nombre`, `apellido`, `fecha_nacimiento`, `genero`, `grupo_id`, `documento_identidad`, `contrasena`, `estado_matricula`) VALUES
(1, 'Andres', 'Bolaños', '2023-10-01', 'Masculino', 1, 11, '$2y$10$krOzKCdEO5iUu0ZcZdIxdOAkUZ5V56LZwmCLUxu.qX8yQLJ1VCWmG', 'pagado'),
(2, 'Kevin', 'Duran', '2023-10-30', 'Masculino', 2, 12, '', 'pagado'),
(3, 'felipe', 'Brown', '2023-10-30', 'Masculino', 1, 123, '$2y$10$krOzKCdEO5iUu0ZcZdIxdOAkUZ5V56LZwmCLUxu.qX8yQLJ1VCWmG', ''),
(5, 'Andres', 'Bolaños Palacios', '2023-11-02', 'Masculino', 2, 12345, '', 'pagado'),
(6, 'Camilo', 'Gonzalias', '2023-10-31', 'Masculino', 2, 123455, '\0$2y$10$PVsP.6WRDfU6eM0G3awhp.1KkvfYnoQNyTdwrHRchhvkc0p/mtF6', 'pagado');

-- --------------------------------------------------------

--
-- Table structure for table `gestion_a`
--

CREATE TABLE `gestion_a` (
  `id` int(11) NOT NULL,
  `nombre_a` varchar(255) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gestion_a`
--

INSERT INTO `gestion_a` (`id`, `nombre_a`, `fecha_creacion`) VALUES
(1, '2023-A', '2023-10-30 16:27:32'),
(2, '2023-B', '2023-10-30 16:27:39'),
(3, '2024', '2023-11-04 01:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `nombre_grupo` varchar(255) NOT NULL,
  `id_año` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grupos`
--

INSERT INTO `grupos` (`id`, `nombre_grupo`, `id_año`, `id_docente`) VALUES
(1, 'Ciencias Humanas', 1, 1),
(2, 'Sistemas', 2, 1),
(8, 'Ciencias Sociales', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `nombre_materia` varchar(255) NOT NULL,
  `codigo_materia` varchar(20) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `id_grupo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materias`
--

INSERT INTO `materias` (`id`, `nombre_materia`, `codigo_materia`, `id_docente`, `id_grupo`) VALUES
(1, 'Anatomia', 'ANA2023A', 1, 1),
(2, 'Sistemas Basico', 'SBDEPORTE2023', 1, 2),
(7, 'Mantenimiento de Software', 'MFSISTEMAS2023', 1, 2),
(10, 'quimica', '55sd', 1, 8),
(11, 'Religion', 'tydda', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `estudiante_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `nota` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notas`
--

INSERT INTO `notas` (`id`, `estudiante_id`, `materia_id`, `nota`) VALUES
(25, 2, 2, 1),
(26, 2, 7, 0),
(27, 4, 2, 2),
(28, 4, 7, 0),
(29, 5, 2, 0),
(30, 5, 7, 0),
(31, 6, 2, 4.5),
(32, 6, 7, 5),
(33, 1, 1, 5),
(34, 3, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_rol` bigint(20) NOT NULL,
  `tipo_rol` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_rol`, `tipo_rol`, `descripcion`) VALUES
(1, 'Admin', 'Este rol generalmente tiene acceso completo al sistema y tiene la capacidad de gestionar usuarios, cursos, asignación de roles, y otros aspectos de la plataforma. Los administradores son responsables de administrar y mantener la plataforma en su totalidad.'),
(2, 'Docente', 'Los docentes tienen acceso a las funciones relacionadas con la enseñanza y la interacción con los estudiantes. Pueden crear cursos, cargar materiales de estudio, evaluar a los estudiantes y proporcionar retroalimentación. Los docentes pueden tener ciertos privilegios de gestión limitados en relación con los cursos y materiales de enseñanza.'),
(3, 'Estudiante', 'Los estudiantes tienen acceso a los cursos en los que están inscritos. Pueden ver el contenido del curso, realizar tareas, participar en discusiones y tomar exámenes. En general, tienen acceso limitado en comparación con los docentes y los administradores, centrándose principalmente en la participación y el aprendizaje en el curso.');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` bigint(10) NOT NULL,
  `contrasena` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `id_rol` bigint(20) NOT NULL,
  `email` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `contrasena`, `id_rol`, `email`, `name`) VALUES
(1, '$2y$10$krOzKCdEO5iUu0ZcZdIxdOAkUZ5V56LZwmCLUxu.qX8yQLJ1VCWmG', 1, 'camolo2013@gmail.com', 'Camilo Gonzalias Aponza');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grupo_id` (`grupo_id`);

--
-- Indexes for table `gestion_a`
--
ALTER TABLE `gestion_a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_año` (`id_año`),
  ADD KEY `g_d1` (`id_docente`);

--
-- Indexes for table `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_materia` (`codigo_materia`),
  ADD KEY `id_grupo` (`id_grupo`),
  ADD KEY `id_docente` (`id_docente`);

--
-- Indexes for table `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estudiante_id` (`estudiante_id`),
  ADD KEY `materia_id` (`materia_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `gestion_a`
--
ALTER TABLE `gestion_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`);

--
-- Constraints for table `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `g_d1` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id`),
  ADD CONSTRAINT `grupos_ibfk_1` FOREIGN KEY (`id_año`) REFERENCES `gestion_a` (`id`);

--
-- Constraints for table `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id`),
  ADD CONSTRAINT `materias_ibfk_2` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id`);

--
-- Constraints for table `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiantes` (`id`),
  ADD CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
