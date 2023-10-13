-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-08-2021 a las 15:31:41
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id17351716_agencia`
--
CREATE DATABASE IF NOT EXISTS `id17351716_agencia` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id17351716_agencia`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `email_usuario` varchar(150) NOT NULL,
  `id_tour` int(11) NOT NULL,
  `id_lugar` int(11) NOT NULL,
  `cantidad_tickets` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_registro`
--

CREATE TABLE `detalle_registro` (
  `id_detalle_registro` int(11) NOT NULL,
  `id_tour` int(11) NOT NULL,
  `id_lugar` int(11) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `email_usuario` varchar(150) NOT NULL,
  `cantidad_tickets` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_registro`
--

INSERT INTO `detalle_registro` (`id_detalle_registro`, `id_tour`, `id_lugar`, `id_registro`, `email_usuario`, `cantidad_tickets`) VALUES
(1, 1, 1, 1, 'admin1@admin.com', 100),
(2, 1, 1, 2, 'admin@admin.com', 5),
(3, 1, 1, 2, 'admin@admin.com', 10),
(5, 1, 1, 3, 'p@prueba.com', 2),
(6, 3, 5, 4, 'pazospaul@hotmail.com', 5),
(7, 7, 6, 5, 'pepe@prueba.com', 6),
(8, 7, 6, 6, 'pedro@prueba.com', 2),
(9, 1, 1, 7, 'pp@final.com', 3),
(10, 3, 5, 8, 'jvelasco@prueba.com', 6),
(11, 1, 1, 9, 'prueba2@prueba.com', 3),
(12, 3, 5, 10, 'ddiazog90@gmail.com', 2);

--
-- Disparadores `detalle_registro`
--
DELIMITER $$
CREATE TRIGGER `tr_vacantes` AFTER INSERT ON `detalle_registro` FOR EACH ROW BEGIN

