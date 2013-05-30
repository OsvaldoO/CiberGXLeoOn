<?php if (isset($nick) ): ?>
<div class="form">
<form method="post" action="<?php APPPATH ?>cambiarPass">
<h6 class="error" style="color:red;"><?php if(isset($message)) echo $message."\n"; echo validation_errors(); ?></h6>			
		<p>Password Actual<br />
    <input type="password" name="old" value="<?php if(isset($_POST['old'])) echo $_POST['old']; ?>" /></p>
    			
			<p>Password:<br />
    <input type="password" name="pass" value="<?php if(isset($_POST['pass'])) echo $_POST['pass']; ?>" /></p>    
    
    <p>Re-Password:<br />
    <input type="password" name="repass" value="<?php if(isset($_POST['repass'])) echo $_POST['repass']; ?>" /></p>
    
    <p><input type="submit" class="button" value="Registrar" /></p>
</form>
</div>
<?php else: ?>
	<h4>No has iniciado Seccion</h4>
<?php endif; ?>			