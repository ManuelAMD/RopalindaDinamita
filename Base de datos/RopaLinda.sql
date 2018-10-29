--Creación de la base de datos
Create database RopaLinda

Use RopaLinda
--drop database RopaLinda
--Creación de tablas
--drop table Usuario
Create table Usuario(
id int identity (20000,1) Not null,
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
email varchar(320) NOT NULL,
password VarChar(64) NOT NULL,
sexo CHAR(1) NOT NULL,				-- H o M
pendiente BIT NOT NULL,             -- BIT RECIBE 0 o 1, en cuanto se hace un registro mandarlo como 1
rechazado BIT NOT NULL,				-- BIT RECIBE 0 o 1, en cuanto se hace un registro mandarlo como 0
Tipo INT NOT NULL,
remember_token nvarchar(100)
)
ALTER TABLE Usuario
ADD CONSTRAINT PK_Usuario PRIMARY KEY (id,email);

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
	@email VARCHAR(320),
	@password VARCHAR(100),
	@sexo CHAR(1)
AS
BEGIN
	--Validar si el usuario ya existe y esta pendiente de revisión
	IF EXISTS (SELECT email FROM Usuario WHERE email=@email AND pendiente=1)
	BEGIN
		RAISERROR('Usuario pendiente de revisión',10,1);
		RETURN 0
	END

	--Validar si el usuario ya fue rechazado
	IF EXISTS (SELECT email FROM Usuario WHERE email=@email AND rechazado=1)
	BEGIN
		RAISERROR('Usuario rechazado',10,2);
		RETURN 0
	END

	--Validar si el usuario existe
	IF EXISTS (SELECT email FROM Usuario WHERE email=@email)
	BEGIN
		RAISERROR('Usuario ya registrado',10,3);
		RETURN 0
	END

    BEGIN TRY
			INSERT INTO Usuario (rfc,apellido,nombre,codigoPostal,colonia,calle,numExterior,numInterior,celular,fechaNac,pais,estado,municipio,email,password,sexo,pendiente,rechazado,tipo)
			VALUES(@rfc,@apellido,@nombre,@codigoPostal,@colonia,@calle,@numExterior,@numInterior,@celular,@fechaNac,@pais,@estado,
			@municipio,@email,@password,@sexo,1,0,111)
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
	@email = 'josemanuellopez_19@hotmail.com',
	@password = 'admin123',
	@sexo = 'H'

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
	@email = 'miguelernesto_23@hotmail.com',
	@password = 'admin123',
	@sexo = 'H'

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
	@email = 'chuy04@hotmail.com',
	@password = 'admin123',
	@sexo = 'H'
-----------------------------------------------------------------
SELECT * FROM Usuario
--Delete From Usuario Where id = 20000
-----------------------------------------------------------------
--Registro de ADMINISTRADORES/DISEÑADORES
--drop procedure RegistroAdmDis
CREATE PROCEDURE RegistroAdmDis
    @rfc CHAR(13),
	@apellido VARCHAR(50),
	@nombre VARCHAR(50),
	@celular CHAR(10),
	@fechaNac DATETIME,
	@email VARCHAR(320),
	@password VARCHAR(100),
	@sexo CHAR(1),
	@tipo INT
AS
BEGIN
	--Validar si el usuario existe
	IF EXISTS (SELECT email FROM Usuario WHERE email=@email)
	BEGIN
		RAISERROR('Usuario ya registrado',10,3);
		RETURN 0
	END

    BEGIN TRY
			INSERT INTO Usuario (rfc,apellido,nombre,codigoPostal,colonia,calle,numExterior,numInterior,celular,fechaNac,pais,estado,municipio,email,password,sexo,pendiente,rechazado,tipo)
			VALUES(@rfc,@apellido,@nombre,0,'','',0,0,@celular,@fechaNac,'','',
			'',@email, @password,@sexo,0,0,@tipo)
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
	@email = 'manyalex@hotmail.com',
	@password = 'many',
	@tipo = 999 ,
	@sexo = 'H'

--DISEÑADORA
EXEC RegistroAdmDis
    @rfc = 'MESF940226HSL',
	@apellido = 'Mejia Salcido',
	@nombre = 'María Fernanda',
	@celular = '6671935732',
	@fechaNac = '1994-02-26',
	@email = 'ma_fer_945@hotmail.com',
	@password = 'fer',
	@tipo = 444,
	@sexo = 'M'

Select * from Usuario where Tipo<>111
-----------------------------------------------------------------
--drop procedure AceptaUsuario
CREATE PROCEDURE AceptaUsuario
	@email varchar(320)
AS
BEGIN
	IF NOT EXISTS (SELECT email FROM Usuario WHERE email=@email)
	BEGIN
			RAISERROR('Usuario no existente',10,1)
			RETURN 0	
	END
	BEGIN TRAN 
		IF EXISTS ( SELECT email FROM Usuario  WITH (UPDLOCK,INDEX(PK_Usuario)) WHERE email = @email)  
		BEGIN
			UPDATE Usuario																
			SET pendiente = 0,
				rechazado = 0																		
			WHERE email = @email
			PRINT('Cliente aceptado con exito')	
		END
	COMMIT TRAN
	RETURN 1
END

EXEC AceptaUsuario
	@email='chuy04@hotmail.com'

