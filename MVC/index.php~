<?php
if(!isset($_REQUEST['tipo']))
	echo 'Es necesario Ingresar un tipo';
else 
{
	switch ($_REQUEST['tipo']) 
	{
		case 'cliente':
			include('Controller/ClienteCtr.php');
			$controlador = new ClienteCtr();
			break;
		case 'juego':
			include('Controller/JuegoCtr.php');
			$controlador = new JuegoCtr();
			break;	
		case 'empleado':
			include('Controller/EmpleadoCtr.php');
			$controlador = new EmpleadoCtr();
			break;
		case 'renta':
			include('Controller/RentaCtr.php');
			$controlador = new RentaCtr();
			break;
		case 'evento':
			include('Controller/EventoCtr.php');
			$controlador = new EventoCtr();
			break;
		case 'logro':
			include('Controller/LogroCtr.php');
			$controlador = new LogroCtr();
			break;
		default: echo 'El Tipo espesificado no esta Implementado';
			$error = TRUE;
			break;
	}
	if(!isset($error))
		$controlador -> ejecutar();
}


?>
