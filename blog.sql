-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: fdb29.awardspace.net
-- Tiempo de generación: 20-01-2021 a las 05:42:16
-- Versión del servidor: 5.7.20-log
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `3701546_w1305`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` tinyint(3) NOT NULL,
  `categoria_nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `categoria_nombre`) VALUES
(1, 'Politica'),
(2, 'Tecnologia'),
(3, 'Salud'),
(4, 'Deportes'),
(5, 'Economia'),
(6, 'Viajes'),
(7, 'Ciencia'),
(8, 'Noticias'),
(9, 'Musica'),
(10, 'Arte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `comentario_id` int(3) NOT NULL,
  `comentario_post_id` int(3) NOT NULL,
  `comentario_autor` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `comentario_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `comentario_contenido` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `comentario_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'desaprobado',
  `comentario_fecha` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `post_id` tinyint(3) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `post_categoria_id` tinyint(3) NOT NULL,
  `post_titulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `post_autor` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `post_fecha` datetime NOT NULL,
  `post_imagen` text,
  `post_contenido` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `post_contador_comentarios` int(11) NOT NULL,
  `post_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'abierto',
  `post_publish` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'solicitado'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`post_id`, `usuario_id`, `post_categoria_id`, `post_titulo`, `post_autor`, `post_fecha`, `post_imagen`, `post_contenido`, `post_contador_comentarios`, `post_status`, `post_publish`) VALUES
(0,0,2, '\0El desarrollo de la IA en México', 'admin', '2021-01-19 21:57:00', 'IA.jpeg', 'La inteligencia artificial (IA) es la inteligencia llevada a cabo por máquinas. En ciencias de la computación, una máquina «inteligente» ideal es un agente flexible que percibe su entorno y lleva a cabo acciones que maximicen sus posibilidades de éxito en algún objetivo o tarea. Coloquialmente, el término inteligencia artificial se aplica cuando una máquina imita las funciones «cognitivas» que los humanos asocian con otras mentes humanas, como por ejemplo: «percibir», «razonar», «aprender» y «resolver problemas». \r\nAlgunas de las ramas de la inteligencia artificial son: Robótica, Visión Artificial, Sistemas Expertos, Machine Lerning y Deep Lerning.\r\n\r\n¿Qué opinas del desarrollo de la IA?.', 0, 'abierto', 'aprobado'),
(1,0,7,'¿nuevas variantes del covid?','admin','2021-01-21 15:57:00','covid.jpg','La carrera contra el virus que causa el Covid-19 ha dado un nuevo giro: están apareciendo mutaciones rápidamente y, cuanto más tiempo se tarde en vacunar a la población, más probable es que surja una variante que pueda eludir las pruebas, el tratamiento y las vacunas actuales',0,'abierto','aprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `usuario_nick` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `usuario_nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `usuario_apellidos` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `usuario_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `usuario_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `usuario_role` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `usuario_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'inhabil'
) ENGINE=MyISAM DEFAULT CHARSET=utf16le;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_nick`, `usuario_nombre`, `usuario_apellidos`, `usuario_password`, `usuario_email`, `usuario_role`, `usuario_status`) VALUES
(0,"admin","GENARO","LAUREANO MENDEZ","admin","laureanomg2@gmail.com","admin","habil"),
(1,"tony99","JOSÉ ANTONIO","SOTO HERNÁNDEZ","perritosP80","snakepower99@gmail.com","user","habil"),
(2,"adristar","ADRIANA ELIZABETH","SALVADOR NUÑEZ","avionesA3","adristar@gmail.com","user","habil"),
(3,"alam2","ALAM","MONTERO RONZÓN","avionesA3","alamont@hotmail.com","user","inhabil"),
 (4,"robertin33","ROBERTO","MEJÍA SANCHEZ","cookiesC22","robertin33@hotmail.com","user","inhabil");

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`comentario_id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`),
  ADD UNIQUE KEY `usuario_nick` (`usuario_nick`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `comentario_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
