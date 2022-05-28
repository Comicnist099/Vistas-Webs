CREATE DATABASE Web1;
-- CREATE OR REPLACE OBJETOS_LOB AS'C:\Imagenes';

USE Web1;

CREATE TABLE Categoria (
Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
Nombre VARCHAR (400) NOT NULL
);

CREATE TABLE Usuario(
Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
Nombre VARCHAR(30) NOT NULL,
Apellidos VARCHAR(30) NOT NULL,
Nombre_Usuario VARCHAR(30) NOT NULL,
Correo VARCHAR(30) NOT NULL,
Contraseña VARCHAR(30) NOT NULL,
Estado VARCHAR(30) NOT NULL,
Foto VARCHAR(30) NOT NULL,
Numero_Preguntas INT NOT NULL,
Numero_Favoritos INT NOT NULL,
Fecha_Creacion DATE NOT NULL
);
CREATE TABLE Pregunta (
Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
Id_Usuario  INT NOT NULL,
Id_Categoria INT NOT NULL,
Pregunta VARCHAR (200) NOT NULL,
Descripcion VARCHAR (400) NOT NULL,
Foto VARCHAR(30),
Fecha_Creacion DATE NOT NULL,
-- reacciones_preguntas enum('Me_GUSTA','NoMe_Gusta', 'Favoritos'),
FOREIGN KEY (id_Usuario) REFERENCES Usuario(id),
FOREIGN KEY (id_Categoria) REFERENCES Categoria(id)
-- FOREIGN KEY (reacciones_preguntas) REFERENCES Reaccciones(reacciones)

);


CREATE TABLE Respuesta (
Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
Id_Usuario  INT NOT NULL,
Id_Pregunta INT NOT NULL,
Respuesta VARCHAR (200) NOT NULL,
Descripcion VARCHAR (1400) NOT NULL,
-- reacciones_preguntas enum('Me_GUSTA','NoMe_Gusta', 'Favoritos'),
Fecha_Creacion DATE NOT NULL,
FOREIGN KEY (id_usuario) REFERENCES usuario(id),
FOREIGN KEY (id_pregunta) REFERENCES Pregunta(id)
-- FOREIGN KEY (reacciones_preguntas) REFERENCES Reaccciones(reacciones)
);


CREATE TABLE Reacciones(
id_Usuario INT NOT NULL,
id_Pregunta INT NOT NULL,
reacciones enum('Me_GUSTA','NoMe_Gusta', 'Favoritos')
);


INSERT INTO Usuario(Nombre, Apellidos,Nombre_Usuario, Correo, Contraseña,Estado,Numero_Preguntas, Numero_Favoritos,foto, Fecha_Creacion) VALUES
("Gloria", "Paredes", "glorial","gloria@outlook.com","Aa3!5678","Activo",0,0,"C:\Imagenes\chango.png","1973-04-09"),
("Toni", "Mohamed","toni12", "toni@outlook.com","Bb3!5678","Activo",0,0,"C:\Imagenes\chango2.png","1995-08-07"),
("Constantino", "Canales","contantino3", "constantino@outlook.com","Cc3!5678","Activo",0,0,"C:\Imagenes\chango3.png","1977-09-15"),
("Bernabe", "Galvan", "bernabe4","Bernabe@outlook.com","Dd3!5678","Activo",0,0,"C:\Imagenes\chango4.png","1977-09-15"),
("Pablo", "Moreira", "paulo5","pablo@outlook.com","Ee3!5678","Suspendido",0,0,"C:\Imagenes\chango5.png","1977-09-15");



INSERT INTO Categoria(Nombre) VALUES
("Finanzas"),
("Cocina"),
("Educacion"),
("deportes"),
("Videojuegos");


INSERT INTO Pregunta(id_Usuario,Id_Categoria,Pregunta,descripcion,Fecha_Creacion)VALUES
("4","1", "¿Cuándo se hace la declaración anual ante hacienda?"," Es la primera vez que tengo que declarar impuestos y estoy muy confundido. Por favor, ayúdenme.","2021-04-01"),
("1","5", "¿Es buena idea regalar Grand Theft Auto Va un nieto?"," Escuché a mi nieto decir que acaba de salir ese juego a la venta. Parece que le gusta mucho y me gustaría regalárselo para festejar que ya se graduó de la preparatoria. ¿Es buena idea? Es que me han dicho que puede ser una mala influencia.","2013-09-17");

INSERT INTO Reacciones(id_Usuario,id_Pregunta,reacciones)VALUES
("5","1",'Favoritos'),
("2","1",'NoMe_Gusta'),
("3","1",'NoMe_Gusta');

INSERT INTO Respuesta(Id_Usuario,Id_Pregunta,Respuesta,Descripcion,Fecha_Creacion)VALUES
("2","1","La declaración anual se hace en Abril de cada año y se declara lo del año pasado." ,"Por ejemplo, estamos en 2021, entonces lo que se declara este mes de Abril es lo del 2020.","2021-04-02"),
("4","2","Creo que debería mejor hablarlo con su nieto.", "Solo porque lo haya mencionado no significa que esté interesado en el juego y en base a eso ya puede decidir si regalárselo o no. Puede que arruine el factor sorpresa pero es mejor que tener que andarlo regresando a la tienda y su nieto estará contento de todas formas aunque no sea una sorpresa, se lo aseguro. Ahora, segúramente esté preocupada por que se dice que el juego es violento. Si bien es cierto, dice que su nieto se está graduando de la preparatoria por lo que imagino que tendrá entre 17 y 18 años, así que no debería ser un problema ya que el juego está clasificado para personas de 17 años en adelante.","2013-09-23"),
("3","2", "Mejor regálele ropa,"," si le regala un videojuego se va a distraer de sus estudios.","2013-09-21");


DELIMITER //
DROP PROCEDURE IF EXISTS Alta//
CREATE PROCEDURE Alta(IN Nombre VARCHAR(30), IN Apellidos VARCHAR(30), IN Nombre_usuario VARCHAR(30), IN Correo VARCHAR(39),IN Constraseña VARCHAR(30),IN Estado VARCHAR(30), IN Foto VARCHAR(40),IN Numero_preguntas INT, IN Numero_Favoritos INT,IN Fecha_creacion DATE)
BEGIN
    -- DECLARE nuevo INT;
INSERT INTO Usuario(Nombre, Apellidos,Nombre_Usuario, Correo, Contraseña,Estado,Numero_Preguntas, Numero_Favoritos,foto, Fecha_Creacion) VALUES
(Nombre,Apellidos,Nombre_usuario,Correo,Contraseña,Estado, Foto,Numero_preguntas,Numero_Favoritos,Fecha_creacion);
    -- SET nuevo = last_insert_id();
    -- INSERT INTO nota(usuarioId, nota) VALUES (nuevo, parametro3);
END//

DROP PROCEDURE IF EXISTS Ver//
CREATE PROCEDURE Ver()
BEGIN
    SELECT* FROM Usuario;
SELECT* FROM categoria;
SELECT* FROM Pregunta;
SELECT* FROM reacciones;
SELECT* FROM respuesta;

END//

DROP PROCEDURE IF EXISTS Eliminar_Tablas//
CREATE PROCEDURE Eliminar()
BEGIN
 DROP TABLE Categoria;
 DROP TABLE Usuario;
 DROP TABLE Pregunta;
 DROP TABLE respuesta;
 DROP TABLE reacciones;

END//
DELIMITER ;
CALL Ver();

-- DELETE FROM Usuario where id=4;

-- DELETE FROM Usuario where 
