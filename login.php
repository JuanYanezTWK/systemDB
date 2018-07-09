<?php
?>
<html lang="en">

<head>
 <title>Login</title>

 <meta charset = "utf-8">
 <link rel="stylesheet" href="css/login.css">
</head>

<body>

<div class="login-page">
  <div class="form">    
    <form class="login-form" action="login/checklogin.php" method="post">
        <h3>Ingrese su cuenta</h3>
      <input name="username" type="text" id="username" placeholder="Usuario" required/>
      <input name="password" type="password" id="password" placeholder="Contraseña" required/>
      <button type="submit" name="Submit"> Entrar </button>     
    </form>
  </div>
</div>
 </body>
</html>