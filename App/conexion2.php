
<?php

$conexion = new mysqli("localhost", "santand1_santand1", "AndresBrown11@", "santand1_itgem");

if ($conexion->connect_error) {
    die("Error en la conexi贸n a la base de datos: " . $conexion->connect_error);
}

// Configurar el conjunto de caracteres
$conexion->set_charset("utf8");

?>