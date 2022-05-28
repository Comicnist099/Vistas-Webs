use MAD
Drop table DatosPersonalesEmpleado
drop table rol
drop table Empleados
Drop table MetodoPago
Drop table DatosPersonales
Drop table Cuenta
Drop table USUARIO 
drop table Cuentas
Drop table carritoProducto
Drop table carrito
drop table Producto
drop table DatosPrecio
drop table Precio
drop table Cuentas

drop table Horas


------------EMPLEADOS--------------

Create Table Empleados(
Id_Empleados INT primary key IDENTITY(1,1),
Fecha_de_alta date not null,
Fecha_de_Modificacion date,
)
Create Table DatosPersonalesEmpleado(
fk_Empleado int not null,
Nombre varchar(20) not null,
Apellido_M varchar(20) not null,
Apellido_P varchar(20) not null,
Correo varchar(30) not null,
RFC varchar(40) not null,
CURP varchar(40) not null,
Fecha_de_nacimiento date not null,
Celular varchar(15) not null,
Domicilio varchar(30) not null,
CONSTRAINT FK_DatosPersonalesEmpleado FOREIGN KEY(fk_Empleado) REFERENCES Empleados(Id_Empleados),

)

Create Table Rol(
fk_Empleado int not null,
Rol varchar(20) not null,
CONSTRAINT fk_Rol FOREIGN KEY(fk_Empleado) REFERENCES Empleados(Id_Empleados),
)

Create Table Cuentas(
fk_Empleado int not null,
Nombre_Usuario varchar(20) not null,
Contraseña varchar(20) not null, 
Estado varchar(20)not null
CONSTRAINT fk_Cuentas FOREIGN KEY(fk_Empleado) REFERENCES Empleados(Id_Empleados),

)
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
Nombre float not null,
Descripcion varchar(20) not null,
CONSTRAINT fk_DatosPrecio FOREIGN KEY(fk_Producto) REFERENCES Producto(id_Producto),
)
---------CARRITO ----------------

Create TABLE Carrito(
id_Carrito INT primary key IDENTITY(1,1),
Estado varchar(20) not null,
Envio varchar(20) not null,
)
Create TABLE CarritoProducto(
fk_Carrito int not null,
fk_Producto int not null,
Nombre varchar(20) not null,
Categoria varchar(20) not null,
Descripción varchar(40) not null,
Cantidad int not null,
Total  float not null,
CONSTRAINT fk_CarritoProducto FOREIGN KEY(fk_Carrito) REFERENCES Carrito(id_Carrito),
CONSTRAINT fk_CarritoProductoPRO FOREIGN KEY(fk_Producto) REFERENCES Producto(id_Producto),

)
--------------USUARIO---------------------
Create TABLE USUARIO(
ID_Usuario   INT primary key IDENTITY(1,1),
Fecha_de_Alta date not null,
Fecha_de_Modificacion date ,
fk_Carrito int not null,
CONSTRAINT FK_UsuarioCa FOREIGN KEY(fk_Carrito) REFERENCES Carrito(id_Carrito),

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
CONSTRAINT FK_DatosPersonal FOREIGN KEY(fk_Usuario) REFERENCES USUARIO(ID_Usuario),

)
Create TABLE Cuenta(
fk_Usuario int not null,
Nombre_Usuario varchar(20) not null,
Contraseña varchar(20) not null,
Estado varchar(20) not null,
CURP varchar(20) not null,
CONSTRAINT FK_Cuenta FOREIGN KEY(fk_Usuario) REFERENCES USUARIO(ID_Usuario),

)


-----HORAS DE ENTRADA Y SALIDA-------
Create Table Horas(
id_Empleado int not null,
Hora_Entrada varchar(10) not null,
Hora_Salida varchar(10) not null,
Fecha date not null
CONSTRAINT FK_Horas FOREIGN KEY(id_Empleado) REFERENCES Empleados(id_Empleados),

)
-----------SUCURSALES-------------------
Create Table Sucursal(
id_Sucursal INT primary key IDENTITY(1,1),
Fecha_Alta date not null,
Fecha_Modificacion date not null,
)
Create Table Encargado(
fk_Sucursales int not null,
fk_Registro_Empleado int not null,
fk_Encargado int not null

CONSTRAINT FK_EncargadoSu FOREIGN KEY(fk_Sucursales) REFERENCES Sucursal(id_Sucursal),
CONSTRAINT FK_EncargadoEmple FOREIGN KEY(fk_Registro_Empleado) REFERENCES Empleados(id_Empleados),
CONSTRAINT FK_EncargadoEncarga FOREIGN KEY(fk_Encargado) REFERENCES Empleados(id_Empleados),
)


Create Table DATOS_SUCURSAL (
fk_sucursal int not null,
Nombre varchar(30)  not null,
Domicilio varchar(30) not null,
CONSTRAINT FK_Datos_Sucursal FOREIGN KEY(fk_sucursal) REFERENCES Sucursal(id_Sucursal),
)








			