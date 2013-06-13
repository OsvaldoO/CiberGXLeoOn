<div id="nuevo_logro">
<h2>Otorgar Logro</h2>
<div id="frm_nuevo" class="frm hide">
<form method="post" action="<?php APPPATH ?>nuevo">
<h6 class="error" style="color:red;"><?php if(isset($message)) echo $message."\n"; echo validation_errors(); ?></h6>
     <label> Logro obtenido del Juego</label><br />
     <select id="juego" name="juego"> 

				</select>
			  <label>Usuario Premiado</label>
     <select id="usuario" name="usuario"> 

				</select> 
    <label>Detalles  </label>   <div id="msgDet" class="hide" > Ingresa detalles de logro</div>
    <textarea id="detalle" rows="5" cols="50" name="detalle" ><?php if(isset($_POST['detalle'])) echo $_POST['detalle']; ?></textarea>
    <label>Puntos Otorgados</label>
    <input type="text" id="puntos" class="input-small" name="puntos" value="<?php if(isset($_POST['puntos'])) echo $_POST['puntos']; ?>" />
			<div id="msgPuntos" class="hide" > Ingresa un Valor numerico menor a 999</div>
    <p><input id="enviar" type="submit" class="btn-success" value="Otorgar" /></p>
</form>
</div>
</div>
<script type="text/javascript" src="<?php echo JS_URL;?>validarLogro.js" ></script>
<script type="text/javascript" >
$.ajax({ url: "<?php echo base_url(); ?>usuarios/getRol"}).done(function( rol ) {
		if(rol == 2)	{
			$.getJSON( "<?php echo base_url(); ?>juegos/getJuegos/", function( juego ) {
		 if (juego){
		 		for(var i=0 ; i< juego.length; i++)
		 		$("#juego").append('<option value="'+juego[i].nombre+'">'+juego[i].nombre+'</option> ');
		 	}
		 });
		 	$.getJSON( "<?php echo base_url(); ?>usuarios/getUsuarios/", function( usuario ) {
		 if (usuario){
		 		for(var i=0 ; i< usuario.length; i++)
		 		$("#usuario").append('<option value="'+usuario[i].nick+'">'+usuario[i].nick+'</option> ');
		 	}
		 });
			$("#frm_nuevo").show();								
			}						
			else{ $("#nuevo_logro").html('<h4>Error No tienes permisos Suficientes Para Otorgar logros</h4>'); }
			});
</script>
