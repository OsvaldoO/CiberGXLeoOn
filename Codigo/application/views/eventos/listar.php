<link rel="stylesheet" href="<?php echo CSS_URL;?>style.css" type="text/css" />		
				<div class="pad_left1 pad_bot1">
				<?php if(isset($eventos) && count($eventos)) : ?>
				<h2>Eventos</h2>
				<?php for($i = 0; $i < count($eventos) && $i < 4 ; $i++): ?>
					<div class="wrapper">
						<div class="img_r img_1"><img src="<?php echo $eventos[$i]->img; ?>" alt=""></div>
						<div class="inline"><h6><?php echo $eventos[$i]->juego; ?></h6>
						<div class='detalles'><?php echo $eventos[$i]->detalles; ?><br /></div>
						<div class='fecha'><?php echo $eventos[$i]->fecha; ?></div>
						<?php if (isset($nick)): 
						$dir= "eventos/inscribir/".$eventos[$i]->numero;?>
						<h6 class="session"><?php echo anchor($dir,"Inscribir");?></h6>
						<?php endif; ?>										
						</div>
						<br /><br />	<br />	<br />
					</div>
				 <?php endfor;?>
				 <?php else: ?>
					<h4>No hay Eventos!</h4>
					<?php endif; ?>
					<?php if (isset($nick) && $rol=='admin'): ?>
					<h6 class="session"><?php echo anchor('eventos/nuevo',"Publicar Nuevo Evento");?></h6>
					<?php endif; ?>										