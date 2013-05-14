<?php

class juegosController extends Controller
{
    private $_juegos;
    
    public function __construct() {
        parent::__construct();
        $this->_juegos = $this->loadModel('juegos');
    }
    
    public function index()
    {
        $this->_view->juegos = $this->_juegos->getJuegos();
        $this->_view->genero = 'Juegos';
        $this->_view->renderizar('index', 'juegos');
    }
    
    public function nuevo()
    {
    	Session::accesoEstricto(array('usuario'));
       	$this->_view->genero = 'Nueva Juego';
       	$this->_view->setJs(array('nuevo'));
        
        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getTexto('genero')){
                $this->_view->_error = 'Debe introducir el genero de la juego';
                $this->_view->renderizar('nuevo', 'juegos');
                exit;
            }
            
            if(!$this->getTexto('popularidad')){
                $this->_view->_error = 'Debe introducir el popularidad de la Juego';
                $this->_view->renderizar('nuevo', 'juegos');
                exit;
            }
            
            $this->_juegos->insertarJuego(
                    $this->getPostParam('genero'),
                    $this->getPostParam('cantidad'),
                    $this->getPostParam('popularidad')
                    );
            
            $this->redireccionar('juegos');
        }       
        
        $this->_view->renderizar('nuevo', 'juegos');
    }
    
    public function editar($nombre)
    {
    	Session::acceso('especial');
        if(!$this->filtrarInt($nombre)){
            $this->redireccionar('juegos');
        }
        
        if(!$this->_juegos->getJuego($this->filtrarInt($nombre))){
            $this->redireccionar('juegos');
        }
        
        $this->_view->genero = 'Editar Juego';
        $this->_view->setJs(array('editar'));
        
        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getTexto('genero')){
                $this->_view->_error = 'Debe introducir el genero de la juego';
                $this->_view->renderizar('editar', 'juegos');
                exit;
            }
            
            if(!$this->getTexto('popularidad')){
                $this->_view->_error = 'Debe introducir el popularidad de la Juego';
                $this->_view->renderizar('editar', 'juegos');
                exit;
            }
            
            $this->_juegos->editarJuego(
                    $this->filtrarInt($nombre),
                    $this->getPostParam('genero'),
                    $this->getPostParam('cantidad'),
                    $this->getPostParam('popularidad')
                    );
            
            $this->redireccionar('juegos');
        }
        
        $this->_view->datos = $this->_juegos->getJuego($this->filtrarInt($nombre));
        $this->_view->renderizar('editar', 'juegos');
    }
    
    public function eliminar($nombre)
    {
    	Session::acceso('admin');
        if(!$this->filtrarInt($nombre)){
            $this->redireccionar('juegos');
        }
        
        if(!$this->_juegos->getJuego($this->filtrarInt($nombre))){
            $this->redireccionar('juegos');
        }
        
        $this->_juegos->eliminarJuego($this->filtrarInt($nombre));
        $this->redireccionar('juegos');
    }
}

?>
