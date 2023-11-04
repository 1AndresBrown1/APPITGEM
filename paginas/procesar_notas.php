<?php
include("../bd.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["notas"])) {
    $notas = json_decode($_POST["notas"], true);

    // Procesar y guardar las notas en la base de datos
    foreach ($notas as $id_estudiante => $materias) {
        foreach ($materias as $id_materia => $nota) {
            $sql = "INSERT INTO notas (id_estudiante, id_materia, nota) VALUES (?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("iid", $id_estudiante, $id_materia, $nota);
            if (!$stmt->execute()) {
                echo "Error al insertar nota: " . $stmt->error;
                exit;
            }
            $stmt->close();
        }
    }

    echo json_encode(['success' => true, 'message' => 'Notas guardadas exitosamente']);
} else {
    echo json_encode(['success' => false, 'message' => 'No se recibieron datos válidos']);
}
?>