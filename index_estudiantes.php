<?php
session_start();
require 'bd.php';
// error_reporting(0);

// Verifica si ya hay una sesión activa
if (isset($_SESSION['nombre_usuario'])) {
  // Verifica si el usuario es un administrador
  if ($_SESSION['estudiante'] === "estudiante") {
    // Si el usuario es un administrador, rediríjalo al index.php
    $message = 'Estudiante';
  } else {
    // Si el usuario no es un administrador, rediríjalo a la página correspondiente según el tipo de usuario
    if ($_SESSION['docente'] == 'docente') {
      header('Location: index_docentes.php');
      exit();
    } elseif ($_SESSION['admin'] === "admin") {
      header("Location: index.php");
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
  <title>Document</title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
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
  <title>Rocker - Bootstrap 5 Admin Dashboard Template</title>
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
              <img src="assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
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
                    <img src="./assets/images/Logo Elotes Ilustrado Amarillo y Verde.png" class="logo-icon" alt="logo icon">
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
                    <a href="./index_estudiantes.php">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
              
                
                <li>
                    <a href="./Estudiantes/nota.php">
                        <div class="parent-icon"><i class="fa-solid fa-file-invoice"></i>
                        </div>
                        <div class="menu-title">Notas</div>
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


    <!--start page wrapper -->
    <div class="page-wrapper">
      <div class="page-content">
        <div class="col">
          <div style="background: #152a3c;" class="card radius-10 p-2">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div>
                  <p class="mb-0 txt-card-custom">Academico</p>
                  <a style="color: #fee6ff;" href="./Estudiantes/comprobar.php" id="toggleTableLink" class="text-blue-500 hover:underline">Click aqui</a>
                </div>
                <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto">
                  <i class='bx bxs-group'></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--end row-->
    <!--end switcher-->
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
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