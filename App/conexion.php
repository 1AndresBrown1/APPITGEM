<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define las credenciales de la base de datos
$nombre_de_host = "localhost";
$nombre_de_usuario = "santand1_santand1";
$contraseña = "AndresBrown11@";
$nombre_de_base_de_datos = "santand1_itgem";

// Crea una conexión a la base de datos

try {
    $conn = mysqli_connect($nombre_de_host, $nombre_de_usuario, $contraseña, $nombre_de_base_de_datos);
    $conne = new PDO("mysql:host=$nombre_de_host;dbname=$nombre_de_base_de_datos;", $nombre_de_usuario, $contraseña);
    $conexion = new mysqli($nombre_de_host, $nombre_de_usuario, $contraseña, $nombre_de_base_de_datos);
} catch (PDOException $e) {
    if ($conexion->connect_error) {
        die("La conexión ha fallado " . $conexion->connect_error);
        die('Connection Failed: ' . $e->getMessage());
    }
}
