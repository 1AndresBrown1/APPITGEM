<?php
// Datos de conexión a la base de datos
$host = "localhost"; // Cambia esto si tu base de datos está en un servidor diferente
$usuario = "root"; // Cambia esto por tu nombre de usuario de la base de datos
$password = ""; // Cambia esto por tu contraseña de la base de datos
$base_de_datos = "itgem"; // Cambia esto por el nombre de tu base de datos

// Intentar establecer la conexión
$conexion = new mysqli($host, $usuario, $password, $base_de_datos);

// Verificar si hay errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Si no hay errores, mostrar mensaje de éxito por consola
//echo "¡Conexión exitosa a la base de datos!\n";

// Cerrar la conexión (es opcional, PHP cerrará automáticamente la conexión al finalizar el script)

?>
