<?php require "sidebar.php";
require "../Funciones/contar.php"; ?>


<main>
    <div style="background: none !important;" class="espacecustom  rounded ">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <?php
                // Definir un array asociativo para mapear los roles a los colores de los badges
                $colores_roles = array(
                    'admin' => 'danger',
                    'docente' => 'primary',
                    'estudiante' => 'success'
                    // Agrega aquí más roles y colores si es necesario
                );

                // Obtener el rol del usuario actual desde la sesión
                $rol_usuario = $_SESSION['rol'];

                // Verificar si el rol del usuario está definido en el array de colores
                $badge_color = isset($colores_roles[$rol_usuario]) ? $colores_roles[$rol_usuario] : 'secondary';

                // Mostrar el rol del usuario en el badge
                echo '<span style="font-size: 16px;" class="ms-1 badge bg-' . $badge_color . '">' . ucfirst($rol_usuario) . '</span>';
                echo '<span style="font-size: 16px;" class="ms-1 badge bg-' . $badge_color . '">' . ucfirst($nombre_administrador) . " " . ucfirst($apellido_administrador) .  '</span>'; ?>

            </li>
        </ul>
    </div>


    <!--  -->
    <div style="background-color: white; border-radius: 20px !important;" class="row row-cols-1 row-cols-md-2 row-cols-xl-2 mt-4 p-3">
        <div class="col">
            <h1 class="ms-2 fw-bolder mb-3 mt-4">Crea un nuevo Estudiante!</h1>
            <p style="width: 90%;" class="ms-2 fs-5">Sistema academico ITGEM.</p>
            <span style="font-size: 16px;" class="badge text-bg-primary   p-2">Estudiantes: <?php echo $totalRegistrosEstudiantes; ?></span>

            <div style="background: none !important; margin-top: 40px !important;" class=" mt-4 rounded ">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
                    <div class="col mb-3">
                        <div style="background-color: #fef08a;  border-radius: 20px;" class="card radius-10 p-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p style="color: #141e2c; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Crear Estudiante</p>
                                        <a style="color: #141e2c !important;" href="./crear_estudiante.php" class="text-blue-500 hover:underline">Click
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
                                        <p style="color: #141e2c; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Ver Estudiante</p>
                                        <a style="color: #141e2c !important;" href="#tabla" class="text-blue-500 hover:underline">Click
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
                                        <a style="color: #141e2c !important;" href="#estadistica" class="text-blue-500 hover:underline">Click
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
                                        <p style="color: #141e2c; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Documentos</p>
                                        <a style="color: #141e2c !important;" href="./documentos.php" class="text-blue-500 hover:underline">Click
                                            aqui</a>
                                        <br>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="mt-4 ms-2" style="width: 80%;">Dale click en el boton correspondiente para crear o editar un Estudiante</p>
        </div>
        <div class="col">
            <div class="col mb-4 d-flex justify-content-center">
                <img width="430" class="img" src="../recursos/img/img3.svg" alt="">
            </div>
        </div>
    </div>

    <div id="tabla" class="mt-5">
        <h2 class="fw-bolder ms-3 mt-5">Tabla de Estudiantes</h2>
        <span style="font-size: 15px;" class="badge text-bg-info ms-3 mb-4 ">Datos personales</span>

        <div style="background-color: white; border-radius: 20px !important;" class="table-responsive  p-4">
            <table id="tabla_administradores" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th> <!-- Agregamos una columna para la numeración -->
                        <th>Nombre</th>
                        <th>Documento</th>
                        <th>Teléfono</th>
                        <th>EPS</th>
                        <th>Email</th>
                        <th>Grupo</th>
                        <th>Acciones</th> <!-- Agregamos una columna para las acciones -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Incluir el archivo de conexión a la base de datos
                    include '../App/conexion.php';

                    $sql = "SELECT estudiantes.*, grupos.nombre_grupo, grupos.seccion 
                    FROM estudiantes
                    INNER JOIN grupos ON estudiantes.grupo_id = grupos.id";
            

                    $resultado = $conexion->query($sql);

                    // Variable para la numeración de la tabla
                    $contador = 1;

                    // Verificar si se encontraron resultados
                    if ($resultado->num_rows > 0) {
                        // Iterar sobre los resultados y generar las filas de la tabla
                        while ($fila = $resultado->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $contador . "</td>";
                            echo "<td>" . $fila['nombre'] . "</td>";
                            echo "<td>" . $fila['documento_identidad'] . "</td>";
                            echo "<td>" . $fila['telefono'] . "</td>";
                            echo "<td>" . $fila['eps'] . "</td>";
                            echo "<td>" . $fila['correo'] . "</td>";
                            echo "<td>" . $fila['nombre_grupo'] . ' ' . $fila['seccion'] ."</td>";

                            // Agregamos los botones de acciones (editar y eliminar)
                            echo "<td>";
                            echo "<a href='editar_estudiante.php?id=" . $fila['id'] . "' class='btn btn-primary mb-2' style='width: 100px;'>Editar</a>";
                            echo "</td>";
                            echo "</tr>";
                            $contador++;
                        }
                    } else {
                        echo "<tr><td colspan='13'>No se encontraron administradores</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <br>
    <br>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script>
        // Inicializar DataTable
        $(document).ready(function() {
            $('#tabla_administradores').DataTable({
                responsive: true,
                rowReorder: {
                    selector: 'td:first-child'
                },
                columnDefs: [{
                    orderable: false,
                    targets: 0
                }]
            });
        });
    </script>

    <div id="estadistica" class=" p-3">
        <h2 class="fw-bolder ms-2">Estadisticas:</h2>
        <span style="font-size: 15px;" class="badge text-bg-info ms-3 mb-4 ">Estudianes</span>

        <div style="background-color: white; border-radius: 20px !important;" class="row row-cols-1 row-cols-md-2 row-cols-xl-2 mt-2 p-4">

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
                $sqlBirthplace = "SELECT direccion, COUNT(*) as count FROM estudiantes GROUP BY direccion";
                $resultBirthplace = $conexion->query($sqlBirthplace);

                $birthplaceData = [];
                $birthplaceLabels = [];

                if ($resultBirthplace && $resultBirthplace->num_rows > 0) {
                    while ($rowBirthplace = $resultBirthplace->fetch_assoc()) {
                        $birthplaceLabels[] = $rowBirthplace['direccion'];
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
    <br><br>

</main>