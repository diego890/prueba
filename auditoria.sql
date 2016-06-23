DROP DATABASE IF EXISTS auditoria;
CREATE DATABASE auditoria;
USE auditoria;

CREATE TABLE Auditor
(
	-- Datos de usuario:
	usuario varchar(45) PRIMARY KEY,
	password varchar(50),

	-- Datos personales:
	DNI char(8) NOT NULL,
	nombres varchar(45) NOT NULL,
	apellidos varchar(45) NOT NULL,
	direccion varchar(65),
	telefono varchar(20),
	email varchar(45),
	sexo char(1) NOT NULL,

	tipo char(1) NOT NULL DEFAULT 'U' -- A es para administrador
);

CREATE TABLE Rol 
(
	rol varchar(50) PRIMARY KEY,	
	perfil text
);

CREATE TABLE Empresa
(
	ID_Empresa int AUTO_INCREMENT PRIMARY KEY,
	razonSocial varchar(55) NOT NULL,
	giroNegocio varchar(45),
	ubicacion varchar(55),
	realidadProblematica text,	

	-- Direccionamiento:
	mision text,
	vision text,
	estrategias text,

	ruta_imagen varchar(100)
);

CREATE TABLE PlanAuditoria
(
	ID_Plan int AUTO_INCREMENT PRIMARY KEY,
	
	ID_Empresa int, -- Clave foránea
	FOREIGN KEY (ID_Empresa) REFERENCES Empresa(ID_Empresa),

	objetivoGeneral varchar(255),
	objetivosEspecificos text,

	alcance varchar(255),
	limitaciones text,
	entregables text
);

CREATE TABLE Alineamiento
(
	-- Borramos todo y volvemos a crear
	ID_Alineamiento int NOT NULL PRIMARY KEY,

	ID_Plan int,
	FOREIGN KEY (ID_Plan) REFERENCES PlanAuditoria(ID_Plan),

	estrategia varchar(100),
	alineamiento varchar(100)
);

CREATE TABLE Aclaracion
(
	-- Borramos todo y volvemos a crear
	ID_Aclaracion int NOT NULL PRIMARY KEY,

	ID_Plan int,
	FOREIGN KEY (ID_Plan) REFERENCES PlanAuditoria(ID_Plan),

	aclaraciones_si text,
	aclaraciones_no text
);

CREATE TABLE Proyecto
(	-- Plan de proyectos
	-- Borramos todo y volvemos a crear
	ID_Proyecto int NOT NULL PRIMARY KEY,

	ID_Plan int,
	FOREIGN KEY (ID_Plan) REFERENCES PlanAuditoria(ID_Plan),

	tarea text,
	fechaInicio date, 
	fechaFin date,
	usuario varchar(45),
	FOREIGN KEY (usuario) REFERENCES Auditor(usuario)	
);

CREATE TABLE Entrevistado
(
	ID_Entrevistado int NOT NULL PRIMARY KEY,

	ID_Plan int,
	FOREIGN KEY (ID_Plan) REFERENCES PlanAuditoria(ID_Plan),

	nombre varchar(45) NOT NULL,
	cargo varchar(55) NOT NULL
);

CREATE TABLE Criterio
(
	ID_Criterio int NOT NULL PRIMARY KEY,

	ID_Plan int,
	FOREIGN KEY (ID_Plan) REFERENCES PlanAuditoria(ID_Plan),	

	criterio varchar(200)
);

CREATE TABLE Prueba
(
	ID_Prueba int AUTO_INCREMENT NOT NULL PRIMARY KEY,

	ID_Plan int,
	FOREIGN KEY (ID_Plan) REFERENCES PlanAuditoria(ID_Plan),		

	nombre varchar(50),
	institucion varchar(50),
	
	ID_Entrevistado int,
	FOREIGN KEY (ID_Entrevistado) REFERENCES Entrevistado(ID_Entrevistado),		

	fInicio date,
	fFin date
);

CREATE TABLE Pregunta
(
	ID_Pregunta int AUTO_INCREMENT NOT NULL PRIMARY KEY,

	ID_Prueba int,
	FOREIGN KEY (ID_Prueba) REFERENCES Prueba(ID_Prueba),

	pregunta varchar(80),
	pasos text,

	-- en ejecución
	respuesta char(1),
	obs text -- observaciones
);

CREATE TABLE NormativaAuditoria
(
	ID_Plan int PRIMARY KEY,
	FOREIGN KEY (ID_Plan) REFERENCES PlanAuditoria(ID_Plan),

	internacional text,
	nacional text,
	institucional text
);

CREATE TABLE EquipoAuditoria
(
	ID_Plan int,
	usuario varchar(45),
	PRIMARY KEY (ID_Plan, usuario),

	FOREIGN KEY (ID_Plan) REFERENCES PlanAuditoria(ID_Plan),
	FOREIGN KEY (usuario) REFERENCES Auditor(usuario),

	-- Datos de la relación M a M:
	rol varchar(25) NOT NULL,
	FOREIGN KEY (rol) REFERENCES Rol(rol)
);

-- ALGUNOS DATOS PREVIAMENTE REGISTRADOS:
INSERT INTO Auditor VALUES
('auditor', 'auditor', '48353348', 'Erick', 'Alfaro Gomez', 'Manuel Ubalde 570 El Porvenir', '+51 500315', 'erick.systems@gmail.com', 'H', 'U'),
('administrador', 'admin', '56781234', 'Administrador', 'Merino', 'Via de Evitamiento #777', '+51 966 543 777', 'jdiego.17@gmail.com', 'H', 'A');

INSERT INTO Rol VALUES
('Rol 1', 'Texto descriptivo. Perfil para el rol 1.'),
('Rol 2', 'Texto descriptivo. Perfil para el rol 2.');
INSERT INTO Empresa VALUES
(NULL, 'The most advanced developers S.A.', 'Desarrollo de software', 'Av Los Nardos #155 - Cerca al colegio Antenor Orrego', 'OMG nadie se inscribe', 'Ser los mejores en el desarrollo de software EDUCATIVO.', 'Orientar a los futuros desarrolladores del país, desarrollar en ellos un gusto insaciable por el coding.', 'Emitir programas educativos que enseñen el desarrollo de juegos virtuales en tercera dimensión, y enseñar a manejar un dronecito.', '');

INSERT INTO PlanAuditoria VALUES
(NULL, 1, 'Realizar campañas publicitarias', 'Aumentar el número de alumnos interesados en los cursos dictados', 'Toda la ciudad de Trujillo', 'Las limitaciones se las impone uno mismo', 'Lista de entregables');

INSERT INTO Alineamiento VALUES
(1, 1, 'Publicidad', 'Mucha, mucha publicidad !');

INSERT INTO Aclaracion VALUES
(1, 1, 'Vamos a ...', 'No vamos a ...');

INSERT INTO NormativaAuditoria VALUES
(1, 'Normativa internacional', 'Normativa nacional', 'Normativa institucional');

INSERT INTO EquipoAuditoria VALUES
(1, 'auditor', 'Rol 1');

INSERT INTO Entrevistado VALUES
(1, 1, 'Pepito Gonzales', 'Cargo X');

INSERT INTO Proyecto VALUES
(1, 1, 'Implementar un programa educativo revolucionario', '2008-7-04', '2015-04-29', 'auditor');