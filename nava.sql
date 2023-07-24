-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-07-2023 a las 07:23:27
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `nombres`, `apellidos`, `usuarios`, `contrasena`, `estatus`, `idtipusu`) VALUES
(2, 'Yazmin', 'Montoya Mireles', 'Administrador1', '$2y$15$YtU9j.Gfl/.9iEHAXaw6Lell3kwBwK37tlsAlJ/IqVnagyBW13Nwy', 'Inactivo', 1),
(4, 'eduardo', 'lopez', 'Registrador', '$2y$15$YtU9j.Gfl/.9iEHAXaw6Lell3kwBwK37tlsAlJ/IqVnagyBW13Nwy', 'Inactivo', 3),
(8, 'Yazmin', 'tellez', 'Administrador', '$2y$15$LaMjKnLcxbLV717z01FRu.EUn4l/BG0J2xynQWYv.NjvIIyltoSzq', 'Activo', 0),
(12, 'Esteban', 'Esparza', 'Administrador', '$2y$15$EIrTc//k6VBoi.UzHiBVe.nq.csdVptPDzHKakVD74A.wpKAqdlqG', 'Activo', 0),
(13, 'eduardo', 'lopez tovar', 'Administrador', '$2y$15$bce/E6H0xPnOch2Um736q.PT01uhczCAynLfHzalQN9TH.Uaa82RC', 'Activo', 0),
(14, 'Yazmin', 'Montoya Mireles', 'Directivo', '$2y$15$YtU9j.Gfl/.9iEHAXaw6Lell3kwBwK37tlsAlJ/IqVnagyBW13Nwy', 'Inactivo', 2),
(15, 'Humberto', 'Rangel', 'Humberto', '$2y$15$D7KJGngCTe1MXy5ea8jXZuOEpTabk6Lm6keXO39lP41I2Oc4Ngc7e', 'Inactivo', 2),
(16, 'DULCE', 'LARA LUJANO', 'DULCELARA', '$2y$15$/3pIPGmkfg..uJMWdKUnY.hH1lAK9prszprozkH1j6VDFP2iJ9pOi', 'Inactivo', 2),
(17, 'ARACELY', 'MARTINEZ DIAZ', 'ARACELY', '$2y$15$XEtDnN5i.kWWCv7DSbeRruLYX8/rCyvvdFxpQItSmVcB8SVyNrTLW', 'Inactivo', 3),
(18, 'Laura Patricia ', 'Herrera Hernandez', 'Laurita22', '$2y$15$cFlID353WVJCd8BZY7kweu2CidqEDJ11Ik.bGcEcDeieSDVxeNDhS', 'Inactivo', 3),
(19, 'Rosy', 'Cornejo', 'Rosy', '$2y$15$D5FWuHwBu4oF0YeUAXp/n.RxwZx8YHchdfl7Q6qI6Qzp0zNCMUOgG', 'Activo', 1),
(20, 'Alejandra', 'martinez ', 'alexandra', '$2y$15$dZwwa7bDwSqWpJW.7y5SX.envVzTI/f7yprb9sPHATM0KRjYH1Pla', 'Activo', 1),
(21, 'Brenda Berenice', 'Calzoncit Najera', 'Brenda', '$2y$15$1pl45QlcR6SIC9DgknMdY.tz91n0WCqPgKP65VrpLtNHbJNSdi5U6', 'Activo', 2),
(22, 'Jesus Ivan', 'Garcia Rangel', 'jivangr10', '$2y$15$gE.ZdPOrJm8Dar7PhrxxdOOnHbboqVnx8Tcj7pAaVJSpImcqJVK/e', 'Activo', 1),
(23, 'RAMON', 'BARRERA', 'RAMON', '$2y$15$QQEqwjQ63lbRcpie6BoC0uI8v7p7dOBbUmfEIWgOVXGK24KTzwM1G', 'Activo', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `apoyos`
--

INSERT INTO `apoyos` (`id`, `apoyo`, `idDep`, `cantidad`, `campos`, `tipo`, `admin`, `estatus`) VALUES
(23, 'kilometro de plata', 18, '4', 'Nombre completo|Direccion|Credencial de elector|Fotografia', 'Textos|Letra y numero|Imagen|Imagen', 19, 'Activo'),
(24, 'Descuentos de Traslados', 15, '5', 'Oficio|credencial de elector|Carnet|curp|Acompa?ante', 'Imagen|Imagen|Imagen|Imagen|Textos', 21, 'Activo'),
(25, 'APARATOS ORTOPEDICOS ', 15, '4', 'INE|NOMBRE|APARATO OTORGADO|EVIDENCIA', 'Imagen|Textos|Textos|Imagen', 20, 'Activo'),
(26, 'Economico', 18, '5', 'Nombre|Motivo|Cantidad Asignada|Firma|INE', 'Textos|Imagen|Numeros|Imagen|Imagen', 23, 'Activo'),
(27, 'Economico de condinacion ', 18, '4', 'Nombre|Especificacion de la solicitud|INE|Comprobante', 'Textos|Letra y numero|Imagen|Imagen', 23, 'Activo'),
(28, 'Permiso de loteria ', 18, '6', 'Nombre|Motivo Especifico|Dia|Hora|lugar|Credencial', 'Textos|Textos|Letra y numero|Letra y numero|Letra y numero|Imagen', 23, 'Activo');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ayudas`
--

INSERT INTO `ayudas` (`id`, `ayuda`, `idDep`, `cantidad`, `campos`, `tipo`, `admin`, `estatus`) VALUES
(11, 'Economico', 18, '6', 'Nombre|Ciudad|Motivo|Credencial|Cantidad Asignada|Evidencia', 'Textos|Textos|Textos|Imagen|Numeros|Imagen', 19, 'Activo'),
(12, 'Despensa', 15, '4', 'Nombre|Motivo|Credencial|Evidencia', 'Textos|Textos|Imagen|Imagen', 19, 'Inactivo'),
(13, 'Economico', 15, '5', 'Nombre|Motivo|Credencial|Cantidad Asignada|Evidencia', 'Textos|Textos|Imagen|Numeros|Imagen', 19, 'Activo'),
(14, 'Despensa', 18, '4', 'Nombre|Motivo|Credencial|Evidencia', 'Textos|Textos|Imagen|Imagen', 19, 'Activo'),
(15, 'PA?ALES ', 15, '5', 'NOMBRE|INE|NI?O O ADULTO|TALLA|EVIDENCIA', 'Textos|Imagen|Textos|Textos|Imagen', 20, 'Activo'),
(16, 'DESPENSA', 18, '2', 'INE|EVIDENCIA', 'Imagen|Imagen', 23, 'Activo');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `beneficiarios`
--

INSERT INTO `beneficiarios` (`id`, `nombres`, `tipo`, `idBen`, `admin`, `evidencia`, `fecha_evidencia`, `usuario_evidencia`) VALUES
(31, 'Eleazar', 'Apoyo', 23, 19, 'images/WhatsApp-Image-2021-06-24-at-14.55.06.jpg', '2023-02-03 00:00:00', 19),
(32, 'Cintya Perez', 'Ayuda', 13, 19, 'images/WhatsApp Image 2023-01-17 at 5.20.16 PM.jpeg', '2023-01-17 00:00:00', 19),
(33, 'Jose Angel Salinas Martinez', 'Ayuda', 12, 19, 'images/WhatsApp Image 2023-01-17 at 5.02.49 PM.jpeg', '2023-01-19 00:00:00', 19),
(34, 'Blanca Gabriela Sanchez Alvizo', 'Apoyo', 24, 21, 'images/WhatsApp Image 2023-02-24 at 12.41.13 PM.jpeg', '2023-02-22 00:00:00', 21),
(35, 'ANTONIO HERNANDEZ MONTOYA', 'Ayuda', 15, 20, 'images/WhatsApp Image 2023-02-15 at 1.12.45 PM.jpeg', '2023-02-24 00:00:00', 20),
(36, 'JORGE LUIS GARCIA MARTINEZ', 'Apoyo', 25, 20, 'images/WhatsApp Image 2023-02-24 at 1.08.07 PM.jpeg', '2023-01-31 00:00:00', 20),
(37, 'Dolores ISela Chavez Alvizo', 'Ayuda', 12, 21, NULL, '2023-02-24 13:13:45', NULL),
(38, 'MISSAEL ALEJANDRO', 'Ayuda', 16, 23, 'images/FOTO DE MISSAEL.jpg', '2023-02-28 00:00:00', 23),
(39, 'CARLOS JAVIER GARCIA JALOMO', 'Apoyo', 26, 23, 'images/WhatsApp Image 2023-03-02 at 12.08.25 PM.jpeg', '2023-01-06 00:00:00', 23),
(40, 'MARTA ARACELI GARCIA MORENO', 'Apoyo', 26, 23, 'images/WhatsApp Image 2023-03-02 at 12.14.58 PM.jpeg', '2023-01-06 00:00:00', 23),
(41, 'ORALIA DE JESUS RODRIGUEZ ALVARADO', 'Apoyo', 26, 23, 'images/WhatsApp Image 2023-03-02 at 12.26.01 PM.jpeg', '2023-01-16 00:00:00', 23),
(42, 'DANIELA GUADALUPE ALVIZO MARES', 'Apoyo', 27, 23, 'images/WhatsApp Image 2023-03-02 at 12.32.26 PM.jpeg', '2023-01-09 00:00:00', 23),
(43, 'MARIA ELENA MALDONADO MONTELONGO', 'Apoyo', 26, 23, 'images/WhatsApp Image 2023-03-02 at 12.40.17 PM.jpeg', '2023-01-16 00:00:00', 23),
(44, 'MARIA CRUZ RODRIGUEZ HERNANDEZ', 'Apoyo', 26, 23, 'images/WhatsApp Image 2023-03-02 at 12.50.00 PM.jpeg', '2023-01-17 00:00:00', 23),
(45, 'DEYSI DOLORES FAVILA CAMACHO', 'Apoyo', 26, 23, 'images/WhatsApp Image 2023-03-02 at 12.59.22 PM.jpeg', '2023-01-18 00:00:00', 23),
(46, 'BEATRIZ ALEJANDRA BLADERAS FLORES', 'Apoyo', 26, 23, 'images/WhatsApp Image 2023-03-03 at 10.11.16 AM.jpeg', '2023-01-17 00:00:00', 23),
(47, 'CINTHYA YOLANDA PEREZ CABIALES', 'Apoyo', 26, 23, 'images/WhatsApp Image 2023-03-03 at 10.16.03 AM.jpeg', '2023-01-18 00:00:00', 23),
(48, 'CARMEN CELIA GOZALES ALONZO', 'Apoyo', 28, 23, 'images/WhatsApp Image 2023-03-03 at 10.27.51 AM.jpeg', '2023-01-18 00:00:00', 23),
(49, 'MARIA GUADALUPE ZAMORA LOPEZ', 'Apoyo', 23, 23, 'images/WhatsApp Image 2023-03-03 at 10.39.30 AM.jpeg', '2023-01-20 00:00:00', 23),
(50, 'ROSA HILDA MONSIVAIS GARABAY', 'Apoyo', 26, 23, 'images/WhatsApp Image 2023-03-03 at 11.02.47 AM.jpeg', '2023-01-20 00:00:00', 23),
(51, 'MARIA AVALOS SOTELO', 'Apoyo', 26, 23, 'images/WhatsApp Image 2023-03-03 at 11.07.56 AM.jpeg', '2023-01-23 00:00:00', 23),
(52, 'SAN JUANITA LORENA VIERA WONG', 'Apoyo', 26, 23, 'images/WhatsApp Image 2023-03-03 at 11.12.00 AM.jpeg', '2023-01-24 00:00:00', 23),
(53, 'KEVIN SAMUEL LARA REGINO', 'Apoyo', 26, 23, 'images/WhatsApp Image 2023-03-03 at 11.17.49 AM.jpeg', '2023-01-24 00:00:00', 23),
(54, 'ADRIANA ROCHA CISNEROS', 'Apoyo', 26, 23, NULL, '2023-03-03 11:24:52', NULL),
(55, 'MARIA DE LOURDES GARZA GARZA', 'Apoyo', 25, 20, NULL, '2023-03-06 12:15:21', NULL),
(56, 'SERGIO LOPEZ SANCHEZ', 'Apoyo', 25, 20, NULL, '2023-03-06 12:19:12', NULL),
(57, 'VICTOR MANUEL ESCOBEDO REYES', 'Apoyo', 25, 20, NULL, '2023-03-06 12:23:09', NULL),
(58, 'LEOBARDO MEDINA RINCON', 'Apoyo', 25, 20, NULL, '2023-03-06 12:25:53', NULL),
(59, 'MA DE LOS ANGELES MORENO ALVAREZ', 'Apoyo', 25, 20, NULL, '2023-03-06 12:27:45', NULL),
(60, 'BRENDA MARGARITA MANRIQUEZ RODRIGUEZ', 'Apoyo', 25, 20, NULL, '2023-03-06 12:30:05', NULL),
(61, 'AUDELIA LOPEZ GARZA', 'Apoyo', 25, 20, NULL, '2023-03-06 12:49:35', NULL),
(62, 'JOSE JUAN FUENTES MORIN', 'Apoyo', 25, 20, NULL, '2023-03-06 12:51:28', NULL),
(63, 'BERTHA ALICIA COLORADO MANCILLAS', 'Apoyo', 25, 20, 'images/WhatsApp Image 2023-03-06 at 12.52.59 PM.jpeg', '0000-00-00 00:00:00', 20),
(64, 'ELIDA GUARDIOLA PATENA', 'Apoyo', 25, 20, 'images/WhatsApp Image 2023-03-06 at 12.55.41 PM.jpeg', '0000-00-00 00:00:00', 20),
(65, 'JOSE LUIS GARCIA MARTINEZ', 'Apoyo', 25, 20, 'images/WhatsApp Image 2023-03-06 at 12.58.55 PM.jpeg', '0000-00-00 00:00:00', 20),
(66, 'IMELDA PE?A LOPEZ', 'Apoyo', 25, 20, 'images/WhatsApp Image 2023-03-06 at 12.58.55 PM.jpeg', '0000-00-00 00:00:00', 20),
(67, 'BELIA IBARRA MOTELONGO', 'Ayuda', 15, 20, 'images/WhatsApp Image 2023-03-08 at 11.20.55 AM.jpeg', '0000-00-00 00:00:00', 20),
(68, 'ROSA MA DEL CARMEN LECHIUGA GOMEZ', 'Ayuda', 15, 20, 'images/WhatsApp Image 2023-03-08 at 11.23.10 AM.jpeg', '0000-00-00 00:00:00', 20),
(69, 'HILDA PATRICIA AGUIRRE MEZA', 'Ayuda', 15, 20, 'images/WhatsApp Image 2023-03-08 at 11.25.36 AM.jpeg', '0000-00-00 00:00:00', 20),
(70, 'ALMA ADELIA MU?OZ PEREZ', 'Ayuda', 15, 20, 'images/WhatsApp Image 2023-03-08 at 11.38.42 AM.jpeg', '0000-00-00 00:00:00', 20),
(71, 'MONICA JUDITH GARCIA MORADO', 'Ayuda', 15, 20, 'images/WhatsApp Image 2023-03-08 at 11.43.36 AM.jpeg', '0000-00-00 00:00:00', 20),
(72, 'BLANCA ESTHELA RIOS GOMEZ', 'Ayuda', 15, 20, 'images/WhatsApp Image 2023-03-08 at 11.46.48 AM.jpeg', '0000-00-00 00:00:00', 20),
(73, 'EVA GONZALES BANDERAS', 'Ayuda', 15, 20, 'images/WhatsApp Image 2023-03-08 at 11.53.50 AM.jpeg', '0000-00-00 00:00:00', 20),
(74, 'HOMERO MORALES NI?O', 'Ayuda', 15, 20, 'images/WhatsApp Image 2023-03-08 at 11.55.59 AM.jpeg', '0000-00-00 00:00:00', 20),
(75, 'ALMA DELIA PEREZ MU?OZ', 'Ayuda', 15, 20, 'images/WhatsApp Image 2023-03-08 at 11.57.43 AM.jpeg', '0000-00-00 00:00:00', 20),
(76, 'MARTHA MIRELES RIOS', 'Ayuda', 15, 20, 'images/WhatsApp Image 2023-03-08 at 12.12.08 PM.jpeg', '0000-00-00 00:00:00', 20),
(77, 'LESLY CITHALY SAUCEDO SANDOVAL', 'Ayuda', 15, 20, 'images/WhatsApp Image 2023-03-08 at 12.14.32 PM.jpeg', '0000-00-00 00:00:00', 20),
(78, 'GICELA ARREDONDO ARQUIDI', 'Ayuda', 15, 20, 'images/WhatsApp Image 2023-03-08 at 12.17.38 PM.jpeg', '0000-00-00 00:00:00', 20),
(79, 'ANDRE YESENIA SALAS RODRIGUEZ', 'Ayuda', 15, 20, 'images/WhatsApp Image 2023-03-08 at 12.20.53 PM.jpeg', '0000-00-00 00:00:00', 20),
(80, 'FELIPE RAMIREZ PEREZ', 'Ayuda', 15, 20, 'images/WhatsApp Image 2023-03-08 at 12.22.39 PM.jpeg', '0000-00-00 00:00:00', 20),
(81, 'MARTHA MICAELA CUELLAR MACARENO', 'Ayuda', 15, 20, 'images/WhatsApp Image 2023-03-08 at 12.26.18 PM.jpeg', '0000-00-00 00:00:00', 20),
(82, 'MARIO ALBERTO FERNADEZ IBARRA', 'Ayuda', 12, 20, 'images/WhatsApp Image 2023-03-08 at 12.30.16 PM.jpeg', '0000-00-00 00:00:00', 20),
(83, 'MANUEL SAUCEDO MEZA', 'Ayuda', 12, 20, 'images/WhatsApp Image 2023-03-08 at 12.34.20 PM.jpeg', '0000-00-00 00:00:00', 20),
(84, 'ANA SILVA CASTILLO GALLEGOS', 'Ayuda', 15, 20, 'images/WhatsApp Image 2023-03-08 at 12.37.19 PM.jpeg', '0000-00-00 00:00:00', 20),
(85, 'MARIA DE JESUS VALDEZ CARRIZALES', 'Ayuda', 15, 20, 'images/WhatsApp Image 2023-03-08 at 12.40.01 PM.jpeg', '0000-00-00 00:00:00', 20),
(86, 'FELIPE RAMIREZ PEREZ', 'Ayuda', 15, 20, 'images/WhatsApp Image 2023-03-08 at 12.52.36 PM.jpeg', '2023-01-12 00:00:00', 20),
(87, 'VERONICA GUADALUPE ALVAREZ LARA', 'Ayuda', 12, 20, 'images/WhatsApp Image 2023-03-09 at 12.26.52 PM.jpeg', '0000-00-00 00:00:00', 20),
(88, 'KARINA RAMIREZ TREJO', 'Ayuda', 12, 20, 'images/WhatsApp Image 2023-03-09 at 12.29.13 PM.jpeg', '0000-00-00 00:00:00', 20),
(89, 'JOSE ANGEL SALINAS MARTINEZ', 'Ayuda', 12, 20, 'images/WhatsApp Image 2023-03-09 at 12.30.59 PM.jpeg', '0000-00-00 00:00:00', 20),
(90, 'ANTONIA ALVARADO CONTRERAS', 'Ayuda', 12, 20, 'images/WhatsApp Image 2023-03-09 at 12.33.39 PM.jpeg', '0000-00-00 00:00:00', 20),
(91, 'MARIA ELENA MALDONADO MONTELONGO', 'Ayuda', 12, 20, NULL, '2023-03-09 12:38:47', NULL),
(92, 'TOMASVILLASANA RAZO', 'Ayuda', 12, 20, 'images/WhatsApp Image 2023-03-09 at 12.36.58 PM.jpeg', '0000-00-00 00:00:00', 20),
(93, 'GUADALUPE PATENA HERRERA', 'Ayuda', 12, 20, 'images/WhatsApp Image 2023-03-09 at 12.42.29 PM.jpeg', '0000-00-00 00:00:00', 20),
(94, 'VERONICA GUADALUPE ALVAREZ LARA', 'Ayuda', 12, 20, NULL, '2023-03-09 12:48:23', NULL),
(95, 'ELOISA SILVA HERNANDEZ', 'Ayuda', 12, 20, NULL, '2023-03-09 12:50:24', NULL),
(96, 'LORENA ESCALANTE GARCES', 'Apoyo', 24, 20, NULL, '2023-03-10 12:01:39', NULL),
(97, 'MARIA CARMEN OSORNIO LOPEZ', 'Apoyo', 24, 20, 'images/WhatsApp Image 2023-03-10 at 12.04.28 PM.jpeg', '2023-03-06 00:00:00', 20),
(98, 'CINTHIA YOLANDA PEREZ CABRIALES', 'Apoyo', 24, 20, 'images/WhatsApp Image 2023-03-10 at 12.10.59 PM.jpeg', '2023-01-23 00:00:00', 20),
(99, 'BLANCA GABRIELA CHAVEZ ALVIZO', 'Apoyo', 24, 20, 'images/WhatsApp Image 2023-03-10 at 12.14.37 PM.jpeg', '2023-02-22 00:00:00', 20),
(100, 'BLANCA GABRIELA CHAVEZ ALVIZO', 'Apoyo', 24, 20, NULL, '2023-03-10 12:24:54', NULL),
(101, 'MARTHA MAGDALENA DE ANDA RAMIREZ', 'Apoyo', 26, 23, 'images/WhatsApp Image 2023-03-13 at 11.58.27 AM.jpeg', '2023-02-13 00:00:00', 23),
(102, 'BERTHA ALICIA RAMIREZ LIRA', 'Apoyo', 26, 23, 'images/WhatsApp Image 2023-03-13 at 12.02.29 PM.jpeg', '2023-02-03 00:00:00', 23),
(103, 'ROSA GUADALUPE AGUIRRE RAMIREZ', 'Apoyo', 26, 23, 'images/WhatsApp Image 2023-03-14 at 10.32.31 AM.jpeg', '2023-02-07 00:00:00', 23),
(104, 'PEDRO MALDONADO GONZALEZ', 'Apoyo', 26, 23, 'images/WhatsApp Image 2023-03-14 at 10.36.18 AM.jpeg', '2023-02-13 00:00:00', 23),
(105, 'JESUS CHACON ORTIZ', 'Apoyo', 26, 23, 'images/WhatsApp Image 2023-03-14 at 10.43.12 AM.jpeg', '2023-02-15 00:00:00', 23),
(106, 'C MA DE LA PAZ ESQUEDA SOLIS', 'Apoyo', 26, 23, 'images/WhatsApp Image 2023-03-14 at 10.45.22 AM.jpeg', '2023-02-15 00:00:00', 23),
(107, 'MIGUEL ALEJANDRO BANDA BALLESTEROS', 'Ayuda', 13, 23, 'images/WhatsApp Image 2023-03-14 at 10.52.20 AM.jpeg', '2023-02-16 00:00:00', 23),
(108, 'CARMEN YOLANDA SANCHEZ FUENTES', 'Apoyo', 26, 23, 'images/WhatsApp Image 2023-03-14 at 11.00.33 AM.jpeg', '2023-02-17 00:00:00', 23);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `beneficiarios_detalle`
--

INSERT INTO `beneficiarios_detalle` (`id`, `idben`, `campo`, `imagen`, `estatus`) VALUES
(43, 31, 'Eleazar Romos Perez', '', 'Activo'),
(44, 31, 'Nava ', '', 'Activo'),
(45, 31, '', 'images/WhatsApp-Image-2021-06-24-at-14.55.06.jpg', 'Activo'),
(46, 31, '', 'images/WhatsApp-Image-2021-06-24-at-14.55.06.jpg', 'Activo'),
(47, 32, 'Cintya Perez', '', 'Activo'),
(48, 32, 'Falta de trabajo ', '', 'Activo'),
(49, 32, '', 'images/ife.jpg', 'Activo'),
(50, 32, '1500', '', 'Activo'),
(51, 32, '', 'images/WhatsApp Image 2023-01-17 at 5.20.16 PM.jpeg', 'Activo'),
(52, 33, 'Jose Angel Salinas Martinez', '', 'Activo'),
(53, 33, 'Falta de trabajo ', '', 'Activo'),
(54, 33, '', 'images/f768x1-367790_367917_26.jpeg', 'Activo'),
(55, 33, '', 'images/WhatsApp Image 2023-01-17 at 5.02.49 PM.jpeg', 'Activo'),
(56, 34, '', 'images/WhatsApp Image 2023-02-24 at 12.41.13 PM.jpeg', 'Activo'),
(57, 34, '', 'images/WhatsApp Image 2023-02-24 at 12.41.41 PM.jpeg', 'Activo'),
(58, 34, '', 'images/WhatsApp Image 2023-02-24 at 12.42.02 PM.jpeg', 'Activo'),
(59, 34, '', 'images/WhatsApp Image 2023-02-24 at 12.43.12 PM.jpeg', 'Activo'),
(60, 34, 'NO APLICA', '', 'Activo'),
(61, 35, 'ANTONIO HERNANDEZ MONTOYA ', '', 'Activo'),
(62, 35, '', 'images/WhatsApp Image 2023-02-24 at 12.54.03 PM.jpeg', 'Activo'),
(63, 35, 'ADULTO ', '', 'Activo'),
(64, 35, 'XL', '', 'Activo'),
(65, 35, '', 'images/WhatsApp Image 2023-02-15 at 1.12.45 PM.jpeg', 'Activo'),
(66, 36, '', 'images/WhatsApp Image 2023-02-24 at 1.08.05 PM.jpeg', 'Activo'),
(67, 36, 'JORGE LUIS GARCIA MARTINEZ ', '', 'Activo'),
(68, 36, 'SILLA DE RUEDA ', '', 'Activo'),
(69, 36, '', 'images/WhatsApp Image 2023-02-24 at 1.08.07 PM.jpeg', 'Activo'),
(70, 37, 'Dolores Isela Chavez Alvizo', '', 'Activo'),
(71, 37, 'Falta de Recursos', '', 'Activo'),
(72, 37, '', 'images/WhatsApp Image 2023-02-24 at 1.12.24 PM.jpeg', 'Activo'),
(73, 37, '', 'images/WhatsApp Image 2023-02-24 at 1.12.43 PM.jpeg', 'Activo'),
(74, 38, '', 'images/INE DE MISSAEL.jpg', 'Activo'),
(75, 38, '', 'images/FOTO DE MISSAEL.jpg', 'Activo'),
(76, 39, 'CARLOS JAVIER GARCIA JALOMO', '', 'Activo'),
(77, 39, '', 'images/WhatsApp Image 2023-03-02 at 12.07.58 PM.jpeg', 'Activo'),
(78, 39, '2000', '', 'Activo'),
(79, 39, '', 'images/WhatsApp Image 2023-03-02 at 12.08.15 PM.jpeg', 'Activo'),
(80, 39, '', 'images/WhatsApp Image 2023-03-02 at 12.08.25 PM.jpeg', 'Activo'),
(81, 40, 'MARTA ARACELI GARCIA MORENO', '', 'Activo'),
(82, 40, '', 'images/WhatsApp Image 2023-03-02 at 12.14.32 PM.jpeg', 'Activo'),
(83, 40, '350', '', 'Activo'),
(84, 40, '', 'images/WhatsApp Image 2023-03-02 at 12.14.55 PM.jpeg', 'Activo'),
(85, 40, '', 'images/WhatsApp Image 2023-03-02 at 12.14.58 PM.jpeg', 'Activo'),
(86, 41, 'ORALIA DE JESUS RODRIGUEZ ALVARADO ', '', 'Activo'),
(87, 41, '', 'images/WhatsApp Image 2023-03-02 at 12.25.18 PM.jpeg', 'Activo'),
(88, 41, '2500', '', 'Activo'),
(89, 41, '', 'images/WhatsApp Image 2023-03-02 at 12.25.40 PM.jpeg', 'Activo'),
(90, 41, '', 'images/WhatsApp Image 2023-03-02 at 12.26.01 PM.jpeg', 'Activo'),
(91, 42, 'DANIELA GUADALUPE ALVIZO MARES ', '', 'Activo'),
(92, 42, 'Radiografia de abdomen para su hija ', '', 'Activo'),
(93, 42, '', 'images/WhatsApp Image 2023-03-02 at 12.32.26 PM.jpeg', 'Activo'),
(94, 42, '', 'images/WhatsApp Image 2023-03-02 at 12.32.42 PM.jpeg', 'Activo'),
(95, 43, 'MARIA ELENA MALDONADO ONTELONGO', '', 'Activo'),
(96, 43, '', 'images/WhatsApp Image 2023-03-02 at 12.39.59 PM.jpeg', 'Activo'),
(97, 43, '405', '', 'Activo'),
(98, 43, '', 'images/WhatsApp Image 2023-03-02 at 12.40.00 PM.jpeg', 'Activo'),
(99, 43, '', 'images/WhatsApp Image 2023-03-02 at 12.40.17 PM.jpeg', 'Activo'),
(100, 44, 'MARIA CRUZ RODRIGUEZ HERNANDEZ ', '', 'Activo'),
(101, 44, '', 'images/WhatsApp Image 2023-03-02 at 12.50.01 PM.jpeg', 'Activo'),
(102, 44, '600', '', 'Activo'),
(103, 44, '', 'images/WhatsApp Image 2023-03-02 at 12.50.29 PM.jpeg', 'Activo'),
(104, 44, '', 'images/WhatsApp Image 2023-03-02 at 12.50.00 PM.jpeg', 'Activo'),
(105, 45, 'DEYSI DOLORES FAVILA CAMACHO', '', 'Activo'),
(106, 45, '', 'images/WhatsApp Image 2023-03-02 at 12.59.10 PM.jpeg', 'Activo'),
(107, 45, '629', '', 'Activo'),
(108, 45, '', 'images/WhatsApp Image 2023-03-02 at 12.59.51 PM.jpeg', 'Activo'),
(109, 45, '', 'images/WhatsApp Image 2023-03-02 at 12.59.22 PM.jpeg', 'Activo'),
(110, 46, 'BEATRIZ ALEJANDRA BANDERAS FLORES ', '', 'Activo'),
(111, 46, '', 'images/WhatsApp Image 2023-03-03 at 10.10.23 AM.jpeg', 'Activo'),
(112, 46, '1500', '', 'Activo'),
(113, 46, '', 'images/WhatsApp Image 2023-03-03 at 10.10.46 AM.jpeg', 'Activo'),
(114, 46, '', 'images/WhatsApp Image 2023-03-03 at 10.11.16 AM.jpeg', 'Activo'),
(115, 47, 'CINTHYA YOLANDA PEREZ CABIALES ', '', 'Activo'),
(116, 47, '', 'images/WhatsApp Image 2023-03-03 at 10.15.32 AM.jpeg', 'Activo'),
(117, 47, '300', '', 'Activo'),
(118, 47, '', 'images/WhatsApp Image 2023-03-03 at 10.15.46 AM.jpeg', 'Activo'),
(119, 47, '', 'images/WhatsApp Image 2023-03-03 at 10.16.03 AM.jpeg', 'Activo'),
(120, 49, 'MARIA GUADALUPE ZAMORA LOPEZ ', '', 'Activo'),
(121, 49, 'Boulevard Leonides Guadarrama frente a la secundaria tecnica 90 Jose Zertuche Reyes', '', 'Activo'),
(122, 49, '', 'images/WhatsApp Image 2023-03-03 at 10.39.30 AM.jpeg', 'Activo'),
(123, 49, '', 'images/WhatsApp Image 2023-03-03 at 10.39.24 AM.jpeg', 'Activo'),
(124, 50, 'ROSA HILDA MONSIVAIS GARABAY', '', 'Activo'),
(125, 50, '', 'images/WhatsApp Image 2023-03-03 at 11.02.38 AM.jpeg', 'Activo'),
(126, 50, '1199', '', 'Activo'),
(127, 50, '', 'images/WhatsApp Image 2023-03-03 at 11.03.05 AM.jpeg', 'Activo'),
(128, 50, '', 'images/WhatsApp Image 2023-03-03 at 11.02.47 AM.jpeg', 'Activo'),
(129, 51, 'MARIA AVALOS SOTELO', '', 'Activo'),
(130, 51, '', 'images/WhatsApp Image 2023-03-03 at 11.07.20 AM.jpeg', 'Activo'),
(131, 51, '1000', '', 'Activo'),
(132, 51, '', 'images/WhatsApp Image 2023-03-03 at 11.07.36 AM.jpeg', 'Activo'),
(133, 51, '', 'images/WhatsApp Image 2023-03-03 at 11.07.56 AM.jpeg', 'Activo'),
(134, 52, 'SAN JUANITA LORENA VIERA WONG ', '', 'Activo'),
(135, 52, '', 'images/WhatsApp Image 2023-03-03 at 11.11.22 AM.jpeg', 'Activo'),
(136, 52, '1000', '', 'Activo'),
(137, 52, '', 'images/WhatsApp Image 2023-03-03 at 11.11.41 AM.jpeg', 'Activo'),
(138, 52, '', 'images/WhatsApp Image 2023-03-03 at 11.12.00 AM.jpeg', 'Activo'),
(139, 53, 'KEVIN SAMUEL LARA REGINO', '', 'Activo'),
(140, 53, '', 'images/WhatsApp Image 2023-03-03 at 11.17.16 AM.jpeg', 'Activo'),
(141, 53, '500', '', 'Activo'),
(142, 53, '', 'images/WhatsApp Image 2023-03-03 at 11.17.35 AM.jpeg', 'Activo'),
(143, 53, '', 'images/WhatsApp Image 2023-03-03 at 11.17.49 AM.jpeg', 'Activo'),
(144, 54, 'ADRIANA ROCHA CISNEROS ', '', 'Activo'),
(145, 54, '', 'images/WhatsApp Image 2023-03-03 at 11.22.13 AM.jpeg', 'Activo'),
(146, 54, '1000', '', 'Activo'),
(147, 54, '', 'images/WhatsApp Image 2023-03-03 at 11.23.07 AM.jpeg', 'Activo'),
(148, 54, '', 'images/WhatsApp Image 2023-03-03 at 11.22.28 AM.jpeg', 'Activo'),
(149, 55, '', 'images/WhatsApp Image 2023-03-06 at 12.11.45 PM.jpeg', 'Activo'),
(150, 55, 'MARIA DE LOURDES GARZA GARZA ', '', 'Activo'),
(151, 55, 'ANDADOR ', '', 'Activo'),
(152, 55, '', 'images/WhatsApp Image 2023-03-06 at 12.11.45 PM.jpeg', 'Activo'),
(153, 56, '', 'images/WhatsApp Image 2023-03-06 at 12.18.05 PM.jpeg', 'Activo'),
(154, 56, 'SERGIO LOPEZ SANCHEZ ', '', 'Activo'),
(155, 56, 'MULETAS ', '', 'Activo'),
(156, 56, '', 'images/WhatsApp Image 2023-03-06 at 12.18.05 PM.jpeg', 'Activo'),
(157, 57, '', 'images/WhatsApp Image 2023-03-06 at 12.20.13 PM.jpeg', 'Activo'),
(158, 57, 'VICTOR MANUEL ESCOBEDO REYES ', '', 'Activo'),
(159, 57, 'ANDADERA ', '', 'Activo'),
(160, 57, '', 'images/WhatsApp Image 2023-03-06 at 12.20.36 PM.jpeg', 'Activo'),
(161, 58, '', 'images/WhatsApp Image 2023-03-06 at 12.24.05 PM.jpeg', 'Activo'),
(162, 58, 'LEOBARDO MEDINA RINCON ', '', 'Activo'),
(163, 58, 'SILLA DE BA?O', '', 'Activo'),
(164, 58, '', 'images/WhatsApp Image 2023-03-06 at 12.24.05 PM.jpeg', 'Activo'),
(165, 59, '', 'images/WhatsApp Image 2023-03-06 at 12.26.54 PM.jpeg', 'Activo'),
(166, 59, 'MA DE LOS ANGELES MORENO ALVAREZ ', '', 'Activo'),
(167, 59, 'SILLA DE RUEDAS ', '', 'Activo'),
(168, 59, '', 'images/WhatsApp Image 2023-03-06 at 12.26.54 PM.jpeg', 'Activo'),
(169, 60, '', 'images/WhatsApp Image 2023-03-06 at 12.28.46 PM.jpeg', 'Activo'),
(170, 60, 'BRENDA MARGARITA MANRIQUEZ RIDRIGUEZ ', '', 'Activo'),
(171, 60, 'MULETAS ', '', 'Activo'),
(172, 60, '', 'images/WhatsApp Image 2023-03-06 at 12.28.46 PM.jpeg', 'Activo'),
(173, 61, '', 'images/WhatsApp Image 2023-03-06 at 12.48.21 PM.jpeg', 'Activo'),
(174, 61, 'AUDELIA LOPEZ GARZA ', '', 'Activo'),
(175, 61, 'ANDADOR ', '', 'Activo'),
(176, 61, '', 'images/WhatsApp Image 2023-03-06 at 12.48.21 PM.jpeg', 'Activo'),
(177, 62, '', 'images/WhatsApp Image 2023-03-06 at 12.50.11 PM.jpeg', 'Activo'),
(178, 62, 'JOSE JUAN FUENTES MORIN ', '', 'Activo'),
(179, 62, 'SILLA DE RUEDAS ', '', 'Activo'),
(180, 62, '', 'images/WhatsApp Image 2023-03-06 at 12.50.11 PM.jpeg', 'Activo'),
(181, 63, '', 'images/WhatsApp Image 2023-03-06 at 12.52.59 PM.jpeg', 'Activo'),
(182, 63, 'BERTHA ALICIA COLORADO MANCILLAS ', '', 'Activo'),
(183, 63, 'SILLA DE RUEDAS ', '', 'Activo'),
(184, 63, '', 'images/WhatsApp Image 2023-03-06 at 12.52.59 PM.jpeg', 'Activo'),
(185, 64, '', 'images/WhatsApp Image 2023-03-06 at 12.55.41 PM.jpeg', 'Activo'),
(186, 64, 'ELIDA GUARDIOLA PATENA ', '', 'Activo'),
(187, 64, 'SILLA DE RUEDAS ', '', 'Activo'),
(188, 64, '', 'images/WhatsApp Image 2023-03-06 at 12.55.41 PM.jpeg', 'Activo'),
(189, 65, '', 'images/WhatsApp Image 2023-03-06 at 12.58.55 PM.jpeg', 'Activo'),
(190, 65, 'JOSE LUIS GARCIA MARTINEZ ', '', 'Activo'),
(191, 65, 'SILLA DE RUEDAS ', '', 'Activo'),
(192, 65, '', 'images/WhatsApp Image 2023-03-06 at 12.58.55 PM.jpeg', 'Activo'),
(193, 66, '', 'images/WhatsApp Image 2023-03-06 at 12.58.55 PM.jpeg', 'Activo'),
(194, 66, 'IMELDA PE?A LOPEZ', '', 'Activo'),
(195, 66, 'SILLA DE RUEDAS ', '', 'Activo'),
(196, 66, '', 'images/WhatsApp Image 2023-03-06 at 12.58.55 PM.jpeg', 'Activo'),
(197, 67, 'BELIA IBARRA MOTELONGO', '', 'Activo'),
(198, 67, '', 'images/WhatsApp Image 2023-03-08 at 11.20.55 AM.jpeg', 'Activo'),
(199, 67, 'ADULTO', '', 'Activo'),
(200, 67, 'XL', '', 'Activo'),
(201, 67, '', 'images/WhatsApp Image 2023-03-08 at 11.20.55 AM.jpeg', 'Activo'),
(202, 68, 'ROSA MA DEL CARMEN LECHUGA GOMEZ', '', 'Activo'),
(203, 68, '', 'images/WhatsApp Image 2023-03-08 at 11.23.10 AM.jpeg', 'Activo'),
(204, 68, 'ADULTO', '', 'Activo'),
(205, 68, 'M', '', 'Activo'),
(206, 68, '', 'images/WhatsApp Image 2023-03-08 at 11.23.10 AM.jpeg', 'Activo'),
(207, 69, 'HILDA PATRICIA AGUIRRE MEZA ', '', 'Activo'),
(208, 69, '', 'images/WhatsApp Image 2023-03-08 at 11.25.36 AM.jpeg', 'Activo'),
(209, 69, 'NI?O ', '', 'Activo'),
(210, 69, 'JOMBO', '', 'Activo'),
(211, 69, '', 'images/WhatsApp Image 2023-03-08 at 11.25.36 AM.jpeg', 'Activo'),
(212, 70, 'ALMA ADELIA PEREZ MU?OZ', '', 'Activo'),
(213, 70, '', 'images/WhatsApp Image 2023-03-08 at 11.38.42 AM.jpeg', 'Activo'),
(214, 70, 'ADULTO', '', 'Activo'),
(215, 70, 'L', '', 'Activo'),
(216, 70, '', 'images/WhatsApp Image 2023-03-08 at 11.38.42 AM.jpeg', 'Activo'),
(217, 71, 'MONICA JUDITH GARCIA MORADO ', '', 'Activo'),
(218, 71, '', 'images/WhatsApp Image 2023-03-08 at 11.43.36 AM.jpeg', 'Activo'),
(219, 71, 'NI?O', '', 'Activo'),
(220, 71, 'M', '', 'Activo'),
(221, 71, '', 'images/WhatsApp Image 2023-03-08 at 11.43.36 AM.jpeg', 'Activo'),
(222, 72, 'BLNACA ESTHELA ', '', 'Activo'),
(223, 72, '', 'images/WhatsApp Image 2023-03-08 at 11.46.48 AM.jpeg', 'Activo'),
(224, 72, 'NI?O', '', 'Activo'),
(225, 72, 'JUMBO', '', 'Activo'),
(226, 72, '', 'images/WhatsApp Image 2023-03-08 at 11.46.48 AM.jpeg', 'Activo'),
(227, 73, 'EVA GONZALES BANDERAS ', '', 'Activo'),
(228, 73, '', 'images/WhatsApp Image 2023-03-08 at 11.53.50 AM.jpeg', 'Activo'),
(229, 73, 'ADULTO', '', 'Activo'),
(230, 73, 'XL', '', 'Activo'),
(231, 73, '', 'images/WhatsApp Image 2023-03-08 at 11.53.50 AM.jpeg', 'Activo'),
(232, 74, 'HOMEROMORALES NI?O', '', 'Activo'),
(233, 74, '', 'images/WhatsApp Image 2023-03-08 at 11.55.59 AM.jpeg', 'Activo'),
(234, 74, 'ADULTO', '', 'Activo'),
(235, 74, 'XL', '', 'Activo'),
(236, 74, '', 'images/WhatsApp Image 2023-03-08 at 11.55.59 AM.jpeg', 'Activo'),
(237, 75, 'ALMA DELIA PEREZ MU?OZ', '', 'Activo'),
(238, 75, '', 'images/WhatsApp Image 2023-03-08 at 11.57.43 AM.jpeg', 'Activo'),
(239, 75, 'ADULTO', '', 'Activo'),
(240, 75, 'L', '', 'Activo'),
(241, 75, '', 'images/WhatsApp Image 2023-03-08 at 11.57.43 AM.jpeg', 'Activo'),
(242, 76, 'MARTHA MIRELES RIOS ', '', 'Activo'),
(243, 76, '', 'images/WhatsApp Image 2023-03-08 at 12.12.08 PM.jpeg', 'Activo'),
(244, 76, 'ADULTO', '', 'Activo'),
(245, 76, 'L', '', 'Activo'),
(246, 76, '', 'images/WhatsApp Image 2023-03-08 at 12.12.08 PM.jpeg', 'Activo'),
(247, 77, 'LESLY CITHALY SAUCEDO SANDOVAL ', '', 'Activo'),
(248, 77, '', 'images/WhatsApp Image 2023-03-08 at 12.14.32 PM.jpeg', 'Activo'),
(249, 77, 'NI?O', '', 'Activo'),
(250, 77, 'M', '', 'Activo'),
(251, 77, '', 'images/WhatsApp Image 2023-03-08 at 12.14.32 PM.jpeg', 'Activo'),
(252, 78, 'GICELA ARREDEDONDO ARQUIDI ', '', 'Activo'),
(253, 78, '', 'images/WhatsApp Image 2023-03-08 at 12.17.38 PM.jpeg', 'Activo'),
(254, 78, 'ADULTO', '', 'Activo'),
(255, 78, 'M', '', 'Activo'),
(256, 78, '', 'images/WhatsApp Image 2023-03-08 at 12.17.38 PM.jpeg', 'Activo'),
(257, 79, 'ANDREA YESENIA SALAS RODRIGUEZ ', '', 'Activo'),
(258, 79, '', 'images/WhatsApp Image 2023-03-08 at 12.20.53 PM.jpeg', 'Activo'),
(259, 79, 'NI?O', '', 'Activo'),
(260, 79, 'M', '', 'Activo'),
(261, 79, '', 'images/WhatsApp Image 2023-03-08 at 12.20.53 PM.jpeg', 'Activo'),
(262, 80, 'FELIPE RAMIREZ PEREZ ', '', 'Activo'),
(263, 80, '', 'images/WhatsApp Image 2023-03-08 at 12.22.39 PM.jpeg', 'Activo'),
(264, 80, 'ADULTO', '', 'Activo'),
(265, 80, 'XL', '', 'Activo'),
(266, 80, '', 'images/WhatsApp Image 2023-03-08 at 12.22.39 PM.jpeg', 'Activo'),
(267, 81, 'MARTHA MICAELA CUELLAR MACARE', '', 'Activo'),
(268, 81, '', 'images/WhatsApp Image 2023-03-08 at 12.25.53 PM.jpeg', 'Activo'),
(269, 81, 'ADULTO', '', 'Activo'),
(270, 81, 'XL', '', 'Activo'),
(271, 81, '', 'images/WhatsApp Image 2023-03-08 at 12.26.18 PM.jpeg', 'Activo'),
(272, 82, 'MARIO ALBERTO FERNANDEZ IBARRA ', '', 'Activo'),
(273, 82, 'DESEMPLEO ', '', 'Activo'),
(274, 82, '', 'images/WhatsApp Image 2023-03-08 at 12.30.01 PM.jpeg', 'Activo'),
(275, 82, '', 'images/WhatsApp Image 2023-03-08 at 12.30.16 PM.jpeg', 'Activo'),
(276, 83, 'MANUEL SAUCEDO MEZA ', '', 'Activo'),
(277, 83, 'DESEMPLEO ', '', 'Activo'),
(278, 83, '', 'images/WhatsApp Image 2023-03-08 at 12.34.06 PM.jpeg', 'Activo'),
(279, 83, '', 'images/WhatsApp Image 2023-03-08 at 12.34.20 PM.jpeg', 'Activo'),
(280, 84, 'ANA SILVA CASTILLO GALLEGOS', '', 'Activo'),
(281, 84, '', 'images/WhatsApp Image 2023-03-08 at 12.37.19 PM.jpeg', 'Activo'),
(282, 84, 'ADULTO', '', 'Activo'),
(283, 84, 'M', '', 'Activo'),
(284, 84, '', 'images/WhatsApp Image 2023-03-08 at 12.37.19 PM.jpeg', 'Activo'),
(285, 85, 'MARIA DE JESUS VALDEZ CARRIZALES ', '', 'Activo'),
(286, 85, '', 'images/WhatsApp Image 2023-03-08 at 12.39.42 PM.jpeg', 'Activo'),
(287, 85, 'ADULTO', '', 'Activo'),
(288, 85, 'L', '', 'Activo'),
(289, 85, '', 'images/WhatsApp Image 2023-03-08 at 12.40.01 PM.jpeg', 'Activo'),
(290, 86, 'FELIPE RAMIREZ P?REZ ', '', 'Activo'),
(291, 86, '', 'images/WhatsApp Image 2023-03-08 at 12.52.19 PM.jpeg', 'Activo'),
(292, 86, 'ADULTO', '', 'Activo'),
(293, 86, 'XL', '', 'Activo'),
(294, 86, '', 'images/WhatsApp Image 2023-03-08 at 12.52.36 PM.jpeg', 'Activo'),
(295, 87, 'VERONICA GUADALUPE ALVAREZ LARA ', '', 'Activo'),
(296, 87, 'DESEMPLEO ', '', 'Activo'),
(297, 87, '', 'images/WhatsApp Image 2023-03-09 at 12.26.52 PM.jpeg', 'Activo'),
(298, 87, '', 'images/WhatsApp Image 2023-03-09 at 12.26.52 PM.jpeg', 'Activo'),
(299, 88, 'KARINA RAMIREZ TREJO', '', 'Activo'),
(300, 88, 'DESEMPLEO ', '', 'Activo'),
(301, 88, '', 'images/WhatsApp Image 2023-03-09 at 12.29.13 PM.jpeg', 'Activo'),
(302, 88, '', 'images/WhatsApp Image 2023-03-09 at 12.29.13 PM.jpeg', 'Activo'),
(303, 89, 'JOSE ANGEL SALINAS MARTINEZ', '', 'Activo'),
(304, 89, 'DESEMPLEO ', '', 'Activo'),
(305, 89, '', 'images/WhatsApp Image 2023-03-09 at 12.30.59 PM.jpeg', 'Activo'),
(306, 89, '', 'images/WhatsApp Image 2023-03-09 at 12.30.59 PM.jpeg', 'Activo'),
(307, 90, 'ANTONIA ALVARADO CONTRERAS ', '', 'Activo'),
(308, 90, 'DESEMPLEO ', '', 'Activo'),
(309, 90, '', 'images/WhatsApp Image 2023-03-09 at 12.33.21 PM.jpeg', 'Activo'),
(310, 90, '', 'images/WhatsApp Image 2023-03-09 at 12.33.39 PM.jpeg', 'Activo'),
(311, 91, 'MARIA ELENA MALDONADO ONTELONGO', '', 'Activo'),
(312, 91, 'DESEMPLEO ', '', 'Activo'),
(313, 91, '', 'images/WhatsApp Image 2023-03-09 at 12.36.41 PM.jpeg', 'Activo'),
(314, 91, '', 'images/WhatsApp Image 2023-03-09 at 12.36.58 PM.jpeg', 'Activo'),
(315, 92, 'TOMAS VILLASANA RAZO', '', 'Activo'),
(316, 92, 'DESEMPLEO ', '', 'Activo'),
(317, 92, '', 'images/WhatsApp Image 2023-03-09 at 12.39.29 PM.jpeg', 'Activo'),
(318, 92, '', 'images/WhatsApp Image 2023-03-09 at 12.40.12 PM.jpeg', 'Activo'),
(319, 93, 'GUADALUPE PATENA HERRERA ', '', 'Activo'),
(320, 93, 'DESEMPLEO ', '', 'Activo'),
(321, 93, '', 'images/WhatsApp Image 2023-03-09 at 12.42.29 PM.jpeg', 'Activo'),
(322, 93, '', 'images/WhatsApp Image 2023-03-09 at 12.42.29 PM.jpeg', 'Activo'),
(323, 94, 'VERONICA GUADALUPE ALVAREZ LARA ', '', 'Activo'),
(324, 94, 'DESEMPLEO ', '', 'Activo'),
(325, 94, '', 'images/WhatsApp Image 2023-03-09 at 12.46.39 PM.jpeg', 'Activo'),
(326, 94, '', 'images/WhatsApp Image 2023-03-09 at 12.46.39 PM.jpeg', 'Activo'),
(327, 95, 'ELOISA SILVA HERNANDEZ ', '', 'Activo'),
(328, 95, 'DESEMPLEO ', '', 'Activo'),
(329, 95, '', 'images/WhatsApp Image 2023-03-09 at 12.49.13 PM.jpeg', 'Activo'),
(330, 95, '', 'images/WhatsApp Image 2023-03-09 at 12.49.13 PM.jpeg', 'Activo'),
(331, 96, '', 'images/WhatsApp Image 2023-03-10 at 11.57.37 AM.jpeg', 'Activo'),
(332, 96, '', 'images/WhatsApp Image 2023-03-10 at 11.57.37 AM.jpeg', 'Activo'),
(333, 96, '', 'images/WhatsApp Image 2023-03-10 at 11.58.14 AM.jpeg', 'Activo'),
(334, 96, '', 'images/WhatsApp Image 2023-03-10 at 11.58.14 AM.jpeg', 'Activo'),
(335, 96, 'APLICA ', '', 'Activo'),
(336, 97, '', 'images/WhatsApp Image 2023-03-10 at 12.03.46 PM.jpeg', 'Activo'),
(337, 97, '', 'images/WhatsApp Image 2023-03-10 at 12.04.09 PM.jpeg', 'Activo'),
(338, 97, '', 'images/WhatsApp Image 2023-03-10 at 12.04.28 PM.jpeg', 'Activo'),
(339, 97, '', 'images/WhatsApp Image 2023-03-10 at 12.03.46 PM.jpeg', 'Activo'),
(340, 97, 'APLICA ', '', 'Activo'),
(341, 98, '', 'images/WhatsApp Image 2023-03-10 at 12.10.45 PM.jpeg', 'Activo'),
(342, 98, '', 'images/WhatsApp Image 2023-03-10 at 12.10.45 PM.jpeg', 'Activo'),
(343, 98, '', 'images/WhatsApp Image 2023-03-10 at 12.10.59 PM.jpeg', 'Activo'),
(344, 98, '', 'images/WhatsApp Image 2023-03-10 at 12.10.59 PM.jpeg', 'Activo'),
(345, 98, 'APLICA ', '', 'Activo'),
(346, 99, '', 'images/WhatsApp Image 2023-03-10 at 12.14.19 PM.jpeg', 'Activo'),
(347, 99, '', 'images/WhatsApp Image 2023-03-10 at 12.14.19 PM.jpeg', 'Activo'),
(348, 99, '', 'images/WhatsApp Image 2023-03-10 at 12.14.37 PM.jpeg', 'Activo'),
(349, 99, '', 'images/WhatsApp Image 2023-03-10 at 12.14.37 PM.jpeg', 'Activo'),
(350, 99, 'APLICA ', '', 'Activo'),
(351, 100, '', 'images/WhatsApp Image 2023-03-10 at 12.19.18 PM.jpeg', 'Activo'),
(352, 100, '', 'images/WhatsApp Image 2023-03-10 at 12.19.36 PM.jpeg', 'Activo'),
(353, 100, '', 'images/WhatsApp Image 2023-03-10 at 12.19.58 PM.jpeg', 'Activo'),
(354, 100, '', 'images/WhatsApp Image 2023-03-10 at 12.19.36 PM.jpeg', 'Activo'),
(355, 100, 'APLICA ', '', 'Activo'),
(356, 101, 'MARTHA MAGDALENA DE ANDA RAMIREZ ', '', 'Activo'),
(357, 101, '', 'images/WhatsApp Image 2023-03-13 at 11.56.34 AM.jpeg', 'Activo'),
(358, 101, '3000', '', 'Activo'),
(359, 101, '', 'images/WhatsApp Image 2023-03-13 at 11.57.14 AM.jpeg', 'Activo'),
(360, 101, '', 'images/WhatsApp Image 2023-03-13 at 11.56.59 AM.jpeg', 'Activo'),
(361, 102, 'BERTHA ALICIA RAMIREZ LIRA', '', 'Activo'),
(362, 102, '', 'images/WhatsApp Image 2023-03-13 at 12.01.31 PM.jpeg', 'Activo'),
(363, 102, '4000', '', 'Activo'),
(364, 102, '', 'images/WhatsApp Image 2023-03-13 at 12.02.06 PM.jpeg', 'Activo'),
(365, 102, '', 'images/WhatsApp Image 2023-03-13 at 12.02.48 PM.jpeg', 'Activo'),
(366, 103, 'ROSA GUADALUPE AGUIRRE RAMIREZ ', '', 'Activo'),
(367, 103, '', 'images/WhatsApp Image 2023-03-14 at 10.01.55 AM.jpeg', 'Activo'),
(368, 103, '500', '', 'Activo'),
(369, 103, '', 'images/WhatsApp Image 2023-03-14 at 10.32.31 AM.jpeg', 'Activo'),
(370, 103, '', 'images/WhatsApp Image 2023-03-14 at 10.33.01 AM.jpeg', 'Activo'),
(371, 104, 'PEDRO MADONADO GONZALEZ', '', 'Activo'),
(372, 104, '', 'images/WhatsApp Image 2023-03-14 at 10.35.50 AM.jpeg', 'Activo'),
(373, 104, '12000', '', 'Activo'),
(374, 104, '', 'images/WhatsApp Image 2023-03-14 at 10.36.18 AM.jpeg', 'Activo'),
(375, 104, '', 'images/WhatsApp Image 2023-03-14 at 10.36.32 AM.jpeg', 'Activo'),
(376, 105, 'JESUS CHACON ORTIZ ', '', 'Activo'),
(377, 105, '', 'images/WhatsApp Image 2023-03-14 at 10.42.21 AM.jpeg', 'Activo'),
(378, 105, '750', '', 'Activo'),
(379, 105, '', 'images/WhatsApp Image 2023-03-14 at 10.42.55 AM.jpeg', 'Activo'),
(380, 105, '', 'images/WhatsApp Image 2023-03-14 at 10.43.12 AM.jpeg', 'Activo'),
(381, 106, 'C A DE LA PAZ ESQUEDA SOLIS ', '', 'Activo'),
(382, 106, '', 'images/WhatsApp Image 2023-03-14 at 10.45.05 AM.jpeg', 'Activo'),
(383, 106, '400', '', 'Activo'),
(384, 106, '', 'images/WhatsApp Image 2023-03-14 at 10.45.22 AM.jpeg', 'Activo'),
(385, 106, '', 'images/WhatsApp Image 2023-03-14 at 10.45.49 AM.jpeg', 'Activo'),
(386, 108, 'CARMEN YOLANDA SANCHEZ FUENTES ', '', 'Activo'),
(387, 108, '', 'images/WhatsApp Image 2023-03-14 at 10.59.20 AM.jpeg', 'Activo'),
(388, 108, '2500', '', 'Activo'),
(389, 108, '', 'images/WhatsApp Image 2023-03-14 at 11.00.06 AM.jpeg', 'Activo'),
(390, 108, '', 'images/WhatsApp Image 2023-03-14 at 11.00.33 AM.jpeg', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dep`
--

CREATE TABLE `dep` (
  `id` int(11) NOT NULL,
  `departamento` varchar(100) NOT NULL,
  `Solicitador` varchar(150) NOT NULL,
  `estatus` varchar(100) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dep`
--

INSERT INTO `dep` (`id`, `departamento`, `Solicitador`, `estatus`) VALUES
(2, 'Oficialia Mayor', 'Guillermo Montoya', 'Activo'),
(15, 'DIF', 'Lic  Nuria Vargas', 'Activo'),
(18, 'Atencion Ciudadana', 'Fabian Flores Garza', 'Activo');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `idBen`, `tabla`, `fecha`, `admin`) VALUES
(1, 1, 'apoyo1', '2022-05-16 11:44:44', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbleventos`
--

CREATE TABLE `tbleventos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `color` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `idtipusu` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indices de la tabla `tbleventos`
--
ALTER TABLE `tbleventos`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `ayuda2`
--
ALTER TABLE `ayuda2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ayudas`
--
ALTER TABLE `ayudas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `beneficiarios`
--
ALTER TABLE `beneficiarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `beneficiarios_detalle`
--
ALTER TABLE `beneficiarios_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;

--
-- AUTO_INCREMENT de la tabla `dep`
--
ALTER TABLE `dep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbleventos`
--
ALTER TABLE `tbleventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `idtipusu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
