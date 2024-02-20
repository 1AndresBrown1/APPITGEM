<?php
include '../App/conexion.php';

function insertarEstudiante($nombre, $fecha_nacimiento, $lugar_nacimiento, $tipo_documento, $documento_identidad, $fecha_expedicion, $lugar_expedicion, $genero, $direccion, $telefono, $nombre_acudiente, $tipo_documento_acudiente, $documento_identidad_acudiente, $eps, $correo, $conexion)
{
    $sql = "INSERT INTO estudiantes (nombre,fecha_nacimiento,lugar_nacimiento,tipo_documento,documento_identidad,fecha_expedicion,lugar_expedicion,genero,direccion,telefono,nombre_acudiente,tipo_documento_acudiente,documento_identidad_acudiente,eps,correo)
    VALUES ('$nombre', '$fecha_nacimiento', '$lugar_nacimiento', '$tipo_documento', '$documento_identidad', '$fecha_expedicion', '$lugar_expedicion', '$genero', '$direccion', '$telefono', '$nombre_acudiente', '$tipo_documento_acudiente', '$documento_identidad_acudiente', '$eps', '$correo')";

    if ($conexion->query($sql) === TRUE) {
        echo "<script>alert('Nuevo estudiante insertado correctamente.'); window.location.href = '../App/estudiantes.php';</script>";

        $id_usuario = $conexion->insert_id;
        $nombreUsuario = $documento_identidad;
        $contrasena = password_hash($documento_identidad, PASSWORD_DEFAULT);
        $sqlUsuarios = "INSERT INTO usuarios (nombre_usuario,contrasena,rol)
        VALUES ('$nombreUsuario','$contrasena','estudiante')";

        if($conexion->query($sqlUsuarios) === TRUE){
            $id_usuario_insertado = $conexion->insert_id;
            $sqlUpdate = "UPDATE estudiantes SET usuario_id = $id_usuario_insertado WHERE correo = '$correo'";
            if($conexion->query($sqlUpdate) === TRUE){

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

if($_SERVER["REQUEST_METHOD"] == "POST"){
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

insertarEstudiante($nombre, $fecha_nacimiento, $lugar_nacimiento, $tipo_documento, $documento_identidad, $fecha_expedicion, $lugar_expedicion, $genero, $direccion, $telefono, $nombre_acudiente, $tipo_documento_acudiente, $documento_identidad_acudiente, $eps, $correo, $conexion);
}