<?php
/**
 * @package mvc
 * @subpackage controller
 * @autor
 */

//Este controlador requiere tener acceso al modelo
include_once('Model/ClienteBss.php');

//La clase controlador

class StdCtr{

	public $modelo;

	function __construct(){
		$this -> modelo = new ClienteBss();
	}

	function ejecutar(){
		//Si no tengo parametros listo los usuarios
		if( !isset($_REQUEST['action']) ){
			$clientes = $this->modelo->muestraClientes();
			//Incluyo la Vista
			include('View/clienteListaView.php');
		}
		else {
			switch($_REQUEST['action']) {
					case 'registra':
					if( isset($_REQUEST['nombre']) and isset($_REQUEST['nick']) and isset($_REQUEST['password']) and isset($_REQUEST['email']))
					{
						$cliente = $this->modelo->registrarCliente( $_REQUEST['nick'], $_REQUEST['nombre'], $_REQUEST['password'], $_REQUEST['email'] );
						include('View/clienteInsertadoView.php');
					}
					else { include('View/ClienteErrorView.php'); }
					break;
					case 'muestra':
					if( isset($_REQUEST['nick']))
					{
						$cliente = $this->modelo->consultarCliente($_REQUEST['nick']);
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
