<?php
include("../bd.php"); // Incluye el archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre_grupo = $_POST["nombre_grupo"];
    $id_año = $_POST["id_año"];

    // Prepara la consulta SQL para insertar un nuevo grupo
    $sql = "INSERT INTO grupos (nombre_grupo, id_año) VALUES (?, ?)";

    // Verifica si la conexión está abierta antes de preparar la consulta
    if (!$conexion->connect_error) {
        // Prepara la sentencia
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            // Asocia los parámetros
            $stmt->bind_param("si", $nombre_grupo, $id_año);

            // Ejecuta la sentencia
            if ($stmt->execute()) {
                // El grupo se ha creado con éxito
                echo '<script>alert("El grupo se ha creado con éxito.");</script>';
                // Redirige a la página de grupos.php o la página que desees
                header("Location: ./academico.php");
                exit;
            } else {
                // Ocurrió un error al ejecutar la sentencia
                echo '<script>alert("Error al crear el grupo: ' . $stmt->error . '");</script>';
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
