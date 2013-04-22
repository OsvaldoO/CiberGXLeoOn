<?php

class InscripcionClass{
	//Atributos
	public $num_evento;
	public $nick_cliente;
	public $fecha;
	
	function __construct($ne, $nc, $fe )
	{
		$this->num_evento = $ne;
		$this->nick_clente = $nc;
		$this->fecha = $fe;
	}
}
?>