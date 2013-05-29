<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logros extends CI_Controller {
	
     public function __construct()
    {
    parent:: __construct();
    date_default_timezone_set('UTC');
    $this->load->model('get_db');
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->library('session');
    }

	public function index()
	{
		$this->load->library('session');
		$this->listar();
	}
	
		public function listar($usuario = false) {
		if(!$usuario) $usuario=$this->session->userdata('user');
		$data['logros'] = $this->get_db->getRegistros('logros','usuario',$usuario);
		$this->vista('logros',$data);
		}
		
	public function nuevo()
	{
		if(!isset($_POST['usuario']))
        {
        		$data['juegos'] = $this->get_db->getlista('juegos','nombre');
        		$data['usuarios'] = $this->get_db->getlista('usuarios','nick');
			$this->vista('logros/nuevo',$data); 
	}
        else
        {
		$datos = array(
	       'detalle' => $this->input->post('detalle'),
	       'usuario' => $this->input->post('usuario'),
	       'juego' => $this->input->post('juego'),
	       'puntos' => $this->input->post('puntos'),
	       'fecha' => date("Y/m/d")
	    	);
		$this->get_db->inserta('logros',$datos);
		$this->listar($this->input->post('usuario'));
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
		}
		$this->load->view('header',$data);
		$this->load->view($vista);
		$this->load->view('footer');
	}
}