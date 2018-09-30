--Creación de la base de datos
Create database RopaLinda

Use RopaLinda

--Creación de tablas
drop table Usuario
Create table Usuario(
rfc char(13) NOT NULL,
apellido varchar(50) NOT NULL,
nombre varchar(50) NOT NULL,
codigoPostal varchar(8) NOT NULL,
colonia varchar(50) NOT NULL,
calle varchar(50) NOT NULL,
numExterior int NOT NULL,
numInterior int,
celular char(10) NOT NULL,
fechaNac Datetime NOT NULL,
pais varchar(15) NOT NULL,
estado varchar(15) NOT NULL,
municipio varchar(15) NOT NULL,
correo varchar(320) NOT NULL,
contraseña BINARY(64) NOT NULL,
pendiente BIT NOT NULL,             -- BIT RECIBE 0 o 1, en cuanto se hace un registro mandarlo como 1
rechazado BIT NOT NULL,				-- BIT RECIBE 0 o 1, en cuanto se hace un registro mandarlo como 0
Tipo INT NOT NULL
)
ALTER TABLE Usuario
ADD CONSTRAINT PK_Usuario PRIMARY KEY (rfc);

--Procedimiento Para registrar un cliente
--drop procedure RegistroUsuario
CREATE PROCEDURE RegistroUsuario
    @rfc CHAR(13),
	@apellido VARCHAR(50),
	@nombre VARCHAR(50),
	@codigoPostal VARCHAR(8),
	@colonia VARCHAR(50),
	@calle VARCHAR(50),
	@numExterior INT,
	@numInterior INT,
	@celular CHAR(10),
	@fechaNac DATETIME,
	@pais VARCHAR(15),
	@estado VARCHAR(15),
	@municipio VARCHAR(15),
	@correo VARCHAR(320),
	@contraseña VARCHAR(100)
AS
BEGIN
	--Validar si el usuario ya existe y esta pendiente de revisión
	IF EXISTS (SELECT rfc FROM Usuario WHERE rfc=@rfc AND pendiente=1)
	BEGIN
		RAISERROR('Usuario pendiente de revisión',10,1);
		RETURN 0
	END

	--Validar si el usuario ya fue rechazado
	IF EXISTS (SELECT rfc FROM Usuario WHERE rfc=@rfc AND rechazado=1)
	BEGIN
		RAISERROR('Usuario rechazado',10,2);
		RETURN 0
	END

	--Validar si el usuario existe
	IF EXISTS (SELECT rfc FROM Usuario WHERE rfc=@rfc)
	BEGIN
		RAISERROR('Usuario ya registrado',10,3);
		RETURN 0
	END

    BEGIN TRY
			INSERT INTO Usuario (rfc,apellido,nombre,codigoPostal,colonia,calle,numExterior,numInterior,celular,fechaNac,pais,estado,municipio,correo,contraseña,pendiente,rechazado,tipo)
			VALUES(@rfc,@apellido,@nombre,@codigoPostal,@colonia,@calle,@numExterior,@numInterior,@celular,@fechaNac,@pais,@estado,
			@municipio,@correo, HASHBYTES('SHA2_512', @contraseña),1,0,111)
			PRINT ('Has sido registrado');
			RETURN 1
    END TRY
    BEGIN CATCH
        PRINT (ERROR_MESSAGE());
		RETURN 0
    END CATCH
END
-----------------------PRUEBA DE REGISTRO--------------------------------------------
--USUARIO NORMAL
EXEC RegistroUsuario
    @rfc = 'LOMM960619HSL',
	@apellido = 'López Malacón',
	@nombre = 'Jose Manuel',
	@codigoPostal = 80060 ,
	@colonia = 'Col. Las Quintas',
	@calle = 'Angel Flores',
	@numExterior = 999,
	@numInterior = NULL,
	@celular = '6671257966',
	@fechaNac = '1996-06-19',
	@pais = 'Mexico',
	@estado = 'Sinaloa',
	@municipio = 'Culiacan',
	@correo = 'josemanuellopez_19@hotmail.com',
	@contraseña = 'admin123'

EXEC RegistroUsuario
    @rfc = 'LOME971123HSL',
	@apellido = 'López Malacón',
	@nombre = 'Miguel Ernesto',
	@codigoPostal = 80060 ,
	@colonia = 'Col. Las Quintas',
	@calle = 'Angel Flores',
	@numExterior = 999,
	@numInterior = NULL,
	@celular = '6671257966',
	@fechaNac = '1996-06-19',
	@pais = 'Mexico',
	@estado = 'Sinaloa',
	@municipio = 'Culiacan',
	@correo = 'miguelernesto_23@hotmail.com',
	@contraseña = 'admin123'

