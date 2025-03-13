<?php
include("../config/database.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM proveedores WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    header("Location: proveedores_lista.html");
    exit();
}
?>
