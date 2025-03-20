<?php
include '../config/database.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles de Compras</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">

</head>
<body>
    <h1>Detalles de Compras</h1>
    <table>
        <tr>
            <th>ID Detalle</th>
            <th>ID Compra</th>
            <th>ID Producto</th>
            <th>Cantidad</th>
            <th>Costo Unitario</th>
            <th>Costo Total</th>
            <th>Acciones</th>
        </tr>
        <?php while($row = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id_detalle'] ?></td>
            <td><?= $row['id_compra'] ?></td>
            <td><?= $row['id_producto'] ?></td>
            <td><?= $row['cantidad'] ?></td>
            <td><?= $row['costo_unitario'] ?></td>
            <td><?= $row['costo_total'] ?></td>
            <td>
                <a href="update_detalle.php?id=<?= $row['id_detalle'] ?>">Editar</a> |
                <a href="delete_detalle.php?id=<?= $row['id_detalle'] ?>">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br><a href="insert_detalle.html">Insertar Nuevo Detalle</a>
</body>
</html>
<?php $conexion->close(); ?>
