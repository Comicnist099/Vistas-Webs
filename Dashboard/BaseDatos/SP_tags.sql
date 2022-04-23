DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_TAG`(
    IN opcion            char(20),
    IN nameTag			 char(20),
    IN reportero		 int,
    IN color			char(20)
    )
BEGIN
IF opcion = 'Insertar'
THEN
INSERT INTO tag(NAME,DATE,CREATE_BY,state,COLOR)
        VALUES (nameTag,sysdate(),reportero,'Activo',color);

END IF;

IF opcion = 'Eliminar2'
THEN
set @UserNombre =(select NAME from user where ID_USER=reportero);
	INSERT INTO tag_history(accion , reportero,`date`,Seccion)
	VALUES ("DELETE",  @UserNombre,sysdate(),nametag);
UPDATE tag 
SET 
state='Eliminar'
WHERE
    NAME = nameTag;  

END IF;


IF opcion = 'Eliminar'
THEN
set @UserNombre =(select NAME from user where ID_USER=reportero);
	INSERT INTO tag_history(accion , reportero,`date`,Seccion)
	VALUES ("DELETE",  @UserNombre,sysdate(),nametag);
delete from tag
WHERE
    NAME = nameTag;  

END IF;

END$$
DELIMITER ;

SELECT MAX(ID_TAG) FROM tag;

call PROC_TAG('Insertar','Deportes',56,'Amarillo');
call PROC_TAG('Insertar','espectaculos',57);
call PROC_TAG('Eliminar','espectaculos',56);


#############Views
select * from V_tag;
select * FROM V_tag_history;
select * FROM gallery_news;
select * FROM news;
select * FROM tag_car;

################################
select *from user;
select *from tag;

####  BORRAR TAG & TAG HISTORY
delete from tag;
delete from tag_history;
delete from gallery_news;
delete from tag_car;
delete from news;

