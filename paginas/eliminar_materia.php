<?php
include_once("./header.php");
include("../bd.php");

// Verifica si se ha enviado el ID a través de la URL
if (isset($_GET['id'])) {
    $id_materia_eliminar = $_GET['id'];

    // Prepara la consulta SQL para eliminar la materia
    $sql = "DELETE FROM materias WHERE id = ?";

    // Verifica si la conexión está abierta antes de preparar la consulta
    if (!$conexion->connect_error) {
        // Prepara la sentencia
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            // Asocia el parámetro
            $stmt->bind_param("i", $id_materia_eliminar);

            // Ejecuta la sentencia
            if ($stmt->execute()) {
                // Redirige a la página de materias.php u otra página
                echo '<script>alert("Materia eliminada con éxito.");</script>';
                echo '<script>window.location.href = "./academico.php";</script>';
                exit;
            } else {
                echo '<div class="alert alert-danger" role="alert">Error al eliminar la materia: ' . $stmt->error . '</div>';
            }

            // Cierra la sentencia
            $stmt->close();
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al preparar la sentencia: ' . $conexion->error . '</div>';
        }
    }
} else {
    echo '<div class="alert alert-danger" role="alert">Falta el ID de la materia a eliminar.</div>';
}
?>
