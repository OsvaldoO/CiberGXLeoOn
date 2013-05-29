<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	 
	 public function __construct()
    {
    parent:: __construct();
    $this->load->model('usuario');
    $this->load->model('get_db');
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->library('session');
    }
    
	public function index()
	{
		if($this->session->userdata('user'))
		{
			$this->vista('usuarios/index');
		}
		else 
		{
			$data['mensaje']= "SECCION NO INICIADA";
			$this->vista('error/mensaje',$data);
		}
	}
	
	public function registro() {
					if(!isset($_POST['nick']))
        {
        		$this->vista('usuarios/registrar'); //si no recibimos datos por post, cargamos la vista del formulario
        }
        else
        {
        //definimos las reglas de validación
        $this->form_validation->set_rules('nick','Nick','required|min_lenght[5]|max_lenght[20]');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[usuarios.email]');
        $this->form_validation->set_rules('pass','Password','required');
       
	      if($this->form_validation->run() == FALSE) //si no supera las reglas de validación se recarga la vista del formulario
	      {
	     		 $this->vista('usuarios/registrar');
	      }
	      else{
	      	$data = array(
	       'nick' => $this->input->post('nick'),
	       'nombre' => $this->input->post('nombre'),
	       'email' => $this->input->post('email'),
	       'pass' => $this->input->post('pass'),
	       'avatar' => "http://www.gamers.vg/wp-content/uploads/2012/11/Xbox-360notext.jpg"
    			);
    		if($this->input->post('avatar')!= "")
    		{
    			$data['avatar']= $this->input->post('avatar');
    		}
			$this->get_db->inserta('usuarios',$data);
			$this->vista('index');
         }
        }
		}	
	
	public function listar() {
		$data['usuarios'] = $this->usuario->listaTop();
		$this->vista('usuarios/listar',$data);
		}
		
		public function editar()
		{
		if(!isset($_POST['nick']))
        {
        		$this->vista('usuarios/editar'); //si no recibimos datos por post, cargamos la vista del formulario
        }
        else
        {
					$data = array(
	       	'nombre' => $this->input->post('nombre'),
	       	'email' => $this->input->post('email'),
	       	'pass' => $this->input->post('pass'),
	        'avatar' => $this->input->post('avatar'),
          );
         $this->session->set_userdata($data);
						$this->get_db->editar('nick',$this->input->post('nick'),"usuarios", $data);
					$this->vista('usuarios/index');    
					}	
	}

	public function vista($vista,$data=false) 
	{
	if($this->session->userdata('user'))
	{
	$data['nick'] = $this->session->userdata['user'];
    $data['nombre'] = $this->session->userdata['nombre'];
    $data['email'] = $this->session->userdata['email'];
    $data['puntos'] = $this->session->userdata['puntos'];
    $data['rol'] = $this->session->userdata['rol'];
    $data['credito'] = $this->session->userdata['credito'];
    $data['avatar'] = $this->session->userdata['avatar'];		
    $data['pass'] = $this->session->userdata['pass'];											
		}
		$this->load->view('header',$data);
		$this->load->view($vista);
		$this->load->view('footer');
	}
	
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
