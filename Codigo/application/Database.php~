<?php
class Database
{
	public $host;
	public $user;
	public $pass;
	public $db;
	public $conex;
	
	function __construct()
	{
		$this -> host = DB_HOST;
		$this -> user = DB_USER;
		$this -> pass = DB_PASS;
		$this -> db = DB_NAME;
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
	
	function ejecutarConsulta( $query )
	{
		$resultado = $this->conex->query( $query );
		if($this->conex->errno )
		{
					return FALSE;			
		}
		if($resultado->num_rows > 0 )
		{
				while ($fila = $resultado->fetch_assoc()) 
				{
					$resultado_array[] = $fila;	
				}
				return $resultado_array;
		}
			return FALSE;
	}
	
	
	function ejecutar( $query )
	{
		$resultado = $this->conex->query( $query );
		if($this->conex->errno )
		{
			die('No se ha Ejecutar Consulta: '.$this->conex->error);
			return FALSE;			
		}
		return true;
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
