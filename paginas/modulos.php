<?php require "navegacion.php"; ?>


<!--  -->
<div style="background: none !important; margin-top: 50px !important;" class="espacecustom mt-4 rounded ">

    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">

        <div class="col">
            <h2 class="fw-bolder ms-2">Crear nuevo modulo:</h2>

            <div style="background: none !important; margin-top: 40px !important;" class=" mt-4 rounded ">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
                    <div class="col mb-3">
                        <div style="background-color: #e4e4e7;  border-radius: 20px;" class="card radius-10 p-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p style="color: #141e2c; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Crear Modulo</p>
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
                                        <p style="color: #141e2c; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Ver Modulos</p>
                                        <a style="color: #141e2c !important;" href="#formulario2" id="mostrarFormulario2" class="text-blue-500 hover:underline">Click
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
    <h2 class="fw-bolder ms-2">Registro de Modulos:</h2>

    <form action="./procesar/procesar_registro_materia.php" method="POST">
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
                        <input type="text" class="form-control desa" id="codigo_materia" name="codigo_materia" required>
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
                    <select class="form-control" id="id_docente" name="id_docente" >    
                    <option value="sin docente" selected>Selecciona un docente</option>

                        <?php
                        // Conecta a la base de datos y recupera los docentes
                        include("../bd.php");
                        $sql_docentes = "SELECT id, nombre, apellido FROM docentes"; // Añadido el campo 'apellido'
                        $result_docentes = $conexion->query($sql_docentes);

                        if ($result_docentes) {
                            while ($row_docente = $result_docentes->fetch_assoc()) {
                                echo '<option value="' . $row_docente['id'] . '">' . $row_docente['nombre'] . ' ' . $row_docente['apellido'] . '</option>'; // Agregado el campo 'apellido'
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
</div>

<div id="formulario2" style="display: none;" class="espacecustom p-4 border p-custom">
<h2 class="fw-bolder ms-2">Ver Modulos creados:</h2>

<div class="table-responsive">
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
            $sql = "SELECT m.id AS materia_id, m.codigo_materia, m.nombre_materia, m.id_docente, m.fecha_inicio, m.fecha_final, m.estado, g.nombre_grupo, g.grupo, a.nombre_a, d.nombre, d.apellido
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
                    echo "<td>" . $row['nombre'] . " " . $row['apellido'] . "</td>"; // Modificado para incluir el apellido
                    echo "<td>" . $row['fecha_inicio'] . "</td>";
                    echo "<td>" . $row['fecha_final'] . "</td>";
                    echo "<td>" . $row['nombre_a'] . "</td>";
                    echo "<td>" . $row['estado'] . "</td>"; // Agregado el campo 'estado'
                    echo "<td><a href='editar_materia.php?id=" . $row['materia_id'] . "'>Editar</a></td>";
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
    </div>


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

<script>
    // Obtener el último número generado desde el almacenamiento local
    var ultimoNumeroGenerado = localStorage.getItem("ultimoNumeroGenerado") || 0;

    function generarCodigo() {
        // Obtener el valor del campo "Nombre de la Materia"
        var nombreMateria = document.getElementById("nombre_materia").value;

        // Validar si se ingresó un nombre de materia
        if (nombreMateria.trim() !== "") {
            // Incrementar el contador antes de generar el código
            ultimoNumeroGenerado++;

            // Crear el código combinando el nombre de la materia y el número ascendente
            var codigoGenerado = nombreMateria.toUpperCase() + ":" + ultimoNumeroGenerado;

            // Actualizar el valor del campo de entrada
            document.getElementById("codigo_materia").value = codigoGenerado;

            // Guardar el último número generado en el almacenamiento local
            localStorage.setItem("ultimoNumeroGenerado", ultimoNumeroGenerado);
        } else {
            alert("Ingrese un nombre de materia antes de generar el código.");
        }
    }
</script>

<BR></BR>

<footer class="espacecustom mb-4 border p-3">
    <center>
        <p class="mb-0">Santander Valley Col Copyright © 2023. All rights reserved.</p>
    </center>
</footer>