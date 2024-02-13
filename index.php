<?php require "./App/navegacion.php"; require './paginas/funciones/contar.php'; ?>



<div style="background: none !important; margin-top: 40px !important;" class="espacecustom mt-4 rounded ">
    <p style="font-weight: 600; font-size: 25px;" class="mb-3 ms-3">Selecciona una opción</p>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
        <div class="col mb-3">
            <div style="background-color: #e4e4e7;  border-radius: 20px;" class="card radius-10 p-2">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p style="color: #141e2c; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Crear Docente</p>
                            <a style="color: #141e2c !important;" href="./paginas/docentes.php" id="mostrarFormulario1" class="text-blue-500 hover:underline">Click
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
                            <p style="color: #141e2c; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Gestion Academica</p>
                            <a style="color: #141e2c !important;" href="./paginas/academico.php" id="mostrarFormulario1" class="text-blue-500 hover:underline">Click
                                aqui</a>
                            <br>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col mb-3">
            <div style="background: #60a5fa;  border-radius: 20px;" class="card radius-10 p-2">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p style="color: #141e2c; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Crear Estudiante</p>
                            <a style="color: #141e2c !important;" href="./paginas/estudiantes.php" id="mostrarFormulario1" class="text-blue-500 hover:underline">Click
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
    <h3 class="mb-3">Hola: <span><?php
                                    echo $_SESSION['nombre_usuario'];
                                    ?></span></h3>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">

        <div class="col">
            <h2 class="fw-bolder">Control académico simplificado:</h2>
            <p style="width: 92%;" class="mt-4">Gestiona de manera eficiente y potencia tu experiencia académica con
                nuestra aplicación avanzada de gestión educativa. Desde el seguimiento detallado del progreso
                individual hasta la facilitación de la colaboración entre alumnos, profesores y administradores</p>
             <br>
            <span style="font-size: 16px;" class="badge text-bg-primary  mb-4 p-2">Estudiantes: <?php echo $totalRegistrosEstudiantes; ?></span>
            <span style="font-size: 16px;" class="badge text-bg-secondary  mb-4 p-2">Docentes: <?php echo $totalRegistrosDocentes; ?></span>
            <span style="font-size: 16px;" class="badge text-bg-success  mb-4 p-2">Grupos: <?php echo $totalRegistrosGrupos; ?></span>

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
        <p class="mb-0">Santander Valley Col Copyright © 2023. All rights reserved.</p>
    </center>

</footer>