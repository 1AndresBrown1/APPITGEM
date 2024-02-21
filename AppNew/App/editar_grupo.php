<?php require "navegacion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'])) {
        $id = $_GET['id'];
        $nombre_grupo = $_POST["nombre_grupo"];
        $año_lectivo = $_POST["año_lectivo"];
        $nivel_educativo = $_POST["nivel_educativo"];
        $seccion = $_POST["seccion"];
        $horario = $_POST["horario"];
        $aula_asignada = $_POST["aula_asignada"];

        $sql = "UPDATE grupos SET
        nombre_grupo = '$nombre_grupo',
        año_lectivo = '$año_lectivo',
        nivel_educativo = '$nivel_educativo',
        seccion = '$seccion',
        horario = '$horario',
        aula_asignada = '$aula_asignada'
        WHERE id = $id";


        if ($conexion->query($sql) === TRUE) {
            echo "<script>alert('Los datos del grupo se han sido actualizados correctamente.');</script>";
            echo "<script>console.log('Redirigiendo a estudiantes.php'); window.location.href = 'grupos.php';</script>";
        } else {
            // Error en la actualización
            echo "Error al actualizar los datos: " . $conexion->error;
        }
    } else {
        echo "No se ha proporcionado un ID en el formulario.";
    }
}

$id = $_GET['id'];

$sql = "SELECT * FROM grupos WHERE id = $id";
$resultado = $conexion->query($sql);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Obtener los datos del administrador
    $fila = $resultado->fetch_assoc();

    // Mostrar el formulario de edición con los campos prellenados
?>

    <div id="formulario1" class="espacecustom p-4 border p-custom mt-5">
        <h2 class="fw-bolder ms-2">Editar de grupo:</h2>
        <span style="font-size: 15px;" class="badge text-bg-info ms-2 mt-3">Datos del grupo</span>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">

            <div class="row">
                <!-- Primera Columna -->
                <div class="col-md-6">
                    <div class="input-group mt-4">
                        <label class="input-group-text" for="nombre_grupo">Nombre de Grupo</label>
                        <input value="<?php echo $fila['nombre_grupo']; ?>" type="text" class="form-control" id="nombre_grupo" name="nombre_grupo" required>
                    </div>
                </div>

                <!-- Segunda Columna -->
                <div class="col-md-6">
                    <div class="input-group mt-4">
                        <label class="input-group-text" for="año_lectivo">Año lectivo</label>
                        <input value="<?php echo $fila['año_lectivo']; ?>" type="text" class="form-control" id="año_lectivo" name="año_lectivo" required>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <!-- Tercera Columna -->
                <div class="col-md-6">
                    <div class="input-group mt-4">
                        <label class="input-group-text" for="nivel_educativo">Nivel educativo</label>
                        <input value="<?php echo $fila['nivel_educativo']; ?>" type="text" class="form-control" id="nivel_educativo" name="nivel_educativo" required>
                    </div>
                </div>

                <!-- Cuarta Columna -->
                <div class="col-md-6">
                    <div class="input-group mt-4">
                        <label class="input-group-text" for="seccion">Grupo</label>
                        <input value="<?php echo $fila['seccion']; ?>" type="text" class="form-control" id="seccion" name="seccion" required>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <!-- Quinta Columna -->
                <div class="col-md-6">
                    <div class="input-group mt-4">
                        <label class="input-group-text" for="horario">Horario</label>
                        <input value="<?php echo $fila['horario']; ?>" type="text" class="form-control" id="horario" name="horario" required>
                    </div>
                </div>

                <!-- Sexta Columna -->
                <div class="col-md-6">
                    <div class="input-group mt-4">
                        <label class="input-group-text" for="aula_asignada">Salon Asignado</label>
                        <input value="<?php echo $fila['aula_asignada']; ?>" type="text" class="form-control" id="aula_asignada" name="aula_asignada">
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <!-- Botón de Enviar -->
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Actualizar Grupo</button>
                </div>
            </div>
        </form>
    </div>
    
<?php
} else {
    echo "No se encontró el estudiante con el ID proporcionado.";
}
?>