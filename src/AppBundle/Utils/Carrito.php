<?php

require_once 'EntradaCarrito.class.php';
namespace AppBundle\Utils;


/**
 * Representa al carrito de la compra en moviemind.
 *
 * @author David
 */
class Carrito {
    
    /**
     * Lista de todas las entradas introducidas en el carrito.
     * @var array[EntradaCarrito] 
     */
    private $pedido=[];

    /**
     * Constructor del carrito.
     */    
    public function __construct()
    {
        if(!isset($_SESSION["carrito"]))
        {
            $_SESSION['carrito']=[];
        }
        $this->pedido=$_SESSION['carrito'];
        
    }
    
    /**
     * Elimina la primera entrada que coincida con el código de producto introducido.
     * @param string $codigoProducto
     */
    public function delete($codigoProducto)
    {
        $this->pedido=array_filter($this->pedido, function($element)
        {
            return !($element == $codigoProducto);
        });
    }
    
    /**
     * Añade una entrada al carrito a partir de sus atributos.
     * @param string $codigoProducto Código de producto a añadir.
     * @param int $unidades Número de unidades a añadir del producto.
     * @param double $precio Precio unitario del producto.
     * @return void
     * @throws Exception El producto ya existe en el carrito.
     */
    public function nuevoProducto($codigoProducto='', $unidades=1, $precio=0.00, $poster='')
    {
        $p=new EntradaCarrito($codigoProducto, $unidades, $precio, $poster);
        
        foreach($this->pedido as $item)
        {
            if ($item->getCodigoProducto() == $p->getCodigoProducto())
            {
                throw new Exception('El producto ya existe en el carrito');
                return;
            }
        }
        $this->add($p);
    }
    
    /**
     * Añade una entrada al carrito a partir de una instancia de la misma clase.
     * @param EntradaCarrito $entrada Instancia de EntradaCarrito a añadir.
     * @return void
     */
    private function add(EntradaCarrito $entrada)
    {
        foreach($this->pedido as $item)
        {
            if($item->getCodigoProducto() == $entrada->getCodigoProducto())
            {
                $item->addUnidades($entrada->getUnidades());
                return;
            }
        }
        $this->pedido[]=$entrada;
        
    }
    
    /**
     * Elimina todas las entradas del carrito.
     */
    public function destroy()
    {
        $this->pedido=[];
    }
    
    /**
     * Devuelve todas las entradas del carrito.
     * @return array[EntradaCarrito]
     */
    public function get_content()
    {
        return $this->pedido;
    }
    
    /**
     * Devuelve la suma del precio total de todos los ítems del carrito.
     * @return float
     */
    public function getPrecioTotal()
    {
        $precio=0;
        
        foreach($this->pedido as $item)
        {
            $precio+=$item->getPrecioTotal();
        }
        
        return $precio;
    }
    
    /**
     * Devuelve la suma de todas las unidades de producto del carrito.
     * @return int
     */
    public function getSumaItems()
    {
        $items=0;
        
        foreach($this->pedido as $item)
        {
            $items+=$item->getUnidades();
        }
        
        return $items;
    }
    
}
