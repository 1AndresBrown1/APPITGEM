<?php
include 'bd2.php';

// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recupera los datos del formulario
    $tipo_documento = $_POST["tipo_documento"];
    $documento_identidad = $_POST["documento_identidad"];
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $direccion = $_POST["direccion"];
  


    // Asegúrate de escapar los datos para prevenir inyecciones SQL
    $tipo_documento = mysqli_real_escape_string($conexion_mysqli, $tipo_documento);
    $documento_identidad = mysqli_real_escape_string($conexion_mysqli, $documento_identidad);
    $nombre = mysqli_real_escape_string($conexion_mysqli, $nombre);
    $telefono = mysqli_real_escape_string($conexion_mysqli, $telefono);
    $correo = mysqli_real_escape_string($conexion_mysqli, $correo);
    $direccion = mysqli_real_escape_string($conexion_mysqli, $direccion);
   
    

    // Preparar y ejecutar la consulta de inserción
    $sql = "INSERT INTO clientes (tipo, num_identidad, nombre, telefono, correo, direccion, fecha, estado) 
            VALUES ('$tipo_documento', '$documento_identidad', '$nombre', '$telefono', '$correo', '$direccion')";

    // Ejecutar la consulta
    if ($conexion_mysqli->query($sql) === TRUE) {
        echo '<script>alert("Registro exitoso.");</script>';
    } else {
        echo '<script>alert("Error al registrar el estudiante: ' . $conexion_mysqli->error . '");</script>';
    }

    // Cierra la conexión
    $conexion_mysqli->close();
}
?>
