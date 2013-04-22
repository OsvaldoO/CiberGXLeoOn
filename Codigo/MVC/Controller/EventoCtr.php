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
		if( !isset($_REQUEST['accion']) ){
			//Obtengo los datos que se van a listar
			$eventos = $this->modelo->listar();
			//Muestro los datos
			include('View/eventoListaView.php');
		}
		else {
			switch($_REQUEST['accion']) {
					case 'publicar':
					if(!isset($_SESSION['user']) || $_SESSION['priv'] > 1)
						echo'No tienes mos privilegios para Publicar Eventos';
					else {
					if( isset($_REQUEST['detalles']) and isset($_REQUEST['nom_juego']) and isset($_REQUEST['tipo']) and isset($_REQUEST['fecha']))
					{
						$evento = $this->modelo->publicar( $_REQUEST['detalles'], $_REQUEST['nom_juego'],$_REQUEST['tipo'],$_REQUEST['fecha'] );
						include('View/eventoView.php');
					}
					else { include('View/DatosIncorrectosView.php'); }
					}
					break;
					case 'consultar':
					if( isset($_REQUEST['numero']))
					{
						$evento = $this->modelo->consultar($_REQUEST['numero']);
						include('View/eventoView.php');
					}
					else {
						include('View/DatosIncorrectosView.php');					
					}
					break;
					case 'premiar':
					if(!isset($_SESSION['user']) || $_SESSION['priv'] > 1)
						echo'No tienes mos privilegios para realizar esta accion';
					else {
					if( isset($_REQUEST['numero']) and isset($_REQUEST['ganador']))
					{
						$evento = $this->modelo->premiar($_REQUEST['numero'], $_REQUEST['ganador']);
						if ($evento == TRUE)
							echo $_REQUEST['ganador']." Ha sido designado como ganador del evento";
						else 'No se pudo realizar la premiacion';
					}
					else {
						include('View/DatosIncorrectosView.php');					
					}
				}
					break;
					case 'cancelar':
					if(!isset($_SESSION['user']) || $_SESSION['priv'] > 1)
						echo'No tienes mos privilegios para cancelar Eventos';
					else {
					if( isset($_REQUEST['numero']))
					{
						$evento = $this->modelo->cancelar($_REQUEST['numero']);
						if ($evento == TRUE)
							echo "El evento ha sido Cancelado Satisfactoriamente";
						else 'No se pudo cancelar evento';
					}
					else {
						include('View/DatosIncorrectosView.php');					
					}
					}
					break;
					case 'verMisEventosGanados':
					if(!isset($_SESSION['user']))
						echo'No has iniciado sesion';
					else {
					if( isset($_REQUEST['nick']))
					{
						$eventos = $this->modelo->verMisEventosGanados($_REQUEST['nick']);
						if ($eventos)
							include('View/eventoListaView.php');
						else 'No se encontro Informacion';
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