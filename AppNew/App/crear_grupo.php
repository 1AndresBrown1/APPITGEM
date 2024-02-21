<?php
include_once './navegacion.php';
?>


<div id="formulario1" class="espacecustom p-4 border p-custom mt-5">
    <h2 class="fw-bolder ms-2">Registro de grupos:</h2>

    <form action="../Funciones/funcion_crear_grupo.php" method="POST">
        <div class="row">
            <!-- Primera Columna -->
            <div class="col-md-6">
                <div class="input-group mt-4">
                    <label class="input-group-text" for="grupo">Nombre de Grupo</label>
                    <input  type="text" class="form-control" id="nombre_grupo" name="nombre_grupo" required>

                </div>  
            </div>

            <!-- Segunda Columna -->
            <div class="col-md-6">
                <div class="input-group mt-4">
                    <label class="input-group-text" for="grupo">Año lectivo</label>
                    <input type="text" class="form-control" id="año_lectivo" name="año_lectivo" required>

                </div>
            </div>
        </div>

        <div class="row mt-2">
            <!-- Primera Columna -->
            <div class="col-md-6">
                <div class="input-group mt-4">
                    <label class="input-group-text" for="grupo">Nivel educativo</label>
                    <select id="nivel_educativo" name="nivel_educativo" class="form-select">
                        <option selected>Selecciona un nivel educativo..</option>
                        <option value="tecnicos">Tecnicos Laborales</option>
                        <option value="seminario">Seminario</option>
                        <option value="curso">Curso Corto</option>
                    </select>
                </div>
            </div>

            <!-- Segunda Columna -->
            <div class="col-md-6">
                <div class="input-group mt-4">
                    <label class="input-group-text" for="grupo">Grupo</label>
                    <select id="seccion" name="seccion" class="form-select">
                        <option selected>Selecciona...</option>
                        <?php
                        for ($i = 1; $i <= 25; $i++) {
                            echo '<option value="' . $i . '">Grupo ' . $i . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <!-- Primera Columna -->
            <div class="col-md-6">
                <div class="input-group mt-4">
                    <label class="input-group-text" for="grupo">Horario</label>
                    <select id="horario" name="horario" class="form-select">
                        <option selected>Selecciona un horario..</option>
                        <option value="diurno">Diurno</option>
                        <option value="sabados">Sabados</option>
                        <option value="domingos">Domingos</option>
                    </select>
                </div>
            </div>

            <!-- Segunda Columna -->
            <div class="col-md-6">
                <div class="input-group mt-4">
                    <label class="input-group-text" for="grupo">Salon Asignado</label>
                    <input type="text" class="form-control" id="aula_asignada" name="aula_asignada">

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