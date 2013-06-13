
var expU = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \?=.-]*)*\/?$/  ;

$(function(){
		$("#enviar").click(function(){
				var fecha = $("#fecha").val();
				var detalle = $("#detalle").val();
				var url = $("#url").val();
				
				if(detalle == ""){
						$("#msgDet").fadeIn();
						return false;					
					}
					else{
							$("#msgDet").fadeOut();
							if(fecha == "" )
							{
									$("#msgFecha").fadeIn();
									return false;					
							}
							else{
									$("#msgFecha").fadeOut();
											if(url == "" || !expU.test(url))
											{
													$("#msgUrl").fadeIn();
													return false;					
											}
										}
									}								
			});
	});