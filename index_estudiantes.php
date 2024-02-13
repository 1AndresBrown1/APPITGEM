<?php 
include './App/navegacion_estudiantes.php';
?>

<div style="background: none !important; margin-top: 50px !important;" class="espacecustom mt-4 rounded ">
    <h3 class="mb-3">Hola: <span><?php
                                    echo $_SESSION['nombre_usuario'];
                                    ?></span></h3>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">

        <div class="col">
            <h2 class="fw-bolder">Revisa tus notas:</h2>
            <p style="width: 92%;" class="mt-4">¡Te damos la bienvenida a nuestra plataforma académica! En este espacio dedicado, te brindamos la oportunidad de acceder cómodamente a todas tus notas. </p>
                <a href="./Estudiantes/notas.php">
                    <button style="background-color: #fef08a    ;" class="btn bnt-primary">Ver mis notas</button>
                </a>
        </div>
 
        <div  class="col">
            <div class="col mb-4 d-flex justify-content-center">
                <img width="350" class="img" src="./recursos/img/img1.svg" alt="">
            </div>
        </div>

    </div>
</div>