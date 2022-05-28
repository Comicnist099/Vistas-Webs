use MAD


create view Re_Usuario
as
Select Nombre,Domicilio from DatosPersonales


create view Re_Producto
as
Select Categoria,Descripcion,Nombre, Precio,Descuento,Cantidad,PrecioDescuentado2,Total, TotalDescuentado,Ahorrado
from EJEMPLO


create view Re_Sucursal
as
Select Nombre,Domicilio
From DATOS_SUCURSAL

create view Re_Carrito
as
select Estado,Envio
from Carrito


Select * from Re_Producto where fk_Usuario =1
Select * from Re_Sucursal
Select * from Re_Usuario
select * from Re_Carrito









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
    Ahorrado float not null,
    CONSTRAINT fk_CarritoPr FOREIGN KEY(fk_Usuario) REFERENCES Usuario(ID_Usuario),
    CONSTRAINT fk_CarritoProdu FOREIGN KEY(fk_Producto) REFERENCES Producto(id_Producto),
    )