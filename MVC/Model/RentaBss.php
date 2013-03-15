<?php
/**
 *
 *
 */
class RentaBss{
	//Atributos

		 //Metodos
		 
		 /*
		 * @param string 
		 * @param string 
		 * @param string 
		 * @return 
		 */

		 function realizar($clave, $nick, $codigo, $fecha)
		 {
		 	//Conectarse a la Base se Datos
			require ('RentaClass.php');
		 	require ('bd_info.inc');
		 	require ('conexion.php');
			$conexion = new DataB( $host, $user, $pass, $bd );

			if(!$conexion->conecta())
				die('No se ha podido conectar a la Base de Datos');

			//Asignar variables al objeto
		 	$clave		= $conexion->limpiarVariable($clave);
		 	$nick		= $conexion->limpiarVariable($nick);
		 	$codigo	= $conexion->limpiarVariable($codigo);
		 	$fecha= $conexion->limpiarVariable($fecha);
			
			$query = "INSERT INTO 
						rentas (nick,codigo,fecha) 
					VALUES 
						('$nick',
						'$codigo',
						'$fecha')"; 	
						
			//Ejecutar el query
			$resultado = $conexion->ejecutarConsulta($query); 	

		/*	if($resultado == FALSE)
			{
				echo 'Fallo en la consulta ';
				$conexion->cerrarConexion();
				return FALSE;
			}
			else
			{*/
				$clave = $resultado;
				$conexion->cerrarConexion();
				$renta = new RentaClass($clave, $niick, $codigo, $fecha);
				return $renta; 
			//}
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
						rentas";	
						
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
		function consultar( $clave )
		{
			require ('RentaClass.php');
			require ('conexion.php');
			require ('bd_info.inc');
			$conexion = new DataB( $host, $user, $pass, $bd );

			if(!$conexion->conecta())
				die('Consultar No se ha podido Realizar');		
				
			$clave = $conexion->limpiarVariable($clave);
					
			//Crear el query
			$query = "SELECT 
						* 
					FROM 
						rentas
					WHERE
						clave='$clave'";
						
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
				if ($resultado[0]['clave'] == $clave)
				{
					$renta = new RentaClass($resultado[0]['clave'], $resultado[0]['nick_cliente'], $resultado[0]['cod_empleado'], $resultado[0]['fecha']);
					return $renta;
				}
				else 
					return FALSE; 
			}
		}
}
?>
