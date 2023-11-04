<?php
include_once("./header.php");
include("../bd.php");

// Variables
$grupos = array();
$estudiantes = array();
$materias = array();

// Verificar si se ha enviado el formulario de selección de grupo
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["grupo_id"])) {
    $grupo_id = $_POST["grupo_id"];

    // Consulta SQL para obtener estudiantes asociados a ese grupo
    $sql_estudiantes = "SELECT id, nombre, apellido FROM estudiantes WHERE grupo_id = ?";
    $stmt_estudiantes = $conexion->prepare($sql_estudiantes);

    if ($stmt_estudiantes) {
        $stmt_estudiantes->bind_param("i", $grupo_id);
        $stmt_estudiantes->execute();
        $stmt_estudiantes->bind_result($id_estudiante, $nombre_estudiante, $apellido_estudiante);

        while ($stmt_estudiantes->fetch()) {
            $estudiantes[] = array(
                'id' => $id_estudiante,
                'nombre' => $nombre_estudiante,
                'apellido' => $apellido_estudiante
            );
        }

        $stmt_estudiantes->close();
    }

    // Consulta SQL para obtener las materias asociadas a ese grupo
    $sql_materias = "SELECT id, nombre_materia FROM materias WHERE id_grupo = ?";
    $stmt_materias = $conexion->prepare($sql_materias);

    if ($stmt_materias) {
        $stmt_materias->bind_param("i", $grupo_id);
        $stmt_materias->execute();
        $stmt_materias->bind_result($id_materia, $nombre_materia);

        while ($stmt_materias->fetch()) {
            $materias[] = array(
                'id' => $id_materia,
                'nombre' => $nombre_materia
            );
        }

        $stmt_materias->close();
    }
}

// Consultar y listar los grupos disponibles en la base de datos
$sql_grupos = "SELECT id, nombre_grupo FROM grupos";
$result_grupos = $conexion->query($sql_grupos);

if ($result_grupos) {
    while ($row = $result_grupos->fetch_assoc()) {
        $grupos[] = array(
            'id' => $row['id'],
            'nombre' => $row['nombre_grupo']
        );
    }
    $result_grupos->free();
}
?>
<script>
    const notasForm = document.getElementById('notasForm');

    // Asegúrate de que el formulario esté definido antes de adjuntar el evento
    if (notasForm) {
        notasForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(notasForm);
            const notasData = {};

            for (let pair of formData.entries()) {
                const [key, value] = pair;
                const [estudianteId, materiaId] = key.split('][');
                const id = estudianteId.substring(6);
                if (!notasData[id]) {
                    notasData[id] = {};
                }
                notasData[id][materiaId] = value;
            }

            console.log(notasData);

            const finalFormData = new FormData();
            finalFormData.append('notas', JSON.stringify(notasData));

            try {
                const response = await fetch('procesar_notas.php', {
                    method: 'POST',
                    body: finalFormData
                });
                const data = await response.json();
                console.log(data); // Verifica la respuesta desde procesar_notas.php
            } catch (error) {
                console.error('Error al enviar los datos', error);
            }
        });
    }
</script>
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
            <h2 class="mt-5">Notas de Estudiantes</h2>
            <form action="notas.php" method="POST" id="seleccionGrupoForm"> <!-- Cambiado a un nuevo ID -->
                <div class="form-group">
                    <label for="grupo_id">Selecciona un grupo:</label>
                    <select class="form-control" name="grupo_id">
                        <option value="" disabled selected>Elige un grupo</option>
                        <?php
                        foreach ($grupos as $grupo) {
                            echo "<option value='" . $grupo['id'] . "'>" . $grupo['nombre'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Mostrar Estudiantes y Materias</button>
            </form>

            <!-- Mostrar la lista de estudiantes asociados al grupo seleccionado -->
            <?php
    if (!empty($estudiantes) && !empty($materias)) {
        echo "<h3>Estudiantes asociados al grupo seleccionado:</h3>";
        echo "<form id='notasForm'>"; 
        echo "<table class='table mt-4'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>";
        echo "<th>Estudiante</th>";
        foreach ($materias as $materia) {
            echo "<th>{$materia['nombre']}</th>";
        }
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($estudiantes as $estudiante) {
            echo "<tr>";
            echo "<td>{$estudiante['nombre']} {$estudiante['apellido']}</td>";

            foreach ($materias as $materia) {
                echo "<td>";
                echo "<input type='number' name='nota[{$estudiante['id']}][{$materia['id']}]' step='0.1' class='nota-input'>";
                echo "</td>";
            }

            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "<button type='submit' class='btn btn-primary'>Guardar Notas</button>";
        echo "</form>";
    }
?>
        </div>
    </div>
</div>




