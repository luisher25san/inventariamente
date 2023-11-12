<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventario_api";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de la Base de Datos</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h2>Información de Salidas_Mercancia</h2>
<?php
// Consulta SQL para obtener la información de Salidas_Mercancia
$sql_salidas = "SELECT * FROM Salidas_Mercancia";
$result_salidas = $conn->query($sql_salidas);

echo "<table border='1'>
    <tr>
        <th>ID_Salida</th>
        <th>ID_Producto</th>
        <th>Fecha_Salida</th>
        <th>Cantidad_Salida</th>
        <th>ID_Proveedor</th>
    </tr>";

if ($result_salidas->num_rows > 0) {
    while ($row = $result_salidas->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["ID_Salida"] . "</td>
            <td>" . $row["ID_Producto"] . "</td>
            <td>" . $row["Fecha_Salida"] . "</td>
            <td>" . $row["Cantidad_Salida"] . "</td>
            <td>" . $row["ID_Proveedor"] . "</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados encontrados";
}
?>

<h2>Información de Proveedores</h2>
<?php
// Consulta SQL para obtener la información de Proveedores
$sql_proveedores = "SELECT * FROM Proveedores";
$result_proveedores = $conn->query($sql_proveedores);

echo "<table border='1'>
    <tr>
        <th>ID_Proveedor</th>
        <th>Nombre_Proveedor</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Correo</th>
    </tr>";

if ($result_proveedores->num_rows > 0) {
    while ($row = $result_proveedores->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["ID_Proveedor"] . "</td>
            <td>" . $row["Nombre_Proveedor"] . "</td>
            <td>" . $row["Direccion"] . "</td>
            <td>" . $row["Telefono"] . "</td>
            <td>" . $row["Correo"] . "</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados encontrados";
}
?>
<button type="button" class="btn btn-primary" onclick="">Agregar Proveedor</button>
<button type="button" class="btn btn-primary" onclick="">Modificar Proveedor</button>
<button type="button" class="btn btn-primary" onclick="">Eliminar Proveedor</button>

<h2>Información de Productos</h2>
<?php
// Consulta SQL para obtener la información de Productos
$sql_productos = "SELECT * FROM Productos";
$result_productos = $conn->query($sql_productos);

echo "<table border='1'>
    <tr>
        <th>ID_Producto</th>
        <th>Codigo_Producto</th>
        <th>Nombre_Producto</th>
        <th>Descripcion</th>
        <th>Precio_Unitario</th>
        <th>Stock_Actual</th>
    </tr>";

if ($result_productos->num_rows > 0) {
    while ($row = $result_productos->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["ID_Producto"] . "</td>
            <td>" . $row["Codigo_Producto"] . "</td>
            <td>" . $row["Nombre_Producto"] . "</td>
            <td>" . $row["Descripcion"] . "</td>
            <td>" . $row["Precio_Unitario"] . "</td>
            <td>" . $row["Stock_Actual"] . "</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados encontrados";
}

// Cerrar la conexión
$conn->close();
?>

<button type="button" class="btn btn-primary" onclick="registrarVentas()">Registrar ventas</button>

<button type="button" class="btn btn-primary" onclick="abrirFormulario()">Reporte</button>

<!-- Modales para mostrar los formularios -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Formulario de Ventas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Contenido del formulario aquí -->
                <form id="ventasForm">
                    <!-- Campos y elementos del formulario -->
                    <div class="mb-3">
                        <label for="cantidadVentas" class="form-label">Cantidad de Ventas</label>
                        <input type="number" class="form-control" id="cantidadVentas" name="cantidadVentas" required>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="registrarVentas()">Registrar Ventas</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Script de jQuery y Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCO9qqp9l4ZMEHoM2Mxkt5qlI6bYdhxILYJqZb7el3nEo9
