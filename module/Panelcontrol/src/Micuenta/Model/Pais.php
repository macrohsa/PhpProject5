<?php

namespace Micuenta\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/** @ORM\Entity */
class Pais {
    
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    protected $id;

    
    /** @ORM\Column(type="string") */
    protected $nombre;
    
   
    
   
    /**
     * @ORM\OneToMany(targetEntity="Provincia", mappedBy="pais")
     */
    protected $provincias;
    
    public function __construct() {
        
        $this->provincias = new ArrayCollection();
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
     * @return Pais
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
     * Add provincias
     *
     * @param \Micuenta\Model\Provincia $provincias
     * @return Pais
     */
    public function addProvincia(\Micuenta\Model\Provincia $provincias)
    {
        $this->provincias[] = $provincias;

        return $this;
    }

    /**
     * Remove provincias
     *
     * @param \Micuenta\Model\Provincia $provincias
     */
    public function removeProvincia(\Micuenta\Model\Provincia $provincias)
    {
        $this->provincias->removeElement($provincias);
    }

    /**
     * Get provincias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProvincias()
    {
        return $this->provincias;
    }
}
