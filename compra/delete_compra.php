<?php
include '../config/database.php';

$id = $_GET['id'];

$sql = "DELETE FROM compras WHERE id_compra=$id";

if ($conexion->query($sql) === TRUE) {
    echo "Compra eliminada correctamente.";
} else {
    echo "Error al eliminar: " . $conexion->error;
}

$conexion->close();
?>
<a href='compra.html'>Volver</a>
