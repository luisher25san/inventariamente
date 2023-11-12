<?php
// actualizar_stock.php

// Verificar si se recibió la cantidad de ventas
if (isset($_POST['cantidad'])) {
    $cantidad_ventas = intval($_POST['cantidad']);

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

    // Supongamos que tienes una tabla 'Productos' con un campo 'Stock_Actual'
    // Actualizar el stock restando la cantidad de ventas
    $sql_actualizar_stock = "UPDATE Productos SET Stock_Actual = '20' - $cantidad_ventas WHERE ID_Producto = 1";

    if ($conn->query($sql_actualizar_stock) === TRUE) {
        echo "Stock actualizado correctamente";
    } else {
        echo "Error al actualizar el stock: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "No se recibió la cantidad de ventas.";
}
?>
