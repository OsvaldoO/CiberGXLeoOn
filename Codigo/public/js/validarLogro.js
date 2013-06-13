function IsNumeric(input){
    var RE = /^-{0,1}\d*\.{0,1}\d+$/;
    return (RE.test(input));
}


$(function(){
		$("#enviar").click(function(){
				var detalle = $("#detalle").val();
				var puntos = $("#puntos").val();
				
				if(detalle == "" )
							{
									$("#msgDet").fadeIn();
									return false;					
							}
							else{
										$("#msgDet").fadeOut();
										if(puntos == "" || !IsNumeric(puntos) || puntos.length > 3 )
										{
												$("#msgPuntos").fadeIn();
												return false;					
										}
									}
			});
	});