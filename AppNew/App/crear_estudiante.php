<?php
include_once './navegacion.php';
?>

<div id="formulario1" class="espacecustom p-4 border p-custom mt-5">
    <h2 class="fw-bolder ms-2">Registro de Estudiantes:</h2>
    <span style="font-size: 15px;" class="badge text-bg-info ms-2 mt-3">Datos personales</span>

    <form action="../Funciones/funcion_crear_estudiante.php" method="POST">
        <br>
        <div class="row mb-3">
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <div class="input-group flex-nowrap">
                        <i style="font-size: 27px;" class="fa-solid fa-user input-group-text"></i>
                        <input autocomplete="off" id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre:" aria-label="Username" aria-describedby="addon-wrapping" required>
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
                        <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" class="form-control" aria-describedby="addon-wrapping" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lugar_nacimiento">Lugar de nacimiento:</label>
                    <div class="input-group flex-nowrap">
                        <i style="font-size: 27px;" class="fa-solid fa-earth-americas input-group-text"></i>
                        <input autocomplete="off" id="lugar_nacimiento" name="lugar_nacimiento" type="text" class="form-control" placeholder="Lugar de nacimiento:" aria-label="Username" aria-describedby="addon-wrapping" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <i style="font-size: 27px;" class="fa-solid fa-id-card input-group-text"></i>
                    <select id="tipo_documento" name="tipo_documento" class="form-select" required>
                        <option selected>Selecciona un tipo de documento..</option>
                        <option value="DNI">Tarjeta de identidad</option>
                        <option value="Cedula">Cedula</option>
                        <option value="Pasaporte">Pasaporte</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group flex-nowrap">
                    <i style="font-size: 27px;" class="fa-solid fa-id-card input-group-text"></i>
                    <input autocomplete="off" placeholder="Numero de documento" id="documento_identidad" name="documento_identidad" type="number" class="form-control" aria-describedby="addon-wrapping" required>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="fecha_expedicion">Fecha de expedición:</label>
                <div class="input-group flex-nowrap">
                    <i style="font-size: 27px;" class="fa-solid fa-calendar-days input-group-text"></i>
                    <input autocomplete="off" id="fecha_expedicion" name="fecha_expedicion" type="date" class="form-control" aria-describedby="addon-wrapping" required>
                </div>
            </div>
            <div class="col-md-6">
                <label for="lugar_expedicion">Expedida en:</label>
                <div class="input-group flex-nowrap">
                    <i style="font-size: 27px;" class="fa-solid fa-earth-americas input-group-text"></i>
                    <input autocomplete="off" id="lugar_expedicion" name="lugar_expedicion" type="text" class="form-control" placeholder="Lugar de Expedición:" aria-label="Username" aria-describedby="addon-wrapping" required>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="input-group">
                    <i style="font-size: 27px;" class="fa-solid fa-venus-mars input-group-text"></i>
                    <select id="genero" name="genero" class="form-select" required>
                        <option value="">Selecciona un género</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group flex-nowrap">
                    <i style="font-size: 27px;" class="fa-solid fa-map-location-dot input-group-text"></i>
                    <input autocomplete="off" id="direccion" name="direccion" type="text" class="form-control" placeholder="Direccion:" aria-label="Username" aria-describedby="addon-wrapping" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group flex-nowrap">
                    <i style="font-size: 27px;" class="fa-solid fa-phone input-group-text"></i>
                    <input autocomplete="off" id="telefono" name="telefono" type="text" class="form-control" placeholder="Telefono:" aria-label="Username" aria-describedby="addon-wrapping" required>
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
                        <input autocomplete="off" id="nombre_acudiente" name="nombre_acudiente" type="text" class="form-control" placeholder="Nombre:" aria-label="Username" aria-describedby="addon-wrapping" required>
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
                <div class="input-group mb-3">
                    <i style="font-size: 27px;" class="fa-solid fa-id-card input-group-text"></i>
                    <select id="tipo_documento_acudiente" name="tipo_documento_acudiente" class="form-select" required>
                        <option selected>Selecciona un tipo de documento..</option>
                        <option value="DNI">Tarjeta de identidad</option>
                        <option value="Cedula">Cedula</option>
                        <option value="Pasaporte">Pasaporte</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group flex-nowrap">
                    <i style="font-size: 27px;" class="fa-solid fa-id-card input-group-text"></i>
                    <input autocomplete="off" placeholder="Numero de documento_acudiente" id="documento_identidad_acudiente" name="documento_identidad_acudiente" type="number" class="form-control" aria-describedby="addon-wrapping" required>
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
                    <select class="form-control" id="eps" name="eps" required>
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
            <input autocomplete="off" autocomplete="off" type="email" class="form-control" id="correo" name="correo" required>
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Registrar Estudiante</button>
    </form>
</div>