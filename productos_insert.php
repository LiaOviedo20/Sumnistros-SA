<?php
include("../config/database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $categoria = $_POST["categoria"];
    $sku = $_POST["sku"];
    $precio_venta = $_POST["precio_venta"];
    $costo_adquisicion = $_POST["costo_adquisicion"];
    $stock_actual = $_POST["stock_actual"];
    $stock_minimo = $_POST["stock_minimo"];
    $unidad_medida = $_POST["unidad_medida"];

    $sql = "INSERT INTO productos (nombre, descripcion, categoria, sku, precio_venta, costo_adquisicion, stock_actual, stock_minimo, unidad_medida, fecha_creacion)
            VALUES (:nombre, :descripcion, :categoria, :sku, :precio_venta, :costo_adquisicion, :stock_actual, :stock_minimo, :unidad_medida, NOW())";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':nombre' => $nombre,
        ':descripcion' => $descripcion,
        ':categoria' => $categoria,
        ':sku' => $sku,
        ':precio_venta' => $precio_venta,
        ':costo_adquisicion' => $costo_adquisicion,
        ':stock_actual' => $stock_actual,
        ':stock_minimo' => $stock_minimo,
        ':unidad_medida' => $unidad_medida
    ]);

    echo "Producto registrado correctamente";
} else {
    echo "Error en la solicitud";
}
?>


