-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-08-2022 a las 16:13:39
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nava`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `usuarios` varchar(100) NOT NULL,
  `contrasena` varchar(1000) NOT NULL,
  `estatus` varchar(100) NOT NULL DEFAULT 'Activo',
  `idtipusu` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `nombres`, `apellidos`, `usuarios`, `contrasena`, `estatus`, `idtipusu`) VALUES
(2, 'Yazmin', 'Montoya Mireles', 'Administrador1', '$2y$15$YtU9j.Gfl/.9iEHAXaw6Lell3kwBwK37tlsAlJ/IqVnagyBW13Nwy', 'Activo', 1),
(4, 'eduardo', 'lopez', 'Registrador', '$2y$15$YtU9j.Gfl/.9iEHAXaw6Lell3kwBwK37tlsAlJ/IqVnagyBW13Nwy', 'Activo', 3),
(8, 'Yazmin', 'tellez', 'Administrador', '$2y$15$LaMjKnLcxbLV717z01FRu.EUn4l/BG0J2xynQWYv.NjvIIyltoSzq', 'Activo', 0),
(12, 'Esteban', 'Esparza', 'Administrador', '$2y$15$EIrTc//k6VBoi.UzHiBVe.nq.csdVptPDzHKakVD74A.wpKAqdlqG', 'Activo', 0),
(13, 'eduardo', 'lopez tovar', 'Administrador', '$2y$15$bce/E6H0xPnOch2Um736q.PT01uhczCAynLfHzalQN9TH.Uaa82RC', 'Activo', 0),
(14, 'Yazmin', 'Montoya Mireles', 'Directivo', '$2y$15$YtU9j.Gfl/.9iEHAXaw6Lell3kwBwK37tlsAlJ/IqVnagyBW13Nwy', 'Activo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoyo1`
--

