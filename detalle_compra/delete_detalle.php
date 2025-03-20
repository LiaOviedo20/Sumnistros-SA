<?php
include '../config/database.php';

$id = $_GET['id'];
$conexion->query("DELETE FROM detalle_compras WHERE id_detalle=$id");
$conexion->close();
header("Location: detalle.php");
?>
