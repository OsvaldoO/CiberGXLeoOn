<?php
/**
 *
 *
 */
class EmpleadoBss{
	//Atributos
	private $codigo;
	private $nombre;
	private $rfc;
	private $telefono;
	private $tiempo;

		 //Metodos
		 
		 /*
		 
		 */

		 function registrarEmpleado($codigo, $nombre, $rfc, $telefono, $tiempo = 0 )
		 {
		 

		 	//Conectarse a la Base se Datos
		 	require ('bd_info.inc');
			@$mysqli = new mysqli( $host, $user, $pass, $bd );

			if($mysqli -> connect_errno)
				die('No se ha podido conectar a la Base de Datos');			
			//Crear el query

			//Asignar variables al objeto
		 	$this -> codigo		= $mysqli->real_escape_string($codigo);
		 	$this -> nombre		= $mysqli->real_escape_string($nombre);
		 	$this -> rfc		= $mysqli->real_escape_string($rfc);
		 	$this -> telefono	= $mysqli->real_escape_string($telefono);
		 	$this -> tiempo		= $mysqli->real_escape_string($tiempo);
			
			$sql = "INSERT INTO 
						empleados (codigo,nombre,rfc,telefono,tiempo) 
					VALUES 
						('$this->codigo',
						'$this->nombre',
						'$this->rfc',
						'$this->telefono',
						'$this->tiempo')"; 	
						
			//Ejecutar el query
			$mysqli -> query($sql); 	
			echo 'Registro Satisfactorio_O<br>';

			if($mysqli -> errno)
			{
				//die('Error '.$mysqli->errno.' : '.$mysqli->error);
				echo 'Error '.$mysqli->errno.' : '.$mysqli->error ;
				$mysqli -> close();
				return FALSE;
			}
			else
			{
				$mysqli -> close();
				return $this->consultarEmpleado( $codigo ); 
			}
		 }

		//Funcion Mostrar Clientes
		/*
		 * @return lista de clientes en array 
		 */
		 
		 function muestraEmpleados()
		 {
		 	require ('bd_info.inc');
			@$mysqli = new mysqli( $host, $user, $pass, $bd );

			if($mysqli -> connect_errno)
				die('No se ha podido conectar a la Base de Datos');
							
			//Crear el query
			$sql = "SELECT * 
						FROM 
						empleados";	
						
			//Ejecutar el query
			$resultado=$mysqli->query($sql); 	

			if($mysqli -> errno)
			{
				//die('Error '.$mysqli->errno.' : '.$mysqli->error);
				echo 'Error '.$mysqli->errno.' : '.$mysqli->error ;
				$mysqli -> close();
				return FALSE;
			}
			else
			{
				while( $fila = $resultado->fetch_assoc())
				$empleados[] = $fila;
				$mysqli -> close();
				return $empleados; 
			}
		 }
		 
		 
		//Funcion ConsultarEmpleado
		/*
		 * @param string $nick, nick de cliente a consultar
		 * @return TRUE di de encontro, FALSE si no se encontro 
		 */
		function consultarEmpleado( $codigo )
		{
			require ('bd_info.inc');
			@$mysqli = new mysqli( $host, $user, $pass, $bd );

			if($mysqli -> connect_errno)
				die('No se ha podido conectar a la Base de Datos');			
			//Crear el query
			$sql = "SELECT 
						* 
					FROM 
						empleados
					WHERE
						nick='$codigo'";
						
			//Ejecutar el query
			$resultado=$mysqli -> query($sql); 	

			if($mysqli -> errno)
			{
				//die('Error '.$mysqli->errno.' : '.$mysqli->error);
				echo 'Error '.$mysqli->errno.' : '.$mysqli->error ;
				$mysqli -> close();
				return FALSE;
			}
			else
			{
				$mysqli -> close();
				$fila = $resultado -> fetch_assoc();
				if ($fila['codigo'] == $codigo)
				{
					$this->codigo = $fila['codigo'];
					$this->nombre =$fila['nombre'];
					$this->rfc =$fila['rfc'];
					$this->telefono =$fila['telefono'];
					$this->tiempo =$fila['tiempo'];
					return $fila;
				}
				else 
				return FALSE; 
			}
		}
}
?>