CREATE TABLE `apoyo1` (
  `id` int(11) NOT NULL,
  `beneficiario` varchar(150) DEFAULT NULL,
  `campo1` varchar(255) DEFAULT NULL,
  `campo2` varchar(255) DEFAULT NULL,
  `estatus` varchar(100) DEFAULT 'Activo',
  `admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `apoyo1`
--

INSERT INTO `apoyo1` (`id`, `beneficiario`, `campo1`, `campo2`, `estatus`, `admin`) VALUES
(1, 'Ismael', 'sdq', '123', 'Activo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoyo2`
--

CREATE TABLE `apoyo2` (
  `id` int(11) NOT NULL,
  `beneficiario` varchar(150) DEFAULT NULL,
  `campo1` varchar(255) DEFAULT NULL,
  `estatus` varchar(100) DEFAULT 'Activo',
  `admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoyo3`
--

CREATE TABLE `apoyo3` (
  `id` int(11) NOT NULL,
  `beneficiario` varchar(150) DEFAULT NULL,
  `campo1` varchar(255) DEFAULT NULL,
  `campo2` varchar(255) DEFAULT NULL,
  `campo3` varchar(255) DEFAULT NULL,
  `estatus` varchar(100) DEFAULT 'Activo',
  `admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoyo4`
--

CREATE TABLE `apoyo4` (
  `id` int(11) NOT NULL,
  `beneficiario` varchar(150) DEFAULT NULL,
  `campo1` varchar(255) DEFAULT NULL,
  `campo2` varchar(255) DEFAULT NULL,
  `estatus` varchar(100) DEFAULT 'Activo',
  `admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoyos`
--

CREATE TABLE `apoyos` (
  `id` int(11) NOT NULL,
  `apoyo` varchar(100) NOT NULL,
  `idDep` int(11) NOT NULL,
  `cantidad` varchar(100) NOT NULL,
  `campos` varchar(250) NOT NULL,
  `tipo` varchar(250) NOT NULL,
  `admin` int(11) NOT NULL,
  `estatus` varchar(100) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `apoyos`
--

INSERT INTO `apoyos` (`id`, `apoyo`, `idDep`, `cantidad`, `campos`, `tipo`, `admin`, `estatus`) VALUES
(10, 'equis', 2, '2', 'INE/Comprobante de domicilio', 'Imagen/Imagen', 4, 'Activo'),
(11, 'asmol', 15, '2', 'INE/Nombre', 'Imagen/Textos', 14, 'Activo'),
(12, 'Eduardp', 15, '2', 'Ine|Domicilio', 'Imagen|Letra y numero', 14, 'Activo'),
(13, 'Leche', 2, '3', 'Ine|Domicilio|calle', 'Textos|Textos|Imagen', 4, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ayuda2`
--

CREATE TABLE `ayuda2` (
  `id` int(11) NOT NULL,
  `beneficiario` varchar(150) DEFAULT NULL,
  `campo1` varchar(255) DEFAULT NULL,
  `campo2` varchar(255) DEFAULT NULL,
  `estatus` varchar(100) DEFAULT 'Activo',
  `admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ayudas`
--

CREATE TABLE `ayudas` (
  `id` int(11) NOT NULL,
  `ayuda` varchar(100) NOT NULL,
  `idDep` int(11) NOT NULL,
  `cantidad` varchar(100) NOT NULL,
  `campos` varchar(250) NOT NULL,
  `tipo` varchar(250) NOT NULL,
  `admin` int(11) NOT NULL,
  `estatus` varchar(50) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ayudas`
--

INSERT INTO `ayudas` (`id`, `ayuda`, `idDep`, `cantidad`, `campos`, `tipo`, `admin`, `estatus`) VALUES
(1, 'medicamento', 2, '2', 'Nombre|INE', 'Textos|Imagen', 1, 'Activo'),
(2, 'ayuda2 - medicamento', 3, '2', 'INE|Comprobante de domicilio', 'Imagen|Imagen', 1, 'Activo'),
(3, 'comida', 15, '1', 'INE', 'Imagen', 14, 'Activo'),
(4, 'Despensa', 15, '2', 'ine|Domicilio', 'Imagen|Letra y numero', 14, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiarios`
--

CREATE TABLE `beneficiarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `idBen` int(11) NOT NULL,
  `admin` int(11) DEFAULT NULL,
  `evidencia` text DEFAULT NULL,
  `fecha_evidencia` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_evidencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `beneficiarios`
--

INSERT INTO `beneficiarios` (`id`, `nombres`, `tipo`, `idBen`, `admin`, `evidencia`, `fecha_evidencia`, `usuario_evidencia`) VALUES
(1, 'Ismael Perez Herrera', 'ayudas', 3, 4, 'images/101.png', '2022-08-18 00:00:00', 14),
(2, 'Yazmin Montoya Mireles', 'Ayuda', 1, 4, 'images/20-el-pajaro-iPhone.jpg', '2022-08-01 00:00:00', 14),
(4, 'JUANA', 'Ayuda', 3, 4, NULL, '2022-08-02 17:43:11', NULL),
(5, 'Eduardo', 'Ayuda', 4, 14, NULL, '2022-08-02 17:43:11', NULL),
(6, 'Eduardo', 'Ayuda', 4, 14, NULL, '2022-08-02 17:43:11', NULL),
(7, 'Eduardo', 'Ayuda', 4, 14, NULL, '2022-08-02 17:43:35', NULL),
(8, 'Eduardo', 'Ayuda', 4, 14, NULL, '2022-08-03 08:44:12', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiarios_detalle`
--

CREATE TABLE `beneficiarios_detalle` (
  `id` int(11) NOT NULL,
  `idben` int(11) DEFAULT NULL,
  `campo` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `estatus` varchar(100) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `beneficiarios_detalle`
--

INSERT INTO `beneficiarios_detalle` (`id`, `idben`, `campo`, `imagen`, `estatus`) VALUES
(1, 1, '', 'images/4858d999e22ac637d4b5f2b6482d1fd3.jpg', 'Activo'),
(2, 3, 'kxmd', '', 'Activo'),
(3, 3, '', 'images/', 'Activo'),
(4, 4, '', 'images/', 'Activo'),
(5, 5, '', 'images/', 'Activo'),
(6, 5, 'Ocampo 895', '', 'Activo'),
(7, 6, '', 'images/', 'Activo'),
(8, 6, 'ocampo', '', 'Activo'),
(9, 7, '', 'images/', 'Activo'),
(10, 7, 'll', '', 'Activo'),
(11, 8, '', 'images/', 'Activo'),
(12, 8, 'll', '', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dep`
--

CREATE TABLE `dep` (
  `id` int(11) NOT NULL,
  `departamento` varchar(100) NOT NULL,
  `Solicitador` varchar(150) NOT NULL,
  `estatus` varchar(100) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dep`
--

INSERT INTO `dep` (`id`, `departamento`, `Solicitador`, `estatus`) VALUES
(2, 'Oficialia Mayor', 'Guillermo Montoya', 'Activo'),
(15, 'DIF', 'Lic  Nuria Vargas', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `idBen` int(11) NOT NULL,
  `tabla` varchar(200) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `idBen`, `tabla`, `fecha`, `admin`) VALUES
(1, 1, 'apoyo1', '2022-05-16 11:44:44', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `idtipusu` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`idtipusu`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Directivo'),
(3, 'Registrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `apoyo1`
--
ALTER TABLE `apoyo1`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `apoyo2`
--
ALTER TABLE `apoyo2`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `apoyo3`
--
ALTER TABLE `apoyo3`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `apoyo4`
--
ALTER TABLE `apoyo4`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `apoyos`
--
ALTER TABLE `apoyos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDep` (`idDep`);

--
-- Indices de la tabla `ayuda2`
--
ALTER TABLE `ayuda2`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ayudas`
--
ALTER TABLE `ayudas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `beneficiarios`
--
ALTER TABLE `beneficiarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `beneficiarios_detalle`
--
ALTER TABLE `beneficiarios_detalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dep`
--
ALTER TABLE `dep`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin` (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`idtipusu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `apoyo1`
--
ALTER TABLE `apoyo1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `apoyo2`
--
ALTER TABLE `apoyo2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apoyo3`
--
ALTER TABLE `apoyo3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apoyo4`
--
ALTER TABLE `apoyo4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apoyos`
--
ALTER TABLE `apoyos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `ayuda2`
--
ALTER TABLE `ayuda2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ayudas`
--
ALTER TABLE `ayudas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `beneficiarios`
--
ALTER TABLE `beneficiarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `beneficiarios_detalle`
--
ALTER TABLE `beneficiarios_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `dep`
--
ALTER TABLE `dep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `idtipusu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
