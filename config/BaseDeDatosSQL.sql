CREATE DATABASE restaurante;

CREATE TABLE USUARIO (
    id_usuario int(4) AUTO_INCREMENT PRIMARY KEY,
    correo varchar(100) NOT NULL UNIQUE,
    contrasena varchar(30) NOT NULL,
    nombre varchar(20) NOT NULL,
    apellidos varchar(40) NOT NULL,
    fecha_nacimiento DATE,
    direccion varchar(100) NOT NULL,
    telefono int(9),
    rol varchar(15)
);

CREATE TABLE PEDIDO (
    id_pedido int(4) AUTO_INCREMENT PRIMARY KEY,
    id_usuario int(4) NOT NULL,
    CONSTRAINT claveforanea1 FOREIGN KEY (id_usuario) REFERENCES USUARIO (id_usuario), 
    fecha_pedido DATE NOT NULL,
    tipo_pago varchar(7) DEFAULT 'Tarjeta',
    precio_pedido decimal(7,2) NOT NULL,
    descuento_total decimal(5,2) NOT NULL,
    precio_total decimal(7,2) NOT NULL
);

CREATE TABLE CATEGORIA (
    id_categoria int(2) AUTO_INCREMENT PRIMARY KEY,
    tipo_producto varchar(15) NOT NULL 
);

CREATE TABLE PRODUCTO (
    id_producto int(4) AUTO_INCREMENT PRIMARY KEY,
    id_categoria int(2) NOT NULL,
    CONSTRAINT claveforanea2 FOREIGN KEY (id_categoria) REFERENCES CATEGORIA (id_categoria),
    nombre_producto varchar(200) NOT NULL, 
    precio_unidad decimal(7,2),
    imagen varchar(250),
    ofertaactiva varchar(2)
);

CREATE TABLE PEDIDO_PRODUCTO(
    id_pedido int(4) NOT NULL,
    id_producto int(4) NOT NULL,
    CONSTRAINT claveforanea3 FOREIGN KEY (id_pedido) REFERENCES PEDIDO (id_pedido),
    CONSTRAINT claveforanea4 FOREIGN KEY (id_producto) REFERENCES PRODUCTO (id_producto),
    linea int(3) NOT NULL,
    cantidad int(3) NOT NULL,
    precio_unidad decimal(7,2),
    oferta decimal(5,2),
    PRIMARY KEY(id_pedido,id_producto)
);

INSERT INTO USUARIO VALUES ('1','danrr2001@gmail.com','danielrayo','Daniel','Rayo Robles','2001-07-25','Calle Murillo numero 34','617048869','Admin');
INSERT INTO USUARIO VALUES ('2','danrr2002@gmail.com','danielrayo2','Dani','Rayo Robles','2001-07-24','Calle Murillo numero 23','436438869','Cliente');

INSERT INTO CATEGORIA VALUES ('1','Jamon');
INSERT INTO CATEGORIA VALUES ('2','Bocadillo');

INSERT INTO PRODUCTO VALUES ('1','2','Bocadillo de Jamon Serrano','4.50','imagenes/b0.webp');
INSERT INTO PRODUCTO VALUES ('2','2','Flautín de Jamón y queso','2.50','imagenes/b1.webp');
INSERT INTO PRODUCTO VALUES ('3','2','Bocadillo de Jamon ibérico','6.50','imagenes/b2.webp');
INSERT INTO PRODUCTO VALUES ('4','2','Jamon de bellota 100%','10','imagenes/b3.webp');
INSERT INTO PRODUCTO VALUES ('5','2','Bocadillo de jamón de cebo','8','imagenes/b4.webp');
INSERT INTO PRODUCTO VALUES ('6','2','Bocadillo de jamón de cebo','8','imagenes/b5.webp');
INSERT INTO PRODUCTO VALUES ('7','1','Jamón de bellota 100% ibérico Gabriel Castaño','299','imagenes/j0.webp');
INSERT INTO PRODUCTO VALUES ('8','1','Jamón de bellota 100% ibérico 5 Jotas','349','imagenes/j1.webp');
INSERT INTO PRODUCTO VALUES ('9','1','Taco de jamón de bellota 100% 1kg','149','imagenes/j2.webp');
INSERT INTO PRODUCTO VALUES ('10','1','Jamón de Bellota Ibérico 100% 5J','239','imagenes/j3.webp');
INSERT INTO PRODUCTO VALUES ('11','1','Jamón ibérico de Cebo 100% Jose Manuel','189','imagenes/j4.webp');
INSERT INTO PRODUCTO VALUES ('12','1','Jamón ibérico de Cebo 100% Enrique Tomas','129','imagenes/j5.webp');
INSERT INTO PRODUCTO VALUES ('13','1','Jamón Serrano de la Península','79','imagenes/j3.webp');
INSERT INTO PRODUCTO VALUES ('14','1','Jamón de Bellota Ibérico 50% 5J','89','imagenes/j4.webp');
INSERT INTO PRODUCTO VALUES ('15','1','Jamón de Bellota Ibérico 50% Jose Manuel','99','imagenes/j5.webp');
