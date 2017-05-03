use moviemind;

insert into pelicula(imdb, titulo) values
('tt0088763', 'Regreso al futuro'),
('tt0107290', 'Parque Jurásico'),
('tt0089218', 'Los Goonies'),
('tt0091369', 'Dentro del laberinto'),
('tt0203009', 'Moulin Rouge'),
('tt0289879', 'El efecto mariposa')
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

insert into producto(id_edicion, id_formato, precio) values
(1,1,'18.70'),
(1,3,'9.80'),
(2,1,'20.10'),
(2,2,'25.70'),
(2,3,'6.70'),
(2,4,'4.99'),
(3,1,'9.80'),
(3,2,'12.55'),
(3,3,'4.70'),
(4,1,'3.70'),
(4,4,'8.50'),
(5,2,'21.70'),
(6,4,'9.30')
;

