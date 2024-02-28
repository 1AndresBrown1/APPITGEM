<?php require "sidebar.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'])) {
        $id = $_GET['id'];

        $nombre = $_POST['nombre'];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $lugar_nacimiento = $_POST["lugar_nacimiento"];
        $documento_identidad = $_POST["documento_identidad"];
        $fecha_expedicion = $_POST["fecha_expedicion"];
        $lugar_expedicion = $_POST["lugar_expedicion"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $nombre_acudiente = $_POST["nombre_acudiente"];
        $documento_identidad_acudiente = $_POST["documento_identidad_acudiente"];
        $eps = $_POST["eps"];
        $correo = $_POST["correo"];

        // Obtener el valor anterior del documento_identidad
        $sql_get_old_doc_ident = "SELECT documento_identidad FROM estudiantes WHERE id = $id";
        $old_doc_ident_result = $conexion->query($sql_get_old_doc_ident);
        $old_doc_ident_row = $old_doc_ident_result->fetch_assoc();
        $old_doc_ident = $old_doc_ident_row['documento_identidad'];

        $sql = "UPDATE estudiantes SET 
             nombre = '$nombre',
             fecha_nacimiento = '$fecha_nacimiento',
             lugar_nacimiento = '$lugar_nacimiento',
             documento_identidad = '$documento_identidad',
             fecha_expedicion = '$fecha_expedicion',
             lugar_expedicion = '$lugar_expedicion',
             direccion = '$direccion',
             telefono = '$telefono',
             nombre_acudiente = '$nombre_acudiente',
             documento_identidad_acudiente = '$documento_identidad_acudiente',
             eps = '$eps',
             correo = '$correo'
             WHERE id = $id";

        if ($conexion->query($sql) === TRUE) {
            echo "<script>alert('Los datos del estudiante se han sido actualizados correctamente.');</script>";
            echo "<script>console.log('Redirigiendo a estudiantes.php'); window.location.href = 'estudiantes.php';</script>";


            $sql_update_usuario = "UPDATE usuarios SET nombre_usuario = '$documento_identidad' WHERE nombre_usuario = '$old_doc_ident'";

            // Ejecutar la consulta de actualización del nombre de usuario
            if ($conexion->query($sql_update_usuario) === TRUE) {
            } else {
                // Error en la actualización del nombre de usuario
                echo "Error al actualizar el nombre de usuario en la tabla usuarios: " . $conexion->error;
            }
        } else {
            // Error en la actualización
            echo "Error al actualizar los datos del administrador: " . $conexion->error;
        }
    } else {
        echo "No se ha proporcionado un ID en el formulario.";
    }
}

$id = $_GET['id'];

$sql = "SELECT * FROM estudiantes WHERE id = $id";
$resultado = $conexion->query($sql);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Obtener los datos del administrador
    $fila = $resultado->fetch_assoc();

    // Mostrar el formulario de edición con los campos prellenados
