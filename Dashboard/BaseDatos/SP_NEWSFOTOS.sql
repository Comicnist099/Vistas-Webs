DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_NEWSFOTOS`(
    IN opcion            char(20),
    IN mulmedia 			 mediumblob
    )
BEGIN

IF opcion = 'Insertar'
THEN
set @news=(SELECT MAX(ID_NEWS) FROM news);
INSERT INTO gallery_news(FK_NEWS,MULTIMEDIA)
        VALUES (@news,mulmedia);
END IF;


END$$
DELIMITER ;
select*from news_histroy;
select*from gallery_news;
select*from tag_car;
select*from news;
Select *from comment;

delete from comment;
delete from news_histroy;
delete from news_likes;
delete from gallery_news;
delete from tag_car;
delete from news;
