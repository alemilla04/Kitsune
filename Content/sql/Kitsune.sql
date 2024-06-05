-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2024 a las 13:54:12
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kitsune`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categoriaID` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencias`
--

CREATE TABLE `experiencias` (
  `id_experience` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `experiencia` varchar(100) DEFAULT NULL,
  `opinion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `preguntaID` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `cuerpo` varchar(700) NOT NULL,
  `etiqueta` varchar(100) NOT NULL,
  `userID` int(11) NOT NULL DEFAULT 0,
  `guest_nombre` varchar(100) DEFAULT NULL,
  `guest_email` varchar(100) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `respuestas` int(11) NOT NULL DEFAULT 0,
  `vistas` int(11) NOT NULL DEFAULT 0,
  `puntuacion` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`preguntaID`, `titulo`, `cuerpo`, `etiqueta`, `userID`, `guest_nombre`, `guest_email`, `fecha`, `respuestas`, `vistas`, `puntuacion`) VALUES
(1, 'prueba', 'prueba 1.1', 'prueba ', 0, 'juan', 'juan@gmail.com', '2024-06-02 14:49:22', 0, 0, 0),
(2, 'prueba 2', 'prueba 1.2', 'prueba', 1, NULL, NULL, '2024-06-02 14:54:01', 0, 0, 0),
(3, 'prueba 3', 'prueba 1.3', 'prueba', 2, NULL, NULL, '2024-06-02 14:57:01', 0, 0, 0),
(4, 'prueba 4', 'prueba 1.4', 'prueba', 2, NULL, NULL, '2024-06-02 14:57:17', 0, 0, 0),
(5, 'prueba 5', 'prueba 1.5', 'prueba', 2, NULL, NULL, '2024-06-04 10:15:01', 0, 4, 0),
(6, 'prueba 6', 'He estado usando la biblioteca googletrans de python para realizar traducciones y a la hora de hacerlo con archivos .po no consigo hacerlo, ya que estoy obteniendo errores para escapar algunos caracteres.\n\nPor ejemplo en esta parte del archivo .po no pu', 'prueba', 0, 'antonio jose j', 'antonio@gmail.com', '2024-06-05 11:53:17', 0, 24, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `respuestaID` int(11) NOT NULL,
  `preguntaID` int(11) NOT NULL DEFAULT 0,
  `cuerpo` varchar(700) NOT NULL,
  `userID` int(11) NOT NULL DEFAULT 0,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `puntuacion` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `userID` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `preguntas` int(11) NOT NULL DEFAULT 0,
  `respuestas` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`userID`, `nombre`, `email`, `contraseña`, `foto`, `preguntas`, `respuestas`) VALUES
(1, 'alexa', 'alexa@gmail.com', '$2y$10$W0n6GY.mVwQSvhyo5fjUNeXZYni0ZrIBZFd2h0bJflOrUWwG.ZRM6', 'foto_negro.jpg', 1, 0),
(2, 'german', 'german@gmail.com', '$2y$10$/USMZLkjfCxx0BmE/vkqdeQh72/SJzkUScYn.lkx8ukjHSrhCjHXK', 'sergioramos.jpg', 3, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoriaID`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `experiencias`
--
ALTER TABLE `experiencias`
  ADD PRIMARY KEY (`id_experience`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`preguntaID`),
  ADD KEY `fk_userID` (`userID`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`respuestaID`),
  ADD KEY `fk_userIDres` (`userID`),
  ADD KEY `fk_preIDres` (`preguntaID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoriaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `experiencias`
--
ALTER TABLE `experiencias`
  MODIFY `id_experience` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `preguntaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `respuestaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `fk_userID` FOREIGN KEY (`userID`) REFERENCES `usuarios` (`userID`);

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `fk_preIDres` FOREIGN KEY (`preguntaID`) REFERENCES `preguntas` (`preguntaID`),
  ADD CONSTRAINT `fk_userIDres` FOREIGN KEY (`userID`) REFERENCES `usuarios` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
