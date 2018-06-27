<?php

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
                    $.ajax({
                        "method":"POST",
                        "url": "probandoweas/user.php",
                        "data": frm
                    })
                    

                 }
            }
        }
	}
?>