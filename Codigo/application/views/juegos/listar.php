<div id="juegos" class="hide">

</div>
<script type="text/javascript" >
pages(1);
function pages( pag ){
pag = (pag-1) * 3;
$.getJSON( "<?php echo base_url(); ?>juegos/getJuegos/<?php echo $categoria ?>", function( juego ) {
		 if (juego){
		 $("#juegos").html('<h2>Juegos de '+ juego[0].genero +'	<h2>');
    for(var i = pag; i < juego.length && i < pag+3 ; i++){
    	$("#juegos").append('<div id="juego'+i+'" class="row"></div><br /><br />');
			$('#juego'+i).append('<img class="img-rounded span2" src="'+juego[i].imagen+'" alt="">');
			$('#juego'+i).append('<div class="span4"><h5>'+juego[i].nombre+'</h5><strong>Popularidad </strong><div class="progress progress-success"><div class="bar" style="width:'+juego[i].popularidad*10+'%"></div></div></div>');
    }
    $("#juegos").append('<div class="pagination"></div>');
    	$(".pagination").html('<ul id="paginas"></ul>');
    	for(var i = 0; i < juego.length/3 ;i++){
    	$("#paginas").append('<li><a onclick="pages('+ parseInt(i+1) +')">' + parseInt(i+1) + '</a></li> ');
 			}
 			$("#juegos").show();
}
else{
	$("#juegos").html('<p><strong>No hay Usuarios!</strong></p>');
}
});
}
</script>