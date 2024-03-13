-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 06-03-2024 a las 13:53:05
-- Versión del servidor: 8.2.0
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `videoteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `cliente` varchar(64) NOT NULL,
  `year` int DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `cliente`, `year`) VALUES
(1, 'Jorge Perez', 1980),
(2, 'Juan Dominguez', 1950),
(3, 'Jose Luis Lopez', 1967);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

DROP TABLE IF EXISTS `pelicula`;
CREATE TABLE IF NOT EXISTS `pelicula` (
  `id_pelicula` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(64) NOT NULL,
  `director` varchar(128) NOT NULL,
  `actor` varchar(128) NOT NULL,
  `imagen` varchar(30) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `ranking` int DEFAULT NULL,
  PRIMARY KEY (`id_pelicula`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id_pelicula`, `titulo`, `director`, `actor`, `imagen`, `descripcion`, `ranking`) VALUES
(1, 'Blade Runner', 'Ridley Scott', 'Harrison Ford', 'imagen1.jpg', 'Blade Runner una película estadounidense neo-noir y de ciencia ficción dirigida por Ridley Scott, estrenada en 1982. Fue escrita por Hampton Fancher y David Webb Peoples, y el reparto se compone de Harrison Ford, Rutger Hauer, Sean Young, Edward James Olmos, M. Emmet Walsh, Daryl Hannah, William Sanderson, Brion James, Joe Turkel y Joanna Cassidy. Está basada parcialmente en la novela de Philip K. Dick ¿Sueñan los androides con ovejas eléctricas? (1968). Es la primera película de la franquicia B', 50),
(2, 'Alien', 'Ridley Scott', 'Sigourney Weaver', 'imagen2.jpg', 'Alien: el octavo pasajero, o simplemente Alien en su idioma original, es una película de ciencia ficción y terror dirigida por el cineasta británico Ridley Scott y estrenada en 1979. El reparto estuvo integrado por los actores Sigourney Weaver, Tom Skerritt, Veronica Cartwright, Harry Dean Stanton, John Hurt, Ian Holm y Yaphet Kotto, y la trama relata el acecho de una criatura alienígena a la tripulación de una nave espacial.', 70),
(3, 'Doce monos', 'Terry Gilliam', 'Bruce Willis', 'imagen3.jpg', 'Doce monos es una película estadounidense de ciencia ficción de 1995.Dirigida por Terry Gilliam, e inspirada en la película La Jetée (1962), de Chris Marker, está protagonizada por Bruce Willis, Madeleine Stowe, Brad Pitt y Christopher Plummer. Después de que Universal Studios adquiriera los derechos de autor para hacer una versión de La Jetée de mayor duración, se contrató a David y Janet Peoples para que escribieran el guion.1? Su trama describe la historia de un prisionero llamado James Cole ', 75),
(4, 'Contact', 'Robert Zemeckis', 'Jodie Foster', 'imagen4.jpg', 'Contact es una película estadounidense de 1997 de ciencia ficción y drama dirigida por Robert Zemeckis. Es una adaptación cinematográfica de la novela del mismo nombre escrita por Carl Sagan en 1985. La Dra. Eleanor \"Ellie\" Arroway es una científica del SETI que encuentra pruebas fehacientes de vida extraterrestre y es elegida para tomar contacto por primera vez con una civilización más avanzada. Protagonizada por Jodie Foster, completan el reparto Matthew McConaughey, James Woods, Tom Skerritt,', 90),
(5, 'Tron', 'Steven Lisberger', 'Jeff Bridges', 'imagen5.jpg', 'Tron es una película de acción y aventuras de ciencia ficción estadounidense de 1982 escrita y dirigida por Steven Lisberger a partir de una historia de Lisberger y Bonnie MacBird. La película está protagonizada por Jeff Bridges, Bruce Boxleitner, David Warner, Cindy Morgan y Barnard Hughes. La historia de la trama sigue a Kevin Flynn, un programador de computadoras y desarrollador de videojuegos que se transporta al mundo del software de una computadora central donde interactúa con programas hu', 85),
(6, 'Star Wars', 'George Lucas', 'Harrison Ford', 'imagen6.jpg', 'Star Wars, conocida también en español como La guerra de las galaxias, es una franquicia y universo compartido de fantasía compuesta primordialmente de una serie de películas concebidas por el cineasta estadounidense George Lucas en la década de 1970, y producidas y distribuidas inicialmente por 20th Century Fox y posteriormente por The Walt Disney Company a partir de 2012. Su trama describe las vivencias de un grupo de personajes que habitan en una galaxia ficticia e interactúan con elementos c', 95);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rentas`
--

DROP TABLE IF EXISTS `rentas`;
CREATE TABLE IF NOT EXISTS `rentas` (
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_cliente` int NOT NULL,
  `id_pelicula` int NOT NULL,
  PRIMARY KEY (`id_cliente`,`id_pelicula`,`fecha_inicio`),
  KEY `id_pelicula` (`id_pelicula`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rentas`
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
