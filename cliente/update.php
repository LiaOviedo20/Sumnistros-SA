<?php
include '../config/database.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM clientes WHERE id_cliente = $id");
$cliente = $result->fetch_assoc();
?>
<link rel="stylesheet" type="text/css" href="../css/estilos.css">


<h1>Editar Cliente</h1>
<form method="POST" action="">
    <input type="text" name="razon_social" value="<?= $cliente['razon_social'] ?>" required>
    <input type="text" name="nombre_contacto" value="<?= $cliente['nombre_contacto'] ?>" required>
    <input type="text" name="telefono" value="<?= $cliente['telefono'] ?>" required>
    <input type="email" name="correo_electronico" value="<?= $cliente['correo_electronico'] ?>" required>
    <input type="text" name="direccion_facturacion" value="<?= $cliente['direccion_facturacion'] ?>" required>
    <input type="text" name="direccion_envio" value="<?= $cliente['direccion_envio'] ?>" required>
    <input type="text" name="condiciones_pago" value="<?= $cliente['condiciones_pago'] ?>" required>
    <input type="text" name="tipo_cliente" value="<?= $cliente['tipo_cliente'] ?>" required>
    <input type="text" name="estado" value="<?= $cliente['estado'] ?>" required>
    <button type="submit" name="actualizar">Actualizar</button>
</form>

<?php
if (isset($_POST['actualizar'])) {
    $sql = "UPDATE clientes SET razon_social=?, nombre_contacto=?, telefono=?, correo_electronico=?,
        direccion_facturacion=?, direccion_envio=?, condiciones_pago=?, tipo_cliente=?, estado=?
        WHERE id_cliente=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssi", $_POST['razon_social'], $_POST['nombre_contacto'], $_POST['telefono'],
        $_POST['correo_electronico'], $_POST['direccion_facturacion'], $_POST['direccion_envio'],
        $_POST['condiciones_pago'], $_POST['tipo_cliente'], $_POST['estado'], $id);
    $stmt->execute();
    header("Location: read.php");
}
?>
<a href="read.php">Volver</a>
