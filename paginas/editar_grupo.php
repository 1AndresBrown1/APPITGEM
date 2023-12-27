<?php
include_once("./header.php");
include("../bd.php");

// Verifica si se ha enviado el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $id = $_POST["id"];
    $nuevoNombre = $_POST["nombre_grupo"];
    $nuevoGrupo = $_POST["grupo"];
    $nuevoAñoAcademico = $_POST["id_año"];
    $nuevoDocente = $_POST["id_docente"];

    // Prepara la consulta SQL para actualizar todos los campos del grupo
    $sql = "UPDATE grupos SET nombre_grupo = ?, grupo = ?, id_año = ?, id_docente = ? WHERE id = ?";

    // Verifica si la conexión está abierta antes de preparar la consulta
    if (!$conexion->connect_error) {
        // Prepara la sentencia
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            // Asocia los parámetros
            $stmt->bind_param("siiii", $nuevoNombre, $nuevoGrupo, $nuevoAñoAcademico, $nuevoDocente, $id);

            // Ejecuta la sentencia
            if ($stmt->execute()) {
                // Redirige a la página de grupos.php u otra página
                echo '<script>window.location.href = "./academico.php";</script>';
                exit;
            } else {
                echo '<div class="alert alert-danger" role="alert">Error al actualizar los datos del grupo: ' . $stmt->error . '</div>';
            }

            // Cierra la sentencia
            $stmt->close();
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al preparar la sentencia: ' . $conexion->error . '</div>';
        }
    }
}

// Recupera el grupo a editar (puedes hacerlo a través de $_GET o una consulta a la base de datos)
$id_grupo_a_editar = $_GET["id"];

// Realiza una consulta para obtener los datos actuales del grupo
$sql = "SELECT g.id, g.nombre_grupo, g.grupo, g.id_año, g.id_docente, d.nombre, a.nombre_a
        FROM grupos g 
        INNER JOIN docentes d ON g.id_docente = d.id
        INNER JOIN gestion_a a ON g.id_año = a.id
        WHERE g.id = ?";
$stmt = $conexion->prepare($sql);

if ($stmt) {
    // Asocia los parámetros
    $stmt->bind_param("i", $id_grupo_a_editar);

    // Ejecuta la consulta
    $stmt->execute();

    // Obtiene los resultados
    $stmt->bind_result($id, $nombre_grupo, $grupo, $id_año, $id_docente, $nombre_docente, $nombre_a);
    $stmt->fetch();

    // Cierra la consulta
    $stmt->close();
} else {
    echo '<div class="alert alert-danger" role="alert">Error al preparar la consulta: ' . $conexion->error . '</div>';
}
?>

<!-- A continuación, muestra un formulario para editar todos los datos del grupo con los datos actuales -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
            <h2>Editar Grupo</h2>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Campo oculto para pasar el ID del grupo -->
                <div class="form-group">
                    <label for="nombre_grupo">Nombre del Grupo:</label>
                    <input type="text" class="form-control" id="nombre_grupo" name="nombre_grupo" value="<?php echo $nombre_grupo; ?>" required>
                </div>
                <div class="form-group">
                    <label for="grupo">Grupo:</label>
                    <input type="number" class="form-control" id="grupo" name="grupo" value="<?php echo $grupo; ?>" required>
                </div>
                <div class="form-group">
                    <label for="id_año">Año Académico:</label>
                    <select class="form-control" id="id_año" name="id_año" required>
                        <?php
                        // Consulta para obtener la lista de años académicos
                        $sql_años = "SELECT id, nombre_a FROM gestion_a";
                        $result_años = $conexion->query($sql_años);

                        if ($result_años) {
                            while ($row_año = $result_años->fetch_assoc()) {
                                $selected_año = ($row_año['id'] == $id_año) ? 'selected' : '';
                                echo '<option value="' . $row_año['id'] . '" ' . $selected_año . '>' . $row_año['nombre_a'] . '</option>';
                            }
                            $result_años->free();
                        } else {
                            echo '<option value="" disabled>No hay años académicos disponibles</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_docente">Docente:</label>
                    <select class="form-control" id="id_docente" name="id_docente" required>
                        <?php
                        // Consulta para obtener la lista de docentes
                        $sql_docentes = "SELECT id, nombre FROM docentes";
                        $result_docentes = $conexion->query($sql_docentes);

                        if ($result_docentes) {
                            while ($row_docente = $result_docentes->fetch_assoc()) {
                                $selected_docente = ($row_docente['id'] == $id_docente) ? 'selected' : '';
                                echo '<option value="' . $row_docente['id'] . '" ' . $selected_docente . '>' . $row_docente['nombre'] . '</option>';
                            }
                            $result_docentes->free();
                        } else {
                            echo '<option value="" disabled>No hay docentes disponibles</option>';
                        }
                        ?>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
</div>
