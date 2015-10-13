<?php

namespace Micuenta\Model;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class AlmacenamientoExtra {
    
    
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    protected $id;
    

    /** @ORM\Column(type="integer") */
    protected $almacenamExtra;
    
    
    /** @ORM\Column(type="float") */
    protected $precio;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Plan", inversedBy="almacenamExtras")
     * @ORM\JoinColumn(name="id_plan", referencedColumnName="id")
     */
    protected $plan;
    
    

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
     * Set almacenamExtra
     *
     * @param integer $almacenamExtra
     * @return AlmacenamientoExtra
     */
    public function setAlmacenamExtra($almacenamExtra)
    {
        $this->almacenamExtra = $almacenamExtra;

        return $this;
    }

    /**
     * Get almacenamExtra
     *
     * @return integer 
     */
    public function getAlmacenamExtra()
    {
        return $this->almacenamExtra;
    }

    /**
     * Set precio
     *
     * @param float $precio
     * @return AlmacenamientoAdicional
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
     * Set plan
     *
     * @param \Micuenta\Model\Plan $plan
     * @return AlmacenamientoExtra
     */
    public function setPlan(\Micuenta\Model\Plan $plan = null)
    {
        $this->plan = $plan;

        return $this;
    }

    /**
     * Get plan
     *
     * @return \Micuenta\Model\Plan 
     */
    public function getPlan()
    {
        return $this->plan;
    }
}
