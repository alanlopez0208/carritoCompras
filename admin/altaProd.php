<?php
include("../conexion.php");

$producto = $_POST["producto"];
$cantidad = $_POST["catPtoductos"];
$precio = $_POST["precio"];
$descripcion = $_POST["descripcion"];
$fechaReg = $_POST["fecha_registro"];

$stm = $conn->prepare("INSERT INTO productos
    (`producto`,`cateId`, `precio`,`descripcion`,`fechaReg`)
VALUES (?,?,?,?,?)");
$stm->bindParam(1, $producto);
$stm->bindParam(2, $cantidad);
$stm->bindParam(3, $precio);
$stm->bindParam(4, $descripcion);
$stm->bindParam(5, $fechaReg);


if ($stm->execute()) {
    header("Location:productos.php");
}

$conn = null;
?>