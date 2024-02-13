<?php require "navegacion.php";
require './funciones/contar.php'; ?>

<!--  -->
<div style="background: none !important; margin-top: 50px !important;" class="espacecustom mt-4 rounded ">
    <span style="font-size: 20px;" class="badge text-bg-primary ms-2 mb-4">Tienes: <span style=" color: yellow;"> <?php echo $totalRegistrosEstudiantes; ?> </span> Estudiantes</span>

    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">

        <div class="col">
            <h2 class="fw-bolder ms-2">Crear estudiante nuevo:</h2>

            <div style="background: none !important; margin-top: 40px !important;" class=" mt-4 rounded ">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
                    <div class="col mb-3">
                        <div style="background-color: #e4e4e7;  border-radius: 20px;" class="card radius-10 p-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p style="color: #141e2c; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Crear Estudiante</p>
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
                                        <p style="color: #141e2c; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Ver Estudiante</p>
                                        <a style="color: #141e2c !important;" href="#formulario2" id="mostrarFormulario2" class="text-blue-500 hover:underline">Click
                                            aqui</a>
                                        <br>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col mb-3">
                        <div style="background: #60a5fa; border-radius: 20px;" class="card radius-10 p-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p style="color: #141e2c; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Subir Documentos</p>
                                        <a style="color: #141e2c !important;" href="#formulario3" id="mostrarFormulario3" class="text-blue-500 hover:underline">Click
                                            aqui</a>
                                        <br>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col mb-3">
                        <div style="background-color: #e4e4e7;  border-radius: 20px;" class="card radius-10 p-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p style="color: #141e2c; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Ver Estadisticas</p>
                                        <a style="color: #141e2c !important;" href="#formulario4" id="mostrarFormulario4" class="text-blue-500 hover:underline">Click
                                            aqui</a>
                                        <br>
                                    </div>

                                </div>
                            </div>
                            <!-- Contenido de la primera tarjeta -->
                        </div>
                    </div>
                </div>
            </div>
            <p class="mt-4 ms-2" style="width: 80%;">Dale click en el boton correspondiente para crear o editar un estudiante</p>

        </div>

        <div class="col">
            <div class="col mb-4 d-flex justify-content-center">
                <img width="400" class="img" src="../recursos/img/img6.svg" alt="">
            </div>
        </div>

    </div>
</div>

