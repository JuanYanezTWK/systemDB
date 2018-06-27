<?php

    include 'session/conexion.php';
    $conexion = new Conexion();
    $con = $conexion-> getConexion();

    $id = $_POST ["user_id"]; 
    $user = $_POST["user_name"];
    $pass = $_POST["user_pass"];
    $position = $_POST["user_position"]; 
    $admin = "admin";
    $usuario = "usuario";
    
    if ($_GET['action']=='create') 
    {
        if ($user != "" && $pass != "" && $position != "") {
            if (!preg_match('~[0-9]~', $user)) {
                if (!strcmp ($position , $admin) || !strcmp ($position , $usuario)) {

                    $sql = "INSERT INTO users(user_name, user_pass, user_position) 
                            VALUES('" . $user . "', '" . $pass . "', '" . $position . "') ";
                    $result=mysqli_query($con,$sql);

                    $sql = "SELECT * FROM users where user_id = LAST_INSERT_ID();";
                    $result=mysqli_query($con,$sql);
                    $row = mysqli_fetch_array($result);
                    
                    $jTableResult = array();
                    $jTableResult['Result'] = "OK";
                    $jTableResult['Record'] = $row;
                    echo json_encode($jTableResult);
                 }
            }
        }
    }
    if ($_GET['action']=='update') 
    {
        if ($user != "" && $pass != "" && $position != "") {
            if (!preg_match('~[0-9]~', $user)) {
                if (!strcmp ($position , $admin) || !strcmp ($position , $usuario)) {

                    $sql = "UPDATE users SET user_name = '$user', user_pass = '$pass', user_position = '$position' 
                            WHERE user_id = '$id' ";
                    $result=mysqli_query($con,$sql);
                    
                    //Return result to jTable
	            	$jTableResult = array();
	            	$jTableResult['Result'] = "OK";
	            	echo json_encode($jTableResult);
                    
                 }
            }
        }
    }
    
?>