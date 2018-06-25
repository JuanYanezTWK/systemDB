<?php 
	session_start();	

	require_once "conexion.php";

	$con=conexion();

		$usuario=$_POST['user_name'];
		$pass=sha1($_POST['user_pass']);
		

		$sql="SELECT * from users where user_name='$usuario' and user_pass='$pass'";
		$result=mysqli_query($con,$sql);
		
		if(mysqli_num_rows($result) > 0){

			$_SESSION['user']=$usuario;
			echo 1;

		}else{
			echo 0;
		}
 ?>