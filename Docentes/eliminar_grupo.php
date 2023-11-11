<?php
include_once("./header.php");
include("../bd.php");

// Verifica si se ha enviado el ID a través de la URL
if (isset($_GET['id'])) {
    $id_grupo_a_eliminar = $_GET['id'];

    // Prepara la consulta SQL para eliminar el grupo
    $sql = "DELETE FROM grupos WHERE id = ?";

    // Verifica si la conexión está abierta antes de preparar la consulta
    if (!$conexion->connect_error) {
        // Prepara la sentencia
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            // Asocia el parámetro
            $stmt->bind_param("i", $id_grupo_a_eliminar);

            // Ejecuta la sentencia
            if ($stmt->execute()) {
                // Redirige a la página de grupos.php u otra página
                echo '<div class="alert alert-success" role="alert">El año académico se ha creado con éxito.</div>';
                echo '<script>window.location.href = "./academico.php";</script>';
                exit;
            } else {
                echo '<div class="alert alert-danger" role="alert">Error al eliminar el grupo: ' . $stmt->error . '</div>';
            }

            // Cierra la sentencia
            $stmt->close();
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al preparar la sentencia: ' . $conexion->error . '</div>';
        }
    }
} else {
    echo '<div class="alert alert-danger" role="alert">Falta el ID del grupo a eliminar.</div>';
}
?>
