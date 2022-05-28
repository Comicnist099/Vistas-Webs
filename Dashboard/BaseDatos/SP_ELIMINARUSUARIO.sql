DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_ELIMINAR_REPORTERO`(
    IN vOpcion            char(20),
    IN vUser				 int
    )
BEGIN

IF vOpcion = 'Eliminar_Usuario'
THEN

set @Reporteroid =(select COUNT(FK_REPORTER) from news where FK_REPORTER=vUser AND (STATE="Bajada" OR STATE="Revision");

delete from tag_car where FK_NEWS=;
delete from news where FK_REPORTER=vUser AND STATE="Bajada" OR STATE="Revision";
delete from comment where FK_USER=vUser;
delete from user where ID_USER=vUser;

END IF;
END$$
DELIMITER ;

SELECT * FROM news where FK_REPORTER=69 AND (STATE='Bajada' OR STATE='Revision');

select *from tag_car where FK_NEWS=;
select * from news;
select * from tag_car;
select * from gallery_news;
select * from news where FK_REPORTER=61 AND (STATE="Bajada" OR STATE="Revision");

SELECT * FROM news WHERE NEWS_DATE BETWEEN '2022-04-16' AND '2022-04-00';