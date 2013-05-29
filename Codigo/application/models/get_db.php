<?php

class Get_db extends CI_Model
{
    public function getAll($clase)
    {
    		$query = $this->db->query("SELECT * FROM $clase");
    		return $query->result();
    }
    
		public function editar($id, $val, $clase, $data) { 
			$this->db->where($id , $val);
			$this->db->update($clase, $data); 
			}   
    
    public function getlista($clase, $campo)
			{
				$query= $this->db->query("SELECT $campo FROM $clase");
				return $query->result(); 
			}	
			
    public function getRegistro($clase, $id, $valor)
    {
    		$query = $this->db->query("SELECT $clase WHERE $id = $valor");
    		return $query->row();
    }
    
    public function getRegistros($clase, $id, $valor)
    {
    		$query = $this->db->query("SELECT * FROM $clase WHERE $id = '$valor'");
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