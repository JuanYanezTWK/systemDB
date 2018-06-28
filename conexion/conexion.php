<?php 
	//Esta fue la que cree al no poder usar la otra PDO
	class Conexion{
	private $servidor = "localhost";
	private $usuario = "root";
	private $clave = "";
	private $bd = "tallerbd";
	public function getConexion()
	{
		$con=mysqli_connect("$this->servidor","$this->usuario","$this->clave","$this->bd");
		if(!$con){
			die ("La conexion al servidor no se ha realizado, error: ".mysqli_connect_errno());		
			}else{		
				return ($con);
			}
		
		}
	}
 ?>
