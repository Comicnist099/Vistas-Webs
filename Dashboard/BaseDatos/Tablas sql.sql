create database BDM;

use BDM;

CREATE TABLE `user_type` (
  `ID_USER_TYPE` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(200) NOT NULL,
  `DATE` date NOT NULL,
  PRIMARY KEY (`ID_USER_TYPE`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla USER\\n',
  `NAME` varchar(100) NOT NULL COMMENT 'Nombre completo del USER\n',
  `ALIAS` varchar(100) NOT NULL COMMENT 'Sobrenombre del USER',
  `CORREO` varchar(200) NOT NULL COMMENT 'Correo electronico del usuario',
  `PASSWORD` varchar(200) NOT NULL COMMENT 'Contraseña del USER\n',
  `CREATION_DATE` date NOT NULL COMMENT 'Fecha de creacion del USER\n',
  `AVATAR_PIC` mediumblob DEFAULT NULL COMMENT 'Foto del USER\n',
  `USER_TYPE` int(11) NOT NULL,
  `STATE` varchar(45) NOT NULL COMMENT 'El día que cantan todos los angeles',
  PRIMARY KEY (`ID_USER`),
  KEY `a` (`USER_TYPE`),
  CONSTRAINT `a` FOREIGN KEY (`USER_TYPE`) REFERENCES `user_type` (`ID_USER_TYPE`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `tag` (
  `ID_TAG` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID del TAG',
  `NAME` varchar(200) NOT NULL COMMENT 'Nombre del TAG',
  `DATE` date NOT NULL COMMENT 'Fecha de creacion del TAG',
  PRIMARY KEY (`ID_TAG`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `news` (
  `ID_NEWS` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID de la noticia',
  `TITLE` varchar(200) NOT NULL COMMENT 'Titulo de la noticia\n',
  `NEWS_DATE` datetime NOT NULL COMMENT 'Fecha de cracion de noticia\n',
  `DATE_PUBLICACION` datetime NOT NULL COMMENT 'Fecha de publicacion de la noticia',
  `LOCATION` varchar(200) NOT NULL COMMENT 'Locacion de los hechos',
  `CONTENIDO` varchar(2000) NOT NULL COMMENT 'Contenido de la noticia',
  `LIKES` int(11) NOT NULL COMMENT 'Cantidad de likes de la noticia',
  `FK_REPORTER` int(11) NOT NULL,
  `STATE` varchar(45) NOT NULL COMMENT 'Estado de la noticia',
  `KEYWORD` varchar(200) NOT NULL COMMENT 'Palabras Claves',
  `SIGN_REPORTER` varchar(45) NOT NULL COMMENT 'Firma del reportero',
  PRIMARY KEY (`ID_NEWS`),
  KEY `fk_reporter` (`FK_REPORTER`),
  CONSTRAINT `fk_reporter` FOREIGN KEY (`FK_REPORTER`) REFERENCES `user` (`ID_USER`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `tag_car` (
  `FK_NEWS` int(11) NOT NULL,
  `FK_TAG` int(11) NOT NULL,
  KEY `fk_tag` (`FK_TAG`),
  KEY `fk_news` (`FK_NEWS`),
  CONSTRAINT `fk_news` FOREIGN KEY (`FK_NEWS`) REFERENCES `news` (`ID_NEWS`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tag` FOREIGN KEY (`FK_TAG`) REFERENCES `tag` (`ID_TAG`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `comment` (
  `ID_COMMENT` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave del comentario',
  `FK_NEWS` int(11) NOT NULL COMMENT 'Llave foranea de la noticia',
  `FK_USER` int(11) NOT NULL COMMENT 'Llave foranea del usuario',
  `FK_COMMENT` int(11) DEFAULT NULL COMMENT 'Llave foranea del comentario',
  `CONTENT` varchar(1000) NOT NULL COMMENT 'Contenido del comentario',
  `DATE_CREATION` date NOT NULL,
  PRIMARY KEY (`ID_COMMENT`),
  KEY `fk_newsComment` (`FK_NEWS`),
  KEY `fk_comment` (`FK_COMMENT`),
  KEY `fk_userComment` (`FK_USER`),
  CONSTRAINT `fk_comment` FOREIGN KEY (`FK_COMMENT`) REFERENCES `comment` (`ID_COMMENT`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_newsComment` FOREIGN KEY (`FK_NEWS`) REFERENCES `news` (`ID_NEWS`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_userComment` FOREIGN KEY (`FK_USER`) REFERENCES `user` (`ID_USER`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `gallery_news` (
  `FK_NEWS` int(11) NOT NULL COMMENT 'Foraneo de la noticia',
  `MULTIMEDIA` mediumblob NOT NULL COMMENT 'Galeria, sea foto video o gif',
  KEY `fk_newsGallery` (`FK_NEWS`),
  CONSTRAINT `fk_newsGallery` FOREIGN KEY (`FK_NEWS`) REFERENCES `news` (`ID_NEWS`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

delete from user;

select *from user;


