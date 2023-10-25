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
                                <p style="font-size: 17px !important;" class="mb-0 txt-card-custom">Matricular Estudiante</p>
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
            <h2 class="my-4">Registro de Estudiantes</h2>
            <form action="procesar_registro_estudiante.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="apellido">Apellido:</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tipo_documento">Tipo de Documento:</label>
                            <select class="form-control" id="tipo_documento" name="tipo_documento" required>
                                <option value="cedula">Cédula</option>
                                <option value="pasaporte">Pasaporte</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="documento_identidad">Documento de Identidad:</label>
                            <input type="text" class="form-control" id="documento_identidad" name="documento_identidad" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="direccion">Dirección:</label>
                            <input type="text" class="form-control" id="direccion" name "direccion" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Registrar Estudiante</button>
            </form>
        </div>


        <div style="display: none;" id="formulario2" class="container">
            <h2 class="my-4">Matrícula de Estudiantes</h2>
            <form action="procesar_matricula_estudiante.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_grupo">Grupo:</label>
                            <select class="form-control" id="id_grupo" name="id_grupo" required>
                                <option value="1">Grupo 1</option>
                                <option value="2">Grupo 2</option>
                                <!-- Agrega más opciones de grupos según sea necesario -->
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_estudiante">Estudiante:</label>
                            <select class="form-control" id="id_estudiante" name="id_estudiante" required>
                                <option value="1">Estudiante 1</option>
                                <option value="2">Estudiante 2</option>
                                <!-- Agrega más opciones de estudiantes según sea necesario -->
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fecha_matricula">Fecha de Matrícula:</label>
                            <input type="date" class="form-control" id="fecha_matricula" name="fecha_matricula" required>
                        </div>
                    </div>

                </div>
                <br>
                <button type="submit" class="btn btn-primary">Matricular Estudiante</button>
            </form>
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