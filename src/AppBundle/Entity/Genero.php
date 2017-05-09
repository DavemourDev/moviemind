<?php

namespace AppBundle\Entity;

/**
 * Genero
 */
class Genero
{
    /**
     * @var string
     */
    private $nombreEs;

    /**
     * @var string
     */
    private $nombreEn;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idPelicula;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idPelicula = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set nombreEs
     *
     * @param string $nombreEs
     *
     * @return Genero
     */
    public function setNombreEs($nombreEs)
    {
        $this->nombreEs = $nombreEs;

        return $this;
    }

    /**
     * Get nombreEs
     *
     * @return string
     */
    public function getNombreEs()
    {
        return $this->nombreEs;
    }

    /**
     * Set nombreEn
     *
     * @param string $nombreEn
     *
     * @return Genero
     */
    public function setNombreEn($nombreEn)
    {
        $this->nombreEn = $nombreEn;

        return $this;
    }

    /**
     * Get nombreEn
     *
     * @return string
     */
    public function getNombreEn()
    {
        return $this->nombreEn;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Genero
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
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
     * Add idPelicula
     *
     * @param \AppBundle\Entity\Pelicula $idPelicula
     *
     * @return Genero
     */
    public function addIdPelicula(\AppBundle\Entity\Pelicula $idPelicula)
    {
        $this->idPelicula[] = $idPelicula;

        return $this;
    }

    /**
     * Remove idPelicula
     *
     * @param \AppBundle\Entity\Pelicula $idPelicula
     */
    public function removeIdPelicula(\AppBundle\Entity\Pelicula $idPelicula)
    {
        $this->idPelicula->removeElement($idPelicula);
    }

    /**
     * Get idPelicula
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdPelicula()
    {
        return $this->idPelicula;
    }
    
    
    public function __toString() 
    {
        return $this->nombreEn;
    }
    
    
}

