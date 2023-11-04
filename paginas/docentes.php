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

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
            <div class="col">
                <div style="background: #235c81;" class="card radius-10 p-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <a class="txt-card-custom mb-0">Crear Docente</a>
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
                                <p style="font-size: 17px !important;" class="mb-0 txt-card-custom">Editar Docente</p>
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