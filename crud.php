<?php
include 'session/conexion.php';

function insert($user, $pass, $position) {
    
                    $conexion = new Conexion();
                    $con = $conexion-> getConexion();
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
                    mysqli_close($con);
}   

function update($id, $user, $pass, $position) {
                    $conexion = new Conexion();
                    $con = $conexion-> getConexion();
                    $sql = "UPDATE users SET user_name = '$user', user_pass = '$pass', user_position = '$position' 
                            WHERE user_id = '$id' ";
                    $result=mysqli_query($con,$sql);
                    
	            $jTableResult = array();
	            $jTableResult['Result'] = "OK";
                    echo json_encode($jTableResult);
                    mysqli_close($con);
}
?>