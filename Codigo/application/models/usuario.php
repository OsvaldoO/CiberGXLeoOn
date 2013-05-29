<?php

class Usuario extends CI_Model
{
    public function listaTop()
    {
    		$query = $this->db->query("SELECT * FROM usuarios ORDER BY puntos DESC");
    		return $query->result();
    }
 }
?>