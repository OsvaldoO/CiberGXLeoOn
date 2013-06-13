<h2 class="text-center"> Top 10 Usuarios </h2>
<div id="usuarios" >
<table id="tabla_top" class="table table-striped hide">
<thead><tr>
<th>Nick</th><th>Nombre</th><th>Puntos</th><th>Credito</th>
</tr></thead>
<tbody id="top10" ></tbody>
</table>
</div>
<script type="text/javascript" >
$.getJSON( "<?php echo base_url(); ?>usuarios/getTop", function( usuario ) {
			if (usuario){
    for(var i = 0; i < usuario.length && i < 10 ; i++){
    	$("#top10").append('<tr>');
			$("#top10").append('<td>'+ usuario[i].nick +'</td>');
			$("#top10").append('<td>'+ usuario[i].nombre +'</td>');
			$("#top10").append('<td>'+ usuario[i].puntos +'</td>');
			$("#top10").append('<td>'+ usuario[i].credito+'</td>'); 
    	$("#top10").append('</tr>');
    }
    	$("#tabla_top").after('<a class="btn-primary" href="generaPdf" >Generar PDF</a>');
    	$("#tabla_top").show();
}
else{
$("#usuarios").html('<p><strong>No hay Usuarios!</strong></p>');
}
});
</script>
