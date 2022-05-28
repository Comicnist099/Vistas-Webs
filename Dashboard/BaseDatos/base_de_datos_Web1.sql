CREATE TABLE `etiquetas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `NombreEtiqueta` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `notas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(400) NOT NULL,
  `Fecha_Creacion` date NOT NULL,
  `id_Etiqueta` int NOT NULL,
  `id_Usuario` int NOT NULL,
  `Estado` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idEtiquetas_idx` (`id_Etiqueta`),
  KEY `fk_idUsuario_idx` (`id_Usuario`),
  CONSTRAINT `fk_idEtiquetas` FOREIGN KEY (`id_Etiqueta`) REFERENCES `etiquetas` (`id`),
  CONSTRAINT `fk_idUsuario` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  `Apellidos` varchar(120) NOT NULL,
  `Fecha_Nacimiento` datetime NOT NULL,
  `Correo` varchar(120) NOT NULL,
  `Usuario` varchar(120) NOT NULL,
  `Contrasenia` varchar(120) NOT NULL,
  `Foto` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



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
                                     in aContrasenia varchar(120),
                                     in aFoto varchar(200))
BEGIN
	INSERT into usuario(Nombre,Apellidos,Fecha_Nacimiento,Correo,Usuario,Contrasenia,Foto) 
    value(aNombre,aApellidos,aFecha_Nacimiento,aCorreo,aUsuario,aContrasenia,aFoto);
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







call sp_insertaNombre('Marco','hola', '1989-12-23','castillo','David','monicaca','monicaca');
call sp_mostrarNombre;
call sp_insertarCategoria("Eventos");
call sp_mostrarCategoria;
call sp_entrarUsuario("dasdsad","MAriobros123.");
use wen1;
select * from notas;
call sp_insertarNota("Estudiar para los examenes",1,1,"ELIMINADO");
call sp_mostrarNota;
delete from notas where id=10;
call sp_eliminarNota(4);
call get_etiquetasp(3);
call get_etiquetas();
select *from usuario


select * from notas where Estado="ACTIVO";
UPDATE notas 
    SET Descripcion = 'None' 
    WHERE id=22;
    
    