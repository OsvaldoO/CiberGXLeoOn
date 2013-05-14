<?php

class juegosModel extends Model
{
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('UTC');
    }
    
    public function getJuegos()
    {
       			$juegos = $this->conexion->ejecutarConsulta("select * from juegos");
       			$this->conexion->cerrarConexion();
        return $juegos;
    }

    public function getJuego($nombre)
    {
        $nombre = (int) $nombre;
        $juego = $this->conexion->ejecutarConsulta("select * from juegos where nombre = $nombre");
        return $juego[0];
    }
    
    public function insertarJuego($nombre, $genero, $cantidad, $popularidad)
    {
    			$nombre		= $this->conexion->limpiarVariable($nombre);
    			$genero		= $this->conexion->limpiarVariable($genero);
    			$cantidad		= $this->conexion->limpiarVariable($cantidad);
    			$popularidad		= $this->conexion->limpiarVariable($popularidad);
    			$imagen = "default.jpg";
       
       $exito = $this->conexion->ejecutar("INSERT INTO juegos (nombre,genero,cantidad,popularidad,imagen) 
									VALUES ('$nombre','$genero','$cantidad','$popularidad','$imagen')");
					$this->conexion->cerrarConexion();
					return $exito;
    }
    
    public function editarJuego($nombre, $genero, $cantidad, $popularidad)
    {
        $nombre = (int) $nombre;
        $exito = $this->conexion->ejecutar("UPDATE juegos SET genero='$genero', cantidad='$cantidad', popularidad='$popularidad' WHERE nombre='$nombre'");
						$this->conexion->cerrarConexion();
						return $exito;
    }
    
     public function eliminarJuego($nombre)
    {
        $nombre = (int) $nombre;
        $exito = $this->conexion->ejecutar("DELETE FROM juegos WHERE nombre = '$nombre'");
        $this->conexion->cerrarConexion();
					return $exito;
    }
}

?>
