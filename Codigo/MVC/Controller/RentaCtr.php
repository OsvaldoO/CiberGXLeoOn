<?php

/**
 * @package mvc
 * @subpackage controller
 * @author
 */

//Este controlador require tener acceso al modelo
include_once('Model/RentaBss.php');

//La clase controlador

class RentaCtr{
	public $modelo;

	//Cuando se crea el controlador crea el modelo de usuario
	function __construct(){
		$this -> modelo = new RentaBss();
	}

	function ejecutar(){
		//Si no tengo parametros, listo los usuarios
		if( !isset($_REQUEST['accion']) ){
			//Obtengo los datos que se van a listar
			$rentas = $this->modelo->listar();
			//Muestro los datos
			include('View/rentaListaView.php');
		}
		else {
			switch($_REQUEST['accion']) {
					case 'realizar':
					if(!isset($_SESSION['user']) || $_SESSION['priv'] > 1)
						echo'No tienes mos privilegios para realizar esta accion';
					else {
					if( isset($_REQUEST['nick_cliente']) and isset($_REQUEST['cod_empleado']) and isset($_REQUEST['fecha']))
					{
						$renta = $this->modelo->realizar( $_REQUEST['nick_cliente'], $_REQUEST['cod_empleado'],$_REQUEST['fecha'] );
						include('View/rentaView.php');
					}
					else { include('View/DatosIncorrectosView.php'); }
				}
					break;
					case 'consultar':
					if(!isset($_SESSION['user']) || $_SESSION['priv'] > 0)
						echo'No tienes mos privilegios para realizar esta accion';
					else {
					if( isset($_REQUEST['clave']))
					{
						$renta = $this->modelo->consultar($_REQUEST['clave']);
						include('View/rentaView.php');
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