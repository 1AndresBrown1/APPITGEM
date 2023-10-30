<?php
include_once("./header.php");
include("../bd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $fechaNacimiento = $_POST["fecha_nacimiento"];
    $genero = $_POST["genero"];
    $grupoId = $_POST["grupo"];

    // Prepara la consulta SQL para insertar un nuevo estudiante
    $sql = "INSERT INTO estudiantes (nombre, apellido, fecha_nacimiento, genero, grupo_id) VALUES (?, ?, ?, ?, ?)";

    // Verifica si la conexión está abierta antes de preparar la consulta
    if (!$conexion->connect_error) {
        // Prepara la sentencia
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            // Asocia los parámetros
            $stmt->bind_param("ssssi", $nombre, $apellido, $fechaNacimiento, $genero, $grupoId);

            // Ejecuta la sentencia
            if ($stmt->execute()) {
                // Redirige a la página de estudiantes o a otra página
                echo '<script>alert("El grupo se ha creado con éxito.");</script>';

                echo '<script>window.location.href = "./estudiantes.php";</script>';
                exit;
            } else {
                echo '<div class="alert alert-danger" role="alert">Error al guardar el estudiante: ' . $stmt->error . '</div>';
            }

            // Cierra la sentencia
            $stmt->close();
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al preparar la sentencia: ' . $conexion->error . '</div>';
        }
    }
}

// A continuación, muestra el formulario de estudiantes.
// Aquí debe ir el código HTML del formulario que muestran en la página para ingresar datos de estudiantes.
?>
