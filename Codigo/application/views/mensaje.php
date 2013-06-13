<?php if (isset($nick) ): ?>
<h2 class="text-center">Enviar Mensaje</h2>
<div class="frm">
<form method="post" action="<?php APPPATH ?>enviar">
    <label>Escribe tu Mensaje</label>
    <textarea rows="5" cols="50" name="mensaje" > </textarea>

    <p><input type="submit" class="btn-success" value="enviar" /></p>
</form>
</div>
<?php else: ?>
	<h4>Error No Has iniciado Secion</h4>
<?php endif; ?>	

