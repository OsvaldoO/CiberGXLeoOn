<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	 
	 public function __construct()
    {
    parent:: __construct();
    $this->load->model('usuario');
    $this->load->model('get_db');
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->library('my_validation');
    $this->load->library('session');
    }
    
	public function index()
	{
			$this->vista('usuarios/index');
	}
	
	public function registro() {
					$data = array();
					$error =false;
					if(!isset($_POST['nick']))
        {
        		$this->vista('usuarios/registrar'); //si no recibimos datos por post, cargamos la vista del formulario
        }
        else
        {
        //definimos las reglas de validación
        $this->form_validation->set_rules('nombre','Nombre','alpha|min_lenght[3]|max_lenght[50]');
        $this->form_validation->set_rules('nick','Nick','required|alpha_numeric|is_unique[usuarios.nick]|min_lenght[5]|max_lenght[20]');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[usuarios.email]');
        $this->form_validation->set_rules('pass','Password','required');
        $this->form_validation->set_rules('repass','Re-Password','required');
        if(!$this->my_validation->valid_url($this->input->post('avatar')) || !$this->my_validation->validaUrl($this->input->post('avatar')))
        {
       				$data['message'] = "Url de Avatar no valida";
       				$error = true;
       	}
       	if( $this->input->post('pass') != $this->input->post('repass') )
        {
        		$data['message'] = "Los campos Password No coinciden";
        		$error = true;
        }
	      if($this->form_validation->run() == FALSE || $error)   //si no supera las reglas de validación se recarga la vista del formulario
	      {
	     		 $this->vista('usuarios/registrar',$data);
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
	
	
	
	public function cambiarPass()
	{
		$data = array();
		$error =false;
		if(!isset($_POST['pass']))
        {
        		$this->vista('usuarios/password'); //si no recibimos datos por post, cargamos la vista del formulario
        }
        else
        {
        $this->form_validation->set_rules('old','Password Actual','required');
        $this->form_validation->set_rules('pass','Password','required');
        $this->form_validation->set_rules('repass','Re-Password','required');
        if( $this->input->post('pass') != $this->input->post('repass') )
        {
        		$data['message'] = "Los campos del nuevo Password No coinciden";
        		$error = true;
        }
	      if($this->form_validation->run() == FALSE )   //si no supera las reglas de validación se recarga la vista del formulario
	      {
	     		 $error = true;
	      }
	      if(!$this->usuario->correctPass($this->session->userdata('user'),$this->input->post('old')))   //si no supera las reglas de validación se recarga la vista del formulario
	      {
        		$data['message'] = "El password Actual es Incorrecto";
        		$error = true;
	      }
	      if( $error)   //si no supera las reglas de validación se recarga la vista del formulario
	      {
	     		 $this->vista('usuarios/password',$data);
	      }
	      else 
	      {
	      		$pass = array(
	       		'pass' => $this->input->post('pass'));
	      		$this->usuario->cambiaPass($this->session->userdata('user'),$pass); 
	      		$this->session->set_userdata($pass);
	      		$this->vista('usuarios/exito',$data);
	      }
	   }
	}


	public function generaPdf(){
		 $usuarios=$this->usuario->listaTop();
		 $this->load->library('fpdf');
		 $this->_pdf = new FPDF;
		 $this->_pdf->AddPage();
       $this->_pdf->SetFont('Arial','B',16);
       $this->_pdf->Cell(50,17,'Nick',1,0,'C');
       $this->_pdf->Cell(100,17,'Email',1,0,'C');
       $this->_pdf->Cell(20,17,'Puntos',1,1,'C');
       $this->_pdf->Ln();
       for($i=0;$i<count($usuarios);$i++){
       $this->_pdf->Cell(50,15, utf8_decode($usuarios[$i]->nick ),1);
		 $this->_pdf->Cell(100,15, utf8_decode($usuarios[$i]->email ),1);
		 $this->_pdf->Cell(20,15, utf8_decode($usuarios[$i]->puntos ),1);
       $this->_pdf->Ln();}
       $this->_pdf->Output();
		}

	
		public function todos($pag=1) {
		$this->vista('usuarios/todos');
		}
		
		public function getUsuarios() {
		$usuarios = $this->get_db->getAll("usuarios");
		echo  json_encode($usuarios);
		}

	public function listar() {
		$this->vista('usuarios/listar');
		}
		
		public function getTop() {
		$usuarios = $this->usuario->listaTop();
		echo json_encode($usuarios);
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
	        'avatar' => $this->input->post('avatar'),
          );
        $this->session->set_userdata($data);
					$this->get_db->editar('nick',$this->input->post('nick'),"usuarios", $data);
					$this->vista('usuarios/index');    
					}	
	}
	
	public function seccion($sec = false) {
		if($this->session->userdata('user')){
			$sec = json_encode($this->session->userdata);
			}
			echo $sec;
		}
		
		public function getRol($rol = 0) 
		{
			if($this->session->userdata('user')){
						$rol++;
						if($this->session->userdata('rol') == 'admin')
							$rol++;				
				}
				echo $rol;
		}

	public function vista($vista,$data=false) 
	{
		$this->load->view('header',$data);
		$this->load->view($vista);
		$this->load->view('footer');
	}
	
}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
