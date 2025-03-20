<?php include "database.php"; ?>
<link rel="stylesheet" type="text/css" href="../css/estilos.css">


<h1>Registrar Nuevo Cliente</h1>
<form method="POST" action="">
    <input type="text" name="razon_social" placeholder="Razón Social" required>
    <input type="text" name="nombre_contacto" placeholder="Nombre del Contacto" required>
    <input type="text" name="telefono" placeholder="Teléfono" required>
    <input type="email" name="correo_electronico" placeholder="Correo Electrónico" required>
    <input type="text" name="direccion_facturacion" placeholder="Dirección Facturación" required>
    <input type="text" name="direccion_envio" placeholder="Dirección Envío" required>
    <select name="condiciones_pago" required>
        <option value="">Condiciones de Pago</option>
        <option value="contado">Contado</option>
        <option value="crédito">Crédito</option>
        <option value="pagos parciales">Pagos Parciales</option>
    </select>
    <select name="tipo_cliente" required>
        <option value="">Tipo de Cliente</option>
        <option value="minorista">Minorista</option>
        <option value="mayorista">Mayorista</option>
        <option value="corporativo">Corporativo</option>
    </select>
    <select name="estado" required>
        <option value="">Estado</option>
        <option value="activo">Activo</option>
        <option value="inactivo">Inactivo</option>
    </select>
    <button type="submit" name="registrar">Registrar</button>
</form>

<?php
if (isset($_POST['registrar'])) {
    $sql = "INSERT INTO clientes (razon_social, nombre_contacto, telefono, correo_electronico,
        direccion_facturacion, direccion_envio, condiciones_pago, tipo_cliente, estado)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $_POST['razon_social'], $_POST['nombre_contacto'], $_POST['telefono'],
        $_POST['correo_electronico'], $_POST['direccion_facturacion'], $_POST['direccion_envio'],
        $_POST['condiciones_pago'], $_POST['tipo_cliente'], $_POST['estado']);

    if ($stmt->execute()) {
        echo "<p style='text-align:center;color:green;'>Cliente registrado correctamente</p>";
    } else {
        echo "<p style='text-align:center;color:red;'>Error: " . $stmt->error . "</p>";
    }
}
?>
<a href="read.php">Ver Clientes</a>

