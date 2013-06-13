
var expE = /^[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,3})$/ ;
var expU = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \?=.-]*)*\/?$/  ;
$(function(){
		$("#enviar").click(function(){
				var nick = $("#nick").val();
				var nombre = $("#nombre").val();
				var email = $("#email").val();
				var url = $("#url").val();
				var pass = $("#pass").val();
				var rPass = $("#rPass").val();
				
				if(nick == ""){
						$("#msgNick").fadeIn();
						return false;					
					}
					else{
							$("#msgNick").fadeOut();
							if(nombre == "" )
							{
									$("#msgNombre").fadeIn();
									return false;					
							}
							else{
										$("#msgNombre").fadeOut();
										if(email == "" || !expE.test(email))
										{
												$("#msgEmail").fadeIn();
												return false;					
										}
										else{
												$("#msgEmail").fadeOut();
												if(pass == ""){
													$("#msgPass").fadeIn();
													return false;
												}
												else{
														$("#msgPass").fadeOut();
														if(pass != rPass){
															alert(pass+' = '+ rPass);
														$("#msgRpass").fadeIn();
														return false;
														}
														else{
																$("#msgRpass").fadeOut();
																if(url == "" || !expU.test(url))
																{
																	$("#msgUrl").fadeIn();
																	return false;					
																}
													}
												}
											}
										}
									}
			});
	});