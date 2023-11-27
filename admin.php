<?php
session_start();
require 'navegacion.php';
?>

<!-- OPCIONES -->
<div style="background-color: white !important;" class="page-wrapper cardcustom mt-3">
    <div class="page-content">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
            <div class="col mt-3">
                <div id="customCard" style="background: #262c40; border-radius: 20px;" class="card radius-10 p-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p style="color: white; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Gestion de Cartera</p>
                                <a style="color: #fee6ff !important;" href="./cartera/index.php" id="mostrarFormulario1" class="text-blue-500 hover:underline" target="_blank">Click
                                    aqui</a>
                                <br>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                                <i class="fa-solid fa-hand-holding-dollar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mt-3">
                <div id="customCard" style="background: #414e6e; border-radius: 20px;" class="card radius-10 p-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p style="color: white; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Subir Video</p>
                                <a style="color: #fee6ff !important;" href="#ultimo" id="mostrarFormulario2" class="text-blue-500 hover:underline">Click aqui</a>
                                <br>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                                <i class="fa-solid fa-video"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col mt-3">
                <div id="customCard" style="background: #414e6e; border-radius: 20px;" class="card radius-10 p-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p style="color: white; font-size: 20px; font-weight: 800;" href="" class="txt-card-custom mb-0">Escribenos</p>
                                <a style="color: #fee6ff !important;" href="#" id="mostrarFormulario3" class="text-blue-500 hover:underline">Click aqui</a>
                                <br>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                                <i class="fa-solid fa-comment"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- OPCIONES -->