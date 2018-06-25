<?php
session_start();

require("session/conexion.php");
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
					<input type="text" id="usuario" class="form-control input-sm" name="">
					<label>Password</label>
					<input type="text" id="pass" class="form-control input-sm" name="">
					<p></p>
					<span class="btn btn-primary" id="entrarSistema">Entrar</span>
					
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
		$('#entrarSistema').click(function(){
			if($('#usuario').val()==""){
				alertify.alert("Debes agregar el usuario");
				return false;
			}else if($('#pass').val()==""){
				alertify.alert("Debes agregar el password");
				return false;
			}

			cadena="user_name="+$('#usuario').val()+"&user_pass="+$('#pass').val();
					$.ajax({
						type:"POST",
						url:"session/login.php",
						data:cadena,
						success:function(r){
							if(r==1){
                                window.location="index.php";
							}else{
								alertify.alert("Fallo al entrar");
                                console.log(cadena);
                            }
						}
					});
		});	
	});
</script>