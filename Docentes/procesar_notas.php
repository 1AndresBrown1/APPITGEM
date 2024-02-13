<?php
include("../bd.php");
// Revisa si se está recibiendo la solicitud POST con los datos
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $notas = json_decode(file_get_contents('php://input'), true);

    if ($notas) {
        include("./conexion.php");

        foreach ($notas as $estudianteId => $materias) {
            foreach ($materias as $materiaId => $nota) {
                // Verificar si ya existe una nota para este estudiante y materia
                $sql_nota_existente = "SELECT id FROM notas WHERE estudiante_id = ? AND materia_id = ?";
                $stmt_nota_existente = $conexion->prepare($sql_nota_existente);

                if ($stmt_nota_existente) {
                    $stmt_nota_existente->bind_param("ii", $estudianteId, $materiaId);
                    $stmt_nota_existente->execute();
                    $stmt_nota_existente->store_result();

                    // Si existe una nota, actualiza el registro en lugar de insertar uno nuevo
                    if ($stmt_nota_existente->num_rows > 0) {
                        $sql_update = "UPDATE notas SET nota = ? WHERE estudiante_id = ? AND materia_id = ?";
                        $stmt = $conexion->prepare($sql_update);
                        $stmt->bind_param("dii", $nota, $estudianteId, $materiaId);
                        $stmt->execute();
                        $stmt->close();
                    } else {
                        // Si no hay una nota existente, inserta una nueva
                        $sql_insert = "INSERT INTO notas (estudiante_id, materia_id, nota) VALUES (?, ?, ?)";
                        $stmt = $conexion->prepare($sql_insert);
                        $stmt->bind_param("iii", $estudianteId, $materiaId, $nota);
                        $stmt->execute();
                        $stmt->close();
                    }

                    $stmt_nota_existente->close();
                }
            }
        }

        // Devuelve una respuesta con el mensaje de éxito
        $response = array("message" => "Datos de notas procesados correctamente");
        echo json_encode($response);
    } else {
        $error_response = array("error" => "Error al decodificar los datos JSON");
        echo json_encode($error_response);
    }
} else {
    $error_response = array("error" => "No se recibió una solicitud POST");
    echo json_encode($error_response);
}
?>