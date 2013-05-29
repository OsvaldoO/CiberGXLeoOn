<link rel="stylesheet" href="<?php echo CSS_URL;?>table.css" type="text/css" />
<h2> Mis Logros </h2>
<?php if(isset($logros) && count($logros)) : ?>	
    <?php for($i = 0; $i < count($logros) && $i < 10 ; $i++): ?>

				<div>
				<h5><?php echo $logros[$i]->juego; ?></h5>
				<div class="detalles"><?php echo $logros[$i]->detalle; ?></div>
				<strong>Puntos Otorgados [ <?php echo $logros[$i]->puntos; ?> ]</strong>
				<div class="fecha"><?php echo $logros[$i]->fecha; ?></div> 
				</div>

    <?php endfor;?>

<?php else: ?>
<h4>No Has Obtenido Ningun Logro!</h4>
<?php endif; ?>
<?php if (isset($nick) && $rol=='admin'): ?>
<h6 class="session" style=""><?php echo anchor('logros/nuevo',"Otorgar Logro a Usuario");?></h6>
<?php endif; ?>	
