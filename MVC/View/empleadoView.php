<?php
	if($empleado != FALSE)
	{	
		echo 'Datos de EMPLEADO'."<br>";
		echo 'Codigo: '.$empleado->codigo."<br>";
		echo 'Nombre: '.$empleado->nombre."<br>";
		echo 'RFC: '.$empleado->rfc."<br>";
		echo 'Telefono: '.$empleado->telefono."<br>";
		echo 'Tiempo: '.$empleado->tiempo."<br>";
	}
	else echo 'No se guado valor en la variable Empleado';
?>
