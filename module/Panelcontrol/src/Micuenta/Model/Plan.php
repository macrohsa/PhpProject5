<?php

namespace Micuenta\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/** @ORM\Entity */
class Plan {
    
    
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

    
    /** @ORM\Column(type="integer") */
    protected $almacenamientoBasico;
    
    
    /** @ORM\Column(type="integer") */
    protected $tamanioArchivo;
    
    
    /** @ORM\Column(type="float") */
    protected $precio;
    
    
    /** @ORM\Column(type="boolean") */
    protected $disponible;
    
    
    /**
     * @ORM\OneToMany(targetEntity="Fotografo", mappedBy="plan")
     */
    protected $fotografos;
    
    
    /**
     * @ORM\OneToMany(targetEntity="AlmacenamientoExtra", mappedBy="plan")
     */
    protected $almacenamExtras;
    
   
    /**
     * @ORM\OneToMany(targetEntity="DescuentoPlan", mappedBy="plan")
     */
    protected $descuentos;
    
    
    public function __construct() {
        $this->almacenamExtras = new ArrayCollection();
        $this->descuentos = new ArrayCollection();
        $this->fotografos = new ArrayCollection();
    }
    
    

    

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Plan
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
     * Set almacenamientoBasico
     *
     * @param integer $almacenamientoBasico
     * @return Plan
     */
    public function setAlmacenamientoBasico($almacenamientoBasico)
    {
        $this->almacenamientoBasico = $almacenamientoBasico;

        return $this;
    }

    /**
     * Get almacenamientoBasico
     *
     * @return integer 
     */
    public function getAlmacenamientoBasico()
    {
        return $this->almacenamientoBasico;
    }

    /**
     * Set tamanioArchivo
     *
     * @param integer $tamanioArchivo
     * @return Plan
     */
    public function setTamanioArchivo($tamanioArchivo)
    {
        $this->tamanioArchivo = $tamanioArchivo;

        return $this;
    }

    /**
     * Get tamanioArchivo
     *
     * @return integer 
     */
    public function getTamanioArchivo()
    {
        return $this->tamanioArchivo;
    }

    /**
     * Set precio
     *
     * @param float $precio
     * @return Plan
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set disponible
     *
     * @param boolean $disponible
     * @return Plan
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

    
    /**
     * Add descuentos
     *
     * @param \Micuenta\Model\DescuentoPlan $descuentos
     * @return Plan
     */
    public function addDescuento(\Micuenta\Model\DescuentoPlan $descuentos)
    {
        $this->descuentos[] = $descuentos;

        return $this;
    }

    /**
     * Remove descuentos
     *
     * @param \Micuenta\Model\DescuentoPlan $descuentos
     */
    public function removeDescuento(\Micuenta\Model\DescuentoPlan $descuentos)
    {
        $this->descuentos->removeElement($descuentos);
    }

    /**
     * Get descuentos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDescuentos()
    {
        return $this->descuentos;
    }

    /**
     * Add fotografos
     *
     * @param \Micuenta\Model\Fotografo $fotografos
     * @return Plan
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
     * @return Plan
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
     * Add almacenamExtras
     *
     * @param \Micuenta\Model\AlmacenamientoExtra $almacenamExtras
     * @return Plan
     */
    public function addAlmacenamExtra(\Micuenta\Model\AlmacenamientoExtra $almacenamExtras)
    {
        $this->almacenamExtras[] = $almacenamExtras;

        return $this;
    }

    /**
     * Remove almacenamExtras
     *
     * @param \Micuenta\Model\AlmacenamientoExtra $almacenamExtras
     */
    public function removeAlmacenamExtra(\Micuenta\Model\AlmacenamientoExtra $almacenamExtras)
    {
        $this->almacenamExtras->removeElement($almacenamExtras);
    }

    /**
     * Get almacenamExtras
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAlmacenamExtras()
    {
        return $this->almacenamExtras;
    }
}
