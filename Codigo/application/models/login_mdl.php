<?php
class Login_mdl extends CI_Model
{
 
    public function __construct()
    {
    $this->load->library('session');
    $this->load->database();
    }
   
   
    public function getLogin($username,$password)
    {
    //comprobamos que el nombre de usuario y contraseña coinciden
    $data = array(
    'nick' => $username,
    'pass' => $password
    );
    $query = $this->db->get_where('usuarios',$data);
    return $query->result_array();
    }
   
   
    public function isLogged()
    {
    //Comprobamos si existe la variable de sesión username. En caso de no existir, le impediremos el paso a la página para usuarios registrados
   
        if(isset($this->session->userdata['user']))
        {
        	return TRUE;
        }
        else
        {
        	return FALSE;
        }
       
    }
   
   
   
    public function close()
    {
    //cerrar sesión
    return $this->session->sess_destroy();
    }
}
?>
