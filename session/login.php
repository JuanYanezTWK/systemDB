<?php 
	require "conexion.php";

	$conexion = new Conexion();
	$con = $conexion-> getConexion();
	$usuario = mysqli_real_escape_string($con,$_POST['user_name']);
	$pass = mysqli_real_escape_string($con,$_POST['user_pass']);
	
		$sql = "SELECT count(*) as cntUser from users where user_name= '".$usuario."' and user_pass = '".$pass."' ";
		$result = mysqli_query($con,$sqlsql);
    	$row = mysqli_fetch_array($result);
		if($userbd == $usuario /*and password_verify($pass, $userpass*/){
			
			session_start();
			$_SESSION['usuario']=$userbd['user_name'];	
						
		}else{
			die("Error al autenticar");
		}
 ?>