<?php
include '../db/database.php';

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_producto = isset($_POST['nombre_producto']) ? $_POST['nombre_producto'] : '';
    $ubicacion = isset($_POST['ubicacion']) ? $_POST['ubicacion'] : '';
    $stock_actual = isset($_POST['stock_actual']) ? $_POST['stock_actual'] : 0;
    $stock_minimo = isset($_POST['stock_minimo']) ? $_POST['stock_minimo'] : 0;
    $stock_maximo = isset($_POST['stock_maximo']) ? $_POST['stock_maximo'] : 0;
    $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
    $lote_numero_serie = isset($_POST['lote_numero_serie']) ? $_POST['lote_numero_serie'] : '';
    $unidad_medida = isset($_POST['unidad_medida']) ? $_POST['unidad_medida'] : '';

    $stock_actual = !empty($stock_actual) ? intval($stock_actual) : 0;
    $stock_minimo = !empty($stock_minimo) ? intval($stock_minimo) : 0;
    $stock_maximo = !empty($stock_maximo) ? intval($stock_maximo) : 0;

    $sql = "INSERT INTO inventario (nombre_producto, ubicacion, stock_actual, stock_minimo, stock_maximo, estado, lote_numero_serie, unidad_medida)
            VALUES ('$nombre_producto', '$ubicacion', '$stock_actual', '$stock_minimo', '$stock_maximo', '$estado', '$lote_numero_serie', '$unidad_medida')";

    if ($conn->query($sql) === TRUE) {
        header("Location: read.php");
        exit();
    } else {
        echo "Error en la consulta: " . $conn->error;
    }
} else {
    echo "Acceso no permitido.";
}
$conn->close();
?>
<a href="read.php">Ver inventario</a>
