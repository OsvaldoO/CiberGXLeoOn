<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {


 public function __construct()
    {
    parent:: __construct();
    $this->load->library('session');
    $this->load->library('email');
    }
    
	public function index()
	{
		$this->vista('index');
	}
	
	public function enviar(){
		if(!isset($_POST['mensaje']))
        {
				$this->vista('mensaje'); //si no recibimos datos por post, cargamos la vista del formulario
        }
        else
        {
			$this->email->from($this->session->userdata('email'), $this->session->userdata['nombre']);
			$this->email->to('osvaldo.lp_5889@hotmail.com'); 
			$this->email->subject('Email CiberGX');
			$this->email->message($_POST['mensaje']);	
			$this->email->send();
			$data['mensaje'] = $this->email->print_debugger();
			$this->vista('enviado',$data);
			}
		}
	
	public function vista($vista,$data=false) 
	{
		$this->load->view('header',$data);
		$this->load->view($vista);
		$this->load->view('footer');
	}
}
