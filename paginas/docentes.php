<title>ITGEM - DOCENTES</title>
<link rel="icon" href="../assets/images/login-images/logo-grande.svg" type="image/png" />

<body>
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

    <title>ITGEM</title>
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
        <title>Rocker - Bootstrap 5 Admin Dashboard Template</title>
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
                            <h2 class="text-capitalize fw-bolder" style="color:#3a0035;     font-weight: 600;"> <?php
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
                            <div class="menu-title">Inicio</div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
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
                        <a href="../cartera/index.php" target="_blank">
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

            <!--start page wrapper -->
            <div class="page-wrapper">
                <div class="page-content">
                    <!-- OPCIONES -->
                    <div class="cardcustom mt-3">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
                            <div class="col mt-3">
                                <div id="customCard" style="background: #414e6e; border-radius: 20px;" class="card radius-10 p-2">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <p style="color: white; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Crear Docente</p>
                                                <a style="color: #fee6ff !important;" href="#" id="mostrarFormulario1" class="text-blue-500 hover:underline">Click aqui</a>
                                                <br>
                                            </div>
                                            <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                                                <i class="fa-solid fa-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col mt-3">
                                <div id="customCard" style="background: #262c40; border-radius: 20px;" class="card radius-10 p-2">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <p style="color: white; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Ver Docentes</p>
                                                <a style="color: #fee6ff !important;" href="#" id="mostrarFormulario2" class="text-blue-500 hover:underline">Click aqui</a>
                                                <br>
                                            </div>
                                            <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                                                <i class="fa-solid fa-user-large"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- OPCIONES -->

                    <div id="formulario1" style="background-color: #eff6ff !important; border-radius: 23px !important;" class="border cardcustom p-4 mt-4">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-1">
                            <div class="col mb-4">
                                <div class="">
                                    <div class="container">
                                        <form action="procesar_registro_docente.php" method="POST">
                                            <h1 style="font-weight: bold;" class="my-4">Registro de Docentes</h1>
                                            <p style="background-color: #e5e7eb;" class="fw-semibold fs-5 mb-4 rounded p-2 text-center">Datos personales </p>
                                            <br>
                                            <div class="row mb-3">
                                                <div class="col-md-6 mt-2">
                                                    <div class="form-group">
                                                        <div class="input-group flex-nowrap">
                                                            <i style="font-size: 27px;" class="fa-solid fa-user input-group-text"></i>
                                                            <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre:" aria-label="Username" aria-describedby="addon-wrapping" required maxlength="25">
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="col-md-6 mt-2">
                                                    <div class="form-group">
                                                        <!-- <label for="apellido">Apellido:</label>
                                                <input type="text" class="form-control" id="apellido" name="apellido" required> -->

                                                        <div class="input-group flex-nowrap">
                                                            <i style="font-size: 27px;" class="fa-solid fa-user input-group-text"></i>
                                                            <input id="apellido" name="apellido" type="text" class="form-control" placeholder="Apellido:" aria-label="Username" aria-describedby="addon-wrapping" required maxlength="25">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <!-- <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required> -->
                                                        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                                                        <div class="input-group flex-nowrap mt-2">
                                                            <i style="font-size: 27px;" class="fa-solid fa-calendar-days input-group-text"></i>
                                                            <input id="fecha_nacimiento" name="fecha_nacimiento" id="apellido" name="apellido" type="date" class="form-control" aria-describedby="addon-wrapping" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <!-- <lab+el for="lugar_nacimiento">Lugar de Nacimiento:</label>
                                                <input type="text" class="form-control" id="lugar_nacimiento" name="lugar_nacimiento" required> -->
                                                        <label for="lugar_nacimiento">Lugar de nacimiento:</label>

                                                        <div class="input-group flex-nowrap mt-2">
                                                            <i style="font-size: 27px;" class="fa-solid fa-earth-americas input-group-text"></i>
                                                            <input id="lugar_nacimiento" name="lugar_nacimiento" type="text" class="form-control" placeholder="Lugar de nacimiento:" aria-label="Username" aria-describedby="addon-wrapping" maxlength="40" required>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6 mt-2">

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
                                                <div class="col-md-6 mt-2">
                                                    <div class="input-group flex-nowrap">
                                                        <i style="font-size: 27px;" class="fa-solid fa-id-card input-group-text"></i>
                                                        <input placeholder="Numero de documento" id="documento_identidad" name="documento_identidad" type="number" class="form-control" aria-describedby="addon-wrapping" required pattern="\d{1,10}">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mt-3">
                                                <!-- <div class="form-group">
                                                <label for="genero">Género:</label>
                                                <select class="form-control" id="genero" name="genero" required>
                                                    <option value="">Selecciona un género</option>
                                                    <option value="Masculino">Masculino</option>
                                                    <option value="Femenino">Femenino</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                            </div> -->


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



                                            <div class="row mt-4">
                                                <div class="col-md-6">
                                                    <div class="input-group flex-nowrap">
                                                        <i style="font-size: 27px;" class="fa-solid fa-map-location-dot input-group-text"></i>
                                                        <input id="direccion" name="direccion" type="text" class="form-control" placeholder="Direccion:" aria-label="Username" aria-describedby="addon-wrapping" required>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="input-group flex-nowrap">
                                                        <i style="font-size: 27px;" class="fa-solid fa-phone input-group-text"></i>
                                                        <input id="telefono" name="telefono" type="text" class="form-control" placeholder="Telefono:" aria-label="Username" aria-describedby="addon-wrapping" required>
                                                    </div>

                                                </div>

                                            </div>

                                            <br><br>
                                            <p style="background-color: #e5e7eb;" class="fw-semibold fs-5 mb-4 rounded p-2 text-center">Otros datos </p>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="mb-2" for="eps">EPS:</label>
                                                        <select class="form-control" id="eps" name="eps" required>
                                                            <option value="">Selecciona una EPS</option>
                                                            <option value="EPS1">EPS1</option>
                                                            <option value="EPS2">EPS2</option>
                                                            <!-- Agrega más opciones según sea necesario -->
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="mb-2" for="titulo">Título:</label>
                                                    <input type="text" class="form-control" id="titulo" name="titulo" required>
                                                </div>
                                            </div>
                                                <!-- Agrega más campos aquí si es necesario -->
                                            </div>




                                           

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="email">Correo Electrónico:</label>
                                                        <input type="email" class="form-control" id="email" name="email" required>
                                                    </div>
                                                </div>



                                              
                                            </div>
                                            <div class="row">
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
                                            <button style="background-color: #2970a0; color: white;" type="submit" class="btn">Registrar</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            <!-- <div class="col mb-4 ps-5 d-flex align-items-center">
                                <img width="425" class="img-fluid" src="../assets/images/pagina/undraw_certificate_re_yadi.svg" alt="">
                            </div> -->
                        </div>
                    </div>

                    <br><br><br>

                    <!--end row-->
                    <div style="display: none; background-color: #eff6ff !important; border-radius:20px;" id="formulario2" class="cardcustom p-4 mt-4 table-responsive border">
                        <h1 style="font-weight: bold;" class="my-4">Editar Docente</h1>
                        <table style="max-width: 100%;" class="table table-striped table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Tipo de Documento</th>
                                    <th scope="col">Documento de Identidad</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Correo Electrónico</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include("../bd.php");
                                // Consulta para obtener los datos de los docentes
                                $sql = "SELECT * FROM docentes";

                                $result = $conexion->query($sql);

                                if ($result && $result->num_rows > 0) {
                                    $i = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<th scope='row'>$i</th>";
                                        echo "<td>" . $row['nombre'] . "</td>";
                                        echo "<td>" . $row['apellido'] . "</td>";
                                        echo "<td>" . $row['tipo_documento'] . "</td>";
                                        echo "<td>" . $row['documento_identidad'] . "</td>";
                                        echo "<td>" . $row['direccion'] . "</td>";
                                        echo "<td>" . $row['telefono'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>
                                    <a href='editar_docente.php?id=" . $row['id'] . "'>Editar</a> 
                                </td>";
                                        echo "</tr>";
                                        $i++;
                                    }
                                    $result->free();
                                } else {
                                    echo '<tr><td colspan="10">No hay datos de docentes disponibles.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <footer class="page-footer">
                <p class="mb-0">Copyright © 2021. All right reserved.</p>
            </footer>

            <script>
                document.getElementById("mostrarFormulario1").addEventListener("click", function() {
                    document.getElementById("formulario1").style.display = "block";
                    document.getElementById("formulario2").style.display = "none";
                    document.getElementById("formulario3").style.display = "none";

                });

                document.getElementById("mostrarFormulario2").addEventListener("click", function() {
                    document.getElementById("formulario1").style.display = "none";
                    document.getElementById("formulario2").style.display = "block";
                    document.getElementById("formulario3").style.display = "none";
                });

                document.getElementById("mostrarFormulario3").addEventListener("click", function() {
                    document.getElementById("formulario1").style.display = "none";
                    document.getElementById("formulario2").style.display = "none";
                    document.getElementById("formulario3").style.display = "block";

                });
            </script>


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