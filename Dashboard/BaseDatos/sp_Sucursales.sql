Use MAD
DROP PROCEDURE sp_Surcursales
CREATE PROCEDURE sp_Surcursales(
	@Opc						VARCHAR(20),
	@id_Sucursal				int=null,
	@fk_Registro_Empleado		int=null,
	@fk_Encargado				int=null,
	@Fecha_de_Alta			    date=null,
	@Fecha_Modificacion			date=null,
	@Nombre						varchar(30)=null,
	@Domicilio					varchar(30)=null

)
AS
BEGIN
	BEGIN TRANSACTION

	IF @Opc = 'Insert'
	BEGIN 
	INSERT INTO Sucursal(Fecha_Alta)
		VALUES(GETDATE());

  declare @idSucursal int = IDENT_CURRENT('Sucursal')

  INSERT INTO Encargado(fk_Sucursales,fk_Registro_Empleado,fk_Encargado)
		VALUES(@idSucursal,@fk_Registro_Empleado,@fk_Encargado);

  INSERT INTO DATOS_SUCURSAL(fk_sucursal,Nombre,Domicilio)
		VALUES(@idSucursal,@Nombre,@Domicilio);
  end
  IF @Opc = 'Delete'
	BEGIN
		DELETE FROM Encargado WHERE fk_Sucursales= @id_Sucursal
		DELETE FROM DATOS_SUCURSAL WHERE  fk_Sucursal= @id_Sucursal
		DELETE FROM Sucursal WHERE  id_Sucursal= @id_Sucursal
	END
	IF @Opc = 'Update'
	BEGIN
		UPDATE Sucursal
			SET Fecha_Modificacion = ISNULL(GETDATE(), Fecha_Modificacion) WHERE id_Sucursal = @id_Sucursal;
		UPDATE DATOS_SUCURSAL
			SET Nombre= ISNULL(@Nombre,Nombre),
				Domicilio=ISNULL(@Domicilio,Domicilio)
				 WHERE fk_Sucursal = @id_Sucursal;

		UPDATE Encargado
			SET fk_Sucursales= ISNULL(@id_Sucursal,fk_Sucursales),
				fk_Registro_Empleado=ISNULL(@fk_Registro_Empleado,fk_Registro_Empleado),
				fk_Encargado=ISNULL(@fk_Encargado,fk_Encargado)
				 WHERE fk_Sucursales = @id_Sucursal;
			END

	IF @Opc = 'SearchUser'
	BEGIN 
		SELECT fk_sucursal
		FROM DATOS_SUCURSAL
		WHERE fk_sucursal = @id_Sucursal
	END

		IF @Opc = 'Select'
	BEGIN
		SELECT Nombre,	Domicilio FROM DATOS_SUCURSAL
		ORDER BY Nombre
	END
 
	IF @@ERROR = 0
		COMMIT
	ELSE
		ROLLBACK
END

---------------

