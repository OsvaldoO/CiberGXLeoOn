<?php
/**
 *
 *
 */
class RentasBss{
	//Atributos
	private $clave;
	private $nick;
	private $codigo;
	private $fecha;
		 //Metodos
		 
		 /*
		 * @param string 
		 * @param string 
		 * @param string 
		 * @return 
		 */

		 function registrarRenta($clave, $nick, $codigo, $fecha)
		 {
		 	//Conectarse a la Base se Datos
		 	require ('bd_info.inc');
			@$consulta = new mysqli( $host, $user, $pass, $bd );

			if($consulta -> connect_errno)
				die('No se ha podido conectar a la Base de Datos');			
			//Crear el query

			//Asignar variables al objeto
		 	$this -> clave		= $consulta->real_escape_string($clave);
		 	$this -> nick		= $consulta->real_escape_string($nick);
		 	$this -> codigo	= $consulta->real_escape_string($codigo);
		 	$this -> fecha= $consulta->real_escape_string($fecha);
			
			$sql = "INSERT INTO 
						rentas (nick,codigo,fecha) 
					VALUES 
						('$this->nick',
						'$this->codigo',
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
		 
		 function muestraRentas()
		 {
		 	require ('bd_info.inc');
			@$consulta = new mysqli( $host, $user, $pass, $bd );

			if($consulta -> connect_errno)
				die('No se ha podido conectar a la Base de Datos');
							
			//Crear el query
			$sql = "SELECT * 
						FROM 
						rentas";	
						
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
				$rentas[] = $fila;
				$consulta -> close();
				return $rentas; 
			}
		 }
		 
		 
		//Funcion ConsultarCliente
		/*
		 * @param string $nick, nick de cliente a consultar
		 * @return TRUE di de encontro, FALSE si no se encontro 
		 */
		function consultarRenta( $clave )
		{
			require ('bd_info.inc');
			@$consulta = new mysqli( $host, $user, $pass, $bd );

			if($consulta -> connect_errno)
				die('No se ha podido conectar a la Base de Datos');			
			//Crear el query
			$sql = "SELECT 
						* 
					FROM 
						rentas
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
					$this->nick =$fila['nick'];
					$this->codigo =$fila['codigo'];
					$this->fecha =$fila['fecha'];
					return $fila;
				}
				else 
				return FALSE; 
			}
		}
}
?>