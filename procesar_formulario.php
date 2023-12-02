<?php
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
$identidad = $_POST['identidad'];
$num_identidad = $_POST['num_identidadd'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$fecha = $_POST['fecha'];


// Insertar datos en la tabla
$sql = "INSERT INTO clientes (identidad, num_identidad, nombre, telefono, correo, direccion, fecha) 
        VALUES ('$identidad', '$num_identidad', '$nombre', '$telefono', '$correo', '$direccion', '$fecha')";

if ($conn2->query($sql) === TRUE) {
    echo "Datos insertados correctamente";
} else {
    echo "Error al insertar datos: " . $conn2->error;
}

// Cerrar la conexión
$conn2->close();
?>
