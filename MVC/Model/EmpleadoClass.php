<?php

class EmpleadoClass{
	//Atributos
	public $nombre;
	public $rfc;
	public $telefono;
	public $direccion;
	public $tiempo;
	
	function __construct($no, $rf, $te, $di, $ti = 0)
	{
		$this->nombre = $no;
		$this->rfc = $rf;
		$this->telefono = $te;
		$this->direccion = $di;
		$this->tiempo = $ti;
	}
}
?>