<div id="formulario1" style="display: none;" class="espacecustom p-4 border p-custom">
    <h2 class="fw-bolder ms-2">Registro de Estudiantes:</h2>
    <span style="font-size: 15px;" class="badge text-bg-info ms-2 mt-3">Datos personales</span>

    <form action="./procesar/procesar_registro_estudiante.php" method="POST">
        <br>
        <div class="row mb-3">
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <div class="input-group flex-nowrap">
                        <i style="font-size: 27px;" class="fa-solid fa-user input-group-text"></i>
                        <input autocomplete="off" id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre:" aria-label="Username" aria-describedby="addon-wrapping" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <!-- Deja este espacio en blanco para agregar más campos si es necesario -->
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <div class="input-group flex-nowrap">
                        <i style="font-size: 27px;" class="fa-solid fa-calendar-days input-group-text"></i>
                        <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" class="form-control" aria-describedby="addon-wrapping" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lugar_nacimiento">Lugar de nacimiento:</label>
                    <div class="input-group flex-nowrap">
                        <i style="font-size: 27px;" class="fa-solid fa-earth-americas input-group-text"></i>
                        <input autocomplete="off" id="lugar_nacimiento" name="lugar_nacimiento" type="text" class="form-control" placeholder="Lugar de nacimiento:" aria-label="Username" aria-describedby="addon-wrapping" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <i style="font-size: 27px;" class="fa-solid fa-id-card input-group-text"></i>
                    <select id="tipo_documento" name="tipo_documento" class="form-select" required>
                        <option selected>Selecciona un tipo de documento..</option>
                        <option value="DNI">Tarjeta de identidad</option>
                        <option value="Cedula">Cedula</option>
                        <option value="Pasaporte">Pasaporte</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group flex-nowrap">
                    <i style="font-size: 27px;" class="fa-solid fa-id-card input-group-text"></i>
                    <input autocomplete="off" placeholder="Numero de documento" id="documento_identidad" name="documento_identidad" type="number" class="form-control" aria-describedby="addon-wrapping" required>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="fecha_expedicion">Fecha de expedición:</label>
                <div class="input-group flex-nowrap">
                    <i style="font-size: 27px;" class="fa-solid fa-calendar-days input-group-text"></i>
                    <input autocomplete="off" id="fecha_expedicion" name="fecha_expedicion" type="date" class="form-control" aria-describedby="addon-wrapping" required>
                </div>
            </div>
            <div class="col-md-6">
                <label for="lugar_expedicion">Expedida en:</label>
                <div class="input-group flex-nowrap">
                    <i style="font-size: 27px;" class="fa-solid fa-earth-americas input-group-text"></i>
                    <input autocomplete="off" id="lugar_expedicion" name="lugar_expedicion" type="text" class="form-control" placeholder="Lugar de Expedición:" aria-label="Username" aria-describedby="addon-wrapping" required>
                </div>
            </div>
            <div class="col-md-6 mt-3">
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
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group flex-nowrap">
                    <i style="font-size: 27px;" class="fa-solid fa-map-location-dot input-group-text"></i>
                    <input autocomplete="off" id="direccion" name="direccion" type="text" class="form-control" placeholder="Direccion:" aria-label="Username" aria-describedby="addon-wrapping" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group flex-nowrap">
                    <i style="font-size: 27px;" class="fa-solid fa-phone input-group-text"></i>
                    <input autocomplete="off" id="telefono" name="telefono" type="text" class="form-control" placeholder="Telefono:" aria-label="Username" aria-describedby="addon-wrapping" required>
                </div>
            </div>
        </div>

        <br>
        <span style="font-size: 15px;" class="badge text-bg-info ms-2 mt-3">Datos del acudiente</span>
        <br>
        <br>

        <div class="row mb-3">
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <div class="input-group flex-nowrap">
                        <i style="font-size: 27px;" class="fa-solid fa-user input-group-text"></i>
                        <input autocomplete="off" id="nombre_acudiente" name="nombre_acudiente" type="text" class="form-control" placeholder="Nombre:" aria-label="Username" aria-describedby="addon-wrapping" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <!-- Deja este espacio en blanco para agregar más campos si es necesario -->
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <i style="font-size: 27px;" class="fa-solid fa-id-card input-group-text"></i>
                    <select id="tipo_documento_acudiente" name="tipo_documento_acudiente" class="form-select" required>
                        <option selected>Selecciona un tipo de documento..</option>
                        <option value="DNI">Tarjeta de identidad</option>
                        <option value="Cedula">Cedula</option>
                        <option value="Pasaporte">Pasaporte</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group flex-nowrap">
                    <i style="font-size: 27px;" class="fa-solid fa-id-card input-group-text"></i>
                    <input autocomplete="off" placeholder="Numero de documento_acudiente" id="documento_identidad_acudiente" name="documento_identidad_acudiente" type="number" class="form-control" aria-describedby="addon-wrapping" required>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="fecha_expedicion">Fecha de expedición:</label>
                <div class="input-group flex-nowrap">
                    <i style="font-size: 27px;" class="fa-solid fa-calendar-days input-group-text"></i>
                    <input autocomplete="off" id="fecha_expedicion" name="fecha_expedicion" type="date" class="form-control" aria-describedby="addon-wrapping" required>
                </div>
            </div>
            <div class="col-md-6">
                <label for="lugar_expedicion">Expedida en:</label>
                <div class="input-group flex-nowrap">
                    <i style="font-size: 27px;" class="fa-solid fa-earth-americas input-group-text"></i>
                    <input autocomplete="off" id="lugar_expedicion" name="lugar_expedicion" type="text" class="form-control" placeholder="Lugar de Expedición:" aria-label="Username" aria-describedby="addon-wrapping" required>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="input-group flex-nowrap">
                    <i style="font-size: 27px;" class="fa-solid fa-map-location-dot input-group-text"></i>
                    <input autocomplete="off" id="direccion" name="direccion" type="text" class="form-control" placeholder="Direccion:" aria-label="Username" aria-describedby="addon-wrapping" required>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="input-group flex-nowrap">
                    <i style="font-size: 27px;" class="fa-solid fa-phone input-group-text"></i>
                    <input autocomplete="off" id="telefono" name="telefono" type="text" class="form-control" placeholder="Telefono:" aria-label="Username" aria-describedby="addon-wrapping" required>
                </div>
            </div>
        </div>

        <br>
        <span style="font-size: 15px;" class="badge text-bg-info ms-2 mt-3">Datos academicos</span>
        <br>
        <br>

        <div class="form-group mb-3">
            <label for="grupo">Grupo de Estudios:</label>
            <select class="form-control" id="grupo" name="grupo" required>
                <?php
                // Realiza una consulta para obtener los grupos
                $sql = "SELECT g.id AS grupo_id, g.nombre_grupo, g.grupo, a.nombre_a FROM grupos g INNER JOIN gestion_a a ON g.id_año = a.id";
                $result = $conexion->query($sql);

                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['grupo_id'] . "'>" . $row['nombre_grupo'] . " - Grupo " . $row['grupo'] . " (" . $row['nombre_a'] . ")</option>";
                    }

                    $result->free();
                } else {
                    echo "<option value=''>No hay grupos disponibles</option>";
                }
                ?>
            </select>
        </div>

        <div class="row mb-3">
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
            <!-- Agrega más campos aquí si es necesario -->
        </div>

        <div class="form-group mb-3">
            <label for="correo">Correo:</label>
            <input autocomplete="off" autocomplete="off" type="email" class="form-control" id="correo" name="correo" required>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="contrasena">Contraseña:</label>
                    <input autocomplete="off" readonly placeholder="Contraseña" id="contrasena" name="contrasena" type="password" class="form-control" required autocomplete="off">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="verificarContrasena">Verificar contraseña:</label>
                    <input autocomplete="off" readonly placeholder="Verificar Contraseña" id="verificarContrasena" name="verificarContrasena" type="password" class="form-control" required autocomplete="off">
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


