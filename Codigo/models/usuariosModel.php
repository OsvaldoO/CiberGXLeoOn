<?php

class usuariosModel extends Model
{
		//	require ('usuariosClass.php');
			
    public function __construct() {
        parent::__construct();
    }
    
    public function getUsuarios()
    {
       			$usuarios = $this->conexion->ejecutarConsulta("select * from usuarios");
       			$this->conexion->cerrarConexion();
        return $usuarios;
    }

    public function getUsuario($nick)
    {
        $nick = $this->conexion->limpiarVariable($nick);
        $usuario = $this->conexion->ejecutarConsulta("select * from usuarios where nick = $nick");
        return $usuario[0];
    }
    
   function registrar($nick, $nombre, $email, $password, $rol="usuario", $avatar = 'imgdefault.jpg' )
    {
    			$nick		= $this->conexion->limpiarVariable($nick);
				 	$nombre		= $this->conexion->limpiarVariable($nombre);
				 	$email		= $this->conexion->limpiarVariable($email);
				 	$rol		= $this->conexion->limpiarVariable($rol);
				 	$password	= $this->conexion->limpiarVariable($password);
				 	$avatar		= $this->conexion->limpiarVariable($avatar);
       
       $exito = $this->conexion->ejecutar("INSERT INTO usuarios (nick,nombre,rol,email,password,avatar) 
									VALUES ('$nick','$nombre','$rol','$email','$password','$avatar')");
					$this->conexion->cerrarConexion();
					return $exito;
    }
    
    public function editarUsuario($nick, $nombre, $email, $rol, $password, $avatar, $puntos , $credito )
    {
        	$nick		= $this->conexion->limpiarVariable($nick);
				 		$nombre		= $this->conexion->limpiarVariable($nombre);
				 		$nombre		= $this->conexion->limpiarVariable($rol);
				 		$email		= $this->conexion->limpiarVariable($email);
				 		$password	= $this->conexion->limpiarVariable($password);
				 		$avatar		= $this->conexion->limpiarVariable($avatar);
				 		$puntos	= $this->conexion->limpiarVariable($puntos);
				 		$credito		= $this->conexion->limpiarVariable($credito);
        	$exito = $this->conexion->ejecutar("UPDATE usuarios SET nombre='$nombre', email='$email', rol='$rol', password='$password', avatar='$avatar', puntos='$puntos', credito='$credito' WHERE nick='$nick'");
						$this->conexion->cerrarConexion();
						return $exito;
    }
    
     public function eliminarCliente($nick)
    {
        $nick		= $this->conexion->limpiarVariable($nick);
        $exito = $this->conexion->ejecutar("DELETE FROM usuarioss WHERE nick = '$nick'");
        $this->conexion->cerrarConexion();
					return $exito;
    }
}

?>
