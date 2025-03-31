<?php
include '../db/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_producto = $_POST['id_producto'];
    $tipo_movimiento = $_POST['tipo_movimiento'];
    $cantidad = $_POST['cantidad'];
    $fecha_movimiento = $_POST['fecha_movimiento'];
    $motivo = $_POST['motivo'];

    $sql = "INSERT INTO movimientos_inventario (id_producto, tipo_movimiento, cantidad, fecha_movimiento, motivo) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isiss", $id_producto, $tipo_movimiento, $cantidad, $fecha_movimiento, $motivo);

    if ($stmt->execute()) {
        header("Location: read.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
