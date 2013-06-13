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
		$this->listar();
	}
	
		public function listar($usuario = false) {
		$this->vista('logros/index');
		}
		
		public function getLogros($logros = false) {
			if($this->session->userdata('user'))
			{
				$logros = $this->get_db->getRegistros('logros','usuario',$this->session->userdata('user'));
			}
			echo json_encode($logros);
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
        $this->form_validation->set_rules('detalle','Detalles','min_lenght[3]|required|max_lenght[200]');
        $this->form_validation->set_rules('puntos','Puntos Otorgados','numeric|required|max_lenght[5]');

       	if($this->form_validation->run() == FALSE)   //si no supera las reglas de validación se recarga la vista del formulario
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
	}
		
	public function vista($vista,$data=false) 
	{
		$this->load->view('header',$data);
		$this->load->view($vista);
		$this->load->view('footer');
	}
}
