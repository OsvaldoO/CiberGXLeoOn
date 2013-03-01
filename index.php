<?php

class Cliente
{
	var $nick = '';
	var $nombre = '';
	var $password = '';
	var $email = '';
	var $avatar = '';
	var $puntos = 0;
	var $credito = 0.0;
	 	
 	public function __construct( $nic, $nom, $pass, $em ) 
 	{
 			
		$this->nick = $nic;
		$this->nombre = $nom;
		$this->password = $pass;
		$this->email = $em;
 	}
 	
 	public function registrar () 
	{
		require_once ('bd_info.inc');
		$mysqli = new mysqli($host, $user, $pass, $bd );
		if ( isset( $mysqli -> cannect_errno ) && !empty($mysqli -> connect_errno))
		{
			echo 'No se conecto porque: '.$mysqli -> connect_error;
		}
		else {
			$sql = "INSERT INTO clientes (nick,nombre,email,password) VALUES ('$this->nick','$this->nombre','$this->email','$this->password')"; 	
			$mysqli -> query($sql); 	
			echo 'Registro Satisfactorio_O';
		}
	}
}
 
if(isset($_GET['accion']))
{
	$accion = $_GET['accion'];
	switch($accion) 
	{
		case 'registra':
			if( isset($_GET['nombre']) and isset($_GET['nick']) and isset($_GET['password']) and isset($_GET['email']))
			{
				$cliente = new Cliente( $_GET['nick'], $_GET['nombre'], $_GET['password'], $_GET['email'] );
				$cliente->registrar();
			}
		break;
		case 'elimina': // Todavia no funciona :-?
			/*if(isset($_GET['nick']))
			{
			$sql = "DELETE FROM Cliente WHERE nick =".$_GET['nick'];
			mysql_query($sql);
			echo $_GET['nick'].' Borrado Exitosamente';
			} */
			echo ' Funcion en Proceso ';
		break;
		default : echo ' La accion Ingresada No esta Implementada';
	}
}
	else echo ' Ingresa: accion, nombre, nick, password y email en la url';
?>
