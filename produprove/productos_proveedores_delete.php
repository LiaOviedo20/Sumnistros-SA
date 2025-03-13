<?php
include("../config/database.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM productos_proveedores WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute([$id])) {
        echo "Asignación eliminada.";
    } else {
        echo "Error al eliminar la asignación.";
    }
}
?>
<a href="productos_proveedores.html">Volver</a>
