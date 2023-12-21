<title>ITGEM - ESTUDIANTES</title>
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



        <style>
            input[type="text"],
            input[type="email"],
            input[type="tel"],
            select {
                background-color: #f3f7fc;
                padding: 9px;
                border-radius: 10px;
            }
        </style>
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
        <div class="page-wrapper">
            <div class="page-content">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
                    <div class="col">
                        <div style="background: #235c81;" class="card radius-10 p-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <a class="txt-card-custom mb-0">Crear Estudiane</a>
                                        <br>
                                        <a style="color: #fee6ff;" href="#" id="mostrarFormulario1" class="text-blue-500 hover:underline">Click aqui</a>
                                    </div>
                                    <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                                        <i class='bx bxs-cart'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                 
                    <div class="col">
                        <div style="background: #20425a;" class="card radius-10 p-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p style="font-size: 17px !important;" class="mb-0 txt-card-custom">Subir Documentos</p>
                                        <a style="color: #fee6ff;" href="./matriculas.php" class="text-blue-500 hover:underline">Click aqui</a>
                                    </div>
                                    <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                        <i class='bx bxs-bar-chart-alt-2'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end row-->

                <div id="formulario1" style="background-color: #eff6ff !important;" class="cardcustom p-4 mt-4">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
                        <div class="col mb-4">
                            <div class="container">
                                <form action="procesar_registro_estudiante.php" method="POST">
                                    <h1 style="font-weight: bold;" class="my-4">Registro de Estudiantes</h1>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nombre">Nombre:</label>
                                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="apellido">Apellido:</label>
                                                <input type="text" class="form-control" id="apellido" name="apellido" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="genero">Género:</label>
                                                <select class="form-control" id="genero" name="genero" required>
                                                    <option value="">Selecciona un género</option>
                                                    <option value="Masculino">Masculino</option>
                                                    <option value="Femenino">Femenino</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="grupo">Grupo de Estudios:</label>
                                        <select class="form-control" id="grupo" name="grupo" required>
                                            <?php
                                            include("../bd.php"); // Incluye el archivo de conexión a la base de datos

                                            // Realiza una consulta para obtener los grupos
                                            $sql = "SELECT g.id AS grupo_id, g.nombre_grupo, a.nombre_a FROM grupos g INNER JOIN gestion_a a ON g.id_año = a.id";
                                            $result = $conexion->query($sql);

                                            if ($result) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='" . $row['grupo_id'] . "'>" . $row['nombre_grupo'] . " (" . $row['nombre_a'] . ")</option>";
                                                }

                                                $result->free();
                                            } else {
                                                echo "<option value=''>No hay grupos disponibles</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tipo_documento">Tipo de Documento:</label>
                                                <select class="form-control" id="tipo_documento" name="tipo_documento" required>
                                                    <option value="">Selecciona un tipo de documento</option>
                                                    <option value="DNI">DNI</option>
                                                    <option value="Pasaporte">Pasaporte</option>
                                                    <!-- Add more options as needed -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="documento_identidad">Documento de Identidad:</label>
                                                <input type="number" class="form-control" id="documento_identidad" name="documento_identidad" required>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="direccion">Dirección:</label>
                                                <input type="text" class="form-control" id="direccion" name="direccion" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="telefono">Teléfono:</label>
                                                <input type="tel" class="form-control" id="telefono" name="telefono" required>
                                            </div>
                                        </div>
                                    </div>







                                    <div class="form-group mb-3">
                                        <label for="correo">Correo:</label>
                                        <input type="email" class="form-control" id="correo" name="correo" required>
                                    </div>



                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="contrasena">Contraseña:</label>
                                                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="verificarContrasena">Verificar contraseña:</label>
                                                <input type="password" class="form-control" id="verificarContrasena" name="verificarContrasena" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="estado_matricula">Estado de Matrícula:</label>
                                        <select class="form-control" id="estado_matricula" name="estado_matricula" required>
                                            <option value="pagado">Pagado</option>
                                            <option value="sin_saldar">Sin saldar</option>
                                        </select>
                                    </div>

                                    <br>
                                    <button type="submit" class="btn btn-primary">Registrar Estudiante</button>
                                </form>
                            </div>
                        </div>

                        <div class="col mb-4 ps-5 d-flex align-items-center">
                            <img width="500" class="img-fluid" src="../assets/images/pagina/2undraw_certificate_re_yadi.svg" alt="">
                        </div>
                    </div>
                </div>



                <div id="formulario2" style="background-color: #eff6ff !important;" class="cardcustom p-4 mt-4">
                    <h2 style="font-weight: bold;" class="my-4">Editar Estudiantes</h2>

                    <!-- Agrega un formulario para filtrar por grupo -->
                    <form method="GET" action="">
                        <label class="mb-3" for="filtro_grupo">Filtrar por Grupo:</label>
                        <select style="width: 50%;" class="form-select form-select-lg" name="filtro_grupo" id="filtro_grupo">
                            <option value="">Todos los Grupos</option>
                            <?php
                            // Consulta para obtener los nombres de los grupos
                            $sql_grupos = "SELECT id, nombre_grupo FROM grupos";
                            $result_grupos = $conexion->query($sql_grupos);

                            if ($result_grupos) {
                                while ($row_grupo = $result_grupos->fetch_assoc()) {
                                    $selected = ($_GET['filtro_grupo'] == $row_grupo['id']) ? 'selected' : '';
                                    echo "<option value='" . $row_grupo['id'] . "' $selected>" . $row_grupo['nombre_grupo'] . "</option>";
                                }
                                $result_grupos->free();
                            }
                            ?>
                        </select>
                        <button class="btn btn-primary mt-3" type="submit">Filtrar</button>
                    </form>

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Fecha de Nacimiento</th>
                                <th scope="col">Género</th>
                                <th scope="col">Grupo de Estudios</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Construye la parte de la consulta SQL para el filtro por grupo
                            $filtro_grupo = isset($_GET['filtro_grupo']) ? $_GET['filtro_grupo'] : '';
                            $filtro_sql = ($filtro_grupo != '') ? " WHERE g.id = $filtro_grupo" : '';

                            // Consulta para obtener los datos de los estudiantes y sus grupos con el filtro aplicado
                            $sql = "SELECT e.id, e.nombre, e.apellido, e.fecha_nacimiento, e.genero, g.nombre_grupo, a.nombre_a 
                FROM estudiantes e
                INNER JOIN grupos g ON e.grupo_id = g.id
                INNER JOIN gestion_a a ON g.id_año = a.id" . $filtro_sql;

                            $result = $conexion->query($sql);

                            if ($result) {
                                $i = 1;
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<th scope='row'>$i</th>";
                                    echo "<td>" . $row['nombre'] . "</td>";
                                    echo "<td>" . $row['apellido'] . "</td>";
                                    echo "<td>" . $row['fecha_nacimiento'] . "</td>";
                                    echo "<td>" . $row['genero'] . "</td>";
                                    echo "<td>" . $row['nombre_grupo'] . " (" . $row['nombre_a'] . ")</td>";
                                    echo "<td>
                        <a href='editar_estudiante.php?id=" . $row['id'] . "'>Editar</a> | 
                        <a href='eliminar_estudiante.php?id=" . $row['id'] . "'>Eliminar</a>
                    </td>";
                                    echo "</tr>";
                                    $i++;
                                }
                                $result->free();
                            } else {
                                echo '<tr><td colspan="7">No hay datos de estudiantes disponibles.</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <br><br><br>

              

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