?>

    <main>
        <div style="background: none !important;" class="espacecustom  rounded ">
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <?php
                    // Definir un array asociativo para mapear los roles a los colores de los badges
                    $colores_roles = array(
                        'admin' => 'danger',
                        'docente' => 'primary',
                        'estudiante' => 'success'
                        // Agrega aquí más roles y colores si es necesario
                    );

                    // Obtener el rol del usuario actual desde la sesión
                    $rol_usuario = $_SESSION['rol'];

                    // Verificar si el rol del usuario está definido en el array de colores
                    $badge_color = isset($colores_roles[$rol_usuario]) ? $colores_roles[$rol_usuario] : 'secondary';

                    // Mostrar el rol del usuario en el badge
                    echo '<span style="font-size: 16px;" class="ms-1 badge bg-' . $badge_color . '">' . ucfirst($rol_usuario) . '</span>';
                    echo '<span style="font-size: 16px;" class="ms-1 badge bg-' . $badge_color . '">' . ucfirst($nombre_administrador) . " " . ucfirst($apellido_administrador) .  '</span>'; ?>

                </li>
            </ul>
        </div>

        <nav class="ms-3" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./estudiantes.php">Estudiantes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar estudiante</li>
            </ol>
        </nav>
        <div style="border-radius: 20px; background-color: white;" id="formulario1" class="p-4 border p-custom mt-5">
            <h2 class="fw-bolder ms-2">Editar de docente:</h2>
            <span style="font-size: 15px;" class="badge text-bg-info ms-2 mt-3">Datos personales</span>
            <form action="" method="POST">
                <br>
                <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                <div class="row mb-3">
                    <div class="col-md-6 mt-2">
                        <div class="form-group">
                            <div class="input-group flex-nowrap">
                                <i style="font-size: 27px;" class="fa-solid fa-user input-group-text"></i>
                                <input value="<?php echo $fila['nombre']; ?>" autocomplete="off" id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre:" aria-label="Username" aria-describedby="addon-wrapping" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-2">
                        <div class="form-group">
                            <!-- Deja este espacio en blanco para agregar más campos si es necesario -->
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                            <div class="input-group flex-nowrap">
                                <i style="font-size: 27px;" class="fa-solid fa-calendar-days input-group-text"></i>
                                <input value="<?php echo $fila['fecha_nacimiento']; ?>" id="fecha_nacimiento" name="fecha_nacimiento" type="date" class="form-control" aria-describedby="addon-wrapping" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lugar_nacimiento">Lugar de nacimiento:</label>
                            <div class="input-group flex-nowrap">
                                <i style="font-size: 27px;" class="fa-solid fa-earth-americas input-group-text"></i>
                                <input value="<?php echo $fila['lugar_nacimiento']; ?>" autocomplete="off" id="lugar_nacimiento" name="lugar_nacimiento" type="text" class="form-control" placeholder="Lugar de nacimiento:" aria-label="Username" aria-describedby="addon-wrapping" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="input-group flex-nowrap">
                            <i style="font-size: 27px;" class="fa-solid fa-id-card input-group-text"></i>
                            <input value="<?php echo $fila['documento_identidad']; ?>" autocomplete="off" placeholder="Numero de documento" id="documento_identidad" name="documento_identidad" type="number" class="form-control" aria-describedby="addon-wrapping" required>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="fecha_expedicion">Fecha de expedición:</label>
                        <div class="input-group flex-nowrap">
                            <i style="font-size: 27px;" class="fa-solid fa-calendar-days input-group-text"></i>
                            <input value="<?php echo $fila['fecha_expedicion']; ?>" autocomplete="off" id="fecha_expedicion" name="fecha_expedicion" type="date" class="form-control" aria-describedby="addon-wrapping" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="lugar_expedicion">Expedida en:</label>
                        <div class="input-group flex-nowrap">
                            <i style="font-size: 27px;" class="fa-solid fa-earth-americas input-group-text"></i>
                            <input value="<?php echo $fila['lugar_expedicion']; ?>" autocomplete="off" id="lugar_expedicion" name="lugar_expedicion" type="text" class="form-control" placeholder="Lugar de Expedición:" aria-label="Username" aria-describedby="addon-wrapping" required>
                        </div>
                    </div>

                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="input-group flex-nowrap">
                            <i style="font-size: 27px;" class="fa-solid fa-map-location-dot input-group-text"></i>
                            <input value="<?php echo $fila['direccion']; ?>" autocomplete="off" id="direccion" name="direccion" type="text" class="form-control" placeholder="Direccion:" aria-label="Username" aria-describedby="addon-wrapping" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group flex-nowrap">
                            <i style="font-size: 27px;" class="fa-solid fa-phone input-group-text"></i>
                            <input value="<?php echo $fila['telefono']; ?>" autocomplete="off" id="telefono" name="telefono" type="text" class="form-control" placeholder="Telefono:" aria-label="Username" aria-describedby="addon-wrapping" required>
                        </div>
                    </div>
                </div>

                <br>
                <span style="font-size: 15px;" class="badge text-bg-info ms-2 mt-3">Datos del acudiente</span>
                <br>
                <br>

                <div class="row mb-3">
                    <div class="col-md-6 mt-2">
                        <div class="form-group">
                            <div class="input-group flex-nowrap">
                                <i style="font-size: 27px;" class="fa-solid fa-user input-group-text"></i>
                                <input value="<?php echo $fila['nombre_acudiente']; ?>" autocomplete="off" id="nombre_acudiente" name="nombre_acudiente" type="text" class="form-control" placeholder="Nombre:" aria-label="Username" aria-describedby="addon-wrapping" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-2">
                        <div class="form-group">
                            <!-- Deja este espacio en blanco para agregar más campos si es necesario -->
                        </div>
                    </div>
                </div>

                <div class="row mb-3">

                    <div class="col-md-6">
                        <div class="input-group flex-nowrap">
                            <i style="font-size: 27px;" class="fa-solid fa-id-card input-group-text"></i>
                            <input value="<?php echo $fila['documento_identidad_acudiente']; ?>" autocomplete="off" placeholder="Numero de documento_acudiente" id="documento_identidad_acudiente" name="documento_identidad_acudiente" type="number" class="form-control" aria-describedby="addon-wrapping" required>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                </div>

                <br>
                <span style="font-size: 15px;" class="badge text-bg-info ms-2 mt-3">Datos academicos</span>
                <br>
                <br>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="eps">EPS:</label>
                            <select value="<?php echo $fila['eps']; ?>" class="form-control" id="eps" name="eps" required>
                                <option value="">Selecciona una EPS</option>
                                <option value="ALIANSALUD ENTIDAD PROMOTORA DE SALUD S.A.">ALIANSALUD ENTIDAD PROMOTORA DE SALUD S.A.</option>
                                <option value="ASOCIACIÓN INDÍGENA DEL CAUCA">ASOCIACIÓN INDÍGENA DEL CAUCA</option>
                                <option value="COMFENALCO VALLE E.P.S.">COMFENALCO VALLE E.P.S.</option>
                                <option value="COMPENSAR E.P.S.">COMPENSAR E.P.S.</option>
                                <option value="E.P.S. FAMISANAR LTDA.">E.P.S. FAMISANAR LTDA.</option>
                                <option value="E.P.S. SANITAS S.A.">E.P.S. SANITAS S.A.</option>
                                <option value="EPS SERVICIO OCCIDENTAL DE SALUD S.A.">EPS SERVICIO OCCIDENTAL DE SALUD S.A.</option>
                                <option value="EPS Y MEDICINA PREPAGADA SURAMERICANA S.A">EPS Y MEDICINA PREPAGADA SURAMERICANA S.A</option>
                                <option value="MALLAMAS">MALLAMAS</option>
                                <option value="FUNDACIÓN SALUD MIA EPS">FUNDACIÓN SALUD MIA EPS</option>
                                <option value="NUEVA EPS S.A.">NUEVA EPS S.A.</option>
                                <option value="SALUD TOTAL S.A. E.P.S.">SALUD TOTAL S.A. E.P.S.</option>
                                <option value="SALUDVIDA S.A .E.P.S">SALUDVIDA S.A .E.P.S</option>
                                <option value="SAVIA SALUD EPS">SAVIA SALUD EPS</option>
                                <option value="ASMET SALUD EPS">ASMET SALUD EPS</option>

                                <!-- Add more options as needed -->
                            </select>
                        </div>
                    </div>
                    <!-- Agrega más campos aquí si es necesario -->
                </div>

                <div class="form-group mb-3">
                    <label for="correo">Correo:</label>
                    <input value="<?php echo $fila['correo']; ?>" autocomplete="off" autocomplete="off" type="email" class="form-control" id="correo" name="correo" required>
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Editar Estudiante</button>
            </form>
        </div>
    </main>


<?php
} else {
    echo "No se encontró el estudiante con el ID proporcionado.";
}
?>