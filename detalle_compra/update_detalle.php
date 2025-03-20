<?php
include '../config/database.php';

$id = $_GET['id'];
$sql = "SELECT * FROM detalle_compras WHERE id_detalle=$id";
$res = $conexion->query($sql);
$row = $res->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cantidad = $_POST['cantidad'];
    $costo_unitario = $_POST['costo_unitario'];
    $costo_total = $cantidad * $costo_unitario;

    $sql_update = "UPDATE detalle_compras SET cantidad='$cantidad', costo_unitario='$costo_unitario', costo_total='$costo_total' WHERE id_detalle=$id";
    $conexion->query($sql_update);
    header("Location: detalle.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Detalle</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">

</head>
<body>
    <h1>Editar Detalle</h1>
    <form method="POST">
        <label>Cantidad:</label><br>
        <input type="number" name="cantidad" value="<?= $row['cantidad'] ?>" required><br>
        <label>Costo Unitario:</label><br>
        <input type="number" step="0.01" name="costo_unitario" value="<?= $row['costo_unitario'] ?>" required><br><br>
        <button type="submit">Actualizar</button>
    </form>
    <br><a href="detalle.php">Volver</a>
</body>
</html>
<?php $conexion->close(); ?>
