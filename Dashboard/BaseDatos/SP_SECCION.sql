DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_NEWSECCION`(
    IN opcion            char(20),
    IN seccion			 char(50)
    )
BEGIN

IF opcion = 'Insertar'
THEN
set @news=(SELECT MAX(ID_NEWS) FROM news);
INSERT INTO tag_car(FK_NEWS,nombreSeccion)
        VALUES (@news,seccion);
END IF;


END$$
DELIMITER ;
call PROC_NEWSECCION('Insertar',1,74);
INSERT INTO tag_car(FK_NEWS,FK_TAG)
        VALUES (1,57);
        
        
############ ELIMINAR        
delete from tag_car;  
delete from gallery_news;
delete from news;


############  TAGS        
select *from tag;
select *from tag_car;
select *from news;
select *from gallery_news;
select *from user;
