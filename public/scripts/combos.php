<?php

require_once 'class.mysql.php';

class combos extends MySQL {
    
    
    var $code = "";    

    
    public function cargarEstados(){
        
        
        
        $consulta = parent::consulta("SELECT id, nombre FROM Provincia WHERE Pais = '".$this->code."' ORDER BY nombre ASC");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$estados = array();
			while($estado = parent::fetch_assoc($consulta))
			{
                            $id = $estado["id"];				
                            $name = $estado["nombre"];				
                            $estados[$id]=$name;
			}
			return $estados;
		}
		else
		{
			return false;
		}
        
    }
    
    function cargarCiudades()
	{
		$consulta = parent::consulta("SELECT id, nombre FROM Ciudad WHERE Provincia = '".$this->code."' ORDER BY nombre ASC");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$ciudades = array();
			while($ciudad = parent::fetch_assoc($consulta))
			{
                            $id = $ciudad["id"];
                            $name = $ciudad["nombre"];
                            $ciudades[$id]=$name;
			}
			return $ciudades;
		}
		else
		{
			return false;
		}
	}		
    
}
