<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	     	<title><?php if(isset($this->titulo)) echo $this->titulo; ?></title>
	     	<meta http-equiv="content-type" content="text/html; charset=UTF8" />
	     	<link href="<?php echo BASE_URL; ?>public/css/style.css" rel="stylesheet" type="text/css" />
     		<link href="<?php echo $_layoutParams['ruta_css']; ?>estilos.css" rel="stylesheet" type="text/css" /> 
       	<script src="<?php echo BASE_URL; ?>public/js/jquery.js" type="text/javascript"></script>
       	<script src="<?php echo BASE_URL; ?>public/js/jquery.validate.js" type="text/javascript"></script>

					<?php if(isset($_layoutParams['js']) && count($_layoutParams['js'])): ?>
        <?php for($i=0; $i < count($_layoutParams['js']); $i++): ?>
        
        <script src="<?php echo $_layoutParams['js'][$i] ?>" type="text/javascript"></script>
        
        <?php endfor; ?>
        <?php endif; ?>    
    </head>

    <body>
        <div id="main">
            <header>
	            <div style="float:right"><?php if(isset($_SESSION['nick'])) echo $_SESSION['nick']; ?></div>
	           <!--  <h1><?php echo APP_NAME; ?></h1> -->       
	            <nav>
	                <ul>
	                    <?php if(isset($_layoutParams['menu'])): ?>
	                    <?php for($i = 0; $i < count($_layoutParams['menu']); $i++): ?>
	                    <?php 
	                    
	                    if($item && $_layoutParams['menu'][$i]['id'] == $item ){ 
	                        $_item_style = 'current'; 
	                    } else {
	                        $_item_style = '';
	                    }
	
	                    ?>
	                    
	                    <li><a class="<?php echo $_item_style; ?>" href="<?php echo $_layoutParams['menu'][$i]['enlace']; ?>"><?php  echo $_layoutParams['menu'][$i]['titulo']; ?></a></li>
	                    
	                    <?php endfor; ?>
	                    <?php endif; ?>
	                </ul>
	                <img src="img/logo.jpg" width="459" height="44" alt="CiberGxLeon" id="logo" />
	            </nav>
            </header>          
            
            
            <article>
            <noscript><p>Para el correcto funcionamiento debe tener el soporte de javascript habilitado</p></noscript>
            <div id="error"><?php if(isset($this->_error)) echo $this->_error; ?></div>