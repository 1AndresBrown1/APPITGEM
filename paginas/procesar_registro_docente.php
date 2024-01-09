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
    $telefono = $_POST['telefono'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $lugar_nacimiento = $_POST['lugar_nacimiento'];
    $eps = $_POST['eps'];
    $genero = $_POST['genero'];
    $contrasena = $_POST['contrasena'];
    $verificarContrasena = $_POST['verificarContrasena'];

    // Validar si las contraseñas coinciden
    if ($contrasena !== $verificarContrasena) {
        echo "Las contraseñas no coinciden. Por favor, verifica.";
    } else {
        // Verificar si el correo electrónico ya está registrado
        $sql_verificar_email = "SELECT COUNT(*) FROM docentes WHERE email = ?";
        $stmt_verificar_email = $conexion->prepare($sql_verificar_email);
        $stmt_verificar_email->bind_param("s", $email);
        $stmt_verificar_email->execute();
        $stmt_verificar_email->bind_result($email_existente);
        $stmt_verificar_email->fetch();
        $stmt_verificar_email->close();

        // Verificar si el documento de identidad ya está registrado
        $sql_verificar_documento = "SELECT COUNT(*) FROM docentes WHERE documento_identidad = ?";
        $stmt_verificar_documento = $conexion->prepare($sql_verificar_documento);
        $stmt_verificar_documento->bind_param("s", $documento_identidad);
        $stmt_verificar_documento->execute();
        $stmt_verificar_documento->bind_result($documento_existente);
        $stmt_verificar_documento->fetch();
        $stmt_verificar_documento->close();

        if ($email_existente > 0) {
            echo '<script>alert("Ya existe un usuario con este correo electrónico. Por favor, elige otro.");</script>';
            echo '<script>window.location.href = "./docentes.php";</script>';
        } elseif ($documento_existente > 0) {
            echo '<script>alert("Ya existe un usuario con este documento de identidad. Por favor, elige otro.");</script>';
            echo '<script>window.location.href = "./docentes.php";</script>';
        } else {
            // Hash de la contraseña
            $password_hash = hashPassword($contrasena);

            echo "Contraseña original: " . $contrasena . "<br>";
            echo "Contraseña hash: " . $password_hash . "<br>";

            // Verificación usando password_verify
            if (password_verify($contrasena, $password_hash)) {
                echo "Contraseña verificada con éxito.<br>";

                // Preparar y ejecutar la consulta de inserción con consulta preparada
                $sql = "INSERT INTO docentes (nombre, apellido, tipo_documento, documento_identidad, direccion, titulo, email, fecha_nacimiento, contrasena, telefono, lugar_nacimiento, eps,genero) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
                
                $stmt = $conexion->prepare($sql);

                if (!$stmt) {
                    echo "Error en la preparación de la consulta: " . $conexion->error;
                } else {
                    $stmt->bind_param("sssssssssssss", $nombre, $apellido, $tipo_documento, $documento_identidad, $direccion, $titulo, $email, $fecha_nacimiento, $password_hash, $telefono, $lugar_nacimiento, $eps,$genero);
                    
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
            } else {
                echo "Error en la verificación de contraseña.<br>";
            }
        }
    }
}
?>
