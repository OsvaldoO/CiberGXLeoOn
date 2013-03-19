<?php
	if($evento != FALSE)
	{	
		echo 'Datos de EVENTO'."<br>";
		echo 'Detalles: '.$evento->detalles."<br>";
		echo 'Juego: '.$evento->nom_juego."<br>";
		echo 'Tipo: '.$evento->tipo."<br>";
		echo 'Ganador: '.$evento->nick_ganador."<br>";
		echo 'Fecha: '.$evento->fecha." <br>";
		echo 'Participantes: '.$evento->participantes."<br>";
	}
	else echo 'No se guado valor en la variable Evento';
?>
