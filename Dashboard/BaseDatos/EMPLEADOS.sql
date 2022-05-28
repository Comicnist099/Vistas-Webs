



EXEC sp_Empleados 'Insert',Null,Null,NULL,'2000-01-01','a','b','c','d','e','f','g','g','g','g','g','g'


-------ELIMINAR-----
-------LOGIN---------------------
EXEC sp_Empleados 'LogIn', @Nombre_Usuario=e, @Estado=Activo;

-------VER--------
Select * from Empleados
Select * from Cuentas


----
use MAD
IF EXISTS(SELECT 1 FROM sysobjects WHERE name = 'sp_Empleados' AND type = 'P')
BEGIN
	DROP PROCEDURE sp_Empleados;
END
GO

CREATE PROCEDURE sp_Empleados(
	@Opc						VARCHAR(20),
	@ID							INT = NULL,
	@Fecha_de_Alta				DATE = NULL,
	@Fecha_de_Modificacion		DATE = NULL,
	@Fecha_de_Nacimiento		DATE = NULL,
	@RFC					    VARCHAR(40) = NULL,
	@Nombre						VARCHAR(20) = NULL,
	@ApPaterno					VARCHAR(20) = NULL,
	@ApMaterno					VARCHAR(20) = NULL,  
	@Nombre_Usuario    			VARCHAR(30) = NULL,
    @Contrasena      			VARCHAR(30) = NULL,
	@Rol						VARCHAR(50) = NULL,
	@Correo						VARCHAR(30) = NULL,
	@CURP						VARCHAR(30) = NULL,
	@Domicilio				    VARCHAR(30) = NULL,
	@Celular					VARCHAR(15) = NULL,
	@Estado						VARCHAR(20) = NULL
)
AS
BEGIN
	BEGIN TRANSACTION

	IF @Opc = 'Insert'
	BEGIN 
	INSERT INTO Empleados(Fecha_de_alta)
		VALUES(GETDATE());

	declare @idEmpleado int = IDENT_CURRENT('Empleados')

	INSERT INTO DatosPersonalesEmpleado(fk_Empleado,Nombre,Apellido_M,Apellido_P,Correo,RFC,CURP,Fecha_de_nacimiento,Celular,Domicilio)
		VALUES(@idEmpleado,@Nombre,@ApMaterno,@ApPaterno,@Correo,@RFC,@CURP,@Fecha_de_Nacimiento,@Celular,@Domicilio);

	INSERT INTO Rol(fk_Empleado,Rol)
		VALUES(@idEmpleado,@Rol);

	INSERT INTO Cuentas(fk_Empleado,Nombre_Usuario, Contraseña,Estado)
		VALUES(@idEmpleado ,@Nombre_Usuario,@Contrasena,@Estado);
	END


	IF @Opc = 'Delete'
	BEGIN
		DELETE FROM DatosPersonalesEmpleado WHERE fk_Empleado= @ID
		DELETE FROM Cuentas WHERE  fk_Empleado= @ID
		DELETE FROM Rol WHERE  fk_Empleado= @ID
		DELETE FROM Empleados WHERE  Id_Empleados= @ID

		IF @Opc = 'LogIn'
	BEGIN
		SELECT Contraseña FROM Cuentas
		WHERE Nombre_Usuario = @Nombre_Usuario AND Estado = @Estado
	END

	IF @Opc = 'SearchUser'
	BEGIN 
		SELECT fk_Empleado
		FROM Cuentas
		WHERE fk_Empleado = @ID
	END
	

	IF @Opc = 'Select'
	BEGIN
		SELECT Nombre_Usuario,	Contraseña FROM Cuentas WHERE Estado = @Estado
		ORDER BY Nombre_Usuario
	END
----------------NUEVO-----------------
	IF @Opc = 'Update'
	BEGIN
		UPDATE Empleados
			SET Fecha_de_Modificacion = ISNULL(GETDATE(), Fecha_de_Modificacion) WHERE Id_Empleados = @ID;
		UPDATE DatosPersonalesEmpleado
			SET Nombre = ISNULL(@Nombre, Nombre),
				Apellido_M = ISNULL(@ApMaterno, Apellido_M),
				Apellido_P = ISNULL(@ApPaterno, Apellido_P),
				Correo = ISNULL(@Correo, Correo),
				RFC = ISNULL(@RFC, RFC),
				CURP = ISNULL(@CURP, CURP),
				Fecha_de_nacimiento = ISNULL(@Fecha_de_nacimiento, Fecha_de_nacimiento),
				Celular = ISNULL(@Celular, Celular),
				Domicilio = ISNULL(@Domicilio, Domicilio)
				WHERE fk_Empleado = @ID;
		UPDATE  Rol
			SET Rol= ISNULL(@Rol,Rol) WHERE fk_Empleado= @ID
		UPDATE Cuentas
			SET Nombre_Usuario=ISNULL(@Nombre_Usuario,Nombre_Usuario),
			    Contraseña = ISNULL(@Contrasena,Contraseña)
				WHERE fk_Empleado=@ID
	END
	IF @@ERROR = 0
		COMMIT
	ELSE
		ROLLBACK
END


	----------------
	
	----------------------


	IF @Opc = 'SelectByUsername'
	BEGIN
		SELECT IdEmpleado 'ID', E.Nombre, ApPaterno 'Apellido paterno', ApMaterno 'Apellido materno', Email, FNac 'Fecha de nacimiento', NSS, CURP, RFC, Telefono 'Teléfono', P.NombrePuesto 'Puesto', E.PuestoID 'ID del Puesto', U.Nombre 'Usuario', U.SuperUser 'Administrador', U.Persistent 'Recordar Contraseña'
			FROM Empleados E
			JOIN Usuarios U
			ON E.UsuarioID = U.IdUsuario
			JOIN Puestos P
			ON E.PuestoID = P.IdPuesto
		WHERE U.Nombre = @NombreUsuario
		--WHERE IdEmpleado = @ID
	END

	IF @Opc = 'SelectAll'
	BEGIN
		SELECT IdEmpleado 'ID', E.Nombre, ApPaterno 'Apellido paterno', ApMaterno 'Apellido materno', Email, FNac 'Fecha de nacimiento', NSS, CURP, RFC, Telefono 'Teléfono', P.NombrePuesto 'Puesto', E.PuestoID 'ID del Puesto', U.Nombre 'Usuario', U.SuperUser 'Administrador', U.Persistent 'Recordar Contraseña'
			FROM Empleados E
			JOIN Usuarios U
			ON E.UsuarioID = U.IdUsuario
			JOIN Puestos P
			ON E.PuestoID = P.IdPuesto
		ORDER BY E.Nombre
	END

	

	IF @@ERROR = 0
		COMMIT
	ELSE
		ROLLBACK
END