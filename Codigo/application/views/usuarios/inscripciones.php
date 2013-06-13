<div id="eventos">
<h2> Eventos </h2>
</div>
<script type="text/javascript" >
			$.getJSON( "<?php echo base_url(); ?>eventos/getMisEventos", function( evento ) {
			if (evento){	
				for( var i = 0; i < evento.length && i < 5 ; i++) {
				$("#eventos").append('<div id="evento'+i+'" class="row"> <img class="img-rounded span2"src="'+ evento[i].img +'"> </div>');
				$("#evento"+i).append('<div class="span4"><h6>'+ evento[i].juego +'</h6><div>'+ evento[i].detalles +'<br /></div><div class="text-right text-info">'+ evento[i].fecha +'</div></div></div>');
			//	$("#eventos").append('$dir= "eventos/inscribir/".$eventos[$i]->numero;?>
				$("#evento"+i+" > div").append('<h6 class="btn"><?php echo anchor("eventos/cancelar/'+ evento[i].numero +'","Cancelar");?></h6>');
				}		
				$("#eventos").append('<br /><br />'); 					
			}		
			else {
				$("#eventos").html('<h4>No estas inscrito a nungun Evento</h4>');
			}
			});
</script>	
