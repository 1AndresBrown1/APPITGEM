<?php
// Define las credenciales de la base de datos
$nombre_de_host = "localhost";
$nombre_de_usuario = "root";
$contraseña = "";
$nombre_de_base_de_datos = "academico";

// Crea una conexión a la base de datos
$conexion = new mysqli($nombre_de_host, $nombre_de_usuario, $contraseña, $nombre_de_base_de_datos);

// Verifica si hay errores en la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

?>