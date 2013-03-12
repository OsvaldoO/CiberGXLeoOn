<?php
//Cargar clase Cliente

/*include('Controller/StdCtr.php');
$controlador = new StdCtr();*/
include('Controller/JuegoCtr.php');
$controlador = new JuegoCtr();
$controlador -> ejecutar();

?>
