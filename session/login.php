<?php 
	require "conexion.php";

	$conexion = new Conexion();
	$con = $conexion-> getConexion();
	$usuario = $_POST['username'];
	$pass = $_POST['userpass'];
	
		$sql = "SELECT count(*) as cntUser from users where user_name= '".$usuario."' and user_pass = '".$pass."' ";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);
		$count = $row['cntUser'];
		

    	if($count > 0){
        $_SESSION['usuario'] = $usuario;
        echo 1;
    	}else{
        echo 0;
		}
	?>