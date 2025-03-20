<?php
include '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM compras WHERE id_compra=$id";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Editar Compra</title>
            <link rel="stylesheet" type="text/css" href="../css/estilos.css">

        </head>
        <body>
            <h1>Editar Compra</h1>
            <form action="update_compra.php" method="post">
                <input type="hidden" name="id_compra" value="<?php echo $fila['id_compra']; ?>">

                <label>ID Proveedor:</label>
                <input type="number" name="id_proveedor" value="<?php echo $fila['id_proveedor']; ?>" required>

                <label>Fecha de Compra:</label>
                <input type="date" name="fecha_compra" value="<?php echo $fila['fecha_compra']; ?>" required>

                <label>Número Factura:</label>
                <input type="text" name="numero_factura" value="<?php echo $fila['numero_factura']; ?>" required>

                <label>Monto Total:</label>
                <input type="number" step="0.01" name="monto_total" value="<?php echo $fila['monto_total']; ?>" required>

                <label>Método de Pago:</label>
                <select name="metodo_pago" required>
                    <option value="transferencia" <?php if ($fila['metodo_pago'] == "transferencia") echo "selected"; ?>>Transferencia</option>
                    <option value="efectivo" <?php if ($fila['metodo_pago'] == "efectivo") echo "selected"; ?>>Efectivo</option>
                    <option value="crédito" <?php if ($fila['metodo_pago'] == "crédito") echo "selected"; ?>>Crédito</option>
                </select>

                <label>Fecha Estimada Entrega:</label>
                <input type="date" name="fecha_estimada_entrega" value="<?php echo $fila['fecha_estimada_entrega']; ?>" required>

                <label>Estado Compra:</label>
                <select name="estado_compra" required>
                    <option value="pendiente" <?php if ($fila['estado_compra'] == "pendiente") echo "selected"; ?>>Pendiente</option>
                    <option value="en tránsito" <?php if ($fila['estado_compra'] == "en tránsito") echo "selected"; ?>>En tránsito</option>
                    <option value="entregada" <?php if ($fila['estado_compra'] == "entregada") echo "selected"; ?>>Entregada</option>
                    <option value="cancelada" <?php if ($fila['estado_compra'] == "cancelada") echo "selected"; ?>>Cancelada</option>
                </select>

                <button type="submit">Actualizar Compra</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Compra no encontrada.";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_compra = $_POST['id_compra'];
    $id_proveedor = $_POST['id_proveedor'];
    $fecha_compra = $_POST['fecha_compra'];
    $numero_factura = $_POST['numero_factura'];
    $monto_total = $_POST['monto_total'];
    $metodo_pago = $_POST['metodo_pago'];
    $fecha_entrega = $_POST['fecha_estimada_entrega'];
    $estado_compra = $_POST['estado_compra'];

    $sql = "UPDATE compras 
            SET id_proveedor='$id_proveedor', fecha_compra='$fecha_compra', numero_factura='$numero_factura', 
                monto_total='$monto_total', metodo_pago='$metodo_pago', fecha_estimada_entrega='$fecha_entrega', 
                estado_compra='$estado_compra' 
            WHERE id_compra=$id_compra";

    if ($conexion->query($sql) === TRUE) {
        echo "Compra actualizada correctamente.";
    } else {
        echo "Error al actualizar: " . $conexion->error;
    }

    echo "<br><a href='compra.html'>Volver</a>";
}

$conexion->close();
?>
