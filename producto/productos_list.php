<?php
include("../config/database.php");

$sql = "SELECT * FROM productos";
$stmt = $conn->query($sql);
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Lista de Productos</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Categoría</th>
            <th>SKU</th>
            <th>Precio Venta</th>
            <th>Costo Adquisición</th>
            <th>Stock Actual</th>
            <th>Stock Mínimo</th>
            <th>Unidad Medida</th>
            <th>Fecha Creación</th>
        </tr>
        <?php foreach ($productos as $producto) : ?>

        <tr>
    <td><?php echo $producto['id']; ?></td>
    <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
    <td><?php echo htmlspecialchars($producto['descripcion']); ?></td>
    <td><?php echo htmlspecialchars($producto['categoria']); ?></td>
    <td><?php echo htmlspecialchars($producto['sku']); ?></td>
    <td><?php echo htmlspecialchars($producto['precio_venta']); ?></td>
    <td><?php echo htmlspecialchars($producto['costo_adquisicion']); ?></td>
    <td><?php echo htmlspecialchars($producto['stock_actual']); ?></td>
    <td><?php echo htmlspecialchars($producto['stock_minimo']); ?></td>
    <td><?php echo htmlspecialchars($producto['unidad_medida']); ?></td>
    <td><?php echo htmlspecialchars($producto['fecha_creacion']); ?></td>
    <td>
        <a href="productos_edit.php?id=<?php echo $producto['id']; ?>">Editar</a>
        <a href="productos_delete.php?id=<?php echo $producto['id']; ?>" 
           onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
           Eliminar
        </a>
    </td>
</tr>




        <?php endforeach; ?>
    </table>
</body>
</html>

