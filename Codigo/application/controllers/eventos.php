<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eventos extends CI_Controller {


	 public function __construct()
    {
    parent:: __construct();
    date_default_timezone_set('UTC');
    $this->load->model('evento');
    $this->load->model('get_db');
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->library('session');
    }
    
	public function index()
	{
		$this->listar();
	}
	
	public function listar() {
		
		$data['eventos'] = $this->evento->listaLast();
		$this->vista('eventos/listar',$data);
		}
		
	public function Evento($numero)
	{
		$data['evento'] = $this->evento->getEvento($numero);
		$this->vista('eventos/listar',$data);
	}
		
	public function nuevo(){
			if(!isset($_POST['juego']))
        {
        		$data['juegos'] = $this->get_db->getlista('juegos','nombre');
							$this->vista('eventos/nuevo',$data); //si no recibimos datos por post, cargamos la vista del formulario
        }
        else
        {
			 			$data = array(
	       'detalles' => $this->input->post('detalles'),
	       	'img' => "http://3.bp.blogspot.com/-yQpjEhqNqW0/UZsYH9P4G_I/AAAAAAAAM6g/-dg7lJARc-w/s640/timthumb.jpg",
	       'tipo' => $this->input->post('tipo'),
	       'fecha' => $this->input->post('fecha'),
	       'juego' => $this->input->post('juego')
	    			);
	    			if($this->input->post('img')!= "")
	    			{
	    				$data['img']= $this->input->post('img');
	    			}
						$this->get_db->inserta('eventos',$data);
						$this->listar();
				}
 }
 
 
	public function inscribir($numero)
	{
	if($numero && $this->evento->noInscrito($this->session->userdata('user'),$numero)) {
		$data = array(
	       'numero' => $numero,
	       'usuario' => $this->session->userdata('user'),
	       'fecha' => date("Y/m/d")
	    	);
		$this->get_db->inserta('inscripciones',$data);
		}
		$this->ver();
	}
		
	public function ver()
	{
		$data['eventos'] = $this->evento->misEventos($this->session->userdata('user'));
		$this->vista('usuarios/inscripciones',$data);	
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
