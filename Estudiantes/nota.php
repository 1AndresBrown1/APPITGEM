<?php
require '../bd.php';
session_start();

$identificacion = $_SESSION['identificacion_usuario'];

// Obtén el estado de matrícula del estudiante
// ... (tu lógica para obtener el estado de matrícula)

// Llama a la función para cargar las notas del estudiante
cargarNotasEstudiante($identificacion, $conexion);

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
        $_SESSION['notas'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
?>

    <title>ITGEM - ESTUDIANTES</title>
    <link rel="icon" href="../assets/images/login-images/logo-grande.svg" type="image/png" />


    <!DOCTYPE html>
    <html lang="en">

    <head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }
    </style>
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

                <?php if (isset($_SESSION['notas']) && !empty($_SESSION['notas'])) : ?>
        <h2>Notas:</h2>
        <table>
            <thead>
                <tr>
                    <th>Materia</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['notas'] as $nota) : ?>
                    <tr>
                        <td><?= $nota['nombre_materia'] ?></td>
                        <td><?= $nota['nota'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No hay notas disponibles.</p>
    <?php endif; ?>


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