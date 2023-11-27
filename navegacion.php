<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APPITGEM</title>

    <link rel="shortcut icon" href="./assets/images/Logo Elotes Ilustrado Amarillo y Verde.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/fonts/fonst.css">

    

    <!-- Bootstrap -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <!-- Bootstrap -->
</head>

<body>

    <!-- Navbar -->
    <div style="top: 10px !important;" class="mt-4 sticky-top">
        <nav class="cardcustom p-2 navbar navbar-expand-lg">
            <div class="container-fluid">
                <div class="d-flex d-flex justify-content-center align-items-center me-5">
                    <div class="dropdown">
                        <img width="50" src="./assets/images/Logo Elotes Ilustrado Amarillo y Verde.png" class="rounded-circle userPhoto cimg dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" alt="user">
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="javascript:;">Opción 1</a>
                            <a class="dropdown-item" href="javascript:;">Opción 2</a>
                            <a class="dropdown-item" href="javascript:;">Opción 3</a>
                        </div>
                    </div>
                    <div>
                        <span class="fs-5  bold fw-bold navbar-brand ms-3 text-wrap" href="#">APPITGEM</span>
                    </div>
                </div>

                <button class="navbar-toggler border border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""><i style="font-size: 27px;" class="fa-solid fa-bars-staggered"></i></span>
                </button>
                <div style="flex-grow: 0 !important;" class="collapse navbar-collapse m-2" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item ms-2">
                            <a class="nav-link active" aria-current="page" href="javascript:;">Inicio</a>
                        </li>

                        <li class="nav-item dropdown ms-2">
                            <a class="nav-link dropdown-toggle" href="href=" javascript:;"" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Academico
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;"><i style="font-size: 12px; margin-right: 10px; background-color: rgb(233, 233, 233);" class="fa-solid fa-graduation-cap p-2 rounded-circle"></i>Academico</a></li>

                                <li class="mt-2"><a class="dropdown-item" href="javascript:;"><i style="font-size: 12px; margin-right: 10px; background-color: rgb(233, 233, 233);" class="fa-solid fa-user-group p-2 rounded-circle"></i>Ver grupos</a></li>
                            </ul>
                        </li>


                        <li class="nav-item ms-2">
                            <a class="nav-link" href="./paginas/docentes.php">Docentes</a>
                        </li>

                        <li class="nav-item ms-2">
                            <a class="nav-link" href="javascript:;">Estudiantes</a>
                        </li>

                        <li class="nav-item ms-2">
                            <a class="nav-link" href="javascript:;">Notas</a>
                        </li>

                        <li class="btn-custom-nav nav-item">
                            <a type="button" id="logout" class="nav-link" href="javascript:void(0);">Cerrar Sesión</a>
                        </li>
                    </ul>

                </div>

            </div>
        </nav>
    </div>
    <!-- Navbar -->

    


    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>