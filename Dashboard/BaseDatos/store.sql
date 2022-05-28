DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_USER`(
    IN opcion            char(20),
    IN pID				 int,
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
    PASSWORD=pPASS,
    CORREO=pCORREO
WHERE
    ID_USER = pID;  
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
CALL `bdm`.`PROC_USER`(<{IN opcion            char(20)}>, <{IN pID				 int}>, <{IN pNAME       		 VARCHAR(200)}>, <{IN pALIAS            VARCHAR(100)}>, <{IN pCORREO		     VARCHAR(100)}>, <{IN pPASS             VARCHAR(200)}>, <{IN pPROFILE_PIC      mediumblob}>, <{IN pUSER_TYPE        VARCHAR(50)}>, <{IN pSTATE			 VARCHAR(50)}>);
