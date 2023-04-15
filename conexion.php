<?php

// Parámetros de conexión a la base de datos
$host = 'localhost'; // Cambia esto si tu base de datos está en otro servidor
$dbname = 'carritoCompras'; // Cambia esto por el nombre de tu base de datos
$username = 'root'; // Cambia esto por tu nombre de usuario de la base de datos
$password = ''; // Cambia esto por tu contraseña de la base de datos

try {
    // Crear una nueva conexión utilizando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Configurar el modo de error de PDO a excepciones
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Aquí puedes ejecutar consultas y realizar operaciones en la base de datos4
    echo "Conexion exitosa";
} catch (PDOException $e) {
    // Manejo de errores
    echo "Error de conexión: " . $e->getMessage();
}
?>