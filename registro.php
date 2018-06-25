<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
	<title>Registro</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="estilos.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>

<body>      
    <div id="contenido">
        <div id="formulario">			
            <form id = "frm">				
				<h3>Registro de usuario</h3>	
				
                <div class="user-form">
                <label for="name">Nombre de usuario</label><br>
                <input type="text" placeholder="usuario" name="name" id = "name">
                </div>
                <div class="user-form">
                <label for="name">Contraseña</label><br>
                <input type="password" placeholder="contraseña" name="password" id="password">
                </div>
                <div class="user-form">
                <label for="name">Cargo</label><br>
                <input type="text" placeholder="cargo" name = "userposition" id="userposition"><br>
                <input type="submit" value="Guardar"> 
				
                <div id="mensaje"></div>
            </form>         
        </div>    
    </div>
	</body>
</html>
 
<script   src="https://code.jquery.com/jquery-2.2.4.min.js" 
			  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
			  crossorigin="anonymous"></script>
	<script>
		$(document).on("ready", function(){
			enviarDatos();
		});
		/*
		meti este evento junto al boton asociado por que no sabia ubicarlo bien, arriba o abajo interferia con el mensaje que se crea
		al registrar un usuario, de hecho luego de ponerlo me quedo la caga y ahora no se ve el mensaje xd
		$('#back').click(function(){
			window.location="index.php";
		});
				
		<div class="text-right">
            	<button type="button" id="back" class="btn btn-success">Regresar</button>
        </div>
		*/
		
		function enviarDatos(){
			$("#frm").on("submit", function(e){
			/*if($('#name').val()==""){
				alertify.alert("Debes agregar el usuario");
				return false;
			}else if($('#paswword').val()==""){
				alertify.alert("Debes agregar el password");
				return false;
			}
			}else if($('#userposition').val()==""){
				alertify.alert("Debes agregar el password");
				return false;
			} */
			
				e.preventDefault();
				var frm = $(this).serialize();
				$.ajax({
					"method":"POST",
					"url": "probandoweas/user.php",
					"data": frm
				}).done( function( info ){
					$("#mensaje").addClass("mostrar");
					//vamos a mostrar la respuesta del servidor
					
				});
			});
		}
	</script>

