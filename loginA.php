<?php
session_start();
require "./App/conexion.php";

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
    } else {
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
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="shortcut icon" href="./assets/images/Logo Elotes Ilustrado Amarillo y Verde.png" type="image/x-icon">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./assets/css/styles.css">
  <link rel="stylesheet" href="./assets/fonts/fonst.css">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="./recursos/bootstrap/css/bootstrap.min.css">
  <!-- Bootstrap -->

</head>

<body>
  <section style="background-color: white !important;" class="mt-1 d-flex justify-content-center text-center cardcustom">
    <div><a href="./loginA.php"><img width="150" class="mt-4 img-fluid" src="./recursos/img/logo-grande.svg" alt=""></a>
      <p class="text-center mt-4 fw-bolder p-custom">Administrador</p>
      <p style="font-size: 14px !important;" class="p-custom mt-3">Por favor ingresa tus credenciales de inicio de sección para poder acceder a la plataforma de gestión de notas APPITGEM</p>

      <!-- Formulario de inicio de sección -->
      <form action="loginA.php" method="post">
        <div class="m-auto input-group mt-4 inputdiv">
          <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-paper-plane"></i></span>
          <input name="name" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
        </div>
        <div class="m-auto input-group mt-3 inputdiv">
          <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
          <input name="contrasena" type="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" required>
        </div>
        <div class="d-grid gap-2 inputdiv mt-4">
          <button type="submit" class="btn btn-custom fw-bolder" type="button">iniciar sección</button>
        </div>
      </form>

      <!-- Alerta para contraseña incorrecta -->
      <?php if (isset($error_message) && !empty($error_message)) : ?>
        <div class="alert alert-danger mt-2 inputdiv" role="alert">
          <?php echo $error_message; ?>
        </div>
      <?php endif; ?>

    </div>
  </section>
</body>

</html>