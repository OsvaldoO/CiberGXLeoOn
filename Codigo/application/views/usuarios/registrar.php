<div id="registro">
<h2> Registro </h2>
<div id="frm_reg" class="frm text-center hide">
<form method="post" action="<?php APPPATH ?>registro">
<h6 class="error" style="color:red;"><?php if(isset($message)) echo $message."\n"; echo validation_errors(); ?></h6>
    <label>Nick</label>
    <input type="text" id ="nick" name="nick" value="<?php if(isset($_POST['nick'])) echo $_POST['nick']; ?>"/ >
    	<div id="msgNick" class="hide alert alert-error" > Ingresa Tu Nick </div>
    <label>Nombre</label>
    <input type="text" id ="nombre" name="nombre" value="<?php if(isset($_POST['nombre'])) echo $_POST['nombre']; ?>" />
    <div id="msgNombre" class="hide alert alert-error" > Ingresa Tu Nombre </div>
    <label>Email</label>
    <input type="text" id ="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" />
    <div id="msgEmail" class="hide alert alert-error" > Email No valido </div>
			<label>Password:</label>
    <input type="password" id ="pass" name="pass" value="<?php if(isset($_POST['pass'])) echo $_POST['pass']; ?>" />
    <div id="msgPass" class="hide alert alert-error" > Ingresa tu password </div>
    <label>Re-Password:</label>
    <input type="password" id ="rPass" name="repass" value="<?php if(isset($_POST['repass'])) echo $_POST['repass']; ?>" />
    <div id="msgRpass" class="hide alert alert-error" > Los campos password no coinciden </div>
    <label>Avatar:</label>
    <input type="text" id ="url" name="avatar" value="<?php if(isset($_POST['avatar'])) echo $_POST['avatar']; ?>" />
    <div id="msgUrl" class="hide alert alert-error" > URL invalida </div>
    <br /></br>
    <p><input id="enviar" type="submit" class="btn" value="Registrar" /></p>
</form>
</div>
</div>
	<script type="text/javascript" src="<?php echo JS_URL;?>validarReg.js" ></script>

<script type="text/javascript" >
$.ajax({url: "<?php echo base_url(); ?>usuarios/getRol"}).done(function( rol ) {
  	if(rol > 0){
		 	$("#registro").html('<h4 class="text-error" >Ya estas Registrado al Sitio</h4>');
		 		}
		 });
		 $("#frm_reg").show();
</script>