<?php

class noticiasModel extends Model
{
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('UTC');
    }
    
    public function getNoticias()
    {
       			$noticias = $this->conexion->ejecutarConsulta("select * from noticias");
       			$this->conexion->cerrarConexion();
        return $noticias;
    }

    public function getNoticia($id)
    {
        $id = (int) $id;
        $noticia = $this->conexion->ejecutarConsulta("select * from noticias where id = $id");
        return $noticia[0];
    }
    
    public function insertarNoticia($titulo, $tipo, $contenido)
    {
    			$titulo		= $this->conexion->limpiarVariable($titulo);
    			$tipo		= $this->conexion->limpiarVariable($tipo);
    			$contenido		= $this->conexion->limpiarVariable($contenido);
    			$fecha = date("Y/m/d");
       
       $exito = $this->conexion->ejecutar("INSERT INTO noticias (titulo,tipo,contenido,fecha) 
									VALUES ('$titulo','$tipo','$contenido','$fecha')");
					$this->conexion->cerrarConexion();
					return $exito;
    }
    
    public function editarNoticia($id, $titulo, $tipo, $contenido)
    {
        $id = (int) $id;
        $exito = $this->conexion->ejecutar("UPDATE noticias SET titulo='$titulo', tipo='$tipo', contenido='$contenido' WHERE id='$id'");
						$this->conexion->cerrarConexion();
						return $exito;
    }
    
     public function eliminarNoticia($id)
    {
        $id = (int) $id;
        $exito = $this->conexion->ejecutar("DELETE FROM noticias WHERE id = '$id'");
        $this->conexion->cerrarConexion();
					return $exito;
    }
}

?>
