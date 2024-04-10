<?php
include '../App/conexion.php';

function insertarEstudiante($grupo_id,  $nombre, $fecha_nacimiento, $lugar_nacimiento, $tipo_documento, $documento_identidad, $fecha_expedicion, $lugar_expedicion, $genero, $direccion, $telefono, $nombre_acudiente, $tipo_documento_acudiente, $documento_identidad_acudiente, $eps, $correo,  $conexion)
{
    // Verificar si ya existe un estudiante con el mismo nombre, documento de identidad o correo
    $sql_verificacion = "SELECT * FROM estudiantes WHERE nombre = '$nombre' OR documento_identidad = '$documento_identidad' OR correo = '$correo'";
    $resultado_verificacion = $conexion->query($sql_verificacion);

    if ($resultado_verificacion->num_rows > 0) {
        // Si ya existe un estudiante con alguno de estos datos, mostrar un mensaje de error
        echo "<script>alert('Ya existe un estudiante con alguno de estos datos.'); window.location.href = '../App/estudiantes.php';</script>";
    } else {
        // Si no existe, proceder con la inserción
        $sql = "INSERT INTO estudiantes (nombre,fecha_nacimiento,lugar_nacimiento,tipo_documento,documento_identidad,fecha_expedicion,lugar_expedicion,genero,direccion,telefono,nombre_acudiente,tipo_documento_acudiente,documento_identidad_acudiente,eps,correo,grupo_id)
        VALUES ('$nombre', '$fecha_nacimiento', '$lugar_nacimiento', '$tipo_documento', '$documento_identidad', '$fecha_expedicion', '$lugar_expedicion', '$genero', '$direccion', '$telefono', '$nombre_acudiente', '$tipo_documento_acudiente', '$documento_identidad_acudiente', '$eps', '$correo','$grupo_id')";

        if ($conexion->query($sql) === TRUE) {
            echo "<script>alert('Nuevo estudiante insertado correctamente.'); window.location.href = '../App/estudiantes.php';</script>";


            // 
            // Ahora procedemos a insertar en la segunda base de datos
            $segunda_conexion = new mysqli("localhost", "root", "", "santand1_carteraitgem.sql");
            if ($segunda_conexion->connect_error) {
                die("Error de conexión a la base de datos santand1_carteraitgem: " . $segunda_conexion->connect_error);
            }

            // Inserción en la segunda base de datos
            $sql_insertar_segunda = "INSERT INTO clientes (identidad,num_identidad,nombre,telefono,correo,direccion,fecha)
    VALUES ('$tipo_documento','$documento_identidad','$nombre', '$telefono','$correo','$grupo_id','$fecha_nacimiento')";

            if ($segunda_conexion->query($sql_insertar_segunda) === TRUE) {
                echo "<script>alert('Nuevo estudiante insertado correctamente en la base de datos santand1_carteraitgem.');</script>";
            } else {
                echo "Error al insertar estudiante en la base de datos santand1_carteraitgem: " . $segunda_conexion->error;
            }

            // Cerrar la conexión a la segunda base de datos
            $segunda_conexion->close();
            // 

            $id_usuario = $conexion->insert_id;
            $nombreUsuario = $documento_identidad;
            $contrasena = password_hash($documento_identidad, PASSWORD_DEFAULT);
            $sqlUsuarios = "INSERT INTO usuarios (nombre_usuario,contrasena,rol)
            VALUES ('$nombreUsuario','$contrasena','estudiante')";

            if ($conexion->query($sqlUsuarios) === TRUE) {
                $id_usuario_insertado = $conexion->insert_id;
                $sqlUpdate = "UPDATE estudiantes SET usuario_id = $id_usuario_insertado WHERE correo = '$correo'";
                if ($conexion->query($sqlUpdate) === TRUE) {
                } else {
                    echo "Error al actualizar campo usuario_id:" . $conexion->error;
                }
            } else {
                echo "Error al insertar datos de docente en la tabla usuarios: " . $conexion->error;
            }
        } else {
            echo "Error al insertar docente: " . $conexion->error;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $lugar_nacimiento = $_POST["lugar_nacimiento"];
    $tipo_documento = $_POST["tipo_documento"];
    $documento_identidad = $_POST["documento_identidad"];
    $fecha_expedicion = $_POST["fecha_expedicion"];
    $lugar_expedicion = $_POST["lugar_expedicion"];
    $genero = $_POST["genero"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $nombre_acudiente = $_POST["nombre_acudiente"];
    $tipo_documento_acudiente = $_POST["tipo_documento_acudiente"];
    $documento_identidad_acudiente = $_POST["documento_identidad_acudiente"];
    $eps = $_POST["eps"];
    $correo = $_POST["correo"];
    $grupo_id = $_POST["grupo_id"];


    insertarEstudiante($grupo_id, $nombre, $fecha_nacimiento, $lugar_nacimiento, $tipo_documento, $documento_identidad, $fecha_expedicion, $lugar_expedicion, $genero, $direccion, $telefono, $nombre_acudiente, $tipo_documento_acudiente, $documento_identidad_acudiente, $eps, $correo, $conexion);
}
