<?php

/**
 * @package mvc
 * @subpackage controller
 * @author
 */

//Este controlador require tener acceso al modelo
include('Model/EventoBss.php');

//La clase controlador

class EventoCtr{

	public $modelo;

	//Cuando se crea el controlador crea el modelo de usuario
	function __construct(){
		$this -> modelo = new EventoBss();
	}

	function ejecutar(){
		//Si no tengo parametros, listo los usuarios
		if( !isset($_REQUEST['action']) ){
			//Obtengo los datos que se van a listar
			$eventos = $this->modelo->listar();
			//Muestro los datos
			include('View/eventoListaView.php');
		}
		else {
			switch($_REQUEST['action']) {
					case 'publica':
					if( isset($_REQUEST['numero']) and isset($_REQUEST['detalles']) and isset($_REQUEST['nom_juego']) and isset($_REQUEST['tipo']) and isset($_REQUEST['fecha']))
					{
						$evento = $this->modelo->publicar( $_REQUEST['numero'], $_REQUEST['detalles'], $_REQUEST['nom_juego'],$_REQUEST['tipo'],$_REQUEST['fecha'] );
						include('View/eventoView.php');
					}
					else { include('View/eventoErrorView.php'); }
					break;
					case 'consulta':
					if( isset($_REQUEST['numero']))
					{
						$evento = $this->modelo->consultar($_REQUEST['numero']);
						include('View/eventoView.php');
					}
					else {
						include('View/eventoNoEncontradoView.php');					
					}
					break;
					default: echo 'Accion no Implementada';
								
				}		
		}	

	}
}

?>