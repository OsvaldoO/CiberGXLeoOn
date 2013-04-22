<?php

class LogroClass{
	//Atributos
	public $clave;
	public $detalles;
	public $puntos_otorgados;
	public $cliente_premiado;
	public $nom_juego;
	public $fecha;
	
	function __construct($de, $pu, $nj, $cp, $fe)
	{
		$this->detalles = $de;
		$this->puntos_otorgados = $pu;
		$this->nom_juego = $nj;
		$this->cliente_premiado = $cp;
		$this->fecha = $fe;
	}
}
?>