<?php
session_start();

if (isset($_SESSION['loger']) && $_SESSION['loger'] == true) {

} else {?>
    <script type="text/javascript">alert('Tienes que iniciar sesion para entrar al sitio.'); </script>
    <?php
    echo "<script> window.location = 'login.php' </script>";

exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();

echo "Su sesion a terminado,
<a href='login.php'>Necesita iniciar sesion</a>";
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
        <script src="Scripts/jtable/jquery.jtable.js" type="text/javascript"></script>
        
    </head>
    <body>
        <form id="formulario">
        
        <a href='login/logout.php'>Cerrar sesion</a>
        <div id="usuarios" style="width: 700px;border:2px solid black; margin:auto"></div>
         
        </form>
    </body>
</html>

<script src = "scripts/tabusuario.js" type="text/javascript"> </script>
