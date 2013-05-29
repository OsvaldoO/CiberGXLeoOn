<?php

class Evento extends CI_Model
{
    public function listaLast()
    {
    		$query = $this->db->query("SELECT * FROM eventos ORDER BY fecha DESC");
    		return $query->result();
    }
			
			
			public function getEvento($numero)
    {
    		$query = $this->db->query("SELECT * FROM eventos WHERE numero = '$numero'");
    		return $query->row();
		}
	

	public function noInscrito($usuario,$numero)
    {
			$query = $this->db->query("SELECT * FROM inscripciones WHERE usuario = '$usuario'");
    		$insc = $query->result();
    		for($i = 0; $i < count($insc) ; $i++)
    		{
    				if($insc[$i]->numero == $numero)
    				{
    					return false;	
    				}
    		}
    		return true;
    	}

    public function misEventos($usuario)
    {
			$query = $this->db->query("SELECT * FROM inscripciones WHERE usuario = '$usuario'");
    		$insc = $query->result();
    		for($i = 0; $i < count($insc) ; $i++)
    		{
    				$insc[$i] = $this->getEvento($insc[$i]->numero);
    		}
    		return $insc;
    }
 }
?>
