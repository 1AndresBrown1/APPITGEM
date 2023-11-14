<?php
include_once("./header.php");
include("../bd.php");

// Verifica si la conexión a la base de datos es exitosa
if (!$conexion->connect_error) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera los datos del formulario
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $tipo_documento = $_POST["tipo_documento"];
        $documento_identidad = $_POST["documento_identidad"];
        $direccion = $_POST["direccion"];
        $titulo = $_POST["titulo"];
        $email = $_POST["email"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $contrasena = $_POST["contrasena"];

        // Si la contraseña se ha cambiado, cifra nuevamente
        if (!empty($contrasena)) {
            // Hash de la contraseña
            $options = [
                'cost' => 12,
            ];
            $password = password_hash($contrasena, PASSWORD_BCRYPT, $options);
        } else {
            // Si la contraseña no se ha cambiado, usa la contraseña existente
            $password = $_POST["contrasena_actual"];
        }

        // Prepara la consulta SQL para actualizar el docente
        $sql = "UPDATE docentes SET nombre = ?, apellido = ?, tipo_documento = ?, documento_identidad = ?, direccion = ?, titulo = ?, email = ?, fecha_nacimiento = ?, contrasena = ? WHERE id = ?";

        // Verifica si la conexión está abierta antes de preparar la consulta
        if (!$conexion->connect_error) {
            // Prepara la sentencia
            $stmt = $conexion->prepare($sql);

            if ($stmt) {
                // Asocia los parámetros
                $stmt->bind_param("sssssssssi", $nombre, $apellido, $tipo_documento, $documento_identidad, $direccion, $titulo, $email, $fecha_nacimiento, $password, $id);

                // Ejecuta la sentencia
                if ($stmt->execute()) {
                    // Redirige a la página de docentes o a otra página
                    echo '<script>alert("El docente se ha actualizado con éxito.");</script>';
                    echo '<script>window.location.href = "./docentes.php";</script>';
                    exit;
                } else {
                    echo '<div class="alert alert-danger" role="alert">Error al actualizar el docente: ' . $stmt->error . '</div>';
                }

                // Cierra la sentencia
                $stmt->close();
            } else {
                echo '<div class="alert alert-danger" role="alert">Error al preparar la sentencia: ' . $conexion->error . '</div>';
            }
        }
    }

    // Recupera el ID del docente a editar (puedes hacerlo a través de $_GET o una consulta a la base de datos)
    $id_docente_a_editar = $_GET["id"];

    // Realiza una consulta para obtener los datos actuales del docente
    $sql = "SELECT * FROM docentes WHERE id = ?";
    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        // Asocia los parámetros
        $stmt->bind_param("i", $id_docente_a_editar);

        // Ejecuta la consulta
        $stmt->execute();

        // Obtiene los resultados
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        // Cierra la consulta
        $stmt->close();
    } else {
        echo '<div class="alert alert-danger" role="alert">Error al preparar la consulta: ' . $conexion->error . '</div>';
    }

    // Cierra la conexión a la base de datos
    $conexion->close();
} else {
    echo '<div class="alert alert-danger" role="alert">Error en la conexión a la base de datos: ' . $conexion->connect_error . '</div>';
}
?>

<!-- A continuación, muestra un formulario para editar el docente con los datos actuales -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
            <h2>Editar Docente</h2>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>"> <!-- Campo oculto para pasar el ID -->
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $row['apellido']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="tipo_documento">Tipo de Documento:</label>
                    <input type="text" class="form-control" id="tipo_documento" name="tipo_documento" value="<?php echo $row['tipo_documento']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="documento_identidad">Documento de Identidad:</label>
                    <input type="text" class="form-control" id="documento_identidad" name="documento_identidad" value="<?php echo $row['documento_identidad']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $row['direccion']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $row['titulo']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="contrasena">Contraseña:</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" value="<?php echo $row['contrasena']; ?>" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Actualizar Docente</button>
            </form>
        </div>
    </div>
</div>
