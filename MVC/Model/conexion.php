<?php

class DataB
{
	public $host;
	public $user;
	public $pass;
	public $db;
	public $conex;
	
	function __construct($dbhost, $dbuser, $dbpass, $db)
	{
		$this -> host = $dbhost;
		$this -> user = $dbuser;
		$this -> pass = $dbpass;
		$this -> db = $db;
	}
	
	/**
	* @return mixed objeto mysqli en caso de exito, False en caso de error
	**/
	
	function conecta()
	{
		$conexion = new mysqli($this->host, $this->user, $this->pass, $this->db );
		if( $conexion->connect_errno )
		{
			return FALSE;
		}
		$this -> conex = $conexion;
		return TRUE;
	}
	
	/**
	 * @param string $query
	 * @return mixed
	 * en caso de resultado que regrese un arreglo
	 * en caso de falla un false
	 * en caso de insert con id automatico, regresa el id
	 * en otros casos regresa cantidad de filas afectadas
	 */
	 
	function ejecutarConsulta( $query )
	{
		$resultado = $this->conex->query( $query );
		if($this->conex->errno )
		{
			var_dump($resultado);
			return FALSE;			
		}
		if(is_object($resultado))
		{
			if($resultado->num_rows > 0 )
			{
				while ($fila = $resultado->fetch_assoc()) 
				{
					$resultado_array[] = $fila;
				}
				return $resultado_array;
			}
		}
		$pos = strpos($query,'INSERT');
		if($pos === 0)
		{
			//return $this->conex->insert_id;
			return TRUE;
		}
		return $this->conex->affected_rows;
	}
	
	/*
	 * @param objeto mysqly $cn
	 * @return boolean
	 */
	 
	function cerrarConexion( )
	{
		return $this->conex->close();
	}
	
	/*
	 * @param objeto mysqly $cn
	 * @param mixted $dato
	 * @return string
	 */
	 
	function limpiarVariable( $dato )
	{
		return $this->conex -> real_escape_string($dato);
	}
}

?>
