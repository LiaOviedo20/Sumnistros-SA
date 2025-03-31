<?php
include '../db/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cliente = $_POST['id_cliente'];
    $fecha_venta = $_POST['fecha_venta'];
    $num_factura = $_POST['num_factura'];
    $monto_total = $_POST['monto_total'];
    $metodo_pago = $_POST['metodo_pago'];
    $condicion_pago = $_POST['condicion_pago'];
    $fecha_entrega = $_POST['fecha_entrega'];
    $estado_venta = $_POST['estado_venta'];
    $observaciones = $_POST['observaciones'];

    $sql = "INSERT INTO ventas (id_cliente, fecha_venta, num_factura, monto_total, metodo_pago, condicion_pago, fecha_entrega, estado_venta, observaciones)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issdsssss", $id_cliente, $fecha_venta, $num_factura, $monto_total, $metodo_pago, $condicion_pago, $fecha_entrega, $estado_venta, $observaciones);

    if ($stmt->execute()) {
        header("Location: read.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
