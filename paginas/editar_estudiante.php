<?php
include_once("./header.php");
include("../bd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $fechaNacimiento = $_POST["fecha_nacimiento"];
    $genero = $_POST["genero"];
    $grupoId = $_POST["grupo"];

    // Prepara la consulta SQL para actualizar el estudiante
    $sql = "UPDATE estudiantes SET nombre = ?, apellido = ?, fecha_nacimiento = ?, genero = ?, grupo_id = ? WHERE id = ?";

    // Verifica si la conexión está abierta antes de preparar la consulta
    if (!$conexion->connect_error) {
        // Prepara la sentencia
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            // Asocia los parámetros
            $stmt->bind_param("ssssii", $nombre, $apellido, $fechaNacimiento, $genero, $grupoId, $id);

            // Ejecuta la sentencia
            if ($stmt->execute()) {
                // Redirige a la página de estudiantes o a otra página
                echo '<script>alert("El estudiante se ha actualizado con éxito.");</script>';
                echo '<script>window.location.href = "./estudiantes.php";</script>';
                exit;
            } else {
                echo '<div class="alert alert-danger" role="alert">Error al actualizar el estudiante: ' . $stmt->error . '</div>';
            }

            // Cierra la sentencia
            $stmt->close();
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al preparar la sentencia: ' . $conexion->error . '</div>';
        }
    }
}

// Recupera el ID del estudiante a editar (puedes hacerlo a través de $_GET o una consulta a la base de datos)
$id_estudiante_a_editar = $_GET["id"];

// Realiza una consulta para obtener los datos actuales del estudiante
$sql = "SELECT e.id, e.nombre, e.apellido, e.fecha_nacimiento, e.genero, e.grupo_id 
        FROM estudiantes e
        WHERE e.id = ?";
$stmt = $conexion->prepare($sql);

if ($stmt) {
    // Asocia los parámetros
    $stmt->bind_param("i", $id_estudiante_a_editar);

    // Ejecuta la consulta
    $stmt->execute();

    // Obtiene los resultados
    $stmt->bind_result($id, $nombre, $apellido, $fechaNacimiento, $genero, $grupoId);
    $stmt->fetch();

    // Cierra la consulta
    $stmt->close();
} else {
    echo '<div class="alert alert-danger" role="alert">Error al preparar la consulta: ' . $conexion->error . '</div>';
}
?>

<!-- A continuación, muestra un formulario para editar el estudiante con los datos actuales -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
            <h2>Editar Estudiante</h2>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Campo oculto para pasar el ID -->
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $apellido; ?>" required>
                </div>
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $fechaNacimiento; ?>" required>
                </div>
                <div class="form-group">
                    <label for="genero">Género:</label>
                    <select class="form-control" id="genero" name="genero" required>
                        <option value="">Selecciona un género</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="grupo">Grupo de Estudios:</label>
                    <select class="form-control" id="grupo" name="grupo" required>
                        <?php
                        // Consulta para obtener los grupos
                        $sql = "SELECT g.id AS grupo_id, g.nombre_grupo, a.nombre_a FROM grupos g INNER JOIN gestion_a a ON g.id_año = a.id";
                        $result = $conexion->query($sql);

                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                                $selected = ($row['grupo_id'] == $grupoId) ? 'selected' : '';
                                echo "<option value='" . $row['grupo_id'] . "' $selected>" . $row['nombre_grupo'] . " (" . $row['nombre_a'] . ")</option>";
                            }

                            $result->free();
                        } else {
                            echo "<option value=''>No hay grupos disponibles</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Estudiante</button>
            </form>
        </div>
    </div>
</div>
