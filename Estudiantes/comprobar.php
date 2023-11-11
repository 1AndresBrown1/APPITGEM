<?php
require '../bd.php';
session_start();

$identificacion = $_SESSION['identificacion_usuario'];

// Obtén el estado de matrícula del estudiante
$estadoMatricula = obtenerEstadoMatricula($identificacion, $conexion);

// Verifica si la matrícula está pagada
if ($estadoMatricula == 'pagado') {
    // La matrícula está pagada, puedes cargar las notas
    cargarNotasEstudiante($identificacion, $conexion);
    // Redirige al dashboard del estudiante
    header("Location: nota.php");
    echo $estadoMatricula, " ", $_SESSION['estudiante'], "  ", $identificacion;
    exit();
} else {
    // La matrícula no está pagada, muestra un mensaje
    $mensaje = '¡Su matrícula no está pagada! Por favor, realice el pago para acceder a las notas.';
    echo $estadoMatricula, " ", $_SESSION['estudiante'], "  ", $identificacion, "  ", $mensaje;
}

function obtenerEstadoMatricula($identificacion, $conn)
{
    // Implementa la lógica para obtener el estado de matrícula de la base de datos
    // Utiliza la variable $conn para realizar la consulta
    // Devuelve 'pagado' o 'sin_saldar' según el estado de matrícula
    $sql = "SELECT TRIM(estado_matricula) as estado_matricula FROM estudiantes WHERE documento_identidad = '$identificacion'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['estado_matricula'] !== '' ? $row['estado_matricula'] : 'sin_saldar';
    }

    return 'sin_saldar'; // Valor predeterminado si no se encuentra el estado de matrícula
}

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
        // Ejemplo: $_SESSION['notas'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
?>
