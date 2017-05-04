use moviemind;

-- Obtener lista de todas las películas con sus géneros.

select pelicula.titulo 'Película', group_concat(genero.nombre_es separator ', ') 'Género'
from pelicula
	join genero_pelicula on pelicula.id=genero_pelicula.id_pelicula
    join genero on genero.id=genero_pelicula.id_genero
group by pelicula.titulo
;
    
-- Obtener datos de un pedido
    
select producto.codigo_producto 'Código producto', pelicula.titulo 'Película', edicion.nombre 'Edición', formato.nombre 'Formato', entrada_pedido.precio_unitario 'Precio', entrada_pedido.cantidad 'Unidades'
from producto
	join entrada_pedido on producto.codigo_producto=entrada_pedido.codigo_producto
    join pedido on pedido.id=entrada_pedido.id_pedido
    join cliente on cliente.id=pedido.id_cliente
    join formato on formato.id=producto.id_formato
    join edicion on edicion.id=producto.id_edicion
    join pelicula on pelicula.id=edicion.id_pelicula
where pedido.id=1;