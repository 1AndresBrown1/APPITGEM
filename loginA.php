<?php
session_start();
require 'bd.php';

if (!empty($_SESSION['usuario'])) {
  header('Location: index.php');
  exit(); // Importante para evitar una ejecución adicional
}

if (!empty($_POST['name']) && !empty($_POST['contrasena'])) {
  $name = $_POST['name'];
  $contrasena = $_POST['contrasena'];

  // Evitar la inyección de SQL utilizando sentencias preparadas
  $stmt = $conexion->prepare('SELECT * FROM usuarios WHERE name = ? OR email = ?');
  $stmt->bind_param('ss', $name, $name); // 'ss' indica que ambos parámetros son de tipo string
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      if (password_verify($contrasena, $row['contrasena'])) {
          $_SESSION['nombre_usuario'] = $row['name'];
          //$_SESSION['permit'] = $row['permit'];
          $_SESSION['admin'] = 'admin';
          header("Location: index.php");
          exit();
      } 
      else {
           $error_message = 'Usuario no registrado o contraseña incorrecta';
      }
  } else {
      $error_message = 'Usuario no registrado o contraseña incorrecta';
  }

  $stmt->close();
} else {
  $error_message = 'Por favor, ingrese nombre de usuario y contraseña.';
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="icon" type="image/png" href="img/logo.png">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="login">

<?php if (!empty($message)): ?>
  <p> <?= $message ?></p>
<?php endif; ?>

<h1>Login</h1>

<span>
  <!-- <a href="signup.php">SignUp</a> -->
  <a href="login.php">Volver a Docente/Estudiante</a>
</span>
<?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
<form action="loginA.php" method="POST">
  <input name="name" type="text" placeholder="Introduce tu nombre de usuario">
  <input name="contrasena" type="password" placeholder="Introduce tu contraseña">
  <input class="btn btn__me" type="submit" value="Entrar">
</form>
</body>
</html>