<?php
/**
 *
 *
 */
class ClienteBss{
		 //Metodos
		 
		 /*
		 * @param string $nick unico 
		 * @param string $nombre, Nombre real de usuario
		 * @param string $email unico, direccion de correo cliente
		 * @param string $password
		 * @param string $avatar, url de imagen para usar como avatar
		 * @return mixted $int con $id y en caso de falla FALSE
		 */

		 function registrar($nick, $nombre, $email, $password, $avatar = 'imgdefault.jpg' )
		 {
		 	//Conectarse a la Base se Datos
		 	require ('ClienteClass.php');
		 	require ('bd_info.inc');
		 	require ('conexion.php');
			$conexion = new DataB( $host, $user, $pass, $bd );

			if(!$conexion->conecta())
				die('No se ha podido conectar a la Base de Datos');			
			//Crear el query

			//Limpiar Variables recibidas
		 	$nick		= $conexion->limpiarVariable($nick);
		 	$nombre		= $conexion->limpiarVariable($nombre);
		 	$email		= $conexion->limpiarVariable($email);
		 	$password	= $conexion->limpiarVariable($password);
		 	$avatar		= $conexion->limpiarVariable($avatar);
			
			$query = "INSERT INTO 
						clientes (nick,nombre,email,password,avatar) 
					VALUES 
						('$nick',
						'$nombre',
						'$email',
						'$password',
						'$avatar')"; 	
						
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
				$cliente = new ClienteClass($nick, $nombre, $email, $password, $avatar);
				return $cliente; 
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
						clientes";	
						
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
		function consultar( $nick )
		{
			require ('ClienteClass.php');
			require ('conexion.php');
			require ('bd_info.inc');
			$conexion = new DataB( $host, $user, $pass, $bd );

			if(!$conexion->conecta())
				die('Consultar No se ha podido Realizar');		
				
			$nick = $conexion->limpiarVariable($nick);
					
			//Crear el query
			$query = "SELECT 
						* 
					FROM 
						clientes
					WHERE
						nick='$nick'";
						
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
				if ($resultado[0]['nick'] == $nick)
				{
					$cliente = new ClienteClass($resultado[0]['nick'], $resultado[0]['nombre'], $resultado[0]['email'], $resultado[0]['password'], $resultado[0]['avatar'], $resultado[0]['puntos'], $resultado[0]['credito']);
					return $cliente;
				}
				else 
					return FALSE; 
			}
		}
		
		
		function agregarCredito ( $nick, $credito )
		{
			$cliente=$this->consultar($nick);
			$credito+=$cliente->credito;
			require ('bd_info.inc');
			$conexion = new DataB( $host, $user, $pass, $bd );

			if(!$conexion->conecta())
				die('Consultar No se ha podido Realizar');		
				
			$nick = $conexion->limpiarVariable($nick);
			$credito = $conexion->limpiarVariable($credito);		

			//Crear el query
			$query = "UPDATE 
						clientes
					SET 
						credito=$credito
					WHERE
						nick='$nick'";

			//Ejecutar el query
			$resultado=$conexion -> ejecutarConsulta($query); 	
			$conexion->cerrarConexion();
			return $credito;
		}
		
				
		function agregarPuntos ( $nick, $puntos )
		{
			$cliente=$this->consultar($nick);
			$puntos+=$cliente->puntos;
			require ('bd_info.inc');
			$conexion = new DataB( $host, $user, $pass, $bd );

			if(!$conexion->conecta())
				die('Consultar No se ha podido Realizar');		
				
			$nick = $conexion->limpiarVariable($nick);
			$puntos = $conexion->limpiarVariable($puntos);	

			//Crear el query
			$query = "UPDATE 
						clientes
					SET 
						puntos=$puntos
					WHERE
						nick='$nick'";

			//Ejecutar el query
			$resultado=$conexion -> ejecutarConsulta($query); 	
			$conexion->cerrarConexion();
			return $puntos;
		}
		
		
		function cambiarAvatar ( $nick, $avatar )
		{
			require ('conexion.php');
			require ('bd_info.inc');
			$conexion = new DataB( $host, $user, $pass, $bd );

			if(!$conexion->conecta())
				die('Consultar No se ha podido Realizar');		
				
			$nick = $conexion->limpiarVariable($nick);
			$avatar = $conexion->limpiarVariable($avatar);		

			//Crear el query
			$query = "UPDATE 
						clientes
					SET 
						avatar='$avatar'
					WHERE
						nick='$nick'";

			//Ejecutar el query
			$resultado=$conexion -> ejecutarConsulta($query); 
			$conexion->cerrarConexion();	
			return TRUE;
		}
}
?>
