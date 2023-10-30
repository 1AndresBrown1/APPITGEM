<?php
include_once("./header.php");
include_once("../bd.php");

?>




<div class="page-wrapper">
    <div class="page-content">

    <form action="calificar_estudiantes.php" method="POST">
    <div class="form-group">
        <label for="grupo_id">Selecciona un grupo:</label>
        <select class="form-control" name="grupo_id">
            <?php
            // Consultar y listar los grupos disponibles en la base de datos
            $sql_grupos = "SELECT id, nombre_grupo FROM grupos";
            $result_grupos = $conexion->query($sql_grupos);

            if ($result_grupos) {
                while ($row = $result_grupos->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nombre_grupo'] . "</option>";
                }
                $result_grupos->free();
            }
            ?>
        </select>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Mostrar Estudiantes</button>
</form>

   
    </div>
</div>