<?php

/**
 * @package mvc
 * @subpackage controller
 * @author
 */

//Este controlador require tener acceso al modelo
include_once('Model/DetallesRentaBss.php');

//La clase controlador

class DetallesRentaCtr{

	public $modelo;

	//Cuando se crea el controlador crea el modelo de usuario
	function __construct(){
		$this -> modelo = new DetallesRentaBss();
	}

	function ejecutar(){
		//Si no tengo parametros, listo los usuarios
	if( !isset($_REQUEST['accion']) ){
			//Obtengo los datos que se van a listar
			echo 'Ingrese una accion, DetallesDeRenta no esta implementado para listar (Revisar Diagrama de Clases)';
			//Muestro los datos
			}
		else {
			switch($_REQUEST['accion']) 
			{
					case 'generar':
					if( isset($_REQUEST['clave_renta']) and isset($_REQUEST['nom_juego']) and isset($_REQUEST['horas']))
					{
						$dRenta = $this->modelo->generar( $_REQUEST['clave_renta'], $_REQUEST['nom_juego'], $_REQUEST['horas']);
						include('View/detallesRentaView.php');
					}
					else { include('View/DatosIncorrectosView.php'); }
					break;
					default: echo 'Accion no Implementada';
								
			}		
		}	
	}
}

?>