<?php
include '../config/database.php';

$id_compra = $_POST['id_compra'];
$id_producto = $_POST['id_producto'];
$cantidad = $_POST['cantidad'];
$costo_unitario = $_POST['costo_unitario'];
$costo_total = $cantidad * $costo_unitario;

$sql = "INSERT INTO detalle_compras (id_compra, id_producto, cantidad, costo_unitario, costo_total)
        VALUES ('$id_compra', '$id_producto', '$cantidad', '$costo_unitario', '$costo_total')";

if ($conexion->query($sql) === TRUE) {
    echo "<p>Detalle registrado exitosamente.</p>";
} else {
    echo "Error: " . $conexion->error;
}
$conexion->close();
echo '<a href="detalle.php">Ver Detalles</a>';
?>
<link rel="stylesheet" type="text/css" href="../css/estilos.css">
