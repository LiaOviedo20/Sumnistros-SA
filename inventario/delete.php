<?php
include '../db/database.php';

if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM inventario WHERE id_producto = ?");
    $stmt->bind_param("i", $id_producto);

    if ($stmt->execute()) {
        header("Location: read.php"); 
        exit();
    } else {
        echo "Error al eliminar el producto.";
    }

    $stmt->close();
} else {
    echo "ID no proporcionado.";
}

$conn->close();
?>
