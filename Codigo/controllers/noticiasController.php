<?php

class noticiasController extends Controller
{
    private $_noticias;
    
    public function __construct() {
        parent::__construct();
        $this->_noticias = $this->loadModel('noticias');
    }
    
    public function index()
    {
        $this->_view->noticias = $this->_noticias->getNoticias();
        $this->_view->titulo = 'Noticias';
        $this->_view->renderizar('index', 'noticias');
    }
    
    public function nuevo()
    {
    	Session::accesoEstricto(array('empleado'));
       	$this->_view->titulo = 'Nueva Noticia';
       	$this->_view->setJs(array('nuevo'));
        
        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getTexto('titulo')){
                $this->_view->_error = 'Debe introducir el titulo de la noticia';
                $this->_view->renderizar('nuevo', 'noticias');
                exit;
            }
            
            if(!$this->getTexto('contenido')){
                $this->_view->_error = 'Debe introducir el contenido de la Noticia';
                $this->_view->renderizar('nuevo', 'noticias');
                exit;
            }
            
            $this->_noticias->insertarNoticia(
                    $this->getPostParam('titulo'),
                    $this->getPostParam('tipo'),
                    $this->getPostParam('contenido')
                    );
            
            $this->redireccionar('noticias');
        }       
        
        $this->_view->renderizar('nuevo', 'noticias');
    }
    
    public function editar($id)
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
    }
}

?>
