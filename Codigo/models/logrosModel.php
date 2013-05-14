<?php

class logrosModel extends Model
{
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('UTC');
    }
    
    public function getLogros()
    {
       			$logros = $this->conexion->ejecutarConsulta("select * from logros");
       			$this->conexion->cerrarConexion();
        return $logros;
    }

    public function getLogro($clave)
    {
        $clave		= $this->conexion->limpiarVariable($clave);
        $logro = $this->conexion->ejecutarConsulta("select * from logros where clave = $clave");
        return $logro[0];
    }
    
    public function insertarLogro($detalle, $puntos_otorgados, $nom_juego)
    {
    			$detalle		= $this->conexion->limpiarVariable($detalle);
    			$puntos_otorgados		= $this->conexion->limpiarVariable($puntos_otorgados);
    			$nom_juego		= $this->conexion->limpiarVariable($nom_juego);
    			$fecha = date("Y/m/d");
       
       $exito = $this->conexion->ejecutar("INSERT INTO logros (detalle,puntos_otorgados,nom_juego,fecha) 
									VALUES ('$detalle','$puntos_otorgados','$nom_juego','$fecha')");
					$this->conexion->cerrarConexion();
					return $exito;
    }
    
    public function editarLogro($clave, $detalle, $puntos_otorgados, $nom_juego)
    {
        $clave		= $this->conexion->limpiarVariable($clave);
        $exito = $this->conexion->ejecutar("UPDATE logros SET detalle='$detalle', puntos_otorgados='$puntos_otorgados', nom_juego='$nom_juego' WHERE clave='$clave'");
						$this->conexion->cerrarConexion();
						return $exito;
    }
    
     public function eliminarLogro($clave)
    {
        $clave = (int) $clave;
        $exito = $this->conexion->ejecutar("DELETE FROM logros WHERE clave = '$clave'");
        $this->conexion->cerrarConexion();
					return $exito;
    }
}

?>
