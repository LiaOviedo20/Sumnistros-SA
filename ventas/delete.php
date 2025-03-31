<?php
include '../db/database.php';

if (isset($_GET['id_venta'])) {
    $id_venta = $_GET['id_venta'];

    $sql = "DELETE FROM ventas WHERE id_venta = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_venta);

    if ($stmt->execute()) {
        header("Location: read.php");
    } else {
        echo "Error al eliminar: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
