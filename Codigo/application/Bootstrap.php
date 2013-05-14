<?php

class Bootstrap
{
    public static function run(Request $peticion) //Hace la llamada a controladores y metodos
    {
        $controller = $peticion->getControlador() . 'Controller';
        $rutaControlador = ROOT . 'controllers' . DS . $controller . '.php';
        $metodo = $peticion->getMetodo();
        $args = $peticion->getArgs();
        
        if(is_readable($rutaControlador)){ //Si existe el archivo y es valido
            require_once $rutaControlador;
            $controller = new $controller;
            
            if(is_callable(array($controller, $metodo))){
                $metodo = $peticion->getMetodo();
            }
            else{
                $metodo = 'index';
            }
            
            if(isset($args)){
                call_user_func_array(array($controller, $metodo), $args); //Envia,os nombre claase, metodo y los parametros 
            }
            else{
                call_user_func(array($controller, $metodo)); //llama la clase del controlador y el metodo solicitado
            }
            
        } else {
            throw new Exception('no encontrado');
        }
    }
}

?>