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
		if( !isset($_REQUEST['action']) ){
			//Obtengo los datos que se van a listar
			$rentas = $this->modelo->listar();
			//Muestro los datos
			include('View/rentaListaView.php');
		}
		else {
			switch($_REQUEST['action']) {
					case 'realiza':
					if( isset($_REQUEST['clave']) and isset($_REQUEST['nick_cliente']) and isset($_REQUEST['cod_empleado']) and isset($_REQUEST['fecha']))
					{
						$renta = $this->modelo->realizar( $_REQUEST['clave'], $_REQUEST['nick_cliente'], $_REQUEST['cod_empleado'],$_REQUEST['fecha'] );
						include('View/rentaView.php');
					}
					else { include('View/rentaErrorView.php'); }
					break;
					case 'consulta':
					if( isset($_REQUEST['clave']))
					{
						$renta = $this->modelo->consultar($_REQUEST['clave']);
						include('View/rentaView.php');
					}
					else {
						include('View/rentaNoEncontradaView.php');					
					}
					break;
					default: echo 'Accion no Implementada';
								
				}		
		}	

	}
}

?>