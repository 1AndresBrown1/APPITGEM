<?php
require '../App/conexion.php';
require  './navegacion.php';


// error_reporting(0);

// Consultar y listar los grupos disponibles en la base de datos junto con el nombre_a de gestion_a
$sql_grupos = "SELECT g.id, g.id_año, g.nombre_grupo, a.nombre_a FROM grupos g
               JOIN gestion_a a ON g.id_año = a.id";

$result_grupos = $conexion->query($sql_grupos);

if ($result_grupos) {
    while ($row = $result_grupos->fetch_assoc()) {
        $grupos[] = array(
            'id' => $row['id'],
            'id_año' => $row['id_año'],
            'nombre' => $row['nombre_grupo'],
            'nombre_a' => $row['nombre_a'] // Agregado para mostrar nombre_a
        );
    }
    $result_grupos->free();
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Directorio base para documentos
    $directorio_base = "documentos/";

    // Obtener el ID del estudiante desde la URL
    $estudiante_id = isset($_GET['id']) ? $_GET['id'] : null;

    // Verificar si se proporcionó un ID válido
    if ($estudiante_id) {
        // Conectar a la base de datos
        $conexion = new mysqli("localhost", "root", "", "academico");

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("La conexión ha fallado: " . $conexion->connect_error);
        }

        // Obtener el nombre del estudiante desde la base de datos
        $query_nombre = "SELECT nombre, apellido FROM estudiantes WHERE id = $estudiante_id";
        $resultado_nombre = $conexion->query($query_nombre);

        if ($resultado_nombre && $fila_nombre = $resultado_nombre->fetch_assoc()) {
            $nombre_estudiante = $fila_nombre['nombre'] . '_' . $fila_nombre['apellido'];

            // Directorio del estudiante
            $directorio_estudiante = $directorio_base . $nombre_estudiante . '/';

            // Añadir la ruta al directorio en la base de datos
            $ruta_directorio_estudiante = $directorio_estudiante;
            $query_actualizar_ruta = "UPDATE estudiantes SET ruta_documentos = '$ruta_directorio_estudiante' WHERE id = $estudiante_id";
            $conexion->query($query_actualizar_ruta);

            // Crear el directorio del estudiante si no existe
            if (!file_exists($directorio_estudiante)) {
                mkdir($directorio_estudiante, 0777, true);
            }

            // Mapear los nombres de archivos permitidos
            $nombres_archivos_permitidos = array(
                'cedula',
                'diploma',
                'eps',
                'recibo'
            );

            // Bandera para verificar si se han subido todos los documentos
            $documentos_subidos = true;

            // Iterar sobre los archivos
            foreach ($nombres_archivos_permitidos as $nombre_archivo) {
                // Construir el nombre del archivo y el destino
                $nombre_archivo_completo = $directorio_estudiante . $nombre_archivo . '.pdf';

                // Verificar si se cargó el archivo
                if (isset($_FILES[$nombre_archivo]) && $_FILES[$nombre_archivo]['error'] === UPLOAD_ERR_OK) {
                    // Mover el archivo al directorio del estudiante
                    move_uploaded_file($_FILES[$nombre_archivo]['tmp_name'], $nombre_archivo_completo);
                } else {
                    // Si no se cargó el archivo, establecer la bandera a falso
                    $documentos_subidos = false;
                }
            }

            if ($documentos_subidos) {

                // Actualizar el estado en la base de datos
                $query_actualizar_estado = "UPDATE estudiantes SET estado = 'Documentos subidos' WHERE id = $estudiante_id";
                $conexion->query($query_actualizar_estado);

                // Mensaje de éxito
                $mensaje_exito = "Documentos guardados exitosamente.";
            } else {
                // Mensaje de error si no se pudieron subir todos los documentos
                $mensaje_error = "Error: No se pudieron subir todos los documentos.";
            }
        } else {
            // Mensaje de error si no se pudo obtener el nombre del estudiante
            $mensaje_error = "Error: No se pudo obtener el nombre del estudiante.";
        }

        // Cerrar la conexión a la base de datos
        $conexion->close();
    } else {
        // Mensaje de error si no se proporcionó un ID válido
        $mensaje_error = "Error: ID de estudiante no válido.";
    }

    // Limpiar los campos del formulario después de procesar el formulario
    echo "<script>
            setTimeout(function() {
                document.getElementById('cedula').value = '';
                document.getElementById('diploma').value = '';
                document.getElementById('eps').value = '';
                document.getElementById('recibo').value = '';
                // Recargar la página después de 2 segundos
                window.location.href = window.location.href;
            }, 200000); // 2000 milisegundos = 2 segundos
          </script>";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Carga de Documentos</title>
</head>

<body>
    <h2 style="font-weight: bold;">Formulario de Carga de Documentos</h2>

    <?php
    // Mostrar mensajes de éxito o error
    if (isset($mensaje_exito)) {
        echo "<div class='alert alert-success'>$mensaje_exito</div>";
    } elseif (isset($mensaje_error)) {
        echo "<div class='alert alert-danger'>$mensaje_error</div>";
    }
    ?>

    <div class="container mt-4">
        <form action="matriculas_estudiantes.php?id=<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>" method="post" enctype="multipart/form-data">
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cedula">Cargar Cédula (PDF):</label>
                        <input type="file" name="cedula" id="cedula" accept=".pdf" required class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="diploma">Cargar Diploma (PDF):</label>
                        <input type="file" name="diploma" id="diploma" accept=".pdf" required class="form-control">
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="eps">Cargar EPS (PDF):</label>
                        <input type="file" name="eps" id="eps" accept=".pdf" required class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recibo">Cargar Recibo (PDF):</label>
                        <input type="file" name="recibo" id="recibo" accept=".pdf" required class="form-control">
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Guardar Documentos</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>