UPDATE tour SET vacantes_tour = ( (SELECT vacantes_tour FROM tour WHERE id_tour = NEW.id_tour) - NEW.cantidad_tickets) WHERE id_tour = NEW.id_tour;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE `lugar` (
  `id_lugar` int(11) NOT NULL,
  `nombre_lugar` varchar(50) NOT NULL,
  `mapa_lugar` varchar(1500) NOT NULL,
  `foto_lugar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lugar`
--

INSERT INTO `lugar` (`id_lugar`, `nombre_lugar`, `mapa_lugar`, `foto_lugar`) VALUES
(1, 'Miami', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d251881.68146016126!2d-80.24145188749854!3d25.767268562513195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9b0a20ec8c111%3A0xff96f271ddad4f65!2sMiami%2C%20Florida%2C%20EE.%20UU.!5e0!3m2!1ses!2suk!4v1627883717248!5m2!1ses!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '1.jpg'),
(4, 'Quito', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255347.02337735455!2d-78.57062702350281!3d-0.18625043946287106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d59a4002427c9f%3A0x44b991e158ef5572!2sQuito%2C%20Ecuador!5e0!3m2!1ses!2suk!4v1627891335951!5m2!1ses!2suk\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '3.jpg'),
(5, 'Bogota', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d254508.51641077187!2d-74.24789401970598!3d4.648283717300197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9bfd2da6cb29%3A0x239d635520a33914!2sBogot%C3%A1%2C%20Colombia!5e0!3m2!1ses!2sec!4v1627914767601!5m2!1ses!2sec\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '15.jgp'),
(6, 'Peru', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1538677.7939286195!2d-76.45861419391439!3d-10.298411962234248!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c850c05914f5%3A0xf29e011279210648!2zUGVyw7o!5e0!3m2!1ses!2sec!4v1627916770248!5m2!1ses!2sec\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '25.jpg'),
(7, 'Mexico', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15010258.159497743!2d-111.64977347739116!3d23.293478300032895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x84043a3b88685353%3A0xed64b4be6b099811!2zTcOpeGljbw!5e0!3m2!1ses!2sec!4v1628001129231!5m2!1ses!2sec\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '6.jpg'),
(8, 'Cartagena', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62788.3039854104!2d-75.54354509591627!3d10.400196849762056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ef625e7ae9d1351%3A0xb161392e033f26ca!2sCartagena%2C%20Provincia%20de%20Cartagena%2C%20Bol%C3%ADvar%2C%20Colombia!5e0!3m2!1ses!2sec!4v1628001459691!5m2!1ses!2sec\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '10.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id_registro` int(11) NOT NULL,
  `email_usuario` varchar(150) NOT NULL,
  `total_registro` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id_registro`, `email_usuario`, `total_registro`) VALUES
(1, 'admin1@admin.com', 251),
(2, 'admin@admin.com', 502),
(3, 'p@prueba.com', 251),
(4, 'pazospaul@hotmail.com', 151),
(5, 'pepe@prueba.com', 90),
(6, 'pedro@prueba.com', 90),
(7, 'pp@final.com', 251),
(8, 'jvelasco@prueba.com', 151),
(9, 'prueba2@prueba.com', 251),
(10, 'ddiazog90@gmail.com', 151);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tour`
--

CREATE TABLE `tour` (
  `id_tour` int(11) NOT NULL,
  `id_lugar` int(11) NOT NULL,
  `nombre_tour` varchar(500) NOT NULL,
  `vacantes_tour` int(11) NOT NULL,
  `foto_tour` varchar(500) NOT NULL,
  `precio_tour` decimal(10,0) NOT NULL,
  `descripcion_tour` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tour`
--

INSERT INTO `tour` (`id_tour`, `id_lugar`, `nombre_tour`, `vacantes_tour`, `foto_tour`, `precio_tour`, `descripcion_tour`) VALUES
(1, 1, 'Tour para Miami', 7, '2.jpg', 251, 'Este tour lleva a miami ida y vuelta'),
(3, 5, 'Tour para Bogota', 12, '3.jpg', 151, 'El siguiente tour....'),
(7, 6, 'Visitando', 4, '49.jpg', 90, 'Lujoso'),
(8, 1, 'Tour para Miami', 15, '2.jpg,3.jpg,4.jpg', 126, 'Tour.para miamia..\n'),
(9, 1, 'Tour para Miami', 25, '3.jpg,5.jpg,9.jpg', 350, 'ddd'),
(10, 7, 'Vistas', 25, '50.jpg', 110, 'Visitamos lugares unicos'),
(11, 8, 'Viaje', 3, '15.jpg', 180, 'Compras'),
(12, 8, 'Viaje', 3, '15.jpg', 180, 'Compras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `email_usuario` varchar(150) NOT NULL,
  `nombre_usuario` varchar(250) NOT NULL,
  `password_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`email_usuario`, `nombre_usuario`, `password_usuario`) VALUES
('david11@hotmail.com', 'David Bustillos', '123456'),
('ddiazog90@gmail.com', 'Daniel', 'admin1234'),
('erick96mh@hotmail.com', 'erick', '1234'),
('jvelasco@prueba.com', 'jhon', '1234'),
('l@prueba.com', 'luchito', '1234'),
('luchito@prueba.com', 'luchito', '1234'),
('p@prueba.com', 'Prueba', '1234'),
('pazospaul@hotmail.com', 'Paul', '12345'),
('pedro@prueba.com', 'Pedro', '1234'),
('pepe@prueba.com', 'Pepe', '1234'),
('pp@final.com', 'Pul', '1234'),
('prueba2@prueba.com', 'Prueba2', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`,`email_usuario`,`id_tour`,`id_lugar`),
  ADD KEY `usuario_carrito_fk` (`email_usuario`),
  ADD KEY `tour_carrito_fk` (`id_tour`,`id_lugar`);

--
-- Indices de la tabla `detalle_registro`
--
ALTER TABLE `detalle_registro`
  ADD PRIMARY KEY (`id_detalle_registro`,`id_tour`,`id_lugar`,`id_registro`,`email_usuario`),
  ADD KEY `registro_detalle_registro_fk` (`id_registro`,`email_usuario`),
  ADD KEY `tour_detalle_registro_fk` (`id_tour`,`id_lugar`);

--
-- Indices de la tabla `lugar`
--
ALTER TABLE `lugar`
  ADD PRIMARY KEY (`id_lugar`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_registro`,`email_usuario`),
  ADD KEY `usuario_registro_fk` (`email_usuario`);

--
-- Indices de la tabla `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id_tour`,`id_lugar`),
  ADD KEY `lugar_tour_fk` (`id_lugar`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`email_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `detalle_registro`
--
ALTER TABLE `detalle_registro`
  MODIFY `id_detalle_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `lugar`
--
ALTER TABLE `lugar`
  MODIFY `id_lugar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tour`
--
ALTER TABLE `tour`
  MODIFY `id_tour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `tour_carrito_fk` FOREIGN KEY (`id_tour`,`id_lugar`) REFERENCES `tour` (`id_tour`, `id_lugar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_carrito_fk` FOREIGN KEY (`email_usuario`) REFERENCES `usuario` (`email_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_registro`
--
ALTER TABLE `detalle_registro`
  ADD CONSTRAINT `registro_detalle_registro_fk` FOREIGN KEY (`id_registro`,`email_usuario`) REFERENCES `registro` (`id_registro`, `email_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tour_detalle_registro_fk` FOREIGN KEY (`id_tour`,`id_lugar`) REFERENCES `tour` (`id_tour`, `id_lugar`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
