<?php

namespace Micuenta\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/** @ORM\Entity */
class FormaPago {
    
    
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    protected $id;
    
    
    /** @ORM\Column(type="string", unique=true, length=10) */
    protected $codigo;
    
    
    /** @ORM\Column(type="string") */
    protected $nombre;

    
    /** @ORM\Column(type="string") */
    protected $descripcion;
    
    
        /** @ORM\Column(type="boolean") */
    protected $disponible;
    
    
    /**
     * @ORM\OneToMany(targetEntity="Fotografo", mappedBy="plan")
     */
    protected $fotografos;
    
    

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fotografos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set codigo
     *
     * @param string $codigo
     * @return FormaPago
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return FormaPago
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return FormaPago
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
     * Add fotografos
     *
     * @param \Micuenta\Model\Fotografo $fotografos
     * @return FormaPago
     */
    public function addFotografo(\Micuenta\Model\Fotografo $fotografos)
    {
        $this->fotografos[] = $fotografos;

        return $this;
    }

    /**
     * Remove fotografos
     *
     * @param \Micuenta\Model\Fotografo $fotografos
     */
    public function removeFotografo(\Micuenta\Model\Fotografo $fotografos)
    {
        $this->fotografos->removeElement($fotografos);
    }

    /**
     * Get fotografos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFotografos()
    {
        return $this->fotografos;
    }

    /**
     * Set disponible
     *
     * @param boolean $disponible
     * @return FormaPago
     */
    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;

        return $this;
    }

    /**
     * Get disponible
     *
     * @return boolean 
     */
    public function getDisponible()
    {
        return $this->disponible;
    }
}
