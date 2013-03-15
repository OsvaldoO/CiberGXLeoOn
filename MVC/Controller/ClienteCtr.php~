<?php

/**
 * @package mvc
 * @subpackage controller
 * @author
 */

//Este controlador require tener acceso al modelo
include_once('Model/ClienteBss.php');

//La clase controlador

class ClienteCtr{

	public $modelo;

	//Cuando se crea el controlador crea el modelo de usuario
	function __construct(){
		$this -> modelo = new ClienteBss();
	}

	function ejecutar(){
		//Si no tengo parametros, listo los usuarios
		if( !isset($_REQUEST['action']) ){
			//Obtengo los datos que se van a listar
			$clientes = $this->modelo->listar();
			//Muestro los datos
			include('View/clienteListaView.php');
		}
		else {
			switch($_REQUEST['action']) {
					case 'registra':
					if( isset($_REQUEST['nombre']) and isset($_REQUEST['nick']) and isset($_REQUEST['password']) and isset($_REQUEST['email']))
					{
						$cliente = $this->modelo->registrar( $_REQUEST['nick'], $_REQUEST['nombre'], $_REQUEST['email'],$_REQUEST['password'] );
						include('View/clienteView.php');
					}
					else { include('View/ClienteErrorView.php'); }
					break;
					case 'consulta':
					if( isset($_REQUEST['nick']))
					{
						$cliente = $this->modelo->consultar($_REQUEST['nick']);
						include('View/clienteView.php');
					}
					else {
						include('View/clienteNoEncontradoView.php');					
					}
					break;
					default: echo 'Accion no Implementada';
								
				}		
		}	

	}
}

?>