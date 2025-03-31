<?php
include '../db/database.php';

if (isset($_GET['id_venta'])) {
    $id_venta = $_GET['id_venta'];

    $sql = "SELECT * FROM ventas WHERE id_venta = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_venta);
    $stmt->execute();
    $result = $stmt->get_result();
    $venta = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Venta</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h2>Editar Venta</h2>
    <form action="procesar_update.php" method="POST">
        <input type="hidden" name="id_venta" value="<?php echo $venta['id_venta']; ?>">
        <label>Monto Total:</label>
        <input type="number" name="monto_total" value="<?php echo $venta['monto_total']; ?>" required>
        <label>Estado de Venta:</label>
        <input type="text" name="estado_venta" value="<?php echo $venta['estado_venta']; ?>" required>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
