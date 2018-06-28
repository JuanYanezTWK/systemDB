<?php
include 'conexion/conexion.php';

function insert($user, $pass, $position) {
                 //instanciamos la clase Conexion y obtenemos la conexion de la funcion getConexion asignandosela a $con
                    $conexion = new Conexion();
                    $con = $conexion-> getConexion();
                    //preparamos la query para insertar y la ejecutamos en result
                    $sql = "INSERT INTO users(user_name, user_pass, user_position) 
                            VALUES('" . $user . "', '" . $pass . "', '" . $position . "') ";
                    $result=mysqli_query($con,$sql);
                    //Query para obtener el ultimo usuario ingresado, y luego de recorrer los valores devueltos los guardamos en $row
                    $sql = "SELECT * FROM users where user_id = LAST_INSERT_ID();";
                    $result=mysqli_query($con,$sql);
                    $row = mysqli_fetch_array($result);
                    //retornamos el usuario ingresado en un string codificado json a la tabla
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