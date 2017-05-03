drop database if exists moviemind;
create database if not exists moviemind
	character set utf8
    collate utf8_spanish_ci;
    
use moviemind;

drop table if exists pelicula;
create table if not exists pelicula(
	id int unsigned not null auto_increment,
    imdb char(9) not null unique,
    titulo varchar(100) not null,
    primary key (id)
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
	id_edicion int unsigned not null,
	id_formato int unsigned not null,
    precio decimal(5,2) not null,
	cantidad int unsigned not null default 0,
    vendidos int unsigned not null default 0,
    primary key (id_edicion , id_formato),
    foreign key (id_edicion) references edicion(id),
    foreign key (id_formato) references formato(id)
);