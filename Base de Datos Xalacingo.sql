create database Xalacingo;
use xalacingo;
create table rol
(
	id int auto_increment,
    nombre varchar (30),
    constraint pk_idRol primary key (id)
);

create table empleado
(
	id int auto_increment,
    nombre varchar (50),
    usuario varchar(20),
    contraseña varchar (50),
    idRol int,
    constraint pk_idEmpleado primary key (id),
    constraint fk_rolId foreign key (idRol) references rol (id)
);

INSERT INTO Xalacingo.rol (nombre) VALUES ('Administrador');
INSERT INTO Xalacingo.rol (nombre) VALUES ('Encargado de almacen');
INSERT INTO Xalacingo.empleado (nombre,usuario,contraseña,idRol)
			VALUES ('Juan Antonio Del Rosario López','Juan','juan1234',2);
            
create table almacen
(
	id int auto_increment,
    item varchar(20),
	avio varchar (50),
    descripcion varchar (200),
    tamaño varchar (10),
	cantidad int,
    color varchar(20),
    imagen longblob,
	constraint pk_idAlmacen primary key (id)
);

create table pedido
(
	id int auto_increment,
    estilo varchar(50),
    marca varchar(10),
    descripcion varchar(50),
    codigo varchar(20),
    diseñador varchar(30),
    cantidades_Prenda int,
    fecha date,
    constraint pk_idPedido primary key (id)
);
create table avios_pedidos
(
	id int auto_increment,
	avio varchar(50),
    descripcion varchar(100),
    color varchar(20),
    cantidad int,
    idPedido int,
    constraint pk_idAPedido primary key(id),
    constraint fkpedidoId foreign key (idPedido) references pedido (id)
);
select * from almacen;
drop table almacen;