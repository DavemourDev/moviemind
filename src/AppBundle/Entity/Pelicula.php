<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pelicula
 *
 * @ORM\Table(name="pelicula", uniqueConstraints={@ORM\UniqueConstraint(name="imdb", columns={"imdb"})})
 * @ORM\Entity
 */
class Pelicula
{
    /**
     * @var string
     *
     * @ORM\Column(name="imdb", type="string", length=9, nullable=false)
     */
    private $imdb;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=100, nullable=false)
     */
    private $titulo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set imdb
     *
     * @param string $imdb
     *
     * @return Pelicula
     */
    public function setImdb($imdb)
    {
        $this->imdb = $imdb;

        return $this;
    }

    /**
     * Get imdb
     *
     * @return string
     */
    public function getImdb()
    {
        return $this->imdb;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Pelicula
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idGenero;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idGenero = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add idGenero
     *
     * @param \AppBundle\Entity\Genero $idGenero
     *
     * @return Pelicula
     */
    public function addIdGenero(\AppBundle\Entity\Genero $idGenero)
    {
        $this->idGenero[] = $idGenero;

        return $this;
    }

    /**
     * Remove idGenero
     *
     * @param \AppBundle\Entity\Genero $idGenero
     */
    public function removeIdGenero(\AppBundle\Entity\Genero $idGenero)
    {
        $this->idGenero->removeElement($idGenero);
    }

    /**
     * Get idGenero
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdGenero()
    {
        return $this->idGenero;
    }
}
