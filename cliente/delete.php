<?php
include '../config/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM clientes WHERE id_cliente = $id");
}
header("Location: read.php");
?>

