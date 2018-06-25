<?php
    // aqui fue donde si pude usar mi clase conexion PDO
    include 'connect.php';
    $name = $_POST["name"];
    $password = $_POST["password"];
    $position = $_POST["userposition"];

    $conexion = new Conexion();
    $cnn = $conexion->getConexion();
    $sql= "INSERT INTO users(user_name, user_pass, user_position) VALUES (?,?,?);";
    $statement = $cnn->prepare($sql);

    //asignamos los campos a la variable statement, usando PDO constanstes
    $statement->bindParam(1, $name, PDO::PARAM_STR);
    $statement->bindParam(2, $password, PDO::PARAM_STR);
    $statement->bindParam(3, $position, PDO::PARAM_STR);
    echo $statement->execute() ? "Registrado con exito." : "Error";
    //operador Ternario, funciona asi:  condicion ? true:false

    $statement->closeCursor();
    $conexion = null;
?>