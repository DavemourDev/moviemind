<?php

namespace AppBundle\Entity;

/**
 * Pedido
 */
class Pedido
{
    /**
     * @var \DateTime
     */
    private $fecha = 'CURRENT_TIMESTAMP';

    /**
     * @var boolean
     */
    private $procesado = '0';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Cliente
     */
    private $idCliente;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $codigoProducto;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->codigoProducto = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Pedido
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set procesado
     *
     * @param boolean $procesado
     *
     * @return Pedido
     */
    public function setProcesado($procesado)
    {
        $this->procesado = $procesado;

        return $this;
    }

    /**
     * Get procesado
     *
     * @return boolean
     */
    public function getProcesado()
    {
        return $this->procesado;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idCliente
     *
     * @param \AppBundle\Entity\Cliente $idCliente
     *
     * @return Pedido
     */
    public function setIdCliente(\AppBundle\Entity\Cliente $idCliente = null)
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    /**
     * Get idCliente
     *
     * @return \AppBundle\Entity\Cliente
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * Add codigoProducto
     *
     * @param \AppBundle\Entity\Producto $codigoProducto
     *
     * @return Pedido
     */
    public function addCodigoProducto(\AppBundle\Entity\Producto $codigoProducto)
    {
        $this->codigoProducto[] = $codigoProducto;

        return $this;
    }

    /**
     * Remove codigoProducto
     *
     * @param \AppBundle\Entity\Producto $codigoProducto
     */
    public function removeCodigoProducto(\AppBundle\Entity\Producto $codigoProducto)
    {
        $this->codigoProducto->removeElement($codigoProducto);
    }

    /**
     * Get codigoProducto
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCodigoProducto()
    {
        return $this->codigoProducto;
    }
}

