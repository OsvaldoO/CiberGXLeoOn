<?php

/**
 * @package mvc
 * @subpackage controller
 * @author
 */

//La clase controlador
include('Model/SesionMdl.php');

class StdCtr{

	public $modelo;

	//Cuando se crea el controlador crea el modelo de usuario
	function __construct(){
		
	}

function ejecutar(){
//iniciando o cargando una sesion, siempre en cuando inicie un controlador
//session_start();

	if (isset($_REQUEST['accion'])){
		switch ($_REQUEST['accion']){
			case 'login':
				//existen los valores 
				if( isset($_REQUEST['user']) and isset($_REQUEST['pass'])){
					//Limpiar Variables 
		 			/*	$user = limpiarVariable ($_REQUEST['user']);
							$pass = limpiarVariable ($_REQUEST['pass']);*/
							$usuario = ($_REQUEST['user']);
							$password = ($_REQUEST['pass']);
					if($usuario === 'root')
					{
						if($password == 'ciberGx') {
						$_SESSION['user'] = 'Administrador';
						$_SESSION['priv'] = 0;
							print '<script type="text/javascript">'; 
							print 'alert("Bienvenido Administrador :D")'; 
							print '</script>';
						//	header('Location: index.php');
						}
						else {
							print '<script type="text/javascript">'; 
							print '</script>';
							//header('Location: index.php');
							print 'alert("Contraseña Incorrecta")'; 
							}
					}
					else {
						require ('Model/bd_info.inc');
						$conexion = new DataB( $host, $user, $pass, $bd );
						$this->modelo = new SesionMdl($conexion);
						if(!$conexion->conecta())
							die('No se ha podido conectar a la Base de Datos');
						//Ejecutar login
						$res= $this->modelo->login($usuario,$password);
						if($res){
							$usuario = $res;
							if(isset($usuario[0]['codigo']))
							{
								$_SESSION['user'] = $usuario[0]['nombre'];
								$_SESSION['priv'] = 1;
								print '<script type="text/javascript">'; 
								print 'alert("Empleado Logeado Correctamente")'; 
								print '</script>';
							//	header('Location: index.php');
							}
							else 
							{
								$_SESSION['user'] = $usuario[0]['nick'];
								$_SESSION['priv'] = 2;
								print '<script type="text/javascript">'; 
								print 'alert("Cliente Logeado Correctamente")'; 
								print '</script>';
							//	header('Location: index.php');
							}
						}
					else {
					print '<script type="text/javascript">'; 
					print 'alert("No se encontro el usuario en la Base de Datos")'; 
					print '</script>';
					}  
				}
			}
			else {
					print '<script type="text/javascript">'; 
					print 'alert("Ingresa Datos para poder Iniciar Secion")'; 
					print '</script>';
					//header('Location: index.php');
					}
			break;
			case 'logout':
				if(isset($_SESSION['user'])){
				//limpiamos sesion
				session_unset();
				//Drestruyo la Sesion
				session_destroy();
				//Destruyo la cookie
				//setcookie(session_name(),'',time()-3600 );// crea coki con el nombre de mi seccion, no escribirle nada y darle un tiempo de vida de -1 seg
					print '<script type="text/javascript">'; 
					print 'alert("Se Cerro Secion Correctamente")'; 
					print '</script>';
					//header('Location: index.php');
				//Redireccionar a paguina principal 
				}
			}
		// ya esta logeado
		}
		else echo 'Ingresa accion=login';
		//header('Location: index.php');
	}
}
?>
