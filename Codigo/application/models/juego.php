<?php

class Juego extends CI_Model
{

			
			public function getPag($genero, $ini)
			{
				$query= $this->db->query("SELECT * FROM juegos WHERE genero = '$genero' LIMIT $ini,3");
				return $query->result(); 
			}
			
			public function getCategoria($categoria) {
			$query = $this->db->query("SELECT * FROM juegos WHERE genero = '$categoria' ");
			if ($query->num_rows() > 0 )
				return $query->result(); 
			else 
				return false;
    	}
				
			public function getNoPag($categoria) {
					$query = $this->db->query("SELECT * FROM juegos WHERE genero = '$categoria' ");
					return $query->num_rows()/3;
    	}
    
    public function getRegistros($clase, $id, $valor)
    {
    		$query = $this->db->query("SELECT * FROM $clase WHERE $id = $valor");
    		return $query->result();
    }
    
    public function updateRegistro($clase, $id, $valor, $data)
    {
    	$this->db->where($id, $valor);
			$this->db->update($clase, $data); 
    }
    
    public function inserta($clase, $data) 
    {  
    		$this->db->insert($clase,$data);
    }
 }
?>