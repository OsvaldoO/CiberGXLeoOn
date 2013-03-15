<?php
	if($renta != FALSE)
	{	
		echo 'Datos de RENTA'."<br>";
		echo 'Clave: '.$renta->clave."<br>";
		echo 'Cliente: '.$renta->nick_cliente."<br>";
		echo 'Codigo de Empleado: '.$renta->cod_empleado."<br>";
		echo 'Fecha: '.$renta->fecha."<br>";

	}
	else echo 'No se guado valor en la variable clientes';
?>
