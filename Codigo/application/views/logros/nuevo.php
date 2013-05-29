<div class="form">
<form method="post" action="<?php APPPATH ?>nuevo">
    <p>Logro obtenido del Juego<br />
     <select name="juego"> 
 				<?php  for( $i=0 ; $i < count($juegos); $i++){ ?> 
 					<option value="<?php echo $juegos[$i]->nombre ?>"><?php echo $juegos[$i]->nombre ?></option> 
  				<?php } ?> 
				</select>
				<p>Usuario Premiado<br />
     <select name="usuario"> 
 				<?php  for( $i=0 ; $i < count($usuarios); $i++){ ?> 
 					<option value="<?php echo $usuarios[$i]->nick ?>"><?php echo $usuarios[$i]->nick ?></option> 
  				<?php } ?> 
				</select>
    <p>Detalles<br />
    <textarea rows="5" cols="50" name="detalle" ><?php if(isset($_POST['detalle'])) echo $_POST['detalle']; ?></textarea></p>
    
    <p>Puntos Otorgados:<br />
    <input type="texto" name="puntos" value="<?php if(isset($_POST['puntos'])) echo $_SESSION['puntos']; ?>" /></p>

    <p><input type="submit" class="button" value="Otorgar" /></p>
</form>
</div>


