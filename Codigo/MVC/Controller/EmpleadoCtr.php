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
 //session_start();
	//Cuando se crea el controlador crea el modelo de usuario
	function __construct(){
		$this -> modelo = new EmpleadoBss();
	}

	function ejecutar(){
		//Si no tengo parametros, listo los usuarios
		if( !isset($_REQUEST['accion']) ){
			//Obtengo los datos que se van a listar
			$empleados = $this->modelo->listar();
			//Muestro los datos
			include('View/empleadoListaView.php');
		}
		else {
			switch($_REQUEST['accion']) {
					case 'contratar':
					if(!isset($_SESSION['user']) || $_SESSION['priv'] > 0)
						echo'Solo el Administrador Puede Contratar Empleados';
					else {
					if( isset($_REQUEST['nombre']) and isset($_REQUEST['rfc']) and isset($_REQUEST['telefono']) and isset($_REQUEST['direccion']) )
					{
						$empleado = $this->modelo->contratar( $_REQUEST['nombre'], $_REQUEST['rfc'],$_REQUEST['telefono'],$_REQUEST['direccion'] );
						include('View/empleadoView.php');
					}
					else { include('View/DatosIncorrectosView.php'); }
				}
					break;
					case 'consultar':
					if(!isset($_SESSION['user']) || $_SESSION['priv'] > 0)
						echo'Solo el Administrador Puede consultar los Empleados';
					else {
					if( isset($_REQUEST['codigo']))
					{
						$empleado = $this->modelo->consultar($_REQUEST['codigo']);
						include('View/empleadoView.php');
					}
					else {
						include('View/DatosIncorrectosView.php');					
					}
					}
					break;
					case 'aumentarTiempo':
					if(!isset($_SESSION['user']) || $_SESSION['priv'] > 0)
						echo'No tienes los privilegios para realizar esta accion';
					else {
					if( isset($_REQUEST['codigo']) and isset($_REQUEST['tiempo']))
					{
						$tiempo = $this->modelo->aumentarTiempo($_REQUEST['codigo'],$_REQUEST['tiempo']);
						echo 'Tiempo Actual de empleado '. $tiempo;
					}
					else {
						include('View/DatosIncorrectosView.php');					
					}
					}
					break;
					case 'despedir':
					if(!isset($_SESSION['user']) || $_SESSION['priv'] > 0)
						echo'Solo el Administrador Puede Despedir Empleados';
					else {
					if( isset($_REQUEST['codigo']))
					{
						$empleado = $this->modelo->despedir($_REQUEST['codigo']);
						if($empleado == TRUE)
							echo 'El Empleado ha sido despedido';
						else 'No se pudo realizar la accion';
					}
					else {
						include('View/DatosIncorrectosView.php');					
					}
					}
					break;
					default: echo 'Accion no Implementada';			
				}		
		}	

	}
}

?>