DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_NEWS`(
    IN opcion            char(20),
    IN id				 int,
    IN title			 char(100),
	IN news_date		 date,
    IN location		 	 char(200),
    IN contenido 		 varchar(2000),
    IN fk_reporter		 int,
    IN keyword			 char(200),
    IN firma			 char(100),
    IN Hora				 char(100)
    )
BEGIN
IF opcion = 'Insertar'
THEN
INSERT INTO news(TITLE,NEWS_DATE,DATE_PUBLICACION,LOCATION,CONTENIDO,LIKES,FK_REPORTER,STATE,KEYWORD,SIGN_REPORTER,HORA,Comentario)
        VALUES (title,news_date,sysdate(),location,contenido,0,fk_reporter,'Terminada',keyword,firma,Hora,'...');

END IF;

IF opcion = 'likeMas'
THEN
UPDATE news 
SET 
likes=likes+1
WHERE
    ID_NEWS =id ;  
    
END IF;

IF opcion = 'likeMenos'
THEN
UPDATE news 
SET 
likes=likes-1
WHERE
    ID_NEWS =id ;  
    
END IF;


IF opcion = 'Aceptada'
THEN
UPDATE news 
SET 
STATE='Aceptada'
WHERE
    ID_NEWS =id ;  
    
END IF;


END$$
DELIMITER ;

#######   PROCEDURE DECLARACIONES ############
call PROC_NEWS('Insertar',null,'Santa cachucha',"2017-06-15",'Bernando Reyes 304','HOLAAAA aaaaaa', 56,'increible','Marco David Castillo Cantu','a');
call PROC_NEWS('likeMas',1,null,null,null,null,null,null,null);
call PROC_NEWS('likeMenos',1,null,null,null,null,null,null,null);

################
#### VIEWS #################
CREATE VIEW V_news AS select TITLE, NEWS_DATE,DATE_PUBLICACION,LOCATION,CONTENIDO,LIKES from tag INNER JOIN user;

select * from user;
select * from gallery_news;
select * from tag_car;
select * from tag where `NAME` ="Espectaculos";





