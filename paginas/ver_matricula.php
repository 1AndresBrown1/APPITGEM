<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $estudiante_id = $_GET['id'];

    // Conectar a la base de datos (ajusta las credenciales según tu configuración)
    $conn = new mysqli("localhost", "root", "", "academico");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("La conexión ha fallado: " . $conn->connect_error);
    }

    // Consulta para obtener la información del estudiante
    $query = "SELECT nombre, apellido, documento_identidad, ruta_documentos FROM estudiantes WHERE id = $estudiante_id";
    $result = $conn->query($query);

    // Comprobar si se encontró el estudiante
    if ($result && $result->num_rows > 0) {
        $estudiante = $result->fetch_assoc();
?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Detalles del Estudiante</title>
            <!-- Agrega los enlaces a Bootstrap aquí -->
            <link rel="stylesheet" href="ruta/a/tu/estilo/bootstrap.min.css">
            <script src="ruta/a/tu/estilo/bootstrap.bundle.min.js"></script>
        </head>

        <body>
            <!-- Modal que se abre automáticamente al cargar la página -->
            <div class="modal fade show" id="detallesEstudianteModal" tabindex="-1" aria-labelledby="detallesEstudianteModalLabel" aria-hidden="true" style="display: block;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detallesEstudianteModalLabel">Detalles del Estudiante</h5>
                        </div>
                        <div class="modal-body">
                            <!-- Contenido del modal -->
                            <p>Nombre: <?php echo $estudiante['nombre'] . ' ' . $estudiante['apellido']; ?></p>
                            <p>Cédula: <?php echo $estudiante['documento_identidad']; ?></p>
                            <p>Documentos: <a href="<?php echo $estudiante['ruta_documentos']; ?>">Ver</a></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Agrega los scripts de Bootstrap aquí -->
            <script src="ruta/a/tu/estilo/bootstrap.min.js"></script>
        </body>

        </html>
<?php
    } else {
        // Mensaje si no se encuentra el estudiante
        echo "Estudiante no encontrado";
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Mensaje si no se proporcionó un ID válido
    echo "ID de estudiante no válido";
}
?>
