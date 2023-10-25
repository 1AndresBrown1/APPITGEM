<?php
include_once("./header.php");
?>

<div class="page-wrapper">
    <div class="page-content">

    <div class="container">
    <h2 class="my-4">Calificaciones de Estudiantes</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Curso</th>
                <th>Nota</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Estudiante 1</td>
                <td>Curso 1</td>
                <td>90</td>
                <td>
                    <a href="editar_nota.php">Editar</a> |
                    <a href="borrar_nota.php">Borrar</a>
                </td>
            </tr>
            <!-- Agrega más filas para otros estudiantes y cursos -->
        </tbody>
    </table>
</div>


    </div>
</div>