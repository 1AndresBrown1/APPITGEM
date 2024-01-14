<?php
include_once("./header.php");
include("../bd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $fechaNacimiento = $_POST["fecha_nacimiento"];
    $genero = $_POST["genero"];
    $grupoId = $_POST["grupo"];
    $documento_identidad = $_POST["documento_identidad"];
    $contrasena = $_POST["contrasena"];
    // $verificarContrasena = $_POST["verificarContrasena"];
    $estadoMatricula = $_POST["estado_matricula"];

    if (!empty($contrasena)) {
        $password = password_hash($contrasena, PASSWORD_BCRYPT);
    } else {
        // Si la contraseña no se ha cambiado, usa la contraseña existente
        $password = $_POST["contrasena_actual"];
    }


    // Preparar y ejecutar la consulta de actualización
    $sql = "UPDATE estudiantes SET nombre = ?, apellido = ?, fecha_nacimiento = ?, genero = ?, grupo_id = ?, documento_identidad = ?, contrasena = ?, estado_matricula = ? WHERE id = ?";

    // Verificar si la conexión está abierta antes de preparar la consulta
    if (!$conexion->connect_error) {
        // Preparar la sentencia
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            // Asociar los parámetros
            $stmt->bind_param("ssssiissi", $nombre, $apellido, $fechaNacimiento, $genero, $grupoId, $documento_identidad, $password, $estadoMatricula, $id);

            // Ejecutar la sentencia
            if ($stmt->execute()) {
                // Redirigir a la página de estudiantes o a otra página
                echo '<script>alert("El estudiante se ha actualizado con éxito.");</script>';
                echo '<script>window.location.href = "./estudiantes.php";</script>';
                exit;
            } else {
                echo '<div class="alert alert-danger" role="alert">Error al actualizar el estudiante: ' . $stmt->error . '</div>';
            }

            // Cerrar la sentencia
            $stmt->close();
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al preparar la sentencia: ' . $conexion->error . '</div>';
        }
    }
}

// Recupera el ID del estudiante a editar (puedes hacerlo a través de $_GET o una consulta a la base de datos)
$id_estudiante_a_editar = $_GET["id"];

// Realiza una consulta para obtener los datos actuales del estudiante
$sql = "SELECT e.id, e.nombre, e.apellido, e.fecha_nacimiento, e.genero, e.grupo_id , e.documento_identidad, e.contrasena
        FROM estudiantes e
        WHERE e.id = ?";
$stmt = $conexion->prepare($sql);

if ($stmt) {
    // Asocia los parámetros
    $stmt->bind_param("i", $id_estudiante_a_editar);

    // Ejecuta la consulta
    $stmt->execute();

    // Obtiene los resultados
    $stmt->bind_result($id, $nombre, $apellido, $fechaNacimiento, $genero, $grupoId, $documento_identidad, $contrasena);
    $stmt->fetch();

    // Cierra la consulta
    $stmt->close();
} else {
    echo '<div class="alert alert-danger" role="alert">Error al preparar la consulta: ' . $conexion->error . '</div>';
}
?>
<script>
            document.addEventListener("DOMContentLoaded", function () {
                var contrasenaInput = document.getElementById("contrasena");
                var verificarContrasenaInput = document.getElementById("verificarContrasena");

                function validarContrasenas() {
                    var contrasena = contrasenaInput.value;
                    var verificarContrasena = verificarContrasenaInput.value;

                    if (contrasena === verificarContrasena) {
                        // Contraseñas coinciden, aplicar estilo verde
                        verificarContrasenaInput.style.borderColor = "green";
                    } else {
                        // Contraseñas no coinciden, aplicar estilo rojo
                        verificarContrasenaInput.style.borderColor = "red";
                    }
                }

                contrasenaInput.addEventListener("input", validarContrasenas);
                verificarContrasenaInput.addEventListener("input", validarContrasenas);

                // Evento para reiniciar el estilo cuando se enfoca en el campo
                verificarContrasenaInput.addEventListener("focus", function () {
                    verificarContrasenaInput.style.borderColor = "";
                });
            });
            </script>
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
            <h2>Editar Estudiante</h2>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Campo oculto para pasar el ID -->
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
                </div>
                <!-- <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $apellido; ?>" >
                </div> -->
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $fechaNacimiento; ?>" required>
                </div>
                <div class="form-group">
                    <label for="genero">Género:</label>
                    <select class="form-control" id="genero" name="genero" required>
                        <option value="Masculino" <?php echo ($genero == 'Masculino') ? 'selected' : ''; ?>>Masculino</option>
                        <option value="Femenino" <?php echo ($genero == 'Femenino') ? 'selected' : ''; ?>>Femenino</option>
                        <option value="Otro" <?php echo ($genero == 'Otro') ? 'selected' : ''; ?>>Otro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="grupo">Grupo de Estudios:</label>
                    <select class="form-control" id="grupo" name="grupo" required>
                        <?php
                        // Consulta para obtener los grupos
                        $sql = "SELECT g.id AS grupo_id, g.nombre_grupo, a.nombre_a FROM grupos g INNER JOIN gestion_a a ON g.id_año = a.id";
                        $result = $conexion->query($sql);

                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                                $selected = ($row['grupo_id'] == $grupoId) ? 'selected' : '';
                                echo "<option value='" . $row['grupo_id'] . "' $selected>" . $row['nombre_grupo'] . " (" . $row['nombre_a'] . ")</option>";
                            }

                            $result->free();
                        } else {
                            echo "<option value=''>No hay grupos disponibles</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="documento_identidad">Documento de Identidad:</label>
                    <input type="number" class="form-control" id="documento_identidad" name="documento_identidad" value="<?php echo $documento_identidad; ?>" required>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="contrasena">Contraseña:</label>
                            <input  autocomplete="off" type="password" class="form-control" id="contrasena" name="contrasena" value="" >
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="verificarContrasena">Verificar contraseña:</label>
                            <input type="password" class="form-control" id="verificarContrasena" name="verificarContrasena" <?php echo (!empty($_POST["contrasena"])) ? 'required' : ''; ?>>
                        </div>
                    </div> -->
                </div>

                <?php
if (isset($_POST["estado_matricula"])) {
    $estadoMatricula = $_POST["estado_matricula"];
} else {
    // Si no está definida, proporciona un valor predeterminado o maneja la situación según tus necesidades
    $estadoMatricula = ''; // Puedes asignar un valor predeterminado o dejarlo vacío
}
                ?>
                
                <div class="form-group">
                    <label for="estado_matricula">Estado de Matrícula:</label>
                    <select class="form-control" id="estado_matricula" name="estado_matricula" required>
                        <option value="pagado" <?php echo ($estadoMatricula == 'pagado') ? 'selected' : ''; ?>>Pagado</option>
                        <option value="sin_saldar" <?php echo ($estadoMatricula == 'sin_saldar') ? 'selected' : ''; ?>>Sin saldar</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Actualizar Estudiante</button>
            </form>
        </div>
    </div>
</div>
<br><br><br>