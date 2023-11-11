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
  }

  return $resultado;
}
// Declara las variables globales
$_SESSION['nombre_usuario'] = "";
$_SESSION['identificacion_usuario'] = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identificacion = $_POST['identificacion'];
    $password = $_POST['password'];
    $tipo_usuario = $_POST['tipo_usuario'];

    // Realiza la consulta en la base de datos para verificar las credenciales
    if ($tipo_usuario === 'docente') {
        // Verifica las credenciales para docentes en la base de datos 'docentes'
        // Ejecuta la consulta y realiza la lógica de autenticación
        $query = "SELECT * FROM docentes WHERE documento_identidad = '$identificacion' AND password = '$password'";
        // Asigna el nombre y la identificación del usuario a las variables globales
        $nombre_usuario = obtenerNombreUsuario($identificacion, $tipo_usuario, $conexion);
        $_SESSION['nombre_usuario'] = $nombre_usuario;
        $_SESSION['identificacion_usuario'] = $identificacion;
        $_SESSION['docente'] = "docente";
        $_SESSION['id_docente'] = $nombre_usuario['id'];
        header('Location: index_docentes.php');
    } elseif ($tipo_usuario === 'estudiante') {
        // Verifica las credenciales para estudiantes en la base de datos 'estudiantes'
        $query = "SELECT * FROM estudiantes WHERE documento_identidad = '$identificacion' AND password = '$password'";
        // Ejecuta la consulta y realiza la lógica de autenticación
        $nombre_usuario = obtenerNombreUsuario($identificacion, $tipo_usuario, $conexion);
        $_SESSION['nombre_usuario'] = $nombre_usuario;
        $_SESSION['identificacion_usuario'] = $identificacion;
        $_SESSION['estudiante'] = "estudiante";
        $_SESSION['id_estudiante'] = $nombre_usuario['id']; 
        header('Location: index_estudiantes.php');
    } else {
        // Tipo de usuario no válido
        echo "Tipo de usuario no válido";
        $_SESSION['estudiante'] = "0";
        $_SESSION['docente'] = "0";
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
  
  <a href="loginA.php">Ir como administrador</a>
  <form action="login.php" method="post">
  <label for="identificacion">Número de Identificación:</label><br>
  <input type="text" id="identificacion" name="identificacion"><br>

  <label for="password">Contraseña:</label><br>
  <input type="password" id="password" name="password"><br>

  <label for="tipo_usuario">Selecciona el tipo de usuario:</label><br>
  <select name="tipo_usuario" id="tipo_usuario">
    <option value="docente">Docente</option>
    <option value="estudiante">Estudiante</option>
  </select><br><br>

  <input type="submit" value="Ingresar">

  
</form>
</html>
