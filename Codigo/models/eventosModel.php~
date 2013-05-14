<?php

class eventosModel extends Model
{
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('UTC');
    }
    
    public function getEventos()
    {
       			$eventos = $this->conexion->ejecutarConsulta("select * from eventos");
       			$this->conexion->cerrarConexion();
        return $eventos;
    }

    public function getEvento($numero)
    {
        $numero = (int) $numero;
        $noticia = $this->conexion->ejecutarConsulta("select * from eventos where numero = $numero");
        return $noticia[0];
    }
    
    public function insertarEvento($detalles, $tipo, $juego)
    {
    			$detalles		= $this->conexion->limpiarVariable($detalles);
    			$tipo		= $this->conexion->limpiarVariable($tipo);
    			$juego		= $this->conexion->limpiarVariable($juego);
    			$fecha = date("Y/m/d");
       
       $exito = $this->conexion->ejecutar("INSERT INTO eventos (detalles,tipo,fecha,nom_juego) 
									VALUES ('$detalles','$tipo','$fecha','$juego')");
					$this->conexion->cerrarConexion();
					return $exito;
    }
    
    public function editarEvento($numero, $nom_juego, $tipo, $detalles)
    {
        $numero = (int) $numero;
        $exito = $this->conexion->ejecutar("UPDATE eventos SET titulo='$nom_juego', tipo='$tipo', detalles='$detalles' WHERE numero='$numero'");
						$this->conexion->cerrarConexion();
						return $exito;
    }
    
     public function eliminarEvento($numero)
    {
        $numero = (int) $numero;
        $exito = $this->conexion->ejecutar("DELETE FROM eventos WHERE numero = '$numero'");
        $this->conexion->cerrarConexion();
					return $exito;
    }
}

?>
