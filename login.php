<?php
session_start();
require 'bd.php';

// Redirigir si ya hay una sesión activa
if (!empty($_SESSION['nombre_usuario'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identificacion = $_POST['identificacion'];
    $contrasena = $_POST['contrasena'];
    $tipo_usuario = $_POST['tipo_usuario'];

    // Realiza la consulta en la base de datos para verificar las credenciales
    if ($tipo_usuario === 'docente') {
        $query = "SELECT id, nombre, contrasena FROM docentes WHERE documento_identidad = ?";
    } elseif ($tipo_usuario === 'estudiante') {
        $query = "SELECT id, nombre, contrasena FROM estudiantes WHERE documento_identidad = ?";
    } else {
        $error_message = 'Tipo de usuario no válido';
        exit();
    }

    // Evitar la inyección de SQL utilizando sentencias preparadas
    $stmt = $conexion->prepare($query);
    $stmt->bind_param('s', $identificacion); // 's' indica que el parámetro es de tipo string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($contrasena, $row['contrasena'])) {
            $_SESSION['id_usuario'] = $row['id'];
            $_SESSION['identificacion_usuario'] = $identificacion;

            if ($tipo_usuario === 'docente') {
                $_SESSION['nombre_usuario'] = $row['nombre'];
                $_SESSION['docente'] = 'docente';
                $_SESSION['id_docente'] = $_SESSION['id_usuario'];
                $_SESSION['identificacion_usuario'] = $identificacion;
                header('Location: index_docentes.php');
                
            } elseif ($tipo_usuario === 'estudiante') {
                $_SESSION['nombre_usuario'] = $row['nombre'];
                $_SESSION['estudiante'] = 'estudiante';
                $_SESSION['id_estudiante'] = $_SESSION['id_usuario'];
                $_SESSION['identificacion_usuario'] = $identificacion;
                header('Location: index_estudiantes.php');
            }

            exit(); // Importante para evitar ejecución adicional
        } else {
            $error_message = 'Contraseña incorrecta';
        }
    } else {
        $error_message = 'Usuario no encontrado';
    }

    $stmt->close();
} else {
    $error_message = 'Por favor, complete los campos requeridos.';
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
  
  <a href="loginA.php">Ir como administrador</a>
  <form action="login.php" method="post">
    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <label for="identificacion">Número de Identificación:</label><br>
    <input type="text" id="identificacion" name="identificacion"><br>

    <label for="contrasena">Contraseña:</label><br>
    <input type="password" id="contrasena" name="contrasena"><br>

    <label for="tipo_usuario">Selecciona el tipo de usuario:</label><br>
    <select name="tipo_usuario" id="tipo_usuario">
      <option value="docente">Docente</option>
      <option value="estudiante">Estudiante</option>
    </select><br><br>

    <input type="submit" value="Ingresar">
  </form>
</html>
