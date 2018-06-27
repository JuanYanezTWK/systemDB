$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow")});
$(document).ready(function(){
		$('#acceder').click(function(e){
			var username = $("#user_name").val().trim();
        	var password = $("#user_pass").val().trim();
			if($('#user_name').val()==""){
				alertify.alert("Debes agregar el usuario");
				return false;
			}else if($('#user_pass').val()==""){
				alertify.alert("Debes agregar el password");
				return false;
			}else{
				$.ajax({
				url:"session/login.php",
				type:"POST",
				data: {username: username, userpass: password},
				sucess:function(response){
							if(response == 1){
								window.location="index.php";								
							}else{
								alertify.alert("Fallo al entrar");
							console.log(username, usepassword);
                            }
				}
						
                    });
                }
		});	
	});
