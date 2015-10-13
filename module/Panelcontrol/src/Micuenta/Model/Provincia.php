<?php

namespace Micuenta\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/** @ORM\Entity */
class Provincia {
    
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $nombre;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Pais", inversedBy="provincias")
     * @ORM\JoinColumn(name="pais", referencedColumnName="id")
     */
    protected $pais;
    
    
    /**
     * @ORM\OneToMany(targetEntity="Ciudad", mappedBy="ciudad")
     */
    protected $ciudades;
    
    public function __construct() {
        
        $this->ciudades = new ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return Provincia
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
     * Set pais
     *
     * @param \Micuenta\Model\Pais $pais
     * @return Provincia
     */
    public function setPais(\Micuenta\Model\Pais $pais = null)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return \Micuenta\Model\Pais 
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Add ciudades
     *
     * @param \Micuenta\Model\Ciudad $ciudades
     * @return Provincia
     */
    public function addCiudade(\Micuenta\Model\Ciudad $ciudades)
    {
        $this->ciudades[] = $ciudades;

        return $this;
    }

    /**
     * Remove ciudades
     *
     * @param \Micuenta\Model\Ciudad $ciudades
     */
    public function removeCiudade(\Micuenta\Model\Ciudad $ciudades)
    {
        $this->ciudades->removeElement($ciudades);
    }

    /**
     * Get ciudades
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCiudades()
    {
        return $this->ciudades;
    }
}
