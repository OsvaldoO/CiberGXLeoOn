<?php

/**
 * @package mvc
 * @subpackage controller
 * @author
 */

//Este controlador require tener acceso al modelo
include_once('Model/EmpleadoBss.php');

//La clase controlador

class EmpleadoCtr{

	public $modelo;

	//Cuando se crea el controlador crea el modelo de usuario
	function __construct(){
		$this -> modelo = new EmpleadoBss();
	}

	function ejecutar(){
		//Si no tengo parametros, listo los usuarios
		if( !isset($_REQUEST['action']) ){
			//Obtengo los datos que se van a listar
			$empleados = $this->modelo->listar();
			//Muestro los datos
			include('View/empleadoListaView.php');
		}
		else {
			switch($_REQUEST['action']) {
					case 'contrata':
					if( isset($_REQUEST['codigo']) and isset($_REQUEST['nombre']) and isset($_REQUEST['rfc']) and isset($_REQUEST['telefono']))
					{
						$empleado = $this->modelo->contratar( $_REQUEST['codigo'], $_REQUEST['nombre'], $_REQUEST['rfc'],$_REQUEST['telefono'] );
						include('View/empleadoView.php');
					}
					else { include('View/empleadoErrorView.php'); }
					break;
					case 'consulta':
					if( isset($_REQUEST['codigo']))
					{
						$empleado = $this->modelo->consultar($_REQUEST['codigo']);
						include('View/empleadoView.php');
					}
					else {
						include('View/empleadoNoEncontradoView.php');					
					}
					break;
					default: echo 'Accion no Implementada';
								
				}		
		}	

	}
}

?>