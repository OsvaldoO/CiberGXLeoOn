<?php
	if($inscripcion != FALSE)
	{	
		echo 'Inscripcion A Evento # '.$inscripcion->num_evento."<br>";
		echo 'Cliente Registrado: '.$inscripcion->nick_cliente."<br>";
		echo 'Fecha: '.$inscripcion->fecha."<br>";
	}
	else echo 'No se guado valor en la variable';
?>
