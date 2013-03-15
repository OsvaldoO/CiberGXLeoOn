<?php

class JuegoClass{
	//Atributos
	public $nombre;
	public $genero;
	public $cantidad;
	public $popularidad;
	public $imagen;
	
	function __construct($no, $ge, $ca, $im = 'defaul.jpg', $po = 0,)
	{
		$this->nombre = $no;
		$this->genero = $ge;
		$this->cantidad = $ca;
		$this->popularidad = $po;
		$this->imagen = $im;
	}
}
?>