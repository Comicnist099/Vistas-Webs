DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_ELIMINAR_NEWS`(
	IN opcion 				char(19),
    IN vIDnews    			 int
    )
BEGIN

IF opcion = 'Gusta'
THEN
delete from tag_car where FK_NEWS=vIDnews; 
delete from gallery_news where FK_NEWS=vIDnews; 
DELETE from news WHERE ID_NEWS =vIDnews;
	
END IF;

END$$
DELIMITER ;

select * from tag_car;
select * from gallery_news;