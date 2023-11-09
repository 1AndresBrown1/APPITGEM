<?php
session_start();
require 'bd.php';

if (!empty($_SESSION['usuario'])) {
  header('Location: index.php');
  exit(); // Important to prevent further execution
}

if (!empty($_POST['name']) && !empty($_POST['contrasena'])) {
  $records = $conn->prepare('SELECT * FROM user WHERE name = :name OR email = :email');
  $records->bindParam(':name', $_POST['name']);
  $records->bindParam(':email', $_POST['name']); // Allow using email as well
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  if ($results && password_verify($_POST['contrasena'], $results['contrasena'])) {
    $_SESSION['nombre_usuario'] = $results['name'];
    //$_SESSION['permit'] = $results['permit'];
    $_SESSION['admin'] == "admin";
    header("Location: index.php");
    exit(); // Important to prevent further execution
  } else {
    $message = 'Usuario no registrado o contraseña incorrecta';
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title >Login</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
  </head>
  <body class="login">
    <?php 
    //require 'partials/header.php' 
    ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Login</h1>

    <span>or 
      <!-- <a href="signup.php">SignUp</a> -->
    <a href="login.php">Volver a Docente/Estudiante</a></span>
    <form action="index.php" method="POST">
      <input name="name" type="text" placeholder="Introduce tu nombre de usuario">
      <input name="password" type="password" placeholder="Introduce tucontraseña">
      <input class="btn btn__me" type="submit" value="Entrar">

      
    </form>
  </body>
</html>
