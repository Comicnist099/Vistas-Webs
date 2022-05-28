CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  `Apellidos` varchar(120) NOT NULL,
  `Fecha_Nacimiento` datetime NOT NULL,
  `Correo` varchar(120) NOT NULL,
  `Usuario` varchar(120) NOT NULL,
  `Contrasenia` varchar(120) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `notas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(400) NOT NULL,
  `Fecha_Creacion` date NOT NULL,
  `NombreEtiqueta` varchar(100) NOT NULL,
  `id_Usuario` int NOT NULL,
  `Estado` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idUsuario_idx` (`id_Usuario`),
  CONSTRAINT `fk_idUsuario` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `etiquetas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `NombreEtiqueta` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `fotosperfil` (
  `id_Usuario` int NOT NULL AUTO_INCREMENT,
  `Foto` longblob NOT NULL,
  PRIMARY KEY (`id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


use wen1;

SELECT* FROM usuario;
Select * from notas;
Select * from etiquetas;

insert into Etiquetas(NombreEtiqueta) values("Trabajo");
insert into Etiquetas(NombreEtiqueta) values("Ocio");
insert into Etiquetas(NombreEtiqueta) values("Tareas");
insert into Etiquetas(NombreEtiqueta) values("Compras");
insert into Etiquetas(NombreEtiqueta) values("Eventos");






DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_etiquetas`()
BEGIN
SELECT `etiquetas`.`id`,
    `etiquetas`.`NombreEtiqueta`
    FROM `wen1`.`etiquetas`;

END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_etiquetasp`(

IN `pId` int
)
BEGIN
SELECT `etiquetas`.`id`,
    `etiquetas`.`NombreEtiqueta`
FROM `wen1`.`etiquetas`

WHERE `etiquetas`.`id`=  `pId`;

END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminarNota`(in aid int)
BEGIN
	DELETE FROM notas WHERE id=aid;

END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_entrarUsuario`(in aUsuario varchar(120),
									 in aContrasenia varchar(120))
BEGIN
 SELECT
	u.id,
	u.Usuario
 FROM usuario u
 WHERE 
	u.Usuario= aUsuario
    AND u.Contrasenia = aContrasenia;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertaNombre`(in anombre varchar(120),
									 in aApellidos varchar(120),
                                     in aFecha_Nacimiento datetime,
									 in aCorreo varchar(120),
                                     in aUsuario varchar(120),
                                     in aContrasenia varchar(120)
                                     )
BEGIN
	INSERT into usuario(Nombre,Apellidos,Fecha_Nacimiento,Correo,Usuario,Contrasenia) 
    value(aNombre,aApellidos,aFecha_Nacimiento,aCorreo,aUsuario,aContrasenia);
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarCategoria`(in aNombreEtiqueta varchar(120))
BEGIN
	INSERT into etiquetas(NombreEtiqueta)
	values(aNombreEtiqueta);

END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarNota`(in aDescripcion varchar (300),
									in aid_Etiqueta int,
									in aid_Usuario int,
                                    in aEstado varchar(45))
BEGIN
	INSERT into notas (Descripcion,Fecha_Creacion,id_Etiqueta,id_Usuario,Estado)
    value(aDescripcion,NOW(),aid_Etiqueta,aid_Usuario,aEstado);


END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrarCategoria`()
BEGIN
	select * from etiquetas;

END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrarNombre`()
BEGIN
	select* from usuario;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrarNota`()
BEGIN
select * from notas;
END$$
DELIMITER ;


