<?php
	if($dRenta != FALSE)
	{	
		echo 'Detalles RENTA'."<br>";
		echo 'Clave de Renta: '.$dRenta->clave_renta."<br>";
		echo 'Juego Rentado: '.$dRenta->nom_juego."<br>";
		echo 'Horas: '.$dRenta->horas."<br>";

	}
	else echo 'No hay Detalles';
?>
