<?php

class ClienteClass{
	//Atributos
	public $nick;
	public $nombre;
	public $email;
	public $password;
	public $puntos;
	public $credito;
	public $avatar;
	
	function __construct($ni, $no, $em, $pa, $av = 'default.png', $pu = 0, $cr = 0)
	{
		$this->nick = $ni;
		$this->nombre = $no;
		$this->email = $em;
		$this->password = $pa;
		$this->puntos = $pu;
		$this->credito = $cr;
		$this->avatar = $av;
	}
}
?>