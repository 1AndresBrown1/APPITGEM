<?php
require "./navegacion_estudiantes.php";

$identificacion = $_SESSION['identificacion_usuario'];

// Obtén el estado de matrícula del estudiante
// ... (tu lógica para obtener el estado de matrícula)

// Llama a la función para cargar las notas del estudiante
cargarNotasEstudiante($identificacion, $conexion);

function cargarNotasEstudiante($identificacion, $conn)
{
    // Implementa la lógica para cargar las notas del estudiante desde la base de datos
    // Utiliza la variable $conn para realizar la consulta
    // Almacena las notas en las variables de sesión necesarias
    // Ejemplo:
    $sql = "SELECT * FROM notas INNER JOIN materias ON notas.materia_id = materias.id
            WHERE estudiante_id = (SELECT id FROM estudiantes WHERE documento_identidad = '$identificacion' LIMIT 1
)";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Procesar las notas y almacenarlas en variables de sesión si es necesario
        $_SESSION['notas'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var contrasenaInput = document.getElementById("contrasena");
        var verificarContrasenaInput = document.getElementById("verificarContrasena");

        function validarContrasenas() {
            var contrasena = contrasenaInput.value;
            var verificarContrasena = verificarContrasenaInput.value;

            if (contrasena === verificarContrasena) {
                // Contraseñas coinciden, aplicar estilo verde
                verificarContrasenaInput.style.borderColor = "green";
            } else {
                // Contraseñas no coinciden, aplicar estilo rojo
                verificarContrasenaInput.style.borderColor = "red";
            }
        }

        contrasenaInput.addEventListener("input", validarContrasenas);
        verificarContrasenaInput.addEventListener("input", validarContrasenas);

        // Evento para reiniciar el estilo cuando se enfoca en el campo
        verificarContrasenaInput.addEventListener("focus", function() {
            verificarContrasenaInput.style.borderColor = "";
        });
    });
</script>
<!--start page wrapper -->

<div class="espacecustom p-4 mt-4 border">
    <?php if (isset($_SESSION['notas']) && !empty($_SESSION['notas'])) : ?>
        <h3 class="mb-3 fw-bold">Definitiva:</h3>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm">
                <thead>
                    <tr>
                        <th>Modulo</th>
                        <th>Nota</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['notas'] as $nota) : ?>
                        <tr>
                            <td><?= $nota['nombre_materia'] ?></td>
                            <td style="<?= ($nota['nota'] == 5) ? 'background: #22c55e; color: white' : (($nota['nota'] >= 4.6 && $nota['nota'] < 5) ? 'background: #22c55e; color: white' : (($nota['nota'] >= 3.8 && $nota['nota'] <= 4.5) ? 'background: #3b82f6; color: white' : (($nota['nota'] >= 1.0 && $nota['nota'] <= 3.8) ? 'background: red; color: white' : ''))) ?>">
                                <?= $nota['nota'] ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <p>No hay notas disponibles.</p>
    <?php endif; ?>

    <span class="badge text-bg-danger">Reprobado</span>
    <span class="badge text-bg-primary">Aprobado</span>
    <span class="badge text-bg-success">Superior</span>

</div>