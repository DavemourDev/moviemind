<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formato
 *
 * @ORM\Table(name="formato")
 * @ORM\Entity
 */
class Formato
{
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="icono", type="blob", nullable=true)
     */
    private $icono;

    /**
     * @var boolean
     *
     * @ORM\Column(name="usa_stock", type="boolean", nullable=false)
     */
    private $usaStock = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Edicion", mappedBy="idFormato")
     */
    private $idEdicion;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idEdicion = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Formato
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set icono
     *
     * @param string $icono
     *
     * @return Formato
     */
    public function setIcono($icono)
    {
        $this->icono = $icono;

        return $this;
    }

    /**
     * Get icono
     *
     * @return string
     */
    public function getIcono()
    {
        return $this->icono;
    }

    /**
     * Set usaStock
     *
     * @param boolean $usaStock
     *
     * @return Formato
     */
    public function setUsaStock($usaStock)
    {
        $this->usaStock = $usaStock;

        return $this;
    }

    /**
     * Get usaStock
     *
     * @return boolean
     */
    public function getUsaStock()
    {
        return $this->usaStock;
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
     * Add idEdicion
     *
     * @param \AppBundle\Entity\Edicion $idEdicion
     *
     * @return Formato
     */
    public function addIdEdicion(\AppBundle\Entity\Edicion $idEdicion)
    {
        $this->idEdicion[] = $idEdicion;

        return $this;
    }

    /**
     * Remove idEdicion
     *
     * @param \AppBundle\Entity\Edicion $idEdicion
     */
    public function removeIdEdicion(\AppBundle\Entity\Edicion $idEdicion)
    {
        $this->idEdicion->removeElement($idEdicion);
    }

    /**
     * Get idEdicion
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdEdicion()
    {
        return $this->idEdicion;
    }
}
