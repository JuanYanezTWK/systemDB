<?php

include 'session/conexion.php';
$conexion = new Conexion();
$con = $conexion-> getConexion();

function insert() {
include 'controlador.php';
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

?>