<?php
include("../config/database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_empresa = $_POST["nombre_empresa"];
    $contacto_nombre = $_POST["contacto_nombre"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $direccion = $_POST["direccion"];
    $tiempo_entrega = $_POST["tiempo_entrega"];
    $condiciones_pago = $_POST["condiciones_pago"];
    $estado = $_POST["estado"];

    // Verifica si $conn está definido
    if (!isset($conn)) {
        die("Error: No se pudo establecer la conexión con la base de datos.");
    }

    $sql = "INSERT INTO proveedores (nombre_empresa, contacto_nombre, telefono, email, direccion, tiempo_entrega, condiciones_pago, estado, fecha_creacion)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$nombre_empresa, $contacto_nombre, $telefono, $email, $direccion, $tiempo_entrega, $condiciones_pago, $estado]);

    header("Location: proveedores_lista.html");
    exit();
}
?>