EXEC RegistroUsuario
    @rfc = 'LOMJ020831HSL',
	@apellido = 'López Malacón',
	@nombre = 'Jesús Antonio',
	@codigoPostal = 80060 ,
	@colonia = 'Col. Las Quintas',
	@calle = 'Angel Flores',
	@numExterior = 999,
	@numInterior = NULL,
	@celular = '6671257966',
	@fechaNac = '1996-06-19',
	@pais = 'Mexico',
	@estado = 'Sinaloa',
	@municipio = 'Culiacan',
	@correo = 'chuy04@hotmail.com',
	@contraseña = 'admin123'
-----------------------------------------------------------------
SELECT * FROM Usuario
-----------------------------------------------------------------
--Registro de ADMINISTRADORES/DISEÑADORES
--drop procedure RegistroAdmDis
CREATE PROCEDURE RegistroAdmDis
    @rfc CHAR(13),
	@apellido VARCHAR(50),
	@nombre VARCHAR(50),
	@celular CHAR(10),
	@fechaNac DATETIME,
	@correo VARCHAR(320),
	@contraseña VARCHAR(100),
	@tipo INT
AS
BEGIN
	--Validar si el usuario existe
	IF EXISTS (SELECT rfc FROM Usuario WHERE rfc=@rfc)
	BEGIN
		RAISERROR('Usuario ya registrado',10,3);
		RETURN 0
	END

    BEGIN TRY
			INSERT INTO Usuario (rfc,apellido,nombre,codigoPostal,colonia,calle,numExterior,numInterior,celular,fechaNac,pais,estado,municipio,correo,contraseña,pendiente,rechazado,tipo)
			VALUES(@rfc,@apellido,@nombre,0,'','',0,0,@celular,@fechaNac,'','',
			'',@correo, HASHBYTES('SHA2_512', @contraseña),0,0,@tipo)
			PRINT ('Has sido registrado');
			RETURN 1
    END TRY
    BEGIN CATCH
        PRINT (ERROR_MESSAGE());
		RETURN 0
    END CATCH
END
-----------------------------------------------------------------
--PRUEBA REGISTRO ADM / DIS
--ADMINISTRADOR
EXEC RegistroAdmDis
    @rfc = 'MEDA951202HSL',
	@apellido = 'Medrano Diaz',
	@nombre = 'Manuel Alejandro',
	@celular = '6671456345',
	@fechaNac = '1995-12-02',
	@correo = 'manyalex@hotmail.com',
	@contraseña = 'many',
	@tipo = 999  

--DISEÑADORA
EXEC RegistroAdmDis
    @rfc = 'MESF940226HSL',
	@apellido = 'Mejia Salcido',
	@nombre = 'María Fernanda',
	@celular = '6671935732',
	@fechaNac = '1994-02-26',
	@correo = 'ma_fer_945@hotmail.com',
	@contraseña = 'fer',
	@tipo = 444

Select * from Usuario where Tipo<>111
-----------------------------------------------------------------
--drop procedure AceptaUsuario
CREATE PROCEDURE AceptaUsuario
	@rfc char(13)
AS
BEGIN
	IF NOT EXISTS (SELECT rfc FROM Usuario WHERE rfc=@rfc)
	BEGIN
			RAISERROR('Usuario no existente',10,1)
			RETURN 0	
	END
	BEGIN TRAN 
		IF EXISTS ( SELECT rfc FROM Usuario  WITH (UPDLOCK,INDEX(PK_Usuario)) WHERE rfc = @rfc)  
		BEGIN
			UPDATE Usuario																
			SET pendiente = 0,
				rechazado = 0																		
			WHERE rfc = @rfc
			PRINT('Cliente aceptado con exito')	
		END
	COMMIT TRAN
	RETURN 1
END

EXEC AceptaUsuario
	@rfc='LOMJ020831HSL'

SELECT * FROM Usuario WHERE rfc='LOMJ020831HSL'
-----------------------------------------------------------------
--drop procedure RechazaUsuario
CREATE PROCEDURE RechazaUsuario
	@rfc CHAR(13)
