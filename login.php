<!-- PHP -->
<?php
session_start();
require "./App/conexion.php";

// Redirigir si ya hay una sesión activa
if (!empty($_SESSION['nombre_usuario'])) {
  
    echo '<script>window.location.href = "./index.php";</script>';
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identificacion = $_POST['identificacion'];
    $contrasena = $_POST['contrasena'];
    $tipo_usuario = $_POST['tipo_usuario'];

    // Verificar si los campos requeridos están vacíos
    if (empty($identificacion) || empty($contrasena) || $tipo_usuario == 'Selecciona el tipo de usuario:') {
        $error_message = 'Por favor, complete los campos requeridos.';
    } else {
        // Realiza la consulta en la base de datos para verificar las credenciales
        if ($tipo_usuario === 'docente') {
            $query = "SELECT id, nombre, contrasena FROM docentes WHERE documento_identidad = ?";
        } elseif ($tipo_usuario === 'estudiante') {
            $query = "SELECT id, nombre, contrasena FROM estudiantes WHERE documento_identidad = ?";
        } else {
            $error_message = 'Tipo de usuario no válido';
            exit();
        }

        // Evitar la inyección de SQL utilizando sentencias preparadas
        $stmt = $conexion->prepare($query);
        $stmt->bind_param('s', $identificacion); // 's' indica que el parámetro es de tipo string
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($contrasena, $row['contrasena'])) {
                $_SESSION['id_usuario'] = $row['id'];
                $_SESSION['identificacion_usuario'] = $identificacion;

                if ($tipo_usuario === 'docente') {
                    $_SESSION['nombre_usuario'] = $row['nombre'];
                    $_SESSION['docente'] = 'docente';
                    $_SESSION['id_docente'] = $_SESSION['id_usuario'];
                    $_SESSION['identificacion_usuario'] = $identificacion;
                    header('Location: index_docentes.php');
                    exit(); // Importante para evitar ejecución adicional
                } elseif ($tipo_usuario === 'estudiante') {
                    $_SESSION['nombre_usuario'] = $row['nombre'];
                    $_SESSION['estudiante'] = 'estudiante';
                    $_SESSION['id_estudiante'] = $_SESSION['id_usuario'];
                    $_SESSION['identificacion_usuario'] = $identificacion;
                    header('Location: index_estudiantes.php');
                    exit(); // Importante para evitar ejecución adicional
                }
            } else {
                $error_message = 'Contraseña incorrecta';
            }
        } else {
            $error_message = 'Usuario no encontrado';
        }

        $stmt->close();
    }
} else {
    $error_message = 'Por favor, complete los campos requeridos.';
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iniciar sesion</title>
    <link rel="shortcut icon" href="./assets/images/Logo Elotes Ilustrado Amarillo y Verde.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/fonts/fonst.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="./recursos/bootstrap/css/bootstrap.min.css">
    <!-- Bootstrap -->
</head>

<body>
    <section style="background-color: white !important;" class="mt-1 d-flex justify-content-center text-center cardcustom">
        <div><a href="./loginA.php"><img width="150" class="mt-4 img-fluid" src="./recursos/img/logo-grande.svg" alt=""></a>
            <p class="text-center mt-4 fw-bolder p-custom">Bienvenido de nuevo, inicia sección para acceder</p>
            <p style="font-size: 14px !important;" class="p-custom mt-3">Por favor ingresa tus credenciales de inicio de sección para poder acceder a la plataforma de gestión de notas APPITGEM</p>

            <!-- Formulario de inicio de sección -->
            <form action="login.php" method="post">
                <div class="m-auto input-group mt-4 inputdiv">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-paper-plane"></i></span>
                    <input type="text" id="identificacion" name="identificacion" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                </div>
                <div class="m-auto input-group mt-3 inputdiv">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" id="contrasena" name="contrasena" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" required>
                </div>
                <select name="tipo_usuario" id="tipo_usuario" class="form-select mt-3 inputdiv" aria-label="Default select example">
                    <option selected>Selecciona el tipo de usuario:</option>
                    <option value="docente">Docente</option>
                    <option value="estudiante">Estudiante</option>
                </select>
                <div class="d-grid gap-2 inputdiv mt-4">
                    <button type="submit" class="btn btn-custom fw-bolder" type="button">iniciar sección</button>
                </div>
            </form>

            <!-- Alerta para contraseña incorrecta -->
            <?php if (isset($error_message) && !empty($error_message)) : ?>
                <div class="alert alert-danger mt-2 inputdiv" role="alert">
                    <?php echo $error_message; ?>
                </div>
            <?php endif; ?>

        </div>
    </section>

    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>