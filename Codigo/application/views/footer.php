</div>
		</article>
		<article class="span3">
		<div id="seccion" class="frm hide">
		<form method="post" accept-charset="utf-8" action="<?php echo base_url(); ?>login">
		<label>Usuario</label><br>
	  <input class="input-medium" type="text" id="user" name="user"><br><br>
		<label>Password</label><br>
		<input class="input-medium" type="password" id="pass" name="pass">
		<br><br>
		<button class="btn btn-primary" type="submit">Iniciar Secion</button>
		</form></div>
 </article>	
 		<script type="text/javascript" >
		$.getJSON( "<?php echo base_url(); ?>usuarios/seccion", function( usuario ) {
					if (usuario){
					$("#seccion").html('<div id="status" style=" background-color: black" >'); 
					$("#seccion").append('<h3>'+ usuario['user'] +'</h3>');
					$("#seccion").append('<img class="img-rounded" src="'+ usuario['avatar'] +'" alt="NO Imagen"/>');
					$("#seccion").append('<div class="row muted"><strong><div class="span1 ">'+ usuario['credito'] +' $</div><div class="text-right ">'+ usuario['puntos'] +' Ps</div></strong>	</div>');
					$("#seccion").append('<ul class="unstyled text-info text-center"><li>'+ usuario['nombre'] +'</li><li>'+ usuario['email'] +'</li></ul>');
					$("#seccion").append('<h4 class=" text-success"><?php echo anchor("usuarios/index","Mi Perfil");?></h4>');
					$("#seccion").append('<h4 class=" text-success"><?php echo anchor("eventos/ver","Mis Eventos");?></h4>');
					$("#seccion").append('<h4 class=" text-success"><?php echo anchor("logros/index","Mis Logros");?></h4>');
					$("#seccion").append('<h4 class=" text-error"><?php echo anchor("login/destroy","Cerrar Seccion");?></h4></div>');
					}	
			});
			$("#seccion").show();	
</script>
	</section>
<!-- / content -->
<!-- footer -->
<!-- footer -->
	<footer>
			<article class="">
				<ul class="icons">
					<li><a href="https://www.facebook.com/OsvaldOoLeOon"><img src="<?php echo IMG_URL;?>icon1.jpg" alt="">OsvaldoO LeoOn</a></li>
				</ul>
			</article>
	</footer>
<!-- / footer -->
</div>
</body>
</html>
