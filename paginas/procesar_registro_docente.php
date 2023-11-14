<?php
include_once("./header.php");
include("../bd.php");

function hashPassword($password) {
    // Hash de la contraseña
    $options = [
        'cost' => 12,
    ];
    $password_hash = password_hash($password, PASSWORD_BCRYPT, $options);
    return $password_hash;
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tipo_documento = $_POST['tipo_documento'];
    $documento_identidad = $_POST['documento_identidad'];
    $direccion = $_POST['direccion'];
    $titulo = $_POST['titulo'];
    $email = $_POST['email'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $contrasena = $_POST['contrasena'];
    $verificarContrasena = $_POST['verificarContrasena'];

    // Validar si las contraseñas coinciden
    if ($contrasena !== $verificarContrasena) {
        echo "Las contraseñas no coinciden. Por favor, verifica.";
    } else {
        // Hash de la contraseña
        $password_hash = hashPassword($contrasena);

        echo "Contraseña original: " . $contrasena . "<br>";
        echo "Contraseña hash: " . $password_hash . "<br>";

        // Verificación usando password_verify
        if (password_verify($contrasena, $password_hash)) {
            echo "Contraseña verificada con éxito.<br>";
        } else {
            echo "Error en la verificación de contraseña.<br>";
        }

        // Preparar y ejecutar la consulta de inserción con consulta preparada
        $sql = "INSERT INTO docentes (nombre, apellido, tipo_documento, documento_identidad, direccion, titulo, email, fecha_nacimiento, contrasena) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conexion->prepare($sql);

        if (!$stmt) {
            echo "Error en la preparación de la consulta: " . $conexion->error;
        } else {
            $stmt->bind_param("sssssssss", $nombre, $apellido, $tipo_documento, $documento_identidad, $direccion, $titulo, $email, $fecha_nacimiento, $password_hash);
            
            if ($stmt->execute()) {
                echo "Registro exitoso";
                    // Registro exitoso, redirigir a docentes.php
                // Redirigir a la página de estudiantes o a otra página
                echo '<script>alert("El docente se ha registrado con éxito.");</script>';
                echo '<script>window.location.href = "./docentes.php";</script>';
                exit;
            } else {
                echo "Error en la ejecución de la consulta: " . $stmt->error;
            }

            $stmt->close();
        }
    }
}
?>
