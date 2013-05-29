<link rel="stylesheet" href="<?php echo CSS_URL;?>table.css" type="text/css" />
<?php if(isset($juegos) && count($juegos)) : ?>
<h2> Juegos de <?php echo $juegos[0]->genero; ?> </h2>
<?php for($i = 0; $i < count($juegos) && $i < 4 ; $i++): ?>
	<div class="wrapper">
		<div class="img_r img_1"><img src="<?php echo $juegos[$i]->imagen; ?>" alt=""></div>
		<div class="inline"><h5><?php echo $juegos[$i]->nombre; ?></h5>
		<div class='detalles'><?php echo $juegos[$i]->genero; ?><br /></div>
		<strong>Popularidad [ <?php echo $juegos[$i]->popularidad; ?> ]</strong>
		</div>
	</div><br /><br />
 <?php endfor;?>
 <?php else: ?>
	<h2>No hay Juegos de la Categoria !</h2>
	<?php endif; ?>