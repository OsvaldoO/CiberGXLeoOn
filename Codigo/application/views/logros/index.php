<div id="logros">
<h2> Logros </h2>
</div>
<script type="text/javascript" >
$.ajax({ url: "<?php echo base_url(); ?>usuarios/getRol"}).done(function( rol ) {
  		if(rol > 0){
			$.getJSON( "<?php echo base_url(); ?>logros/getLogros", function( logro ) {
			if (logro){	
				for( var i = 0; i < logro.length && i < 10 ; i++) {
				$("#logros").append('<div><h5>'+ logro[i].juego +'</h5>');
				$("#logros").append('<div class="detalles">'+ logro[i].detalle +'</div>');
				$("#logros").append('<strong>Puntos Otorgados [ '+ logro[i].puntos +' ]</strong>');
				$("#logros").append('<div class="fecha">'+ logro[i].fecha +'</div> </div>');
    		}
			}		
			else {
				$("#logros").html('<h4>No Has Obtenido Ningun Logro!</h4>');
			}
			if (rol == 2)
					$("#logros").append('<h6 class="btn" style=""><?php echo anchor("logros/nuevo","Otorgar Logro a Usuario");?></h6>')
			});
	}
	 	else 
				$("#logros").html('<h4>No Has Iniciado Seccion!</h4>');
});
</script>