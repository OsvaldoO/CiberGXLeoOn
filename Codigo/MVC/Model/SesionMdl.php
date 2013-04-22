<?php
include('ClienteClass.php');
include('EmpleadoClass.php');
include('conexion.php');

class SesionMDL extends DataB{
private $conexion;
private $cliente;

function __construct($conexion){
	$this->conexion = $conexion;
}

function login($usuario,$pass){
	$usuario = $this->conexion->limpiarVariable($usuario);
	$pass = $this->conexion->limpiarVariable($pass);
	if(is_numeric($usuario))
	{
	
			$consulta = "SELECT
												*
												FROM
													empleados
												WHERE 
													codigo = '$usuario'
												AND
													llave = '$pass'";
	}
	else 	
	{
	$consulta = "SELECT 
						*
					FROM 		
						clientes 
							WHERE 
								nick = '$usuario'
							AND 
								password = '$pass'";
	}
					$res = $this->conexion->ejecutarConsulta($consulta);
					if($res){
						return $res;
					}
			return false;
		}

}
?>
