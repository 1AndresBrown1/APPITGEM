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
        <div><img width="150" class="mt-5 img-fluid" src="./recursos/img/logo-grande.svg" alt="">
            <p class="text-center mt-4 fw-bolder p-custom">Bienvenido de nuevo, inicia sección para acceder</p>
            <p style="font-size: 14px !important;" class="p-custom mt-3">Por favor ingresa tus credenciales de inicio de sección para poder acceder a la plataforma de gestión de notas APPITGEM</p>

            <!-- Formulario de inicio de sección -->
            <form action="./Funciones/funcion_login.php" method="post">
                <div class="m-auto input-group mt-4 inputdiv">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-paper-plane"></i></span>
                    <input type="text" id="nombre_usuario" name="nombre_usuario" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                </div>
                <div class="m-auto input-group mt-3 inputdiv">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" id="contrasena" name="contrasena" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" required>
                </div>

                <div class="d-grid gap-2 inputdiv mt-4">
                    <button type="submit" class="btn btn-custom fw-bolder" type="button">iniciar sección</button>
                </div>
            </form>
        </div>
    </section>

    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>