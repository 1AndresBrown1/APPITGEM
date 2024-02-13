<?php require "navegacion.php"; 
// Realiza una consulta para obtener los registros de la tabla gestion_a
$query = "SELECT * FROM gestion_a";

// Ejecuta la consulta
$result = $conexion->query($query);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si el formulario ha sido enviado con el método POST

    // Recupera los datos del formulario
    $nombre_a = $_POST["nombre_a"];

    // Prepara la consulta SQL para insertar un nuevo año académico
    $sql = "INSERT INTO gestion_a (nombre_a) VALUES (?)";

    // Verifica si la conexión está abierta antes de preparar la consulta
    if (!$conexion->connect_error) {
        // Prepara la sentencia
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            // Asocia los parámetros
            $stmt->bind_param("s", $nombre_a);

            // Ejecuta la sentencia
            if ($stmt->execute()) {
                // El año académico se ha creado con éxito
                echo '<script>alert("El año académico se ha creado con éxito.");</script>';
                echo '<script>window.location.href = "./crear_a.php";</script>';
                exit; // Asegura que no se procese más código en esta página
            } else {
                // Ocurrió un error al ejecutar la sentencia
                echo '<script>alert("Error al crear el año académico: ' . $stmt->error . '");</script>';
            }

            // Cierra la sentencia
            $stmt->close();
        } else {
            // Ocurrió un error al preparar la sentencia
            echo '<div class="alert alert-danger" role="alert">Error al preparar la sentencia: ' . $conexion->error . '</div>';
        }
    }
}
?>

<!--  -->
<div style="background: none !important; margin-top: 50px !important;" class="espacecustom mt-4 rounded ">

    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">

        <div class="col">
            <h2 class="fw-bolder ms-2">Crear nuevo año:</h2>

            <div style="background: none !important; margin-top: 40px !important;" class=" mt-4 rounded ">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
                    <div class="col mb-3">
                        <div style="background-color: #e4e4e7;  border-radius: 20px;" class="card radius-10 p-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p style="color: #141e2c; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Crear Año</p>
                                        <a style="color: #141e2c !important;" href="#formulario1" id="mostrarFormulario1" class="text-blue-500 hover:underline">Click
                                            aqui</a>
                                        <br>
                                    </div>

                                </div>
                            </div>
                            <!-- Contenido de la primera tarjeta -->
                        </div>
                    </div>

                    <div class="col mb-3">
                        <div style="background: #fef08a; border-radius: 20px;" class="card radius-10 p-2">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p style="color: #141e2c; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Ver Año</p>
                                        <a style="color: #141e2c !important;" href="#formulario2" id="mostrarFormulario2" class="text-blue-500 hover:underline">Click
                                            aqui</a>
                                        <br>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="mt-4 ms-2" style="width: 80%;">Dale click en el boton correspondiente para crear o editar un Año lectivo</p>

        </div>

        <div class="col">
            <div class="col mb-4 d-flex justify-content-center">
                <img width="350" class="img" src="../recursos/img/img4.svg" alt="">
            </div>
        </div>

    </div>
</div>


<div id="formulario1" style="display: none;" class="espacecustom p-4 border p-custom">
    <h2 class="fw-bolder ms-2 mb-4">Crear Año:</h2>

    <form id="materiaForm" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
        <div class="form-group">
            <label for="nombre_a">Nombre del Año Académico:</label>
            <br>
            <input style="width: 50%;" type="text" class="form-control" id="nombre_a" name="nombre_a" required maxlength="6">
        </div>
        <br>
        <button style="background-color: #2970a0; color: white;" type="submit" class="btn btn-primary">Crear Año Académico</button>
    </form>
</div>

<div id="formulario2" style="display: none;" class="espacecustom p-4 border p-custom">
    <h2 class="fw-bolder ms-2 mb-4">Ver Año:</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre del Año Académico</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result) {
                $i = 1;
                // Itera a través de los resultados y muestra cada registro en una fila de la tabla
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th scope='row'>$i</th>";
                    echo "<td>" . $row['nombre_a'] . "</td>";
                    echo "<td><a href='editar_a.php?id=" . $row['id'] . "'>Editar</a> </td>";
                    echo "</tr>";
                    $i++;
                }
                // Libera el resultado
                $result->free();
            } else {
                echo '<tr><td colspan="3">No hay datos disponibles.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<br>
<footer class="espacecustom mb-4 border p-3">
    <center>
        <p class="mb-0">Santander Valley Col Copyright © 2023. All rights reserved.</p>
    </center>

</footer>

