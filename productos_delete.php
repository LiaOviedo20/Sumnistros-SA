<?php
include("../config/database.php");

// Verificar si se envió un ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID de producto no especificado.");
}

$id = $_GET['id'];

$sql = "DELETE FROM productos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

echo "<script>alert('Producto eliminado correctamente'); window.location.href='productos_list.php';</script>";
?>


