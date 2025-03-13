<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Proveedores</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Lista de Proveedores</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Empresa</th>
                <th>Contacto</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Tiempo Entrega</th>
                <th>Condiciones Pago</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="proveedores-lista">
            <!-- Aquí se cargarán los datos -->
        </tbody>
    </table>

    <script>
        fetch("proveedores_read.php")
            .then(response => response.text())
            .then(data => document.getElementById("proveedores-lista").innerHTML = data);
    </script>
</body>
</html>