<div id="formulario2" style="display: ;" class="espacecustom p-4 border p-custom">
    <h2 class="fw-bolder ms-2">Ver Estudiantes:</h2>
    <!-- Agrega un formulario para filtrar por grupo -->
    <form method="GET" action="">
        <label class="mb-3 ms-2" for="filtro_grupo">Filtrar por Grupo:</label>
        <select style="width: 50%;" class="form-select form-select-lg" name="filtro_grupo" id="filtro_grupo">
            <option value="">Todos los Grupos</option>
            <?php
            // Consulta para obtener los nombres de los grupos
            $sql_grupos = "SELECT id, nombre_grupo, grupo FROM grupos";
            $result_grupos = $conexion->query($sql_grupos);

            if ($result_grupos) {
                while ($row_grupo = $result_grupos->fetch_assoc()) {
                    $selected = ($_GET['filtro_grupo'] == $row_grupo['id']) ? 'selected' : '';
                    echo "<option value='" . $row_grupo['id'] . "' $selected>" . $row_grupo['nombre_grupo'] . " - Grupo " . $row_grupo['grupo'] . "</option>";
                }
                $result_grupos->free();
            }
            ?>
        </select>
        <button class="btn btn-primary mt-3 mb-3" type="submit">Filtrar</button>
    </form>
    <div class="table-responsive">

        <table class="table table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha de Nacimiento</th>
                    <th scope="col">Género</th>
                    <th scope="col">Grupo de Estudios</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Construye la parte de la consulta SQL para el filtro por grupo
                $filtro_grupo = isset($_GET['filtro_grupo']) ? $_GET['filtro_grupo'] : '';
                $filtro_sql = ($filtro_grupo != '') ? " WHERE g.id = $filtro_grupo" : '';

                // Consulta para obtener los datos de los estudiantes y sus grupos con el filtro aplicado
                $sql = "SELECT e.id, e.nombre, e.apellido, e.fecha_nacimiento, e.genero, g.nombre_grupo, g.grupo, a.nombre_a 
        FROM estudiantes e
        INNER JOIN grupos g ON e.grupo_id = g.id
        INNER JOIN gestion_a a ON g.id_año = a.id" . $filtro_sql;

                $result = $conexion->query($sql);

                if ($result) {
                    $i = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<th scope='row'>$i</th>";
                        echo "<td>" . $row['nombre'] . "</td>";

                        echo "<td>" . $row['fecha_nacimiento'] . "</td>";
                        echo "<td>" . $row['genero'] . "</td>";
                        echo "<td>" . $row['nombre_grupo'] . " - Grupo " . $row['grupo'] . " (" . $row['nombre_a'] . ")</td>";
                        echo "<td>
                        <a href='editar_estudiante.php?id=" . $row['id'] . "'>Editar</a>
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

</div>


<div id="formulario3" style="display: none;" class="espacecustom p-4 border p-custom">
    <h2 class="fw-bolder ms-2">Subir Documentos:</h2>
    <span style="font-size: 15px;" class="badge text-bg-info ms-2 mt-3 mb-3">Tabla</span>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Estado Matricula</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>

                <?php
                // Realizar la consulta
                $consulta = "SELECT * FROM estudiantes";
                $resultado = mysqli_query($conn, $consulta);

                // Comprobar si hay resultados
                if (mysqli_num_rows($resultado) > 0) {
                    // Imprimir los datos de la tabla
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";

                        echo "<td>{$fila['nombre']} {$fila['apellido']}</td>";
                        echo "<td>{$fila['telefono']}</td>";
                        echo "<td>{$fila['estado']}</td>";
                        echo "<td>";
                        echo "<a href='matriculas_estudiantes.php?id={$fila['id']}' class='btn btn-info me-2'>Matricular</a>";
                        echo "<a href='ver_matricula.php?id={$fila['id']}' class='btn btn-primary'>Ver Documentos</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No hay datos en la tabla</td></tr>";
                }

                // Liberar el resultado
                mysqli_free_result($resultado);

                // Cerrar la conexión
                mysqli_close($conn);
                ?>

            </tbody>
        </table>
    </div>

</div>

<br><br><br>

<!-- Agrega este script después de tus campos de formulario -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Captura el campo de número de documento y los campos de contraseña
        var documentoInput = document.getElementById('documento_identidad');
        var contrasenaInput = document.getElementById('contrasena');
        var verificarContrasenaInput = document.getElementById('verificarContrasena');

        // Agrega un evento de entrada al campo de número de documento
        documentoInput.addEventListener('input', function() {
            // Obtén el valor del campo de número de documento
            var numeroDocumento = documentoInput.value;

            // Actualiza los campos de contraseña con el valor del número de documento
            contrasenaInput.value = numeroDocumento;
            verificarContrasenaInput.value = numeroDocumento;
        });
    });
