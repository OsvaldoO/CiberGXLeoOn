<?php

class usuariosClass{
	//Atributos
	public $nick;
	public $nombre;
	public $email;
	public $rol;
	public $password;
	public $avatar;
	public $puntos;
	public $credito;
	
	
	function __construct($ni, $no, $ro, $em, $pa, $av = 'default.png', $pu = 0, $cr = 0)
	{
		$this->nick = $ni;
		$this->nombre = $no;
		$this->nick = $ro;
		$this->email = $em;
		$this->password = $pa;
		$this->avatar = $av;
		$this->puntos = $pu;
		$this->credito = $cr;
		
	}
	
	public function get_nick () {
				return $this->nick;
		}
}
?>