<?php
include './navegacion.php';
?>
<?php
// Verifica si se ha enviado el ID a través de la URL
if (isset($_GET['id'])) {
    $id_materia_editar = $_GET['id'];

    // Prepara la consulta SQL para obtener los datos de la materia a editar
    $sql = "SELECT id, codigo_materia, nombre_materia, id_grupo FROM materias WHERE id = ?";
    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        // Asocia el parámetro
        $stmt->bind_param("i", $id_materia_editar);

        // Ejecuta la consulta
        $stmt->execute();

        // Obtiene los resultados
        $stmt->bind_result($id, $codigo_materia, $nombre_materia, $id_grupo);
        $stmt->fetch();

        // Cierra la consulta
        $stmt->close();
    } else {
        echo '<div class="alert alert-danger" role="alert">Error al preparar la consulta: ' . $conexion->error . '</div>';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $id_materia = $_POST["id_materia"];
    $nuevoCodigoMateria = $_POST["codigo_materia"];
    $nuevoNombreMateria = $_POST["nombre_materia"];
    $nuevoIdGrupo = $_POST["id_grupo"];
    $id_docente = $_POST["id_docente"];


    // Prepara la consulta SQL para actualizar la materia
    $sql = "UPDATE materias SET codigo_materia = ?, id_docente =?, nombre_materia = ?, id_grupo = ? WHERE id = ?";

    // Verifica si la conexión está abierta antes de preparar la consulta
    if (!$conexion->connect_error) {
        // Prepara la sentencia
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            // Asocia los parámetros
            $stmt->bind_param("sssss", $nuevoCodigoMateria, $id_docente, $nuevoNombreMateria, $nuevoIdGrupo, $id_materia);

            // Ejecuta la sentencia
            if ($stmt->execute()) {
                // Redirige a la página de materias.php u otra página
                echo '<script>alert("Materia actualizada con éxito.");</script>';
                echo '<script>window.location.href = "./modulos.php";</script>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error al actualizar la materia: ' . $stmt->error . '</div>';
            }

            // Cierra la sentencia
            $stmt->close();
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al preparar la sentencia: ' . $conexion->error . '</div>';
        }
    }
}
?>

<div class="espacecustom mt-4 rounded p-4 ">
    <h3 class="fw-bolder ms-2">Editar Materia</h3>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
        <input type="hidden" name="id_materia" value="<?php echo $id; ?>">
        <div class="form-group">
            <label for="codigo_materia">Código de Materia:</label>
            <input type="text" class="form-control" id="codigo_materia" name="codigo_materia" value="<?php echo $codigo_materia; ?>" required>
        </div>
        <div class="form-group">
            <label for="nombre_materia">Nombre de la Materia:</label>
            <input type="text" class="form-control" id="nombre_materia" name="nombre_materia" value="<?php echo $nombre_materia; ?>" required>
        </div>


        <div class="row">
            <!-- Quinta Columna -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_docente">Docente:</label>
                    <select class="form-control" id="id_docente" name="id_docente" required>
                        <?php
                        // Conecta a la base de datos y recupera los docentes
                        include("../bd.php");
                        $sql_docentes = "SELECT id, nombre, apellido FROM docentes"; // Añadido el campo 'apellido'
                        $result_docentes = $conexion->query($sql_docentes);

                        if ($result_docentes) {
                            while ($row_docente = $result_docentes->fetch_assoc()) {
                                echo '<option value="' . $row_docente['id'] . '">' . $row_docente['nombre'] . ' ' . $row_docente['apellido'] . '</option>'; // Agregado el campo 'apellido'
                            }
                        }
                        ?>

                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="id_grupo">Grupo:</label>
            <select class="form-control" id="id_grupo" name="id_grupo" required>
                <?php
                // Consulta para obtener los grupos
                $sql = "SELECT id, nombre_grupo, grupo FROM grupos";
                $result = $conexion->query($sql);

                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        $selected = ($row['id'] == $id_grupo) ? 'selected' : '';
                        echo "<option value='" . $row['id'] . "' $selected>" . $row['nombre_grupo'] . ' - Grupo ' . $row['grupo'] . "</option>";
                    }
                    $result->free();
                }
                ?>
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>

</div>