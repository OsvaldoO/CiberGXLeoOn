<?php
/**
 *
 *
 */
class ClienteBss{
	//Atributos
	private $nick;
	private $nombre;
	private $email;
	private $password;
	private $puntos;
	private $credito;
	private $avatar;

		 //Metodos
		 
		 /*
		 * @param string $nick unico 
		 * @param string $nombre, Nombre real de usuario
		 * @param string $email unico, direccion de correo cliente
		 * @param string $password
		 * @param string $avatar, url de imagen para usar como avatar
		 * @return mixted $int con $id y en caso de falla FALSE
		 */

		 function registrarCliente($nick, $nombre, $email, $password, $avatar = 'imgdefault.jpg' )
		 {
		 

		 	//Conectarse a la Base se Datos
		 	require ('bd_info.inc');
			@$mysqli = new mysqli( $host, $user, $pass, $bd );

			if($mysqli -> connect_errno)
				die('No se ha podido conectar a la Base de Datos');			
			//Crear el query

			//Asignar variables al objeto
		 	$this -> nick		= $mysqli->real_escape_string($nick);
		 	$this -> nombre		= $mysqli->real_escape_string($nombre);
		 	$this -> email		= $mysqli->real_escape_string($email);
		 	$this -> password	= $mysqli->real_escape_string($password);
		 	$this -> avatar		= $mysqli->real_escape_string($avatar);
			
			$sql = "INSERT INTO 
						clientes (nick,nombre,email,password,avatar) 
					VALUES 
						('$this->nick',
						'$this->nombre',
						'$this->email',
						'$this->password',
						'$this->avatar')"; 	
						
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
				return $this->consultarCliente( $nick ); 
			}
		 }

		//Funcion Mostrar Clientes
		/*
		 * @return lista de clientes en array 
		 */
		 
		 function muestraClientes()
		 {
		 	require ('bd_info.inc');
			@$mysqli = new mysqli( $host, $user, $pass, $bd );

			if($mysqli -> connect_errno)
				die('No se ha podido conectar a la Base de Datos');
							
			//Crear el query
			$sql = "SELECT * 
						FROM 
						clientes";	
						
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
				$clientes[] = $fila;
				$mysqli -> close();
				return $clientes; 
			}
		 }
		 
		 
		//Funcion ConsultarCliente
		/*
		 * @param string $nick, nick de cliente a consultar
		 * @return TRUE di de encontro, FALSE si no se encontro 
		 */
		function consultarCliente( $nick )
		{
			require ('bd_info.inc');
			@$mysqli = new mysqli( $host, $user, $pass, $bd );

			if($mysqli -> connect_errno)
				die('No se ha podido conectar a la Base de Datos');			
			//Crear el query
			$sql = "SELECT 
						* 
					FROM 
						clientes
					WHERE
						nick='$nick'";
						
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
				if ($fila['nick'] == $nick)
				{
					$this->nick = $fila['nick'];
					$this->nombre =$fila['nombre'];
					$this->email =$fila['email'];
					$this->password =$fila['password'];
					$this->puntos =$fila['puntos'];
					$this->credito =$fila['credito'];
					$this->avatar =$fila['avatar'];
					return $fila;
				}
				else 
				return FALSE; 
			}
		}
}
?>