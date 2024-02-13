<?php
include("./conexion2.php"); // Incluye el archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre_grupo = $_POST["nombre_grupo"];
    $grupo = $_POST["grupo"];
    $id_año = $_POST["id_año"];
    $id_docente = $_POST["id_docente"];


    // // Verifica si ya existe un grupo con el mismo número de grupo
    // $sql_verificar_grupo = "SELECT COUNT(*) AS total FROM grupos WHERE grupo = ?";
    // $stmt_verificar_grupo = $conexion->prepare($sql_verificar_grupo);
    // $stmt_verificar_grupo->bind_param("i", $grupo);
    // $stmt_verificar_grupo->execute();
    // $result_verificar_grupo = $stmt_verificar_grupo->get_result();
    // $row_verificar_grupo = $result_verificar_grupo->fetch_assoc();

   
        // Prepara la consulta SQL para insertar un nuevo grupo
        $sql_insertar = "INSERT INTO grupos (nombre_grupo, grupo, id_año, id_docente) VALUES (?, ?, ?, ?)";

        // Verifica si la conexión está abierta antes de preparar la consulta
        if (!$conexion->connect_error) {
            // Prepara la sentencia
            $stmt_insertar = $conexion->prepare($sql_insertar);

            if ($stmt_insertar) {
                // Asocia los parámetros
                $stmt_insertar->bind_param("siii", $nombre_grupo, $grupo, $id_año, $id_docente);

                if ($stmt_insertar->execute()) {
                    // El grupo se ha creado con éxito
                    echo '<script>alert("El grupo se ha creado con éxito.");</script>';
                } else {
                    // Ocurrió un error al ejecutar la sentencia
                    echo '<script>alert("Error al crear el grupo: ' . $stmt_insertar->error . '");</script>';
                }

                // Cierra la sentencia
                $stmt_insertar->close();
            } else {
                // Ocurrió un error al preparar la sentencia
                echo '<div class="alert alert-danger" role="alert">Error al preparar la sentencia: ' . $conexion->error . '</div>';
            }
        }
    

    // Cierra la conexión
    $conexion->close();

    // Redirige a la página de grupos.php o la página que desees
    echo '<script>window.location.href = "../grupos.php";</script>';
}
