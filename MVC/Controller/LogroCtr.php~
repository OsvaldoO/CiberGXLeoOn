<?php

/**
 * @package mvc
 * @subpackage controller
 * @author
 */

//Este controlador require tener acceso al modelo
include_once('Model/LogroBss.php');

//La clase controlador

class LogroCtr{

	public $modelo;

	//Cuando se crea el controlador crea el modelo de usuario
	function __construct(){
		$this -> modelo = new LogroBss();
	}

	function ejecutar(){
		//Si no tengo parametros, listo los usuarios
		if( !isset($_REQUEST['accion']) ){
			//Obtengo los datos que se van a listar
			$logros = $this->modelo->listar();
			//Muestro los datos
			include('View/logroListaView.php');
		}
		else {
			switch($_REQUEST['accion']) {
					case 'otorgar':
					if( isset($_REQUEST['detalles']) and isset($_REQUEST['puntos_otorgados']) and isset($_REQUEST['nom_juego']) and isset($_REQUEST['cliente_premiado']) and isset($_REQUEST['fecha']) )
					{
						$logro = $this->modelo->otorgar( $_REQUEST['detalles'], $_REQUEST['puntos_otorgados'], $_REQUEST['nom_juego'], $_REQUEST['cliente_premiado'],$_REQUEST['fecha']  );
						include('View/logroView.php');
					}
					else { include('View/DatosIncorrectosView.php'); }
					break;
					case 'consultar':
					if( isset($_REQUEST['clave']))
					{
						$logro = $this->modelo->consultar($_REQUEST['clave']);
						include('View/logroView.php');
					}
					else {
						include('View/DatosIncorrectosView.php');					
					}
					break;
					case 'verLogrosCliente':
					if( isset($_REQUEST['cliente_premiado']))
					{
						$logros = $this->modelo->verLogrosCliente($_REQUEST['cliente_premiado']);
						if($logros)
							include('View/logroListaView.php');
						else echo $_REQUEST['cliente_premiado'].' No ha conseguido ningun logro';
					}
					else {
						include('View/DatosIncorrectosView.php');					
					}
					break;
					default: echo 'Accion no Implementada';
								
				}		
		}	

	}
}

?>