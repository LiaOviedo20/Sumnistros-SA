<?php
include '../db/database.php';

$sql = "SELECT id_producto, nombre_producto, ubicacion, stock_actual, estado FROM inventario";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario - Suministros S.A.</title>
    <link rel="stylesheet" href="estilos.css"> 
</head>
<body>

    <h1>Lista de Productos en Inventario</h1>

    <table>
        <thead>
            <tr>
                <th>ID Producto</th>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Stock Actual</th>
                <th>Estado</th>
                <th>Acciones</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row['id_producto']) . "</td>
                            <td>" . htmlspecialchars($row['nombre_producto']) . "</td>
                            <td>" . htmlspecialchars($row['ubicacion']) . "</td>
                            <td>" . htmlspecialchars($row['stock_actual']) . "</td>
                            <td>" . htmlspecialchars($row['estado']) . "</td>
                            <td>
                                <a href='update.php?id=" . $row['id_producto'] . "' class='btn editar'>Editar</a>
                                <a href='delete.php?id=" . $row['id_producto'] . "' class='btn eliminar'>Eliminar</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No hay productos en el inventario.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <a href="insert.php" class="btn agregar">Registrar Nuevo Producto</a>

</body>
</html>
