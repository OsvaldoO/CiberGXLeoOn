<?php
/**
 *
 *
 */
class EventosBss{
	//Atributos
	private $num_evento;
	private $nick_ganador;
	private $participantes;
		 //Metodos
		 
		 /*
		 * @param string 
		 * @param string 
		 * @param string 
		 * @return 
		 */

		 function reportarEvento($num_evento, $nick_ganador, $participantes)
		 {
		 	//Conectarse a la Base se Datos
		 	require ('bd_info.inc');
			@$consulta = new mysqli( $host, $user, $pass, $bd );

			if($consulta -> connect_errno)
				die('No se ha podido conectar a la Base de Datos');			
			//Crear el query

			//Asignar variables al objeto
		 	$this -> num_evento		= $consulta->real_escape_string($num_evento);
		 	$this -> nick_ganador		= $consulta->real_escape_string($nick_ganador);
		 	$this -> participantes	= $consulta->real_escape_string($participantes);

			
			$sql = "INSERT INTO 
						eventos (num_evento,nick_ganador,participantes) 
					VALUES 
						('$this->num_evento',
						'$this->nick_ganador',
						'$this->participantes')"; 	
						
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
		 
		 function muestraEventos()
		 {
		 	require ('bd_info.inc');
			@$consulta = new mysqli( $host, $user, $pass, $bd );

			if($consulta -> connect_errno)
				die('No se ha podido conectar a la Base de Datos');
							
			//Crear el query
			$sql = "SELECT * 
						FROM 
						eventos";	
						
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
		function consultarEvento( $num_evento )
		{
			require ('bd_info.inc');
			@$consulta = new mysqli( $host, $user, $pass, $bd );

			if($consulta -> connect_errno)
				die('No se ha podido conectar a la Base de Datos');			
			//Crear el query
			$sql = "SELECT 
						* 
					FROM 
						eventos
					WHERE
						num_evento='$num_evento'";
						
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
				if ($fila['num_evento'] == $num_evento)
				{
					$this->num_evento =$fila['num_event'];
					$this->nick_ganador =$fila['nick_ganador'];
					$this->participantes =$fila['participantes'];
					return $fila;
				}
				else 
				return FALSE; 
			}
		}
}
?>
