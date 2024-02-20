<?php require "navegacion.php"; ?>

<!--  -->
<div style="background: none !important; margin-top: 50px !important;" class="espacecustom mt-4 rounded ">

    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">

        <div class="col">
            <h2 class="fw-bolder ms-2">Crear un nuevo adminstrador:</h2>

            <div style="background: none !important; margin-top: 40px !important;" class=" mt-4 rounded ">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
                    <div class="col mb-3">
                        <div style="background-color: #e4e4e7;  border-radius: 20px;" class="card radius-10 p-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p style="color: #141e2c; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Crear Admin</p>
                                        <a style="color: #141e2c !important;" href="./crear_admin.php" class="text-blue-500 hover:underline">Click
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
            <p class="mt-4 ms-2" style="width: 80%;">Dale click en el boton correspondiente para crear o editar un administrador</p>

        </div>

        <div class="col">
            <div class="col mb-4 d-flex justify-content-center">
                <img width="350" class="img" src="../recursos/img/img2.svg" alt="">
            </div>
        </div>

    </div>
</div>

<div class="espacecustom p-4 mt-4">
    <h2>Tabla de Administradores</h2>
    <div class="table-responsive">
        <table id="tabla_administradores" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>#</th> <!-- Agregamos una columna para la numeración -->
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Documento de Identidad</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>EPS</th>
                    <th>Cargo</th>
                    <th>Email</th>
                    <th>Acciones</th> <!-- Agregamos una columna para las acciones -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Incluir el archivo de conexión a la base de datos
                include '../App/conexion.php';

                // Consulta SQL para seleccionar todos los administradores
                $sql = "SELECT * FROM administradores";
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
                        echo "<td>" . $fila['apellido'] . "</td>";
                        echo "<td>" . $fila['documento_identidad'] . "</td>";
                        echo "<td>" . $fila['direccion'] . "</td>";
                        echo "<td>" . $fila['telefono'] . "</td>";
                        echo "<td>" . $fila['eps'] . "</td>";
                        echo "<td>" . $fila['titulo'] . "</td>";
                        echo "<td>" . $fila['email'] . "</td>";
                        // Agregamos los botones de acciones (editar y eliminar)
                        echo "<td>";
                        echo "<a href='editar_admin.php?id=" . $fila['id'] . "' class='btn btn-primary mb-2' style='width: 100px;'>Editar</a>";
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