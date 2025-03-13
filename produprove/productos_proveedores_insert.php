<?php
include("../config/database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $producto_id = isset($_POST['producto_id']) ? intval($_POST['producto_id']) : 0;
    $proveedor_id = isset($_POST['proveedor_id']) ? intval($_POST['proveedor_id']) : 0;

    if ($producto_id > 0 && $proveedor_id > 0) {
        $sql = "INSERT INTO productos_proveedores (producto_id, proveedor_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute([$producto_id, $proveedor_id])) {
            echo "Asignación guardada.";
        } else {
            echo "Error al guardar la asignación.";
        }
    } else {
        echo "Datos inválidos. Asegúrate de seleccionar un producto y un proveedor.";
    }
}
?>
<a href="productos_proveedores.html">Volver</a>
