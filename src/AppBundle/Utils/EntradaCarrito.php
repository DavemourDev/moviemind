<?php

namespace AppBundle\Utils;

/**
 * Entrada de pedido del carrito.
 *
 * @author David
 */
class EntradaCarrito 
{
    private $codigoProducto='';
    private $unidades=0;
    private $precioUnitario=0.00;
    private $descuento=0.00;
    private $poster='';
    
    /**
     * Constructor de entrada de carrito.
     * @param type $codigoProducto
     * @param type $unidades
     * @param type $precioUnitario
     * @param type $poster
     */
    public function __construct($codigoProducto='', $unidades=0, $precioUnitario=0.00, $poster='')
    {
        $this->codigoProducto = $codigoProducto;
        $this->unidades = $unidades;
        $this->precioUnitario = $precioUnitario;
        $this->poster = $poster;
    }
    
    /**
     * Añade unidades a un ítem.
     * @param int $unidades Número de unidades a añadir. Para sustraer usar un entero negativo.
     */
    public function addUnidades($unidades=1)
    {
        if(!is_int($unidades))
        {
            throw new Exception ("'".__METHOD__."' requiere que el parámetro 'unidades' sea un número entero.");
        }
        
        $this->unidades+=$unidades;
    }
   
    /**
     * Devuelve el número de unidades de una entrada de producto.
     * @return int Número de unidades de la entrada.
     */
    public function getUnidades()
    {
        return $this->unidades;
    }
    
    /**
     * Devuelve el precio con descuento aplicado de la suma de las unidades del producto de la entrada.
     * @return float Precio total de la entrada.
     */
    public function getPrecioTotal()
    {
        return $this->getUnidades() * $this->getPrecioFinal();
    }
    
    /**
     * Devuelve el precio unitario del producto de la entrada.
     * @return float Precio base de una unidad del producto.
     */
    public function getPrecioUnitario()
    {
        return $this->precioUnitario;
    }
    
    /**
     * Devuelve el descuento aplicado a un precio.
     * @param float $precio Precio al que aplicar el descuento.
     * @return float Importe descontado al precio introducido.
     */
    public function getPrecioDescuento($precio)
    {
        return $this->descuento * $precio;
    }
    
    /**
     * Obtiene el precio del producto después de aplicarle el descuento.
     * @return float Precio con descuento aplicado.
     */
    public function getPrecioFinal()
    {
        return $this->getPrecioUnitario() - $this->getPrecioDescuento($this->getPrecioUnitario());
    }
    
    public function setDescuento($descuento)
    {
        $this->descuento=$descuento;
    }
    
    /**
     * Obtiene el código del producto de la entrada del carrito.
     * @return string Código del producto.
     */
    public function getCodigoProducto()
    {
        return $this->codigoProducto;
    }
    
    /**
     * Devuelve el póster de la entrada del carrito.
     * @return string URL del póster.
     */
    public function getPoster()
    {
        return $this->poster;
    }
    
    /**
     * Establece un póster (imagen en miniatura) para el elemento a comprar.
     * @param string $url La URL de la imagen a usar como poster.
     */
    public function setPoster($url)
    {
        $this->poster=$url;
    }
    
}
