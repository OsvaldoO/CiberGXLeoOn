<link rel="stylesheet" href="<?php echo CSS_URL;?>style.css" type="text/css" />		
				<div class="pad_left1 pad_bot1">
				<?php if(isset($eventos) && count($eventos)) : ?>
				<h2>Mis Eventos</h2>
				<?php for($i = 0; $i < count($eventos) && $i < 4 ; $i++): ?>
					<div class="wrapper">
						<div class="img_r img_1"><img src="<?php echo $eventos[$i]->img; ?>" alt=""></div>
						<div class="inline"><h6><?php echo $eventos[$i]->juego; ?></h6>
						<div class='detalles'><?php echo $eventos[$i]->detalles; ?><br /></div>
						<div class='fecha'><?php echo $eventos[$i]->fecha; ?></div>							
						</div>
						<br /><br />	<br />	<br />
					</div>
				 <?php endfor;?>
				 <?php else: ?>
					<h4>No Estas Inscrito a Ningun Evento!</h4>
					<?php endif; ?>