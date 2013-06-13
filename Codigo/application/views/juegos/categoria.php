			<div id="categorias" class="text-center">
				<h2 >Galeria de Juegos</h2> 		
					<div class="row">
						<div class="span3">
							<a href="juegos/listar/carros/1" ><img class="img-rounded"src="<?php echo IMG_URL;?>race.jpg" alt=""></a>
							<h4>Carros</h4>
					</div>
						<div class="span3">
							<a href="juegos/listar/aventura/1"><img class="img-rounded" src="<?php echo IMG_URL;?>adventurs.jpg" alt=""></a>
							<h4>Aventura</h4>
							</div>
					</div>
					<div class="row">
						<div class="span3" >
							<a href="juegos/listar/disparo/1" ><img class="img-rounded " src="<?php echo IMG_URL;?>shot.jpg" alt=""></a>
							<h4>Disparos</h2>
						</div>
						<div class="span3">
							<a href="juegos/listar/pelea/1"  ><img class="img-rounded " src="<?php echo IMG_URL;?>fight.jpg" alt=""></a>
							<h4>Pelea</h4>
						</div>
					</div>
					<div class="row">
						<div class="span3">
							<a href="juegos/listar/deporte/1"><img class="img-rounded " src="<?php echo IMG_URL;?>sport.jpg" alt=""></a>
							<h4>Deporte</h4>
						</div>
						<div class="span3">
							<a href="juegos/listar/accion/1" ><img class="img-rounded " src="<?php echo IMG_URL;?>action.jpg" alt=""></a>
							<h4>Accion</h4>
						</div>
					</div>
					</div>
					<script type="text/javascript" >
						$.ajax({ url: "<?php echo base_url(); ?>usuarios/getRol"}).done(function( rol ) {
								if(rol == 2)	{
										$("#categorias").after('<h6 class="btn"><?php echo anchor('juegos/nuevo',"Agregar Nuevo Juegoo");?></h6>');								
									}						
							});
					</script>