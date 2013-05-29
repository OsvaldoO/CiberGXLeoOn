<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->helper('url');?>
<title>CiberGXLeon</title>
<meta charset="utf-8">
<link rel="stylesheet" href="<?php echo CSS_URL;?>style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo CSS_URL;?>reset.css" type="text/css" media="all">
<link rel="stylesheet" href="<?php echo CSS_URL;?>layout.css" type="text/css" media="all">
<script type="text/javascript" src="<?php echo JS_URL;?>jquery-1.4.2.js" ></script>
<script type="text/javascript" src="<?php echo JS_URL;?>jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="<?php echo JS_URL;?>cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo JS_URL;?>cufon-replace.js"></script>
<script type="text/javascript" src="<?php echo JS_URL;?>CabinSketch_700.font.js"></script>
<script type="text/javascript" src="<?php echo JS_URL;?>EB_Garamond_400.font.js"></script>
<!-- [if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<style type="text/css">
.bg {behavior:url(js/PIE.htc)}
</style>
<![endif]-->
<!-- [if lt IE 7]>
<div style='clear:both;text-align:center;position:relative'>
	<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0" alt="" /></a>
</div>
<![endif]-->
</head>
<body>
<div class="main">
<!-- header -->
	<header>
		<div class="wrapper">
			<nav>
				<ul id="menu">
					<li id="menu_active"> <?php echo anchor('inicio',"Inicio");?></li>
					<li> <?php echo anchor('eventos',"Eventos");?> </li>
					<li> <?php echo anchor('juegos',"Juegos");?></li>
					<li> <?php echo anchor('usuarios/listar',"Puntajes");?> </li>
					<?php if (isset($nick)): ?>
								<li> <?php echo anchor('usuarios/index',"Perfil");?></li>
					<?php else:  ?>
								<li> <?php echo anchor('usuarios/registro',"Registrate");?></li>
					<?php endif; ?>
				</ul>
			</nav>
		</div>
		<h1><a href="<?php echo base_url();?>" id="logo">CiberGXLeon</a></h1>
	</header><div class="ic">More Website Templates at TemplateMonster.com!</div>
<!-- / header -->
<!-- content -->
	<section id="content">
		<div class="wrapper" id="cols">
			<article class="col1">