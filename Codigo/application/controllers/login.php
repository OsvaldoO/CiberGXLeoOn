<?php 
class Login extends CI_Controller
{
 
    public function __construct()
    {
    parent:: __construct();
    $this->load->model('login_mdl');
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->library('session');
    }
   
    public function index()
    {
        if(!isset($_POST['user']))
        {
        		$this->vista('login/login'); //si no recibimos datos por post, cargamos la vista del formulario
        }
        else
        {
        //definimos las reglas de validación
       
        $this->form_validation->set_rules('user','Usuario','required|min_lenght[5]|max_lenght[20]');
        $this->form_validation->set_rules('pass','Password','required');
       
            if($this->form_validation->run() == FALSE) //si no supera las reglas de validación se recarga la vista del formulario
            {
           		 $this->vista('login/login_error');
            }
            else
            {
            	$isValidLogin = $this->login_mdl->getLogin($_POST['user'],$_POST['pass']); //pasamos los valores al modelo para que compruebe si existe el usuario con ese password
           
                if($isValidLogin)
                {
                // si existe el usuario, registramos las variables de sesión y abrimos la página de exito
               
                    $sesion_data = array(
                                    'user' => $_POST['user'],
                                    'pass' => $_POST['pass'],
                                    'nombre' => $isValidLogin[0]['nombre'],
                                    'email' => $isValidLogin[0]['email'],
                                    'puntos' => $isValidLogin[0]['puntos'],
                                    'credito' => $isValidLogin[0]['credito'],
                                    'rol' => $isValidLogin[0]['rol'],
                                    'avatar' => $isValidLogin[0]['avatar']
                                        );
                $this->session->set_userdata($sesion_data);
                $this->vista('usuarios/index');
                }
                else
                {
                // si es erroneo, devolvemos un mensaje de error
                		$this->vista('login/login_error');
                }
            }
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
 
    public function data()
    {
        if($this->session->userdata['user'] == TRUE)
        {
	        echo $this->session->userdata['user'];
	        echo "<br>";
	        echo $this->session->userdata['pass'];
        }
    }
   
   
    public function destroy()
    {
    //destruimos la sesión
    $this->login_mdl->close();
    $this->vista('index');
    }
   
   
    public function perfil()
    {
    //pagina restringida a usuarios registrados.
    $logged = $this->login_mdl->isLogged();
       
        if($logged == TRUE)
        {
        		echo "Tienes permiso para ver el contenido privado";
        }
        else
        {
        //si no tiene permiso, abrimos el formulario para loguearse       	
       		 $this->vista('login/login');
        }
    }
}
?>