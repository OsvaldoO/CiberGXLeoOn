<?php
/**
 *
 *
 */
class EmpleadoBss{
		 //Metodos
		 
		 /*
		 
		 */

		 function contratar( $nombre, $rfc, $telefono, $direccion, $tiempo = 0 )
		 {
		 	//Conectarse a la Base se Datos
		 	require ('EmpleadoClass.php');
		 	require ('bd_info.inc');
		 	require ('conexion.php');
			$conexion = new DataB( $host, $user, $pass, $bd );

			if(!$conexion->conecta())
				die('No se ha podido conectar a la Base de Datos');				
			//Crear el query

			//Asignar variables al objeto
		 	$nombre		= $conexion->limpiarVariable($nombre);
		 	$rfc		= $conexion->limpiarVariable($rfc);
		 	$telefono	= $conexion->limpiarVariable($telefono);
			$direccion	= $conexion->limpiarVariable($direccion);
		 	$tiempo		= $conexion->limpiarVariable($tiempo);
			
			$query = "INSERT INTO 
						empleados (nombre,rfc,telefono,direccion,tiempo) 
					VALUES 
						('$nombre',
						'$rfc',
						'$telefono',
						'$direccion',
						'$tiempo')"; 	
						
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
				$empleado = new EmpleadoClass($nombre, $rfc, $telefono, $direccion, $tiempo);
				return $empleado; 
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
						empleados";	
						
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
		 
		 
		//Funcion ConsultarEmpleado
		/*
		 * @param string $nick, nick de cliente a consultar
		 * @return TRUE di de encontro, FALSE si no se encontro 
		 */
		function consultar( $codigo )
		{
			require ('EmpleadoClass.php');
			require ('conexion.php');
			require ('bd_info.inc');
			$conexion = new DataB( $host, $user, $pass, $bd );

			if(!$conexion->conecta())
				die('Consultar No se ha podido Realizar');		
				
			$codigo = $conexion->limpiarVariable($codigo);
						
			//Crear el query
			$query = "SELECT 
						* 
					FROM 
						empleados
					WHERE
						codigo='$codigo'";
						
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
				if ($resultado[0]['codigo'] == $codigo)
				{
					$empleado = new EmpleadoClass($resultado[0]['nombre'], $resultado[0]['rfc'], $resultado[0]['telefono'], $resultado[0]['direccion'], $resultado[0]['tiempo']);
					return $empleado;
				}
				else 
					return FALSE; 
			}
		}
		
		
		
		
		function aumentarTiempo ( $codigo, $tiempo )
		{
			$empleado=$this->consultar($codigo);
			$tiempo+=$empleado->tiempo;
			require ('bd_info.inc');
			$conexion = new DataB( $host, $user, $pass, $bd );

			if(!$conexion->conecta())
				die('Consultar No se ha podido Realizar');		
				
			$codigo = $conexion->limpiarVariable($codigo);	
			$tiempo = $conexion->limpiarVariable($tiempo);		
	

			//Crear el query
			$query = "UPDATE 
						empleados
					SET 
						tiempo=$tiempo
					WHERE
						codigo='$codigo'";

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
				return $tiempo; 
			}
		}
		
		
		function despedir( $codigo )
		{
			require ('conexion.php');
			require ('bd_info.inc');
			$conexion = new DataB( $host, $user, $pass, $bd );

			if(!$conexion->conecta())
				die('Consultar No se ha podido Realizar');		
				
			$codigo = $conexion->limpiarVariable($codigo);
					
			//Crear el query
			$query = "DELETE FROM
						empleados
					WHERE
						codigo='$codigo'";
						
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