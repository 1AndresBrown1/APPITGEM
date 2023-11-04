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
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verifica que los datos se están recibiendo correctamente
    if (isset($_POST['notas'])) {
        $notas = json_decode($_POST['notas'], true);

        // Asegúrate de que los datos se decodifican correctamente
        if ($notas) {
            foreach ($notas as $estudianteId => $materias) {
                foreach ($materias as $materiaId => $nota) {
                    // Verifica los datos que se están recibiendo
                    error_log("Estudiante ID: " . $estudianteId . " Materia ID: " . $materiaId . " Nota: " . $nota);

                    // Verificar si ya existe una nota para este estudiante y materia
                    $notaExistente = obtenerNotaExistente($estudianteId, $materiaId);

                    // Si existe una nota, actualiza el registro en lugar de insertar uno nuevo
                    if ($notaExistente !== null) {
                        $sql_update = "UPDATE notas SET nota = ? WHERE estudiante_id = ? AND materia_id = ?";
                        $stmt = $conexion->prepare($sql_update);
                        $stmt->bind_param("dii", $nota, $estudianteId, $materiaId);
                        $stmt->execute();
                        $stmt->close();
                    } else {
                        // Si no hay una nota existente, inserta una nueva
                        $sql_insert = "INSERT INTO notas (estudiante_id, materia_id, nota) VALUES (?, ?, ?)";
                        $stmt = $conexion->prepare($sql_insert);
                        $stmt->bind_param("iii", $estudianteId, $materiaId, $nota);
                        $stmt->execute();
                        $stmt->close();
                    }
                }
            }
        } else {
            error_log("Error al decodificar los datos JSON: " . json_last_error_msg());
        }
    } else {
        error_log("No se encontraron datos de notas en la solicitud POST");
    }
}
function obtenerNotaExistente($estudianteId, $materiaId) {
    include("../bd.php");
    $sql_nota_existente = "SELECT nota FROM notas WHERE estudiante_id = ? AND materia_id = ?";
    $stmt_nota_existente = $conexion->prepare($sql_nota_existente);

    if ($stmt_nota_existente) {
        $stmt_nota_existente->bind_param("ii", $estudianteId, $materiaId);
        $stmt_nota_existente->execute();
        $stmt_nota_existente->bind_result($nota_existente);

        if ($stmt_nota_existente->fetch()) {
            $stmt_nota_existente->close();
            return $nota_existente;
        }

        $stmt_nota_existente->close();
    }

    return null;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['notas'])) {
        $notas = json_decode($_POST['notas'], true);

        if ($notas) {
            foreach ($notas as $estudianteId => $materias) {
                foreach ($materias as $materiaId => $nota) {
                    $notaExistente = obtenerNotaExistente($estudianteId, $materiaId);

                    if ($notaExistente !== null) {
                        $sql_update = "UPDATE notas SET nota = ? WHERE estudiante_id = ? AND materia_id = ?";
                        $stmt = $conexion->prepare($sql_update);
                        $stmt->bind_param("dii", $nota, $estudianteId, $materiaId);
                        $stmt->execute();
                        $stmt->close();
                    } else {
                        $sql_insert = "INSERT INTO notas (estudiante_id, materia_id, nota) VALUES (?, ?, ?)";
                        $stmt = $conexion->prepare($sql_insert);
                        $stmt->bind_param("iii", $estudianteId, $materiaId, $nota);
                        $stmt->execute();
                        $stmt->close();
                    }
                }
            }
        } else {
            error_log("Error al decodificar los datos JSON: " . json_last_error_msg());
        }
    } else {
        error_log("No se encontraron datos de notas en la solicitud POST");
    }
}
?>


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
                            $notaActual = obtenerNotaExistente($estudiante['id'], $materia['id']); // Función para obtener la nota previamente registrada
                            $notaMostrar = $notaActual !== null ? $notaActual : ''; // Si no existe una nota, muestra un campo vacío
                            echo "<input id='nota' type='number' name='nota[{$estudiante['id']}][{$materia['id']}]' step='0.1' class='nota-input' value='{$notaMostrar}'>";
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


<script>
  const notasForm = document.getElementById('notasForm');

  if (notasForm) {
    notasForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      const formData = new FormData(notasForm);
      const notasData = {};

      for (let pair of formData.entries()) {
        const [key, value] = pair;
        const parts = key.split('['); // Separar en partes
        const estudianteId = parts[1].split(']')[0]; // Obtener el ID del estudiante
        const materiaId = parts[2].split(']')[0]; // Obtener el ID de la materia
        if (!notasData[estudianteId]) {
          notasData[estudianteId] = {};
        }
        notasData[estudianteId][materiaId] = value;
      }

      // Obtener los nombres de los estudiantes y las materias
      const nombres = {};
      const estudiantes = <?= json_encode($estudiantes) ?>;
      const materias = <?= json_encode($materias) ?>;
      estudiantes.forEach(estudiante => {
        nombres[estudiante.id] = estudiante.nombre + ' ' + estudiante.apellido;
      });

      const materiaNombres = {};
      materias.forEach(materia => {
        materiaNombres[materia.id] = materia.nombre;
      });

      // Mostrar alerta con los datos que se enviarán
      const datosAMostrar = {};
      for (const estudianteId in notasData) {
        const notasEstudiante = notasData[estudianteId];
        const nombreEstudiante = nombres[estudianteId];
        datosAMostrar[nombreEstudiante] = {};
        for (const materiaId in notasEstudiante) {
          const nota = notasEstudiante[materiaId];
          const nombreMateria = materiaNombres[materiaId];
          datosAMostrar[nombreEstudiante][nombreMateria] = nota;
        }
      }

      //alert("Datos a enviar: " + JSON.stringify(datosAMostrar));
      alert("Datos registrados con exito " + "Datos a enviar: " + JSON.stringify(datosAMostrar));
      try {
        const response = await fetch('procesar_notas.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(notasData)
        });
        const data = await response.json();
        console.log(data); // Verifica la respuesta desde procesar_notas.php
      } catch (error) {
        console.error('Error al enviar los datos', error);
      }
    });
  }
</script>
        </div>
    </div>
</div>
