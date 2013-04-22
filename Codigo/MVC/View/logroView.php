<?php
	if($logro != FALSE)
	{	
		echo 'Datos de RENTA'."<br>";
		echo 'Detalles: '.$logro->detalles."<br>";
		echo 'Puntos Otorgados: '.$logro->puntos_otorgados."<br>";
		echo 'Juego: '.$logro->nom_juego."<br>";
		echo 'Cliente Premiado: '.$logro->cliente_premiado."<br>";
		echo 'Fecha: '.$logro->fecha."<br>";

	}
	else echo 'No se guado valor en la variable logro';
?>
