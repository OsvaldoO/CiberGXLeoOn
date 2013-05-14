<?php

class indexController extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        //$post = $this->loadModel('inicio');
        
        //$this->_view->posts = $post->getNoticias();
        
        $this->_view->titulo = 'Portada';
        $this->_view->renderizar('index', 'inicio');
    }
}

?>