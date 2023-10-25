<?php
include("../bd.php"); // Incluye el archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si el formulario ha sido enviado con el método POST

    // Recupera los datos del formulario
    $nombre_a = $_POST["nombre_a"];

    // Prepara la consulta SQL para insertar un nuevo año académico
    $sql = "INSERT INTO gestion_a (nombre_a) VALUES (?)";

    // Verifica si la conexión está abierta antes de preparar la consulta
    if (!$conexion->connect_error) {
        // Prepara la sentencia
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            // Asocia los parámetros
            $stmt->bind_param("s", $nombre_a);

            // Ejecuta la sentencia
            if ($stmt->execute()) {
                // El año académico se ha creado con éxito
                echo '<div class="alert alert-success" role="alert">El año académico se ha creado con éxito.</div>';
            } else {
                // Ocurrió un error al ejecutar la sentencia
                echo '<div class="alert alert-danger" role="alert">Error al crear el año académico: ' . $stmt->error . '</div>';
            }

            // Cierra la sentencia
            $stmt->close();
        } else {
            // Ocurrió un error al preparar la sentencia
            echo '<div class="alert alert-danger" role="alert">Error al preparar la sentencia: ' . $conexion->error . '</div>';
        }
    }
}
?>

