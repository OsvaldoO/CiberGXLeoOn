<h2 class="text-center"> Usuarios </h2>
<div id="usuarios" >
<table id="tabla_usr" class="table table-hover hide">
<thead><tr>
<th>Nick</th><th>Nombre</th><th>Puntos</th><th>Credito</th>
</tr></thead>
<tbody id="user" ></tbody>
</table>
<div class="pagination"></div>
</div>
<script type="text/javascript" >
pages(1);
function pages( pag ){
pag = (pag-1) * 10;
$.getJSON( "<?php echo base_url(); ?>usuarios/getUsuarios", function( usuario ) {
		 if (usuario){		
		 $("#user").html('');
    for(var i = pag; i < usuario.length && i < pag+10 ; i++){
    	$("#user").append('<tr>');
			$("#user").append('<td>'+ usuario[i].nick +'</td>');
			$("#user").append('<td>'+ usuario[i].nombre +'</td>');
			$("#user").append('<td>'+ usuario[i].puntos +'</td>');
			$("#user").append('<td>'+ usuario[i].credito+'</td>'); 
    	$("#user").append('</tr>');
    }
    	$(".pagination").html('<ul id="paginas"></ul>');
    	for(var i = 0; i <= usuario.length/10 ;i++){
    		 			$("#paginas").append('<li><a onclick="pages('+ parseInt(i+1) +')">' + parseInt(i+1) + '</a></li> ');
 			}
 			$("#tabla_usr").show();
}
else{
	$("#usuarios").html('<p><strong>No hay Usuarios!</strong></p>');
}
});
}
</script>
