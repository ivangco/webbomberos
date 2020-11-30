
CREATE TABLE tipopersonas ( 
    id_tipopersona INT NOT NULL AUTO_INCREMENT , 
    descripcion_tipopersona VARCHAR(20) NOT NULL , 
    PRIMARY KEY (id_tipopersona));
    
INSERT INTO tipopersonas
    (descripcion_tipopersona)
VALUES
    ('SOCIO'),
    ('BOMBERO');
/*---------------------------------------------------------*/
CREATE TABLE personas ( 
    id_persona INT NOT NULL AUTO_INCREMENT , 
    id_tipopersona INT NOT NULL , 
    nombre_persona VARCHAR(20) NOT NULL , 
    apellido_persona VARCHAR(20) NOT NULL , 
    documento_persona VARCHAR(14) NOT NULL , 
    direccion_persona VARCHAR(50) NOT NULL , 
    telefono_persona VARCHAR(20) NOT NULL , 
    FOREIGN KEY (id_tipopersona) REFERENCES tipopersonas(id_tipopersona),
    PRIMARY KEY (id_persona));

INSERT INTO personas ( nombre_persona,id_tipopersona , apellido_persona, documento_persona, direccion_persona, telefono_persona) 
VALUES ( 'ADMIN', '2', 'ADMIN', 'ADMIN', 'ADMIN', 'ADMIN');
/*---------------------------------------------------------*/

CREATE TABLE tipousuarios ( 
    id_tipousuario INT NOT NULL AUTO_INCREMENT , 
    descripcion_tipousuario VARCHAR(20) NOT NULL , 
    PRIMARY KEY (id_tipousuario));
    
INSERT INTO tipousuarios
    (descripcion_tipousuario)
VALUES
    ('ADMINISTRADOR'),
    ('SOCIO'),
    ('BOMBERO');
/*---------------------------------------------------------*/

CREATE TABLE usuarios(
    id_usuario INT NOT NULL AUTO_INCREMENT , 
    id_persona INT NOT NULL , 
    id_tipousuario INT NOT NULL , 
    nombre_usuario VARCHAR (30) NOT NULL , 
    estado_usuario VARCHAR (30) NOT NULL , 
    email_usuario VARCHAR (40) NOT NULL , 
    password_usuario VARCHAR (30) NOT NULL , 
    PRIMARY KEY (id_usuario),
    FOREIGN KEY (id_tipousuario) REFERENCES tipousuarios(id_tipousuario),
    FOREIGN KEY (id_persona) REFERENCES personas(id_persona));

INSERT INTO usuarios ( id_persona, id_tipousuario, nombre_usuario, estado_usuario, email_usuario, password_usuario) 
VALUES ( '1', '1', 'admin', 'ACTIVO', 'ADMIN@ADMIN.COM', 'ADMIN');
/*---------------------------------------------------------*/

CREATE TABLE avisos ( 
    id_aviso INT NOT NULL AUTO_INCREMENT , 
    asunto_aviso VARCHAR(100) NOT NULL , 
    mensaje_aviso VARCHAR(1000) NOT NULL , 
    direccion_aviso VARCHAR(200) NOT NULL ,
    fechaemicion_aviso date NOT NULL ,
    fechaevento_aviso date NOT NULL ,
    PRIMARY KEY (id_aviso));
/*---------------------------------------------------------*/

CREATE TABLE aportes ( 
    id_aporte INT NOT NULL AUTO_INCREMENT , 
    id_persona int NOT NULL , 
    fechaCreacion_aporte date NOT NULL , 
    total_aporte int(11) NOT NULL ,
    estado_aporte VARCHAR(14) NOT NULL ,
    PRIMARY KEY (id_aporte),
    FOREIGN KEY (id_persona) REFERENCES personas(id_persona));
/*---------------------------------------------------------*/

CREATE TABLE aportedetalle ( 
    id_aportedetalle INT NOT NULL AUTO_INCREMENT , 
    id_aporte INT NOT NULL  , 
    importe_aporte int NOT NULL , 
    fecha_aporte date NOT NULL ,
    PRIMARY KEY (id_aportedetalle),
    FOREIGN KEY (id_aporte) REFERENCES aportes(id_aporte));
/*---------------------------------------------------------*/

CREATE TABLE tipoemergencias ( 
    id_tipoemergencia INT NOT NULL AUTO_INCREMENT , 
    descripcion_tipoemergencia VARCHAR(20) NOT NULL , 
    PRIMARY KEY (id_tipoemergencia));

INSERT INTO tipoemergencias
    (descripcion_tipoemergencia)
VALUES
('INCENDIO'),
('ACCIDENTE'),
('RESCATE'),
('AUXILIO'),
('OTRO');
/*---------------------------------------------------------*/


CREATE TABLE intensidades ( 
    id_intensidad INT NOT NULL AUTO_INCREMENT , 
    descripcion_intensidad VARCHAR(20) NOT NULL , 
    PRIMARY KEY (id_intensidad));

INSERT INTO intensidades
    (descripcion_intensidad)
VALUES
    ('NIVEL 1'),
    ('NIVEL 2'),
    ('NIVEL 3'),
    ('NIVEL 4'),
    ('NIVEL 5');

/*---------------------------------------------------------*/

CREATE TABLE emergencias ( 
    id_emergencia INT NOT NULL AUTO_INCREMENT , 
    id_tipoemergencia INT NOT NULL, 
    id_usuario INT NOT NULL,
    id_intensidad INT NOT NULL,
    descripcion_emergencia VARCHAR(20) NOT NULL , 
    direccion_emergencia VARCHAR(20) NOT NULL , 
    PRIMARY KEY (id_emergencia) ,
    FOREIGN KEY (id_tipoemergencia) REFERENCES tipoemergencias(id_tipoemergencia),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (id_intensidad) REFERENCES intensidades(id_intensidad)
);

/*---------------------------------------------------------

--personas
--bomberos							
--TIPO DE USUARIO					
--USUARIO				
--AVISOS				
--APORTE (PAGOS)				
--APORTE DETALLE	
--TIPO EMERGENCIA	
--INTENSIDAD							
--EMERGENCIA				
---------------------------------------------------------*/
