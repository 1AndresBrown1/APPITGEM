<?php
include("../bd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"]) && isset($_POST["newValue"])) {
    $id = $_POST["id"];
    $newValue = $_POST["newValue"];

    $query = "UPDATE gestion_a SET nombre_a = ? WHERE id = ?";
    $stmt = $conexion->prepare($query);

    if ($stmt) {
        $stmt->bind_param("si", $newValue, $id);
        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "error";
        }
        $stmt->close();
    }
} else {
    echo "error";
}
?>


