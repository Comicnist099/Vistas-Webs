DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_LIKE_NEWS`(
    IN opcion            char(20),
    IN Reportero		 int,
    IN News    			 int
    )
BEGIN

IF opcion = 'Gusta'
THEN

INSERT INTO news_likes(fk_news,fk_users,`like`)
        VALUES (News,Reportero,1);

call PROC_NEWS('likeMas',News,null,null,null,null,null,null,null,null);      

END IF;

IF opcion = 'NoGusta'
THEN

delete from news_likes where fk_news=news AND fk_users=Reportero;  
call PROC_NEWS('likeMenos',News,null,null,null,null,null,null,null,null);        
END IF;


END$$
DELIMITER ;
delete from news_likes;
delete from news_likes where fk_news=163 AND fk_users=56;  
select * from news_likes;