AS
BEGIN
	IF NOT EXISTS (SELECT rfc FROM Usuario WHERE rfc=@rfc)
	BEGIN
			RAISERROR('Usuario no existente',10,1)
			RETURN 1		
	END
	BEGIN TRAN 
		IF EXISTS ( SELECT rfc FROM Usuario WITH (UPDLOCK,INDEX(PK_Usuario)) WHERE rfc = @rfc)  
		BEGIN
			UPDATE Usuario																
			SET pendiente = 0 ,
				rechazado = 1																		
			WHERE rfc = @rfc
			PRINT('Usuario rechazado con exito')
		END
	COMMIT TRAN
	return 0
END

EXEC RechazaUsuario
	@rfc='LOME971123HSL'

SELECT * FROM Usuario WHERE rfc='LOME971123HSL'

--------------------LOGIN------------------------------------------
--drop procedure Autenticacion
CREATE PROCEDURE Autenticacion
    @correo VARCHAR(320),
    @contraseña VARCHAR(100)
AS
BEGIN
    DECLARE @rfc VARCHAR(13)
	DECLARE @tipo INT
	--Validar usuario y contraseña correcto
    IF EXISTS (SELECT TOP 1 rfc FROM Usuario WHERE correo=@correo)
	BEGIN
		SET @rfc=(SELECT rfc FROM Usuario WHERE correo=@correo AND contraseña=HASHBYTES('SHA2_512', @contraseña))
		IF(@rfc IS NULL)
	    BEGIN
           RAISERROR('Contraseña Incorrecta',10,1)
		   RETURN 0
	    END
        ELSE 
			--Validar si el usuario ya existe y esta pendiente de revisión
			IF EXISTS (SELECT rfc FROM Usuario WHERE rfc=@rfc AND pendiente=1)
			BEGIN
				RAISERROR('Usuario pendiente de revisión',10,2)
				RETURN 0		
			END

			--Validar si el usuario ya fue rechazado
			IF EXISTS (SELECT rfc FROM Usuario WHERE rfc=@rfc AND rechazado=1)
			BEGIN
				RAISERROR('Usuario rechazado',10,3)
				RETURN 0
			END
            PRINT('Autenticación correcta')
			SET @tipo = (SELECT tipo FROM Usuario WHERE rfc=@rfc)
			RETURN @tipo
    END
    ELSE
       RAISERROR('Autenticación Invalida',10,4)
	   RETURN 0
END

---------------------------PROBAR EL LOGIN---------------------------------------
-- USUARIO NORMAL
--Correcto
EXEC Autenticacion
		@Correo = 'chuy04@hotmail.com',
		@Contraseña = 'admin123'

--Login incorrecto
EXEC Autenticacion
		@Correo = 'Admin',
		@Contraseña = '123'

--Contraseña incorrecta
EXEC Autenticacion
		@Correo = 'miguelernesto_23@hotmail.com',
		@Contraseña = '123'

--USUARIO PENDIENTE

EXEC Autenticacion
		@Correo = 'josemanuellopez_19@hotmail.com',
		@Contraseña = 'admin123'

--USUARIO RECHAZADO

EXEC Autenticacion
		@Correo = 'miguelernesto_23@hotmail.com',
		@Contraseña = 'admin123'

----------------------------------------------------------------
--CONSULTA CLIENTES
--drop procedure ChecarClientes
CREATE PROCEDURE ChecarClientes
AS
BEGIN
	SELECT rfc,apellido,nombre,correo,fechaNac,celular,codigoPostal,colonia,calle,numExterior,numInterior,pais,estado,municipio
	FROM Usuario
	WHERE pendiente = 0 AND rechazado = 0 AND tipo=111
END

EXEC ChecarClientes
----------------------------------------------------------------
--USUARIOS PENDIENTES QUE SERAN MOSTRADOS AL ADM PARA SU REVISIÓN
--drop procedure UsuariosPendientes
CREATE PROCEDURE UsuariosPendientes
AS
BEGIN
	SELECT rfc,apellido,nombre,correo,fechaNac,celular,codigoPostal,colonia,calle,numExterior,numInterior,pais,estado,municipio
	FROM Usuario 
	WHERE pendiente = 1 AND tipo=111
END

EXEC UsuariosPendientes
----------------------------------------------------------------
--CONSULTA USUARIOS YA RECHAZADOS
CREATE PROCEDURE UsuariosRechazados
AS
BEGIN
	SELECT rfc,apellido,nombre,correo,fechaNac,celular,codigoPostal,colonia,calle,numExterior,numInterior,pais,estado,municipio
	FROM Usuario
	WHERE rechazado = 1 AND tipo=111
END

EXEC UsuariosRechazados



