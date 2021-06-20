-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2021 a las 19:30:01
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
-- Base de datos: `blog_master`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'accion'),
(2, 'aventura'),
(3, 'deportes'),
(4, 'plataformas'),
(5, 'MMO RPG'),
(7, 'NUEVOS JUEGOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `id` int(255) NOT NULL,
  `usuario_id` int(255) NOT NULL,
  `categoria_id` int(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` mediumtext DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id`, `usuario_id`, `categoria_id`, `titulo`, `descripcion`, `fecha`) VALUES
(1, 1, 1, 'Novedades del GTA5 online', 'review del GTA 5', '2021-05-14'),
(2, 1, 2, 'Review de LOL online', 'Todo sobre LoL', '2021-05-14'),
(3, 1, 3, 'Nuevos jugadores de fifa 21', 'review de fifa 2021', '2021-05-14'),
(4, 2, 1, 'Novedades de Assasins online', 'review Assasins', '2021-05-14'),
(5, 2, 2, 'Review de Wow online', 'Todo sobre Wow', '2021-05-14'),
(6, 2, 3, 'Nuevos jugadores de Pes 21', 'review de Pes 2021', '2021-05-14'),
(7, 3, 1, 'Novedades de call of duty online', 'Pellentesque malesuada eleifend eros Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut gravida eget tellus vitae tincidunt. Quisque eu mauris tristique, porttitor odio a, malesuada mauris. Quisque in est condimentum eros venenatis accumsan. Praesent imperdiet tortor dolor, nec venenatis nunc viverra sit amet. Maecenas tempor dignissim ipsum, in viverra magna accumsan et. In malesuada felis in tempus scelerisque. Quisque venenatis aliquet urna. Pellentesque semper bibendum conguevitae rutrum. Pellentesque a fringilla nibh, nec consectetur dolor. Vivamus pharetra in quam eu pulvinar. Cras non bibendum justo. Integer sed arcu non erat dictum tristique at sed sem', '2021-05-14'),
(8, 3, 1, 'Review de Fornite online', 'Aliquam luctus purus ac lacus blandit Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut gravida eget tellus vitae tincidunt. Quisque eu mauris tristique, porttitor odio a, malesuada mauris. Quisque in est condimentum eros venenatis accumsan. Praesent imperdiet tortor dolor, nec venenatis nunc viverra sit amet. Maecenas tempor dignissim ipsum, in viverra magna accumsan et. In malesuada felis in tempus scelerisque. Quisque venenatis aliquet urna. Pellentesque semper bibendum congueultricies. Sed rutrum, sapien ut iaculis placerat, sapien justo faucibus justo, ut scelerisque tellus nunc in dui. Phasellus id erat mi. Pellentesque efficitur fermentum ante, a egestas mauris rhoncus vel.', '2021-05-14'),
(9, 3, 3, 'Nuevos jugadores de formula 1  21', 'passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut gravida eget tellus vitae tincidunt. Quisque eu mauris tristique, porttitor odio a, malesuada mauris. Quisque in est condimentum eros venenatis accumsan. Praesent imperdiet tortor dolor, nec venenatis nunc viverra sit amet. Maecenas tempor dignissim ipsum, in viverra magna accumsan et. In malesuada felis in tempus scelerisque. Quisque venenatis aliquet urna. Pellentesque semper bibendum congue', '2021-05-14'),
(10, 3, 1, 'Guia de GTA Vice City', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2021-05-15'),
(13, 40, 2, 'Efecto mariposa 1', 'I had some development experience before (backend) and I wanted to really learn JavaScript and I must tell you, this is the best JavaScript course on the internet period. It has everything you need to get you up to speed and more!!! Apart from innovative challenges and awesome projects, what I personally really admired was the fact that Jonas really took a lot of effort in explaining \"How JS works under the hood\" and that is the most precious thing in this course, and just what I wanted.', '2021-05-22'),
(19, 41, 5, 'Efecto mariposa 8(editado)', 'estos esta editado', '2021-05-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `password`, `fecha`) VALUES
(1, 'benjamin abel', 'sucasaire huamani', 'benjaminsucasaire@gmail.com', '12345678', '2019-05-01'),
(2, 'marisol', 'huamani huamani', 'marisolhuamani@gmail.com', '18273645', '1993-03-31'),
(3, 'avelina', 'huamani llacsa', 'avelinahuamani@gmail.com', '12345678', '1966-07-11'),
(7, 'martin', 'sucasaire huallpa', 'martinsucasaire@gmail.com', '87564321', '2021-05-15'),
(9, 'Benjamin Abel', 'Huamani', 'benjaminsucasaire1@gmail.com', '333333333333', '2021-05-19'),
(11, 'Benjamin Abel', 'Sucasaire Huamani', 'benjaminsucasaire2@gmail.com', '4444444444', '2021-05-19'),
(12, 'Benjamin Abel', 'Huamani', 'benjaminsucasaire5@gmail.com', '55555555555', '2021-05-19'),
(13, 'Benjamin Abel', 'Sucasaire Huamani', 'benjaminsucasaire6@gmail.com', '666666666666666', '2021-05-19'),
(14, 'Benjamin Abel', 'Huamani', 'benjaminsucasaire777@gmail.com', '7777777777777777777777', '2021-05-19'),
(15, 'Benjamin Abel', 'Huamani', 'benjaminsucasaire7@gmail.com', '77777777777777777', '2021-05-19'),
(16, 'Benjamin Abel', 'Huamani', 'benjaminsucasaire96@gmail.com', '3333333333333333333', '2021-05-19'),
(17, 'Benjamin Abel', 'Sucasaire Huamani', 'benjaminsucasaire4444444@gmail.com', '44444444444', '2021-05-19'),
(18, 'Benjamin Abel', 'Huamani', 'benjaminsucasaire99999@gmail.com', '99999999999999999', '2021-05-19'),
(19, 'Benjamin Abel', 'Huamani', 'benjaminsucasaire97778@gmail.com', 'benjaminsucasaire97778', '2021-05-19'),
(20, 'Benjamin Abel', 'Huamani', 'benjaminsucasaire2323@gmail.com', '77777775555555555', '2021-05-19'),
(21, 'Benjamin Abel', 'Huamani', 'benjaminsucasaire78785@gmail.com', '1111111111111111112', '2021-05-19'),
(23, 'Benjamin Abel', 'Huamani', 'benjaminsucasaire979@gmail.com', '333333333335f', '2021-05-19'),
(24, 'Benjamin Abel', 'Sucasaire Huamani', 'benjaminsucasaire43434343@gmail.com', '33434343434334', '2021-05-19'),
(32, 'Benjamin Abel', 'Huamani', 'benjaminsucasaire2102@gmail.com', '2102', '2021-05-20'),
(34, 'Benjamin Abel\'', 'Huamani\"\"', 'benjaminsucasaire33563@gmail.com', '333333', '2021-05-20'),
(36, 'Benjamin Abel\'', 'Huamani\"', 'benjaminsucasaire4444@gmail.com', '5646464464', '2021-05-20'),
(37, 'Benjamin Abel', 'Huamani', 'benjaminsucasaire5553@gmail.com', '333445', '2021-05-20'),
(39, 'Benjamin Abel', 'Huamani', 'benjaminsucasairepapa@gmail.com', '$2y$10$MgzVrxDiNVeBvTF80FIJAOb9LkbB4Jd5IzquLFeEIDIKvBfMd89dG', '2021-05-20'),
(40, 'hola', 'hola', 'hola@hola.com', '$2y$10$ZjP/hDIHLfBYOAyV.q3uJ.zS.KgAjMG374XH1aeWySPyf1EWW.eCa', '2021-05-21'),
(41, 'bay', 'bay', 'bay@bay.com', '$2y$10$IiuA5aRRRNDCSl9C8FsS1.i9/J8CPfkODb..UHY/r086LA9juSQgS', '2021-05-21'),
(42, 'voy', 'voy', 'voy@voy.com', '$2y$10$Ow7KKJhbx5fMWlLqaSNAF.hzPYdQRoDyvSt8WWSJZRmAge1nkZkxW', '2021-05-22'),
(44, 'Benjamin Abel', 'Huamani', 'benjaminsucasaire666555@gmail.com', '$2y$10$e/GWfgSReFIjdQX/zz1Y5O4TpTwkS1tvQmBydzIUrAEMBKjFnCM2e', '2021-06-03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_entrada_usuario` (`usuario_id`),
  ADD KEY `fk_entrada_categoria` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `fk_entrada_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `fk_entrada_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
