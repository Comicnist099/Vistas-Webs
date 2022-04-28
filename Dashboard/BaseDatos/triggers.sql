
############### TRIGGERS
#### INSERTAR 
DELIMITER $$
CREATE TRIGGER T_History_Tag AFTER INSERT ON tag
FOR EACH ROW
BEGIN
set @tagUser=(SELECT MAX(ID_TAG) FROM tag);
set @ReporteroCambio =(select CREATE_BY from tag where ID_TAG=@tagUser);
set @UserNombre =(select NAME from user where ID_USER=@ReporteroCambio);
set @NombreSeccion =(select NAME from tag where ID_TAG=@tagUser);

	INSERT INTO tag_history(accion , reportero,`date`,Seccion)
	VALUES ("INSERT",  @UserNombre,sysdate(),@NombreSeccion);
    
END $$
DELIMITER ;
#############    HISTORIAL DE NOTICIAS
DELIMITER $$
CREATE TRIGGER T_History_News AFTER INSERT ON news
FOR EACH ROW
BEGIN
set @tagnews=(SELECT MAX(ID_NEWS) FROM news);
set @Reporteroid =(select fk_REPORTER from news where ID_NEWS=@tagnews);
set @ReporteroNombre =(select `NAME` from user where ID_USER=@Reporteroid);
set @TitleTitulo =(select TITLE from news where ID_NEWS=@tagnews);
set @UserNombre =(select NAME from user where ID_USER=@ReporteroCambio);
set @NombreSeccion =(select NAME from tag where ID_TAG=@tagUser);

	INSERT INTO news_histroy(fk_news , Titulo,reportero,`date`,accion)
	VALUES (@tagnews, @TitleTitulo,@ReporteroNombre,sysdate(),"INSERT");
    
END $$
DELIMITER ;
select * from news;


##ELIMINAR TRIGGERS
drop trigger T_History_Tag;
drop trigger T_History_News;

################ VIEWS
CREATE VIEW V_tag_history AS select accion as Accion, reportero as 'REGISTRO',date,Seccion from tag_history;

CREATE VIEW V_News_short AS select ID_NEWS,TITLE,LOCATION,CONTENIDO,DATE_PUBLICACION,STATE,FK_REPORTER,Comentario from news;

CREATE VIEW V_News_tag As select Fk_NEWS as 'IdNoticia', nombreSeccion as 'Seccion' from tag_car;


CREATE VIEW v_News_multimedia As select Fk_NEWS as 'IdNoticia', MULTIMEDIA as 'Multimedia',EXTENSION  from gallery_news;

CREATE VIEW V_tag AS select tg.NAME as 'NOMBRE', tg.DATE as 'FECHA',tg.state,CREATE_BY,color
from tag as tg;

############################
Select *from V_News_short;
Select *from V_News_tag;
Select *from v_News_multimedia where idNoticia=56;

select* from tag_car;
select* from tag;
select* from user;
select* from news;
