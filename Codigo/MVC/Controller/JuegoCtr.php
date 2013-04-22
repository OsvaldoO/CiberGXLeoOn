<?php
/**
 * @package mvc
 * @subpackage controller
 * @autor
 */

//Este controlador requiere tener acceso al modelo
include_once('Model/JuegoBss.php');

//La clase controlador

class JuegoCtr{

	public $modelo;
	function __construct(){
		$this -> modelo = new JuegoBss();
	}

	function ejecutar(){
		//Si no tengo parametros listo los usuarios
		if( !isset($_REQUEST['accion']) ){
			$juegos = $this->modelo->listar();
			//Incluyo la Vista
			include('View/juegoListaView.php');
		}
		else {
			switch($_REQUEST['accion']) {
					case 'agregar':
					if(!isset($_SESSION['user']) || $_SESSION['priv'] > 1)
						echo'No tienes mos privilegios para agregar Juegos';
					else {
					if( isset($_REQUEST['nombre']) and isset($_REQUEST['genero']) and isset($_REQUEST['cantidad']))
					{
						$juego = $this->modelo->agregar( $_REQUEST['nombre'], $_REQUEST['genero'], $_REQUEST['cantidad'] );
						if(is_object($juego))
							include('View/juegoView.php');
						else 
						include('View/DatosIncorrectosView.php');					
					}
					else { include('View/DatosIncorrectosView.php'); }
				}
					break;
					case 'consultar':
					if( isset($_REQUEST['nombre']))
					{
						$juego = $this->modelo->consultar($_REQUEST['nombre']);
						if(is_object($juego))
							include('View/juegoView.php');		
					}
						else {
						include('View/DatosIncorrectosView.php');					
						}		
					break;
					case 'descartar':
					if(!isset($_SESSION['user']) || $_SESSION['priv'] > 1)
						echo'No tienes mos privilegios para realizar esta accion';
					else {
					if( isset($_REQUEST['nombre']))
					{
						$juego = $this->modelo->descartar($_REQUEST['nombre']);
						if($juego)
							//include('View/juegoView.php');
							echo 'Juego Borrado';
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

