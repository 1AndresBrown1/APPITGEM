<?php
include_once './navegacion.php';
?>


<div id="formulario1" class="espacecustom p-4 border p-custom mt-5">
    <h2 class="fw-bolder ms-2">Registro de Modulos:</h2>

    <form action="../Funciones/funcion_crear_modulo.php" method="POST">
        <div class="row">



            <div class="row mt-2">
                <!-- Primera Columna -->
                <div class="col-md-6">
                    <div class="input-group mt-4">
                        <label class="input-group-text" for="grupo">Nombre del Modulo</label>
                        <input type="text" class="form-control" id="nombre_materia" name="nombre_materia" required>

                    </div>
                </div>


            </div>

            <!-- Primera Columna -->
            <div class="col-md-6">
                <div class="input-group mt-4">
                    <label class="input-group-text" for="grupo">Grupo</label>
                    <?php
                    // Aquí debes establecer la conexión a tu base de datos

                    // Consulta SQL para obtener todos los grupos
                    $sql = "SELECT id, CONCAT(nombre_grupo, ' ', 'Grupo ', seccion) AS nombre_completo FROM grupos";

                    // Ejecutar la consulta
                    $resultado = $conexion->query($sql);

                    // Comprobar si se encontraron grupos
                    if ($resultado->num_rows > 0) {
                        // Mostrar un select con los grupos
                        echo '<select id="grupo_asignado" name="grupo_asignado" class="form-select">';
                        echo '<option selected>Selecciona un grupo...</option>';
                        // Iterar sobre los resultados y mostrar cada grupo como una opción en el select
                        while ($row = $resultado->fetch_assoc()) {
                            echo '<option value="' . $row['id'] . '">' . $row['nombre_completo'] . '</option>';
                        }
                        echo '</select>';
                    } else {
                        echo "No se encontraron grupos disponibles.";
                    }

                    // Cerrar la conexión
                    ?>



                </div>
            </div>

            <!-- Segunda Columna -->
            <div class="col-md-6">
                <div class="input-group mt-4">
                    <label class="input-group-text" for="grupo">Docente</label>
                    <?php
                    // Aquí debes establecer la conexión a tu base de datos

                    // Consulta SQL para obtener todos los docentes
                    $sql = "SELECT id, CONCAT(nombres, ' ', apellidos) AS nombre_completo FROM docentes";

                    // Ejecutar la consulta
                    $resultado = $conexion->query($sql);

                    // Comprobar si se encontraron docentes
                    if ($resultado->num_rows > 0) {
                        // Mostrar un select con los docentes
                        echo '<select id="docente_asignado" name="docente_asignado" class="form-select">';
                        echo '<option selected>Selecciona un docente...</option>';
                        // Iterar sobre los resultados y mostrar cada docente como una opción en el select
                        while ($row = $resultado->fetch_assoc()) {
                            echo '<option value="' . $row['id'] . '">' . $row['nombre_completo'] . '</option>';
                        }
                        echo '</select>';
                    } else {
                        echo "No se encontraron docentes disponibles.";
                    }

                    // Cerrar la conexión
                    ?>


                </div>
            </div>
        </div>



        <div class="row mt-2">
            <!-- Primera Columna -->
            <div class="col-md-6">
                <div class="input-group mt-4">
                    <label class="input-group-text" for="grupo">Fecha de inicio</label>
                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>

                </div>
            </div>

            <!-- Segunda Columna -->
            <div class="col-md-6">
                <div class="input-group mt-4">
                    <label class="input-group-text" for="grupo">Fecha de Finalizacion</label>
                    <input type="date" class="form-control" id="fecha_finalizacion" name="fecha_finalizacion" required>

                </div>
            </div>
        </div>

        <div class="row mt-2">
            <!-- Segunda Columna -->
            <div class="col-md-6">
                <div class="input-group mt-4">
                    <label class="input-group-text" for="grupo">Estado</label>
                    <select id="estado" name="estado" class="form-select">
                        <option selected>Selecciona un grupo..</option>
                        <option value="tecnicos">Tecnicos Laborales</option>
                        <option value="seminario">Seminario</option>
                        <option value="curso">Curso Corto</option>
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

<br>
<br>