<?php 
	require "conexion.php";

	$conexion = new Conexion();
	$con = $conexion-> getConexion();
	$usuario = mysqli_real_escape_string($con,$_POST['user_name']);
	$pass = mysqli_real_escape_string($con,$_POST['user_pass']);
	
		$sql = "SELECT count(*) as cntUser from users where user_name= '".$usuario."' and user_pass = '".$pass."' ";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);
		$count = $row['cntUser'];
		echo $count;

    	if($count > 0){
        $_SESSION['usuario'] = $usuario;
        echo 1;
    	}else{
        echo 0;
		}
	?>