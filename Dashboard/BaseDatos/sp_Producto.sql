Use MAD;
DROP PROCEDURE sp_Producto;
Create PROCEDURE sp_Producto(
	@Opc			varchar(20),
	@ID_Producto	int =NULL,
	@fk_Empleado	int =NULL,
	@Precio			float =NULL,
	@Descuento		float =NULL,
	@Nombre			varchar(20)=NULL,
	@Descripcion	varchar(20)=NULL,
	@Categoria		varchar(20)=null
)
AS
BEGIN
	BEGIN TRANSACTION

		IF @Opc = 'Insert'
	BEGIN 
	INSERT INTO Producto(fk_Empleados)
		VALUES(@fk_Empleado);

	declare @Id_Empleado int = IDENT_CURRENT('Producto')

	INSERT INTO Precio(fk_Producto,Precio, Descuento)
		VALUES(@Id_Empleado,@Precio,@Descuento)

	INSERT INTO DatosPrecio(fk_Producto,Nombre, Descripcion,Categoria)
		VALUES(@Id_Empleado,@Nombre,@Descripcion,@Categoria)
	END

	IF @Opc = 'Update'
	BEGIN
		UPDATE Producto
			SET fk_Empleados = ISNULL(@fk_Empleado, fk_Empleados) WHERE id_Producto = @ID_Producto;
		UPDATE DatosPrecio
			SET Nombre = ISNULL(@Nombre, Nombre),
				Descripcion = ISNULL(@Descripcion, Descripcion),
				Categoria=ISNULL(@Categoria,Categoria)
				WHERE fk_Producto = @ID_Producto;
				
		UPDATE  Precio
			SET Precio= ISNULL(@Precio,Precio),
				Descuento=ISNULL(@Descuento,Descuento)
			WHERE fk_Producto = @ID_Producto;
	END


	IF @Opc = 'SelectAll'
	BEGIN
		SELECT id_Producto
		FROM Producto
	END


	IF @@ERROR = 0
		COMMIT
	ELSE
		ROLLBACK
END
EXEC sp_Producto 'Insert',Null,18,20.5,10,'platanito','Ta Amarillo','Fruta'

Select * from DatosPrecio
Select * from Producto
select * from precio