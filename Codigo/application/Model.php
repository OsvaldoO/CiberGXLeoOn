<?php

class Model
{
    protected $conexion;
    
    public function __construct() {
        $this->conexion = new Database();
        if(!$this->conexion->conecta())
						die('No se ha podido conectar a la Base de Datos');
    }
}

?>