<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Edicion
 *
 * @ORM\Table(name="edicion", indexes={@ORM\Index(name="id_pelicula", columns={"id_pelicula"})})
 * @ORM\Entity
 */
class Edicion
{
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre = 'original';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="year", type="datetime", nullable=false)
     */
    private $year;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Pelicula
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Pelicula")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pelicula", referencedColumnName="id")
     * })
     */
    private $idPelicula;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Formato", inversedBy="idEdicion")
     * @ORM\JoinTable(name="producto",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_edicion", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_formato", referencedColumnName="id")
     *   }
     * )
     */
    private $idFormato;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idFormato = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Edicion
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
     * Set year
     *
     * @param \DateTime $year
     *
     * @return Edicion
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return \DateTime
     */
    public function getYear()
    {
        return $this->year;
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
     * Set idPelicula
     *
     * @param \AppBundle\Entity\Pelicula $idPelicula
     *
     * @return Edicion
     */
    public function setIdPelicula(\AppBundle\Entity\Pelicula $idPelicula = null)
    {
        $this->idPelicula = $idPelicula;

        return $this;
    }

    /**
     * Get idPelicula
     *
     * @return \AppBundle\Entity\Pelicula
     */
    public function getIdPelicula()
    {
        return $this->idPelicula;
    }

    /**
     * Add idFormato
     *
     * @param \AppBundle\Entity\Formato $idFormato
     *
     * @return Edicion
     */
    public function addIdFormato(\AppBundle\Entity\Formato $idFormato)
    {
        $this->idFormato[] = $idFormato;

        return $this;
    }

    /**
     * Remove idFormato
     *
     * @param \AppBundle\Entity\Formato $idFormato
     */
    public function removeIdFormato(\AppBundle\Entity\Formato $idFormato)
    {
        $this->idFormato->removeElement($idFormato);
    }

    /**
     * Get idFormato
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdFormato()
    {
        return $this->idFormato;
    }
}
