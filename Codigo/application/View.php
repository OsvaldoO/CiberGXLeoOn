<?php

class View
{
    private $_controlador;
    private $_js;
    
    public function __construct(Request $peticion) {
        $this->_controlador = $peticion->getControlador();
         $this->_js = array();
    }
    
    /*vista = nombre de vista*/
    public function renderizar($vista, $item = false) //Hace las llamadas a las vistas
    {
        $menu = array(
            array(
                'id' => 'inicio',
                'titulo' => 'Inicio',
                'enlace' => BASE_URL
                ),
            
            array(
                'id' => 'noticias',
                'titulo' => 'Noticias',
                'enlace' => BASE_URL . 'noticias'
                ), 
                
            array(
                'id' => 'eventos',
                'titulo' => 'Eventos',
                'enlace' => BASE_URL . 'eventos'
                ),
                
            array(
                'id' => 'logros',
                'titulo' => 'Logros',
                'enlace' => BASE_URL . 'logros'
                ),
                                     
            array(
                'id' => 'juegos',
                'titulo' => 'juegos',
                'enlace' => BASE_URL . 'juegos'
                ),
                
            array(
                'id' => 'usuarios',
                'titulo' => 'Usuarios',
                'enlace' => BASE_URL . 'usuarios'
                )
        );

			if(Session::get('autenticado')){
            $menu[] = array(
                'id' => 'login',
                'titulo' => 'Cerrar Sesion',
                'enlace' => BASE_URL . 'login/cerrar'
                );
        }else{
            $menu[] = array(
                'id' => 'login',
                'titulo' => 'Iniciar Sesion',
                'enlace' => BASE_URL . 'login'
                );
        }        
        
        $js = array();
        
        if(count($this->_js)){
            $js = $this->_js;
        }
            
        $_layoutParams = array(
            'ruta_css' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/css/',
            'ruta_img' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/img/',
            'ruta_js' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/js/',
            'menu' => $menu,
            'js' => $js
        );
        
        $rutaView = ROOT . 'views' . DS . $this->_controlador . DS . $vista . '.phtml';
        if(is_readable($rutaView)){
            include_once ROOT . 'views'. DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'header.php';
            include_once $rutaView;
            include_once ROOT . 'views'. DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'footer.php';
        } 
        else {
            throw new Exception('Error de vista');
        }
    }

public function setJs(array $js)
    {
        if(is_array($js) && count($js)){
            for($i=0; $i < count($js); $i++){
                $this->_js[] = BASE_URL . 'views/' . $this->_controlador . '/js/' . $js[$i] . '.js';
            }
        } else {
            throw new Exception('Error de js');
        }
    }
}
?>