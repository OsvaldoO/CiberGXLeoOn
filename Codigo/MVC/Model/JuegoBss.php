<?php
/**
 *
 *
 */
class JuegoBss{

		 //Metodos
		 
		 /*
		 * @param string 
		 * @param string 
		 * @param string 
		 * @return 
		 */

		 function agregar($nombre, $genero, $cantidad = 1, $imagen = 'imgDefault.jpg')
		 {
		 	//Conectarse a la Base se Datos
			require ('JuegoClass.php');		 	
		 	require ('bd_info.inc');
		 	require ('conexion.php');
			$conexion = new DataB( $host, $user, $pass, $bd );

			if(!$conexion->conecta())
				die('No se ha podido conectar a la Base de Datos');			
			//Crear el query

			//Asignar variables al objeto
		 	$nombre		= $conexion->limpiarVariable($nombre);
		 	$genero		= $conexion->limpiarVariable($genero);
		 	$imagen	= $conexion->limpiarVariable($imagen);
		 	$cantidad	= $conexion->limpiarVariable($cantidad);
			
			$query = "INSERT INTO 
						juegos (nombre,genero,cantidad,imagen) 
					VALUES 
						('$nombre',
						'$genero',
						'$cantidad',
						'$imagen')"; 	
						
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
				$juego = new JuegoClass($nombre, $genero, $cantidad, $imagen);
				return $juego; 
			}
		 }
		//Funcion Mostrar Clientes
		/*
		 * @return lista de clientes en array 
		 */
		 
		 function listar()
		 {
		 	require ('bd_info.inc');
		 	require ('conexion.php');
			$conexion = new DataB( $host, $user, $pass, $bd );

			if(!$conexion->conecta())
				die('Mostrar No se ha podido Realizar');		
							
			//Crear el query
			$query = "SELECT * 
						FROM 
						juegos";	
						
			//Ejecutar el query
			$resultado=$conexion->ejecutarConsulta($query); 	

			if(!$resultado)
			{
				echo 'Fallo en la consulta ';
				$conexion->cerrarConexion();
				return FALSE;
			}
			else
			{
				$conexion->cerrarConexion();
				return $resultado;
			}
		}
		 
		 
		//Funcion ConsultarCliente
		/*
		 * @param string $nick, nick de cliente a consultar
		 * @return TRUE di de encontro, FALSE si no se encontro 
		 */
		function consultar( $nombre )
		{
			require ('JuegoClass.php');
			require ('conexion.php');
			require ('bd_info.inc');
			$conexion = new DataB( $host, $user, $pass, $bd );

			if(!$conexion->conecta())
				die('Consultar No se ha podido Realizar');		
				
			$nombre = $conexion->limpiarVariable($nombre);			
			
			//Crear el query
			$query = "SELECT 
						* 
					FROM 
						juegos
					WHERE
						nombre='$nombre'";
						
			//Ejecutar el query
			$resultado=$conexion -> ejecutarConsulta($query); 	

			if(!$resultado)
			{
				echo 'Fallo en la consulta ';
				$conexion->cerrarConexion();
				return FALSE;
			}
			else
			{
				$conexion->cerrarConexion();
				if ($resultado[0]['nombre'] == $nombre)
				{
					$juego = new JuegoClass($resultado[0]['nombre'], $resultado[0]['genero'], $resultado[0]['cantidad'], $resultado[0]['popularidad'], $resultado[0]['imagen']);
					return $juego;
				}
				else 
					return FALSE; 
			}
		}
		
		function descartar( $nombre )
		{
			require ('bd_info.inc');
			@$consulta = new mysqli( $host, $user, $pass, $bd );

			if($consulta -> connect_errno)
				die('No se ha podido conectar a la Base de Datos');			
			//Crear el query
			$sql = "DELETE 
					FROM 
						juegos
					WHERE
						nombre='$nombre'";
						
			//Ejecutar el query
			$resultado=$consulta -> query($sql); 	

			if($consulta -> errno)
			{
				//die('Error '.$mysqli->errno.' : '.$mysqli->error);
				echo 'Error '.$consulta->errno.' : '.$consulta->error ;
				$consulta -> close();
				return FALSE;
			}
			else
			{
				var_dump($consulta);
				$consulta -> close();
				return TRUE; 
			}
		}
}
?>
