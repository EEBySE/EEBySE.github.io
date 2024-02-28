-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 27, 2024 at 05:05 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `videoteca`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `cliente` varchar(64) NOT NULL,
  `year` int DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `cliente`, `year`) VALUES
(1, 'Jorge Perez', 1980),
(2, 'Juan Dominguez', 1950),
(3, 'Jose Luis Lopez', 1967);

-- --------------------------------------------------------

--
-- Table structure for table `pelicula`
--

DROP TABLE IF EXISTS `pelicula`;
CREATE TABLE IF NOT EXISTS `pelicula` (
  `id_pelicula` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(64) NOT NULL,
  `director` varchar(128) NOT NULL,
  `actor` varchar(128) NOT NULL,
  PRIMARY KEY (`id_pelicula`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pelicula`
--

INSERT INTO `pelicula` (`id_pelicula`, `titulo`, `director`, `actor`) VALUES
(1, 'Blade Runner', 'Ridley Scott', 'Harrison Ford'),
(2, 'Alien', 'Ridley Scott', 'Sigourney Weaver'),
(3, 'Doce monos', 'Terry Gilliam', 'Bruce Willis'),
(4, 'Contact', 'Robert Zemeckis', 'Jodie Foster'),
(5, 'Tron', 'Steven Lisberger', 'Jeff Bridges'),
(6, 'Star Wars', 'George Lucas', 'Harrison Ford');

-- --------------------------------------------------------

--
-- Table structure for table `rentas`
--

DROP TABLE IF EXISTS `rentas`;
CREATE TABLE IF NOT EXISTS `rentas` (
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_cliente` int NOT NULL,
  `id_pelicula` int NOT NULL,
  PRIMARY KEY (`id_cliente`,`id_pelicula`,`fecha_inicio`),
  KEY `id_pelicula` (`id_pelicula`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rentas`
--

INSERT INTO `rentas` (`fecha_inicio`, `fecha_fin`, `id_cliente`, `id_pelicula`) VALUES
('2024-02-26', '2024-02-28', 1, 5),
('2024-02-26', '2024-02-28', 1, 3),
('2024-02-26', '2024-02-28', 1, 4),
('2024-02-26', '2024-02-28', 2, 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
