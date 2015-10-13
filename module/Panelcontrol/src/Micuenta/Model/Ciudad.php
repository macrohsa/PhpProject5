<?php

namespace Micuenta\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/** @ORM\Entity */
class Ciudad {
    
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $nombre;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Provincia", inversedBy="ciudades")
     * @ORM\JoinColumn(name="provincia", referencedColumnName="id")
     */
    protected $provincia;
    
    
    /**
     * @ORM\OneToMany(targetEntity="Fotografo", mappedBy="ciudad")
     */
    protected $fotografos;
    
    
    public function __construct() {
        $this->fotografos = new ArrayCollection();
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
     * @return Ciudad
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
     * Set provincia
     *
     * @param \Micuenta\Model\Provincia $provincia
     * @return Ciudad
     */
    public function setProvincia(\Micuenta\Model\Provincia $provincia = null)
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * Get provincia
     *
     * @return \Micuenta\Model\Provincia 
     */
    public function getProvincia()
    {
        return $this->provincia;
    }



    /**
     * Add fotografos
     *
     * @param \Micuenta\Model\Fotografo $fotografos
     * @return Ciudad
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
}
