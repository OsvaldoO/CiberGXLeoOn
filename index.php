<?php
//Cargar clase Cliente
require_once ('cliente_class.php');

//Validar accion en url
if(isset($_GET['accion']))
{
	$accion = $_GET['accion'];
	
	switch($accion) 
	{
		case 'registra':
			if( isset($_GET['nombre']) and isset($_GET['nick']) and isset($_GET['password']) and isset($_GET['email']))
			{
				$cliente = new Cliente();
				$cliente->registrarCliente( $_GET['nick'], $_GET['nombre'], $_GET['password'], $_GET['email'] );
			}
		break;
		case 'consulta':
				if( isset($_GET['nick']))
				{
					$cliente = new Cliente();
					if($cliente->consultarCliente($_GET['nick']))
					{
						$cliente->muestraDatos();
					}
					else 
					{
						echo 'No se encontro el Cliente espesificado';
					}					
				}
		break;
		case 'muestra':
				$cliente = new Cliente(); 
				$clientes = $cliente->muestraClientes();
				foreach($clientes as $llave => $valor) 
				  echo $clientes[$llave]['nick']."<br>";			
		break;
		default : echo ' La accion Ingresada No esta Implementada';
	}
}
	else echo ' Ingresa: accion, nombre, nick, password y email en la url';
?>
