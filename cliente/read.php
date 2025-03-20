<?php include '../config/database.php'; ?>
<link rel="stylesheet" type="text/css" href="../css/estilos.css">


<h1>Lista de Clientes</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Razón Social</th>
        <th>Contacto</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Facturación</th>
        <th>Envío</th>
        <th>Pago</th>
        <th>Tipo</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>

    <?php
    $resultado = $conn->query("SELECT * FROM clientes");
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>
            <td>{$fila['id_cliente']}</td>
            <td>{$fila['razon_social']}</td>
            <td>{$fila['nombre_contacto']}</td>
            <td>{$fila['telefono']}</td>
            <td>{$fila['correo_electronico']}</td>
            <td>{$fila['direccion_facturacion']}</td>
            <td>{$fila['direccion_envio']}</td>
            <td>{$fila['condiciones_pago']}</td>
            <td>{$fila['tipo_cliente']}</td>
            <td>{$fila['estado']}</td>
            <td>
                <a href='update.php?id={$fila['id_cliente']}'>Editar</a>
                <a href='delete.php?id={$fila['id_cliente']}' onclick=\"return confirm('¿Eliminar cliente?')\">Eliminar</a>
            </td>
        </tr>";
    }
    ?>
</table>
<a href="insert.php">Registrar Nuevo Cliente</a>
