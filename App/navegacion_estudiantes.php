<?php
session_start(); require "./App/conexion.php";


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
    <title>ITGEM</title>

    <link rel="stylesheet" href="./recursos/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./recursos/style.css">
    <link rel="shortcut icon" href="./recursos/img/logo-grande.svg" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">


</head>

<body>
    <br>
    <div style="background: none !important;" class="espacecustom">
        <span class="ms-3 badge text-bg-danger"><?php if (isset($message)) : ?>
            <p class="designattion mb-0" style="color: white; font-size: 14px; padding: 2px;"><?php echo $message; // mensaje de administrador  
                                                  ?></p>
            <?php endif; ?>
        </span>

        </span> <span class="mb-3 ms-3"><span class="fw-bold"><?php
                                                                echo $_SESSION['nombre_usuario'];
                                                                ?></span></span>
    </div>


    <!--  -->
    <div class="espacecustom mt-4 border">
        <!--  -->
        <nav class="navbar navbar-expand-lg" aria-label="Offcanvas navbar large">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="./recursos/img/logo-grande.svg" alt="Logo" width="60" height="60" class="d-inline-block align-text-top">
                    <span style="font-size: 24px; color: rgb(44, 44, 44);" class="ms-2 fw-bolder">Sistema
                        Académico</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbar2Label">Offcanvas</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active fw-medium" aria-current="page" href="#">Inicio</a>
                            </li>
                        
                            <li class="nav-item">
                                <a class="nav-link" href="./Estudiantes/notas.php">Ver Notas</a>
                            </li>
                          
                        </ul>
                        <a href="./logout.php">
                            <button class="btn btn-dark" type="submit">Cerrar Sección</button>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <!--  -->
    </div>
    <!--  -->


    <script src="./recursos/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>