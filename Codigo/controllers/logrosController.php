<?php

class logrosController extends Controller
{
    private $_logros;
    
    public function __construct() {
        parent::__construct();
        $this->_logros = $this->loadModel('logros');
    }
    
    public function index()
    {
        $this->_view->logros = $this->_logros->getLogros();
        $this->_view->titulo = 'Logros';
        $this->_view->renderizar('index', 'logros');
    }
    
    public function nuevo()
    {
    	Session::accesoEstricto(array('usuario'));
       	$this->_view->titulo = 'Nueva Logro';
       	$this->_view->setJs(array('nuevo'));
        
        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getTexto('titulo')){
                $this->_view->_error = 'Debe introducir el titulo de la logro';
                $this->_view->renderizar('nuevo', 'logros');
                exit;
            }
            
            if(!$this->getTexto('contenido')){
                $this->_view->_error = 'Debe introducir el contenido de la Logro';
                $this->_view->renderizar('nuevo', 'logros');
                exit;
            }
            
            $this->_logros->insertarLogro(
                    $this->getPostParam('titulo'),
                    $this->getPostParam('tipo'),
                    $this->getPostParam('contenido')
                    );
            
            $this->redireccionar('logros');
        }       
        
        $this->_view->renderizar('nuevo', 'logros');
    }
    
    public function editar($id)
    {
    	Session::acceso('especial');
        if(!$this->filtrarInt($id)){
            $this->redireccionar('logros');
        }
        
        if(!$this->_logros->getLogro($this->filtrarInt($id))){
            $this->redireccionar('logros');
        }
        
        $this->_view->titulo = 'Editar Logro';
        $this->_view->setJs(array('editar'));
        
        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getTexto('titulo')){
                $this->_view->_error = 'Debe introducir el titulo de la logro';
                $this->_view->renderizar('editar', 'logros');
                exit;
            }
            
            if(!$this->getTexto('contenido')){
                $this->_view->_error = 'Debe introducir el contenido de la Logro';
                $this->_view->renderizar('editar', 'logros');
                exit;
            }
            
            $this->_logros->editarLogro(
                    $this->filtrarInt($id),
                    $this->getPostParam('titulo'),
                    $this->getPostParam('tipo'),
                    $this->getPostParam('contenido')
                    );
            
            $this->redireccionar('logros');
        }
        
        $this->_view->datos = $this->_logros->getLogro($this->filtrarInt($id));
        $this->_view->renderizar('editar', 'logros');
    }
    
    public function eliminar($id)
    {
    	Session::acceso('admin');
        if(!$this->filtrarInt($id)){
            $this->redireccionar('logros');
        }
        
        if(!$this->_logros->getLogro($this->filtrarInt($id))){
            $this->redireccionar('logros');
        }
        
        $this->_logros->eliminarLogro($this->filtrarInt($id));
        $this->redireccionar('logros');
    }
}

?>
