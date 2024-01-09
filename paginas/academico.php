<title>ITGEM - ACADEMICO</title>
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
                <li>
                    <a href="../paginas/docentes.php">
                        <div class="parent-icon"><i class="fa-solid fa-user-tie"></i>
                        </div>
                        <div class="menu-title">Docentes</div>
                    </a>
                </li>
                <li>
                    <a href="./estudiantes.php">
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
                    <a href="./academico.php">
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


        <?php
        include("../bd.php"); // Incluye el archivo de conexión a la base de datos

        // Realiza una consulta para obtener los registros de la tabla gestion_a
        $query = "SELECT * FROM gestion_a";

        // Ejecuta la consulta
        $result = $conexion->query($query);


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifica si el formulario ha sido enviado con el método POST

            // Recupera los datos del formulario
            $nombre_a = $_POST["nombre_a"];

            // Prepara la consulta SQL para insertar un nuevo año académico
            $sql = "INSERT INTO gestion_a (nombre_a) VALUES (?)";

            // Verifica si la conexión está abierta antes de preparar la consulta
            if (!$conexion->connect_error) {
                // Prepara la sentencia
                $stmt = $conexion->prepare($sql);

                if ($stmt) {
                    // Asocia los parámetros
                    $stmt->bind_param("s", $nombre_a);

                    // Ejecuta la sentencia
                    if ($stmt->execute()) {
                        // El año académico se ha creado con éxito
                        echo '<script>alert("El año académico se ha creado con éxito.");</script>';
                        echo '<script>window.location.href = "./academico.php";</script>';
                        exit; // Asegura que no se procese más código en esta página
                    } else {
                        // Ocurrió un error al ejecutar la sentencia
                        echo '<script>alert("Error al crear el año académico: ' . $stmt->error . '");</script>';
                    }

                    // Cierra la sentencia
                    $stmt->close();
                } else {
                    // Ocurrió un error al preparar la sentencia
                    echo '<div class="alert alert-danger" role="alert">Error al preparar la sentencia: ' . $conexion->error . '</div>';
                }
            }
        }


        ?>



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

        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
                    <div class="col">
                        <div style="background: #235c81;" class="card radius-10 p-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <a class="txt-card-custom mb-0">Crear Año</a>
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
                        <div style="background: #152a3c;" class="card radius-10 p-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 txt-card-custom">Crear Grupo</p>
                                        <a style="color: #fee6ff;" href="#" id="mostrarFormulario3" class="text-blue-500 hover:underline">Click aqui</a>
                                    </div>
                                    <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto">
                                        <i class='bx bxs-group'></i>
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
                                        <p style="font-size: 16px;" class="mb-0 txt-card-custom">Crear Materia</p>
                                        <a style="color: #fee6ff;" href="#" id="mostrarFormulario2" class="text-blue-500 hover:underline">Click aqui</a>
                                    </div>
                                    <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                        <i class='bx bxs-bar-chart-alt-2'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- <div class="col">
                <div style="background: #152a3c;" class="card radius-10 p-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 txt-card-custom">Ver Grupos</p>
                                <a style="color: #fee6ff;" href="./listar_estudiantes.php" id="mostrarFormulario3" class="text-blue-500 hover:underline">Click aqui</a>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto">
                                <i class='bx bxs-group'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

                </div>
                <!--end row-->

                <div class="alert alert-dark" role="alert">
                    Seleccione una opción
                </div>

                <div id="formulario1" class="container" style="display: none;">
                    <h2 class=" my-4">Crear Año Académico</h2>
                    <form id="materiaForm" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                        <div class="form-group">
                            <label for="nombre_a">Nombre del Año Académico:</label>
                            <br>
                            <input type="text" class="form-control" id="nombre_a" name="nombre_a" required maxlength="6">
                        </div>
                        <br>
                        <button style="background-color: #2970a0; color: white;" type="submit" class="btn btn-primary">Crear Año Académico</button>
                    </form>
                    <br>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre del Año Académico</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result) {
                                $i = 1;
                                // Itera a través de los resultados y muestra cada registro en una fila de la tabla
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<th scope='row'>$i</th>";
                                    echo "<td>" . $row['nombre_a'] . "</td>";
                                    echo "<td><a href='editar_a.php?id=" . $row['id'] . "'>Editar</a> | <a href='#' class='eliminar-btn' data-id='" . $row['id'] . "'>Eliminar</a></td>";
                                    echo "</tr>";
                                    $i++;
                                }
                                // Libera el resultado
                                $result->free();
                            } else {
                                echo '<tr><td colspan="3">No hay datos disponibles.</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <script>
                    // Obtén todos los elementos con la clase "eliminar-btn"
                    const eliminarButtons = document.querySelectorAll(".eliminar-btn");

                    // Agrega un manejador de eventos a cada botón "Eliminar"
                    eliminarButtons.forEach((btn) => {
                        btn.addEventListener("click", (e) => {
                            e.preventDefault();
                            const id = btn.getAttribute("data-id");

                            // Muestra una alerta de confirmación
                            const confirmarEliminacion = confirm("¿Estás seguro de que deseas eliminar este elemento?");

                            // Si el usuario confirma la eliminación, realiza la solicitud AJAX para eliminar el elemento
                            if (confirmarEliminacion) {
                                // Realiza la solicitud AJAX para eliminar el registro
                                eliminarRegistro(id);
                            }
                        });
                    });

                    // Función para realizar la solicitud AJAX de eliminación
                    function eliminarRegistro(id) {
                        // Crea una instancia de XMLHttpRequest
                        const xhr = new XMLHttpRequest();

                        // Configura la solicitud
                        xhr.open("POST", "eliminar_a.php", true);
                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                        // Define la función que se ejecutará cuando se complete la solicitud
                        xhr.onload = function() {
                            if (xhr.status === 200) {
                                // Aquí puedes manejar la respuesta del servidor después de eliminar el registro
                                console.log(xhr.responseText);
                                // Puedes redirigir o realizar otras acciones si es necesario
                                window.location.href = "academico.php"; // Redirigir a la página de académico
                            } else {
                                console.error("Error al eliminar el registro.");
                            }
                        };

                        // Envía la solicitud con el ID del registro a eliminar
                        xhr.send("id=" + id);
                    }
                </script>


                <div id="formulario2" class="container" style="display: none;">
                    <h2 class="my-4">Registro de Materias</h2>
                    <form action="procesar_registro_materia.php" method="POST">
                        <div class="row">
                            <!-- Primera Columna -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre_materia">Nombre de la Materia:</label>
                                    <input type="text" class="form-control" id="nombre_materia" name="nombre_materia" required>
                                </div>
                            </div>

                            <!-- Segunda Columna -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="codigo_materia">Código de la Materia:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="codigo_materia" name="codigo_materia" required>
                                        <button class="btn btn-secondary" type="button" onclick="generarCodigo()">Generar Código</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Tercera Columna -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_inicio">Fecha de inicio</label>
                                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                                </div>
                            </div>

                            <!-- Cuarta Columna -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_final">Fecha de finalización</label>
                                    <input type="date" class="form-control" id="fecha_final" name="fecha_final" required>
                                </div>
                            </div>


                        </div>




                        <div class="row">
                            <!-- Quinta Columna -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_docente">Docente:</label>
                                    <select class="form-control" id="id_docente" name="id_docente" required>
                                        <?php
                                        // Conecta a la base de datos y recupera los docentes
                                        include("../bd.php");
                                        $sql_docentes = "SELECT id, nombre FROM docentes";
                                        $result_docentes = $conexion->query($sql_docentes);

                                        if ($result_docentes) {
                                            while ($row_docente = $result_docentes->fetch_assoc()) {
                                                echo '<option value="' . $row_docente['id'] . '">' . $row_docente['nombre'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Sexta Columna -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_grupo">Grupo/Curso:</label>
                                    <select class="form-control" id="id_grupo" name="id_grupo" required>
                                        <?php
                                        // Conecta a la base de datos y recupera los grupos
                                        include("../bd.php");
                                        $sql_grupos = "SELECT g.id, g.nombre_grupo, g.grupo, g.id_año, a.nombre_a FROM grupos g
                            INNER JOIN gestion_a a ON g.id_año = a.id";

                                        $result_grupos = $conexion->query($sql_grupos);

                                        if ($result_grupos) {
                                            while ($row_grupo = $result_grupos->fetch_assoc()) {
                                                echo '<option value="' . $row_grupo['id'] . '">' . $row_grupo['nombre_grupo'] . ' - Grupo ' . $row_grupo['grupo'] . ' - ' . $row_grupo['nombre_a'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mt-3">
                            <label class="input-group-text" for="inputGroupSelect01">Estado</label>
                            <select class="form-select" id="estado" name="estado">
                                <option selected>Choose...</option>
                                <option value="En curso">En curso</option>
                                <option value="Aplazada">Aplazada</option>
                                <option value="Finalizada">Finalizada</option>
                            </select>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary">Registrar Materia</button>
                    </form>


                    <script>
                        function generarCodigo() {
                            // Obtener el valor del campo "Nombre de la Materia"
                            var nombreMateria = document.getElementById("nombre_materia").value;

                            // Validar si se ingresó un nombre de materia
                            if (nombreMateria.trim() !== "") {
                                // Crear el código combinando el nombre de la materia y un número aleatorio
                                var numeroAleatorio = Math.floor(Math.random() * 1000);
                                var codigoGenerado = nombreMateria.toUpperCase() + ":" + numeroAleatorio;

                                // Actualizar el valor del campo de entrada
                                document.getElementById("codigo_materia").value = codigoGenerado;
                            } else {
                                alert("Ingrese un nombre de materia antes de generar el código.");
                            }
                        }
                    </script>


                    <br><br>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Código de Materia</th>
                                <th scope="col">Nombre de la Materia</th>
                                <th scope="col">Grupo</th>
                                <th scope="col">Docente</th>
                                <th scope="col">Fecha inicio</th>
                                <th scope="col">Fecha final</th>
                                <th scope="col">Año Académico</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT m.id AS materia_id, m.codigo_materia, m.nombre_materia, m.id_docente, m.fecha_inicio, m.fecha_final, m.estado, g.nombre_grupo, g.grupo, a.nombre_a, d.nombre
        FROM materias m 
        INNER JOIN grupos g ON m.id_grupo = g.id
        INNER JOIN gestion_a a ON g.id_año = a.id
        INNER JOIN docentes d ON m.id_docente = d.id";
                            $result = $conexion->query($sql);

                            if ($result) {
                                $i = 1;
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<th scope='row'>$i</th>";
                                    echo "<td>" . $row['codigo_materia'] . "</td>";
                                    echo "<td>" . $row['nombre_materia'] . "</td>";
                                    echo "<td>" . $row['nombre_grupo'] . " - Grupo " . $row['grupo'] . "</td>";
                                    echo "<td>" . $row['nombre'] . "</td>"; // Aquí se muestra el nombre completo del docente
                                    echo "<td>" . $row['fecha_inicio'] . "</td>";
                                    echo "<td>" . $row['fecha_final'] . "</td>";
                                    echo "<td>" . $row['nombre_a'] . "</td>";
                                    echo "<td>" . $row['estado'] . "</td>"; // Agregado el campo 'estado'
                                    echo "<td><a href='editar_materia.php?id=" . $row['materia_id'] . "'>Editar</a> | <a href='#' onclick='confirmDelete(" . $row['materia_id'] . ");'>Eliminar</a></td>";
                                    echo "</tr>";
                                    $i++;
                                }
                                $result->free();
                            } else {
                                echo '<tr><td colspan="10">No hay datos de materias disponibles.</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>


                    <script>
                        function confirmDelete(id) {
                            var result = confirm("¿Estás seguro de que deseas eliminar esta materia?");
                            if (result) {
                                // Si el usuario hace clic en "Aceptar", redirige a la página de eliminación
                                window.location.href = "eliminar_materia.php?id=" + id;
                            }
                            // Si hace clic en "Cancelar", no se realizará ninguna acción
                        }
                    </script>



                </div>


                <div id="formulario3" class="container" style="display: none;">
                    <h2 class="my-4">Registro de Grupos</h2>
                    <div class="container">
                        <form action="procesar_registro_grupo.php" method="POST">
                            <div class="row">
                                <!-- Primera Columna -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre_grupo">Nombre del Grupo:</label>
                                        <input type="text" class="form-control" id="nombre_grupo" name="nombre_grupo" required>
                                    </div>
                                </div>

                                <!-- Segunda Columna -->
                                <div class="col-md-6">
                                    <div class="input-group mt-4">
                                        <label class="input-group-text" for="grupo">Grupo</label>
                                        <select id="grupo" name="grupo" class="form-select">
                                            <option selected>Choose...</option>
                                            <?php
                                            for ($i = 1; $i <= 10; $i++) {
                                                echo '<option value="' . $i . '">Grupo ' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Tercera Columna -->
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="id_año">Año Académico:</label>
                                        <select class="form-control" id="id_año" name="id_año" required>
                                            <?php
                                            // Consulta para obtener los años académicos desde la tabla "gestion_a"
                                            $sql = "SELECT id, nombre_a FROM gestion_a";
                                            $result = $conexion->query($sql);

                                            if ($result) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $id_año = $row["id"];
                                                    $nombre_año = $row["nombre_a"];
                                                    echo "<option value='$id_año'>$nombre_año</option>";
                                                }
                                                $result->free();
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- Cuarta Columna -->
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="id_docente">Docente:</label>
                                        <select class="form-control" id="id_docente" name="id_docente" required>
                                            <?php
                                            // Conecta a la base de datos y recupera los docentes
                                            include("../bd.php");

                                            $sql = "SELECT id, nombre, apellido FROM docentes"; // Agrega el campo 'apellido' a la consulta
                                            $result = $conexion->query($sql);

                                            if ($result) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<option value="' . $row['id'] . '">' . $row['nombre'] . ' ' . $row['apellido'] . '</option>';
                                                }
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <!-- Quinta Columna (Botón de Enviar) -->
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Registrar Grupo</button>
                                </div>
                            </div>
                        </form>



                        <script>
                            function confirmarEliminacion(id) {
                                if (confirm("¿Estás seguro de que deseas eliminar este registro?")) {
                                    window.location.href = 'eliminar_grupo.php?id=' + id;
                                }
                            }
                        </script>


                        <br><br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre del Grupo</th>
                                    <th scope="col">Grupo</th>
                                    <th scope="col">Año Académico</th>
                                    <th scope="col">Docente</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Consulta para obtener los datos de los grupos
                                $sql = "SELECT g.id AS grupo_id, g.nombre_grupo, g.grupo, g.id_docente, a.nombre_a, d.nombre FROM grupos g 
                    INNER JOIN gestion_a a ON g.id_año = a.id
                    INNER JOIN docentes d ON g.id_docente = d.id
                    ";
                                $result = $conexion->query($sql);

                                if ($result) {
                                    $i = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<th scope='row'>$i</th>";
                                        echo "<td>" . $row['nombre_grupo'] . "</td>";
                                        echo "<td>" . $row['grupo'] . "</td>";

                                        echo "<td>" . $row['nombre_a'] . "</td>";
                                        echo "<td>" . $row['nombre'] . "</td>";
                                        echo "<td><a href='editar_grupo.php?id=" . $row['grupo_id'] . "'>Editar</a> | <a href='javascript:confirmarEliminacion(" . $row['grupo_id'] . ")'>Eliminar</a></td>";

                                        echo "</tr>";
                                        $i++;
                                    }
                                    $result->free();
                                } else {
                                    echo '<tr><td colspan="4">No hay datos de grupos disponibles.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

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

                    <br><br><br>


                    <!-- Modal de confirmación de eliminación -->
                    <div class="modal fade" id="confirmarEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ¿Está seguro de que desea eliminar este año académico?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <a id="confirmarEliminarBtn" class="btn btn-danger">Eliminar</a>
                                </div>
                            </div>
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