<?php
include '../db/database.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Ventas</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h2>Ventas Registradas</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID Venta</th>
                <th>ID Cliente</th>
                <th>Fecha Venta</th>
                <th>Número Factura</th>
                <th>Monto Total</th>
                <th>Método de Pago</th>
                <th>Condición Pago</th>
                <th>Fecha Entrega</th>
                <th>Estado Venta</th>
                <th>Observaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM ventas";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id_venta']}</td>
                        <td>{$row['id_cliente']}</td>
                        <td>{$row['fecha_venta']}</td>
                        <td>{$row['num_factura']}</td>
                        <td>{$row['monto_total']}</td>
                        <td>{$row['metodo_pago']}</td>
                        <td>{$row['condicion_pago']}</td>
                        <td>{$row['fecha_entrega']}</td>
                        <td>{$row['estado_venta']}</td>
                        <td>{$row['observaciones']}</td>
                        <td>
                            <a href='update.php?id_venta={$row['id_venta']}'>Editar</a>
                            <a href='delete.php?id_venta={$row['id_venta']}'>Eliminar</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="ventas.html">Registrar Nueva Venta</a>
</body>
</html>
