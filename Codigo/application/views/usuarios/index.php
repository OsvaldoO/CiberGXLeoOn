<link rel="stylesheet" href="<?php echo CSS_URL;?>perfil.css" type="text/css" />
<section>
<h2><?php echo $nick; ?></h2>
<?php $this->load->helper('url');?>
<div id="perfil">
			<div class="img_r img_2">
			<img src="<?php echo $avatar; ?> " alt="<?php echo $nick; ?>"/>
			</div>
			
			<div class="info">
			<div>Nivel de Pribilegios: <?php echo $rol; ?></div>
			<div>Credito Acumulado: <?php echo $credito; ?> $</div>
			<div>Puntos Ganados: <?php echo $puntos; ?> Puntos</div>
				<div class="user_info">
				<ul>
				<li>Nombre Completo: <?php echo $nombre; ?></li>
				<li>Email: <?php echo $email; ?></li>
				</ul>
				</div>
    </div>

 </div> 
</section>
