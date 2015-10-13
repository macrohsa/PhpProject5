<?php

namespace Micuenta\Model;

use Doctrine\ORM\Mapping as ORM;


/** @ORM\Entity */
class Producto {
    
    
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $nombre;
    
    
    /** @ORM\Column(type="string") */
    protected $descripcion;
    
    
    /** @ORM\Column(type="string") */
    protected $pixelVerticalMinimo;
    
    
    /** @ORM\Column(type="string") */
    protected $pixelHorizontalMinimo;
    
    /** @ORM\Column(type="string") */
    protected $mmVertical;
    
    
    /** @ORM\Column(type="string") */
    protected $mmHorizontal;
    
    
    /** @ORM\Column(type="string") */
    protected $pixelVerticalRecomendado;
    
    
    /** @ORM\Column(type="string") */
    protected $pixelHorizontalRecomendado;
    
    
    /** @ORM\Column(type="string") */
    protected $peso;
    
    
    /** @ORM\Column(type="string") */
    protected $orden;
    
    
    /** @ORM\Column(type="string") */
    protected $codigo;
    
    
    /** @ORM\Column(type="boolean") */
    protected $disponible;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="TipoPapel", inversedBy="productos")
     * @ORM\JoinColumn(name="id_papel", referencedColumnName="id")
     */
    protected $tipoPapel;
    

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
     * Set nombre
     *
     * @param string $nombre
     * @return Producto
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
     * @return Producto
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
     * Set pixelVerticalMinimo
     *
     * @param string $pixelVerticalMinimo
     * @return Producto
     */
    public function setPixelVerticalMinimo($pixelVerticalMinimo)
    {
        $this->pixelVerticalMinimo = $pixelVerticalMinimo;

        return $this;
    }

    /**
     * Get pixelVerticalMinimo
     *
     * @return string 
     */
    public function getPixelVerticalMinimo()
    {
        return $this->pixelVerticalMinimo;
    }

    /**
     * Set pixelHorizontalMinimo
     *
     * @param string $pixelHorizontalMinimo
     * @return Producto
     */
    public function setPixelHorizontalMinimo($pixelHorizontalMinimo)
    {
        $this->pixelHorizontalMinimo = $pixelHorizontalMinimo;

        return $this;
    }

    /**
     * Get pixelHorizontalMinimo
     *
     * @return string 
     */
    public function getPixelHorizontalMinimo()
    {
        return $this->pixelHorizontalMinimo;
    }

    /**
     * Set mmVertical
     *
     * @param string $mmVertical
     * @return Producto
     */
    public function setMmVertical($mmVertical)
    {
        $this->mmVertical = $mmVertical;

        return $this;
    }

    /**
     * Get mmVertical
     *
     * @return string 
     */
    public function getMmVertical()
    {
        return $this->mmVertical;
    }

    /**
     * Set mmHorizontal
     *
     * @param string $mmHorizontal
     * @return Producto
     */
    public function setMmHorizontal($mmHorizontal)
    {
        $this->mmHorizontal = $mmHorizontal;

        return $this;
    }

    /**
     * Get mmHorizontal
     *
     * @return string 
     */
    public function getMmHorizontal()
    {
        return $this->mmHorizontal;
    }

    /**
     * Set pixelVerticalRecomendado
     *
     * @param string $pixelVerticalRecomendado
     * @return Producto
     */
    public function setPixelVerticalRecomendado($pixelVerticalRecomendado)
    {
        $this->pixelVerticalRecomendado = $pixelVerticalRecomendado;

        return $this;
    }

    /**
     * Get pixelVerticalRecomendado
     *
     * @return string 
     */
    public function getPixelVerticalRecomendado()
    {
        return $this->pixelVerticalRecomendado;
    }

    /**
     * Set pixelHorizontalRecomendado
     *
     * @param string $pixelHorizontalRecomendado
     * @return Producto
     */
    public function setPixelHorizontalRecomendado($pixelHorizontalRecomendado)
    {
        $this->pixelHorizontalRecomendado = $pixelHorizontalRecomendado;

        return $this;
    }

    /**
     * Get pixelHorizontalRecomendado
     *
     * @return string 
     */
    public function getPixelHorizontalRecomendado()
    {
        return $this->pixelHorizontalRecomendado;
    }

    /**
     * Set peso
     *
     * @param string $peso
     * @return Producto
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    /**
     * Get peso
     *
     * @return string 
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set orden
     *
     * @param string $orden
     * @return Producto
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get orden
     *
     * @return string 
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     * @return Producto
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
     * Set disponible
     *
     * @param boolean $disponible
     * @return Producto
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
     * Set tipoPapel
     *
     * @param \Micuenta\Model\TipoPapel $tipoPapel
     * @return Producto
     */
    public function setTipoPapel(\Micuenta\Model\TipoPapel $tipoPapel = null)
    {
        $this->tipoPapel = $tipoPapel;

        return $this;
    }

    /**
     * Get tipoPapel
     *
     * @return \Micuenta\Model\TipoPapel 
     */
    public function getTipoPapel()
    {
        return $this->tipoPapel;
    }
}
