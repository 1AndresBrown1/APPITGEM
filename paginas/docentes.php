<?php require "navegacion.php"; ?>

<!--  -->
<div style="background: none !important; margin-top: 50px !important;" class="espacecustom mt-4 rounded ">

    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">

        <div class="col">
            <h2 class="fw-bolder ms-2">Crear docente nuevo:</h2>

            <div style="background: none !important; margin-top: 40px !important;" class=" mt-4 rounded ">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
                    <div class="col mb-3">
                        <div style="background-color: #e4e4e7;  border-radius: 20px;" class="card radius-10 p-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p style="color: #141e2c; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Crear Docente</p>
                                        <a style="color: #141e2c !important;" href="#formulario1" id="mostrarFormulario1" class="text-blue-500 hover:underline">Click
                                            aqui</a>
                                        <br>
                                    </div>

                                </div>
                            </div>
                            <!-- Contenido de la primera tarjeta -->
                        </div>
                    </div>

                    <div class="col mb-3">
                        <div style="background: #fef08a; border-radius: 20px;" class="card radius-10 p-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p style="color: #141e2c; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Ver Docente</p>
                                        <a style="color: #141e2c !important;" href="#formulario2"  id="mostrarFormulario2" class="text-blue-500 hover:underline">Click
                                            aqui</a>
                                        <br>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="mt-4 ms-2" style="width: 80%;">Dale click en el boton correspondiente para crear o editar un docente</p>

        </div>

        <div class="col">
            <div class="col mb-4 d-flex justify-content-center">
                <img width="350" class="img" src="../recursos/img/img2.svg" alt="">
            </div>
        </div>

    </div>
</div>


