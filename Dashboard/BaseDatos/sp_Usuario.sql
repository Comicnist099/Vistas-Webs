Use MAD
DROP PROCEDURE sp_Usuario

CREATE PROCEDURE sp_Usuario(
	@Opc						VARCHAR(20),
	@ID_Usuario					INT = NULL,
	@Fecha_de_Alta				DATE = NULL,
	@Fecha_de_Modificacion		DATE = NULL,
	@Fecha_de_Nacimiento		DATE = NULL,
	@RFC					    VARCHAR(40) = NULL,
	@Nombre						VARCHAR(20) = NULL,
	@ApPaterno					VARCHAR(20) = NULL,
	@ApMaterno					VARCHAR(20) = NULL,  
	@Nombre_Usuario    			VARCHAR(30) = NULL,
    @Contrasena      			VARCHAR(30) = NULL,
	@MetodoPago					VARCHAR(50) = NULL,
	@Correo						VARCHAR(30) = NULL,
	@CURP						VARCHAR(30) = NULL,
	@Domicilio				    VARCHAR(30) = NULL,
	@Celular					VARCHAR(15) = NULL,
	@Estado						VARCHAR(20) = 'ACTIVO'
)

AS
BEGIN
	BEGIN TRANSACTION

	IF @Opc = 'Insert'
	BEGIN 
	INSERT INTO USUARIO(Fecha_de_alta)
		VALUES(GETDATE());

	declare @idUsuario int = IDENT_CURRENT('USUARIO')

	INSERT INTO DatosPersonales(fk_Usuario,Nombre,Apellido_M,Apellido_P,Correo,CURP,Fecha_de_nacimiento,Celular,Domicilio)
		VALUES(@idUsuario,@Nombre,@ApMaterno,@ApPaterno,@Correo,@CURP,@Fecha_de_Nacimiento,@Celular,@Domicilio);

	INSERT INTO MetodoPago(fk_Usuario,MetodoPago)
		VALUES(@idUsuario,@MetodoPago);

	INSERT INTO Cuenta(fk_Usuario,Nombre_Usuario, Contraseña,Estado)
		VALUES(@idUsuario ,@Nombre_Usuario,@Contrasena,@Estado);
	END

		IF @Opc = 'Delete'
	BEGIN
		DELETE FROM DatosPersonales WHERE fk_Usuario= @ID_Usuario
		DELETE FROM Cuenta WHERE  fk_Usuario= @ID_Usuario
		DELETE FROM MetodoPago WHERE  fk_Usuario= @ID_Usuario
		DELETE FROM USUARIO WHERE  ID_Usuario= @ID_Usuario
	END

	IF @Opc = 'Update'
	BEGIN
		UPDATE USUARIO
			SET Fecha_de_Modificacion = ISNULL(GETDATE(), Fecha_de_Modificacion) WHERE ID_Usuario = @ID_Usuario;
		UPDATE DatosPersonales
			SET Nombre = ISNULL(@Nombre, Nombre),
				Apellido_M = ISNULL(@ApMaterno, Apellido_M),
				Apellido_P = ISNULL(@ApPaterno, Apellido_P),
				Correo = ISNULL(@Correo, Correo),
				CURP = ISNULL(@CURP, CURP),
				Fecha_de_nacimiento = ISNULL(@Fecha_de_nacimiento, Fecha_de_nacimiento),
				Celular = ISNULL(@Celular, Celular),
				Domicilio = ISNULL(@Domicilio, Domicilio)
				WHERE fk_Usuario = @ID_Usuario;
		UPDATE  MetodoPago
			SET MetodoPago= ISNULL(@MetodoPago,MetodoPago) WHERE fk_Usuario= @ID_Usuario
		UPDATE Cuenta
			SET Nombre_Usuario=ISNULL(@Nombre_Usuario,Nombre_Usuario),
			    Contraseña = ISNULL(@Contrasena,Contraseña)
				WHERE fk_Usuario=@ID_Usuario
	END

	IF @Opc = 'LogIn'
	BEGIN
		SELECT Contraseña FROM Cuenta
		WHERE Nombre_Usuario = @Nombre_Usuario AND fk_Usuario = @ID_Usuario
	END

	IF @Opc = 'SearchUser'
	BEGIN 
		SELECT fk_Usuario
		FROM Cuenta
		WHERE fk_Usuario = @ID_Usuario
	END
	

	IF @Opc = 'Select'
	BEGIN
		SELECT Nombre_Usuario,	Contraseña FROM Cuenta
		ORDER BY Nombre_Usuario
	END

	IF @@ERROR = 0
		COMMIT
	ELSE
		ROLLBACK
