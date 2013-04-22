<?php
/**
 *
 *
 */
class InscripcionBss{
		 //Metodos
		 
		 /*
		 * @param string $nick unico 
		 * @param string $nombre, Nombre real de usuario
		 * @param string $email unico, direccion de correo cliente
		 * @param string $password
		 * @param string $avatar, url de imagen para usar como avatar
		 * @return mixted $int con $id y en caso de falla FALSE
		 */

		 function inscribir($num_evento, $nick_cliente, $fecha)
		 {
		 	//Conectarse a la Base se Datos
		 	require ('InscripcionClass.php');
		 	require ('bd_info.inc');
		 	require ('conexion.php');
			$conexion = new DataB( $host, $user, $pass, $bd );

			if(!$conexion->conecta())
				die('No se ha podido conectar a la Base de Datos');			
			//Crear el query

			//Limpiar Variables recibidas
		 	$num_evento		= $conexion->limpiarVariable($num_evento);
		 	$nick_cliente	= $conexion->limpiarVariable($nick_cliente);
			$fecha		= $conexion->limpiarVariable($fecha);
			
			$query = "INSERT INTO 
						inscripciones (num_evento, nick_cliente, fecha)
					VALUES 
						('$num_evento',
						'$nick_cliente',
						'$fecha')"; 	
						
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
				$inscripcion = new InscripcionClass($num_evento, $nick_cliente, $fecha);
				return $inscripcion; 
			}
		 }

		 
		//Funcion ConsultarCliente
		/*
		 * @param string $nick, nick de cliente a consultar
		 * @return TRUE di de encontro, FALSE si no se encontro 
		 */
		function consultar( $num_evento )
		{
			require ('InscripcionClass.php');
			require ('conexion.php');
			require ('bd_info.inc');
			$conexion = new DataB( $host, $user, $pass, $bd );

			if(!$conexion->conecta())
				die('Consultar No se ha podido Realizar');		
				
			$num_evento = $conexion->limpiarVariable($num_evento);
					
			//Crear el query
			$query = "SELECT 
						* 
					FROM 
						inscripciones
					WHERE
						num_evento='$num_evento'";
						
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
					return $resultado; 
			}
		}
		
		
		
		function verMisInscripciones( $nick_cliente )
		{
			require ('InscripcionClass.php');
			require ('conexion.php');
			require ('bd_info.inc');
			$conexion = new DataB( $host, $user, $pass, $bd );

			if(!$conexion->conecta())
				die('Consultar No se ha podido Realizar');		
				
			$nick_cliente = $conexion->limpiarVariable($nick_cliente);
					
			//Crear el query
			$query = "SELECT 
						* 
					FROM 
						inscripciones
					WHERE
						nick_cliente='$nick_cliente'";
						
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
				/*$i=0;
				$inscripcionArray = array();
				$conexion->cerrarConexion();
				while($resultado[$i]['nick_cliente'] == $nick_cliente)
				{
					$inscripcion = new InscripcionClass($resultado[$i]['num_evento'], $resultado[$i]['nick_cliente'], $resultado[$i]['fecha']);
					$i+=1;
					$inscripciones[]=$inscripcion;
				}
				return $inscripciones;
				if (!isset($inscripciones[0]))*/
					return $resultado; 
			}
		}
		
		
		
		function desinscribir( $num_evento, $nick_cliente )
		{
			require ('conexion.php');
			require ('bd_info.inc');
			$conexion = new DataB( $host, $user, $pass, $bd );

			if(!$conexion->conecta())
				die('Consultar No se ha podido Realizar');		
				
			$num_evento = $conexion->limpiarVariable($num_evento);
			$nick_cliente = $conexion->limpiarVariable($nick_cliente);

					
			//Crear el query
			$query = "DELETE 
					FROM 
						inscripciones
					WHERE
						num_evento='$num_evento'
					AND nick_cliente='$nick_cliente'";
						
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
				return TRUE; 
			}
		}
}
?>
