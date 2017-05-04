use moviemind;

insert into genero (nombre_es, nombre_en) values
('Acción','Action'), 	-- 1
('Aventura','Adventure'),
('Animación','Animation'),
('Biografía','Biography'),
('Comedia','Comedy'),
('Crimen','Crime'),
('Documental','Documentary'),
('Drama','Drama'),				
('Familiar','Family'),			
('Fantasía','Fantasy'),			
('Cine negro','Film-Noir'),		
('Historia','History'),			
('Terror','Horror'),			
('Música','Music'),				
('Musical','Musical'),			
('Suspense','Mystery'),			
('Romántica','Romance'),		
('Ciencia ficción','Sci-Fi'),	
('Deporte','Sport'),			
('Thriller','Thriller'),		
('Bélica','War'),				
('Oeste','Western')				
;

insert into pelicula(imdb, titulo) values
('tt0088763', 'Regreso al futuro'),
('tt0107290', 'Parque Jurásico'),
('tt0089218', 'Los Goonies'),
('tt0091369', 'Dentro del laberinto'),
('tt0203009', 'Moulin Rouge'),
('tt0289879', 'El efecto mariposa')
;

insert into genero_pelicula(id_pelicula, id_genero) values
(1,2),
(1,5),
(1,18),
(2,2),
(2,18),
(2,20),
(3,2),
(3,5),
(3,9),
(4,2),
(4,9),
(4,10),
(5,8),
(5,15),
(5,17),
(6,18),
(6,20)
;
    
insert into edicion (year, id_pelicula) values
('1999', 1),
('1999', 2),
('1999', 3),
('1999', 4),
('1999', 5),
('1999', 6);

insert into formato(nombre) values
('DVD'),
('Blu-Ray'),
('VHS'),
('Copia digital');

insert into producto(codigo_producto, id_edicion, id_formato, precio) values
('p00001f01',1,1,'18.70'),
('p00001f03',1,3,'9.80'),
('p00002f01',2,1,'20.10'),
('p00002f02',2,2,'25.70'),
('p00002f03',2,3,'6.70'),
('p00002f04',2,4,'4.99'),
('p00003f01',3,1,'9.80'),
('p00003f02',3,2,'12.55'),
('p00003f03',3,3,'4.70'),
('p00004f01',4,1,'3.70'),
('p00004f04',4,4,'8.50'),
('p00005f02',5,2,'21.70'),
('p00006f04',6,4,'9.30')
;

insert into cliente(nombre, email) values
('david','dmu999@gmail.com'),
('mike','mike777@gmail.com'),
('ligie','li333@gmail.com'),
('carlos','carlos444@gmail.com')
;


/*CREAR PEDIDO*/
insert into pedido(id_cliente) values
(1)
;

insert into entrada_pedido(codigo_producto, id_pedido, cantidad, precio_unitario) values
('p00002f02', 1, 2, (select precio from producto where codigo_producto='p00002f02')),
('p00004f04', 1, 2, (select precio from producto where codigo_producto='p00004f04')),
('p00006f04', 1, 2, (select precio from producto where codigo_producto='p00006f04'))
;