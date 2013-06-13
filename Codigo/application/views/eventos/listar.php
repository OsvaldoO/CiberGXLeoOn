<div id="eventos">
<h2> Eventos </h2>
</div>
<script type="text/javascript" >
$.ajax({ url: "<?php echo base_url(); ?>usuarios/getRol"}).done(function( rol ) {
			$.getJSON( "<?php echo base_url(); ?>eventos/getEventos", function( evento ) {
			if (evento){	
				for( var i = 0; i < evento.length && i < 5 ; i++) {
				$("#eventos").append('<div id="evento'+i+'" class="row"> <img class="img-rounded span2"src="'+ evento[i].img +'"> </div>');
				$("#evento"+i).append('<div class="span4"><h6>'+ evento[i].juego +'</h6><div>'+ evento[i].detalles +'<br /></div><div class="text-right text-info">'+ evento[i].fecha +'</div></div></div>');
				if ( rol > 0 ){ 
			//	$("#eventos").append('$dir= "eventos/inscribir/".$eventos[$i]->numero;?>
				$("#evento"+i+" > div").append('<h6 class="btn"><?php echo anchor("eventos/inscribir/'+ evento[i].numero +'","Inscribir");?></h6>');
				}		
				$("#eventos").append('<br /><br />'); 					
    		}
			}		
			else {
				$("#eventos").html('<h4>Por el Momento no hay eventos</h4>');
			}
			if( rol == 2 )
				$("#eventos").append('<h6 class="btn-primary"><?php echo anchor("eventos/nuevo","Publicar Nuevo Evento");?></h6>')
			});
});
</script>