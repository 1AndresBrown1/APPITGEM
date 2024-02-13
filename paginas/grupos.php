<?php require "navegacion.php"; ?>

<!--  -->
<div style="background: none !important; margin-top: 50px !important;" class="espacecustom mt-4 rounded ">

    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">

        <div class="col">
            <h2 class="fw-bolder ms-2">Crear un nuevo grupo:</h2>

            <div style="background: none !important; margin-top: 40px !important;" class=" mt-4 rounded ">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
                    <div class="col mb-3">
                        <div style="background-color: #e4e4e7;  border-radius: 20px;" class="card radius-10 p-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p style="color: #141e2c; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Crear Grupo</p>
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
                                        <p style="color: #141e2c; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Ver Grupo</p>
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
    <h2 class="fw-bolder ms-2">Registro de grupos:</h2>

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
                        <option selected>Choose...</option>
                        <?php
                        for ($i = 1; $i <= 25; $i++) {
                            echo '<option value="' . $i . '">Grupo ' . $i . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Tercera Columna -->
            <div class="col-md-6 mt-3">
                <div class="form-group">
                    <label for="id_año">Año Académico:</label>
                    <select class="form-control" id="id_año" name="id_año" required>
                        <?php
                        // Consulta para obtener los años académicos desde la tabla "gestion_a"
                        $sql = "SELECT id, nombre_a FROM gestion_a";
                        $result = $conexion->query($sql);

                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                                $id_año = $row["id"];
                                $nombre_año = $row["nombre_a"];
                                echo "<option value='$id_año'>$nombre_año</option>";
                            }
                            $result->free();
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Cuarta Columna -->
            <div class="col-md-6 mt-3">
                <div class="form-group">
                    <label for="id_docente">Docente:</label>
                    <select class="form-control" id="id_docente" name="id_docente" required>
                        <?php
                        // Conecta a la base de datos y recupera los docentes
                        include("../bd.php");

                        $sql = "SELECT id, nombre, apellido FROM docentes"; // Agrega el campo 'apellido' a la consulta
                        $result = $conexion->query($sql);

                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['id'] . '">' . $row['nombre'] . ' ' . $row['apellido'] . '</option>';
                            }
                        }
                        ?>

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

<div id="formulario2" style="display: none;" class="espacecustom p-4 border p-custom">
<h2 class="fw-bolder ms-2">Grupos Creados:</h2>

    <script>
        function confirmarEliminacion(id) {
            if (confirm("¿Estás seguro de que deseas eliminar este registro?")) {
                window.location.href = 'eliminar_grupo.php?id=' + id;
            }
        }
    </script>


    <br><br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre del Grupo</th>
                <th scope="col">Grupo</th>
                <th scope="col">Año Académico</th>
                <th scope="col">Docente</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Consulta para obtener los datos de los grupos
            $sql = "SELECT g.id AS grupo_id, g.nombre_grupo, g.grupo, g.id_docente, a.nombre_a, d.nombre FROM grupos g 
                    INNER JOIN gestion_a a ON g.id_año = a.id
                    INNER JOIN docentes d ON g.id_docente = d.id
                    ";
            $result = $conexion->query($sql);

            if ($result) {
                $i = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th scope='row'>$i</th>";
                    echo "<td>" . $row['nombre_grupo'] . "</td>";
                    echo "<td>" . $row['grupo'] . "</td>";

                    echo "<td>" . $row['nombre_a'] . "</td>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td><a href='editar_grupo.php?id=" . $row['grupo_id'] . "'>Editar</a></td>";

                    echo "</tr>";
                    $i++;
                }
                $result->free();
            } else {
                echo '<tr><td colspan="4">No hay datos de grupos disponibles.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<BR></BR>

<footer class="espacecustom mb-4 border p-3">
    <center>
        <p class="mb-0">Santander Valley Col Copyright © 2023. All rights reserved.</p>
    </center>

</footer>