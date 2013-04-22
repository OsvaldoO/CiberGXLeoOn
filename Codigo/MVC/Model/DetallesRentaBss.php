<?php
/**
 *
 *
 */
class DetallesRentaBss{
		 //Metodos
		 
		 /*
		 * @param string $
		 * @param string $
		 * @param string $
		 * @param string $
		 * @param string $
		 * @return mixted $int con $id y en caso de falla FALSE
		 */

		 function generar($clave_renta, $nom_juego, $horas)
		 {
		 	//Conectarse a la Base se Datos
		 	require ('DetallesRentaClass.php');
		 	require ('bd_info.inc');
		 	require ('conexion.php');
			$conexion = new DataB( $host, $user, $pass, $bd );

			if(!$conexion->conecta())
				die('No se ha podido conectar a la Base de Datos');			
			//Crear el query

			//Limpiar Variables recibidas
		 	$clave_renta		= $conexion->limpiarVariable($clave_renta);
		 	$nom_juego	= $conexion->limpiarVariable($nom_juego);
			$horas		= $conexion->limpiarVariable($horas);
			
			$query = "INSERT INTO 
						detallesrenta (clave_renta, nom_juego, horas)
					VALUES 
						('$clave_renta',
						'$nom_juego',
						'$horas')"; 	
						
			//Ejecutar el query
			$resultado = $conexion->ejecutarConsulta($query); 	

		if($resultado == FALSE)
			{
				echo 'Fallo en la consulta ';
				$conexion->cerrarConexion();
				return FALSE;
			}
			else
			{
				$conexion->cerrarConexion();
				$dRenta = new DetallesRentaClass($clave_renta, $nom_juego, $horas);
				return $dRenta; 
			}
		 }

}
?>
