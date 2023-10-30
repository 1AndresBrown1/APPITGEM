<?php
include_once("./header.php");
include("../bd.php");

// Inicializar variables
$estudiantes = array();

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["grupo_id"])) {
    $grupo_id = $_POST["grupo_id"];

    // Consulta SQL para obtener estudiantes de un grupo específico
    $sql = "SELECT nombre, apellido FROM estudiantes WHERE grupo_id = ?";

    // Preparar la consulta
    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        // Asociar el parámetro
        $stmt->bind_param("i", $grupo_id);

        // Ejecutar la consulta
        $stmt->execute();

        // Vincular resultados
        $stmt->bind_result($nombre_estudiante, $apellido_estudiante);

        // Recopilar los resultados en un array
        while ($stmt->fetch()) {
            $estudiantes[] = array(
                'nombre' => $nombre_estudiante,
                'apellido' => $apellido_estudiante
            );
        }

        // Cerrar la consulta
        $stmt->close();
    }
}

include_once("./header.php");
?>


<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
            <h2 class="mt-5">Listado de Estudiantes por Grupo</h2>
            <form action="listar_estudiantes.php" method="POST">
                <div class="form-group">
                    <label for="grupo_id">Selecciona un grupo:</label>
                    <select class="form-control" name="grupo_id">
                        <?php
                        // Consultar y listar los grupos disponibles en la base de datos
                        $sql_grupos = "SELECT id, nombre_grupo FROM grupos";
                        $result_grupos = $conexion->query($sql_grupos);

                        if ($result_grupos) {
                            while ($row = $result_grupos->fetch_assoc()) {
                                $selected = (isset($_POST["grupo_id"]) && $_POST["grupo_id"] == $row['id']) ? 'selected' : '';
                                echo "<option value='" . $row['id'] . "' $selected>" . $row['nombre_grupo'] . "</option>";
                            }
                            $result_grupos->free();
                        }
                        ?>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Mostrar Estudiantes</button>
            </form>
            <table class="table mt-4">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($estudiantes as $estudiante) {
                        echo "<tr>";
                        echo "<td>" . $estudiante['nombre'] . "</td>";
                        echo "<td>" . $estudiante['apellido'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>