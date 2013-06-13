<div id="perfil">
<h2 id="user" ></h2>
<div class=" hero-unit" >
<img id="pimg" class="img-rounded" alt=""/>
<dl class="dl-horizontal">
<dt>Pribilegio</dt> <dd id="prol" ></dd>
<dt>Credito </dt> <dd id="pcre"> </dd>
<dt>Puntos </dt><dd id="ppun"></dd>
<dt>Nombre </dt> <dd id="pnom"></dd>
<dt>Email</dt> <dd id="pema"></dd>
</dl> </div>
<a class="btn-primary" href="editar" >Editar</a>
</div>

<script type="text/javascript" >
$.ajax({url: "<?php echo base_url(); ?>usuarios/getRol"}).done(function( rol ) {
if(rol > 0){
$.getJSON( "<?php echo base_url(); ?>usuarios/seccion", function( usuario ) {
		if (usuario){ 
		$("#user").html(usuario['user']);
		$("#pimg").attr("src",usuario['avatar']);
		$("#prol").html(usuario['rol']);
		$("#pcre").html(usuario['credito']);
		$("#ppun").html(usuario['puntos']);
		$("#pnom").html(usuario['nombre']);
		$("#pema").html(usuario['email']);
	}
});
}
else{
	$("#perfil").html('<h4 class="text-error" >Error No Has iniciado Seccion</h4>');
}});
</script>


			
