<?php
include_once("./header.php");
include("../bd.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $fechaNacimiento = $_POST["fecha_nacimiento"];
    $genero = $_POST["genero"];
    $grupoId = $_POST["grupo"];
    $documento_identidad = $_POST["documento_identidad"];
    $contrasena = $_POST["contrasena"];
    $verificarContrasena = $_POST["verificarContrasena"];
    $estadoMatricula = $_POST["estado_matricula"];

    // Verifica si las contraseñas coinciden
    if ($contrasena != $verificarContrasena) {
        echo '<div class="alert alert-danger" role="alert">Las contraseñas no coinciden.</div>';
        exit;
    }
    function hashPassword($password) {
        // Hash de la contraseña
        $options = [
            'cost' => 12,
        ];
        $password_hash = password_hash($password, PASSWORD_BCRYPT, $options);
        return $password_hash;
    }
    if ($contrasena !== $verificarContrasena) {
        echo "Las contraseñas no coinciden. Por favor, verifica.";
    } else {
        // Hash de la contraseña
        $hashedContrasena = hashPassword($contrasena);

        echo "Contraseña original: " . $contrasena . "<br>";
        echo "Contraseña hash: " . $hashedContrasena. "<br>";

        // Verificación usando password_verify
        if (password_verify($contrasena, $hashedContrasena)) {
            echo "Contraseña verificada con éxito.<br>";
        } else {
            echo "Error en la verificación de contraseña.<br>";
        }
    // Hash de la contraseña utilizando la función personalizada
    // $hashedContrasena = hashPassword($contrasena);

    // Preparar y ejecutar la consulta de inserción
    $sql = "INSERT INTO estudiantes (nombre, apellido, fecha_nacimiento, genero, grupo_id, documento_identidad, contrasena, estado_matricula) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Verificar si la conexión está abierta antes de preparar la consulta
    if (!$conexion->connect_error) {
        // Preparar la sentencia
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            // Asociar los parámetros
            $stmt->bind_param("ssssiiss", $nombre, $apellido, $fechaNacimiento, $genero, $grupoId, $documento_identidad, $hashedContrasena, $estadoMatricula);

            // Ejecutar la sentencia
            if ($stmt->execute()) {
                // Redirigir a la página de estudiantes o a otra página
                echo '<script>alert("El estudiante se ha registrado con éxito.");</script>';
                echo '<script>window.location.href = "./estudiantes.php";</script>';
                exit;
            } else {
                echo '<div class="alert alert-danger" role="alert">Error al guardar el estudiante: ' . $stmt->error . '</div>';
            }

            // Cerrar la sentencia
            $stmt->close();
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al preparar la sentencia: ' . $conexion->error . '</div>';
        }
    }
}
}
?>