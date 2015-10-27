<?php

namespace Micuenta\Model;

use Doctrine\ORM\Mapping as ORM;


/** @ORM\Entity */
class Fotografo{
    
    
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    protected $id;
    
    /** @ORM\Column(type="string") */
    protected $email;
    
    /** @ORM\Column(type="string") */
    protected $contrasenia;

    /** @ORM\Column(type="string") */
    protected $nombre;
    
    /** @ORM\Column(type="string") */
    protected $apellido;
    

    /** @ORM\Column(type="string") */
    protected $emailAlternativo;
    
    
    /** @ORM\Column(type="string") */
    protected $direccion;

    
    /** @ORM\Column(type="string") */
    protected $telefono;
    
    
    /** @ORM\Column(type="boolean") */
    protected $estado;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Plan", inversedBy="fotografos")
     * @ORM\JoinColumn(name="id_plan", referencedColumnName="id")
     */
    protected $plan;
    
    
    
     /**
     * @ORM\ManyToOne(targetEntity="Ciudad", inversedBy="fotografos")
     * @ORM\JoinColumn(name="id_ciudad", referencedColumnName="id")
     */
    protected $ciudad;
    
    
    
     /**
     * @ORM\ManyToOne(targetEntity="FormaPago", inversedBy="fotografos")
     * @ORM\JoinColumn(name="id_formapago", referencedColumnName="id")
     */
    protected $formapago;

    

    
    
    
    
    /**
     * Set emailAlternativo
     *
     * @param string $emailAlternativo
     * @return Fotografo
     */
    public function setEmailAlternativo($emailAlternativo)
    {
        $this->emailAlternativo = $emailAlternativo;

        return $this;
    }

    /**
     * Get emailAlternativo
     *
     * @return string 
     */
    public function getEmailAlternativo()
    {
        return $this->emailAlternativo;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Fotografo
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Fotografo
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Fotografo
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set plan
     *
     * @param \Micuenta\Model\Plan $plan
     * @return Fotografo
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
     * Set email
     *
     * @param string $email
     * @return Fotografo
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set contrasenia
     *
     * @param string $contrasenia
     * @return Fotografo
     */
    public function setContrasenia($contrasenia)
    {
        $this->contrasenia = $contrasenia;

        return $this;
    }

    /**
     * Get contrasenia
     *
     * @return string 
     */
    public function getContrasenia()
    {
        return $this->contrasenia;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Fotografo
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
     * Set apellido
     *
     * @param string $apellido
     * @return Fotografo
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set ciudad
     *
     * @param \Micuenta\Model\Ciudad $ciudad
     * @return Fotografo
     */
    public function setCiudad(\Micuenta\Model\Ciudad $ciudad = null)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get ciudad
     *
     * @return \Micuenta\Model\Ciudad 
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set formapago
     *
     * @param \Micuenta\Model\FormaPago $formapago
     * @return Fotografo
     */
    public function setFormapago(\Micuenta\Model\FormaPago $formapago = null)
    {
        $this->formapago = $formapago;

        return $this;
    }

    /**
     * Get formapago
     *
     * @return \Micuenta\Model\FormaPago 
     */
    public function getFormapago()
    {
        return $this->formapago;
    }
}
