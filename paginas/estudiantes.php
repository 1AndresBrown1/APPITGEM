<title>ITGEM - ESTUDIANTES</title>
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
    <link rel="icon" href="../assets/images/login-images/logo-grande.svg" type="image/png" />
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
                                <!-- <?php endif; ?> -->
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">

                        <li><a class="dropdown-item" href="../logout.php"><i class='bx bx-log-out-circle'></i><span>Cerrar Seccion</span></a>
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
                                        <i class="fa-solid fa-plus"></i>
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
                                        <i class="fa-solid fa-arrow-up-from-bracket"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end row-->

                <div id="formulario1" style="background-color: #eff6ff !important; border-radius:20px;" class="cardcustom p-4 mt-4 border">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-1">
                        <div class="col mb-4">
                            <div class="container">
                                <form action="procesar_registro_estudiante.php" method="POST">
                                    <h1 style="font-weight: bold;" class="my-4">Registro de Estudiantes</h1>
                                    <p style="background-color: #e5e7eb;" class="fw-semibold fs-5 mb-4 rounded p-2 text-center">Datos personales </p>
                                    <br>
                                    <div class="row mb-3">
                                        <div class="col-md-6 mt-2">
                                            <div class="form-group">
                                                <div class="input-group flex-nowrap">
                                                    <i style="font-size: 27px;" class="fa-solid fa-user input-group-text"></i>
                                                    <input autocomplete="off" id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre:" aria-label="Username" aria-describedby="addon-wrapping" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-group">
                                                <!-- Deja este espacio en blanco para agregar más campos si es necesario -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                                                <div class="input-group flex-nowrap">
                                                    <i style="font-size: 27px;" class="fa-solid fa-calendar-days input-group-text"></i>
                                                    <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" class="form-control" aria-describedby="addon-wrapping" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lugar_nacimiento">Lugar de nacimiento:</label>
                                                <div class="input-group flex-nowrap">
                                                    <i style="font-size: 27px;" class="fa-solid fa-earth-americas input-group-text"></i>
                                                    <input autocomplete="off" id="lugar_nacimiento" name="lugar_nacimiento" type="text" class="form-control" placeholder="Lugar de nacimiento:" aria-label="Username" aria-describedby="addon-wrapping" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <i style="font-size: 27px;" class="fa-solid fa-id-card input-group-text"></i>
                                                <select id="tipo_documento" name="tipo_documento" class="form-select" required>
                                                    <option selected>Selecciona un tipo de documento..</option>
                                                    <option value="DNI">Tarjeta de identidad</option>
                                                    <option value="Cedula">Cedula</option>
                                                    <option value="Pasaporte">Pasaporte</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group flex-nowrap">
                                                <i style="font-size: 27px;" class="fa-solid fa-id-card input-group-text"></i>
                                                <input autocomplete="off" placeholder="Numero de documento" id="documento_identidad" name="documento_identidad" type="number" class="form-control" aria-describedby="addon-wrapping" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="fecha_expedicion">Fecha de expedición:</label>
                                            <div class="input-group flex-nowrap">
                                                <i style="font-size: 27px;" class="fa-solid fa-calendar-days input-group-text"></i>
                                                <input autocomplete="off" id="fecha_expedicion" name="fecha_expedicion" type="date" class="form-control" aria-describedby="addon-wrapping" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="lugar_expedicion">Expedida en:</label>
                                            <div class="input-group flex-nowrap">
                                                <i style="font-size: 27px;" class="fa-solid fa-earth-americas input-group-text"></i>
                                                <input autocomplete="off" id="lugar_expedicion" name="lugar_expedicion" type="text" class="form-control" placeholder="Lugar de Expedición:" aria-label="Username" aria-describedby="addon-wrapping" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="input-group">
                                                <i style="font-size: 27px;" class="fa-solid fa-venus-mars input-group-text"></i>
                                                <select id="genero" name="genero" class="form-select" required>
                                                    <option value="">Selecciona un género</option>
                                                    <option value="Masculino">Masculino</option>
                                                    <option value="Femenino">Femenino</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="input-group flex-nowrap">
                                                <i style="font-size: 27px;" class="fa-solid fa-map-location-dot input-group-text"></i>
                                                <input autocomplete="off" id="direccion" name="direccion" type="text" class="form-control" placeholder="Direccion:" aria-label="Username" aria-describedby="addon-wrapping" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group flex-nowrap">
                                                <i style="font-size: 27px;" class="fa-solid fa-phone input-group-text"></i>
                                                <input autocomplete="off" id="telefono" name="telefono" type="text" class="form-control" placeholder="Telefono:" aria-label="Username" aria-describedby="addon-wrapping" required>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <p style="background-color: #e5e7eb;" class="fw-semibold fs-5 mt-4 rounded p-2 text-center">Datos del acudiente </p>
                                    <br>

                                    <div class="row mb-3">
                                        <div class="col-md-6 mt-2">
                                            <div class="form-group">
                                                <div class="input-group flex-nowrap">
                                                    <i style="font-size: 27px;" class="fa-solid fa-user input-group-text"></i>
                                                    <input autocomplete="off" id="nombre_acudiente" name="nombre_acudiente" type="text" class="form-control" placeholder="Nombre:" aria-label="Username" aria-describedby="addon-wrapping" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="form-group">
                                                <!-- Deja este espacio en blanco para agregar más campos si es necesario -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <i style="font-size: 27px;" class="fa-solid fa-id-card input-group-text"></i>
                                                <select id="tipo_documento_acudiente" name="tipo_documento_acudiente" class="form-select" required>
                                                    <option selected>Selecciona un tipo de documento..</option>
                                                    <option value="DNI">Tarjeta de identidad</option>
                                                    <option value="Cedula">Cedula</option>
                                                    <option value="Pasaporte">Pasaporte</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group flex-nowrap">
                                                <i style="font-size: 27px;" class="fa-solid fa-id-card input-group-text"></i>
                                                <input autocomplete="off" placeholder="Numero de documento_acudiente" id="documento_identidad_acudiente" name="documento_identidad_acudiente" type="number" class="form-control" aria-describedby="addon-wrapping" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="fecha_expedicion">Fecha de expedición:</label>
                                            <div class="input-group flex-nowrap">
                                                <i style="font-size: 27px;" class="fa-solid fa-calendar-days input-group-text"></i>
                                                <input autocomplete="off" id="fecha_expedicion" name="fecha_expedicion" type="date" class="form-control" aria-describedby="addon-wrapping" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="lugar_expedicion">Expedida en:</label>
                                            <div class="input-group flex-nowrap">
                                                <i style="font-size: 27px;" class="fa-solid fa-earth-americas input-group-text"></i>
                                                <input autocomplete="off" id="lugar_expedicion" name="lugar_expedicion" type="text" class="form-control" placeholder="Lugar de Expedición:" aria-label="Username" aria-describedby="addon-wrapping" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="input-group flex-nowrap">
                                                <i style="font-size: 27px;" class="fa-solid fa-map-location-dot input-group-text"></i>
                                                <input autocomplete="off" id="direccion" name="direccion" type="text" class="form-control" placeholder="Direccion:" aria-label="Username" aria-describedby="addon-wrapping" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="input-group flex-nowrap">
                                                <i style="font-size: 27px;" class="fa-solid fa-phone input-group-text"></i>
                                                <input autocomplete="off" id="telefono" name="telefono" type="text" class="form-control" placeholder="Telefono:" aria-label="Username" aria-describedby="addon-wrapping" required>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <p style="background-color: #e5e7eb;" class="fw-semibold fs-5 mt-4 rounded p-2 text-center">Datos académicos </p>
                                    <br>

                                    <div class="form-group mb-3">
                                        <label for="grupo">Grupo de Estudios:</label>
                                        <select class="form-control" id="grupo" name="grupo" required>
                                            <?php
                                            // Realiza una consulta para obtener los grupos
                                            $sql = "SELECT g.id AS grupo_id, g.nombre_grupo, g.grupo, a.nombre_a FROM grupos g INNER JOIN gestion_a a ON g.id_año = a.id";
                                            $result = $conexion->query($sql);

                                            if ($result) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='" . $row['grupo_id'] . "'>" . $row['nombre_grupo'] . " - Grupo " . $row['grupo'] . " (" . $row['nombre_a'] . ")</option>";
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
                                                <label for="eps">EPS:</label>
                                                <select class="form-control" id="eps" name="eps" required>
                                                    <option value="">Selecciona una EPS</option>
                                                    <option value="EPS1">EPS1</option>
                                                    <option value="EPS2">EPS2</option>
                                                    <!-- Agrega más opciones según sea necesario -->
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Agrega más campos aquí si es necesario -->
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="correo">Correo:</label>
                                        <input autocomplete="off" autocomplete="off" type="email" class="form-control" id="correo" name="correo" required>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="contrasena">Contraseña:</label>
                                                <input autocomplete="off" readonly placeholder="Contraseña" id="contrasena" name="contrasena" type="password" class="form-control" required autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="verificarContrasena">Verificar contraseña:</label>
                                                <input autocomplete="off" readonly placeholder="Verificar Contraseña" id="verificarContrasena" name="verificarContrasena" type="password" class="form-control" required autocomplete="off">
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
                    </div>
                </div>


                <div id="formulario2" style="background-color: #eff6ff !important; border-radius:20px;" class="cardcustom p-4 mt-4 border">
                    <h2 style="font-weight: bold;" class="my-4">Editar Estudiantes</h2>

                    <!-- Agrega un formulario para filtrar por grupo -->
                    <form method="GET" action="">
                        <label class="mb-3" for="filtro_grupo">Filtrar por Grupo:</label>
                        <select style="width: 50%;" class="form-select form-select-lg" name="filtro_grupo" id="filtro_grupo">
                            <option value="">Todos los Grupos</option>
                            <?php
                            // Consulta para obtener los nombres de los grupos
                            $sql_grupos = "SELECT id, nombre_grupo, grupo FROM grupos";
                            $result_grupos = $conexion->query($sql_grupos);

                            if ($result_grupos) {
                                while ($row_grupo = $result_grupos->fetch_assoc()) {
                                    $selected = ($_GET['filtro_grupo'] == $row_grupo['id']) ? 'selected' : '';
                                    echo "<option value='" . $row_grupo['id'] . "' $selected>" . $row_grupo['nombre_grupo'] . " - Grupo " . $row_grupo['grupo'] . "</option>";
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
                            $sql = "SELECT e.id, e.nombre, e.apellido, e.fecha_nacimiento, e.genero, g.nombre_grupo, g.grupo, a.nombre_a 
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

                                    echo "<td>" . $row['fecha_nacimiento'] . "</td>";
                                    echo "<td>" . $row['genero'] . "</td>";
                                    echo "<td>" . $row['nombre_grupo'] . " - Grupo " . $row['grupo'] . " (" . $row['nombre_a'] . ")</td>";
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

                <!-- Agrega este script después de tus campos de formulario -->
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Captura el campo de número de documento y los campos de contraseña
                        var documentoInput = document.getElementById('documento_identidad');
                        var contrasenaInput = document.getElementById('contrasena');
                        var verificarContrasenaInput = document.getElementById('verificarContrasena');

                        // Agrega un evento de entrada al campo de número de documento
                        documentoInput.addEventListener('input', function() {
                            // Obtén el valor del campo de número de documento
                            var numeroDocumento = documentoInput.value;

                            // Actualiza los campos de contraseña con el valor del número de documento
                            contrasenaInput.value = numeroDocumento;
                            verificarContrasenaInput.value = numeroDocumento;
                        });
                    });
                </script>

                


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