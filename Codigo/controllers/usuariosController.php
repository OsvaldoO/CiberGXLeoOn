<?php

class usuariosController extends Controller
{
    private $_usuario;
    
    public function __construct() {
        parent::__construct();
        $this->_usuarios = $this->loadModel('usuarios');
    }
    
    public function index()
    {
        $this->_view->usuarios = $this->_usuarios->getUsuarios();
        $this->_view->titulo = 'Usuarios';
        $this->_view->renderizar('index', 'usuarios');
    }
    
    
			public function registrar()
    {
    	Session::acceso('admin');
       	$this->_view->titulo = 'Registro de Usuario';
       //	$this->_view->setJs(array(''));
        
        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getTexto('nick')){
                $this->_view->_error = 'Debe introducir el un Nick de usuario';
                $this->_view->renderizar('registrar', 'usuarios');
                exit;
            }
            
            if(!$this->getTexto('email')){
                $this->_view->_error = 'Debe introducir un email valido';
                $this->_view->renderizar('registrar', 'usuarios');
                exit;
            }
            
            if(!$this->getTexto('password')){
                $this->_view->_error = 'Debe introducir un password';
                $this->_view->renderizar('registrar', 'usuarios');
                exit;
            }
            
            $this->_usuarios->registrar(
                    $this->getPostParam('nick'),
                    $this->getPostParam('nombre'),
                    $this->getPostParam('email'),
                    $this->getPostParam('password'),
                    $this->getPostParam('avatar')
                    );
            
            $this->redireccionar('usuarios');
        }       
        
        $this->_view->renderizar('registrar', 'usuarios');
    }
    
    /*public function editar($id)
    {
    	Session::acceso('empleado');
        if(!$this->filtrarInt($id)){
            $this->redireccionar('noticias');
        }
        
        if(!$this->_noticias->getNoticia($this->filtrarInt($id))){
            $this->redireccionar('noticias');
        }
        
        $this->_view->titulo = 'Editar Noticia';
        $this->_view->setJs(array('editar'));
        
        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getTexto('titulo')){
                $this->_view->_error = 'Debe introducir el titulo de la noticia';
                $this->_view->renderizar('editar', 'noticias');
                exit;
            }
            
            if(!$this->getTexto('contenido')){
                $this->_view->_error = 'Debe introducir el contenido de la Noticia';
                $this->_view->renderizar('editar', 'noticias');
                exit;
            }
            
            $this->_noticias->editarNoticia(
                    $this->filtrarInt($id),
                    $this->getPostParam('titulo'),
                    $this->getPostParam('tipo'),
                    $this->getPostParam('contenido')
                    );
            
            $this->redireccionar('noticias');
        }
        
        $this->_view->datos = $this->_noticias->getNoticia($this->filtrarInt($id));
        $this->_view->renderizar('editar', 'noticias');
    }
    
    public function eliminar($id)
    {
    	Session::acceso('admin');
        if(!$this->filtrarInt($id)){
            $this->redireccionar('noticias');
        }
        
        if(!$this->_noticias->getNoticia($this->filtrarInt($id))){
            $this->redireccionar('noticias');
        }
        
        $this->_noticias->eliminarNoticia($this->filtrarInt($id));
        $this->redireccionar('noticias');
    }*/
}

?>