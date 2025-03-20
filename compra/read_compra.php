<?php
include '../config/database.php';

$sql = "SELECT * FROM compras";
$resultado = $conexion->query($sql);

echo "<table>";
echo "<tr><th>ID Compra</th><th>ID Proveedor</th><th>Fecha Compra</th><th>N° Factura</th><th>Monto</th><th>Pago</th><th>Fecha Entrega</th><th>Estado</th><th>Acciones</th></tr>";

while($fila = $resultado->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $fila['id_compra'] . "</td>";
    echo "<td>" . $fila['id_proveedor'] . "</td>";
    echo "<td>" . $fila['fecha_compra'] . "</td>";
    echo "<td>" . $fila['numero_factura'] . "</td>";
    echo "<td>" . $fila['monto_total'] . "</td>";
    echo "<td>" . $fila['metodo_pago'] . "</td>";
    echo "<td>" . $fila['fecha_estimada_entrega'] . "</td>";
    echo "<td>" . $fila['estado_compra'] . "</td>";
    echo "<td>
            <a href='update_compra.php?id=" . $fila['id_compra'] . "'>Editar</a> | 
            <a href='delete_compra.php?id=" . $fila['id_compra'] . "'>Eliminar</a>
          </td>";
    echo "</tr>";
}
echo "</table>";

$conexion->close();
?>
