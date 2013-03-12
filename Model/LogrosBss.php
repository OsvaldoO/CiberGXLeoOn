<?php
/**
 *
 *
 */
class LogrosBss{
	//Atributos
	private $clave;
	private $detalles;
	private $puntos_otorgados;
	private $cliente_premiado;
	private $nom_juego;
	private $fecha;
		 //Metodos
		 
		 /*
		 * @param string 
		 * @param string 
		 * @param string 
		 * @return 
		 */

		 function reportarLogro($clave, $detalles, $puntos_otorgados, $cliente_premiado,  $nom_juego$, fecha)
		 {
		 	//Conectarse a la Base se Datos
		 	require ('bd_info.inc');
			@$consulta = new mysqli( $host, $user, $pass, $bd );

			if($consulta -> connect_errno)
				die('No se ha podido conectar a la Base de Datos');			
			//Crear el query

			//Asignar variables al objeto
		 	$this -> clave		= $consulta->real_escape_string($clave);
		 	$this -> detalles		= $consulta->real_escape_string($detalles);
		 	$this -> cliente_premiado	= $consulta->real_escape_string($cliente_premiado);
		 	$this -> puntos_otorgados	= $consulta->real_escape_string($puntos_otorgados);
		 	$this -> fecha	= $consulta->real_escape_string($fecha);
		 	$this -> nom_juego	= $consulta->real_escape_string($nom_juego);

			
			$sql = "INSERT INTO 
						logros (detalles,puntos_otorgados, cliente_premiado, fecha,nom_juego) 
					VALUES 
						('$this->detalles',
						'$this->puntos_otorgados',
						'$this->cliente_premiado',
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
				return $this->consultarLogros( $clave ); 
			}
		 }

		//Funcion Mostrar 
		/*
		 * @return lista de clientes en array 
		 */
		 
		 function muestraLogros()
		 {
		 	require ('bd_info.inc');
			@$consulta = new mysqli( $host, $user, $pass, $bd );

			if($consulta -> connect_errno)
				die('No se ha podido conectar a la Base de Datos');
							
			//Crear el query
			$sql = "SELECT * 
						FROM 
						logros";	
						
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
				$logros[] = $fila;
				$consulta -> close();
				return $logros; 
			}
		 }
		 
		 
		//Funcion Consultar
		/*
		 * @param string $nick, nick de cliente a consultar
		 * @return TRUE di de encontro, FALSE si no se encontro 
		 */
		function consultarLogros( $clave )
		{
			require ('bd_info.inc');
			@$consulta = new mysqli( $host, $user, $pass, $bd );

			if($consulta -> connect_errno)
				die('No se ha podido conectar a la Base de Datos');			
			//Crear el query
			$sql = "SELECT 
						* 
					FROM 
						logros
					WHERE
						clave='$clave'";
						
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
				if ($fila['clave'] == $clave)
				{
					$this->clave =$fila['clave'];
					$this->detalles =$fila['detalles'];
					$this->puntos_otorgados =$fila['puntos_otorgados'];
					$this->cliente_premiado =$fila['cliente_premiado'];
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
