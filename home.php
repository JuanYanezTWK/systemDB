<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="js/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="js/alertifyjs/css/alertify.css">

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/alertifyjs/alertify.js"></script>
</head>

<body style="background-color: black">
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-primary">
				<div class="panel panel-heading">Login</div>
				<div class="panel panel-body">
				
					<div style="text-align: center;">
						<img src="img/photoz.jpg" height="250">
					</div>
					<p></p>
					<label>Usuario</label>
					<input type="text" id="user_name" class="acceso" name=""><br>
					<label>Password</label>
					<input type="text" id="user_pass" class="acceso" name="">
					<p></p>
					<input type="submit" name="acceso" class="acceso" id="acceso" value="Acceder">
				
				</div>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#acceso').click(function(e){
			var username = $("#user_name").val().trim();
        	var password = $("#user_pass").val().trim();
			if($('#user_name').val()==""){
				alertify.alert("Debes agregar el usuario");
				return false;
			}else if($('#user_pass').val()==""){
				alertify.alert("Debes agregar el password");
				return false;
			}
				$.ajax({
				url:"session/login.php",
				type:"POST",
				data: {user_name: username, user_pass: password}
				sucess:function(response){
							if(response == 1){
								window.location="index.php";								
							}else{
								alertify.alert("Fallo al entrar");
								console.log(username, password);
                            }
						
					});
		});	

</script>