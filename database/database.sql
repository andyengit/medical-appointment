-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 01-07-2021 a las 19:49:15
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `revemed`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(255) NOT NULL,
  `patient_id` int(255) NOT NULL,
  `a_date` date NOT NULL,
  `a_time` time NOT NULL,
  `status` tinyint(1) NOT NULL,
  `presence` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_doctor_a` (`doctor_id`),
  KEY `fk_patient_a` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `center_admin`
--

DROP TABLE IF EXISTS `center_admin`;
CREATE TABLE IF NOT EXISTS `center_admin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `center_admin`
--

INSERT INTO `center_admin` (`id`, `username`, `password`) VALUES
(1, 'root', '$2y$04$41MiqQAcOXZOYEIrUj7rm.V.tX5AwHlW2DXqfC97wOwbFiN/jOUcu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `state_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_state_city` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `name`) VALUES
(1, 1, 'Barquisimeto'),
(2, 1, 'Carora'),
(3, 1, 'Quíbor'),
(4, 1, 'Cabudare'),
(5, 1, 'Duaca'),
(6, 1, 'Sanare'),
(7, 1, 'El Tocuyo'),
(8, 1, 'Sarare'),
(9, 1, 'Siquisique'),
(10, 1, 'Cuara'),
(11, 1, 'Arenales'),
(12, 1, 'Río Tocuyo'),
(13, 2, 'San Felipe'),
(14, 2, 'Yaritagua'),
(15, 2, 'Chivacoa'),
(16, 2, 'Nirgua'),
(17, 2, 'Yumare'),
(18, 2, 'San Pablo'),
(19, 3, 'Acarigua'),
(20, 3, 'Biscucuy'),
(21, 3, 'Paraiso de Chabasquen'),
(22, 3, 'Ospino'),
(23, 3, 'Araure'),
(24, 3, 'Guanare'),
(25, 3, 'Agua Blanca'),
(26, 4, 'Barinas'),
(27, 4, 'Ciudad de Nutrias'),
(28, 4, 'Bruzual'),
(29, 4, 'Socopó'),
(30, 4, 'Antonio José de Sucre'),
(31, 4, 'Camaguan'),
(32, 4, 'Santa Bárbara'),
(33, 4, 'Guanare'),
(34, 4, 'Sabaneta'),
(35, 4, 'Libertad'),
(36, 5, 'Valencia'),
(37, 5, 'Guacara'),
(38, 5, 'Puerto Cabello'),
(39, 5, 'Naguanagua'),
(40, 5, 'San Diego'),
(41, 5, 'Mariara'),
(42, 5, 'Borburata'),
(43, 5, 'Los Guayos'),
(44, 5, 'Bejuma'),
(45, 5, 'Yagua'),
(46, 5, 'Montalban'),
(47, 5, 'Miranda'),
(48, 5, 'San Joaquín'),
(49, 5, 'Belén'),
(50, 5, 'Tocuyo de la Costa'),
(51, 5, 'Aguirre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `ci` varchar(255) NOT NULL,
  `speciality_id` int(255) NOT NULL,
  `start_hour` time NOT NULL,
  `end_hour` time NOT NULL,
  `cost` decimal(19,4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_ci_doctor` (`ci`),
  KEY `fk_sṕeciality_doctor` (`speciality_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `doctors`
--

INSERT INTO `doctors` (`id`, `ci`, `speciality_id`, `start_hour`, `end_hour`, `cost`) VALUES
(1, '28493780', 1, '06:00:00', '10:00:00', '100.0000'),
(2, '28493779', 1, '06:00:00', '10:00:00', '120.0000'),
(3, '28493781', 2, '06:00:00', '10:00:00', '180.0000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `ci` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postcode` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_ci_patient` (`ci`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `patients`
--

INSERT INTO `patients` (`id`, `ci`, `address`, `postcode`) VALUES
(5, '28493778', 'Lara', 3001);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `specialities`
--

DROP TABLE IF EXISTS `specialities`;
CREATE TABLE IF NOT EXISTS `specialities` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_speciality_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `specialities`
--

INSERT INTO `specialities` (`id`, `name`) VALUES
(2, 'Cirujano'),
(1, 'Pediatria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_state_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(4, 'Barinas'),
(5, 'Carabobo'),
(1, 'Lara'),
(3, 'Portuguesa'),
(2, 'Yaracuy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ci` varchar(255) NOT NULL,
  `city_id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ci`),
  UNIQUE KEY `uq_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`ci`, `city_id`, `name`, `lastname`, `password`, `email`, `phone`, `birth_date`, `role`) VALUES
('28493778', 1, 'Anderson', 'Armeya', '$2y$04$BPDx1N.V8DiMGrmYmDsTIeabKZxbAb3iYZ07z8qRPk.ClkNIhQO8a', 'anderson.armeya@gmail.com', '04125119913', '2002-07-08', 'patient'),
('28493779', 1, 'Carlos', 'Cecilio', '$2y$04$41MiqQAcOXZOYEIrUj7rm.V.tX5AwHlW2DXqfC97wOwbFiN/jOUcu', 'carlos@gmail.com', '04125119913', '2002-05-08', 'doc'),
('28493780', 1, 'Zuleima', 'Garcia', '$2y$04$41MiqQAcOXZOYEIrUj7rm.V.tX5AwHlW2DXqfC97wOwbFiN/jOUcu', 'zuleimae@gmail.com', '04125119913', '2002-05-08', 'doc'),
('28493781', 1, 'Maria', 'Gabriela', '$2y$04$41MiqQAcOXZOYEIrUj7rm.V.tX5AwHlW2DXqfC97wOwbFiN/jOUcu', 'Maria@gmail.com', '04125119913', '2002-05-08', 'doc');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `fk_doctor_a` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `fk_patient_a` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Filtros para la tabla `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `fk_state_city` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Filtros para la tabla `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `fk_sṕeciality_doctor` FOREIGN KEY (`speciality_id`) REFERENCES `specialities` (`id`),
  ADD CONSTRAINT `fk_user_doctor` FOREIGN KEY (`ci`) REFERENCES `users` (`ci`);

--
-- Filtros para la tabla `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `fk_user_patient` FOREIGN KEY (`ci`) REFERENCES `users` (`ci`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
