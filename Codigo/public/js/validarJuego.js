var expU = /^(https?:\/\/)([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \?=.-]*)*\/?$/  ;
$(function(){
		$("#enviar").click(function(){
				var nombre = $("#nombre").val();
				var url = $("#url").val();
				
				if(nombre == "" )
							{
									$("#msgNombre").fadeIn();
									return false;					
							}
							else{
										$("#msgNombre").fadeOut();
										if(url == "" || !expU.test(url))
										{
												$("#msgUrl").fadeIn();
												return false;					
										}
									}
			});
	});