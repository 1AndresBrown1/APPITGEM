<?php
include_once("./header.php");
include("../bd.php");

if (isset($_GET['id'])) {
    // Recupera el ID del estudiante a eliminar
    $id_estudiante_a_eliminar = $_GET['id'];

    // Prepara la consulta SQL para eliminar al estudiante
    $sql = "DELETE FROM estudiantes WHERE id = ?";

    // Verifica si la conexión está abierta antes de preparar la consulta
    if (!$conexion->connect_error) {
        // Prepara la sentencia
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            // Asocia el parámetro
            $stmt->bind_param("i", $id_estudiante_a_eliminar);

            // Ejecuta la sentencia
            if ($stmt->execute()) {
                // Redirige a la página de academico.php u otra página
                echo '<script>alert("El estudiante se ha eliminado con éxito.");</script>';
                echo '<script>window.location.href = "./academico.php";</script>';
                exit;
            } else {
                echo '<div class="alert alert-danger" role="alert">Error al eliminar al estudiante: ' . $stmt->error . '</div>';
            }

            // Cierra la sentencia
            $stmt->close();
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al preparar la sentencia: ' . $conexion->error . '</div>';
        }
    }
}
?>
