drop database if exists moviemind;
create database if not exists moviemind
	character set utf8
    collate utf8_spanish_ci;
    
use moviemind;


drop table if exists genero;
create table if not exists genero(
	id int unsigned not null auto_increment,
    nombre_es varchar(100) not null,
    nombre_en varchar(100) not null,
    descripcion text default '',
    
    primary key(id)
);

drop table if exists pelicula;
create table if not exists pelicula(
	id int unsigned not null auto_increment,
    imdb char(9) not null unique,
    titulo varchar(100) not null,
    
    primary key (id)
);

drop table if exists genero_pelicula;
create table if not exists genero_pelicula(
	id_pelicula int unsigned not null,
    id_genero int unsigned not null,
    
    primary key(id_pelicula, id_genero),
    foreign key (id_pelicula) references pelicula(id),
    foreign key (id_genero) references genero(id) 
);

drop table if exists edicion;
create table if not exists edicion(
	id int unsigned not null auto_increment,
	nombre varchar(100) not null default 'original',
    `year` datetime not null,
    id_pelicula int unsigned not null,
    
    primary key (id),
    foreign key (id_pelicula) references pelicula(id)
);

drop table if exists formato;
create table if not exists formato(
	id int unsigned not null auto_increment,
	nombre varchar(100) not null,
    icono LONGBLOB,
    usa_stock bool not null default true,
    
    primary key (id)
);

drop table if exists producto;
create table if not exists producto(
	codigo_producto char(9) not null, -- Se construye a partir de sus dos claves foraneas
    id_edicion int unsigned not null,
	id_formato int unsigned not null,
    precio decimal(5,2) not null,
	cantidad int unsigned not null default 0,
    vendidos int unsigned not null default 0,
    
    primary key (codigo_producto),
    foreign key (id_edicion) references edicion(id),
    foreign key (id_formato) references formato(id)
);

-- cliente
drop table if exists cliente;
create table if not exists cliente(
	id int unsigned not null auto_increment,
    nombre varchar(100) not null unique,
    email varchar(255) not null,
    fecha_registro datetime not null default current_timestamp(),
    
    primary key(id)
);

drop table if exists pedido;
create table if not exists pedido(
	id int unsigned not null auto_increment,
    id_cliente int unsigned not null,
    fecha datetime not null default current_timestamp(),
    procesado bool not null default false,
    
    primary key (id),
    foreign key (id_cliente) references cliente(id)
);

drop table if exists entrada_pedido;
create table if not exists entrada_pedido(
	codigo_producto char(9) not null,
    id_pedido int unsigned not null,
    cantidad int unsigned not null default 1,
    precio_unitario decimal(5,2) not null, -- Se obtendrá el valor del producto en el momento de hacer el pedido y no podrá ser modificado.
    descuento decimal (3,2) not null default 0.0,
    
    primary key(codigo_producto, id_pedido),
    foreign key(codigo_producto) references producto(codigo_producto),
    foreign key(id_pedido) references pedido(id)
    
);