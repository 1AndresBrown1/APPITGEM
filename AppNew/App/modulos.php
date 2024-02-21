<?php require "navegacion.php"; ?>

<!--  -->
<div style="background: none !important; margin-top: 50px !important;" class="espacecustom mt-4 rounded ">

    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">

        <div class="col">
            <h2 class="fw-bolder ms-2">Crear un nuevo Modulo:</h2>

            <div style="background: none !important; margin-top: 40px !important;" class=" mt-4 rounded ">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
                    <div class="col mb-3">
                        <div style="background-color: #e4e4e7;  border-radius: 20px;" class="card radius-10 p-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p style="color: #141e2c; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Crear Modulo</p>
                                        <a style="color: #141e2c !important;" href="./crear_modulos.php" id="mostrarFormulario1" class="text-blue-500 hover:underline">Click
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
            <p class="mt-4 ms-2" style="width: 80%;">Dale click en el boton correspondiente para crear o ver un grupo</p>

        </div>

        <div class="col">
            <div class="col mb-4 d-flex justify-content-center">
                <img width="350" class="img" src="../recursos/img/img5.svg" alt="">
            </div>
        </div>

    </div>
</div>



<div id="formulario1" style="display: none;" class="espacecustom p-4 border p-custom">
    <h2 class="fw-bolder ms-2">Registro de Modulos:</h2>

    <form action="./procesar/procesar_registro_grupo.php" method="POST">
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
</div>


<div class="espacecustom p-4 mt-4">
    <h2>Tabla de Modulos</h2>
    <div class="table-responsive">
        <table id="tabla_administradores" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>#</th> <!-- Agregamos una columna para la numeración -->
                    <th>nombre_materia</th>
                    <th>docente_asignado</th>
                    <th>grupo_asignado</th>
                    <th>fecha_inicio</th>
                    <th>fecha_finalizacion</th>
                    <th>estado</th> <!-- Agregamos una columna para las acciones -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Incluir el archivo de conexión a la base de datos
                include '../App/conexion.php';

                // Consulta SQL para seleccionar todos los administradores
                $sql = "SELECT * FROM materias";
                $resultado = $conexion->query($sql);

                // Variable para la numeración de la tabla
                $contador = 1;

                // Verificar si se encontraron resultados
                if ($resultado->num_rows > 0) {
                    // Iterar sobre los resultados y generar las filas de la tabla
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $contador . "</td>";
                        echo "<td>" . $fila['nombre_materia'] . "</td>";
                        echo "<td>" . $fila['docente_asignado'] . "</td>";
                        echo "<td>" . $fila['grupo_asignado'] . "</td>";
                        echo "<td>" . $fila['fecha_inicio'] . "</td>";
                        echo "<td>" . $fila['fecha_finalizacion'] . "</td>";
                        echo "<td>" . $fila['estado'] . "</td>";
                        // Agregamos los botones de acciones (editar y eliminar)
                        echo "<td>";
                        echo "<a href='editar_modulo.php?id=" . $fila['id'] . "' class='btn btn-primary mb-2' style='width: 100px;'>Editar</a>";
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

<footer class="espacecustom mb-4 border p-3">
    <center>
        <p class="mb-0">Santander Valley Col Copyright © 2023. All rights reserved.</p>
    </center>

</footer>