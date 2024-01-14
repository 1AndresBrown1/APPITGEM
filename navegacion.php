<!-- NOMBRE DE LA PAGINA -->
<title>ITGEM</title>

<?php
// Conexion a la base de datos
session_start();
require 'bd.php';

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

<!-- INICIA LA PAGINA -->
<!DOCTYPE html>
<html lang="en">


<!-- HEADER -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="./assets/images/login-images/logo-grande.svg" type="image/png" />
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="assets/css/dark-theme.css" />
    <link rel="stylesheet" href="assets/css/semi-dark.css" />
    <link rel="stylesheet" href="assets/css/header-colors.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<!-- HEADER -->

<!-- Body -->

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
                        <h2 class="text-capitalize fw-bold" style="color:#3a0035;     font-weight: 600;"> <?php
                                                                            echo $_SESSION['nombre_usuario'];
                                                                            ?></h2>
                    </div>
                </div>
                <div class="user-box dropdown">
                    <a style="    padding: .5rem 1rem 1rem 2rem;" class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="assets/images/login-images/logo-grande.svg" class="user-img" alt="user avatar">
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

    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div style="background: white;" class="sidebar-wrapper border-end" data-simplebar="true">
            <div class="sidebar-header border-end">
                <div>
                    <br>
                    <img src="./assets/images/login-images/logo-grande.svg" class="logo-icon" alt="logo icon">
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
                    <a href="./index.php">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Inicio</div>
                    </a>
                </li>
                <li>
                    <a href="./paginas/docentes.php">
                        <div class="parent-icon"><i class="fa-solid fa-user-tie"></i>
                        </div>
                        <div class="menu-title">Docentes</div>
                    </a>
                </li>
                <li>
                    <a href="./paginas/estudiantes.php">
                        <div class="parent-icon"><i class="fa-solid fa-user"></i>
                        </div>
                        <div class="menu-title">Estudiantes</div>
                    </a>
                </li>
                <li>
                    <a href="./paginas/notas.php">
                        <div class="parent-icon"><i class="fa-solid fa-file-invoice"></i>
                        </div>
                        <div class="menu-title">Notas</div>
                    </a>
                </li>
                <li>
                    <a href="./paginas/notas.php">
                        <div class="parent-icon"><i class="fa-solid fa-book"></i>
                        </div>
                        <div class="menu-title">Academico</div>
                    </a>
                </li>
                <li>
                    <a href="./cartera/index.php" target="_blank">
                        <div class="parent-icon"><i class="fa-solid fa-circle-dollar-to-slot"></i>
                        </div>
                        <div class="menu-title">Cartera</div>
                    </a>
                </li>
                <li class="menu-label">
                    <hr>
                </li>
                <li>
                    <a href="./logout.php">
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

        <footer class="page-footer">
            <p class="mb-0">Copyright © 2021. All right reserved.</p>
        </footer>



        <!--end switcher-->
        <!-- Bootstrap JS -->
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


        <!--plugins-->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
        <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
        <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
        <script src="assets/plugins/chartjs/js/Chart.min.js"></script>
        <script src="assets/plugins/chartjs/js/Chart.extension.js"></script>
        <script src="assets/js/index.js"></script>
        <!--app JS-->
        <script src="assets/js/app.js"></script>
</body>

</html>