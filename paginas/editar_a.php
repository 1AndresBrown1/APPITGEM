<?php
include './navegacion.php';
include '../App/conexion.php';

// Verifica si se ha enviado el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $id = $_POST["id"];
    $nuevoNombre = $_POST["nombre_a"];

    // Prepara la consulta SQL para actualizar el año académico
    $sql = "UPDATE gestion_a SET nombre_a = ? WHERE id = ?";

    // Verifica si la conexión está abierta antes de preparar la consulta
    if (!$conexion->connect_error) {
        // Prepara la sentencia
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            // Asocia los parámetros
            $stmt->bind_param("si", $nuevoNombre, $id);

            // Ejecuta la sentencia
            if ($stmt->execute()) {
                // Redirige a la página de academico.php u otra página
                echo '<script>window.location.href = "./crear_a.php";</script>';
                exit;
            } else {
                echo '<div class="alert alert-danger" role="alert">Error al actualizar el año académico: ' . $stmt->error . '</div>';
            }

            // Cierra la sentencia
            $stmt->close();
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al preparar la sentencia: ' . $conexion->error . '</div>';
        }
    }
}


// Recupera el año académico a editar (puedes hacerlo a través de $_GET o una consulta a la base de datos)
$id_a_editar = $_GET["id"];

// Realiza una consulta para obtener los datos actuales del año académico
$sql = "SELECT id, nombre_a FROM gestion_a WHERE id = ?";
$stmt = $conexion->prepare($sql);

if ($stmt) {
    // Asocia los parámetros
    $stmt->bind_param("i", $id_a_editar);

    // Ejecuta la consulta
    $stmt->execute();

    // Obtiene los resultados
    $stmt->bind_result($id, $nombre_a);
    $stmt->fetch();

    // Cierra la consulta
    $stmt->close();
} else {
    echo '<div class="alert alert-danger" role="alert">Error al preparar la consulta: ' . $conexion->error . '</div>';
}
?>





<div class="espacecustom mt-4 rounded p-4 ">
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Campo oculto para pasar el ID -->
        <div class="form-group">
            <label for="nombre_a">Nombre del Año Académico:</label>
            <input type="text" class="form-control" id="nombre_a" name="nombre_a" value="<?php echo $nombre_a; ?>" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>