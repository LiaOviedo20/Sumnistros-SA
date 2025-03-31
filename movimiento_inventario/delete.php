<?php
include '../db/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM movimientos_inventario WHERE id_movimiento = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: read.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}

$conn->close();
?>
