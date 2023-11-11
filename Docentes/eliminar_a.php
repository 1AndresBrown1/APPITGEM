<?php
include_once("./header.php");
include("../bd.php");

// Verifica si se ha enviado el ID a través de una solicitud POST
if (isset($_POST['id'])) {
    $id_a_eliminar = $_POST['id'];

    // Prepara la consulta SQL para eliminar el año académico
    $sql = "DELETE FROM gestion_a WHERE id = ?";

    // Verifica si la conexión está abierta antes de preparar la consulta
    if (!$conexion->connect_error) {
        // Prepara la sentencia
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            // Asocia el parámetro
            $stmt->bind_param("i", $id_a_eliminar);

            // Ejecuta la sentencia
            if ($stmt->execute()) {
                // Redirige a la página de academico.php u otra página
                echo '<script>window.location.href = "./academico.php";</script>';
                exit;
            } else {
                echo '<div class="alert alert-danger" role="alert">Error al eliminar el año académico: ' . $stmt->error . '</div>';
            }

            // Cierra la sentencia
            $stmt->close();
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al preparar la sentencia: ' . $conexion->error . '</div>';
        }
    }
} else {
    echo '<div class="alert alert-danger" role="alert">Falta el ID del año académico a eliminar.</div>';
}
?>
