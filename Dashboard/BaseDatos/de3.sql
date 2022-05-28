CREATE DATABASE DEPARTAMENTO_ESCOLAR;

USE DEPARTAMENTO_ESCOLAR;

CREATE TABLE `alumnos` (
  `matricula` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) DEFAULT NULL,
  `carrera` int(11) DEFAULT NULL,
  PRIMARY KEY (`matricula`),
  KEY `carrera` (`carrera`),
  CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`carrera`) REFERENCES `carreras` (`carrera_id`)
) ;

CREATE TABLE `alumnos_materia` (
  `alumno_materia_id` int(11) NOT NULL AUTO_INCREMENT,
  `alumno` int(11) DEFAULT NULL,
  `materia` int(11) DEFAULT NULL,
  PRIMARY KEY (`alumno_materia_id`),
  KEY `alumno` (`alumno`),
  KEY `materia` (`materia`),
  CONSTRAINT `alumnos_materia_ibfk_1` FOREIGN KEY (`alumno`) REFERENCES `alumnos` (`matricula`),
  CONSTRAINT `alumnos_materia_ibfk_2` FOREIGN KEY (`materia`) REFERENCES `materias` (`materia_id`)
) ;

CREATE TABLE `calificaciones` (
  `calificacion_id` int(11) NOT NULL AUTO_INCREMENT,
  `calificacion` float DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `alumno` int(11) DEFAULT NULL,
  `materia` int(11) DEFAULT NULL,
  PRIMARY KEY (`calificacion_id`),
  KEY `FK_Calificaciones_Alumnos` (`alumno`),
  KEY `FK_Calificaciones_Materia` (`materia`),
  CONSTRAINT `FK_Calificaciones_Alumnos` FOREIGN KEY (`alumno`) REFERENCES `alumnos` (`matricula`),
  CONSTRAINT `FK_Calificaciones_Materia` FOREIGN KEY (`materia`) REFERENCES `materias` (`materia_id`)
);

CREATE TABLE `carreras` (
  `carrera_id` int(11) NOT NULL AUTO_INCREMENT,
  `carrera_nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`carrera_id`)
);

CREATE TABLE `materias` (
  `materia_id` int(11) NOT NULL AUTO_INCREMENT,
  `materia_nombre` varchar(60) DEFAULT NULL,
  `carrera` int(11) DEFAULT NULL,
  PRIMARY KEY (`materia_id`),
  KEY `carrera` (`carrera`),
  CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`carrera`) REFERENCES `carreras` (`carrera_id`)
);
