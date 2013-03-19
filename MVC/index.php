<?php
if(!isset($_REQUEST['clase']))
	echo 'Es necesario Ingresar una clase';
else 
{
	switch ($_REQUEST['clase']) 
	{
		case 'clientes':
			include('Controller/ClienteCtr.php');
			$controlador = new ClienteCtr();
			break;
		case 'juegos':
			include('Controller/JuegoCtr.php');
			$controlador = new JuegoCtr();
			break;	
		case 'empleados':
			include('Controller/EmpleadoCtr.php');
			$controlador = new EmpleadoCtr();
			break;
		case 'rentas':
			include('Controller/RentaCtr.php');
			$controlador = new RentaCtr();
			break;
		case 'eventos':
			include('Controller/EventoCtr.php');
			$controlador = new EventoCtr();
			break;
		case 'logros':
			include('Controller/LogroCtr.php');
			$controlador = new LogroCtr();
			break;
		case 'inscripciones':
			include('Controller/InscripcionCtr.php');
			$controlador = new InscripcionCtr();
			break;
		case 'detallesrenta':
			include('Controller/DetallesRentaCtr.php');
			$controlador = new DetallesRentaCtr();
			break;
		default: echo 'El Tipo espesificado no esta Implementado';
			$error = TRUE;
			break;
	}
	if(!isset($error))
		$controlador -> ejecutar();
}


?>
