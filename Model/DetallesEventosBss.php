<?php
/**
 *
 *
 */
class DetallesEventosBss{
	//Atributos
	private $numero;
	private $detalles;
	private $tipo;
	private $fecha;
	private $nom_juego;
		 //Metodos
		 
		 /*
		 * @param string 
		 * @param string 
		 * @param string 
		 * @return 
		 */

		 function reportarDetalleEvento($numero, $detalles, $tipo, $fecha, $nom_juego)
		 {
		 	//Conectarse a la Base se Datos
		 	require ('bd_info.inc');
			@$consulta = new mysqli( $host, $user, $pass, $bd );

			if($consulta -> connect_errno)
				die('No se ha podido conectar a la Base de Datos');			
			//Crear el query

			//Asignar variables al objeto
		 	$this -> numero		= $consulta->real_escape_string($numero);
		 	$this -> detalles		= $consulta->real_escape_string($detalles);
		 	$this -> tipo	= $consulta->real_escape_string($tipo);
		 	$this -> fecha	= $consulta->real_escape_string($fecha);
		 	$this -> nom_juego	= $consulta->real_escape_string($nom_juego);

			
			$sql = "INSERT INTO 
						detalleseventos (detalles,tipo,fecha,nom_juego) 
					VALUES 
						('$this->detalles',
						'$this->tipo',
						'$this->nom_juego',
						'$this->fecha')"; 	
						
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
				return $this->consultarRenta( $clave ); 
			}
		 }

		//Funcion Mostrar Clientes
		/*
		 * @return lista de clientes en array 
		 */
		 
		 function muestraDetallesEventos()
		 {
		 	require ('bd_info.inc');
			@$consulta = new mysqli( $host, $user, $pass, $bd );

			if($consulta -> connect_errno)
				die('No se ha podido conectar a la Base de Datos');
							
			//Crear el query
			$sql = "SELECT * 
						FROM 
						detalleseventos";	
						
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
				$eventos[] = $fila;
				$consulta -> close();
				return $eventos; 
			}
		 }
		 
		 
		//Funcion ConsultarCliente
		/*
		 * @param string $nick, nick de cliente a consultar
		 * @return TRUE di de encontro, FALSE si no se encontro 
		 */
		function consultarDetallesEvento( $numero )
		{
			require ('bd_info.inc');
			@$consulta = new mysqli( $host, $user, $pass, $bd );

			if($consulta -> connect_errno)
				die('No se ha podido conectar a la Base de Datos');			
			//Crear el query
			$sql = "SELECT 
						* 
					FROM 
						detalleseventos
					WHERE
						numero='$numero'";
						
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
				if ($fila['numero'] == $numero)
				{
					$this->numero =$fila['numero'];
					$this->detalles =$fila['detalles'];
					$this->tipo =$fila['tipo'];
					$this->fecha =$fila['fecha'];
					$this->nom_juego =$fila['nom_juego'];
					return $fila;
				}
				else 
				return FALSE; 
			}
		}
}
?>
