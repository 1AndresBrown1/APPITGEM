<?php
include_once("./bd.php");
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
</head>

<body>

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
          <a href="./index.php">
            <div class="parent-icon"><i class='bx bx-home-circle'></i>
            </div>
            <div class="menu-title">Dashboard</div>
          </a>
        </li>
        <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bx bx-category"></i>
            </div>
            <div class="menu-title">Application</div>
          </a>
          <ul>
            <li> <a href="app-emailbox.html"><i class="bx bx-right-arrow-alt"></i>Email</a>
            </li>
            <li> <a href="app-chat-box.html"><i class="bx bx-right-arrow-alt"></i>Chat Box</a>
            </li>
          </ul>
        </li>
        <li class="menu-label">UI Elements</li>
        <li>
          <a href="widgets.html">
            <div class="parent-icon"><i class='bx bx-cookie'></i>
            </div>
            <div class="menu-title">Widgets</div>
          </a>
        </li>
      </ul>
      <!--end navigation-->
    </div>
    <!--end sidebar wrapper -->
    <!--start header -->
    <header>
      <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
          <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
          </div>
          <div class="search-bar flex-grow-1">
            <div class="position-relative">
              <br>
              <h2 style="color:#3a0035;     font-weight: 600;">ITGEM</h2>
            </div>
          </div>
          <div class="user-box dropdown">
            <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
              <div class="user-info ps-3">
                <p class="user-name mb-0">Maria Torres</p>
                <p class="designattion mb-0">Saldo: <strong>$1000</strong></p>
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
              </li>
              <li>
                <div class="dropdown-divider mb-0"></div>
              </li>
              <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!--end header -->
    <!--start page wrapper -->
    <div class="page-wrapper">
      <div class="page-content">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
          <div class="col">
            <div style="background: #235c81;" class="card radius-10 p-2">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div>
                    <a class="txt-card-custom mb-0">Docentes</a>
                    <br>
                    <a style="color: #fee6ff;" href="./paginas/docentes.php" id="toggleTableLink" class="text-blue-500 hover:underline">Click aqui</a>
                  </div>
                  <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                    <i class='bx bxs-cart'></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div style="background: #204d6c;" class="card radius-10 p-2">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div>
                    <p class="mb-0 txt-card-custom">Estudiantes</p>
                    <a style="color: #fee6ff;" href="./paginas/estudiantes.php" id="toggleTableLink" class="text-blue-500 hover:underline">Click aqui</a>
                  </div>
                  <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class='bx bxs-wallet'></i>
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
                    <p class="mb-0 txt-card-custom">Notas</p>
                    <a style="color: #fee6ff;" href="./paginas/notas.php" id="toggleTableLink" class="text-blue-500 hover:underline">Click aqui</a>
                  </div>
                  <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                    <i class='bx bxs-bar-chart-alt-2'></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div style="background: #152a3c;" class="card radius-10 p-2">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div>
                    <p class="mb-0 txt-card-custom">Academico</p>
                    <a style="color: #fee6ff;" href="./paginas/academico.php" id="toggleTableLink" class="text-blue-500 hover:underline">Click aqui</a>
                  </div>
                  <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto">
                    <i class='bx bxs-group'></i>
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