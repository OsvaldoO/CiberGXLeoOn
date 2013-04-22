<?php
	if($empleado != FALSE)
	{	
		echo 'Datos de EMPLEADO'."<br>";
		echo 'Nombre: '.$empleado->nombre."<br>";
		echo 'RFC: '.$empleado->rfc."<br>";
		echo 'Telefono: '.$empleado->telefono."<br>";
		echo 'Direccion: '.$empleado->direccion."<br>"; 
		echo 'Tiempo: '.$empleado->tiempo."<br>";
	}
	else echo 'No se guado valor en la variable Empleado';
?>
