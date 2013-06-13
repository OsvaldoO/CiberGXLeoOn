<div id="nuevo_juego">
<h2>Agregar Juego</h2>
<div id="frm_nuevo" class="frm hide">
<form method="post" action="<?php APPPATH ?>nuevo">
<h6 class="error" style="color:red;"><?php if(isset($message)) echo $message."\n"; echo validation_errors(); ?></h6>
    <label>Nombre</label> 
    <input type="text" id="nombre" name="nombre" value="<?php if(isset($_POST['nombre'])) echo $_POST['nombre']; ?>" />
    <div id="msgNombre" class="hide alert alert-error" > Ingresa Nombre del Juego</div>
    <label>Tipo</label>
     <select name="genero"> 
     <option value="accion">Accion</option>
     <option value="carros">Carros</option>
     <option value="deporte">Depote</option>
     <option value="aventura">Aventura</option>
     <option value="pelea">Pelea</option>
     <option value="disparo">Disparos</option>
     </select>
    <label>Imagen</label>
    <input type="text" id="url" name="imagen" value="<?php if(isset($_POST['imagen'])) echo $_POST['imagen']; ?>" />
    <div id="msgUrl" class="hide alert alert-error" > URL de imagen Invalida</div>
    <p><input id="enviar" type="submit" class="btn-success" value="Agregar" /></p>
</form>
</div>
</div>
<script type="text/javascript" src="<?php echo JS_URL;?>validarJuego.js" ></script>	
<script type="text/javascript" >
$.ajax({ url: "<?php echo base_url(); ?>usuarios/getRol"}).done(function( rol ) {
		if(rol == 2)	{
			$("#frm_nuevo").show();								
			}						
			else{ $("#nuevo_juego").html('<h4>Error No tienes permisos Suficientes Para Agregar Juegos</h4>'); }
			});
</script>