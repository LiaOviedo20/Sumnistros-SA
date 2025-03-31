<?php
include '../db/database.php';

$sql = "SELECT * FROM movimientos_inventario";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Movimientos</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h2>Movimientos de Inventario</h2>
    <table>
        <tr>
            <th>ID Movimiento</th>
            <th>ID Producto</th>
            <th>Tipo</th>
            <th>Cantidad</th>
            <th>Fecha</th>
            <th>Motivo</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id_movimiento'] ?></td>
            <td><?= $row['id_producto'] ?></td>
            <td><?= $row['tipo_movimiento'] ?></td>
            <td><?= $row['cantidad'] ?></td>
            <td><?= $row['fecha_movimiento'] ?></td>
            <td><?= $row['motivo'] ?></td>
            <td>
                <a href="update.php?id=<?= $row['id_movimiento'] ?>">Editar</a>
                <a href="delete.php?id=<?= $row['id_movimiento'] ?>" onclick="return confirm('¿Seguro que deseas eliminar este movimiento?')">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="movimiento.html">Registrar Nuevo Movimiento</a>
</body>
</html>

<?php
$conn->close();
?>
