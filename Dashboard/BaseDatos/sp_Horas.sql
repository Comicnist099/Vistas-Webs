Use MAD
DROP PROCEDURE sp_Horas
CREATE PROCEDURE sp_Horas(
    @Opc                        VARCHAR(20),
    @id_Horas                    int=null,
    @Id_Empleado                int =null,
    @Hora_Entrada                varchar(20)=null,
    @Hora_Salida                varchar(20)=null,
    @Fecha                        date=null

)
AS
BEGIN
    BEGIN TRANSACTION

    IF @Opc = 'Insert'
    BEGIN 
    INSERT INTO Horas(fk_Empleado,Hora_Entrada,Hora_Salida,Fecha)
        VALUES(@Id_Empleado,@Hora_Entrada,@Hora_Salida,GETDATE());
    END
    IF @@ERROR = 0
        COMMIT
    ELSE
        ROLLBACK
END

EXEC sp_Horas @Opc='Insert',@Id_Empleado=18,@Hora_Entrada='10:20 am',@Hora_Salida='10:39 pm'

select * from Horas
.
.
.
Create Table Horas(
id_Horas INT primary key IDENTITY(1,1),
fk_Empleado int not null,
Hora_Entrada varchar(10) not null,
Hora_Salida varchar(10) not null,
Fecha date not null
CONSTRAINT horasss FOREIGN KEY(fk_Empleado) REFERENCES Empleados(id_Empleados),

)
Insert Horas 

select *from cuentas
drop table Horas