<?php
include_once("./header.php");
include("../bd.php");


// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tipo_documento = $_POST['tipo_documento'];
    $documento_identidad = $_POST['documento_identidad'];
    $direccion = $_POST['direccion'];
    $titulo = $_POST['titulo'];
    $email = $_POST['email'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    // Preparar y ejecutar la consulta de inserción
    $sql = "INSERT INTO docentes (nombre, apellido, tipo_documento, documento_identidad, direccion, titulo, email, fecha_nacimiento) VALUES ('$nombre', '$apellido', '$tipo_documento', '$documento_identidad', '$direccion', '$titulo', '$email', '$fecha_nacimiento')";

    if ($conexion->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}
// A continuación, muestra el formulario de estudiantes.
// Aquí debe ir el código HTML del formulario que muestran en la página para ingresar datos de estudiantes.
?>