END

----EJEMPLO PARA LLENADO DE INFO----------------- 
Exec sp_Usuario 'Insert', NULL,NULL,NULL,'2000-01-01','a','b','c','d','e','f','g','h','i','j','k'


-------EJEMPLO PARA MODIFICAR INFO-----------
Exec sp_Usuario 'Update', 4,NULL,NULL,'2000-03-01','b','b','b','b','b','b','b','b','b','b','b'



-----------PRUEBA DE PROCEDURE--------------
Exec sp_Usuario 'LogIn', @ID_Usuario=3,@Nombre_Usuario='e'
Exec sp_Usuario 'Delete', @ID_Usuario=3



----VER TABLAS------
Select *from USUARIO
Select *from DatosPersonales
Select *from MetodoPago
Select *from Cuenta











Create TABLE Carrito(
Estado varchar(20) not null,
Envio varchar(20) not null,
fk_Usuario int not null,

CONSTRAINT FK_UsuarioCaa FOREIGN KEY(fk_Usuario) REFERENCES Usuario(ID_Usuario),
)
Create TABLE CarritoProducto(
id_cantidad int primary key IDENTITY(1,1),
fk_Usuario int not null,
fk_Producto int not null,
Nombre varchar(20) not null,
Categoria varchar(20) not null,
Descripción varchar(40) not  null,
Precio float not null,
Descuento float not null,
PrecioDescuentado float not null,
Cantidad float not null,
Total  float not null,
TotalDescuentado float not null,
CONSTRAINT fk_CarritoProducto FOREIGN KEY(fk_Usuario) REFERENCES Usuario(ID_Usuario),
CONSTRAINT fk_CarritoProductoPRO FOREIGN KEY(fk_Producto) REFERENCES Producto(id_Producto),
)
drop table CarritoProducto,Carrito
--------------USUARIO---------------------
Create TABLE USUARIO(
ID_Usuario   INT primary key IDENTITY(1,1),
Fecha_de_Alta date not null,
Fecha_de_Modificacion date ,
)

Create TABLE MetodoPago(
fk_Usuario int not null,
MetodoPago varchar(20) not null 
CONSTRAINT FK_MetodoPago FOREIGN KEY(fk_Usuario) REFERENCES Usuario(ID_Usuario),

)

Create TABLE DatosPersonales(
fk_Usuario int not null,
Nombre varchar(20)not null,
Apellido_M varchar(20)not null,
Apellido_P varchar(20)not null,
Celular varchar(20)not null,
Domicilio varchar(20)not null,
Correo varchar(20)not null,
CURP varchar(20) not null,
Fecha_de_Nacimiento date not null,
CONSTRAINT FK_DatosPersonal FOREIGN KEY(fk_Usuario) REFERENCES USUARIO(ID_Usuario),

)
Create TABLE Cuenta(
fk_Usuario int not null,
Nombre_Usuario varchar(20) not null,
Contraseña varchar(20) not null,
Estado varchar(20) not null,
CONSTRAINT FK_Cuenta FOREIGN KEY(fk_Usuario) REFERENCES USUARIO(ID_Usuario),

)
drop table Cuenta, DatosPersonales,MetodoPago,USUARIO