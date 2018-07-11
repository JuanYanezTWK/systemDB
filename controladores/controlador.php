<?php
include 'crud.php';

    $user = $_POST["user_name"];
    $pass = $_POST["user_pass"];
    $position = $_POST["user_position"]; 
    $admin = "administrador";
    $usuario = "usuario";
    // Opcion para crear usuario de la tabla

    if ($_GET['action']=='create') 
    {   //Validaciones 
        if ($user != "" && $pass != "" && $position != "") {
            if (!preg_match('~[0-9]~', $user)) {
                if (!strcmp ($position , $admin) || !strcmp ($position , $usuario)) {
                    //Si los datos estan correctos, llama a la funcion de crud.php
                    insert($user, $pass, $position);
                }
                else{
                    $jTableResult=array();
                    $jTableResult['Result']="ERROR";
                    $jTableResult['Message']="El cargo solo puede ser administrador o usuario.";
                    echo json_encode($jTableResult);
                }
            }
            else{
                $jTableResult=array();
                $jTableResult['Result']="ERROR";
                $jTableResult['Message']="Ingrese los datos correctamente.";
                echo json_encode($jTableResult);
            }
        }else{
            $jTableResult=array();
            $jTableResult['Result']="ERROR";
            $jTableResult['Message']="Los campos no pueden estar vacios";
            echo json_encode($jTableResult);
        }  
        
        
    }
    
    if ($_GET['action']=='update') 
    {   $id = $_POST ["user_id"]; 
       
        if ($user != "" && $pass != "" && $position != "") {
            if (!preg_match('~[0-9]~', $user)) {
                if (!strcmp ($position , $admin) || !strcmp ($position , $usuario)) {
                    
                    update($id, $user, $pass, $position);
                    
                 }
                 else{
                    $jTableResult=array();
                    $jTableResult['Result']="ERROR";
                    $jTableResult['Message']="El cargo solo puede ser administrador o usuario.";
                    echo json_encode($jTableResult);
                 }
            }
            else{
                $jTableResult=array();
                $jTableResult['Result']="ERROR";
                $jTableResult['Message']="Ingrese los datos correctamente.";
                echo json_encode($jTableResult);
            }
        }
        else{
            $jTableResult=array();
            $jTableResult['Result']="ERROR";
            $jTableResult['Message']="Los campos no pueden estar vacios";
            echo json_encode($jTableResult);
        }  
    }

?>