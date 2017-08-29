drop database if exists shop;
create database shop;
	use shop;
-- Tablas fuertes
create table tipoCliente (
	idTipoCLiente int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nombre varchar(80),
	enable boolean
);

INSERT INTO tipoCliente(nombre, enable)
VALUES ('Administrador', 1),
('Cliente', 1);

create table categoria (
	idCategoria int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nombre varchar(80),
	enable boolean
);
create table marca (
	idMarca int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nombre varchar(80),
	enable boolean
);
create table cliente (
	idCliente int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nombre varchar(80),
	apellidos varchar(80),
	docIdentidad varchar(80),
	direccion varchar(100),
	telefono varchar(20),
	idTipoCliente int NOT NULL,
	FOREIGN KEY (idTipoCliente) REFERENCES tipoCliente(idTipoCliente),

	-- credenciales
	correo  varchar(100),
	password varchar(80),
	enable boolean
);

INSERT INTO cliente (nombre, apellidos, docIdentidad, direccion, telefono, idTipoCliente, correo, password, enable)
VALUES ('Administrador', 'Master', '12345678', 'Direccion', '987456321', 1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
('Jorge', 'Gonzales', '12345678', 'Direccion', '987456321', 2, 'jorge@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1);

create table subcategoria (
	idSubCategoria int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	idCategoria int NOT NULL,
	FOREIGN KEY (idCategoria) REFERENCES categoria(idCategoria),
	nombre varchar(80),
	enable boolean
);
create table producto (
	idProducto int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nombrePortada varchar(200),
	descripcionCorta text,
	descripcionLarga text,
	contenidoCaja text,
	color varchar(80),
	precio decimal(9,2),
	idSubCategoria int NOT NULL,
	FOREIGN KEY (idSubCategoria) REFERENCES subcategoria(idSubCategoria),
	idMarca int NOT NULL,
	FOREIGN KEY (idMarca) REFERENCES marca(idMarca),
	enable boolean
);
create table productoImage (
	idProductoImage int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	idProducto int NOT NULL,
	FOREIGN KEY (idProducto) REFERENCES producto(idProducto),
	imagen varchar(50),
	enable boolean
);
create table tarjeta (
	idTarjeta int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	idCliente int NOT NULL,
	FOREIGN KEY (idCliente) REFERENCES cliente(idCliente),
	numeroTarjeta varchar(50),
	codSeguridad varchar(10),
	vencimiento varchar(20),
	enable boolean
);
create table carrito (
	idCarrito int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	idCliente int NOT NULL,
	FOREIGN KEY (idCliente) REFERENCES cliente(idCliente),
	fechaCreacion date,
	sold boolean
);
create table detaCarrito (
	idCarrito int NOT NULL,
	FOREIGN KEY (idCarrito) REFERENCES carrito(idCarrito),
	idProducto int NOT NULL,
	FOREIGN KEY (idProducto) REFERENCES producto(idProducto),
	cantidad int,
	precio decimal(9,2),
	enable boolean
);
create table compra (
	idCompra int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	idCarrito int NOT NULL,
	FOREIGN KEY (idCarrito) REFERENCES carrito(idCarrito),
	fechaCreacion date,
	enable boolean
);
create table detaCompra (
	idCompra int NOT NULL,
	FOREIGN KEY (idCompra) REFERENCES compra(idCompra),
	idProducto int NOT NULL,
	FOREIGN KEY (idProducto) REFERENCES producto(idProducto),
	cantidad int,
	precio decimal(9,2),
	enable boolean
);
-- ADECUACION DE LAS TABLAS
ALTER TABLE tipoCliente ENGINE=INNODB;
ALTER TABLE cliente ENGINE=INNODB;
ALTER TABLE tarjeta ENGINE=INNODB;
ALTER TABLE categoria ENGINE=INNODB;
ALTER TABLE subcategoria ENGINE=INNODB;
ALTER TABLE marca ENGINE=INNODB;
ALTER TABLE producto ENGINE=INNODB;
ALTER TABLE productoImage ENGINE=INNODB;
ALTER TABLE carrito ENGINE=INNODB;
ALTER TABLE detaCarrito ENGINE=INNODB;
ALTER TABLE compra ENGINE=INNODB;
ALTER TABLE detaCompra ENGINE=INNODB;
