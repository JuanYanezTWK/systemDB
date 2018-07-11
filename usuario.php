<?php
session_start();

if (isset($_SESSION['loger']) && $_SESSION['loger'] == true) {

} else {
    echo "<script>alert('Tienes que iniciar sesion para entrar al sitio.') </script>";
    
    echo "<script> window.location = 'login/logout.php' </script>";
    echo "<script> window.location = 'login.php' </script>";

exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();

echo "<script>alert('Su sesion ha expirado, inicie sesion nuevamente.') </script>";    
echo "<script> window.location = 'login.php' </script>";
exit;
}
?>
<html lang="es">
    <head>
        <title>
        Usuarios
        </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/fondo.css">
        <link href="themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
	    <link href="Scripts/jtable/themes/metro/green/jtable.css" rel="stylesheet" type="text/css" />
	
	    <script src="scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
        <script src="scripts/jtable/jquery.jtable.js" type="text/javascript"></script>        
        <script src = "scripts/tabusuario.js" type="text/javascript"> </script>
        
    </head>
    <body>
        <form id="formulario">
        
        
        <div id="usuarios" style="width: 700px;border:2px solid black; margin:auto"></div>
        <a href='login/logout.php'>Cerrar sesion</a>
        </form>
    </body>
</html>

