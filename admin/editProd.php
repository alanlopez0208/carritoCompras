<?php
include("../conexion.php");

$id = $_POST["idEditProd"];
$producto = $_POST["producto"];
$cantidad = $_POST["cantidad"];
$precio = $_POST["precio"];
$descripcion = $_POST["descripcion"];
$fechaReg = $_POST["fecha_registro"];

try{
    $stm = $conn->prepare("UPDATE productos SET `producto`=?, `catId`=?, `precio`=?, `descripcion`=?, `fechaReg`=?WHERE `id`=?");
    $stm->bindParam(1, $producto);
    $stm->bindParam(2, $cantidad);
    $stm->bindParam(3, $precio);
    $stm->bindParam(4, $descripcion);
    $stm->bindParam(5, $fechaReg);
    $stm->bindParam(6, $id);
    if ($stm->execute()) {
        header("Location:productos.php");
    }
}catch(PDOException $e){
    echo "Error: ". $e->getMessage();
}

$conn = null;
?>