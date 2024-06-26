<?php
include("./conexion.php");

// Verifica si se ha enviado el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre_materia = $_POST["nombre_materia"];
    $codigo_materia = $_POST["codigo_materia"];
    $id_docente = $_POST["id_docente"];
    $id_grupo = $_POST["id_grupo"];
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_final = $_POST["fecha_final"];
    $estado = $_POST["estado"];

    // Prepara la consulta SQL para insertar la materia
    $sql = "INSERT INTO materias (nombre_materia, codigo_materia, id_docente , id_grupo,fecha_inicio,fecha_final,estado) VALUES (?, ?, ?, ?,?,?,?)";

    // Verifica si la conexión está abierta antes de preparar la consulta
    if (!$conexion->connect_error) {
        // Prepara la sentencia
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            // Asocia los parámetros
            $stmt->bind_param("ssiisss", $nombre_materia, $codigo_materia, $id_docente, $id_grupo,$fecha_inicio,$fecha_final, $estado);

            // Ejecuta la sentencia
            if ($stmt->execute()) {
                // Redirige a la página de materias.php u otra página
                echo '<script>window.location.href = "../modulos.php";</script>';
                exit;
            } else {
                echo '<div class="alert alert-danger" role="alert">Error al registrar la materia: ' . $stmt->error . '</div>';
            }

            // Cierra la sentencia
            $stmt->close();
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al preparar la sentencia: ' . $conexion->error . '</div>';
        }
    }
}
?>
