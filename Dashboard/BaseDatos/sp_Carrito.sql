Use MAD;
drop procedure sp_Carrito

CREATE PROCEDURE sp_Carrito(
	@Opc						VARCHAR(20),
	@Id_Cantidad				INT=NULL,
	@Estado						varchar(20) = 'NOPAGADO',
	@Envio						varchar(20) = 'SUCURSAL',
	@fk_Usuario					int=NULL,
	@fk_Producto				int=NULL,
	@Nombre						varchar(20)=NULL,
	@Descripcion				varchar(20)=NULL,
	@Cantidad					float=NULL,
	@Descuento					float=null,
	@Categoria					varchar(20)=null,
	@Precio						float=null
	)
	AS
BEGIN
	BEGIN TRANSACTION

	IF @Opc = 'InsertCarrito'
	BEGIN 
	INSERT INTO Carrito (Estado,Envio,fk_Usuario)
		VALUES(@Estado,@Envio,@fk_Usuario);
	END	

	
	IF @Opc = 'InsertProductoCarrito'
	BEGIN 
	declare @Total float =@Cantidad*@Precio;
	declare @descuentoto float= (@Precio*@Descuento)/100;
	declare @PrecioDescuentado float = @Precio-@descuentoto;
	declare @TotalDescuento float= @Cantidad*@PrecioDescuentado;

	INSERT INTO CarritoProducto(fk_Usuario,fk_Producto, Nombre,Categoria,Descripción,Precio,Cantidad,Total,Descuento,PrecioDescuentado,TotalDescuentado)
		VALUES(@fk_Usuario,@fk_Producto,@Nombre,@Categoria,@Descripcion,@Precio,@Cantidad,@Total,@Descuento,@PrecioDescuentado,@TotalDescuento);
	END	

	IF @Opc='EliminarProducto'
	BEGIN	
		DELETE FROM CarritoProducto WHERE fk_Producto= @fk_Producto
END

	IF @@ERROR = 0
		COMMIT
	ELSE
		ROLLBACK
END

EXEC sp_Carrito 'InsertCarrito',@fk_Usuario=4

EXEC sp_Carrito 'InsertProductoCarrito',@fk_Usuario=4,@fk_Producto=1,@Nombre='platanito',@Categoria='fruta',@Descripcion='Ta amarillo',@Precio=205,@Cantidad=2,@Descuento=40
Select * from Carrito
select * from CarritoProducto

-------PRODUCTO-------
Create TABLE Producto(
id_Producto INT primary key IDENTITY(1,1),
fk_Empleados int not null,

CONSTRAINT fk_producto FOREIGN KEY(fk_Empleados) REFERENCES Empleados(Id_Empleados),
)
Create TABLE Precio(
fk_Producto int not null,
Precio float not null,
Descuento float,
CONSTRAINT fk_Precio FOREIGN KEY(fk_Producto) REFERENCES Producto(id_Producto),
)
Create TABLE DatosPrecio(
fk_Producto int not null,
Nombre varchar(20) not null,
Descripcion varchar(20) not null,
Categoria varchar(20) not null,
CONSTRAINT fk_DatosPrecio FOREIGN KEY(fk_Producto) REFERENCES Producto(id_Producto),
)
drop table Precio,DatosPrecio,Producto


select 