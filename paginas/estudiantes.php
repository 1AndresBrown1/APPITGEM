<?php
include_once("./header.php");
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
<script>
            document.addEventListener("DOMContentLoaded", function () {
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
                verificarContrasenaInput.addEventListener("focus", function () {
                    verificarContrasenaInput.style.borderColor = "";
                });
            });
            </script>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
            <div class="col">
                <div style="background: #235c81;" class="card radius-10 p-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <a class="txt-card-custom mb-0">Crear Estudiane</a>
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
                                <p style="font-size: 17px !important;" class="mb-0 txt-card-custom">Editar Estudiante</p>
                                <a style="color: #fee6ff;" href="#" id="mostrarFormulario2" class="text-blue-500 hover:underline">Click aqui</a>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                <i class='bx bxs-bar-chart-alt-2'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--end row-->

        <div id="formulario1" class="container">

            <form action="procesar_registro_estudiante.php" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                </div>
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                </div>
                <div class="form-group">
                    <label for="genero">Género:</label>
                    <select class="form-control" id="genero" name="genero" required>
                        <option value="">Selecciona un género</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="grupo">Grupo de Estudios:</label>
                    <select class="form-control" id="grupo" name="grupo" required>
                        <?php
                        include("../bd.php"); // Incluye el archivo de conexión a la base de datos

                        // Realiza una consulta para obtener los grupos
                        $sql = "SELECT g.id AS grupo_id, g.nombre_grupo, a.nombre_a FROM grupos g INNER JOIN gestion_a a ON g.id_año = a.id";
                        $result = $conexion->query($sql);

                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['grupo_id'] . "'>" . $row['nombre_grupo'] . " (" . $row['nombre_a'] . ")</option>";
                            }

                            $result->free();
                        } else {
                            echo "<option value=''>No hay grupos disponibles</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="documento_identidad">Documento de Identidad:</label>
                    <input type="number" class="form-control" id="documento_identidad" name="documento_identidad" required>
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
                <div class="form-group">
                    <label for="estado_matricula">Estado de Matrícula:</label>
                    <select class="form-control" id="estado_matricula" name="estado_matricula" required>
                        <option value="pagado">Pagado</option>
                        <option value="sin_saldar">Sin saldar</option>
                    </select>
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Registrar Estudiante</button>
            </form>
        </div>



        <div style="display: none;" id="formulario2" class="container">
            <h2 class="my-4">Editar Estudiantes</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Fecha de Nacimiento</th>
                        <th scope="col">Género</th>
                        <th scope="col">Grupo de Estudios</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Consulta para obtener los datos de los estudiantes y sus grupos
                    $sql = "SELECT e.id, e.nombre, e.apellido, e.fecha_nacimiento, e.genero, g.nombre_grupo, a.nombre_a 
                FROM estudiantes e
                INNER JOIN grupos g ON e.grupo_id = g.id
                INNER JOIN gestion_a a ON g.id_año = a.id";

                    $result = $conexion->query($sql);

                    if ($result) {
                        $i = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<th scope='row'>$i</th>";
                            echo "<td>" . $row['nombre'] . "</td>";
                            echo "<td>" . $row['apellido'] . "</td>";
                            echo "<td>" . $row['fecha_nacimiento'] . "</td>";
                            echo "<td>" . $row['genero'] . "</td>";
                            echo "<td>" . $row['nombre_grupo'] . " (" . $row['nombre_a'] . ")</td>";
                            echo "<td>
                        <a href='editar_estudiante.php?id=" . $row['id'] . "'>Editar</a> | 
                        <a href='eliminar_estudiante.php?id=" . $row['id'] . "'>Eliminar</a>
                    </td>";
                            echo "</tr>";
                            $i++;
                        }
                        $result->free();
                    } else {
                        echo '<tr><td colspan="7">No hay datos de estudiantes disponibles.</td></tr>';
                    }
                    ?>
                </tbody>
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