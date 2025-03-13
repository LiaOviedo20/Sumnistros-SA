<?php
include("../config/database.php");

// Verificar si hay un ID en la URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID de producto no especificado.");
}

$id = $_GET['id'];

// Obtener los datos del producto
$sql = "SELECT * FROM productos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$producto = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar si el producto existe
if (!$producto) {
    die("Producto no encontrado.");
}

// Si el formulario se envía, actualizar los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $sku = $_POST['sku'];
    $precio_venta = $_POST['precio_venta'];
    $costo_adquisicion = $_POST['costo_adquisicion'];
    $stock_actual = $_POST['stock_actual'];
    $stock_minimo = $_POST['stock_minimo'];
    $unidad_medida = $_POST['unidad_medida'];

    $sql = "UPDATE productos SET nombre=?, descripcion=?, categoria=?, sku=?, precio_venta=?, 
            costo_adquisicion=?, stock_actual=?, stock_minimo=?, unidad_medida=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nombre, $descripcion, $categoria, $sku, $precio_venta, 
                    $costo_adquisicion, $stock_actual, $stock_minimo, $unidad_medida, $id]);

    echo "<script>alert('Producto actualizado correctamente'); window.location.href='productos_list.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Editar Producto</h2>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($producto['nombre']); ?>" required>

        <label>Descripción:</label>
        <input type="text" name="descripcion" value="<?php echo htmlspecialchars($producto['descripcion']); ?>" required>

        <label>Categoría:</label>
        <input type="text" name="categoria" value="<?php echo htmlspecialchars($producto['categoria']); ?>" required>

        <label>SKU:</label>
        <input type="text" name="sku" value="<?php echo htmlspecialchars($producto['sku']); ?>" required>

        <label>Precio Venta:</label>
        <input type="number" name="precio_venta" step="0.01" value="<?php echo htmlspecialchars($producto['precio_venta']); ?>" required>

        <label>Costo Adquisición:</label>
        <input type="number" name="costo_adquisicion" step="0.01" value="<?php echo htmlspecialchars($producto['costo_adquisicion']); ?>" required>

        <label>Stock Actual:</label>
        <input type="number" name="stock_actual" value="<?php echo htmlspecialchars($producto['stock_actual']); ?>" required>

        <label>Stock Mínimo:</label>
        <input type="number" name="stock_minimo" value="<?php echo htmlspecialchars($producto['stock_minimo']); ?>" required>

        <label>Unidad Medida:</label>
        <input type="text" name="unidad_medida" value="<?php echo htmlspecialchars($producto['unidad_medida']); ?>" required>

        <button type="submit">Actualizar Producto</button>
    </form>
</body>
</html>

