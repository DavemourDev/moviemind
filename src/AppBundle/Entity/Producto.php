<?php

namespace AppBundle\Entity;

/**
 * Producto
 */
class Producto
{
    /**
     * @var string
     */
    private $precio;

    /**
     * @var integer
     */
    private $cantidad = '0';

    /**
     * @var integer
     */
    private $vendidos = '0';

    /**
     * @var string
     */
    private $codigoProducto;

    /**
     * @var \AppBundle\Entity\Edicion
     */
    private $idEdicion;

    /**
     * @var \AppBundle\Entity\Formato
     */
    private $idFormato;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idPedido;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idPedido = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set precio
     *
     * @param string $precio
     *
     * @return Producto
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return string
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return Producto
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set vendidos
     *
     * @param integer $vendidos
     *
     * @return Producto
     */
    public function setVendidos($vendidos)
    {
        $this->vendidos = $vendidos;

        return $this;
    }

    /**
     * Get vendidos
     *
     * @return integer
     */
    public function getVendidos()
    {
        return $this->vendidos;
    }

    /**
     * Get codigoProducto
     *
     * @return string
     */
    public function getCodigoProducto()
    {
        return $this->codigoProducto;
    }

    /**
     * Set idEdicion
     *
     * @param \AppBundle\Entity\Edicion $idEdicion
     *
     * @return Producto
     */
    public function setIdEdicion(\AppBundle\Entity\Edicion $idEdicion = null)
    {
        $this->idEdicion = $idEdicion;

        return $this;
    }

    /**
     * Get idEdicion
     *
     * @return \AppBundle\Entity\Edicion
     */
    public function getIdEdicion()
    {
        return $this->idEdicion;
    }

    /**
     * Set idFormato
     *
     * @param \AppBundle\Entity\Formato $idFormato
     *
     * @return Producto
     */
    public function setIdFormato(\AppBundle\Entity\Formato $idFormato = null)
    {
        $this->idFormato = $idFormato;

        return $this;
    }

    /**
     * Get idFormato
     *
     * @return \AppBundle\Entity\Formato
     */
    public function getIdFormato()
    {
        return $this->idFormato;
    }

    /**
     * Add idPedido
     *
     * @param \AppBundle\Entity\Pedido $idPedido
     *
     * @return Producto
     */
    public function addIdPedido(\AppBundle\Entity\Pedido $idPedido)
    {
        $this->idPedido[] = $idPedido;

        return $this;
    }

    /**
     * Remove idPedido
     *
     * @param \AppBundle\Entity\Pedido $idPedido
     */
    public function removeIdPedido(\AppBundle\Entity\Pedido $idPedido)
    {
        $this->idPedido->removeElement($idPedido);
    }

    /**
     * Get idPedido
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdPedido()
    {
        return $this->idPedido;
    }
}

