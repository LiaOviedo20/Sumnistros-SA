<?php
include '../db/database.php';

if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM inventario WHERE id_producto = ?");
    $stmt->bind_param("i", $id_producto);
    $stmt->execute();
    $result = $stmt->get_result();
    $producto = $result->fetch_assoc();

    if (!$producto) {
        echo "Producto no encontrado.";
        exit();
    }

    $stmt->close();
} else {
    echo "ID no proporcionado.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre_producto'];
    $ubicacion = $_POST['ubicacion'];
    $stock = $_POST['stock_actual'];
    $estado = $_POST['estado'];

    $stmt = $conn->prepare("UPDATE inventario SET nombre_producto=?, ubicacion=?, stock_actual=?, estado=? WHERE id_producto=?");
    $stmt->bind_param("ssisi", $nombre, $ubicacion, $stock, $estado, $id_producto);

    if ($stmt->execute()) {
        header("Location: read.php"); 
        exit();
    } else {
        echo "Error al actualizar el producto.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <h1>Editar Producto</h1>

    <form method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre_producto" value="<?= htmlspecialchars($producto['nombre_producto']) ?>" required>

        <label>Ubicación:</label>
        <input type="text" name="ubicacion" value="<?= htmlspecialchars($producto['ubicacion']) ?>" required>

        <label>Stock Actual:</label>
        <input type="number" name="stock_actual" value="<?= htmlspecialchars($producto['stock_actual']) ?>" required>

        <label>Estado:</label>
        <select name="estado">
            <option value="disponible" <?= $producto['estado'] == "disponible" ? "selected" : "" ?>>Disponible</option>
            <option value="reservado" <?= $producto['estado'] == "reservado" ? "selected" : "" ?>>Reservado</option>
            <option value="agotado" <?= $producto['estado'] == "agotado" ? "selected" : "" ?>>Agotado</option>
        </select>

        <button type="submit" class="btn editar">Actualizar</button>
        <a href="read.php" class="btn cancelar">Cancelar</a>
    </form>

</body>
</html>