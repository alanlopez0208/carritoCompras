<?php

include("../conexion.php");

try {
    //sql to create table
    $sql = " CREATE TABLE productos(
    `id` int(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `producto` varchar(200) NOT NULL,
    `catId` INT(200),
    `precio` FLOAT(6,2),
    `descripcion` varchar(250),
    `fechaReg` DATE
    )";

    //Se usa excec() para ejecutar la sentencia y este no va a regresar nada
    $conn->exec($sql);
    echo "Tabla Productos creada correctamente";
} catch (PDOException $e) {
    // Manejo de errores
    echo "Error de conexión: " . $e->getMessage();
}
$conn = null;
?>