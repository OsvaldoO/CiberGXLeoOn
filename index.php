<?php

// datos para la coneccion a mysql 
define('DB_SERVER','localhost'); 
define('DB_NAME','Proyecto'); 
define('DB_USER','root'); 
define('DB_PASS','1234'); 
$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS); 
mysql_select_db(DB_NAME,$con); 

class Cliente
{
 	 var $nick = '';
 	 var $nombre = '';
 	 var $password = '';
 	 var $email = '';
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
 				$sql = "INSERT INTO Cliente (nick,nombre,password,email,puntos,credito) VALUES ('$this->nick','$this->nombre','$this->password','$this->email','$this->puntos', '$this->credito')"; 	
            mysql_query($sql); 	
            echo 'Registro Satisfactorio';
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
				if(isset($_GET['nick']))
				{
					$sql = "DELETE FROM Cliente WHERE nick =".$_GET['nick'];
					 mysql_query($sql);
					 echo $_GET['nick'].' Borrado Exitosamente';
				} 
				break;
		}
	}
	else 
	{	
		echo ' Ingresa: ' ;
		echo ' Eliminar:   ?accion=elimina&nick=Cliente' ;
		echo ' Registrar:  ?accion=registra&nick=Osval&nombre=osvaldo&password=123&email=lkkjjja@aj';
	}
	
 
?>
