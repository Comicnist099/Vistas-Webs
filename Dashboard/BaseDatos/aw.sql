CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria de la tabla USER\\n',
  `CORREO` varchar(200) NOT NULL COMMENT 'Correo electronico del usuario',
  `PASSWORD` varchar(200) NOT NULL COMMENT 'Contraseña del USER\n',
  PRIMARY KEY (`ID_USER`)
) 