</script>

<div class="col p-4 d-flex justify-content-center">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('gruposPorDocenteChart').getContext('2d');
            var data = <?php echo json_encode($gruposPorDocente); ?>;

            var labels = data.map(function(item) {
                return item.docente;
            });

            var counts = data.map(function(item) {
                return item.cantidad_grupos;
            });

            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Cantidad de Grupos por Docente',
                        data: counts,
                        backgroundColor: '#172554',
                        borderColor: '#172554',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>


</div>


<div id="formulario4" style="display: none;" class="espacecustom p-3">
    <h2 class="fw-bolder ms-2">Estadisticas:</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">

        <div style="height: 40vh;" class="col  d-flex justify-content-center">
            <?php
            // Consulta para obtener la cantidad de mujeres y hombres
            $sqlGender = "SELECT genero, COUNT(*) as count FROM estudiantes GROUP BY genero";
            $resultGender = $conexion->query($sqlGender);

            $genderData = [];
            $genderLabels = [];

            if ($resultGender && $resultGender->num_rows > 0) {
                while ($rowGender = $resultGender->fetch_assoc()) {
                    $genderLabels[] = $rowGender['genero'];
                    $genderData[] = $rowGender['count'];
                }
                $resultGender->free();
            }
            ?>
            <!-- Agrega este elemento canvas donde deseas renderizar el nuevo gráfico -->

            <canvas id="genderChart"></canvas>


            <script>
                // Código JavaScript para renderizar el gráfico de anillo para la distribución de género
                var ctxGender = document.getElementById('genderChart').getContext('2d');
                var genderChart = new Chart(ctxGender, {
                    type: 'doughnut',
                    data: {
                        labels: <?php echo json_encode($genderLabels); ?>,
                        datasets: [{
                            data: <?php echo json_encode($genderData); ?>,
                            backgroundColor: ['#fef08a', '#20425a'], // Puedes personalizar los colores
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: 'Distribución de Género de Estudiantes'
                        }
                    }
                });
            </script>

        </div>

        <div style="height: 40vh;" class="col d-flex justify-content-center">
            <?php
            // Consulta para obtener la cantidad de estudiantes por lugar de nacimiento
            $sqlBirthplace = "SELECT lugar_nacimiento, COUNT(*) as count FROM estudiantes GROUP BY lugar_nacimiento";
            $resultBirthplace = $conexion->query($sqlBirthplace);

            $birthplaceData = [];
            $birthplaceLabels = [];

            if ($resultBirthplace && $resultBirthplace->num_rows > 0) {
                while ($rowBirthplace = $resultBirthplace->fetch_assoc()) {
                    $birthplaceLabels[] = $rowBirthplace['lugar_nacimiento'];
                    $birthplaceData[] = $rowBirthplace['count'];
                }
                $resultBirthplace->free();
            }
            ?>

            <!-- Agrega este elemento canvas donde deseas renderizar el nuevo gráfico -->
            <canvas id="birthplaceChart"></canvas>

            <script>
                // Código JavaScript para renderizar el gráfico de torta para la distribución por lugar de nacimiento
                var ctxBirthplace = document.getElementById('birthplaceChart').getContext('2d');
                var birthplaceChart = new Chart(ctxBirthplace, {
                    type: 'pie',
                    data: {
                        labels: <?php echo json_encode($birthplaceLabels); ?>,
                        datasets: [{
                            data: <?php echo json_encode($birthplaceData); ?>,
                            backgroundColor: ['#ff8c66', '#66b3ff', '#99ff99', '#ffcc99', '#c2c2f0', '#ffb3e6'], // Puedes personalizar los colores
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: 'Distribución de Estudiantes por Lugar de Nacimiento'
                        }
                    }
                });
            </script>
        </div>

    </div>
</div>

<br>
<footer class="espacecustom mb-4 border p-3">
    <center>
        <p class="mb-0">Santander Valley Col Copyright © 2023. All rights reserved.</p>
    </center>

</footer>