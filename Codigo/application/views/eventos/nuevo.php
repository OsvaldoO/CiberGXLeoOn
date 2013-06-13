<div id="nuevo_evento">
<h2 class="text-center">Nuevo Evento</h2>
<div id="frm_nuevo" class="frm hide">
<form method="post" action="<?php APPPATH ?>nuevo">
<h6 class="error" style="color:red;"><?php if(isset($message)) echo $message."\n"; echo validation_errors(); ?></h6>
    <label>Juego</label> 
     <select id="juego" name="juego"> 

				</select> 
    <label>Detalles  </label>   <div id="msgDet" class="alert alert-error hide" > Ingresa detalles de logro</div>
    <textarea id="detalle" rows="5" cols="50" name="detalles" ></textarea>
     <label>Tipo</label> 
     <select name="tipo"> 
     <option value="Torneo">Torneo</option>
     <option value="Desafio">Desafio</option>
     <option value="Competencia">Competencia</option>
     <option value="Reto">Reto</option>
     </select>
			<label>Fecha</label>
    <input type="date" id="fecha" name="fecha" value="<?php if(isset($_POST['fecha'])) echo $_POST['fecha']; ?>" />
    <div id="msgFecha" class="hide alert alert-error" > Ingresa una fecha valida</div>
    <label>Imagen</label>
    <input type="text" id="url" name="img" value="http://3.bp.blogspot.com/-yQpjEhqNqW0/UZsYH9P4G_I/AAAAAAAAM6g/-dg7lJARc-w/s640/timthumb.jpg" />
    <div id="msgUrl" class="hide alert alert-error" > URL Invalida</div>
    
    <p><input type="submit" id="enviar" class="btn-success" value="Publicar" /></p>
</form>
</div>
</div>
<script type="text/javascript" src="<?php echo JS_URL;?>validarEvento.js" ></script>
<script type="text/javascript" >
$.ajax({ url: "<?php echo base_url(); ?>usuarios/getRol"}).done(function( rol ) {
		if(rol == 2)	{
			$.getJSON( "<?php echo base_url(); ?>juegos/getJuegos/", function( juego ) {
		 if (juego){
		 		for(var i=0 ; i< juego.length; i++)
		 		$("#juego").append('<option value="'+juego[i].nombre+'">'+juego[i].nombre+'</option> ');
		 	}
		 });
			$("#frm_nuevo").show();								
			}						
			else{ $("#nuevo_evento").html('<h4>Error No tienes permisos Suficientes Para Creear Eventos</h4>'); }
			});
</script>
