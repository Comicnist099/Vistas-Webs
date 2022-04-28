DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_NEWS_COMMENT`(
    IN opcion            char(20),
    IN Reportero		 int,
    IN News    			 int,
    IN content			 varchar(200),
    IN idComentario      int
    )
BEGIN

IF opcion = 'Insertar'
THEN

INSERT INTO comment(FK_NEWS,FK_USER,FK_COMMENT,CONTENT,DATE_CREATION)
        VALUES (News,Reportero,idComentario,content,sysdate());
END IF;


IF opcion = 'Eliminar'
THEN

delete from comment where FK_COMMENT=idComentario OR ID_COMMENT=idComentario;
END IF;

IF opcion = 'EliminarSOLO'
THEN

delete from comment where ID_COMMENT=idComentario;
END IF;


END$$
DELIMITER ;


delete from comment;
Select *from comment where FK_COMMENT=18;
Select *from comment where FK_COMMENT= 27;
Select *from comment;
select * from comment where fk_news=164;
select * from user;