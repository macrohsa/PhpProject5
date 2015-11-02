<?php

namespace Micuenta\Model;

use Doctrine\ORM\Mapping as ORM;



/** @ORM\Entity */
class DatosAcercaXFotografo {
    
    
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    */
    protected $id_fotografo;
    
    
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    */
    protected $id_acerca;
    
    
    
    /** @ORM\Column(type="boolean") */
    protected $habilitado;
    
    

    /**
     * Set id_fotografo
     *
     * @param integer $idFotografo
     * @return DatosAcercaXFotografo
     */
    public function setIdFotografo($idFotografo)
    {
        $this->id_fotografo = $idFotografo;

        return $this;
    }

    /**
     * Get id_fotografo
     *
     * @return integer 
     */
    public function getIdFotografo()
    {
        return $this->id_fotografo;
    }

    /**
     * Set id_acerca
     *
     * @param integer $idAcerca
     * @return DatosAcercaXFotografo
     */
    public function setIdAcerca($idAcerca)
    {
        $this->id_acerca = $idAcerca;

        return $this;
    }

    /**
     * Get id_acerca
     *
     * @return integer 
     */
    public function getIdAcerca()
    {
        return $this->id_acerca;
    }

    /**
     * Set habilitado
     *
     * @param boolean $habilitado
     * @return DatosAcercaXFotografo
     */
    public function setHabilitado($habilitado)
    {
        $this->habilitado = $habilitado;

        return $this;
    }

    /**
     * Get habilitado
     *
     * @return boolean 
     */
    public function getHabilitado()
    {
        return $this->habilitado;
    }
}
