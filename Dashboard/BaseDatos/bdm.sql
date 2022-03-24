DROP PROCEDURE IF EXISTS PROC_USER;

DELIMITER $$
CREATE PROCEDURE PROC_USER(
    IN opcion            char(20),
	IN pNAME       		 VARCHAR(200),
	IN pALIAS            VARCHAR(100),
    IN pCORREO		     VARCHAR(100),
    IN pPASS             VARCHAR(200),
	IN pPROFILE_PIC      MEDIUMBLOB,
    IN pUSER_TYPE        VARCHAR(50),
    IN pSTATE			 VARCHAR(50),
    IN pBIRTHDAY    	 DATE
    )
BEGIN
IF opcion = 'Insertar'
THEN
INSERT INTO user(NAME, ALIAS, CORREO, PASSWORD, CREATION_DATE, AVATAR_PIC, USER_TYPE, STATE,BIRTHDAY)
        VALUES (pNAME, pALIAS, pCORREO, pPASS,  sysdate(), pPROFILE_PIC, pUSER_TYPE,pSTATE, pBIRTHDAY);

END IF;
-------------------
IF opcion = 'Update'
THEN
UPDATE user 
SET 
    NAME=pNAME,
    ALIAS=pALIAS,
    PASSWORD=pPASS,
    AVATAR_PIC=pPROFILE_PIC
WHERE
    CORREO = pCORREO;  
END IF;
---------------------
IF opcion='Desconectado'
THEN
UPDATE user 
SET 
    STATE = "Desconectado"
WHERE
    CORREO = pCORREO;
END IF;

-----------------
IF opcion='Activo'
THEN
UPDATE user 
SET 
    STATE = "Activo"
WHERE
    CORREO = pCORREO;
END IF;
END$$
DELIMITER ;
-----LLAMAR TABLAS-----
select * from user;
select * from user_type;
-----ALTERAR TABLAS--------

ALTER TABLE user MODIFY COLUMN AVATAR_PIC mediumblob NULL COMMENT 'Foto del USER\n';

ALTER TABLE user_type MODIFY COLUMN ID_USER_TYPE int NOT NULL AUTO_INCREMENT;



-----LLAMADAS---------
call PROC_USER('Insertar','Nombre2','Alias2','Correo2','Contraseña2',null,1,"Activo",2011-12-18);
call PROC_USER('Update','NombreUpdate','AliasUpdate','Correo2','ContraseñaUpdate',null,1,"Activo",2011-12-18);

call PROC_USER('Activo',null,null,"Correo",null,null,null,'Desconectado',null);
call PROC_USER('Desconectado',null,null,"Correo",null,null,null,'Activo',null);

-----DATO DE ALTA DE TIPOS DE USUARIOS--------

INSERT INTO user_type(DESCRIPCION,DATE)
        VALUES ("Usuario", sysdate());
        
INSERT INTO user_type(DESCRIPCION,DATE)
        VALUES ("Administrador", sysdate());
        
INSERT INTO user_type(DESCRIPCION,DATE)
        VALUES ("Reportero", sysdate());
        

