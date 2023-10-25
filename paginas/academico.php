<?php
include_once("./header.php");
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
                <div style="background: #20425a;" class="card radius-10 p-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 txt-card-custom">Crear Materia</p>
                                <a style="color: #fee6ff;" href="#" id="mostrarFormulario2" class="text-blue-500 hover:underline">Click aqui</a>
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
                    <input type="text" class="form-control" id="nombre_a" name="nombre_a" required>
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
            <h2 class=" my-4">Registro de Materias</h2>
            <form action="procesar_registro_materia.php" method="POST">
                <div class="form-group">
                    <label for="nombre_materia">Nombre de la Materia:</label>
                    <input type="text" class="form-control" id="nombre_materia" name="nombre_materia" required>
                </div>
                <div class="form-group">
                    <label for="codigo_materia">Código de la Materia:</label>
                    <input type="text" class="form-control" id="codigo_materia" name="codigo_materia" required>
                </div>
                <div class="form-group">
                    <label for="creditos">Créditos de la Materia:</label>
                    <input type="number" class="form-control" id="creditos" name="creditos" required>
                </div>
                <button type="submit" class="btn btn-primary">Registrar Materia</button>
            </form>
            <br><br>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div id="formulario3" class="container" style="display: none;">
            <h2 class="my-4">Registro de Grupos</h2>
            <form action="procesar_registro_grupo.php" method="POST">
                <div class="form-group">
                    <label for="nombre_grupo">Nombre del Grupo:</label>
                    <input type="text" class="form-control" id="nombre_grupo" name="nombre_grupo" required>
                </div>
                <div class="form-group">
                    <label for="id_año">Año Académico:</label>
                    <select class="form-control" id="id_año" name="id_año" required>
                        <option value="1">2023-2024</option>
                        <option value="2">2024-2025</option>
                        <!-- Agrega más opciones de años académicos según sea necesario -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_materia">Materia:</label>
                    <select class="form-control" id="id_materia" name="id_materia" required>
                        <option value="1">Matemáticas</option>
                        <option value="2">Ciencias</option>
                        <!-- Agrega más opciones de materias según sea necesario -->
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Registrar Grupo</button>
            </form>
            <br><br>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
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