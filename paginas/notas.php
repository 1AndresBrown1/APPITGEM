<title>ITGEM - NOTAS</title>
<link rel="icon" href="../assets/images/login-images/logo-grande.svg" type="image/png" />

<?php
session_start();
require '../bd.php';
// error_reporting(0);
// Verifica si ya hay una sesión activa
if (isset($_SESSION['nombre_usuario'])) {
    // Verifica si el usuario es un administrador
    if ($_SESSION['admin'] == 'admin') {
        // Si el usuario es un administrador, rediríjalo al index.php
        $message = 'Administrador';
    } else {
        // Si el usuario no es un administrador, rediríjalo a la página correspondiente según el tipo de usuario
        if ($_SESSION['docente'] === 'docente') {
            header("Location: index_docentes.php");
            exit();
        } elseif ($_SESSION['estudiante'] === 'estudiante') {
            header("Location: index_estudiantes.php");
            exit();
        }
    }
} else {
    // Si no hay una sesión activa, redirigir al usuario a la página de inicio de sesión
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="../assets/images/Logo Elotes Ilustrado Amarillo y Verde.png" type="image/png" />
    <link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="../assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="../assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="../assets/css/pace.min.css" rel="stylesheet" />
    <script src="../assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="../assets/css/app.css" rel="stylesheet">
    <link href="../assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="../assets/css/dark-theme.css" />
    <link rel="stylesheet" href="../assets/css/semi-dark.css" />
    <link rel="stylesheet" href="../assets/css/header-colors.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!--start header -->
    <header>
        <div class="topbar d-flex align-items-center border-bottom">
            <nav class="navbar navbar-expand">
                <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                </div>
                <div class="search-bar flex-grow-1">
                    <div class="position-relative">
                        <br>
                        <h2 class="text-capitalize" style="color:#3a0035;     font-weight: 600;"> <?php
                                                                                                    echo $_SESSION['nombre_usuario'];
                                                                                                    ?></h2>
                    </div>
                </div>
                <div class="user-box dropdown">
                    <a style="    padding: .5rem 1rem 1rem 2rem;" class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../assets/images/login-images/logo-grande.svg" class="user-img" alt="user avatar">
                        <div class="user-info ps-3">
                            <p class="user-name mb-0 p-1 text-capitalize"><strong><?php
                                                                                    echo $_SESSION['nombre_usuario'];
                                                                                    ?></strong></p>
                            <?php if (isset($message)) : ?>
                                <p class="designattion mb-0" style="background-color: #fef08a;
    color: black;
    padding: 2px;
    border-radius: 10px; border: solid black 1px"><?php echo $message; // mensaje de administrador  
                                                    ?></p>
                            <?php endif; ?>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">

                        <li><a class="dropdown-item" href="./logout.php"><i class='bx bx-log-out-circle'></i><span>Cerrar Seccion</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--end header -->
    <!--end header -->

    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div style="background: white;" class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <br>
                    <img src="../assets/images/login-images/logo-grande.svg" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <br>
                    <h4 class="logo-text">Sistema Académico</h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="../index.php">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="../paginas/docentes.php">
                        <div class="parent-icon"><i class="fa-solid fa-user-tie"></i>
                        </div>
                        <div class="menu-title">Docentes</div>
                    </a>
                </li>
                <li>
                    <a href="../paginas/estudiantes.php">
                        <div class="parent-icon"><i class="fa-solid fa-user"></i>
                        </div>
                        <div class="menu-title">Estudiantes</div>
                    </a>
                </li>
                <li>
                    <a href="./notas.php">
                        <div class="parent-icon"><i class="fa-solid fa-file-invoice"></i>
                        </div>
                        <div class="menu-title">Notas</div>
                    </a>
                </li>
                <li>
                    <a href="../paginas/academico.php">
                        <div class="parent-icon"><i class="fa-solid fa-book"></i>
                        </div>
                        <div class="menu-title">Academico</div>
                    </a>
                </li>
                <li>
                    <a href="../cartera/index.php">
                        <div class="parent-icon"><i class="fa-solid fa-circle-dollar-to-slot"></i>
                        </div>
                        <div class="menu-title">Cartera</div>
                    </a>
                </li>
                <li class="menu-label">
                    <hr>
                </li>
                <li>
                    <a href="../logout.php">
                        <div class="parent-icon"><i class="fa-solid fa-right-from-bracket"></i>
                        </div>
                        <div class="menu-title">Cerrar Seccion</div>
                    </a>
                </li>
                <!-- <li>
          <a href="#">
            <div class="parent-icon"><i class='bx bx-cookie'></i>
            </div>
            <?php if (isset($message)) : ?>
              <p class="designattion mb-0" style="color: red;"><?php echo $message; // mensaje de administrador  
                                                                ?></p>
            <?php endif; ?>
          </a>
        </li> -->
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->


        <?php
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

        // Consultar y listar los grupos disponibles en la base de datos junto con el nombre_a de gestion_a y el nombre del docente
        $sql_grupos = "SELECT g.id, g.id_año, g.nombre_grupo, g.grupo, a.nombre_a, d.nombre AS nombre_docente 
               FROM grupos g
               JOIN gestion_a a ON g.id_año = a.id
               JOIN docentes d ON g.id_docente = d.id";

        $result_grupos = $conexion->query($sql_grupos);

        if ($result_grupos) {
            while ($row = $result_grupos->fetch_assoc()) {
                $grupos[] = array(
                    'id' => $row['id'],
                    'id_año' => $row['id_año'],
                    'nombre' => $row['nombre_grupo'],
                    'grupo' => $row['grupo'], // Asegúrate de agregar este campo
                    'nombre_a' => $row['nombre_a'],
                    'nombre_docente' => $row['nombre_docente']
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
        function obtenerNotaExistente($estudianteId, $materiaId)
        {
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
        <select class="form-select w-50" name="grupo_id" id="grupoSelect">
            <option value="" disabled selected>Elige un grupo</option>
            <?php
            foreach ($grupos as $grupo) {
                echo "<option value='" . $grupo['id'] . "'>" . $grupo['nombre'] . " - Grupo " . $grupo['grupo'] . " - " . $grupo['nombre_a'] . ' - ' . $grupo['nombre_docente'] . "</option>";
            }
            ?>
        </select>
    </div>

                        <br>
                        <button type="submit" class="btn btn-primary">Mostrar Estudiantes y Materias</button>
                    </form>
                    <br>
                    <!-- Después del formulario -->
                    <h1 id="grupoSeleccionado" class="mt-3"></h1>
                

                    <!-- Mostrar la lista de estudiantes asociados al grupo seleccionado -->
                    <?php
                    if (!empty($estudiantes) && !empty($materias)) {
                        echo "<h3>Estudiantes asociados al grupo seleccionado:</h3>";
                        echo "<form id='notasForm'>";
                        echo "<table class='table table-striped table-bordered mt-4'>";
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





        <footer class="page-footer">
            <p class="mb-0">Copyright © 2021. All right reserved.</p>
        </footer>


        <!--end switcher-->
        <!-- Bootstrap JS -->
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <!--plugins-->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
        <script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
        <script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
        <script src="../assets/plugins/chartjs/js/Chart.min.js"></script>
        <script src="../assets/plugins/chartjs/js/Chart.extension.js"></script>
        <script src="../assets/js/index.js"></script>
        <!--app JS-->
        <script src="../assets/js/app.js"></script>
</body>

</html>