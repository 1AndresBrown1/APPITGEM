<?php
require '../bd.php';
session_start();

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
            WHERE estudiante_id = (SELECT id FROM estudiantes WHERE documento_identidad = '$identificacion')";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Procesar las notas y almacenarlas en variables de sesión si es necesario
        $_SESSION['notas'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Estudiante</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <?php if (isset($_SESSION['notas']) && !empty($_SESSION['notas'])): ?>
        <h2>Notas:</h2>
        <table>
            <thead>
                <tr>
                    <th>Materia</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['notas'] as $nota): ?>
                    <tr>
                        <td><?= $nota['nombre_materia'] ?></td>
                        <td><?= $nota['nota'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay notas disponibles.</p>
    <?php endif; ?>
</body>
</html>
