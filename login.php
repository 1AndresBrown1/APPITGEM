<?php
session_start();
require 'bd.php';

// Función para obtener el nombre de usuario a partir de la identificación y el tipo de usuario
function obtenerNombreUsuario($identificacion, $tipo_usuario, $conexion) {
    $resultado = array('nombre' => '', 'id' => '');

    if ($tipo_usuario === 'docente') {
        $query = "SELECT id, nombre FROM docentes WHERE documento_identidad = '$identificacion'";
    } elseif ($tipo_usuario === 'estudiante') {
        $query = "SELECT id, nombre FROM estudiantes WHERE documento_identidad = '$identificacion'";
    }

    $result = mysqli_query($conexion, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $resultado['nombre'] = $row['nombre'];
        $resultado['id'] = $row['id'];
        $_SESSION['nombre_usuario'] = $resultado['nombre'];
    }

    return $resultado;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identificacion = $_POST['identificacion'];
    $contrasena = $_POST['contrasena'];
    $tipo_usuario = $_POST['tipo_usuario'];

    // Realiza la consulta en la base de datos para verificar las credenciales
    if ($tipo_usuario === 'docente') {
        $query = "SELECT * FROM docentes WHERE documento_identidad = '$identificacion'";
        $result = mysqli_query($conexion, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Verifica la contraseña
            if (password_verify($contrasena, $row['contrasena'])) {
                // Credenciales correctas
                $nombre_usuario = obtenerNombreUsuario($identificacion, $tipo_usuario, $conexion);
                $_SESSION['identificacion_usuario'] = $identificacion;
                $_SESSION['docente'] = 'docente';
                $_SESSION['id_docente'] = $nombre_usuario['id'];
                header('Location: index_docentes.php');
                exit(); // Importante para evitar ejecución adicional
            } else {
                $error_message = 'Contraseña incorrecta';
            }
        } else {
            $error_message = 'Usuario no encontrado';
        }
    } elseif ($tipo_usuario === 'estudiante') {
        $query = "SELECT * FROM estudiantes WHERE documento_identidad = '$identificacion'";
        $result = mysqli_query($conexion, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Verifica la contraseña
            if (password_verify($contrasena, $row['contrasena'])) {
                // Credenciales correctas
                $nombre_usuario = obtenerNombreUsuario($identificacion, $tipo_usuario, $conexion);
                $_SESSION['identificacion_usuario'] = $identificacion;
                $_SESSION['estudiante'] = 'estudiante';
                $_SESSION['id_estudiante'] = $nombre_usuario['id'];
                header('Location: index_estudiantes.php');
                exit(); // Importante para evitar ejecución adicional
            } else {
                $error_message = 'Contraseña incorrecta';
            }
        } else {
            $error_message = 'Usuario no encontrado';
        }
    } else {
        $error_message = 'Tipo de usuario no válido';
    }

    // Si llegamos aquí, significa que hay un error
    // Puedes mostrar el mensaje de error en tu formulario
    // y utilizar $error_message en el lugar adecuado en tu HTML
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
