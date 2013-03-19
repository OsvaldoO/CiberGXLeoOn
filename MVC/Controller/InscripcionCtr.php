<?php

/**
 * @package mvc
 * @subpackage controller
 * @author
 */

//Este controlador require tener acceso al modelo
include_once('Model/InscripcionBss.php');

//La clase controlador

class InscripcionCtr{

	public $modelo;

	//Cuando se crea el controlador crea el modelo de usuario
	function __construct(){
		$this -> modelo = new InscripcionBss();
	}

	function ejecutar(){
		//Si no tengo parametros, listo los usuarios
		if( !isset($_REQUEST['accion']) ){
			//Obtengo los datos que se van a listar
			echo 'Ingrese una accion, Inscripciones no esta implementado para listar (Revisar Diagrama de Clases)';
			//Muestro los datos
			}
		else {
			switch($_REQUEST['accion']) {
					case 'inscribir':
					if( isset($_REQUEST['num_evento']) and isset($_REQUEST['nick_cliente']))
					{
						date_default_timezone_set('UTC');
						$inscripcion = $this->modelo->inscribir( $_REQUEST['num_evento'], $_REQUEST['nick_cliente'], date("Y-m-d") );
						include('View/inscritoView.php');
					}
					else { include('View/ErrorView.php'); }
					break;
					case 'consultar':
					if( isset($_REQUEST['num_evento']))
					{
						$inscripciones = $this->modelo->consultar($_REQUEST['num_evento']);
						if($inscripciones)
							include('View/inscripcionView.php');
						else echo 'Ningun cliente inscrito al evento';
					}
					else {
						include('View/ErrorView.php');					
					}
					case 'verMisInscripciones':
					if( isset($_REQUEST['nick_cliente']))
					{
						$inscripciones = $this->modelo->verMisInscripciones($_REQUEST['nick_cliente']);
						if($inscripciones)
							include('View/miInscripcionView.php');
						else echo 'No Inscrito a Ningun evento';
					}
					else {
						include('View/ErrorView.php');					
					}
					case 'desinscribir':
					if( isset($_REQUEST['num_evento']) and isset($_REQUEST['nick_cliente']))
					{
						$cliente = $this->modelo->desinscribir($_REQUEST['num_evento'],$_REQUEST['nick_cliente']);
						echo 'Borrado satisfactoriamente';
					}
					else {
						include('View/ErrorView.php');					
					}
					break;
					default: echo 'Accion no Implementada';
								
				}		
		}	

	}
}

?>