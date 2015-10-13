<?php

namespace Micuenta\Model;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class DescuentoPlan {
    
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    protected $id;
    

    /** @ORM\Column(type="integer") */
    protected $mesesPagados;
    
    
    /** @ORM\Column(type="integer") */
    protected $porcentaje;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Plan", inversedBy="descuentos")
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
     * Set mesesPagados
     *
     * @param integer $mesesPagados
     * @return DescuentoPlan
     */
    public function setMesesPagados($mesesPagados)
    {
        $this->mesesPagados = $mesesPagados;

        return $this;
    }

    /**
     * Get mesesPagados
     *
     * @return integer 
     */
    public function getMesesPagados()
    {
        return $this->mesesPagados;
    }

    /**
     * Set porcentaje
     *
     * @param integer $porcentaje
     * @return DescuentoPlan
     */
    public function setPorcentaje($porcentaje)
    {
        $this->porcentaje = $porcentaje;

        return $this;
    }

    /**
     * Get porcentaje
     *
     * @return integer 
     */
    public function getPorcentaje()
    {
        return $this->porcentaje;
    }

    /**
     * Set plan
     *
     * @param \Micuenta\Model\Plan $plan
     * @return DescuentoPlan
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