<div id="formulario1" style="display: none;" class="espacecustom p-4 border p-custom">
    <h2 class="fw-bolder ms-2">Registro de docentes:</h2>
    <span style="font-size: 15px;" class="badge text-bg-info ms-2 mt-3">Datos personales</span>

    <!-- Inicia Formulario -->
    <form action="./procesar/procesar_registro_docente.php" method="POST">

        <!-- Grupo 1 -->
        <div class="row mb-3 mt-3">
            <div class="col-md-6 mt-2">
                <!-- Nombre -->
                <div class="form-group">
                    <div class="input-group flex-nowrap">
                        <i style="font-size: 27px;" class="fa-solid fa-user input-group-text"></i>
                        <input autocomplete="of" id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre:" aria-label="Username" aria-describedby="addon-wrapping" required maxlength="25">
                    </div>

                </div>
            </div>

            <div class="col-md-6 mt-2">
                <!-- Apellido -->
                <div class="form-group">
                    <div class="input-group flex-nowrap">
                        <i style="font-size: 27px;" class="fa-solid fa-user input-group-text"></i>
                        <input autocomplete="of" id="apellido" name="apellido" type="text" class="form-control" placeholder="Apellido:" aria-label="Username" aria-describedby="addon-wrapping" required maxlength="25">
                    </div>
                </div>
            </div>

        </div>
        <!-- Grupo 1 -->

        <!-- Grupo 2 -->
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <div class="input-group flex-nowrap mt-2">
                        <i style="font-size: 27px;" class="fa-solid fa-calendar-days input-group-text"></i>
                        <input id="fecha_nacimiento" name="fecha_nacimiento" id="apellido" name="apellido" type="date" class="form-control" aria-describedby="addon-wrapping" required>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="lugar_nacimiento">Lugar de nacimiento:</label>
                    <div class="input-group flex-nowrap mt-2">
                        <i style="font-size: 27px;" class="fa-solid fa-earth-americas input-group-text"></i>
                        <input autocomplete="of" id="lugar_nacimiento" name="lugar_nacimiento" type="text" class="form-control" placeholder="Lugar de nacimiento:" aria-label="Username" aria-describedby="addon-wrapping" maxlength="40" required>
                    </div>
                </div>
            </div>
        </div>
        <!-- Grupo 2 -->

        <!-- Grupo 3 -->
        <div class="row">

            <div class="col-md-6 mt-2">
                <div class="input-group mb-3">
                    <i style="font-size: 27px;" class="fa-solid fa-id-card input-group-text"></i>

                    <select id="tipo_documento" name="tipo_documento" class="form-select" required>
                        <option selected>Selecciona un tipo de documento..</option>
                        <option value="Cedula">Cedula</option>
                        <option value="Pasaporte">Pasaporte</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6 mt-2">
                <div class="input-group flex-nowrap">
                    <i style="font-size: 27px;" class="fa-solid fa-id-card input-group-text"></i>
                    <input autocomplete="of" placeholder="Numero de documento" id="documento_identidad" name="documento_identidad" type="number" class="form-control" aria-describedby="addon-wrapping" required pattern="\d{1,10}">

                </div>
            </div>
        </div>
        <!-- Grupo 3 -->

        <!-- Grupo 4 -->
        <div class="col-md-6 mt-2">
            <div class="input-group">
                <i style="font-size: 27px;" class="fa-solid fa-venus-mars input-group-text"></i>
                <select id="genero" name="genero" class="form-select" required>
                    <option value="">Selecciona un género</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
        </div>
        <!-- Grupo 4 -->

        <!-- Grupo 5 -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="input-group flex-nowrap">
                    <i style="font-size: 27px;" class="fa-solid fa-map-location-dot input-group-text"></i>
                    <input autocomplete="of" id="direccion" name="direccion" type="text" class="form-control" placeholder="Direccion:" aria-label="Username" aria-describedby="addon-wrapping" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group flex-nowrap">
                    <i style="font-size: 27px;" class="fa-solid fa-phone input-group-text"></i>
                    <input autocomplete="of" id="telefono" name="telefono" type="text" class="form-control" placeholder="Telefono:" aria-label="Username" aria-describedby="addon-wrapping" required>
                </div>

            </div>
        </div>
        <!-- Grupo 5 -->

        <span style="font-size: 16px;" class="badge text-bg-secondary ms-2 mt-4 mb-4">Otros datos</span>


        <!-- Grupo 6 -->
        <div class="row mb-4">
            <div class="col-md-6">
              <div class="form-group">
    <label for="eps">EPS:</label>
    <select class="form-control" id="eps" name="eps" required>
        <option value="">Selecciona una EPS</option>
        <option value="ALIANSALUD ENTIDAD PROMOTORA DE SALUD S.A.">ALIANSALUD ENTIDAD PROMOTORA DE SALUD S.A.</option>
        <option value="ASOCIACIÓN INDÍGENA DEL CAUCA">ASOCIACIÓN INDÍGENA DEL CAUCA</option>
        <option value="COMFENALCO VALLE E.P.S.">COMFENALCO VALLE E.P.S.</option>
        <option value="COMPENSAR E.P.S.">COMPENSAR E.P.S.</option>
        <option value="E.P.S. FAMISANAR LTDA.">E.P.S. FAMISANAR LTDA.</option>
        <option value="E.P.S. SANITAS S.A.">E.P.S. SANITAS S.A.</option>
        <option value="EPS SERVICIO OCCIDENTAL DE SALUD S.A.">EPS SERVICIO OCCIDENTAL DE SALUD S.A.</option>
        <option value="EPS Y MEDICINA PREPAGADA SURAMERICANA S.A">EPS Y MEDICINA PREPAGADA SURAMERICANA S.A</option>
        <option value="MALLAMAS">MALLAMAS</option>
        <option value="FUNDACIÓN SALUD MIA EPS">FUNDACIÓN SALUD MIA EPS</option>
        <option value="NUEVA EPS S.A.">NUEVA EPS S.A.</option>
        <option value="SALUD TOTAL S.A. E.P.S.">SALUD TOTAL S.A. E.P.S.</option>
        <option value="SALUDVIDA S.A .E.P.S">SALUDVIDA S.A .E.P.S</option>
        <option value="SAVIA SALUD EPS">SAVIA SALUD EPS</option>
                        <option value="ASMET SALUD EPS">ASMET SALUD EPS</option>

        <!-- Add more options as needed -->
    </select>
</div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label class="mb-2" for="titulo">Título:</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" required>
                </div>
            </div>
            <!-- Agrega más campos aquí si es necesario -->
        </div>
        <!-- Grupo 6 -->

        <!-- Grupo 7 -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
        </div>
        <!-- Grupo 7 -->

        <!-- Grupo 8 -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3 ">
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
        <!-- Grupo 8 -->
        <button style="background-color: #2970a0; color: white;" type="submit" class="btn">Registrar Docente</button>
    </form>

</div>
<br>

<div id="formulario2" style="display: none;" class="espacecustom p-4 border p-custom">
    <h2 class="fw-bolder ms-2 mb-4">Editar docentes:</h2>
    <div class="table-responsive">
        <table style="max-width: 100%;" class="table table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Tipo de Documento</th>
                    <th scope="col">Documento de Identidad</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Correo Electrónico</th>
                                        <th scope="col">Eps</th>

                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("../App/conexion.php");
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
                        echo "<td>" . $row['telefono'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                         echo "<td>" . $row['eps'] . "</td>";
                        echo "<td>
                                    <a href='editar_docentes.php?id=" . $row['id'] . "'>Editar</a> 
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
</div>
<!--  -->
<BR></BR>

<footer class="espacecustom mb-4 border p-3">
    <center>
        <p class="mb-0">Santander Valley Col Copyright © 2023. All rights reserved.</p>
    </center>

</footer>
