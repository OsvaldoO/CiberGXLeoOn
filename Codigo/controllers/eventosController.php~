<?php

class eventosController extends Controller
{
    private $_eventos;
    
    public function __construct() {
        parent::__construct();
        $this->_eventos = $this->loadModel('eventos');
    }
    
    public function index()
    {
        $this->_view->eventos = $this->_eventos->getEventos();
        $this->_view->titulo = 'Eventos';
        $this->_view->renderizar('index', 'eventos');
    }
    
    public function nuevo()
    {
    	Session::accesoEstricto(array('usuario'));
       	$this->_view->titulo = 'Nuevo Evento';
       	$this->_view->setJs(array('nuevo'));
        
        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getTexto('titulo')){
                $this->_view->_error = 'Debe introducir el titulo del Evento';
                $this->_view->renderizar('nuevo', 'eventos');
                exit;
            }
            
            if(!$this->getTexto('contenido')){
                $this->_view->_error = 'Debe introducir el contenido de la Evento';
                $this->_view->renderizar('nuevo', 'eventos');
                exit;
            }
            
            $this->_eventos->insertarEvento(
                    $this->getPostParam('detalles'),
                    $this->getPostParam('tipo'),
                    $this->getPostParam('nom_juego')
                    );
            
            $this->redireccionar('eventos');
        }       
        
        $this->_view->renderizar('nuevo', 'eventos');
    }
    
    public function editar($id)
    {
    	Session::acceso('empleado');
        if(!$this->filtrarInt($id)){
            $this->redireccionar('eventos');
        }
        
        if(!$this->_eventos->getEvento($this->filtrarInt($id))){
            $this->redireccionar('eventos');
        }
        
        $this->_view->titulo = 'Editar Evento';
        $this->_view->setJs(array('editar'));
        
        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getTexto('titulo')){
                $this->_view->_error = 'Debe introducir el titulo de la Evento';
                $this->_view->renderizar('editar', 'eventos');
                exit;
            }
            
            if(!$this->getTexto('contenido')){
                $this->_view->_error = 'Debe introducir el contenido de la Evento';
                $this->_view->renderizar('editar', 'eventos');
                exit;
            }
            
            $this->_eventos->editarEvento(
                    $this->filtrarInt($id),
                    $this->getPostParam('titulo'),
                    $this->getPostParam('tipo'),
                    $this->getPostParam('contenido')
                    );
            
            $this->redireccionar('eventos');
        }
        
        $this->_view->datos = $this->_eventos->getEvento($this->filtrarInt($id));
        $this->_view->renderizar('editar', 'eventos');
    }
    
    public function eliminar($id)
    {
    	Session::acceso('admin');
        if(!$this->filtrarInt($id)){
            $this->redireccionar('eventos');
        }
        
        if(!$this->_eventos->getEvento($this->filtrarInt($id))){
            $this->redireccionar('eventos');
        }
        
        $this->_eventos->eliminarEvento($this->filtrarInt($id));
        $this->redireccionar('eventos');
    }
}

?>
