<?php

class RentaClass{
	//Atributos
	public $clave;
	public $nick_cliente;
	public $cod_empleado;
	public $fecha;
	
	function __construct($cl, $nc, $ce, $fe )
	{
		$this->clave = $cl;
		$this->nick_cliente = $nc;
		$this->cod_empleado = $ce;
		$this->fecha = $fe;
	}
}
?>