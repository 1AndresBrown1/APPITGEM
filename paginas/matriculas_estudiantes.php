<title>ITGEM - MATRICULAS</title>
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
        <div class="topbar d-flex align-items-center">
            <nav class="navbar navbar-expand">
                <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                </div>
                <div class="search-bar flex-grow-1">
                    <div class="position-relative">
                        <br>
                        <h2 style="color:#3a0035;     font-weight: 600;"> <?php
                                                                            echo $_SESSION['nombre_usuario'];
                                                                            ?></h2>
                    </div>
                </div>
                <div class="user-box dropdown">
                    <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
                        <div class="user-info ps-3">
                            <p class="user-name mb-0"><strong><?php
                                                                echo $_SESSION['nombre_usuario'];
                                                                ?></strong></p>
                            <?php if (isset($message)) : ?>
                                <p class="designattion mb-0" style="color: red;"><?php echo $message; // mensaje de administrador  
                                                                                    ?></p>
                            <?php endif; ?>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
                        </li>
                        <li>
                            <div class="dropdown-divider mb-0"></div>
                        </li>
                        <li><a class="dropdown-item" href="./logout.php"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--end header -->

    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div style="background: white;" class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <br>
                    <img src="../assets/images/Logo Elotes Ilustrado Amarillo y Verde.png" class="logo-icon" alt="logo icon">
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
                    <a href="javascript:;">
                        <div class="parent-icon"><i class="fa-solid fa-user"></i>
                        </div>
                        <div class="menu-title">Estudiantes</div>
                    </a>
                </li>
                <li>
                    <a href="../paginas/notas.php">
                        <div class="parent-icon"><i class="fa-solid fa-file-invoice"></i>
                        </div>
                        <div class="menu-title">Notas</div>
                    </a>
                </li>
                <li>
                    <a href="../paginas/notas.php">
                        <div class="parent-icon"><i class="fa-solid fa-book"></i>
                        </div>
                        <div class="menu-title">Academico</div>
                    </a>
                </li>
                <li>
                    <a href="../paginas/notas.php">
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
        // matriculas_estudiantes.php

        // Verificar si se ha enviado el formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Directorio base para documentos
            $directorio_base = "documentos/";

            // Obtener el ID del estudiante desde la URL
            $estudiante_id = isset($_GET['id']) ? $_GET['id'] : null;

            // Verificar si se proporcionó un ID válido
            if ($estudiante_id) {
                // Conectar a la base de datos (puedes usar tu método de conexión)
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

                    // Iterar sobre los archivos
                    foreach ($nombres_archivos_permitidos as $nombre_archivo) {
                        // Construir el nombre del archivo y el destino
                        $nombre_archivo_completo = $directorio_estudiante . $nombre_archivo . '.pdf';

                        // Verificar si se cargó el archivo
                        if (isset($_FILES[$nombre_archivo]) && $_FILES[$nombre_archivo]['error'] === UPLOAD_ERR_OK) {
                            // Mover el archivo al directorio del estudiante
                            move_uploaded_file($_FILES[$nombre_archivo]['tmp_name'], $nombre_archivo_completo);
                        }
                    }

                    // Mensaje de éxito
                    $mensaje_exito = "Documentos guardados exitosamente.";
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
            }, 2000); // 2000 milisegundos = 2 segundos
          </script>";
        }
        ?>





        <div class="page-wrapper">
            <div class="page-content">




                <div class="container mt-4">
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