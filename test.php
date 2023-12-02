

<h2>Formulario de Datos</h2>

    <form action="procesar_formulario.php" method="post">
    <label for="tipo_identidad">Tipo de Identidad:</label>
        <select id="tipo_identidad" name="tipo_identidad" required>
            <option value="DNI">DNI</option>
            <option value="RUC">RUC</option>
        </select><br>

        <label for="num_identidad">Número de Identidad:</label>
        <input type="text" id="num_identidad" name="num_identidadd" required><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required><br>

        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo" required><br>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required><br>

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required><br>

        <label for="estado">Estado:</label>
        <select id="estado" name="estado" required>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select><br>

        <!-- Otros campos del formulario, si los hay -->

        <input type="submit" value="Enviar Datos">
    </form>