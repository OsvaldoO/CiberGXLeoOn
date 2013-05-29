<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends CI_Controller {

	public function index()
	{
		//$val = $this->load->model('noticias');
		echo "valor = ";
		$this->nuevo();
	}
	
	public function nuevo() {
		$this->load->model('get_db');
		$data['result'] = $this->get_db->getAll("usuarios");
		$data['titulo']="ciberGXLeon";
		$this->load->view('header',$data);
		$this->load->view('noticias/index',$data);
		$this->load->view('footer');
		}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */