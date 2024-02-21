<?php include_once './navegacion.php'; ?>


<div style="background: none !important; margin-top: 40px !important;" class="espacecustom mt-4 rounded ">
    <p style="font-weight: 600; font-size: 25px;" class="mb-3 ms-3">Selecciona una opción</p>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">

        <div class="col mb-3">
            <div style="background-color: #e4e4e7;  border-radius: 20px;" class="card radius-10 p-2">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p style="color: #141e2c; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Crear Admin</p>
                            <a style="color: #141e2c !important;" href="./App/administradores.php" id="mostrarFormulario1" class="text-blue-500 hover:underline">Click
                                aqui</a>
                            <br>
                        </div>

                    </div>
                </div>
                <!-- Contenido de la primera tarjeta -->
            </div>
        </div>


        <div class="col mb-3">
            <div style="background-color: #fef08a;  border-radius: 20px;" class="card radius-10 p-2">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p style="color: #141e2c; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Crear Docente</p>
                            <a style="color: #141e2c !important;" href="./App/docentes.php" id="mostrarFormulario1" class="text-blue-500 hover:underline">Click
                                aqui</a>
                            <br>
                        </div>
                    </div>
                </div>
                <!-- Contenido de la primera tarjeta -->
            </div>
        </div>

        <div class="col mb-3">
            <div style="background: #60a5fa;  border-radius: 20px;" class="card radius-10 p-2">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p style="color: #141e2c; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Crear Estudiante</p>
                            <a style="color: #141e2c !important;" href="./App/estudiantes.php" id="mostrarFormulario1" class="text-blue-500 hover:underline">Click
                                aqui</a>
                            <br>
                        </div>

                    </div>
                </div>
                <!-- Contenido de la tercera tarjeta -->
            </div>
        </div>
    </div>

</div>

<div style="background: none !important; margin-top: 50px !important;" class="espacecustom mt-4 rounded ">
        <h1>Bienvenido, <?php echo $nombre_administrador . " " . $apellido_administrador; ?>!</h1>

        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">

            <div class="col">
                <h2 class="fw-bolder">Control académico simplificado:</h2>
                <p style="width: 92%;" class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa praesentium deserunt molestias necessitatibus iste magni accusantium quibusdam quo corrupti delectus!</p>
                <br>


            </div>

            <div class="col">
                <div class="col mb-4 d-flex justify-content-center">
                    <img width="350" class="img" src="./recursos/img/img1.svg" alt="">
                </div>
            </div>

        </div>
    </div>


<footer class="espacecustom mb-4 border p-3">
    <center>
        <p class="mb-0">Santander Valley Col Copyright © 2024. All rights reserved.</p>
    </center>

</footer>