<?php
/**
 *
 *
 */
class JuegoBss{
	//Atributos
	private $nombre;
	private $genero;
	private $cantidad;
	private $popularidad;
	private $imagen;
		 //Metodos
		 
		 /*
		 * @param string 
		 * @param string 
		 * @param string 
		 * @return 
		 */

		 function registrarJuego($nombre, $genero, $cantidad = 1, $imagen = 'imgJuegoDefault.jpg')
		 {
		 	//Conectarse a la Base se Datos
		 	require ('bd_info.inc');
			@$consulta = new mysqli( $host, $user, $pass, $bd );

			if($consulta -> connect_errno)
				die('No se ha podido conectar a la Base de Datos');			
			//Crear el query

			//Asignar variables al objeto
		 	$this -> nombre		= $consulta->real_escape_string($nombre);
		 	$this -> genero		= $consulta->real_escape_string($genero);
		 	$this -> imagen	= $consulta->real_escape_string($imagen);
		 	$this -> cantidad	= $consulta->real_escape_string($cantidad);
			
			$sql = "INSERT INTO 
						juegos (nombre,genero,cantidad) 
					VALUES 
						('$this->nombre',
						'$this->genero',
						'$this->cantidad')"; 	
						
			//Ejecutar el query
			$consulta -> query($sql); 	
			echo 'Registro Satisfactorio_O<br>';

			if($consulta -> errno)
			{
				//die('Error '.$mysqli->errno.' : '.$mysqli->error);
				echo 'Error '.$consulta->errno.' : '.$consulta->error ;
				$consulta -> close();
				return FALSE;
			}
			else
			{
				$consulta -> close();
				return $this->consultarJuego( $nombre ); 
			}
		 }

		//Funcion Mostrar Clientes
		/*
		 * @return lista de clientes en array 
		 */
		 
		 function muestraJuegos()
		 {
		 	require ('bd_info.inc');
			@$consulta = new mysqli( $host, $user, $pass, $bd );

			if($consulta -> connect_errno)
				die('No se ha podido conectar a la Base de Datos');
							
			//Crear el query
			$sql = "SELECT * 
						FROM 
						juegos";	
						
			//Ejecutar el query
			$resultado=$consulta->query($sql); 	

			if($consulta -> errno)
			{
				//die('Error '.$mysqli->errno.' : '.$mysqli->error);
				echo 'Error '.$consulta->errno.' : '.$consulta->error ;
				$consulta -> close();
				return FALSE;
			}
			else
			{
				while( $fila = $resultado->fetch_assoc())
				$juegos[] = $fila;
				$consulta -> close();
				return $juegos; 
			}
		 }
		 
		 
		//Funcion ConsultarCliente
		/*
		 * @param string $nick, nick de cliente a consultar
		 * @return TRUE di de encontro, FALSE si no se encontro 
		 */
		function consultarJuego( $nombre )
		{
			require ('bd_info.inc');
			@$consulta = new mysqli( $host, $user, $pass, $bd );

			if($consulta -> connect_errno)
				die('No se ha podido conectar a la Base de Datos');			
			//Crear el query
			$sql = "SELECT 
						* 
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
				$consulta -> close();
				$fila = $resultado -> fetch_assoc();
				if ($fila['nombre'] == $nombre)
				{
					$this->nombre =$fila['nombre'];
					$this->genero =$fila['genero'];
					$this->imagen =$fila['imagen'];
					$this->cantidad =$fila['cantidad'];
					$this->popularidad =$fila['popularidad'];
					return $fila;
				}
				else 
				return FALSE; 
			}
		}
		
		function BorrarJuego( $nombre )
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