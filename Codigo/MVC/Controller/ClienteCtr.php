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
		if( !isset($_REQUEST['accion']) ){
			//Obtengo los datos que se van a listar
			$clientes = $this->modelo->listar();
			//Muestro los datos
			include('View/clienteListaView.php');
		}
		else {
			switch($_REQUEST['accion']) {
					case 'registrar':
					if(!isset($_SESSION['user']) || $_SESSION['priv'] > 1)
						echo'No tienes os privilegios para Registrar Clientes';
					else {
					if( isset($_REQUEST['nombre']) and isset($_REQUEST['nick']) and isset($_REQUEST['password']) and isset($_REQUEST['email']))
					{
						$cliente = $this->modelo->registrar( $_REQUEST['nick'], $_REQUEST['nombre'], $_REQUEST['email'],$_REQUEST['password'] );
						include('View/clienteView.php');
					}
					else { include('View/DatosIncorrectosView.php'); }
					}
					break;
					case 'consultar':
					if(!isset($_SESSION['user']) || $_SESSION['priv'] > 1)
						echo'No tienes los privilegios Consultar los Clientes';
					else {
					if( isset($_REQUEST['nick']))
					{
						$cliente = $this->modelo->consultar($_REQUEST['nick']);
						include('View/clienteView.php');
					}
					else {
						include('View/DatosIncorrectosView.php');					
					}
					}
					case 'agregarCredito':
					if(!isset($_SESSION['user']) || $_SESSION['priv'] > 1)
						echo'No tienes mos privilegios para realizar esta accion';
					else {
					if( isset($_REQUEST['nick']) and isset($_REQUEST['credito']))
					{
						$credito = $this->modelo->agregarCredito($_REQUEST['nick'],$_REQUEST['credito']);
						echo $_REQUEST['nick'].' ahora tiene '. $credito.'$ de credito';
					}
					else {
						include('View/DatosIncorrectosView.php');					
					}
					}
					break;
					case 'agregarPuntos':
					if(!isset($_SESSION['user']) || $_SESSION['priv'] > 1)
						echo'No tienes mos privilegios para realizar esta accion';
					else {
					if( isset($_REQUEST['nick']) and isset($_REQUEST['puntos']))
					{
						$puntos = $this->modelo->agregarPuntos($_REQUEST['nick'],$_REQUEST['puntos']);
						echo $_REQUEST['nick'].' ahora tiene '. $puntos;
					}
					else {
						include('View/DatosIncorrectosView.php');					
					}
				}
					break;
					case 'cambiarAvatar':
					if(!isset($_SESSION['user']))
						echo'No has iniciado seccion';
					else {
					if( isset($_REQUEST['nick']) and isset($_REQUEST['avatar']) )
					{
						$avatar = $this->modelo->cambiarAvatar($_REQUEST['nick'],$_REQUEST['avatar']);
						if($avatar == TRUE)
							echo $_REQUEST['nick'].' ha cambiado su avatar';
						else echo 'No se pudo cambiar el avatar';
	
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