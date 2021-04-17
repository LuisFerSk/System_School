/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/ reksai_db /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE reksai_db;

DROP TABLE IF EXISTS asignatura;
CREATE TABLE `asignatura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) COLLATE latin1_bin NOT NULL,
  `nombre` varchar(100) COLLATE latin1_bin NOT NULL,
  `estado` varchar(10) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`),
  KEY `estado` (`estado`),
  CONSTRAINT `asignatura_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado` (`nombre`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

DROP TABLE IF EXISTS estado;
CREATE TABLE `estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(10) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

DROP TABLE IF EXISTS estudiante;
CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dni` varchar(11) COLLATE latin1_bin NOT NULL,
  `programa` varchar(100) COLLATE latin1_bin NOT NULL,
  `estado` varchar(10) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dni` (`dni`),
  KEY `estado` (`estado`),
  KEY `programa` (`programa`),
  CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado` (`nombre`) ON UPDATE CASCADE,
  CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`programa`) REFERENCES `programa` (`nombre`) ON UPDATE CASCADE,
  CONSTRAINT `estudiante_ibfk_3` FOREIGN KEY (`dni`) REFERENCES `user` (`dni`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

DROP TABLE IF EXISTS facultad;
CREATE TABLE `facultad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE latin1_bin NOT NULL,
  `estado` varchar(10) COLLATE latin1_bin NOT NULL DEFAULT 'activa',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`),
  KEY `estado` (`estado`),
  CONSTRAINT `facultad_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado` (`nombre`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

DROP TABLE IF EXISTS grupo;
CREATE TABLE `grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(2) NOT NULL,
  `asignatura` varchar(10) COLLATE latin1_bin NOT NULL,
  `periodo` varchar(7) COLLATE latin1_bin NOT NULL,
  `profesor` varchar(11) COLLATE latin1_bin NOT NULL,
  `estado` varchar(10) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero` (`numero`,`asignatura`),
  KEY `profesor` (`profesor`),
  KEY `periodo` (`periodo`),
  KEY `estado` (`estado`),
  KEY `asignatura` (`asignatura`),
  CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`profesor`) REFERENCES `user` (`dni`) ON UPDATE CASCADE,
  CONSTRAINT `grupo_ibfk_2` FOREIGN KEY (`periodo`) REFERENCES `perido_academico` (`nombre`) ON UPDATE CASCADE,
  CONSTRAINT `grupo_ibfk_3` FOREIGN KEY (`estado`) REFERENCES `estado` (`nombre`) ON UPDATE CASCADE,
  CONSTRAINT `grupo_ibfk_4` FOREIGN KEY (`asignatura`) REFERENCES `asignatura` (`codigo`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

DROP TABLE IF EXISTS grupo_estudiante;
CREATE TABLE `grupo_estudiante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo` int(11) NOT NULL,
  `estudiante` varchar(11) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `periodo` varchar(7) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `grupo` (`grupo`),
  KEY `periodo` (`periodo`),
  CONSTRAINT `grupo_estudiante_ibfk_1` FOREIGN KEY (`grupo`) REFERENCES `grupo` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `grupo_estudiante_ibfk_2` FOREIGN KEY (`periodo`) REFERENCES `perido_academico` (`nombre`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS perido_academico;
CREATE TABLE `perido_academico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(7) COLLATE latin1_bin NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` varchar(10) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

DROP TABLE IF EXISTS programa;
CREATE TABLE `programa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE latin1_bin NOT NULL,
  `facultad` varchar(100) COLLATE latin1_bin NOT NULL,
  `estado` varchar(10) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`),
  KEY `facultad_fk` (`facultad`),
  KEY `estado` (`estado`),
  CONSTRAINT `facultad_fk` FOREIGN KEY (`facultad`) REFERENCES `facultad` (`nombre`),
  CONSTRAINT `programa_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado` (`nombre`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

DROP TABLE IF EXISTS user;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE latin1_bin NOT NULL,
  `dni` varchar(11) COLLATE latin1_bin NOT NULL,
  `nombre` varchar(50) COLLATE latin1_bin NOT NULL,
  `apellidos` varchar(50) COLLATE latin1_bin NOT NULL,
  `password` varchar(41) COLLATE latin1_bin NOT NULL,
  `kind` int(1) NOT NULL,
  `estado` varchar(10) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`email`),
  UNIQUE KEY `dni` (`dni`),
  KEY `estado` (`estado`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado` (`nombre`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;




INSERT INTO asignatura(id,codigo,nombre,estado) VALUES(1,'MT500','ingieneria de software','activo');

INSERT INTO estado(id,nombre) VALUES(1,'activo'),(2,'inactivo');

INSERT INTO estudiante(id,dni,programa,estado) VALUES(4,'1003243681','Derecho','activo');

INSERT INTO facultad(id,nombre,estado) VALUES(1,'Ingieneria y tecnologia','activo'),(2,'Derecho','activo');



INSERT INTO perido_academico(id,nombre,fecha_inicio,fecha_fin,estado) VALUES(1,'2021-2','2021-04-17','2021-04-20','Cerrado');

INSERT INTO programa(id,nombre,facultad,estado) VALUES(6,'Ingenieria de sistema','Ingieneria y tecnologia','activo'),(7,'Derecho','Derecho','activo');
INSERT INTO user(id,email,dni,nombre,apellidos,password,kind,estado) VALUES(1,'admin@gmail.com','1003243681','Luis Fernando','Campo Montero','56c6fbdc1f299d0a753ac029343d380afa3919a8',1,'activo');







/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
