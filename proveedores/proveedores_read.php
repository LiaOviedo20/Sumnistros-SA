<?php
require 'database.php';

$sql = "SELECT * FROM proveedores";
$stmt = $conn->query($sql);
$proveedores = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($proveedores as $proveedor) {
    echo "<tr>
            <td>{$proveedor['id']}</td>
            <td>{$proveedor['nombre_empresa']}</td>
            <td>{$proveedor['contacto_nombre']}</td>
            <td>{$proveedor['telefono']}</td>
            <td>{$proveedor['email']}</td>
            <td>{$proveedor['direccion']}</td>
            <td>{$proveedor['tiempo_entrega']}</td>
            <td>{$proveedor['condiciones_pago']}</td>
            <td>{$proveedor['estado']}</td>
            <td>
                <a href='proveedores_update.php?id={$proveedor['id']}'>Editar</a> | 
                <a href='proveedores_delete.php?id={$proveedor['id']}'>Eliminar</a>
            </td>
        </tr>";
}
?>
