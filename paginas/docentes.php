<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docentes</title>

    <link rel="shortcut icon" href="../assets/images/Logo Elotes Ilustrado Amarillo y Verde.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/fonts/fonst.css">



    <!-- Bootstrap -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Bootstrap -->
</head>

<body>


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

                        <!-- 
                        <li class="nav-item ms-2">
                            <a class="nav-link" href="./paginas/docentes.php">Docentes</a>
                        </li> -->

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


    <div style="background-color: white !important;" class="cardcustom  mt-4">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">

            <div class="col mb-4">
                <div class="div-info">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" href="javascript:;">
                        <h2 class="hover-text" style="color: aliceblue; font-weight: 900;">Ver Docentes</h2>
                    </a>
                </div>
            </div>

            <div class="col mb-4 d-flex align-items-center">
                <img width="500" class="img-fluid" src="./assets/images/6undraw_a_day_at_the_park_re_9kxj.svg" alt="">
            </div>
        </div>
    </div>


    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <!-- OPCIONES -->
            <div style="background-color: white !important;" class="page-wrapper cardcustom mt-3">
                <div class="page-content">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">

                        <div class="col mt-3">
                            <div id="customCard" style="background: #414e6e; border-radius: 20px;" class="card radius-10 p-2">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p style="color: white; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Crear Docente</p>
                                            <a style="color: #fee6ff;" href="#" id="mostrarFormulario1" class="text-blue-500 hover:underline">Click aqui</a>
                                            <br>
                                        </div>
                                        <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                                            <i class="fa-solid fa-video"></i>
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
                                            <p style="color: white; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Editar Docente</p>
                                            <a style="color: #fee6ff;" href="#" id="mostrarFormulario2" class="text-blue-500 hover:underline">Click aqui</a>
                                            <br>
                                        </div>
                                        <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                                            <i class="fa-solid fa-hand-holding-dollar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- OPCIONES -->
            <!--end row-->

            <div id="formulario1" class="container">

                <form action="procesar_registro_docente.php" method="POST">
                    <h2 class="my-4">Registro de Docentes</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="apellido">Apellido:</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="tipo_documento">Tipo de Documento:</label>
                                <select class="form-control" id="tipo_documento" name="tipo_documento" required>
                                    <option value="cedula">Cédula</option>
                                    <option value="pasaporte">Pasaporte</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="documento_identidad">Documento de Identidad:</label>
                                <input type="text" class="form-control" id="documento_identidad" name="documento_identidad" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="direccion">Dirección:</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="titulo">Título:</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="email">Correo Electrónico:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
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

            <div style="display: none;" id="formulario2" class="container">
                <h2 class="my-4">Editar Docente</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Tipo de Documento</th>
                            <th scope="col">Documento de Identidad</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Título</th>
                            <th scope="col">Correo Electrónico</th>
                            <th scope="col">Fecha de Nacimiento</th>
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
                                echo "<td>" . $row['titulo'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['fecha_nacimiento'] . "</td>";
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
            </table>



        </div>



        <br><br><br>

        <script>
            document.getElementById("mostrarFormulario1").addEventListener("click", function() {
                document.getElementById("formulario1").style.display = "block";
                document.getElementById("formulario2").style.display = "none";

            });

            document.getElementById("mostrarFormulario2").addEventListener("click", function() {
                document.getElementById("formulario1").style.display = "none";
                document.getElementById("formulario2").style.display = "block";
            });
        </script>



        <br><br><br><br>
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>