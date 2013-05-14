<?php

class loginModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function getUsuario($usuario, $password)
    {
        $datos = $this->conexion->ejecutarConsulta("SELECT * FROM	usuarios	
										WHERE nick = '$usuario' AND password = '$password'");
        $this->conexion->cerrarConexion();
        return $datos[0];
    }
}

?>
