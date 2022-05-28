


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

END$$
DELIMITER ;


call PROC_USER("Insertar","Nombre","Alias","Correo","Contraseña",null,1,"Activo",2011-12-18);

drop table user_type;

ALTER TABLE user MODIFY COLUMN AVATAR_PIC mediumblob NULL COMMENT 'Foto del USER\n';

ALTER TABLE user_type MODIFY COLUMN ID_USER_TYPE int NOT NULL AUTO_INCREMENT;

select * from user;
select * from user_type;

UPDATE user 
SET 
    NAME="pNAME",
    ALIAS="pALIAS",
    PASSWORD="a"
WHERE
    CORREO = "meme1@gmail.com";  
    
    
SELECT Avatar_PIC FROM user WHERE CORREO="XD@gmail.com";
call PROC_USER ('SelectFoto',null,null,"XD@gmail.com",null, null, null, null);

call PROC_USER ('UpdateFoto',null,null,"Correo",null, null, null, null);

DROP PROCEDURE IF EXISTS PROC_USER;

DELIMITER $$
CREATE PROCEDURE PROC_USER(
    IN opcion            char(20),
	IN pNAME       		 VARCHAR(200),
	IN pALIAS            VARCHAR(100),
    IN pCORREO		     VARCHAR(100),
    IN pPASS             VARCHAR(200),
	IN pPROFILE_PIC      mediumblob,
    IN pUSER_TYPE        VARCHAR(50),
    IN pSTATE			 VARCHAR(50)
    )
BEGIN
IF opcion = 'Insertar'
THEN
INSERT INTO user(NAME, ALIAS, CORREO, PASSWORD, CREATION_DATE, AVATAR_PIC, USER_TYPE, STATE)
        VALUES (pNAME, pALIAS, pCORREO, pPASS,  sysdate(), pPROFILE_PIC, pUSER_TYPE,pSTATE);

END IF;


IF opcion = 'Update'
THEN
UPDATE user 
SET 
    NAME=pNAME,
    ALIAS=pALIAS,
    PASSWORD=pPASS
WHERE
    CORREO = pCORREO;  
END IF;


IF opcion = 'UpdateFoto'
THEN
UPDATE user 
SET 
    AVATAR_PIC=pPROFILE_PIC
WHERE
    CORREO = pCORREO;  
END IF;

IF opcion = 'SelectFoto'
THEN
SELECT AVATAR_PIC FROM user WHERE CORREO=pCORREO;
END IF;


IF opcion='Desconectado'
THEN
UPDATE user 
SET 
    STATE = "Desconectado"
WHERE
    CORREO = pCORREO;
END IF;

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

INSERT INTO user_type(DESCRIPCION,DATE)
        VALUES ("Reportero", sysdate());
        

