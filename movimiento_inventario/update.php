<?php
include '../db/database.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM movimientos_inventario WHERE id_movimiento = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_movimiento'];
    $id_producto = $_POST['id_producto'];
    $tipo_movimiento = $_POST['tipo_movimiento'];
    $cantidad = $_POST['cantidad'];
    $fecha_movimiento = $_POST['fecha_movimiento'];
    $motivo = $_POST['motivo'];

    $sql = "UPDATE movimientos_inventario SET id_producto=?, tipo_movimiento=?, cantidad=?, fecha_movimiento=?, motivo=? WHERE id_movimiento=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isissi", $id_producto, $tipo_movimiento, $cantidad, $fecha_movimiento, $motivo, $id);

    if ($stmt->execute()) {
        header("Location: read.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Movimiento</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h2>Editar Movimiento de Inventario</h2>
    <form action="update.php" method="POST">
        <input type="hidden" name="id_movimiento" value="<?= $data['id_movimiento'] ?>">
        <label>ID Producto:</label>
        <input type="number" name="id_producto" value="<?= $data['id_producto'] ?>" required><br>

        <label>Tipo de Movimiento:</label>
        <select name="tipo_movimiento" required>
            <option value="entrada" <?= $data['tipo_movimiento'] == 'entrada' ? 'selected' : '' ?>>Entrada</option>
            <option value="salida" <?= $data['tipo_movimiento'] == 'salida' ? 'selected' : '' ?>>Salida</option>
        </select><br>

        <label>Cantidad:</label>
        <input type="number" name="cantidad" value="<?= $data['cantidad'] ?>" required><br>

        <label>Fecha Movimiento:</label>
        <input type="datetime-local" name="fecha_movimiento" value="<?= $data['fecha_movimiento'] ?>" required><br>

        <label>Motivo:</label>
        <input type="text" name="motivo" value="<?= $data['motivo'] ?>"><br>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
