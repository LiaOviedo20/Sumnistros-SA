<?php
include("../config/database.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Producto a un Proveedor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #4b0082;
            color: white;
            text-align: center;
        }
        .container {
            background-color: #7b1fa2;
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
            margin-top: 50px;
        }
        select, button {
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            border: none;
        }
        button {
            background-color: #8e24aa;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Asignar Producto a un Proveedor</h2>

        <form action="productos_proveedores_insert.php" method="POST">
            <label for="producto_id">Producto:</label>
            <select name="producto_id" required>
                <option value="">Seleccione un producto</option>
                <?php
                $stmt = $conn->query("SELECT id, nombre FROM productos");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['nombre']) . "</option>";
                }
                ?>
            </select>

            <label for="proveedor_id">Proveedor:</label>
            <select name="proveedor_id" required>
                <option value="">Seleccione un proveedor</option>
                <?php
                $stmt = $conn->query("SELECT id, nombre_empresa FROM proveedores");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['nombre_empresa']) . "</option>";
                }
                ?>
            </select>

            <button type="submit">Asignar</button>
        </form>
    </div>
</body>
</html>

