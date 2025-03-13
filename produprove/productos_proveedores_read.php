<?php
include("../config/database.php");

$sql = "SELECT pp.id, p.nombre AS producto, pr.nombre_empresa AS proveedor
        FROM productos_proveedores pp
        JOIN productos p ON pp.producto_id = p.id
        JOIN proveedores pr ON pp.proveedor_id = pr.id";

$stmt = $conn->query($sql);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['producto']}</td>
            <td>{$row['proveedor']}</td>
            <td>
                <a href='productos_proveedores_delete.php?id={$row['id']}'>Eliminar</a>
            </td>
          </tr>";
}
?>
