<div class="form">
<form method="post" action="<?php APPPATH ?>editar">
<h6 class="error" style="color:red;"><?php echo validation_errors(); ?></h6>
    <input type="hidden" name="nick" value="<?php echo $nick ?>" /></p>
    <p>Nombre:<br />
    <input type="texto" name="nombre" value="<?php echo $nombre ?>" /></p>
    
    <p>Email:<br />
    <input type="texto" name="email" value="<?php echo $email ?>" /></p>
    
			<p>Password:<br />
    <input type="password" name="pass" value="<?php echo $pass ?>" /></p>
    
    <p>Avatar:<br />
    <input type="texto" name="avatar" value="<?php echo $avatar ?>" /></p>
    
    <p><input type="submit" class="button" value="Editar" /></p>
</form>
</div>