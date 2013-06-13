<div id="pass">
<h2>Cambiar Password</h2>
<div id="frm_pass" class="frm hide">
<form method="post" action="<?php APPPATH ?>cambiarPass">
<h6 class="txt-error" style="color:red;"><?php if(isset($message)) echo $message."\n"; echo validation_errors(); ?></h6>			
		<label>Password Actual<label />
    <input type="password" name="old" /></p>
    			
			<label>Password:<label />
    <input type="password" name="pass" /></p>    
    
    <label>Re-Password:<label />
    <input type="password" name="repass" /></p>
    
    <p><input type="submit" class="btn-success" value="Actualizar Password" /></p>
</form>
</div>
</div>		
<script type="text/javascript" >
$.ajax({url: "<?php echo base_url(); ?>usuarios/getRol"}).done(function( rol ) {
  				if(rol > 0){
						$("#frm_pass").show();
		 		}
		 		else 		$("#pass").html('<h4>No has iniciado Seccion</h4>');
		 });
</script>		