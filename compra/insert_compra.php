<?php
include '../config/database.php';

$id_proveedor = $_POST['id_proveedor'];
$fecha_compra = $_POST['fecha_compra'];
$numero_factura = $_POST['numero_factura'];
$monto_total = $_POST['monto_total'];
$metodo_pago = $_POST['metodo_pago'];
$fecha_entrega = $_POST['fecha_estimada_entrega'];
$estado = $_POST['estado_compra'];

$sql = "INSERT INTO compras (id_proveedor, fecha_compra, numero_factura, monto_total, metodo_pago, fecha_estimada_entrega, estado_compra)
VALUES ('$id_proveedor', '$fecha_compra', '$numero_factura', '$monto_total', '$metodo_pago', '$fecha_entrega', '$estado')";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Compra Registrada</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">

</head>
<body>
    <h2>
    <?php
    if ($conexion->query($sql) === TRUE) echo "Compra registrada exitosamente.";
    else echo "Error: " . $conexion->error;
    ?>
    </h2>

    <h2>Listado de Compras</h2>
    <table>
        <tr>
            <th>ID Compra</th>
            <th>ID Proveedor</th>
            <th>Fecha Compra</th>
            <th>N° Factura</th>
            <th>Monto</th>
            <th>Pago</th>
            <th>Fecha Entrega</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>

        <?php
        $consulta = "SELECT * FROM compras";
        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$fila['id_compra']}</td>";
            echo "<td>{$fila['id_proveedor']}</td>";
            echo "<td>{$fila['fecha_compra']}</td>";
            echo "<td>{$fila['numero_factura']}</td>";
            echo "<td>{$fila['monto_total']}</td>";
            echo "<td>{$fila['metodo_pago']}</td>";
            echo "<td>{$fila['fecha_estimada_entrega']}</td>";
            echo "<td>{$fila['estado_compra']}</td>";
            echo "<td>
                <a href='update_compra.php?id={$fila['id_compra']}'>Editar</a> |
                <a href='delete_compra.php?id={$fila['id_compra']}' onclick=\"return confirm('¿Eliminar esta compra?')\">Eliminar</a>
            </td>";
            echo "</tr>";
        }
        $conexion->close();
        ?>
    </table>

    <br><a href="index_compra.html" class="btn">Volver</a>
</body>
</html>
