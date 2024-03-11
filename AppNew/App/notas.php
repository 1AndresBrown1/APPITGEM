<?php
include_once './conexion.php';

// Iniciar la sesión
session_start();

$id_usuario = $_SESSION['id_usuario'];


// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    // El usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
    header("Location: login.php");
    exit; // Detener la ejecución del script después de redirigir
}


// Obtener el ID del docente asociado al usuario actual
$sql = "SELECT id FROM docentes WHERE usuario_id = $id_usuario";

// Ejecutar la consulta
$resultado = $conexion->query($sql);

// Verificar si se encontró el docente asociado
if ($resultado->num_rows > 0) {
    // Obtener el ID del docente
    $fila = $resultado->fetch_assoc();
    $id_docente = $fila['id'];

    // Consultar el nombre del docente
    $sql_nombre_docente = "SELECT nombres, apellidos FROM docentes WHERE id = $id_docente";

    // Ejecutar la consulta
    $resultado_nombre_docente = $conexion->query($sql_nombre_docente);

    // Verificar si se encontró el nombre del docente
    if ($resultado_nombre_docente->num_rows > 0) {
        // Obtener el nombre del docente
        $fila_nombre_docente = $resultado_nombre_docente->fetch_assoc();
        $nombre_docente = $fila_nombre_docente['nombres'] . " " . $fila_nombre_docente['apellidos'];

        // Mostrar el nombre del docente por consola
    } else {
        echo "No se encontró el nombre del docente.";
    }
} else {
    echo "No se encontró el docente asociado al usuario actual.";
}

// Verificar si se ha enviado un formulario con el grupo seleccionado
if (isset($_POST['grupo_materias'])) {
    $id_grupo_seleccionado = $_POST['grupo_materias'];

    // Consulta SQL para obtener las materias del grupo seleccionado que imparte el docente
    $sql_materias_grupo = "SELECT m.nombre_materia
                           FROM materias m
                           INNER JOIN grupos g ON m.grupo_asignado = g.id
                           WHERE m.docente_asignado IN (
                               SELECT id
                               FROM docentes
                               WHERE usuario_id = $id_usuario
                           )
                           AND g.id = $id_grupo_seleccionado";

    // Ejecutar la consulta para obtener las materias del grupo
    $resultado_materias_grupo = $conexion->query($sql_materias_grupo);
}

// Consultar el nombre y apellido del administrador correspondiente al usuario actual
$sql = "SELECT docentes.nombres, docentes.apellidos 
        FROM docentes 
        INNER JOIN usuarios ON docentes.usuario_id = usuarios.id 
        WHERE usuarios.id = $id_usuario";

$resultado = $conexion->query($sql);

// Verificar si se encontró el administrador correspondiente
if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $nombre_administrador = $fila['nombres'];
    $apellido_administrador = $fila['apellidos'];
} else {
    $nombre_administrador = "Administrador no encontrado";
    $apellido_administrador = "";
}


// Verificar si el usuario tiene el rol de 'estudiante'
if ($_SESSION['rol'] === 'admin' || $_SESSION['rol'] === 'estudiante' || $_SESSION['rol'] === 'root') {
    // El usuario tiene el rol de 'docente' o 'estudiante', redirigirlo a otra página, como 'error.php'
    header("Location: ../error.php");
    exit; // Detener la ejecución del script después de redirigir
}

// El usuario ha iniciado sesión y no es 'docente', puedes continuar con el contenido de la página
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOCENTE</title>

    <link rel="stylesheet" href="../recursos/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../recursos/style.css">
    <link rel="shortcut icon" href="./recursos/img/logo-grande.svg" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">


</head>

