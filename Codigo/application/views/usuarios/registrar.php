<div class="form">
<form method="post" action="<?php APPPATH ?>registro">
<h6 class="error" style="color:red;"><?php echo validation_errors(); ?></h6>
    <p>Nick:<br />
    <input type="texto" name="nick" value="<?php if(isset($_POST['nick'])) echo $_POST['nick']; ?>" /></p>
    
    <p>Nombre:<br />
    <input type="texto" name="nombre" value="<?php if(isset($_POST['nombre'])) echo $_POST['nombre']; ?>" /></p>
    
    <p>Email:<br />
    <input type="texto" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" /></p>
    
			<p>Password:<br />
    <input type="password" name="pass" value="<?php if(isset($_POST['pass'])) echo $_POST['pass']; ?>" /></p>
    
    <p>Avatar:<br />
    <input type="texto" name="avatar" value="<?php if(isset($_POST['avatar'])) echo $_POST['avatar']; ?>" /></p>
    
    <p><input type="submit" class="button" value="Registrar" /></p>
</form>
</div>