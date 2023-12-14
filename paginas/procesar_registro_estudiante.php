<?php
include_once("./header.php");
include("../bd.php");


// --->


// Conectar a la base de datos (reemplaza los valores con los de tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

$conn2 = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn2->connect_error) {
    die("Error de conexión: " . $conn2->connect_error);
} else {
    echo "<script>
            alert('Conexión exitosa a la base de datos');
            console.log('Conexión exitosa a la base de datos');
          </script>";
}

// Recibir datos del formulario
$identidad = $_POST['tipo_documento'];
$num_identidad = $_POST['documento_identidad'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$fecha = $_POST['fecha_nacimiento'];


// Insertar datos en la tabla
$sql = "INSERT INTO clientes (identidad, num_identidad, nombre, telefono, correo, direccion, fecha) 
        VALUES ('$identidad', '$num_identidad', '$nombre', '$telefono', '$correo', '$direccion', '$fecha')";

if ($conn2->query($sql) === TRUE) {
    echo "<script>alert('Datos insertados correctamente');</script>";

} else {
    echo "Error al insertar datos: " . $conn2->error;
}

// Cerrar la conexión
$conn2->close();




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $fechaNacimiento = $_POST["fecha_nacimiento"];
    $genero = $_POST["genero"];
    $grupoId = $_POST["grupo"];
    $documento_identidad = $_POST["documento_identidad"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $tipo_documento = $_POST["tipo_documento"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    $verificarContrasena = $_POST["verificarContrasena"];
    $estadoMatricula = $_POST["estado_matricula"];
    

    // Validaciones básicas (puedes agregar más según tus necesidades)
    if (empty($nombre) || empty($apellido) || empty($fechaNacimiento) || empty($genero) || empty($grupoId) || empty($documento_identidad) || empty($direccion) || empty($telefono) || empty($tipo_documento) || empty($correo) || empty($contrasena) || empty($verificarContrasena) || empty($estadoMatricula)) {
        echo '<div class="alert alert-danger" role="alert">Todos los campos son obligatorios.</div>';
        exit;
    }

    // Validar el formato del correo electrónico
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="alert alert-danger" role="alert">El formato del correo electrónico no es válido.</div>';
        exit;
    }

    // Verifica si las contraseñas coinciden
    if ($contrasena != $verificarContrasena) {
        echo '<div class="alert alert-danger" role="alert">Las contraseñas no coinciden.</div>';
        exit;
    }
    function hashPassword($password)
    {
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
        echo "Contraseña hash: " . $hashedContrasena . "<br>";

        // Verificación usando password_verify
        if (password_verify($contrasena, $hashedContrasena)) {
            echo "Contraseña verificada con éxito.<br>";
        } else {
            echo "Error en la verificación de contraseña.<br>";
        }
        // Hash de la contraseña utilizando la función personalizada
        // $hashedContrasena = hashPassword($contrasena);

        // Preparar y ejecutar la consulta de inserción
        $sql = "INSERT INTO estudiantes (nombre, apellido, fecha_nacimiento, genero, grupo_id, documento_identidad, contrasena, estado_matricula, direccion, telefono, tipo_documento, correo) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Verificar si la conexión está abierta antes de preparar la consulta
        if (!$conexion->connect_error) {
            // Preparar la sentencia
            $stmt = $conexion->prepare($sql);

            if ($stmt) {
                // Asociar los parámetros
                $stmt->bind_param("ssssiiisssss", $nombre, $apellido, $fechaNacimiento, $genero, $grupoId, $documento_identidad, $hashedContrasena, $estadoMatricula, $direccion, $telefono, $tipo_documento, $correo);

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