<body>

    <div style="background: none !important; font-size: 20px;" class="espacecustom mt-4">

        <?php
        // Definir un array asociativo para mapear los roles a los colores de los badges
        $colores_roles = array(
            'admin' => 'danger',
            'docente' => 'primary',
            'estudiante' => 'success'
            // Agrega aquí más roles y colores si es necesario
        );

        // Obtener el rol del usuario actual desde la sesión
        $rol_usuario = $_SESSION['rol'];

        // Verificar si el rol del usuario está definido en el array de colores
        $badge_color = isset($colores_roles[$rol_usuario]) ? $colores_roles[$rol_usuario] : 'secondary';

        // Mostrar el rol del usuario en el badge
        echo '<span class="ms-1 badge bg-' . $badge_color . '">' . ucfirst($rol_usuario) . '</span>';
        echo '<span class="ms-1 badge bg-' . $badge_color . '">' . ucfirst($nombre_administrador) . " " . ucfirst($apellido_administrador) .  '</span>';
        ?>
    </div>

    <div class="espacecustom mt-4 border">
        <!--  -->
        <nav class="navbar navbar-expand-lg" aria-label="Offcanvas navbar large">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="../recursos/img/logo-grande.svg" alt="Logo" width="60" height="60" class="d-inline-block align-text-top">
                    <span style="font-size: 24px; color: rgb(44, 44, 44);" class="ms-2 fw-bolder">Sistema
                        Académico</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
                    <div class="offcanvas-header">
                        <a class="navbar-brand d-flex align-items-center" href="#">
                            <img src="../recursos/img/logo-grande.svg" alt="Logo" width="60" height="60" class="d-inline-block align-text-top">
                            <span style="font-size: 24px; color: rgb(44, 44, 44);" class="ms-2 fw-bolder">Sistema
                                Académico</span>
                        </a>
                        <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active fw-medium" aria-current="page" href="../docentes.php">Inicio</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" href="./notas.php">Notas</a>
                            </li>

                        </ul>
                        <a href="../logout.php">
                            <button class="btn btn-dark" type="submit">Cerrar Sección</button>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <!--  -->
    </div>
    <!--  -->


    <?php
    // Verificar si el formulario ha sido enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener las notas ingresadas y subirlas a la base de datos
        foreach ($_POST as $key => $value) {
            // Verificar si el campo es una nota (tiene el formato nota_<id_estudiante>_<id_materia>)
            if (substr($key, 0, 5) == "nota_") {
                // Obtener el ID del estudiante y de la materia desde el nombre del campo
                $parts = explode("_", $key);
                $id_estudiante = $parts[1];
                $id_materia = $parts[2];
                $nota = $value;

                // Aquí deberías escribir el código para insertar la nota en la base de datos
                // Puedes utilizar la conexión a la base de datos que ya tienes establecida
                // Por ejemplo:
                $sql_insertar_nota = "INSERT INTO notas (id_estudiante, id_materia, nota) VALUES ($id_estudiante, $id_materia, $nota)";
                $conexion->query($sql_insertar_nota);
                // Esto es solo un ejemplo, asegúrate de usar consultas preparadas para prevenir inyección SQL

            }
        }
    }
    ?>

    <div class="espacecustom p-4 mt-4">
        <h2>Seleccionar Grupo:</h2>
        <form action="#" method="POST" onsubmit="return validarSeleccionGrupo()">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
                <div class="col mb-2">
                    <select class="form-select" name="grupo_materias" id="grupo_materias">
                        <option value="">Seleccionar Grupo...</option>
                        <?php
                        // Consulta SQL para obtener los grupos que el docente tiene materias asignadas
                        $sql_grupos = "SELECT DISTINCT g.id AS id_grupo, CONCAT(g.nombre_grupo, ' ', g.seccion) AS nombre_completo
                       FROM grupos g
                       INNER JOIN materias m ON g.id = m.grupo_asignado
                       INNER JOIN docentes d ON m.docente_asignado = d.id
                       WHERE d.usuario_id = $id_usuario"; // Filtrar por el ID de usuario del docente
                        $resultado_grupos = $conexion->query($sql_grupos);

                        // Iterar sobre los resultados de la consulta de grupos
                        while ($row_grupo = $resultado_grupos->fetch_assoc()) {
                            echo '<option value="' . $row_grupo['id_grupo'] . '">' . $row_grupo['nombre_completo'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col mb-2">
                    <button type="submit" class="btn btn-primary">Mostrar Materias</button>
                </div>

            </div>
        </form>

        <?php
        // Verificar si se ha enviado un formulario con el grupo seleccionado
        if (isset($_POST['grupo_materias'])) {
            // Obtener el ID del grupo seleccionado
            $id_grupo_seleccionado = $_POST['grupo_materias'];
            // Consulta SQL para obtener las materias del grupo seleccionado
            $sql_materias_grupo = "SELECT m.id AS id_materia, m.nombre_materia
                       FROM materias m
                       INNER JOIN grupos g ON m.grupo_asignado = g.id
                       INNER JOIN docentes d ON m.docente_asignado = d.id
                       WHERE g.id = $id_grupo_seleccionado
                       AND d.id = $id_docente";


            // Ejecutar la consulta solo si se ha seleccionado un grupo
            if ($id_grupo_seleccionado != "") {
                $resultado_materias_grupo = $conexion->query($sql_materias_grupo);
                // Verificar si se encontraron materias para el grupo seleccionado
                if ($resultado_materias_grupo->num_rows > 0) {
                    // Verificar si se ha enviado un formulario con el grupo seleccionado
                    if (isset($_POST['grupo_materias'])) {
                        // Obtener el ID del grupo seleccionado
                        $id_grupo_seleccionado = $_POST['grupo_materias'];
                        // Consulta SQL para obtener el nombre del grupo seleccionado
                        $sql_nombre_grupo = "SELECT CONCAT(nombre_grupo, ' ', seccion) AS nombre_completo FROM grupos WHERE id = $id_grupo_seleccionado";
                        $resultado_nombre_grupo = $conexion->query($sql_nombre_grupo);
                        // Obtener el nombre completo del grupo
                        if ($row_nombre_grupo = $resultado_nombre_grupo->fetch_assoc()) {
                            $nombre_grupo_seleccionado = $row_nombre_grupo['nombre_completo'];
                        } else {
                            $nombre_grupo_seleccionado = "Grupo no encontrado";
                        }
                        echo '<span style="font-size: 16px"; class="ms-1 mt-3 p-2 fw-normal badge bg-' . $badge_color . '">' . ucfirst($nombre_grupo_seleccionado) . '</span>';
                    }
        ?>
                    <br>
                    <form action="../Funciones/actualizar_notas.php" method="POST">
                        <div class="table-responsive mt-4">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre del Estudiante</th>
                                        <?php
                                        // Iterar sobre los resultados de la consulta de materias del grupo para mostrar los encabezados de las notas
                                        while ($row_materia = $resultado_materias_grupo->fetch_assoc()) {
                                            echo '<th>' . $row_materia['nombre_materia'] . '</th>';
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Consulta SQL para obtener la lista de estudiantes del grupo seleccionado
                                    $sql_estudiantes_grupo = "SELECT * FROM estudiantes WHERE grupo_id = $id_grupo_seleccionado";
                                    $resultado_estudiantes_grupo = $conexion->query($sql_estudiantes_grupo);

                                    while ($row_estudiante = $resultado_estudiantes_grupo->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '<td>' . $row_estudiante['nombre'] . '</td>';

                                        // Iterar sobre los resultados de la consulta de materias del grupo para mostrar los campos de notas
                                        $resultado_materias_grupo->data_seek(0); // Reiniciar el puntero del resultado de la consulta de materias
                                        while ($row_materia = $resultado_materias_grupo->fetch_assoc()) {
                                            $id_estudiante = $row_estudiante['id'];
                                            $id_materia = $row_materia['id_materia'];

                                            // Consultar la nota correspondiente en la base de datos
                                            $sql_nota = "SELECT nota FROM notas WHERE id_estudiante = $id_estudiante AND id_materia = $id_materia";
                                            $resultado_nota = $conexion->query($sql_nota);
                                            $row_nota = $resultado_nota->fetch_assoc();
                                            $nota = isset($row_nota['nota']) ? $row_nota['nota'] : '0';

                                            // Mostrar el campo de nota con el valor correspondiente
                                            echo '<td><input min="1" max="5" step="0.1" type="number" class="form-control" name="nota_' . $id_estudiante . '_' . $id_materia . '" value="' . $nota . '"></td>';
                                        }

                                        echo '</tr>';
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <button type="submit" class="btn btn-primary" onclick="mostrarAlerta()">Subir Notas</button>
                    </form>
        <?php
                } else {
                    // No se encontraron materias para el grupo seleccionado
                    echo '<p>No se encontraron materias para este grupo.</p>';
                }
            } else {
                // Mensaje para indicar que se debe seleccionar un grupo
                echo '<p id="mensaje-seleccion">Por favor, selecciona un grupo.</p>';
            }
        }
        ?>
    </div>
    <script>
        function validarSeleccionGrupo() {
            var grupoSeleccionado = document.getElementById('grupo_materias').value;
            if (grupoSeleccionado === "") {
                alert("Por favor, selecciona un grupo primero.");
                return false;
            }
            return true;
        }
    </script>



    <script>
        // Función para mostrar la alerta solo cuando se hace clic en el botón de "Subir Notas"
        function mostrarAlerta() {
            alert("¡Notas actualizadas exitosamente!");
        }
    </script>






    <script src="../recursos/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>