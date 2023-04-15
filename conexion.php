<?php

// Parámetros de conexión a la base de datos
$host = 'localhost';
$dbname = 'carritoCompras';
$username = 'carritoCompras';
$password = '1234';

try {
    // Crear una nueva conexión utilizando PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Configurar el modo de error de PDO a excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Aquí puedes ejecutar consultas y realizar operaciones en la base de datos4
    // echo "Conexion exitosa";
} catch (PDOException $e) {
    // Manejo de errores
    echo "Error de conexión: " . $e->getMessage();
}
?>