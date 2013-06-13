<!DOCTYPE html>
<html lang="en">
<head>
<title>CiberGXLeon</title>
<?php $this->load->helper('url');?>
<meta charset="utf-8">
			<script type="text/javascript" src="<?php echo JS_URL;?>jquery-1.10.0.js"></script>
<!-- 				<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="<?php echo CSS_URL;?>bootstrap.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo CSS_URL;?>bootstrap-responsive.css" type="text/css" />
		<script type="text/javascript" src="<?php echo JS_URL;?>bootstrap.js"></script>
		<script type="text/javascript" src="<?php echo JS_URL;?>myScript.js"></script>
		<link rel="stylesheet" href="<?php echo CSS_URL;?>myestilo.css" type="text/css" />
</head>
<body>
<div class="container">
<!-- header -->
	<header class="container">
		<div id="img_logo1" > <img src="<?php echo IMG_URL;?>logo_txt.png" class="img-rouned" ></div>
		<nav class="span8">
			<ul id="lista_menu" class="nav nav-pills span8">
 	 			<li ><?php echo anchor('inicio',"Inicio");?></li>
 				<li> <?php echo anchor('eventos',"Eventos");?>	</li>
				<li> <?php echo anchor('juegos',"Juegos");?>	</li>
				<li><?php echo anchor('usuarios/listar',"Puntajes");?></li>
				</ul>
				<script type="text/javascript">
					$.ajax({
  				url: "<?php echo base_url(); ?>usuarios/getRol"
					}).done(function( rol ) {
  				if(rol == 2)
  					$("#lista_menu").append('<li> <?php echo anchor("usuarios/todos","Usuarios");?> </li>');
  				else 	if(rol == 1)
  						$("#lista_menu").append('<li> <?php echo anchor("inicio/enviar","Contactanos");?></li>');
					else
						 	$("#lista_menu").append('<li> <?php echo anchor("usuarios/registro","Registrate");?></li>');
					});					
				</script>
	</nav>
	</header>
	

<!-- / header -->
<!-- content -->
	<section class="container row">
			<article id="cont" class="container span5">
				<div id="central" class="centrado offset1 span6">
							