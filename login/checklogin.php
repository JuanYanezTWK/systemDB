<?php
session_start();
?>

<?php
include "../conexion/conexion.php";

$conexion = new Conexion();
$con      = $conexion->getConexion();

$username = $_POST['username'];
$password = $_POST['password'];

if ($username != "" && $password != "") {
    
    
    $sql = "SELECT * FROM users WHERE user_name = '$username'";
    
    $result = mysqli_query($con, $sql);
    
    if ($result->num_rows > 0) {
    }
    $row = $result->fetch_array();
    
    if ($password == $row['user_pass']) {
        
        $_SESSION['loger']    = true;
        $_SESSION['username'] = $row['user_position'];
        $_SESSION['start']    = time();
        $_SESSION['expire']   = $_SESSION['start'] + (5 * 60);
        if ($row['user_position'] == "administrador") {
            echo "<script> window.location = '../index.php' </script>";
        }
        
        if ($row['user_position'] == "usuario") {
            echo "<script> window.location = '../usuario.php' </script>";
        }
        
    } else {
        
        echo "<script>alert('Usuario o contraseña invalidos.') </script>";
        echo "<script> window.location = '../login.php' </script>";
        
    }
    mysqli_close($con);
    
} else {

  echo "<script>alert('Los campos no pueen estar vacios.') </script>";
  echo "<script> window.location = '../login.php' </script>";
}
?>