SELECT * FROM Usuario WHERE email='chuy04@hotmail.com'
-----------------------------------------------------------------
--drop procedure RechazaUsuario
CREATE PROCEDURE RechazaUsuario
	@email varchar(320)
AS
BEGIN
	IF NOT EXISTS (SELECT email FROM Usuario WHERE email=@email)
	BEGIN
			RAISERROR('Usuario no existente',10,1)
			RETURN 1		
	END
	BEGIN TRAN 
		IF EXISTS ( SELECT email FROM Usuario WITH (UPDLOCK,INDEX(PK_Usuario)) WHERE email = @email)  
		BEGIN
			UPDATE Usuario																
			SET pendiente = 0 ,
				rechazado = 1																		
			WHERE email = @email
			PRINT('Usuario rechazado con exito')
		END
	COMMIT TRAN
	return 0
END

EXEC RechazaUsuario
	@email='miguelernesto_23@hotmail.com'

SELECT * FROM Usuario WHERE email='miguelernesto_23@hotmail.com'

--------------------LOGIN------------------------------------------
--drop procedure Autenticacion
CREATE PROCEDURE Autenticacion
    @email VARCHAR(320),
    @password VARCHAR(100)
AS
BEGIN
    DECLARE @email1 VARCHAR(320)
	DECLARE @tipo INT
	--Validar usuario y password correcto
    IF EXISTS (SELECT TOP 1 email FROM Usuario WHERE email=@email)
	BEGIN
		SET @email1=(SELECT email FROM Usuario WHERE email=@email AND password=@password)
		IF(@email1 IS NULL)
	    BEGIN
           RAISERROR('password Incorrecta',10,1)
		   RETURN 0
	    END
        ELSE 
			--Validar si el usuario ya existe y esta pendiente de revisión
			IF EXISTS (SELECT email FROM Usuario WHERE email=@email AND pendiente=1)
			BEGIN
				RAISERROR('Usuario pendiente de revisión',10,2)
				RETURN 0		
			END

			--Validar si el usuario ya fue rechazado
			IF EXISTS (SELECT email FROM Usuario WHERE email=@email AND rechazado=1)
			BEGIN
				RAISERROR('Usuario rechazado',10,3)
				RETURN 0
			END
            PRINT('Autenticación correcta')
			SET @tipo = (SELECT tipo FROM Usuario WHERE email=@email)
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
		@email = 'chuy04@hotmail.com',
		@password = 'admin123'

--Login incorrecto
EXEC Autenticacion
		@email = 'Admin',
		@password = '123'

--password incorrecta
EXEC Autenticacion
		@email = 'miguelernesto_23@hotmail.com',
		@password = '123'

--USUARIO PENDIENTE

EXEC Autenticacion
		@email = 'josemanuellopez_19@hotmail.com',
		@password = 'admin123'

--USUARIO RECHAZADO

EXEC Autenticacion
		@email = 'miguelernesto_23@hotmail.com',
		@password = 'admin123'

----------------------------------------------------------------
--CONSULTA CLIENTES
--drop procedure ChecarClientes
CREATE PROCEDURE ChecarClientes
AS
BEGIN
	SELECT email,nombre,apellido,celular,fechaNac,sexo,colonia,calle,numExterior,numInterior,pais,estado,municipio,codigoPostal
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
	SELECT email,nombre,apellido,celular,fechaNac,sexo,colonia,calle,numExterior,numInterior,pais,estado,municipio,codigoPostal
	FROM Usuario 
	WHERE pendiente = 1 AND tipo=111
END

EXEC UsuariosPendientes
----------------------------------------------------------------
--CONSULTA USUARIOS YA RECHAZADOS
--drop Procedure UsuariosRechazados
CREATE PROCEDURE UsuariosRechazados
AS
BEGIN
	SELECT email,nombre,apellido,celular,fechaNac,sexo,colonia,calle,numExterior,numInterior,pais,estado,municipio,codigoPostal
	FROM Usuario
	WHERE rechazado = 1 AND tipo=111
END

EXEC UsuariosRechazados

-----------------------InfoUsuario------------------------------
--drop procedure VerificarUsuario
CREATE PROCEDURE VerificarUsuario
    @email VARCHAR(320),
    @password VARCHAR(100)
AS
BEGIN
    DECLARE @email1 VARCHAR(320)
	DECLARE @tipo INT
	--Validar usuario y password correcto
    IF EXISTS (SELECT TOP 1 email FROM Usuario WHERE email=@email)
	BEGIN
		SET @email1=(SELECT email FROM Usuario WHERE email=@email AND password=@password)
		IF(@email1 IS NULL)
	    BEGIN
           RAISERROR('password Incorrecta',10,1)
		   Select 0
	    END
        ELSE 
			SELECT id,rfc,apellido as lastname,nombre as name, codigoPostal as cp, colonia as colony, 
				calle as street, numExterior, numInterior, celular as cellphone, fechaNac as birthdate,
				pais as country, estado as state, municipio as municipalliti, email as email, sexo, Tipo FROM Usuario WHERE email=@email
    END
    ELSE
       RAISERROR('Autenticación Invalida',10,4)
	   RETURN 0
END

EXEC VerificarUsuario
		@email = 'chuy04@hotmail.com',
		@password = 'admin123'