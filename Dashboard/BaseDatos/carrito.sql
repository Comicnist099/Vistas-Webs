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
	IF @Opc = 'EJEMPLO'
	BEGIN 
	declare @Total2 float =@Cantidad*@Precio; 
	declare @descuentoto2 float= (@Precio*@Descuento)/100;
	declare @PrecioDescuentado2 float = @Precio-@descuentoto2;
	declare @TotalDescuento2 float= @Cantidad*@PrecioDescuentado2;
		
		INSERT INTO EJEMPLO(fk_Usuario,fk_Producto,Precio,Descuento,Cantidad,Total,PrecioDescuentado2,TotalDescuentado,Nombre,Categoria,Descripcion)
		values(@fk_Usuario,@fk_Producto,@Precio,@Descuento,@Cantidad,@Total2,@PrecioDescuentado2,@TotalDescuento2,@Nombre,@Categoria,@Descripcion);


	END	

	IF @Opc='EliminarProducto'
	BEGIN	
		DELETE FROM EJEMPLO WHERE fk_Producto= @fk_Producto
END

	IF @@ERROR = 0
		COMMIT
	ELSE
		ROLLBACK
END

EXEC sp_Carrito 'InsertCarrito',@fk_Usuario=4

EXEC sp_Carrito @Opc='InsertProductoCarrito',@fk_Usuario=4,@fk_Producto=1,@Nombre='platanito',@Categoria='fruta',@Descripcion='Ta amarillo',@Precio=6,@Cantidad=2,@Descuento=40
Select * from Carrito
select * from CarritoProducto
EXEC sp_Carrito 'EJEMPLO', @fk_Usuario=4,@fk_Producto=1,@Precio=100,@Descuento=20,@Cantidad=9,@Nombre='platanito',@Categoria='fruta',@Descripcion='Ta amarillo'
EXEC sp_Carrito 'EJEMPLO'

SELECT * FROM ejemplo
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


drop table EJEMPLO
	Create TABLE EJEMPLO(
	id_cantidad int primary key IDENTITY(1,1),
	fk_Usuario int not null,
	fk_Producto int not null,
	Categoria varchar(20) not null,
	Descripcion varchar(40) not  null,
	Nombre varchar(20) not null,
	Precio float not null,
	Descuento float not null,
	Cantidad float not null,
	PrecioDescuentado2 float not null,
	Total float not null,
	TotalDescuentado float not null,
	CONSTRAINT fk_CarritoPr FOREIGN KEY(fk_Usuario) REFERENCES Usuario(ID_Usuario),
	CONSTRAINT fk_CarritoProdu FOREIGN KEY(fk_Producto) REFERENCES Producto(id_Producto),
	)
